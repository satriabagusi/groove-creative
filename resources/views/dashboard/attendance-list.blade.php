@extends('templates.dashboard')
@section('title', 'Groove Creative - Data Absensi')
@section('employee', 'menu-open')
@section('attendance-list', 'active')
@section('header-text', 'Data Absensi')

@section('content')


<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        @livewire('attendance-list')

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /.content -->



@endsection

