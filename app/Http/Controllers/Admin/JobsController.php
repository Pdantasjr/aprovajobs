<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Inertia\Inertia;

class JobsController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Dashboard',[
            'jobs' => Jobs::with('jobCategory')->orderBy('created_at', 'DESC')->get(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Jobs/Create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|min:3',
            'description' => 'required|min:5',
            'category' => 'required',
            'deadline' => 'required',
        ];
        $message = [
            'title.required' => 'Adicione um nome ao job!',
            'title.mim' => 'Você precisa adicionar ao menos três caracteres.',
            'description.required' => 'Adicione uma descrição ao job!',
            'description.mim' => 'Você precisa adicionar ao menos cinco caracteres.',
            'category.required' => 'Escolha uma categoria.',
            'deadline.required' => 'Escolha uma uma data de entrega.',
        ];

        Validator::validate($request->all(), $rules, $message);

        $job = new Jobs();
        $slug = $this->setSlug($request->title);

        $job->title = $request->title;
        $job->slug = $slug;
        $job->description = $request->description;
        $job->status = 1;
        $job->job_author = $request->author;
        $job->job_category = $request->category;
        $job->deadline = $request->deadline;
        $job->save();

        return Redirect::route('admin.jobs.dashboard')->with(['toast' => ['message' => $request->title." foi adicionado!"]]);
    }

    public function show($slug) {
        return Inertia::render('Admin/Jobs/Show', [
            'job' => Jobs::where('slug', $slug)->with('jobCategory')->first(),
        ]);
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
