@extends('admin.layout')
@section('title', 'Halaman Tambah Tiket')

@section('content')
    <div class="container-fluid" id="container-wrapper">

        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <h5>TAMBAH TIKET</h5>
            </div>
            <div class="card-body">
                <form id="formTambah" method="post">
                    @csrf()
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_id">Agent</label>
                                    <select required name="user_id" id="user_id" class="form-control">
                                        <option value="" disabled selected hidden>-- Pilih Agent --</option>
                                        @foreach ($agents as $agent)
                                        @if(auth()->user()->role == "agent")
                                            <option {{auth()->user()->id == $agent->user_id ? "selected":""}}  value="{{ $agent->id }}">
                                                {{ $agent->nama_depan . ' ' . $agent->nama_belakang }}
                                            </option>
                                        @else
                                            <option  value="{{ $agent->id }}">
                                                {{ $agent->nama_depan . ' ' . $agent->nama_belakang }}
                                            </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <p><b class="text-danger">INSERA</b></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_tiket">Nomer Tiket</label>
                                            <input required type="text" name="no_tiket" id="no_tiket"
                                                class="form-control">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_inet">Nomer Inet</label>
                                            <input required type="number" name="no_inet" id="no_inet"
                                                class="form-control">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nomer_hp">Nomer Telepon</label>
                                    <input required type="text" name="nomer_hp" id="nomer_hp" class="form-control">
                                    <span class="alert-obat-kosong text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="witel">Witel</label>
                                    <select name="witel" id="witel" class="custom-select">
                                        <option value="" disabled hidden selected>-- Piliih Witel --</option>
                                        <option value="JAKBAR">JAKBAR</option>
                                        <option value="JAKSEL">JAKSEL</option>
                                        <option value="JAKTIM">JAKTIM</option>
                                        <option value="BANTEN">BANTEN</option>
                                        <option value="BOGOR">BOGOR</option>
                                        <option value="JAKPUS">JAKPUS</option>
                                        <option value="JAKUT">JAKUT</option>
                                        <option value="TANGGERANG">TANGGERANG</option>
                                        <option value="BEKASI">BEKASI</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sto">STO</label>
                                    <select name="sto" id="sto" class="custom-select">
                                        <option value="" disabled hidden selected>-- Piliih STO --</option>
                                        @foreach ($listSTO as $sto)
                                            <option value="{{ $sto }}">
                                                {{ $sto }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <p><b class="text-danger">GALDIUS</b></p>
                                <div class="form-group">
                                    <label for="paket_pcrf">Paket PCRF (solis)</label>
                                    <input required type="text" name="paket_pcrf" id="paket_pcrf" class="form-control">
                                    <span class="alert-obat-kosong text-danger"></span>
                                </div>
                                <p><b class="text-danger">ACS</b></p>
                                <div class="form-group">
                                    <label for="">Status USEETV</label><br>
                                    <input checked type="radio" name="status_usetv" value="ok">
                                    <label class="mr-2" for="html">OK</label>
                                    <input type="radio" name="status_usetv" value="nok">
                                    <label class="mr-2" for="css">NOK</label>
                                    <input type="radio" name="status_usetv" value="no">
                                    <label for="javascript">TIDAK ADA LAYANAN USEETV</label>
                                </div>
                                <p><b class="text-success">LOG BEFORE EXECUTION</b></p>
                                {{-- second --}}
                                <p><b class="text-danger">MENU OLT</b></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="rx_olt">RX OLT</label>
                                            <input required type="text" name="rx_olt" id="rx_olt"
                                                class="form-control">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="rx_onu">RX Unu</label>
                                            <input required type="text" name="rx_onu" id="rx_onu"
                                                class="form-control">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="temp_ont">Temperature ONT</label>
                                    <input required type="text" name="temp_ont" id="temp_ont" class="form-control">
                                    <span class="alert-obat-kosong text-danger"></span>
                                </div>
                                <p><b class="text-danger">MENU ONT</b></p>
                                <div class="form-group">
                                    <label for="">Status ACS</label><br>
                                    <input checked type="radio" name="status_acs" value="ok">
                                    <label class="mr-2" for="html">OK</label>
                                    <input type="radio" name="status_acs" value="nok">
                                    <label class="mr-2" for="css">NOK</label>
                                </div>
                                <div class="form-group">
                                    <label for="wifi_config">WIFI Config (Dual Bend)</label>
                                    <select name="wifi_config" id="wifi_config" class="custom-select">
                                        <option value="" disabled hidden selected>-- Piliih Wifi Config --</option>
                                        <option value="2.4GHz">2.4GHz</option>
                                        <option value="2.4GHz/5GHz - Single SSID">2.4GHz/5GHz - Single SSID</option>
                                        <option value="2.4GHz/5GHz - Dual SSID">2.4GHz/5GHz - Dual SSID</option>
                                        <option value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="conn_state">Connection State</label>
                                    <select name="conn_state" id="conn_state" class="custom-select">
                                        <option value="" disabled hidden selected>-- Piliih Connection State --
                                        </option>
                                        <option value="CONNECTED">CONNECTED</option>
                                        <option value="DISCONNECTED">DISCONNECTED</option>
                                        <option value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ext_ip">External IP Address</label>
                                    <select name="ext_ip" id="ext_ip" class="custom-select">
                                        <option value="" disabled hidden selected>-- Piliih Connection State --
                                        </option>
                                        <option value="IPV4">IPV4</option>
                                        <option value="IPV6">IPV6</option>
                                        <option value="IPV4/IPV6">IPV4/IPV6</option>
                                        <option value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="chanel_use">Channel In USE</label>
                                    <select name="chanel_use" id="chanel_use" class="custom-select">
                                        <option value="" disabled hidden selected>-- Piliih Channel In Use --
                                        </option>
                                        <option value="1">auto</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="interference">Interference</label>
                                    <select name="interference" id="interference" class="custom-select">
                                        <option value="" disabled hidden selected>-- Piliih Connection State --
                                        </option>
                                        <option value="TIDAK INTERFERENCE">TIDAK INTERFERENCE</option>
                                        <option value="INTERFERENCE">INTERFERENCE</option>
                                        <option value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="phone_state">Phone State</label>
                                    <select name="phone_state" id="phone_state" class="custom-select">
                                        <option value="" disabled hidden selected>-- Piliih Phone State --
                                        </option>
                                        <option value="REGISTERED">REGISTERED</option>
                                        <option value="UNREGISTER">UNREGISTER</option>
                                        <option value="REGISTERING">REGISTERING</option>
                                        <option value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><b class="text-danger">MENU CUSTOMER</b></p>
                                        <div class="form-group">
                                            <label for="">Customer Status</label><br>
                                            <input checked type="radio" name="status_customer" value="enable">
                                            <label class="mr-2" for="html">ENABLE</label>
                                            <input type="radio" name="status_customer" value="disable">
                                            <label class="mr-2" for="css">DISABLE</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="radius_package">Radius Package</label>
                                            <input required type="text" name="radius_package" id="radius_package"
                                                class="form-control">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="pcrf_package">PCRF Package</label>
                                            <input required type="text" name="pcrf_package" id="pcrf_package"
                                                class="form-control">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="reference_profile">Reference Profile</label>
                                            <input required type="text" name="reference_profile"
                                                id="reference_profile" class="form-control">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="current_profile">Current Profile</label>
                                            <input required type="text" name="current_profile" id="current_profile"
                                                class="form-control">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                        <p><b class="text-danger">STB</b></p>
                                        <div class="form-group">
                                            <label for="nama_model">Model Name</label>
                                            <input required type="text" name="nama_model" id="nama_model"
                                                class="form-control">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="version">Version</label>
                                            <input required type="text" name="version" id="version"
                                                class="form-control">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p><b class="text-danger">ONT</b></p>
                                        <div class="form-group">
                                            <label for="onu_type">Onu Type</label>
                                            <input required type="text" name="onu_type" id="onu_type"
                                                class="form-control">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="version_id">Version ID</label>
                                            <input required type="text" name="version_id" id="version_id"
                                                class="form-control">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                    </div>

                                </div>




                                <br><br><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><b class="text-danger">ONT LAND INFORMATION</b></p>
                                        <div class="form-group">
                                            <label for="dns_server">DNS Server</label>
                                            <select name="dns_server" id="dns_server" class="custom-select">
                                                <option value="" disabled hidden selected>-- Piliih DNS Server --
                                                </option>
                                                <option value="PUBLIC">PUBLIC</option>
                                                <option value="PRIVATE">PRIVATE</option>
                                                <option value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                            </select>
                                        </div>
                                        <p><b class="text-danger">ONT SPEED TEST</b></p>
                                        <div class="form-group">
                                            <label for="speed_test">Speed Test</label>
                                            <select name="speed_test" id="speed_test" class="custom-select">
                                                <option value="" disabled hidden selected>-- Piliih Speed Test --
                                                </option>
                                                <option value="DOWNLOAD - UPLOAD | OK">DOWNLOAD - UPLOAD | OK</option>
                                                <option value="DOWNLOAD - UPLOAD | NOK">DOWNLOAD - UPLOAD | NOK</option>
                                                <option value="DOWNLOAD NOK - UPLOAD OK">DOWNLOAD NOK - UPLOAD OK</option>
                                                <option value="DOWNLOAD OK - UPLOAD NOK">DOWNLOAD OK - UPLOAD NOK</option>
                                                <option value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                            </select>
                                        </div>
                                        <p><b class="text-danger">ONT PINGHOST</b></p>
                                        <div class="form-group">
                                            <label for="rate_success">Rate Success</label>
                                            <select name="rate_success" id="rate_success" class="custom-select">
                                                <option value="" disabled hidden selected>-- Piliih Rate Success --
                                                </option>
                                                <option value="DOWNLOAD - UPLOAD | OK">DOWNLOAD - UPLOAD | OK</option>
                                                <option value="DOWNLOAD - UPLOAD | NOK">DOWNLOAD - UPLOAD | NOK</option>
                                                <option value="DOWNLOAD NOK - UPLOAD OK">DOWNLOAD NOK - UPLOAD OK</option>
                                                <option value="DOWNLOAD OK - UPLOAD NOK">DOWNLOAD OK - UPLOAD NOK</option>
                                                <option value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                            </select>
                                        </div>
                                        <p><b class="text-danger">ON TRAFFICC GRAPH</b></p>
                                        <div class="form-group">
                                            <label for="">WAN TRafficc</label><br>
                                            <input checked type="radio" name="wan_trafic" value="ok">
                                            <label class="mr-2" for="html">OK</label>
                                            <input type="radio" name="wan_trafic" value="nok">
                                            <label class="mr-2" for="css">NOK</label>
                                            <input type="radio" name="wan_trafic" value="no">
                                            <label class="mr-2" for="css">TIDAK BISA DIUKUR</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="">LAN TRafficc</label><br>
                                            <input checked type="radio" name="lan_trafic" value="ok">
                                            <label class="mr-2" for="html">OK</label>
                                            <input type="radio" name="lan_trafic" value="nok">
                                            <label class="mr-2" for="css">NOK</label>
                                            <input type="radio" name="lan_trafic" value="no">
                                            <label class="mr-2" for="css">TIDAK BISA DIUKUR</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlan">WLAN</label>
                                                    <input required type="number" name="wlan" id="wlan"
                                                        class="form-control">
                                                    <span class="alert-obat-kosong text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="lan">LAN</label>
                                                    <input required type="number" name="lan" id="lan"
                                                        class="form-control">
                                                    <span class="alert-obat-kosong text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <p><b class="text-danger">ON CLIENTS</b></p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cpu">CPU</label>
                                                    <input required type="number" name="cpu" id="cpu"
                                                        class="form-control">
                                                    <span class="alert-obat-kosong text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="memory">MEMORY</label>
                                                    <input required type="number" name="memory" id="memory"
                                                        class="form-control">
                                                    <span class="alert-obat-kosong text-danger"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="firewall_level">Firewall Level</label>
                                            <select name="firewall_level" id="firewall_level" class="custom-select">
                                                <option value="" disabled hidden selected>-- Piliih Phone State --
                                                </option>
                                                <option value="HIGH">HIGH</option>
                                                <option value="HIGH">HIGH</option>
                                                <option value="LOW">LOW</option>
                                                <option value="CUSTOMER">CUSTOMER</option>
                                                <option value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>



                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-secondary" href="/ticket">Back</a>
                            <button id="btn-add" type="submit" class="btn btn-primary">Save</button>
                        </div>
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


            $(document).on('submit', '#formTambah', function(e) {
                e.preventDefault();
                const data = $(this).serialize();

                $.ajax({
                    url: '/ticket',
                    data: data,
                    dataType: 'json',
                    type: 'post',
                    success: function(hasil) {
                        console.log(hasil);
                        // if (hasil) {
                        //     $('#modalTambah').modal('hide')
                        //     Swal.fire(
                        //         'sukses',
                        //         'sukses menambah data',
                        //         'success'
                        //     ).then(() => {
                        //         document.location.href = '/ticket';
                        //     })
                        // } else {
                        //     Swal.fire(
                        //         'Gagal',
                        //         'gagal menambah data',
                        //         'error'
                        //     )
                        // }
                    }
                })
            })
            //end

            //check stok
            $(document).on('keyup change', '#jumlah', function() {
                const kode_obat = $('#kode_obat').val();
                var jumlah_masuk = $('#jumlah').val();
                $('.alert-obat-kosong').html(``);
                if (kode_obat === undefined || kode_obat === '' || kode_obat === null) {
                    $('.alert-obat-kosong').html(`Obat Harus Di Pilih Dahulu`);
                    $('#btn-add').attr('disabled', 'disabled');
                    return false;
                }
                $.ajax({
                    url: '/obat-masuk',
                    data: {
                        checkStok: true,
                        kode_obat,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    type: 'post',
                    success: function(result) {
                        let jumlah = result.jumlah;
                        $('#jumlah_sebelumnya').val(jumlah);
                        const total = parseInt(jumlah) + parseInt(jumlah_masuk);
                        $('#total_stok').val(total);
                        $('#satuan').val(result.satuan.satuan)
                    }
                })
            })
        })
    </script>
@endsection
