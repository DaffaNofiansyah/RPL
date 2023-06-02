@extends('layouts.adminmain')


@section('container')
<link rel="stylesheet" href="{{ asset('css/adminprofile.css') }}">

<div class="wrapper">
    <div class="left">
        {{-- get image from uploads folder inside public --}}
        <img src="{{ asset(auth('admin')->user()->photo) }}" alt="user" width="100">
        {{-- get admin name --}
        {{--
        {{-- get admin name --}
        {{-- get admin name --}
        {{-- get admin name --}}
        <h4>{{ auth('admin')->user()->name }}</h4>
        <p>{{ auth('admin')->user()->divisi->name }}</p>
        {{-- update images --}}
        {{-- <a href="admin/profile/updatephoto" class="btn">Update Photo</a> --}}
        <form action="profile/{{ auth('admin')->user()->id }}/updatephoto" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-12 mt-3" for="exampleFormControlFile1">Update Photo
                </div>
                <div class="row">
                    <div class="col-sm-12 mt-1">
                    <input type="file" class="form-control-file update-button" id="exampleFormControlFile1" name= "photo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 mt-3">
                    <button type="submit" class="btn-sm btn-primary update-button">Update</button>
                    </div>
                </div>
            </div>
          </form>

    </div>
    <div class="right">
        
        <div class="info">
            <h3>Information</h3>
            <div class="info_data">
                <div class="data">
                    <h4>Email</h4>
                    {{-- get admin email --}}
                    <p>{{ auth('admin')->user()->email }}</p>
                </div>
                <div class="data">
                    <h4>Phone</h4>
                    <p>{{ auth('admin')->user()->phone }}</p>
                </div>
            </div>
        </div>

        <div class="requests">
            <h3>Requests</h3>
            <div class="requests_data">
                <div class="data">
                    <h4>Pending</h4>
                    <p>5</p>
                </div>
                <div class="data">
                    <h4>On progress</h4>
                    <p>5</p>
                </div>
                <div class="data">
                    <h4>Completed</h4>
                    <p>5</p>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection