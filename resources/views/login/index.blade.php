@extends('layout-auth.main')
@section('body')
<main class="form-signin">
  {{ session('loginError') }}
    <form action="/login" method="POST">
      @csrf
      <h1 class="h3 mb-3 fw-normal">Login</h1>
  
      <div class="form-floating">
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
        @error('email')
        <div class="invalid-feedback">
          {{$message}}
       </div>
        @enderror
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
        @error('email')
        <div class="invalid-feedback">
          {{$message}}
       </div>
        @enderror
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      <p class="mt-2 mb-1 text-muted">ga punya akun ? duh <a href="/register" style="text-decoration: none">register </a> dulu dong</p>
      <p><a href="/" style="text-decoration: none">Kembali</a></p>
      <p class="mt-5 mb-3 text-muted">&copy; 2022-now</p>
    </form>
  </main>
@endsection