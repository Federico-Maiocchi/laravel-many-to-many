<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Str;

class ProjectController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Create the form for creating a new resource.
     */
    public function create()
    {

        $types = Type::orderBy('name','ASC')->get();

        $technologies = Technology::orderBy('name','ASC')->get();

        return view('admin.projects.create', compact('types','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($data['title'], '-');

        $new_project = Project::create($data);

        if($request->has('technologies')) {
            $new_project->technologies()->attach($data['technologies']);
        }

        return redirect()->route('admin.projects.show',$new_project);
    }

    /**
     * Show the specified resource.
     */
    public function show(Project $project)
    {
        

        return view('admin.projects.show',compact('project'));
    }

    /**
     * Edit the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::orderBy('name','ASC')->get();

        $technologies = Technology::orderBy('name','ASC')->get();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($data['title'], '-');

        $project->update($data);

        if($request->has('technologies')) {
            $project->technologies()->sync($data['technologies']);
        } else {
            $project->technologies()->detach();
        }

        return redirect()->route('admin.projects.index', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project) 
    {
        $project->delete();

        $project->technologies()->sync([]);

        return redirect()->route('admin.projects.index');
    }

    
}