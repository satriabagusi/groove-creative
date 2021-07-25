
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
                        <p class="text-muted text-bold">Pegawai Absen Hadir</p>
                        <h2 class="text-bold">
                            <ion-icon name="finger-print" class="text-success mr-3"></ion-icon>

                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="card card-dashboard">
                    <div class="card-body">
                        <p class="text-muted text-bold">Pegawai Absen Keluar</p>
                        <h2 class="text-bold">
                            <ion-icon name="finger-print" class="text-danger mr-3"></ion-icon>

                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="card card-dashboard">
                    <div class="card-body">
                        <p class="text-muted text-bold">Pegawai Izin</p>
                        <h2 class="text-bold">
                            <ion-icon name="alert-circle" class="text-warning mr-3"></ion-icon>

                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Data Absensi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Pegawai</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Verified ?</th>
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
        {{-- @endif --}}


            </div>
            </div>
            <div class="col">
                <!-- Calendar -->
            <div class="card ">
                <div class="card-header border-0">

                  <h3 class="card-title">
                    <i class="far fa-calendar-alt"></i>
                    Calendar
                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body pt-0">
                  <!--The calendar -->
                  <div id="calendar" style="width: 100%"></div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
        </div>


        </div>




