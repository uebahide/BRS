@php
    $bgColor = null;

  switch ($type) {
    case 'Pending':
      $bgColor = "bg-white";
      break;
    case 'Accepted':
      $bgColor = "bg-green-100";
      break;
    case 'Late':
      $bgColor = "bg-red-100";
      break;
    case 'Rejected':
      $bgColor = "bg-gray-200";
      break;
    case 'Returned':
      $bgColor = "bg-blue-100";
      break;
  }
@endphp




<div class="border rounded shadow-lg p-4 mb-5 {{$bgColor}}">
    <div class="text-2xl mb-3 text-center">{{$type}}</div>
    @foreach ($borrows as $borrow)
    <a href="{{route('user.borrows.show', ['borrow'=> $borrow->id])}}" class="flex flex-col border shadow-md mb-2 bg-white p-2">
      <p>Title : {{$borrow->book->title}}</p>
      <p>Authros : {{$borrow->book->authors}}</p>
      @if($type !== "Pending")
      <p>Request preccessed at : {{$borrow->request_processed_at}}</p>
      @endif  
      @if($type !== ("Pending") && $type !== "Rejected")
      <p>Deadline : {{$borrow->deadline}}</p>
      @endif
      @if($type == ("Returned"))
      <p>Returned at : {{$borrow->returned_at}}</p>
      @endif
    </a>
    @endforeach
</div>