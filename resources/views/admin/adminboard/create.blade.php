@extends('layouts.usermain')

@section('container')
<div class="d-flex justify-content-between align-items-center">
    <h1 class="mb-0">   
        Create new board
    </h1>
</div>
<hr>

<form action="/admin/board" method="post">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Board Name</label>
        <input type="text" class="form-control" id="name" name="name" autofocus required value="{{ old('name') }}">
    </div>
    <button type="submit" class="btn btn-primary">Create Board</button>
</form>
@endsection