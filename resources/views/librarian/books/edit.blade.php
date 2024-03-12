<x-app-layout>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                  <form class="w-2/3 mx-auto" method="POST" action="{{route('librarian.books.update', ['book' => $book->id])}}">
                    @csrf
                    @method('PUT')
                    <div class="text-2xl mb-6 shadow text-center rounded">Edit Book</div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <input type="hidden" value={{$genre_id}} name="genre_id">
                    <input type="hidden" value={{$title}} name="searched_title">
                    <input type="hidden" value={{$authors}} name="searched_authors">
                    <input type="hidden" value={{$borrow_id}} name="borrow_id">
                      <div>
                          <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                          <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title" value="{{$book->title}}" required />
                          <x-input-error :messages="$errors->get('title')" class="mt-2" />
                      </div>
                      <div>
                          <label for="authors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Authors</label>
                          <input type="text" id="authors" name="authors" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="authors" value="{{$book->authors}}" required />
                          <x-input-error :messages="$errors->get('authors')" class="mt-2" />
                      </div>
                      <div>
                          <label for="released_at" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Released Date</label>
                          <input type="date" id="released_at" name="released_at" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$book->released_at}}" required />
                          <x-input-error :messages="$errors->get('released_at')" class="mt-2" />
                      </div>  
                      <div>
                          <label for="pages" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Page</label>
                          <input type="number" id="pages" name="pages" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$book->pages}}" required />
                          <x-input-error :messages="$errors->get('pages')" class="mt-2" />
                      </div>
                      <div>
                        <label for="isbn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ISBN</label>
                        <input type="text" id="isbn" name="isbn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        pattern="^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$" placeholder="ISBN" value="{{$book->isbn}}" required />
                        <p class="text-gray-600 text-xs italic mt-1 ml-3">ISBN must be 13 digits. Hyphens are allowed.</p>
                        <x-input-error :messages="$errors->get('isbn')" class="mt-2" />
                      </div>
                      <div>
                        <label for="in_stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of stock</label>
                        <input type="number" id="in_stock" name="in_stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Number of stock" value="{{$book->in_stock}}" required />
                        <x-input-error :messages="$errors->get('in_stock')" class="mt-2" />
                      </div>
                      <div>
                        <label for="cover_image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">cover image url</label>
                        <input type="text" id="cover_image" name="cover_image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        pattern="^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$" placeholder="https:/*.*:**/***/***/***" value="{{$book->cover_image}}"/>
                        <x-input-error :messages="$errors->get('cover_image')" class="mt-2" />
                      </div>
                      <div>
                        <label for="language_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Languange code</label>
                        <input type="text" id="language_code" name="language_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="default is hu" value="{{$book->language_code}}"/>
                        <x-input-error :messages="$errors->get('language_code')" class="mt-2" />
                      </div>
                    </div>
                    <div>
                      <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                      <textarea type="textarea" id="description" name="description" class="mb-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="description" >{{$book->description}}</textarea>
                      <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <label class="flex block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="genres[]">Genre</label>
                    <x-input-error :messages="$errors->get('genres[]')" class="mt-2" />
                    <div class="flex flex-wrap mb-6 justify-center bg-white p-5 rounded">
                    
                    @foreach($genres as $genre)
                    <div class="flex items-center me-4">
                        <input id="{{$genre->name}}" type="checkbox" value="{{$genre->id}}" name="genres[]" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" 
                          @if(in_array($genre->id, $current_genres))
                            checked
                          @endif
                        />
                        <label for="{{$genre->name}}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$genre->name}}</label>
                    </div>
                    @endforeach
                    </div>

                    <div class="mb-6 flex justify-around">
                      <x-primary-button class="ms-3">
                          Update
                      </x-primary-button>
                    </div>
                  </form>
                  
                <div class="flex justify-center">
                  @if($genre_id || $title || $authors || $borrow_id)
                  <form action="{{route('librarian.books.show', ['book' => $book->id])}}" method="GET">
                    @csrf
                    <input type="hidden" value={{$genre_id}} name="genre_id">
                    <input type="hidden" value={{$title}} name="title">
                    <input type="hidden" value={{$authors}} name="authors">
                    <input type="hidden" value={{$borrow_id}} name="borrow_id">
                    <x-secondary-submit-button class="ms-3">
                      Back
                    </x-secondary-submit-button>
                  </form>
                  @else
                  <a href="{{route('librarian.books.show', ['book' => $book->id])}}">
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
