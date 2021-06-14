<?php $idMaster = $_SESSION['id']; ?>
<?php
if ($this->agent->is_browser()) {
    $agent = $this->agent->browser() . ' ' . $this->agent->version();
} elseif ($this->agent->is_mobile()) {
    $agent = $this->agent->mobile();
}

echo $agent;
?>

<div class="row mb-5">
    <div class="col">
        <div class="card-deck">
            <div class="card" style="background-color: #B4C2FE; border-radius: 10px; -webkit-box-shadow: 6px 6px 15px 0px rgba(0,0,0,0.75); -moz-box-shadow: 6px 6px 15px 0px rgba(0,0,0,0.75); box-shadow: 6px 6px 15px 0px rgba(212,215,247,1);">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="text-left">
                            <img src="<?= base_url(); ?>/assets/images/job.png" width="30" height="30" alt="">
                        </div>
                        <div class="text-right">
                            <div class="dropleft">
                                <button class="btn btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4><?= $active; ?></h4>
                    <span>Active Job for you</span>
                </div>
            </div>
            <div class="card" style="background-color: #EBDF92; border-radius: 10px; -webkit-box-shadow: 6px 6px 15px 0px rgba(0,0,0,0.75); -moz-box-shadow: 6px 6px 15px 0px rgba(0,0,0,0.75); box-shadow: 6px 6px 15px 0px rgba(212,215,247,1);">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="text-left">
                            <img src="<?= base_url(); ?>/assets/images/loading.png" width="30" height="30" alt="">
                        </div>
                        <div class="text-right">
                            <div class="dropleft">
                                <button class="btn btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4><?= $waiting; ?></h4>
                    <span>Waiting CEO's Confirmation</span>
                </div>
            </div>
            <div class="card" style="background-color: #FD725A; border-radius: 10px; -webkit-box-shadow: 6px 6px 15px 0px rgba(0,0,0,0.75); -moz-box-shadow: 6px 6px 15px 0px rgba(0,0,0,0.75); box-shadow: 6px 6px 15px 0px rgba(212,215,247,1);">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="text-left">
                            <img src="<?= base_url(); ?>/assets/images/delivery.png" width="30" height="30" alt="">
                        </div>
                        <div class="text-right">
                            <div class="dropleft">
                                <button class="btn btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">See Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4><?= $failed; ?></h4>
                    <span>Failed Job</span>
                </div>
            </div>
            <div class="card" style="background-color: #9CF959; border-radius: 10px; -webkit-box-shadow: 6px 6px 15px 0px rgba(0,0,0,0.75); -moz-box-shadow: 6px 6px 15px 0px rgba(0,0,0,0.75); box-shadow: 6px 6px 15px 0px rgba(212,215,247,1);">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="text-left">
                            <img src="<?= base_url(); ?>/assets/images/achievement.png" width="30" height="30" alt="">
                        </div>
                        <div class="text-right">
                            <div class="dropleft">
                                <button class="btn btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4><?= $success; ?></h4>
                    <span>Successfully Job</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($rows > 0) { ?>
    <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="card" style="border-radius: 10px;">
                <div class="card-body">
                    <div class="text-center justify-content-center">
                        <h5>Preview Active Job List</h5>
                    </div>
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
                </div>
            </div>

        </div>

        <div class="col-md-4 col-sm-12 col-xs-12">

            <div class="card" style="border-radius: 10px;">
                <div class="card-body">
                    <div class="text-center">
                        <h5>Upcoming Deadline</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table" style="font-size: 0.8em;">
                            <thead>
                                <tr>
                                    <th>Subjob</th>
                                    <th>Timer</th>
                                </tr>
                            </thead>
                            <tbody class="targetUpcomingDeadline"></tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php } else { ?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <img src="<?= base_url(); ?>/assets/images/NeedJob.jpg" width="300" height="300" class="img-fluid" alt="" style="border-radius: 10px;">
            <h1 class="display-4">There is still no Job for You</h1>
            <p class="lead">Wait until CEO give you bunch of work or call CEO for a job</p>
        </div>
    </div>

<?php } ?>


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

<script>
    $(document).ready(function() {

        upcomingDeadline();


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

    function upcomingDeadline() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('home/getUpcomingDeadline'); ?>',
            dataType: 'json',
            success: function(result) {
                var field = '';
                for (var i = 0; i < result.result.length; i++) {
                    field += '<tr>' +
                        '<td>' + result.result[i].subjob + '</td>' +
                        '<td id="timer' + i + '" class="targetTimer"></td>' +
                        '</tr>';
                    var d = new Date(result.timer[i]);
                    var t = d.toLocaleString();
                    setTimer(t, i);
                }
                $('.targetUpcomingDeadline').html(field);
            }
        })
    }

    function setTimer(deadline, id) {
        var time = new Date(deadline);
        var last = time.getTime();

        var timer = setInterval(function() {
            var time = new Date().getTime();

            var distance = last - time;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hour = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            $('#timer' + id).text(days + ' days : ' + hour + ' hours : ' + minutes + ' minutes : ' + seconds + ' seconds');

        }, 1000)
    }

    function detailActionUser(idSubjob, key) {
        $.ajax({
            type: 'POST',
            data: {
                id: idSubjob,
                key: key
            },
            url: '<?= base_url('home/getUserJob'); ?>',
            dataType: 'text',
            success: function(result) {
                console.log(result);
            }
        })
    }
</script>