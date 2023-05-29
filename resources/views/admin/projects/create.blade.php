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

                              <div class="p-3 lg:p-5">
                                    <label for="name" class="block font-medium leading-6 text-gray-900">Nome progetto</label>
                                    <input type="text" id="name" name="name" class="w-full md:w-1/2 text-sm mt-2 rounded-md shadow-sm border-0 ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md" placeholder="Inserire nome progetto..." required min="6" max="255">
                              </div>

                              <div class="p-3 lg:p-5">
                                    <label for="description" class="block font-medium leading-6 text-gray-900">Descrizione progetto</label>
                                    <textarea id="description" name="description" rows="10" class="w-full md:w-2/3 text-sm mt-2 rounded-md shadow-sm border-0 ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md" placeholder="Inserire descrizione progetto..." required min="6" max="255"></textarea>
                              </div>

                              <div class="p-3 lg:p-5">
                                    <label for="video" class="block font-medium leading-6 text-gray-900">Descrizione progetto</label>
                                    <input type="file" id="video" name="video" class="text-sm mt-2 rounded-md shadow-sm border-0 ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md" placeholder="Inserire descrizione progetto..." required min="6" max="255">
                              </div>
                        </form>

                  </div>
            </div>
      </div>
</x-app-layout>
