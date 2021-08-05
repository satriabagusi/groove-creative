
@section('title', 'Groove Creative - Detail Proyek')
@section('project', 'menu-open')
@section('project-list', 'active')
@section('header-text', 'Detail Proyek')

<div class="content">
    <div class="container-fluid">

        <div class="card">
            {{-- {{$project}} --}}
          <div class="card-header">
              <div class="row">
                  <a href="/dashboard/project/" class="btn btn-primary btn-circle btn-sm mr-2" >
                      <i style="font-size: 14px;" class="fas fa-arrow-left"></i>
                  </a>
                  <h3 class="card-title mt-1">Detail Proyek</h3>

              </div>
          </div>
          <div class="card-body">
                  <div class="row">
                      <div class="col-12 col-lg-6 col-sm-6">
                      <div class="info-box bg-light">
                      <div class="info-box-content">
                          <span class="info-box-text text-center text-success text-bold">
                              <i class="fas fa-money-bill-wave"></i> Estimasi Anggaran
                          </span>
                          <span class="info-box-number text-center text-success mb-0">Rp. {{number_format($project->estimate_budget, 0,0,'.')}}</span>
                      </div>
                      </div>
                  </div>
                  <div class="col-12 col-lg-6 col-sm-6">
                      <div class="info-box bg-light">
                          <div class="info-box-content">
                              <span class="info-box-text text-center text-danger text-bold">
                                  <i class="fas fa-money-bill-wave"></i> Total Pengeluaran Proyek
                              </span>
                              <span class="info-box-number text-center text-danger mb-0">Rp. {{number_format(15000000, 0,0,'.')}}</span>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row justify-content-center">
                  <div class="col-12 col-md-6">
                      <h2 class="text-primary">
                          <i class="fas fa-clipboard-list"></i>
                          {{$project->project_name}}
                      </h2>
                          <h5 class="text-muted">{{$project->project_description}}</h5>
                      <br>
                      <hr>
                      <div class="text-muted">
                          <h5 class="text">Status Proyek</h5>
                          @if ($project->project_status === 0)
                              <b class="d-block text-gray">Hold</b>
                          @elseif($project->project_status === 1)
                              <b class="d-block text-info">On Progress</b>
                          @elseif($project->project_status === 2)
                              <b class="d-block text-success">Success</b>
                          @elseif($project->project_status === 3)
                              <b class="d-block text-danger">Cancel</b>
                          @endif
                          <hr>

                            <h5 class="text">Klien Proyek</h5>
                            <b class="d-block">{{$project->client_name}}</b>
                            @if ($project->client_email)
                                <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{$project->client_email}}" class="btn btn-sm btn-warning mb-3" rel="noopener" target="_blank">
                                    <i class="fas fa-envelope"></i> Hubungi Klien via Email
                                </a>
                            @elseif($project->client_phone)
                                <a href="https://wa.me/{{$project->client_phone}}" class="btn btn-sm btn-warning mt-2 mb-3" rel="noopener" target="_blank">
                                    <i class="fas fa-envelope"></i> Hubungi Klien via Whatsapp
                                </a>
                            @endif
                            <hr>

                          <h5 class="text">Pemimpin Proyek</h5>
                        <img src="{{asset('storage/img/user/avatar/'.$project->users->avatar)}}" alt="" class="img-fluid" width="70px">
                        <b class="">{{$project->users->employees->name}}</b>
                      </div>
                  </div>
                  <div class="col-12 col-md-6">
                    @if ($project->project_invoices)
                    <table class="table ">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">NO INVOICE</th>
                            <th scope="col">Metode Pembayaran</th>
                            <th scope="col">Bukti Pembayaran</th>
                            <th scope="col">Link Invoice</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($project->project_invoices as $item)

                          <tr>
                            <th scope="row">1</th>
                            <td>{{$item->no_invoice}}</td>
                            <td>{{$item->payment_method}}</td>
                            <td><a href="/storage/img/bukti_pembayaran/{{$item->bukti_pembayaran}}" rel="noopener" target="_blank">
                                <img class="img-fluid" width="100px" src="{{asset('/storage/img/bukti_pembayaran/'.$item->bukti_pembayaran)}}">
                            </a></td>
                            <td>
                                <a href="/payment/invoice?order_id={{$item->order_id}}&id={{$project->id}}" target="_blank" rel="noopener noreferrer">{{$item->order_id}}</a>
                            </td>
                          </tr>
                          @endforeach

                        </tbody>
                    </table>
                    @endif

                    @if ($project->pay_status == 0)
                        <p class="text-bold">Belum ada Pembayaran di Proyek ini</p>
                        <div class="text-left mt-5 mb-3">
                            {{-- {{$project->project_invoices->order_id}} --}}
                            <button class="btn btn-sm btn-info mb-2" wire:click="createInvoice({{$project->id}})">
                                <i class="fas fa-receipt"></i> Buat Invoice Pembayaran (Full)
                            </button>

                          <button class="btn btn-sm btn-info mb-2" wire:click="createInvoice({{$project->id}})">
                              <i class="fas fa-receipt"></i> Buat Invoice Pembayaran (50%)
                          </button>

                        </div>
                    @elseif($project->pay_status == 1)
                        <button class="btn btn-sm btn-info mb-2" wire:click="createInvoice({{$project->id}})">
                            <i class="fas fa-receipt"></i> Buat Invoice Pembayaran (Full)
                        </button>
                    @endif


                  </div>
              </div>

          </div>
          </div>

    </div>
    <!-- /.container-fluid -->

</div>


