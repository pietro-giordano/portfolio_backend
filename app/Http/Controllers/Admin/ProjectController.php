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
            return view('admin.projects.show', compact('project'));
      }

      /**
       * Show the form for editing the specified resource.
       */
      public function edit(Project $project)
      {
            return view('admin.projects.edit', compact('project'));
      }

      /**
       * Update the specified resource in storage.
       */
      public function update(UpdateProjectRequest $request, Project $project)
      {
            $data = $request->validated();
            $data['slug'] = Str::slug($data['name']);

            // se esiste il check su delete cancella il video e setta il valore a null 
            if (array_key_exists('delete_video', $data)) {
                  if ($project->video) {
                        Storage::delete($project->video);
                        $project->video = null;
                        $project->save();
                  }
                  // altrimenti se esiste video carica il percorso del nuovo video
            } else if (array_key_exists('video', $data)) {
                  $video_path = Storage::put('projects', $data['video']);
                  $data['video'] = $video_path;
                  // e cancella il vecchio video, inteso il file
                  if ($project->video) {
                        Storage::delete($project->video);
                  }
            }

            if (array_key_exists('github', $data)) {
                  $jsonData = json_encode($data['github']);
                  $data['github'] = $jsonData;
            }

            $project->update($data);

            // se esistono skills associate fa l'update dei valori
            if (array_key_exists('skills', $data)) {
                  $project->skills()->sync($data['skills']);
            } else {
                  // altrimenti fa il detach
                  $project->skills()->detach();
            }

            return redirect()->route('admin.projects.show', $project->id)->with('success', 'Project updated with success');
      }

      /**
       * Remove the specified resource from storage.
       */
      public function destroy(Project $project)
      {
            if ($project->video) {
                  Storage::delete($project->video);
            }

            $project->delete();
            return redirect()->route('admin.projects.index')->with('success', 'Project deleted with success');
      }
}
