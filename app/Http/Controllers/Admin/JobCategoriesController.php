<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Inertia\Inertia;

class JobCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Admin/Categories/Index', [
            'categories' => JobCategories::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Categories/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
        ];
        $message = [
            'name.required' => 'Adicione um nome a categoria.',
            'name.mim' => 'Você precisa adicionar ao menos três caracteres.'
        ];

        Validator::validate($request->all(), $rules, $message);

        $category = new JobCategories();
        $slug = $this->setSlug($request->name);

        $category->name = $request->name;
        $category->slug = $slug;
        $category->save();

        return Redirect::route('admin.categories.index')->with(['toast' => ['message' => $request->name." foi adicionado!"]]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobCategories  $jobCategories
     * @return \Illuminate\Http\Response
     */
    public function show(JobCategories  $jobCategories)
    {

    }

    public function edit($slug)
    {
        return Inertia::render('Admin/Categories/Edit', [
            'category' => JobCategories::where('slug', $slug)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobCategories  $jobCategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobCategories $jobCategories)
    {
        dd($request->all(), $jobCategories);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobCategories  $jobCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobCategories $jobCategories)
    {

    }

    private function setSlug($name) {
        $titleSlug = Str::slug($name);

        $query = JobCategories::all();

        $t = 0;
        foreach ($query as $name) {
            if (Str::slug($name->name) === $titleSlug) {
                $t++;
            }
        }
        if ($t > 0) {
            $titleSlug = $titleSlug . '-' . $t;
        }
        return $titleSlug;
    }
}
