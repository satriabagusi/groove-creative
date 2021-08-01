@extends('templates.dashboard')
@section('title', 'Groove Creative - Data Barang')
@section('supplies', 'menu-open')
@section('supplies-data', 'active')
@section('header-text', 'Data Barang')

@section('content')


<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        @livewire('supplies-data')

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /.content -->



@endsection
