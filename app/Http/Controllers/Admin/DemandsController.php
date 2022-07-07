<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Demands;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class DemandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Admin/Dashboard',[
            'demands' => Demands::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Jobs/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demands  $demands
     * @return \Illuminate\Http\Response
     */
    public function show(Demands $demands)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demands  $demands
     * @return \Illuminate\Http\Response
     */
    public function edit(Demands $demands)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demands  $demands
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demands $demands)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demands  $demands
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demands $demands)
    {
        //
    }

    private function setSlug($job) {
        $titleSlug = Str::slug($job);

        $query = Demands::all();

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
