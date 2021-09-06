
@section('title', 'Groove Creative - Detail Proyek')
@section('project', 'menu-open')
@section('project-list', 'active')
@section('header-text', 'Detail Proyek')

<div class="content">
    <div class="container-fluid">


    <div class="row">
      <div class="col-md-4">

        <!-- About Me Box -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Detail Proyek</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <strong class="text-muted">Nama Proyek</strong>
            <p class="">
              {{$project->project_name}}
            </p>

            <hr>

            <strong class="text-muted">Status Proyek</strong>
            <br>
            @if ($project->project_status === 0)
                <span class="badge bg-secondary">Hold</span>
            @elseif($project->project_status === 1)
                <span class="badge bg-info">On Progress</span>
            @elseif($project->project_status === 2)
                <span class="badge bg-success">Success</span>
            @elseif($project->project_status === 3)
                <span class="badge bg-cancel">Cancel</span>
            @endif

            <hr>

            <strong>Klien Proyek</strong>
            <p class="d-block">{{$project->client_name}}</p>
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

            <strong>Project Leader</strong>
                <p>
                    <img src="{{asset('img/user/avatar/'.$project->users->avatar)}}" alt="" class="img-fluid" width="70px">
                    <span class="">{{$project->users->employees->name}}</span>
                </p>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-8">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#invoices" data-toggle="tab">Invoices</a></li>
              <li class="nav-item"><a class="nav-link" href="#pengeluaran" data-toggle="tab">Pengeluaran</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="invoices">

                @if ($project->project_invoices)
                    <table class="table table-responsive">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">NO INVOICE</th>
                            <th scope="col">Metode Pembayaran</th>
                            <th scope="col">Bukti Pembayaran</th>
                            <th scope="col">Link Invoice</th>
                            <th scope="col">Status Invoice</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($project->project_invoices as $item)

                          <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->no_invoice}}</td>
                            <td>{{$item->payment_method}}</td>
                            <td>
                                @if (!$item->bukti_pembayaran)
                                    <p class="text-muted text-sm">Pembayaran By System tidak ada Bukti pembayaran</p>
                                @else
                                <a href="img/bukti_pembayaran/{{$item->bukti_pembayaran}}" rel="noopener" target="_blank">
                                    <img class="img-fluid" width="50px" src="{{asset('img/bukti_pembayaran/'.$item->bukti_pembayaran)}}">
                                    </a>
                                @endif

                            </td>
                            <td>
                                <a href="/payment/invoice?order_id={{$item->order_id}}&id={{$project->id}}" target="_blank" rel="noopener noreferrer">{{$item->order_id}} <i class="fas fa-external-link-alt text-black"></i></a>
                            </td>
                            <td>
                                @if ($item->status == 0)
                                    <p class="text-danger text-bold">Belum Terbayar</p>
                                @elseif($item->status == 1)
                                    <p class="text-success text-bold">Sudah Terbayar</p>
                                @endif
                            </td>
                          </tr>
                          @endforeach

                        </tbody>
                    </table>
                    @endif

                    <a href="{{URL::to('/dashboard/finance/create/project-invoice')}}" class="mb-2 btn btn-sm btn-info" ><i class="fas fa-receipt"></i> Buat Invoice Proyek</a>
              </div>

              <!-- /.tab-pane -->
              <div class="tab-pane" id="pengeluaran">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Deskripsi Pengeluaran</th>
                            <th scope="col">Jumlah Pengeluaran</th>
                            <th scope="col">Bukti Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($project->ledger as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->description}}</td>
                            <td>Rp. {{number_format($item->ammount, 0,0,'.')}}</td>
                            <td>
                                <a href="{{URL::to('/img/proyek/invoice_pembelian/'.$item->invoice_pembelian)}}" target="_blank" rel="noopener noreferrer">
                                    <img class="img-fluid" width="50px" src="{{asset('/img/proyek/invoice_pembelian/'.$item->invoice_pembelian)}}" alt="">
                                </a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{URL::to('/dashboard/finance/create/project-ledgers')}}" class="mb-2 btn btn-sm btn-info" ><i class="fas fa-money-bill-wave"></i> Catat Pengeluaran Proyek</a>
              </div>

              <div class="tab-pane" id="settings">

              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>




