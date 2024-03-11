<x-app-layout>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="overflow-hidden shadow-sm sm:rounded-lg">
            @if($borrow->deadline <= now() && $borrow->status == "ACCEPTED")
                <div class="bg-red-300 p-2 text-xl border rounded text-center w-1/2 mx-auto">This rental is late!</div>
                @endif

              <div class="p-6 text-gray-900">
                <div class="text-center text-2xl mb-4 shadow">Book Data</div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-10">
                  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                      <tbody>
                          <tr class="border-b border-gray-200 dark:border-gray-700">
                              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                  Title
                              </th>
                              <td class="px-6 py-4 underline">
                                <form action="{{route('user.books.show', ['book' => $borrow->book->id])}}" method="GET">
                                  @csrf
                                  <input type="hidden" name="borrow_id" value={{$borrow->id}}>
                                  <button type="submit" class="underline">
                                    {{$borrow->book->title}}
                                  </button>
                                </form>
                              </td>
                          </tr>
                          <tr class="border-b border-gray-200 dark:border-gray-700">
                              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                  Authors
                              </th>
                              <td class="px-6 py-4">
                                  {{$borrow->book->authors}}
                              </td>
                          </tr>
                          <tr class="border-b border-gray-200 dark:border-gray-700">
                              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                  Published date
                              </th>
                              <td class="px-6 py-4">
                                  {{$borrow->book->released_at}}
                              </td>
                          </tr>
                      </tbody>
                  </table>
                </div>
                <div class="text-center text-2xl mb-4 shadow">Rental Data</div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-10">
                  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                      <tbody>
                          <tr class="border-b border-gray-200 dark:border-gray-700">
                              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                  Name of borrower
                              </th>
                              <td class="px-6 py-4 underline">
                                {{$borrow->user->name}}
                              </td>
                          </tr>
                          <tr class="border-b border-gray-200 dark:border-gray-700">
                              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                  Date of rental request 
                              </th>
                              <td class="px-6 py-4">
                                  {{$borrow->created_at}}
                              </td>
                          </tr>
                          <tr class="border-b border-gray-200 dark:border-gray-700">
                              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                  Status
                              </th>
                              <td class="px-6 py-4">
                                  {{$borrow->status}}
                              </td>
                          </tr>
                          @if($borrow->status !== "PENDING")
                          <tr class="border-b border-gray-200 dark:border-gray-700">
                              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                  Data of procession
                              </th>
                              <td class="px-6 py-4">
                                  {{$borrow->request_processed_at}}
                              </td>
                          </tr>
                          <tr class="border-b border-gray-200 dark:border-gray-700">
                              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                  Request was managed by
                              </th>
                              <td class="px-6 py-4">
                                  {{$borrow->librarian_request_managed->name}}
                              </td>
                          </tr>
                          @endif
                          @if($borrow->status == "RETURNED")
                          <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                Date of return
                            </th>
                            <td class="px-6 py-4">
                                {{$borrow->returned_at}}
                            </td>
                          </tr>
                          <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                Return was managed by
                            </th>
                            <td class="px-6 py-4">
                                {{$borrow->librarian_return_managed->name}}
                            </td>
                          </tr>
                          @endif
                      </tbody>
                  </table>
                </div>
              </div>

              <div class="flex justify-center mb-6">
                <x-secondary-button onclick="location.href=('{{route('user.borrows.index')}}')" class="ms-3">
                    Back
                </x-secondary-button>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
