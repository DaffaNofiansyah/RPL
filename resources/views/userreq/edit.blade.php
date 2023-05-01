@extends('layouts.main')

@section('container')

<h1 class="mb-5">Edit</h1>
<form action="" method="post">
    {{-- hidden status waiting for approval --}}
    <input type="hidden" name="status" id="status" value="waiting for approval">
    {{-- hidden user_id --}}
    <input type="hidden" name="user_id" id="user_id" value="placeholder">
    {{-- hidden admin_id --}}
    @csrf
    <div class="mb-3">
      <label for="konten" class="form-label">Konten</label>
        <input type="text" class="form-control" id="konten" name="konten" autofocus required value="{{ old('konten') }}">
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

    <button type="submit" class="btn btn-primary">Create Post</button>
  </form>
@endsection

