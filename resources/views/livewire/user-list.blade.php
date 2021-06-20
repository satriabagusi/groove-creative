
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Pegawai</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th >#</th>
                                <th>Nama Pegawai</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Username</th>
                                <th>Aktivasi Akun?</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            @if ($user->user_role_id !== 1)
                            <tr>
                                {{-- @dump($employees) --}}
                                <td>{{$loop->index}}</td>
                                <td>{{$user->employees->name}}</td>
                                <td>{{$user->employees->email}}</td>
                                <td>{{$user->employees->phone_number}}</td>
                                <td>{{$user->username}}</td>
                                <td>
                                    <livewire:toggle-button
                                    :model="$user"
                                    field="account_status"
                                    key="{{ $user->id }}" />

                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                <div class="row justify-content-around">
                    <div class="col">
                        Halaman {{$users->currentPage()}} dari {{$users->lastPage()}} Halaman
                    </div>
                    <div class="col">
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>


