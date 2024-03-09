<x-app-layout>
  {{-- <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot> --}}

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 w-2/3 mx-auto">
                <div class="text-2xl mb-6 shadow text-center rounded">Archived Genre list</div>
                <div class="w-96 text-surface dark:text-white mx-auto">
                  @foreach ($genres as $genre)
                  <div class="flex items-center">
                    <div
                      class="block w-full cursor-pointer rounded-lg p-4 transition duration-500 hover:bg-zinc-50 hover:text-black focus:bg-zinc-50 focus:text-black focus:ring-0 active:bg-zinc-100 active:text-surface dark:hover:bg-neutral-700/60 dark:hover:text-white dark:focus:bg-neutral-700/60 dark:focus:text-white dark:active:bg-surface dark:active:text-white text-center">
                      {{$genre->name}}
                      <br>
                      ({{$genre->style}})
                  </div> 
                    <form action="{{route('librarian.expired-genres.restore', ['genre' => $genre->id])}}" method="POST">
                      @csrf
                      <x-primary-button class="ms-3">
                        Activate
                      </x-primary-button>
                    </form>
                    <form action="{{route('librarian.expired-genres.destroy', ['genre' => $genre->id])}}" method="POST">
                      @csrf
                      <x-danger-button class="ms-3">
                          Delete
                      </x-danger-button>
                    </form>
                  </div>
                  @endforeach
                  {{$genres->links()}}
                </div>
                
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
