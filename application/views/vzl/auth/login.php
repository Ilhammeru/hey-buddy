<!doctype html>

<html>

<head>
    <title>
        Hey Buddy
    </title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <meta name="robots" content="NOINDEX,NOFOLLOW">

    <!-- START STYLES -->

    <!-- Bootstrap v5.0.0 -->
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css?v5.0.0">

    <!-- Font -->
    <link rel="stylesheet" href="<?=base_url();?>assets/font/font/sf-font.css?1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <!-- END STYLES -->

    <!-- START PLUGINS -->

    <!-- jQuery v3.5.1 -->
    <script src="<?=base_url();?>assets/jquery/dist/jquery.min.js?v3.5.1"></script>

    <!-- Bootstrap v5.0.0 -->
    <script src="<?=base_url();?>assets/bootstrap/js/bootstrap.min.js?v5.0.0"></script>

    <script src="<?= base_url(); ?>/assets/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/slmodal-1.0.0.js"></script>

    <!-- END PLUGINS -->

    <!--
        Font family :
        ==================================
        - SF Pro Display Regular
        - SF Pro Display Medium
        - SF Pro Display Bold
        - SF Pro Display Semibold
        - SF Pro Display Heavy
        - SF Pro Display Light
        - SF Pro Display Ultra Light
        - SF Pro Display Thin
        -->

    <!--
        Font color:
        ==================================
        - White                 : #fff
        - Suva Gray             : #929292
        - Light Gray            : #d5d5d5
        - Deep Sky Blue         : #00a2ff
        - Silver                : #c2c2c2
        - Tomato                : #ff644e
        -->

    <!--
        Background color:
        ==================================
        - White                 : #fff
        - Dim Gray              : #5e5e5e
        - Solitude              : #f2f2f7
        - White Lilac           : #e0e0e5
        - Deep Sky Blue         : #00a2ff
        - Misty Rose            : #ffdbd8
        - Sandy Brown           : #f4a460
        -->

    <style>

        html {
            --black: #000;
            --white: #fff;
            --dim-gray: #5e5e5e;
            --suva-gray: #929292;
            --light-gray: #d5d5d5;
            --silver: #c2c2c2;
            --solitude: #f2f2f7;
            --white-lilac: #e0e0e5;
            --deep-sky-blue: #00a2ff;
            --misty-rose: #ffdbd8;
            --tomato: #ff644e;
            --sandybrown: #f4a460;
            --sfpd-regular: "SF Pro Display Regular";
            --sfpd-bold: "SF Pro Display Bold";
            --sfpd-semibold: "SF Pro Display Semibold";
            --sfpd-heavy: "SF Pro Display Heavy";
            --sfpd-medium: "SF Pro Display Medium";
            --sfpd-light: "SF Pro Display Light";
            --sfpd-ultralight: "SF Pro Display Ultra Light";
            --sfpd-thin: "SF Pro Display Thin";
            --fs-default: .750rem;
            --br-default: .750rem;
            font-family: var(--sfpd-regular) !important;
            caret-color: var(--deep-sky-blue);
        }

        html,
        body {
            color: var(--dim-gray);
            font-family: var(--sfpd-regular) !important;
            height: 100%;
        }

        body {
            background-color: var(--solitude);
            font-size: var(--fs-default);
            display: flex;
            align-items: center;
        }

        .form-signin {
            width: 100%;
            max-width: 350px;
            padding: 1.25rem;
            margin: auto;
        }

        .title {
            color: var(--suva-gray);
            font-family: var(--sfpd-bold);
            font-size: .875rem;
            margin: .750rem 0 .375rem 0;
            text-align: left;
        }

        .subtitle {
            color: var(--suva-gray);
            font-size: .500rem;
            line-height: 1.35;
            text-align: justify;
            margin-bottom: 0;
        }

        .form-control, .form-control:focus {
            font-size: var(--fs-default);
            border-radius: var(--br-default);
            border: none;
            padding: .75rem 1rem;
            box-shadow: none;
        }

        .form-control::placeholder {
            color: var(--light-gray);
        }

        .form-check-input {
            background-color: var(--solitude);
        }

        .form-check-input:checked {
            background-color: var(--deep-sky-blue);
            border-color: var(--deep-sky-blue);
        }

        .form-check-input:focus {
            box-shadow: none;
        }

        .form-transparent {
            background-color: transparent;
            border: none;
        }

        .form-transparent:focus {
            border: none;
            outline: none;
        }

        .btn {
            font-size: var(--fs-default);
            font-weight: bold;
            border-radius: var(--br-default);
        }

        .input-group {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -ms-flex-align: stretch;
            align-items: stretch;
            width: 100%;
        }

        .input-group-append {
            display: flex;
        }

        .input-group-text {
            background-color: var(--white);
            border-top-left-radius: 0 !important;
            border-top-right-radius: var(--br-default);
            border-bottom-left-radius: 0 !important;
            border-bottom-right-radius: var(--br-default);
            border: 0;
        }

        .input-group-text.secondary {
            background-color: var(--solitude);
            border-top-left-radius: 0 !important;
            border-top-right-radius: var(--br-default);
            border-bottom-left-radius: 0 !important;
            border-bottom-right-radius: var(--br-default);
            border: 0;
        }

        .table-info {
            color: var(--suva-gray);
            font-family: var(--sfpd-bold);
            font-size: .675rem;
        }

        .table-info td {
            padding: .500rem 1rem;
        }

        .modal.fade{
            top: 3vh;
            height: 97%;
            opacity: 1;
            border-top-right-radius: 1.250rem;
            border-top-left-radius: 1.250rem;
        }

        .modal.fade .modal-dialog {
            transform: translate(0);
        }

        .modal-header {
            padding: .250rem 1rem .500rem 1rem;
            border-bottom: 0;
        }

        .modal-body {
            padding: .500rem 1.500rem;
        }

        .modalshow {
	        animation: slide-in-bottom 0.1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }

        .modalhide {
	        animation: slide-out-bottom 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both;
        }

        .modalinright {
	        animation: slide-in-right 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }

        .modaloutright {
	        animation: slide-out-right 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both;
        }

        .modal-backdrop.show {
            opacity: 0.25;
        }

        .modal .title {
            color: var(--dim-gray);
            font-family: var(--sfpd-bold);
            font-size: .875rem;
            margin: .750rem 0 .375rem 0;
            text-align: left;
            line-height: 1;
        }

        .modal .title-right {
            color: var(--suva-gray);
            font-family: var(--sfpd-bold);
            font-size: .750rem;
            margin: .750rem 0 .375rem 0;
            text-align: right;
            line-height: 1.2;
        }

        .modal .subtitle {
            color: var(--dim-gray);
            font-size: .500rem;
            line-height: 1.35;
            text-align: justify;
            margin-bottom: 0;
        }

        .modal.modal-activation-send .title,
        .modal.modal-save-success .title,
        .modal.modal-something-wrong .title {
            color: var(--dim-gray);
            font-family: var(--sfpd-bold);
            font-size: 1rem;
            margin: .750rem 0 .375rem 0;
            text-align: center;
            line-height: 1;
        }

        .modal.modal-activation-send .subtitle,
        .modal.modal-save-success .subtitle,
        .modal.modal-something-wrong .subtitle {
            color: var(--dim-gray);
            font-size: .750rem;
            line-height: 1.35;
            text-align: center;
            margin-bottom: 0;
        }

        .modal.modal-activation-send .modal-dialog,
        .modal.modal-save-success .modal-dialog,
        .modal.modal-something-wrong .modal-dialog {
            margin: .5rem 2rem;
        }

        .modal.modal-activation-send .modal-content,
        .modal.modal-save-success .modal-content,
        .modal.modal-something-wrong .modal-content {
            border-radius: 1.25rem;
            border: 0;
            box-shadow: 0px 2px 16px 1px rgb(94 94 94);
        }

        .modal.modal-activation-send .modal-body,
        .modal.modal-save-success .modal-body,
        .modal.modal-something-wrong .modal-body {
            padding: .500rem 3rem;
        }

        .modal.modal-loading {
            background-color: var(--black);
            opacity: 0.2;
        }

        .spinner-border {
            height: 0.8rem !important;
            width: 0.8rem !important;
        }

        hr {
            color: var(--suva-gray);
            height: 1.250px !important;
        }

        [class^="bi-"].bold::before {
            font-weight: 800 !important;
        }

        .clr-primary {
            color: var(--deep-sky-blue);
        }

        .clr-secondary {
            color: var(--light-gray);
        }

        .clr-default {
            color: var(--white);
        }

        .clr-danger {
            color: var(--tomato);
        }

        .clr-dim-gray {
            color: var(--dim-gray);
        }

        .clr-suva-gray {
            color: var(--suva-gray);
        }

        .bg-primary {
            background-color: var(--deep-sky-blue) !important;
            color: var(--white) !important;
        }

        .bg-secondary {
            background-color: var(--solitude) !important;
            color: var(--silver) !important;
        }

        .bg-default {
            background-color: var(--white) !important;
            color: var(--dim-gray) !important;
        }

        .bg-danger {
            background-color: var(--misty-rose) !important;
            color: var(--tomato) !important;
        }

        .bg-danger::placeholder {
            color: var(--tomato) !important;
        }

        .btn-primary {
            background-color: var(--deep-sky-blue) !important;
            color: var(--white) !important;
            font-family: var(--sfpd-bold) !important;
            border-color: var(--deep-sky-blue) !important;
        }

        .btn-secondary {
            background-color: var(--white-lilac) !important;
            color: var(--white) !important;
            font-family: var(--sfpd-bold) !important;
            border-color: var(--white-lilac) !important;
        }

        .col-secondary-top {
            background-color: var(--solitude) !important;
            color: var(--dim-gray) !important;
            border-top-left-radius: .750rem;
            border-top-right-radius: .750rem;
        }

        .col-secondary {
            background-color: var(--solitude) !important;
            color: var(--dim-gray) !important;
        }

        .col-secondary-bot {
            background-color: var(--solitude) !important;
            color: var(--dim-gray) !important;
            border-bottom-left-radius: .750rem;
            border-bottom-right-radius: .750rem;
        }

        .footer-primary {
            color: var(--deep-sky-blue);
            font-size: .600rem;
            padding: 0 .750rem;
        }

        .footer-secondary {
            color: var(--suva-gray);
            font-size: .600rem;
        }

        .modal-slide {
            height: .300rem;
            background-color: var(--white-lilac);
            width: 100%;
            border-radius: .250rem;
            margin-top: .750rem;
        }

        .alert-danger {
            color: var(--tomato);
            background-color: transparent;
            font-size: .500rem;
            padding: 0 .250rem;
        }

        img {
            vertical-align: middle;
            border-style: none;
        }

        img.img-circle {
            border-radius: 50%;
            height: 7.5rem;
            width: 7.5rem;
            margin: .500rem 0;
        }

        .fsr-600 {
            font-size: .600rem;
        }

        .fsr-650 {
            font-size: .650rem;
        }

        .fsr-750 {
            font-size: .750rem;
        }

        .fsr-850 {
            font-size: .850rem;
        }

        .fsr-1000 {
            font-size: 1rem;
        }

        .fsr-1500 {
            font-size: 1.500rem;
        }

        .fsr-1750 {
            font-size: 1.750rem;
        }

        .fsr-7000 {
            font-size: 7rem;
        }

        .ff-sfpd-regular {
            font-family: var(--sfpd-regular);
        }

        .ff-sfpd-semibold {
            font-family: var(--sfpd-semibold);
        }

        .ff-sfpd-bold {
            font-family: var(--sfpd-bold);
        }

        .ff-sfpd-heavy {
            font-family: var(--sfpd-heavy);
        }

        .ff-sfpd-light {
            font-family: var(--sfpd-light);
        }

        .text-right {
            text-align: right !important;
        }

        .text-left {
            text-align: left !important;
        }

        .text-center {
            text-align: center !important;
        }

        .justify-center {
            justify-content: center !important;
        }

        .pl-500 {
            padding-left: 0.500rem;
        }

        .lh-115 {
            line-height: 1.15;
        }

        .br-white {
            border: 1px solid var(--white);
        }

        input.active {
            border-color: var(--deep-sky-blue);
            box-shadow: 0 0 0 0.25rem rgb(13 110 253 / 25%);
        }

        .row-copyright {
            width: 100%;
            position: absolute;
            bottom: 1rem;
        }

    </style>

    <style>

        @keyframes slide-out-bottom {
            0% {
                transform: translateY(0);
                opacity: 1;
            }
            60% {
                transform: translateY(600px);
                opacity: 1;
            }
            100% {
                transform: translateY(1000px);
                opacity: 0;
            }
        }

        @keyframes slide-in-bottom {
            0% {
                transform: translateY(1000px);
                opacity: 0;
            }
            60% {
                transform: translateY(400px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes slide-in-right {
            0% {
                transform: translateX(1000px);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slide-out-right {
            0% {
                transform: translateX(0);
                opacity: 1;
            }
            100% {
                transform: translateX(1000px);
                opacity: 0;
            }
        }

    </style>

</head>

<body class="text-center">


      <main class="form-signin">

          <div class="row mb-4">

            <div class="col-12">
                <img src="<?=base_url();?>assets/images/ansena.png" width="150" height="150">
            </div>

              <div class="col-12 p-3">
                  <p class="title">Lorem Ipsum</p>
                  <p class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
              </div>

          </div>

          <form id="form-signin" method="post" action="<?=site_url('sessions/signin');?>">
          <input type="hidden" name="btn-login" value="true">

          <div class="row mb-3">

              <div class="col-12">
                  <div class="input-group">
                      <input type="text" name="username" autocomplete="off" class="form-control <?=$this->session->flashdata('alert-error') == 0 ? 'bg-danger' : 'bg-default';?>" id="username" placeholder="Nama Pengguna" autofocus>
                      <div class="input-group-append">
                          <span id="alert-username" class="input-group-text <?=$this->session->flashdata('alert-error') == 0 ? 'bg-danger' : 'bg-default';?>">
                              <?=$this->session->flashdata('alert-error') == 0 ? '<span class="alert-danger">NAMA PENGGUNA TIDAK TERDAFTAR</span>' : '';?>
                          </span>
                      </div>
                  </div>
              </div>

          </div>
          <!--/.row -->

          <div class="row mb-2">

              <div class="col-12">
                  <div class="input-group">
                      <input type="password" autocomplete="off" name="password" class="form-control <?=$this->session->flashdata('alert-error') == 1 ? 'bg-danger' : 'bg-default';?>" id="password" placeholder="Kata Sandi">
                      <div class="input-group-append">
                          <span id="alert-password" class="input-group-text <?=$this->session->flashdata('alert-error') == 1 ? 'bg-danger' : 'bg-default';?>">
                              <?=$this->session->flashdata('alert-error') == 1 ? '<span class="alert-danger">KATA SANDI SALAH</span>' : '';?>
                              <i class="bi-eye clr-secondary" id="event-password" onclick="event_password()"></i>
                          </span>
                      </div>
                  </div>
              </div>
              <!--/.col -->

          </div>

          <div class="row mb-2">

              <div class="col-12 d-grid">
                  <button type="button" onclick="getLogin()" class="btn btn-primary btn-block loginButton">MASUK</button>
              </div>
              <!--/.col -->

          </div>

          </form>

      </main>

      <!-- copyright -->

      <div class="row-copyright">
          <div class="row">
              <div class="col-12">
                  <table style="width: 100%">
                      <tr>
                          <td style="width: 100%">
                              <img alt="" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8IS0tIENyZWF0b3I6IENvcmVsRFJBVyAtLT4NCjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iMjI3OXB4IiBoZWlnaHQ9IjE0MzhweCIgdmVyc2lvbj0iMS4xIiBzdHlsZT0ic2hhcGUtcmVuZGVyaW5nOmdlb21ldHJpY1ByZWNpc2lvbjsgdGV4dC1yZW5kZXJpbmc6Z2VvbWV0cmljUHJlY2lzaW9uOyBpbWFnZS1yZW5kZXJpbmc6b3B0aW1pemVRdWFsaXR5OyBmaWxsLXJ1bGU6ZXZlbm9kZDsgY2xpcC1ydWxlOmV2ZW5vZGQiDQp2aWV3Qm94PSIwIDAgNjMxLjY2IDM5OC42Ig0KIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIg0KIHhtbG5zOnhvZG09Imh0dHA6Ly93d3cuY29yZWwuY29tL2NvcmVsZHJhdy9vZG0vMjAwMyI+DQogPGRlZnM+DQogIDxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+DQogICA8IVtDREFUQVsNCiAgICAuZmlsMCB7ZmlsbDojNUY1RTVFfQ0KICAgXV0+DQogIDwvc3R5bGU+DQogPC9kZWZzPg0KIDxnIGlkPSJMYXllcl94MDAyMF8xIj4NCiAgPG1ldGFkYXRhIGlkPSJDb3JlbENvcnBJRF8wQ29yZWwtTGF5ZXIiLz4NCiAgPGcgaWQ9Il8xMDU1NTMzNDQyMDI0MzIiPg0KICAgPGc+DQogICAgPGc+DQogICAgIDxwYXRoIGNsYXNzPSJmaWwwIiBkPSJNNjMxLjY2IDI5My40OWwwIDQ2LjQ0IC0xNTAuNjMgMCAwIC0zMi4wMWMwLDAgNTEuODUsLTExLjMgNTEuODUsLTM4Ljc3IDAsLTI3LjQ3IC04Mi40MSwtMTUuMzcgLTY4LjUyLC02OC4wNyA5LjExLC0zNC41OSA1MS41NywtMjcuMTYgMzYuNTEsLTYxLjMxIC0xNS4wNiwtMzQuMTUgLTM4LjczLC0xMDEuODggODQuMywtMTAxLjg4IDAsMCAzMC4yMSwtMy44MSAzMC4yMSwzMC4yIDAsMjQuODQgLTEwLjg3LDQ3LjMxIC0zNi45NywzNi45NyAtMjYuMSwtMTAuMzUgLTYwLjE2LDkuNjkgLTM4LjMyLDMwLjIgMjUuNTUsMjMuOTkgNDEuNDIsMzcuNTYgLTkuMDIsNzUuMjggLTIzLjI1LDE3LjQgNDUuMDcsMjAuMTggNTIuNzUsMzkuNjggNy42OCwxOS40OSAtNDkuNzEsNDIuODIgLTIwLjI5LDQyLjgyIDI5LjQzLDAgNjguMTMsMC40NSA2OC4xMywwLjQ1eiIvPg0KICAgIDwvZz4NCiAgICA8Zz4NCiAgICAgPHBhdGggY2xhc3M9ImZpbDAiIGQ9Ik0yMDEuNDkgMTc4LjEzYzAsMCAtNDkuMjEsNTQuMzggLTY1LjY5LDE2LjY1IC04Ljk3LC0yMC41NCAtNC43OCwtNDAuMTkgLTIxLjE0LC0zOC43IC0yNS45OSwyLjM3IC0xMy4yOCwyNy40OCAtNDUsMzMuNzUgLTMxLjcxLDYuMjcgLTM4LDI1LjY4IDI1LjIsNDkuNDkgNjkuNSwyNi4yIDYwLjQxLC0yMi40NiAxMTIuMDMsLTYuMyA1MS42MywxNi4xNyA2NS4xLDE2NS41OCAtNzYuMDQsMTY1LjU4IC04NC4wMSwwIC05OC45OCwtNTMuNTQgLTk4Ljk4LC01My41NCAwLDAgMi40OCwtNDAuOTQgNDMuNjQsLTQwLjk0IDI2LjA5LDAgNy45MywzNy4zNiA0MS4zOSw0NS40NCAzMC4xMyw3LjI3IDEwLjI0LC0zMi41OCA1MC44NSwtMzIuNCAzMS43NCwwLjE1IDEyLjM2LC03NC4wMyAtMTguNDUsLTQ0LjU0IC00OS40LDQ3LjI5IC00OC45MSwtNi45NiAtODcuMjksLTEuMzUgLTQ3Ljg1LDcgLTc5LjcsLTU4LjEyIC01MS4yOSwtNzkuMTkgMzQuNzcsLTI1Ljc5IDUxLjY1LC0zMy42OSA2Mi4wOSwtNjYuMTQgMTAuNDQsLTMyLjQ1IDc2LjYxLC00MC41NCAxMDUuNzQsLTIuMjUgMjkuMTIsMzguMjkgMjIuOTQsNTQuNDQgMjIuOTQsNTQuNDR6Ii8+DQogICAgPC9nPg0KICAgIDxwYXRoIGNsYXNzPSJmaWwwIiBkPSJNMjg0LjUgMTI4LjI2YzAsMCAtODguNDcsNDMuODEgLTYwLjMxLDY5Ljc2IDAsMCAtNy45MywyMC4xOCA0Ljk1LDMwLjE2IDEyLjg4LDkuOTggMzEuMDksMTkuNiAzNi4wMSw0Ni4zNSA0LjkxLDI2Ljc1IDEwMSwzNi40OCAxMzUuMDEsLTIyLjVsMjAuMjUgMjAuMjUgNjMuOTEgMCAtNTIuNjUgLTUyLjY1YzAsMCAtNi41LC0xNC42OCAxMC44LC0yOC4zNiAxNy4zLC0xMy42NyAyMy44MSwtNTcuOTEgMTMuMDUsLTcxLjExIC0xMC43NiwtMTMuMTkgLTM4Ljc4LC00LjMxIC01MC40MSwwLjQ1IC00MC4wMywxNi40MiAzNy4zOSw1My41NiAtMi4yNSw2Ni4xNiAtMTMuMDMsNC4xNCAtMjUuOTgsLTE2LjcgLTMwLjYsLTMzLjc1IC00LjYyLC0xNy4wNiAtMjUuMiwtMTkuMzUgLTI1LjIsLTE5LjM1IDAsMCAzMS43LC0xNy40IDQ0LjEsLTM0LjY2IDEyLjQxLC0xNy4yNSAtMTEuNTYsLTIxLjAyIDEuOCwtNTQuMDEgMTMuMzcsLTMyLjk4IDAsLTQ1IDAsLTQ1bC0xMzUuNDYgMGMwLDAgLTM0LjIsNjQuNzQgLTEuMzYsODEuOTEgMzIuODUsMTcuMTcgMjguMzYsNDYuMzUgMjguMzYsNDYuMzV6bTIxLjYgMjQuMzFjMCwwIC02NC4wOSwxNS45NCAtMjkuMjUsMzUuNTUgMTEuMDUsNi4yMiAzNC4yLDguNDkgMjcuNDUsNDIuNzYgLTExLjkxLDYwLjQyIDI0LjMyLDQuMiA0OS45NiwtMS4zNSA0Mi4wOCwtOS4xMSAtMTEuMjcsLTE3LjAzIC03LjIsLTM5LjE2IDExLjI3LC02MS4zMiAtNDAuOTYsLTM3LjggLTQwLjk2LC0zNy44em0xNC40IC00NC41NmMwLDAgMTIuMjYsLTM0LjMyIC0xOCwtMzMuMyAtMzAuMjYsMS4wMiAtOS40MSwtMjcgOS45LC0yNyAxOS4zMSwwIDY4LjkxLDI0Ljg1IDguMSw2MC4zeiIvPg0KICAgPC9nPg0KICA8L2c+DQogPC9nPg0KPC9zdmc+DQo=" style="width: 2.5rem"/>
                          </td>
                      </tr>
                      <tr>
                          <td class="">Copyright © 2021 PT. Sosial Lab Indonesia.</td>
                      </tr>
                  </table>
              </div>
          </div>
      </div>

      <!-- end copyright -->



      <!-- modal notification -->

        <div class="modal fade modalNotification" id="modalNotification" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="left: 5%; width: 90%; border-radius: 1rem !important;">
          <div class="modal-dialog modal-dialog-centered" style="border-radius: 1rem !important;">
            <div class="modal-content" style="background: #fff; border: none; box-shadow: 0px 2px 16px 1px rgb(94, 94, 94); border-radius: 1rem !important;">
              <div class="modal-body">

                <div class="iconTitle">



                </div>

                <div class="title" style="text-align: center;">

                  <p class="titleNotif" style="font-family: var(--dim-gray)"></p>

                </div>

                <div class="descMessage">

                  <p>Login successfull</p>

                </div>

              </div>
            </div>
          </div>
        </div>

      <!-- modal notification -->

      <script>

          $("input#username").on({
              keydown: function(e) {
                  $(this).removeClass('bg-danger').addClass('bg-default');
                  $('#alert-username').removeClass('bg-danger').addClass('bg-default').html('');

                  if (e.which == 32) {
                      return false;
                  }

                  if (e.which > 57 && e.which < 65) {
                      return false;
                  }

                  if (e.which > 90) {
                      return false;
                  }
              },
              change: function() {
                  this.value = this.value.replace(/\s/g, "");
                  this.value = this.value.replace(/[^a-z0-9]/gi, "");
              }
          });

          $('input#password').on({
              keydown: function(e) {
                  $(this).removeClass('bg-danger').addClass('bg-default');
                  $('#alert-password').removeClass('bg-danger').addClass('bg-default').html('<i class="bi-eye clr-secondary" id="event-password" onclick="event_password()"></i>');

                  if(e.which == 32) {
                      return false;
                  }

                  if (e.which > 57 && e.which < 65) {
                      return false;
                  }

                  if (e.which > 90) {
                      return false;
                  }
              },
              change: function() {
                  this.value = this.value.replace(/\s/g, "");
                  this.value = this.value.replace(/[^a-z0-9]/gi, "");
              }
          });

          function event_password() {

              if ($('#event-password').hasClass('active')) {

                  $('#password').attr('type', 'password');
                  $('#event-password').attr('data-id', 0).removeClass('clr-primary active').addClass('clr-secondary');
              } else {

                  $('#password').attr('type', 'text');
                  $('#event-password').attr('data-id', 1).removeClass('clr-secondary').addClass('clr-primary active');
              }
          }

          function getLogin() {
            var username = $('#username').val();
            var pass = $('#password').val();

            $.ajax({
              type: 'post',
              data: {
                username: username,
                password: pass
              },
              url: '<?= base_url('jzl/Auth/getLogin'); ?>',
              dataType: 'json',
              beforeSend: function() {
                var spinner = '<div class="spinner-border text-light" role="status">' +
                              '<span class="visually-hidden">Loading...</span>' +
                              '</div>';
                $('.loginButton').html(spinner);
              },
              success: function(result) {

                $('.loginButton').html('MASUK');

                var imgsuccess = '<img src="<?= base_url(); ?>/assets/images/checkNotif.svg" width="30" height="30" alt="">';
                var imgfailed = '<img src="<?= base_url(); ?>/assets/images/exclamation.svg" width="30" height="30" alt="">';

                if (result.message == 'wrong username') {

                  $('.iconTitle').html(imgfailed);

                  $('.titleNotif').text('Failed');
                  $('.descMessage').html('<p>Username Password</p>');

                  var myModal = new bootstrap.Modal(document.getElementById('modalNotification'), {
                    keyboard: false
                  })

                  myModal.show();

                  setTimeout(function() {
                    myModal.hide();
                  }, 1500)

                } else if (result.message == 'wrong password') {

                  $('.iconTitle').html(imgfailed);

                  $('.titleNotif').text('Failed');
                  $('.descMessage').html('<p>Wrong Password</p>');

                  var myModal = new bootstrap.Modal(document.getElementById('modalNotification'), {
                    keyboard: false
                  })

                  myModal.show();

                  setTimeout(function() {
                    myModal.hide();
                  }, 1500)

                } else if (result.message == 'success') {

                  $('.iconTitle').html(imgsuccess);

                  $('.titleNotif').text('Success');
                  $('.descMessage').html('<p>Login Successfully</p>');

                  var myModal = new bootstrap.Modal(document.getElementById('modalNotification'), {
                    keyboard: false
                  })

                  myModal.show();

                  setTimeout(function() {

                    var url = '<?= base_url('jzl/home'); ?>';
                    location.href = url;

                  }, 1500);

                }

              }
            })
          }

      </script>



          <script>

              // document.getElementById('fp-modal-slide').addEventListener('touchstart', handleTouchStart, false);
              // document.getElementById('fp-modal-slide').addEventListener('touchmove', handleTouchMove, false);
              //
              //
              // document.getElementById('au-modal-slide').addEventListener('touchstart', handleTouchStart, false);
              // document.getElementById('au-modal-slide').addEventListener('touchmove', handleTouchMove, false);

              var xDown = null;
              var yDown = null;

              function getTouches(evt) {
                  return evt.touches ||             // browser API
                      evt.originalEvent.touches; // jQuery
              }

              function handleTouchStart(evt) {
                  const firstTouch = getTouches(evt)[0];
                  xDown = firstTouch.clientX;
                  yDown = firstTouch.clientY;
              };

              function handleTouchMove(evt) {
                  if ( ! xDown || ! yDown ) {
                      return;
                  }

                  var xUp = evt.touches[0].clientX;
                  var yUp = evt.touches[0].clientY;

                  var xDiff = xDown - xUp;
                  var yDiff = yDown - yUp;

                  if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) {/*most significant*/
                      if ( xDiff > 0 ) {
                          /* left swipe */
                      } else {
                          /* right swipe */
                      }
                  } else {
                      if ( yDiff > 0 ) {
                          /* up swipe */
                      } else {
                          /* down swipe */
                          $('.modal.fade').modal('hide');
                      }
                  }
                  /* reset values */
                  xDown = null;
                  yDown = null;
              };
          </script>

      </body>

      </html>
