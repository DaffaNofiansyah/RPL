@extends('layouts.usermain')


@section('container')

{{-- make new request with link to create request and send the board id --}}

{{-- show all requests from board --}}
    {{-- @foreach ($requests as $request)
        <ul>
            <li>
                <p>
                    {{ $request->konten }}
                </p>
            </li>
        </ul>

    @endforeach --}}


    <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Content Name </th>
            <th scope="col">Status </th>
            <th scope="col">Due Date </th>
            <th scope="col">People in Charge </th>
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
          </tr>
          @endforeach
        </tbody>
      </table>

@endsection