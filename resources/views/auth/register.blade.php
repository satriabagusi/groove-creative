@extends('templates.auth')
@section('title', 'Register')
@section('content')
<div class="login-box shadow">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-body">
        <a href="#" class="h1">
            <img src="{{asset('img/groove-logo.png')}}" alt="" class="img-fluid">
        </a>
        <hr>
      <p class="login-box-msg mt-3">Register Akun Pegawai</p>


      <form action="{{route('postRegister')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-6 border-right">
                <p class="text-bold">Data Diri</p>
          <div class=" mb-3">
            <label for="nama" class="form-label">Nama</label>
          <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Lengkap" value="{{old('nama')}}">
          @error('nama')
          <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
          @enderror
        </div>
        <div class=" mb-3">
            <label for="email" class="form-label">Email</label>
          <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{old('email')}}">
          @error('email')
          <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
          @enderror
        </div>
        <div class=" mb-3">
            <label for="no_hp" class="form-label">No HP</label>
          <input type="tel" name="no_hp" id="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="No Handphone" maxlength="14" value="{{old('no_hp')}}">
          @error('no_hp')
          <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
          @enderror
        </div>
            </div>

            <div class="col-12 col-lg-6 border-left">
                <p class="text-bold">Data Login</p>
        <div class=" mb-3">
            <label for="username" class="form-label">Username</label>
          <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{old('username')}}">
          @error('username')
          <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
          @enderror
        </div>
        <div class=" mb-3">
            <label for="password" class="form-label">Password</label>
          <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" maxlength="24">
          @error('password')
          <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
          @enderror
        </div>
            </div>
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
