<div class="mb-3">
    <label class="form-label">Nomor telp</label>
    <input type="text" id="nohp" class="form-control text-center fs-1 fw-bold" onkeypress="return onlyNumberKey(event)" maxlength="13">
</div>
<div class="">
    @include('includes.padnumber')
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var input_value = $("#nohp");
        $(".calc").click(function () {
            var text = $("#nohp").val().length;
            if (text >= 13) {
                var pesan = "Maaf nomor telp maksimal 13 digit";
                notifGagal(pesan);
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
            var bsp = document.getElementById("nohp").value;
            document.getElementById("nohp").value=bsp.substring(0,bsp.length -1);
        });
        $("#enter").click(function () {
            var text = $("#nohp").val().length;
            if (text == 0) {
                $("#alertDanger").addClass('show');
                $("#pesanDanger").text("Nomor telp tidak boleh kosong");
                hilang();
            } else {
                var nohp = $('#nohp').val();
                $('#notelp').val(nohp);
                $('#modalnohp').modal('hide');
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
