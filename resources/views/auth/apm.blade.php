@extends('index')
@section('title', 'APM')
@section('container')
<div id="body">
    <div class="center bg-primary">
        <div id="screensaver" class="text-center text-white">
            <img src="assets/img/logo/rsbbtimbul.png" width="200">
            <h1 class="text-white mb-0 display-2">Selamat Datang</h1>
            <h1 class="text-white mb-5 display-2">di RS Bhayangkara Brimob</h1>
            <p class="mt-5 pt-5 display-4 text-white">Sentuh saya untuk memulai</p>
         </div>
        <div id="formApm" class="container mt-5" style="z-index:999;">
            <div id="d_button" class="text-center container col-lg-7">
                <h1 class="display-1 text-white">ANJUNGAN MANDIRI PASIEN</h1>
                <button id="btn_offline" type="button" class="button-danger w-100 p-3 m-1" style="font-size:30px;">REGISTRASI OFFLINE</button>
                <button id="btn_online" type="button" class="button-success w-100 p-3 m-1" style="font-size:30px;">VERIFIKASI BOOKING</button>
                <button id="btn_cetak" type="button" class="button-info w-100 p-3 m-1" style="font-size:30px;">CETAK BUKTI REGIS</button>
            </div>
            <div id="auth_offline" class="authentication-wrapper authentication-basic container-p-y container col-lg-4">
                <div class="authentication-inner">
                    <div class="card bg-dark box-shadow">
                        <div class="text-center">
                            <a href="{{url('/')}}"><h3 class="text-center text-white mt-4 mb-0">Registrasi Offline</h3></a>
                        </div>
                        <div class="card-body">
                            <form id="formOffline">
                                <div class="mb-2">
                                    <label class="text-white">Nomor Rekam Medis</label>
                                    <input type="text" id="no_rkm_medis" class="form-control text-center bg-dark text-white border border-primary" onkeypress="return onlyNumberKey(event)" style="font-size:30px;">
                                    <script>
                                        function onlyNumberKey(evt) {
                                            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                                            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                                                return false;
                                            return true;
                                        }
                                    </script>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <input type="button" value="1" id="1" class="button-primary w-100 m-1 calc" style="font-size:30px;"/>
                                    <input type="button" value="2" id="2" class="button-primary w-100 m-1 calc" style="font-size:30px;"/>
                                    <input type="button" value="3" id="3" class="button-primary w-100 m-1 calc" style="font-size:30px;"/>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <input type="button" value="4" id="4" class="button-primary w-100 m-1 calc" style="font-size:30px;"/>
                                    <input type="button" value="5" id="5" class="button-primary w-100 m-1 calc" style="font-size:30px;"/>
                                    <input type="button" value="6" id="6" class="button-primary w-100 m-1 calc" style="font-size:30px;"/>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <input type="button" value="7" id="7" class="button-primary w-100 m-1 calc" style="font-size:30px;"/>
                                    <input type="button" value="8" id="8" class="button-primary w-100 m-1 calc" style="font-size:30px;"/>
                                    <input type="button" value="9" id="9" class="button-primary w-100 m-1 calc" style="font-size:30px;"/>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" value="Hapus" id="clear" class="button-danger w-100 m-1 clear" style="font-size:30px;">Hapus</button>
                                    <input type="button" value="0" id="0 " class="button-primary w-100 m-1 calc" style="font-size:30px;"/>
                                    <button type="button" value="Selesai" id="enter" class="button-success w-100 m-1 enter" style="font-size:30px;">Selesai</button>
                                </div>
                                <div class="pt-3">
                                    <button id="btn_batal_offline" type="button" class="button-info w-100 p-2 m-1" style="font-size:30px;">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="auth_online" class="authentication-wrapper authentication-basic container-p-y container col-lg-6">
                <div class="authentication-inner">
                    <div class="card bg-dark box-shadow">
                        <div class="text-center">
                            <a href="{{url('/')}}"><h3 class="text-center text-white mt-4 mb-0">Verifikasi Booking</h3></a>
                        </div>
                        <div class="card-body">
                            <form id="formOnline">
                                <div class="">
                                    <label class="text-white">Kode Tiket</label>
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group m-1">
                                            <span id="span_tipe" class="text-white">Kode 1</span>
                                            <input type="text" id="kode_tipe" class="form-control text-center bg-dark text-white border border-primary" value="RSBB" readonly="readonly" style="font-size:30px;">
                                        </div>
                                        <div class="form-group m-1">
                                            <span id="span_date" class="lead">Kode 2</span>
                                            <input type="text" id="kode_date" class="form-control text-center bg-dark text-white border border-primary"  onkeypress="return onlyNumberKey(event)" maxlength="6" style="font-size:30px;">
                                        </div>
                                        <div class="form-group m-1">
                                            <span id="span_tiket" class="lead">Kode 3</span>
                                            <input type="text" id="kode_tiket" class="form-control text-center bg-dark text-white border border-primary"  onkeypress="return onlyNumberKey(event)" maxlength="6" style="font-size:30px;">
                                        </div>
                                        <script>
                                            function onlyNumberKey(evt) {
                                                var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                                                if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                                                    return false;
                                                return true;
                                            }
                                        </script>
                                    </div>
                                </div>
                                <div id="padDate">
                                    <div class="d-flex justify-content-between">
                                        <input type="button" value="1" id="1" class="button-primary w-100 m-1 calc_date" style="font-size:30px;"/>
                                        <input type="button" value="2" id="2" class="button-primary w-100 m-1 calc_date" style="font-size:30px;"/>
                                        <input type="button" value="3" id="3" class="button-primary w-100 m-1 calc_date" style="font-size:30px;"/>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <input type="button" value="4" id="4" class="button-primary w-100 m-1 calc_date" style="font-size:30px;"/>
                                        <input type="button" value="5" id="5" class="button-primary w-100 m-1 calc_date" style="font-size:30px;"/>
                                        <input type="button" value="6" id="6" class="button-primary w-100 m-1 calc_date" style="font-size:30px;"/>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <input type="button" value="7" id="7" class="button-primary w-100 m-1 calc_date" style="font-size:30px;"/>
                                        <input type="button" value="8" id="8" class="button-primary w-100 m-1 calc_date" style="font-size:30px;"/>
                                        <input type="button" value="9" id="9" class="button-primary w-100 m-1 calc_date" style="font-size:30px;"/>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="button" value="Hapus" id="clear_date" class="button-danger w-100 m-1 clear_date" style="font-size:30px;">Hapus</button>
                                        <input type="button" value="0" id="0 " class="button-primary w-100 m-1 calc_date" style="font-size:30px;"/>
                                        <button type="button" value="Selesai" id="enter_date" class="button-success w-100 m-1 enter_date" style="font-size:30px;">Lanjut</button>
                                    </div>
                                </div>
                                <div id="padTiket">
                                    <div class="d-flex justify-content-between">
                                        <input type="button" value="1" id="1" class="button-primary w-100 m-1 calc_tiket" style="font-size:30px;"/>
                                        <input type="button" value="2" id="2" class="button-primary w-100 m-1 calc_tiket" style="font-size:30px;"/>
                                        <input type="button" value="3" id="3" class="button-primary w-100 m-1 calc_tiket" style="font-size:30px;"/>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <input type="button" value="4" id="4" class="button-primary w-100 m-1 calc_tiket" style="font-size:30px;"/>
                                        <input type="button" value="5" id="5" class="button-primary w-100 m-1 calc_tiket" style="font-size:30px;"/>
                                        <input type="button" value="6" id="6" class="button-primary w-100 m-1 calc_tiket" style="font-size:30px;"/>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <input type="button" value="7" id="7" class="button-primary w-100 m-1 calc_tiket" style="font-size:30px;"/>
                                        <input type="button" value="8" id="8" class="button-primary w-100 m-1 calc_tiket" style="font-size:30px;"/>
                                        <input type="button" value="9" id="9" class="button-primary w-100 m-1 calc_tiket" style="font-size:30px;"/>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="button" value="Hapus" id="clear_tiket" class="button-danger w-100 m-1 clear_tiket" style="font-size:30px;">Hapus</button>
                                        <input type="button" value="0" id="0 " class="button-primary w-100 m-1 calc_tiket" style="font-size:30px;"/>
                                        <button type="button" value="Selesai" id="enter_tiket" class="button-success w-100 m-1 enter_tiket" style="font-size:30px;">Selesai</button>
                                    </div>
                                </div>
                                <div class="pt-3">
                                    <button id="btn_batal_online" type="button" class="button-info w-100 p-2 m-1" style="font-size:30px;">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="bukti_regis" class="authentication-wrapper authentication-basic container-p-y container col-lg-4">
                <div class="authentication-inner">
                    <div class="card bg-dark box-shadow">
                        <div class="text-center">
                            <a href="{{url('/')}}"><h3 class="text-center text-white mt-4 mb-0">Cetak Bukti Registrasi</h3></a>
                        </div>
                        <div class="card-body">
                            <form id="formCetak">
                                <div class="mb-2">
                                    <label class="text-white">Nomor Rekam Medis</label>
                                    <input type="text" id="no_rm" class="form-control text-center bg-dark text-white border border-primary" onkeypress="return onlyNumberKey(event)" style="font-size:30px;">
                                    <script>
                                    function onlyNumberKey(evt) {
                                        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                                        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                                        return false;
                                        return true;
                                    }
                                    </script>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <input type="button" value="1" id="1" class="button-primary w-100 m-1 reg" style="font-size:30px;"/>
                                    <input type="button" value="2" id="2" class="button-primary w-100 m-1 reg" style="font-size:30px;"/>
                                    <input type="button" value="3" id="3" class="button-primary w-100 m-1 reg" style="font-size:30px;"/>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <input type="button" value="4" id="4" class="button-primary w-100 m-1 reg" style="font-size:30px;"/>
                                    <input type="button" value="5" id="5" class="button-primary w-100 m-1 reg" style="font-size:30px;"/>
                                    <input type="button" value="6" id="6" class="button-primary w-100 m-1 reg" style="font-size:30px;"/>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <input type="button" value="7" id="7" class="button-primary w-100 m-1 reg" style="font-size:30px;"/>
                                    <input type="button" value="8" id="8" class="button-primary w-100 m-1 reg" style="font-size:30px;"/>
                                    <input type="button" value="9" id="9" class="button-primary w-100 m-1 reg" style="font-size:30px;"/>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" value="Hapus" id="clear_reg" class="button-danger w-100 m-1 clear_reg" style="font-size:30px;">Hapus</button>
                                    <input type="button" value="0" id="0 " class="button-primary w-100 m-1 reg" style="font-size:30px;"/>
                                    <button type="button" value="Selesai" id="enter_reg" class="button-success w-100 m-1 enter_reg" style="font-size:30px;">Selesai</button>
                                </div>
                                <div class="pt-3">
                                    <button id="btn_batal_cetak" type="button" class="button-info w-100 p-2 m-1" style="font-size:30px;">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
 </div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#auth_offline").hide();
        $("#auth_online").hide();
        $("#bukti_regis").hide();
        $("#btn_offline").click(function() {
            $("#d_button").hide();
            $("#auth_offline").show();
            $("#auth_online").hide();
            $("#bukti_regis").hide();
        });
        $("#btn_online").click(function() {
            $("#d_button").hide();
            $("#auth_offline").hide();
            $("#auth_online").show();
            $("#bukti_regis").hide();
        });
        $("#btn_cetak").click(function() {
            $("#d_button").hide();
            $("#auth_offline").hide();
            $("#auth_online").hide();
            $("#bukti_regis").show();
        });
        $("#btn_batal_online").click(function() {
            batalApm();
        });
        $("#btn_batal_offline").click(function() {
            batalApm();
        });
        $("#btn_batal_cetak").click(function() {
            batalApm();
        });
        function batalApm() {
            $("#d_button").show();
            $("#auth_offline").hide();
            $("#auth_online").hide();
            $("#bukti_regis").hide();
        }
        var input_value = $("#no_rkm_medis");
        $("#no_rkm_medis").attr('maxlength','8');
        $(".calc").click(function () {
            var text = $("#no_rkm_medis").val().length;
            if (text >= 8) {
                $("#alertDanger").addClass('show');
                $("#pesanDanger").text("Maaf no rekam medis maksimal 8 digit");
                hilang();
            } else {
                let value = $(this).val();
                field(value);
            }
        });
        function field(value) {
            input_value.val(input_value.val() + value);
        }
        $("#clear").click(function () {
            var bsp = document.getElementById("no_rkm_medis").value;
            document.getElementById("no_rkm_medis").value=bsp.substring(0,bsp.length -1);
        });
        $("#enter").click(function () {
            var text = $("#no_rkm_medis").val().length;
            if (text == 0) {
                $("#alertDanger").addClass('show');
                $("#pesanDanger").text("Nomor rekam medis tidak boleh kosong");
                hilang();
            } else {
                var no_rkm_medis = $('#no_rkm_medis').val();
                $.ajax({
                    type: "GET",
                    url: "offline-cek-pasien",
                    data: {
                        no_rkm_medis: no_rkm_medis
                    },
                    success:function(response){
                        console.log(response.nm_pasien);
                        if (response == "no salah") {
                            $("#alertDanger").addClass('show');
                            $("#pesanDanger").text("Maaf no rekam medis salah!");
                            hilang();
                        } else {
                            $('#auth_no_rkm_medis').text(response.no_rkm_medis);
                            $('#nm_pasien').text(response.nm_pasien);
                            $('#konfimasi').modal('show');
                        }
                    }
                });
            }
        });




        var input_norm = $("#no_rm");
        $("#no_rm").attr('maxlength','8');
        $(".reg").click(function () {
            var text = $("#no_rm").val().length;
            if (text >= 8) {
                $("#alertDanger").addClass('show');
                $("#pesanDanger").text("Maaf no rekam medis maksimal 8 digit");
                hilang();
            } else {
                let value = $(this).val();
                cetak(value);
            }
        });
        function cetak(value) {
            input_norm.val(input_norm.val() + value);
        }
        $("#clear_reg").click(function () {
            var bsp = document.getElementById("no_rm").value;
            document.getElementById("no_rm").value=bsp.substring(0,bsp.length -1);
        });
        $("#enter_reg").click(function () {
            var text = $("#no_rm").val().length;
            if (text == 0) {
                $("#alertDanger").addClass('show');
                $("#pesanDanger").text("Nomor rekam medis tidak boleh kosong");
                hilang();
            } else {
                var no_rkm_medis = $('#no_rm').val();
                $.ajax({
                    type: "GET",
                    url: "apm-cetak-regis",
                    data: {
                        no_rkm_medis: no_rkm_medis
                    },
                    success:function(response){
                        console.log(response);
                        if (response == "no salah") {
                            $("#alertDanger").addClass('show');
                            $("#pesanDanger").text("Maaf no rekam medis salah!");
                            hilang();
                        }
                        if (response == "gagal") {
                            $("#alertDanger").addClass('show');
                            $("#pesanDanger").text("Gagal cetak bukti registrasi!");
                            hilang();
                        }
                        if (response == "berhasil") {
                            window.location.replace("{{url('apm-cetak')}}");
                        }
                    }
                });
            }
        });
    });




    function hilang() {
        setTimeout(function() {
            $("#alertInfo").removeClass('show');
            $("#alertDanger").removeClass('show');
        },4000);
    }
    var s_saver;
    $('#formApm').hide();
    $('#body').mousemove(function() {
        clearTimeout(s_saver);
        s_saver = setTimeout(function(){
            $('#screensaver').show(900);
            $('#formApm').hide(900);
        }, 120000);
        $('#formApm').show(400);
        $('#screensaver').hide(100);
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#kode_date').click(function() {
            $('#padDate').show();
            $('#padTiket').hide();
            $('#span_tiket').removeClass('text-white');
            $('#span_date').addClass('text-white');
        });
        $('#kode_tiket').click(function() {
            $('#padDate').hide();
            $('#padTiket').show();
            $('#span_tiket').addClass('text-white');
            $('#span_date').removeClass('text-white');
        });

        var text_date = $("#kode_date");
        var text_tiket = $("#kode_tiket");
        $('#padDate').show();
        $('#padTiket').hide();
        $("#kode_tipe").keypress(function () {
            return false;
        });
        $("#kode_date").keypress(function () {
            return false;
        });
        $("#kode_tiket").keypress(function () {
            return false;
        });
        $(".calc_date").click(function () {
            var text = $("#kode_date").val().length;
            if (text == 6) {
                $('#padDate').hide();
                $('#padTiket').show();
                $('#span_tiket').addClass('text-white');
                $('#span_date').removeClass('text-white');
            } else {
                let value = $(this).val();
                date(value);
            }
        });
        function date(value) {
            text_date.val(text_date.val() + value);
        }
        $("#clear_date").click(function () {
            var bsp = document.getElementById("kode_date").value;
            document.getElementById("kode_date").value=bsp.substring(0,bsp.length -1);
        });
        $("#enter_date").click(function () {
            var text = $("#kode_date").val().length;
            if (text != 0) {
                $('#padDate').hide();
                $('#padTiket').show();
                $('#span_tiket').addClass('text-white');
                $('#span_date').addClass('text-white');
            } else {
                $("#alertDanger").addClass('show');
                $("#pesanDanger").text("Kode 2 tidak boleh kosong!");
                hilang();
            }
        });
        $(".calc_tiket").click(function () {
            var text = $("#kode_tiket").val().length;
            var date = $("#kode_date").val().length;
            if (text == 6) {
                $('#padDate').hide();
                $('#padTiket').show();
                if (date == 0) {
                    $('#span_tiket').addClass('text-white');
                    $('#span_date').removeClass('text-white');
                } else {
                    $('#span_tiket').addClass('text-white');
                    $('#span_date').addClass('text-white');
                }
            } else {
                let value = $(this).val();
                tiket(value);
            }
        });
        function tiket(value) {
            text_tiket.val(text_tiket.val() + value);
        }
        $("#clear_tiket").click(function () {
            var bsp = document.getElementById("kode_tiket").value;
            document.getElementById("kode_tiket").value=bsp.substring(0,bsp.length -1);
        });
        $("#enter_tiket").click(function () {
            var kode_tipe   = $("#kode_tipe").val();
            var kode_date   = $("#kode_date").val();
            var kode_tiket  = $("#kode_tiket").val();
            $.ajax({
                type: "GET",
                url: "online-verifikasi",
                data: {
                    kode_tipe: kode_tipe,
                    kode_date: kode_date,
                    kode_tiket: kode_tiket,
                },
                success:function(response){
                    console.log(response);
                    if (response == "tipe salah") {
                        $("#alertDanger").addClass('show');
                        $("#pesanDanger").text("Kode 1 anda salah!");
                        hilang();
                    }
                    if (response == "tipe kosong") {
                        $("#alertDanger").addClass('show');
                        $("#pesanDanger").text("Kode 1 tidak boleh kosong!");
                        hilang();
                    }
                    if (response == "date kosong") {
                        $("#alertDanger").addClass('show');
                        $("#pesanDanger").text("Kode 2 tidak boleh kosong!");
                        hilang();
                    }
                    if (response == "tiket kosong") {
                        $("#alertDanger").addClass('show');
                        $("#pesanDanger").text("Kode 3 tidak boleh kosong!");
                        hilang();
                    }
                    if (response == "tiket salah") {
                        $("#alertDanger").addClass('show');
                        $("#pesanDanger").text("Kode tiket anda salah!");
                        hilang();
                    }
                    if (response.status == "Terdaftar") {
                        $("#alertDanger").addClass('show');
                        $("#pesanDanger").text("Maaf tiket sudah tidak berlaku!");
                        hilang();
                    }
                    if (response.status == "Batal") {
                        $("#alertDanger").addClass('show');
                        $("#pesanDanger").text("Maaf tiket sudah tidak berlaku!");
                        hilang();
                    }
                    if (response.status == "tiket salah") {
                        $("#alertDanger").addClass('show');
                        $("#pesanDanger").text("Maaf kode tiket salah!");
                        hilang();
                    }
                    if (response.status == "Belum") {
                        $('#verifi_no_tiket').text(response.no_tiket);
                        $('#verifi_no_rkm_medis').text(response.no_rkm_medis);
                        $('#verifi_nm_pasien').text(response.nm_pasien);
                        $('#verifikasi').modal('show');
                    }
                }
            });
        });
    });
    function hilang() {
        setTimeout(function() {
            $("#alertInfo").removeClass('show');
            $("#alertDanger").removeClass('show');
        },4000);
    }
</script>
<div class="modal fade" id="konfimasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content bg-dark box-shadow">
      <div class="modal-body">
          <h1 class="text-white text-center">Verifikasi Tanggal Lahir</h1>
          <hr>
        <p class="text-white display-6">Hai <b class="text-white" id="nm_pasien"></b>?</p>
        <p class="text-white lead">Masukan tanggal lahir anda</p>
        <div id="pinpad" class="text-center">
            <form id="formKonfirmasi">
                <p class="text-center" id="auth_no_rkm_medis"></p>
                <div class="d-flex justify-content-between">
                    <div class="form-group m-1">
                        <span id="span_hari" class="lead">Hari</span>
                        <input type="text" id="hari" class="form-control text-center bg-dark text-white border border-primary" placeholder="00" style="font-size:30px;">
                    </div>
                    <div class="form-group m-1">
                        <span id="span_bulan" class="lead">Bulan</span>
                        <input type="text" id="bulan" class="form-control text-center bg-dark text-white border border-primary" placeholder="00" style="font-size:30px;">
                    </div>
                    <div class="form-group m-1">
                        <span id="span_tahun" class="lead">Tahun</span>
                        <input type="text" id="tahun" class="form-control text-center bg-dark text-white border border-primary" placeholder="0000" style="font-size:30px;">
                    </div>
                </div>
                <div id="padTanggal">
                    <div class="d-flex justify-content-between">
                        <input type="button" value="1" id="1" class="button-primary w-100 m-1 calc_hari" style="font-size:30px;"/>
                        <input type="button" value="2" id="2" class="button-primary w-100 m-1 calc_hari" style="font-size:30px;"/>
                        <input type="button" value="3" id="3" class="button-primary w-100 m-1 calc_hari" style="font-size:30px;"/>
                    </div>
                    <div class="d-flex justify-content-between">
                        <input type="button" value="4" id="4" class="button-primary w-100 m-1 calc_hari" style="font-size:30px;"/>
                        <input type="button" value="5" id="5" class="button-primary w-100 m-1 calc_hari" style="font-size:30px;"/>
                        <input type="button" value="6" id="6" class="button-primary w-100 m-1 calc_hari" style="font-size:30px;"/>
                    </div>
                    <div class="d-flex justify-content-between">
                        <input type="button" value="7" id="7" class="button-primary w-100 m-1 calc_hari" style="font-size:30px;"/>
                        <input type="button" value="8" id="8" class="button-primary w-100 m-1 calc_hari" style="font-size:30px;"/>
                        <input type="button" value="9" id="9" class="button-primary w-100 m-1 calc_hari" style="font-size:30px;"/>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" value="Hapus" id="clear_hari" class="button-danger w-100 m-1 clear" style="font-size:30px;">Hapus</button>
                        <input type="button" value="0" id="0 " class="button-primary w-100 m-1 calc_hari" style="font-size:30px;"/>
                        <button type="button" value="Lanjut" id="enter_hari" class="button-success w-100 m-1 enter" style="font-size:30px;">Lanjut</button>
                    </div>
                </div>
                <div id="padBulan">
                    <div class="d-flex justify-content-between">
                        <input type="button" value="1" id="1" class="button-primary w-100 m-1 calc_bulan" style="font-size:30px;"/>
                        <input type="button" value="2" id="2" class="button-primary w-100 m-1 calc_bulan" style="font-size:30px;"/>
                        <input type="button" value="3" id="3" class="button-primary w-100 m-1 calc_bulan" style="font-size:30px;"/>
                    </div>
                    <div class="d-flex justify-content-between">
                        <input type="button" value="4" id="4" class="button-primary w-100 m-1 calc_bulan" style="font-size:30px;"/>
                        <input type="button" value="5" id="5" class="button-primary w-100 m-1 calc_bulan" style="font-size:30px;"/>
                        <input type="button" value="6" id="6" class="button-primary w-100 m-1 calc_bulan" style="font-size:30px;"/>
                    </div>
                    <div class="d-flex justify-content-between">
                        <input type="button" value="7" id="7" class="button-primary w-100 m-1 calc_bulan" style="font-size:30px;"/>
                        <input type="button" value="8" id="8" class="button-primary w-100 m-1 calc_bulan" style="font-size:30px;"/>
                        <input type="button" value="9" id="9" class="button-primary w-100 m-1 calc_bulan" style="font-size:30px;"/>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" value="Hapus" id="clear_bulan" class="button-danger w-100 m-1 clear" style="font-size:30px;">Hapus</button>
                        <input type="button" value="0" id="0 " class="button-primary w-100 m-1 calc_bulan" style="font-size:30px;"/>
                        <button type="button" value="Lanjut" id="enter_bulan" class="button-success w-100 m-1 enter" style="font-size:30px;">Lanjut</button>
                    </div>
                </div>
                <div id="padTahun">
                    <div class="d-flex justify-content-between">
                        <input type="button" value="1" id="1" class="button-primary w-100 m-1 calc_tahun" style="font-size:30px;"/>
                        <input type="button" value="2" id="2" class="button-primary w-100 m-1 calc_tahun" style="font-size:30px;"/>
                        <input type="button" value="3" id="3" class="button-primary w-100 m-1 calc_tahun" style="font-size:30px;"/>
                    </div>
                    <div class="d-flex justify-content-between">
                        <input type="button" value="4" id="4" class="button-primary w-100 m-1 calc_tahun" style="font-size:30px;"/>
                        <input type="button" value="5" id="5" class="button-primary w-100 m-1 calc_tahun" style="font-size:30px;"/>
                        <input type="button" value="6" id="6" class="button-primary w-100 m-1 calc_tahun" style="font-size:30px;"/>
                    </div>
                    <div class="d-flex justify-content-between">
                        <input type="button" value="7" id="7" class="button-primary w-100 m-1 calc_tahun" style="font-size:30px;"/>
                        <input type="button" value="8" id="8" class="button-primary w-100 m-1 calc_tahun" style="font-size:30px;"/>
                        <input type="button" value="9" id="9" class="button-primary w-100 m-1 calc_tahun" style="font-size:30px;"/>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" value="Hapus" id="clear_tahun" class="button-danger w-100 m-1 clear" style="font-size:30px;">Hapus</button>
                        <input type="button" value="0" id="0 " class="button-primary w-100 m-1 calc_tahun" style="font-size:30px;"/>
                        <button type="button" value="Selesai" id="enter_tahun" class="button-success w-100 m-1 enter" style="font-size:30px;">Selesai</button>
                    </div>
                </div>

                <div class="mt-2">
                    <button type="button" class="button-info w-100 p-2 m-1" data-bs-dismiss="modal" style="font-size:30px;">Batal</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#padBulan').hide();
        $('#padTahun').hide();
        $('#auth_no_rkm_medis').hide();
        $('#span_hari').addClass('text-white');
        var text_hari = $("#hari");
        var text_bulan = $("#bulan");
        var text_tahun = $("#tahun");
        $('#hari').click(function() {
            $('#span_hari').addClass('text-white');
            $('#span_bulan').removeClass('text-white');
            $('#span_tahun').removeClass('text-white');
            $('#padTanggal').show();
            $('#padBulan').hide();
            $('#padTahun').hide();
        });
        $('#bulan').click(function() {
            $('#span_hari').removeClass('text-white');
            $('#span_bulan').addClass('text-white');
            $('#span_tahun').removeClass('text-white');
            $('#padTanggal').hide();
            $('#padBulan').show();
            $('#padTahun').hide();
        });
        $('#tahun').click(function() {
            $('#span_hari').removeClass('text-white');
            $('#span_bulan').removeClass('text-white');
            $('#span_tahun').addClass('text-white');
            $('#padTanggal').hide();
            $('#padBulan').hide();
            $('#padTahun').show();
        });
        $("#hari").keypress(function () {
            return false;
        });
        $("#bulan").keypress(function () {
            return false;
        });
        $("#tahun").keypress(function () {
            return false;
        });
        $(".calc_hari").click(function () {
            var text = $("#hari").val().length;
            if (text == 2) {
                $('#span_hari').removeClass('text-white');
                $('#span_bulan').addClass('text-white');
                $('#span_tahun').removeClass('text-white');
                $('#padTanggal').hide();
                $('#padBulan').show();
                $('#padTahun').hide();
            } else {
                let value = $(this).val();
                hari(value);
            }
        });
        function hari(value) {
            text_hari.val(text_hari.val() + value);
        }
        $("#clear_hari").click(function () {
            var bsp = document.getElementById("hari").value;
            document.getElementById("hari").value=bsp.substring(0,bsp.length -1);
        });
        $("#enter_hari").click(function () {
            var text = $("#hari").val().length;
            if (text != 0) {
                $('#span_hari').removeClass('text-white');
                $('#span_bulan').addClass('text-white');
                $('#span_tahun').removeClass('text-white');
                $('#padTanggal').hide();
                $('#padBulan').show();
                $('#padTahun').hide();
            } else {
                $("#alertDanger").addClass('show');
                $("#pesanDanger").text("Hari tidak boleh kosong!");
                hilang();
            }
        });

        $(".calc_bulan").click(function () {
            var text = $("#bulan").val().length;
            if (text == 2) {
                $('#span_hari').removeClass('text-white');
                $('#span_bulan').removeClass('text-white');
                $('#span_tahun').addClass('text-white');
                $('#padTanggal').hide();
                $('#padBulan').hide();
                $('#padTahun').show();
            } else {
                let value = $(this).val();
                bulan(value);
            }
        });
        function bulan(value) {
            text_bulan.val(text_bulan.val() + value);
        }
        $("#clear_bulan").click(function () {
            var bsp = document.getElementById("bulan").value;
            document.getElementById("bulan").value=bsp.substring(0,bsp.length -1);
        });
        $("#enter_bulan").click(function () {
            var text = $("#bulan").val().length;
            if (text != 0) {
                $('#span_hari').removeClass('text-white');
                $('#span_bulan').removeClass('text-white');
                $('#span_tahun').addClass('text-white');
                $('#padTanggal').hide();
                $('#padBulan').hide();
                $('#padTahun').show();
            } else {
                $("#alertDanger").addClass('show');
                $("#pesanDanger").text("Bulan tidak boleh kosong!");
                hilang();
            }
        });

        $(".calc_tahun").click(function () {
            var text = $("#tahun").val().length;
            if (text == 4) {
                $('#span_hari').removeClass('text-white');
                $('#span_bulan').removeClass('text-white');
                $('#span_tahun').addClass('text-white');
                $('#padTanggal').hide();
                $('#padBulan').hide();
                $('#padTahun').show();
                $("#alertDanger").addClass('show');
                $("#pesanDanger").text("Tahun hanya 4 digit!");
                hilang();
            } else {
                let value = $(this).val();
                tahun(value);
            }
        });
        function tahun(value) {
            text_tahun.val(text_tahun.val() + value);
        }
        $("#clear_tahun").click(function () {
            var bsp = document.getElementById("tahun").value;
            document.getElementById("tahun").value=bsp.substring(0,bsp.length -1);
        });
        $("#enter_tahun").click(function () {
            var text = $("#tahun").val().length;
            if (text != 0) {
                cekTanggallahir();
            } else {
                $("#alertDanger").addClass('show');
                $("#pesanDanger").text("Tahun tidak boleh kosong!");
                hilang();
            }
        });
    });
    function cekTanggallahir() {
        var hari = $("#hari").val();
        var bulan = $("#bulan").val();
        var tahun = $("#tahun").val();
        var no_rkm_medis = $("#auth_no_rkm_medis").text();
        var text_hari = $("#hari").val().length;
        var text_bulan = $("#bulan").val().length;
        var text_tahun = $("#tahun").val().length;
        if (text_hari == 0) {
            $("#alertDanger").addClass('show');
            $("#pesanDanger").text("Hari tidak boleh kosong!");
        } else if (text_bulan == 0) {
            $("#alertDanger").addClass('show');
            $("#pesanDanger").text("Bulan tidak boleh kosong!");
        } else if (text_tahun == 0) {
            $("#alertDanger").addClass('show');
            $("#pesanDanger").text("Tahun tidak boleh kosong!");
        } else {
            $.ajax({
                type: "GET",
                url: "offline-cek-tanggal",
                data: {
                    hari: hari,
                    bulan: bulan,
                    tahun: tahun,
                    no_rkm_medis: no_rkm_medis
                },
                success:function(response){
                    console.log(response);
                    if (response == "berhasil") {
                        window.location.replace("{{url('home')}}");
                    }
                    if (response == "salah") {
                        $("#alertDanger").addClass('show');
                        $("#pesanDanger").text("Tanggal lahir anda salah!");
                        hilang();
                    }
                }
            });
        }
    }
    function hilang() {
        setTimeout(function() {
            $("#alertInfo").removeClass('show');
            $("#alertDanger").removeClass('show');
        },4000);
    }
</script>

<div class="modal fade" id="verifikasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content bg-dark box-shadow">
            <div class="modal-body">
                <h1 class="text-white text-center">Verifikasi Tanggal Lahir</h1>
                <hr>
                <p class="text-white display-6">Hai <b class="text-white" id="verifi_nm_pasien"></b>?</p>
                <p class="text-white lead">Masukan tanggal lahir anda</p>
                <form id="formVerifikasi">
                    <p class="text-center" id="verifi_no_tiket"></p>
                    <p class="text-center" id="verifi_no_rkm_medis"></p>
                    <div class="d-flex justify-content-between">
                        <div class="form-group m-1">
                            <span id="verifi_span_hari" class="lead">Hari</span>
                            <input type="text" id="input_verifi_hari" class="form-control text-center bg-dark text-white border border-primary" placeholder="00" style="font-size:30px;">
                        </div>
                        <div class="form-group m-1">
                            <span id="verifi_span_bulan" class="lead">Bulan</span>
                            <input type="text" id="input_verifi_bulan" class="form-control text-center bg-dark text-white border border-primary" placeholder="00" style="font-size:30px;">
                        </div>
                        <div class="form-group m-1">
                            <span id="verifi_span_tahun" class="lead">Tahun</span>
                            <input type="text" id="input_verifi_tahun" class="form-control text-center bg-dark text-white border border-primary" placeholder="0000" style="font-size:30px;">
                        </div>
                    </div>
                    <div id="verifi_padTanggal">
                        tanggal
                        <div class="d-flex justify-content-between">
                            <input type="button" value="1" id="1" class="button-primary w-100 m-1 key_verifi_hari" style="font-size:30px;"/>
                            <input type="button" value="2" id="2" class="button-primary w-100 m-1 key_verifi_hari" style="font-size:30px;"/>
                            <input type="button" value="3" id="3" class="button-primary w-100 m-1 key_verifi_hari" style="font-size:30px;"/>
                        </div>
                        <div class="d-flex justify-content-between">
                            <input type="button" value="4" id="4" class="button-primary w-100 m-1 key_verifi_hari" style="font-size:30px;"/>
                            <input type="button" value="5" id="5" class="button-primary w-100 m-1 key_verifi_hari" style="font-size:30px;"/>
                            <input type="button" value="6" id="6" class="button-primary w-100 m-1 key_verifi_hari" style="font-size:30px;"/>
                        </div>
                        <div class="d-flex justify-content-between">
                            <input type="button" value="7" id="7" class="button-primary w-100 m-1 key_verifi_hari" style="font-size:30px;"/>
                            <input type="button" value="8" id="8" class="button-primary w-100 m-1 key_verifi_hari" style="font-size:30px;"/>
                            <input type="button" value="9" id="9" class="button-primary w-100 m-1 key_verifi_hari" style="font-size:30px;"/>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="button" value="Hapus" id="verifi_clear_hari" class="button-danger w-100 m-1 clear" style="font-size:30px;">Hapus</button>
                            <input type="button" value="0" id="0 " class="button-primary w-100 m-1 key_verifi_hari" style="font-size:30px;"/>
                            <button type="button" value="Lanjut" id="verifi_enter_hari" class="button-success w-100 m-1 enter" style="font-size:30px;">Lanjut</button>
                        </div>
                    </div>
                    <div id="verifi_padBulan">
                        bulan
                        <div class="d-flex justify-content-between">
                            <input type="button" value="1" id="1" class="button-primary w-100 m-1 key_verifi_bulan" style="font-size:30px;"/>
                            <input type="button" value="2" id="2" class="button-primary w-100 m-1 key_verifi_bulan" style="font-size:30px;"/>
                            <input type="button" value="3" id="3" class="button-primary w-100 m-1 key_verifi_bulan" style="font-size:30px;"/>
                        </div>
                        <div class="d-flex justify-content-between">
                            <input type="button" value="4" id="4" class="button-primary w-100 m-1 key_verifi_bulan" style="font-size:30px;"/>
                            <input type="button" value="5" id="5" class="button-primary w-100 m-1 key_verifi_bulan" style="font-size:30px;"/>
                            <input type="button" value="6" id="6" class="button-primary w-100 m-1 key_verifi_bulan" style="font-size:30px;"/>
                        </div>
                        <div class="d-flex justify-content-between">
                            <input type="button" value="7" id="7" class="button-primary w-100 m-1 key_verifi_bulan" style="font-size:30px;"/>
                            <input type="button" value="8" id="8" class="button-primary w-100 m-1 key_verifi_bulan" style="font-size:30px;"/>
                            <input type="button" value="9" id="9" class="button-primary w-100 m-1 key_verifi_bulan" style="font-size:30px;"/>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="button" value="Hapus" id="verifi_clear_bulan" class="button-danger w-100 m-1 clear" style="font-size:30px;">Hapus</button>
                            <input type="button" value="0" id="0 " class="button-primary w-100 m-1 key_verifi_bulan" style="font-size:30px;"/>
                            <button type="button" value="Lanjut" id="verifi_enter_bulan" class="button-success w-100 m-1 enter" style="font-size:30px;">Lanjut</button>
                        </div>
                    </div>
                    <div id="verifi_padTahun">
                        tahun
                        <div class="d-flex justify-content-between">
                            <input type="button" value="1" id="1" class="button-primary w-100 m-1 key_verifi_tahun" style="font-size:30px;"/>
                            <input type="button" value="2" id="2" class="button-primary w-100 m-1 key_verifi_tahun" style="font-size:30px;"/>
                            <input type="button" value="3" id="3" class="button-primary w-100 m-1 key_verifi_tahun" style="font-size:30px;"/>
                        </div>
                        <div class="d-flex justify-content-between">
                            <input type="button" value="4" id="4" class="button-primary w-100 m-1 key_verifi_tahun" style="font-size:30px;"/>
                            <input type="button" value="5" id="5" class="button-primary w-100 m-1 key_verifi_tahun" style="font-size:30px;"/>
                            <input type="button" value="6" id="6" class="button-primary w-100 m-1 key_verifi_tahun" style="font-size:30px;"/>
                        </div>
                        <div class="d-flex justify-content-between">
                            <input type="button" value="7" id="7" class="button-primary w-100 m-1 key_verifi_tahun" style="font-size:30px;"/>
                            <input type="button" value="8" id="8" class="button-primary w-100 m-1 key_verifi_tahun" style="font-size:30px;"/>
                            <input type="button" value="9" id="9" class="button-primary w-100 m-1 key_verifi_tahun" style="font-size:30px;"/>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="button" value="Hapus" id="verifi_clear_tahun" class="button-danger w-100 m-1 clear" style="font-size:30px;">Hapus</button>
                            <input type="button" value="0" id="0 " class="button-primary w-100 m-1 key_verifi_tahun" style="font-size:30px;"/>
                            <button type="button" value="Selesai" id="verifi_enter_tahun" class="button-success w-100 m-1 enter" style="font-size:30px;">Selesai</button>
                        </div>
                    </div>

                    <div class="mt-2">
                        <button type="button" class="button-info w-100 p-2 m-1" data-bs-dismiss="modal" style="font-size:30px;">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#verifi_padBulan').hide();
        $('#verifi_padTahun').hide();
        $('#verifi_tiket').hide();
        $('#verifi_no_rkm_medis').hide();
        $('#verifi_span_hari').addClass('text-white');
        var text_hari = $("#input_verifi_hari");
        var text_bulan = $("#input_verifi_bulan");
        var text_tahun = $("#input_verifi_tahun");
        $('#input_verifi_hari').click(function() {
            $('#verifi_span_hari').addClass('text-white');
            $('#verifi_span_bulan').removeClass('text-white');
            $('#verifi_span_tahun').removeClass('text-white');
            $('#verifi_padTanggal').show();
            $('#verifi_padBulan').hide();
            $('#verifi_padTahun').hide();
        });
        $('#input_verifi_bulan').click(function() {
            $('#verifi_span_hari').removeClass('text-white');
            $('#verifi_span_bulan').addClass('text-white');
            $('#verifi_span_tahun').removeClass('text-white');
            $('#verifi_padTanggal').hide();
            $('#verifi_padBulan').show();
            $('#verifi_padTahun').hide();
        });
        $('#input_verifi_tahun').click(function() {
            $('#verifi_span_hari').removeClass('text-white');
            $('#verifi_span_bulan').removeClass('text-white');
            $('#verifi_span_tahun').addClass('text-white');
            $('#verifi_padTanggal').hide();
            $('#verifi_padBulan').hide();
            $('#verifi_padTahun').show();
        });
        $("#input_verifi_hari").keypress(function () {
            return false;
        });
        $("#input_verifi_bulan").keypress(function () {
            return false;
        });
        $("#input_verifi_tahun").keypress(function () {
            return false;
        });
        $(".key_verifi_hari").click(function () {
            var text = $("#input_verifi_hari").val().length;
            if (text == 2) {
                $('#verifi_span_hari').removeClass('text-white');
                $('#verifi_span_bulan').addClass('text-white');
                $('#verifi_span_tahun').removeClass('text-white');
                $('#verifi_padTanggal').hide();
                $('#verifi_padBulan').show();
                $('#verifi_padTahun').hide();
            } else {
                let value = $(this).val();
                verifi_hari(value);
            }
        });
        function verifi_hari(value) {
            text_hari.val(text_hari.val() + value);
        }
        $("#verifi_clear_hari").click(function () {
            var bsp = document.getElementById("input_verifi_hari").value;
            document.getElementById("input_verifi_hari").value=bsp.substring(0,bsp.length -1);
        });
        $("#verifi_enter_hari").click(function () {
            var text = $("#input_verifi_hari").val().length;
            if (text != 0) {
                $('#verifi_span_hari').removeClass('text-white');
                $('#verifi_span_bulan').addClass('text-white');
                $('#verifi_span_tahun').removeClass('text-white');
                $('#verifi_padTanggal').hide();
                $('#verifi_padBulan').show();
                $('#verifi_padTahun').hide();
            } else {
                $("#alertDanger").addClass('show');
                $("#pesanDanger").text("Hari tidak boleh kosong!");
                hilang();
            }
        });

        $(".key_verifi_bulan").click(function () {
            var text = $("#input_verifi_bulan").val().length;
            if (text == 2) {
                $('#verifi_span_hari').removeClass('text-white');
                $('#verifi_span_bulan').removeClass('text-white');
                $('#verifi_span_tahun').addClass('text-white');
                $('#verifi_padTanggal').hide();
                $('#verifi_padBulan').hide();
                $('#verifi_padTahun').show();
            } else {
                let value = $(this).val();
                verifi_bulan(value);
            }
        });
        function verifi_bulan(value) {
            text_bulan.val(text_bulan.val() + value);
        }
        $("#verifi_clear_bulan").click(function () {
            var bsp = document.getElementById("input_verifi_bulan").value;
            document.getElementById("input_verifi_bulan").value=bsp.substring(0,bsp.length -1);
        });
        $("#verifi_enter_bulan").click(function () {
            var text = $("#input_verifi_bulan").val().length;
            if (text != 0) {
                $('#verifi_span_hari').removeClass('text-white');
                $('#verifi_span_bulan').removeClass('text-white');
                $('#verifi_span_tahun').addClass('text-white');
                $('#verifi_padTanggal').hide();
                $('#verifi_padBulan').hide();
                $('#verifi_padTahun').show();
            } else {
                $("#alertDanger").addClass('show');
                $("#pesanDanger").text("Bulan tidak boleh kosong!");
                hilang();
            }
        });

        $(".key_verifi_tahun").click(function () {
            var text = $("#input_verifi_tahun").val().length;
            if (text == 4) {
                $('#verifi_span_hari').removeClass('text-white');
                $('#verifi_span_bulan').removeClass('text-white');
                $('#verifi_span_tahun').addClass('text-white');
                $('#verifi_padTanggal').hide();
                $('#verifi_padBulan').hide();
                $('#verifi_padTahun').show();
                $("#alertDanger").addClass('show');
                $("#pesanDanger").text("Tahun hanya 4 digit!");
                hilang();
            } else {
                let value = $(this).val();
                verifi_tahun(value);
            }
        });
        function verifi_tahun(value) {
            text_tahun.val(text_tahun.val() + value);
        }
        $("#verifi_clear_tahun").click(function () {
            var bsp = document.getElementById("input_verifi_tahun").value;
            document.getElementById("input_verifi_tahun").value=bsp.substring(0,bsp.length -1);
        });
        $("#verifi_enter_tahun").click(function () {
            var hari = $("#input_verifi_hari").val();
            var bulan = $("#input_verifi_bulan").val();
            var tahun = $("#input_verifi_tahun").val();
            var no_tiket = $("#verifi_no_tiket").text();
            var no_rkm_medis = $("#verifi_no_rkm_medis").text();
            $.ajax({
                type: "GET",
                url: "online-cek-tanggal",
                data: {
                    hari: hari,
                    bulan: bulan,
                    tahun: tahun,
                    no_tiket: no_tiket,
                    no_rkm_medis: no_rkm_medis
                },
                success:function(response){
                    console.log(response);
                    if (response == "hari kosong") {
                        $("#alertDanger").addClass('show');
                        $("#pesanDanger").text("Tanggal tidak boleh kosong!");
                        hilang();
                    }
                    if (response == "bulan kosong") {
                        $("#alertDanger").addClass('show');
                        $("#pesanDanger").text("Bulan tidak boleh kosong!");
                        hilang();
                    }
                    if (response == "tahun kosong") {
                        $("#alertDanger").addClass('show');
                        $("#pesanDanger").text("Tahun tidak boleh kosong!");
                        hilang();
                    }
                    if (response == "salah") {
                        $("#alertDanger").addClass('show');
                        $("#pesanDanger").text("Tanggal lahir anda salah!");
                        hilang();
                    }
                    if (response == "berhasil") {
                        createPeriksaOnline(no_tiket,no_rkm_medis);
                    }
                }
            });
        });
    });
    function createPeriksaOnline(no_tiket,no_rkm_medis) {
        $.ajax({
            type: "GET",
            url: "online-selesai",
            data: {
                no_tiket: no_tiket,
                no_rkm_medis: no_rkm_medis
            },
            success:function(response){
                console.log(response);
                if (response == "ada") {
                    $("#alertDanger").addClass('show');
                    $("#pesanDanger").text("Maaf sepertinya ada data yang belum terclosing!");
                    hilang();
                }
                if (response == "gagal") {
                    $("#alertDanger").addClass('show');
                    $("#pesanDanger").text("Maaf sepertinya ada data yang belum terclosing!");
                    hilang();
                }
                if (response == "berhasil") {
                    window.location.replace("{{url('apm-cetak')}}");
                }
            }
        });
    }

    function hilang() {
        setTimeout(function() {
            $("#alertInfo").removeClass('show');
            $("#alertDanger").removeClass('show');
        },4000);
    }
</script>
@endsection
