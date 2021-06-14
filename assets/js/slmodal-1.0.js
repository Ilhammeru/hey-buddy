function slModal(title, message, icon, array = []) {

  var button = array.buttons;
  var time = array.timer;
  var cancel = array.cancel;
  var confirm = array.confirm;

  if(button == undefined || button == false) {

    $('.footerNotif').hide();
    $('.footerNotif1').hide();

  } else if (button == true) {

    if (cancel != undefined || cancel == true && confirm == undefined || confirm == false) { // cancel true

      $('.footerNotif').hide();
      $('.footerNotif1').show();
      $('.cancelFull').show();
      $('.confirmFull').hide();

      $('.cancelFull').attr('onclick', 'closeModal()');

    } else if (cancel == undefined && confirm != undefined || confirm == true) { //confirm true

      $('.footerNotif').hide();
      $('.footerNotif1').show();
      $('.cancelFull').hide();
      $('.confirmFull').show();

      $('.confirmFull').attr('onclick', 'closeModal()');

    } else if(cancel == undefined && confirm == undefined ) { // cancel and confrim true or undefined

      $('.footerNotif').show();
      $('.footerNotif1').hide();
      $('.confirmNotif').show();
      $('.cancelNotif').show();

      $('.confirmNotif').attr('onclick', 'closeModal()');
      $('.cancelNotif').attr('onclick', 'closeModal()');

    }

  } else if (typeof button == 'object') {

    var confirmation = button.confirmation;
    var value = button.value;
    var onclick = button.onclick;
    var param = button.params;
    var functionName = button.function;


    $('.footerNotif').show();
    $('.footerNotif1').hide();
    $('.confirmNotif').show();
    $('.cancelNotif').show();

    if(onclick == 'logout') {

      var action = "'"+ value +"'"

      var newOnclick = functionName + '('+ action +')';

    } else if (onclick == 'delete') {

      if(param == '' || param == undefined) {

        var action = "'"+ value +"'"

        var newOnclick = functionName + '()'

      } else {

        var action = "'"+ value +"'";

        var newParam = '';
        for(var i = 0; i < param.length; i++) {

          newParam += "'" + param[i] + "',";

        }

        var newOnclick = functionName + '('+ newParam.slice(0, -1) +')';

      }

    }

    $('.confirmNotif').attr('onclick', newOnclick);
    $('.cancelNotif').attr('onclick', 'closeModal()');

  }

  //image
  var url = 'http://job.ansena-sa.com/assets/images';
  var question = '<img src="'+ url + '/questionNotif.svg' +'" width="30" height="30" alt="">';
  var success = '<img src="'+ url + '/checkNotif.svg' +'" width="30" height="30" alt="">';
  var warning = '<img src="'+ url + '/exclamation.svg' +'" width="30" height="30" alt="">';

  if (icon == 'question') {

    $('.iconInfo').html(question);

  } else if (icon == 'success') {

    $('.iconInfo').html(success);

  } else if (icon == 'warning') {

    $('.iconInfo').html(warning);

  }

  //title
  $('.targetTitleNotif').html(title);

  //message
  $('.targetDescNotif').html(message);

  //timer
  if (time != undefined) {

    setTimeout(function() {

      $('#modalNotification').modal('close');

    }, time)

  }

  $('#modalNotification').modal('open');

}

function closeModal() {

  $('#modalNotification').modal('close');

}

function slLoading() {
  $('#modalLoading').modal('open');
}
