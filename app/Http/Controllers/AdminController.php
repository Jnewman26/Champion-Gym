<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Admin::all();
        return Inertia::render('AdminApp/Admin', [
            'admins' => $admin,
        ]);
    }

    public function adminStore(Request $request)
    {
        $request->validate([
            'admin_name' => 'required|unique:admin',
            'admin_role' => 'required',
        ], [
            'admin_name.required' => 'Admin name field is required.',
            'admin_name.unique' => 'Admin name has already been taken.',
            'admin_role.required' => 'Admin role field is required.',
        ]);

        $date = Carbon::now();

        // tabel user
        $post = $request->all();
        $post['admin_password'] = Hash::make($request->input('admin_password'));
        $post['admin_date_created'] = $date->format('d-m-Y H:i:s');
        $post['admin_updated'] = null;
        Admin::create($post);

        return Redirect::route('admin')->with('message', 'Admin successfully added');
    }

    public function adminShow($admin_id)
    {
        $admins = Admin::find($admin_id);
        return Inertia::render('AdminApp/AdminEdit', [
            'admins' => $admins
        ]);
    }

    public function adminUpdate(Request $request, string $admin_id)
    {
        $adminId = $request->admin_id;
        $request->validate([
            'admin_name' => 'required|unique:admin,admin_name,' . $adminId . ',admin_id',
            'admin_role' => 'required',
        ], [
            'admin_name.required' => 'admin name field is required.',
            'admin_name.unique' => 'admin name has already been taken.',
            'admin_role.required' => 'admin price field is required.',
        ]);

        $date = Carbon::now();

        Admin::where('admin_id', $admin_id)
            ->update([
                'admin_name' => $request->admin_name,
                'admin_role' => $request->admin_role,
                'admin_updated' => $date->format('d-m-Y H:i:s')
            ]);

        return Redirect::route('admin')->with('message', 'admin successfully updated');
    }

    public function adminDelete(string $admin_id)
    {
        Admin::where('admin_id', $admin_id)->delete();

        return redirect()->route('admin')->with('message', 'Admin successfully deleted');
    }
}
