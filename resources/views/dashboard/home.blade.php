@extends('templates.dashboard')

@section('title', 'Groove Creative - Dashboard')
@section('home', 'active')

@section('content')


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <hr>
        <h3 class="mt-3">Detail Proyek</h3>
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="card card-dashboard">
                <div class="card-body text-center">
                    <p class="text-muted text-bold">Proyek Selesai</p>
                    <h2 class="text-bold">4</h2>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="card card-dashboard">
                <div class="card-body text-center">
                    <p class="text-muted text-bold">Proyek Berjalan</p>
                    <h2 class="text-bold">2</h2>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="card card-dashboard">
                <div class="card-body text-center">
                    <p class="text-muted text-bold">Proyek Selesai</p>
                    <h2 class="text-bold">4</h2>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="card card-dashboard">
                <div class="card-body text-center">
                    <p class="text-muted text-bold">Proyek Selesai</p>
                    <h2 class="text-bold">4</h2>
                </div>
            </div>
        </div>
        <!-- ./col -->
        </div>
    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col-lg-12">
        <div class="card card-dashboard">
            <div class="card-header border-0">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">Pendapatan & Pengeluaran</h3>
                <a href="javascript:void(0);">View Report</a>
            </div>
            </div>
            <div class="card-body">
            <div class="d-flex">
                <p class="d-flex flex-column">
                <span class="text-bold text-lg">Rp. 146.990.000</span>
                <span>Seluruh Pendapatan</span>
                </p>
                <p class="ml-auto d-flex flex-column text-right">
                <span class="text-success">
                    <i class="fas fa-arrow-up"></i> 33.1%
                </span>
                <span class="text-muted">Sejak bulan terakhir</span>
                </p>
            </div>
            <!-- /.d-flex -->

            <div class="position-relative mb-4">
                <canvas id="sales-chart" height="200"></canvas>
            </div>

            <div class="d-flex flex-row justify-content-end">
                <span class="mr-2">
                <i class="fas fa-square" style="color: #20c997"></i> Pendapatan
                </span>

                <span>
                <i class="fas fa-square" style="color: #c92020"></i> Pengeluaran
                </span>
            </div>
            </div>
        </div>
        <!-- /.card -->


        </div>
        <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->

    <hr>
    <h3 class="mt-3">Detail Pegawai</h3>
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-white shadow border rounded">
            <div class="inner">
                <h3>4 <small class="text-gray muted h5">pegawai</small></h3>
                <p>Absen Hari Ini</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class=" small-box-footer bg-info rounded-bottom">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- /.content -->



@endsection
