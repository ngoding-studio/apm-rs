@extends('auth/index')
@section('title', 'LOGIN')
@section('container')
<div class="container-xxl container-p-y text-center">
  <div class="misc-wrapper">
      <div class="card">
          <div class="card-body">
              <h2 class="mb-2 mx-2 text-danger">Dalam Perbaikan!</h2>
              <p class="mb-4 mx-2">
                Maaf atas ketidaknyamanan ini, kami sedang melakukan beberapa pemeliharaan saat ini
              </p>
              <a href="{{url('/')}}" class="py-2 button-primary">Sambungkan</a>
              <div class="mt-4">
                <img src="assets/img/banner/maintenance.webp" alt="girl-doing-yoga-light" width="500" class="img-fluid" data-app-dark-img="illustrations/girl-doing-yoga-dark.png" data-app-light-img="illustrations/girl-doing-yoga-light.png">
              </div>
          </div>
      </div>
  </div>
</div>
<audio id="myAudio" autoplay>
    <source src="assets/mp3/maintenance.mp3" type="audio/mpeg">
    <source src="assets/mp3/maintenance.mp3" type="audio/org">
</audio>
@endsection
