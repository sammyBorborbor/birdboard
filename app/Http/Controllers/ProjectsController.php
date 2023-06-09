<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function store()
    {
        // validate
        $attributes = \request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

//        $attributes['owner_id'] = auth()->id();

        // persist
//        Project::create($attributes);
        auth()->user()->projects()->create($attributes);

        // redirect
        return redirect('/projects');
    }


}
