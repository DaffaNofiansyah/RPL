@extends('layouts.main')


@section('container')

{{-- make new request with link to create request and send the board id --}}

{{-- show all requests from board --}}
    @foreach ($requests as $request)
        <ul>
            <li>
                <p>
                    {{ $request->konten }}
                </p>
            </li>
        </ul>

    @endforeach

@endsection