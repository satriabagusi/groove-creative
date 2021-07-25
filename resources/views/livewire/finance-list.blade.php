
        {{-- @if ($projects->isEmpty())
        <div class="row mt-4 justify-content-center text-center">
            <div class="col-6">
                <h3>Belum ada data Proyek</h3>
                <img src="{{asset('img/no_data.png')}}" width="300px" class="img-fluid">
                <h6>Tambah data proyek <a href="/dashboard/add-project">disini</a></h6>
            </div>
        </div>
        @else --}}

        <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="card card-dashboard">
                    <div class="card-body">
                        <p class="text-muted text-bold">Pemasukan Tahun Ini</p>
                        <h2 class="text-bold">
                            <ion-icon name="arrow-down" class="text-success mr-3"></ion-icon>
                            Rp. {{ number_format($income_month, 0, 0, '.')}}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="card card-dashboard">
                    <div class="card-body">
                        <p class="text-muted text-bold">Pengeluaran Tahun Ini</p>
                        <h2 class="text-bold">
                            <ion-icon name="arrow-up" class="text-danger mr-3"></ion-icon>
                            Rp. {{ number_format($ledgers_month, 0, 0, '.')}}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="card card-dashboard">
                    <div class="card-body">
                        <p class="text-muted text-bold">Pendapatan Tahun Ini</p>
                        <h2 class="text-bold">
                            <ion-icon name="analytics" class="text-primary mr-3"></ion-icon>
                            Rp. {{ number_format($profit_month, 0, 0, '.')}}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="card card-dashboard">
                    <div class="card-body">
                        <p class="text-muted text-bold">Pemasukan Bulan Ini</p>
                        <h2 class="text-bold">
                            <ion-icon name="arrow-down" class="text-success mr-3"></ion-icon>
                            Rp. {{ number_format($income_month, 0, 0, '.')}}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="card card-dashboard">
                    <div class="card-body">
                        <p class="text-muted text-bold">Pengeluaran Bulan Ini</p>
                        <h2 class="text-bold">
                            <ion-icon name="arrow-up" class="text-danger mr-3"></ion-icon>
                            Rp. {{ number_format($ledgers_month, 0, 0, '.')}}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="card card-dashboard">
                    <div class="card-body">
                        <p class="text-muted text-bold">Pendapatan Bulan Ini</p>
                        <h2 class="text-bold">
                            <ion-icon name="analytics" class="text-primary mr-3"></ion-icon>
                            Rp. {{ number_format($profit_month, 0, 0, '.')}}
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Keuangan</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" wire:model="searchProject" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Debit</th>
                                <th>Kredit</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($projects as $project)
                            <tr>
                                @dump($employees)
                                <td>{{$loop->index}}</td>
                                <td>{{$project->project_name}}</td>
                                <td></td>
                                <td>{{$project->project_status}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="#">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="#">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>

                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                <div class="row justify-content-around">
                    <div class="col">
                        {{-- Halaman {{$projects->currentPage()}} dari {{$projects->lastPage()}} Halaman --}}
                    </div>
                    <div class="col">
                        {{-- {{$projects->links()}} --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- @endif --}}



