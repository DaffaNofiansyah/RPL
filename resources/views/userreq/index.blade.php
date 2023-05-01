@extends('layouts.main')

@section('container')
<div class="table-responsive container mt-4">

  <h2>My Requests</h2>
  <hr>
  <a href="/user/req/create" class="btn btn-primary mb-3">Make a Request</a>

  @if (session()->has('newreq_success'))
  <div class="alert alert-success alert-dismissible">
    {{ session('newreq_success') }}
  </div>
  @endif

  @if (session()->has('delete_success'))
  <div class="alert alert-success alert-dismissible">
    {{ session('delete_success') }}
  </div>
  @endif

  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Content Name </th>
        <th scope="col">Status </th>
        <th scope="col">Due Date </th>
        <th scope="col">People in Charge </th>
        <th scope="col">Action </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($requests as $request)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $request->konten }}</td>
        <td>{{ $request->status }}</td>
        <td>{{ $request->deadline }}</td>
        <td>
          <a href="/user/req/{{ $request->id }}" class="btn btn-info">Detail</a>
        </td>
        <td>
          <a href="/user/req/{{ $request->id }}/edit" class="btn btn-warning">Edit</a>
          <form action="/user/req/{{ $request->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')">Delete</button>
          </form>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
