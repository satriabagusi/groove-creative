
        @if ($projects->isEmpty())
        <div class="row mt-4 justify-content-center text-center">
            <div class="col-6">
                <h3>Belum ada data Proyek</h3>
                <img src="{{asset('img/no_data.png')}}" width="300px" class="img-fluid">
                <h6>Tambah data proyek <a href="/dashboard/add-project">disini</a></h6>
            </div>
        </div>
        @else

        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Proyek</h3>

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
                                <th >#</th>
                                <th>Nama Proyek</th>
                                <th>Anggota Proyek</th>
                                <th>Status Proyek</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                {{-- @dump($employees) --}}
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                <div class="row justify-content-around">
                    <div class="col">
                        Halaman {{$projects->currentPage()}} dari {{$projects->lastPage()}} Halaman
                    </div>
                    <div class="col">
                        {{$projects->links()}}
                    </div>
                </div>
            </div>
        </div>

        @endif



