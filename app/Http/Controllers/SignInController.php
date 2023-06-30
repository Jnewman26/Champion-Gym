<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class SignInController extends Controller
{
    public function admin()
    {
        return Inertia::render('AdminApp/SignIn', [

        ]);
    }
}
