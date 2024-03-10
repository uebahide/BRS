<x-app-layout>
    {{-- 
        Number of users in the system (o)
        Number of genres (o)
        Number of books (o)
        Number of active book rentals (in accepted status)
        List of genres. Each list item must be a link, referring to the List by genre page.
        Search for books. See Search. 
    --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <p>Books: <span>{{count($books)}}</span></p>
                    </div>
                    <div>
                        <p>Genres: <span>{{count($genres)}}</span></p>
                    </div>
                    <div>
                        <p>Current registered users : <span>{{count($users)}}</span></p>
                    </div>

                    <div>
                        <p class="">Genres</p>
                        <div class="space-x-2">
                            @foreach ($genres as $genre)
                                <a href="{{route('librarian.books.filteredByGenreIndex', ['genre' => $genre->id])}}" class="underline">
                                    {{$genre->name}}
                                </a>                            
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-5">
                        <div>Search books</div>
                        <div class="bg-gray-300 p-5 rounded">
                            <div class="">
                                <div>Title</div>
                                <form class="flex sm:items-center" method="POST" action="{{route('librarian.books.filteredByTitleIndex')}}">
                                    @csrf
                                    <input id="title" name="title" class="inline w-full rounded-md border border-gray-300 bg-white py-2 pl-3 pr-3 leading-5 placeholder-gray-500 focus:border-green-300 focus:placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm" placeholder="Search for title" type="search" autofocus="false" value="{{old('title')}}">
                                    <x-primary-button class="ms-3">
                                        Search
                                    </x-primary-button>
                                </form>
                            </div>
                            <div class="mt-5">
                                <div>Authors</div>
                                <form class="flex sm:items-center" method="POST" action="{{route('librarian.books.filteredByAuthorsIndex')}}">
                                    @csrf
                                    <input id="authors" name="authors" class="inline w-full rounded-md border border-gray-300 bg-white py-2 pl-3 pr-3 leading-5 placeholder-gray-500 focus:border-green-300 focus:placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm" placeholder="Search for authors" type="search" autofocus="" value="{{old('authors')}}">
                                    <x-primary-button class="ms-3">
                                        Search
                                    </x-primary-button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
            </div>
            
        </div>
    </div>
</x-app-layout>
