@extends('layouts.v_template')
@section('title', 'Pengguna')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Pengguna</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Hak Akses</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <!-- Start Tambah Pengguna -->
        <div class="card-header">
            <!-- <a href="" data-toggle="modal" data-target="#modal-tambah" class="btn btn-success">Tambah Pengguna</a> -->
            <a href="{{route('admin-pengguna')}}" class="btn btn-success">Tambah Pengguna</a>
        </div>
        <div class="card-body">
          <!-- Tambah Modal -->
          <div class="modal fade" id="modal-tambah">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Tambah Pengguna</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form action="" method="POST" id="formtambah">
                              @csrf
                              <div class="form-group row">
                                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                  <div class="col-md-6">
                                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                      @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                  <div class="col-md-6">
                                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                      @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="hakAkses" class="col-md-4 col-form-label text-md-right">Hak Akses</label>
                                  <div class="col-md-6">
                                      <select class="custom-select @error('is_admin') is-invalid @enderror" id="is_admin">
                                          <option selected>Pilih</option>
                                          <option value="1">Admin</option>
                                          <option value="0">Petugas</option>
                                      </select>
                                      @error('is_admin')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                  <div class="col-md-6">
                                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                      @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                  <div class="col-md-6">
                                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                  </div>
                              </div>

                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                      </div>
                  </div>
                  <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif
          <!-- Start Table -->
          <table id=" " class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Status</th>
                <th>Detail</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              @foreach ($users as $data)
                <tr>
                  <td>{{ $no++}}</td>
                  <td>{{ $data->name}}</td>
                  <td>{{ $data->email}}</td>
                  <td> <span class="badge badge-<?= ($data->is_admin == '1') ? 'danger' : 'warning' ?>">{{ ($data->is_admin == '1') ? 'Admin' : 'Petugas'}}</span></td>
                  <td> 
                    <button class="btn btn-info" data-toggle="modal" data-target="#modal-info-{{$data->id}}"><i class="fas fa-info-circle"></i></button>
                    <a href="admin/pengguna/edit/{{ $data->id }}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                    <a href="admin/pengguna/hapus/{{ $data->id }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Detail</th>
                </tr>
            </tfoot>
          </table>
        </div>
          <!-- Start Detail Modal -->
          @foreach ($users as $detail)
          <div class="modal fade" id="modal-info-{{$detail->id}}">
              <div class="modal-dialog">
                  <div class="modal-content bg-info">
                      <div class="modal-header">
                          <h4 class="modal-title">Detail Pengguna</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <h4>{{$detail->name}}</h4>
                          <h6>Status : <span class="badge badge-<?= ($detail->is_admin == '1') ? 'danger' : 'warning' ?>">{{ ($detail->is_admin == '1') ? 'Admin' : 'Petugas'}}</span></h6>
                          <!-- <br> -->
                          <h6>Email : {{ $detail->email}}</h6>
                          <h6>Akun Dibuat Pada : {{ $detail->created_at}}</h6>
                          <h6>Perubahan terakhir : {{ $detail->updated_at}}</h6>

                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>

                      </div>
                  </div>
                  <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->

          </div>
          @endforeach
      </div>
    </div>
  </div>
</div>
<script>
    $("#formtambah").submit(function(e) {
        e.preventDefault();

        let name = $("#name").val();
        let email = $("#email").val();
        let is_admin = $("#is_admin").val();
        let password = $("#password").val();
        let _token = $("input[name=_token]").val();
        $.ajax({
            url: "{{ route('admin-tambah') }}",
            type: "POST",
            data: {
                name: name,
                email: email,
                is_admin: is_admin,
                password: password,
                _token: _token
            },
            success: function(response) {
                if (response) {
                    $("#userstable tbody").prepend('<tr><td>' + response.name + '</td><td>' + response.email + '</td><td>' + response.is_admin + '</td></tr>');
                    $('#formtambah')[0].reset();
                    $('#modal-tambah').modal('hide');
                }
            }
        });
    });
</script>
<script>
    $(function() {
        $("#userstable1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endsection
