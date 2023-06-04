@extends('layouts.adminmain')


@section('container')
<!-- <h2 class="text-center mb-4">
  Welcome
</h2> -->

<div class="row justify-content-center">
  <div class="col-md-4">
    <a href="/admin/board" class="text-dark text-decoration-none">
      <div class="card shadow">
        <img src="https://source.unsplash.com/500x400/?vector" class="card-img-top" alt="...">
        <div class="card-body">
          <h2 class="card-title flex-fill text-center p-4 fs-3">Board</h2>
        </div>
      </div>
    </a>
  </div>

  <div class="col-md-4">
    <a href="/admin/req" class="text-dark text-decoration-none">
      <div class="card shadow" >
        <img src="https://source.unsplash.com/500x400/?design" class="card-img-top" alt="...">
        <div class="card-body">
          <h2 class="card-title flex-fill text-center p-4 fs-3">Request</h2>
        </div>
      </div>
    </a>
  </div>
</div>
@endsection