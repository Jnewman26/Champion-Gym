<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Membership;
use App\Models\Notification;
use App\Models\Packages;
use App\Models\PersonalTrainer;
use App\Models\Promotion;
use App\Models\Sales;
use App\Models\SalesDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class MemberController extends Controller
{
    public function admin()
    {
        $member = DB::table('sales_detail as sd')
            ->select(
                'sd.member_id',
                'sd.sales_id',
                'sd.membership_name',
                'sd.membership_price',
                'sd.membership_join_date',
                'sd.membership_end_date',
                's.sales_total',
                's.payment_type',
                's.sales_status',
                's.sales_date_created',
                'm.member_first_name',
                'm.member_last_name',
                'm.member_ktp',
                'm.member_email',
                'm.member_phone_number',
                'm.member_password',
                'm.member_join_date',
                'm.member_updated'
            )
            ->join(DB::raw('(SELECT MAX(sales_id) AS max_sales_id FROM sales_detail GROUP BY member_id) as max_sd'), function ($join) {
                $join->on('sd.sales_id', '=', 'max_sd.max_sales_id');
            })
            ->leftJoin('sales as s', 'sd.sales_id', '=', 's.sales_id')
            ->leftJoin('member as m', 'sd.member_id', '=', 'm.member_id')
            ->orderBy('sd.member_id')
            ->get();

        $member_first = DB::table('sales_detail as sd')
            ->select(
                'sd.sales_id',
                'sd.member_id',
                'sd.membership_name',
                'sd.membership_price',
                'sd.membership_join_date',
                'sd.personal_trainer_price',
                'sd.promotion_discount',
                's.sales_total',
                's.payment_type',
                's.sales_status',
                's.sales_date_created',
                'm.member_first_name',
                'm.member_last_name',
                'm.member_ktp',
                'm.member_email',
                'm.member_phone_number',
                'm.member_password',
                'm.member_join_date',
                'm.member_updated'
            )
            ->leftJoin('sales as s', 'sd.sales_id', '=', 's.sales_id')
            ->leftJoin('member as m', 'sd.member_id', '=', 'm.member_id')
            ->where('sd.member_id', 'J05072023001_member')
            ->first();

        // $member = User::all();

        $membership = Membership::all();
        $promotion = Promotion::all();
        $personalTrainer = PersonalTrainer::all();
        return Inertia::render('AdminApp/Member', [
            'membership' => $membership,
            'members' => $member,
            'member_first' => $member_first,
            'promotion' => $promotion,
            'personalTrainer' => $personalTrainer
        ]);
    }

    public function memberStore(Request $request)
    {
        // dd($request);
        $request->validate([
            'member_first_name' => 'required',
            'member_ktp' => 'required|unique:member',
            'member_email' => 'required|unique:member|email',
            'member_phone_number' => 'required|unique:member|min:10',
            'member_password' => 'min:8',
            'membership_name' => 'required',
            'member_join_date' => 'required',
            'member_payment_type' => 'required',
            'member_password' => 'required|min:8',
        ]);

        // generate member id
        $firstName = $request->input('member_first_name');
        $firstAlpahbet = strtoupper(substr($firstName, 0, 1));
        $currentDate =  now()->format('Y-m-d');
        $memberId = DB::selectOne('SELECT generate_member_id(?, ?) AS member_id', [$firstAlpahbet, $currentDate])->member_id;

        // generate sales id
        $salesId = DB::selectOne('SELECT generate_sales_id(?) AS sales_id', [$currentDate])->sales_id;

        // generate notification id
        $notificationId = DB::selectOne('SELECT generate_notification_id(?, ?) AS notification_id', [$firstAlpahbet, $currentDate])->notification_id;

        // Insert data to member table
        $post = $request->all();
        $post['member_id'] = $memberId;
        $post['member_join_date'] = $post['member_join_date'];
        $post['member_password'] = Hash::make($request->input('member_password'));
        User::create($post);

        // Insert data to notification table
        $memberData = $request->all();
        $post = $request->all();
        $post['notification_id'] = $notificationId;
        $post['member_id'] = $memberId;
        Notification::create($post);

        // Insert data to sales table
        $memberData = $request->all();
        $sales = new Sales();
        $sales->sales_id = $salesId;
        $sales->sales_total = $memberData['sales_total'];
        $sales->payment_type = $memberData['member_payment_type'];
        $sales->sales_status = 'paid';
        $sales->sales_date_created = $memberData['member_join_date'];
        $sales->save();

        // Insert data to sales detail table
        $memberData = $request->all();
        $sales = new SalesDetail();
        $sales->sales_id = $salesId;
        $sales->member_id = $memberId;
        $sales->membership_name = $memberData['membership_name'];
        $sales->membership_price = $memberData['membership_price'];
        $sales->promotion_discount = $memberData['promotion_discount'];
        $sales->personal_trainer_price = $memberData['personal_trainer_price'];
        $sales->membership_join_date = $memberData['member_join_date'];
        $sales->membership_end_date = $memberData['member_end_date'];

        $sales->save();

        return Redirect::route('member')->with('message', 'Member successfully added');
    }

    public function memberRenew(Request $request)
    {
        $request->validate([
            'membership_name' => 'required',
            'member_join_date' => 'required',
            'member_payment_type' => 'required',
        ]);

        // generate sales id
        $currentDate = now()->format('Y-m-d');
        $salesId = DB::selectOne('SELECT generate_sales_id(?) AS sales_id', [$currentDate])->sales_id;

        // Insert data to sales table
        $memberData = $request->all();
        $sales = new Sales();
        $sales->sales_id = $salesId;
        $sales->sales_total = $memberData['sales_total'];
        $sales->payment_type = $memberData['member_payment_type'];
        $sales->sales_status = 'paid';
        $sales->sales_date_created = $memberData['member_join_date'];
        $sales->save();

        // Insert data to sales detail table
        $memberData = $request->all();
        $sales = new SalesDetail();
        $sales->sales_id = $salesId;
        $sales->member_id = $memberData['member_id'];
        $sales->membership_name = $memberData['membership_name'];
        $sales->membership_price = $memberData['membership_price'];
        $sales->promotion_discount = $memberData['promotion_discount'];
        $sales->personal_trainer_price = $memberData['personal_trainer_price'];
        $sales->membership_join_date = $memberData['member_join_date'];
        $sales->membership_end_date = $memberData['member_end_date'];
        $sales->save();

        return Redirect::route('member')->with('message', 'Member successfully added');
    }

    public function memberShow($member_id)
    {
        $member = DB::table('sales_detail as sd')
            ->select(
                'sd.sales_id',
                'sd.member_id',
                'sd.membership_name',
                'sd.membership_price',
                'sd.membership_join_date',
                'sd.membership_end_date',
                'sd.personal_trainer_price',
                'sd.promotion_discount',
                's.sales_total',
                's.payment_type',
                's.sales_status',
                's.sales_date_created',
                'm.member_first_name',
                'm.member_last_name',
                'm.member_ktp',
                'm.member_email',
                'm.member_phone_number',
                'm.member_password',
                'm.member_join_date',
                'm.member_updated'
            )
            ->leftJoin('sales as s', 'sd.sales_id', '=', 's.sales_id')
            ->leftJoin('member as m', 'sd.member_id', '=', 'm.member_id')
            ->where('sd.member_id', $member_id)
            ->orderBy('sd.membership_join_date', 'desc')
            ->get();

        $member_first = DB::table('sales_detail as sd')
            ->select(
                'sd.sales_id',
                'sd.member_id',
                'sd.membership_name',
                'sd.membership_price',
                'sd.membership_join_date',
                'sd.membership_end_date',
                'sd.personal_trainer_price',
                'sd.promotion_discount',
                's.sales_total',
                's.payment_type',
                's.sales_status',
                's.sales_date_created',
                'm.member_first_name',
                'm.member_last_name',
                'm.member_ktp',
                'm.member_email',
                'm.member_phone_number',
                'm.member_password',
                'm.member_join_date',
                'm.member_updated'
            )
            ->leftJoin('sales as s', 'sd.sales_id', '=', 's.sales_id')
            ->leftJoin('member as m', 'sd.member_id', '=', 'm.member_id')
            ->where('sd.member_id', $member_id)
            ->first();

        $membership = Membership::all();
        $promotion = Promotion::all();
        $personalTrainer = PersonalTrainer::all();

        return Inertia::render('AdminApp/MemberEdit', [
            'members' => $member,
            'member_first' => $member_first,
            'membership' => $membership,
            'promotion' => $promotion,
            'personalTrainer' => $personalTrainer
        ]);
    }
    public function memberDelete(string $sales_id)
    {
        SalesDetail::where('sales_id', $sales_id)->delete();
        Sales::where('sales_id', $sales_id)->delete();

        return redirect()->route('member')->with('message', 'Member successfully deleted');
    }

    public function member()
    {
        $member = User::all();
        return Inertia::render('MemberApp/Member', [
            'members' => $member,
        ]);
    }
}
