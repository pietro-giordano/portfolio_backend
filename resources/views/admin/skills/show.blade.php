<x-app-layout>
      <x-slot name="header" class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  {{ __('Skills') }}
            </h2>

            <a href="{{ route('admin.skills.index') }}" class="border-2 border-gray-500 py-1 px-3 rounded-full text-sm hover:bg-gray-800 hover:text-white">
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
                                    {{ $skill->name }}
                              </h2>

                              @if ($skill->logo)
                                    <div class="mt-4 w-24">
                                          <img src="{{ asset('storage/'.$skill->logo) }}" alt="" class="rounded-lg">
                                    </div>
                              @endif

                              <p class="my-5">
                                    {{ $skill->description }}
                              </p>

                              @if ($skill->github)
                                    <div>
                                          <div class="font-semibold">Documentazione:</div>
                                          <a href="{{ $skill->documentation }}" class="hover:text-[#2563eb]">{{ $skill->documentation }}</a>
                                    </div>
                              @endif
                        </div>

                  </div>
            </div>
      </div>
</x-app-layout>
