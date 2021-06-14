<div class="headerView">

  <div class="row" style="padding-top: 1.2em; margin-bottom: 0; padding-left: 1.5em; padding-right: 1.5em; width: 27em;">
    <div class="col s12">
      <div class="valign-wrapper" style="display: flex; justify-content:space-between;">
        <div onclick="closeModalViewJob()">
          <span style="margin-right: 0.7em;"><img src="<?= base_url(); ?>/assets/images/backbtn.png" width="15" height="10" alt=""></span>
          <span style="color: #44a3f7">Back</span>
        </div>
        <div>
          <span><i style="color: #44a3f7;" class="fas fa-ellipsis-h"></i></span>
        </div>
      </div>
    </div>
  </div>

  <div class="row" style="padding-top: 0.2em; padding-bottom: 0; margin-bottom: 0; padding-left: 1.5em; padding-right: 1.5em;">
    <div class="col s12" style="padding-bottom: 0;">
      <div class="valign-wrapper" style="display: flex; justify-content:space-between;">
        <div>
          <p style="font-size: 1.4em; font-weight: 800;">View Job Groups</p>
        </div>
        <div>
          <span class="fullSort" style="margin-right: 1em;"><img src="<?= base_url('assets/images/sortbtn.png'); ?>" width="10" height="10" alt=""></span>
          <span id="popoverSort"><img src="<?= base_url('assets/images/sortbtn.png'); ?>" width="10" height="10" alt=""></span>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="row rowSorting">
  <div class="col s12 colSorting">

    <div class="row" style="margin-bottom: 0.8em;">
      <div class="col s12">
        <div>
          <div style="display: flex;">
            <div class="mainSortTitle">
              <p style="font-size: 0.8em; text-align: left;">ACTIVITY</p>
            </div>
            <div class="mainSortingButton">
              <span class="allSort">all</span>
              <span class="activeSort">active</span>
              <span class="inactiveSort">inactive</span>
              <span class="deactiveSort">deactive</span>
              <input type="hidden" name="activitySort" class="activitySort" value="">
              <input type="hidden" name="triggerSorting" class="triggerActivity" value="">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row" style="margin-bottom: 0.4em;">
      <div class="col s12" style="padding: 0;">

        <div class="div-table">

          <div class="div-table-row">
            <div class="div-table-col-subjob" align="center">SUB JOBS</div>
            <div class="div-table-col-all-subjob">
              <span class="allTitle">all</span>
            </div>
            <div class="div-table-col-active-subjob">
              <span class="activeTitle">active</span>
            </div>
            <div class="div-table-col-min-subjob">
              <input type="text" name="minSubjob" class="minSubjob" data-trigg="minSubjob" oninput="addMinSubjob()" value="" placeholder="MIN">
              <input type="hidden" name="triggerSorting" class="triggerMinSubjob" value="">
            </div>
            <div class="div-table-col-to-subjob">
              <span>TO</span>
            </div>
            <div class="div-table-col-max-subjob">
              <input type="text" name="maxSubjob" class="maxSubjob" data-trigg="minSubjob" oninput="addMaxSubjob()" value="" placeholder="MAX">
              <input type="hidden" name="triggerSorting" class="triggerMaxSubjob" value="">
            </div>
            <input type="hidden" name="inputSubjobSort" class="inputSubjobSort" value="">
            <input type="hidden" name="triggerSorting" class="triggerAllinSubjob" value="">
          </div>

          <div class="div-table-row">
            <div class="div-table-col-deadline" align="center">DEADLINES</div>
            <div class="div-table-col-min-deadline">

              <div class="valign-wrapper" style="display: flex; justify-content: space-between; padding: 0 0.6em;">
                <div class="">
                  <input type="text" readonly class="minDatepicker" id="minDeadline" data-trigg="minDatepicker" placeholder="none">
                  <input type="hidden" name="triggerSorting" class="triggerMinDeadline" value="">
                </div>
                <div>
                  <img class="imgMinDeadline" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="10" height="10" alt="">
                </div>
              </div>

            </div>
            <div class="div-table-col-to-deadline">
              <span>TO</span>
            </div>
            <div class="div-table-col-max-deadline">

              <div class="valign-wrapper" style="display: flex; justify-content: space-between; padding: 0 0.6em;">
                <div>
                  <input type="text" id="maxDatepicker" class="maxDatepicker" readonly data-trigg="minDatepicker" placeholder="none">
                  <input type="hidden" name="triggerSorting" class="triggerMaxDeadline" value="">
                </div>
                <div>
                  <img class="imgMaxDeadline" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="10" height="10" alt="">
                </div>
              </div>

            </div>
            <input type="hidden" name="inputSubjobSort" class="inputSubjobSort" value="">
          </div>

          <div class="div-table-row">
            <div class="div-table-col-coadmin" align="center">CO-ADMIN</div>
            <div class="div-table-col-field-coadmin">

              <div class="valign-wrapper" style="display: flex; justify-content: space-between; padding: 0 0.6em;">
                <div>
                  <input type="text" readonly class="inputCoadmin" data-trigg="inputCoadmin" placeholder="none">
                  <input type="hidden" name="triggerSorting" class="triggerCoadmin" value="">
                </div>
                <div id="fieldCoadmin">
                  <img class="imgCoadmin" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="10" height="10" alt="">
                </div>
              </div>

            </div>

          </div>

          <div class="div-table-row">
            <div class="div-table-col-crew" align="center">CREWS</div>
            <div class="div-table-col-min-crew">
              <input type="text" name="minCrew" class="minCrew" data-trigg="minSubjob" oninput="addMinCrew()" value="" placeholder="MIN">
              <input type="hidden" name="triggerSorting" class="triggerMinCrew" value="">
            </div>
            <div class="div-table-col-to-crew">
              <span>TO</span>
            </div>
            <div class="div-table-col-max-crew">
              <input type="text" name="maxCrew" class="maxCrew" data-trigg="minSubjob" oninput="addMaxCrew()" value="" placeholder="MAX">
              <input type="hidden" name="triggerSorting" class="triggerMaxCrew" value="">
            </div>
            <div class="div-table-col-pt">

              <div class="valign-wrapper" style="display: flex; justify-content: space-between; padding: 0 0.6em;">
                <div>
                  <input type="text" readonly class="inputPt" data-trigg="inputPt" placeholder="PT">
                  <input type="hidden" name="triggerSorting" class="triggerPt" value="">
                </div>
                <div id="fieldPt">
                  <img class="imgPt" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="10" height="10" alt="">
                </div>
              </div>

            </div>
          </div>

          <div class="div-table-row">
            <div class="div-table-col-coadmin" align="center">LEADER</div>
            <div class="div-table-col-field-coadmin">

              <div class="valign-wrapper" style="display: flex; justify-content: space-between; padding: 0 0.6em;">
                <div>
                  <input type="text" readonly class="inputLeader" data-trigg="inputCoadmin" placeholder="none">
                  <input type="hidden" name="triggerSorting" class="triggerLeader" value="">
                </div>
                <div id="fieldLeader">
                  <img class="imgLeader" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="10" height="10" alt="">
                </div>
              </div>

            </div>

          </div>

          <div class="div-table-row">

            <div class="div-table-col-button" id="apply" align="center">
              <p class="pApply">apply</p>
            </div>
            <div class="div-table-col-button" id="reset" align="center">
              <p class="pReset">reset</p>
            </div>
            <div class="div-table-col-button-cancel" id="cancel" onclick="cancelSorting()" align="center">
              <p class="pCancel">cancel</p>
            </div>

          </div>

        </div>

      </div>
    </div>

  </div>
</div>

<div id="tableCoadmin" style="display: none;">

  <div class="tippy-box">

    <div class="card" style="border-top-right-radius: 1.4em; border-top-left-radius: 1.4em;  box-shadow: none; max-height: 20em; background-color: #fff;">
      <div class="card-content" style="padding-left: 1em; padding-right: 1em; padding-bottom: 0; padding-top: 0;">
        <table id="tblList">
          <thead style="display: table; width: 100%; table-layout: fixed;">
            <tr>
              <th style=" color: #dadad9; font-size: 0.7em; padding: 0; padding-bottom: 0.7em;">
                <div class="divCoadminView">
                  <input type="text" data-trigg="searchCoadminView" placeholder="Search Crew Name..." class="searchCoadminView" id="inputCoadmin">
                  <i class="fa fa-search" style="margin-top: 0.5em;"></i>
                </div>
              </th>
            </tr>
          </thead>
          <tbody style="display: block; height: 15em; width: 100%; overflow: auto;" class="targetCoadminView">
            <!-- <tr class="trCoadmin" style="border: none;">
                    <td style=" color: #5f5e5e; font-weight: 600; font-size: 0.8em; width: 17em; padding: 1.5em 0;">Ilham Meru Gumilang</td>
                    <td style=" color: #8d8d8d; font-size: 0.8em; font-weight: 400; text-align: right; width: 10em;">Ansena</td>
                    <td class="iconCoadmin" style=" color: #40a1f8; font-size: 0.7em; text-align: right; width: 2em; opacity: 1;"><img src="<?= base_url(); ?>assets/images/radiounchecked.png" width="15" height="15"></td>
                    <td hidden><input name="targetIdCoadmin"></td>
                  </tr> -->
          </tbody>
        </table>
      </div>
    </div>

  </div>

</div>

<div id="tablePt" style="display: none;">

  <div class="tippy-box">

    <div class="card" style="border-top-right-radius: 1.4em; border-top-left-radius: 1.4em;  box-shadow: none; max-height: 20em; background-color: #fff;">
      <div class="card-content" style="padding-left: 1em; padding-right: 1em; padding-bottom: 0; padding-top: 0;">
        <table id="tblList">
          <thead style="display: table; width: 100%; table-layout: fixed;">
            <tr>
              <th style=" color: #dadad9; font-size: 0.7em; padding: 0; padding-bottom: 0.7em;">
                <div class="divCoadminView">
                  <input type="text" data-trigg="searchCoadminView" placeholder="Search PT..." class="searchPt" id="searchPt">
                  <i class="fa fa-search" style="margin-top: 0.5em;"></i>
                </div>
              </th>
            </tr>
          </thead>
          <tbody style="display: block; height: 15em; width: 100%; overflow: auto;" class="targetPtView">
          </tbody>
        </table>
      </div>
    </div>

  </div>

</div>

<div id="tableLeader" style="display: none;">

  <div class="tippy-box">

    <div class="card" style="border-top-right-radius: 1.4em; border-top-left-radius: 1.4em;  box-shadow: none; max-height: 20em; background-color: #fff;">
      <div class="card-content" style="padding-left: 1em; padding-right: 1em; padding-bottom: 0; padding-top: 0;">
        <table id="tblList">
          <thead style="display: table; width: 100%; table-layout: fixed;">
            <tr>
              <th style=" color: #dadad9; font-size: 0.7em; padding: 0; padding-bottom: 0.7em;">
                <div class="divCoadminView">
                  <input type="text" data-trigg="searchCoadminView" placeholder="Search Crew Name..." class="searchLeader" id="inputLeader">
                  <i class="fa fa-search" style="margin-top: 0.5em;"></i>
                </div>
              </th>
            </tr>
          </thead>
          <tbody style="display: block; height: 15em; width: 100%; overflow: auto;" class="targetLeaderView">
            <!-- <tr class="trCoadmin" style="border: none;">
                    <td style=" color: #5f5e5e; font-weight: 600; font-size: 0.8em; width: 17em; padding: 1.5em 0;">Ilham Meru Gumilang</td>
                    <td style=" color: #8d8d8d; font-size: 0.8em; font-weight: 400; text-align: right; width: 10em;">Ansena</td>
                    <td class="iconCoadmin" style=" color: #40a1f8; font-size: 0.7em; text-align: right; width: 2em; opacity: 1;"><img src="<?= base_url(); ?>assets/images/radiounchecked.png" width="15" height="15"></td>
                    <td hidden><input name="targetIdCoadmin"></td>
                  </tr> -->
          </tbody>
        </table>
      </div>
    </div>

  </div>

</div>

<div class="row rowSearch" style="padding-top: 0; margin-bottom: 2em; padding-left: 1em; padding-right: 1em; margin-top: 6.5em; transition: ease .5s;">
  <div class="col s12">
    <div class="searchViewJob">
      <input type="text" data-trigg="searchViewJob" placeholder="Search" class="inputViewJob" id="inputViewJob">
      <i id="fa-searchView" class="fa fa-search" style="margin-top: 0.5em;"></i>
    </div>
  </div>
</div>

<!------------------------- collpase -------------------------->

<div class="row valign-wrapper" style="padding: 0 1em; margin-bottom: 0.5em;">
  <div class="col s12 m6 offset-m3">
    <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none;">
      <div class="card-content" style="padding: 0.3em 0.4em; margin: 0; background-color: #f2f1f6;">
        <ul class="collapsible collapseActiveJob helperActiveJob" style="box-shadow: none; border: none; margin: 0; background-color: #f2f1f6;">
          <li>
            <div class="collapsible-header" style="border: none !important; display: flex; justify-content: space-between; background-color: #f2f1f6; padding: 0 0.7em;">
              <div class="valign-wrapper">
                <span class="titleViewJob" style="margin-left: 0; color: #a7a7a8;">Active Job Groups</span>
              </div>
              <div class="valign-wrapper" style="text-align: right;">
                <div id="arrowActiveJob">
                  <img class="arrowActiveJob" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                </div>
              </div>
            </div>
            <div class="collapsible-body collapseDetailActive">

              <ul class="collapsible collapseItemActive" style="box-shadow: none; border: none; margin: 1em 0;">

              </ul>
            </div>
          </li>
        </ul>


        <ul class="collapsible collapseInactiveJob helperInactiveJob" style="box-shadow: none; border: none; margin: 2em 0; background-color: #f2f1f6;">
          <li>
            <div class="collapsible-header" style="border: none !important; display: flex; justify-content: space-between; background-color: #f2f1f6; padding: 0 0.7em;">
              <div class="valign-wrapper">
                <span class="titleViewJob" style="margin-left: 0; color: #a7a7a8;">Inactive Job Groups</span>
              </div>
              <div class="valign-wrapper" style="text-align: right;">
                <div id="arrowInactiveJob">
                  <img class="arrowInactiveJob" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                </div>
              </div>
            </div>
            <div class="collapsible-body collapseDetailInactive">

              <ul class="collapsible collapseItemInactive" style="box-shadow: none; border: none; margin: 1em 0;">

              </ul>
            </div>
          </li>
        </ul>


        <ul class="collapsible collapseDeactivateJob helperCollapseDeactivate" style="box-shadow: none; border: none; margin: 2em 0; background-color: #f2f1f6;">
          <li>
            <div class="collapsible-header" style="border: none !important; display: flex; justify-content: space-between; background-color: #f2f1f6; padding: 0 0.7em;">
              <div class="valign-wrapper">
                <span class="titleViewJob" style="margin-left: 0; color: #a7a7a8;">Deactivate Job Groups</span>
              </div>
              <div class="valign-wrapper" style="text-align: right;">
                <div id="arrowDeactivateJob">
                  <img class="arrowDeactivateJob" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                </div>
              </div>
            </div>
            <div class="collapsible-body collapseDetailActive">

              <ul class="collapsible collapseItemDeactivate" style="box-shadow: none; border: none; margin: 1em 0;">

              </ul>
            </div>
          </li>
        </ul>

      </div>
      </li>
      </ul>
    </div>
  </div>
</div>
</div>

<!------------------------- collpase -------------------------->

<script>
  $(document).ready(function() {
    collapseActiveJob();
    collapseInactiveJob();
    collapseDeactivateJob();
    // getDeactivateJob();
    getInactiveJob();
    // getActiveJob();

    $('.fullSort').click(function(e) {
      e.preventDefault();

      $('.rowSorting').css({
        "display": "block",
        "top": "7.5em"
      });

      $('.rowSearch').css({
        "margin-top": "33em"
      });
    })

    $('.allSort').click(function(e) {
      e.preventDefault();

      //remove class onShort (active)
      $('.allSort').removeClass('onSort');
      $('.activeSort').removeClass('onSort');
      $('.inactiveSort').removeClass('onSort');
      $('.deactiveSort').removeClass('onSort');

      //change some css
      $('.activeSort').css({
        "color": "#fff"
      });
      $('.inactiveSort').css({
        "color": "#fff"
      });
      $('.deactiveSort').css({
        "color": "#fff"
      });

      // add class sort (active)
      $(this).addClass('onSort');
      $(this).css({
        "color": "#d7d7db"
      });

      //change button
      showButton();

      //add value
      $('.activitySort').val(10);
      $('.triggerActivity').val(1);

    })

    $('.activeSort').click(function(e) {
      e.preventDefault();

      //remove class on sort (active)
      $('.allSort').removeClass('onSort');
      $('.activeSort').removeClass('onSort');
      $('.inactiveSort').removeClass('onSort');
      $('.deactiveSort').removeClass('onSort');

      //change some css
      $('.allSort').css({
        "color": "#fff"
      });
      $('.inactiveSort').css({
        "color": "#fff"
      });
      $('.deactiveSort').css({
        "color": "#fff"
      });

      //add class on short (active)
      $(this).addClass('onSort');
      $(this).css({
        "color": "#d7d7db"
      });

      //add value
      $('.activitySort').val(1);
      $('.triggerActivity').val(1);

      //change button
      showButton();

    })

    $('.inactiveSort').click(function(e) {
      e.preventDefault();

      //remove class on short (active)
      $('.allSort').removeClass('onSort');
      $('.activeSort').removeClass('onSort');
      $('.inactiveSort').removeClass('onSort');
      $('.deactiveSort').removeClass('onSort');

      //change some css
      $('.allSort').css({
        "color": "#fff"
      });
      $('.activeSort').css({
        "color": "#fff"
      });
      $('.deactiveSort').css({
        "color": "#fff"
      });

      //add class on short (active)
      $(this).addClass('onSort');
      $(this).css({
        "color": "#d7d7db"
      });

      //add value
      $('.activitySort').val(0);
      $('.triggerActivity').val(1);

      //change button
      showButton();

    })

    $('.deactiveSort').click(function(e) {
      e.preventDefault();

      //remove class on short (active)
      $('.allSort').removeClass('onSort');
      $('.activeSort').removeClass('onSort');
      $('.inactiveSort').removeClass('onSort');
      $('.deactiveSort').removeClass('onSort');

      //change some css
      $('.allSort').css({
        "color": "#fff"
      });
      $('.inactiveSort').css({
        "color": "#fff"
      });
      $('.activeSort').css({
        "color": "#fff"
      });

      //add class on short (active)
      $(this).addClass('onSort');
      $(this).css({
        "color": "#d7d7db"
      });

      //add value
      $('.activitySort').val(13);
      $('.triggerActivity').val(1);

      //change button
      showButton();

    })

    $('.div-table-col-all-subjob').click(function(e) {
      e.preventDefault();

      //remove class on subjob (active) and change some css
      $('.activeTitle').removeClass('onSubjob');
      $('.activeTitle').css({
        "color": "#fff"
      });

      //first, remove all value
      $('.inputSubjobSort').val('');
      $('.triggerAllinSubjob').val('');

      //add class on subjob (active) and change some css
      $('.allTitle').addClass('onSubjob');
      $('.allTitle').css({
        "color": "#d7d7db"
      });

      //input value to input field and trigger
      $('.inputSubjobSort').val(100);
      $('.triggerAllinSubjob').val(1);

      //change button
      showButton();

    });

    $('.div-table-col-active-subjob').click(function(e) {
      e.preventDefault();

      //remove class on subjob (active) and change some css
      $('.allTitle').removeClass('onSubjob');
      $('.allTitle').css({
        "color": "#fff"
      });

      //first, remove all value
      $('.inputSubjobSort').val('');
      $('.triggerAllinSubjob').val('');

      //add class on subjob (active) and change some css
      $('.activeTitle').addClass('onSubjob');
      $('.activeTitle').css({
        "color": "#d7d7db"
      });

      //input value to input field and trigger
      $('.inputSubjobSort').val(1);
      $('.triggerAllinSubjob').val(1);

      //change button
      showButton();

    })

    $('.minDatepicker').datepicker({
      onOpen: function() {
        //add class to rotate and remove style->animation
        $('.imgMinDeadline').addClass('rtr');
        $('.modal.datepicker-modal.open').removeAttr('style');

        //clear triiger first
        $('.triggerMinDeadline').val('');

      },
      //if select the date, fill the input field
      onSelect: function(time) {
        var newDate = new Date(time);
        var year = newDate.getFullYear();
        var month = addZero(newDate.getMonth() + 1);
        var days = addZero(newDate.getDate());

        $('.triggerMinDeadline').val(1);
      },
      onClose: function() {
        $('.modal.datepicker-modal.open').removeAttr('style');

        //remove animation
        $('.imgMinDeadline').removeClass('rtr');

        //get the value
        var maxDate = $('#maxDatepicker').val();
        var minDate = $('.minDatepicker').val();

        //condition
        if (minDate == '' && maxDate == '') {

          var minDateFix = 0;
          var maxDateFix = 0;

          $('.triggerMinDeadline').val('');
          $('.triggerMaxDeadline').val('');

        } else if (minDate != '' && maxDate == '') {

          var minDateFix = minDate;
          var maxDateFix = 0;

          $('.triggerMinDeadline').val(1);
          $('.triggetMaxDeadline').val('');

        } else if (minDate == '' && maxDate != '') {

          var minDateFix = 0;
          var maxDateFix = maxDate;

          $('.triggetMinDeadline').val('');
          $('.triggerMaxDeadline').val(1);

        } else if (minDate != '' && maxDate != '') {

          var minDateFix = minDate;
          var maxDateFix = maxDate;

          $('.triggetMinDeadline').val(1);
          $('.triggerMaxDeadline').val(1);

        }

        //change button
        showButton();

        //validation deadline
        $.ajax({
          type: 'POST',
          data: {
            maxDate: maxDateFix,
            minDate: minDateFix
          },
          url: '<?= base_url('jzl/MobileJobView/checkSortingDeadline'); ?>',
          dataType: 'json',
          success: function(result) {
            if (result.message == 'failed') {

              swal('Failed', 'The final date should not be smaller than the initial date', 'warning', {
                buttons: false,
                timer: 1500
              });

              $('.minDatepicker').val('');
              $('#maxDatepicker').val('');
              $('.triggerMinDeadline').val('');
              $('.triggerMaxDeadline').val('');

            }
          }
        })

      },
      autoClose: true,
      format: 'dd mmm yyyy'
    });

    $('#maxDatepicker').datepicker({
      onOpen: function() {
        $('.imgMaxDeadline').addClass('rtr');
        $('.modal.datepicker-modal.open').removeAttr('style');

        //clear trigger first
        $('.triggerMaxDeadline').val('');

      },
      onSelect: function(time) {
        var newDate = new Date(time);
        var year = newDate.getFullYear();
        var month = addZero(newDate.getMonth() + 1);
        var days = addZero(newDate.getDate());

        //add value
        $('.triggerMaxDeadline').val(1);
      },
      onClose: function() {
        $('.modal.datepicker-modal.open').removeAttr('style');

        //remove animation
        $('.imgMaxDeadline').removeClass('rtr');

        var maxDate = $('#maxDatepicker').val();
        var minDate = $('.minDatepicker').val();

        //condition
        if (minDate == '' && maxDate == '') {

          var minDateFix = 0;
          var maxDateFix = 0;

          $('.triggerMinDeadline').val('');
          $('.triggerMaxDeadline').val('');

        } else if (minDate != '' && maxDate == '') {

          var minDateFix = minDate;
          var maxDateFix = 0;

          $('.triggerMinDeadline').val(1);
          $('.triggetMaxDeadline').val('');

        } else if (minDate == '' && maxDate != '') {

          var minDateFix = 0;
          var maxDateFix = maxDate;

          $('.triggetMinDeadline').val('');
          $('.triggerMaxDeadline').val(1);

        } else if (minDate != '' && maxDate != '') {

          var minDateFix = minDate;
          var maxDateFix = maxDate;

          $('.triggetMinDeadline').val(1);
          $('.triggerMaxDeadline').val(1);

        }

        showButton();

        $.ajax({
          type: 'POST',
          data: {
            maxDate: maxDateFix,
            minDate: minDateFix
          },
          url: '<?= base_url('jzl/MobileJobView/checkSortingDeadline'); ?>',
          dataType: 'json',
          success: function(result) {
            if (result.message == 'failed') {

              swal('Failed', 'The final date should not be smaller than the initial date', 'warning', {
                buttons: false,
                timer: 1500
              })

              $('.minDatepicker').val('');
              $('#maxDatepicker').val('');
              $('.triggerMinDeadline').val('');
              $('.triggerMaxDeadline').val('');

            }
          }
        })
      },
      autoClose: true,
      format: 'dd mmm yyyy'
    });

    $('#popoverSort').fu_popover({
      content: [
        '<div style="display: flex; justify-content: space-between; padding: 0 0.5em; margin-bottom: 0.8em;" onclick="sortData(1)">' +
        '<div><span style="font-size: 1em; color: #929292; font-weight: 800;">Name</span></div>' +
        '<div><img src="<?= base_url(); ?>/assets/images/downarrowcustom.png" height="10" width="10"></div>' +
        '</div>' +
        '<div class="borderPopover"></div>' +
        '<div style="display: flex; justify-content: space-between; padding: 0 0.5em; margin-bottom: 0.8em;" onclick="sortData(2)">' +
        '<div><span style="font-size: 1em; color: #929292; font-weight: 800;">Date Created</span></div>' +
        // '<div><img src="<?= base_url(); ?>/assets/images/downarrowcustom.png" height="10" width="10"></div>' +
        '</div>' +
        '<div class="borderPopover"></div>' +
        '<div style="display: flex; justify-content: space-between; padding: 0 0.5em; margin-bottom: 0.8em;" onclick="sortData(3)">' +
        '<div><span style="font-size: 1em; color: #929292; font-weight: 800;">Number of Crews</span></div>' +
        // '<div><img src="<?= base_url(); ?>/assets/images/downarrowcustom.png" height="10" width="10"></div>' +
        '</div>' +
        '<div class="borderPopover"></div>' +
        '<div style="display: flex; justify-content: space-between; padding: 0 0.5em; margin-bottom: 0.8em;" onclick="sortData(4)">' +
        '<div><span style="font-size: 1em; color: #929292; font-weight: 800;">Number of Sub Jobs</span></div>' +
        // '<div><img src="<?= base_url(); ?>/assets/images/downarrowcustom.png" height="10" width="10"></div>' +
        '</div>' +
        '<div class="borderPopover"></div>' +
        '<div style="display: flex; justify-content: space-between; padding: 0 0.5em; margin-bottom: 0.8em;" onclick="sortData(5)">' +
        '<div><span style="font-size: 1em; color: #929292; font-weight: 800;">Upcoming Deadline</span></div>' +
        // '<div><img src="<?= base_url(); ?>/assets/images/downarrowcustom.png" height="10" width="10"></div>' +
        '</div>'

      ],
      placement: "bottom",
      dismissable: true
    });

    const templateCoadmin = document.getElementById('tableCoadmin');

    tippy('#fieldCoadmin', {
      content: templateCoadmin.innerHTML,
      allowHTML: true,
      trigger: 'click',
      placement: 'bottom',
      interactive: true,
      onShow(instance) {
        $('.imgCoadmin').addClass('rtr');

        showButton();

        $.ajax({
          type: "POST",
          url: '<?= base_url('jzl/MobileJobView/getCrew'); ?>',
          dataType: 'json',
          success: function(result) {

            var currentCoadmin = removeDuplicate($('input[name="inputSortingCoadmin"]').map(function() {
              return $(this).val()
            }).toArray().filter(function(e) {
              return e != null && e != '';
            }));

            var val = '';

            var tr = '';
            for (var i = 0; i < result.crew.length; i++) {
              if (currentCoadmin[0] == result.id[i]) {
                var td = '<td class="radioCoadminView" data-id-coadmin-view="' + result.id[i] + '" data-id-form-coadmin="' + i + '" id="c' + result.id[i] + '" style=" color: #40a1f8; font-size: 0.7em; text-align: right; width: 2em; opacity: 1;"><img src="<?= base_url(); ?>assets/images/radiochecked.png" width="15" height="15"></td>';
                var val = currentCoadmin[0];

              } else {
                var td = '<td class="radioCoadminView" data-id-coadmin-view="' + result.id[i] + '" data-id-form-coadmin="' + i + '" id="c' + result.id[i] + '" style=" color: #40a1f8; font-size: 0.7em; text-align: right; width: 2em; opacity: 1;"><img src="<?= base_url(); ?>assets/images/radiounchecked.png" width="15" height="15"></td>';
                var val = '';
              }

              var name = "'" + result.crew[i] + "'";
              tr += '<tr data-tr="tr' + result.id[i] + '"  class="trCoadminView" id="' + result.id[i] + '" onclick="chooseCoadmin(' + i + ', ' + result.id[i] + ', ' + name + ')" style="border: none;">' +
                '<td data-id-table="tbl' + result.id[i] + '" style="color: #5f5e5e; font-weight: 600; font-size: 0.8em; width: 17em;">' + result.crew[i] + '</td>' +
                '<td data-id-table="tbl' + result.id[i] + '" style=" color: #8d8d8d; font-size: 0.8em; font-weight: 400; text-align: right; width: 10em;">' + result.pt[i] + '</td>' +
                td +
                '<td hidden><input name="inputSortingCoadmin" id="inputSortingCoadmin" class="inputSortingCoadmin' + result.id[i] + '" value="' + val + '"></td>' +
                '</tr>';
            }

            $('.targetCoadminView').html(tr);

            $('.searchCoadminView').on("keyup", function() {
              var value = $(this).val().toLowerCase();
              $('#tblList tr.trCoadminView').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
              })
            });

          }
        })
      },
      onHidden(instance) {
        $('.imgCoadmin').removeClass('rtr');
      }
    });

    const templatePt = document.getElementById('tablePt');

    tippy('#fieldPt', {
      content: templatePt.innerHTML,
      allowHTML: true,
      trigger: 'click',
      placement: 'bottom',
      interactive: true,
      onShow(instance) {
        $('.imgPt').addClass('rtr');

        showButton();

        $.ajax({
          type: 'POST',
          url: '<?= base_url('jzl/MobileJobView/getPt'); ?>',
          dataType: 'json',
          success: function(result) {
            var currentPt = $('.targetPt').map(function() {
              return $(this).val();
            }).toArray().filter(function(e) {
              return e != null && e != '';
            });

            var tr = '';
            for (var i = 0; i < result.pt.length; i++) {

              tr += '<tr class="trPt" style="border: none;" onclick="choosePt(' + result.id[i] + ', ' + i + ')">' +
                '<td style=" color: #5f5e5e; font-weight: 600; font-size: 0.8em; width: 17em; padding: 1.5em 0;">' + result.pt[i] + '</td>' +
                '<td class="iconPt" id="iconPt' + i + '" data-img="' + result.id[i] + '" style=" color: #40a1f8; font-size: 0.7em; text-align: right; width: 2em; opacity: 0;"><i class="fas fa-check"></i></td>' +
                '<td hidden><input name="targetPt" class="targetPt" data-input-pt="' + result.id[i] + '" id="targetPt' + i + '"></td>' +
                '</tr>';
            }

            $('.targetPtView').html(tr);
            for (var x = 0; x < currentPt.length; x++) {
              if (currentPt.length > 0) {
                $('td[data-img="' + currentPt[x] + '"]').css({
                  "opacity": "1"
                });
                $('input[data-input-pt="' + currentPt[x] + '"]').val(currentPt[x]);
              }
            }

            $('.searchPt').on("keyup", function() {
              var value = $(this).val().toLowerCase();
              $('#tblList tr.trPt').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
              })
            });
          }
        })
      },
      onHidden(instance) {
        $('.imgPt').removeClass('rtr');
      }
    });

    const templateLeader = document.getElementById('tableLeader');

    tippy('#fieldLeader', {
      content: templateLeader.innerHTML,
      allowHTML: true,
      trigger: 'click',
      placement: 'bottom',
      interactive: true,
      onShow(instance) {
        $('.imgLeader').addClass('rtr');

        showButton();

        $.ajax({
          type: "POST",
          url: '<?= base_url('jzl/MobileJobView/getCrew'); ?>',
          dataType: 'json',
          success: function(result) {

            var currentLeader = removeDuplicate($('input[name="inputSortingLeader"]').map(function() {
              return $(this).val()
            }).toArray().filter(function(e) {
              return e != null && e != '';
            }));

            var val = '';
            var tr = '';
            for (var i = 0; i < result.crew.length; i++) {
              if (currentLeader[0] == result.id[i]) {
                var td = '<td class="radioLeaderView" data-id-leader-view="' + result.id[i] + '" data-id-form-leader="' + i + '" id="c' + result.id[i] + '" style=" color: #40a1f8; font-size: 0.7em; text-align: right; width: 2em; opacity: 1;"><img src="<?= base_url(); ?>assets/images/radiochecked.png" width="15" height="15"></td>';
                var val = currentLeader[0];
              } else {
                var td = '<td class="radioLeaderView" data-id-leader-view="' + result.id[i] + '" data-id-form-leader="' + i + '" id="c' + result.id[i] + '" style=" color: #40a1f8; font-size: 0.7em; text-align: right; width: 2em; opacity: 1;"><img src="<?= base_url(); ?>assets/images/radiounchecked.png" width="15" height="15"></td>';
                var val = '';
              }

              var name = "'" + result.crew[i] + "'";
              tr += '<tr data-tr="tr' + result.id[i] + '"  class="trLeader" id="' + result.id[i] + '" onclick="chooseLeaderSorting(' + i + ', ' + result.id[i] + ', ' + name + ')" style="border: none;">' +
                '<td data-id-table="tbl' + result.id[i] + '" style="color: #5f5e5e; font-weight: 600; font-size: 0.8em; width: 17em;">' + result.crew[i] + '</td>' +
                '<td data-id-table="tbl' + result.id[i] + '" style=" color: #8d8d8d; font-size: 0.8em; font-weight: 400; text-align: right; width: 10em;">' + result.pt[i] + '</td>' +
                td +
                '<td hidden><input name="inputSortingLeader" class="inputSortingLeader' + result.id[i] + '" value="' + val + '"></td>' +
                '</tr>';
            }

            $('.targetLeaderView').html(tr);

            $('.searchLeader').on("keyup", function() {
              var value = $(this).val().toLowerCase();
              $('#tblList tr.trLeader').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
              })
            });

          }
        })
      },
      onHidden(instance) {
        $('.imgLeader').removeClass('rtr');
      }
    });

  })

  function applySort() {
    //get value
    var activity = $('.activitySort').val();
    var subjobSort = $('.inputSubjobSort').val();
    var minSubjob = $('.minSubjob').val();
    var maxSubjob = $('.maxSubjob').val();
    var minDeadline = $('.minDatepicker').val();
    var maxDeadline = $('.maxDatepicker').val();
    var coadmin = $('input[name="inputSortingCoadmin"]').map(function() {
      return $(this).val();
    }).toArray().filter(function(e) {
      return e != '' && e != null;
    });
    var minCrew = $('.minCrew').val();
    var maxCrew = $('.maxCrew').val();

    var ptHelp = $('.inputPt').val();
    if (ptHelp != '') {

      var pt = $('.targetPt').map(function() {
        return $(this).val();
      }).toArray().filter(function(e) {
        return e != '' && e != null;
      });

    } else {
      var pt = [];
    }

    var leader = $('input[name="inputSortingLeader"]').map(function() {
      return $(this).val();
    }).toArray().filter(function(e) {
      return e != '' && e != null;
    });

    //get the trigger input
    var trigger = $('input[name="triggerSorting"]').map(function() {
      return $(this).val();
    }).toArray();

    $.ajax({
      type: 'POST',
      data: {
        activity: activity,
        subjobSort: subjobSort,
        minSubjob: minSubjob,
        maxSubjob: maxSubjob,
        minDeadline: minDeadline,
        maxDeadline: maxDeadline,
        coadmin: coadmin,
        minCrew: minCrew,
        maxCrew: maxCrew,
        pt: pt.length,
        leader: leader,
        trigger: trigger,
        realPt: pt
      },
      url: '<?= base_url('jzl/MobileJobView/sortingData'); ?>',
      dataType: 'text',
      success: function(result) {
        getActiveJob(result);
        getDeactivateJob(result);
      }
    })

    //button modify
    $(this).css({
      "background": "#6ab7fa"
    });
    $('.pApply').css({
      "color": "#fff"
    });

    setTimeout(function() {
      $('#apply').css({
        "background": "#fff"
      });
      $('.pApply').css({
        "color": "#6ab7fa"
      });
    }, 150);
  }

  function applyCancel() {
    // activity row
    $('.allSort').removeClass('onSort');
    $('.allSort').css({
      "color": "#fff",
      "border-radius": "1.2em"
    });
    $('.activeSort').removeClass('onSort');
    $('.activeSort').css({
      "color": "#fff",
      "border-radius": "1.2em"
    });
    $('.inactiveSort').removeClass('onSort');
    $('.inactiveSort').css({
      "color": "#fff",
      "border-radius": "1.2em"
    });
    $('.deactiveSort').removeClass('onSort');
    $('.deactiveSort').css({
      "color": "#fff",
      "border-radius": "1.2em"
    });
    $('.activitySort').val('');

    // subjob row
    $('.allTitle').removeClass('onSubjob');
    $('.allTitle').css({
      "color": "#fff"
    });
    $('.activeTitle').removeClass('onSubjob');
    $('.activeTitle').css({
      "color": "#fff"
    });
    $('.inputSubjobSort').val('');

    $('.minSubjob').val('');
    $('.maxSubjob').val('');

    //deadline row
    $('.minDatepicker').val('');
    $('.maxDatepicker').val('');
    $('.triggerMinDealine').val('');
    $('.triggerMaxDeadline').val('');

    //coadmin row
    $('.inputCoadmin').val('');
    $('input[name="inputSortingCoadmin"]').val('');

    //crew row
    $('.minCrew').val('');
    $('.maxCrew').val('');
    $('.inputPt').val('');

    //leader row
    $('.inputLeader').val('');
    $('input[name="inputSortingLeader"]').val('');

    //field input trigger
    $('input[name="triggerSorting"]').val('');


    showButton();
    getActiveJob();
    getDeactivateJob();
  }

  function chooseLeaderSorting(idForm, idLeader, name) {
    //add to input field
    $('input[name="inputSortingLeader"]').val('');
    $('.triggerLeader').val('');
    $('.inputSortingLeader' + idLeader).val(idLeader);
    $('.triggerLeader').val(1);

    //modify checked button
    var radioCheck = '<img src="<?= base_url(); ?>/assets/images/radiochecked.png" width="15" height="15" alt="" />'
    var radioUncheck = '<img src="<?= base_url(); ?>/assets/images/radiounchecked.png" width="15" height="15" alt="" />'

    $('.radioLeaderView').html(radioUncheck);
    $('td[data-id-leader-view="' + idLeader + '"]').html(radioCheck);

    //change span
    $('.inputLeader').val(name);

    //change button
    showButton();

  }

  function choosePt(idPt, idForm) {
    //change opacity
    var check = $('td[id="iconPt' + idForm + '"]');

    if (check.css('opacity') == 0) {

      check.css({
        "opacity": "1"
      });

      //add value
      $('input[id="targetPt' + idForm + '"]').val(idPt);

    } else {

      check.css({
        "opacity": "0"
      });

      //clear value
      $('input[id="targetPt' + idForm + '"]').val('');
    }

    //change span
    var pt = $('.targetPt').map(function() {
      return $(this).val();
    }).toArray().filter(function(e) {
      return e != null && e != '';
    });

    var newPt = removeDuplicate(pt);

    if (newPt.length == 1) {

      $('.inputPt').val(newPt.length + ' PT');
      $('.triggerPt').val(1);

    } else if (newPt.length > 1) {

      $('.inputPt').val(newPt.length + ' PTs');
      $('.triggerPt').val(1);

    } else {

      $('.inputPt').val('');
      $('.triggerPt').val('');

    }

    showButton();

  }

  function removeDuplicate(data) {
    return data.filter((value, index) => data.indexOf(value) === index);
  }

  function chooseCoadmin(idForm, idCoadmin, name) {
    //clear all radio checked
    var radioCheck = '<img src="<?= base_url(); ?>/assets/images/radiochecked.png" width="15" height="15" alt="" />'
    var radioUncheck = '<img src="<?= base_url(); ?>/assets/images/radiounchecked.png" width="15" height="15" alt="" />'

    $('.radioCoadminView').html(radioUncheck);
    $('td[data-id-coadmin-view="' + idCoadmin + '"]').html(radioCheck);

    //add some value
    $('input[name="inputSortingCoadmin"]').val('');
    $('input[class="inputSortingCoadmin' + idCoadmin + '"]').val(idCoadmin);
    $('.triggerCoadmin').val(1);

    //add name to span
    $('.inputCoadmin').val(name);

    //change button
    showButton();
  }

  function closeModalViewJob() {
    $('#modalViewJob').modal('close');
  }

  function collapseActiveJob() {
    $('.collapseActiveJob').collapsible({
      onOpenStart: function() {
        $('.arrowActiveJob').addClass('rtr');
        getActiveJob();
      },
      onOpenEnd: function() {
        collapseItemActive();
      },
      onCloseStart: function() {
        $('.arrowActiveJob').removeClass('rtr');
      }
    });
  }

  function collapseInactiveJob() {
    $('.collapseInactiveJob').collapsible({
      onOpenStart: function() {
        $('.arrowInactiveJob').addClass('rtr');
        getInactiveJob();
      },
      onOpenEnd: function() {
        collapseItemInactive();
      },
      onCloseStart: function() {
        $('.arrowInactiveJob').removeClass('rtr');
      }
    })
  }

  function collapseDeactivateJob() {
    $('.collapseDeactivateJob').collapsible({
      onOpenStart: function() {
        $('.arrowDeactivateJob').addClass('rtr');
      },
      onOpenEnd: function() {
        getDeactivateJob();
        collapseItemDeactivate();
      },
      onCloseStart: function() {
        $('.arrowDeactivateJob').removeClass('rtr');
      }
    });
  }

  function collapseItemActive(idForm) {
    $('.collapseItemActive').collapsible({
      onOpenStart: function() {
        var id = $('.headerItemActive').attr('data-header-id');

        $('.arrowItemActive' + idForm).addClass('rtr');

        $('div[data-header-id="' + idForm + '"]').css({
          "border-top-left-radius": "1.2em",
          "border-top-right-radius": "1.2em",
          "border-bottom-left-radius": "0",
          "border-bottom-right-radius": "0"
        })
      },
      onCloseStart: function() {
        $('.arrowItemActive' + idForm).removeClass('rtr');

        $('.headerItemActive').css({
          "border-radius": "1.2em"
        })
      }
    });
  }

  function collapseItemInactive(idForm) {
    $('.collapseItemInactive').collapsible({
      onOpenStart: function() {
        var id = $('.headerItemInactive').attr('data-header-inactive-id');

        $('.arrowItemInactive' + idForm).addClass('rtr');

        $('div[data-header-inactive-id="' + idForm + '"]').css({
          "border-top-left-radius": "1.2em",
          "border-top-right-radius": "1.2em",
          "border-bottom-left-radius": "0",
          "border-bottom-right-radius": "0"
        })
      },
      onCloseStart: function() {
        var id = $('.headerItemInactive').attr('data-header-inactive-id');

        $('.arrowItemInactive' + idForm).removeClass('rtr');

        $('.headerItemInactive').css({
          "border-radius": "1.2em"
        })
      }
    });
  }

  function collapseItemDeactivate(idForm) {
    $('.collapseItemDeactivate').collapsible({
      onOpenStart: function() {
        var id = $('.headerItemActive').attr('data-header-id');

        $('.arrowItemActive' + idForm).addClass('rtr');

        $('div[data-header-id="' + idForm + '"]').css({
          "border-top-left-radius": "1.2em",
          "border-top-right-radius": "1.2em",
          "border-bottom-left-radius": "0",
          "border-bottom-right-radius": "0"
        })
      },
      onCloseStart: function() {
        $('.arrowItemActive' + idForm).removeClass('rtr');

        $('.headerItemActive').css({
          "border-radius": "1.2em"
        })
      }
    });
  }

  function collapseDeactivate(idForm) {
    $('.collapseDeactivate' + idForm).collapsible({
      onOpenStart: function() {
        $('.arrowDeactivate').addClass('rtr');
        $('.headerDeactivate').css({
          "background-color": "#f2f2f7",
          "border-bottom-left-radius": "0",
          "border-bottom-right-radius": "0",
          "border": "none"
        });
        $('.bodyDeactivate').css({
          "background-color": "#f2f2f7",
          "border-bottom-left-radius": "1.2em",
          "border-bottom-right-radius": "1.2em"
        });
        $('.titleDeactivate').css({
          "color": "red"
        });
      },
      onCloseStart: function() {
        $('.arrowDeactivate').removeClass('rtr');
        $('.headerDeactivate').css({
          "background-color": "#db3b26",
          "border-radius": "1.2em"
        });
        $('.titleDeactivate').css({
          "color": "#fff"
        });
      }
    })
  }

  function sortData(key) {
    getActiveJob(key);
    getDeactivateJob(key);
  }

  function getActiveJob(sort = '') {
    $.ajax({
      type: "POST",
      data: {
        sort: sort
      },
      url: '<?= base_url('jzl/MobileJobView/getActiveJob'); ?>',
      dataType: 'json',
      success: function(result) {

        var isCoadmin = '<?= $_SESSION['isCoadmin']; ?>';

        if (result.result > 0) {
          var item = '';
          for (var i = 0; i < result.result; i++) {

            if (result.deadline[i] == 'No deadline') {
              var deadlineFix = 'No deadline';
            } else {
              var deadlineFix = 'Until ' + result.deadline[i];
            }

            if (isCoadmin == 1) {

              var customStyle = 'background-color: var(--light-gray);';

            }

            item += '<li onclick="collapseItemActive(' + i + ')" id="liItemActive' + i + '" style="margin-bottom: 1.5em; transition: ease .5s;">' +
              '<div data-header-id="' + i + '" class="collapsible-header valign-wrapper headerItemActive">' +
              '<div>' +
              '<span style="margin-left: 0; font-size: 1em;">' + result.title[i] + '</span>' +
              '</div>' +
              '<div>' +
              '<span style="color: #7cc6f9;">active</span>' +
              '<img class="arrowItemActive' + i + '" style="transition: ease .5s; margin-left: 0.5em;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">' +
              '</span>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '<div class="collapsible-body targetBodyItemActive">' +
              '<div class="row">' +
              '<div class="col s12">' +
              '<div style="display: flex; justify-content: space-between;" onclick="addMoreSubjob(' + result.idJob[i] + ')">' +
              '<div class="valign-wrapper">' +
              '<img src="<?= base_url(); ?>/assets/images/subjob.png" width="25" height="25" alt="">' +
              '<span style="margin-left: 0.8em;">Sub Jobs</span>' +
              '</div>' +
              '<div class="valign-wrapper">' +
              '<span style="color: #d1d1d0">' + result.all[i] + ' (' + result.active[i] + ' active)</span>' +
              '<div style="transform: rotate(-90deg); margin-left: 0.5em;">' +
              '<img src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">' +
              '</div>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '<div class="row" style="padding: 0 0.9em;">' +
              ' <div class="col s6" style="margin-top: 1em;">' +
              '<div class="valign-wrapper">' +
              '<img src="<?= base_url(); ?>/assets/images/datestart.png" width="25" height="25" alt="">' +
              '<span style="margin-left: 0.8em; font-size: 0.8em; color: #d1d1d0;">' + result.dateFull[i] + '</span>' +
              '</div>' +
              '</div>' +
              '<div class="col s6" style="margin-top: 1em;">' +
              '<div class="valign-wrapper" style="text-align: left;">' +
              '<img src="<?= base_url(); ?>/assets/images/coadminview.png" width="25" height="25" alt="">' +
              '<span style="margin-left: 0.8em; font-size: 0.8em; color: #d1d1d0;">' + result.coadmin[i] + '</span>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '<div class="row" style="padding: 0 0.9em;">' +
              ' <div class="col s6">' +
              '<div class="valign-wrapper">' +
              '<img src="<?= base_url(); ?>/assets/images/deadlinestart.png" width="25" height="25" alt="">' +
              '<span style="margin-left: 0.8em; font-size: 0.8em; color: #d1d1d0;">From ' + result.dateShort[i] + '</span>' +
              '</div>' +
              '</div>' +
              '<div class="col s6">' +
              '<div class="valign-wrapper" style="text-align: left;">' +
              '<img src="<?= base_url(); ?>/assets/images/deadlineend.png" width="25" height="25" alt="">' +
              '<span style="margin-left: 0.8em; font-size: 0.8em; color: #d1d1d0;">' + deadlineFix + '</span>' +
              ' </div>' +
              ' </div>' +
              ' </div>' +
              '<div class="row" style="padding: 0 0.9em;">' +
              ' <div class="col s6">' +
              '<div class="valign-wrapper">' +
              ' <img src="<?= base_url(); ?>/assets/images/crewview.png" width="25" height="25" alt="">' +
              ' <span style="margin-left: 0.8em; font-size: 0.8em; color: #d1d1d0;">' + result.crew[i] + '</span>' +
              ' </div>' +
              ' </div>' +
              ' <div class="col s6">' +
              ' <div class="valign-wrapper" style="text-align: left;">' +
              '<img src="<?= base_url(); ?>/assets/images/leaderview.png" width="25" height="25" alt="">' +
              '<span style="margin-left: 0.8em; font-size: 0.8em; color: #d1d1d0;">' + result.leader[i] + '</span>' +
              ' </div>' +
              ' </div>' +
              ' </div>' +

              '<div class="row" style="margin-bottom: 0;">' +
              '<div class="col s12" style="padding: 0 1.5em;">' +
              '<div onclick="duplicateJob(' + result.idJob[i] + ')" class="valign-wrapper" style="display: flex; justify-content: space-between; background: #41a3f9; border-radius: 1em; padding: 0.5em 0.8em;">' +
              '<div>' +
              '<p style="font-size: 0.8em; color: #fff;">Duplicate Job Group</p>' +
              ' </div>' +
              '<div style="transform: rotate(-90deg);">' +
              '<img src="<?= base_url(); ?>/assets/images/downarrow.png" width="10" height="10" alt="">' +
              ' </div>' +
              ' </div>' +
              ' </div>' +
              ' </div>' +
              ' <div class="row" style="margin-bottom: 0; margin-top: 0;">' +
              '<div class="col s12" style="padding: 0 1.5em;">' +
              '<ul class="collapsible collapseDeactivate' + i + '" style="box-shadow: none; border: none; margin: 1em 0;">' +
              '<li onclick="collapseDeactivate(' + i + ')">' +
              '<div class="collapsible-header headerDeactivate" style="background: #db3b26; border-radius: 1.5em; color: #fff; padding: 0.8em 0.8em; font-size: 0.8em; display: flex; justify-content: space-between; transition: ease .5s;">' +
              '<div>' +
              ' <p class="titleDeactivate">Deactivate Job Group</p>' +
              '</div>' +
              '<div>' +
              '<img class="arrowDeactivate" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="10" height="10" alt="">' +
              '</div>' +
              '</div>' +
              '<div class="collapsible-body bodyDeactivate">' +
              '<textarea name="deactivateNote" class="deactivateNote" id="deactivateNote' + i + '" id="" cols="30" rows="10" placeholder="Deactivate note"></textarea>' +
              '<div class="row" style="margin-top: 1em; margin-bottom: 0;">' +
              '<div class="col s12">' +
              '<div style="background: #db3b26; border-radius: 1.2em; padding: 0.2em 0.5em;" onclick="deactivateJob(' + result.idJob[i] + ', ' + result.idSubjob[i] + ',' + i + ')">' +
              '<div class="center">' +
              '<p style="font-size: 0.8em; color: #fff;">Deactivate Job Group</p>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '</li>' +
              '</ul>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '</li>';
          }

          $('.collapseItemActive').html(item);
        } else {
          $('.collapseItemActive').html('');
          $('.helperActiveJob').removeClass('collapseActiveJob');
          $('.helperActiveJob').removeClass('collapsible');
          $('#arrowActiveJob').html('');

        }
      }
    })
  }

  function addMoreSubjob(idJob) {

    var param = [];
    param[0] = idJob;

    slModal("Confirmation", "You'll be chaired to Job's page, are you sure to left this page?", "question", {
      buttons: {
        confirmation: true,
        value: 'confirm',
        onclick: 'delete',
        function: 'doMoreSubjob',
        params: param
      }
    })

  }

  function doMoreSubjob(idJob) {

    $('#modalNotification').modal('close');

    $.ajax({
      type: 'post',
      data: {
        idJob: idJob
      },
      url: '<?= base_url('jzl/MobileJobView/addMoreSubjob'); ?>',
      dataType: 'json',
      success: function(result) {

        $('.collapseItemActive').collapsible('close');
        $('.collapseActiveJob').collapsible('close');
        $('#modalViewJob').modal('close');

        //show modal add Job
        $('#modalAddJob').modal('open');

        doDuplicate(idJob, 'coadmin');

        var onclick = "'coadmin'";

        $('.saveJobButton').attr('onclick', 'saveJobs(' + onclick + ', ' + idJob + ')');

        setTimeout(function() {
          deleteCurrentJob();
        }, 1000)

      }
    })

  }

  function deactivateJob(idJob, idSubjob, idForm) {

    var param = [];
    param[0] = idJob;
    param[1] = idSubjob;
    param[2] = idForm

    slModal('Deactivate', 'Are you sure to deactivate this Job Group?', 'question', {
        buttons: {
            confirmation: true,
            value: 'confirm',
            onclick: 'delete',
            params: param,
            function: 'doDeactivateJob'
        }
    })

  }

  function doDeactivateJob(idJob, idSubjob, idForm) {

    $('#modalNotification').modal('close');

    var note = $('#deactivateNote' + idForm).val();
    if (note == '') {
      slModal('Failed', 'Note cannot be null', 'warning', {
        buttons: false,
        timer: 1500
      })
    } else {
      $.ajax({
        type: 'POST',
        data: {
          idJob: idJob,
          idSubjob: idSubjob,
          note: note
        },
        url: '<?= base_url('jzl/MobileJobView/deactivateJob'); ?>',
        dataType: 'json',
        success: function(result) {
          if (result.message == 'success') {
            slModal('Success', 'Job successfully Deactivated', 'success', {
              buttons: false,
              timer: 1500
            });
            $('.collapseItemActive').collapsible('close');
            $('.collapseDeactivate').collapsible('close');
            $('#liItemActive' + idForm).css({
              "display": "none"
            });
            getActiveJob();
            getDeactivateJob();
          }
        }
      })
    }

  }

  function getDeactivateJob(key = '') {
    $.ajax({
      type: "POST",
      data: {
        sort: key
      },
      url: '<?= base_url('jzl/MobileJobView/getDeactivateJob'); ?>',
      dataType: 'json',
      success: function(result) {
        console.log(result);
        if (result.result > 0) {
          var item = '';
          for (var i = 0; i < result.result; i++) {

            if (result.deadline[i] == 'No deadline') {
              var deadlineFix = 'No deadline';
            } else {
              var deadlineFix = 'Until ' + result.deadline[i];
            }

            item += '<li onclick="collapseItemDeactivate(' + i + ')" id="liItemDeactivate' + i + '" style="margin-bottom: 1.5em; transition: ease .5s;">' +
              '<div data-header-id="' + i + '" class="collapsible-header valign-wrapper headerItemActive">' +
              '<div>' +
              '<span style="margin-left: 0; font-size: 1em;">' + result.title[i] + '</span>' +
              '</div>' +
              '<div style="text-align: right;">' +
              '<div>' +
              '<span>' +
              '<span style="color: #a7a7a8;">deactivate</span>' +
              '<img class="arrowItemActive' + i + '" style="transition: ease .5s; margin-left: 0.5em;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">' +
              '</span>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '<div class="collapsible-body targetBodyItemActive">' +
              '<div class="row">' +
              '<div class="col s12">' +
              '<div class="titleDeactivateField">' +
              '<p style="color: #d6d5d5;">Deactivate Note</p>' +
              '</div>' +
              '<div class="noteField">' +
              '<p class="targetDeactivateNote">' + result.noteDeactivate[i] + '</p>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '<div class="row">' +
              '<div class="col s12">' +
              '<div style="display: flex; justify-content: space-between;">' +
              '<div class="valign-wrapper">' +
              '<img src="<?= base_url(); ?>/assets/images/subjob.png" width="25" height="25" alt="">' +
              '<span style="margin-left: 0.8em;">Sub Jobs</span>' +
              '</div>' +
              '<div class="valign-wrapper">' +
              '<span style="color: #d1d1d0">' + result.all[i] + '</span>' +
              '<div style="transform: rotate(-90deg); margin-left: 0.5em;">' +
              '<img src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">' +
              '</div>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '<div class="row" style="padding: 0 0.9em;">' +
              ' <div class="col s6" style="margin-top: 1em;">' +
              '<div class="valign-wrapper">' +
              '<img src="<?= base_url(); ?>/assets/images/datestart.png" width="25" height="25" alt="">' +
              '<span style="margin-left: 0.8em; font-size: 0.8em; color: #d1d1d0;">' + result.dateFull[i] + '</span>' +
              '</div>' +
              '</div>' +
              '<div class="col s6" style="margin-top: 1em;">' +
              '<div class="valign-wrapper" style="text-align: left;">' +
              '<img src="<?= base_url(); ?>/assets/images/coadminview.png" width="25" height="25" alt="">' +
              '<span style="margin-left: 0.8em; font-size: 0.8em; color: #d1d1d0;">' + result.coadmin[i] + '</span>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '<div class="row" style="padding: 0 0.9em;">' +
              ' <div class="col s6">' +
              '<div class="valign-wrapper">' +
              '<img src="<?= base_url(); ?>/assets/images/deadlinestart.png" width="25" height="25" alt="">' +
              '<span style="margin-left: 0.8em; font-size: 0.8em; color: #d1d1d0;">From ' + result.dateShort[i] + '</span>' +
              '</div>' +
              '</div>' +
              '<div class="col s6">' +
              '<div class="valign-wrapper" style="text-align: left;">' +
              '<img src="<?= base_url(); ?>/assets/images/deadlineend.png" width="25" height="25" alt="">' +
              '<span style="margin-left: 0.8em; font-size: 0.8em; color: #d1d1d0;">' + deadlineFix + '</span>' +
              ' </div>' +
              ' </div>' +
              ' </div>' +
              '<div class="row" style="padding: 0 0.9em;">' +
              ' <div class="col s6">' +
              '<div class="valign-wrapper">' +
              ' <img src="<?= base_url(); ?>/assets/images/crewview.png" width="25" height="25" alt="">' +
              ' <span style="margin-left: 0.8em; font-size: 0.8em; color: #d1d1d0;">' + result.crew[i] + '</span>' +
              ' </div>' +
              ' </div>' +
              ' <div class="col s6">' +
              ' <div class="valign-wrapper" style="text-align: left;">' +
              '<img src="<?= base_url(); ?>/assets/images/leaderview.png" width="25" height="25" alt="">' +
              '<span style="margin-left: 0.8em; font-size: 0.8em; color: #d1d1d0;">' + result.leader[i] + '</span>' +
              ' </div>' +
              ' </div>' +
              ' </div>' +

              '<div class="row" style="margin-bottom: 0.5em;">' +
              '<div class="col s12" style="padding: 0 1.5em;" onclick="duplicateJob(' + result.idJob[i] + ')">' +
              '<div class="valign-wrapper" style="display: flex; justify-content: space-between; background: #41a3f9; border-radius: 0.8em; padding: 0.5em 0.8em;">' +
              '<div>' +
              '<p style="font-size: 0.8em; color: #fff;">Duplicate Job Group</p>' +
              ' </div>' +
              '<div style="transform: rotate(-90deg);">' +
              '<img src="<?= base_url(); ?>/assets/images/downarrow.png" width="10" height="10" alt="">' +
              ' </div>' +
              ' </div>' +
              ' </div>' +
              ' </div>' +

              '<div class="row" style="margin-bottom: 0;">' +
              '<div class="col s12" style="padding: 0 1.5em;">' +
              '<div class="valign-wrapper" style="background: #41a3f9; border-radius: 0.8em; padding: 0.5em 0.8em; height: 2.4em;" onclick="reactivateJob(' + result.idJob[i] + ', ' + result.idSubjob[i] + ', ' + i + ')">' +
              '<div>' +
              '<p style="font-size: 0.8em; color: #fff;">Reactivate Job Group</p>' +
              ' </div>' +
              ' </div>' +
              ' </div>' +
              ' </div>' +
              '</div>' +
              '</li>';
          }

          $('.collapseItemDeactivate').html(item);
        } else {
          $('.collapseItemDeactivate').html('');
          $('.helperCollapseDeactivate').removeClass('collapseDeactivateJob');
          $('.helperCollapseDeactivate').removeClass('collapsible');
          $('#arrowDeactivateJob').html('');

        }
      }
    })
  }

  function reactivateJob(idJob, idSubjob, idForm) {

    var param = [];
    param[0] = idJob;
    param[1] = idSubjob;
    param[2] = idForm

    slModal('Reactivate', 'Are you sure to reactivate this Job Group?', 'question', {
        buttons: {
            confirmation: true,
            value: 'confirm',
            onclick: 'delete',
            params: param,
            function: 'doReactivateJob'
        }
    })

  }

  function doReactivateJob(idJob, idSubjob, idForm) {

    $('#modalNotification').modal('close');

    $.ajax({
      type: "POST",
      data: {
        idJob: idJob,
        idSubjob: idSubjob,
        idForm: idForm
      },
      url: '<?= base_url('jzl/MobileJobView/reactivateJob'); ?>',
      dataType: 'text',
      success: function(result) {

        if (result == 'success') {

          $('#liItemDeactivate' + idForm).css({
            "display": "none"
          });
          getActiveJob();
          getDeactivateJob();
          slModal('Success', 'Successfully reactivate job', 'success', {
            buttons: false,
            timer: 1500
          });

        }

      }
    })

  }

  function getInactiveJob() {
    $.ajax({
      type: "POST",
      url: "<?= base_url('jzl/MobileJobView/getInactiveJob'); ?>",
      dataType: 'json',
      success: function(result) {
        if (result.result > 0) {
          var item = '';
          for (var i = 0; i < result.result; i++) {

            if (result.deadline[i] == 'No deadline') {
              var deadlineFix = 'No deadline';
            } else {
              var deadlineFix = 'Until ' + result.deadline[i];
            }

            item += '<li onclick="collapseItemInactive(' + i + ')" id="liItemInactive' + i + '" style="margin-bottom: 1.5em; transition: ease .5s;">' +
              '<div data-header-inactive-id="' + i + '" class="collapsible-header valign-wrapper headerItemInactive">' +
              '<div>' +
              '<span style="margin-left: 0; font-size: 1em;">' + result.title[i] + '</span>' +
              '</div>' +
              '<div style="text-align: right;">' +
              '<div>' +
              '<span>' +
              '<span style="color: #a7a7a8;">inactive</span>' +
              '<img class="arrowItemInactive' + i + '" style="transition: ease .5s; margin-left: 0.5em;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">' +
              '</span>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '<div class="collapsible-body targetBodyItemInactive">' +
              '<div class="row">' +
              '<div class="col s12">' +
              '<div style="display: flex; justify-content: space-between;">' +
              '<div class="valign-wrapper">' +
              '<img src="<?= base_url(); ?>/assets/images/subjob.png" width="25" height="25" alt="">' +
              '<span style="margin-left: 0.8em;">Sub Jobs</span>' +
              '</div>' +
              '<div class="valign-wrapper">' +
              '<span style="color: #d1d1d0">' + result.subjobRows[i] + '</span>' +
              '<div style="transform: rotate(-90deg); margin-left: 0.5em;">' +
              '<img src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">' +
              '</div>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '<div class="row" style="padding: 0 0.9em;">' +
              ' <div class="col s6" style="margin-top: 1em;">' +
              '<div class="valign-wrapper">' +
              '<img src="<?= base_url(); ?>/assets/images/overduegrey.png" width="25" height="25" alt="">' +
              '<span style="margin-left: 0.8em; font-size: 0.8em; color: #d1d1d0;">' + result.dateFull[i] + '</span>' +
              '</div>' +
              '</div>' +
              '<div class="col s6" style="margin-top: 1em;">' +
              '<div class="valign-wrapper" style="text-align: left;">' +
              '<img src="<?= base_url(); ?>/assets/images/overduegrey.png" width="25" height="25" alt="">' +
              '<span style="margin-left: 0.8em; font-size: 0.8em; color: #d1d1d0;">' + result.leader[i] + '</span>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '<div class="row" style="padding: 0 0.9em;">' +
              ' <div class="col s6">' +
              '<div class="valign-wrapper">' +
              '<img src="<?= base_url(); ?>/assets/images/overduegrey.png" width="25" height="25" alt="">' +
              '<span style="margin-left: 0.8em; font-size: 0.8em; color: #d1d1d0;">From ' + result.dateShort[i] + '</span>' +
              '</div>' +
              '</div>' +
              '<div class="col s6">' +
              '<div class="valign-wrapper" style="text-align: left;">' +
              '<img src="<?= base_url(); ?>/assets/images/overduegrey.png" width="25" height="25" alt="">' +
              '<span style="margin-left: 0.8em; font-size: 0.8em; color: #d1d1d0;">' + deadlineFix + '</span>' +
              ' </div>' +
              ' </div>' +
              ' </div>' +
              '<div class="row" style="padding: 0 0.9em;">' +
              ' <div class="col s6">' +
              '<div class="valign-wrapper">' +
              ' <img src="<?= base_url(); ?>/assets/images/overduegrey.png" width="25" height="25" alt="">' +
              ' <span style="margin-left: 0.8em; font-size: 0.8em; color: #d1d1d0;">' + result.crew[i] + '</span>' +
              ' </div>' +
              ' </div>' +
              ' <div class="col s6">' +
              ' <div class="valign-wrapper" style="text-align: left;">' +
              '<img src="<?= base_url(); ?>/assets/images/overduegrey.png" width="25" height="25" alt="">' +
              '<span style="margin-left: 0.8em; font-size: 0.8em; color: #d1d1d0;">' + result.coadmin[i] + '</span>' +
              ' </div>' +
              ' </div>' +
              ' </div>' +

              '<div class="row" style="margin-bottom: 0;">' +
              '<div class="col s12" style="padding: 0 1.5em;" onclick="duplicateJob(' + result.idJob[i] + ')">' +
              '<div class="valign-wrapper" style="display: flex; justify-content: space-between; background: #41a3f9; border-radius: 1em; padding: 0.5em 0.8em;">' +
              '<div>' +
              '<p style="font-size: 0.8em; color: #fff;">Duplicate Job Group</p>' +
              ' </div>' +
              '<div style="transform: rotate(-90deg);">' +
              '<img src="<?= base_url(); ?>/assets/images/downarrow.png" width="10" height="10" alt="">' +
              ' </div>' +
              ' </div>' +
              ' </div>' +
              ' </div>' +
              ' <div class="row" style="margin-bottom: 0; margin-top: 0;">' +
              '<div class="col s12" style="padding: 0 1.5em;">' +
              '<ul class="collapsible collapseDeactivate" style="box-shadow: none; border: none; margin: 1em 0;">' +
              '<li>' +
              '<div class="collapsible-header headerDeactivate" style="background: #db3b26; border-radius: 1.5em; color: #fff; padding: 0.8em 0.8em; font-size: 0.8em; display: flex; justify-content: space-between; transition: ease .5s;">' +
              '<div>' +
              ' <p class="titleDeactivate">Deactivate Job Group</p>' +
              '</div>' +
              '<div>' +
              '<img class="arrowDeactivate" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="10" height="10" alt="">' +
              '</div>' +
              '</div>' +
              '<div class="collapsible-body bodyDeactivate">' +
              '<textarea name="deactivateNote" class="deactivateNote" id="deactivateNote' + i + '" id="" cols="30" rows="10" placeholder="Deactivate note"></textarea>' +
              '<div class="row" style="margin-top: 1em; margin-bottom: 0;">' +
              '<div class="col s12">' +
              '<div style="background: #db3b26; border-radius: 1.2em; padding: 0.2em 0.5em;" onclick="deactivateJob(' + result.idJob[i] + ', ' + result.idSubjob[i] + ',' + i + ')">' +
              '<div class="center">' +
              '<p style="font-size: 0.8em; color: #fff;">Deactivate Job Group</p>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '</li>' +
              '</ul>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '</li>';
          }

          $('.collapseItemInactive').html(item);
        } else {

          $('.helperInactiveJob').removeClass('collapseInactiveJob');
          $('.helperInactiveJob').removeClass('collapsible');
          $('#arrowInactiveJob').html('');

        }
      }
    })
  }

  function duplicateJob(idJob, coadmin = '') {

    var param = [];
    param[0] = idJob;
    param[1] = coadmin

    slModal("Confirmation", "You'll be chaired to Job's page, are you sure to left this page?", "question", {
      buttons: {
        confirmation: true,
        value: 'confirm',
        onclick: 'delete',
        function: 'doDuplicate',
        params: param
      }
    })
  }

  function doDuplicate(idJob, coadmin) {
    $('#modalNotification').modal('close');
    $.ajax({
      type: "POST",
      data: {
        idJob: idJob
      },
      url: '<?= base_url('jzl/MobileJobView/duplicateJob'); ?>',
      dataType: 'json',
      success: function(result) {

        $('div[class="modal"]').modal('close');
        $('.collapseActiveJob').collapsible('close');
        $('.collapseDeactivateJob').collapsible('close');
        $('.collapseInactiveJob').collapsible('close');

        //role for coadmin
        if (coadmin != '') {

          //title
          $('.jobTitle').prop('readonly', true);

          //coadmin
          $('.modalCoadminTrigger').removeAttr('href');
          $('.modalCoadminTrigger').removeClass('modal-trigger');

          //crew
          $('.modalCrewTrigger').removeAttr('href');
          $('.modalCrewTrigger').removeClass('modal-trigger');

          //manipulate collapse leader
          $('.collap2').collapsible('close');

          // manipulate subjob approval
          $('.collapApproval').collapsible('open');

          var tr = '<tr>' +
            '<td style="width: 0.8em;">' +
            '<p class="numberCoadmin" id="pId' + result.coadmin + '" style="transition: ease 0.5s; border: 0.4px solid #fff; border-radius: 1.4em; font-size: 0.3em; padding: 0.3em 0.5em; color: #fff;">2</p>' +
            '</td>' +
            '<td style="width: 14em; padding: 0;">' +
            '<p class="nameCoadmin" id="pName' + result.coadmin + '" style="transition: ease 0.5s; color: #d9d8d9; font-size: 0.7em; margin-left: 1.5em;">' + result.coadminName + '</p>' +
            '<input type="hidden" class="coadminField" id="coadminField' + result.coadmin + '" name="coadminField">' +
            '</td>' +
            '<td style="width: 2em; padding: 0;"><span data-change="toggleDefault" class="spanSwitchOrder" id="spanSwitchOrder" data-check="" data-name="' + result.coadminName + '" data-id="' + result.coadmin + '" onclick="switchOrder(' + result.coadmin + ')"><img src="<?= base_url(); ?>assets/images/toggledefault.png" width="35" height="20" alt=""></span></td>' +
            '</tr>';
          $('.targetBodyCoadmin').html(tr);

        }

        $('.jobTitle').val(result.title);

        if (result.coadmin == 0) {
          $('.targetCoadmin1').val('');
          $('#targetCoadmin').html('None');
        } else {
          $('.targetCoadmin1').val(result.coadmin);
          $('#targetCoadmin').html(result.coadminName);
        }

        //crew
        var delBtn = '<?= base_url(); ?>/assets/images/delete.png';
        var hamburger = '<?= base_url(); ?>/assets/images/hamburger.png';
        var x = '';
        var y = '';
        for (var i = 0; i < result.crew.length; i++) {
          var shortN = "'" + result.crewName[i] + "'";
          x += '<tr class="trSelectedCrew' + i + '" style="border: none; color: #5e5e5e;">' +
            '<td style="padding: 10px 5px;" onclick="deleteSelectedCrew(' + i + ', ' + result.crew[i] + ', ' + shortN + ')"><img src="' + delBtn + '" width="15" height="15"></td>' +
            '<td style="border: none; font-size: 0.8em; font-weight: 200;">' + result.fullCrewName[i] + '</td>' +
            '<td class="right-align"><img src="' + hamburger + '" width="20" height="15"></td>' +
            '<td hidden><input class="idSelectedCrew" id="idSelectedCrew' + i + '" name="idSelectedCrew" value="' + result.crew[i] + '"></td>' +
            '</tr>';

          $('input[data-hidden-id-crew="' + result.crew[i] + '"]').val(result.crew[i]);

          //manipulate coadmin field
          $('td[data-id-table="tbl' + result.crew[i] + '"]').css({
            "color": "#dadad9"
          });
          $('tr[data-tr="tr' + result.crew[i] + '"]').removeAttr('onclick');
          $('td[data-id-admin="' + result.crew[i] + '"]').removeClass();
          $('td[data-id-admin="' + result.crew[i] + '"]').removeAttr('id');
          $('td[data-id-admin="' + result.crew[i] + '"]').html('');
        }

        $('.targetCrewName').html(x);
        $('.tableCrewName').removeAttr('hidden');
        $('.selectedCrew').text(result.crew.length);

        //leader
        for (var u = 0; u < result.newLeader.length; u++) {

          y += '<tr class="trLeader' + u + '" onclick="chooseLeader(' + u + ', ' + result.crew[u] + ')" style="border: none; color: #5e5e5e;">' +
            '<td class="targetCheckLeader" data-leader-id="' + result.newLeader[u] + '" id="targetCheckLeader' + u + '" style="color: #40a1f8; font-size: 0.7em; text-align: right; width: 2.2em; opacity: 1;"><img src="<?= base_url(); ?>assets/images/radiounchecked.png" width="10" height="10"></td>' +
            '<td style="padding: 10px 5px; width: 1em;"></td>' +
            '<td class="chooseLeader' + u + '" style="border: none; font-size: 0.8em; font-weight: 200;">' + result.crewName[u] + '</td>' +
            '<td hidden><input id="idSelectedLeader' + u + '" class="idSelectedLeader" name="idSelectedLeader" value="' + result.newLeader[u] + '"></td>' +
            '</tr>';

        }
        $('.targetLeader').html(y);
        $('.selectedLeader').text(result.leaderName);

        if (coadmin == 0) {

          //subjob field -> subjob
          $('.collap3').collapsible('open');
          $('.tableConclusionSubjob').css({
            "height": "100%"
          });

          var z = '';
          for (var s = 0; s < result.subjob.length; s++) {
            z += '<tr data-check="1" class="targetDelete' + s + '" id="targetDelete" style="border: none; margin-left: 1em;" class="text-center">' +
              '<td class="numberTab" style="border: none; font-size: 0.9em; font-weight: 600; width: 3em; margin-left: 1em; color: #929293; padding: 0 0.8em;">' + (s + 1) + '</td>' +
              '<td class="subjobTab" style="border: none; font-size: 0.9em; font-weight: 400; width: 14em; color: #929293; padding: 0 0.8em;"><input value="' + result.subjob[s] + '" class="manualSubjobField" id="manualSubjobField' + s + '" oninput="changeSubjobField1(' + s + ')" type="text"></td>' +
              '<td class="deadlineFieldIndex' + s + '" style="border: none; font-size: 0.7em; font-weight: 200; width: 8em; color: #929293; padding: 0 0.8em;">No deadline</td>' +
              '<td  style="font-size: 0.8em; color: #929293; padding: 0 0.8em;" ><i class="fas fa-ellipsis-h" data-toggle="popover' + s + '" ></i></td>' +
              '<td hidden><input type="text" id="finalIdSubjob1' + s + '" class="finalIdSubjob1"></td>' +
              '<td hidden><input type="text" id="finalSubjob' + s + '" class="finalSubjob" name="finalSubjob"></td>' +
              '<td hidden><input type="text" id="finalPurpose' + s + '" class="finalPurpose" ></td>' +
              '<td hidden><input type="text" id="finalDeadlineDate' + s + '" class="finalDeadlineDate"></td>' +
              '<td hidden><input type="text" id="finalDeadlineHour' + s + '" class="finalDeadlineHour"></td>' +
              '<td hidden ><input type="text" id="finalAssessor' + s + '" class="finalAssessor"></td>' +
              '<td hidden><input type="text" id="finalRemind' + s + '" class="finalRemind"></td>' +
              '<td hidden><input type="text" id="finalCode' + s + '" class="finalCode"></td>' +
              '<td hidden><input type="text" id="finalCoadmin' + s + '" class="finalCoadmin"></td>' +
              '<td hidden><input type="text" id="finalPriority' + s + '" class="finalPriority"></td>' +
              '<td hidden><input type="text" id="finalNote' + s + '" class="finalNote"></td>' +
              '<td hidden><input type="text" id="finalStoppable' + s + '" class="finalStoppable"></td>' +
              '<td hidden><input type="text" id="finalRemindAlarm' + s + '" class="finalRemindAlarm"></td>' +
              '</tr>';
          }

          $('.targetConclusion1').html(z);
          $('.spanNumberSubjob').text(result.subjob.length);

          //looping for add popover and add manual subjob
          for (var p = 0; p < result.subjob.length; p++) {
            $('[data-toggle="popover' + p + '"]').ggpopover({
              'placement': 'bottom',
              'animation': 'false',
              'html': 'true',
              'content': [
                '<div class="row" onclick="detailsSubjob(' + p + ')" style="padding-top: 0.4em; padding-bottom: 0.4em; padding-right: 0.6em; padding-left: 0.7em; margin: 0">' +
                '<div class="col s12" style="padding: 0; margin: 0">' +
                '<div style="display: flex; justify-content: space-between">' +
                '<div>' +
                '<span style="margin-right: 6.7em; color: #5cb7f8; font-size: 0.8em;">Details</span>' +
                '</div>' +
                '<div>' +
                '<span><i style="color: #5cb7f8; font-size: 0.8em;" class="fas fa-arrow-up"></i></span>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="borderBottomFull"></div>' +
                '<div class="row" onclick="deleteSpan(' + p + ')"  style="padding-top: 0.4em; padding-bottom: 0.4em; padding-right: 0.6em; padding-left: 0.7em; margin: 0">' +
                '<div class="col s12" style="padding: 0; margin: 0">' +
                '<div style="display: flex; justify-content: space-between">' +
                '<div>' +
                '<span style="margin-right: 6.7em; color: #e06655; font-size: 0.8em;">Delete</span>' +
                '</div>' +
                '<div>' +
                '<span><i style="color: #e06655; font-size: 0.8em;" class="fas fa-times"></i></span>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>'
              ]
            });

            $('.finalSubjob' + p).val(result.subjob[p]);

          }

        }

        //add new field to database
        var idJob = $('.idJobGroup').val();

        if (coadmin == '') {

          $.ajax({
            type: "POST",
            data: {
              numRows: result.subjob.length,
              subjob: result.subjob,
              idJob: idJob
            },
            url: '<?= base_url('jzl/MobileJobView/saveTemplateSubjob'); ?>',
            dataType: 'json',
            success: function(resultSubjob) {
              for (var ids = 0; ids < resultSubjob.length; ids++) {
                $('#finalIdSubjob1' + ids).val(resultSubjob[ids]);
              }
            }
          })

        }

      }
    })
  }

  function showButton() {
    var field = $('input[name="triggerSorting"]').map(function() {
      return $(this).val();
    }).toArray().filter(function(e) {
      return e != '' && e != null;
    });

    if (field.length > 0) {

      //change button css
      $('.div-table-col-button').css({
        "border": "2.3px solid #6ab7fa"
      });
      $('.pApply').css({
        "color": "#6ab7fa"
      });
      $('.pReset').css({
        "color": "#6ab7fa"
      });

      //add onclick
      $('#apply').attr('onclick', 'applySort()');
      $('#reset').attr('onclick', 'applyCancel()');

    } else {

      //change button css
      $('.div-table-col-button').css({
        "border": "2.3px solid #dfdede"
      });
      $('.pApply').css({
        "color": "#dfdede"
      });
      $('.pReset').css({
        "color": "#dfdede"
      });

      //add onclick
      $('#apply').removeAttr('onclick');
      $('#reset').attr('onclick');

    }

    // var minSubjob = $('.minSubjob').val();
    // var maxSubjob = $('.maxSubjob').val();
    // var minCrew = $('.minCrew').val();
    // var maxCrew = $('.maxCrew').val();
    //
    // if(minSubjob != '' || maxSubjob != '' || minCrew != '' || maxCrew != '') {
    //
    //   //change button css
    //   $('.div-table-col-button').css({
    //     "border": "2.3px solid #6ab7fa"
    //   });
    //   $('.pApply').css({
    //     "color": "#6ab7fa"
    //   });
    //   $('.pReset').css({
    //     "color": "#6ab7fa"
    //   });
    //
    //   //add onclick
    //   $('#apply').attr('onclick', 'applySort()');
    //   $('#reset').attr('onclick', 'applyCancel()');
    //
    //   if(minSubjob != '') {
    //     $('#minDeadline').val();
    //     $('.triggerMinSubjob').val(1);
    //     $('.minDatepicker').datepicker('destroy');
    //     $('#maxDatepicker').datepicker('destroy');
    //   } else if (maxSubjob != '') {
    //     $('.triggerMaxSubjob').val(1);
    //     $('.minDatepicker').datepicker('destroy');
    //     $('#maxDatepicker').datepicker('destroy');
    //   } else if (minCrew != '') {
    //     $('.triggerMinCrew').val(1);
    //   } else if (maxCrew != '') {
    //     $('.triggerMaxCrew').val(1);
    //   }
    //
    // } else {
    //
    //   //change button css
    //   $('.div-table-col-button').css({
    //     "border": "2.3px solid #dfdede"
    //   });
    //   $('.pApply').css({
    //     "color": "#dfdede"
    //   });
    //   $('.pReset').css({
    //     "color": "#dfdede"
    //   });
    //
    //   //add onclick
    //   $('#apply').removeAttr('onclick');
    //   $('#reset').attr('onclick');
    //
    //   if(minSubjob == '') {
    //     $('.triggerMinSubjob').val('');
    //     $('.minDatepicker').datepicker();
    //     $('#maxDatepicker').datepicker();
    //   } else if (maxSubjob == '') {
    //     $('.triggerMaxSubjob').val('');
    //     $('.minDatepicker').datepicker();
    //     $('#maxDatepicker').datepicker();
    //   } else if (minCrew == '') {
    //     $('.triggerMinCrew').val('');
    //   } else if (maxCrew == '') {
    //     $('.triggerMaxCrew').val('');
    //   }
    //
    // }
  }

  function cancelSorting() {
    $('.rowSorting').css({
      "display": "block",
      "top": "-18.5em"
    });

    $('.rowSearch').css({
      "margin-top": "6.5em"
    });

    applyCancel();
  }

  function addZero(data) {
    if (data < '10') {
      var result = '0' + data;
    } else if (data > '9') {
      var result = data;
    }

    return result;
  }

  function addMinSubjob() {
    var minSubjob = $('.minSubjob').val();

    if (minSubjob == '') {
      $('.triggerMinSubjob').val('');
      showButton();
    } else {
      $('.triggerMinSubjob').val(1);
      showButton();
    }
  }

  function addMaxSubjob() {
    var maxSubjob = $('.maxSubjob').val();

    if (maxSubjob == '') {
      $('.triggerMaxSubjob').val('');
      showButton();
    } else {
      $('.triggerMaxSubjob').val(1);
      showButton();
    }

    showButton();
  }

  function addMinCrew() {
    var minCrew = $('.minCrew').val();

    if (minCrew == '') {
      $('.triggerMinCrew').val('');
      showButton();
    } else {
      $('.triggerMinCrew').val(1);
      showButton();
    }
  }

  function addMaxCrew() {
    var maxCrew = $('.maxCrew').val();

    if (maxCrew == '') {
      $('.triggerMaxCrew').val('');
      showButton();
    } else {
      $('.triggerMaxCrew').val(1);
      showButton();
    }
  }

  function saveMoreJob(idJob) {

    saveJobs('coadmin', idJob);

    $('.saveJobButton').attr('onclick', 'saveJobs()');

  }
</script>
