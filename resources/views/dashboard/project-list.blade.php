@extends('templates.dashboard')
@section('title', 'Groove Creative - Data Proyek')
@section('project', 'menu-open')
@section('project-list', 'active')
@section('header-text', 'Data Proyek')

@section('content')


<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        @livewire('project-list')

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /.content -->



@endsection
