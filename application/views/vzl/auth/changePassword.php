<div id="swipeChangePassword">

    <div class="row" style="height: 10px; padding: 0; margin: 0;">
        <div class="col s5" style="padding: 0; margin: 0"></div>
        <div class="col s2" style="padding: 0; margin: 0">
            <p class="center-align" style="background-color: #d6d5d5; color: #d6d5d5; border-radius: 2em; height: 4px;"></p>
        </div>
        <div class="col s5" style="padding: 0; margin: 0"></div>
    </div>
    <div class="valign-wrapper" style="justify-content: space-between; display: flex; margin-top: 0; margin-top: 0.8em;">
        <div onclick="closeModalChangePassword()">
            <span class="center-align" style="color: #44a3f7" onclick="closeModalAddCrew()"><img src="<?= base_url(); ?>/assets/images/backbtn.png" width="15" height="10" alt=""></span>
            <span style="color: #44a3f7; font-family: var(--sfpd-light); margin-left: 0.3em; "> Back</span>
        </div>
    </div>

</div>

<div class="row rowMainChangePassword">

  <div class="changePasswordTitle">

    <span>change password</span>

  </div>

  <div class="photoProfile">

    <div class="imgProfile">

      <img style="width: 120px; height: 120px;" src="<?= base_url(); ?>/assets/images/userprofile.png" alt="">

    </div>

  </div>

  <div class="information">

    <div class="uid">

      <div class="uidText">

        <p>uid</p>

      </div>

      <div class="uidValue">

        <p><?= $_SESSION['user']; ?></p>

      </div>

    </div>

    <div class="u-sername">

      <div>

        <p>username</p>

      </div>

      <div class="fullName">

        <p><?= $_SESSION['fName']; ?></p>

      </div>

    </div>

  </div>

  <div class="formChangePassword">

    <div class="nameForm">

      <div class="">

        <span style="font-family: var(--sfpd-semibold); font-size: 0.9em; color: var(--suva-gray)">Password</span>

      </div>

      <div class="parentFormName">

        <input type="password" data-trigg="changePassword" class="passChange" name="passChange" placeholder="Type password" oninput="checkPassword()">

      </div>

    </div>

    <div class="passwordForm">

      <div class="">

        <span style="font-family: var(--sfpd-semibold); font-size: 0.9em; color: var(--suva-gray)">Retype Password</span>

      </div>

      <div class="parentFormPassword">

        <input type="password" data-trigg="changePassword" class="retypePassword" name="retypePassword" placeholder="Retype password" oninput="checkRetypePassword()">

      </div>

    </div>

    <div class="errorForm">

      <span>Password didnt match</span>

    </div>

    <div class="actionChange">

      <button type="button" onclick="confirmChangePassword()" class="doChangePassword" name="doChangePassword">Save Password</button>

    </div>

  </div>

</div>

<script type="text/javascript">

// swipe action

document.getElementById('swipeChangePassword').addEventListener('touchstart', handleTouchStart, false);
document.getElementById('swipeChangePassword').addEventListener('touchmove', handleTouchMove, false);

var xDown = null;
var yDown = null;

function getTouches(evt) {
    return evt.touches || // browser API
        evt.originalEvent.touches; // jQuery
}

function handleTouchStart(evt) {
    const firstTouch = getTouches(evt)[0];
    xDown = firstTouch.clientX;
    yDown = firstTouch.clientY;
};

function handleTouchMove(evt) {
    if (!xDown || !yDown) {
        return;
    }

    var xUp = evt.touches[0].clientX;
    var yUp = evt.touches[0].clientY;

    var xDiff = xDown - xUp;
    var yDiff = yDown - yUp;

    if (Math.abs(xDiff) > Math.abs(yDiff)) {
        /most significant/
        if (xDiff > 0) {
            /* left swipe */
        } else {
            /* right swipe */
        }
    } else {
        if (yDiff > 0) {
            /* up swipe */
        } else {
            /* down swipe */
            $('#modalChangePassword').modal('close');
        }
    }
    /* reset values */
    xDown = null;
    yDown = null;
  };

  // end swipe action

function confirmChangePassword()
{
  var password = $('.passChange').val();
  var retype = $('.retypePassword').val();

  if(password == '' || retype == '') {

    $('.errorForm').show();
    $('.errorForm span').text('Password must have value');

  } else {

    $('.errorForm').hide();

    var param = [];

    slModal('Change password', 'Are you sure to change your last password?', 'question', {
        buttons: {
            confirmation: true,
            value: 'confirm',
            onclick: 'delete',
            params: param,
            function: 'doChangePassword'
        }
    })

  }

}

function doChangePassword() {

  $('#modalNotification').modal('close');

  var idMaster = '<?= $_SESSION['id']; ?>';
  var password = $('.passChange').val().toLowerCase();
  var retype = $('.retypePassword').val().toLowerCase();

  if(password != retype) {

    $('.errorForm').show();
    $('.errorForm span').text('Password didnt match');

  } else {

    $.ajax({
      type: 'post',
      data: {
        password: password,
        retype: retype,
        id: idMaster
      },
      url: '<?= base_url('jzl/Auth/changePassword'); ?>',
      dataType: 'text',
      success: function(result) {

        if(result == 'success') {

          $('.passChange').val('');
          $('.retypePassword').val('');

          slModal('success', 'Password changed successfully', 'success', {
            buttons: false,
            timer: 1500
          })

        }

      }
    })

  }

}

function checkPassword() {

  var password = $('.passChange').val();
  var retype = $('.retypePassword').val();

  if(password == '' && retype != '') {

    $('.errorForm').show();
    $('.errorForm span').text('Password must be have value');

    //disbale button
    $('.doChangePassword').css({
      "background": "#0079bf",
      "color": "var(--silver)"
    })

  } else {

    $('.errorForm').hide();

    //disbale button
    $('.doChangePassword').css({
      "background": "#00a2ff",
      "color": "#fff"

    })

  }

}

  function checkRetypePassword() {

    var password = $('.passChange').val();
    var retype = $('.retypePassword').val();

    if(retype != password) {

      $('.errorForm').show();
      $('.errorForm span').text('Password didnt match');

      //disbale button
      $('.doChangePassword').css({
        "background": "#0079bf",
        "color": "var(--silver)"
      })

    } else {

      $('.errorForm').hide();
      $('.errorForm span').text('Password didnt match');

      //disbale button
      $('.doChangePassword').css({
        "background": "#00a2ff",
        "color": "#fff"

      })

    }
  }

  function closeModalChangePassword() {
    $('#modalChangePassword').modal('close');
  }

</script>
