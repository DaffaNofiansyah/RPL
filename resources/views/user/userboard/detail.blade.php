@extends('layouts.usermain')


@section('container')
<link rel="stylesheet" type="text/css" href="{{ asset('css/general.css') }}">

<h1 class="mb-2 text-center">Request Detail</h1>
<hr class="mb-4 w-50">

<div class="card p-4 roundit">
    <h5 class="card-title">Requester: {{ $request->user->name }}</h5>
    <p class="card-text">Request: {{ $request->konten }}</p>
    <p class="card-text mb-0">Deskripsi:</p>
    <p class="card-text">{{ $request->detail }}</p>
    <p class="card-text">Deadline: {{ date('M d, Y', strtotime($request->deadline)) }}</p>
    <p class="card-text">Status: {{ $request->status }}</p>
    @if ($request->PICs->count() > 0)
    <p class="mb-0">PICs:</p>
    <div class="mb-4">
        @foreach ($request->PICs as $PIC)
          <p class="mb-0">{{ $PIC->admin->name }}</p>
        @endforeach
    </div>
    @else
    <p>
        No PICs
    </p>
    @endif
    <p class="card-text mb-0">Notes:</p>
    @if ($request->notes)
    <p class="card-text">{{ $request->notes }}</p>
    @endif
    <br>
    
      <a href="/user/req/{{ $request->id }}/edit" class="btn btn-primary borded-bottom mb-2">Edit Request</a>
    <form action="/user/req/{{ $request->id }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger borded-bottom">Delete Request</button>
    </form>
</div>
@endsection