<x-app-layout>
  {{-- <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot> --}}

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                <form class="w-2/3 mx-auto">
                  <div class="grid gap-6 mb-6 md:grid-cols-2">
                      <div>
                          <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                          <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title" value="{{old('title')}}" required />
                      </div>
                      <div>
                          <label for="authors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Authors</label>
                          <input type="text" id="authors" name="authors" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="authors" vlaue="{{old('authors')}}" required />
                      </div>
                      <div>
                          <label for="released_at" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Released Date</label>
                          <input type="date" id="released_at" name="released_at" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" vlaue="{{old('released_at')}}" required />
                      </div>  
                      <div>
                          <label for="pages" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Page</label>
                          <input type="number" id="pages" name="pages" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" vlaue="{{old('pages')}}" required />
                      </div>
                      <div>
                        <label for="isbn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ISBN</label>
                        <input type="text" id="isbn" name="isbn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        pattern="^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$" placeholder="ISBN" value="{{old('isbn')}}" required />
                        <p class="text-gray-600 text-xs italic mt-1 ml-3">ISBN must be 10 or 13 digits. Hyphens are allowed.</p>
                      </div>
                      <div>
                        <label for="in_stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of stock</label>
                        <input type="number" id="in_stock" name="in_stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Number of stock" value="{{old('in_stock')}}" required />
                      </div>
                  </div>
                  <div>
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea type="textarea" id="description" name="description" class="mb-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="description" >{{old('description')}}</textarea>
                  </div>

                  <label class="flex justify-center block mb-2 text-sm font-medium text-gray-900 dark:text-white m-3" for="genres">Genre</label>
                  <div class="flex flex-wrap mb-6 justify-center bg-white p-5 rounded">
                    <div class="flex items-center me-4">
                        <input id="primary" type="checkbox" value="" name="genres" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="primary" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">primary</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="secondary" type="checkbox" value="" name="genres" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="secondary" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">secondary</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="success" type="checkbox" value="" name="genres" class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="success" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">success</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="danger" type="checkbox" value="" name="genres" class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="danger" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">danger</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="warning" type="checkbox" value="" name="genres" class="w-4 h-4 text-yellow-400 bg-gray-100 border-gray-300 focus:ring-yellow-500 dark:focus:ring-yellow-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="warning" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">warning</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="info" type="checkbox" value="" name="genres" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="info" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">info</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="light" type="checkbox" value="" name="genres" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="light" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">light</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="dark" type="checkbox" value="" name="genres" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="dark" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">dark</label>
                    </div>
                  </div>

                  <div class="mb-6 flex justify-around">
                    <a href="{{route('librarian.home')}}">
                      <x-secondary-button class="ms-3">
                          Back
                      </x-secondary-button>
                    </a>
                    <x-primary-button class="ms-3">
                        Submit
                    </x-primary-button>
                  </div>
                </form>
                
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
