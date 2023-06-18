<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Skill;
// Helpers
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
      /**
       * Display a listing of the resource.
       */
      public function index()
      {
            $projects = Project::all();
            return view('admin.projects.index', compact('projects'));
      }

      /**
       * Show the form for creating a new resource.
       */
      public function create()
      {
            $skills = Skill::all();
            return view('admin.projects.create', compact('skills'));
      }

      /**
       * Store a newly created resource in storage.
       */
      public function store(StoreProjectRequest $request)
      {
            $data = $request->validated();
            $data['slug'] = Str::slug($data['name']);

            if (array_key_exists('video', $data)) {
                  $video_path = Storage::put('projects', $data['video']);
                  $data['video'] = $video_path;
            }

            if (array_key_exists('github', $data)) {
                  $jsonData = json_encode($data['github']);
                  $data['github'] = $jsonData;
            }

            $newProject = Project::create($data);

            if (array_key_exists('skills', $data)) {
                  foreach ($data['skills'] as $skillId) {
                        $newProject->skills()->attach($skillId);
                  }
            }

            return redirect()->route('admin.projects.show', $newProject)->with('success', 'Project created with success');
      }

      /**
       * Display the specified resource.
       */
      public function show(Project $project)
      {
            //
      }

      /**
       * Show the form for editing the specified resource.
       */
      public function edit(Project $project)
      {
            //
      }

      /**
       * Update the specified resource in storage.
       */
      public function update(UpdateProjectRequest $request, Project $project)
      {
            //
      }

      /**
       * Remove the specified resource from storage.
       */
      public function destroy(Project $project)
      {
            //
      }
}
