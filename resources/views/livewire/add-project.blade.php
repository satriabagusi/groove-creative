<section class="content">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-8 col-8">
        <div class="card card-blue">
            <div class="card-header">
            <h3 class="card-title">General</h3>

            </div>
            <div class="card-body">

            <form wire:submit.prevent="saveProjectData">
                <div class="row justify-content-md-around justify-content-start">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="project_name">Nama Proyek</label>
                            <input wire:model="project_name" type="text" class="form-control @error('project_name') is-invalid @enderror" id="project_name" placeholder="Nama Proyek">
                            @error('project_name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label>Deskripsi Proyek</label>
                            <textarea wire:model="project_description" class="form-control @error('project_description') is-invalid @enderror" rows="3" placeholder=""></textarea>
                            @error('project_description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div id="project_status" class="form-group" wire:ignore>
                            <label for="project_status">Status Proyek</label>
                            <select wire:model="project_status" class="form-control selectpicker " data-container="#project_status" required>
                                <option hidden title="--- Status Proyek ---" value="">--- Status Proyek ---</option>
                                <option value="0">Hold</option>
                                <option value="1">On Progress</option>
                                <option value="2">Success</option>
                                <option value="3">Cancel</option>
                            </select>
                            @error('project_status') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>


                        <div id="project_leader_id" class="form-group" wire:ignore>
                            <label>Pemimpin Proyek</label>
                            <select id="project_leader" wire:model="project_leader_id" class="selectpicker form-control" data-container="#project_leader_id" data-live-search="true" required>
                                @if ($project_leader->isEmpty())
                                    <option selected>--- Tidak ada pegawai terdaftar ---</option>
                                @else
                                <option hidden title="--- Pemimpin Proyek ---" value="">--- Pemimpin Proyek ---</option>
                                @foreach ($project_leader as $item)
                                    <option value="{{$item->id}}">{{$item->employees->name}}</option>
                                @endforeach
                                @endif
                            </select>
                            <span class="invalid-feedback"> error </ span>
                            @error('project_leader') <div class="invalid-feedback d-block">{{$message}}</div> @enderror
                        </div>

                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="client_name">Nama Klien</label>
                            <input wire:model="client_name" type="text" class="form-control @error('client_name') is-invalid @enderror" id="client_name" placeholder="Nama Klien">
                            @error('client_name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="client_contact">Kontak Klien</label>
                            <input wire:model="client_contact" type="text" class="form-control @error('client_contact') is-invalid @enderror" id="client_contact" placeholder="Kontak Klien">
                            @error('client_contact') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="estimate_budget">Estimasi Anggaran Proyek</label>
                            <input wire:model="estimate_budget" type="numeric" class="form-control @error('estimate_budget') is-invalid @enderror" id="estimate_budget " placeholder="Estimasi Anggaran">
                            @error('estimate_budget') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div id="pay_status" class="form-group" wire:ignore>
                            <label for="project_pay_status">Status Pembayaran</label>
                            <select id="project_pay_status" wire:model="pay_status" class="selectpicker form-control" data-container="#pay_status" required>
                                <option hidden title="--- Status Pembayaran ---" value="">--- Status Pembayaran ---</option>
                                <option value="0">Belum Terbayar</option>
                                <option value="1">Sudah DP</option>
                                <option value="2">Lunas</option>
                            </select>
                            @error('pay_status') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        @if ($pay_status == 1)
                        <div class="form-group" id="total_pay" >
                            <label for="total_pay">Total Pembayaran</label>
                            <input wire:model="total_pay" type="numeric" class="form-control @error('total_pay') is-invalid @enderror" id="total_pay" placeholder="Total Pembayaran" value=0>
                            @error('total_pay') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        @endif




                    </div>
                </div>
                <button type="submit" class="btn btn-success float-right">Buat Proyek Baru</button>
            </form>

            </div>
            <!-- /.card-body -->
            </div>
        </div>
        <!-- /.card -->
        </div>
    </div>
</section>

@push('scripts')

<script>
    $(document).ready(function (){
        window.addEventListener('swal', function(e){
            Swal.fire(e.detail);
        });
        $('.selectpicker').on( 'hide.bs.select', function ( ) {
            $(this).trigger("focusout");
        });
    })
</script>

@endpush
