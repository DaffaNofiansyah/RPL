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
            <strong>Login gagal!</strong> Tolong periksa kembali email dan password anda.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif


          {{-- <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5">
   --}}
              <h1 class="mb-4 text-center" style="font-weight:bold;">Login as Admin</h1>
  
              <form action="/admin/login" method="post">
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
  
              <div class="form-outline mb-4 mt-5">
                <button class="form-control form-control-lg rounded-pill text-white popup-button" type="submit"> Login
                </button>
                </div>
              </form>
  
              {{-- <hr class="my-4"> --}}
          {{-- </div>
        </div> --}}
      </div>
    </div>
@endsection