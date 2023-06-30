<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PackagesController extends Controller
{
    public function index()
    {
        return Inertia::render('AdminApp/Packages', [
            
        ]);
    }
}
