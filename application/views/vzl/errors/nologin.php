<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url(); ?>assets/bootstrap-4/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/main.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/select2/dist/css/select2.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/toastr/build/toastr.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/clockpicker/dist/bootstrap-clockpicker.min.css">
    <script src="<?= base_url(); ?>/assets/jquery/dist/jquery.min.js"></script>


    <title>Not login Yet</title>
    <style>
    </style>
</head>

<body>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row mb-4">
                <i class="fas fa-bomb fa-5x"></i>
            </div>
            <h4>You need to login</h4>
            <p>Your session has been gone, please re-login to get back access this page</p>
            <div class="row mt-2">
                <div class="col text-center">
                    <a href="<?= base_url('auth'); ?>" class="btn btn-primary" style="border-radius: 10px;">Login</a>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url(); ?>assets/bootstrap-4/js/bootstrap.bundle.min.js"></script>
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