<?php $idMaster = $_SESSION['id']; ?>

<div class="col-md-3 col-sm-3 col-xs-12">
    <?php for ($x = 0; $x < count($seriName); $x++) { ?>
        <button class="btn btn-sm w-100 mb-2" style="background-color: #e5e5e5;" type="button" data-toggle="collapse" data-target="#selection<?= $x; ?>" aria-expanded="false" aria-controls="selection<?= $x; ?>">
            <?php if ($_SESSION['id'] == 1) { ?>
                <?= $seriName[$x]; ?>
            <?php } else { ?>
                <?= $seriName[$x]; ?>
                <!-- <div class="row">
                    <div class="col-md-3 col-sm-3"></div>
                    <div class="col-sm-6 col-md-6 text-center">
                        <span><?= $result[$x]['title']; ?> <?= ($result[$x]['leader'] == $_SESSION['id']) ? ' <span class="fw-bold text-danger">(Leader)</span>' : ' <span class="fw-bold">(Crew)</span>'; ?></span>
                    </div>
                    <div class="col-sm-2 col-md-2 text-left">
                        <?php if ($result[$x]['is_note'] == 1) { ?>
                            <span class="badge text-danger bellPopover" data-toggle="popover" data-placement="top" data-content="You have note from CEO"><i class="fas fa-bell"></i>1</span>
                        <?php } ?>
                    </div>
                </div> -->
            <?php } ?>
        </button>

        <div class="collapse mb-2" id="selection<?= $x; ?>">
            <div class="card card-body">
                <?php for ($y = 0; $y < count($result); $y++) { ?>
                    <?php $role = $result[$y]['role']; ?>
                    <div class="table-responsive">
                        <table class="table">
                            <tr style="font-size: 0.8em;" onclick="<?= ($idMaster == 1) ? 'showDetail(' . $result[$y]['id'] . ', ' . $statusInput . ')' : 'showDetail(' . $result[$y]['id'] . ', ' . '1' . ')'; ?>">
                                <td><?= $result[$y]['title']; ?></td>
                                <td><?= substr(toDateDefault($result[$y]['date']), 0, 6); ?></td>
                                <td class="text-success"><?= ($result[$y]['role'] == 1) ? '<i class="fas fa-check"></i>' : '-'; ?></td>
                            </tr>
                        </table>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>

</div>

<div class="loadingTemplate"></div>

<div class="col-md-9 col-sm-9 col-xs-12 targetDetail" hidden>
    <div class="card">
        <div class="card-header text-center">
            <h5 class="card-title">Detail</h5>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <label for="" class="col-form-label col-sm-4">Date:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" readonly id="dateDetail">
                </div>
            </div>
            <div class="row mb-2">
                <label for="" class="col-form-label col-sm-4">Title:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" readonly id="titleDetail">
                </div>
            </div>
            <div class="row mb-2">
                <label for="" class="col-form-label col-sm-4">Seri:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" readonly id="seriDetail">
                </div>
            </div>
            <div class="row mb-2">
                <label for="" class="col-form-label col-sm-4">Team:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" readonly id="teamDetail">
                </div>
            </div>
            <div class="row mb-2">
                <label for="" class="col-form-label col-sm-4">Crew:</label>
                <div class="col-sm-6">
                    <div class="crewGroup">

                    </div>
                </div>
                <?php if ($_SESSION['id'] == 1 && $role != 0) { ?>
                    <div class="col-sm-2">
                        <button class="btn btn-sm text-primary editCrew" id="editCrewButton"><i class="fas fa-pen"></i></button>
                    </div>
                <?php } ?>
            </div>
            <div class="row mb-2">
                <label for="" class="col-form-label col-sm-4">Leader:</label>
                <div class="col-sm-6">
                    <div class="leaderGroup">
                        <select name="editLeader" class="form-control editLeader" disabled id="editLeader">
                            <optgroup label="Selected Leader" id="selectedLeader"></optgroup>
                            <optgroup label="Available Leader" id="listAvailableLeader"></optgroup>
                        </select>
                    </div>
                </div>
                <?php if ($_SESSION['id'] == 1 && $role != 0) { ?>
                    <div class="col-sm-2">
                        <button class="btn btn-sm text-primary editLeader" id="editLeaderButton"><i class="fas fa-pen"></i></button>
                    </div>
                <?php } ?>
            </div>

            <hr>

            <!-- subjob row -->

            <div class="row" style="font-size: 0.8em;">
                <div class="col-sm-1 col-md-1">
                    <div class="form-group">
                        <label for="">Code</label>
                        <div class="codeField"></div>
                    </div>
                </div>
                <div class="col-sm-1 col-md-1">
                    <div class="form-group">
                        <label for="">Subjob</label>
                        <div class="subjobField"></div>
                    </div>
                </div>
                <div class="col-sm-1 col-md-1">
                    <div class="form-group">
                        <label for="">Purpose</label>
                        <div class="purposeField"></div>
                    </div>
                </div>
                <div class="<?= ($idMaster == 1) ? 'col-sm-2 col-md-2' : 'col-md-3 col-sm-3 text-center'; ?>">
                    <div class="form-group">
                        <label for="">Deadline</label>
                        <div class="deadlineField"></div>
                    </div>
                </div>
                <div class="col-sm-1 col-md-1">
                    <div class="form-group">
                        <label for="">action</label>
                        <div class="actionDeadlineField">

                        </div>
                    </div>
                </div>
                <?php if ($_SESSION['id'] == 1) { ?>
                    <div class="col-sm-1 col-md-1">
                        <div class="form-group">
                            <label for="">Failed</label>
                            <div class="failedField">

                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-sm-1 col-md-1">
                    <div class="form-group">
                        <label for="">Reason</label>
                        <div class="reasonField"></div>
                    </div>
                </div>
                <div class="col-sm-1 col-md-1">
                    <div class="form-group">
                        <label for="">Alarm</label>
                        <div class="alarmField"></div>
                    </div>
                </div>
                <div class="col-sm-1 col-md-1">
                    <div class="form-group">
                        <label for=""><?= ($idMaster == 1) ? 'Doc' : 'Upload'; ?></label>
                        <div class="docField">
                        </div>
                    </div>
                </div>
                <div class="col-md-1 col-sm-1">
                    <div class="form-group">
                        <label for="">Note</label>
                        <div class="noteField">
                        </div>
                    </div>
                </div>
                <div class="col-sm-1 col-md-1">
                    <div class="form-group">
                        <label for="">Action</label>
                        <div class="actionSubmitField">
                        </div>
                    </div>
                </div>
                <div class="dropdownMenu"></div>

            </div>
            <div class="notFoundField text-center"></div>


            <div class="row mt-2">
                <div class="col-md-5 col-sm-5 goalField">
                    <!-- <label for="">Goal</label>
                    <input type="text" class="form-control goalField" readonly> -->
                </div>
                <div class="col-md-1 col-sm-1 actionAddGoal"></div>
                <div class="col-md-6 col-sm-6"></div>
            </div>

            <hr>

            <?php if ($idMaster == 1 && $role != 0) { ?>
                <div class="text-right mb-3">
                    <button class="btn btn-sm btn-primary showAddFormJob"><i class="fas fa-plus"></i> Add job</button>
                    <button class="btn btn-sm btn-success saveAddJob" hidden onclick="saveAddJob()">Save Job</button>
                    <button class="btn btn-sm btn-success closeAddJob" hidden onclick="closeFormAddJob()">Close Form</button>
                </div>

                <div class="hiddenJobForm" hidden>
                    <form action="" id="formNewJob">

                        <div class="row mb-2">

                            <div class="col-md-1 col-sm-1">
                                <div class="form-group">
                                    <label for="">Code</label>
                                    <input type="text" class="form-control codeAddNew" name="codeAddNew[]" readonly value="<?= $_SESSION['user']; ?>">
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-3">
                                <div class="form-group">
                                    <label for="">Job</label>
                                    <input type="text" class="form-control subjobAddNew" name="subjobAddNew[]">
                                    <div class="idAddField"></div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-3">
                                <div class="form-group">
                                    <label for="">Purpose</label>
                                    <input type="text" class="form-control purposeAddNew" name="purposeAddNew[]">
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-2">
                                <div class="form-group">
                                    <label for="">Deadline</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control deadlineDateAddNew" id="deadlineDateAddNew0" name="deadlineDateAddNew[]" onchange="checkDateForNew(0)">
                                        <input type="text" class="form-control deadlineHourAddNew" name="deadlineHourAddNew[]">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-2">
                                <div class="form-group">
                                    <label for="">Alarm</label>
                                    <input type="text" class="form-control alarmField0" name="alarmField[]" onclick="showModalAlarm(0)">

                                    <div class="alarmId0"></div>

                                </div>
                            </div>

                            <div class="col-md-1 col-sm-1">
                                <div class="form-group">
                                    <label for="" class="text-white">Action</label>
                                    <button class="btn btn-sm btn-primary addForm"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>

                        </div>

                        <div class="targetAddFormJob"></div>

                    </form>

                </div>
            <?php } ?>
            <div class="d-none" id="popover_content_wrapper">
                <input type="text" class="form-control">
            </div>

            <!-- subjob row -->

        </div>
    </div>

    <!-- card for history update -->

    <?php if ($_SESSION['id'] == 1) { ?>
        <div class="card border border-danger mb-3 mt-3" id="historyHide" hidden>
            <div class="card-header text-center">
                <h5 class="card-title">
                    History
                </h5>
            </div>
            <div class="card-body targetHistory">

                <div class="row text-center" style="font-size: 0.8em;">

                    <div class="col-sm-1 col-md-1">
                        <div class="form-group">
                            <label for="">Code</label>
                            <div class="historyCode"></div>
                        </div>
                    </div>
                    <div class="col-sm-1 col-md-1">
                        <div class="form-group">
                            <label for="">Subjob</label>
                            <div class="historySubjob"></div>
                        </div>
                    </div>
                    <div class="col-sm-1 col-md-1">
                        <div class="form-group">
                            <label for="">Purpose</label>
                            <div class="historyPurpose"></div>
                        </div>
                    </div>
                    <div class="col-sm-5 col-md-5">
                        <div class="form-group">
                            <label for="">Deadline</label>
                            <div class="historyDeadline">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1 col-md-1">
                        <div class="form-group">
                            <label for="">Reason</label>
                            <div class="historyReason"></div>
                        </div>
                    </div>
                    <div class="col-sm-1 col-md-1">
                        <div class="form-group">
                            <label for="">Alarm</label>
                            <div class="historyAlarm"></div>
                        </div>
                    </div>
                    <div class="col-sm-1 col-md-1">
                        <div class="form-group">
                            <label for="">Doc</label>
                            <div class="historyDoc">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1 col-md-1">
                        <div class="form-group">
                            <label for="">Note</label>
                            <div class="historyNote">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-1 targetHistoryValue"></div>

            </div>
        </div>
    <?php } ?>

    <!-- card for history update -->

</div>

<!-- modal -->
<div class="modal modalReason fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reason</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bodyModalReason">
                <!-- <div class="form-group">
                    <label for="">Reason</label>
                    <input type="text" class="form-control inputReason" name="inputReason">
                </div>
                <div class="form-group alarmLabel">
                    <label for="">Alarm</label>
                    <div class="alarmCheckbox">
                    </div>
                </div> -->
            </div>
            <div class="modal-footer text-center justify-content-center">
                <button type="button" class="btn btn-primary btn-sm saveReason" style="border-radius: 12px;">Save Reason</button>
            </div>
        </div>
    </div>
</div>

<div class="modal modalNote fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Note</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="bodyModalNote" id="bodyModalNote"></div>
                <!-- <div class="form-group">
                    <label for="">Note</label>
                    <input type="text" class="form-control inputNote" name="inputNote">
                </div> -->
                <div class="text-center justify-content-center">
                    <button type="button" class="btn btn-primary btn-sm saveNote" style="border-radius: 12px;">Save Note</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modalAlarm fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Choose Alarm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-md-6">
                            <form action="" class="formAlarm">
                                <div class="form-group">
                                    <label for="">Choose Alarm</label>
                                    <div class="alarmCheckboxNew"></div>
                                </div>
                            </form>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center submitButton">
            </div>
        </div>
    </div>
</div>

<div class="modal modalUpload fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <form action="" class="formAlarm saveUpload" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">Upload file</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input " name="file" id="inputGroupFile04">
                                            <label class="custom-file-label fileName" for="inputGroupFile04">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="hiddenFile" hidden></div>
                                <div class="hiddenSub" hidden></div>
                                <div class="hiddenId" hidden></div>
                                <div class="hiddenIdForm" hidden></div>
                                <div class="form-group mt-2 text-center">
                                    <button class="btn btn-sm btn-primary" style="border-radius: 12px;">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-center submitButton">
        </div>
    </div>
</div>

<div class="modal modalDocument fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" style="background-color: rgba(48,80,79,0.1);">
        <div class="modal-content modalContentDocument" style="border-radius: 10px;">
            <div class="headerDocument">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" aria-label="Close" id="closeModalDocument">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body targetDocument" id="targetDocument">

            </div>
            <div class="modal-footer justify-content-center submitButton" id="submitButtonDocument">
            </div>
        </div>
    </div>
</div>
<!-- modal -->

<script>
    $(document).ready(function() {

        $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $('.fileName').html(fileName);
        });

        $('.saveUpload').submit(function(e) {
            e.preventDefault();

            var id = $(this).attr('data-id-file');
            var hiddenId = '<input class="form-control" name="hiddenId" value="' + id + '">';
            $('.hiddenId').html(hiddenId);

            swal("With upload this file, indicating that your work is done, and waiting for confirmation from the CEO, are you Sure?", {
                    buttons: {
                        cancel: "Wait, i'll check again",
                        catch: {
                            text: "Yes, Let's go",
                            value: "catch",
                        },
                    },
                })
                .then((value) => {
                    switch (value) {
                        case "catch":
                            $.ajax({
                                type: 'POST',
                                url: '<?= base_url('job/uploadFile'); ?>',
                                data: new FormData(this),
                                processData: false,
                                contentType: false,
                                cache: false,
                                async: false,
                                dataType: 'json',
                                success: function(result) {
                                    var message = result.message;
                                    if (message == 'success') {
                                        // getToast("File succesfully upload", "success");
                                        $('.modalUpload').modal('hide');
                                        $('.fileName').text('Choose File');
                                        // showDetail(result.id);
                                        $('.modalDocument').modal('show');
                                        $('#targetDocument').attr('class', 'modal-body targetDocument text-center');
                                        $('#closeModalDocument').attr('onclick', 'closeModalDocument(' + result.id + ')');

                                        var url = '<?= base_url(); ?>/uploads/' + result.file;
                                        var confirm = '<div class="row mb-2">' +
                                            '<div class="col text-center">' +
                                            '<span> Are you sure to upload this image?</span>' +
                                            '</div>' +
                                            '</div>' +
                                            '<div class="row mb-2">' +
                                            '<div class="col text-center">' +
                                            '<img class="img-fluid" style="border-radius: 10px !important;" src="' + url + '" width="600" height="600">' +
                                            '</div>' +
                                            '</div>' +
                                            '<div class="row mb-3 text-center justify-content-center">' +
                                            '<button class="btn btn-sm btn-primary" style="border-radius: 10px;" onclick="submitFile(' + result.idTitle + ', ' + result.idForm + ')">Submit</button>' +
                                            '</div>' +
                                            '<div class="row">' +
                                            '<div class="col text-center">' +
                                            '<span style="font-size: 0.7em; color: red">* if you dont do anything in this step, your photo will be automaticly delete</span>' +
                                            '</div>' +
                                            '</div>';

                                        $('#targetDocument').html(confirm);
                                    } else {
                                        getToast("File type not Allowed", "error");
                                    }
                                }
                            })
                            break;

                        default:
                            getToast("Okay check again", "success");
                    }
                });
        })

        getAlarmNew();

        var i = 0;
        $('.addForm').click(function(e) {
            e.preventDefault();
            i++;

            var template = '<di class="deleteRows' + i + '">' +
                '<div class="row mb-2">' +

                '<div class="col-md-1 col-sm-1">' +
                '<div class="form-group">' +
                '<label for="">Code</label>' +
                '<input type="text" class="form-control codeAddNew" readonly name="codeAddNew[]" value="<?= $_SESSION['user']; ?>">' +
                '</div>' +
                '</div>' +

                ' <div class="col-md-3 col-sm-3">' +
                '<div class="form-group">' +
                '<label for="">Job</label>' +
                ' <input type="text" class="form-control subjobAddNew" name="subjobAddNew[]">' +
                ' </div>' +
                '</div>' +

                '<div class="col-md-3 col-sm-3">' +
                '<div class="form-group">' +
                '<label for="">Purpose</label>' +
                '<input type="text" class="form-control purposeAddNew" name="purposeAddNew[]">' +
                '</div>' +
                '</div>' +

                '<div class="col-md-2 col-sm-2">' +
                '<div class="form-group">' +
                '<label for="">Deadline</label>' +
                '<div class="input-group">' +
                '<input type="text" class="form-control deadlineDateAddNew" id="deadlineDateAddNew' + i + '" name="deadlineDateAddNew[]" onchange="checkDateForNew(' + i + ')">' +
                '<input type="text" class="form-control deadlineHourAddNew" name="deadlineHourAddNew[]">' +
                '</div>' +
                '</div>' +
                '</div>' +

                '<div class="col-md-2 col-sm-2">' +
                ' <div class="form-group">' +
                '<label for="">Alarm</label>' +
                '<input type="text" class="form-control alarmField' + i + '" name="alarmField[]" onclick="showModalAlarm(' + i + ')">' +
                '<div class="alarmId' + i + '"></div>' +
                '</div>' +
                '</div>' +

                '<div class="col-md-1 col-sm-1">' +
                '<div class="form-group">' +
                '<label for="" class="text-white">Action</label>' +
                '<button class="btn btn-sm btn-danger" onclick="deleteForm(' + i + ')"><i class="fas fa-times"></i></button>' +
                '</div>' +
                '</div>' +

                '</div>' +

                '</div>';

            $('.targetAddFormJob').append(template);


            $(function() {
                $('.popoverAlarm').popover({
                    html: true,
                    sanitize: false,
                    content: function() {
                        return $('#popoverContent').html();
                    }
                })
            })

            $('.deadlineDateAddNew').datepicker({
                // minViewMode: 'months',
                todayHighlight: true,
                format: 'yyyy-mm-dd',
                autoclose: true
            });

            $('.deadlineHourAddNew').clockpicker({
                placement: 'top',
                donetext: 'Done',
                autoclose: true
            })

            getAlarmNew();
        })

        $('.showAddFormJob').click(function(e) {
            e.preventDefault();

            $('.hiddenJobForm').fadeIn("fast");
            $('.hiddenJobForm').removeAttr('hidden');
            $('.showAddFormJob').prop('hidden', true);

            $('.saveAddJob').removeAttr('hidden');
            $('.closeAddJob').removeAttr('hidden');
        })

        $('.deadlineDateAddNew').datepicker({
            // minViewMode: 'months',
            todayHighlight: true,
            format: 'yyyy-mm-dd',
            autoclose: true
        });

        $('.deadlineHourAddNew').clockpicker({
            placement: 'top',
            donetext: 'Done',
            autoclose: true
        })

    })

    // -------------------------------------------------- Job Field -------------------------------------------

    function deleteForm(idForm) {
        $('.deleteRows' + idForm).remove();
    }

    function showDetail(idJob, status) {

        //hide history field
        $('#historyHide').prop('hidden', true);

        //modified submit button for new job
        $('.saveAddJob').attr('data-idInput', idJob);
        var input = '<input class="form-control idAddNew" hidden name="idAddNew" value="' + idJob + '">';
        $('.idAddField').html(input);

        $('#editCrewButton').attr('class', 'btn btn-sm text-primary editCrew');
        $('#editCrewButton').html('<i class="fas fa-pen"></i>');
        $('#editLeaderButton').attr('class', 'btn btn-sm text-primary editCrew');
        $('#editLeaderButton').html('<i class="fas fa-pen"></i>');
        $('#selectedLeader').html('');
        $('#listAvailableLeader').html('');
        $('#editLeader').attr('disabled', '');

        $('.crewGroup').html('');
        var temp = $('.crewGroup').append('<div class"parentcrew' + idJob + '"><ul id="crewName" class="list-group" style="border: 0px solid transparent !important;"></ul></div>');

        $.ajax({
            type: 'POST',
            data: {
                id: idJob
            },
            url: '<?= base_url('job/getDetail'); ?>',
            dataType: 'json',
            success: function(result) {
                if (result.message == 'not found') {
                    swal('Success', 'The ' + result.title + ' job successfully achive', 'success', {
                        buttons: false
                    });
                    setTimeout(function() {
                        var url = '<?= base_url('job'); ?>';
                        window.location = url;
                    }, 2000)
                } else {
                    var crew = result.crewName;
                    var crewName = crew.toString();
                    var leader = result.leaderName;
                    var idCrew = result.crewId;

                    $('.targetDetail').fadeIn("fast");
                    $('.targetDetail').removeAttr('hidden');
                    $('#dateDetail').val(result.date);
                    $('#titleDetail').val(result.title);
                    $('#seriDetail').val(result.seriName);
                    $('#teamDetail').val(result.team);

                    var templateCrew = '';
                    var optionLeader = '';
                    for (var i = 0; i < crew.length; i++) {
                        templateCrew += '<li class="list-group-item" style="border: 0px solid transparent !important;">' + crew[i] + '</li>';
                        optionLeader += '<option value="' + idCrew[i] + '">' + crew[i] + '</option>';
                    }

                    var selectedLeader = '<option value="' + result.leaderId + '">' + leader + '</option>';

                    $('#crewName').html(templateCrew);
                    $('.editCrew').attr('onclick', 'editCrew(' + idJob + ')');

                    $('#selectedLeader').html(selectedLeader);
                    $('#editLeaderButton').attr('onclick', 'editLeader(' + idJob + ')');

                    detailSubjob(idJob, status);
                    getHistory(idJob);
                }
            }
        })
    }

    function editCrew(idJob) {
        $('.crewGroup').html('');
        var templateEdit = '<select name="editCrew" multiple="multiple" class="form-control editCrew' + idJob + '" onchange="addLeader()"></select>';

        $('.crewGroup').append(templateEdit);

        $.ajax({
            type: 'POST',
            data: {
                id: idJob
            },
            url: '<?= base_url('job/getDetail'); ?>',
            dataType: 'json',
            success: function(result) {
                var crew = result.crewName;
                var crewId = result.crewId;

                var option = '';
                for (var i = 0; i < crew.length; i++) {
                    option += '<option selected value="' + crewId[i] + '">' + crew[i] + '</option>';
                }
                $('.editCrew' + idJob).append(option);
            }
        })

        getCrew(idJob);


        $('.editCrew' + idJob).select2();

        var button = $('#editCrewButton');
        var text = '<i class="fas fa-check"></i>';
        var onclick = 'saveCrew(' + idJob + ')'
        changeButton('submitJob', idJob, button, text, onclick);

    }

    function saveCrew(idJob) {
        var crew = $('select[name="editCrew"]').map(function() {
            return $(this).val();
        }).toArray();

        $.ajax({
            type: 'POST',
            data: {
                crew: crew,
                id: idJob
            },
            url: '<?= base_url('job/saveCrew'); ?>',
            dataType: 'json',
            success: function(result) {
                if (result == 'leader gone') {
                    getToast("Leader cannot be deleted on crew list", "error");
                    showDetail(idJob);
                } else if (result == 'ok') {
                    getToast("Crew has been changed", "success");

                    showDetail(idJob);
                }
            }
        })
    }

    function editLeader(idJob) {
        $('#editLeader').removeAttr('disabled');

        $.ajax({
            type: 'POST',
            data: {
                id: idJob
            },
            url: '<?= base_url('job/getDetail'); ?>',
            dataType: 'json',
            success: function(result) {
                var leader = result.leaderName;
                var idCrew = result.crewId;
                var crew = result.crewName;

                var x = '';

                for (var i = 0; i < crew.length; i++) {
                    x += '<option value="' + idCrew[i] + '">' + crew[i] + '</option>';
                }

                $('#listAvailableLeader').append(x);

                var button = $('#editLeaderButton');
                var text = '<i class="fas fa-check"></i>';
                var onclick = 'saveLeader(' + idJob + ')'
                changeButton('submitJob', idJob, button, text, onclick);
            }
        })
    }

    function saveLeader(idJob) {
        var leader = $('#editLeader').val();

        $.ajax({
            type: 'POST',
            data: {
                leader: leader,
                id: idJob
            },
            url: '<?= base_url('job/saveLeader'); ?>',
            success: function() {
                getToast("Leader has been changed", "success");

                showDetail(idJob);
            }
        })
    }

    function getCrew(idJob) {
        $.ajax({
            type: 'POST',
            data: 'select=id, name&table=ac_payroll_item&condition=WHERE office = 8 AND is_active = 1&db=we',
            url: '<?= base_url('job/getDataDatabase'); ?>',
            dataType: 'json',
            success: function(result) {
                var x = '';

                for (var i = 0; i < result.length; i++) {
                    x += '<option value="' + result[i].id + '">' + result[i].name + '</option>';
                }

                $('.editCrew' + idJob).append(x);
            }
        })
    }

    function getAlarm() {
        $.ajax({
            type: 'POST',
            data: 'select=id,alarm&table=alarm&condition=ORDER BY id ASC&db=default',
            url: '<?= base_url('job/getDataDatabase'); ?>',
            dataType: 'json',
            success: function(result) {
                var x = '';

                for (var i = 0; i < result.length; i++) {
                    x += '<div class="form-check">' +
                        '<input class="form-check-input" name="listAlarm[]" type="checkbox" value="' + result[i].id + '" id="alarmCheck' + i + '">' +
                        '<label class="form-check-label" for="alarmCheck' + i + '">' +
                        result[i].alarm +
                        '</label>' +
                        '</div>';
                }

                $('.alarmCheckbox').append(x);
            }
        })
    }

    function getAlarmNew() {
        $.ajax({
            type: 'POST',
            data: 'select=id,alarm&table=alarm&condition=ORDER BY id ASC&db=default',
            url: '<?= base_url('job/getDataDatabase'); ?>',
            dataType: 'json',
            success: function(result) {
                var x = '';

                for (var i = 0; i < result.length; i++) {
                    x += '<div class="form-check">' +
                        '<input class="form-check-input alarmAddNew" name="alarmAddNew[]" type="checkbox" value="' + result[i].id + '" id="alarmCheckNew' + i + '">' +
                        '<label class="form-check-label" for="alarmCheck' + i + '">' +
                        result[i].alarm +
                        '</label>' +
                        '</div>';
                }

                $('.alarmCheckboxNew').html(x);
            }
        })
    }

    function addLeader() {
        var crewList = $('select[name="editCrew"]').map(function() {
            return $(this).val();
        }).toArray();

        $.ajax({
            type: 'POST',
            data: {
                id: crewList
            },
            url: '<?= base_url('job/getNameById'); ?>',
            dataType: 'json',
            success: function(result) {
                var name = result.name;
                var id = result.id;

                var x = '';
                for (var i = 0; i < name.length; i++) {
                    x += '<option value="' + id[i] + '">' + name[i] + '</option>';
                }
                $('#listAvailableLeader').html(x);
            }
        })
    }

    // -------------------------------------------------- Job Field -------------------------------------------


    // -------------------------------------------------- Sub Field -------------------------------------------

    function changeFailed(idSub, idTitle) {
        swal("Click yes to activate this job again and start Fixing!", {
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
                        $.ajax({
                            type: 'POST',
                            data: {
                                id: idSub
                            },
                            url: '<?= base_url('home/activateJob'); ?>',
                            success: function(result) {
                                swal('Success', 'This job has been activated', 'success', {
                                    buttons: false,
                                    timer: 1500
                                });

                                detailSubjob(idTitle, 1);
                            }
                        })
                        break;

                    default:
                        swal("Got away safely!");
                }
            });
    }

    function closeModalDocument(idSubjob) {
        deleteUploadedFile(idSubjob);
        $('.modalDocument').modal('hide');

        $('.fileName').text('Choose File');
    }

    function submitFile(idTitle, idForm) {
        getToast("File has been uploaded", "success");

        detailSubjob(idTitle);
        $('.modalDocument').modal('hide');
        $('#closeModalDocument').removeAttr('onclick');
        $('.fileName').text('Choose File');
    }

    function deleteUploadedFile(idSubjob) {
        $.ajax({
            type: 'POST',
            data: {
                id: idSubjob
            },
            url: '<?= base_url('job/deleteUploadedFile'); ?>',
            dataType: 'json',
            success: function(result) {
                if (result.message == 'success') {
                    detailSubjob(result.idTitle);
                    getToast("File has been deleted", "success");

                    $('.fileName').text('Choose File');
                }
            }
        })
    }

    function getJobReview(idSubjob, idForm, key = '') {
        var idMaster = '<?= $_SESSION['id']; ?>';
        $('#closeModalDocument').removeAttr('onclick');

        $.ajax({
            type: 'POST',
            data: {
                id: idSubjob
            },
            url: '<?= base_url('job/getJobReview'); ?>',
            dataType: 'text',
            success: function(result) {
                $('.modalDocument').modal('show');
                $('.targetDocument').html(result);

                if (idMaster == 1) {
                    var buttonAction = '<div class="text-center">' +
                        '<button class="btn btn-sm btn-primary" onclick="passwordEndJob(' + idSubjob + ', ' + idForm + ')" style="border-radius: 10px;">End Job</button>' +
                        '<button class="btn btn-sm btn-warning ml-1" onclick="holdJob(' + idSubjob + ', ' + idForm + ')" style="border-radius: 10px;">Hold Job</button>' +
                        '</div>';
                } else {
                    var buttonAction = '<div class="text-center">' +
                        '<button class="btn btn-sm btn-primary" onclick="endJob(' + idSubjob + ', ' + idForm + ')" style="border-radius: 10px;">End Job</button>' +
                        '</div>';
                }

                if (key == 0) {
                    $('#submitButtonDocument').html('');
                } else {
                    $('#submitButtonDocument').html(buttonAction);
                }
            }
        })
    }

    function holdJob(idSubjob, idForm) {
        $('.modalDocument').modal('hide');
        var idMaster = '<?= $_SESSION['id']; ?>';

        //show modal to add note
        $('.modalNote').modal('show');
        var field = '<div class="form-group">' +
            '<label>Add Note</label>' +
            '<input class="form-control inputNote" name="note" placeholder="Why you hold this job?">' +
            '</div>';
        $('.bodyModalNote').html(field);

        $('.saveNote').attr('onclick', 'saveNote(' + idSubjob + ', ' + idForm + ')');
    }

    function passwordEndJob(idSubjob, idForm) {
        $('.modalDocument').modal('hide');
        $('.modalNote').modal('show');
        var body = '<div class="row mb-2">' +
            '<div class="col">' +
            '<div class="form-group mb-1 text-center">' +
            '<label>Input password</label>' +
            '<input class="form-control passwordEnd" type="password" name="passwordEnd">' +
            '</div>' +
            '</div>' +
            '</div>';
        $('.bodyModalNote').html(body);

        $('.saveNote').text('Submit');
        $('.saveNote').attr('onclick', 'endJob(' + idSubjob + ', ' + idForm + ')');
    }

    function endJob(idSubjob, idForm) {
        var idMaster = '<?= $_SESSION['id']; ?>';

        if (idMaster == 1) {
            var password = $('.passwordEnd').val();

            if (password == '') {
                getToast("Password cannot be null", "error");
            } else if (password != 'ansena123') {
                getToast("Wrong Password", "error");
            } else {
                $('.modalNote').modal('hide');

                swal("Are you sure to end this job?", {
                        buttons: {
                            cancel: "Wait a minute!",
                            catch: {
                                text: "Yes, end job",
                                value: "catch",
                            },
                        },
                    })
                    .then((value) => {
                        switch (value) {

                            case "catch":
                                $.ajax({
                                    type: 'POST',
                                    data: {
                                        id: idSubjob
                                    },
                                    url: '<?= base_url('job/endJob'); ?>',
                                    dataType: 'json',
                                    success: function(result) {
                                        if (result.message == 'all job is done') {
                                            swal("Success", "This job was successfully completed", "success", {
                                                buttons: false,
                                                timer: 1500
                                            });

                                            setTimeout(function() {
                                                var url = '<?= base_url('job'); ?>';
                                                window.location = url;
                                            }, 1400);
                                            $('.modalDocument').modal('hide');
                                            $('.targetDocument').html('');
                                            $('#submitButtonDocument').html('')

                                            $('.bodyModalNote').html('');
                                            $('.saveNote').text('Save Note');
                                            $('.saveNote').removeAttr('onclick');

                                            detailSubjob(result.idTitle, 1);
                                        } else {
                                            swal("Success", "Your job is waiting for CEO's Confirmation, sit Tight and we will catch on you", "success", {
                                                buttons: false,
                                                timer: 1500
                                            });

                                            $('.modalDocument').modal('hide');
                                            $('.targetDocument').html('');
                                            $('#submitButtonDocument').html('');
                                            if (idMaster == 1) {
                                                detailSubjob(result.idTitle, 1);
                                            } else {
                                                detailSubjob(result.idTitle, 2);
                                            }
                                        }
                                    }
                                })
                                break;

                            default:
                                swal("Okay");
                        }
                    });
            }
        } else {
            swal("Are you sure to end this job?", {
                    buttons: {
                        cancel: "Wait a minute!",
                        catch: {
                            text: "Yes, end job",
                            value: "catch",
                        },
                    },
                })
                .then((value) => {
                    switch (value) {

                        case "catch":
                            $.ajax({
                                type: 'POST',
                                data: {
                                    id: idSubjob
                                },
                                url: '<?= base_url('job/endJob'); ?>',
                                dataType: 'json',
                                success: function(result) {
                                    if (result.message == 'all job is done') {
                                        swal("Success", "Your job is waiting for CEO's Confirmation, sit Tight and we will catch on you", "success", {
                                            buttons: false,
                                            timer: 1500
                                        });
                                        $('.modalDocument').modal('hide');
                                        $('.targetDocument').html('');
                                        $('#submitButtonDocument').html('')

                                        $('.modalNote').modal('hide');
                                        $('.bodyModalNote').html('');
                                        $('.saveNote').text('Save Note');
                                        $('.saveNote').removeAttr('onclick');

                                        detailSubjob(result.idTitle, 1);
                                    } else {
                                        swal("Success", "Your job is waiting for CEO's Confirmation, sit Tight and we will catch on you", "success", {
                                            buttons: false,
                                            timer: 1500
                                        });

                                        $('.modalDocument').modal('hide');
                                        $('.targetDocument').html('');
                                        $('#submitButtonDocument').html('');
                                        if (idMaster == 1) {
                                            detailSubjob(result.idTitle, 1);
                                        } else {
                                            detailSubjob(result.idTitle, 2);
                                        }
                                    }
                                }
                            })
                            break;

                        default:
                            swal("Okay");
                    }
                });
        }
    }

    function closeFormAddJob() {
        swal("Close form will delete all your unsaved data, are you sure?", {
                buttons: {
                    cancel: "Wait",
                    catch: {
                        text: "Yes, close form",
                        value: "catch",
                    },
                },
            })
            .then((value) => {
                switch (value) {

                    case "catch":
                        getToast("Form has been closed", "success");
                        $('.hiddenJobForm').fadeOut("fast");
                        $('.hiddenJobForm').prop('hidden', true);
                        $('.saveAddJob').prop('hidden', true);
                        $('.closeAddJob').prop('hidden', true);
                        $('.targetAddFormJob').html('');
                        $('.showAddFormJob').fadeOut("fast");
                        $('.showAddFormJob').removeAttr('hidden');

                        $('.subjobAddNew').val('');
                        $('.idAddNew').val('');
                        $('.purposeAddNew').val('');
                        $('.deadlineDateAddNew').val('');
                        $('.deadlineHourAddNew').val('');
                        break;

                    default:
                        swal("Got away safely!");
                }
            });
    }

    function showModalAlarm(idForm) {
        $('.modalAlarm').modal('show');
        $('input[name="listAlarmNew[]"]').prop('checked', false);

        var submitButton = '<button class="btn btn-sm btn-primary text-center" onclick="saveAlarm(' + idForm + ')">Submit</button>';
        $('.submitButton').html(submitButton);
    }

    function saveAddJob() {
        //confirmastion
        swal("Are you sure with this Job?", {
                buttons: {
                    catch: {
                        text: "Yes, Create job",
                        value: "catch",
                    },
                },
            })
            .then((value) => {
                switch (value) {

                    case "catch":

                        var formData = $('#formNewJob').serialize();

                        $.ajax({
                            type: 'post',
                            data: formData,
                            url: '<?= base_url('job/saveAddJob'); ?>',
                            dataType: 'text',
                            beforeSend: function() {
                                var x = '<div class="text-center">' +
                                    '<span>Loading ....</span> <br>' +
                                    '<div class="spinner-grow text-info m-1" role="status">' +
                                    '<span class="visually-hidden">Loading...</span>' +
                                    '</div>' +
                                    '<div class="spinner-grow text-warning m-1" role="status">' +
                                    '<span class="visually-hidden">Loading...</span>' +
                                    '</div>' +
                                    '<div class="spinner-grow text-danger m-1" role="status">' +
                                    '<span class="visually-hidden">Loading...</span>' +
                                    '</div>' +
                                    '<div class="spinner-grow text-success m-1" role="status">' +
                                    '<span class="visually-hidden">Loading...</span>' +
                                    '</div>' +
                                    '</div>';
                                $('.loadingTemplate').html(x);
                            },
                            success: function(result) {
                                swal('Success', 'Job has been saved to database', 'success', {
                                    buttons: false,
                                    timer: 1500
                                });

                                $('.targetAddForm').html('');
                                $('.job').val('');
                                $('.seri').val('');
                                $('.team').val('');
                                $('#crew').html('');
                                $('.leader').val('');
                                $('.subjob').val('');
                                $('.purpose').val('');
                                $('.deadlineDate').val('');
                                $('.deadlineHour').val('');
                                $('.alarmField0').val('');
                                $('.alarmId0').html('');

                                detailSubjob(result);

                                $('.loadingTemplate').html('');

                                $('.hiddenJobForm').fadeOut("fast");
                                $('.hiddenJobForm').prop('hidden', true);
                                $('.saveAddJob').prop('hidden', true);
                                $('.closeAddJob').prop('hidden', true);
                                $('.targetAddFormJob').html('');
                                $('.showAddFormJob').fadeOut("fast");
                                $('.showAddFormJob').removeAttr('hidden');

                                $('.subjobAddNew').val('');
                                $('.idAddNew').val('');
                                $('.purposeAddNew').val('');
                                $('.deadlineDateAddNew').val('');
                                $('.deadlineHourAddNew').val('');
                            }
                        })

                        break;

                    default:
                        swal("Check again");
                }
            });
    }

    function saveAlarm(idForm) {
        $('.alarmId' + idForm).html('');
        $('.alarmField' + idForm).val('');


        var alarm = $('input[name="alarmAddNew[]"]:checked').map(function() {
            return $(this).val();
        }).toArray();

        $.ajax({
            type: 'POST',
            data: {
                alarm: alarm
            },
            url: '<?= base_url('job/saveAlarm'); ?>',
            dataType: 'json',
            success: function(result) {
                var alarmName = result.alarmName;
                var alarmId = result.alarmId;
                var alarmTostring = alarmName.toString();

                //append input field with value is id of alarm
                var x = '';
                for (var i = 0; i < alarmId.length; i++) {
                    x += '<input class="form-control" hidden name="alarmId' + idForm + '[]" value="' + alarmId[i] + '">'
                }
                $('.alarmId' + idForm).html(x);

                $('.alarmField' + idForm).val(alarmTostring);

                $('.modalAlarm').modal('hide');

                getToast("Alarm has been added", "success");

                $('.input[name="alarmAddNew[]"]').prop('checked', false);
            }
        })
    }

    function detailSubjob(idJob, status = '') {
        var idMaster = '<?= $_SESSION['id']; ?>';

        $('.codeField').html('');
        $('.subjobField').html('');
        $('.purposeField').html('');
        $('.deadlineField').html('');
        $('.actionDeadlineField').html('');
        $('.failedField').html('');
        $('.reasonField').html('');
        $('.alarmField').html('');
        $('.docField').html('');
        $('.noteField').html('');
        $('.actionSubmitField').html('');

        $.ajax({
            type: 'POST',
            data: {
                id: idJob,
                status: status
            },
            url: '<?= base_url('job/getDetailSubjob'); ?>',
            dataType: 'json',
            success: function(result) {
                if (result.message == 'not found') {
                    var error = '<span class="font-weight-bold">Active job not found</span>';
                    $('.notFoundField').html(error);
                } else {
                    $('.notFoundField').html('');
                    $('.actionAddGoal').html('');

                    var idSubjob = result.idSubjob;

                    var alarmResult = result.alarmName;
                    var alarmField = '';
                    for (var v = 0; v < alarmResult.length; v++) {
                        var alarmName = alarmResult[v].toString();
                        alarmField += '<button type="button" class="btn btn-sm mb-1" style="background-color: #e5e5e5;" data-container="body" data-toggle="popover" data-placement="top" data-content="' + alarmName + '">' +
                            alarmName.substring(0, 4) +
                            '</button>' +
                            '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newAlarm' + v + '" readonly hidden></div></div>';
                    }

                    var code = result.code;

                    //show data
                    var codeField = '';
                    var subjobField = '';
                    var purposeField = '';
                    var deadlineField = '';
                    var failedField = '';
                    var reasonField = '';
                    var actionDeadline = '';
                    var reasonField = '';
                    var docField = '';
                    var noteField = '';
                    var actionSubmitField = '';
                    var dropdownMenu = '';
                    var buttonAddGoal = '';



                    for (var i = 0; i < result.rows; i++) {
                        var file = result.result[i].file;
                        var stat = result.result[i].status;

                        if (idMaster == 1) {
                            if (result.note[i] == null) {
                                var noteTemp = '<button class="btn btn-sm mb-1"><i class="fas fa-minus"></i></button>';
                            } else {
                                var noteTemp = '<button class="btn btn-sm mb-1 text-center justify-content-center" style="background-color: #e5e5e5;" data-toggle="popover" data-placement="top" data-content="' + result.note[i] + '">' + result.note[i].substring(0, 4) + '</button>';
                            }
                        } else {
                            if (result.note[i] == null && result.result[i].status >= 0) {
                                var noteTemp = '<button class="btn btn-sm mb-1" style="background-color: #e5e5e5;"><i class="fas fa-minus"></i></button>';
                            } else if (result.note[i] != null && result.result[i].status == 1) {
                                var noteTemp = '<button class="btn btn-sm mb-1 text-center justify-content-center" style="background-color: #e5e5e5;" data-toggle="popover" data-placement="top" data-content="' + result.note[i] + '">' + result.note[i].substring(0, 4) + '</button>';
                            } else if (result.note[i] != null && result.result[i].status == 3) {
                                var noteTemp = '<button class="btn btn-sm mb-1 text-center justify-content-center border-warning btn-danger" data-toggle="popover" data-placement="top" data-content="' + result.note[i] + '">' + result.note[i].substring(0, 4) + '</button>';
                            } else if (result.note[i] != null && result.result[i].status == 4) {
                                var noteTemp = '<button class="btn btn-sm mb-1 text-center justify-content-center" style="background-color: #e5e5e5;" data-toggle="popover" data-placement="top" data-content="' + result.note[i] + '">' + result.note[i].substring(0, 4) + '</button>';
                            } else if (result.note[i] != null && result.result[i].status == 5) {
                                var noteTemp = '<button class="btn btn-sm mb-1 text-center justify-content-center" style="background-color: #e5e5e5;" data-toggle="popover" data-placement="top" data-content="' + result.note[i] + '">' + result.note[i].substring(0, 4) + '</button>';
                            } else if (result.note[i] != null && result.result[i].status == 2) {
                                var noteTemp = '<button class="btn btn-sm mb-1 text-center justify-content-center" style="background-color: #e5e5e5;" data-toggle="popover" data-placement="top" data-content="' + result.note[i] + '">' + result.note[i].substring(0, 4) + '</button>';
                            }
                        }

                        //accesbility
                        if (idMaster == 1) {
                            var deadlineValue = result.newDeadlineDate[i].substring(0, 3);
                            var hourValue = result.newDeadlineHour[i].substring(0, 3);
                        } else {
                            var deadlineValue = result.newDeadlineDate[i].substring(0, 6);
                            var hourValue = result.newDeadlineHour[i];
                        }

                        if (result.purpose[i] == '') {
                            var pur = '<i class="fas fa-minus"></i>';
                        } else {
                            var pur = result.purpose[i].substring(0, 4);
                        }

                        codeField += '<button type="button" class="btn btn-sm mb-1 popoverCode " style="background-color: #e5e5e5;" data-container="body" data-toggle="popover" data-placement="top" data-content="' + code[i] + '">' +
                            code[i].substring(0, 4) +
                            '</button>' +
                            '<div class="row"><div class="col-md-1 col-sm-12 mb-2"><input class="form-control form-control-sm border-0 bg-white newCode' + i + '" readonly hidden></div></div>';

                        subjobField += '<button type="button" class="btn btn-sm mb-1" style="background-color: #e5e5e5;" data-container="body" data-toggle="popover" data-placement="top" data-content="' + result.subjob[i] + '">' +
                            result.subjob[i].substring(0, 4) +
                            '</button>' +
                            '<input class="form-control form-control-sm" hidden id="inputSubjob' + i + '" value="' + result.subjob[i] + '">' +
                            '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newSubjob' + i + '" readonly hidden></div></div>';

                        purposeField += '<button type="button" class="btn btn-sm mb-1" style="background-color: #e5e5e5;" data-container="body" data-toggle="popover" data-placement="top" data-content="' + result.purpose[i] + '">' +
                            pur +
                            '</button>' +
                            '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newPurpose' + i + '" readonly hidden></div></div>';


                        deadlineField += '<div class="btn-group" style="font-size: 0.8em;">' +
                            '<button type="button" class="btn btn-sm mb-1" style="background-color: #e5e5e5;" data-toggle="popover" data-placement="top" data-content="' + result.newDeadlineDate[i] + '">' +
                            deadlineValue +
                            '</button>' +
                            '<button type="button" class="btn btn-sm mb-1 timeCounter" style="background-color: #e5e5e5;" data-toggle="popover" data-placement="top" data-content="' + result.newDeadlineHour[i] + '">' +
                            hourValue +
                            '</button>' +
                            '</div>' +
                            '<div class="newDeadlineGroup' + i + '">' +
                            '<div class="input-group mb-2" id="deadlineGroup' + i + '" style="font-size: 0.8em;">' +
                            '<input class="form-control form-control-sm newDeadlineDate" hidden id="newDeadlineDate' + i + '" onchange="checkDate(' + i + ')">' +
                            '<input class="form-control form-control-sm newDeadlineHour" hidden id="newDeadlineHour' + i + '">' +
                            '<button class="btn btn-sm btn-danger hideAddDeadline' + i + '" hidden onclick="hideAddDeadline(' + i + ')"><i class="fas fa-times"></i></button>' +
                            '</div>' +
                            '</div>';

                        if (result.result[i].leader == idMaster || idMaster == 1) {
                            if (result.result[i].status == 3 && result.result[i].note != null) {
                                actionDeadline += '<button class="btn btn-sm btn-warning mb-1 addDeadline' + i + '" data-toggle="popover" data-placement="top" data-content="Activate you job before start editing"><i class="fas fa-minus"></i></button>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newAction' + i + '" readonly hidden></div></div>';
                            } else if (result.result[i].status == 1) {
                                actionDeadline += '<button class="btn btn-sm btn-primary mb-1 addDeadline' + i + '" onclick="addDeadline(' + i + ')"><i class="fas fa-plus"></i></button>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newAction' + i + '" readonly hidden></div></div>';
                            } else if (result.result[i].status == 0) {
                                actionDeadline += '<button class="btn btn-sm btn-success mb-1 addDeadline' + i + '" data-toggle="popover" data-placement="top" data-content="This job successfully finished"><i class="fas fa-check"></i></button>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newAction' + i + '" readonly hidden></div></div>';
                            } else if (result.result[i].status == 4) {
                                actionDeadline += '<button class="btn btn-sm btn-primary mb-1 addDeadline' + i + '" onclick="addDeadline(' + i + ')"><i class="fas fa-plus"></i></button>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newAction' + i + '" readonly hidden></div></div>';
                            } else if (result.result[i].status == 5) {
                                actionDeadline += '<button class="btn btn-sm btn-primary mb-1 addDeadline' + i + '" onclick="addDeadline(' + i + ')"><i class="fas fa-plus"></i></button>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newAction' + i + '" readonly hidden></div></div>';
                            } else if (result.result[i].status == 2) {
                                actionDeadline += '<button class="btn btn-sm mb-1 addDeadline' + i + '" style="background-color: #e5e5e5;" data-toggle="popover" data-placement="top" data-content="Waiting confirmation from CEO"><i class="fas fa-minus"></i></button>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newAction' + i + '" readonly hidden></div></div>';
                            }
                        } else if (result.result[i].leader != idMaster || idMaster != 1) {
                            actionDeadline += '<button class="btn btn-sm mb-1 addDeadline' + i + '" data-toggle="popover" data-placement="top" data-content="only leader can access this add form" style="background-color: #e5e5e5;"><i class="fas fa-minus"></i></button>' +
                                '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newAction' + i + '" readonly hidden></div></div>';
                        }

                        failedField += '<button class="btn btn-sm mb-1 failedField' + i + '" style="background-color: #e5e5e5;"><i class="fas fa-minus"></i></button>' +
                            '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newAction' + i + '" readonly hidden></div></div>';

                        if (result.reason[i] == null) {
                            reasonField += '<div class="newReasonGroup' + i + '">' +
                                '<button class="btn btn-sm mb-1" style="background-color: #e5e5e5;"><i class="fas fa-minus"></i></button>' +
                                '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newReason' + i + '" readonly hidden></div></div>' +
                                '</div>';
                        } else {
                            reasonField += '<div class="newReasonGroup' + i + '">' +
                                '<button class="btn btn-sm mb-1" style="background-color: #e5e5e5;"><i class="fas fa-minus"></i></button>' +
                                '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newReason' + i + '" readonly hidden></div></div>' +
                                '</div>';
                        }

                        //document field and action submit button condition
                        if (idMaster != 1) {
                            if (result.result[i].file == null && result.result[i].status == 1) {
                                if (result.result[i].leader == idMaster || idMaster == 1) {
                                    docField += '<button class="btn btn-sm mb-1" style="background-color: #e5e5e5;" onclick="showModalUpload(' + result.idSubjob[i] + ', ' + i + ')"><i class="fas fa-minus"></i></button>' +
                                        '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newDocField' + i + '" readonly hidden></div></div>';
                                    actionSubmitField += '<button class="btn btn-sm mb-1 actionSubmitButton' + i + '" style="background-color: #e5e5e5;"><i class="fas fa-minus"></i></button>' +
                                        '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newActionSubmit' + i + '" readonly hidden></div></div>';
                                } else if (result.result[i].leader != idMaster || idMaster != 1) {
                                    docField += '<button class="btn btn-sm mb-1" style="background-color: #e5e5e5;" data-toggle="popover" data-placement="top" data-content="Only leader can access this upload file form"><i class="fas fa-minus"></i></button>' +
                                        '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newDocField' + i + '" readonly hidden></div></div>';
                                    actionSubmitField += '<button class="btn btn-sm mb-1 actionSubmitButton' + i + '" style="background-color: #e5e5e5;"><i class="fas fa-minus"></i></button>' +
                                        '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newActionSubmit' + i + '" readonly hidden></div></div>';
                                }
                            } else if (result.result[i].file != null && result.result[i].status == 1) {
                                if (result.result[i].note != null) {
                                    docField += '<button class="btn btn-sm mb-1" style="background-color: #e5e5e5;" onclick="showModalUpload(' + result.idSubjob[i] + ', ' + i + ')"><i class="fas fa-minus"></i></button>' +
                                        '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newDocField' + i + '" readonly hidden></div></div>';
                                    actionSubmitField += '<button class="btn btn-sm mb-1 actionSubmitButton' + i + '" style="background-color: #e5e5e5;"><i class="fas fa-minus"></i></button>' +
                                        '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newActionSubmit' + i + '" readonly hidden></div></div>';
                                } else {
                                    docField += '<div class="btn-group">' +
                                        '<button class="btn btn-sm btn-success mb-1 docVal' + i + '" data-id="' + result.idSubjob[i] + '" onclick="showDocument(' + i + ')"><i class="fas fa-eye"></i></button>' +
                                        '<button class="btn btn-sm btn-danger mb-1" onclick="deleteUploadedFile(' + result.idSubjob[i] + ')"><i class="fas fa-trash"></i></button>' +
                                        '</div>' +
                                        '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newDocField' + i + '" readonly hidden></div></div>';
                                    actionSubmitField += '<button class="btn btn-sm btn-success mb-1" onclick="getJobReview(' + result.result[i].id + ', ' + i + ', 1)"><i class="fas fa-check"></i></button>' +
                                        '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newActionSubmit' + i + '" readonly hidden></div></div>';
                                }
                            } else if (result.result[i].file != null && result.result[i].status == 2) {
                                docField += '<button class="btn btn-sm btn-warning mb-1" data-toggle="popover" data-placement="top" data-content="Wating confirmation from CEO"><i class="fas fa-exclamation"></i></button>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newDocField' + i + '" readonly hidden></div></div>';
                                actionSubmitField += '<button class="btn btn-sm btn-warning mb-1" data-toggle="popover" data-placement="top" data-content="Wating confirmation from CEO"><i class="fas fa-exclamation"></i></button>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newActionSubmit' + i + '" readonly hidden></div></div>';
                            } else if (result.result[i].file != null && result.result[i].status == 3) {
                                docField += '<button class="btn btn-sm btn-warning mb-1" data-toggle="popover" data-placement="top" data-content="Activate you job before start editing"><i class="fas fa-minus"></i></button>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newDocField' + i + '" readonly hidden></div></div>';
                                actionSubmitField += '<div class="dropup">' +
                                    '<button class="btn btn-sm btn-primary mb-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>' +
                                    '<div class="dropdown-menu">' +
                                    '<a class="dropdown-item" onclick="changeFailed(' + result.result[i].id + ', ' + result.result[i].id_title + ')">Re-active</a>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newActionSubmit' + i + '" readonly hidden></div></div>';
                            } else if (result.result[i].file != null && result.result[i].status == 4) {
                                docField += '<button class="btn btn-sm mb-1" style="background-color: #e5e5e5;" onclick="showModalUpload(' + result.idSubjob[i] + ', ' + i + ')"><i class="fas fa-minus"></i></button>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newDocField' + i + '" readonly hidden></div></div>';
                                actionSubmitField += '<button class="btn btn-sm mb-1 actionSubmitButton' + i + '" style="background-color: #e5e5e5;"><i class="fas fa-minus"></i></button>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newActionSubmit' + i + '" readonly hidden></div></div>';
                            } else if (result.result[i].file != null && result.result[i].status == 5) {
                                docField += '<div class="btn-group">' +
                                    '<button class="btn btn-sm btn-success mb-1 docVal' + i + '" data-id="' + result.idSubjob[i] + '" onclick="showDocument(' + i + ')"><i class="fas fa-eye"></i></button>' +
                                    '<button class="btn btn-sm btn-danger mb-1" onclick="deleteUploadedFile(' + result.idSubjob[i] + ')"><i class="fas fa-trash"></i></button>' +
                                    '</div>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newDocField' + i + '" readonly hidden></div></div>';
                                actionSubmitField += '<button class="btn btn-sm btn-success mb-1" onclick="getJobReview(' + result.result[i].id + ', ' + i + ', 1)"><i class="fas fa-check"></i></button>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newActionSubmit' + i + '" readonly hidden></div></div>';
                            } else if (result.result[i].status == 0) {
                                docField += '<button class="btn btn-success btn-sm mb-1 docVal' + i + '" data-id="' + result.idSubjob[i] + '" data-toggle="popover" data-placement="top" data-content="This job successfully finished"><i class="fas fa-check"></i></button>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newDocField' + i + '" readonly hidden></div></div>';
                                actionSubmitField += '<button class="btn btn-success btn-sm mb-1 docVal' + i + '" data-id="' + result.idSubjob[i] + '" data-toggle="popover" data-placement="top" data-content="This job successfully finished"><i class="fas fa-check"></i></button>' +
                                    // '</div>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newActionSubmit' + i + '" readonly hidden></div></div>';
                            }
                        } else if (idMaster == 1) {
                            if (result.result[i].file != null && result.result[i].status == 2) {
                                docField += '<button class="btn btn-danger btn-sm mb-1 text-warning docVal' + i + '" data-id="' + result.idSubjob[i] + '" onclick="showDocument(' + i + ')"><i class="fas fa-eye"></i></button>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newDocField' + i + '" readonly hidden></div></div>';
                                actionSubmitField += '<button class="btn btn-sm mb-1 btn-success actionSubmitButton' + i + '" onclick="getJobReview(' + result.result[i].id + ', ' + i + ', 1)"><i class="fas fa-check"></i></button>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newActionSubmit' + i + '" readonly hidden></div></div>';
                            } else if (result.result[i].file == null && result.result[i].status == 1) {
                                docField += '<button class="btn btn-sm mb-1" style="background-color: #e5e5e5;" data-toggle="popover" data-placement="top" data-content="This job is not finished"><i class="fas fa-minus"></i></button>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newDocField' + i + '" readonly hidden></div></div>';
                                actionSubmitField += '<button class="btn btn-sm mb-1 actionSubmitButton' + i + '" style="background-color: #e5e5e5;"><i class="fas fa-minus"></i></button>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newActionSubmit' + i + '" readonly hidden></div></div>';
                            } else if (result.result[i].file != null && result.result[i].status == 3) {
                                docField += '<button class="btn btn-sm mb-1 btn-warning text-black" data-toggle="popover" data-placement="top" data-content="Waiting to be fixed by the user"><i class="fas fa-exclamation"></i></button>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newDocField' + i + '" readonly hidden></div></div>';
                                actionSubmitField += '<button class="btn btn-sm mb-1 actionSubmitButton' + i + '" style="background-color: #e5e5e5;"><i class="fas fa-minus"></i></button>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newActionSubmit' + i + '" readonly hidden></div></div>';
                            } else if (result.result[i].file != null && result.result[i].status == 1) {
                                docField += '<button class="btn btn-sm mb-1" style="background-color: #e5e5e5;"><i class="fas fa-minus"></i></button>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newDocField' + i + '" readonly hidden></div></div>';
                                actionSubmitField += '<button class="btn btn-sm mb-1 actionSubmitButton' + i + '" style="background-color: #e5e5e5;"><i class="fas fa-minus"></i></button>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newActionSubmit' + i + '" readonly hidden></div></div>';
                            } else if (result.result[i].status == 0) {
                                docField += '<button class="btn btn-success btn-sm mb-1 docVal' + i + '" data-id="' + result.idSubjob[i] + '" data-toggle="popover" data-placement="top" data-content="This job successfully finished"><i class="fas fa-check"></i></button>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newDocField' + i + '" readonly hidden></div></div>';
                                actionSubmitField += '<div class="dropleft">' +
                                    '<button class="btn btn-primary btn-sm mb-1 docVal' + i + '" data-id="' + result.idSubjob[i] + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>' +
                                    '<div class="dropdown-menu">' +
                                    '<a class="dropdown-item" href="#" onclick="confirmReactive(' + result.result[i].id + ', ' + i + ')">Re-active job</a>' +
                                    '<a class="dropdown-item" href="#" onclick="getJobReview(' + result.result[i].id + ', ' + i + ', 0)">Detail</a>' +
                                    '</div>' +
                                    // '</div>' +
                                    '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newActionSubmit' + i + '" readonly hidden></div></div>';
                            }
                        }

                        // docField += '<button class="btn btn-sm check' + i + '" style="background-color: #e5e5e5;"><i class="fas fa-minus"></i></button>';

                        noteField += '<div class="noteGroup' + i + ' text-center justify-content-center">' +
                            // '<button class="btn btn-sm mb-1" style="background-color: #e5e5e5;">' + noteTemp + '</button>' +
                            noteTemp +
                            '</div>' +
                            '<div class="row"><div class="col-md-1 col-sm-1 mb-2 helpNote' + i + '"><input class="form-control form-control-sm border-0 bg-white newNote' + i + '" readonly hidden></div></div>';

                        // actionSubmitField += actionSubVal +
                        //     '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newActionSubmit' + i + '" readonly hidden></div></div>';

                        var hiddenFile = '<input class="form-control" name="hiddenFile" value="' + result.subjob[i].substring(0, 4) + '">';
                        dropdownMenu += '<div class="dropdown-menu" aria-labelledby="dropdownSubmit0">' +
                            '<a class="dropdown-item" onclick="done(' + result.idSubjob[i] + ')">Preview</a>' +
                            '</div>';

                        if (result.result[0].goal == '') {
                            var goalField = '<div class="form-group">' +
                                '<label>Goal</label>' +
                                '<input class="form-control goalFieldNew' + i + '" readonly value="No set yet">' +
                                '</div>';
                        } else if (result.result[0].goal != '') {
                            var goalField = '<div class="form-group">' +
                                '<label>Goal</label>' +
                                '<input class="form-control goalFieldNew' + i + '" readonly value="' + result.result[0].goal + '">' +
                                '</div>';
                        }

                        if (result.result[i].status != 0) {
                            var buttonAddGoal = '<label style="color: white">add</label>' +
                                '<button class="btn btn-sm text-primary" onclick="addGoal(' + result.result[i].id_title + ', ' + i + ')"><i class="fas fa-pen"></i></button>';
                        }
                    }


                    $('.hiddenFile').html(hiddenFile);

                    $('.codeField').append(codeField);
                    $('.subjobField').append(subjobField);
                    $('.purposeField').append(purposeField);
                    $('.deadlineField').append(deadlineField);
                    $('.actionDeadlineField').append(actionDeadline);
                    $('.failedField').append(failedField);
                    $('.reasonField').append(reasonField);
                    $('.alarmField').append(alarmField);
                    $('.docField').append(docField);
                    $('.noteField').append(noteField);
                    $('.actionSubmitField').append(actionSubmitField);

                    //goal
                    if (result.result[0].goal == '' && idMaster == 1) {
                        $('.actionAddGoal').html(buttonAddGoal);
                    }
                    $('.goalField').html(goalField);

                    $('.dropdown').append(dropdownMenu);

                    $('[data-toggle="popover"]').popover({
                        trigger: 'focus'
                    });

                    $('.newDeadlineDate').datepicker({
                        format: 'yyyy-mm-dd',
                        todayHighlight: true,
                        autoclose: true
                    })

                    $('.newDeadlineHour').clockpicker({
                        placement: 'top',
                        donetext: 'Done',
                        autoclose: true
                    });
                }
            }
        })
    }

    function confirmReactive(idSub, idForm) {
        swal("Are you sure to activate this Job again?", {
                buttons: {
                    cancel: "Wait a minute",
                    catch: {
                        text: "Yes, reactive again",
                        value: "catch",
                    },
                },
            })
            .then((value) => {
                switch (value) {
                    case "catch":
                        $('.modalNote').modal('show');
                        var body = '<div class="row mb-2">' +
                            '<div class="col text-center">' +
                            '<div class="form-group">' +
                            '<label>Input CEO Password</label>' +
                            '<input type="password" name="ceoPassword" class="form-control ceoPassword' + idForm + '">' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                        $('.bodyModalNote').html(body);

                        $('.saveNote').text('Submit');
                        $('.saveNote').attr('onclick', 'reactiveJob(' + idSub + ', ' + idForm + ')');
                        break;

                    default:
                        swal("Got away safely!");
                }
            });
    }

    function reactiveJob(idSub, idForm) {
        var password = $('.ceoPassword' + idForm).val();

        if (password == '') {
            getToast("Password field cannot be null");
        } else {
            $.ajax({
                type: 'POST',
                data: {
                    id: idSub,
                    password: password
                },
                url: '<?= base_url('job/reactiveJob'); ?>',
                dataType: 'json',
                beforeSend: function() {
                    var x = '<div class="text-center">' +
                        '<span>Loading ....</span> <br>' +
                        '<div class="spinner-grow text-info m-1" role="status">' +
                        '<span class="visually-hidden">Loading...</span>' +
                        '</div>' +
                        '<div class="spinner-grow text-warning m-1" role="status">' +
                        '<span class="visually-hidden">Loading...</span>' +
                        '</div>' +
                        '<div class="spinner-grow text-danger m-1" role="status">' +
                        '<span class="visually-hidden">Loading...</span>' +
                        '</div>' +
                        '<div class="spinner-grow text-success m-1" role="status">' +
                        '<span class="visually-hidden">Loading...</span>' +
                        '</div>' +
                        '</div>';
                },
                success: function(result) {
                    //show modal to input the password of ceo

                    if (result.message == 'success') {
                        $('.modalNote').modal('hide');
                        $('.saveNote').text('Save note');
                        $('.saveNote').removeAttr('hidden');
                        $('.bodyModalNote').html('');

                        showDetail(result.idTitle);

                        swal("Success", "Job successfully re-activated", "success", {
                            buttons: false,
                            timer: 1500
                        })
                    } else {
                        getToast("Password didnt match", "error");
                    }

                }
            })
        }
    }

    function addGoal(idTitle, idForm) {
        var form = '<label>Input Goal</label>' +
            '<input class="form-control mb-2 goalFieldModal' + idTitle + '" name="goalField" placeholder="Type your goal here">'

        $('.bodyModalNote').html(form);
        $('.saveNote').attr('onclick', 'addNewGoal(' + idTitle + ',' + idForm + ')');
        $('.saveNote').text('Save Goal');
        $('.modalNote').modal('show');
    }

    function addNewGoal(idTitle, idForm) {
        var goal = $('.goalFieldModal' + idTitle).val();

        if (goal == '') {
            getToast("Goal cannot be null", "error");
        } else {
            $('.goalFieldNew' + idForm).val('');

            $('.goalFieldNew' + idForm).val(goal);

            var buttonAddGoal = '<label style="color: white">add</label>' +
                '<button class="btn btn-sm text-success" onclick="saveGoal(' + idTitle + ', ' + idForm + ')"><i class="fas fa-check"></i></button>';

            $('.actionAddGoal').html(buttonAddGoal);

            $('.modalNote').modal('hide');
            $('.bodyModalNote').html('');
            $('.saveNote').removeAttr('onclick');
            $('.saveNote').text('Save Note');
        }
    }

    function saveGoal(idTitle, idForm) {
        var goal = $('.goalFieldNew' + idForm).val();
        $.ajax({
            type: 'POST',
            data: {
                goal: goal,
                id: idTitle
            },
            url: '<?= base_url('job/addGoal'); ?>',
            dataType: 'json',
            success: function(result) {
                if (result.message == 'success') {
                    getToast("Goal has been added", "success");
                    detailSubjob(idTitle);
                    $('.actionAddGoal').html('');
                }
            }
        })
    }

    function addDeadline(idForm) {
        //unhide all new field
        $('.newCode' + idForm).removeAttr('hidden');
        $('.newSubjob' + idForm).removeAttr('hidden');
        $('.newPurpose' + idForm).removeAttr('hidden');
        $('#newDeadlineDate' + idForm).removeAttr('hidden');
        $('#newDeadlineHour' + idForm).removeAttr('hidden');
        $('.newReason' + idForm).removeAttr('hidden');
        $('.newAlarm' + idForm).removeAttr('hidden');
        $('.newDocField' + idForm).removeAttr('hidden');
        $('.newNote' + idForm).removeAttr('hidden');
        $('.newActionSubmit' + idForm).removeAttr('hidden');
        $('.newAlarm' + idForm).removeAttr('hidden');
        $('.newAction' + idForm).removeAttr('hidden');
        $('.hideAddDeadline' + idForm).removeAttr('hidden');

        //changeButton
        var button = $('.addDeadline' + idForm);
        changeButton('submitJob', idForm, button, '<i class="fas fa-check"></i>', 'saveNewDeadline(' + idForm + ')', 'btn btn-sm text-success mb-1 addDeadline' + idForm);
    }

    function hideAddDeadline(idForm) {
        $('.newCode' + idForm).prop('hidden', true);
        $('.newSubjob' + idForm).prop('hidden', true);
        $('.newPurpose' + idForm).prop('hidden', true);
        $('#newDeadlineDate' + idForm).prop('hidden', true);
        $('#newDeadlineHour' + idForm).prop('hidden', true);
        $('.newReason' + idForm).prop('hidden', true);
        $('.newAlarm' + idForm).prop('hidden', true);
        $('.newDocField' + idForm).prop('hidden', true);
        $('.newNote' + idForm).prop('hidden', true);
        $('.newActionSubmit' + idForm).prop('hidden', true);
        $('.newAlarm' + idForm).prop('hidden', true);
        $('.newAction' + idForm).prop('hidden', true);
        $('.hideAddDeadline' + idForm).prop('hidden', true);

        $('#newDeadlineDate' + idForm).val('');
        $('#newDeadlineHour' + idForm).val('');

        //change button
        var buttonAdd = $('.addDeadline' + idForm);
        changeButton('default', idForm, buttonAdd, '<i class="fas fa-plus"></i>', 'addDeadline(' + idForm + ')', 'btn btn-sm btn-primary addDeadline' + idForm);

    }

    function checkDate(idForm) {

        var deadlineValue = $('#newDeadlineDate' + idForm).val();
        var subjob = $('#inputSubjob' + idForm).val();

        $.ajax({
            type: 'POST',
            data: {
                deadlineDate: deadlineValue,
                subjob: subjob
            },
            url: '<?= base_url('job/checkDate'); ?>',
            dataType: 'text',
            success: function(result) {
                if (result == 'cannot update') {
                    getToast("The date must be more than the existing deadline", "error");
                    $('#newDeadlineDate' + idForm).val('');
                } else {
                    getToast("Deadline available", "success");
                }
            }
        })
    }

    function checkDateForNew(idForm) {
        var deadlineValue = $('#deadlineDateAddNew' + idForm).val();

        $.ajax({
            type: 'POST',
            data: {
                deadlineDate: deadlineValue
            },
            url: '<?= base_url('job/checkDateForNew'); ?>',
            dataType: 'text',
            success: function(result) {
                if (result == 'cannot update') {
                    getToast("The date must be more than today", "error");
                    $('#deadlineDateAddNew' + idForm).val('');
                } else {
                    getToast("Deadline available", "success");
                }
            }
        })
    }

    function saveNewDeadline(idForm) {
        var deadlineDate = $('#newDeadlineDate' + idForm).val();
        var deadlineHour = $('#newDeadlineHour' + idForm).val();
        var subjob = $('#inputSubjob' + idForm).val();

        if (deadlineDate == '') {
            getToast("Deadline date cannot be null", "error");
        } else if (deadlineHour == '') {
            getToast("Deadline hour cannot be null", "error");
        } else {
            $('.alarmCheckbox').html('');
            $('.inputReason').val('');
            //show modal to input reason 
            $('.saveReason').attr('onclick', 'saveReason(' + idForm + ')');
            $('.modalReason').modal('show');

            var inputField = '<div class="form-group"><label>Reason</label><input class="form-control inputReason" name="inputReason"></div><div class="alarmLabel"><label>Alarm</label><div class="alarmCheckbox"></div></div>'
            $('.bodyModalReason').html(inputField);

            getAlarm();
        }
    }

    function saveReason(idForm) {
        var reason = $('.inputReason').val();
        var alarm = $('input[name="listAlarm[]"]:checked').map(function() {
            return $(this).val();
        }).toArray();
        var deadlineDate = $('#newDeadlineDate' + idForm).val();
        var deadlineHour = $('#newDeadlineHour' + idForm).val();
        var subjob = $('#inputSubjob' + idForm).val();

        if (reason == '') {
            getToast("Reason field cannot be null", "error");
        } else if (alarm == '') {
            getToast("Alarm field cannot be null", "error");
        } else {
            //change button
            $.ajax({
                type: 'POST',
                data: {
                    deadlineDate: deadlineDate,
                    deadlineHour: deadlineHour
                },
                url: '<?= base_url('job/changeDate'); ?>',
                dataType: 'json',
                success: function(result) {
                    var buttonDeadlineDate = '<div class="btn-group">' +
                        '<button type="button" class="btn btn-sm mb-1 w-100" style="background-color: #e5e5e5;" data-container="body" data-toggle="popover" data-placement="top" data-content="' + result + '">' +
                        result.substring(0, 4) +
                        '</button>' +
                        '<button type="button" class="btn btn-sm mb-1 w-100" style="background-color: #e5e5e5;" data-container="body" data-toggle="popover" data-placement="top" data-content="' + deadlineHour + '">' +
                        deadlineHour +
                        '</button>' +
                        '</div>';

                    $('#newDeadlineDate' + idForm).prop('hidden', true);
                    $('#newDeadlineHour' + idForm).prop('hidden', true);
                    $('#deadlineGroup' + idForm).attr('class', 'input-group mb-1');
                    $('.hideAddDeadline' + idForm).prop('hidden', true);
                    $('.newDeadlineGroup' + idForm).append(buttonDeadlineDate);


                    //change reason field
                    $('.newReasonGroup' + idForm).html('');

                    var reasonField = '<button type="button" class="btn btn-sm mb-1 popoverCode" style="background-color: #e5e5e5;" data-container="body" data-toggle="popover" data-placement="top" data-content="' + reason + '">' +
                        reason.substring(0, 4) +
                        '</button>' +
                        '<input class="form-control inputHiddenReason' + idForm + '" hidden value="' + reason + '">' +
                        '<div class="row"><div class="col-md-1 col-sm-1 mb-2"><input class="form-control form-control-sm border-0 bg-white newReason' + idForm + '" readonly hidden></div></div>';

                    $('.newReasonGroup' + idForm).html(reasonField);

                    $('.newReason' + idForm).removeAttr('hidden');

                    //change failed button
                    var button = $('.failedField' + idForm);
                    changeButton('failed', idForm, button, '<i class="fas fa-times"></i>', '', 'btn btn-sm text-danger');

                    //change add Deadline button
                    var buttonAdd = $('.addDeadline' + idForm);
                    changeButton('default', idForm, buttonAdd, '<i class="fas fa-plus"></i>', '', 'btn btn-sm btn-primary addDeadline' + idForm);

                    //change actionSubmitButton
                    var buttonSubmit = $('.actionSubmitButton' + idForm);
                    changeButton('submitJob', idForm, buttonSubmit, '<i class="fas fa-check-double"></i>', 'saveNewChange(' + idForm + ')', 'btn btn-sm text-success');

                    $('.modalReason').modal('hide');

                    $('[data-toggle="popover"]').popover({
                        trigger: 'focus'
                    });

                }
            })

        }
    }

    function saveNewChange(idForm) {
        var reason = $('.inputReason').val();
        var alarm = $('input[name="listAlarm[]"]:checked').map(function() {
            return $(this).val();
        }).toArray();
        var deadlineDate = $('#newDeadlineDate' + idForm).val();
        var deadlineHour = $('#newDeadlineHour' + idForm).val();
        var subjob = $('#inputSubjob' + idForm).val();
        var note = $('#newInputNote' + idForm).val();

        swal("Are you sure to change this job?", {
                buttons: {
                    cancel: "Wait, i'll check again",
                    catch: {
                        text: "Yes, change this job",
                        value: "catch",
                    },
                },
            })
            .then((value) => {
                switch (value) {

                    case "catch":

                        $.ajax({
                            type: 'POST',
                            data: {
                                deadlineDate: deadlineDate,
                                deadlineHour: deadlineHour,
                                subjob: subjob,
                                reason: reason,
                                alarm: alarm,
                                note: note
                            },
                            url: '<?= base_url('job/saveNewDeadline'); ?>',
                            dataType: 'text',
                            success: function(result) {
                                if (result == 'cannot update') {
                                    getToast("the date must be more than the existing deadline", "error");
                                } else {
                                    getToast("Job has been Updated", "success");
                                    showDetail(result);
                                    $('.modalReason').modal('hide');

                                    $('.newCode' + idForm).prop('hidden', true);
                                    $('.newSubjob' + idForm).prop('hidden', true);
                                    $('.newPurpose' + idForm).prop('hidden', true);
                                    $('#newDeadlineDate' + idForm).prop('hidden', true);
                                    $('#newDeadlineDate' + idForm).val('');
                                    $('#newDeadlineHour' + idForm).prop('hidden', true);
                                    $('#newDeadlineHour' + idForm).val('');
                                    $('.newReason' + idForm).prop('hidden', true);
                                    $('.newAlarm' + idForm).prop('hidden', true);
                                    $('.newDoc' + idForm).prop('hidden', true);
                                    $('.newNote' + idForm).prop('hidden', true);
                                    $('.newActionSubmit' + idForm).prop('hidden', true);
                                    $('.newAlarm' + idForm).prop('hidden', true);
                                    $('.newAction' + idForm).prop('hidden', true);

                                    var button = $('.addDeadline' + idForm);
                                    changeButton('default', result, button, '<i class="fas fa-plus"></i>', 'addDeadline(' + idForm + ')');
                                }
                            }
                        })

                        swal("Success!", "Job has been changed", "success", {
                            buttons: false,
                            timer: 1500
                        });
                        break;

                    default:
                        swal("Okay check again");
                }
            });
    }

    function addNote(idForm) {
        $('.noteGroup').removeAttr('hidden');
        $('.inputNote').val('');
        //show modal note
        $('.modalNote').modal('show');

        $('.saveNote').attr('onclick', 'saveNote(' + idForm + ')');

        //change button modal 
    }

    function saveNote(idSubjob, idForm) {
        var note = $('.inputNote').val();

        var buttonGroup = '<div class="btn-group">' +
            '<button class="btn btn-sm" style="background-color: #e5e5e5;" data-toggle="popover" data-placement="top" data-container="body" data-content="' + note + '">' + note.substring(0, 2) + '</button>' +
            '<button class="btn btn-sm btn-danger" onclick="deleteNote(' + idSubjob + ',' + idForm + ')"><i class="fas fa-trash"></i></button>' +
            '<input class="form-control" hidden id="newInputNote' + idForm + '" value="' + note + '">' +
            '</div>';

        $('.noteGroup' + idForm).html(buttonGroup);

        $('.modalNote').modal('hide');

        //change button submit
        var buttonSubmit = $('.actionSubmitButton' + idForm);
        changeButton('submitJob', idForm, buttonSubmit, '<i class="fas fa-check-double"></i>', 'saveNewChange(' + idForm + ')', 'btn btn-sm text-success actionSubmitButton' + idForm);

        $('[data-toggle="popover"]').popover({
            trigger: 'focus'
        });
    }

    function deleteNote(idSubjob, idForm) {
        var button = '<button class="btn btn-sm mb-1 addNote' + idForm + '" style="background-color: #e5e5e5;" id="addNote' + idForm + '" onclick="addNote(' + idForm + ')"><i class="fas fa-minus"></i></button>';

        $('.noteGroup' + idForm).html(button);

        getToast("Note has been deleted", "success");

        //change actionSubmitButton
        // <button class="btn btn-sm mb-1 btn-success actionSubmitButton' + i + '" onclick="getJobReview(' + result.result[i].id + ', ' + i + ')"><i class="fas fa-check"></i></button>

        var buttonSubmit = $('.actionSubmitButton' + idForm);
        changeButton('submitJob', idForm, buttonSubmit, '<i class="fas fa-check"></i>', 'getJobReview(' + idSubjob + ', ' + idForm + ')', 'btn btn-sm btn-success mb-1 actionSubmitButton' + idForm);
    }

    function getHistory(idJob) {
        var idMaster = '<?= $_SESSION['id']; ?>'

        $.ajax({
            type: 'POST',
            data: {
                id: idJob
            },
            url: '<?= base_url('job/getHistory'); ?>',
            dataType: 'json',
            success: function(result) {
                if (result.message != 'not found') {
                    $('#historyHide').removeAttr('hidden');
                    $('.targetHistory').removeAttr('hidden');

                    var res = result.result;

                    var historyCode = '';
                    var historySubjob = '';
                    var historyPurpose = '';
                    var historyDeadline = '';
                    var historyFailed = '';
                    var historyReason = '';
                    var historyAlarm = '';
                    var historyDoc = '';
                    var historyNote = '';

                    for (var d = 0; d < result.deadlineDate.length; d++) {
                        historyDeadline += '<button type="button" class="btn btn-sm mb-1 popoverCode" style="background-color: #e5e5e5;" data-container="body" data-toggle="popover" data-placement="top" data-content="' + result.deadlineDate[d] + '">' +
                            result.deadlineDate[d] +
                            '</button>' +
                            '<button type="button" class="btn btn-sm mb-1 popoverCode" style="background-color: #e5e5e5;" data-container="body" data-toggle="popover" data-placement="top" data-content="' + result.deadlineHour[d] + '">' +
                            result.deadlineHour[d] +
                            '</button>' +
                            '<br>';
                    }

                    for (var v = 0; v < result.alarm.length; v++) {
                        var alarmName = result.alarm[v].toString();
                        historyAlarm += '<button type="button" class="btn btn-sm mb-1" style="background-color: #e5e5e5;" data-container="body" data-toggle="popover" data-placement="top" data-content="' + alarmName + '">' +
                            alarmName.substring(0, 4) +
                            '</button>' + '<br>';
                    }



                    for (var i = 0; i < res.length; i++) {
                        historyCode += '<button type="button" class="btn btn-sm mb-1 popoverCode" style="background-color: #e5e5e5;" data-container="body" data-toggle="popover" data-placement="top" data-content="' + res[i].code + '">' +
                            res[i].code.substring(0, 4) +
                            '</button>';
                        historySubjob += '<button type="button" class="btn btn-sm mb-1 popoverCode" style="background-color: #e5e5e5;" data-container="body" data-toggle="popover" data-placement="top" data-content="' + res[i].subjob + '">' +
                            res[i].subjob.substring(0, 4) +
                            '</button>';
                        historyPurpose += '<button type="button" class="btn btn-sm mb-1 popoverCode" style="background-color: #e5e5e5;" data-container="body" data-toggle="popover" data-placement="top" data-content="' + res[i].purpose + '">' +
                            res[i].purpose.substring(0, 4) +
                            '</button>';
                        historyReason += '<button type="button" class="btn btn-sm mb-1 popoverCode" style="background-color: #e5e5e5;" data-container="body" data-toggle="popover" data-placement="top" data-content="' + res[i].reason + '">' +
                            res[i].reason.substring(0, 4) +
                            '</button>';
                        if (idMaster == 1) {
                            historyDoc += '<button type="button" class="btn btn-sm mb-1 popoverCode" style="background-color: #e5e5e5;"><i class="fas fa-minus"></i></button>';
                        } else if (idMaster > 1) {
                            historyDoc += '<button type="button" class="btn btn-sm mb-1 popoverCode" style="background-color: #e5e5e5;" onclick="showModalUpload(' + i + ')"><i class="fas fa-minus"></i></button>';
                        }

                        if (res[i].note == null) {
                            var noteInfo = '<button class="btn btn-sm" style="background-color: #e5e5e5;"><i class="fas fa-minus"></i></button>';
                        } else {
                            var noteInfo = '<button type="button" class="btn btn-sm mb-1 popoverCode" style="background-color: #e5e5e5;" data-container="body" data-toggle="popover" data-placement="top" data-content="' + res[i].note + '">' +
                                res[i].note.substring(0, 4) +
                                '</button>';
                        }

                        historyNote += noteInfo;
                    }

                    // var row = '';
                    // for (var o = 0; o < res.length; o++) {
                    //     row += '<div class="row">' +
                    //         '<div class="col-sm-1 col-md-1">' + '<button type="button" class="btn btn-sm mb-1 popoverCode" style="background-color: #e5e5e5;" data-container="body" data-toggle="popover" data-placement="top" data-content="' + res[o].subjob + '">' +
                    //         res[o].subjob.substring(0, 4) +
                    //         '</button>' +
                    //         '</div>' +
                    //         '<div class="col-sm-1 col-md-1">' + '<button type="button" class="btn btn-sm mb-1 popoverCode" style="background-color: #e5e5e5;" data-container="body" data-toggle="popover" data-placement="top" data-content="' + res[o].purpose + '">' +
                    //         res[o].purpose.substring(0, 4) +
                    //         '</button>' +
                    //         '</div>' +
                    //         '<div class="col-sm-1 col-md-1">' + '<button type="button" class="btn btn-sm mb-1 popoverCode" style="background-color: #e5e5e5;" data-container="body" data-toggle="popover" data-placement="top" data-content="' + res[o].code + '">' +
                    //         res[o].code.substring(0, 4) +
                    //         '</button>' +
                    //         '</div>' +
                    //         '<div class="col-sm-5 col-md-5">' +
                    //         historyDeadline +
                    //         '</div>' +
                    //         '<div class="col-sm-1 col-md-1">' + '<button type="button" class="btn btn-sm mb-1 popoverCode" style="background-color: #e5e5e5;" data-container="body" data-toggle="popover" data-placement="top" data-content="' + res[o].reason + '">' +
                    //         res[o].reason.substring(0, 4) +
                    //         '</button>' +
                    //         '</div>' +
                    //         '<div class="col-sm-1 col-md-1">' +
                    //         historyAlarm +
                    //         '</div>' +
                    //         '</div>';
                    // }

                    // $('.targetHistoryValue').html(row);

                    $('.historyCode').html(historyCode);
                    $('.historySubjob').html(historySubjob);
                    $('.historyPurpose').html(historyPurpose);
                    $('.historyReason').html(historyReason);
                    $('.historyDeadline').html(historyDeadline);
                    $('.historyAlarm').html(historyAlarm);
                    $('.historyDoc').html(historyDoc);
                    $('.historyNote').html(historyNote);

                    $('[data-toggle="popover"]').popover({
                        trigger: 'focus'
                    });
                } else {
                    $('.targetHistory').prop('hidden', true);
                }
            }
        })
    }

    function showModalUpload(idJob, idForm) {
        $('.modalUpload').modal('show');

        $('.saveUpload').attr('data-id-file', idJob);
        var hiddenIdForm = '<input class="form-control" hidden name="hiddenIdForm" value="' + idForm + '">'
        $('.hiddenIdForm').html(hiddenIdForm);

    }

    function done(key) {
        $.ajax({
            type: 'POST',
            data: 'id=' + key + '&action=done',
            url: '<?= base_url('home/getUserJob'); ?>',
            dataType: 'text',
            success: function(result) {
                $('.modalDocument').modal('show');
                $('.targetDocument').html(result);
                $('.headerDocument').html('');
            }
        })
    }

    // -------------------------------------------------- Sub Field -------------------------------------------

    function showDocument(idForm) {
        var id = $('.docVal' + idForm).attr('data-id');

        $.ajax({
            type: 'POST',
            data: {
                id: id
            },
            url: '<?= base_url('job/showDocument'); ?>',
            dataType: 'text',
            success: function(result) {
                // $('.modalContentDocument').removeAttr('style');
                // $('.modalContentDocument').css({
                //     "border-radius": "10px",
                //     "background-color": "rgb(204,204,204)"
                // })
                $('.targetDocument').html(result);
                $('.modalDocument').modal('show');
                $('#submitButtonDocument').html('');
            }
        })
    }

    function changeButton(param, idJob, button, text, onclick, classButton) {
        if (param == 'submitJob') {
            button.removeAttr('onclick');
            if (classButton == '') {
                button.attr('class', 'btn btn-sm text-success');
            } else {
                button.attr('class', classButton);
            }
            button.attr('onclick', onclick);
            button.html(text);
        } else if (param == 'default') {
            button.removeAttr('onclick');
            if (classButton == '') {
                button.attr('class', 'btn btn-sm text-primary');
            } else {
                button.attr('class', classButton);
            }
            button.attr('onclick', onclick);
            button.html(text);
        } else if (param == 'failed') {
            button.removeAttr('onclick');
            if (classButton == '') {
                button.attr('class', 'btn btn-sm text-danger');
            } else {
                button.attr('class', classButton);
            }
            button.attr('onclick', onclick);
            button.html(text);
        }
    }

    function getToast(message, action) {
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "1500",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr[action](message);

        $(function() {
            $('[data-bs-toggle="popover"]').popover({
                trigger: 'focus'
            });
        })
    }

    function blink() {
        $('.blink').animate({
            opacity: 0
        }, 200, "linear", function() {
            $(this).animate({
                opacity: 1
            }, 200);
        });
    }
</script>