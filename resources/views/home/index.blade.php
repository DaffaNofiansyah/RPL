@extends('layouts.main')


@section('container')
    <h1>
        Welcome 
    </h1>

    {{-- login as user and admin --}}
    <h2>
        <a href="/userlogin">Login as User</a>
    </h2>
    <h2>
        <a href="/adminlogin">Login as Admin</a>
    </h2>

    @endsection