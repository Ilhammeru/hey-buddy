<div class="container">
    <div class="row-mt-5 pt-3">
        <div class="col"></div>
        <div class="col">
            <div class="card">
                <div class="card-header text-center">
                    <h5 class="card-title">List Seri</h5>
                </div>
                <div class="card-body">
                    <div class="text-right mb-3">
                        <button class="btn btn-sm btn-primary showModalSeri" onclick="showModalSeri()"><i class="fas fa-plus"></i></button>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Series Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="listSeri">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>

<!-- modal -->
<div class="modal modalSeri fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Series</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formSeri">
                    <div class="row mb-2">
                        <label for="" class="col-form-label col-form-label-sm col-sm-4">Seri Name :</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm seri" style="border-radius: 10px;" name="seri[]">
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-sm btn-primary addFormSeri"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="formAddSeri"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary saveSeries" onclick="saveSeries()" style="border-radius:10px;">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- modal -->

<script>
    $(document).ready(function() {
        getSeries();

        var i = 0;
        $('.addFormSeri').click(function(e) {
            e.preventDefault();
            i++;
            var form = '<div class="deleteRow' + i + '">' +
                '<div class="row mb-2">' +
                '<label class="col-form-label col-form-label-sm col-sm-4 text-white"> Seri Name :</label>' +
                '<div class="col-sm-6">' +
                '<input type="text" class="form-control form-control-sm seri" style="border-radius: 10px;" name="seri[]">' +
                '</div>' +
                '<div class="col-sm-1">' +
                '<button class="btn btn-sm btn-danger deleteFormSeri" onclick="deleteFormSeri(' + i + ')"><i class="fas fa-times"></i></button>' +
                '</div>' +
                '</div>' +
                '</div>';

            $('.formAddSeri').append(form);
        })
    })

    function deleteFormSeri(idForm) {
        $('.deleteRow' + idForm).remove();
    }

    function getSeries() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('database/getSeri'); ?>',
            dataType: 'json',
            success: function(result) {
                var body = '';
                for (var i = 0; i < result.length; i++) {
                    body += '<tr>' +
                        '<td>' + (i + 1) + '</td>' +
                        '<td>' + result[i].seri + '</td>' +
                        '<td><a class="btn btn-sm btn-warning" style="border-radius: 15px" onclick="deleteSeries(' + result[i].id + ')">Delete</a></td>';
                    '</tr>';
                }
                $('.listSeri').html(body);
            }
        })
    }

    function saveSeries() {
        swal("Are you sure to save this series?", {
                buttons: {
                    cancel: "Wait a minute!",
                    catch: {
                        text: "Yes, save now",
                        value: "catch",
                    },
                },
            })
            .then((value) => {
                switch (value) {
                    case "catch":
                        var formData = $('#formSeri').serialize();
                        $.ajax({
                            type: 'POST',
                            data: formData,
                            url: '<?= base_url('database/saveSeri'); ?>',
                            dataType: 'text',
                            success: function(result) {
                                if (result == 'success') {
                                    swal('Success', 'Series added to database', 'success', {
                                        buttons: false,
                                        timer: 1500
                                    });
                                    getSeries();
                                    $('.formAddSeri').html('');
                                    $('.seri').val('');
                                    $('.modalSeri').modal('hide');
                                }
                            }
                        })
                        break;

                    default:
                        swal("Got away safely!");
                }
            });
    }

    function deleteSeries(idSeri) {
        swal("Are you sure delete this seri?", {
                buttons: {
                    cancel: "No",
                    catch: {
                        text: "Yes, delete now",
                        value: "catch",
                    },
                },
            })
            .then((value) => {
                switch (value) {
                    case "catch":
                        $.ajax({
                            type: 'POST',
                            data: 'id=' + idSeri + '&table=seri',
                            url: '<?= base_url('database/deleteData'); ?>',
                            dataType: 'text',
                            success: function(result) {
                                if (result == 'success') {
                                    swal("Success", 'series has been deleted', 'success', {
                                        buttons: false,
                                        timer: 1500
                                    });
                                    getSeries();
                                }
                            }
                        })
                        break;

                    default:
                        swal("Got away safely!");
                }
            });

    }

    function showModalSeri() {
        $('.modalSeri').modal('show');
    }
</script>