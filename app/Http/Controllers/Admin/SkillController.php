<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
// Helpers
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
      /**
       * Display a listing of the resource.
       */
      public function index()
      {
            $skills = Skill::all();
            return view('admin.skills.index', compact('skills'));
      }

      /**
       * Show the form for creating a new resource.
       */
      public function create()
      {
            return view('admin.skills.create');
      }

      /**
       * Store a newly created resource in storage.
       */
      public function store(StoreSkillRequest $request)
      {
            $data = $request->validated();
            $data['slug'] = Str::slug($data['name']);

            if (array_key_exists('logo', $data)) {
                  $img_path = Storage::put('skills', $data['logo']);
                  $data['logo'] = $img_path;
            }

            $newSkill = Skill::create($data);
            return redirect()->route('admin.skills.show', $newSkill)->with('success', 'Skill created with success');
      }

      /**
       * Display the specified resource.
       */
      public function show(Skill $skill)
      {
            return view('admin.skills.show', compact('skill'));
      }

      /**
       * Show the form for editing the specified resource.
       */
      public function edit(Skill $skill)
      {
            return view('admin.skills.edit', compact('skill'));
      }

      /**
       * Update the specified resource in storage.
       */
      public function update(UpdateSkillRequest $request, Skill $skill)
      {
            $data = $request->validated();
            $data['slug'] = Str::slug($data['name']);

            if (array_key_exists('delete_logo', $data)) {
                  if ($skill->logo) {
                        Storage::delete($skill->logo);
                        $skill->logo = null;
                        $skill->save();
                  }
            } elseif (array_key_exists('logo', $data)) {
                  $img_path = Storage::put('skills', $data['logo']);
                  $data['logo'] = $img_path;

                  if ($skill->logo) {
                        Storage::delete($skill->logo);
                  }
            }

            $skill->update($data);
            return redirect()->route('admin.skills.show', $skill->id)->with('success', 'Skill updated with success');
      }

      /**
       * Remove the specified resource from storage.
       */
      public function destroy(Skill $skill)
      {
            if ($skill->logo) {
                  Storage::delete($skill->logo);
            }

            $skill->delete();
            return redirect()->route('admin.skills.index')->with('success', 'Skill deleted with success');
      }
}
