@extends('admin.layout')
@section('title', 'Halaman Customer')
@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">

        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <h5>DATA AGENT</h5>
                <button data-toggle="modal" data-target="#modalTambahData" class="btn btn-success btn-sm">Tambah</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Email</th>
                                <th>perusahaan</th>
                                <th>Kordinator</th>
                                <th>Manajer</th>
                                <th>Summery Ticket</th>
                                {{-- @if (auth()->user()->role == 'kasir' || auth()->user()->role == 'manager') --}}
                                <th>Action</th>
                                {{-- @endif --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agents as $no => $dt)
                                @php
                                    $totalTiket = \App\Models\Ticket::where('agent_id', $dt->id)
                                        ->get()
                                        ->count();
                                @endphp
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $dt->nama_depan . ' ' . $dt->nama_belakang }}</td>
                                    <td>{{ $dt->nik }}</td>
                                    <td>{{ $dt->email }}</td>
                                    <td>{{ $dt->perusahaan }}</td>
                                    <td>{{ $dt->user->nama }}</td>
                                    <td>{{ $dt->user->nama }}</td>
                                    <td>{{ $totalTiket }}</td>
                                    {{-- @if (auth()->user()->role == 'kasir' || auth()->user()->role == 'manager') --}}
                                    <td class="text-center">
                                        <button data-id="{{ $dt->id }}" id="btn-edit"
                                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                                        <button data-id="{{ $dt->id }}" id="btn-hapus"
                                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        <button data-id="{{ $dt->user_id }}" id="btn-change-password"
                                            class="btn btn-warning btn-sm"><i class="fas fa-unlock-alt"></i></button>
                                    </td>
                                    {{-- @endif --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!---Container Fluid-->
    </div>
@stop

@section('modal')
    <!-- Modal change password -->
    <div class="modal fade" id="modalUbahPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formUbahPassword" method="post">

                </form>
            </div>
        </div>
    </div>
    <!-- Modal tambah -->
    <div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formTambah" method="post">
                    @csrf()
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input required type="type" name="nik" id="nik" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama_depan">Nama Depan</label>
                            <input required type="type" name="nama_depan" id="nama_depan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama_belakang">Nama Belakang</label>
                            <input required type="type" name="nama_belakang" id="nama_belakang" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select required name="jenis_kelamin" id="jenis_kelamin" class="custom-select">
                                <option value="" disabled hidden selected>-- Piliih Jenis Kelamin --</option>
                                <option value="perempuan">Perempuan</option>
                                <option value="laki-laki">Laki-Laki</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="perusahaan">Perusahaan</label>
                            <input required type="type" name="perusahaan" id="perusahaan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input required type="type" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input required type="type" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input required type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input required type="text" name="jabatan" id="jabatan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nomer_hp">Nomer HP</label>
                            <input required type="text" name="nomer_hp" id="nomer_hp" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="domisili">Alamat Domisili</label>
                            <textarea required class="form-control" name="domisili" id="domisili" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal tambah -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formEditData" method="post" enctype="multipart/form-data">

                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //datatable
            let table = $('#datatable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                async: true
            })
            //add data
            $(document).on('submit', '#formTambah', function(e) {
                e.preventDefault();
                const data = $(this).serialize();


                $.ajax({
                    url: `/user`,
                    method: 'post',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        nik,
                        checknik: true
                    },
                    dataType: 'json',
                    success: function(hasil) {
                        if (hasil) {
                            Swal.fire(
                                'Opss',
                                'nik already exists',
                                'warning'
                            )
                            return false;
                        } else {

                            $.ajax({
                                url: '/agent',
                                data: data,
                                dataType: 'json',
                                type: 'post',
                                success: function(hasil) {
                                    if (hasil) {
                                        $('#modalTambah').modal('hide')
                                        Swal.fire(
                                            'sukses',
                                            'sukses menambah data',
                                            'success'
                                        )
                                    } else {
                                        Swal.fire(
                                            'Gagal',
                                            'gagal menambah data',
                                            'error'
                                        )
                                    }

                                    setTimeout(() => {
                                        location.reload();
                                    }, 800);
                                }
                            })
                        }
                    }
                })


            })
            //end


            $(document).on('click', '#btn-hapus', function() {
                const id = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Kamu Yakin?',
                    text: "Kamu Akan Menghapus Data Ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: `/agent/${id}`,
                            method: 'delete',
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            dataType: 'json',
                            success: function(hasil) {
                                if (hasil) {
                                    Swal.fire(
                                        'sukses',
                                        'sukses hapus data',
                                        'success'
                                    )
                                } else {
                                    Swal.fire(
                                        'Gagal',
                                        'gagal hapus data',
                                        'error'
                                    )
                                }
                                setTimeout(() => {
                                    location.reload();
                                }, 800);
                            }
                        })
                    }
                })
            })
            //btn show data
            $(document).on('click', '#btn-edit', function() {
                const id = $(this).data('id');
                $.ajax({
                    url: `/agent/${id}`,
                    method: 'GET',
                    dataType: 'json',
                    success: function(hasil) {
                        console.log(hasil);
                        $(`#formEditData`).html(`
                    @csrf()
=                        <div class="modal-body">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input required type="type" name="nik" id="nik" class="form-control" value="${hasil.nik}">
                            <input required type="hidden" id="id" class="form-control" value="${hasil.id}">
                        </div>
                        <div class="form-group">
                            <label for="nama_depan">Nama Depan</label>
                            <input required type="type" name="nama_depan" id="nama_depan" class="form-control" value="${hasil.nama_depan}">
                        </div>
                        <div class="form-group">
                            <label for="nama_belakang">Nama Belakang</label>
                            <input required type="type" name="nama_belakang" id="nama_belakang" class="form-control" value="${hasil.nama_belakang}">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select required name="jenis_kelamin" id="jenis_kelamin" class="custom-select">
                                <option  ${hasil.jenis_kelamin === 'perempuan'?'selected':''} value="perempuan">Perempuan</option>
                                <option ${hasil.jenis_kelamin === 'laki-laki'?'selected':''} value="laki-laki">Laki-Laki</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="perusahaan">Perusahaan</label>
                            <input required type="type" name="perusahaan" id="perusahaan" class="form-control" value="${hasil.perusahaan}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input required type="type" name="email" id="email" class="form-control" value="${hasil.email}">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input required type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="${hasil.tanggal_lahir}">
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input required type="text" name="jabatan" id="jabatan" class="form-control" value="${hasil.jabatan}">
                        </div>
                        <div class="form-group">
                            <label for="nomer_hp">Nomer HP</label>
                            <input required type="text" name="nomer_hp" id="nomer_hp" class="form-control" value="${hasil.nomer_hp}">
                        </div>
                        <div class="form-group">
                            <label for="domisili">Alamat Domisili</label>
                            <textarea required class="form-control" name="domisili" id="domisili" cols="30" rows="3">${hasil.domisili}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
               `);
                        $('#modalEdit').modal('show');
                    }
                })
            })
            //edit data
            $(document).on('submit', '#formEditData', function(e) {
                e.preventDefault();
                const id = $('#id').val();
                $.ajax({
                    url: '/agent/' + id,
                    data: $(this).serialize(),
                    dataType: 'json',
                    method: "PUT",
                    success: function(hasil) {
                        if (hasil) {
                            $('#modalEdit').modal('hide');
                            Swal.fire(
                                'sukses',
                                'sukses edit data',
                                'success'
                            )
                        } else {
                            Swal.fire(
                                'Gagal',
                                'gagal edit data',
                                'error'
                            )
                        }
                        setTimeout(() => {
                            location.reload();
                        }, 800);
                    }
                })
            })

            //show modal update password
            $(document).on("click", "#btn-change-password", function(e) {
                const id = $(this).data('id');

                $("#formUbahPassword").html(`@csrf()
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="password_lama">Password Lama</label>
                            <input required type="type" name="password_lama" id="password_lama" class="form-control">
                            <input required type="hidden" name="user_id" value="${id}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <input type="type" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input type="type" name="password_confirmation" id="password_confirmation"
                                class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>`)
                $("#modalUbahPassword").modal("show")
            })
            //update password
            $(document).on('submit', '#formUbahPassword', function(e) {
                e.preventDefault();
                const id = $(this).data('id');

                let data = $(this).serialize()

                $.ajax({
                    url: `{{ route('checkPassword') }}`,
                    method: 'POST',
                    data: data,
                    dataType: 'json',
                    success: function(isMatch) {

                        if (isMatch) {
                            if ($('#password_confirmation').val() != $("#password").val()) {
                                Swal.fire(
                                    'Opss',
                                    'Password tidak sama',
                                    'warning'
                                )
                                return false;
                            } else {
                                $.ajax({
                                    url: `{{ route('updatePassword') }}`,
                                    data: data,
                                    method: 'POST',
                                    dataType: 'json',
                                    success: function(hasil) {
                                        if (hasil) {
                                            $('#modalUbahPassword').modal('hide')
                                            Swal.fire(
                                                'sukses',
                                                'sukses ubah password',
                                                'success'
                                            )
                                        } else {
                                            Swal.fire(
                                                'Gagal',
                                                'gagal ubah password',
                                                'error'
                                            )
                                        }
                                    }
                                })
                            }

                        } else {
                            Swal.fire(
                                'Opss',
                                'Password lama tidak sesuai',
                                'warning'
                            )
                            return false;
                        }
                    }
                })


            })
        })
    </script>

@stop
