<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="<?= base_url(); ?>/assets/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/mobile-css/main.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/select2/dist/css/select2.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/toastr/build/toastr.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/clockpicker/dist/bootstrap-clockpicker.min.css">
    <script src="<?= base_url(); ?>/assets/jquery/dist/jquery.min.js"></script>


    <title><?= $title; ?></title>
    <style>
    </style>
</head>

<body style="background-color: #e5e5e5;" class="z-depth-0">

    <div class="container">
        <nav>
            <div class="nav-wrapper navMobile">
                <ul class="right itemNavbar">
                    <li><a href="" class="userNavbar"> <span class="hello"></span> <?= $_SESSION['name']; ?></a></li>
                    <li><a href=""><i class="fas fa-power-off logoutNavbar"></i></a></li>
                </ul>
            </div>
        </nav>
    </div>