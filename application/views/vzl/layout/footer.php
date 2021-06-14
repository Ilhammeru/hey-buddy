<!-- <footer class="page-footer footerClass" style="position: fixed; bottom: 0; background-color: #f2f1f6; padding-left: 0; margin-left: 0; width: 100%; max-width: 100%; padding-top: 0; transition: ease 0.7s; height: 3.5em; display: none;">
    <div class="container">
        <div class="row">
            <div class="col s12" style="justify-content: space-between; display: flex;">
                <div class="valign-center">
                    <p class="blue-text text-darken-1 modal-trigger" href="#modalAddJob"><i class="fas fa-plus-circle"></i> New</p>
                </div>
                <div class="valign-center">
                    <p class="blue-text text-lighten-1"> View</p>

                </div>
            </div>
        </div>
    </div>
</footer> -->

<!-- modal notification -->

<div id="modalNotification" class="modal" style="overflow-x: hidden; background: #f2f1f6;">
  <div class="modal-content" style="margin: 0; padding: 0;">

    <div class="contentNotif">

      <div class="iconInfo">

        <img src="<?= base_url(); ?>/assets/images/questionNotif.svg" width="30" height="30" alt="">

      </div>

      <div class="titleNotif">

        <p class="targetTitleNotif"></p>

      </div>

      <div class="descNotif">

        <p class="targetDescNotif">Apakah anda yakin ini keluar dari halaman ini?</p>

      </div>

    </div>

    <div class="footerNotif">

      <div class="cancelNotif">

        <span>Cancel</span>

      </div>

      <div class="confirmNotif">

        <span>OK</span>

      </div>

    </div>

    <div class="footerNotif1">

      <div class="singleAction">

        <div class="confirmFull">

          <span>OK</span>

        </div>

        <div class="cancelFull">

          <span>Cancel</span>

        </div>

      </div>

    </div>

  </div>
</div>

<!-- end modal notification -->


<!-- modal loading -->

<div id="modalLoading" class="modal" style="overflow-x: hidden; background: #f2f1f6;">
  <div class="modal-content" style="margin: 0; padding: 0;">

    <div class="preloader-wrapper big active">
      <div class="spinner-layer spinner-blue-only">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div>
        <div class="gap-patch">
          <div class="circle"></div>
        </div>
        <div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

    </div>
    <p style="font-family: var(--sfpd-bold); font-size: 1.2em; color: #fff;">Get data ...</p>

  </div>
</div>

<!-- end modal loading -->

<script>
  $(document).ready(function() {
    greeting();
    getFooter();
    openFullscreen();
    init_modal_notification();
    init_modal_loading();
    $(window).on("scroll", function() {
      if ($(window).scrollTop() > 1 && $(window).scrollTop() < 390) {
        $('.page-footer').css({
          "position": "fixed",
          "bottom": "0",
          "background-color": "#ecebea",
          "opacity": "0.9",
          "padding-left": "0",
          // "transition": "ease 0.5",
          "height": "4.5em",
          "border-top": "0.6px solid #e0e0e0"
        })
      } else {
        $('.page-footer').css({
          "background-color": "#f2f1f6",
          "height": "3.5em",
          "border-top": "none",
          "opacity": "1"
        });
      }
    })

  })

  function init_modal_notification() {

    $('#modalNotification').modal({
      opacity: 0.5,
      inDuration: 200,
      outDuration: 200,
      ready: undefined,
      complete: undefined,
      dismissible: false,
      startingTop: '14%',
      endingTop: '70%'
    });
  }

  function init_modal_loading() {

    $('#modalLoading').modal({
      opacity: 0.5,
      inDuration: 200,
      outDuration: 200,
      ready: undefined,
      complete: undefined,
      dismissible: false,
      startingTop: '14%',
      endingTop: '70%'
    });
  }

  function openFullscreen() {

    if ((document.fullScreenElement && document.fullScreenElement !== null) ||
      (!document.mozFullScreen && !document.webkitIsFullScreen)) {

      if (document.documentElement.requestFullScreen) {
        document.documentElement.requestFullScreen();
      } else if (document.documentElement.mozRequestFullScreen) {
        document.documentElement.mozRequestFullScreen();
      } else if (document.documentElement.webkitRequestFullScreen) {
        document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
      }
    }
  }

  var timer = setInterval(getTimerHello, 1);

  function greeting() {
    $.ajax({
      type: "POST",
      url: '<?= base_url('jzl/MobileJob/greeting'); ?>',
      dataType: 'text',
      success: function(result) {
        $('.user').text(result);
        $('.user').css({
          "font-size": "1.2em",
          "color": "#d9d9dd",
          "margin-right": "10px",
          "font-family": "var(--sfpd-bold)"
        });
        $('.greeting').text('Hello, ');
        $('.greeting').css({
          "font-size": "1em",
          "color": "#d9d9dd",
          "font-family": "var(--sfpd-regular)",
          "font-weight": "400"
        });

        var bell = '<i class="fas fa-bell fa-1x"></i>';
        $('.bell').html(bell);
      }
    })
  }

  function getFooter() {
    $.ajax({
      type: 'POST',
      url: '<?= base_url('jzl/MobileJob/getFooter'); ?>',
      dataType: 'json',
      success: function(result) {
        if (result.isAdmin == 1 || result.isCoadmin == 1) {
          $('.footerClass').css({
            "display": "block"
          });
        }
      }
    })
  }

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

  function logoutButton() {

    slModal('Are you sure?', 'Are you sure to logout?', 'warning', {
      buttons: {
        confirmation: true,
        value: 'confirm',
        onclick: 'logout',
        function: 'doLogout'
      }
    })
  }

  function doLogout(value) {

    $('#modalNotification').modal('close');

    $.ajax({
      type: 'POST',
      url: '<?= base_url('jzl/auth/logout'); ?>',
      dataType: 'text',
      success: function(result) {

        if (result == 'logout success') {
          slModal('See you Buddy', 'You just left from this App', 'success', {
            buttons: false,
            timer: 1500
          });

          setTimeout(function() {
            var url = '<?= base_url('jzl/auth'); ?>';
            window.location = url;
          }, 1500)
        }
      }
    })

  }

  function setDefDate(dateInput, condition) {

    if (condition == 'minus') {

      var checkDate = new Date(dateInput).getTime() + (1 * 24 * 60 * 60 * 1000);

    } else {

      var checkDate = new Date(dateInput).getTime();

    }

    var y = new Date(checkDate).getFullYear();
    var m = addZero(new Date(checkDate).getMonth() + 1);
    var d = addZero(new Date(checkDate).getDate());

    var newDate = y + '-' + m + '-' + d;
    return newDate;

  }

  function setDefHour(dateInput) {

    var checkDate = new Date(dateInput);

    var h = addZero(checkDate.getHours());
    var m = addZero(checkDate.getMinutes());

    var currentHour = h + ':' + m;

    return currentHour;

  }

  function addZero(data) {
    if (data < '10') {
      var result = '0' + data;
    } else if (data > '9') {
      var result = data;
    }

    return result;
  }

  function dateDiff(dateStart, dateEnd) {

    var firstDate = new Date(dateStart).getTime();
    var lastTime = new Date(dateEnd).getTime();

    var arr = [firstDate, lastTime];

    return arr;

  }

  function checkDeadlineDate(data, primaryTarget, secondaryTarget, thirdTarget, sliderTarget, spanName) {

    if (data == 'today') {

      var today = new Date();

    } else if (data == 'tomorrow') {

      var raw = new Date().getTime() + (1 * 24 * 60 * 60 * 1000);
      var today = new Date(raw);

    } else if (data == 'next week') {

      var raw = new Date().getTime() + (7 * 24 * 60 * 60 * 1000);
      var today = new Date(raw);

    } else {

      var today = new Date();

    }

    var today = new Date();
    var y = today.getFullYear();
    var m = addZero((today.getMonth() + 1));
    var d = addZero(today.getDate());
    var h = today.getHours();
    var min = today.getMinutes();

    var defDate = y + '-' + m + '-' + d;

    var splitDate = data.substring(0, 10).split('-');
    var newD = (parseInt(splitDate[2]) + 1);

    var newData = splitDate[0] + '-' + splitDate[1] + '-' + newD;

    var diffStart = new Date(defDate).getTime(); //date now
    var diffEnd = new Date(newData).getTime(); //data on click

    //initialize slider
    var slider = document.getElementById(sliderTarget);

    //set value hour and minutes
    if (h < '09') {

      var newHour = '09';
      var newMinutes = '00';

    } else if (h >= '09' && h < '17' && min < '30') {

      var newHour = (today.getHours() + 1);
      var newMinutes = '00';

    } else if (h >= '09' && h < '17' && min >= '30') {

      var newHour = (today.getHours() + 1);
      var newMinutes = '30';

    } else {

      var newHour = '09';
      var newMinutes = '00';

    }

    //condition date
    if (diffEnd < diffStart) {

      slModal('Failed', 'The chosen deadline should more than date now', 'warning', {
        buttons: true,
        confirm: true
      })

      var message = 'error';

    } else if (diffEnd == diffStart) {

      if (h > '17' || h < '09') {

        slModal('Failed', 'The chosen deadline should more than date now', 'warning', {
          buttons: true,
          confirm: true
        })

        var message = 'error';

      } else {

        //set value deadline date
        $('.' + thirdTarget).val(newData);

        //set value deadline hour
        $('.' + primaryTarget).val(newMinutes);
        $('.' + secondaryTarget).val(newHour);

        $('.' + spanName).text(newHour + ':' + newMinutes);

        //set slider
        if (newMinutes == '00') {

          slider.noUiSlider.set(newHour + '.' + '00');

        } else {

          slider.noUiSlider.set(newHour + '.' + '50');

        }

        var message = 'close';

      }

    } else {

      //set value deadlineDate
      $('.' + thirdTarget).val(newData);

      //set value deadline hour
      $('.' + primaryTarget).val('00');
      $('.' + secondaryTarget).val('09');

      $('.' + spanName).text('09:00');

      //set slider
      slider.noUiSlider.set('09' + '.' + '00');

      var message = 'ok';

    }

    return message;

  }

  function getValidTime() {

    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();

    if (h < '09') {

      var newHour = '09';
      var newMinutes = '00';
      var slider = '00';

    } else if (h >= '09' && h < '17' && m < '30') {

      var newHour = addZero(today.getHours() + 1);
      var newMinutes = '00';
      var slider = '00';

    } else if (h >= '09' && h < '17' && m > '30') {

      var newHour = addZero(today.getHours() + 1);
      var newMinutes = '30';
      var slider = '50';

    } else {

      var newHour = '09';
      var newMinutes = '00';
      var slider = '00';

    }

    var result = [{
      "hour": newHour,
      "minutes": newMinutes,
      "slider": slider
    }];

    return result;

  }

  function getValidDate(data = '') {

    var today = new Date();
    var y = today.getFullYear();
    var m = addZero((today.getMonth() + 1));
    var d = addZero(today.getDate());
    var h = addZero(today.getHours());
    var min = addZero(today.getMinutes());

    if (data == '') {

      if (h > '17' || h < '09') {

        var raw = new Date().getTime();
        var newToday = new Date(raw);
        var newYear = newToday.getFullYear();
        var newMonth = addZero((newToday.getMonth() + 1));
        var newDay = addZero(newToday.getDate());

        var newSet = newYear + '-' + newMonth + '-' + newDay + 'T17:00:00.000Z';

      } else {

        var newSet = y + '-' + m + '-' + d + 'T17:00:00.000Z';

      }

    }

    return newSet;

  }

  function validationSlider(value, deadlineDate, slider, fieldName1, fieldName2, spanName) {

    var slider = document.getElementById(slider);

    var split = value.split('.');
    var hourSlider = split[0];
    var minutesSlider = split[1];
    var currentTime = new Date(deadlineDate).getTime();

    var today = new Date();
    var y = today.getFullYear();
    var m = addZero((today.getMonth() + 1));
    var d = addZero(today.getDate());
    var h = addZero(today.getHours());
    var min = addZero(today.getMinutes());
    var newDate = y + '-' + m + '-' + d;
    var lastTime = new Date(newDate).getTime();

    var helper = getValidTime();
    var minHour = helper[0].hour;
    var minMinutes = helper[0].minutes;
    var minSlider = helper[0].slider

    //rules
    if (deadlineDate == '') {

      slModal('Failed', 'Before choose deadline time, please choose deadline date first', 'warning', {
        buttons: true,
        confirm: true
      })

      slider.noUiSlider.set(minHour + '.' + minSlider);

      $('.' + fieldName1).val(minHour);
      $('.' + fieldName2).val(minMinutes);

      $('.' + spanName).text(minHour + ':' + minMinutes);

    } else if (lastTime == currentTime) {

      if (hourSlider < minHour) {

        slModal('Failed', 'The chosen time should be more than date now', 'warning', {
          buttons: true,
          confirm: true
        });

        //set slider
        slider.noUiSlider.set(minHour + '.' + minSlider);

        //set value hour and minutes
        $('.' + fieldName1).val(minHour);
        $('.' + fieldName2).val(minMinutes);

        //set text span deadline hour
        $('.' + spanName).text(minHour + ':' + minMinutes);

      } else {

        if (minutesSlider == '50') {

          //set value hour and minutes
          $('.' + fieldName1).val(hourSlider);
          $('.' + fieldName2).val('30');

          //set span deadline hour
          $('.' + spanName).text(hourSlider + ':' + '30');

        } else {

          //set value hour and minutes
          $('.' + fieldName1).val(hourSlider);
          $('.' + fieldName2).val('00');

          //set span deadline hour
          $('.' + spanName).text(hourSlider + ':' + '00');

        }

      }

    } else {

      if (minutesSlider == '50') {

        //set value hour and minutes
        $('.' + fieldName1).val(hourSlider);
        $('.' + fieldName2).val('30');

        //set span deadline hour
        $('.' + spanName).text(hourSlider + ':' + '30');

      } else {

        //set value hour and minutes
        $('.' + fieldName1).val(hourSlider);
        $('.' + fieldName2).val('00');

        //set span deadline hour
        $('.' + spanName).text(hourSlider + ':' + '00');

      }

    }

  }

  function validationTime(field1, field2, hour, minutes, slider, span, deadlineValue) {

    var slider = document.getElementById(slider);

    var today = new Date();
    var y = today.getFullYear();
    var m = addZero((today.getMonth() + 1));
    var d = addZero(today.getDate());
    var newDate = y + '-' + m + '-' + d;

    var todayTime = new Date(newDate).getTime();
    var deadlineTime = new Date(deadlineValue).getTime();

    var timeHelper = getValidTime();

    if (todayTime == deadlineTime) {

      if (hour > '17' || hour == '17' && minutes > '00') {

        slModal('failed', 'The deadline time should not more than 17.00', 'warning', {
          buttons: true,
          confirm: true
        });

        //set input field
        $('.' + field1).val('17');
        $('.' + field2).val('00');

        $('.' + span).text('17:00');

        //set slider
        slider.noUiSlider.set('17.00');

      } else if (hour < timeHelper[0].hour) {

        slModal('failed', 'The deadline time should not less than ' + timeHelper[0].hour + ':' + timeHelper[0].minutes, 'warning', {
          buttons: true,
          confirm: true
        });

        //set input field
        $('.' + field1).val(timeHelper[0].hour);
        $('.' + field2).val(timeHelper[0].minutes);

        $('.' + span).text(timeHelper[0].hour + ':' + timeHelper[0].minutes);

        //set slider
        slider.noUiSlider.set(timeHelper[0].hour + '.' + timeHelper[0].slider);

      } else {

        //condition
        if(hour >= '09' && hour < '17') {

          if(minutes >= 60) {

            slModal('Failed', 'Youd can only pick a minutes between 00 - 59', 'warning', {
              buttons: true,
              confirm: true
            })

            var newHour = hour;
            var newMinutes = '59';

            //set input field
            $('.' + field1).val(newHour);
            $('.' + field2).val(newMinutes);

            $('.' + span).text(newHour + ':' + newMinutes);

            //set slider
            if(newMinutes < 30) {

              slider.noUiSlider.set(newHour + '.00');

            } else {

              slider.noUiSlider.set(newHour + '.50');

            }

          } else {

            //set input field
            $('.' + field1).val(hour);
            $('.' + field2).val(minutes);

            $('.' + span).text(hour + ':' + minutes);

            //set slider
            if(minutes < 30) {

              slider.noUiSlider.set(hour + '.00');

            } else {

              slider.noUiSlider.set(hour + '.50');

            }

          }

        }

      }

    } else if (deadlineTime > todayTime) {

      if (hour < '09') {

        slModal('failed', 'The deadline time should not less than 09.00', 'warning', {
          buttons: true,
          confirm: true
        });

        //set input field
        $('.' + field1).val('09');
        $('.' + field2).val('00');

        $('.' + span).text('09:00');

        //set slider
        slider.noUiSlider.set('09.00');

      } else if (hour > '17' || hour == '17' && minutes > '00') {

        slModal('failed', 'The deadline time should not more than 17.00', 'warning', {
          buttons: true,
          confirm: true
        });

        //set input field
        $('.' + field1).val('17');
        $('.' + field2).val('00');

        $('.' + span).text('17:00');

        //set slider
        slider.noUiSlider.set('17.00');

      }

    }

  }
</script>

<script src="<?= base_url(); ?>/assets/materialize/js/materialize.min.js"></script>
<script src="<?= base_url(); ?>/assets/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?= base_url(); ?>/assets/select2/dist/js/select2.min.js"></script>
<script src="<?= base_url(); ?>/assets/nouislider/distribute/nouislider.min.js"></script>
<script src="<?= base_url(); ?>assets/popover/popover.js"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>
