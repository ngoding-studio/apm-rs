@extends('index')
@section('title', 'APM')
@section('container')
<div class="center bg-primary">
     <div class="container">
         <div class="container col-xl-6 col-lg-8 col-md-10 col-sm-12">
             <div class="bg-glasses">
                 <div class="p-5">
                     <form id="formVerifikasi">
                         <h2 class="text-center fw-bold text-white display-2">VERIFIKASI</h2>
                         <div class="form-group mb-3">
                             <div class="d-flex justify-content-between">
                                 <label class="form-label text-white">Kode Tiket</label>
                                 <span id="btn_refresh" type="button"><i class="tf-icons bx bx-refresh text-white"></i></span>
                             </div>
                             <div class="d-flex align-items-center bg-glasses fs-3 fw-bold text-white">
                                 <span class="text-center" style="width:120px;">RSBB</span>
                                 <input class="form-control form-control-lg shadow-none bg-glasses fs-3 fw-bold text-white" type="text" id="kodetiket" placeholder="Kode tiket" autofocus onkeypress="return onlyNumberKey(event)">
                             </div>
                         </div>
                         <div class="mb-3 mt-4 d-flex">
                             <button type="button" class="bg-glasses rounded-3 w-50 fs-3 fw-bold py-2 me-1 text-warning" id="btn_back">BATAL</button>
                             <button type="submit" class="bg-glasses rounded-3 w-50 fs-3 fw-bold py-2 ms-1 text-white">MASUK</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
</div>
<div class="modal fade bd-example-modal-lg show" id="modalkodetiket" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">VERIFIKASI</h5>
            </div>
            <div class="modal-body">
                @include('includes.js-kodetiket')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">BATAL</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#btn_refresh").click(function() {
            window.location.reload();
        });
        $("#kodetiket").click(function() {
            $('#modalkodetiket').modal('show');
        });
        $("#btn_back").click(function() {
            window.location.replace("{{url('/')}}");
        });
        $("#formVerifikasi").submit(function (e) {
             var kodetiket = $("#kodetiket").val();
             $.ajax({
                type: "GET",
                url: "apm-online-daftar",
                data: {
                    _token:"{{ csrf_token() }}",
                    kodetiket:kodetiket,
                },
                success:function(response){
                    console.log(response);
                    var result =JSON.parse(response);
                    console.log(result);
                    if (result.status == "berhasil") {
                        window.location.replace("{{url('apm-online-konfirmasi')}}");
                    } else {
                        var pesan = result.data;
                        notifGagal(pesan);
                    }
                    hilang();
                }
            });
            e.preventDefault();
        });
    });
    function focused() {
        $("#kodetiket").val("");
        $("#kodetiket").focus();
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
</script>
@endsection
