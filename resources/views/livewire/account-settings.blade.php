@section('title', 'Groove Creative - Pengaturan Akun')
@section('account', 'menu-open')
@section('account-settings', 'active')
@section('header-text', 'Pengaturan Akun')

<div class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Detail Akun</h3>

          <div class="card-tools">

          </div>
        </div>
        <div class="card-body">
            <div class="row justify-content-around">
                <div class="col-12 col-md-3 col-sm-12 mb-5">
                    <img src="{{URL::to('img/user/avatar/avatar.png')}}" class="img-fluid img-circle" width="250px">
                    <div class="row justify-content-center">
                        <div class="col-7 col-sm-9 col-md-9 col-lg-5 col-xl-7">
                            <div class="custom-file">
                                <input type="file" id="selectedFile" style="display: none;" />
                                <input type="button" class="btn btn-primary" value="Browse" onclick="document.getElementById('selectedFile').click();" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-sm-12 mb-3">
                    <h5>Detail Pegawai</h5>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                      </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No HP</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
                <div class="col-12 col-md-4 col-sm-12 mb-3">
                    <h5>Detail Login</h5>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Username</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>

            </div>
                <div class="float-right">
                    <button class="btn btn-primary">Update Data</button>
                </div>
        </div>

        <!-- /.card-body -->
      </div>
      <!-- /.card -->
</div>
