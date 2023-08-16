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
         <div class="container col-xl-7 col-lg-8 col-md-12 col-sm-12">
             <div class="bg-glasses">
                 <div class="p-5">
                     <form id="formRegis">
                         <h2 class="text-center fw-bold text-white display-2">VERIFIKASI</h2>
                         <div class="mb-3 border-bottom">
                             <div class="row">
                                 <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                     <p class="text-white mb-0">Nama</p>
                                     <h5 class="text-white fw-bold fs-3 text-truncate">{{session()->get('session_nama')}}</h5>
                                 </div>
                                 <div class="col-lg-4 col-md-4 col-sm-4">
                                     <p class="text-white mb-0">No Rekam Medis</p>
                                     <h5 class="text-white fw-bold fs-3">{{session()->get('session_norm')}}</h5>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group mb-3">
                             <label class="text-white form-label mb-0">Verifikasi</label>
                             <input type="text" id="tgl_lahir" class="form-control form-control-md text-truncate shadow-none text-dark fs-5 fw-bold bg-glasses">
                         </div>
                         <div class="mb-3 mt-4 d-flex">
                             <button type="button" class="bg-glasses rounded-3 w-50 fs-4 fw-bold py-2 me-1 text-warning" id="btn_back">BATAL</button>
                             <button type="submit" class="bg-glasses rounded-3 w-50 fs-4 fw-bold py-2 ms-1 text-white">SELESAI</button>
                         </div>
                     </form>
                 </div>
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
        $("#tgl_lahir").click(function() {
            $('#modaltanggallahir').modal('show');
        });
        $("#btn_batal").click(function() {
        	$("#logout").modal('show');
        });
        $("#btn_logout").click(function() {
        	window.location.href = "apm-logout";
        });

        $("#formRegis").submit(function (e) {
            var tgl_lahir    = $('#tgl_lahir').val();
            var number      = Math.floor(Math.random() * 9000);
            $('#loading').modal('show');
            setTimeout(function() {
                $('#loading').modal('hide');

                $.ajax({
                    type: "GET",
                    url: "apm-bukti-verifikasi-cetak",
                    data: {
                        _token:"{{ csrf_token() }}",
                        tgl_lahir:tgl_lahir,
                    },
                    success:function(response){
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
