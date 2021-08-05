<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Bootstrap Select -->
  <link rel="stylesheet" href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css')}}">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.css')}}">
  {{-- <!-- dropzonejs -->
  <link rel="stylesheet" href="../../plugins/dropzone/min/dropzone.min.css"> --}}

<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.css')}}">
<!-- IonIcons -->
{{-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}

<!-- Theme style -->
<link rel="stylesheet" href="{{asset('css/adminlte.css')}}">

<link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">

  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{asset('plugins/bs-stepper/css/bs-stepper.min.css')}}">

  <link rel="stylesheet" href="{{asset('plugins/load-awesome/css/ball-pulse-sync.css')}}">

  <link href=https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/dataTables.bootstrap4.css rel=stylesheet>

  <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-QfA8PhLA-vWGQPpI"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

    @livewireStyles()
    <style>
        @media print {
            .no-print, .no-print * {
                display: none !important;
            }

            .printable, .printable * {
                display:block !important;
            }
        }
        @page {
            margin:0;
        }

        .stamp {
            margin-right: 150px;
            position:relative;
            margint-top:150px;
            color: #555;
            font-size: 3rem;
            font-weight: 700;
            border: 0.25rem solid #555;
            display: inline-block;
            padding: 0.25rem 1rem;
            text-transform: uppercase;
            border-radius: 1rem;
            font-family: 'Courier';
            -webkit-mask-image: url('/img/grunge.png');
            -webkit-mask-size: 944px 604px;
            mix-blend-mode: multiply;
        }

        .is-approved {
	        color: rgba(3.9%, 60%, 15.7%, 0.412);
	        border: 0.5rem solid rgba(3.9%, 60%, 15.7%, 0.412);
	        -webkit-mask-position: 13rem 6rem;
            border-radius: 10;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">

@yield('content')


<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('js/adminlte.js')}}"></script>

<!-- Bootstrap Select -->
<script src="{{asset('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('js/demo.js')}}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{asset('js/pages/dashboard3.js')}}"></script> --}}
<!-- Ionicons -->
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>

<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>

<!-- BS-Stepper -->
<script src="{{asset('plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>

{{-- <script src="{{asset('plugins/jquery-mask/js/jquery.mask.js')}}"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script> --}}

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{asset('plugins/clipboard-js/clipboard.js')}}"></script>

@livewireScripts()

@stack('scripts')

<script src="{{asset('js/script.js')}}"></script>


    <script src=https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/jquery.dataTables.js></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/dataTables.bootstrap4.js></script>


</body>
</html>
