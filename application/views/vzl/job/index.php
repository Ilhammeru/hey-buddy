<div class="container">
    <?php if ($_SESSION['id'] == 1) { ?>
        <div class="row mt-5">
            <div class="col-md-2 col-md-2 col-xs-12">

                <!-- button action -->

                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <button class="btn btn-sm nav-link w-100" id="newJobButton" style="background-color: #e5e5e5;" onclick="getFormNewJob()">New</button>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-sm nav-link w-100" id="selectionButton" style="background-color: #e5e5e5;" onclick="showSelection()">Exist</button>
                    </li>
                </ul>

                <!-- button action -->

            </div>

            <!-- selection field -->
            <div class="col-md-2 col-sm-2 col-xs-12">

                <div class="form-group" id="parentSeri" hidden>
                    <label for="">Choose Seri</label>
                    <select name="seri" class="form-control" readonly autocomplete="off" id="seri" onchange="showMonth()">
                        <option value="">-- Choose --</option>
                        <option value="100">All</option>
                    </select>
                </div>

            </div>

            <div class="col-md-2 col-sm-2 col-xs-12">

                <div class="form-group" id="parentMonth" hidden>
                    <label for="">Choose Month</label>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly autocomplete="off" name="month" id="month" onblur="showStatus()">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                    </div>
                </div>

                <!-- <div class="input-daterange input-group">
                <input type="text" class="input-sm form-control monthStart" autocomplete="off" readonly name="start" />
                <div class="input-group-prepend">
                    <span class="input-group-text">to</span>
                </div>
                <input type="text" class="input-sm form-control monthEnd" autocomplete="off" onblur="showStatus()" readonly name="end" />
            </div> -->

            </div>

            <div class="col-md-2 col-sm-2 col-xs-12">

                <div class="form-group" id="parentStatus" hidden>
                    <label for="">Choose Status</label>
                    <select name="status" class="form-control" autocomplete="off" id="status" onchange="getResultSelection()">
                        <option value="">-- Choose --</option>
                        <option value="1">Active</option>
                        <option value="2">Hold</option>
                        <option value="0">Done</option>
                    </select>
                </div>

            </div>
            <!-- selection field -->

        </div>

        <div class="divider">
            <hr>
        </div>
    <?php } ?>

    <div class="row mt-3 targetField"></div>
</div>

<script>
    $(document).ready(function() {
        getSeri();

        <?php if ($_SESSION['id'] != 1) { ?>
            getResultSelection();
        <?php } ?>
    })

    function getFormNewJob() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('job/getFormNewJob'); ?>',
            dataType: 'text',
            success: function(result) {
                $('.targetField').html('');
                $('.targetField').fadeIn("fast");
                $('.targetField').html(result);
                $('#newJobButton').attr('class', 'btn btn-sm nav-link w-100 bg-primary active');
                $('#newJobButton').removeAttr('style');
                $('#selectionButton').attr('class', 'btn btn-sm nav-link w-100');
                $('#parentSeri').prop('hidden', true);
                $('#parentMonth').prop('hidden', true);
                $('#parentStatus').prop('hidden', true);
            }
        })
    }

    function showSelection() {
        $('#parentMonth').prop('hidden', true);
        $('#parentStatus').prop('hidden', true);

        $('#newJobButton').attr('style', 'background-color: #e5e5e5;');
        $('#newJobButton').attr('class', 'btn btn-sm nav-link w-100');
        $('#selectionButton').removeAttr('style');
        $('#selectionButton').attr('class', 'btn btn-sm nav-link w-100 btn-primary active');

        $('#parentSeri').fadeIn("fast");
        $('#parentSeri').removeAttr('hidden');
        $('#seri').val('');

        $('.targetField').html('');
        $('.targetField').fadeOut("fast");

    }

    function showMonth() {
        $('#month').val('');

        $('#parentMonth').fadeIn("fast");
        $('#parentMonth').removeAttr('hidden');
        $('#month').datepicker({
            autoclose: true,
            format: 'yyyy mm',
            minViewMode: 'months'
        })
        // $('.monthStart').datepicker({
        //     format: 'yyyy mm',
        //     minViewMode: 'months',
        //     autoclose: true
        // });
        // $('.monthEnd').datepicker({
        //     format: 'yyyy mm',
        //     minViewMode: 'months',
        //     autoclose: true
        // })
    }

    function showStatus() {
        $('#parentStatus').fadeIn("fast");
        $('#parentStatus').removeAttr('hidden');
        $('#status').val('');
    }

    function getSeri() {
        $.ajax({
            type: 'POST',
            data: 'select=id, seri&table=seri&condition=ORDER BY seri ASC&db=default',
            url: '<?= base_url('job/getDataDatabase'); ?>',
            dataType: 'json',
            success: function(result) {
                var field = $('#seri');
                var option = '';

                for (var i = 0; i < result.length; i++) {
                    option += '<option value="' + result[i].id + '">' + result[i].seri + '</option>';
                }
                field.append(option);
            }
        })
    }

    function getResultSelection() {
        var seri = $('#seri').val();
        var month = $('#month').val();
        var status = $('#status').val();

        $.ajax({
            type: 'POST',
            data: {
                seri: seri,
                month: month,
                status: status
            },
            url: '<?= base_url('job/getResultSelection'); ?>',
            dataType: 'text',
            success: function(result) {
                if (result == 'not found') {
                    getToast("Data not found", "warning");

                    $('.targetField').fadeOut("fast");
                } else {
                    $('.targetField').fadeIn("fast");
                    $('.targetField').html(result);

                    setTimeout(function() {
                        // $('#parentMonth').fadeOut("fast");
                        // $('#parentStatus').fadeOut("fast");

                        $('#month').val('');
                        $('#status').val('');
                        $('#seri').val('');
                    }, 1500)
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
</script>