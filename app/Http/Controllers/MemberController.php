<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MemberController extends Controller
{
    public function index()
    {
        $packages = Packages::all();
        return Inertia::render('AdminApp/Member', [
            'packages' => $packages
        ]);
    }
}
