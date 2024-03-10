<x-app-layout>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                <div class="text-2xl mb-6 shadow text-center rounded">{{$genre->name}}</div>
                  <div class="flex flex-wrap">
                    @foreach ($books as $book)
                        
                    <div class="lg:w-1/2 lg:mx-0 sm:mx-auto">
                      <form action="{{route('user.books.show', ['book' => $book->id])}}" method="GET" class="flex flex-col items-start bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl  hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 min-h-80">
                        @csrf
                        <input type="hidden" value="{{$genre->id}}" name="genre_id">

                        <button class="flex flex-col justify-between p-4 leading-normal mt-6">
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
                        </button>
                      </form>
                    </div>
    
                    @endforeach
                  </div>
                  <div class="mt-6 px-6">
                    {{$books->links()}}
                  </div>
                  <div class="flex justify-center">
                    <a href="{{route('user.home')}}">
                      <x-secondary-button class="ms-3">
                          Back
                      </x-secondary-button>
                    </a>
                  </div>
                </div>
          </div>
          
      </div>
  </div>
</x-app-layout>
