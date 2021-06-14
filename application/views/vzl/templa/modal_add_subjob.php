<div class="row valign-wrapper code" style="margin-bottom: 15px;">
    <div class="col s6">
        <p class="tes" style="color: #5e5e5e; margin-left: 1.2em; font-family: 'Quicksand', sans-serif; font-weight: 700;">Code</p>
    </div>
    <div class="col s6">
        <p class="right-align pCode" style="text-transform: uppercase; margin-right: 0.4em; font-family: 'Quicksand', sans-serif; font-weight: 400;"><?= $_SESSION['user']; ?></p>
        <input type="text" hidden class="codeSubjob" name="codeSubjob" value="<?= $_SESSION['user']; ?>">
        <input type="text" hidden class="finalIdSubjob" name="finalIdSubjob">
    </div>
</div>

<div class="row valign-wrapper" style="margin-bottom: 0;">
    <div class="col s12">
        <input type="text" class="subjobField1" name="subjobField1" placeholder="Add Sub Job..." data-trigg="jobTitle" oninput="changeTitle()">
    </div>
</div>

<div class="row valign-wrapper" style="margin-bottom: 0; margin-top: 0.7em;">
    <div class="col s12 m6 offset-m3">
        <div class="card" style="border-radius: 1.4em;  box-shadow: none; background-color: #fff;">
            <div class="card-content" style="padding: 0.1em 0.5em;">
                <ul class="collapsible collapApproval" style="box-shadow: none; border: none;">
                    <li>
                        <div class="collapsible-header" style="border: none !important; padding: 0 1em; margin-top: 1em; display: flex; justify-content: space-between;">
                            <div class="valign-wrapper">
                                <img src="<?= base_url(); ?>/assets/images/subjob.png" width="20" height="20" alt=""> <span style="margin-left: 0.7em; color: #6a6a6a;">Approval</span>
                            </div>
                            <div class="valign-wrapper" style="text-align: right;">
                                <span class="spanApproval" style="transition: ease 0.5s; color: #d9d8d9; margin-right: 0.5em; font-size: 0.8em;">Only you</span>
                                <div class="arrowApproval">
                                    <img src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="collapsible-body collapseApproval">
                            <table class="justify-content-center tableApproval" style="margin-top: 1em;">
                                <tbody class="targetBodySuperAdmin">
                                    <tr>
                                        <td style="width: 0.8em;">
                                            <p class="numberSuperAdmin" id="pId1" style="border: 0.4px solid #d8d7d8; border-radius: 1.4em; font-size: 0.3em; padding: 0.3em 0.5em; color: #d8d7d8;">1</p>
                                        </td>
                                        <td style="width: 14em; padding: 0;">
                                            <p class="nameSuperAdmin" id="pName1" style="color: #939392; font-size: 0.7em; margin-left: 1.5em;">You</p>
                                            <input type="text" hidden class="coadminField" name="coadminField" id="coadminField1" value="1">
                                        </td>
                                        <td style="width: 2em; padding: 0;"><span data-change="toggleActive" class="spanSwitchOrder" id="spanSwitchOrder" data-check="1" data-name="You" data-id="1" onclick="switchOrder(1)"><img src="<?= base_url(); ?>assets/images/toggleactive.png" width="35" height="20" alt=""></span></td>
                                    </tr>
                                </tbody>
                                <tbody class="targetBodyCoadmin">
                                    <!-- <tr>
                                        <td style="width: 0.8em;">
                                            <p style="border: 0.4px solid #d8d7d8; border-radius: 1.4em; font-size: 0.3em; padding: 0.3em 0.5em; color: #d8d7d8;">1</p>
                                        </td>
                                        <td style="width: 14em; padding: 0;">
                                            <p style="color: #939392; font-size: 0.7em; margin-left: 1.5em;">You</p>
                                            <input type="text" hidden class="coadminField" id="coadminField2" name="coadminField">
                                        </td>
                                        <td style="width: 2em; padding: 0;"><img src="<?= base_url(); ?>assets/images/toggleactive.png" width="35" height="20" alt=""></td>
                                    </tr> -->
                                </tbody>
                            </table>
                            <div class="buttonSwitch" style="transition: ease .5s; width: 100%; background-color: #ebeaeb; border-radius: 1.5em; margin-top: 0.7em; text-align: center; padding: 0.3em 0; font-family: 'Quicksand', sans-serif; font-weight: 500;">
                                <p style="font-size: 0.8em; color: white">Switch order</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row valign-wrapper" style="padding: 0; margin-top: 0; margin-bottom: 2.5em">
    <div class="col s12 m6 offset-m3">
        <div class="card" style="border-radius: 1.6em; box-shadow: none; height: 10em; background: transparent; margin-top: 0;">
            <div class="card-content" style="padding: 0.3em 0;">
                <div class="textareaContainer">
                    <textarea class="textareaField purposeSubjob" name="purposeSubjob" rows="4" placeholder="Purpose"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row valign-wrapper" style="margin-bottom: 0.7em;">
    <div class="col s12 m6 offset-m3">
        <div class="card" style="border-radius: 1.6em; box-shadow: none;">
            <div class="card-content" style="padding: 0.3em;">
                <ul class="collapsible collapDeadlineDate" style="box-shadow: none; border: none; padding-bottom:0; margin: 0;">
                    <li>
                        <div class="collapsible-header" style="border: none !important; padding: 0.5em 1.4em; display: flex; justify-content: space-between;  border-radius: 1em;">
                            <div class="valign-wrapper">
                                <img src="<?= base_url(); ?>/assets/images/deadlinedate.png" width="20" height="20" alt=""> <span style="margin-left: 0.7em; font-size: 0.9em; font-family: 'Quicksand', sans-serif; font-weight: 500;">Deadline Date</span>
                            </div>
                            <div class="valign-wrapper" style="text-align: right;">
                                <span class="spanDeadlineDate" style="font-size: 0.9em; color: #e2e2e2; margin-right: 0.6em;">Same</span>
                                <div class="arrowDeadlineDate">
                                    <img id="arrowDeadlineDate" src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="collapsible-body collapseDeadlinedate" style="color: #40a1f8; border: none; padding-bottom: 0; margin-bottom: 0;">
                            <div class="row">
                                <div class="col s9" style="padding-left: 0; padding-right: 0.4em; margin: 0;">
                                    <div id="calendar" style="background-color: #f3f2f7; border-radius: 1.4em"></div>
                                    <input type="text" hidden class="deadlineDateField">
                                </div>
                                <div class="col s3" style="padding: 0; margin: 0">
                                    <div class="selectMonth">
                                        <p><?= date('F'); ?></p>
                                    </div>
                                    <div class="selectYear">
                                        <p><?= date('Y'); ?></p>
                                    </div>
                                    <div class="selectDay">
                                        <p onclick="changeDay('yesterday')" id="yesterday">Yesterday</p>
                                        <p onclick="changeDay('today')" id="today" class="activeDay">Today</p>
                                        <p onclick="changeDay('tomorrow')" id="tomorrow">Tomorrow</p>
                                        <p onclick="changeDay('nextWeek')" id="nextWeek">Next week</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </li>
                </ul>
                <div style="padding: 0; margin: 0;">
                    <p style="padding:0; width: 90%; text-align: center; margin-top: 0; margin-left: 1em; margin-bottom: 0.5em; height: 2px; background-color: #e0e0e0;"></p>
                </div>
                <ul class="collapsible collapDeadlineHour" style="box-shadow: none; border: none; padding-bottom:0; margin: 0;">
                    <li>
                        <div class="collapsible-header" style="border: none !important; padding: 0.5em 1.4em; display: flex; justify-content: space-between; border-radius: 1em;">
                            <div class="valign-wrapper">
                                <img src="<?= base_url(); ?>/assets/images/deadlinehour.png" width="20" height="20" alt=""> <span style="margin-left: 0.7em; font-size: 0.9em; font-family: 'Quicksand', sans-serif; font-weight: 500;">Deadline Time</span>
                            </div>
                            <div class="valign-wrapper" style="text-align: right;">
                                <span class="spanDeadlineHour" style="font-size: 0.9em; color: #e2e2e2; margin-right: 0.6em;">Same</span>
                                <div class="arrowDeadlineHour1">
                                    <img id="arrowDeadlineHour1" src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="collapsible-body collapseCrew" style="color: #40a1f8; border: none; padding-bottom: 0; margin-bottom: 0;">
                            <div class="valign-wrapper" style="display: flex; justify-content: space-between">
                                <div style="display: flex; justify-content: space-between; margin-left: 40px; margin-right: 10px;" class="right">
                                    <div>
                                        <input type="text" class="inputHour" oninput="changeSlider()">
                                    </div>
                                    <div>
                                        <input type="text" class="inputMinutes" oninput="changeSlider()">
                                    </div>
                                </div>
                                <div class="sliderParent">
                                    <img src="<?= base_url(); ?>/assets/images/morning.png" width="15" height="10" alt="" style="vertical-align: text-top; margin-right: 1em;">
                                    <img src="<?= base_url(); ?>/assets/images/daylight.png" width="10" height="10" alt="" style="vertical-align: text-top; margin-right: 3.9em;">
                                    <img src="<?= base_url(); ?>/assets/images/afternoon.png" width="10" height="10" alt="" style="vertical-align: text-top;">
                                    <div style="width: 8em; bottom: 0.3em" id="slider">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</div>

<div class="row valign-wrapper" style="margin-bottom: 0.7em;">
    <div class="col s12 m6 offset-m3">
        <div class="card" style="border-radius: 1.3em; box-shadow: none;">
            <div class="card-content" style="padding: 0.1em; margin: 0;">
                <ul class="collapsible collapRemind" style="box-shadow: none; border: none; padding: 0; margin: 0.5em 0.1em;">
                    <li>
                        <div class="collapsible-header" style="border: none !important; padding: 0.5em 1.4em; display: flex; justify-content: space-between;">
                            <div class="valign-wrapper">
                                <img src="<?= base_url(); ?>/assets/images/remind.png" width="20" height="20" alt=""> <span style="margin-left: 0.7em; font-size: 0.9em; font-family: 'Quicksand', sans-serif; font-weight: 500;">Remind Others</span>
                            </div>
                            <div class="valign-wrapper" style="text-align: right;">
                                <div class="arrowRemind">
                                    <img src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="collapsible-body collapseCrew" style="color: #40a1f8; border: none; padding-bottom: 0; margin-bottom: 0;">
                            <div class="divStoppable" style="display: none;">
                                <div style="padding: 0; margin: 0;">
                                    <p style="padding:0; width: 100%; text-align: center; margin-top: 0; margin-left: 0; margin-bottom: 0.8em; height: 1px; background-color: #e1e0e1;"></p>
                                </div>
                                <div style="display: flex; justify-content: space-between; margin-bottom: 0.4em;">
                                    <div>
                                        <span style="font-family: 'Quicksand', sans-serif; font-weight: 500; color: #696969; font-size: 0.9em;">Stoppable</span>
                                    </div>
                                    <div>
                                        <span class="stoppableToggle" style="margin-right: 0.5em;"><img src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt=""></span>
                                        <input type="text" hidden class="stoppable" name="stoppable">
                                    </div>
                                </div>
                                <div style="padding: 0; margin: 0;">
                                    <p style="padding:0; width: 100%; text-align: center; margin-top: 0; margin-left: 0; margin-bottom: 0.5em; height: 1px; background-color: #e1e0e1;"></p>
                                </div>
                            </div>
                            <div style="display: flex; justify-content: space-between">
                                <div>
                                    <span style="font-family: 'Quicksand', sans-serif; font-weight: 500; color: #696969; font-size: 0.9em;">Reminder Alarm</span>
                                </div>
                                <div>
                                    <span class="selectedReminder" style="color: #d9d8d9; margin-right: 0.5em; font-size: 0.8em;">None</span>
                                </div>
                            </div>
                            <div class="row parentRemind" style="margin-bottom: 0.3em; margin-top: 1em;" hidden>
                                <div class="col s12">
                                    <div class="navbar" style="height: 1.8em; border-radius: 2em; display: flex; justify-content: space-between;">
                                        <div onclick="remindMinutes()">
                                            <p id="minutes" class="minutes activeRemind">15 MINUTES</p>
                                            <input type="text" hidden class="remindMinutes" name="remindAlarm">
                                        </div>
                                        <div onclick="remindHours()">
                                            <p id="hours" class="hours">1 HOUR</p>
                                            <input type="text" hidden class="remindHours" name="remindAlarm">
                                        </div>
                                        <div onclick="remindDays()">
                                            <p id="days" class="days">1 DAY</p>
                                            <input type="text" hidden class="remindDays" name="remindAlarm">
                                        </div>
                                        <div onclick="remindFollow()">
                                            <p id="follow" class="follow">FOLLOW</p>
                                            <input type="text" hidden class="remindFollow" name="remindAlarm">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="tableCrewRemind" hidden>
                                <tbody class="targetRemindName"></tbody>
                            </table>
                            <div style="margin-top: 6px; margin-bottom:0; margin-left: 0.5em;">
                                <span><i class="fas fa-plus"></i></span>
                                <input type="text" readonly placeholder="Add Peer..." data-trigg="inputSubjobRemind" class="subjobField">
                                <span class="modal-trigger" href="#modalAddRemind"><img src="<?= base_url(); ?>/assets/images/info1.png" width="19" height="19" alt=""></span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row valign-wrapper" style="margin-bottom: 0.7em;">
    <div class="col s12 m6 offset-m3">
        <div class="card" style="border-radius: 1.3em; box-shadow: none;">
            <div class="card-content" style="padding: 0.3em;">
                <div style="display: flex; justify-content: space-between; padding: 0.8em 1.4em;">
                    <div class="valign-wrapper">
                        <img src="<?= base_url(); ?>/assets/images/prio1.png" width="20" height="20" alt=""> <span style="margin-left: 0.7em; color: #6a6a6a; font-size: 0.9em; font-family: 'Quicksand', sans-serif; font-weight: 600;">Prioritize</span>
                    </div>
                    <div class=" valign-wrapper" style="text-align: right;">
                        <div class="arrowPrio" onclick="showPrio()">
                            <img src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">
                        </div>
                        <input type="text" hidden class="prioField" name="prioField">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row valign-wrapper" style="margin-bottom: 0.7em;">
    <div class="col s12 m6 offset-m3">
        <div class="card" style="border-radius: 1.3em; box-shadow: none;">
            <div class="card-content" style="padding: 0.3em;">
                <div style="display: flex; justify-content: space-between; padding: 0.8em 1.4em;">
                    <div class="valign-wrapper">
                        <img src="<?= base_url(); ?>/assets/images/assessor.png" width="20" height="20" alt=""> <span style="margin-left: 0.7em; color: #6a6a6a; font-size: 0.9em; font-family: 'Quicksand', sans-serif; font-weight: 600;">Add Co-Assessor</span>
                    </div>
                    <div class="modal-trigger valign-wrapper" href="#modalAddAssessor" style="text-align: right;">
                        <span class="spanAssessor" style="color: #d9d8d9; margin-right: 0.5em; font-size: 0.8em;">None</span>
                        <input hidden type="text" class="targetAssessor1" name="targetAssessor1">
                        <img src="<?= base_url(); ?>/assets/images/arrowright.png" width="10" height="10" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row valign-wrapper" style="margin-bottom: 0.7em;">
    <div class="col s12 m6 offset-m3">
        <div class="card" style="border-radius: 1.3em; box-shadow: none;">
            <div class="card-content" style="padding: 0.3em;">
                <form action="" id="uploadFileAdmin" enctype="multipart/form-data">
                    <label data-trigg="fileUpload" for="fileUpload">Add image...</label>
                    <span style="color: #40a1f8; font-size: 0.8em;" class="spanEditUpload" hidden>Edit</span>
                    <input type="file" id="fileUpload" class="fileUploadAdmin" multiple name="fileUploadAdmin[]" accept="image/x-png,image/gif,image/jpeg,image/jpg" placeholder="Job Title" onchange="saveUpload(this)">
                    <input type="text" class="idJobGroup1" name="idJobGroup1" style="display: none;">
                    <input type="text" class="idSubjob1" name="idSubjob1" style="display: none;">
                </form>
                <div id="previewImg"></div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="row valign-wrapper">
    <div class="col s12 valign-wrapper">
        <form action="" id="uploadFile" enctype="multipart/form-data">
            <label data-trigg="fileUpload" for="fileUpload">Add image...</label>
            <input type="file" id="fileUpload" class="fileUploadAdmin" placeholder="Job Title" onchange="saveUpload()">
        </form>
    </div>
</div> -->

<div class="row valign-wrapper" style="padding: 0; margin-top: 0;">
    <div class="col s12 m6 offset-m3">
        <div class="card" style="border-radius: 1.6em; box-shadow: none; height: 9em;  margin-top: 0;">
            <div class="card-content" style="padding: 0.3em 0;">
                <div class="textareaContainer1">
                    <textarea class="notesField" name="notesField" id="" rows="4" placeholder="Notes"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>



<!------------------------- modal remind other -------------------------->

<div id="modalAddRemind" class="modal bottom-sheet">
    <div class="modal-content" style="margin: 0; padding-top: 0;">
        <div class="targetAddRemind"></div>
    </div>
</div>

<!------------------------- modal remind other -------------------------->

<!------------------------- modal remind other -------------------------->

<div id="modalShowImage" class="modal">
    <div class="modal-content">
        <div class="targetShowImage"></div>
    </div>
</div>

<!------------------------- modal remind other -------------------------->

<script>
    $(document).ready(function() {

        var sliderr = document.getElementById('slider');

        noUiSlider.create(sliderr, {
            start: [9],
            connect: 'lower',
            step: 0.5,
            range: {
                'min': [9],
                'max': [17]
            }
        });
        $('.showValueSlider').click(function() {
            console.log(sliderr.noUiSlider.get());
        })

        slider.noUiSlider.on('slide', function() {
            var sliderValue = slider.noUiSlider.get();
            var split = sliderValue.split('.');
            $('.inputHour').val(split[0]);

            if (split[1] == '50') {
                var newMinutes = '30';
            } else {
                var newMinutes = '00';
            }
            $('.inputMinutes').val(newMinutes);

            var minutes = $('.inputMinutes').val();
            $('.spanDeadlineHour').text(split[0] + ':' + minutes);
        })

        $('#calendar').simpleCalendar({
            displayYear: false, // Display year in header
            fixedStartDay: true, // Week begin always by monday or by day set by number 0 = sunday, 7 = saturday, false = month always begin by first day of the month
            displayEvent: false, // Display existing event
            disableEventDetails: false, // disable showing event details
            disableEmptyDetails: false,
            startData: new Date()
        }.then(fixCalendar()));

        $('.arrowDeadlineDate').click(function(e) {
            e.preventDefault();
            var deadlineDate = $('.deadlineDateField').val();

            if (deadlineDate == '') {
                //collapse active
                collapseDeadlineDate();
            } else {
                //change icon toggle from active to default
                var toggleDef = '<img id="arrowDeadlineDate" src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">';
                $('.arrowDeadlineDate').html(toggleDef);

                //clear field input
                $('.deadlineDateField').val('');

                //change span
                $('.spanDeadlineDate').text('Same');
                $('.spanDeadlineDate').css({
                    "color": "#e2e2e2"
                });

                $('.collapDeadlineDate').collapsible('close');
            }
        })

        $('.arrowDeadlineHour1').click(function(e) {
            e.preventDefault();

            var hour = $('.inputHour').val();
            var imgdef = '<img id="arrowDeadlineHour1" src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">';
            var imgact = '<img id="arrowDeadlineHour1" src="<?= base_url(); ?>/assets/images/toggleactive.png" width="35" height="20" alt="">';

            if (hour == '') {
                collapseDeadlineHour();
            } else {
                //change toggle button
                $('.arrowDeadlineHour1').html(imgdef);

                //change span 
                $('.spanDeadlineHour').text('Same');
                $('.spanDeadlineHour').css({
                    "color": "#e2e2e2"
                });

                //clear value 
                $('.inputHour').val('');
                $('.inputMinutes').val('');

                $('.collapDeadlineHour').collapsible('close');
            }
        })

        $('.day').click(function(e) {
            e.preventDefault();
            var data = $(this).attr('data-date');

            var last = $('.today').attr('data-date');
            $('div[data-date="' + last + '"]').attr('class', 'day');
            $('div[data-date="' + data + '"]').attr('class', 'day today');

            //change span
            var today = $('.today').attr('data-date').substring(0, 10);

            var getRealDate = new Date(today).getTime() + (1 * 24 * 60 * 60 * 1000);
            var y = new Date(getRealDate).getFullYear();
            var m = addZero(new Date(getRealDate).getMonth() + 1);
            var d = addZero(new Date(getRealDate).getDate());

            var newDate = y + '-' + m + '-' + d;
            $('.deadlineDateField').val(newDate);

            var span = convertMonth(new Date(getRealDate).getMonth());

            $('.spanDeadlineDate').text(d + ' ' + span);
            $('.spanDeadlineDate').css({
                "font-size": "0.9em",
                "color": "#5f5e5e",
                "margin-right": "0.6em"
            });
        })

        $('.stoppableToggle').click(function(e) {
            e.preventDefault();
            var imgdef = '<img src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">';
            var imgact = '<img src="<?= base_url(); ?>/assets/images/toggleactive.png" width="35" height="20" alt="">';
            var stoppable = $('.stoppable').val();

            if (stoppable == '') {
                //active
                $('.stoppableToggle').html(imgact);
                $('.stoppable').val('1');
            } else {
                $('.stoppableToggle').html(imgdef);
                $('.stoppable').val('');
            }
        })

        showDetailRemind();
        init_modal_remind();
        init_modal_showImage();
        collapseDeadlineDate();
        collapseDeadlineHour();

        $('.collapRemind').collapsible({
            onOpenEnd: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/toggledefault.png" width=35 height="20" alt="">';
                var imgactive = '<img src="<?= base_url(); ?>/assets/images/toggleactive.png" width=35 height="20" alt="">';
                $('.arrowRemind').html('');
                $('.arrowRemind').html(imgactive);
            },
            onCloseEnd: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/toggledefault.png" width=35 height="20" alt="">';
                var imgactive = '<img src="<?= base_url(); ?>/assets/images/toggleactive.png" width=35 height="20" alt="">';

                $('.arrowRemind').html('');
                var remind = $('input[name="idSelectedRemind"]').map(function() {
                    return $(this).val();
                }).toArray().filter(function(e) {
                    return e != null && e != '';
                });

                if (remind.length > 0) {
                    $('.arrowRemind').html(imgactive);
                } else if (remind.length == 0) {
                    $('.arrowRemind').html(img);
                }
            }
        });

        $('.collapApproval').collapsible({
            onOpenEnd: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">';
                var imgactive = '<img src="<?= base_url(); ?>/assets/images/uparrow.png" width="15" height="15" alt="">';
                $('.arrowApproval').html('');
                $('.arrowApproval').html(imgactive);
            },
            onCloseEnd: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">';
                $('.arrowApproval').html('');
                $('.arrowApproval').html(img);
            }
        })
    });

    function fixCalendar(){
        var today   = new Date();
        $('#calendar table tr td').each(function(){
            var dates   = $(this).data('date');
            var day     = dates.getDay();
            if(today >= dates){
                $(this).html('day');
                $(this).css('background-color','red');
            }
        });
    }

    function collapseDeadlineDate() {
        $('.collapDeadlineDate').collapsible({
            onOpenEnd: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/toggleactive.png" width=35 height="20" alt="">';
                $('.arrowDeadlineDate').html('');
                $('.arrowDeadlineDate').html(img);

                var today = $('.today').attr('data-date').substring(0, 10);

                var getRealDate = new Date(today).getTime() + (1 * 24 * 60 * 60 * 1000);
                var y = new Date(getRealDate).getFullYear();
                var m = addZero(new Date(getRealDate).getMonth() + 1);
                var d = addZero(new Date(getRealDate).getDate());

                var selectDate = y + '-' + m + '-' + d;
                var span = convertMonth(new Date(getRealDate).getMonth());

                $('.spanDeadlineDate').text(d + ' ' + span);
                $('.deadlineDateField').val(selectDate);
                $('.spanDeadlineDate').css({
                    "font-size": "0.9em",
                    "color": "#5f5e5e",
                    "margin-right": "0.6em"
                });
            },
            onCloseEnd: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/toggledefault.png" width=35 height="20" alt="">';
                var imgActive = '<img src="<?= base_url(); ?>/assets/images/toggleactive.png" width=35 height="20" alt="">';

                // var deadline = $('.deadlineDateField').val();
                // if (deadline != '' || deadline != null) {
                //     $('.arrowDeadlineDate').html(imgActive);
                // } else {
                //     $('.arrowDeadlineDate').html(img);
                // }
            }
        });
    }

    function collapseDeadlineHour() {
        $('.collapDeadlineHour').collapsible({
            onOpenStart: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/toggleactive.png" width=35 height="20" alt="">';
                $('.arrowDeadlineHour1').html('');
                $('.arrowDeadlineHour1').html(img);
                $('.spanDeadlineHour').text('9:00');
                $('.spanDeadlineHour').css({
                    "color": "#5d5e5e",
                    "font-weight": "400"
                })

                $('.inputHour').val('09');
                $('.inputMinutes').val('00');
            },
            onCloseEnd: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/toggledefault.png" width=35 height="20" alt="">';
                var imgactive = '<img src="<?= base_url(); ?>/assets/images/toggleactive.png" width=35 height="20" alt="">';
                $('.arrowDrop2').html('');
                $('.arrowDrop2').html(img);
            }
        });
    }

    function changeSlider() {
        var sliderr = document.getElementById('slider');
        var hour = $('.inputHour').val();
        var minutes = $('.inputMinutes').val();

        if (minutes == '00') {
            sliderr.noUiSlider.set(hour);
        } else {
            sliderr.noUiSlider.set(hour + '.' + '50');
        }

        $('.spanDeadlineHour').text(hour + ':' + minutes);
    }

    function saveUpload(input) {
        var form = document.getElementById('uploadFileAdmin');
        var imgLen = input.files.length;

        $.ajax({
            type: "POST",
            data: new FormData(form),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            url: '<?= base_url('jzl/MobileJob/uploadFile'); ?>',
            dataType: 'json',
            success: function(result) {
                getImage(result.idSubjob);
            }
        })
    }

    function getImage(idSubjob) {
        $.ajax({
            type: 'POST',
            data: {
                idSubjob: idSubjob,
                source: 'img_refer, id, id_title',
                table: 'subjob'
            },
            url: '<?= base_url('jzl/MobileJob/getImage'); ?>',
            dataType: 'json',
            success: function(result) {
                var img = '';
                for (var i = 0; i < result.image.length; i++) {
                    var src = '<?= base_url(); ?>/uploads/job/' + result.idJob + '/' + result.image[i];
                    var click = "'" + result.image[i] + "'";

                    img += '<span class="deleteImgBtn" id="' + i + '" onclick="deleteImg(' + idSubjob + ', ' + click + ', ' + i + ')" hidden><img src="<?= base_url(); ?>/assets/images/stopbtn.png" width="17" height="17"></span>' +
                        '<img class="stylingImage" onclick="showImage(' + result.idJob + ', ' + click + ')" id="' + i + '" src="' + src + '" widht="50" height="50" style="transition: ease 1s;">';
                    $('.spanEditUpload').attr('onclick', 'detailImage(' + idSubjob + ', ' + click + ')');
                }

                $('#previewImg').html(img);
                $('.spanEditUpload').removeAttr('hidden');
            }
        })
    }

    function showImage(idJob, imgName) {
        $('#modalShowImage').modal('open');

        var src = '<?= base_url(); ?>uploads/job/' + idJob + '/' + imgName;
        var img = '<img class="detailImage" src="' + src + '" >';

        $('.targetShowImage').html(img);
    }

    function detailImage(idSubjob, imgName) {
        $('.stylingImage').css({
            "width": "50px",
            "height": "50px",
            "margin": "3px 7px"
        });
        $('.deleteImgBtn').removeAttr('hidden');
        $('.deleteImgBtn').css({
            "margin-left": "3px"
        });

        var click = "'" + imgName + "'";

        $('.spanEditUpload').removeAttr('onclick');
        $('.spanEditUpload').text('Done');
        $('.spanEditUpload').attr('onclick', 'finishEdit(' + idSubjob + ', ' + click + ')');
    }

    function deleteImg(idSubjob, imgName, idForm) {
        $.ajax({
            type: 'POST',
            data: {
                idSubjob: idSubjob,
                imgName: imgName,
                source: 'img_refer, id_title',
                field: 'img_refer'
            },
            url: '<?= base_url('jzl/MobileJob/deleteImg'); ?>',
            dataType: 'json',
            success: function(result) {
                if (result.message == 'success') {
                    $('img[id="' + idForm + '"]').css({
                        "width": "0",
                        "height": "0"
                    })
                    $('span[id="' + idForm + '"]').remove();
                    $('img[id="' + idForm + '"]').remove();
                }
            }
        })
    }

    function finishEdit(idSubjob, imgName) {
        var click = "'" + imgName + "'";
        $('.stylingImage').css({
            "width": "35px",
            "height": "35px",
            "margin": "3px 5px"
        });

        $('.deleteImgBtn').css({
            "display": "none"
        });

        $('.spanEditUpload').removeAttr('onclick');
        $('.spanEditUpload').text('Edit');
        $('.spanEditUpload').attr('onclick', 'detailImage(' + idSubjob + ', ' + imgName + ')');
        setTimeout(function() {
            getImage(idSubjob);
        }, 1100);
    }

    function addZero(data) {
        if (data < '10') {
            var result = '0' + data;
        } else if (data > '9') {
            var result = data;
        }

        return result;
    }

    function switchOrder(id) {
        var dataChange = $('span[data-id="' + id + '"]').attr('data-change');

        var imgactive = '<img src="<?= base_url(); ?>assets/images/toggleactive.png" width="35" height="20" alt="">';
        var imgdefault = '<img src="<?= base_url(); ?>assets/images/toggledefault.png" width="35" height="20" alt="">';

        if (dataChange == 'toggleActive') {
            $('span[data-id="' + id + '"]').attr('data-change', 'toggleDefault');
            $('span[data-id="' + id + '"]').html(imgdefault);
            $('span[data-id="' + id + '"]').attr('data-check', '');

            //clear value
            $('#coadminField' + id).val('');

            //clear view
            $('#pName' + id).css({
                "color": "#d9d8d9"
            });
            $('#pId' + id).css({
                "border": "0.4px solid #fff",
                "color": "#fff"
            });

        } else {
            $('span[data-id="' + id + '"]').attr('data-change', 'toggleActive');
            $('span[data-id="' + id + '"]').html(imgactive);
            $('span[data-id="' + id + '"]').attr('data-check', '1');

            //add values 
            $('#coadminField' + id).val(id);

            //add view
            $('#pName' + id).css({
                "color": "#939392"
            });
            $('#pId' + id).css({
                "border": "0.4px solid #d8d7d8",
                "color": "#d8d7d8"
            });

        }
        //validation
        var dataCheck = $('span[id="spanSwitchOrder"]').map(function() {
            return $(this).attr('data-check');
        }).toArray().filter(function(e) {
            return e != null && e != '';
        });

        if (dataCheck.length == 0) {
            swal('Warning', 'Coadmin field cannot be null, at least you have one coadmin', 'warning', {
                buttons: false,
                timer: 1500
            });

            //change to active again
            $('span[data-id="' + id + '"]').attr('data-change', 'toggleActive');
            $('span[data-id="' + id + '"]').html(imgactive);
            $('span[data-id="' + id + '"]').attr('data-check', '1');
        }

        //change span
        var name = $('span[data-change="toggleActive"]').map(function() {
            return $(this).attr('data-name');
        }).toArray().filter(function(e) {
            return e != null && e != '';
        });

        if (name.length == 1) {
            $('.spanApproval').text('Only ' + name[0]);
        } else {
            $('.spanApproval').text(name[0] + ', Then ' + name[1]);
        }

        //change position
        var coadminArr = $('input[name="coadminField"]').map(function() {
            return $(this).val();
        }).toArray();

        if (coadminArr[0] == '') {
            //move to the top

            //get name, id by att data-change active
            var activeName = $('span[data-change="toggleActive"]').attr('data-name');
            var idActive = $('span[data-change="toggleActive"]').attr('data-id');

            var defName = $('span[data-change="toggleDefault"]').attr('data-name');
            var defId = $('span[data-change="toggleDefault"]').attr('data-id');

            var trSuperAdmin = '<tr>' +
                '<td style="width: 0.8em;">' +
                '<p class="numberSuperAdmin" id="pId' + defId + '" style="transition: ease .5s; border: 0.4px solid #fff; border-radius: 1.4em; font-size: 0.3em; padding: 0.3em 0.5em; color: #fff;">2</p>' +
                '</td>' +
                '<td style="width: 14em; padding: 0;">' +
                '<p id="pName' + defId + '" class="nameSuperAdmin" style="transition: ease .5s; color: #d9d8d9; font-size: 0.7em; margin-left: 1.5em;">' + defName + '</p>' +
                '<input type="text" hidden class="coadminField" name="coadminField" id="coadminField' + defId + '">' +
                '</td>' +
                '<td style="width: 2em; padding: 0;"><span data-change="toggleDefault" class="spanSwitchOrder" id="spanSwitchOrder" data-check="" data-name="' + defName + '" data-id="' + defId + '" onclick="switchOrder(' + defId + ')"><img src="<?= base_url(); ?>assets/images/toggledefault.png" width="35" height="20" alt=""></span></td>' +
                '</tr>';
            $('.targetBodyCoadmin').html(trSuperAdmin);

            var trCoadmin = '<tr>' +
                '<td style="width: 0.8em;">' +
                '<p class="numberCoadmin" id="pId' + idActive + '" style="transition: ease 0.5s; border: 0.4px solid #d8d7d8; border-radius: 1.4em; font-size: 0.3em; padding: 0.3em 0.5em; color: #d8d7d8;">1</p>' +
                '</td>' +
                '<td style="width: 14em; padding: 0;">' +
                '<p class="nameCoadmin" pName="' + idActive + '" style="transition: ease 0.5s; color: #939392; font-size: 0.7em; margin-left: 1.5em;">' + activeName + '</p>' +
                '<input type="text" hidden class="coadminField" id="coadminField' + idActive + '" name="coadminField" value="' + idActive + '">' +
                '</td>' +
                '<td style="width: 2em; padding: 0;"><span data-change="toggleActive" class="spanSwitchOrder" id="spanSwitchOrder" data-check="1" data-name="' + activeName + '" data-id="' + idActive + '" onclick="switchOrder(' + idActive + ')"><img src="<?= base_url(); ?>assets/images/toggleactive.png" width="35" height="20" alt=""></span></td>' +
                '</tr>';
            $('.targetBodySuperAdmin').html(trCoadmin);
        }

        //change button role
        var coadminVal = $('input[name="coadminField"]').map(function() {
            return $(this).val();
        }).toArray().filter(function(e) {
            return e != null && e != '';
        });
        console.log(coadminVal);

        if (coadminVal.length > 1) {
            $('.buttonSwitch').css({
                "background-color": "#65b66f"
            });
            $('.buttonSwitch').attr('onclick', 'switchCoadmin()');
        } else {
            $('.buttonSwitch').css({
                "background-color": "#ebeaeb"
            });
            $('.buttonSwitch').removeAttr('onclick');
        }
    }

    function switchCoadmin() {
        var name = $('span[data-change="toggleActive"]').map(function() {
            return $(this).attr('data-name');
        }).toArray();
        var id = $('span[data-change="toggleActive"]').map(function() {
            return $(this).attr('data-id');
        }).toArray();

        var latestAdmin = '<tr>' +
            '<td style="width: 0.8em;">' +
            '<p class="numberSuperAdmin" id="pId' + id[0] + '" style="transition: ease .5s; border: 0.4px solid #d8d7d8; border-radius: 1.4em; font-size: 0.3em; padding: 0.3em 0.5em; color: #d8d7d8;">2</p>' +
            '</td>' +
            '<td style="width: 14em; padding: 0;">' +
            '<p id="pName' + id[0] + '" class="nameSuperAdmin" style="transition: ease .5s; color: #939392; font-size: 0.7em; margin-left: 1.5em;">' + name[0] + '</p>' +
            '<input type="text" hidden class="coadminField" name="coadminField" id="coadminField' + id[0] + '" value="' + id[0] + '">' +
            '</td>' +
            '<td style="width: 2em; padding: 0;"><span data-change="toggleActive" class="spanSwitchOrder" id="spanSwitchOrder" data-check="1" data-name="' + name[0] + '" data-id="' + id[0] + '" onclick="switchOrder(' + id[0] + ')"><img src="<?= base_url(); ?>assets/images/toggleactive.png" width="35" height="20" alt=""></span></td>' +
            '</tr>';

        var latestCoadmin = '<tr>' +
            '<td style="width: 0.8em;">' +
            '<p class="numberCoadmin" id="pId' + id[1] + '" style="transition: ease 0.5s; border: 0.4px solid #d8d7d8; border-radius: 1.4em; font-size: 0.3em; padding: 0.3em 0.5em; color: #d8d7d8;">1</p>' +
            '</td>' +
            '<td style="width: 14em; padding: 0;">' +
            '<p class="nameCoadmin" pName="' + id[1] + '" style="transition: ease 0.5s; color: #939392; font-size: 0.7em; margin-left: 1.5em;">' + name[1] + '</p>' +
            '<input type="text" hidden class="coadminField" id="coadminField' + id[1] + '" name="coadminField" value="' + id[1] + '">' +
            '</td>' +
            '<td style="width: 2em; padding: 0;"><span data-change="toggleActive" class="spanSwitchOrder" id="spanSwitchOrder" data-check="1" data-name="' + name[1] + '" data-id="' + id[1] + '" onclick="switchOrder(' + id[1] + ')"><img src="<?= base_url(); ?>assets/images/toggleactive.png" width="35" height="20" alt=""></span></td>' +
            '</tr>';

        $('.targetBodySuperAdmin').html(latestCoadmin);
        $('.targetBodyCoadmin').html(latestAdmin);

        //change span
        var newName = $('span[data-change="toggleActive"]').map(function() {
            return $(this).attr('data-name');
        }).toArray();
        var newId = $('span[data-change="toggleActive"]').map(function() {
            return $(this).attr('data-id');
        }).toArray();

        $('.spanApproval').text(newName[0] + ', Then ' + newName[1]);
    }

    function convertDate(data) {
        var today = data.substring(0, 10);

        var getRealDate = new Date(today).getTime() + (1 * 24 * 60 * 60 * 1000);
        var y = new Date(getRealDate).getFullYear();
        var m = addZero(new Date(getRealDate).getMonth());
        var d = addZero(new Date(getRealDate).getDate());

        var selectDate = y + '-' + m + '-' + d;

        return selectDate;
    }

    function convertMonth(data) {
        var month = new Array();
        month[0] = "Jan";
        month[1] = "Feb";
        month[2] = "Mar";
        month[3] = "Apr";
        month[4] = "May";
        month[5] = "Jun";
        month[6] = "Jul";
        month[7] = "Aug";
        month[8] = "Sep";
        month[9] = "Oct";
        month[10] = "Nov";
        month[11] = "Dec";
        var n = month[data];

        return n;
    }

    function changeDay(trigger) {
        $('#today').removeAttr('class');
        $('#tomorrow').removeAttr('class');
        $('#yesterday').removeAttr('class');
        $('#nextWeek').removeAttr('class');

        $('#' + trigger).addClass('activeDay');
        var dateTime = '<?= date('Y-m-d' . 'T17:00:00.000Z'); ?>';
        if (trigger == 'yesterday') {
            var showTime = '<?= date('Y-m-d', strtotime('-2 days', strtotime(date('Y-m-d')))); ?>';
            var field = '<?= date('Y-m-d', strtotime('-1 days', strtotime(date('Y-m-d')))); ?>';
            var span = '<?= date('d M', strtotime('-1 days', strtotime(date('d M')))); ?>';
            var newDateTime = showTime + 'T17:00:00.000Z';
        } else if (trigger == 'today') {
            var showTime = '<?= date('Y-m-d', strtotime('-1 days', strtotime(date('Y-m-d')))); ?>';
            var field = '<?= date('Y-m-d'); ?>';
            var span = '<?= date('d M'); ?>';
            var newDateTime = showTime + 'T17:00:00.000Z';
        } else if (trigger == 'tomorrow') {
            var showTime = '<?= date('Y-m-d'); ?>';
            var field = '<?= date('Y-m-d', strtotime('+1 days', strtotime(date('Y-m-d')))); ?>';
            var span = '<?= date('d M', strtotime('+1 days', strtotime(date('d M')))); ?>';
            var newDateTime = showTime + 'T17:00:00.000Z';
        } else if (trigger == 'nextWeek') {
            var showTime = '<?= date('Y-m-d', strtotime('+7 days', strtotime(date('Y-m-d')))); ?>';
            var field = '<?= date('Y-m-d', strtotime('+8 days', strtotime(date('Y-m-d')))); ?>';
            var span = '<?= date('d M', strtotime('+8 days', strtotime(date('d M')))); ?>';
            var newDateTime = showTime + 'T17:00:00.000Z';
        }

        var last = $('.today').attr('data-date');


        $('div[data-date="' + last + '"]').attr('class', 'day');
        $('div[data-date="' + newDateTime + '"]').attr('class', 'day today');
        $('.spanDeadlineDate').text(span);
        $('.deadlineDateField').val(field)
    }

    function init_modal_remind() {

        $('#modalAddRemind').modal({
            opacity: 0.5,
            inDuration: 200,
            outDuration: 200,
            ready: undefined,
            complete: undefined,
            dismissible: true,
            startingTop: '14%',
            endingTop: '70%',
            onOpenStart: function() {
                var remind = $('input[name="idSelectedRemind"]').map(function() {
                    return $(this).val();
                }).toArray().filter(function(e) {
                    return e != null && e != '';
                });

                for (var i = 0; i < remind.length; i++) {
                    $('input[data-id-value-remind="' + remind[i] + '"]').val(remind[i]);
                }
            }
        });
    }

    function init_modal_showImage() {

        $('#modalShowImage').modal({
            opacity: 0.5,
            inDuration: 200,
            outDuration: 200,
            ready: undefined,
            complete: undefined,
            dismissible: true,
        });
    }

    function remindMinutes() {
        $('#minutes').attr('class', 'minutes activeRemind');
        $('#hours').attr('class', 'hours');
        $('#days').attr('class', 'days');
        $('#follow').attr('class', 'follow');
        $('.selectedReminder').text('15 minutes before deadline');

        $('.remindMinutes').val(1);
        $('.remindHours').val('');
        $('.remindDays').val('');
        $('.remindFollow').val('');
    }

    function remindHours() {
        $('#minutes').attr('class', 'minutes');
        $('#hours').attr('class', 'hours activeRemind');
        $('#days').attr('class', 'days');
        $('#follow').attr('class', 'follow');
        $('.selectedReminder').text('1 hour before deadline');
        $('.remindMinutes').val('');
        $('.remindHours').val(2);
        $('.remindDays').val('');
        $('.remindFollow').val('');
    }

    function remindDays() {
        $('#minutes').attr('class', 'minutes');
        $('#hours').attr('class', 'hours');
        $('#days').attr('class', 'days activeRemind');
        $('#follow').attr('class', 'follow');
        $('.selectedReminder').text('1 day before deadline');
        $('.remindMinutes').val('');
        $('.remindHours').val('');
        $('.remindDays').val(3);
        $('.remindFollow').val('');
    }

    function remindFollow() {
        $('#minutes').attr('class', 'minutes');
        $('#hours').attr('class', 'hours');
        $('#days').attr('class', 'days');
        $('#follow').attr('class', 'follow activeRemind');
        $('.selectedReminder').text('from start to finish');
        $('.remindMinutes').val('');
        $('.remindHours').val('');
        $('.remindDays').val('');
        $('.remindFollow').val(4);
    }

    function showPrio() {
        var imgactive = '<img src="<?= base_url(); ?>/assets/images/toggleactive.png" width=35 height="20" alt="">';
        var imgdefault = '<img src="<?= base_url(); ?>/assets/images/toggledefault.png" width=35 height="20" alt="">';

        var prio = $('.prioField').val();
        if (prio == '') {
            $('.arrowPrio').html(imgactive);
            $('.prioField').val(1);
        } else {
            $('.arrowPrio').html(imgdefault);
            $('.prioField').val('');
        }
    }

    function saveSubjob(idForm) {
        var idSubjob = $('.finalIdSubjob').val();
        var subjob = $('.subjobField1').val();
        var purpose = $('.purposeSubjob').val();
        var deadlineDate = $('.deadlineDateField').val();
        var hour = $('.inputHour').val();
        var minutes = $('.inputMinutes').val();
        var deadlineHour = hour + ':' + minutes;
        var remind = $('input[name="idSelectedRemind"]').map(function() {
            return $(this).val();
        }).toArray().filter(function(e) {
            return e != null && e != '';
        });
        var assessor = $('input[id="targetAssessor1' + idForm + '"]').val();
        var code = $('.codeSubjob').val();
        var coadmin = $('input[name="coadminField"]').map(function() {
            return $(this).val();
        }).toArray().filter(function(e) {
            return e != null && e != '';
        });
        var priority = $('.prioField').val();
        var note = $('.notesField').val();
        var stoppable = $('.stoppable').val();
        var remindAlarm = $('input[name="remindAlarm"]').map(function() {
            return $(this).val();
        }).toArray().filter(function(e) {
            return e != null && e != '';
        });
        $.ajax({
            type: 'POST',
            data: {
                idSubjob: idSubjob,
                subjob: subjob,
                purpose: purpose,
                deadlineDate: deadlineDate,
                deadlineHour: deadlineHour,
                remind: remind,
                assessor: assessor,
                code: code,
                coadmin: coadmin,
                priority: priority,
                note: note,
                stoppable: stoppable,
                remindAlarm: remindAlarm[0]
            },
            url: '<?= base_url('jzl/MobileJob/saveConclusion'); ?>',
            dataType: 'json',
            success: function(result) {
                var toggledefault = '<img src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">';
                var toggleactive = '<img src="<?= base_url(); ?>/assets/images/toggleactive.png" width="35" height="20" alt="">';

                if (result.deadlineDate == null || result.deadlineDate == '') {
                    var newDeadline = 'No Deadline';
                } else {
                    var newDeadline = result.deadlineDate;
                }

                var numberTab = $('td[class="subjobTab"]').map(function() {
                    return $(this).text();
                }).toArray();

                if (numberTab == '' || numberTab == null) {
                    var numTab = '1'
                } else {
                    var numTab = (numberTab.length + 1);
                }

                //update deadline field in job field
                // $('#finalIdSubjob1' + idForm).val(idSubjob);
                $('#finalSubjob' + idForm).val(subjob);
                $('#finalPurpose' + idForm).val(purpose);
                $('#finalDeadlineDate' + idForm).val(deadlineDate);
                $('#finalDeadlineHour' + idForm).val(deadlineHour);
                $('#finalRemind' + idForm).val(remind);
                $('#finalAssessor' + idForm).val(assessor);
                $('#finalCoadmin' + idForm).val(coadmin);
                $('#finalPriority' + idForm).val(priority);
                $('#finalNote' + idForm).val(note);
                $('#finalStoppable' + idForm).val(stoppable);
                $('#finalRemindAlarm' + idForm).val(remindAlarm[0]);
                $('#finalCode' + idForm).val(code);

                $('#manualSubjobField' + idForm).val(subjob);
                $('.deadlineFieldIndex' + idForm).text(newDeadline);

                $('#modalAddSubjob').modal('close');

                //clear as default
                $('.subjobField1').val('');
                $('.collapApproval').collapsible('close');
                $('.purposeSubjob').val('');
                $('.deadlineDateField').val('');
                $('.spanDeadlineDate').text('Same');
                $('.spanDeadlineDate').css({
                    "color": "#e2e2e2"
                });
                $('.collapDeadlineDate').collapsible('close');
                $('.arrowDeadlineDate').html(toggledefault);
                $('.inputHour').val('');
                $('.inputMinutes').val('');
                $('.spanDeadlineHour').text('Same');
                $('.spanDeadlineHour').css({
                    "color": "#e2e2e2"
                });
                $('.collapDeadlineHour').collapsible('close');
                $('.arrowDeadlineHour1').html(toggledefault);
                $('.collapRemind').collapsible('close');
                $('.arrowRemind').html(toggledefault);
                $('.stoppable').val('');
                $('.stoppableToggle').html(toggledefault);
                $('.divStoppable').prop('hidden', true);
                $('.parentRemind').prop('hidden', true);
                $('.remindAlarm').val('');
                $('.selectedReminder').text('');
                $('.input[name="remindAlarm"]').val('');
                $('.input[name="idSelectedRemind"]').val('');
                $('.targetRemindName').html('');
                $('.prioField').val('');
                $('.arrowPrio').html(toggledefault);
                $('.spanAssessor').text('none');
                $('.targetAssessor1').val('');
                $('.previewImg').html('');
                $('.notesField').val('');

                //get the number
                var numberSub = $('td[class="subjobTab"]').map(function() {
                    return $(this).text();
                }).toArray();

                $('.spanNumberSubjob').text(numberSub.length);
            }
        })
    }
</script>