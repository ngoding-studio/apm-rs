<div class="mb-3">
    <h4 class="text-muted">VERIFIKASI TANGGAL LAHIR</h4>
    <div class="d-flex justify-content-between">
        <div class="form-group m-1">
            <span id="span_hari" class="form-label">Hari</span>
            <input type="text" id="hari" class="form-control text-center fs-1 fw-bold" placeholder="00" maxlength="2" onkeypress="return onlyNumberKey(event)">
        </div>
        <div class="form-group m-1">
            <span id="span_bulan" class="form-label">Bulan</span>
            <input type="text" id="bulan" class="form-control text-center fs-1 fw-bold" placeholder="00" maxlength="2" onkeypress="return onlyNumberKey(event)">
        </div>
        <div class="form-group m-1">
            <span id="span_tahun" class="form-label">Tahun</span>
            <input type="text" id="tahun" class="form-control text-center fs-1 fw-bold" placeholder="0000" maxlength="4" onkeypress="return onlyNumberKey(event)">
        </div>
    </div>
</div>
@include('includes.paddate')
<script type="text/javascript">
    $(document).ready(function() {
        $('#padBulan').hide();
        $('#padTahun').hide();
        $('#auth_no_rkm_medis').hide();
        // $('#span_hari').addClass('text-danger');
        var text_hari = $("#hari");
        var text_bulan = $("#bulan");
        var text_tahun = $("#tahun");
        $('#hari').click(function() {
            // $('#span_hari').addClass('text-danger');
            // $('#span_bulan').removeClass('text-danger');
            // $('#span_tahun').removeClass('text-danger');
            $('#padTanggal').show();
            $('#padBulan').hide();
            $('#padTahun').hide();
        });
        $('#bulan').click(function() {
            // $('#span_hari').removeClass('text-danger');
            // $('#span_bulan').addClass('text-danger');
            // $('#span_tahun').removeClass('text-danger');
            $('#padTanggal').hide();
            $('#padBulan').show();
            $('#padTahun').hide();
        });
        $('#tahun').click(function() {
            // $('#span_hari').removeClass('text-danger');
            // $('#span_bulan').removeClass('text-danger');
            // $('#span_tahun').addClass('text-danger');
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
                // $('#span_hari').removeClass('text-danger');
                // $('#span_bulan').addClass('text-danger');
                // $('#span_tahun').removeClass('text-danger');
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
                // $('#span_hari').removeClass('text-danger');
                // $('#span_bulan').addClass('text-danger');
                // $('#span_tahun').removeClass('text-danger');
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
                // $('#span_hari').removeClass('text-danger');
                // $('#span_bulan').removeClass('text-danger');
                // $('#span_tahun').addClass('text-danger');
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
                // $('#span_hari').removeClass('text-danger');
                // $('#span_bulan').removeClass('text-danger');
                // $('#span_tahun').addClass('text-danger');
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
                // $('#span_hari').removeClass('text-danger');
                // $('#span_bulan').removeClass('text-danger');
                // $('#span_tahun').addClass('text-danger');
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
                var hari = $('#hari').val();
                var bulan = $('#bulan').val();
                var tahun = $('#tahun').val();
                $('#tgl_lahir').val(tahun+"-"+bulan+"-"+hari);
                $('#modaltanggallahir').modal('hide');
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
