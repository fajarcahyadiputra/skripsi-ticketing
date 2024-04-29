@extends('admin.layout')
@section('title', 'Halaman After Execution')

@section('content')
    <div class="container-fluid" id="container-wrapper">

        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <h5>AFTER LOG EXECUTION</h5>
            </div>
            <div class="card-body">
                <form id="formTambah" method="post">
                    @csrf()
                    <input required type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><b class="text-success">LOG AFTER EXECUTION</b></p>
                                {{-- second --}}
                                <p><b class="text-danger">MENU OLT</b></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="rx_olt">RX OLT</label>
                                            <input required type="text" name="rx_olt" id="rx_olt"
                                                class="form-control" value="{{ $logExecution->rx_olt }}">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="rx_onu">RX Unu</label>
                                            <input required type="text" name="rx_onu" id="rx_onu"
                                                class="form-control" value="{{ $logExecution->rx_onu }}">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="temp_ont">Temperature ONT</label>
                                    <input required type="text" name="temp_ont" id="temp_ont" class="form-control"
                                        value="{{ $logExecution->temp_ont }}">
                                    <span class="alert-obat-kosong text-danger"></span>
                                </div>
                                <p><b class="text-danger">MENU ONT</b></p>
                                <div class="form-group">
                                    <label for="">Status ACS</label><br>
                                    <input {{ $logExecution->status_acs == 'ok' ? 'checked' : '' }} type="radio"
                                        name="status_acs" value="ok">
                                    <label class="mr-2" for="html">OK</label>
                                    <input {{ $logExecution->status_acs == 'nok' ? 'checked' : '' }} type="radio"
                                        name="status_acs" value="nok">
                                    <label class="mr-2" for="css">NOK</label>
                                </div>
                                <div class="form-group">
                                    <label for="wifi_config">WIFI Config (Dual Bend)</label>
                                    <select name="wifi_config" id="wifi_config" class="custom-select">
                                        <option value="" disabled hidden selected>-- Piliih Wifi Config --</option>
                                        <option {{ $logExecution->wifi_config == '2.4GHz' ? 'selected' : '' }}
                                            value="2.4GHz">2.4GHz</option>
                                        <option
                                            {{ $logExecution->wifi_config == '2.4GHz/5GHz - Single SSID' ? 'selected' : '' }}
                                            value="2.4GHz/5GHz - Single SSID">2.4GHz/5GHz - Single SSID</option>
                                        <option
                                            {{ $logExecution->wifi_config == '2.4GHz/5GHz - Dual SSID' ? 'selected' : '' }}
                                            value="2.4GHz/5GHz - Dual SSID">2.4GHz/5GHz - Dual SSID</option>
                                        <option {{ $logExecution->wifi_config == 'TIDAK BISA DIUKUR' ? 'selected' : '' }}
                                            value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="conn_state">Connection State</label>
                                    <select name="conn_state" id="conn_state" class="custom-select">
                                        <option value="" disabled hidden selected>-- Piliih Connection State --
                                        </option>
                                        <option {{ $logExecution->conn_state == 'CONNECTED' ? 'selected' : '' }}
                                            value="CONNECTED">CONNECTED</option>
                                        <option {{ $logExecution->conn_state == 'DISCONNECTED' ? 'selected' : '' }}
                                            value="DISCONNECTED">DISCONNECTED</option>
                                        <option {{ $logExecution->conn_state == 'TIDAK BISA DIUKUR' ? 'selected' : '' }}
                                            value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ext_ip">External IP Address</label>
                                    <select name="ext_ip" id="ext_ip" class="custom-select">
                                        <option value="" disabled hidden selected>-- Piliih Connection State --
                                        </option>
                                        <option {{ $logExecution->ext_ip == 'IPV4' ? 'selected' : '' }} value="IPV4">
                                            IPV4</option>
                                        <option {{ $logExecution->ext_ip == 'IPV6' ? 'selected' : '' }} value="IPV6">
                                            IPV6</option>
                                        <option {{ $logExecution->ext_ip == 'IPV4/IPV6' ? 'selected' : '' }}
                                            value="IPV4/IPV6">IPV4/IPV6</option>
                                        <option {{ $logExecution->ext_ip == 'TIDAK BISA DIUKUR' ? 'selected' : '' }}
                                            value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="chanel_use">Channel In USE</label>
                                    <select name="chanel_use" id="chanel_use" class="custom-select">
                                        <option value="" disabled hidden selected>-- Piliih Channel In Use --
                                        </option>
                                        <option {{ $logExecution->chanel_use == 1 ? 'selected' : '' }} value="1">
                                            auto
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="interference">Interference</label>
                                    <select name="interference" id="interference" class="custom-select">
                                        <option value="" disabled hidden selected>-- Piliih Connection State --
                                        </option>
                                        <option {{ $logExecution->interference == 'TIDAK INTERFERENCE' ? 'selected' : '' }}
                                            value="TIDAK INTERFERENCE">TIDAK INTERFERENCE</option>
                                        <option {{ $logExecution->interference == 'INTERFERENCE' ? 'selected' : '' }}
                                            value="INTERFERENCE">INTERFERENCE</option>
                                        <option {{ $logExecution->interference == 'TIDAK BISA DIUKUR' ? 'selected' : '' }}
                                            value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="phone_state">Phone State</label>
                                    <select name="phone_state" id="phone_state" class="custom-select">
                                        <option value="" disabled hidden selected>-- Piliih Phone State --
                                        </option>
                                        <option {{ $logExecution->phone_state == 'REGISTERED' ? 'selected' : '' }}
                                            value="REGISTERED">REGISTERED</option>
                                        <option {{ $logExecution->phone_state == 'UNREGISTER' ? 'selected' : '' }}
                                            value="UNREGISTER">UNREGISTER</option>
                                        <option {{ $logExecution->phone_state == 'REGISTERING' ? 'selected' : '' }}
                                            value="REGISTERING">REGISTERING</option>
                                        <option {{ $logExecution->phone_state == 'TIDAK BISA DIUKUR' ? 'selected' : '' }}
                                            value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="row">
                                    <div class="col-md-6">
                                        <p><b class="text-danger">ONT LAND INFORMATION</b></p>
                                        <div class="form-group">
                                            <label for="dns_server">DNS Server</label>
                                            <select name="dns_server" id="dns_server" class="custom-select">
                                                <option value="" disabled hidden selected>-- Piliih DNS Server --
                                                </option>
                                                <option {{ $logExecution->dns_server == 'PUBLIC' ? 'selected' : '' }}
                                                    value="PUBLIC">PUBLIC</option>
                                                <option {{ $logExecution->dns_server == 'PRIVATE' ? 'selected' : '' }}
                                                    value="PRIVATE">PRIVATE</option>
                                                <option
                                                    {{ $logExecution->dns_server == 'TIDAK BISA DIUKUR' ? 'selected' : '' }}
                                                    value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                            </select>
                                        </div>
                                        <p><b class="text-danger">ONT SPEED TEST</b></p>
                                        <div class="form-group">
                                            <label for="speed_test">Speed Test</label>
                                            <select name="speed_test" id="speed_test" class="custom-select">
                                                <option value="" disabled hidden selected>-- Piliih Speed Test --
                                                </option>
                                                <option
                                                    {{ $logExecution->speed_test == 'DOWNLOAD - UPLOAD | OK' ? 'selected' : '' }}
                                                    value="DOWNLOAD - UPLOAD | OK">DOWNLOAD - UPLOAD | OK</option>
                                                <option
                                                    {{ $logExecution->speed_test == 'DOWNLOAD - UPLOAD | NOK' ? 'selected' : '' }}
                                                    value="DOWNLOAD - UPLOAD | NOK">DOWNLOAD - UPLOAD | NOK</option>
                                                <option
                                                    {{ $logExecution->speed_test == 'DOWNLOAD NOK - UPLOAD OK' ? 'selected' : '' }}
                                                    value="DOWNLOAD NOK - UPLOAD OK">DOWNLOAD NOK - UPLOAD OK</option>
                                                <option
                                                    {{ $logExecution->speed_test == 'DOWNLOAD OK - UPLOAD NOK' ? 'selected' : '' }}
                                                    value="DOWNLOAD OK - UPLOAD NOK">DOWNLOAD OK - UPLOAD NOK</option>
                                                <option
                                                    {{ $logExecution->speed_test == 'TIDAK BISA DIUKUR' ? 'selected' : '' }}
                                                    value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                            </select>
                                        </div>
                                        <p><b class="text-danger">ONT PINGHOST</b></p>
                                        <div class="form-group">
                                            <label for="rate_success">Rate Success</label>
                                            <select name="rate_success" id="rate_success" class="custom-select">
                                                <option value="" disabled hidden selected>-- Piliih Rate Success --
                                                </option>
                                                <option
                                                    {{ $logExecution->speed_test == 'DOWNLOAD - UPLOAD | OK' ? 'selected' : '' }}
                                                    value="DOWNLOAD - UPLOAD | OK">DOWNLOAD - UPLOAD | OK</option>
                                                <option
                                                    {{ $logExecution->speed_test == 'DOWNLOAD - UPLOAD | NOK' ? 'selected' : '' }}
                                                    value="DOWNLOAD - UPLOAD | NOK">DOWNLOAD - UPLOAD | NOK</option>
                                                <option
                                                    {{ $logExecution->speed_test == 'DOWNLOAD NOK - UPLOAD OK' ? 'selected' : '' }}
                                                    value="DOWNLOAD NOK - UPLOAD OK">DOWNLOAD NOK - UPLOAD OK</option>
                                                <option
                                                    {{ $logExecution->speed_test == 'DOWNLOAD OK - UPLOAD NOK' ? 'selected' : '' }}
                                                    value="DOWNLOAD OK - UPLOAD NOK">DOWNLOAD OK - UPLOAD NOK</option>
                                                <option
                                                    {{ $logExecution->speed_test == 'TIDAK BISA DIUKUR' ? 'selected' : '' }}
                                                    value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                            </select>
                                        </div>
                                        <p><b class="text-danger">ON TRAFFICC GRAPH</b></p>
                                        <div class="form-group">
                                            <label for="">WAN TRafficc</label><br>
                                            <input {{ $logExecution->wan_trafic == 'ok' ? 'checked' : '' }} type="radio"
                                                name="wan_trafic" value="ok">
                                            <label class="mr-2" for="html">OK</label>
                                            <input {{ $logExecution->wan_trafic == 'ok' ? 'nok' : '' }} type="radio"
                                                name="wan_trafic" value="nok">
                                            <label class="mr-2" for="css">NOK</label>
                                            <input {{ $logExecution->wan_trafic == 'tidak bisa diukur' ? 'checked' : '' }}
                                                type="radio" name="wan_trafic" value="tidak bisa diukur">
                                            <label class="mr-2" for="css">TIDAK BISA DI UKUR</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="">LAN TRafficc</label><br>
                                            <input {{ $logExecution->lan_trafic == 'ok' ? 'checked' : '' }} type="radio"
                                                name="lan_trafic" value="ok">
                                            <label class="mr-2" for="html">OK</label>
                                            <input {{ $logExecution->lan_trafic == 'nok' ? 'checked' : '' }}
                                                type="radio" name="lan_trafic" value="nok">
                                            <label class="mr-2" for="css">NOK</label>
                                            <input {{ $logExecution->lan_trafic == 'tidak bisa diukur' ? 'checked' : '' }}
                                                type="radio" name="lan_trafic" value="tidak bisa diukur">
                                            <label class="mr-2" for="css">TIDAK BISA DIUKUR</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlan">WLAN</label>
                                                    <input required type="number" name="wlan" id="wlan"
                                                        class="form-control" value="{{ $logExecution->wlan }}">
                                                    <span class="alert-obat-kosong text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="lan">LAN</label>
                                                    <input required type="number" name="lan" id="lan"
                                                        class="form-control" value="{{ $logExecution->lan }}">
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
                                                        class="form-control" value="{{ $logExecution->cpu }}">
                                                    <span class="alert-obat-kosong text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="memory">MEMORY</label>
                                                    <input required type="number" name="memory" id="memory"
                                                        class="form-control" value="{{ $logExecution->memory }}">
                                                    <span class="alert-obat-kosong text-danger"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="firewall_level">Firewall Level</label>
                                            <select name="firewall_level" id="firewall_level" class="custom-select">
                                                <option value="" disabled hidden selected>-- Piliih Phone State --
                                                </option>
                                                <option {{ $logExecution->firewall_level == 'HIGH' ? 'selected' : '' }}
                                                    value="HIGH">HIGH</option>
                                                <option {{ $logExecution->firewall_level == 'LOW' ? 'selected' : '' }}
                                                    value="LOW">LOW</option>
                                                <option {{ $logExecution->firewall_level == 'CUSTOMER' ? 'selected' : '' }}
                                                    value="CUSTOMER">CUSTOMER</option>
                                                <option
                                                    {{ $logExecution->firewall_level == 'TIDAK BISA DIUKUR' ? 'selected' : '' }}
                                                    value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><b class="text-danger">TICKET DRAFT</b></p>
                                                <div class="form-group">
                                                    <label for="ticket_draft">Kode SCC (MYI)</label>
                                                    <input type="text" name="ticket_draft" id="ticket_draft"
                                                        class="form-control" value="{{ $logExecution->ticket_draft }}">
                                                    <span class="alert-obat-kosong text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <p><b class="text-danger">TICKET QUEUE</b></p>
                                                <div class="form-group">
                                                    <label for="ticket_queued">Kode SCC (MYI)</label>
                                                    <input type="text" name="ticket_queued" id="ticket_queued"
                                                        class="form-control" value="{{ $logExecution->ticket_queued }}">
                                                    <span class="alert-obat-kosong text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="alasan_dispatch">Alasan Dispatch</label>
                                            <select name="alasan_dispatch" id="alasan_dispatch" class="custom-select">
                                                <option value="" disabled hidden selected>-- Pilih Phone State --
                                                </option>
                                                @foreach ($listAlasanDispatch as $alasanDispatch)
                                                    <option
                                                        {{ $logExecution->alasan_dispatch == $alasanDispatch ? 'selected' : '' }}
                                                        value="{{ $alasanDispatch }}">
                                                        {{ $alasanDispatch }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="eskalasi">Eskalasi</label>
                                            <textarea name="eskalasi" class="form-control" id="" cols="30" rows="5">{{ $logExecution->eskalasi }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="action_solution">Action Solution</label>
                                            <textarea name="action_solution" class="form-control" id="" cols="30" rows="5">{{ $logExecution->action_solution }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan</label>
                                            <textarea name="keterangan" class="form-control" id="" cols="30" rows="10">{{ $logExecution->keterangan }}</textarea>
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
                    url: "{{ route('ticket.storeAfterExecution') }}",
                    data: data,
                    dataType: 'json',
                    type: 'POST',
                    success: function(hasil) {
                        console.log(hasil);
                        if (hasil) {
                            $('#modalTambah').modal('hide')
                            Swal.fire(
                                'sukses',
                                'sukses menambah data',
                                'success'
                            ).then(() => {
                                document.location.href = '/ticket';
                            })
                        } else {
                            Swal.fire(
                                'Gagal',
                                'gagal menambah data',
                                'error'
                            )
                        }
                    }
                })
            })
            //end
        })
    </script>
@endsection
