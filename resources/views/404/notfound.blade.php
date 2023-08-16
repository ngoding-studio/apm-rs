@extends('auth/index')
@section('title', 'LOGIN')
@section('container')
<div class="container col-lg-4 mt-5">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
        <div class="card container-xxl container-p-y text-center">
          <div class="misc-wrapper">
            <h2 class="mb-2 mx-2">Halaman tidak ditemukan</h2>
            <p class="mb-4 mx-2">URL yang diminta tidak ditemukan di server ini</p>
            <div class="p-3">
                <h4 class="text-danger">Koneksi Error!!!</h4>
            </div>
            <a href="{{url('/')}}" class="btn btn-primary">Hubungkan</a>
            <div class="mt-3">
              <img src="assets/img/banner/page-empty.webp" alt="page-misc-error-light" width="500" class="img-fluid" data-app-dark-img="illustrations/page-misc-error-dark.png" data-app-light-img="illustrations/page-misc-error-light.png">
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var pesan  = "{{$error}}";
        console.log(pesan);
    });
</script>
@endsection
