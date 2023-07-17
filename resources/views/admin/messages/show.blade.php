<x-app-layout>
      <x-slot name="header" class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  {{ __('Messages') }}
            </h2>

            <a href="{{ route('admin.messages.index') }}" class="border-2 border-gray-500 py-1 px-3 rounded-full text-sm hover:bg-gray-800 hover:text-white">
                  Index
            </a>
      </x-slot>

      <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                        <div class="p-5 pt-12 pb-20 md:px-8 lg:px-10">
                              <h2 class="text-2xl text-gray-800 leading-tight">
                                    From: <span class="font-semibold">{{ $message->name }}</span>
                              </h2>

                              <p class="my-5">
                                    At {{ $message->created_at }}
                              </p>

                              <div class="my-5">
                                    <p>
                                          Email: {{ $message->email }}
                                    </p>

                                    @if ($message->email_object)
                                    <p>
                                          Object: {{ $message->email_object }}
                                    </p>
                                    @endif

                                    @if ($message->mobile)
                                    <p>
                                          Phone: {{ $message->mobile }}
                                    </p>
                                    @endif
                              </div>

                              <p class="my-5">
                                    {{ $message->message }}
                              </p>
                        </div>

                  </div>
            </div>
      </div>
</x-app-layout>
