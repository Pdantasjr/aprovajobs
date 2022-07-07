<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Demands;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class JobsController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Dashboard',[
            'demands' => Demands::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Jobs/Create');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    private function setSlug($job) {
        $titleSlug = Str::slug($job);

        $query = Jobs::all();

        $t = 0;
        foreach ($query as $job) {
            if (Str::slug($job->title) === $titleSlug) {
                $t++;
            }
        }
        if ($t > 0) {
            $titleSlug = $titleSlug . '-' . $t;
        }
        return $titleSlug;
    }
}
