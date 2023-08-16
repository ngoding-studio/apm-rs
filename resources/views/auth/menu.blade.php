@extends('index')
@section('title', 'APM')
@section('container')
<style media="screen">
.bg-image {
  background-image: url("assets/img/banner/bgvivid.png");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
<div id="body">
    <div class="center bg-image">
        <div id="screensaver" class="text-center">
            <img src="assets/img/logo/rsbbtimbul.png" width="200">
            <h1 class="text-white fw-bold mb-0 display-2">Selamat Datang</h1>
            <h1 class="text-white fw-bold display-2"> <small class="text-warning">di</small> RS Bhayangkara Brimob</h1>
            <em class="text-warning mb-5 display-5">"Melayani Dengan Hati"</em>
            <p class="text-white mt-5 pt-5 display-4">Sentuh saya untuk memulai</p>
         </div>
         <div id="menuApm" class="container my-5 d-none" style="z-index:9999;">
             <div id="d_button" class="text-center container col-xl-6 col-lg-6 col-md-8 col-sm-12 bg-glasses-transparant p-5">
                 <h1 class="display-4 text-white">ANJUNGAN MANDIRI PASIEN</h1>
                 <button id="btn_offline" type="button" class="bg-glasses w-100 rounded-3 p-3 m-1 fw-bold fs-3 text-dark">REGISTRASI OFFLINE</button>
                 <button id="btn_online" type="button" class="bg-glasses w-100 rounded-3 p-3 m-1 fw-bold fs-3 text-warning">VERIFIKASI BOOKING</button>
                 <button id="btn_bukti" type="button" class="bg-glasses w-100 rounded-3 p-3 m-1 fw-bold fs-3 text-white">CETAK BUKTI REGISTRASI</button>
             </div>
         </div>

    </div>
    <!-- <ul class="circles">
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
    </ul> -->
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#menuApm').hide();
        var s_saver;
        $('#body').mousemove(function() {
            clearTimeout(s_saver);
            s_saver = setTimeout(function(){
                $('#screensaver').show(900);
                $('#menuApm').hide(900);
                $('#menuApm').addClass('d-none');
                $('#menuApm').removeClass('d-block');
            }, 120000);
            $('#menuApm').show(400);
            $('#menuApm').addClass('d-block');
            $('#menuApm').removeClass('d-none');
            $('#screensaver').hide(100);
        });
        $("#btn_offline").click(function() {
        	window.location.href = "apm-offline";
        });
        $("#btn_online").click(function() {
        	window.location.href = "apm-online";
        });
        $("#btn_bukti").click(function() {
        	window.location.href = "apm-bukti";
        });
    });
</script>
@endsection
