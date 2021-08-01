@extends('templates.dashboard')
@section('title', 'Groove Creative - Data Pegawai')
@section('employee', 'menu-open')
@section('employee-list', 'active')
@section('header-text', 'Data Pegawai')

@section('content')


<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        @livewire('user-list')

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /.content -->



@endsection

