@section('title', 'Groove Creative - Buat Invoice Proyek')
@section('finance', 'menu-open')
@section('create-invoice', 'active')
@section('header-text', 'Buat Invoice Proyek')


<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">


          <!-- Main content -->
          <!-- Main content -->
          <div class="invoice p-3 mb-3" style="border-style: dashed; border-width: 2px;">
            <!-- title row -->
            <div class="row bg-tran justify-content-center">
              <div class="col-12">
                <h4>
                    <img class="img-fluid" width="250px" src="{{asset('img/groove-logo.png')}}" alt="">
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                <address>
                  Dari<br>
                  <strong>Groove Creative</strong><br>
                  Jl. Pembangunan No.2<br>
                  Indramayu, Jawa Barat - 45216<br>
                  Phone: (0234) 0123 45678<br>
                  Email: groovecreative@admin.com
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <address>
                    Kepada<br>
                    @if ($project_selected)
                    <strong>{{$project_selected->client_name}}</strong><br>
                    Phone: {{$project_selected->client_phone}}<br>
                    Email: {{$project_selected->client_email}}
                    @endif
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <b>No. Invoice :</b> {{$invoice_no}}<br>
                @if ($order_id)
                <b>Order ID:</b> #{{$order_id}}<br>
                @else
                <b>Order ID:</b> # <br>
                @endif
                <b>Tanggal :</b> {{date('d/m/Y ')}}<br>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                        <th>Qty</th>
                        <th width="30%">Produk/Jasa</th>
                        <th width="55%">Deskripsi</th>
                        <th>Jumlah</th>
                      </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>
                        <div id="project_id" class="form-group" wire:ignore >
                            <select id="project_id" class="selectpicker form-control" wire:model="project_id" data-live-search="true" data-container="body" required>
                                <option hidden title="--- Nama Proyek ---" value="">--- Nama Proyek ---</option>
                                @foreach ($project as $item)
                                    <option value="{{$item->id}}">{{$item->project_name}}</option>
                                @endforeach
                            </select>
                          </div>
                    </td>
                    <td>
                        @if ($project_selected)
                            {{$project_selected->project_description}}
                        @endif
                    </td>
                    <td>
                        @if ($project_selected)
                            Rp. {{number_format($project_selected->estimate_budget, 0,0,'.')}}
                        @endif
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <!-- accepted payments column -->
              <div class="col-6">
                  <div class="form-group">
                      @if ($project_selected)
                      @if (empty($checkInvoice))
                      <p class="lead">Jenis Invoice :</p>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" wire:model="invoice_type" value="1" checked name="radio1">
                          <label class="form-check-label">Full Payment</label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" wire:model="invoice_type" value="0" name="radio1">
                          <label class="form-check-label">Down Payment</label>
                      </div>
                      @elseif ($checkInvoice->invoice_type == 0)
                      <p class="lead">Jenis Invoice :</p>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" wire:model="invoice_type" value="1" checked name="radio1">
                          <label class="form-check-label">Full Payment</label>
                      </div>
                      @endif
                      @endif

                </div>
              </div>
              <!-- /.col -->
              <div class="col-6">
                  @if ($project_selected)
                    <p class="lead">Detail Pembayaran</p>

                    <div class="table-responsive">
                    <table class="table">
                        @if ($invoice_type)

                        @if ($invoice_type == 1)
                            @if(!$checkInvoice)
                            <tr>
                                <th style="width:50%">Subtotal : </th>
                                <th>Rp. {{number_format($project_selected->estimate_budget, 0,0,'.')}}</th>
                            </tr>
                            <tr>
                                <td>Jumlah yang harus dibayarkan : </td>
                                <td>Rp. {{number_format($total_pay, 0,0,'.')}}</td>
                            </tr>
                            @else
                            <tr>
                                <th style="width:50%">Subtotal : </th>
                                <th>Rp. {{number_format($project_selected->estimate_budget, 0,0,'.')}}</th>
                            </tr>
                            <tr>
                                <td>Down Payment : </td>
                                <td>Rp. {{number_format($checkInvoice->total_pay, 0,0,'.')}}</td>
                            </tr>
                            <tr>
                                <td>Jumlah yang harus dibayarkan : </td>
                                <td>Rp. {{number_format($total_pay, 0,0,'.')}}</td>
                            </tr>
                            @endif

                            @elseif ($invoice_type == 0)
                            <tr>
                                <td>Jumlah Down Payment :</td>
                                <td>
                                    <input type="number" class="form-control" id="totalPay" wire:model="total_pay" placeholder="Jumlah Down Payment">
                                    @error('total_pay')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </td>
                            </tr>
                            @endif
                        @endif


                    </table>
                    </div>

                  @endif
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row ">
              <div class="col-12">
                  @if ($project_selected)
                  <button type="button" wire:click="createInvoice" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Buat Invoice

                  @endif
                </button>
              </div>
            </div>
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->



@push('scripts')
    <script>

        window.addEventListener('selectpicker', function() {
            $('.selectpicker').selectpicker();
        });

        $(function(){

        $('#img_upload').on('change',function(){
                //get the file name
                var fileName = $(this).val().replace('C:\\fakepath\\', " ")
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
        });


        window.addEventListener('swal', function(e){
            Swal.fire(e.detail)
            .then(() => {
                window.location = '/dashboard/project/detail/'+e.detail.id;
            });
        });

        });
    </script>
@endpush
