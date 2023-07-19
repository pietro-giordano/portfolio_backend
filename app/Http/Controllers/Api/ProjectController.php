<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Exception;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
      /**
       * Display a listing of the resource.
       */
      public function index()
      {
            // recupero i projects recuperando anche le relazioni che hanno con le skills (anche se probabilmente non userò)
            $projects = Project::with('skills')->get();
            // per ogni project verifico che ci sia un video e nel caso tramite asset restituisco il percorso completo da poter passare al front-end
            foreach ($projects as $project) {
                  if ($project->video) {
                        $project['video'] = asset('storage/' . $project->video);
                  }
                  // e per ogni skill nel project aggiusto percorso immagine se presente
                  foreach ($project->skills as $skill) {
                        if ($skill->logo) {
                              $skill['logo'] = asset('storage/' . $skill->logo);
                        }
                  }
                  // decodifica github che è in formato json per poterlo utilizzare nel template come array
                  if ($project->github) {
                        $project['github'] = json_decode($project->github);
                  }
            }
            // ritorno risposta json contenente le skills
            return response()->json([
                  'success' => true,
                  'code' => 200,
                  'message' => 'Ok',
                  'projects' => $projects
            ]);
      }

      /**
       * Show the form for creating a new resource.
       */
      public function create()
      {
            //
      }

      /**
       * Store a newly created resource in storage.
       */
      public function store(Request $request)
      {
            //
      }

      /**
       * Display the specified resource.
       */
      public function show($slug)
      {
            try {
                  $project = Project::where('slug', $slug)->with('skills')->firstOrFail();
                  if ($project->video) {
                        $project->video = asset('storage/' . $project->video);
                  }
                  foreach ($project->skills as $skill) {
                        if ($skill->logo) {
                              $skill['logo'] = asset('storage/' . $skill->logo);
                        }
                  }
                  return response()->json([
                        'success' => true,
                        'code' => 200,
                        'message' => 'Ok',
                        'project' => $project
                  ]);
            } catch (Exception $e) {
                  return response()->json([
                        'success' => false,
                        'code' => $e->getCode(),
                        'message' => $e->getMessage()
                  ]);
            }
      }

      /**
       * Show the form for editing the specified resource.
       */
      public function edit(string $id)
      {
            //
      }

      /**
       * Update the specified resource in storage.
       */
      public function update(Request $request, string $id)
      {
            //
      }

      /**
       * Remove the specified resource from storage.
       */
      public function destroy(string $id)
      {
            //
      }
}
