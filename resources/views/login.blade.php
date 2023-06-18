@extends('layouts.main')

@push('style')
  <link rel="stylesheet" href="{{ '/css/login.css' }}">
@endpush

@section('body')
  <section id="login">
    <div class="container-fluid h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="row justify-content-center">
            <div class="col-md-9 text-center text-white">
              <h1>Computer Based Test</h1>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-11 col-md-5">
              <div class="login-box">
                <p>Login</p>
                @if (session()->has('loginError'))
                  <p style="color: red; font-style: italic;" class="text-center">Username / Password Salah!</p>
                @endif
                <form action="{{ route('loginProcess') }}" method="post">
                  @csrf
                  <div class="user-box">
                    <input required="" name="username" type="text" />
                    <label>Username</label>
                  </div>
                  <div class="user-box">
                    <input required="" name="password" type="password" />
                    <label>Password</label>
                  </div>
                  <button type="submit" name="login">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Submit
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
