@extends('layouts.main')


@section('container')
    <h1>
        Board list
    </h1>
    @foreach($boards as $board)
        <ul>
            <li>
                <a href="/user/board/{{ $board->id }}">{{ $board->name }}</a>
            </li>
        </ul>
    @endforeach
@endsection