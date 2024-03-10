<x-app-layout>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 w-2/3 mx-auto">
                <div class="text-2xl mb-6 shadow text-center rounded">Archived Book list</div>
                <div class="text-surface dark:text-white mx-auto">
                  @foreach ($books as $book)
                  <div class="flex flex-col lg:flex-row mb-4">
                    <div class="flex flex-col items-start bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl  hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 min-h-80">
                      @csrf
  
                      <div class="flex flex-col justify-between p-4 leading-normal mt-6">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white underline">{{$book->title}}</h5>
                        <p>Authors: {{$book->authors}}</p>
                        <p>Date: {{$book->released_at}}</p>
                        <div class="my-6">
                          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            @if (strlen($book->description) > 200)
                                {{ substr($book->description, 0, 200) }}...
                            @else
                                {{ $book->description }}
                            @endif
                        </p>
                        </div>
                      </div>
                    </div>
                    <div class="flex items-center justify-center my-2">
                      <form action="{{route('librarian.expired-books.restore', ['book' => $book->id])}}" method="POST">
                        @csrf
                        <x-primary-button class="ms-3">
                          Activate
                        </x-primary-button>
                      </form>
                      <form action="{{route('librarian.expired-books.destroy', ['book' => $book->id])}}" method="POST">
                        @csrf
                        <x-danger-button class="ms-3">
                            Delete
                        </x-danger-button>
                      </form>
                    </div>
                  </div>
                  @endforeach
                  {{$books->links()}}
                </div>
                
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
