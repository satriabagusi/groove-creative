<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Groove Creative - @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/adminlte.css')}}">

  <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
</head>
<body class="hold-transition login-page">

    @yield('content')


<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('js/script.js')}}"></script>

<script>
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

</script>

@if (Session::has('error'))
    <script>
        $(document).ready(function(){
            Toast.fire({
                icon: 'error',
                title: 'Username atau Password Salah'
            })
    })
    </script>
@endif
@if (Session::has('logout'))
    <script>
        $(document).ready(function(){
            Toast.fire({
                icon: 'success',
                title: 'Berhasil logout'
            })
    })
    </script>
@endif
@if (Session::has('success'))
    <script>
        $(document).ready(function(){
            Toast.fire({
                icon: 'success',
                title: 'Berhasil Mendaftar akun, Menunggu aktivasi Admin'
            })
    })
    </script>
@endif
</body>
</html>
