<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class SpendingController extends Controller
{
    public function index()
    {
        return Inertia::render('AdminApp/Spending', [
            
        ]);
    }
}