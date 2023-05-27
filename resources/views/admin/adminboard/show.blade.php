@extends('layouts.adminmain')


@section('container')

<div class="row">
  <div class="card col-md-4 p-4 bg-dark">
    <h5 class="text-white">
      Pending
    </h5>
    <hr class="bg-white">
    @foreach ($pending_requests as $pending)
    <div class="card bg-light">
      <h5>
        {{ $pending->konten }}
      </h5>
      <p>
        {{ $pending->created_at }}
      </p>
      <a href="/adminboard/{{ $pending->id }}/edit" class="btn btn-primary">Edit</a>
      <form action="/adminboard/{{ $pending->id }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger">Delete</button>
      </form>
    </div>
    <br>
    @endforeach
  </div>

  <div class="card col-md-4 p-4 bg-dark">
    <h5 class="text-white">
      On Progress
    </h5>
    <hr class="bg-white">
    @foreach ($onprogress_requests as $onprogress)
    <div class="card bg-light">
      <h5>
        {{ $onprogress->konten }}
      </h5>
      <p>
        {{ $onprogress->created_at }}
      </p>
      <a href="/adminboard/{{ $onprogress->id }}/edit" class="btn btn-primary">Edit</a>
      <form action="/adminboard/{{ $onprogress->id }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger">Delete</button>
      </form>
    </div>
    <br>
    @endforeach
  </div>
  
  <div class="card col-md-4 p-4 bg-dark">
    <h5 class="text-white">
      Done
    </h5>
    <hr class="bg-white">
    @foreach ($done_requests as $done)
    <div class="card bg-light">
      <h5>
        {{ $done->konten }}
      </h5>
      <p>
        {{ $done->created_at }}
      </p>
      <a href="/adminboard/{{ $done->id }}/edit" class="btn btn-primary">Edit</a>
      <form action="/adminboard/{{ $done->id }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger">Delete</button>
      </form>
    </div>
    <br>
    @endforeach
  </div>

</div>




</div>
@endsection