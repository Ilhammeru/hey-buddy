<div class="col-md-3 col-sm-3"></div>

<div class="col-md-9 col-sm-9">
    <div class="card">
        <div class="card-header text-center">
            <h5 class="card-title">New Job</h5>
        </div>
        <div class="card-body">
            <form id="formNewJob">
                <div class="row mb-3">
                    <label for="" class="col-form-label col-sm-4">Date</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control date" name="date" value="<?= toDateDefault(date('Y-m-d')); ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-form-label col-sm-4">Job's title</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control job" name="job" placeholder="Type your title for this job">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-form-label col-sm-4">Series</label>
                    <div class="col-sm-8">
                        <select name="seri" class="form-control seri" id="seriField">
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-form-label col-sm-4">Team name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control team" name="team" placeholder="Type your title for this job" onchange="showSubmitButton()">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-form-label col-sm-4">Crew</label>
                    <div class="col-sm-8">
                        <select name="crew[]" multiple="multiple" class="form-control crew" id="crew" onchange="getLeader()"></select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-form-label col-sm-4">Leader</label>
                    <div class="col-sm-8">
                        <select name="leader" class="form-control leader" id="leader" disabled></select>
                    </div>
                </div>

                <!-- Job field -->

                <div class="row mb-2">

                    <div class="col-md-1 col-sm-1">
                        <div class="form-group">
                            <label for="">Code</label>
                            <input type="text" class="form-control code" readonly name="code[]" value="<?= $_SESSION['user']; ?>">
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-3">
                        <div class="form-group">
                            <label for="">Job</label>
                            <input type="text" class="form-control subjob0" name="subjob[]">
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-3">
                        <div class="form-group">
                            <label for="">Purpose</label>
                            <input type="text" class="form-control purpose0" name="purpose[]">
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-2">
                        <div class="form-group">
                            <label for="">Deadline</label>
                            <div class="input-group">
                                <input type="text" class="form-control deadlineDate0" name="deadlineDate[]">
                                <input type="text" class="form-control deadlineHour0" name="deadlineHour[]">
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

                <div class="targetAddForm"></div>


                <div class="row mb-2">
                    <div class="col-md-5 col-sm-5">
                        <div class="form-group">
                            <label for="">Goal</label>
                            <textarea name="goal" id="goal" class="form-control goal" cols="7" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>


                <!-- job field -->
            </form>
        </div>
        <div class="card-footer text-center">
            <button class="btn btn-sm btn-primary text-center" id="saveJob" disabled onclick="saveJob()">Save Job</button>
        </div>
    </div>
</div>

<!-- modal -->
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
                                    <div class="alarmCheckbox"></div>
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
<!-- modal -->

<script>
    $(document).ready(function() {
        getSeri();
        getCrew();

        $('#crew').select2();

        var i = 0;
        $('.addForm').click(function(e) {
            e.preventDefault();
            i++;

            var template = '<di class="deleteRows' + i + '">' +
                '<div class="row mb-2">' +

                '<div class="col-md-1 col-sm-1">' +
                '<div class="form-group">' +
                '<label for="">Code</label>' +
                '<input type="text" class="form-control code' + i + '" name="code[]" value="<?= $_SESSION['user']; ?>">' +
                '</div>' +
                '</div>' +

                ' <div class="col-md-3 col-sm-3">' +
                '<div class="form-group">' +
                '<label for="">Job</label>' +
                ' <input type="text" class="form-control subjob' + i + '" name="subjob[]">' +
                ' </div>' +
                '</div>' +

                '<div class="col-md-3 col-sm-3">' +
                '<div class="form-group">' +
                '<label for="">Purpose</label>' +
                '<input type="text" class="form-control purpose' + i + '" name="purpose[]">' +
                '</div>' +
                '</div>' +

                '<div class="col-md-2 col-sm-2">' +
                '<div class="form-group">' +
                '<label for="">Deadline</label>' +
                '<div class="input-group">' +
                '<input type="text" class="form-control deadlineDate' + i + '" name="deadlineDate[]">' +
                '<input type="text" class="form-control deadlineHour' + i + '" name="deadlineHour[]">' +
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

            $('.targetAddForm').append(template);


            $(function() {
                $('.popoverAlarm').popover({
                    html: true,
                    sanitize: false,
                    content: function() {
                        return $('#popoverContent').html();
                    }
                })
            })

            $('.deadlineDate' + i).datepicker({
                // minViewMode: 'months',
                todayHighlight: true,
                format: 'yyyy-mm-dd',
                autoclose: true
            });

            $('.deadlineHour' + i).clockpicker({
                placement: 'top',
                donetext: 'Done',
                autoclose: true
            })
        })

        $('.deadlineDate0').datepicker({
            // minViewMode: 'months',
            todayHighlight: true,
            format: 'yyyy-mm-dd',
            autoclose: true
        });

        $('.deadlineHour0').clockpicker({
            placement: 'top',
            donetext: 'Done',
            autoclose: true
        })

        $(function() {
            $('.popoverAlarm').popover({
                html: true,
                sanitize: false,
                content: function() {
                    return $('#popoverContent').html();
                }
            })
        })

    })

    function showSubmitButton() {
        $('#saveJob').removeAttr('disabled');
    }

    function showModalAlarm(idForm) {
        $('.alarmCheckbox').html('');
        $('.modalAlarm').modal('show');

        var submitButton = '<button class="btn btn-sm btn-primary text-center" onclick="saveAlarm(' + idForm + ')">Submit</button>';
        $('.submitButton').html(submitButton);

        getAlarm();
    }

    function saveAlarm(idForm) {
        var alarm = $('input[name="listAlarm[]"]:checked').map(function() {
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
                    x += '<input class="form-control alarmIdField" hidden  name="alarmId' + idForm + '[]" value="' + alarmId[i] + '">'
                }
                $('.alarmId' + idForm).html(x);

                $('.alarmField' + idForm).val(alarmTostring);

                $('.modalAlarm').modal('hide');

                getToast("Alarm has been added", "success");
            }
        })
    }

    function deleteForm(idForm) {
        $('.deleteRows' + idForm).remove();
    }

    function showListAlarm(idForm) {
        $('.modalAlarm').modal('show');
    }

    function getSeri() {
        $.ajax({
            type: 'POST',
            data: 'select=id, seri&table=seri&condition=ORDER BY seri ASC&db=default',
            url: '<?= base_url('job/getDataDatabase'); ?>',
            dataType: 'json',
            success: function(result) {
                var field = $('#seriField');
                var option = '';

                for (var i = 0; i < result.length; i++) {
                    option += '<option value="' + result[i].id + '">' + result[i].seri + '</option>';
                }
                field.append(option);
            }
        })
    }

    function getCrew() {
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

                $('#crew').append(x);
            }
        })
    }

    function getLeader() {
        var crewList = $('select[name="crew[]"]').map(function() {
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
                $('#leader').html(x);
                $('#leader').removeAttr('disabled');
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
                        '<input class="form-check-input" name="listAlarm[]" type="checkbox" value="' + result[i].id + '" id="defaultCheck' + i + '">' +
                        '<label class="form-check-label" for="defaultCheck' + i + '">' +
                        result[i].alarm +
                        '</label>' +
                        '</div>';
                }

                $('.alarmCheckbox').append(x);
            }
        })
    }

    function clearAlarm() {
        var deadlineDate = $('input[name="deadlineDate[]"]').map(function() {
            return $(this).val();
        }).toArray();
        var deadlineHour = $('input[name="deadlineHour[]"]').map(function() {
            return $(this).val();
        }).toArray();

        $.ajax({
            type: 'POST',
            data: {
                deadlineDate: deadlineDate,
                deadlineHour: deadlineHour
            },
            url: '<?= base_url('job/clearAlarm'); ?>',
            dataType: 'text',
            success: function(result) {
                return false;
                var start = result.dayName - result.diff;
                var end = result.dayName.toString();
                var sum = '1';


                var key = (start - 1);
                var key1 = parseInt(end) + parseInt(sum);

                for (var i = key1; i <= 7; i++) {
                    $('input[value="' + i + '"]').prop('disabled', true);
                }

                for (var x = key; x > 0; x--) {
                    $('input[value="' + x + '"]').prop('disabled', true);
                }

            }
        })
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

    function saveJob() {

        //validation
        var job = $('.job').val();
        var seri = $('.seri').val();
        var team = $('.team').val();
        var crew = $('select[name="crew[]"]').map(function() {
            return $(this).val();
        }).toArray();
        var leader = $('.leader').val();


        var checkRow = $('input[name="code[]"]').map(function() {
            return $(this).val();
        }).toArray();
        var lenRow = checkRow.length;

        for (var i = 0; i < lenRow; i++) {
            var subjob = $('input[name="subjob[]"]').map(function() {
                return $(this).val();
            }).toArray();
            var lastSub = subjob[subjob.length - 1];

            var purpose = $('input[name="purpose[]"]').map(function() {
                return $(this).val();
            }).toArray();
            var lastPur = purpose[purpose.length - 1];

            var deadlineDate = $('input[name="deadlineDate[]"]').map(function() {
                return $(this).val();
            }).toArray();
            var lastDate = deadlineDate[deadlineDate.length - 1];

            var deadlineHour = $('input[name="deadlineHour[]"]').map(function() {
                return $(this).val();
            }).toArray();
            var lastHour = deadlineHour[deadlineHour.length - 1];

            var alarm = $('input[name="alarmField[]"]').map(function() {
                return $(this).val();
            }).toArray();
            var lastAlarm = alarm[alarm.length - 1];

            if (job == '') {
                getToast("Job cannot be null", "error");
            } else if (seri == '') {
                getToast("Seri cannot be null", "error");
            } else if (team == '') {
                getToast("Team cannot be null", "error");
            } else if (crew == '') {
                getToast("Crew cannot be null", "error");
            } else if (leader == '') {
                getToast("Leader cannot be null", "error");
            } else if (lastSub == '') {
                getToast("Subjob cannot be null", "error");
            } else if (lastPur == '') {
                getToast("Purpose cannot be null", "error");
            } else if (lastDate == '') {
                getToast("Daedline date cannot be null", "error");
            } else if (lastHour == '') {
                getToast("Deadline hour cannot be null", "error");
            } else if (lastAlarm == '') {
                getToast("Alarm cannot be null", "error");
            } else {
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
                                    url: '<?= base_url('job/saveJob'); ?>',
                                    dataType: 'text',
                                    success: function(result) {
                                        swal('Success', 'Job has been saved to database', 'success', {
                                            buttons: false,
                                            timer: 1500
                                        })

                                        $('.targetAddForm').html('');
                                        $('.job').val('');
                                        $('.team').val('');
                                        $('#crew').html('');
                                        $('.leader').val('');
                                        $('.subjob0').val('');
                                        $('.purpose0').val('');
                                        $('.deadlineDate0').val('');
                                        $('.deadlineHour0').val('');
                                        $('.alarmField0').val('');
                                        $('.alarmId0').html('');
                                        $('#goal').val('');

                                        setNotification();
                                    }
                                })

                                break;

                            default:
                                swal("Check again");
                        }
                    });
            }
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
</script>