<div class="row">
    <div class="col">

        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Barang</h3>
              <div class="card-tools">
                <div class="" style="width: 150px;">
                    <input wire:model="search" id="cariBarang" type="text" class="form-control form-control-sm float-right" placeholder="Cari Barang ...">
                    <ion-icon wire:ignore id="searchIcon" name="search" class="" style="position:absolute;right:15px;top:20px;"></ion-icon>
                  </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if (!$supplies)
                <div class="row mt-4 justify-content-center text-center">
                    <div class="col-6">
                        <h3>Belum ada data Barang</h3>
                        <img src="{{asset('img/no_data.png')}}" width="300px" class="img-fluid">
                    </div>
                </div>
                @else

                <div  class="table-responsive">

                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th sortable style="width: 10px">#</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Stock</th>
                        <th>Satuan</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($supplies as $item)
                            <tr>
                                <td>{{$loop->iteration + $supplies->firstItem() - 1}}</td>
                                <td>{{$item->supply_name}}</td>
                                <td>Rp {{number_format($item->price, 0, 0, ".")}}</td>
                                <td>{{$item->stock}}</td>
                                <td>{{$item->unit}}</td>
                                <td style="width: 22%; text-align:center; vertical-align:center;">
                                    <button wire:click="editSupply({{$item->id}})" wire:ignore class="btn btn-sm btn-info"> <ion-icon name="create"></ion-icon> Edit</button>
                                    {{-- <button class="btn btn-sm btn-warning">Edit barang</button> --}}
                                    <button wire:click='deleteWindow({{$item->id}})' wire:ignore class="btn btn-sm btn-danger"> <ion-icon name="close-circle"></ion-icon> Hapus</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                  </table>
                </div>

                <div class="row justify-content-between">
                    <div class="col-auto">
                        Total {{$supplies->total()}} data
                    </div>
                    <div class="col-auto">
                        {{$supplies->links()}}
                    </div>
                    <div class="col-auto">
                        Halaman {{$supplies->currentPage()}} dari {{$supplies->lastPage()}}
                    </div>
                </div>

                @endif

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

    </div>
    <div class="col">
        <div class="card card-default">
            <div class="card-header">
                @if (!$editMode)
                <h3 class="card-title">Tambah Data Barang</h3>
            </div>
            <div class="card-body p-0">
                <div class="row justify-content-center my-3">
                    <div class="col-8">
                        <form wire:submit.prevent="saveSupplyData">
                            <div class="mb-3">
                                <label for="supplyName" class="form-label">Nama Barang</label>
                                <input wire:model="supply_name" type="text" class="form-control @error('supply_name') is-invalid @enderror" id="supplyName" placeholder="Nama Barang">
                                @error('supply_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="supplyPrice" class="form-label">Harga Satuan</label>
                                <input wire:model="price" type="number" class="form-control price @error('price') is-invalid @enderror" id="supplyPrice" placeholder="Harga Satuan Barang" >
                                @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="supplyStock" class="form-label">Stock</label>
                                <input wire:model="stock" type="number" class="form-control @error('stock') is-invalid @enderror" id="supplyStock" placeholder="Stock" min="0">
                                @error('stock') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" name="" id="submit" class="btn btn-primary btn-lg btn-block">
                                <ion-icon name="add-circle"></ion-icon>
                                Tambah Barang</button>
                        </form>
                @else
                <h3 class="card-title">Edit Data Barang</h3>
            </div>
            <div class="card-body p-0">
                <div class="row justify-content-center my-3">
                    <div class="col-8">
                        <form wire:submit.prevent="updateSupply">
                            <input type="hidden" wire:model="selected_id">
                            <div class="mb-3">
                                <label for="supplyName" class="form-label">Nama Barang</label>
                                <input wire:model="supply_name" type="text" class="form-control @error('supply_name') is-invalid @enderror" id="supplyName" placeholder="Nama Barang">
                                @error('supply_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="supplyPrice" class="form-label">Harga Satuan</label>
                                <input wire:model="price" type="number" class="form-control price @error('price') is-invalid @enderror" id="supplyPrice" placeholder="Harga Satuan Barang" >
                                @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="supplyStock" class="form-label">Stock</label>
                                <input disabled wire:model="stock" type="number" class="form-control @error('stock') is-invalid @enderror" id="supplyStock" placeholder="Stock" min="0">
                                @error('stock') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" id="submit" class="btn btn-info btn-lg btn-block">
                                Update Data Barang
                            </button>
                            <button class="btn btn-outline-warning btn-lg btn-block" type="button" wire:click="$set('editMode', '0')">
                                Batal
                            </button>
                        </form>
                @endif


                    </div>
                </div>
            </div>
          </div>
          <!-- /.card -->
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function(){

        $('#cariBarang').focusin(function(){
            $('#searchIcon').css('color', '#007BFF');
        });

        $('#cariBarang').focusout(function(){
            $('#searchIcon').css('color', '#212529');
        });

        window.addEventListener('swal', function(e){
            Swal.fire(e.detail);
        });

        window.addEventListener('swal:confirm', function(e){
            Swal.fire(e.detail)
            .then((result) => {
                if(result.isConfirmed) {
                    window.livewire.emit('deleteSupply', e.detail.id);
                }
            });
        });
    })

</script>
@endpush



