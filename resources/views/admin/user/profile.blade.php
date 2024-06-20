@extends('admin.layout')
@section('title', 'Halaman Profile')

@section('content')
    <div class="container-fluid" id="container-wrapper">

        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <h5>AGEN PROFILE</h5>
            </div>
            <div class="card-body">
                <form id="formEditData" method="post">
                    @csrf()
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input required type="type" name="nik" id="nik" class="form-control"
                                value="{{ $user->nik }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_depan">Nama Depan</label>
                            <input required type="type" name="nama_depan" id="nama_depan" class="form-control"
                                value="{{ $user->nama_depan }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_belakang">Nama Belakang</label>
                            <input required type="type" name="nama_belakang" id="nama_belakang" class="form-control"
                                value="{{ $user->nama_belakang }}">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select required name="jenis_kelamin" id="jenis_kelamin" class="custom-select">
                                <option {{ $user->jenis_kelamin === 'perempuan' ? 'selected' : '' }} value="perempuan">
                                    Perempuan
                                </option>
                                <option {{ $user->jenis_kelamin === 'laki-laki' ? 'selected' : '' }} value="laki-laki">
                                    Laki-Laki
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="perusahaan">Perusahaan</label>
                            <input required type="type" name="perusahaan" id="perusahaan" class="form-control"
                                value="{{ $user->perusahaan }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input required type="type" name="email" id="email" class="form-control"
                                value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <button type="button" data-id="{{ $user->user_id }}" id="btn-change-password"
                                class="btn btn-warning btn-sm"><i class="fas fa-unlock-alt mr-2"></i>Edit Password?</button>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input required type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                                value="{{ $user->tanggal_lahir }}">
                        </div>
                        <div class="form-group">
                            <label for="nomer_hp">Nomer HP</label>
                            <input required type="text" name="nomer_hp" id="nomer_hp" class="form-control"
                                value="{{ $user->nomer_hp }}">
                        </div>
                        <div class="form-group">
                            <label for="domisili">Alamat Domisili</label>
                            <textarea required class="form-control" name="domisili" id="domisili" cols="30" rows="3">{{ $user->domisili }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
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
