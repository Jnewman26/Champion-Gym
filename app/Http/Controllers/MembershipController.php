<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class MembershipController extends Controller
{
    public function admin()
    {
        $membership = Membership::all();
        return Inertia::render('AdminApp/Membership', [
            'memberships' => $membership,
        ]);
    }

    public function membershipStore(Request $request)
    {
        $request->validate([
            'membership_name' => 'required|unique:membership',
            'membership_price' => 'required',
            'membership_duration' => 'required',
        ], [
            'membership_name.required' => 'Membership name field is required.',
            'membership_name.unique' => 'Membership name has already been taken.',
            'membership_price.require' => 'Membership price field is required.',
            'membership_duration.require' => 'Membership duration field is required.',
        ]);

        $date = Carbon::now();

        // tabel user
        $post = $request->all();
        $post['membership_date_created'] = $date->format('d-m-Y H:i:s');
        $post['membership_updated'] = null;
        Membership::create($post);

        return Redirect::route('membership-admin')->with('message', 'Memberhsip successfully added');
    }

    public function membershipShow($membership_id)
    {
        $memberships = Membership::find($membership_id);
        return Inertia::render('AdminApp/MembershipEdit', [
            'memberships' => $memberships
        ]);
    }

    public function membershipUpdate(Request $request, string $membership_id)
    {
        $membershipId = $request->membership_id;
        $request->validate([
            'membership_name' => 'required|unique:membership,membership_name,' . $membershipId . ',membership_id',
            'membership_price' => 'required',
            'membership_duration' => 'required',
        ], [
            'membership_name.required' => 'Membership name field is required.',
            'membership_name.unique' => 'Membership name has already been taken.',
            'membership_price.required' => 'Membership price field is required.',
            'membership_duration.required' => 'Membership duration field is required.',
        ]);

        $date = Carbon::now();

        Membership::where('membership_id', $membership_id)
            ->update([
                'membership_name' => $request->membership_name,
                'membership_price' => $request->membership_price,
                'membership_duration' => $request->membership_duration,
                'membership_updated' => $date->format('d-m-Y H:i:s')
            ]);

        return Redirect::route('membership-admin')->with('message', 'Memberhsip successfully updated');
    }

    public function membershipDelete(string $membership_id)
    {
        Membership::where('membership_id', $membership_id)->delete();

        return redirect()->route('membership-admin')->with('message', 'Membership successfully deleted');
    }

    public function member()
    {
        return Inertia::render('MemberApp/Membership', []);
    }
}
