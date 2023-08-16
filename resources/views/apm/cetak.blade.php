@extends('index')
@section('title', 'APM')
@section('container')
<style media="screen">
@page {
    size: auto;
    margin: 0;
}

@print {
    @page :footer {
        display: none
    }

    @page :header {
        display: none
    }
}
</style>
<div id="body">
    <div class="center bg-primary">
        <div class="bg-glasses-black" style="z-index:999; background-image: url('{{ asset('assets/img/banner/success.gif')}}'); background-repeat: no-repeat; background-size:cover; height:500px;">
            <div class="card-body py-5">
                <div class="text-center mx-5">
                    <div class="mx-5 py-3">
                        <p class="display-4 fw-bold text-success">REGISTRASI BERHASIL!</p>
                        <p class="display-6 fw-bold text-white">Hai <b>{{session()->get('session_nama')}}</b> Silahkan cetak bukti registrasi anda!</p>
                    </div>
                    <div class="text-center py-5 mt-5">
                        <button type="button" class="bg-glasses rounded-3 w-50 fs-3 fw-bold py-2 me-1 text-warning" id="btn_cetak_registrasi">Cetak Bukti Registrasi</button>
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
 <div class="modal fade" id="logout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-md">
         <div class="modal-content bg-dark box-shadow">
             <div class="modal-body">
                 <h3 class="text-white">Konfimasi</h3>
                 <h4 class="text-white">Yakin anda ingin membatalkan?</h4>
             </div>
             <div class="modal-footer">
                 <button type="button" class="button-info" data-bs-dismiss="modal" style="font-size:20px;">Tidak</button>
                 <a href="{{url('apm-logout')}}" class="text-white button-danger" style="font-size:20px;">Batalkan</a>
             </div>
         </div>
     </div>
 </div>
 <div class="bukti_regis d-block" id="tiket_registrasi">
     <div class="p-3" style="width:100%; margin:0 auto;">
         <div class="text-center">
            <h6 class="mb-0" style="color:#000; font-weight:bold;"> RS BHAYANGKARA BRIMOB</h6>
            <p class="mb-0" style="font-size:11px;color:#000;">Jl. Komjen Pol M Yasin Kelapadua, Depok, Jawa Barat</p>
            <p class="mb-0" style="font-size:11px;color:#000;">Telp : 021 87704691</p>
         </div>
         <div style="width:100%; border:1px solid #000;margin-bottom:10px;">

         </div>
         <h6 class="text-center" style="color:#000; font-weight:bold;">BUKTI REGISTRASI</h6>
         <table style="width:100%;">
             <tbody style="font-size:11px;color:#000;">
                 <tr valign="top">
                     <td style="width:100px;">Tanggal</td>
                     <td>:</td>
                     <td>{{session()->get('session_tgl_registrasi')}} {{session()->get('session_jam_reg')}}</td>
                 </tr>
                 <tr valign="top">
                     <td style="width:100px;">No Rawat</td>
                     <td>:</td>
                     <td>{{session()->get('session_no_rawat')}}</td>
                 </tr>
                 <tr valign="top">
                     <td style="width:100px;">No RM</td>
                     <td>:</td>
                     <td>{{session()->get('session_norm')}}</td>
                 </tr>
                 <tr valign="top">
                     <td style="width:100px;">Poli</td>
                     <td>:</td>
                     <td>{{session()->get('session_nm_poli')}}</td>
                 </tr>
                 <tr valign="top">
                     <td style="width:100px;">Dokter</td>
                     <td>:</td>
                     <td>{{session()->get('session_nm_dokter')}}</td>
                 </tr>
                 <tr valign="top">
                     <td style="width:100px;">Nama</td>
                     <td>:</td>
                     <td>{{session()->get('session_nama')}}</td>
                 </tr>
                 <tr valign="top">
                     <td style="width:100px;">Jenis Kelamin</td>
                     <td>:</td>
                     <td>
                         @if(session()->get('session_jk') == 'L')
                         <span>Laki-laki</span>
                         @else
                         <span>Perempuan</span>
                         @endif
                     </td>
                 </tr>
                 <tr valign="top">
                     <td style="width:100px;">Usia</td>
                     <td>:</td>
                     <td>{{session()->get('session_umur')}} {{session()->get('session_status_umur')}}</td>
                 </tr>
                 <tr valign="top">
                     <td style="width:100px;">No Telp.</td>
                     <td>:</td>
                     <td>{{session()->get('session_nohp')}}</td>
                 </tr>
             </tbody>
         </table>
         <table class="mt-3" style="width:100%;">
             <tbody style="font-size:11px;color:#000;">
                 <tr>
                     <td class="text-center">No Antrian Poli</td>
                     <td class="text-center">Jenis Bayar</td>
                 </tr>
                 <tr>
                     <td class="text-center"> <h6 style="color:#000; font-weight:bold;">{{session()->get('session_no_reg')}}</h6> </td>
                     <td class="text-center"> <h6 style="color:#000; font-weight:bold;">{{session()->get('session_nm_bayar')}}</h6> </td>
                 </tr>
             </tbody>
         </table>
         <div class="text-center">
            <div id="barcode">
                {{session()->get('session_qrcode')}}
            </div>
         </div>
     </div>
 </div>
 <div class="bukti_regis" id="kuitansi">
     <div class="p-3">
         <div style="width:300px;">
             <div class="line-dashed-top">
                 <p class="text-dark text-center">RS BHAYANGKARA BRIMOB</p>
             </div>
             <div class="line-dashed-top">
                 <p class="text-dark text-center">LEMBAR PERIKSA PASIEN</p>
             </div>
             <div class="line-dashed-top"></div>
         </div>

         <table style="width:100%;" class="text-dark">
             <tbody>
                 <tr valign="top">
                     <td style="width:150px;">ID Transaksi</td>
                     <td>:</td>
                     <td>{{session()->get('session_no_rawat')}}</td>
                     <td style="width:150px;">No. Antrian</td>
                     <td>:</td>
                     <td>{{session()->get('session_no_reg')}}</td>
                 </tr>
                 <tr valign="top">
                     <td style="width:150px;">Unit Dituju</td>
                     <td>:</td>
                     <td>{{session()->get('session_nm_poli')}}</td>
                 </tr>
                 <tr valign="top">
                     <td style="width:150px;">Nama</td>
                     <td>:</td>
                     <td>{{session()->get('session_nm_pasien')}} ({{session()->get('session_umur')}} {{session()->get('session_status_umur')}})</td>
                 </tr>
                 <tr valign="top">
                     <td style="width:150px;">No RM</td>
                     <td>:</td>
                     <td>{{session()->get('session_no_rkm_medis')}}</td>
                 </tr>

                 <tr valign="top">
                     <td style="width:150px;">Cara Bayar</td>
                     <td>:</td>
                     <td>{{session()->get('session_nm_bayar')}}</td>
                 </tr>
                 <tr valign="top">
                     <td style="width:150px;">Penanggung Jawab</td>
                     <td>:</td>
                     <td>{{session()->get('session_penanggung_jawab')}}</td>
                 </tr>
                 <tr valign="top">
                     <td style="width:150px;">Diagnosa</td>
                     <td>:</td>
                     <td colspan="4" class="border-bottom border-dark"></td>
                 </tr>
                 <tr valign="top">
                     <td style="width:150px;">Tindakan</td>
                     <td>:</td>
                     <td colspan="4" class="border-bottom border-dark"></td>
                 </tr>
                 <tr valign="top">
                     <td></td>
                     <td></td>
                     <td colspan="4" class="border-bottom border-dark" style="height:25px;"></td>
                 </tr>
                 <tr valign="top">
                     <td></td>
                     <td></td>
                     <td colspan="4" class="border-bottom border-dark" style="height:25px;"></td>
                 </tr>
                 <tr valign="top">
                     <td></td>
                     <td></td>
                     <td colspan="4" class="border-bottom border-dark" style="height:25px;"></td>
                 </tr>
                 <tr valign="top">
                     <td></td>
                     <td></td>
                     <td colspan="4" class="border-bottom border-dark" style="height:25px;"></td>
                 </tr>
                 <tr valign="top">
                     <td colspan="3"></td>
                     <td colspan="3">
                         <div class="text-center">
                             <p class="mt-3 mb-3">Depok, {{session()->get('session_tanggal_lengkap')}}</p>
                             <p class="mt-5">{{session()->get('session_nm_dokter')}}</p>
                         </div>
                     </td>
                 </tr>
             </tbody>
         </table>
     </div>
 </div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#btn_logout').click(function () {
            $('#logout').modal('show');
        });
        $("#btn_cetak_registrasi").click(function () {
            var contents = $("#tiket_registrasi").html();
            var frame1 = $('<iframe />');
            frame1[0].name = "frame1";
            frame1.css({ "position": "absolute", "top": "-3000000px" });
            $("body").append(frame1);
            var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
            frameDoc.document.open();
            frameDoc.document.write('<html><body>');
            frameDoc.document.write('<link rel="stylesheet" href="{{ url('assets/vendor/css/core.css')}}">');
            frameDoc.document.write(contents);
            frameDoc.document.write('</body></html>');
            frameDoc.document.close();
            setTimeout(function () {
                window.frames["frame1"].focus();
                window.frames["frame1"].print();
                frame1.remove();
                window.location.replace("{{url('apm-logout')}}");
            }, 1000);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#kuitansi").hide();
        $("#btn_cetak_kuitansi").click(function () {
            var contents = $("#kuitansi").html();
            var frame1 = $('<iframe />');
            frame1[0].name = "Kuintansi";
            frame1.css({ "position": "absolute", "top": "-3000000px" });
            $("body").append(frame1);
            var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
            frameDoc.document.open();
            frameDoc.document.write('<html><head><title>DIV Contents</title>');
            frameDoc.document.write('</head><body>');
            frameDoc.document.write('<link rel="stylesheet" href="{{ url('assets/css/cetak.css')}}">');
            frameDoc.document.write('<link rel="stylesheet" href="{{ url('assets/vendor/css/core.css')}}">');
            frameDoc.document.write(contents);
            frameDoc.document.write('</body></html>');
            frameDoc.document.close();
            setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
            }, 500);
        });
    });
</script>

@endsection
