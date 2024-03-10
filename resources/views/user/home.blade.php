<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <div class="text-center text-2xl mb-4 shadow">Information</div>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-10">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <tbody>
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                            Number of users
                                        </th>
                                        <td class="px-6 py-4">
                                            {{count($users)}}
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                            Number of books
                                        </th>
                                        <td class="px-6 py-4">
                                            {{count($books)}}
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                            Number of genres
                                        </th>
                                        <td class="px-6 py-4">
                                            {{count($genres)}}
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                            Number of active book rentals
                                        </th>
                                        <td class="px-6 py-4">
                                            
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="text-center text-2xl mb-4 shadow">Seach by genre</div>
                        <div class="flex flex-wrap mx-auto justify-center space-x-5 mb-10 shadow-md p-5 rounded">
                            @foreach ($genres as $genre)
                            <button 
                                onclick="location.href='{{route('user.books.filteredByGenreIndex', ['genre' => $genre->id])}}'"
                                class="border rounded-2xl px-2 py-1 shadow-md hover:shadow bg-gray-200"
                            >{{$genre->name}}</button>
                            @endforeach
                        </div>
                    </div>

                    <div class="">
                        <div class="text-center text-2xl shadow mb-4">Search books</div>
                        <div class="bg-gray-300 p-5 rounded shadow-md">
                            <div class="">
                                <div>Title</div>
                                <form id="title-form" class="flex sm:items-center" method="GET" >
                                    @csrf
                                    <input id="title" name="title" class="inline w-full rounded-md border border-gray-300 bg-white py-2 pl-3 pr-3 leading-5 placeholder-gray-500 focus:border-green-300 focus:placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm" placeholder="Search for title" type="search" autofocus="false" value="{{old('title')}}">
                                    <x-primary-button class="ms-3">
                                        Search
                                    </x-primary-button>
                                </form>
                            </div>
                            <div class="mt-5">
                                <div>Authors</div>
                                <form id="authors-form" class="flex sm:items-center" method="GET">
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
    </div>
</x-app-layout>

<script>
    document.getElementById('title-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const title = document.querySelector('#title').value;
        const titleRoute = '{{ route("user.books.filteredByTitleIndex", ["title" => ":title"]) }}';
        this.action = titleRoute.replace(':title', title); 
        this.submit();
    });
    
    document.getElementById('authors-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const authors = document.querySelector('#authors').value;
        const authorsRoute = '{{ route("user.books.filteredByAuthorsIndex", ["authors" => ":authors"]) }}';
        this.action = authorsRoute.replace(':authors', authors); 
        this.submit();
    });
</script>