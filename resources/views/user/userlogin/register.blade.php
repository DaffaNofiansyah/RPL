@extends('layouts.homemain')

@section('container')
<link rel="stylesheet" href="{{ asset('css/registerlogin.css') }}">

<div class="container py-5 h-100">
  <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">


      <h1 class="mb-5 text-center">Register Account</h1>
  
              <form action="/user/register" method="post">
                @csrf

                <div class="form-outline mb-4">
                  <label for="name" class="form-label text-end">Name*</label>
                  <input type="text" name="name" id="name" class="form-control form-control-lg rounded-pill" placeholder="Your Name" required />
                </div>

                {{-- username --}}
                <div class="form-outline mb-4">
                  <label for="username" class="form-label text-end">Username*</label>
                  <input type="text" name="username" id="username" class="form-control form-control-lg rounded-pill" placeholder="Your Username" required />
                </div>

              <div class="form-outline mb-4">
                <label for="email" class="form-label text-end">Email*</label>
                <input type="email" name="email" id="email" class="form-control form-control-lg rounded-pill" placeholder="example@gmail.com" required />
              </div>


              <div class="form-outline mb-4">
                <label for="password" class="form-label text-end">Password*</label>
                <input type="password" name="password" id="password" class="form-control form-control-lg rounded-pill" placeholder="min. 8 characters" required />
              </div>
  
              <!-- Checkbox -->
              <div class="form-outline mb-4 mt-5">
              <button class="form-control form-control-lg rounded-pill text-white popup-button" type="submit"> Register
              </button>
              </div>
              </form>
      </div>
    </div>
  </div>
    @endsection