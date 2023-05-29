<x-app-layout>
      <x-slot name="header" class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  {{ __('Projects') }}
            </h2>

            <a href="{{ route('admin.projects.index') }}" class="border-2 border-gray-500 py-1 px-3 rounded-full text-sm hover:bg-gray-800 hover:text-white">
                  Back
            </a>
      </x-slot>

      <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="pt-8 pb-20 md:px-2 lg:px-4">
                              @csrf

                              <div>
                                    <label for="name">Nome progetto</label>
                                    <input type="text" id="name" name="name" placeholder="Inserire nome progetto...">
                              </div>
                        </form>

                  </div>
            </div>
      </div>
</x-app-layout>
