@extends('templates.dashboard')

@section('title', 'Groove Creative - Dashboard')
@section('main', 'menu-open')
{{-- @section('home', 'active') --}}
@section('header-text', 'Home')


@section('content')


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
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



    </div>
    <!-- /.container-fluid -->

</div>
<!-- /.content -->



@endsection

@push('scripts')
@if (Session::has('success'))
    <script>
        $(document).ready(function(){
            Toast.fire({
                icon: 'success',
                title: 'Berhasil login'
            })
    })
    </script>
@endif


{{-- @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif --}}

<script>
    /* global Chart:false */

$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart')
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart($salesChart, {
    type: 'bar',
    data: {
      labels: ['JAN','FEB','MAR','APR','MEI','JUN', 'JUL', 'AGU', 'SEP', 'OKT', 'NOV', 'DEC'],
      datasets: [
        {
          backgroundColor: '#20c997',
          borderColor: '#20c997',
          data: [25000000, 15000000, 18450000, 32000000, 12000000, 7500000, 9500000, 27540000, 0]
        },
        {
          backgroundColor: '#c92020',
          borderColor: '#c92020',
          data: [5000000, 0, 0, 0, 0, 0, 0,
            0, 0]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value) {
              if (value >= 1000000) {
                value /= 1000000
                value += ' juta'
              }

              return 'Rp.' + value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  })

})

// lgtm [js/unused-local-variable]

</script>
@endpush
