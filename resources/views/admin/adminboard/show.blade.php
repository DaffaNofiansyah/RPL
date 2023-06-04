@extends('layouts.adminmain')


@section('container')
<link rel="stylesheet" type="text/css" href="{{ asset('css/adminboard.css') }}">
{{-- make an array of statuses --}}
<?php
  $statuses = array('Pending', 'On Progress', 'Done');
?>

<div class="board">
  <div class="column">
    <h2 class="column-header">To Do</h2>
    @foreach ($pending_requests as $pending)
    <div id="todo" class="column-content">
      <a href="/admin/req/{{ $pending->id }}/detail" class="text-decoration-none hovered">
        <h5 class="text-dark">
          {{ $pending->konten }}
        </h5>
      </a>
      @if ($pending->PICs->count() > 0)
        <div class="d-inline float-right">
          @foreach ($pending->PICs as $PIC)
              <img src="{{ asset($PIC->admin->photo) }}" alt="" class="rounded-circle" width="30">
          @endforeach
        </div>
      @else
        <p>
          No PICs
        </p>
      @endif
    </div>
    @endforeach
  </div>

  <div class="column">
    <h2 class="column-header">In Progress</h2>
    @foreach ($onprogress_requests as $onprogress)
    <div id="todo" class="column-content">
      <a href="/admin/req/{{ $onprogress->id }}/detail" class="text-decoration-none hovered">
        <h5 class="text-dark">
          {{ $onprogress->konten }}
        </h5>
      </a>
      @if ($onprogress->PICs->count() > 0)
        <div class="d-inline float-right">
          @foreach ($onprogress->PICs as $PIC)
              <img src="{{ asset($PIC->admin->photo) }}" alt="" class="rounded-circle" width="30">
          @endforeach
        </div>
      @else
        <p>
          No PICs
        </p>
      @endif
    </div>
    @endforeach
  </div>

  <div class="column">
    <h2 class="column-header">Done</h2>
    @foreach ($done_requests as $done)
    <div id="done" class="column-content">
        <h5>
          {{ $done->konten }}
        </h5>
        <p>
          {{ date('M d, Y', strtotime($done->deadline)) }}
        </p>
        <a href="/adminboard/{{ $done->id }}/edit" class="btn btn-primary">Edit</a>
        <form action="/adminboard/{{ $done->id }}" method="post" class="d-inline">
          @method('delete')
          @csrf
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      <br>
    </div>
    @endforeach
  </div>
</div>
@endsection