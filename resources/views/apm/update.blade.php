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
         <div class="bg-glasses">
             <div class="card-body container">
                 <h2 class="text-center fw-bold text-white display-2">REGISTRASI</h2>
                 <form id="formUpdate">
                     <div class="modal-body">
                         <h4 class="text-white fw-bold">Pembaruan data</h4>
                         <div class="row">
                             <div class="col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group mb-3">
                                     <label class="text-white form-label mb-0">Pekerjaan</label>
                                     <input type="text" id="pekerjaan" class="form-control form-control-md shadow-none bg-glasses fs-3 fw-bold text-white">
                                 </div>
                             </div>
                             <div class="col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group mb-3">
                                     <label class="text-white form-label mb-0">Nomor Telp</label>
                                     <input type="text" id="notelp" class="form-control form-control-md shadow-none bg-glasses fs-3 fw-bold text-white">
                                 </div>
                             </div>
                             <div class="col-lg-6 col-md-12 col-sm-12">
                                 <div class="form-group">
                                     <label class="text-white form-label mb-0">Alamat</label>
                                     <input type="text" id="alamat" class="form-control form-control-md shadow-none bg-glasses fs-3 fw-bold text-white">
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="bg-glasses rounded-3 px-5 fs-4 fw-bold py-2 me-1 text-warning" id="btn_batal">BATAL</button>
                         <button type="submit" class="bg-glasses rounded-3 px-5 fs-4 fw-bold py-2 ms-1 text-white">SELESAI</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
</div>
<div class="modal fade show" id="modalnohp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">REGISTRASI</h5>
            </div>
            <div class="modal-body">
                @include('includes.js-nohp')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade show" id="modalpekerjaan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">REGISTRASI</h5>
            </div>
            <div class="modal-body">
                @include('includes.js-pekerjaan')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">BATAL</button>
                <button type="button" class="btn btn-primary" id="btn_selesai_pekerjaan">SELESAI</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade show" id="modalalamat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">REGISTRASI</h5>
            </div>
            <div class="modal-body">
                @include('includes.js-alamat')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">BATAL</button>
                <button type="button" class="btn btn-primary" id="btn_selesai_alamat">SELESAI</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg show" id="loading" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="rounded bg-dark text-center">
                <img src="assets/img/banner/loading2.gif" width="300" class="rounded mb-2">
                <h4 class="fw-bold text-white">LOADING</h4>
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
        $("#notelp").click(function() {
            $('#modalnohp').modal('show');
        });
        $("#pekerjaan").click(function() {
            $('#modalpekerjaan').modal('show');
        });
        $("#alamat").click(function() {
            $('#modalalamat').modal('show');
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

        $("#formUpdate").submit(function (e) {
            var pekerjaan = $('#pekerjaan').val();
            var notelp    = $('#notelp').val();
            var alamat    = $('#alamat').val();
            var alamat    = $('#alamat').val();
            var number    = Math.floor(Math.random() * 9000);
            $('#loading').modal('show');
            setTimeout(function() {
                $('#loading').modal('hide');
                $.ajax({
                    type: "GET",
                    url: "apm-offline-update",
                    data: {
                        _token:"{{ csrf_token() }}",
                        pekerjaan:pekerjaan,
                        notelp:notelp,
                        alamat:alamat,

                        kd_poli:"{{session()->get('session_kd_poli')}}",
                        nm_poli:"{{session()->get('session_nm_poli')}}",
                        kd_dokter:"{{session()->get('session_kd_dokter')}}",
                        nm_dokter:"{{session()->get('session_nm_dokter')}}",
                        kd_bayar:"{{session()->get('session_kd_bayar')}}",
                        nm_bayar:"{{session()->get('session_nm_bayar')}}",

                    },
                    success:function(response){
                        console.log(response);
                        var result =JSON.parse(response);
                        console.log(result);
                        if (result.status == "berhasil") {
                            window.location.replace("{{url('apm-cetak')}}");
                        } else {
                            var pesan = result.data;
                            notifGagal(pesan);
                        }
                        hilang();
                    }
                });
            }, number);

            e.preventDefault();
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
@endsection
