@extends('layouts.adminmain')


@section('container')
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
          </tr>
          @endforeach
        </tbody>
      </table>
@endsection