<?php if ($message == 'not found') { ?>
    <div class="row mb-3 text-center">
        <div class="col"></div>
        <div class="col-sm-6 col-md-6">
            <div class="imgReview">
                <img src="<?= base_url(); ?>/assets/images/NeedJob.jpg" width="300" height="300" class="img-fluid" alt="">
                <br>
                <span style="font-size: 1.1em; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Just wait, Enjoy your momment! We'll call you for a awesome Job</span>
            </div>
        </div>
        <div class="col"></div>
    </div>
<?php } else { ?>

    <?php foreach ($result as $row) : ?>
        <div class="row mb-3 text-center">
            <div class="col"></div>
            <div class="col-sm-6 col-md-6">
                <div class="imgReview">
                    <img src="<?= base_url(); ?>/assets/images/review.png" width="75" height="75" class="img-fluid" alt="">
                    <br>
                    <span style="font-size: 0.7em;">-- Review Page --</span>
                </div>
            </div>
            <div class="col"></div>
        </div>
        <div class="row mb-2">
            <div class="col-md-5 col-sm-5 col-xs-5">
                <div class="row mb-2 ml-4">
                    <h5 class="titleReview" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size: 1.2em;">Review</h5>
                </div>

                <div class="row ml-4">
                    <span style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 0.8em; color: #D1D1D1;">Detail Job</span>
                    <div class="divider w-100" style="border-bottom: 1px solid #D1D1D1;"></div>
                </div>

                <div class="row ml-2">
                    <label for="" class="col-form-label col-form-label-sm col-sm-3">Team Name</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control form-control-sm bg-white border-0" value=":" disabled readonly>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm border-0 bg-white font-weight-bold" disabled readonly value="<?= $row->title; ?>">
                    </div>
                </div>

                <div class="row ml-2">
                    <label for="" class="col-form-label col-form-label-sm col-sm-3">Job</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control form-control-sm bg-white border-0" value=":" disabled readonly>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm border-0 bg-white font-weight-bold" disabled readonly value="<?= $row->subjob; ?>">
                    </div>
                </div>

                <div class="row ml-2">
                    <label for="" class="col-form-label col-form-label-sm col-sm-3">Purpose</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control form-control-sm bg-white border-0" value=":" disabled readonly>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm border-0 bg-white font-weight-bold" disabled readonly value="<?= $row->purpose; ?>">
                    </div>
                </div>

                <div class="row ml-2">
                    <label for="" class="col-form-label col-form-label-sm col-sm-3">Goal</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control form-control-sm bg-white border-0" value=":" disabled readonly>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm border-0 bg-white font-weight-bold" disabled readonly value="<?= $row->goal; ?>">
                    </div>
                </div>

                <?php
                $crewSelect = json_decode($row->crew, true);
                $crewName = array();
                foreach ($crewSelect as $r) {
                    if (isset($crewList['c' . $r])) {
                        $crewName[] = $crewList['c' . $r] . ', ';
                    }
                }
                $name = implode(' ', $crewName);
                ?>

                <div class="row ml-2">
                    <label for="" class="col-form-label col-form-label-sm col-sm-3">Crew</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control form-control-sm bg-white border-0" value=":" disabled readonly>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm border-0 bg-white font-weight-bold" disabled readonly value="<?= rtrim($name, ', '); ?>">
                    </div>
                </div>

                <?php
                $newDeadline = json_decode($row->deadline, true);
                for ($i = 1; $i <= count($newDeadline); $i++) {
                    $explode = explode(' ', $newDeadline['d' . $i]);
                    $deadlineDate = toDateDefault($explode[0]) . ', ' . $explode[1];
                }
                ?>

                <div class="row ml-2">
                    <label for="" class="col-form-label col-form-label-sm col-sm-3">Start Date</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control form-control-sm bg-white border-0" value=":" disabled readonly>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm border-0 bg-white font-weight-bold" disabled readonly value="<?= toDateDefault($row->date); ?>">
                    </div>
                </div>

                <div class="row ml-2">
                    <label for="" class="col-form-label col-form-label-sm col-sm-3">End Date</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control form-control-sm bg-white border-0" value=":" disabled readonly>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm border-0 bg-white font-weight-bold" disabled readonly value="<?= $deadlineDate; ?>">
                    </div>
                </div>

            </div>

            <div class="col-md-1 col-sm-1 col-xs-1"></div>

            <div class="col-md-5 col-sm-5 col-xs-5">
                <div class="row mb-2 ml-4">
                    <h5 class="titleReview" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size: 1.2em;">Review</h5>
                </div>

                <div class="row ml-4">
                    <span style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 0.8em; color: #D1D1D1;">Statistic Review</span>
                    <div class="divider w-100" style="border-bottom: 1px solid #D1D1D1;"></div>
                </div>

                <div class="row ml-2">
                    <label for="" class="col-form-label col-form-label-sm col-sm-3">Change Deadline</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control form-control-sm bg-white border-0" value=":" disabled readonly>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm border-0 bg-white font-weight-bold" disabled readonly value="<?= count($newDeadline) . ' times'; ?>">
                    </div>
                </div>

                <div class="row ml-2">
                    <label for="" class="col-form-label col-form-label-sm col-sm-3">Change Deadline</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control form-control-sm bg-white border-0" value=":" disabled readonly>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm border-0 bg-white font-weight-bold" disabled readonly value="<?= count($newDeadline); ?>">
                        <?php print_r($stas); ?>
                    </div>
                </div>

            </div>
        </div>

        <div class="row mb-2 mt-2">
            <div class="col text-center">
                <button class="btn btn-sm btn-primary" style="border-radius: 12px;" onclick="submitJob(<?= $idMaster; ?>)">Submit</button>
                <button class="btn btn-sm btn-warning" style="border-radius: 12px;" onclick="holdJob(<?= $idMaster; ?>)">Hold</button>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- modal -->

    <div class="modal modalReasonHold fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 10px;">
                <div class="modal-body">
                    <div class="row text-center">
                        <div class="form-group">
                            <label for="">Type your reason</label>
                            <input type="text" class="form-control holdReason">
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <button class="btn btn-sm btn-primary" style="border-radius: 12px;">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->

<?php } ?>

<script>
    function submitJob(idSubjob) {
        swal("Are you sure to end this job?", {
                buttons: {
                    cancel: "Wait",
                    catch: {
                        text: "Yes",
                        value: "catch",
                    },
                },
            })
            .then((value) => {
                switch (value) {

                    case "catch":

                        //showing modal for input password ceo
                        var inputField = '<div class="form-group"><label>Password</label><input class="form-control passwordCeo" placeholder="Required CEO Password"><input class="form-control idSub" value="' + idSubjob + '" hidden></div>';
                        var button = '<button class="btn btn-sm btn-primary" style="border-radius: 10px;" onclick="submitPassword">Submit</button>';

                        $('.modalDocument').modal('hide');
                        $('.bodyModalReason').html(inputField);
                        $('.saveReason').text('Submit');
                        $('.saveReason').attr('onclick', 'submitPassword()');
                        $('.modalReason').modal('show');
                        break;

                    default:
                        swal("Okay, check again", {
                            buttons: false,
                            timer: 1500
                        });
                }
            });
    }

    function submitPassword() {
        var pass = $('.passwordCeo').val();
        var id = $('.idSub').val();

        if (pass == 'ansena123') {
            $.ajax({
                type: 'POST',
                data: {
                    id: id
                },
                url: '<?= base_url('job/submitJob'); ?>',
                dataType: 'json',
                success: function(result) {
                    if (result.confirm == 'oke') {
                        swal('Success', 'The ' + result.title + ' job successfully achive', 'success', {
                            buttons: false
                        });
                        setTimeout(function() {
                            var url = '<?= base_url('job'); ?>';
                            window.location = url;
                        }, 2000);
                    } else if (result.message == 'success') {
                        swal('Success', 'You just confirm 1 job, lets create more chalengging job', 'success', {
                            buttons: false,
                            timer: 1500
                        });
                        $('.modalReason').modal('hide');
                        $('.bodyModalReason').html('');
                        $('.saveReason').text('Save Reason');
                        $('.saveReason').removeAttr('onclick');

                        showDetail(result.idJob);
                    }
                }
            });
        } else {
            getToast("Invalid Password", "error");
        }
    }

    function holdJob(idSubjob) {
        $('.modalDocument').modal('hide');
        $('.modalNote').modal('show');
        $('.saveNote').attr('onclick', 'saveReasonHold(' + idSubjob + ')');

        var inputField = '<div class="form-group"><label>Reason</label><input class="form-control inputNote" name="inputNote"></div>'

        $('.bodyModalNote').html(inputField);
    }

    function saveReasonHold(idSubjob) {
        var note = $('.inputNote').val();

        if (note == '') {
            getToast("Reason cannot be null", "warning");
        } else {
            $.ajax({
                type: 'POST',
                data: {
                    id: idSubjob,
                    note: note
                },
                url: '<?= base_url('job/saveReasonHold'); ?>',
                dataType: 'text',
                success: function(result) {
                    $('.modalNote').modal('hide');
                    $('.saveNote').removeAttr('onclick');
                    $('.bodyModalNote').html('');
                    swal('Success', 'Reason has been added', 'success', {
                        buttons: false,
                        timer: 1500
                    });

                    detailSubjob(result);
                }
            })
        }

    }
</script>