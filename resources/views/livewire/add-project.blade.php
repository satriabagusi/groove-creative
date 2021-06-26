<section class="content">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-8 col-8">
        <div class="card card-blue">
            <div class="card-header">
            <h3 class="card-title">General</h3>

            </div>
            <div class="card-body">

            <form action="#" method="post">
                <div class="row justify-content-md-around justify-content-start">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="project_name">Nama Proyek</label>
                            <input type="text" class="form-control" id="project_name" placeholder="Nama Proyek">
                        </div>

                        <div class="form-group">
                            <label>Deskripsi Proyek</label>
                            <textarea class="form-control" rows="3" placeholder=""></textarea>
                        </div>

                        <div class="form-group">
                            <label>Status Proyek</label>
                            <select class="form-control">
                                <option disabled selected class="bg-gray-light">Status Proyek</option>
                                <option value="0">Hold</option>
                                <option value="1">On Progress</option>
                                <option value="2">Success</option>
                            </select>
                        </div>

                        <div id="project_leader_id" wire:ignore>
                            <label>Pemimpin Proyek</label>
                            <select id="project_leader" wire:model="project.project_leader_id" class="selectpicker form-control" data-container="#project_leader_id" data-live-search="true">
                                @foreach ($project_leader as $item)
                                    <option value="{{$item->id}}">{{$item->employees->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="client_name">Nama Klien</label>
                            <input type="text" class="form-control" id="client_name" placeholder="Nama Proyek">
                        </div>

                        <div class="form-group">
                            <label for="client_contact">Kontak Klien</label>
                            <input type="text" class="form-control" id="client_contact" placeholder="Nama Proyek">
                        </div>

                        <div class="form-group">
                            <label for="estimated_budget">Estimasi Anggaran Proyek</label>
                            <input type="text" class="form-control" id="estimated_budget" placeholder="Nama Proyek">
                        </div>

                        <div class="form-group">
                            <label for="estimated_budget">Status Pembayaran</label>
                            <select wire:model='project.pay_status' class="selectpicker form-control">
                                    <option value="0">Belum Terbayar</option>
                                    <option value="1">Sudah DP</option>
                                    <option value="2">Terbayar</option>
                            </select>
                        </div>


                    </div>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Buat Proyek Baru</button>
            </form>

            </div>
        </div>
        <!-- /.card -->
        </div>
    </div>
</section>

@push('scripts')

<script>
    $(document).ready(function (){

    })
</script>

@endpush
