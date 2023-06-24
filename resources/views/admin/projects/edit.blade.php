<x-app-layout>
      <x-slot name="header" class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  {{ __('Projects') }}
            </h2>

            <a href="{{ route('admin.projects.index') }}" class="border-2 border-gray-500 py-1 px-3 rounded-full text-sm hover:bg-gray-800 hover:text-white">
                  Back
            </a>
      </x-slot>
      
      <div class="mt-5 max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('partials.errors')
      </div>

      <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="pt-8 pb-20 md:px-2 lg:px-4">
                              @csrf
                              @method('PUT')

                              <div class="px-3 pb-3 lg:px-5 lg:pb-5 text-xs">
                                    I campi con * sono obbligatori
                              </div>

                              <div class="px-3 pb-3 lg:px-5 lg:pb-5">
                                    <label for="name" class="block font-medium leading-6 text-gray-900">Nome progetto *</label>
                                    <input type="text" id="name" name="name" value="{{ old('name', $project->name) }}" class="w-full md:w-1/2 text-sm mt-2 rounded-md shadow-sm border-0 ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md" placeholder="Inserire nome progetto..." required min="6" max="255">
                              </div>

                              <div class="px-3 pb-3 lg:px-5 lg:pb-5">
                                    <label for="description" class="block font-medium leading-6 text-gray-900">Descrizione progetto</label>
                                    <textarea id="description" name="description" rows="10" class="w-full md:w-2/3 text-sm mt-2 rounded-md shadow-sm border-0 ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md" placeholder="Inserire descrizione progetto..." min="20" max="65000">{{ old('description', $project->description) }}</textarea>
                              </div>

                              <div class="px-3 pb-3 lg:px-5 lg:pb-5">
                                    <label for="skills[]" class="block font-medium leading-6 text-gray-900">Skills associate</label>
                                    @foreach ($skills as $skill)
                                          <div class="">
                                                <input class="" type="checkbox" name="skills[]" id="skills-{{ $skill->id }}" 
                                                {{-- Questa parte condizionale controlla se sono presenti valori precedenti per il campo "skills". 
                                                Se sì, controlla se l'ID della tecnologia è presente nell'array di valori precedenti e, in tal caso, 
                                                imposta l'attributo "checked" sul checkbox. --}}
                                                @if (old('skills') && is_array(old('skills')) && count(old('skills')) > 0)
                                                      {{ in_array($skill->id, old('skills')) ? 'checked' : '' }} 
                                                @elseif($project->skills->contains($skill)) 
                                                      checked
                                                @endif
                                                {{-- ---------------------------------------------------------------------------------------------------------- --}}
                                                value="{{ $skill->id }}">
                                                <label class="font-medium" for="skill-{{ $skill->id }}">{{ $skill->name }}</label>
                                          </div>
                                    @endforeach
                              </div>

                              <div class="px-3 pb-3 lg:px-5 lg:pb-5">
                                    @if ($project->video)
                                          <input type="checkbox" name="delete_video" id="delete_video">
                                          <label for="delete_video">Delete video</label>

                                          <div class="mt-4">
                                                <video controls data-plyr>
                                                      <source src="{{ asset('storage/'.$project->video) }}" type="video/mp4">
                                                </video>
                                          </div>
                                    @endif 

                                    <label for="video" class="block font-medium leading-6 text-gray-900 mt-2">Carica video dimostrativo</label>
                                    <input type="file" id="video" name="video" class="text-sm mt-2 rounded-md shadow-sm border-0 ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md" accept="video/*">
                              </div>

                              <div class="px-3 pb-3 lg:px-5 lg:pb-5">
                                    <label for="github" class="block font-medium leading-6 text-gray-900">Link github al progetto</label>
                                    <input type="text" id="github-0" name="github[]" value="{{ old('github[0]', $project->github) }}" class="w-full md:w-1/2 text-sm mt-2 rounded-md shadow-sm border-0 ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md" placeholder="Inserire link progetto..." min="20" max="255">
                                    <input type="text" id="github-1" name="github[]" value="{{ old('github[1]', $project->github) }}" class="block w-full md:w-1/2 text-sm mt-2 rounded-md shadow-sm border-0 ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md" placeholder="Inserire secondo link se previsto..." min="20" max="255">
                              </div>
                              
                              <div class="p-3 lg:p-5">
                                    <button type="submit" class="border-2 border-gray-500 py-1 px-3 rounded-full text-sm hover:bg-gray-800 hover:text-white">
                                          Update project
                                    </button>
                              </div>
                        </form>

                  </div>
            </div>
      </div>
</x-app-layout>
