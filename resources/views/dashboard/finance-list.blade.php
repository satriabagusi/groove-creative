@extends('templates.dashboard')
@section('title', 'Groove Creative - Data Keuangan')
@section('finance', 'menu-open')
@section('finance-list', 'active')
@section('header-text', 'Data Keuangan')

@section('content')


<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        @livewire('finance-list')

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /.content -->



@endsection


<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}


</div>
