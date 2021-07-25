<div>
@if ($detailMode)

      <div class="card">
          {{$project}}
        <div class="card-header">
            <div class="row">
                <ion-icon style="font-size: 24px;" class="align-baseline text-primary mr-2" name="arrow-back-circle" wire:click="$set('detailMode', false)" wire:ignore></ion-icon>
                <h3 class="card-title">Detail Proyek</h3>
            </div>
        </div>
        <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-6 col-sm-6">
                    <div class="info-box bg-light">
                    <div class="info-box-content">
                        <span class="info-box-text text-center text-success text-bold">
                            <ion-icon class="" name="card"></ion-icon> Estimasi Anggaran
                        </span>
                        <span class="info-box-number text-center text-success mb-0">Rp. {{number_format(45000000, 0,0,'.')}}</span>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-sm-6">
                    <div class="info-box bg-light">
                        <div class="info-box-content">
                            <span class="info-box-text text-center text-danger text-bold">
                                <ion-icon class="" name="card"></ion-icon> Total Pengeluaran Proyek
                            </span>
                            <span class="info-box-number text-center text-danger mb-0">Rp. {{number_format(15000000, 0,0,'.')}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 ">
                    <h2 class="text-primary">
                        <ion-icon name="document"></ion-icon>
                        {{-- {{$project->project_name}} --}}
                    </h2>
                        <h5 class="text-muted">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</h5>
                    <br>
                    <div class="text-muted">
                        <p class="text">Klien Proyek
                            {{-- <b class="d-block">{{$project->client_name}}</b> --}}
                        </p>
                        <p class="text">Pemimpin Proyek
                            {{-- <b class="d-block">{{$project->users->employees->name}}</b> --}}
                        </p>


                    </div>
                </div>
                <div class="col-6">
                    <p class="text-sm">Invoice Proyek
                        <a href="#" class="text-bold d-block">Tony Chicken</a>
                    </p>
                    <div class="text-right mt-5 mb-3">
                        <a href="#" class="btn btn-sm btn-info">Copy Link Invoices</a>
                        <a href="#" class="btn btn-sm btn-primary">Cetak Invoices</a>
                        <a href="#" class="btn btn-sm btn-warning"> <ion-icon name="mail"></ion-icon> Hubungi Klien</a>
                    </div>
                </div>
            </div>

        </div>
        </div>


@else

<div class="row">
    <div class="col-12 col-lg">
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
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <div class="row">
                            <div class="col-auto">
                                Tampilkan
                            </div>
                            <div wire:ignore id="paginateData" class="col-auto">
                                <select wire:model="paginateData" class="form-control form-control-sm selectpicker" data-container="#paginateData">
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                </select>
                            </div>
                            <div class="col-auto">
                                Data
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group row justify-content-start">
                            <label for="colFormLabelSm" class="col-auto col-form-label col-form-label-sm">Filter</label>
                            <div wire:ignore id="filterStatus" class="col-auto">
                                <select wire:model="filterStatus" data-container="#filterStatus" class="form-control form-control-sm selectpicker" title="Status Proyek">
                                    <option value="" title="Status Proyek">Default</option>
                                    <option value="0">Hold</option>
                                    <option value="1">On Progress</option>
                                    <option value="2">Success</option>
                                    <option value="3">Canceled</option>
                                </select>
                            </div>
                          </div>
                    </div>

                </div>

                @if ($projects->isEmpty())
                <div class="row mt-4 justify-content-center text-center">
                    <div class="col-6">
                        <h3>Belum ada data Proyek</h3>
                        <img src="{{asset('img/no_data.png')}}" width="300px" class="img-fluid">
                        <h6>Tambah data proyek <a href="/dashboard/add-project">disini</a></h6>
                    </div>
                </div>
                @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Proyek</th>
                                <th>Project Leader</th>
                                <th>Status Proyek</th>
                                <th>Status Pembayaran</th>
                                <th>Estimasi Proyek</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                <td>{{$loop->iteration + $projects->firstItem() - 1}}</td>
                                <td>{{$project->project_name}}</td>
                                <td >
                                    <img wire:ignore src="{{asset('img/user/avatar/'.$project->users->avatar)}}" class="table-avatar" width="40px" data-toggle="tooltip" data-placement="bottom" title="{{$project->users->employees->name}}" >
                                    <span>
                                        {{$project->users->employees->name}}
                                    </span>
                                </td>
                                <td>
                                    @if ($project->project_status === 0)
                                        <span class="badge badge-pill badge-secondary">Hold</span>
                                    @elseif($project->project_status === 1)
                                        <span class="badge badge-pill badge-info">On Progress</span>
                                    @elseif($project->project_status === 2)
                                        <span class="badge badge-pill badge-success">Success</span>
                                    @elseif($project->project_status === 3)
                                        <span class="badge badge-pill badge-danger">Cancel</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($project->pay_status === 0)
                                        <span class="badge badge-pill badge-danger">Belum Terbayar</span>
                                    @elseif($project->pay_status === 1)
                                        <span class="badge badge-pill badge-info">Sudah DP</span>
                                    @elseif($project->pay_status === 2)
                                        <span class="badge badge-pill badge-success">Lunas</span>
                                    @endif
                                </td>
                                <td>Rp. {{number_format($project->estimate_budget, 0,0,'.')}}</td>
                                <td>
                                    <button class="btn btn-info btn-sm" wire:click="detailProject({{$project->id}})">
                                        <ion-icon wire:ignore name="document"></ion-icon>
                                        Detail
                                    </button>
                                    <a class="btn bg-teal btn-sm" wire:click="editProject({{$project->id}})">
                                        <ion-icon wire:ignore name="create"></ion-icon>
                                        </i>
                                        Edit
                                    </a>
                                    <button class="btn btn-danger btn-sm" wire:click='deleteWindow({{$project->id}})'>
                                        <ion-icon wire:ignore name="trash"></ion-icon>
                                        </i>
                                        Delete
                                    </button>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        @endif
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
            </div>

            @if ($editMode)
            <div  class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h3 class="card-title">Edit Proyek</h3>

                        <div class="card-tools">
                            <button wire:ignore class="btn btn-tool" wire:click="$set('editMode', 0)">
                                <ion-icon class="mt-sm-2" style="font-size: 18px;color:white;" name="close"></ion-icon>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                        <div class="col-10">
                            <form wire:submit.prevent="updateProject">
                                <input type="hidden" wire:model="project_id">
                                <div class="form-group">
                                    <label for="inputName">Nama Proyek</label>
                                    <input wire:model="project_name" type="text" id="inputName" class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="projectDescription">Deskripsi Proyek</label>
                                    <textarea wire:model="project_description" type="text" id="projectDescription" class="form-control">
                                    </textarea>
                                </div>

                                {{-- {{$project_leader}} --}}
                                <div id="project_leader_id" class="form-group" wire:ignore>
                                    <label>Pemimpin Proyek</label>
                                    <select id="project_leader" wire:model="project_leader_id" class="selectpicker form-control" data-container="#project_leader_id" data-live-search="true" required>
                                        @foreach ($project_leader as $item)
                                            <option value="{{$item->id}}">{{$item->employees->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="invalid-feedback"> error </span>
                                    @error('project_leader') <div class="invalid-feedback d-block">{{$message}}</div> @enderror
                                </div>

                                <div id="pay_status" class="form-group" wire:ignore>
                                    <label for="pay_status">Status Pembayaran</label>
                                    <select wire:model="pay_status" class="form-control selectpicker " data-container="#pay_status" required>
                                        <option value="0">Belum Terbayar</option>
                                        <option value="1">Sudah DP</option>
                                        <option value="2">Lunas</option>
                                    </select>
                                </div>

                                <div id="project_status" class="form-group" wire:ignore>
                                    <label for="project_status">Status Proyek</label>
                                    <select wire:model="project_status" class="form-control selectpicker " data-container="#project_status" required>
                                        <option value="0">Hold</option>
                                        <option value="1">On Progress</option>
                                        <option value="2">Success</option>
                                        <option value="3">Cancel</option>
                                    </select>
                                </div>
                                <button class="btn btn-info btn-block">Save</button>
                            </form>

                        </div>
                    </div>
                    </div>
                </div>

            </div>
            @endif

        </div>

@endif
</div>


@push('scripts')
<script>

    $(document).ready(function(){
        console.log('LOADED');
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        window.addEventListener('swal', function(e){
            Swal.fire(e.detail);
        });

    window.addEventListener('employeeDataUpdate', function(e){
        data = Object.keys(e.detail).map((key) => [Number(key), e.detail[key]]) ;
        $('#projectEmployee').selectpicker('val', data);
        $('#projectEmployee').selectpicker('render');
    });

    window.addEventListener('editData', function() {
        $('.selectpicker').selectpicker('refresh');
    });


    window.addEventListener('swal:confirm', function(e){
        Swal.fire(e.detail)
        .then((result) => {
            if(result.isConfirmed){
                livewire.emit('deleteProject', e.detail.id)
            }
        });
    });

    });



</script>

    @if (session()->has('success'))
        <script>
            Swal.fire({
                'icon': 'success',
                'title': 'Berhasil',
                'text': {{session('success')}}
            });
        </script>
    @endif
@endpush

