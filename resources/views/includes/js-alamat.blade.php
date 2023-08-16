
<div id="container">
    <div class="form-group mb-3">
        <label class="form-label mb-0">Aalamat</label>
        <textarea id="write1" class="textarea form-control border rounded fw-bold fs-3"></textarea>
    </div>
    <div id="keyboard1" class="unselectable">
        @include('includes.keyboard')
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#btn_selesai_alamat").click(function() {
            var alamat = $("#write1").val();
            $('#alamat').val(alamat);
            $("#modalalamat").modal('hide');
        });
    });
    $(function(){
        var $write1 = $('#write1'),
            shift = false,
            capslock = false;
        $('#keyboard1 ul li').click(function(){
            var $this = $(this),character = $this.html();

            if ($this.hasClass('left-shift') || $this.hasClass('right-shift')) {
                $('.letter').toggleClass('uppercase');
                $('.symbol span').toggle();

                shift = (shift === true) ? false : true;
                capslock = false;
                return false;
            }

            if ($this.hasClass('capslock')) {
                $('.letter').toggleClass('uppercase');
                capslock = true;
                return false;
            }

            if ($this.hasClass('delete')) {
                var html = $write1.html();

                $write1.html(html.substr(0, html.length - 1));
                return false;
            }

            if ($this.hasClass('symbol')) character = $('span:visible', $this).html();
            if ($this.hasClass('space')) character = ' ';
            if ($this.hasClass('tab')) character = "\t";
            if ($this.hasClass('return')) character = "\n";

            if ($this.hasClass('uppercase')) character = character.toUpperCase();

            if (shift === true) {
                $('.symbol span').toggle();
                if (capslock === false) $('.letter').toggleClass('uppercase');

                shift = false;
            }

            $write1.html($write1.html() + character);
        });
    });
</script>
