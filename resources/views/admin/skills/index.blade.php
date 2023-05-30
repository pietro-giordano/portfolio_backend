<x-app-layout>
      <x-slot name="header" class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  {{ __('Projects') }}
            </h2>

            <a href="{{ route('admin.projects.create') }}" class="border-2 border-gray-500 py-1 px-3 rounded-full text-sm hover:bg-gray-800 hover:text-white">
                  Add project
            </a>
      </x-slot>

      <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                        <ul role="list" class="divide-y divide-gray-100 pt-8 pb-20 md:px-2 lg:px-4">
                              <li class="flex justify-between items-center gap-x-6 p-5">
                                    <div class="flex gap-x-4">
                                          <div class="min-w-0 flex-auto">
                                                <p class="text-xl font-semibold leading-6 text-gray-900">Boolzapp</p>
                                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Replica fedele whatsapp web</p>
                                          </div>
                                    </div>

                                    {{-- tramite il framework Alpine.js si inizializza una variabile open e tramite eventi si tiene traccia dello stato chiuso/aperto, si evita che si propaghi al genitore e si fa si che cliccando al di fuori del dropdown open=false --}}
                                    <div x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false" class="hidden sm:flex sm:justify-end sm:items-center gap-x-4 relative">
                                          <a href="" class="border border-gray-300 py-1 px-2 rounded-lg font-bold hover:bg-gray-100">
                                                View project
                                          </a>

                                          {{-- trigger del dropdown --}}
                                          <button id="showDropdown" @click="open = ! open">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500 hover:text-gray-900">
                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                                </svg>
                                          </button>
                                          
                                          {{-- dropdown menu, tramite Alpine.js (x-transition) si gestisce l'animazione di compsarsa/scomparsa --}}
                                          <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" @click="open = false" style="display:none" class="absolute right-0 top-full z-10 w-32 rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Update</a>
                                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Delete</a>
                                          </div>
                                    </div>
                              </li>
                       </ul>

                  </div>
            </div>
      </div>
</x-app-layout>
