<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="<?= base_url(); ?>/assets/materialize/css/materialize.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/fontawesome/css/all.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/select2/dist/css/select2.min.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/simple-calendar-master/dist/simple-calendar.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/nouislider/distribute/nouislider.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/font/helvetica-neue.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/font/font/sf-font.css">
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/job.css"> -->

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

  <script src="<?= base_url(); ?>assets/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/simple-calendar-master/dist/jquery.simple-calendar.min.js"></script>
  <script src="<?= base_url(); ?>assets/tippyjs/popperjs.js"></script>
  <script src="<?= base_url(); ?>assets/tippyjs/tippy.js"></script>
  <script src="<?= base_url(); ?>assets/js/slmodal-1.0.js"></script>


  <title><?= $title; ?></title>


  <style media="screen">
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
      --gold: #FFD700;
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

    .rtr {
      transform: rotate(-180deg) translate(0);
    }

    .collpaseBodyOverduesHistoryUser {
      border: none;
      padding: 0;
    }

    #modalLoading {
      top: 40% !important;
      background: transparent !important;
      box-shadow: none;
      overflow: hidden;
    }

    #modalLoading>.modal-content {
      text-align: center;
      box-shadow: none;
    }

    .spinner-blue-only {
      border-color: #66f287;
    }

    #modalNotification {
      top: 40% !important;
      border-radius: 1.2rem;
      box-shadow: 0px 2px 16px 1px rgb(94, 94, 94);
    }

    .contentNotif {
      padding: 1.2em !important;
    }

    .iconInfo {
      text-align: center;
    }

    .targetTitleNotif {
      margin: 0;
      padding: 0;
      font-family: var(--sfpd-heave);
      text-align: center;
      color: var(--dim-gray);
      line-height: 3em;
      text-transform: capitalize;
    }

    .targetDescNotif {
      margin: 0;
      padding: 0;
      font-family: var(--sfpd-regular);
      text-align: center;
      color: var(--dim-gray);
      line-height: 1em;
    }

    .footerNotif {
      display: flex;
      justify-content: space-around;
    }

    .confirmNotif {
      text-align: center;
      padding: 0.8em 5em;
      border-top: 1px solid #dcdada;
      border-left: 1px solid #dcdada;
      font-family: var(--sfpd-heavy);
      color: var(--deep-sky-blue);
      font-size: 1rem;
    }

    .cancelNotif {
      text-align: center;
      padding: 0.8em 4.5em;
      border-top: 1px solid #dcdada;
      border-right: 1px solid #dcdada;
      font-family: var(--sfpd-heavy);
      color: var(--tomato);
      text-transform: uppercase;
      font-size: 1rem;
    }

    .confirmFull {
      text-align: center;
      padding: 0.8em 5em;
      font-family: var(--sfpd-bold);
      color: var(--deep-sky-blue);
    }

    .cancelFull {
      text-align: center;
      padding: 0.8em 5em;
      font-family: var(--sfpd-bold);
      color: var(--tomato);
    }

    .singleAction {
      border-top: 1px solid #dcdada;
      width: 100%;
    }

    /* header view */

    .headerView {
      position: fixed;
      top: 0;
      z-index: 2;
      background: #f2f1f6;
      width: 100%;
    }

    /* end header view */

    /* row sorting */

    div.rowSorting {
      padding-top: 0.2em;
      padding-bottom: 0;
      margin-bottom: 0;
      padding-left: 1.8em;
      padding-right: 1.8em;
      position: absolute;
      top: -38.5em;
      transition: ease .5s;
      width: 100%;
    }

    /* end row sorting */

    /* table sorting */

    div.colSorting {
      padding-bottom: 0;
      background: #fff;
      border-radius: 1.2em;
      padding: 0.9em 0.8em !important;
    }

    div.mainSortingButton {
      background-color: #d7d7db;
      border-radius: 1em;
      width: 100%;
      margin-left: 1.3em;
      padding: 0.4em 0.2em;
      height: 2.5em;
      margin-top: 0.3em;
    }

    .onSort {
      background: #fff;
      padding: 1em 0.9em;
      border-radius: 1.2em;
      transition: ease .5s;
    }

    .allSort {
      font-size: 0.7em;
      color: #fff;
      padding: 1em 0.9em;
      text-transform: uppercase;
      transition: ease .5s;
    }

    .activeSort {
      font-size: 0.7em;
      color: #fff;
      padding: 1em 0.9em;
      text-transform: uppercase;
      transition: ease .5s;
    }

    .inactiveSort {
      font-size: 0.7em;
      color: #fff;
      padding: 1em 0.9em;
      text-transform: uppercase;
      transition: ease .5s;
    }

    .deactiveSort {
      font-size: 0.7em;
      color: #fff;
      padding: 1em 0.9em;
      text-transform: uppercase;
      transition: ease .5s;
    }

    input[data-trigg="minSubjob"] {
      width: 1em !important;
    }

    .div-table {
      display: table;
      width: 100%;
      background-color: #fff;
    }

    .div-table-row {
      display: table-row;
      width: auto;
      clear: both;
    }

    .div-table-col-subjob {
      float: left;
      display: table-column;
      width: 78px;
      background-color: #fff;
      font-size: 0.8em;
      height: 2.5em;
      text-align: center;
      padding: 0.1em 0;
      margin: 0.5em 0;
    }

    .div-table-col-deadline,
    .div-table-col-coadmin,
    .div-table-col-crew {
      float: left;
      display: table-column;
      width: 78px;
      background-color: #fff;
      font-size: 0.8em;
      height: 2.5em;
      text-align: center;
      padding: 0.6em 0;
      margin-top: 0.6em;
      margin: 0.5em 0;
    }

    .div-table-col-all-subjob {
      float: left;
      display: table-column;
      width: 40px;
      background-color: #d7d7db;
      margin-left: 0.4em;
      padding: 0.4em 0;
      border-top-left-radius: 0.9em;
      border-bottom-left-radius: 0.9em;
      text-align: center;
      height: 2.5em;
    }

    .div-table-col-active-subjob {
      float: left;
      display: table-column;
      width: 60px;
      background-color: #d7d7db;
      padding: 0.4em 0;
      border-top-right-radius: 0.9em;
      border-bottom-right-radius: 0.9em;
      text-align: center;
      height: 2.5em;
    }

    .div-table-col-min-subjob {
      float: left;
      display: table-column;
      width: 50px;
      background-color: #e9eaef;
      padding: 0;
      border-radius: 0.9em;
      border-radius: 1em;
      text-align: center;
      height: 2em;
      margin-left: 0.2em;
      margin-top: 0.3em;
    }

    .div-table-col-max-subjob {
      float: left;
      display: table-column;
      width: 50px;
      background-color: #e9eaef;
      padding: 0;
      border-radius: 0.9em;
      border-radius: 1em;
      text-align: center;
      height: 2em;
      margin-left: 0.2em;
      margin-top: 0.3em;
    }

    .div-table-col-min-deadline {
      float: left;
      display: table-column;
      width: 102.8px;
      background-color: #e9eaef;
      padding: 0;
      border-radius: 0.9em;
      border-radius: 1em;
      text-align: center;
      height: 2em;
      margin-left: 0.2em;
      margin-top: 0.6em;
    }

    .div-table-col-max-deadline {
      float: left;
      display: table-column;
      width: 102.8px;
      background-color: #e9eaef;
      padding: 0;
      border-radius: 0.9em;
      border-radius: 1em;
      text-align: center;
      height: 2em;
      margin-left: 0.2em;
      margin-top: 0.6em;
    }

    .div-table-col-to-subjob {
      float: left;
      display: table-column;
      width: 20px;
      background-color: #fff;
      padding: 0.9em 0;
      border-radius: 1em;
      text-align: center;
      height: 2.8em;
      margin-left: 0.2em;
      color: #d7d7db;
      font-size: 0.8em;
    }

    .div-table-col-to-deadline {
      float: left;
      display: table-column;
      width: 22px;
      background-color: #fff;
      padding: 0.9em 0;
      border-radius: 1em;
      text-align: center;
      height: 2.8em;
      margin-left: 0.2em;
      margin-top: 0.4em;
      color: #d7d7db;
      font-size: 0.8em;
    }

    .div-table-col-field-coadmin {
      float: left;
      display: table-column;
      width: 233px;
      background-color: #e9eaef;
      padding: 0;
      border-radius: 0.9em;
      border-radius: 1em;
      text-align: center;
      height: 2em;
      margin-left: 0.2em;
      margin-top: 0.6em;
    }

    .div-table-col-min-crew,
    .div-table-col-max-crew {
      float: left;
      display: table-column;
      width: 55px;
      background-color: #e9eaef;
      padding: 0;
      border-radius: 0.9em;
      border-radius: 1em;
      text-align: center;
      height: 2em;
      margin-left: 0.2em;
      margin-top: 0.6em;
    }

    .div-table-col-to-crew {
      float: left;
      display: table-column;
      width: 20px;
      background-color: #fff;
      padding: 0.9em 0;
      border-radius: 1em;
      text-align: center;
      height: 2.8em;
      margin-left: 0.2em;
      color: #d7d7db;
      font-size: 0.8em;
      margin-top: 0.5em;
    }

    .div-table-col-pt {
      float: left;
      display: table-column;
      width: 100px;
      background-color: #e9eaef;
      padding: 0;
      border-radius: 0.9em;
      border-radius: 1em;
      text-align: center;
      height: 2em;
      margin-left: 0.2em;
      margin-top: 0.6em;
    }

    .div-table-col-button {
      border: 2.3px solid #dfdede;
      border-radius: 1.4em;
      width: 6.7em;
      display: table-column;
      float: left;
      height: 2em;
      margin-top: 1em;
      margin-right: 0.2em;
      margin-left: 0.73em;
      text-align: center;
      transition: ease .1s;
    }

    .div-table-col-button-cancel {
      border: 2.3px solid #e3604f;
      border-radius: 1.4em;
      width: 6.7em;
      display: table-column;
      float: left;
      height: 2em;
      margin-top: 1em;
      margin-right: 0.2em;
      margin-left: 0.4em;
      text-align: center;
    }

    .pApply,
    .pReset {
      padding: 0;
      margin: 0;
      text-align: center;
      margin-top: 0.4em;
      font-size: 0.8em;
      /* color: #6ab7fa; */
      color: #dfdede;
      text-transform: uppercase;
      transition: ease .5s;
    }

    .pCancel {
      padding: 0;
      margin: 0;
      text-align: center;
      margin-top: 0.4em;
      font-size: 0.8em;
      color: #e3604f;
      text-transform: uppercase;
    }

    /* table sorting */

    div.mainSortTitle {
      width: 3.8em;
    }

    input[data-trigg="minSubjob"] {
      border: none !important;
      height: 2em !important;
      box-shadow: none !important;
      background-color: #d7d7db;
      width: 2em !important;
      text-align: center !important;
      line-height: 1em !important;
    }

    input[data-trigg="minSubjob"]::placeholder {
      color: #fff;
      font-size: 0.8em;
    }

    .allTitle {
      font-size: 0.7em;
      text-transform: uppercase;
      padding: 0.8em;
      color: #fff;
      transition: ease .2s;
    }

    .activeTitle {
      font-size: 0.7em;
      text-transform: uppercase;
      padding: 0.8em;
      color: #fff;
    }

    .onSubjob {
      background: #fff;
      padding: 1em;
      border-radius: 0.9em;
      transition: .2s;
    }

    div[class="modal datepicker-modal open"] {
      height: auto !important;
      z-index: 1005 !important;
      display: block !important;
      opacity: 1 !important;
      top: 31% !important;
      transform: none;
      border-radius: 1.2em !important;
      padding: 1em !important;
    }

    div[class="modal datepicker-modal"] {
      transform: none !important;
    }

    div.datepicker-date-display {
      display: none;
    }

    input[data-trigg="minDatepicker"] {
      border: none !important;
      box-shadow: none !important;
      width: 6em !important;
      text-align: center !important;
      line-height: 1em !important;
      font-size: 0.7em !important;
      margin: 0 !important;
    }

    input[data-trigg="inputCoadmin"] {
      border: none !important;
      box-shadow: none !important;
      width: 20em !important;
      text-align: left !important;
      line-height: 1em !important;
      font-size: 0.7em !important;
      margin: 0 !important;
    }

    input[data-trigg="inputPt"] {
      border: none !important;
      box-shadow: none !important;
      width: 6em !important;
      text-align: left !important;
      line-height: 1em !important;
      font-size: 0.7em !important;
      margin: 0 !important;
    }

    input[data-trigg="minDatepicker"]::placeholder {
      color: #d7d7db;
      font-size: 1em;
      text-transform: uppercase;
      text-align: left !important;
    }

    #fu_popover_7 {
      left: 93px !important;
      border-radius: 1em;
      width: 19.6em !important;
      height: 20em;
      padding: 0.5em;
      background: #f2f2f6;
    }

    #fu_popover_7::before,
    #fu_popover_7::after {
      left: 90%;
    }

    .divCoadminView {
      position: relative;
      width: 100%;
      height: 30px;
      background-color: #d6d6da;
      border-radius: 2em;
      margin-top: 1em;
    }

    input[data-trigg="searchCoadminView"] {
      border: none !important;
      position: absolute !important;
      top: 0;
      left: 0;
      width: 70% !important;
      height: 25px !important;
      line-height: 20px !important;
      display: block;
      font-size: 0.9em !important;
      border-radius: 20px;
      padding: 0 20px !important;
      margin-top: 0.3em !important;
    }

    input[class="searchCoadminView"]:focus,
    input[class="searchPt"]:focus,
    input[class="searchLeader"]:focus {
      border: none !important;
      box-shadow: none !important;
    }

    div.tippy-box[data-state="visible"] {
      background: #f2f2f6;
      border-radius: 1em;
      max-width: 272px !important;
      transition-duration: 300ms;
      top: 0.5em;
      left: -1.5em;
    }

    div.tippy-box {
      background: #f2f2f6;
    }

    .tippy-content {
      transition-duration: 300ms;
      box-shadow: 1px 2px 5px 1px #9a999a;
      border-radius: 1em;
    }

    div.tippy-arrow {
      position: absolute;
      transform: translate3d(292px, 0px, 0px);
      left: 28px !important;
      width: 30px;
      height: 30px;
      color: #f2f2f7;
    }

    .tippy-box[data-placement^=bottom]>.tippy-arrow:before {
      top: -9px;
      left: 0;
      border-width: 0 8px 8px;
      border-bottom-color: initial;
      transform-origin: center bottom;
    }

    #tippy-2>.tippy-box {
      width: 272px !important;
    }

    /* end table sorting */



    /* ----------------------------------------- max width 400 px ----------------------------------------- */

    @media only screen and (min-width: 320px) and (max-width: 500px) {

      body {
        background-color: #efeff4 !important;
        min-height: 100%;
        font-family: 'Helvetica Neue' !important;
        padding-bottom: 0.1em;
      }

      * {
        max-height: 100%;
      }


      .main {
        width: 100%;
        padding: 0 1em !important;
      }

      .mainTab {
        background-color: #d9d9dd;
        border-radius: 1.5em;
        height: 100%;
        padding: 4px;
        z-index: 1;
      }

      nav {
        background-color: #efeff4;
        border: none !important;
        box-shadow: none !important;
      }

      .userNavbar {
        color: red !important;
        font-weight: 500;
        padding: 0;
      }

      .logoutNavbar {
        color: red;
        font-size: 0.9rem !important;
      }

      .hello {
        font-size: 0.7rem;
        font-weight: 400;
        /* color: #e5e4e4 !important; */
      }

      .titleNavBar {
        font-weight: bold !important;
        margin: 0.2em 0;
        padding: 0.2em 2em;
        color: #5e5e5e;
        border-radius: 2em;
        font-size: 0.8em;
        font-family: "Quicksand", sans-serif !important;
      }

      .divHrd {
        border-left: 1px solid #cdcdcf;
      }

      .tabs .tab a {
        font-size: 0.9em !important;
      }

      .activeJobCard,
      .failedJobCard,
      .waitJobCard,
      .prioJobCard {
        border-radius: 1.5em;
        box-shadow: none !important;
      }

      /* active badge */
      .isActiveFillBadgePrio {
        background-color: #f3af3d;
        padding: 2px 3px;
        border-radius: 4px;
        font-size: 0.4em;
        color: #f3af3d;
      }

      .isActiveOutlineBadgePrio {
        border: 2px solid #f3af3d;
        padding: 1px 2px;
        border-radius: 4px;
        font-size: 0.4em;
        color: #fff;
      }

      .isActiveFillBadge {
        background-color: #2b73b8;
        padding: 2px 3px;
        border-radius: 4px;
        font-size: 0.4em;
        color: #2b73b8;
      }

      .isActiveOutlineBadge {
        border: 2px solid #2b73b8;
        padding: 1px 2px;
        border-radius: 4px;
        font-size: 0.4em;
        color: #fff;
      }

      /* active badge */


      /* waiting first badge */
      .isWaitOutlineBadge {
        border: 2px solid #2b73b8;
        padding: 1px 2px;
        border-radius: 4px;
        font-size: 0.4em;
        color: #fff;
      }

      .isWaitOutlineBadgePrio {
        border: 2px solid #f3af3d;
        padding: 1px 2px;
        border-radius: 4px;
        font-size: 0.4em;
        color: #fff;
      }

      .isWaitFillBadge {
        background-color: #65b76f;
        padding: 2px 3px;
        border-radius: 4px;
        font-size: 0.4em;
        color: #65b76f;
      }

      /* waiting first badge */

      .isFailedFillBadge {
        background-color: #dc3b25;
        padding: 2px 3px;
        border-radius: 4px;
        font-size: 0.4em;
        color: #dc3b25;
      }

      .isFailedOutlineBadge {
        border: 2px solid #dc3b25;
        padding: 1px 2px;
        border-radius: 4px;
        font-size: 0.4em;
        color: #fff;
      }

      .searchDoc {
        position: relative;
        width: 100%;
        height: 25px;
        background-color: #d6d6da;
        border-radius: 2em;
        margin-top: 1em;
        padding: 0 7px;
      }

      input[data-trigg="document"] {
        border: none !important;
        border-bottom: none;
        text-align: left;
        color: #5f5e5e;
        height: 1em !important;
        font-size: 0.8em !important;
      }

      .fa {
        box-sizing: border-box;
        padding: 7px;
        width: 42.5px;
        height: 42.5px;
        position: absolute;
        top: 0;
        right: 0;
        border-radius: 50%;
        color: #07051a;
        text-align: center;
        font-size: 1em;
        transition: all 1s;
      }

      #modalShowSubjob,
      #modalAddCoadmin,
      #modalViewJob,
      #modalAddJob {
        /* max-height: 97% !important;
        height: 97% !important;
        border-top-left-radius: 2.4em;
        border-top-right-radius: 2.4em;
        transition: ease 1s; */
        top: 0% !important;
        bottom: auto !important;
        transition: all 1s;
        will-change: transform;
        transform: translate(100%, 0) scale(1) !important;
        width: 100%;
        opacity: 1 !important;
        height: 100%;
        max-height: 100%;
      }

      #modalShowSubjob.open,
      #modalAddCoadmin.open,
      #modalViewJob.open,
      #modalAddJob.open {
        transition: all .5s;
      }

      #modalShowSubjob:not([style*="display: none"]):not([style*="opacity: 0;"]),
      #modalAddCoadmin:not([style*="display: none"]):not([style*="opacity: 0;"]),
      #modalViewJob:not([style*="display: none"]):not([style*="opacity: 0;"]),
      #modalAddJob:not([style*="display: none"]):not([style*="opacity: 0;"]) {
        transform: translate(0, 0%) !important;
      }


      /* div.rowSorting {
        padding-top: 0.2em;
        padding-bottom: 0;
        margin-bottom: 0;
        padding-left: 1.8em;
        padding-right: 1.8em;
        position: absolute;
        top: -18.5em;
        display: none;
        transition: ease .5s;
      } */



      /* table sorting */

      .searchViewJob {
        position: relative;
        width: 100%;
        height: 31px;
        background-color: #fff;
        border-radius: 2em;
        margin-top: 2em;
      }

      input[data-trigg="searchViewJob"] {
        border: none !important;
        position: absolute !important;
        top: 0;
        left: 2em;
        width: 70% !important;
        height: 24px !important;
        line-height: 20px !important;
        display: block;
        font-size: 0.9em !important;
        border-radius: 20px;
        padding: 0 10px !important;
        margin-top: 0.3em !important;
      }

      input[data-trigg="searchCrew"]:focus,
      input[data-trigg="searchViewJob"]:focus {
        box-shadow: none !important;
        outline: none;
      }

      #fa-searchView {
        box-sizing: border-box;
        padding: 0 7px;
        width: 42.5px;
        height: 42.5px;
        position: absolute;
        top: 0;
        left: 0;
        border-radius: 50%;
        color: #07051a;
        text-align: center;
        font-size: 1em;
        transition: all 1s;
      }

      div.targetBodyItemActive,
      div.targetBodyItemInactive {
        background-color: #fff;
        border-bottom-left-radius: 1.2em;
        border-bottom-right-radius: 1.2em;
        padding-top: 1em;
        padding-bottom: 0;
        padding-right: 0.8em;
        padding-left: 0.8em;
        margin: 0;
      }

      div.collapsible-header.headerItemActive,
      div.collapsible-header.headerItemInactive {
        border: none !important;
        display: flex;
        justify-content: space-between;
        padding: 1em 0.8em;
        border-radius: 1.2em;
        transition: ease .5s;
      }

      div.collapsible-body.collapseDetailActive,
      div.collapsible-body.collapseDetailInactive {
        padding: 0 !important;
        border: none !important;
      }

      div.modal-overlay {
        top: 0;
      }

      input[data-trigg="add"] {
        /* border: 1px solid black !important; */
        border: none !important;
        border-bottom: none;
        text-align: center;
        color: #5f5e5e;
        height: 1em !important;
        font-size: 0.8em !important;
      }

      input[data-trigg="jobTitle"] {
        border-bottom: none !important;
        background-color: white !important;
        border-radius: 1.6em !important;
        width: 100% !important;
        padding: 0.5em 1.2em !important;
        height: 4.5em !important;
        font-size: 0.8em !important;
        margin: 8px 0 !important;
        display: inline-block !important;
        box-sizing: border-box !important;
      }

      input[data-trigg="jobTitle"]:focus {
        box-shadow: none !important;
      }

      .collapseCrew {
        /* margin-top: 0.8em !important; */
        padding: 0 1.2em !important;
        border: none !important;
      }

      .collapseLeader {
        padding: 0 1em !important;
        color: #40a1f8;
        border: none !important;
      }

      .collapseSubjobIndex,
      .targetViewSubjob {
        /* margin-top: 0.8em !important; */
        padding: 0 1.2em !important;
        border: none !important;
      }

      .collapseApproval {
        padding: 0 0.8em !important;
        border: none !important;
      }

      /* modal add crew */
      .searchDiv {
        position: relative;
        width: 100%;
        height: 50px;
        background-color: #d6d6da;
        border-radius: 2em;
        margin-top: 1em;
      }

      input[data-trigg="searchCrew"] {
        border: none !important;
        position: absolute !important;
        top: 0;
        left: 0;
        width: 70% !important;
        height: 41px !important;
        line-height: 20px !important;
        display: block;
        font-size: 0.9em !important;
        border-radius: 20px;
        padding: 0 20px !important;
        margin-top: 0.3em !important;
      }

      #modalAddCrew {
        /* top: 3% !important; */
        max-height: 97%;
        border-top-left-radius: 2.4em;
        border-top-right-radius: 2.4em;
        height: 97%;
        /* width: 100%; */
      }

      /* modal add crew */

      div.inputSubjobFirst {
        width: 100%;
      }

      .subjobField {
        color: #48a5f8;
      }

      input.manualSubjobField {
        border: none !important;
        color: #929293 !important;
        font-size: 1em !important;
        margin: 0 !important;
      }

      input.manualSubjobField:focus {
        box-shadow: none !important;
      }

      div#titleRow {
        margin-bottom: 0 !important;
      }

      div#coadminRow {
        margin-bottom: 7px;
      }

      div#crewLeaderRow {
        margin-bottom: 7px;
      }

      #modalAddSubjob,
      #modalAddRemind,
      #modalAddAssessor,
      #modalChangePassword {
        /* top: 3% !important; */
        max-height: 97% !important;
        height: 97% !important;
        border-top-left-radius: 2.4em;
        border-top-right-radius: 2.4em;
        transition: ease 0.5s;
        max-width: 100%;
        overflow-x: hidden;
        background: #f2f1f6;
        /* width: 100%; */
      }

      #modalChangePassword {
        /* top: 3% !important; */
        max-height: 97% !important;
        height: 97% !important;
        border-top-left-radius: 2.4em;
        border-top-right-radius: 2.4em;
        transition: ease 0.5s;
        max-width: 100%;
        overflow-x: hidden;
        background: #fff;
        /* width: 100%; */
      }

      .textareaContainer {
        max-width: 100%;
        /* border: 1px solid green; */
        position: relative;
        overflow: hidden;
      }

      .textareaContainer::before,
      .textareaContainer textarea {
        font-family: sans-serif !important;
        font-size: 0.9em !important;
      }

      .textareaField {
        width: 100%;
        box-sizing: border-box;
        background: transparent;
        padding-top: 1.5em;
        padding-bottom: 1.8em;
        padding-right: 1.4em;
        padding-left: 1.4em;
        border: 0;
        outline: none;
        display: block;
        line-height: 2.6;
        height: 12rem !important;
        color: black;

      }

      .textareaContainer::before {
        position: absolute;
        content: "_______________________________________\A_______________________________________\A_______________________________________";
        z-index: -1;
        padding-top: 0.8em;
        padding-bottom: 1.8em;
        padding-right: 1.4em;
        padding-left: 1.4em;
        left: 0;
        top: 0;
        width: 100%;
        color: #e0e0e0 !important;
        line-height: 2.8;
        background-color: white;
        border-radius: 1.4em;
        margin-top: 8px;
      }

      .tdTitleIndex {
        border-bottom: 2px solid #eaeaea !important;
        padding: 12px 5px;
        width: 15em;
      }

      .footerClass {
        position: fixed;
        bottom: 0;
        background-color: #f2f1f6;
        padding-left: 0;
        margin-left: 0;
        width: 100%;
        max-width: 100%;
        padding-top: 0;
        transition: ease 0.7s;
        height: 3.5em;
        display: none;
      }

      input[data-trigg="inputSubjobRemind"] {
        border: none !important;
        margin-right: 0.8em !important;
        margin-left: 0.8em !important;
        width: 11.1em !important;
        /* color: #979797 !important; */
      }

      .calendar {
        background-color: transparent !important;
        font-size: 0.5em !important;
        border-radius: 1.4em;
        padding: 0.5em 1.3em !important;
      }

      .calendar table {
        margin-top: 1em !important;
        margin-bottom: 1em !important;
      }

      .calendar thead {
        color: #cdcece !important;
        font-size: 0.8em !important;
        text-align: center !important;
        text-transform: uppercase !important;
      }

      .calendar table tbody tr {
        border: none !important;
        padding: 0 0.4em !important;
      }

      .calendar td {
        text-align: center !important;
        padding: 0.5em 0.1em !important;
      }

      .calendar .day {
        /* padding: 0 0.7em !important; */
        line-height: 2.2em !important;
      }

      .calendar .day.today {
        background-color: #40a1f8 !important;
      }

      .calendar .event-container {
        display: none !important;
      }

      .calendar .filler {
        transform: none !important;
        background: none !important;
      }

      .calendar header .month,
      .calendar header .btn-prev,
      .calendar header .btn-next {
        display: none !important;
      }

      .selectMonth,
      .selectYear {
        text-transform: uppercase;
        background-color: #f2f3f8;
        font-size: 0.8em;
        text-transform: uppercase;
        text-align: center;
        padding: 0.3em;
        border-radius: 1.4em;
        color: #535352;
        font-family: "Quicksand", sans-serif;
        font-weight: 700;
        margin-bottom: 0.4em;
      }

      .selectMonthRevise,
      .selectYearRevise {
        text-transform: uppercase;
        background-color: #fff;
        font-size: 0.8em;
        text-transform: uppercase;
        text-align: center;
        padding: 0.3em;
        border-radius: 1.4em;
        color: #535352;
        font-family: "Quicksand", sans-serif;
        font-weight: 700;
        margin-bottom: 0.4em;
      }

      .selectDay {
        text-transform: uppercase;
        margin-top: 2.7em;
        font-size: 0.6em;
        color: #9fa0a0;
        text-align: center;
        font-weight: 700;
      }

      .selectDay p {
        /* margin: 0.8em !important; */
        padding: 0.5em 0 !important;
      }

      .activeDay {
        background-color: #40a1f8 !important;
        color: white;
        border-radius: 1.4em;
      }

      .collapseDeadlinedate {
        padding: 0 1.2em !important;
        border: none !important;
      }

      input.inputHour {
        width: 2.9em !important;
        text-align: right !important;
        height: 2.2em !important;
        padding: 0.1em 0.7em !important;
        border-top-left-radius: 1em !important;
        border-bottom-left-radius: 1em !important;
        background-color: #f1f2f7 !important;
        box-shadow: none !important;
        border-bottom: none !important;
        font-size: 0.8em !important;
      }

      input.inputHourRevise,
      input.inputHourRequest,
      input.hourChangeOverdue {
        width: 2.9em !important;
        text-align: right !important;
        height: 2.2em !important;
        padding: 0.1em 0.7em !important;
        border-top-left-radius: 1em !important;
        border-bottom-left-radius: 1em !important;
        background-color: #fff !important;
        box-shadow: none !important;
        border-bottom: none !important;
        font-size: 0.8em !important;
      }

      input.inputMinutesRevise,
      input.inputMinutesRequest,
      input.minutesChangeOverdue {
        width: 2.9em !important;
        text-align: left !important;
        height: 2.2em !important;
        padding: 0.1em 0.7em !important;
        border-top-right-radius: 1.4em !important;
        border-bottom-right-radius: 1.4em !important;
        background-color: #fff !important;
        box-shadow: none !important;
        border-bottom: none !important;
        font-size: 0.8em !important;
      }

      input.inputMinutes {
        width: 2.9em !important;
        text-align: left !important;
        height: 2.2em !important;
        padding: 0.1em 0.7em !important;
        border-top-right-radius: 1.4em !important;
        border-bottom-right-radius: 1.4em !important;
        background-color: #f1f2f7 !important;
        box-shadow: none !important;
        border-bottom: none !important;
        font-size: 0.8em !important;
      }

      p.range-field {
        border-radius: 1em;
        background-color: #f1f2f7;
        padding-bottom: 0;
        padding-top: 0.2em;
        padding-left: 0.1em;
        padding-right: 0.1em;
      }

      input[type="range"] {
        margin: 0;
        padding: 0;
      }

      div#slider.noUi-target.noUi-ltr.noUi-horizontal.noUi-txt-dir-ltr {
        height: 3px !important;
      }

      div#sliderRevise.noUi-target.noUi-ltr.noUi-horizontal.noUi-txt-dir-ltr,
      div#sliderChangeOverdue.noUi-target.noUi-ltr.noUi-horizontal.noUi-txt-dir-ltr {
        height: 1.5px !important;
      }

      div#sliderRequest.noUi-target.noUi-ltr.noUi-horizontal.noUi-txt-dir-ltr {
        height: 1.5px !important;
      }

      .noUi-target {
        border: none !important;
        /* background-color: #d3d3d3; */
      }

      .noUi-handle {
        border: none !important;
      }

      .noUi-handle:after {
        top: 0 !important;
        width: 5px !important;
        border-radius: 50% !important;
        background-color: #3fa1f8 !important;
        left: 15px !important;
      }

      div.noUi-handle.noUi-handle-lower::before {
        width: 0;
      }

      div.noUi-handle.noUi-handle-lower::after {
        height: 5px !important;
        top: 2px !important;
        margin-top: 1.5px;
        margin-left: -3px;
      }

      div.noUi-connect {
        background-color: transparent;
      }

      div.sliderParent {
        background-color: #f1f2f7;
        border-radius: 1em;
        margin-bottom: 10px;
        height: 1.8em;
        padding: 0 0.8em;
        margin-top: 4px;
      }

      div.sliderParentRevise,
      div.sliderParentRequest,
      div.sliderParentChangeOverdue {
        background-color: #fff;
        border-radius: 1em;
        margin-bottom: 10px;
        height: 1.8em;
        padding: 0 0.8em;
        margin-top: 4px;
      }

      .activeRemind {
        background-color: #40a1f8 !important;
        border-radius: 2em !important;
        padding: 0.3em 0.5em !important;
        color: white !important;
      }

      .minutes,
      .hours,
      .days,
      .follow {
        border-radius: 2em;
        padding: 0.3em 0.5em;
        color: #b6b6b6;
        font-weight: 5000;
        font-size: 0.8em;
      }

      label[data-trigg="fileUpload"] {
        border-bottom: none !important;
        background-color: white !important;
        border-radius: 1.6em !important;
        width: 100% !important;
        padding: 0.5em 2em !important;
        font-size: 0.8em !important;
        margin-top: 8px;
        margin-bottom: 8px;
        margin-right: 12em;
        box-sizing: border-box !important;
        color: #66b4fa !important;
        font-weight: 500;
      }

      label[data-trigg="fileUploadRevise"],
      label[data-trigg="fileUploadReportDone"] {
        border-bottom: none !important;
        border-radius: 1.6em !important;
        width: 100% !important;
        font-size: 0.8em !important;
        margin-top: 8px;
        margin-bottom: 8px;
        box-sizing: border-box !important;
        color: #66b4fa !important;
        font-weight: 500;
      }

      form#uploadFileAdmin {
        padding: 0.8em 0;
      }

      form#uploadFileAdmin:hover {
        width: 100%;
      }

      #fileUpload,
      #fileUploadRevise,
      #fileUploadReportDone {
        opacity: 0;
        position: absolute;
        z-index: -1;
      }

      img.stylingImage {
        border-radius: 1em;
        margin: 3px 5px;
        width: 35px;
        height: 35px;
        z-index: 1;
      }

      span.deleteImgBtn,
      span.deleteImageReport,
      span.deleteImgRevise,
      span.deleteImgRequest {
        z-index: 2;
        position: absolute;
        /* margin-left: 4px; */
        transition: ease 1s;
      }

      #previewImg {
        padding: 0 0.8em;
      }

      .textareaField1:focus,
      .textareaContainer1:focus,
      .notesField:focus {
        border: none !important;
        box-shadow: none !important;
        outline: none;
      }

      .textareaContainer1 {
        padding: 0.7em;
      }

      .textareaField1,
      .notesField {
        height: 8em !important;
        padding: 0.2em 1em;
        border: none !important;
        font-size: 0.9em;
        font-family: "Quicksand", sans-serif;
        font-weight: 500;
      }

      div.collapsible-body.collapseDetailSubjob {
        padding: 0 1.2em !important;
        border: none !important;
      }

      ul.collapseImageGallery,
      ul.collapseDeadlineDateRevise,
      ul.collapseDeadlineDateRequestt,
      ul.collapseDeadlineChangeOverdue,
      ul.collapseImg {
        box-shadow: none;
        border: none !important;
        margin: 0;
      }

      ul.collapseDetailCrewSubjob,
      ul.collapseDetailRemindSubjob,
      ul.collapseDeadlineHourRevise,
      ul.collapseDeadlineHourRequest,
      ul.collapseImageRevise,
      ul.collapseReportHistoryUser,
      ul.collapseTimeChangeOverdue,
      ul.collapseStoppable,
      ul.collapseRemindd {
        box-shadow: none;
        border: none !important;
        margin: 0;
      }

      div.collapseHeaderImageGallery,
      div.collapseHeaderRemindd,
      div.collapseHeaderImageGallery,
      div.collapseHeaderReportDone {
        background-color: transparent;
        padding: 0;
        border: none;
        display: flex;
        justify-content: space-between;
      }

      div.collapseBodyImageGallery,
      div.collapseBodyCrew,
      div.collapseBodyRemindd,
      div.collapseBodyImageRevise,
      div.collapseBodyReportHistoryUser {
        border: none;
        padding: 0;
        margin-top: 5px;
      }

      div#modalShowImagee {
        width: 90%;
        border-radius: 1em;
      }

      img.detailImage,
      img.detailImagee {
        width: 100%;
        height: auto;
      }

      div.targetShowImage {
        text-align: center;
      }

      div.collapseHeaderCrew {
        background-color: transparent;
        padding: 0;
        border: none;
        display: flex;
        justify-content: space-between;
      }

      span.dotSpan {
        width: 5px;
        height: 5px;
        background-color: red;
        border-radius: 50%;
        margin-right: 10px;
        transition: ease 1s;
      }

      div.buttonCorrect {
        border-radius: 1.5em;
        background-color: #3fa0f8;
        padding: 1.4em;
        cursor: pointer;
        margin-bottom: 1.5em;
      }

      div.buttonRevise {
        border-radius: 1.5em;
        background-color: #db3b25;
        padding: 1.4em;
        cursor: pointer;
        width: 100%;
        padding-bottom: none;
        border: none;
        box-shadow: none;
      }

      div.doneAction,
      div.revisedAction {
        background-color: #d6d6dc;
        border-radius: 1.5em;
        padding: 1.4em;
        cursor: pointer;
        margin-top: 0.7em;
      }

      div.requestRevision,
      div.requestOverdue {
        background-color: #db3b26;
        border-radius: 0.8em;
        padding: 0.3em 0;
        cursor: pointer;
      }

      div.reportDoneButton {
        background-color: #3fa2f8;
        border-radius: 0.8em;
        padding: 0.3em 0;
        cursor: pointer;
      }

      div.collapseImageSubjob {
        border: none;
        padding: 0 1em;
      }

      div.borderBottom {
        height: 1px;
        background-color: #e0dfe1;
        margin-left: 3.8em;
        margin-right: 0.8em;
      }

      div.borderBottomLong {
        border-top: 1px solid #e0dfe1;
        margin: 0 1.2em;
      }

      div.borderBottomFull {
        border-top: 1px solid #e0dfe1;
      }

      div.collapsible-body.collapseCrewSubjob {
        padding: 0 1.2em !important;
        border: none !important;
      }

      div.collapsible-body.collapseDetailReq,
      div.collapsible-body.collapseDetailReportDone {
        padding: 1em 1.2em !important;
        border: none !important;
      }

      .notess,
      .notesRequest,
      .notesReportDone,
      .notesChangeOverdue {
        background-attachment: local;
        /* background-image:
              linear-gradient(to right, #f2f2f7 10px, transparent 10px),
              linear-gradient(to left, #f2f2f7 10px, transparent 10px),
              repeating-linear-gradient(#f2f2f7, #f2f2f7 30px, #ccc 30px, #ccc 31px, #f2f2f7 31px); */
        line-height: 1.5em;
        padding: 1em 2em;
        border-radius: 1.3em;
        background-color: #f2f2f7;
      }

      p.pReviseTime,
      p.pReviseDate {
        font-size: 0.8em;
        color: #5f5e5e;
        font-family: var(--sfpd-regular);
      }

      .textareaImageRevise {
        width: 100%;
        height: 6rem;
        max-height: 6rem;
        background-color: transparent;
        font-size: 0.8em;
        line-height: 1.2;
        border-radius: none;
        color: #5f5f5f;
        border: none;
      }

      .textareaImageRevise:focus {
        border: none !important;
        box-shadow: none !important;
        outline: none;
      }

      div#calendarRevise,
      div#calendarRequest,
      div#calendarChangeOverdue {
        background-color: #fff;
        border-radius: 1.4em;
      }

      inputHourRevise,
      input.inputHourRequest,
      input.hourChangeOverdue {
        width: 2.9em !important;
        text-align: right !important;
        height: 2.2em !important;
        padding: 0.1em 0.7em !important;
        border-top-left-radius: 1em !important;
        border-bottom-left-radius: 1em !important;
        background-color: #fff !important;
        box-shadow: none !important;
        border-bottom: none !important;
        font-size: 0.8em !important;
      }

      input.inputMinutesRevise,
      input.inputMinutesRequest,
      input.minutesChangeOverdue {
        width: 2.9em !important;
        text-align: left !important;
        height: 2.2em !important;
        padding: 0.1em 0.7em !important;
        border-top-right-radius: 1.4em !important;
        border-bottom-right-radius: 1.4em !important;
        background-color: #fff !important;
        box-shadow: none !important;
        border-bottom: none !important;
        font-size: 0.8em !important;
      }

      div.sliderParentRevise,
      div.sliderParentRequest,
      div.sliderParentChangeOverdue {
        background-color: #fff;
        border-radius: 1em;
        margin-bottom: 10px;
        height: 1.8em;
        padding: 0 0.8em;
        margin-top: 4px;
      }

      /* table index */

      .tdNo {
        width: 1.5em;
        padding: 12px 5px;
        color: #5e5e5e;
        font-weight: 700;
        font-size: 0.8em;
      }

      .tdBadge {
        border-bottom: 2px solid #eaeaea !important;
        padding: 12px 5px;
        width: 2em;
      }

      .tdJob {
        border-bottom: 2px solid #eaeaea !important;
        padding: 12px 5px;
        width: 13em;
      }

      .tdSubjob {
        border-bottom: 2px solid #eaeaea !important;
        padding: 12px 5px;
        width: 7em;
        text-align: right;
        color: #919191;
        font-size: 0.7em;
        font-weight: 300;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        max-width: 7em;
      }

      .trArrow {
        color: #c2c2c2;
        padding: 12px 5px;
        font-size: 0.9em;
        border-bottom: 2px solid #eaeaea !important;
        width: 1.3em;
      }

      /* table index */

      .collapseDeadlinedate {
        padding: 0 1.2em !important;
        border: none !important;
      }

      div.collapseHeaderStop {
        background-color: transparent;
        padding: 0 0.8em;
        border: none;
        display: flex;
        justify-content: space-between;
      }

      .buttonReqStop {
        display: flex;
        justify-content: space-between;
        padding: 0.1em 0.6em;
        background: #65b770;
        border-radius: 1.4em;
      }

    }

    /* ----------------------------------------- max width 400 px ----------------------------------------- */

    /* ----------------------------------------- max width 411 px ----------------------------------------- */

    @media screen and (min-width: 415px) and (max-width: 420px) {

      body {
        background-color: #efeff4 !important;
        min-height: 100%;
        font-family: 'Helvetica Neue' !important;
        padding-bottom: 0.1em;
      }

      * {
        max-height: 100%;
      }


      .main {
        width: 100%;
        padding: 0 1em !important;
      }

      .mainTab {
        background-color: #d9d9dd;
        border-radius: 1.5em;
        height: 100%;
        padding: 4px;
        z-index: 1;
      }

      nav {
        background-color: #efeff4;
        border: none !important;
        box-shadow: none !important;
      }

      .userNavbar {
        color: #919191 !important;
        font-weight: 500;
        padding: 0;
      }

      .logoutNavbar {
        color: red;
        font-size: 0.9rem !important;
      }

      .hello {
        font-size: 0.7rem;
        font-weight: 400;
        /* color: #e5e4e4 !important; */
      }

      .titleNavBar {
        font-weight: bold !important;
        margin: 0.2em 0;
        padding: 0.2em 2em;
        color: #5e5e5e;
        border-radius: 2em;
        font-size: 0.8em;
        font-family: "Quicksand", sans-serif !important;
      }

      .divHrd {
        border-left: 1px solid #cdcdcf;
      }

      .tabs .tab a {
        font-size: 0.9em !important;
      }

      .activeJobCard,
      .failedJobCard,
      .waitJobCard,
      .prioJobCard {
        border-radius: 1.5em;
        box-shadow: none !important;
      }

      /* active badge */
      .isActiveFillBadgePrio {
        background-color: #f3af3d;
        padding: 2px 3px;
        border-radius: 4px;
        font-size: 0.4em;
        color: #f3af3d;
      }

      .isActiveOutlineBadgePrio {
        border: 2px solid #f3af3d;
        padding: 1px 2px;
        border-radius: 4px;
        font-size: 0.4em;
        color: #fff;
      }

      .isActiveFillBadge {
        background-color: #2b73b8;
        padding: 2px 3px;
        border-radius: 4px;
        font-size: 0.4em;
        color: #2b73b8;
      }

      .isActiveOutlineBadge {
        border: 2px solid #2b73b8;
        padding: 1px 2px;
        border-radius: 4px;
        font-size: 0.4em;
        color: #fff;
      }

      /* active badge */


      /* waiting first badge */
      .isWaitOutlineBadge {
        border: 2px solid #2b73b8;
        padding: 1px 2px;
        border-radius: 4px;
        font-size: 0.4em;
        color: #fff;
      }

      .isWaitOutlineBadgePrio {
        border: 2px solid #f3af3d;
        padding: 1px 2px;
        border-radius: 4px;
        font-size: 0.4em;
        color: #fff;
      }

      .isWaitFillBadge {
        background-color: #65b76f;
        padding: 2px 3px;
        border-radius: 4px;
        font-size: 0.4em;
        color: #65b76f;
      }

      /* waiting first badge */

      .isFailedFillBadge {
        background-color: #dc3b25;
        padding: 2px 3px;
        border-radius: 4px;
        font-size: 0.4em;
        color: #dc3b25;
      }

      .isFailedOutlineBadge {
        border: 2px solid #dc3b25;
        padding: 1px 2px;
        border-radius: 4px;
        font-size: 0.4em;
        color: #fff;
      }

      .searchDoc {
        position: relative;
        width: 100%;
        height: 25px;
        background-color: #d6d6da;
        border-radius: 2em;
        margin-top: 1em;
        padding: 0 7px;
      }

      input[data-trigg="document"] {
        border: none !important;
        border-bottom: none;
        text-align: left;
        color: #5f5e5e;
        height: 1em !important;
        font-size: 0.8em !important;
      }

      .fa {
        box-sizing: border-box;
        padding: 7px;
        width: 42.5px;
        height: 42.5px;
        position: absolute;
        top: 0;
        right: 0;
        border-radius: 50%;
        color: #07051a;
        text-align: center;
        font-size: 1em;
        transition: all 1s;
      }

      #modalShowSubjob,
      #modalAddCoadmin,
      #modalViewJob,
      #modalAddJob {
        /* max-height: 97% !important;
        height: 97% !important;
        border-top-left-radius: 2.4em;
        border-top-right-radius: 2.4em;
        transition: ease 1s; */
        top: 0% !important;
        bottom: auto !important;
        transition: all 1s;
        will-change: transform;
        transform: translate(100%, 0) scale(1) !important;
        width: 100%;
        opacity: 1 !important;
        height: 100%;
        max-height: 100%;
      }

      #modalShowSubjob.open,
      #modalAddCoadmin.open,
      #modalViewJob.open,
      #modalAddJob.open {
        transition: all .5s;
      }

      #modalShowSubjob:not([style*="display: none"]):not([style*="opacity: 0;"]),
      #modalAddCoadmin:not([style*="display: none"]):not([style*="opacity: 0;"]),
      #modalViewJob:not([style*="display: none"]):not([style*="opacity: 0;"]),
      #modalAddJob:not([style*="display: none"]):not([style*="opacity: 0;"]) {
        transform: translate(0, 0%) !important;
      }

      .searchViewJob {
        position: relative;
        width: 100%;
        height: 31px;
        background-color: #fff;
        border-radius: 2em;
        margin-top: 1.5em;
      }

      input[data-trigg="searchViewJob"] {
        border: none !important;
        position: absolute !important;
        top: 0;
        left: 2em;
        width: 70% !important;
        height: 24px !important;
        line-height: 20px !important;
        display: block;
        font-size: 0.9em !important;
        border-radius: 20px;
        padding: 0 20px !important;
        margin-top: 0.3em !important;
      }

      input[data-trigg="searchCrew"]:focus,
      input[data-trigg="searchViewJob"]:focus {
        box-shadow: none !important;
      }

      #fa-searchView {
        box-sizing: border-box;
        padding: 0 7px;
        width: 42.5px;
        height: 42.5px;
        position: absolute;
        top: 0;
        left: 0;
        border-radius: 50%;
        color: #07051a;
        text-align: center;
        font-size: 1em;
        transition: all 1s;
      }

      div.targetBodyItemActive,
      div.targetBodyItemInactive {
        background-color: #fff;
        border-bottom-left-radius: 1.2em;
        border-bottom-right-radius: 1.2em;
        padding-top: 1em;
        padding-bottom: 0;
        padding-right: 0.8em;
        padding-left: 0.8em;
        margin: 0;
      }

      div.collapsible-header.headerItemActive,
      div.collapsible-header.headerItemInactive {
        border: none !important;
        display: flex;
        justify-content: space-between;
        padding: 1em 0.8em;
        border-radius: 1.2em;
        transition: ease .5s;
      }

      div.collapsible-body.collapseDetailActive,
      div.collapsible-body.collapseDetailInactive {
        padding: 0 !important;
        border: none !important;
      }

      div.modal-overlay {
        top: 0;
      }

      input[data-trigg="add"] {
        /* border: 1px solid black !important; */
        border: none !important;
        border-bottom: none;
        text-align: center;
        color: #5f5e5e;
        height: 1em !important;
        font-size: 0.8em !important;
      }

      input[data-trigg="jobTitle"] {
        border-bottom: none !important;
        background-color: white !important;
        border-radius: 1.6em !important;
        width: 100% !important;
        padding: 0.5em 1.2em !important;
        height: 4.5em !important;
        font-size: 0.8em !important;
        margin: 8px 0 !important;
        display: inline-block !important;
        box-sizing: border-box !important;
      }

      input[data-trigg="jobTitle"]:focus {
        box-shadow: none !important;
      }

      .collapseCrew {
        /* margin-top: 0.8em !important; */
        padding: 0 1.2em !important;
        border: none !important;
      }

      .collapseLeader {
        padding: 0 1em !important;
        color: #40a1f8;
        border: none !important;
      }

      .collapseSubjobIndex,
      .targetViewSubjob {
        /* margin-top: 0.8em !important; */
        padding: 0 1.2em !important;
        border: none !important;
      }

      .collapseApproval {
        padding: 0 0.8em !important;
        border: none !important;
      }

      /* modal add crew */
      .searchDiv {
        position: relative;
        width: 100%;
        height: 50px;
        background-color: #d6d6da;
        border-radius: 2em;
        margin-top: 1em;
      }

      input[data-trigg="searchCrew"] {
        border: none !important;
        position: absolute !important;
        top: 0;
        left: 0;
        width: 70% !important;
        height: 41px !important;
        line-height: 20px !important;
        display: block;
        font-size: 0.9em !important;
        border-radius: 20px;
        padding: 0 20px !important;
        margin-top: 0.3em !important;
      }

      #modalAddCrew {
        /* top: 3% !important; */
        max-height: 97%;
        border-top-left-radius: 2.4em;
        border-top-right-radius: 2.4em;
        height: 97%;
        /* width: 100%; */
      }

      /* modal add crew */

      div.inputSubjobFirst {
        width: 100%;
      }

      .subjobField {
        color: #48a5f8;
      }

      input.manualSubjobField {
        border: none !important;
        color: #929293 !important;
        font-size: 1em !important;
        margin: 0 !important;
      }

      input.manualSubjobField:focus {
        box-shadow: none !important;
      }

      div#titleRow {
        margin-bottom: 0 !important;
      }

      div#coadminRow {
        margin-bottom: 7px;
      }

      div#crewLeaderRow {
        margin-bottom: 7px;
      }

      #modalAddSubjob,
      #modalAddRemind,
      #modalAddAssessor,
      #modalChangePassword {
        /* top: 3% !important; */
        max-height: 97% !important;
        height: 97% !important;
        border-top-left-radius: 2.4em;
        border-top-right-radius: 2.4em;
        transition: ease 0.5s;
        max-width: 100%;
        overflow-x: hidden;
        background: #f2f1f6;
        /* width: 100%; */
      }

      #modalChangePassword {
        /* top: 3% !important; */
        max-height: 97% !important;
        height: 97% !important;
        border-top-left-radius: 2.4em;
        border-top-right-radius: 2.4em;
        transition: ease 0.5s;
        max-width: 100%;
        overflow-x: hidden;
        background: #fff;
        /* width: 100%; */
      }

      .textareaContainer {
        max-width: 100%;
        /* border: 1px solid green; */
        position: relative;
        overflow: hidden;
      }

      .textareaContainer::before,
      .textareaContainer textarea {
        font-family: sans-serif !important;
        font-size: 0.9em !important;
      }

      .textareaField {
        width: 100%;
        box-sizing: border-box;
        background: transparent;
        padding-top: 1.5em;
        padding-bottom: 1.8em;
        padding-right: 1.4em;
        padding-left: 1.4em;
        border: 0;
        outline: none;
        display: block;
        line-height: 2.6;
        height: 12rem !important;
        color: black;

      }

      .textareaContainer::before {
        position: absolute;
        content: "_____________________________________________\A_____________________________________________\A_____________________________________________";
        z-index: -1;
        padding-top: 0.8em;
        padding-bottom: 1.8em;
        padding-right: 1.4em;
        padding-left: 1.4em;
        left: 0;
        top: 0;
        width: 100%;
        color: #e0e0e0 !important;
        line-height: 2.8;
        background-color: white;
        border-radius: 1.4em;
        margin-top: 8px;
      }

      .tdTitleIndex {
        border-bottom: 2px solid #eaeaea !important;
        padding: 12px 5px;
        width: 18em;
      }

      .footerClass {
        position: fixed;
        bottom: 0;
        background-color: #f2f1f6;
        padding-left: 0;
        margin-left: 0;
        width: 100%;
        max-width: 100%;
        padding-top: 0;
        transition: ease 0.7s;
        height: 3.5em;
        display: none;
      }

      input[data-trigg="inputSubjobRemind"] {
        border: none !important;
        margin-right: 0.8em !important;
        margin-left: 0.8em !important;
        width: 14.4em !important;
        /* color: #979797 !important; */
      }

      .calendar {
        background-color: transparent !important;
        font-size: 0.5em !important;
        border-radius: 1.4em;
        padding: 0.5em 1.3em !important;
      }

      .calendar table {
        margin-top: 1em !important;
        margin-bottom: 1em !important;
      }

      .calendar thead {
        color: #cdcece !important;
        font-size: 0.8em !important;
        text-align: center !important;
        text-transform: uppercase !important;
      }

      .calendar table tbody tr {
        border: none !important;
        padding: 0 0.4em !important;
      }

      .calendar td {
        text-align: center !important;
        padding: 0.5em 0.1em !important;
      }

      .calendar .day {
        /* padding: 0 0.7em !important; */
        line-height: 2.2em !important;
      }

      .calendar .day.today {
        background-color: #40a1f8 !important;
      }

      .calendar .event-container {
        display: none !important;
      }

      .calendar .filler {
        transform: none !important;
        background: none !important;
      }

      .calendar header .month,
      .calendar header .btn-prev,
      .calendar header .btn-next {
        display: none !important;
      }

      .selectMonth,
      .selectYear {
        text-transform: uppercase;
        background-color: #f2f3f8;
        font-size: 0.8em;
        text-transform: uppercase;
        text-align: center;
        padding: 0.3em;
        border-radius: 1.4em;
        color: #535352;
        font-family: "Quicksand", sans-serif;
        font-weight: 700;
        margin-bottom: 0.4em;
      }

      .selectMonthRevise,
      .selectYearRevise {
        text-transform: uppercase;
        background-color: #fff;
        font-size: 0.8em;
        text-transform: uppercase;
        text-align: center;
        padding: 0.3em;
        border-radius: 1.4em;
        color: #535352;
        font-family: "Quicksand", sans-serif;
        font-weight: 700;
        margin-bottom: 0.4em;
      }

      .selectDay {
        text-transform: uppercase;
        margin-top: 2.7em;
        font-size: 0.6em;
        color: #9fa0a0;
        text-align: center;
        font-weight: 700;
      }

      .selectDay p {
        /* margin: 0.8em !important; */
        padding: 0.5em 0 !important;
      }

      .activeDay {
        background-color: #40a1f8 !important;
        color: white;
        border-radius: 1.4em;
      }

      .collapseDeadlinedate {
        padding: 0 1.2em !important;
        border: none !important;
      }

      input.inputHour {
        width: 2.9em !important;
        text-align: right !important;
        height: 2.2em !important;
        padding: 0.1em 0.7em !important;
        border-top-left-radius: 1em !important;
        border-bottom-left-radius: 1em !important;
        background-color: #f1f2f7 !important;
        box-shadow: none !important;
        border-bottom: none !important;
        font-size: 0.8em !important;
      }

      input.inputHourRevise,
      input.inputHourRequest,
      input.hourChangeOverdue {
        width: 2.9em !important;
        text-align: right !important;
        height: 2.2em !important;
        padding: 0.1em 0.7em !important;
        border-top-left-radius: 1em !important;
        border-bottom-left-radius: 1em !important;
        background-color: #fff !important;
        box-shadow: none !important;
        border-bottom: none !important;
        font-size: 0.8em !important;
      }

      input.inputMinutesRevise,
      input.inputMinutesRequest,
      input.minutesChangeOverdue {
        width: 2.9em !important;
        text-align: left !important;
        height: 2.2em !important;
        padding: 0.1em 0.7em !important;
        border-top-right-radius: 1.4em !important;
        border-bottom-right-radius: 1.4em !important;
        background-color: #fff !important;
        box-shadow: none !important;
        border-bottom: none !important;
        font-size: 0.8em !important;
      }

      input.inputMinutes {
        width: 2.9em !important;
        text-align: left !important;
        height: 2.2em !important;
        padding: 0.1em 0.7em !important;
        border-top-right-radius: 1.4em !important;
        border-bottom-right-radius: 1.4em !important;
        background-color: #f1f2f7 !important;
        box-shadow: none !important;
        border-bottom: none !important;
        font-size: 0.8em !important;
      }

      p.range-field {
        border-radius: 1em;
        background-color: #f1f2f7;
        padding-bottom: 0;
        padding-top: 0.2em;
        padding-left: 0.1em;
        padding-right: 0.1em;
      }

      input[type="range"] {
        margin: 0;
        padding: 0;
      }

      div#slider.noUi-target.noUi-ltr.noUi-horizontal.noUi-txt-dir-ltr {
        height: 3px !important;
      }

      div#sliderRevise.noUi-target.noUi-ltr.noUi-horizontal.noUi-txt-dir-ltr,
      div#sliderChangeOverdue.noUi-target.noUi-ltr.noUi-horizontal.noUi-txt-dir-ltr {
        height: 1.5px !important;
      }

      div#sliderRequest.noUi-target.noUi-ltr.noUi-horizontal.noUi-txt-dir-ltr {
        height: 1.5px !important;
      }

      .noUi-target {
        border: none !important;
        /* background-color: #d3d3d3; */
      }

      .noUi-handle {
        border: none !important;
      }

      .noUi-handle:after {
        top: 0 !important;
        width: 5px !important;
        border-radius: 50% !important;
        background-color: #3fa1f8 !important;
        left: 15px !important;
      }

      div.noUi-handle.noUi-handle-lower::before {
        width: 0;
      }

      div.noUi-handle.noUi-handle-lower::after {
        height: 5px !important;
        top: 2px !important;
        margin-top: 1.5px;
        margin-left: -3px;
      }

      div.noUi-connect {
        background-color: transparent;
      }

      div.sliderParent {
        background-color: #f1f2f7;
        border-radius: 1em;
        margin-bottom: 10px;
        height: 1.8em;
        padding: 0 0.8em;
        margin-top: 4px;
      }

      div.sliderParentRevise,
      div.sliderParentRequest,
      div.sliderParentChangeOverdue {
        background-color: #fff;
        border-radius: 1em;
        margin-bottom: 10px;
        height: 1.8em;
        padding: 0 0.8em;
        margin-top: 4px;
      }

      .activeRemind {
        background-color: #40a1f8 !important;
        border-radius: 2em !important;
        padding: 0.3em 0.5em !important;
        color: white !important;
      }

      .minutes,
      .hours,
      .days,
      .follow {
        border-radius: 2em;
        padding: 0.3em 0.5em;
        color: #b6b6b6;
        font-weight: 5000;
        font-size: 0.8em;
      }

      label[data-trigg="fileUpload"] {
        border-bottom: none !important;
        background-color: white !important;
        border-radius: 1.6em !important;
        width: 100% !important;
        padding: 0.5em 2em !important;
        font-size: 0.8em !important;
        margin-top: 8px;
        margin-bottom: 8px;
        margin-right: 12em;
        box-sizing: border-box !important;
        color: #66b4fa !important;
        font-weight: 500;
      }

      label[data-trigg="fileUploadRevise"],
      label[data-trigg="fileUploadReportDone"] {
        border-bottom: none !important;
        border-radius: 1.6em !important;
        width: 100% !important;
        font-size: 0.8em !important;
        margin-top: 8px;
        margin-bottom: 8px;
        box-sizing: border-box !important;
        color: #66b4fa !important;
        font-weight: 500;
      }

      form#uploadFileAdmin {
        padding: 0.8em 0;
      }

      form#uploadFileAdmin:hover {
        width: 100%;
      }

      #fileUpload,
      #fileUploadRevise,
      #fileUploadReportDone {
        opacity: 0;
        position: absolute;
        z-index: -1;
      }

      img.stylingImage {
        border-radius: 1em;
        margin: 3px 5px;
        width: 35px;
        height: 35px;
        z-index: 1;
      }

      span.deleteImgBtn {
        z-index: 2;
        position: absolute;
        /* margin-left: 4px; */
        transition: ease 1s;
      }

      #previewImg {
        padding: 0 0.8em;
      }

      .textareaField1:focus,
      .textareaContainer1:focus,
      .notesField:focus {
        border: none !important;
        box-shadow: none !important;
        outline: none;
      }

      .textareaContainer1 {
        padding: 0.7em;
      }

      .textareaField1,
      .notesField {
        height: 8em !important;
        padding: 0.2em 1em;
        border: none !important;
        font-size: 0.9em;
        font-family: "Quicksand", sans-serif;
        font-weight: 500;
      }

      div.collapsible-body.collapseDetailSubjob {
        padding: 0 1.2em !important;
        border: none !important;
      }

      ul.collapseImageGallery,
      ul.collapseDeadlineDateRevise,
      ul.collapseDeadlineDateRequestt,
      ul.collapseDeadlineChangeOverdue,
      ul.collapseImg {
        box-shadow: none;
        border: none !important;
        margin: 0;
      }

      ul.collapseDetailCrewSubjob,
      ul.collapseDetailRemindSubjob,
      ul.collapseDeadlineHourRevise,
      ul.collapseDeadlineHourRequest,
      ul.collapseImageRevise,
      ul.collapseReportHistoryUser,
      ul.collapseTimeChangeOverdue,
      ul.collapseStoppable,
      ul.collapseRemindd {
        box-shadow: none;
        border: none !important;
        margin: 0;
      }

      div.collapseHeaderImageGallery,
      div.collapseHeaderRemindd,
      div.collapseHeaderImageGallery,
      div.collapseHeaderReportDone {
        background-color: transparent;
        padding: 0;
        border: none;
        display: flex;
        justify-content: space-between;
      }

      div.collapseBodyImageGallery,
      div.collapseBodyCrew,
      div.collapseBodyRemindd,
      div.collapseBodyImageRevise {
        border: none;
        padding: 0;
        margin-top: 5px;
      }

      div#modalShowImagee {
        width: 100%;
        border-radius: 1em;
      }

      img.detailImage,
      img.detailImagee {
        width: 23em;
        height: 23em;
      }

      div.targetShowImage {
        text-align: center;
      }

      div.collapseHeaderCrew {
        background-color: transparent;
        padding: 0;
        border: none;
        display: flex;
        justify-content: space-between;
      }

      span.dotSpan {
        width: 5px;
        height: 5px;
        background-color: red;
        border-radius: 50%;
        margin-right: 10px;
        transition: ease 1s;
      }

      div.buttonCorrect {
        border-radius: 1.5em;
        background-color: #3fa0f8;
        padding: 1.4em;
        cursor: pointer;
        margin-bottom: 1.5em;
      }

      div.buttonRevise {
        border-radius: 1.5em;
        background-color: #db3b25;
        padding: 1.4em;
        cursor: pointer;
        width: 100%;
        padding-bottom: none;
        border: none;
        box-shadow: none;
      }

      div.doneAction,
      div.revisedAction {
        background-color: #d6d6dc;
        border-radius: 1.5em;
        padding: 1.4em;
        cursor: pointer;
        margin-top: 0.7em;
      }

      div.requestRevision,
      div.requestOverdue {
        background-color: #db3b26;
        border-radius: 0.8em;
        padding: 0.3em 0;
        cursor: pointer;
      }

      div.reportDoneButton {
        background-color: #3fa2f8;
        border-radius: 0.8em;
        padding: 0.3em 0;
        cursor: pointer;
      }

      div.collapseImageSubjob {
        border: none;
        padding: 0 1em;
      }

      div.borderBottom {
        height: 1px;
        background-color: #e0dfe1;
        margin-left: 3.8em;
        margin-right: 0.8em;
      }

      div.borderBottomLong {
        border-top: 1px solid #e0dfe1;
        margin: 0 1.2em;
      }

      div.borderBottomFull {
        border-top: 1px solid #e0dfe1;
      }

      div.collapsible-body.collapseCrewSubjob {
        padding: 0 1.2em !important;
        border: none !important;
      }

      div.collapsible-body.collapseDetailReq,
      div.collapsible-body.collapseDetailReportDone {
        padding: 1em 1.2em !important;
        border: none !important;
      }

      .notess,
      .notesRequest,
      .notesReportDone,
      .notesChangeOverdue {
        background-attachment: local;
        /* background-image:
              linear-gradient(to right, #f2f2f7 10px, transparent 10px),
              linear-gradient(to left, #f2f2f7 10px, transparent 10px),
              repeating-linear-gradient(#f2f2f7, #f2f2f7 30px, #ccc 30px, #ccc 31px, #f2f2f7 31px); */
        line-height: 1.5em;
        padding: 1em 2em;
        border-radius: 1.3em;
        background-color: #f2f2f7;
      }

      p.pReviseTime,
      p.pReviseDate {
        font-size: 0.8em;
        color: #5f5e5e;
        font-family: 'Quicksand', sans-serif;
        font-weight: 700;
      }

      .textareaImageRevise {
        width: 100%;
        height: 6rem;
        max-height: 6rem;
        background-color: transparent;
        font-size: 0.8em;
        line-height: 1.2;
        border-radius: none;
        color: #5f5f5f;
        border: none;
      }

      .textareaImageRevise:focus {
        border: none !important;
        box-shadow: none !important;
        outline: none;
      }

      div#calendarRevise,
      div#calendarRequest,
      div#calendarChangeOverdue {
        background-color: #fff;
        border-radius: 1.4em;
      }

      inputHourRevise,
      input.inputHourRequest,
      input.hourChangeOverdue {
        width: 2.9em !important;
        text-align: right !important;
        height: 2.2em !important;
        padding: 0.1em 0.7em !important;
        border-top-left-radius: 1em !important;
        border-bottom-left-radius: 1em !important;
        background-color: #fff !important;
        box-shadow: none !important;
        border-bottom: none !important;
        font-size: 0.8em !important;
      }

      input.inputMinutesRevise,
      input.inputMinutesRequest,
      input.minutesChangeOverdue {
        width: 2.9em !important;
        text-align: left !important;
        height: 2.2em !important;
        padding: 0.1em 0.7em !important;
        border-top-right-radius: 1.4em !important;
        border-bottom-right-radius: 1.4em !important;
        background-color: #fff !important;
        box-shadow: none !important;
        border-bottom: none !important;
        font-size: 0.8em !important;
      }

      div.sliderParentRevise,
      div.sliderParentRequest,
      div.sliderParentChangeOverdue {
        background-color: #fff;
        border-radius: 1em;
        margin-bottom: 10px;
        height: 1.8em;
        padding: 0 0.8em;
        margin-top: 4px;
      }

      /* table index */

      .tdNo {
        width: 1.5em;
        padding: 12px 5px;
        color: #5e5e5e;
        font-weight: 700;
        font-size: 0.8em;
      }

      .tdBadge {
        border-bottom: 2px solid #eaeaea !important;
        padding: 12px 5px;
        width: 2em;
      }

      .tdJob {
        border-bottom: 2px solid #eaeaea !important;
        padding: 12px 5px;
        width: 13em;
      }

      .tdSubjob {
        border-bottom: 2px solid #eaeaea !important;
        padding: 12px 5px;
        width: 7em;
        text-align: right;
        color: #919191;
        font-size: 0.7em;
        font-weight: 300;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        max-width: 7em;
      }

      .trArrow {
        color: #c2c2c2;
        padding: 12px 5px;
        font-size: 0.9em;
        border-bottom: 2px solid #eaeaea !important;
        width: 1.3em;
      }

      /* table index */

      .collapseDeadlinedate {
        padding: 0 1.2em !important;
        border: none !important;
      }

      div.collapseHeaderStop {
        background-color: transparent;
        padding: 0 0.8em;
        border: none;
        display: flex;
        justify-content: space-between;
      }

      .buttonReqStop {
        display: flex;
        justify-content: space-between;
        padding: 0.1em 0.6em;
        background: #65b770;
        border-radius: 1.4em;
      }

    }

    /* ----------------------------------------- max width 411 px ----------------------------------------- */

    .rowMainChangePassword {
      margin-top: 1.3em;
      padding: 0 0.8em;
    }

    .changePasswordTitle>span {
      color: var(--dim-gray);
      font-family: var(--sfpd-bold);
      text-transform: capitalize;
      font-size: 1em;
    }

    .photoProfile {
      text-align: center;
      margin-top: 3em;
      padding: 0 6em;
    }

    .imgProfile {
      background: #f3f2f7;
      border-radius: 50%;
    }

    .information {
      margin-top: 1.5em;
    }

    .uid {
      display: flex;
      justify-content: space-between;
    }

    .u-sername {
      display: flex;
      justify-content: space-between;
      margin-top: -10px;
    }

    .uid>div>p {
      color: var(--suva-gray);
      font-family: var(--sfpd-semibold);
      text-transform: uppercase;
      font-size: 0.9em;
    }

    .u-sername>div>p {
      color: var(--suva-gray);
      font-family: var(--sfpd-semibold);
      text-transform: capitalize;
      font-size: 0.9em;
    }

    .formChangePassword {
      margin-top: 2em;
    }

    .nameForm,
    .passwordForm {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .parentFormName {
      background: #f2f1f7;
      border-top-left-radius: 1rem;
      border-top-right-radius: 1rem;
      padding: 0 1em;
      width: 13.5em;
      height: 2.5em;
      border-bottom: 1px solid #fff;
    }

    .parentFormPassword {
      background: #f2f1f7;
      border-bottom-left-radius: 1rem;
      border-bottom-right-radius: 1rem;
      padding: 0 1em;
      width: 13.5em;
      height: 2.5em;
      border-bottom: 1px solid #fff;
    }

    input[data-trigg="changePassword"] {
      border: none !important;
      box-shadow: none !important;
      text-align: end;
      font-family: var(--sfpd-semibold);
      font-size: 0.8em;
      color: var(--suva-gray);
    }

    input[data-trigg="changePassword"]:focus {
      outline: none !important;
      border: none !important;
    }

    input[data-trigg="changePassword"]::placeholder {
      font-size: 0.7em !important;
    }

    .errorForm {
      text-align: right;
      font-family: var(--sfpd-light);
      font-size: 0.7em;
      color: var(--tomato);
      margin-right: 0.5em;
      display: none;
    }

    .actionChange {
      margin-top: 4em;
    }

    .actionChange>button {
      background: #00a2ff;
      width: 100%;
      border-radius: 0.8em;
      border: none;
      box-shadow: none;
      padding: 0.5em 0;
      color: #fff;
      font-family: var(--sfpd-bold);
      font-size: 0.9em;
      text-transform: uppercase;
      text-align: center;
    }

    .deactivateNote {
      border: none;
    }

    .deactivateNote:focus {
      outline: none;
    }

    .bodyDeactivate {
      padding: 0.3em 1em 0.8em 1em;
    }
  </style>

</head>

<body class="z-depth-0" onbeforeunload="HandleBackFunctionality()">

  <div class="container">
    <nav>
      <div class="nav-wrapper navMobile">
        <ul class="left itemNavbar" style="margin-right: 10px;">
          <li><a><img src="<?= base_url(); ?>/assets/images/ansena.png" width="15" height="15" alt=""></a></li>
        </ul>
        <ul class="right itemNavbar" style="margin-right: 20px;">
          <li>
            <span onclick="changePassword()" class="greeting"></span>
            <span onclick="changePassword()" class="user"></span>
            <span onclick="logoutButton()" class="bell" style="color: #d9d9dd; font-size: 1.4em;"></span>
          </li>
        </ul>
      </div>
    </nav>
  </div>

  <div class="row" style="margin-bottom: 1.9em; margin-top: 1em;">

    <div class="col m4 hide-on-small-only"></div>

    <div class="col s12 m4">
      <div class="navbar" style="height: 1.8em; background-color: #d9d9dd; border-radius: 2em; display: flex; justify-content: space-between;">
        <div>
          <p class="titleNavBar">Profil</p>
        </div>
        <div>
          <p class="titleNavBar active">Job</p>
        </div>
        <div>
          <p class="titleNavBar">Event</p>
        </div>
        <div class="divHrd">
          <p class="titleNavBar hrdNavbar">HRD</p>
        </div>
      </div>
    </div>

    <div class="col m4 hide-on-small-only"></div>

  </div>