@php
    $bgColor = null;
    $route_show = null;

    switch ($type) {
      case 'Pending':
        $bgColor = "bg-white";
        break;
      case 'Accepted':
        $bgColor = "bg-green-100";
        break;
      case 'Late':
        $bgColor = "bg-red-300";
      break;
    case 'Rejected':
      $bgColor = "bg-gray-200";
      break;
    case 'Returned':
      $bgColor = "bg-blue-100";
      break;
  }

  
@endphp

@auth('users')
  @php
    $route_show = 'user.borrows.show';
  @endphp
@elseif('librarian')
  @php
    $route_show = 'librarian.borrows.show';
  @endphp
@endauth



<div x-data="{ open: false }">
  <div class="border rounded shadow-lg p-4 mb-5 {{$bgColor}}">
    <button @click="open = !open" class="flex justify-between w-full items-center px-4 py-2 focus:outline-none">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" :class="{ 'transform rotate-180': open, 'transform rotate-0': !open }">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
      </svg>
      <div class="text-2xl mb-3 text-center">{{($type != "Late") ? $type : "Accepted (The return is late)"}}</div>
    </button>
    <div class="space-y-2"  x-show="open" >
        @foreach ($borrows as $borrow)
        <a href="{{route($route_show, ['borrow'=> $borrow->id])}}" class="flex flex-col border shadow-md mb-2 bg-white p-2">
            <span>Title: {{$borrow->book->title}}</span>
            <div class="p-4">
                <p>Authors: {{$borrow->book->authors}}</p>
                @if($type == "Pending")
                <p>Request created at : {{$borrow->created_at}}</p>
                @elseif($type !== "Pending")
                <p>Request processed at : {{$borrow->request_processed_at}}</p>
                @endif  
                @if($type !== "Pending" && $type !== "Rejected")
                <p>Deadline : {{$borrow->deadline}}</p>
                @endif
                @if($type == "Returned")
                <p>Returned at : {{$borrow->returned_at}}</p>
                @endif
            </div>
          </a>
        @endforeach
    </div>
  
    {{-- <div @click>
      {{$borrows->links('pagination::tailwind', ['paginator' => $borrows])}}
    </div> --}}
  </div>
</div>

