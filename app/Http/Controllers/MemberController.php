<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MemberController extends Controller
{
    public function admin()
    {
        $packages = Packages::all();
        return Inertia::render('AdminApp/Member', [
            'packages' => $packages
        ]);
    }

    public function member()
    {
        $packages = Packages::all();
        return Inertia::render('MemberApp/Member', [
            'packages' => $packages
        ]);
    }
}
