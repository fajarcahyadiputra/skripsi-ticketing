@extends('admin.layout')
@section('title', 'Halaman Edit Tiket')

@section('content')
    <div class="container-fluid" id="container-wrapper">

        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <h5>DETAIL TIKET</h5>
            </div>
            <div class="card-body">
                <form id="formTambah" method="post">
                    @csrf()
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agent_id">Agent</label>
                                    <select readonly readonly required name="agent_id" id="agent_id" class="form-control">
                                        <option value="" disabled selected hidden>-- Pilih Agent --</option>
                                        @foreach ($agents as $agent)
                                            <option {{ $ticket->agent_id == $agent->id ? 'selected' : '' }}
                                                value="{{ $agent->id }}">
                                                {{ $agent->nama_depan . ' ' . $agent->nama_belakang }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <p><b class="text-danger">INSERA</b></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_tiket">Nomer Tiket</label>
                                            <input readonly required type="text" name="no_tiket" id="no_tiket"
                                                class="form-control" value="{{ $ticket->no_tiket }}">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_inet">Nomer Inet</label>
                                            <input readonly required type="number" name="no_inet" id="no_inet"
                                                class="form-control" value="{{ $ticket->no_inet }}">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nomer_hp">Nomer Telepon</label>
                                    <input readonly required type="text" name="nomer_hp" id="nomer_hp"
                                        class="form-control" value="{{ $ticket->nomer_hp }}">
                                    <span class="alert-obat-kosong text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="witel">Witel</label>
                                    <select readonly name="witel" id="witel" class="custom-select">
                                        <option value="" disabled hidden selected>-- Piliih Witel --</option>
                                        <option {{ $ticket->witel == 'JAKBAR' ? 'selected' : '' }} value="JAKBAR">JAKBAR
                                        </option>
                                        <option {{ $ticket->witel == 'JAKSEL' ? 'selected' : '' }} value="JAKSEL">JAKSEL
                                        </option>
                                        <option {{ $ticket->witel == 'JAKTIM' ? 'selected' : '' }} value="JAKTIM">JAKTIM
                                        </option>
                                        <option {{ $ticket->witel == 'BANTEN' ? 'selected' : '' }} value="BANTEN">BANTEN
                                        </option>
                                        <option {{ $ticket->witel == 'BOGOR' ? 'selected' : '' }} value="BOGOR">BOGOR
                                        </option>
                                        <option {{ $ticket->witel == 'JAKPUS' ? 'selected' : '' }} value="JAKPUS">JAKPUS
                                        </option>
                                        <option {{ $ticket->witel == 'JAKUT' ? 'selected' : '' }} value="JAKUT">JAKUT
                                        </option>
                                        <option {{ $ticket->witel == 'TANGGERANG' ? 'selected' : '' }} value="TANGGERANG">
                                            TANGGERANG</option>
                                        <option {{ $ticket->witel == 'BEKASI' ? 'selected' : '' }}value="BEKASI">BEKASI
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sto">STO</label>
                                    <select readonly name="sto" id="sto" class="custom-select">
                                        <option value="" disabled hidden selected>-- Piliih STO --</option>
                                        @foreach ($listSTO as $sto)
                                            <option {{ $ticket->sto == $sto ? 'selected' : '' }}
                                                value="{{ $sto }}">
                                                {{ $sto }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <p><b class="text-danger">GALDIUS</b></p>
                                <div class="form-group">
                                    <label for="paket_pcrf">Paket PCRF (solis)</label>
                                    <input readonly required type="text" name="paket_pcrf" id="paket_pcrf"
                                        class="form-control" value="{{ $ticket->paket_pcrf }}">
                                    <span class="alert-obat-kosong text-danger"></span>
                                </div>
                                <p><b class="text-danger">ACS</b></p>
                                <div class="form-group">
                                    <label for="">Status USEETV</label><br>
                                    <input {{ $ticket->status_usetv == 'ok' ? 'checked' : '' }} checked readonly
                                        type="radio" name="status_usetv" value="ok">
                                    <label class="mr-2" for="html">OK</label>
                                    <input {{ $ticket->status_usetv == 'ok' ? 'nok' : '' }} readonly type="radio"
                                        name="status_usetv" value="nok">
                                    <label class="mr-2" for="css">NOK</label>
                                    <input {{ $ticket->status_usetv == 'ok' ? 'no' : '' }} readonly type="radio"
                                        name="status_usetv" value="no">
                                    <label for="javascript">TIDAK ADA LAYANAN USEETV</label>
                                </div>
                                <p><b class="text-success">LOG BEFORE EXECUTION</b></p>
                                {{-- second --}}
                                <p><b class="text-danger">MENU OLT</b></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="rx_olt">RX OLT</label>
                                            <input readonly required type="text" name="rx_olt" id="rx_olt"
                                                class="form-control" value="{{ $logExecution->rx_olt }}">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="rx_onu">RX Unu</label>
                                            <input readonly required type="text" name="rx_onu" id="rx_onu"
                                                class="form-control" value="{{ $logExecution->rx_onu }}">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="temp_ont">Temperature ONT</label>
                                    <input readonly required type="text" name="temp_ont" id="temp_ont"
                                        class="form-control" value="{{ $logExecution->temp_ont }}">
                                    <span class="alert-obat-kosong text-danger"></span>
                                </div>
                                <p><b class="text-danger">MENU ONT</b></p>
                                <div class="form-group">
                                    <label for="">Status ACS</label><br>
                                    <input {{ $logExecution->status_acs == 'ok' ? 'checked' : '' }} readonly
                                        type="radio" name="status_acs" value="ok">
                                    <label class="mr-2" for="html">OK</label>
                                    <input {{ $logExecution->status_acs == 'nok' ? 'checked' : '' }} readonly
                                        type="radio" name="status_acs" value="nok">
                                    <label class="mr-2" for="css">NOK</label>
                                </div>
                                <div class="form-group">
                                    <label for="wifi_config">WIFI Config (Dual Bend)</label>
                                    <select readonly name="wifi_config" id="wifi_config" class="custom-select">
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
                                    <select readonly name="conn_state" id="conn_state" class="custom-select">
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
                                    <select readonly name="ext_ip" id="ext_ip" class="custom-select">
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
                                    <select readonly name="chanel_use" id="chanel_use" class="custom-select">
                                        <option value="" disabled hidden selected>-- Piliih Channel In Use --
                                        </option>
                                        <option {{ $logExecution->chanel_use == 1 ? 'selected' : '' }} value="1">
                                            auto
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="interference">Interference</label>
                                    <select readonly name="interference" id="interference" class="custom-select">
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
                                    <select readonly name="phone_state" id="phone_state" class="custom-select">
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
                                        <p><b class="text-danger">MENU CUSTOMER</b></p>
                                        <div class="form-group">
                                            <label for="">Customer Status</label><br>
                                            <input {{ $ticket->status_customer == 'enable' ? 'checked' : '' }} readonly
                                                type="radio" name="status_customer" value="enable">
                                            <label class="mr-2" for="html">ENABLE</label>
                                            <input {{ $ticket->status_customer == 'disable' ? 'checked' : '' }} readonly
                                                type="radio" name="status_customer" value="disable">
                                            <label class="mr-2" for="css">DISABLE</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="radius_package">Radius Package</label>
                                            <input readonly required type="text" name="radius_package"
                                                id="radius_package" class="form-control"
                                                value="{{ $ticket->radius_package }}">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="pcrf_package">PCRF Package</label>
                                            <input readonly required type="text" name="pcrf_package" id="pcrf_package"
                                                class="form-control" value="{{ $ticket->pcrf_package }}">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="reference_profile">Reference Profile</label>
                                            <input readonly required type="text" name="reference_profile"
                                                id="reference_profile" class="form-control"
                                                value="{{ $ticket->reference_profile }}">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="current_profile">Current Profile</label>
                                            <input readonly required type="text" name="current_profile"
                                                id="current_profile" class="form-control"
                                                value="{{ $ticket->current_profile }}">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                        <p><b class="text-danger">STB</b></p>
                                        <div class="form-group">
                                            <label for="nama_model">Model Name</label>
                                            <input readonly required type="text" name="nama_model" id="nama_model"
                                                class="form-control" value="{{ $ticket->nama_model }}">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="version">Version</label>
                                            <input readonly required type="text" name="version" id="version"
                                                class="form-control" value="{{ $ticket->version }}">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p><b class="text-danger">ONT</b></p>
                                        <div class="form-group">
                                            <label for="onu_type">Onu Type</label>
                                            <input readonly required type="text" name="onu_type" id="onu_type"
                                                class="form-control" value="{{ $ticket->onu_type }}">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="version_id">Version ID</label>
                                            <input readonly required type="text" name="version_id" id="version_id"
                                                class="form-control" value="{{ $ticket->version_id }}">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="alasan_dispatch">Status Tiket</label>
                                                <input readonly type="text" name="ticket_queued" id="ticket_queued"
                                                    class="form-control" value="{{ $ticket->status_tiket }}">
                                            </div>
                                        </div>
                                    </div>

                                </div>




                                <br><br><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><b class="text-danger">ONT LAND INFORMATION</b></p>
                                        <div class="form-group">
                                            <label for="dns_server">DNS Server</label>
                                            <select readonly name="dns_server" id="dns_server" class="custom-select">
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
                                            <select readonly name="speed_test" id="speed_test" class="custom-select">
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
                                            <select readonly name="rate_success" id="rate_success" class="custom-select">
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
                                            <input {{ $logExecution->wan_trafic == 'ok' ? 'checked' : '' }} readonly
                                                type="radio" name="wan_trafic" value="ok">
                                            <label class="mr-2" for="html">OK</label>
                                            <input {{ $logExecution->wan_trafic == 'ok' ? 'nok' : '' }} readonly
                                                type="radio" name="wan_trafic" value="nok">
                                            <label class="mr-2" for="css">NOK</label>
                                            <input {{ $logExecution->wan_trafic == 'tidak bisa diukur' ? 'checked' : '' }}
                                                readonly type="radio" name="wan_trafic" value="tidak bisa diukur">
                                            <label class="mr-2" for="css">TIDAK BISA DI UKUR</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="">LAN TRafficc</label><br>
                                            <input {{ $logExecution->lan_trafic == 'ok' ? 'checked' : '' }} readonly
                                                type="radio" name="lan_trafic" value="ok">
                                            <label class="mr-2" for="html">OK</label>
                                            <input {{ $logExecution->lan_trafic == 'nok' ? 'checked' : '' }} readonly
                                                type="radio" name="lan_trafic" value="nok">
                                            <label class="mr-2" for="css">NOK</label>
                                            <input {{ $logExecution->lan_trafic == 'tidak bisa diukur' ? 'checked' : '' }}
                                                readonly type="radio" name="lan_trafic" value="tidak bisa diukur">
                                            <label class="mr-2" for="css">TIDAK BISA DIUKUR</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlan">WLAN</label>
                                                    <input readonly required type="number" name="wlan" id="wlan"
                                                        class="form-control" value="{{ $logExecution->wlan }}">
                                                    <span class="alert-obat-kosong text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="lan">LAN</label>
                                                    <input readonly required type="number" name="lan" id="lan"
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
                                                    <input readonly required type="number" name="cpu" id="cpu"
                                                        class="form-control" value="{{ $logExecution->cpu }}">
                                                    <span class="alert-obat-kosong text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="memory">MEMORY</label>
                                                    <input readonly required type="number" name="memory" id="memory"
                                                        class="form-control" value="{{ $logExecution->memory }}">
                                                    <span class="alert-obat-kosong text-danger"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="firewall_level">Firewall Level</label>
                                            <select readonly name="firewall_level" id="firewall_level"
                                                class="custom-select">
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
                                                    <input readonly type="text" name="ticket_draft" id="ticket_draft"
                                                        class="form-control" value="{{ $logExecution->ticket_draft }}">
                                                    <span class="alert-obat-kosong text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <p><b class="text-danger">TICKET QUEUE</b></p>
                                                <div class="form-group">
                                                    <label for="ticket_queued">Kode SCC (MYI)</label>
                                                    <input readonly type="text" name="ticket_queued"
                                                        id="ticket_queued" class="form-control"
                                                        value="{{ $logExecution->ticket_queued }}">
                                                    <span class="alert-obat-kosong text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="alasan_dispatch">Status</label>
                                            <input readonly type="text" name="ticket_queued" id="ticket_queued"
                                                class="form-control" value="{{ $logExecution->alasan_dispatch }}">
                                        </div> --}}
                                        <div class="form-group">
                                            <label for="eskalasi">Eskalasi</label>
                                            <textarea readonly name="eskalasi" class="form-control" id="" cols="30" rows="5">{{ $logExecution->eskalasi }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="action_solution">Action Solution</label>
                                            <textarea readonly name="action_solution" class="form-control" id="" cols="30" rows="5">{{ $logExecution->action_solution }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan</label>
                                            <textarea readonly name="keterangan" class="form-control" id="" cols="30" rows="10">{{ $logExecution->keterangan }}</textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>



                        </div>
                </form>
                <form id="formTambah" method="post">
                    @csrf()
                    <input readonly required type="hidden" name="ticket_id" value="{{ $ticket->id }}">
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
                                            <input readonly required type="text" name="rx_olt" id="rx_olt"
                                                class="form-control" value="{{ $logAfterExecution->rx_olt }}">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="rx_onu">RX Unu</label>
                                            <input readonly required type="text" name="rx_onu" id="rx_onu"
                                                class="form-control" value="{{ $logAfterExecution->rx_onu }}">
                                            <span class="alert-obat-kosong text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="temp_ont">Temperature ONT</label>
                                    <input readonly required type="text" name="temp_ont" id="temp_ont"
                                        class="form-control" value="{{ $logAfterExecution->temp_ont }}">
                                    <span class="alert-obat-kosong text-danger"></span>
                                </div>
                                <p><b class="text-danger">MENU ONT</b></p>
                                <div class="form-group">
                                    <label for="">Status ACS</label><br>
                                    <input {{ $logAfterExecution->status_acs == 'ok' ? 'checked' : '' }} readonly
                                        type="radio" name="status_acs" value="ok">
                                    <label class="mr-2" for="html">OK</label>
                                    <input {{ $logAfterExecution->status_acs == 'nok' ? 'checked' : '' }} readonly
                                        type="radio" name="status_acs" value="nok">
                                    <label class="mr-2" for="css">NOK</label>
                                </div>
                                <div class="form-group">
                                    <label for="wifi_config">WIFI Config (Dual Bend)</label>
                                    <select readonly name="wifi_config" id="wifi_config" class="custom-select">
                                        <option value="" disabled hidden selected>-- Piliih Wifi Config --</option>
                                        <option {{ $logAfterExecution->wifi_config == '2.4GHz' ? 'selected' : '' }}
                                            value="2.4GHz">2.4GHz</option>
                                        <option
                                            {{ $logAfterExecution->wifi_config == '2.4GHz/5GHz - Single SSID' ? 'selected' : '' }}
                                            value="2.4GHz/5GHz - Single SSID">2.4GHz/5GHz - Single SSID</option>
                                        <option
                                            {{ $logAfterExecution->wifi_config == '2.4GHz/5GHz - Dual SSID' ? 'selected' : '' }}
                                            value="2.4GHz/5GHz - Dual SSID">2.4GHz/5GHz - Dual SSID</option>
                                        <option
                                            {{ $logAfterExecution->wifi_config == 'TIDAK BISA DIUKUR' ? 'selected' : '' }}
                                            value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="conn_state">Connection State</label>
                                    <select readonly name="conn_state" id="conn_state" class="custom-select">
                                        <option value="" disabled hidden selected>-- Piliih Connection State --
                                        </option>
                                        <option {{ $logAfterExecution->conn_state == 'CONNECTED' ? 'selected' : '' }}
                                            value="CONNECTED">CONNECTED</option>
                                        <option {{ $logAfterExecution->conn_state == 'DISCONNECTED' ? 'selected' : '' }}
                                            value="DISCONNECTED">DISCONNECTED</option>
                                        <option
                                            {{ $logAfterExecution->conn_state == 'TIDAK BISA DIUKUR' ? 'selected' : '' }}
                                            value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ext_ip">External IP Address</label>
                                    <select readonly name="ext_ip" id="ext_ip" class="custom-select">
                                        <option value="" disabled hidden selected>-- Piliih Connection State --
                                        </option>
                                        <option {{ $logAfterExecution->ext_ip == 'IPV4' ? 'selected' : '' }}
                                            value="IPV4">
                                            IPV4</option>
                                        <option {{ $logAfterExecution->ext_ip == 'IPV6' ? 'selected' : '' }}
                                            value="IPV6">
                                            IPV6</option>
                                        <option {{ $logAfterExecution->ext_ip == 'IPV4/IPV6' ? 'selected' : '' }}
                                            value="IPV4/IPV6">IPV4/IPV6</option>
                                        <option {{ $logAfterExecution->ext_ip == 'TIDAK BISA DIUKUR' ? 'selected' : '' }}
                                            value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="chanel_use">Channel In USE</label>
                                    <select readonly name="chanel_use" id="chanel_use" class="custom-select">
                                        <option value="" disabled hidden selected>-- Piliih Channel In Use --
                                        </option>
                                        <option {{ $logAfterExecution->chanel_use == 1 ? 'selected' : '' }}
                                            value="1">
                                            auto
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="interference">Interference</label>
                                    <select readonly name="interference" id="interference" class="custom-select">
                                        <option value="" disabled hidden selected>-- Piliih Connection State --
                                        </option>
                                        <option
                                            {{ $logAfterExecution->interference == 'TIDAK INTERFERENCE' ? 'selected' : '' }}
                                            value="TIDAK INTERFERENCE">TIDAK INTERFERENCE</option>
                                        <option {{ $logAfterExecution->interference == 'INTERFERENCE' ? 'selected' : '' }}
                                            value="INTERFERENCE">INTERFERENCE</option>
                                        <option
                                            {{ $logAfterExecution->interference == 'TIDAK BISA DIUKUR' ? 'selected' : '' }}
                                            value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="phone_state">Phone State</label>
                                    <select readonly name="phone_state" id="phone_state" class="custom-select">
                                        <option value="" disabled hidden selected>-- Piliih Phone State --
                                        </option>
                                        <option {{ $logAfterExecution->phone_state == 'REGISTERED' ? 'selected' : '' }}
                                            value="REGISTERED">REGISTERED</option>
                                        <option {{ $logAfterExecution->phone_state == 'UNREGISTER' ? 'selected' : '' }}
                                            value="UNREGISTER">UNREGISTER</option>
                                        <option {{ $logAfterExecution->phone_state == 'REGISTERING' ? 'selected' : '' }}
                                            value="REGISTERING">REGISTERING</option>
                                        <option
                                            {{ $logAfterExecution->phone_state == 'TIDAK BISA DIUKUR' ? 'selected' : '' }}
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
                                            <select readonly name="dns_server" id="dns_server" class="custom-select">
                                                <option value="" disabled hidden selected>-- Piliih DNS Server --
                                                </option>
                                                <option {{ $logAfterExecution->dns_server == 'PUBLIC' ? 'selected' : '' }}
                                                    value="PUBLIC">PUBLIC</option>
                                                <option
                                                    {{ $logAfterExecution->dns_server == 'PRIVATE' ? 'selected' : '' }}
                                                    value="PRIVATE">PRIVATE</option>
                                                <option
                                                    {{ $logAfterExecution->dns_server == 'TIDAK BISA DIUKUR' ? 'selected' : '' }}
                                                    value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                            </select>
                                        </div>
                                        <p><b class="text-danger">ONT SPEED TEST</b></p>
                                        <div class="form-group">
                                            <label for="speed_test">Speed Test</label>
                                            <select readonly name="speed_test" id="speed_test" class="custom-select">
                                                <option value="" disabled hidden selected>-- Piliih Speed Test --
                                                </option>
                                                <option
                                                    {{ $logAfterExecution->speed_test == 'DOWNLOAD - UPLOAD | OK' ? 'selected' : '' }}
                                                    value="DOWNLOAD - UPLOAD | OK">DOWNLOAD - UPLOAD | OK</option>
                                                <option
                                                    {{ $logAfterExecution->speed_test == 'DOWNLOAD - UPLOAD | NOK' ? 'selected' : '' }}
                                                    value="DOWNLOAD - UPLOAD | NOK">DOWNLOAD - UPLOAD | NOK</option>
                                                <option
                                                    {{ $logAfterExecution->speed_test == 'DOWNLOAD NOK - UPLOAD OK' ? 'selected' : '' }}
                                                    value="DOWNLOAD NOK - UPLOAD OK">DOWNLOAD NOK - UPLOAD OK</option>
                                                <option
                                                    {{ $logAfterExecution->speed_test == 'DOWNLOAD OK - UPLOAD NOK' ? 'selected' : '' }}
                                                    value="DOWNLOAD OK - UPLOAD NOK">DOWNLOAD OK - UPLOAD NOK</option>
                                                <option
                                                    {{ $logAfterExecution->speed_test == 'TIDAK BISA DIUKUR' ? 'selected' : '' }}
                                                    value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                            </select>
                                        </div>
                                        <p><b class="text-danger">ONT PINGHOST</b></p>
                                        <div class="form-group">
                                            <label for="rate_success">Rate Success</label>
                                            <select readonly name="rate_success" id="rate_success" class="custom-select">
                                                <option value="" disabled hidden selected>-- Piliih Rate Success --
                                                </option>
                                                <option
                                                    {{ $logAfterExecution->speed_test == 'DOWNLOAD - UPLOAD | OK' ? 'selected' : '' }}
                                                    value="DOWNLOAD - UPLOAD | OK">DOWNLOAD - UPLOAD | OK</option>
                                                <option
                                                    {{ $logAfterExecution->speed_test == 'DOWNLOAD - UPLOAD | NOK' ? 'selected' : '' }}
                                                    value="DOWNLOAD - UPLOAD | NOK">DOWNLOAD - UPLOAD | NOK</option>
                                                <option
                                                    {{ $logAfterExecution->speed_test == 'DOWNLOAD NOK - UPLOAD OK' ? 'selected' : '' }}
                                                    value="DOWNLOAD NOK - UPLOAD OK">DOWNLOAD NOK - UPLOAD OK</option>
                                                <option
                                                    {{ $logAfterExecution->speed_test == 'DOWNLOAD OK - UPLOAD NOK' ? 'selected' : '' }}
                                                    value="DOWNLOAD OK - UPLOAD NOK">DOWNLOAD OK - UPLOAD NOK</option>
                                                <option
                                                    {{ $logAfterExecution->speed_test == 'TIDAK BISA DIUKUR' ? 'selected' : '' }}
                                                    value="TIDAK BISA DIUKUR">TIDAK BISA DIUKUR</option>
                                            </select>
                                        </div>
                                        <p><b class="text-danger">ON TRAFFICC GRAPH</b></p>
                                        <div class="form-group">
                                            <label for="">WAN TRafficc</label><br>
                                            <input {{ $logAfterExecution->wan_trafic == 'ok' ? 'checked' : '' }} readonly
                                                type="radio" name="wan_trafic" value="ok">
                                            <label class="mr-2" for="html">OK</label>
                                            <input {{ $logAfterExecution->wan_trafic == 'ok' ? 'nok' : '' }} readonly
                                                type="radio" name="wan_trafic" value="nok">
                                            <label class="mr-2" for="css">NOK</label>
                                            <input
                                                {{ $logAfterExecution->wan_trafic == 'tidak bisa diukur' ? 'checked' : '' }}
                                                readonly type="radio" name="wan_trafic" value="tidak bisa diukur">
                                            <label class="mr-2" for="css">TIDAK BISA DI UKUR</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="">LAN TRafficc</label><br>
                                            <input {{ $logAfterExecution->lan_trafic == 'ok' ? 'checked' : '' }} readonly
                                                type="radio" name="lan_trafic" value="ok">
                                            <label class="mr-2" for="html">OK</label>
                                            <input {{ $logAfterExecution->lan_trafic == 'nok' ? 'checked' : '' }} readonly
                                                type="radio" name="lan_trafic" value="nok">
                                            <label class="mr-2" for="css">NOK</label>
                                            <input
                                                {{ $logAfterExecution->lan_trafic == 'tidak bisa diukur' ? 'checked' : '' }}
                                                readonly type="radio" name="lan_trafic" value="tidak bisa diukur">
                                            <label class="mr-2" for="css">TIDAK BISA DIUKUR</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlan">WLAN</label>
                                                    <input readonly required type="number" name="wlan" id="wlan"
                                                        class="form-control" value="{{ $logAfterExecution->wlan }}">
                                                    <span class="alert-obat-kosong text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="lan">LAN</label>
                                                    <input readonly required type="number" name="lan" id="lan"
                                                        class="form-control" value="{{ $logAfterExecution->lan }}">
                                                    <span class="alert-obat-kosong text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <p><b class="text-danger">ON CLIENTS</b></p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cpu">CPU</label>
                                                    <input readonly required type="number" name="cpu" id="cpu"
                                                        class="form-control" value="{{ $logAfterExecution->cpu }}">
                                                    <span class="alert-obat-kosong text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="memory">MEMORY</label>
                                                    <input readonly required type="number" name="memory" id="memory"
                                                        class="form-control" value="{{ $logAfterExecution->memory }}">
                                                    <span class="alert-obat-kosong text-danger"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="firewall_level">Firewall Level</label>
                                            <select readonly name="firewall_level" id="firewall_level"
                                                class="custom-select">
                                                <option value="" disabled hidden selected>-- Piliih Phone State --
                                                </option>
                                                <option
                                                    {{ $logAfterExecution->firewall_level == 'HIGH' ? 'selected' : '' }}
                                                    value="HIGH">HIGH</option>
                                                <option
                                                    {{ $logAfterExecution->firewall_level == 'LOW' ? 'selected' : '' }}
                                                    value="LOW">LOW</option>
                                                <option
                                                    {{ $logAfterExecution->firewall_level == 'CUSTOMER' ? 'selected' : '' }}
                                                    value="CUSTOMER">CUSTOMER</option>
                                                <option
                                                    {{ $logAfterExecution->firewall_level == 'TIDAK BISA DIUKUR' ? 'selected' : '' }}
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
                                                    <input readonly type="text" name="ticket_draft" id="ticket_draft"
                                                        class="form-control"
                                                        value="{{ $logAfterExecution->ticket_draft }}">
                                                    <span class="alert-obat-kosong text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <p><b class="text-danger">TICKET QUEUE</b></p>
                                                <div class="form-group">
                                                    <label for="ticket_queued">Kode SCC (MYI)</label>
                                                    <input readonly type="text" name="ticket_queued"
                                                        id="ticket_queued" class="form-control"
                                                        value="{{ $logAfterExecution->ticket_queued }}">
                                                    <span class="alert-obat-kosong text-danger"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="eskalasi">Eskalasi</label>
                                            <textarea readonly name="eskalasi" class="form-control" id="" cols="30" rows="5">{{ $logAfterExecution->eskalasi }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="action_solution">Action Solution</label>
                                            <textarea readonly name="action_solution" class="form-control" id="" cols="30" rows="5">{{ $logAfterExecution->action_solution }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan</label>
                                            <textarea readonly name="keterangan" class="form-control" id="" cols="30" rows="10">{{ $logAfterExecution->keterangan }}</textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-secondary" href="/ticket">Back</a>
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
                    url: '/ticket/{{ $ticket->id }}',
                    data: data,
                    dataType: 'json',
                    type: 'PUT',
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
