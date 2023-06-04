@extends('layouts.homemain')

@section('container')
<link rel="stylesheet" href="{{ asset('css/registerlogin.css') }}">

    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">

          @if(session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrasi berhasil!</strong> Silahkan login.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

          @if(session()->has('loginError'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Login gagal!</strong> tolong periksa kembali email dan password anda.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif


          {{--<div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5">
--}}  
              <h3 class="mb-5 text-center fw-bold" style="font-weight:bold;">Login as User</h3>
  
              <form action="/user/login" method="post">
                @csrf
              <div class="form-outline mb-4">
                <label for="email" class="form-label text-end">Email*</label>
                <input type="email" name="email" id="email" class="form-control form-control-lg rounded-pill" placeholder="example@gmail.com" required />
              </div>


              <div class="form-outline mb-4">
                <label for="password" class="form-label text-end">Password*</label>
                <input type="password" name="password" id="password" class="form-control form-control-lg rounded-pill" placeholder="min. 8 characters" required />
              </div>
  
              <!-- Checkbox -->
              <button class="cssbuttons-io-button rounded-pill mt-5 text-center" type="submit"> Login
                <div class="icon rounded-pill">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path></svg>
                </div>
              </button>

              </form>
  
              <hr class="my-4">
                <div class="text-center">
                    <p>Not a member? <a href="/user/register">Register</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection