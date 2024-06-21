@extends('admin.layout')
@section('title', 'Halaman User')
@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">

        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <h5>DATA ROLE</h5>
                @if (auth()->user()->role == 'supervisor')
                    <button data-toggle="modal" data-target="#modalTambahData" class="btn btn-success btn-sm">Tambah</button>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="datatable">
                        <thead style="background-color: red">
                            <tr style="color: white">
                                <th>No</th>
                                <th>Nama Role</th>
                                {{-- <th>NIK</th> --}}
                                <th>Role</th>
                                <th>Status Aktif</th>
                                {{-- <th>Avatar</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $no => $dt)
                                <tr>
                                    <td class="align-middle">{{ $no + 1 }}</td>
                                    <td class="align-middle">{{ $dt->nama }}</td>
                                    {{-- <td class="align-middle">{{ $dt->nik }}</td> --}}
                                    <td class="align-middle">{{ $dt->role }}</td>
                                    <td class="align-middle">{{ $dt->status_aktif }}</td>
                                    {{-- <td><img width="50"
                                            src="{{ $dt->avatar ? env('APP_URL') . $dt->avatar : 'https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png' }}"
                                            alt="user image"></td> --}}
                                    <td class="text-center">
                                        <button data-id="{{ $dt->id }}" id="btn-edit"
                                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                                        <button data-id="{{ $dt->id }}" id="btn-hapus"
                                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        {{-- <button data-id="{{ $dt->id }}" id="btn-change-password"
                                            class="btn btn-warning btn-sm"><i class="fas fa-unlock-alt"></i></button> --}}
                                    </td>
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
                            <label for="nama">Nama</label>
                            <input required type="type" name="nama" id="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="type" name="role" id="role" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="status_aktif">Status Aktif</label>
                            <select required name="status_aktif" id="status_aktif" class="custom-select">
                                <option value="" disabled hidden selected>-- Piliih Status Aktif --</option>
                                <option value="aktif">Aktif</option>
                                <option value="tidak">Tidak</option>
                            </select>
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
    <!-- modal edit data -->
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
    <!-- Modal detail -->
    <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body detail-barang">

                </div>
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
                const data = new FormData(document.querySelector('#formTambah'));

                $.ajax({
                    url: '/role',
                    data: data,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: true,
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
                            url: `/role/${id}`,
                            method: 'delete',
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            dataType: 'json',
                            success: function(hasil) {
                                console.log(hasil);
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

            $(document).on('click', '#btn-edit', function() {
                const id = $(this).data('id');
                $.ajax({
                    url:`/role/${id}`,
                    method: 'GET',
                    dataType: 'json',
                    success: function(hasil) {
                        $("#formEditData").html(`
                    @csrf()
                    <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="type" name="nama" id="nama" value="${hasil.nama}" class="form-control">
                        <input type="hidden" id="id" value="${hasil.id}">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="type" name="role" id="role" value="${hasil.role}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="status_aktif">Status Aktif</label>
                        <select name="status_aktif" id="status_aktif" class="custom-select">
                            <option value="" disabled hidden selected>-- Piliih Status Aktif --</option>
                            <option ${hasil.status_aktif === 'aktif'?'selected':''} value="aktif">Aktif</option>
                            <option ${hasil.status_aktif === 'tidak'?'selected':''} value="tidak">Tidak</option>
                        </select>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
               `);
                        $('#btn-edit-image').on('click', function() {
                            $('#box-image').html(``);
                            $('#box-image').html(
                               `<input class="form-control-file mt-3" required="" type="file" name="avatar" class="form-control">`
                            );
                        })
                        $("#modalEdit").modal('show');
                    }
                })
            })
            // <div class="form-group">
            //                 <label for="nomer_tlpn">Nomer Telepon</label>
            //                <input type="type" name="text" id="nomer_tlpn" value="${hasil.nomer_tlpn}" class="form-control">
            //             </div>
            // <div class="form-group">
            //             <label class="d-block">Image</label>
            //             <img class="d-block" width="150" src="{{ env('APP_URL') }}${hasil.avatar}" alt="image sub">
            //             <div id="box-image">
            //                 <button type="button" id="btn-edit-image" class="mt-2 btn btn-primary btn-sm">Ganti gambar</button>
            //             </div>
            //         </div>
            

        })
    </script>

@stop
