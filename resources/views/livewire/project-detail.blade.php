
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
                          <p class="text">Status Proyek
                          @if ($project->project_status === 0)
                              <b class="d-block text-gray">Hold</b>
                          @elseif($project->project_status === 1)
                              <b class="d-block text-info">On Progress</b>
                          @elseif($project->project_status === 2)
                              <b class="d-block text-success">Success</b>
                          @elseif($project->project_status === 3)
                              <b class="d-block text-danger">Cancel</b>
                          @endif
                          </p>

                          <p class="text">Klien Proyek
                              <b class="d-block">{{$project->client_name}}</b>
                          </p>
                          <p class="text">Pemimpin Proyek
                              {{asset('storage/img/user/avatar/'.$project->users->avatar)}}
                              {{-- <img src="{{asset('img/user/avatar/')}}" alt="" class="img-fluid"> --}}
                              <b class="d-block">{{$project->users->employees->name}}</b>
                          </p>
                      </div>
                  </div>
                  <div class="col-12 col-md-6">

                      <p class="text-sm">Invoice Proyek
                          @forelse ($project->project_invoices as $item)
                          <a href="/payment/invoice?order_id={{\Crypt::encrypt($item->order_id)}}" class="text-bold d-block">{{$item->no_invoice}}</a>
                          @empty
                          <a class="text-muted d-block">Belum ada Invoice</a>

                          @endforelse
                      </p>
                      <hr>
                      <div class="text-left mt-5 mb-3">
                          {{-- {{$project->project_invoices->order_id}} --}}
                          <span id="tooltips" class="d-inline-block" tabindex="0" data-toggle="tooltip" data-trigger="manual" title="Copied!">
                              <button class="btn btn-sm btn-info mb-2" data-clipboard-text="{{url('/payment/invoice?order_id=')}}">
                                  <i class="fas fa-copy"></i> Copy Link Invoices
                              </button>
                            </span>

                          <a href="#" class="btn btn-sm btn-primary mb-2">
                              <i class="fas fa-print"></i> Cetak Invoices
                          </a>
                          <a href="#" class="btn btn-sm btn-warning mb-2">
                              <i class="fas fa-envelope"></i> Hubungi Klien
                          </a>
                      </div>
                  </div>
              </div>

          </div>
          </div>

    </div>
    <!-- /.container-fluid -->

</div>


