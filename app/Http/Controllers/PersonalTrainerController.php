<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PersonalTrainerController extends Controller
{
    public function admin()
    {
        return Inertia::render('AdminApp/PersonalTrainer', [
            
        ]);
    }
}
