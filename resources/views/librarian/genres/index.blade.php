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
                <div class="text-2xl mb-6 shadow text-center rounded">Genre list</div>
                <div class="text-surface dark:text-white mx-auto">
                  @foreach ($genres as $genre)
                  <div class="flex flex-col  sm:flex-row items-center justify-center">
                    <div class="flex w-1/2">
                      <a
                        href="{{route('librarian.genres.edit', ['genre' => $genre->id])}}"
                        class="block w-full cursor-pointer rounded-lg p-4 transition duration-500 hover:bg-zinc-50 hover:text-black focus:bg-zinc-50 focus:text-black focus:ring-0 active:bg-zinc-100 active:text-surface dark:hover:bg-neutral-700/60 dark:hover:text-white dark:focus:bg-neutral-700/60 dark:focus:text-white dark:active:bg-surface dark:active:text-white text-center">
                        {{$genre->name}}
                        <br>
                        ({{$genre->style}})
                      </a> 
                    </div>
                    <div class="flex items-center">
                      <a href="{{route('librarian.genres.edit', ['genre' => $genre->id])}}">
                        <x-secondary-button class="ms-3">
                          Edit
                        </x-secondary-button>
                      </a>
                      <form action="{{route('librarian.genres.destroy', ['genre' => $genre->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-danger-button class="ms-3">
                            Archive
                        </x-danger-button>
                      </form>
                    </div>
                  </div>
                  @endforeach
                  {{$genres->links()}}
                </div>
                
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
