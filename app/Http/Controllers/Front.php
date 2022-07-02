<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class Front extends Controller
{
    public function index()
    {
        return Inertia::render('Front/Index', [
            'storageUrl' => asset('storage/')
        ]);
    }

    public function login()
    {
        return Inertia::render('Front/Login', [
            'storageUrl' => asset('storage/')
        ]);
    }

    public function register()
    {
        return Inertia::render('Front/Register', [
            'storageUrl' => asset('storage/')
        ]);
    }
}
