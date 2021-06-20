@extends('templates.auth')
@section('title', 'Login')
@section('content')
<div class="login-box shadow">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-body">
        <a href="#" class="h1">
            <img src="{{asset('img/groove-logo.png')}}" alt="" class="img-fluid">
        </a>
        <hr>
      <p class="login-box-msg mt-3">Login to Dashboard</p>

      <form action="{{route('postLogin')}}" method="post">
          @csrf
        <div class=" mb-3">
            <label for="username" class="form-label">Username</label>
          <input type="text" name="username" class="form-control" placeholder="Username">
        </div>
        <div class=" mb-3">
            <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="row justify-content-end">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
{{--
      <p class="mb-1">
        <a href="forgot-password.html">Lupa Password</a>
      </p> --}}
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

@endsection
