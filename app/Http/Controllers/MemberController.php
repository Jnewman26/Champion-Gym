<?php

namespace App\Http\Controllers;

use App\Models\Membership;
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
        $member = User::all();
        $membership = Membership::all();
        $promotion = Promotion::all();
        $personalTrainer = PersonalTrainer::all();
        return Inertia::render('AdminApp/Member', [
            'membership' => $membership,
            'members' => $member,
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
        $currentDate = now()->format('Y-m-d');
        $memberId = DB::selectOne('SELECT generate_member_id(?, ?) AS member_id', [$firstAlpahbet, $currentDate])->member_id;

        // generate sales id
        $currentDate = now()->format('Y-m-d');
        $salesId = DB::selectOne('SELECT generate_sales_id(?) AS sales_id', [$currentDate])->sales_id;

        // Insert data to member table
        $post = $request->all();
        $post['member_id'] = $memberId;
        $post['member_join_date'] = $currentDate;
        $post['member_password'] = Hash::make($request->input('member_password'));
        User::create($post);

        // Insert data to sales table
        $memberData = $request->all();
        $sales = new Sales();
        $sales->sales_id = $salesId;
        $sales->sales_total = $memberData['sales_total'];
        $sales->payment_type = $memberData['member_payment_type'];
        $sales->sales_status = 'paid';
        $sales->sales_date_created = $currentDate;
        $sales->save();

        // Insert data to slaes detail table
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

    public function member()
    {
        $member = User::all();
        return Inertia::render('MemberApp/Member', [
            'members' => $member,
        ]);
    }
}