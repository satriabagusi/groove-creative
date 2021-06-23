<section class="content">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-8 col-8">
        <div class="card card-blue">
            <div class="card-header">
            <h3 class="card-title">General</h3>

            </div>
            <div class="card-body">

            <form action="#" method="post">

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
                        <option>Hold</option>
                        <option>On Process</option>
                        <option>Success</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Pemimpin Proyek</label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                      <option selected="selected" disabled>Pemimpin Proyek</option>
                      <option data-select2-id="38">Alaska</option>
                    </select>
                  </div>


            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-success float-right">Buat Proyek Baru</button>
            </form>

            </div>
        </div>
        <!-- /.card -->
        </div>
    </div>
</section>
