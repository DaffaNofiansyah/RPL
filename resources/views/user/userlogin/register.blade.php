@extends('layouts.homemain')

@section('container')
<link rel="stylesheet" href="{{ asset('css/registerlogin.css') }}">

<div class="container py-5 h-100">
  <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <h3 class="mb-5 text-center" style="font-weight:bold;">Sign Up New User</h3>
          <form action="/user/register" method="post">
            @csrf
            {{-- name --}}
            <div class="form-outline mb-4">
              <!-- <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Name" required /> -->
              <label for="email" class="form-label text-end">Name*</label>
              <input type="email" name="email" id="email" class="form-control form-control-lg rounded-pill" placeholder="Enter your name" required />
            </div>

            {{-- username --}}
            <div class="form-outline mb-4">
              <!-- <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Username" required /> -->
              <label for="email" class="form-label text-end">Username*</label>
              <input type="email" name="email" id="email" class="form-control form-control-lg rounded-pill" placeholder="Enter username" required />
              
            </div>
              
              {{-- email --}}
            <div class="form-outline mb-4">
              <!-- <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Email" required /> -->
              <label for="email" class="form-label text-end">Email*</label>
              <input type="email" name="email" id="email" class="form-control form-control-lg rounded-pill" placeholder="example@gmail.com" required />
            </div>

            <div class="form-outline mb-4">
              <!-- <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password" required /> -->
              <label for="password" class="form-label text-end">Password*</label>
              <input type="password" name="password" id="password" class="form-control form-control-lg rounded-pill" placeholder="Min. 8 characters" required />
            </div>
            
            <!-- <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button> -->
            <button class="cssbuttons-io-button rounded-pill mt-5" type="submit"> Regist
                <div class="icon rounded-pill">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path></svg>
                </div>
              </button>
          </form>
      </div>
    </div>
  </div>
    @endsection