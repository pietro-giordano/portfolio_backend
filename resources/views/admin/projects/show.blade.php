<x-app-layout>
      <x-slot name="header" class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  {{ __('Projects') }}
            </h2>

            <a href="{{ route('admin.projects.index') }}" class="border-2 border-gray-500 py-1 px-3 rounded-full text-sm hover:bg-gray-800 hover:text-white">
                  Index
            </a>
      </x-slot>

      <div class="mt-5 max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('partials.success')
      </div>

      <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                        <div class="p-5 pt-12 pb-20 md:px-8 lg:px-10">
                              <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                                    {{ $project->name }}
                              </h2>

                              @if ($project->video)
                                    <div class="mt-4">
                                          <video debug controls data-plyr>
                                                <source src="{{ asset('storage/'.$project->video) }}" type="video/mp4">
                                          </video>
                                    </div>
                              @endif

                              <p class="my-5">
                                    {{ $project->description }}
                              </p>

                              @if ($project->github)
                                    <div>
                                          <div class="font-semibold">Github:</div>
                                          @foreach (json_decode($project->github) as $github)
                                                <a href="{{ $github }}" class="hover:text-[#2563eb]">{{ $github }}</a>
                                          @endforeach
                                    </div>
                              @endif
                        </div>

                  </div>
            </div>
      </div>
</x-app-layout>
