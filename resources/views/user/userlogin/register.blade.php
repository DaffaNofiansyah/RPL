@extends('layouts.homemain')

@section('container')
<div class="container py-5 h-100">
  <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
      <div class="card shadow-2-strong" style="border-radius: 1rem;">
        <div class="card-body p-5 text-center">

          <h3 class="mb-5">Register</h3>

          <form action="/user/register" method="post">
            @csrf
            {{-- name --}}
            <div class="form-outline mb-4">
              <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Name" required />
            </div>

            {{-- username --}}
            <div class="form-outline mb-4">
              <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Username" required />
            </div>
              
              {{-- email --}}
            <div class="form-outline mb-4">
              <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Email" required />
            </div>

            <div class="form-outline mb-4">
              <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password" required />
            </div>
            
            <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>
          </form>

          

          <hr class="my-4">

          <div class="text-center">
            <p>Already a member? <a href="/user/login">Login</a></p>
          </div>
        </div>
      </div>
    </div>
    @endsection