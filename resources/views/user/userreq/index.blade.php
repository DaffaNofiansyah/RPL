@extends('layouts.usermain')

@section('container')
<div class="table-responsive container mt-4">

  {{-- make new request with link to create request and send the board id --}}

  {{-- show all requests from board --}}

  <h2>Request History</h2>
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

  @if (session()->has('editreq_success'))
  <div class="alert alert-success alert-dismissible">
    {{ session('editreq_success') }}
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
          @if ($request->team == null)
          <span class="badge bg-danger text-white">Not Assigned</span>
          @else
          <span class="badge bg-success">Placeholder</span>
          @endif
        </td>
        <td>
          <a href="/user/req/{{ $request->id }}/edit" class="btn btn-warning">Edit</a>
          <form action="/user/req/{{ $request->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
