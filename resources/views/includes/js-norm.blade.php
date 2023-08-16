<div class="mb-3">
    <label class="form-label">Nomor rekam medis</label>
    <input type="text" id="no_rkm_medis" class="form-control text-center fs-1 fw-bold" onkeypress="return onlyNumberKey(event)" maxlength="8">
</div>
<div class="">
    @include('includes.padnumber')
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var input_value = $("#no_rkm_medis");
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
                $('#norm').val(no_rkm_medis);
                $('#modalnorm').modal('hide');
            }
        });
        function notifBerhasil(pesan) {
            $("#notifBerhasil").addClass('show');
            $("#pesanBerhasil").text(pesan);
        }
        function notifGagal(pesan) {
            $("#notifGagal").addClass('show');
            $("#pesanGagal").text(pesan);
        }
        function hilang() {
            setTimeout(function() {
                 $("#notifBerhasil").removeClass('show');
                 $("#notifGagal").removeClass('show');
            },4000);
        }
    });
</script>
