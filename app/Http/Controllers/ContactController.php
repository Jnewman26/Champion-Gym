<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function admin()
    {
        return Inertia::render('AdminApp/Contact', [
            
        ]);
    }
}
