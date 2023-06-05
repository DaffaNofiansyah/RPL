@extends('layouts.usermain')

@section('container')
<link rel="stylesheet" type="text/css" href="{{ asset('css/general.css') }}">

<h1 class="mb-2 text-center">Create New Request</h1>
<hr class="mb-4 w-50">

<div class="card p-4 roundit">
<form action="/user/req" method="post">
    {{-- hidden status waiting for approval --}}
    {{-- hidden user_id --}}
    {{-- hidden admin_id --}}
    @csrf
    <div class="mb-3">
      <label for="konten" class="form-label">Konten</label>
        <input type="text" class="form-control" id="konten" name="konten" autofocus required value="{{ old('konten') }}">
    </div>

    {{-- board_id --}}
    <div class="mb-3">
      <label for="board_id" class="form-label">Board</label>
      <select class="form-control" name="board_id" id="board_id">
        @foreach ($boards as $board)
          @if ($board->id == old('board_id'))
            <option value="{{ $board->id }}" selected>{{ $board->name }}</option>
          @else
            <option value="{{ $board->id }}">{{ $board->name }}</option>
          @endif
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="detail" class="form-label">Detail</label>
      <textarea class="form-control" id="detail" rows="3" name="detail" required>{{ old('detail') }}</textarea>
    </div>
    {{-- deadline --}}
    <div class="mb-3">
      <label for="deadline" class="form-label">Deadline</label>
      <input type="date" class="form-control" id="deadline" name="deadline" required value="{{ old('deadline') }}">
    </div>

    <button type="submit" class="btn btn-primary">Create Request</button>
  </form>
</div>
@endsection

