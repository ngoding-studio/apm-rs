
<style>
div.parent {
  position: relative;
  height: 20px;
}

div.fixed-bottom-right {
  position: fixed;
  bottom: 10px;
  right: 10px;
  z-index: 9999;
}

div.fixed-top-right {
  position: fixed;
  top: 10px;
  right: 10px;
  z-index: 9999;
}

</style>
<div class="parent">
    <div class="fixed-top-right">
        <div id="notifBerhasil" class="bs-toast toast fade bg-info" role="alert" aria-live="assertive" aria-atomic="true" style="z-ndex:9999;">
          <div class="toast-header">
            <i class="bx bx-chat me-2"></i>
            <div class="me-auto fw-semibold" id="judulInfo">Berhasil!</div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body"> <span id="pesanBerhasil"></span></div>
        </div>
    </div>
    <div class="fixed-top-right">
        <div id="notifGagal" class="bs-toast toast fade bg-danger" role="alert" aria-live="assertive" aria-atomic="true" style="z-ndex:9999;">
          <div class="toast-header">
            <i class="bx bx-chat me-2"></i>
            <div class="me-auto fw-semibold">Gagal!</div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body"> <span id="pesanGagal"></span></div>
        </div>
    </div>
</div>
