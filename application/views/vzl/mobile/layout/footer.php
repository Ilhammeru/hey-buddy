<script>
    $(document).ready(function() {})

    var timer = setInterval(getTimerHello, 1000);

    function getTimerHello() {
        var time = new Date();
        var hour = time.getHours();
        var minute = time.getMinutes();

        if (hour > 00 && hour <= 11) {
            var hello = 'Good Morning, ';
        } else if (hour > 11 && hour <= 17) {
            var hello = 'Good Afternoon, ';
        } else if (hour > 17 && hour <= 24) {
            var hello = 'Good Night, ';
        }

        $('.hello').text(hello);
    }
</script>

<script src="<?= base_url(); ?>/assets/materialize/js/materialize.min.js"></script>
<script src="<?= base_url(); ?>/assets/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?= base_url(); ?>/assets/daterangepicker/moment.min.js"></script>
<script src="<?= base_url(); ?>/assets/daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url(); ?>/assets/select2/dist/js/select2.min.js"></script>
<script src="<?= base_url(); ?>/assets/toastr/build/toastr.min.js"></script>
<script src="<?= base_url(); ?>/assets/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url(); ?>/assets/clockpicker/dist/bootstrap-clockpicker.min.js"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>