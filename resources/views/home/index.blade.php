@extends('layouts.homemain')


@section('container')
<style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

  {{-- link to stylesheet in resources css folder --}}
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">


    <section class="py-5 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Welcome</h1>
            <p class="lead text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque doloremque quis molestiae tenetur asperiores similique quibusdam dignissimos nulla possimus. Accusamus, expedita? Sequi unde adipisci debitis quos, laudantium similique aliquid porro!</p>
            <p>
              <a href="/user/login" class="btn btn-white my-2 border-dark">Login as User</a>
              <a href="/admin/login" class="btn btn-dark my-2">Login as Admin</a>
            </p>
          </div>
        </div>
      </section>


    

    @endsection