
@section('title', 'Groove Creative - Catat Pengeluaran Proyek')
@section('finance', 'menu-open')
@section('add-ledgers', 'active')
@section('header-text', 'Catat Pengeluaran Proyek')

<div class="content">
    <div class="card">
        <div class="card-header">Catat Pengeluaran Proyek</div>
        <div class="card-body">

        <form class="form-group" wire:submit.prevent="saveLedgerData">

            <div id="project_id" class="form-group" wire:ignore>
                <label for="project_id">Pilih Proyek</label>
                <select wire:model="project_id" class="form-control selectpicker " data-container="#project_id" required>
                    <option hidden title="--- Pilih Proyek ---" value="">--- Pilih Proyek ---</option>
                    @foreach ($project as $item)
                        <option value="{{$item->id}}">{{$item->project_name}}</option>
                    @endforeach
                </select>
                @error('project_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group ">
                <label for="ledger_description">Deskripsi Pengeluaran</label>
                <textarea class="form-control" id="ledger_description" cols="20" rows="5" placeholder="Deskripsi pengeluaran" wire:model="ledger_description"></textarea>
            </div>
            @error('ledger_description')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
            <div class="form-group">
                <label for="ledger_ammount">Jumlah Pengeluaran</label>
                <input type="number" class="form-control ledger_ammount" id="ledger_ammount" placeholder="Total Pengeluaran" wire:model="ledger_ammount" >
            </div>
            @error('ledger_ammount')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror

            <div class="form-group">
                <label for="">Faktur Pembelian/Pengeluaran</label>
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input wire:model="invoice_pembelian" type="file" class="custom-file-input" id="img_upload" aria-describedby="inputGroupFileAddon01" onchange="previewImage();" accept=".png, .jpg, .jpeg">
                        <label class="custom-file-label" for="img_upload">Choose file</label>
                    </div>
                </div>
                @error('invoice_pembelian') <span class="invalid-feedback">{{ $message }}</span> @enderror
                @if($invoice_pembelian)
                <img id="image-preview" class="img-fluid mt-2 mb-2" width="400px" id='img-upload' src="{{$invoice_pembelian->temporaryUrl()}}"/>
                <button type="button" class="btn btn-danger btn-sm float-right mb-5" wire:click="$set('invoice_pembelian', '')">
                    <i class="far fa-trash-alt"></i> Hapus
                </button>
                @endif
            </div>

            <div>
                <button class="btn btn-sm btn-primary" type="submit">
                    Cata Pengeluaran
                </button>
            </div>
        </form>
    </div>

    </div>

</div>


@push('scripts')
    <script>

        $(function(){
            window.addEventListener('swal', function(e){
            Swal.fire(e.detail);
            });

            $('#img_upload').on('change',function(){
                //get the file name
                var fileName = $(this).val().replace('C:\\fakepath\\', " ")
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            });

            $('#btn_remove').click(function(){
                $('#img_upload').next('.custom-file-label').html("Choose file");
                $('#img_upload').val("");
                $('#image-preview').attr('src', "");
                $(this).css("display", "none");
            });

            window.addEventListener('img-uploader', function(e){
                $('.input-images').imageUploader();
            });

        });
    </script>
@endpush
