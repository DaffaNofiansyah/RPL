@extends('layouts.homemain')


@section('container')
    <h1>
        Welcome 
    </h1>

    {{-- login as user and admin --}}
    <h2>
        <a href="/user/login">Login as User</a>
    </h2>
    <h2>
        <a href="/admin/login">Login as Admin</a>
    </h2>

    @endsection