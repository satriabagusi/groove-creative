@extends('templates.dashboard')
@section('title', 'Groove Creative - Catat Pengeluaran')
@section('finance', 'menu-open')
@section('add-ledgers', 'active')
@section('header-text', 'Data Pegawai')

@section('content')


<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        @livewire('add-ledgers')

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /.content -->



@endsection


<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}


</div>
