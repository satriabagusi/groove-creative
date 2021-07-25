<section class="content">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-8 col-8">
        <div class="card ">
            <div class="card-header">
            <h3 class="card-title text-bold">Catat Pengeluaran</h3>

            </div>
            <div class="card-body">

            <form action="#" method="post">
                <div class="row justify-content-md-around justify-content-start">
                    <div class="col-md-10">

                        <div class="form-group">
                            <label>Deskripsi Pengeluaran</label>
                            <textarea wire:model="project_description" class="form-control" rows="3" placeholder=""></textarea>
                        </div>

                        <div id="ledgers_type" class="form-group" wire:ignore>
                            <label for="project_status">Jenis Pengeluaran</label>
                            <select id="ledgers_type" wire:model="ledgers_type" class="form-control selectpicker" data-container="#ledgers_type">
                                <option value="1">Proyek</option>
                                <option value="2">Stock Barang</option>
                            </select>
                        </div>

                        {{$ledgers_type}}

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
        $('#ledgers_type').change(function(){
            if( $('#ledgers_type').find(':selected').val() == 1){
                console.log('OK')
            }else if( $('#ledgers_type').find(':selected').val() == 2 ){
                console.log('FINE')
            }
        })
    })

</script>

@endpush
