<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Packages;
use App\Models\PersonalTrainer;
use App\Models\Promotion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        dd($request);
        $request->validate([
            'member_first_name' => 'required',
            'member_ktp' => 'required|unique:member',
            'member_email' => 'required|unique:member|email',
            'member_phone_number' => 'required|unique:member',
            'member_password' => 'min:8'
        ], [
            'membership_name.required' => 'Membership name field is required.',
            'membership_name.unique' => 'Membership name has already been taken.',
            'membership_price.required' => 'Membership price field is required.',
            'membership_duration.require' => 'Membership duration field is required.',
        ]);

        $firstName = $request->input('member_first_name');
        $firstAlpahbet = strtoupper(substr($firstName, 0, 1));
        $currentDate = now()->format('Y-m-d');
        // member id
        $memberId = DB::selectOne('SELECT generate_member_id(?, ?) AS member_id', [$firstAlpahbet, $currentDate])->member_id;

        $post = $request->all();
        $post['member_id'] = $memberId;
        $post['member_join_date'] = $currentDate;
        $post['member_password'] = Hash::make($request->input('member_password'));
        User::create($post);
    }

    public function member()
    {
        // $packages = Packages::all();
        return Inertia::render('MemberApp/Member', [
            // 'packages' => $packages
        ]);
    }
}
