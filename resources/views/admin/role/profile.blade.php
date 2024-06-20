@extends('admin.layout')
@section('title', 'Halaman Profile')

@section('content')
    <div class="container-fluid" id="container-wrapper">

        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <h5>USER PROFILE</h5>
            </div>
            <div class="card-body">
                <form id="formEditData" method="post">
                    @csrf()
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input readonly required type="type" name="nik" id="nik" class="form-control"
                                value="{{ $user->nik }}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input readonly type="type" name="nama" id="nama" class="form-control"
                                value="{{ $user->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Role</label>
                            <input readonly type="type" name="nama" id="nama" class="form-control"
                                value="{{ $user->role }}">
                        </div>
                        <div class="form-group">
                            <button type="button" data-id="{{ $user->id }}" id="btn-change-password"
                                class="btn btn-warning btn-sm"><i class="fas fa-unlock-alt mr-2"></i>Edit Password?</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

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
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {

            //check if barang jika tidak ada di data barang
            $(document).on('change', '#kode_obat', function() {
                const value = $(this).val();
                if (value === 'lainnya') {
                    location.href = "/obat-masuk"
                    // $('#modalTambahData').modal('show');
                }
            })
            //end


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
            //end

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
@endsection
