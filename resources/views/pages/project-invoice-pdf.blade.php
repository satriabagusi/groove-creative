
@extends('templates.project-invoice')
@section('title', 'GROOVE CREATIVE - INVOICE PROYEK')
@section('content')

<div>
    <div class="container-fluid">
          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row bg-tran justify-content-center">
              <div class="col-12">
                <h4>
                    <img class="img-fluid" width="250px" src="{{asset('img/groove-logo.png')}}" alt="">
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                <address>
                  Dari<br>
                  <strong>Groove Creative</strong><br>
                  Jl. Pembangunan No.2<br>
                  Indramayu, Jawa Barat - 45216<br>
                  Phone: (0234) 0123 45678<br>
                  Email: groovecreative@admin.com
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <address>
                  Kepada<br>
                  <strong>{{$project_invoice->projects->client_name}}</strong><br>
                  {{-- 795 Folsom Ave, Suite 600<br>
                  San Francisco, CA 94107<br>
                  Phone: (555) 539-1037<br>
                  Email: john.doe@example.com --}}
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <b>No. Invoice :</b> {{$project_invoice->no_invoice}}<br>
                <b>Order ID:</b> #{{$project_invoice->order_id}}<br>
                <b>Tanggal :</b> {{date('d/m/Y ', strtotime($project_invoice->created_at))}}<br>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Qty</th>
                    <th width="30%">Produk/Jasa</th>
                    <th width="55%">Deskripsi</th>
                    <th>Subtotal</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>{{$project_invoice->projects->project_name}}</td>
                      <td>{{$project_invoice->projects->project_description}}</td>
                      <td class="text-bold">Rp. {{number_format($project_invoice->projects->estimate_budget, 0,0,'.')}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row ">
              <!-- accepted payments column -->
              <div class="col-6 no-print">
              </div>
              <div style="display:none;" class="col-6 printable"></div>
              <!-- /.col -->
              <div class="col-6">
                <p class="lead">Jumlah yang harus dibayarkan</p>

                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:80%">Subtotal:</th>
                      <td class="text-bold">Rp. {{number_format($project_invoice->projects->estimate_budget, 0,0,'.')}}</td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>

            <!-- this row will not appear when printing -->
            <div class="row">
              <div class="col-12">
                <button id="print" type="button" class="btn btn-default no-print"><i class="fas fa-print"></i> Print</button>
                @if ($project_invoice->status == 0)
                <button id="pay_invoice" type="button" class="btn btn-success float-right no-print"><i class="far fa-credit-card"></i> Bayar Invoice
                @else
                <span class="stamp is-approved float-right">Terbayar</span>
                @endif
                </button>
              </div>
            </div>
          </div>
          <!-- /.invoice -->
    </div><!-- /.container-fluid -->
</div>

@endsection

