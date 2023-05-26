<x-app-layout>
      <x-slot name="header" class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  {{ __('Projects') }}
            </h2>

            <a href="{{ route('admin.projects.index') }}" class="border-2 border-gray-800 py-1 px-3 rounded-full text-sm hover:bg-gray-800 hover:text-white">
                  Back
            </a>
      </x-slot>

      <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                              {{ __("You're logged in!") }}
                        </div>
                  </div>
            </div>
      </div>
</x-app-layout>
