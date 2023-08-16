<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('includes.header')
    <body id="body">
        @yield('container')
        @include('includes.notif')
        @include('includes.footer')
    </body>
    <script>
        function onlyNumberKey(evt) {
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
    </script>
    <script>
      $(function() {
        $( "#datepicker" ).datepicker();
      });
  </script>
</html>
