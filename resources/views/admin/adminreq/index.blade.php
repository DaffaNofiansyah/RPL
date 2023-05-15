@extends('layouts.adminmain')

@section('container')

<link rel="stylesheet" href="{{ asset('css/editbutton.css') }}">
<link rel="stylesheet" href="{{ asset('css/deletebutton.css') }}">


<div class="table-responsive container mt-4">
  <h2>All Requests</h2>
  <hr>

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
      <tr class="align-middle">
        <th scope="row" class="align-middle">{{ $loop->iteration }}</th>
        <td class="align-middle">{{ $request->konten }}</td>
        <td class="align-middle">{{ $request->status }}</td>
        <td class="align-middle">{{ $request->deadline }}</td>
        <td class="align-middle">
          @if ($request->PICs->count() > 0)
          @foreach ($request->PICs as $PIC)
          <span class="badge badge-pill badge-primary">{{ $PIC->admin->name }}</span><br>
          @endforeach
          @else
          <span class="badge badge-pill badge-danger">Not Assigned</span>
          @endif
        </td>
        <td class="align-middle">
          <button class="cssbuttons-io" onclick="window.location.href='/admin/req/{{ $request->id }}/edit'">
            <span>Edit</span>
          </button>




          <form action="/admin/req/{{ $request->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="cssbuttons-io-delete" onclick="return confirm('Are you sure?')"><span>Delete</span></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>





@endsection
