<x-app-layout>
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                
                <div class="flex flex-col items-center">
                  <div class="text-3xl mb-6 underline">{{$book->title}}</div>
                  <div class="flex items-center space-x-20">
                    <img src="{{$book->cover_image}}" class="h-60" alt="">
                    <div class="border border-gray-300 rounded p-4">
                      <div class="grid grid-cols-2 gap-4">
                          <div class="font-bold">Author :</div>
                          <div><span class="underline">{{$book->authors}}</span></div>
                          <div class="font-bold">Date of Publish :</div>
                          <div><span class="underline">{{$book->released_at}}</span></div>
                          <div class="font-bold">Genre :</div>
                          <div>
                              <span>
                                  @foreach($book->genres as $genre)
                                      <span class="underline">{{$genre->name}}</span>
                                      @if (!$loop->last)
                                          <span>, </span>
                                      @endif
                                  @endforeach
                              </span>
                          </div>
                          <div class="font-bold">Pages :</div>
                          <div><span class="underline">{{number_format($book->pages)}} p</span></div>
                          <div class="font-bold">Language :</div>
                          <div><span class="underline">{{$book->language_code}}</span></div>
                          <div class="font-bold">ISBN :</div>
                          <div><span class="underline">{{$book->isbn}}</span></div>
                          <div class="font-bold">Number of Stock :</div>
                          <div><span class="underline">{{$book->in_stock}}</span></div>
                          <div class="font-bold">Number of Available :</div>
                          <div><span class="underline"></span></div>
                      </div>
                  </div>
                  
                  </div>
                  <div class="text-2xl mt-10">-Description-</div>
                  <div class="m-10">
                    <div>{{$book->description}}</div>
                  </div>
                </div>

                @if(!$isOnGoingRental)
                <div class="flex justify-center mb-6">
                  <x-primary-button class="ms-3">
                    Rent this book
                  </x-primary-button>
                </div>
                @else
                <div class="flex justify-center mb-6 text-red-300">
                  <p>Currently, you are rentaling this book</p>
                </div>
                @endif


                <div class="mb-6 flex justify-around">
                  @if($genre_id)
                  <a href="{{route('user.books.filteredByGenreIndex', ['genre' => $genre_id])}}">
                    <x-secondary-button class="ms-3">
                      Back
                    </x-secondary-button>
                  </a>
                  @elseif($title)
                  <form id="title-form" class="flex sm:items-center" method="GET">
                    @csrf
                    <input type="hidden" id="title" name="title" value="{{$title}}">
                    <x-secondary-submit-button class="ms-3">
                      Back
                    </x-secondary-submit-button>
                  </form>
                  @elseif($authors)
                  <form id="authors-form" class="flex sm:items-center" method="GET">
                    @csrf
                    <input type="hidden" id="authors" name="authors" value="{{$authors}}">
                    <x-secondary-submit-button class="ms-3">
                      Back
                    </x-secondary-submit-button>
                  </form>
                  @elseif($borrow_id)
                  <a href="{{route('user.borrows.show', ['borrow' => $borrow_id])}}">
                    <x-secondary-button class="ms-3">
                      Back
                    </x-secondary-button>
                  </a>
                  @else
                  <a href="{{route('user.home')}}">
                    <x-secondary-button class="ms-3">
                      Back
                    </x-secondary-button>
                  </a>
                  @endif
                </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>

<script>
  const title_form = document.querySelector("#title-form");
  const authors_form = document.querySelector("#authors-form");

  if(title_form){
    document.getElementById('title-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const title = document.querySelector('#title').value;
        const titleRoute = '{{ route("user.books.filteredByTitleIndex", ["title" => ":title"]) }}';
        this.action = titleRoute.replace(':title', title); 
        this.submit();
    });
  }
  if(authors_form){
    document.getElementById('authors-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const authors = document.querySelector('#authors').value;
        const authorsRoute = '{{ route("user.books.filteredByAuthorsIndex", ["authors" => ":authors"]) }}';
        this.action = authorsRoute.replace(':authors', authors); 
        this.submit();
    });
  }
  
</script>