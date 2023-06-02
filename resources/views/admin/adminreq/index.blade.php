@extends('layouts.adminmain')

@section('container')


<link rel="stylesheet" href="{{ asset('css/editbutton.css') }}">
<link rel="stylesheet" href="{{ asset('css/deletebutton.css') }}">


<div class="container mt-3">
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

<div class="card shadow mb-4">
  <div class="container mt-3">
    <table class="table table-hover">
      <thead class="thead-dark">
        <tr class = "text-center">
          <th scope="col">#</th>
          <th scope="col">Content Name </th>
          <th scope="col">Status </th>
          <th scope="col">Due Date </th>
          <th scope="col">People in Charge </th>
          {{-- action th, 3 columns --}}
          <th scope="col" colspan="3">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($requests as $request)
          @php
            $isPIC = false;
          @endphp
        <tr class="align-middle">
          <th scope="row" class="align-middle">{{ $loop->iteration }}</th>
          <td class="align-middle">{{ $request->konten }}</td>
          <td class="align-middle">{{ $request->status }}</td>
          <td class="align-middle">{{ $request->deadline }}</td>
          <td class="align-middle">
            @if ($request->PICs->count() > 0)
              @foreach ($request->PICs as $PIC)
                @if ($PIC->admin->id == auth('admin')->user()->id)
                  @php
                    $isPIC = true;
                  @endphp
                @endif
                <span class="badge badge-pill badge-primary">{{ $PIC->admin->name }}</span><br>
              @endforeach
              @else
                <span class="badge badge-pill badge-danger">Not Assigned</span>
            @endif
          </td>

            @if ($isPIC == true)
            <td class="align-middle">
            <button class="cssbuttons-io" onclick="window.location.href='/admin/req/{{ $request->id }}/take'">
              <span>Take</span>
            </button>
          </td>
            @endif  

          <td class="align-middle">
            <button class="cssbuttons-io" onclick="window.location.href='/admin/req/{{ $request->id }}/edit'">
              <span>Edit</span>
            </button>
          </td>
          <td class="align-middle">
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

</div>
  
</div>





@endsection
