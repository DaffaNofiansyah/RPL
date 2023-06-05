@extends('layouts.usermain')

@section('container')
<link rel="stylesheet" type="text/css" href="{{ asset('css/general.css') }}">

<div>
  <h1 class="mb-3 text-center">Edit Request</h1>
  <hr class="mb-4 w-50">
</div>


<div class="card p-4 roundit">
<form action="/user/req/{{ $request->id }}" method="post">
    {{-- hidden status waiting for approval --}}
    {{-- hidden user_id --}}
    {{-- hidden admin_id --}}
    @csrf
    @method('put')
    <div class="mb-3">
      <label for="konten" class="form-label">Konten</label>
        <input type="text" class="form-control" id="konten" name="konten" autofocus required value="{{ old('konten', $request->konten) }}">
    </div>

    <div class="mb-3">
      <label for="detail" class="form-label">Detail</label>
      <textarea class="form-control" id="detail" rows="3" name="detail" required>{{ old('detail', $request->detail) }}</textarea>
    </div>
    {{-- deadline --}}
    <div class="mb-3">
      <label for="deadline" class="form-label">Deadline</label>
      <input type="date" class="form-control" id="deadline" name="deadline" required value="{{ old('deadline', $request->deadline) }}">
    </div>

    <button type="submit" class="btn btn-primary mb-4" >Edit</button>
  </form>
</div>
@endsection

