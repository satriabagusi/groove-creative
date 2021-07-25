@extends('templates.dashboard')
@section('title', 'Groove Creative - Assign Fingerprint')
@section('employee', 'menu-open')
@section('assign-fingerprint', 'active')
@section('header-text', 'Assign Fingeprint')

@section('content')


<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        @livewire('assign-fingerprint')

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /.content -->



@endsection


