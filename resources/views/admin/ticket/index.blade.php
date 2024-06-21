@extends('admin.layout')
@section('title', 'Halaman Tiket')
@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">

        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <h5>DATA TICKET</h5>
                <div class="d-flex">
                    
                    <form action="{{ route('fillterByDate') }}" method="GET" class="d-flex mr-2">
                        <input required class="form-control" value="" type="date" name="start_date">
                        <input required class="form-control" type="date" name="end_date">
                        <button class="btn btn-success" type="submit">Fillter</button>
                    </form>
                    <form action="{{ route('tickeTexportExcel') }}" method="GET" class="d-flex mr-2">
                        <input hidden  class="form-control" value="{{request()->input("start_date")}}" type="date" name="start_date">
                        <input hidden  class="form-control" value="{{request()->input("end_date")}}" type="date" name="end_date">
                        <button class="btn btn-success" type="submit">Export</button>
                    </form>
                    <a class="btn btn-primary" href="{{ route('ticket.create') }}">create</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="datatable">
                        <thead style="background-color: red">
                            <tr style="color: white">
                                <th class="text-sm">No</th>
                                <th class="text-sm">Nama Agent</th>
                                {{-- <th class="text-sm">ID Nasa</th> --}}
                                <th class="text-sm">Tanggal</th>
                                <th class="text-sm">Nomer Ticket</th>
                                <th class="text-sm">STO</th>
                                <th class="text-sm">No Inet</th>
                                <th class="text-sm">Notel</th>
                                <th class="text-sm">Paket PCRF</th>
                                <th class="text-sm">Status</th>
                                {{-- @if (auth()->user()->role == 'apoteker' || auth()->user()->role == 'manager') --}}
                                <th>Action</th>
                                {{-- @endif --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $no => $dt)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $dt->user->nama_depan . ' ' . $dt->user->nama_belakang }}</td>
                                    {{-- <td>{{ $dt->no_inet }}</td> --}}
                                    <td>{{ $dt->created_at }}</td>
                                    <td>{{ $dt->no_tiket }}</td>
                                    <td>{{ $dt->sto }}</td>
                                    <td>{{ $dt->no_inet }}</td>
                                    <td>{{ $dt->nomer_hp }}</td>
                                    <td>{{ $dt->paket_pcrf }}</td>
                                    <td>{{ $dt->status_tiket }}</td>
                                    {{-- @if (auth()->user()->role == 'apoteker' || auth()->user()->role == 'manager') --}}
                                    <td class="text-center">
                                        {{-- <a href="{{ route('ticket.edit', $dt->id) }}" id="btn-edit"
                                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> --}}
                                        <button data-id="{{ $dt->id }}"
                                            id="btn-hapus"
                                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        <a href="{{ route('ticket.afterExecution', $dt->id) }}" id="btn-edit"
                                            class="btn btn-warning btn-sm"><i class="fas fa-door-closed"></i></a>
                                        <a href="{{ route('ticket.detail', $dt->id) }}" id="btn-edit"
                                            class="btn btn-success btn-sm"><i class="fas fa-info"></i></a>

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
    <!-- Modal detail -->
    <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
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

            $(document).on('click', '#btn-close', function() {
                const id = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Kamu Yakin?',
                    text: "Kamu Akan Close Tiket Ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Close!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: `/ticket/close/${id}`,
                            method: 'GET',
                            dataType: 'json',
                            success: function(hasil) {
                                if (hasil) {
                                    Swal.fire(
                                        'sukses',
                                        'sukses close tiket',
                                        'success'
                                    )
                                } else {
                                    Swal.fire(
                                        'Gagal',
                                        'gagal close tiket',
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
                            url: `/ticket/${id}`,
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
            $(document).on('click', '#btn-detail', function() {
                const id = $(this).data('id');
                $.ajax({
                    url: `/barang-masuk/${id}`,
                    method: 'GET',
                    dataType: 'json',
                    success: function(hasil) {
                        $(`.detail-barang`).html(`
                    <div class="modal-body">
                    <div class="form-group">
                        <label for="no_surat_jalan">Nomer Surat Jalan</label>
                        <input readonly required value="${hasil.no_surat_jalan}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="id_barang">Barang</label>
                        <input readonly required value="${hasil.barang.nama_barang}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="id_supplier">Supplier</label>
                        <input readonly required value="${hasil.supplier.nama}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="penerima">Penerima</label>
                        <input readonly required value="${hasil.penerima}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Masuk</label>
                        <input readonly required value="${hasil.jumlah}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Sebelumnya</label>
                        <input readonly required value="${hasil.jumlah_sebelumnya}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Setelahnya</label>
                        <input readonly required value="${hasil.total_stok}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label>TGL Masuk</label>
                        <input readonly required value="${hasil.created_at}"  class="form-control">
                    </div>
                </div>
               `);
                        $('#modalDetail').modal('show');
                    }
                })
            })

        })
    </script>

@stop
