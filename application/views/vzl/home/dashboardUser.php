<div class="row">
    <div class="col-md-2 col-sm-2 col-lg-2 col-xs-12">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">Active</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
    </div>
    <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12 mt-1 mb-1 mr-1 bg-white" style="border-radius: 12px;">
        <?php $idMaster = $_SESSION['id']; ?>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Title</th>
                        <th>Job</th>
                        <th>Your Posisition</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody style="font-size: 0.8em;" cellpadding="0" cellspacing="0">
                    <?php $no = 1;
                    foreach ($result as $row) { ?>
                        <tr class="text-center">
                            <td><?= $no++; ?></td>
                            <td><?= $row->title; ?></td>
                            <td><?= $row->subjob; ?></td>
                            <td><?= ($idMaster == $row->leader) ? '<span class="font-weight-bolder">Leader</span>' : '<span class="fw-bold">Crew</span>'; ?></td>
                            <?php if ($row->status == 1) { ?>
                                <td><span class="text-success" style="font-size: 0.6em;"><i class="fas fa-circle"></i></span> Active</td>
                            <?php } elseif ($row->status == 2) { ?>
                                <td><span class="text-warning" style="font-size: 0.6em;"><i class="fas fa-circle"></i></span> Waiting</td>
                            <?php } elseif ($row->status == 3) { ?>
                                <td><span class="text-danger" style="font-size: 0.6em;"><i class="fas fa-circle"></i></span> Failed</td>
                            <?php } ?>
                            <!-- <td class="timer"></td> -->
                            <td data-toggle="collapse" role="button" data-target="#collapseExample<?= $no; ?>" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-ellipsis-h"></i></td>
                        </tr>
                        <tr>
                            <td colspan="8" class="hiddenRow">
                                <div class="collapse" id="collapseExample<?= $no; ?>">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Deadline</th>
                                                    <th>Crew</th>
                                                    <th>Job</th>
                                                    <th>Note from CEO</th>
                                                    <?php if ($row->note != '') { ?>
                                                        <th></th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $newDeadline = json_decode($row->deadline, true);
                                                for ($i = 1; $i <= count($newDeadline); $i++) {
                                                    $explode = explode(' ', $newDeadline['d' . $i]);
                                                    $deadlineDate = toDateDefault($explode[0]) . ', ' . $explode[1];
                                                    $deadlineHour[] = $explode[1];
                                                }
                                                ?>
                                                <tr class="mt-1 text-center">
                                                    <td><?= $deadlineDate; ?></td>
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
                                                    <td><?= rtrim($name, ', '); ?></td>
                                                    <td><?= $row->subjob; ?></td>
                                                    <?= ($row->note != '') ? '<td class="font-weight-bold text-danger"><ins>' . $row->note . '</ins></td>' : '<td>-</td>'; ?>
                                                    <?= ($row->note != '') ? '<td><button class="btn btn-sm font-weight-bold text-warning" onclick="changeFailed(' . $row->id . ')"><i class="fas fa-user-edit"></i></button></td>' : ''; ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->
    </div>
</div>

<script>
    $(document).ready(function() {

        var last = new Date('2021-01-22 14:00:25').getTime();

        var timer = setInterval(function() {
            var time = new Date().getTime();

            var distance = last - time;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hour = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var hour = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // $('.timer').text(days + 'D : ' + hour + ' : ' + minutes + ' ' + seconds);

        })
    })

    function changeFailed(idSub) {
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

                                getUserJob();
                            }
                        })
                        break;

                    default:
                        swal("Got away safely!");
                }
            });
    }
</script>