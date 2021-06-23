@extends('templates.dashboard')
@section('title', 'Groove Creative - Data Proyek')
@section('project', 'active menu-is-opening menu-open')
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


<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}


</div>
