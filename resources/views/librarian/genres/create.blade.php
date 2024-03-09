<x-app-layout>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                <form class="w-2/3 mx-auto" method="POST" action="{{route('librarian.genres.store')}}">
                  @csrf
                  <div class="text-2xl mb-6 shadow text-center rounded">Add New Genre</div>
                  <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">name</label>
                    <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name" value="{{old('name')}}" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                  </div>

                  {{-- primary, secondary, success, danger, warning, info, light, dark --}}
                  <label class="flex block mb-2 mt-6 text-sm font-medium text-gray-900 dark:text-white" for="style">Genre</label>
                  <select id="style" name="style" class="block w-full px-4 py-2 mt-1 mb-6 bg-white border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500">
                    <option value="primary">primary</option>
                    <option value="secondary">secondary</option>
                    <option value="success">success</option>
                    <option value="danger">danger</option>
                    <option value="warning">warning</option>
                    <option value="info">info</option>
                    <option value="light">light</option>
                    <option value="dark">dark</option>
                  </select>
                  <x-input-error :messages="$errors->get('style')" class="" />

                  <div class="mb-6 flex justify-around">
                    <a href="{{route('librarian.genres.index')}}">
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
