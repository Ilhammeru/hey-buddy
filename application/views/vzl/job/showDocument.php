    <div class="text-center">
        <p>This is supporting file for this Job</p>
    </div>
    <?php if (count($result) == 1) { ?>
        <div class="text-center" style="border-radius: 10px !important;">
            <img src="<?= base_url(); ?>/uploads/<?= $result[0]; ?>" class="img-fluid" width="600" height="600" style="border-radius: 10px !important;" alt="image">
        </div>
    <?php } else { ?>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php for ($i = 0; $i < count($result); $i++) { ?>
                    <div class="carousel-item <?= ($i <= 0) ? 'active' : ''; ?> text-center justify-content-center">
                        <div class="text-center">
                            <span style="font-size: 0.8em;" class="text-danger">File upload ke- <?= $i + 1; ?></span>
                        </div>
                        <img class="img-fluid" src="<?= base_url(); ?>/uploads/<?= $result[$i]; ?>" width="600" height="600" alt="First slide">
                    </div>
                <?php } ?>
            </div>
            <a class="carousel-control-prev text-danger" href="#carouselExampleControls" role="button" data-slide="prev">
                <!-- <span class="carousel-control-prev-icon text-danger" aria-hidden="true"></span>
                <span class="sr-only">Previous</span> -->
                <i class="fas fa-arrow-left"></i>
            </a>
            <a class="carousel-control-next text-danger" href="#carouselExampleControls" role="button" data-slide="next">
                <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span> -->
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    <?php } ?>