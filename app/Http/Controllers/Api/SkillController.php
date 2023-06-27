<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
      /**
       * Display a listing of the resource.
       */
      public function index()
      {
            // recupero le skills recuperando anche le relazioni che hanno coi projects (anche se probabilmente non userò)
            $skills = Skill::with('projects')->get();
            // per ogni skill verifico che ci sia un'immagine e nel caso tramite asset restituisco il percorso completo da poter passare al front-end
            foreach ($skills as $skill) {
                  if ($skill->logo) {
                        $skill['logo'] = asset('storage/' . $skill->logo);
                  }
                  // e per ogni project associato a skill aggiusto percorso video se presente
                  foreach ($skill->projects as $project) {
                        if ($project->video) {
                              $project['video'] = asset('storage/' . $project->video);
                        }
                  }
            }
            // ritorno risposta json contenente le skills
            return response()->json([
                  'success' => true,
                  'code' => 200,
                  'message' => 'Ok',
                  'skills' => $skills
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
      public function show(string $id)
      {
            //
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
