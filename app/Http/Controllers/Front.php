<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class Front extends Controller
{
    public function index()
    {
        return Inertia::render('Front/Index');
    }
}
