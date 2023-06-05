@extends('layouts.adminmain')


@section('container')


<div class="d-flex justify-content-between align-items-center">
    <h1 class="mb-0">   
        Board list
    </h1>
    <a href="/admin/board/create" class="btn btn-primary mb-0">Create new board</a>
</div>
<hr>

<div class="row">
    @foreach ($boards as $board)
        <div class="col-md-4 mb-4">
            <a href="/admin/board/{{ $board->id }}" class="text-white text-decoration-none">
                <div class="card p-5" style="background-color: #485461;
                background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);">
                    {{-- <img class="card-img" src="https://source.unsplash.com/500x300/?{{ $board->name }}" style="opacity: 0.5"> --}}
                    <div class="card-img-overlay d-flex align-items-center p-0">
                    <h5 class="card-title flex-fill text-center p-4 fs-3">{{ $board->name }}</h5>
                </div>
            </a>
        </div>
    </div>
    @endforeach
</div>
@endsection