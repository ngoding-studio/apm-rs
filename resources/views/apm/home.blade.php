@extends('index')
@section('title', 'APM')
@section('container')
<style media="screen">
.bd-example-modal-lg .modal-dialog{
    display: table;
    position: relative;
    margin: 0 auto;
    top: calc(40% - 30px);
}

.bd-example-modal-lg .modal-dialog .modal-content{
    background-color: transparent;
    border: none;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #fff;
}

</style>

<div class="center bg-primary">
     <div class="container">
         <div class="bg-glasses p-3">
             <div class="card-body">
                 <h2 class="text-center fw-bold text-white display-2">REGISTRASI</h2>
                 <form id="formRegis">
                     <div class="mb-3 border-bottom">
                         <div class="row">
                             <div class="col-lg-8 col-md-8 col-sm-8">
                                 <p class="text-white mb-0">Nama</p>
                                 <h5 class="text-white fw-bold fs-3">{{session()->get('session_nama')}}</h5>
                             </div>
                             <div class="col-lg-4 col-md-4 col-sm-4">
                                 <p class="text-white mb-0">No Rekam Medis</p>
                                 <h5 class="text-white fw-bold fs-3">{{session()->get('session_norm')}}</h5>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-lg-3 col-md-6 col-sm-6">
                             <div class="form-group mb-3">
                                 <label class="form-label text-white mb-0">Poliklinik</label>
                                 <div id="dropdown-poli" class="dropdown">
                                     <span id="nm_poli" class="form-control form-control-md text-truncate rounded-3 shadow-none text-dark fs-5 fw-bold bg-glasses">Poliklinik</span>
                                     <input id="input_kd_poli" type="hidden">
                                     <ul id="dropdown-menu-poli" class="dropdown-menu-items bg-white">
                                         @foreach($poli as $i)
                                             <li id="{{$i->kd_poli}}">{{$i->nm_poli}}</li>
                                         @endforeach
                                     </ul>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-3 col-md-6 col-sm-6">
                             <div class="form-group mb-3">
                                 <label class="text-white form-label mb-0">Dokter</label>
                                 <div id="dropdown-dokter" class="dropdown">
                                     <span id="nm_dokter" class="form-control form-control-md text-truncate rounded-3 shadow-none text-dark fs-5 fw-bold bg-glasses">Dokter</span>
                                     <input id="input_kd_dokter" type="hidden">
                                     <ul id="dropdown-menu-dokter" class="dropdown-menu-items bg-white"></ul>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-3 col-md-6 col-sm-6">
                             <div class="form-group mb-3">
                                 <label class="text-white form-label mb-0">Cara Bayar</label>
                                 <div id="dropdown-bayar" class="dropdown">
                                     <span id="nm_bayar" class="form-control form-control-md text-truncate rounded-3 shadow-none text-dark fs-5 fw-bold bg-glasses">Cara Bayar</span>
                                     <input id="input_kd_bayar" type="hidden">
                                     <ul id="dropdown-menu-bayar" class="dropdown-menu-items bg-white">
                                         <li id="BPJ">BPJS</li>
                                         <li id="UMU">UMUM</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-3 col-md-6 col-sm-6">
                             <div class="form-group mb-3">
                                 <label class="text-white form-label mb-0">Verifikasi</label>
                                 <input type="text" id="tgl_lahir" class="form-control form-control-md text-truncate shadow-none text-dark fs-5 fw-bold bg-glasses ">
                             </div>
                         </div>
                     </div>
                     <div class="d-flex justify-content-end mt-3">
                         <button type="button" class="bg-glasses rounded-3 px-5 fs-4 fw-bold py-2 me-1 text-warning" id="btn_batal">BATAL</button>
                         <button type="submit" class="bg-glasses rounded-3 px-5 fs-4 fw-bold py-2 ms-1 text-white">DAFTAR</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
</div>
<div class="modal fade show" id="modaltanggallahir" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">REGISTRASI</h5>
            </div>
            <div class="modal-body">
                @include('includes.js-date')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">BATAL</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg show" id="loading" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="rounded bg-dark text-center">
                <img src="assets/img/banner/loading2.gif" width="300" class="rounded mb-2">
                <h4 class="fw-bold text-white" id="text_loading">Tunggu..</h4>
            </div>
        </div>
    </div>
</div>

 <div class="modal fade" id="logout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content">
       <div class="modal-body text-center">
         <h5 class="text-danger display-4 fw-bold">Keluar?</h5>
         <p class="display-6">Anda yakin ingin membatalkan registestrasi?</p>
         <div class="mt-5 d-flex">
             <button type="button" class="btn btn-outline-secondary rounded-3 w-50 fs-3 fw-bold py-2 me-1" data-bs-dismiss="modal">TIDAK</button>
             <button type="submit" class="btn btn-danger rounded-3 w-50 fs-3 fw-bold py-2 ms-1" id="btn_logout">BATALKAN</button>
         </div>
       </div>
     </div>
   </div>
 </div>


<script type="text/javascript">
    $(document).ready(function() {
        $("#tgl_lahir").click(function() {
            $('#modaltanggallahir').modal('show');
        });
        $("#btn_batal").click(function() {
        	$("#logout").modal('show');
        });
        $("#btn_logout").click(function() {
        	window.location.href = "apm-logout";
        });
        $('#dropdown-poli').click(function () {
            $(this).attr('tabindex', 1).focus();
            $(this).toggleClass('active');
            $(this).find('#dropdown-menu-poli').slideToggle(300);
        });
        $('#dropdown-poli').focusout(function () {
            $(this).removeClass('active');
            $(this).find('#dropdown-menu-poli').slideUp(300);
        });
        $('#dropdown-poli #dropdown-menu-poli li').click(function () {
            $(this).parents('#dropdown-poli').find('#nm_poli').text($(this).text());
            $(this).parents('#dropdown-poli').find('#input_kd_poli').attr('value', $(this).attr('id'));
        });

        $('#dropdown-dokter').click(function () {
            $(this).attr('tabindex', 1).focus();
            $(this).toggleClass('active');
            $(this).find('#dropdown-menu-dokter').slideToggle(300);
        });
        $('#dropdown-dokter').focusout(function () {
            $(this).removeClass('active');
            $(this).find('#dropdown-menu-dokter').slideUp(300);
        });

        $('#dropdown-dokter').on('click', '#dropdown-menu-dokter li', function() {
            $(this).parents('#dropdown-dokter').find('#nm_dokter').text($(this).text());
            $(this).parents('#dropdown-dokter').find('#input_kd_dokter').attr('value', $(this).attr('id'));
            var poli = $("#nm_poli").text();
            if(poli == "Gigi"){
                $("#BPJ").hide();
            } else {
                $("#BPJ").show();
            }
        });

        $('#dropdown-bayar').click(function () {
            $(this).attr('tabindex', 1).focus();
            $(this).toggleClass('active');
            $(this).find('#dropdown-menu-bayar').slideToggle(300);
        });
        $('#dropdown-bayar').focusout(function () {
            $(this).removeClass('active');
            $(this).find('#dropdown-menu-bayar').slideUp(300);
        });
        $('#dropdown-bayar #dropdown-menu-bayar li').click(function () {
            $(this).parents('#dropdown-bayar').find('#nm_bayar').text($(this).text());
            $(this).parents('#dropdown-bayar').find('#input_kd_bayar').attr('value', $(this).attr('id'));
        });

        $("#dropdown-menu-poli li").click(function() {
            var kd_poli = (this.id);
            $.ajax({
                type: "GET",
                url: "apm-list-dokter",
                dataType:"text",
                data: {
                    kd_poli: kd_poli,
                },
                success:function(response){
                    console.log(response);
                    var result = JSON.parse(response);
                    if (!$.trim(result)) {
                        var draw = '';
                        draw += '<p class="p-3 fw-bold fs-3">Dokter tidak ditemukan</p>';
                        $('#dropdown-menu-dokter').empty();
                        $('#dropdown-menu-dokter').append(draw);
                    } else {
                        var draw = '';
                        var i = 1;
                        $.each(result, function (key, value) {
                            draw += '<li id="'+value.kd_dokter+'">'+value.nm_dokter+'</li>';
                        });
                        $('#dropdown-menu-dokter').empty();
                        $('#dropdown-menu-dokter').append(draw);
                    }
                }
            });
        });

        $('#display_kd_poli').hide();
        $('#display_kd_dokter').hide();
        $('#display_kd_bayar').hide();

        $("#formRegis").submit(function (e) {
            var kd_poli     = $('#input_kd_poli').val();
            var nm_poli     = $('#nm_poli').text();
            var kd_dokter   = $('#input_kd_dokter').val();
            var nm_dokter   = $('#nm_dokter').text();
            var kd_bayar    = $('#input_kd_bayar').val();
            var nm_bayar    = $('#nm_bayar').text();
            var tgl_lahir    = $('#tgl_lahir').val();
            if (kd_poli == "") {
                var pesan = "Poliklinik tidak boleh kosong";
                notifGagal(pesan);
                hilang();
            } else if (kd_dokter == "") {
                var pesan = "Dokter tidak boleh kosong";
                notifGagal(pesan);
                hilang();
            } else if (kd_bayar == "") {
                var pesan = "Cara bayar tidak boleh kosong";
                notifGagal(pesan);
                hilang();
            } else if (tgl_lahir == "") {
                var pesan = "Verifikasi tidak boleh kosong";
                notifGagal(pesan);
                hilang();
            } else {
                var number      = Math.floor(Math.random() * 9000);
                $('#text_loading').text('Tunggu sebentar..');
                $('#loading').modal('show');
                setTimeout(function(){
                    registrasi();
                }, number);
            }

            e.preventDefault();
        });
        function registrasi() {
            var kd_poli     = $('#input_kd_poli').val();
            var nm_poli     = $('#nm_poli').text();
            var kd_dokter   = $('#input_kd_dokter').val();
            var nm_dokter   = $('#nm_dokter').text();
            var kd_bayar    = $('#input_kd_bayar').val();
            var nm_bayar    = $('#nm_bayar').text();
            var tgl_lahir   = $('#tgl_lahir').val();
            var number      = Math.floor(Math.random() * 9000);
            $('#text_loading').text('Sedang proses..');
            setTimeout(function() {
                $('#loading').modal('hide');
                $.ajax({
                    type: "GET",
                    url: "apm-offline-regis",
                    data: {
                        _token:"{{ csrf_token() }}",
                        kd_poli:kd_poli,
                        nm_poli:nm_poli,
                        kd_dokter:kd_dokter,
                        nm_dokter:nm_dokter,
                        kd_bayar:kd_bayar,
                        nm_bayar:nm_bayar,
                        tgl_lahir:tgl_lahir,
                    },
                    success:function(response){
                        console.log(response);
                        var result =JSON.parse(response);
                        console.log(result);
                        if (result.status == "berhasil") {
                            window.location.replace("{{url('apm-cetak')}}");
                        } else if (result.status == "update") {
                            window.location.replace("{{url('apm-update')}}");
                        } else {
                            var pesan = result.data;
                            notifGagal(pesan);
                        }
                        hilang();


                    }
                });
            }, number);
        }


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
@endsection
