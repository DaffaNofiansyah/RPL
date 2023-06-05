@extends('layouts.usermain')


@section('container')
<link rel="stylesheet" type="text/css" href="{{ asset('css/adminboard.css') }}">
{{-- make an array of statuses --}}
<?php
  $statuses = array('Pending', 'On Progress', 'Done');
?>

<div class="d-flex justify-content-between align-items-center">
  <h1 class="mb-0">   
      Board list
  </h1>
  <a href="/user/req/create" class="btn btn-primary mb-0">Create new request</a>
</div>
<hr>

<div class="board">
  <div class="column" style="background-color: #485461;
  background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);">
    <h2 class="column-header text-white">To Do</h2>
    @foreach ($pending_requests as $pending)
    <div id="todo" class="column-content">
      <a href="/user/req/{{ $pending->id }}/detail" class="text-decoration-none hovered">
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

  <div class="column" style="background-color: #485461;
  background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);">
    <h2 class="column-header text-white">In Progress</h2>
    @foreach ($onprogress_requests as $onprogress)
    <div id="todo" class="column-content">
      <a href="/user/req/{{ $onprogress->id }}/detail" class="text-decoration-none hovered">
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

  <div class="column" style="background-color: #485461;
  background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);">
    <h2 class="column-header text-white">Done</h2>
    @foreach ($done_requests as $done)
    <div id="todo" class="column-content">
      <a href="/user/req/{{ $done->id }}/detail" class="text-decoration-none hovered">
        <h5 class="text-dark">
          {{ $done->konten }}
        </h5>
      </a>
      @if ($done->PICs->count() > 0)
        <div class="d-inline float-right">
          @foreach ($done->PICs as $PIC)
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
</div>
@endsection