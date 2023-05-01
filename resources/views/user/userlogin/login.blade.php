@extends('layouts.homemain')

@section('container')
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


          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
  
              <h3 class="mb-5">Sign in</h3>
  
              <form action="/user/login" method="post">
                @csrf
              <div class="form-outline mb-4">
                <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Email" required />
              </div>

              <div class="form-outline mb-4">
                <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password" required />
              </div>
  
              <!-- Checkbox -->
  
              <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
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