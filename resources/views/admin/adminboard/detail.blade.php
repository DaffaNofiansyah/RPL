@extends('layouts.adminmain')


@section('container')
<link rel="stylesheet" type="text/css" href="{{ asset('css/general.css') }}">

<div class="card p-4 roundit">
  <h3 class="card-title pb-2 borded-bottom">Request Detail</h3>

    <h5 class="card-title">Requester: {{ $request->user->name }}</h5>
    <p class="card-text">Request: {{ $request->konten }}</p>
    <p class="card-text">{{ $request->detail }}</p>
    <p class="card-text">Deadline: {{ date('M d, Y', strtotime($request->deadline)) }}</p>
    <p class="card-text">Status: {{ $request->status }}</p>
    @if ($request->PICs->count() > 0)
    <p class="mb-0">PICs:</p>
    <div class="mb-5">
        @foreach ($request->PICs as $PIC)
          <p class="mb-0">{{ $PIC->admin->name }}</p>
        @endforeach
    </div>
    @else
    <p>
        No PICs
    </p>
    @endif
    <a href="/admin/req/{{ $request->id }}/edit" class="btn btn-primary borded-bottom mb-2">Edit</a>
    <form action="/admin/req/{{ $request->id }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger borded-bottom">Delete</button>
    </form>
</div>
@endsection