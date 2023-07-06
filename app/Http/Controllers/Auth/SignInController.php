<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class SignInController extends Controller
{
    public function admin()
    {
        return Inertia::render('AdminApp/SignIn', []);
    }

    public function adminStore(Request $request)
    {
        $request->validate([
            'admin_name' => 'required',
            'admin_password' => 'required',
        ]);

        if (Auth::attempt([
            'admin_name' => $request['admin_name'],
            'password' => $request['admin_password'],
        ])) {
            $request->session()->regenerate();
            return Redirect::route('dashboard')->with('message', 'Hi! You successfull login on admin panel');
        }

        return back()->withErrors([
            'FAILED' => 'Admin name or password is incorrect.',
        ])->withInput($request->only('FAILED', 'remember'));
    }

    public function destroy()
    {
        Auth::logout();

        return Redirect::route('login');
    }

    public function member()
    {
        return Inertia::render('MemberApp/SignIn', []);
    }
}
