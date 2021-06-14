<div class="row mb-3 text-center">
    <div class="col"></div>
    <div class="col-md-6 col-sm-6">
        <img src="<?= base_url(); ?>/assets/images/review.png" width="75" height="75" class="img-fluid" alt=""> <br>
        <span style="color: #B0B0B0; font-size: 0.7em;">-- Review --</span>
    </div>
    <div class="col"></div>
</div>

<?php foreach ($result as $row) : ?>
    <div class="row">
        <div class="col-md-5 col-sm-12 col-xs-12">
            <div class="row mb-2 ml-4">
                <h5 class="titleReview" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size: 1.2em;">Review</h5>
            </div>

            <div class="row ml-4">
                <span style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 0.8em; color: #D1D1D1;">Detail Job</span>
                <div class="divider w-100" style="border-bottom: 1px solid #D1D1D1;"></div>
            </div>

            <div class="row mb-2 ml-2" style="font-size: 0.9em;">
                <label for="" class="col-form-label col-sm-4 col-xs-4">Job :</label>
                <div class="col-sm-8 col-xs-8">
                    <input type="text" class="form-control border-0 bg-white" style="font-size: 0.9em;" value="<?= $row->subjob; ?>">
                </div>
            </div>

            <div class="row mb-2 ml-2" style="font-size: 0.9em;">
                <label for="" class="col-form-label col-sm-4">Purpose :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control border-0 bg-white" style="font-size: 0.9em;" value="<?= $row->purpose; ?>">
                </div>
            </div>

            <div class="row mb-2 ml-2" style="font-size: 0.9em;">
                <label for="" class="col-form-label col-sm-4">Deadline :</label>
                <div class="col-sm-8">
                    <?php for ($i = 0; $i < count($deadlineDate); $i++) { ?>
                        <input type="text" class="form-control border-0 bg-white" style="font-size: 0.9em;" value="<?= toDateDefault($deadlineDate[$i]); ?>">
                    <?php } ?>
                </div>
            </div>

            <div class="row mb-2 ml-2" style="font-size: 0.9em;">
                <label for="" class="col-form-label col-sm-4">Note from CEO :</label>
                <div class="col-sm-8">
                    <?php if ($row->note == null) { ?>
                        <input type="text" class="form-control border-0 bg-white" style="font-size: 0.9em;" value="-">
                    <?php } else { ?>
                        <input type="text" class="form-control border-0 bg-white text-danger font-italic" style="font-size: 0.9em;" value="<?= $row->note; ?>">
                    <?php } ?>
                </div>
            </div>

            <div class="row mb-2 ml-2" style="font-size: 0.9em;">
                <label for="" class="col-form-label col-sm-4">Finish Date :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control border-0 bg-white" style="font-size: 0.9em;" value="<?= $time; ?>">
                </div>
            </div>
        </div>

        <div class="col-md-1 col-sm-12 col-xs-12"></div>

        <div class="col-md-5 col-sm-12 col-xs-12">

            <div class="row mb-2 ml-4">
                <h5 class="titleReview" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size: 1.2em;">Review</h5>
            </div>

            <div class="row ml-4">
                <span style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 0.8em; color: #D1D1D1;">Additional Information</span>
                <div class="divider w-100" style="border-bottom: 1px solid #D1D1D1;"></div>
            </div>

            <div class="row mb-2 ml-2" style="font-size: 0.9em;">
                <label for="" class="col-form-label col-sm-4">Late :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control border-0 bg-white" style="font-size: 0.9em;" value="<?= count($deadlineDate) - 1 . ' times'; ?>">
                </div>
            </div>

            <div class="row mb-2 ml-2" style="font-size: 0.9em;">
                <label for="" class="col-form-label col-sm-4">Work Duration :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control border-0 bg-white" style="font-size: 0.9em;" value="<?= $workDuration . ' Lebih cepat' ?>">
                </div>
            </div>

            <?php if (count($file) == 1) { ?>
                <div class="row mb-2 ml-2" style="font-size: 0.9em;">
                    <label for="" class="col-form-label col-sm-4">Filee :</label>
                    <div class="col-sm-8">
                        <img src="<?= base_url(); ?>/uploads/<?= $file[0]; ?>" width="100" height="100" alt="">
                    </div>
                </div>
            <?php } else { ?>
                <div class="row ml-2 mb-2" style="font-size: 0.9em;">
                    <label for="" class="col-form-label col-sm-4">File :</label> <br>
                </div>
                <div class="row">
                    <?php for ($i = 0; $i < count($file); $i++) { ?>
                        <div class="col-md-6 text-center">
                            <div class="text-center mb-1" style="font-size: 0.8em;">
                                <span>File <?= $i + 1; ?></span>
                            </div>
                            <img src="<?= base_url(); ?>/uploads/<?= $file[$i]; ?>" width="100" height="100" alt="">
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

        </div>
    </div>
<?php endforeach; ?>