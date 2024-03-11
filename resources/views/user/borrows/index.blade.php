<x-app-layout>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                <x-borrows-list-item :borrows=$borrows_pending type="Pending"/>
                <x-borrows-list-item :borrows=$borrows_accepted type="Accepted"/>
                <x-borrows-list-item :borrows=$borrows_returned type="Returned"/>         
                <x-borrows-list-item :borrows=$borrows_late type="Late"/>
                <x-borrows-list-item :borrows=$borrows_rejected type="Rejected"/>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
