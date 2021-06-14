<div class="row" style="padding-top: 1.2em; margin-bottom: 0; padding-left: 1.5em; padding-right: 1.5em;">
    <div class="col s12">
        <div class="valign-wrapper" style="display: flex; justify-content:space-between;">
            <div onclick="closeModalShowSubjob()">
                <span style="margin-right: 0.7em; color: #44a3f7;"><img src="<?= base_url(); ?>/assets/images/backbtn.png" width="15" height="10" alt=""> Back</span>
            </div>
            <div onclick="showHeight()">
                <span><i class="fas fa-ellipsis-h"></i></span>
            </div>
        </div>
    </div>
</div>

<?php foreach ($resultUser as $row) { ?>
    <div class="row" style="padding: 0; margin-top: 0; padding-left: 1.5em; padding-right: 1.5em; margin-bottom: 0;">
        <div class="col s12">
            <div class="valign-wrapper" style="display: flex; justify-content:space-between;">
                <div>
                    <p class="mainSubjob" style="transition: ease 1s; font-family: 'Quicksand', sans-serif; font-weight:700; color: black; margin-top: 18px; margin-bottom: 5px; font-size: 1.5em; text-transform: capitalize;"></p>
                </div>
                <div>
                    <p class="subjobTitle" style="font-size: 0.9em; text-transform: uppercase; color: #919191; font-family: 'Quicksand', sans-serif; font-weight:700;"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="padding: 0; margin-top: 0; padding-left: 1.5em; padding-right: 1.5em;">
        <div class="col s12">
            <div class="valign-wrapper" style="display: flex; justify-content:space-between;">
                <div>
                    <p class="deadlineTitle" style="transition: ease 1s; margin: 0; color: #919191; font-family: 'Quicksand', sans-serif; font-weight:700;"></p>
                </div>
                <div>
                    <p class="actionTitle" style="transition: ease 1s; font-size: 0.7em; text-transform: uppercase; color: #70c0f8; font-family: 'Quicksand', sans-serif; font-weight:700;"></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row valign-wrapper" style="padding-left: 1.3em; padding-right: 1.3em; margin-bottom: 0.5em;">
        <div class="col s12 m6 offset-m3">
            <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none;">
                <div class="card-content" style="padding: 0.3em 0.4em; margin: 0;">
                    <ul class="collapsible collapseDetailSubjob" style="box-shadow: none; border: none; margin: 0;">
                        <li>
                            <div class="collapsible-header" style="border: none !important; display: flex; justify-content: space-between;">
                                <div class="valign-wrapper">
                                    <img src="<?= base_url(); ?>/assets/images/subjob.png" width="25" height="25" alt=""> <span style="margin-left: 1.4em; color: #6a6a6a;">Sub Job Details</span>
                                </div>
                                <div class="valign-wrapper" style="text-align: right;">
                                    <div class="arrowShowSubjob">
                                        <img class="arrowDetailSubjob" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="collapsible-body collapseDetailSubjob">
                                <div class="row" style="margin-bottom: 0;">
                                    <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; background-color: #f2f1f6;">
                                        <div class="card-content" style="padding: 1.4em 1.5em; margin: 0;">
                                            <p style="font-family: 'Quicksand', sans-serif; font-weight:700; color: #5f5e5e; margin-bottom: 15px; font-size: 1em; text-transform: capitalize;">Purpose</p>
                                            <p style="font-family: 'Quicksand', sans-serif; color: #919191; font-weight: 600; font-size: 0.9em;"><?= '-  ' . $row->purpose; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 0;">
                                    <div class="col s12" style="padding: 0; margin: 0;">
                                        <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; background-color: #f2f1f6;">
                                            <div class="card-content" style="padding: 1em 1.5em; margin: 0;">
                                                <ul class="collapsible collapseImageGallery">
                                                    <li>
                                                        <div class="collapsible-header collapseHeaderImageGallery valign-wrapper">
                                                            <div>
                                                                <p class="pImageGallery">Image Gallery</p>
                                                            </div>
                                                            <div class="arrowShowImg">
                                                                <img src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="collapsible-body collapseBodyImageGallery">
                                                            <?php
                                                            if ($imgRefer != '') {
                                                                for ($i = 0; $i < count($imgRefer); $i++) {
                                                                    $source = base_url() . '/uploads/job/' . $idJob . '/' . $imgRefer[$i];
                                                                    $click = "'" . $imgRefer[$i] . "'";

                                                            ?>
                                                                    <span class="deleteImgBtn" onclick="deleteImg()" hidden><img src="<?= base_url(); ?>/assets/images/stopbtn.png" width="17" height="17"></span>
                                                                    <img class="stylingImage" onclick="showImage(<?= $idJob . ',' . $click; ?>)" id="" src="<?= $source; ?>" widht="50" height="50" style="transition: ease 1s;">
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom: 0;">
                                    <div class="col s12" style="padding: 0; margin: 0;">
                                        <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; background-color: #f2f1f6;">
                                            <div class="card-content" style="padding: 1em 1.5em; margin: 0;">
                                                <ul class="collapsible collapseDetailCrewSubjob">
                                                    <li>
                                                        <div class="collapsible-header collapseHeaderCrew">
                                                            <div>
                                                                <p class="pCrew">Crew</p>
                                                            </div>
                                                            <div class="valign-wrapper">
                                                                <span class="spanCollapseCrew" style="margin-right: 10px; color: #919292; font-size: 0.8em;"><?= count($crewName); ?></span>
                                                                <div class="arrowShowCrew">
                                                                    <img src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="collapsible-body collapseBodyCrew">
                                                            <table class="tableCrewSubjob">
                                                                <tbody class="targetCrewSubjob">

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom: 0;">
                                    <div class="col s12" style="padding: 0; margin: 0;">
                                        <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; background-color: #f2f1f6;">
                                            <div class="card-content" style="padding: 1em 1.5em; margin: 0;">
                                                <ul class="collapsible collapseDetailRemindSubjob">
                                                    <li>
                                                        <div class="collapsible-header collapseHeaderRemindd">
                                                            <div>
                                                                <p class="pCrew">Reminded Peers</p>
                                                            </div>
                                                            <div class="valign-wrapper">
                                                                <?php if ($remindName != 0) { ?>
                                                                    <span class="spanCollapseCrew" style="margin-right: 10px; color: #919292; font-size: 0.8em;"><?= count($remindName); ?></span>
                                                                <?php } else { ?>
                                                                    <span class="spanCollapseCrew" style="margin-right: 10px; color: #919292; font-size: 0.8em;">0</span>
                                                                <?php } ?>
                                                                <div class="arrowRemindSubjob">
                                                                    <img src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="collapsible-body collapseBodyRemindd">
                                                            <?php if ($remindName != 0) { ?>
                                                                <table class="tableRemindSubjob">
                                                                    <tbody class="targetRemindSubjob">
                                                                        <?php for ($o = 0; $o < count($remindName); $o++) { ?>
                                                                            <tr style="border: none;">
                                                                                <td style="width: 2.7em; color: #ffd700; font-size: 0.9em; padding: 0;">

                                                                                </td>
                                                                                <td style="color: #919191; font-weight: 400; font-size: 0.9em;"><?= $remindName[$o]; ?></td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            <?php } ?>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom: 0;">
                                    <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; background-color: #f2f1f6;">
                                        <div class="card-content" style="padding-top: 1.4em; padding-bottom: 0; padding-right: 1.5em; padding-left: 1.5em; margin: 0; display: flex; justify-content: space-between">
                                            <div>
                                                <p style="font-family: 'Quicksand', sans-serif; font-weight:700; color: #f4af3e; margin-bottom: 15px; font-size: 1em; text-transform: capitalize;">Co-Assessor</p>
                                            </div>
                                            <div>
                                                <p class="coassessorField" style="font-family: 'Quicksand', sans-serif; color: #f4af3e; font-weight: 400; font-size: 0.9em;"><?= ($assessorName != '') ? $assessorName : 'None'  ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom: 0;">
                                    <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; background-color: #f2f1f6;">
                                        <div class="card-content" style="padding-top: 1.4em; padding-bottom: 0; padding-right: 1.5em; padding-left: 1.5em; margin: 0; display: flex; justify-content: space-between">
                                            <div>
                                                <p style="font-family: 'Quicksand', sans-serif; font-weight:700; color: #f4af3e; margin-bottom: 15px; font-size: 1em; text-transform: capitalize;">Approval</p>
                                            </div>
                                            <div>
                                                <?php if ($coadminFix != 0 && $adminFix != 0) { ?>
                                                    <span class="targetCoadmin" style="color: #f4af3e; margin-right: 0.5em; font-size: 0.9em; font-family: 'Quicksand', sans-serif; font-weight: 400;"><?= $coadminFix . ', then ' . $adminFix; ?></span>
                                                <?php } else if ($coadminFix == 0 && $adminFix != '') { ?>
                                                    <span class="targetCoadmin" style="color: #f4af3e; margin-right: 0.5em; font-size: 0.9em; font-family: 'Quicksand', sans-serif; font-weight: 400;"><?= $adminFix; ?></span>
                                                <?php } else if ($coadminFix != '' && $adminFix == 0) { ?>
                                                    <span class="targetCoadmin" style="color: #f4af3e; margin-right: 0.5em; font-size: 0.9em; font-family: 'Quicksand', sans-serif; font-weight: 400;"><?= $coadminFix; ?></span>
                                                <?php } else if ($coadminFix == 0 && $adminFix == 0) { ?>
                                                    <span class="targetCoadmin" style="color: #f4af3e; margin-right: 0.5em; font-size: 0.9em; font-family: 'Quicksand', sans-serif; font-weight: 400;">None</span>
                                                <?php } ?>
                                            </div>
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

    <div class="row valign-wrapper" style="padding-left: 1.3em; padding-right: 1.3em; margin-bottom: 0.5em;">
        <div class="col s12 m6 offset-m3">
            <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; padding-top: 0;">
                <div class="card-content" style="padding: 0.3em 0.4em; margin: 0;">
                    <ul class="collapsible collapseReportHistory reportHelper" style="box-shadow: none; border: none; padding-bottom:0;">
                        <li>
                            <div class="collapsible-header" style="border: none !important;  display: flex; justify-content: space-between; padding: 0 1rem; margin-bottom: 15px;">
                                <div class="valign-wrapper">
                                    <img src="<?= base_url(); ?>/assets/images/reporthistory.png" width="25" height="25" alt=""> <span style="margin-left: 0.7em; font-size: 0.9em; font-family: 'Quicksand', sans-serif; font-weight: 500;">Report History</span>
                                </div>
                                <div class="valign-wrapper" style="text-align: right;">
                                    <span class="spanReportHistory" style="font-size: 0.9em; color: #e2e2e2; margin-right: 0.3em;">
                                        <span class="spanReported"></span>
                                    </span>
                                    <span id="dotReportHistory"></span>
                                    <div class="arrowReportHistory">
                                        <img id="arrowReportHistory" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="collapsible-body collapseDeadlinedate" style="color: #40a1f8; border: none; padding-bottom: 0; margin-bottom: 0;">
                                <table>
                                    <tbody>
                                        <div class="targetBodyReportHistory"></div>
                                    </tbody>
                                </table>
                            </div>
                        </li>
                        <div style="padding: 0; margin: 0;">
                            <p style="padding:0; width: 90%; text-align: center; margin-top: 0; margin-left: 1em; margin-bottom: 0.5em; height: 2px; background-color: #e0e0e0;"></p>
                        </div>
                    </ul>
                    <ul class="collapsible collapseOverdueHistory" style="box-shadow: none; border: none; padding-bottom:0;">
                        <li>
                            <div class="collapsible-header" style="border: none !important; display: flex; justify-content: space-between; padding-top: 0;">
                                <div class="valign-wrapper">
                                    <img src="<?= base_url(); ?>/assets/images/overduegrey.png" width="25" height="25" alt=""> <span style="margin-left: 0.7em; font-size: 0.9em; font-family: 'Quicksand', sans-serif; font-weight: 500;">Overdue History</span>
                                </div>
                                <div class="valign-wrapper" style="text-align: right;">
                                    <span class="spanOverdueHistory" style="font-size: 0.9em; color: #e2e2e2; margin-right: 0.6em;">No Overdue</span>
                                    <div class="parrentArrowOverdue" hidden>
                                        <img class="arrowOverdue" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="collapsible-body targetOverdueHistory collapseCrew" style="color: #40a1f8; border: none; padding-bottom: 0; margin-bottom: 0;">

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row valign-wrapper mainLatestReport" style="padding-left: 1.3em; padding-right: 1.3em; margin-bottom: 0.5em;">
        <div class="col s12 m6 offset-m3">
            <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none;">
                <div class="card-content" style="padding: 0.3em 0.4em; margin: 0;">
                    <ul class="collapsible collapseLatestReport" style="box-shadow: none; border: none; margin: 0;">
                        <li>
                            <div class="collapsible-header" style="border: none !important; display: flex; justify-content: space-between;">
                                <div class="valign-wrapper">
                                    <img src="<?= base_url(); ?>/assets/images/subjob.png" width="25" height="25" alt=""> <span style="margin-left: 1.4em; color: #6a6a6a;">Show Latest Report</span>
                                </div>
                                <div class="valign-wrapper" style="text-align: right;">
                                    <span id="dotSpan"></span>
                                    <div>
                                        <img class="arrowLatesReport" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="collapsible-body collapseDetailSubjob">
                                <div class="row" style="padding: 0.5em 2em;">
                                    <div style="display: flex; justify-content: space-between;">
                                        <div>
                                            <p class="finishTimeText" style="color: #929292; font-weight: 600; font-size: 0.8em;">Finish Time</p>
                                        </div>
                                        <div>
                                            <p class="finishTime" style="color: #929292; font-weight: 400; font-size: 0.8em;"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 0;">
                                    <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; background-color: #f2f1f6;">
                                        <div class="card-content" style="padding: 1.4em 1.5em; margin: 0; height: 8em; ">
                                            <p class="targetNoteReport" style="font-family: 'Quicksand', sans-serif; color: #919191; font-weight: 600; font-size: 0.9em;"><?= '-  ' . $row->purpose; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 0;">
                                    <div class="col s12" style="padding: 0; margin: 0;">
                                        <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; background-color: #f2f1f6;">
                                            <div class="card-content" style="padding: 1.4em 1.5em; margin: 0;">
                                                <div class="targetImgReport">
                                                    <p style="font-family: 'Quicksand', sans-serif; font-weight:700; color: #5f5e5e; margin-bottom: 15px; font-size: 0.8em; text-transform: capitalize;">Image Report</p>
                                                    <table>
                                                        <tbody class="targetLatestReport">
                                                            <!-- <tr style="border: none;">
                                                                <td style="width: 7em;"><img style="border-radius: 0.8em;" src="<?= base_url(); ?>/assets/images/ansena.png" width="70" height="70" alt=""></td>
                                                                <td style="padding: 0.5em 0; vertical-align: top; width: 10em;">
                                                                    <p style="font-size: 0.85em; color: #919191">- Logo dengan mengacu design mcd </p>
                                                                    <p style="font-size: 0.85em; color: #919191">- Logo format.png </p>
                                                                </td>
                                                            </tr> -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
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

    <div class="row valign-wrapper mainOverdueProposal" style="padding-left: 1.3em; padding-right: 1.3em; margin-bottom: 0.5em;">
        <div class="col s12 m6 offset-m3">
            <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none;">
                <div class="card-content" style="padding: 0.3em 0.4em; margin: 0;">
                    <ul class="collapsible collapseOverdueProposal" style="box-shadow: none; border: none; margin: 0;">
                        <li>
                            <div class="collapsible-header" style="border: none !important; display: flex; justify-content: space-between;">
                                <div class="valign-wrapper">
                                    <img src="<?= base_url(); ?>/assets/images/overduered.png" width="25" height="25" alt=""> <span style="margin-left: 1.4em; color: #6a6a6a;">Show Overdue Proposal</span>
                                </div>
                                <div class="valign-wrapper" style="text-align: right;">
                                    <span id="dotSpan"></span>
                                    <div>
                                        <img class="arrowLatesReport" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="collapsible-body collapseDetailSubjob">
                                <div class="row" style="padding: 0.5em 2em;">
                                    <div style="display: flex; justify-content: space-between;">
                                        <div>
                                            <p class="finishTimeText" style="color: #929292; font-weight: 600; font-size: 0.8em;">Proposed Deadline</p>
                                        </div>
                                        <div>
                                            <p class="proposeOverdue" style="color: #929292; font-weight: 400; font-size: 0.8em;"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 0;">
                                    <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; background-color: #f2f1f6;">
                                        <div class="card-content" style="padding: 1.4em 1.5em; margin: 0; height: 8em; ">
                                            <p class="targetProposeNote" style="font-family: 'Quicksand', sans-serif; color: #919191; font-weight: 600; font-size: 0.9em;"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 0;">
                                    <div class="col s12" style="padding: 0; margin: 0;">
                                        <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; background-color: #f2f1f6;">
                                            <div class="card-content" style="padding: 1.4em 1.5em; margin: 0;">
                                                <div class="targetImgReport">
                                                    <p style="font-family: 'Quicksand', sans-serif; font-weight:700; color: #5f5e5e; margin-bottom: 15px; font-size: 0.8em; text-transform: capitalize;">Image Report</p>
                                                    <table>
                                                        <tbody class="bodyProposeOverdue">
                                                            <!-- <tr style="border: none;">
                                                                <td style="width: 7em;"><img style="border-radius: 0.8em;" src="<?= base_url(); ?>/assets/images/ansena.png" width="70" height="70" alt=""></td>
                                                                <td style="padding: 0.5em 0; vertical-align: top; width: 10em;">
                                                                    <p style="font-size: 0.85em; color: #919191">- Logo dengan mengacu design mcd </p>
                                                                    <p style="font-size: 0.85em; color: #919191">- Logo format.png </p>
                                                                </td>
                                                            </tr> -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
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

    <div class="actionGroup" hidden>
        <div class="row valign-wrapper" style="padding-left: 1.3em; padding-right: 1.3em; margin-bottom: 0; padding-bottom: 0;">
            <div class="col s12 m6 offset-m3 markCorrect" onclick="markAsCorrect(<?= $idSubjob; ?>)">
                <div class="buttonCorrect valign-wrapper">
                    <img src="<?= base_url(); ?>/assets/images/reportdone1.png" width="25" height="25" alt="">
                    <span class="spanCorrect" style="margin-left: 0.7em; color: #fff; font-family: 'Quicksand', sans-serif;">Mark as Correct</span>
                </div>
            </div>
        </div>

        <div class="row valign-wrapper divRevise" style="padding-left: 1.3em; padding-right: 1.3em; margin-bottom: 0.5em;">
            <div class="col s12 m6 offset-m3">
                <div class="card cardRevise" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; background-color: #db3b25;">
                    <div class="card-content" style="padding: 0.3em 0.6em; margin: 0;">
                        <ul class="collapsible collapseRevise" style="width: 100%; background-color: #db3b25; color: #fff; box-shadow: none; border: none; margin: 0;">
                            <li>
                                <div class="collapsible-header collapseHeaderRevise" style="border: none !important; display: flex; justify-content: space-between; background-color: #db3b25;">
                                    <div class="valign-wrapper reviseTitle">
                                        <img src="<?= base_url(); ?>/assets/images/revise1.png" width="25" height="25" alt=""> <span style="margin-left: 1.4em; color: #fff;">Revise</span>
                                    </div>
                                    <div class="valign-wrapper" style="text-align: right;">
                                        <div class="arrowRevise">
                                            <img class="imgArrow" style="-webkit-transition: -webkit-transform .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="collapsible-body collapseDetailSubjob">
                                    <div class="row" style="margin-bottom: 0;">
                                        <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; background-color: #fff;">
                                            <div class="card-content" style="padding: 0; margin: 0;">
                                                <div>
                                                    <textarea class="textareaField notess" name="notes" id="" rows="4" placeholder="Add Notes"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-bottom: 0;">
                                        <div class="col s12" style="padding: 0; margin: 0;">
                                            <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; background-color: #f2f1f6;">
                                                <div class="card-content" style="padding: 1em 1.5em; margin: 0;">
                                                    <ul class="collapsible collapseDeadlineDateRevise">
                                                        <li>
                                                            <div class="collapsible-header collapseHeaderImageGallery valign-wrapper">
                                                                <div>
                                                                    <p class="pReviseDate">Revision Deadline Date</p>
                                                                </div>
                                                                <div class="valign-wrapper">
                                                                    <span class="spanDeadlineDateRevise" style="font-size: 0.8em; color: #e2e2e2; margin-right: 0.6em;">None</span>
                                                                    <div data-key="default" class="arrowDeadlineRevise">
                                                                        <img src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="collapsible-body collapseBodyImageGallery">
                                                                <div class="row">
                                                                    <div class="col s9" style="padding-left: 0; padding-right: 0.4em; margin: 0;">
                                                                        <div id="calendarRevise"></div>
                                                                        <input type="text" hidden class="deadlineDateFieldRevise" name="deadlineDateFieldRevise">
                                                                    </div>
                                                                    <div class="col s3" style="padding: 0; margin: 0">
                                                                        <div class="selectMonth">
                                                                            <p><?= date('F'); ?></p>
                                                                        </div>
                                                                        <div class="selectYear">
                                                                            <p><?= date('Y'); ?></p>
                                                                        </div>
                                                                        <div class="selectDay">
                                                                            <p onclick="changeDayRevise('yesterdayRevise')" id="yesterdayRevise">Yesterday</p>
                                                                            <p onclick="changeDayRevise('todayRevise')" id="todayRevise" class="activeDay">Today</p>
                                                                            <p onclick="changeDayRevise('tomorrowRevise')" id="tomorrowRevise">Tomorrow</p>
                                                                            <p onclick="changeDayRevise('nextWeekRevise')" id="nextWeekRevise">Next week</p>
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

                                    <div class="row" style="margin-bottom: 0;">
                                        <div class="col s12" style="padding: 0; margin: 0;">
                                            <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; background-color: #f2f1f6;">
                                                <div class="card-content" style="padding: 1em 1.5em; margin: 0;">
                                                    <ul class="collapsible collapseDeadlineHourRevise">
                                                        <li>
                                                            <div class="collapsible-header collapseHeaderImageGallery valign-wrapper">
                                                                <div>
                                                                    <p class="pReviseTime">Revision Deadline Time</p>
                                                                </div>
                                                                <div class="valign-wrapper">
                                                                    <span class="spanDeadlineHourRevise" style="font-size: 0.8em; color: #e2e2e2; margin-right: 0.6em;">None</span>
                                                                    <div data-key="default" class="arrowDeadlineHourRevise">
                                                                        <img src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="collapsible-body collapseBodyImageGallery">
                                                                <div class="valign-wrapper" style="display: flex; justify-content: space-between">
                                                                    <div style="display: flex; justify-content: space-between; margin-left: 4.5em; margin-right: 10px;" class="right">
                                                                        <div>
                                                                            <input type="text" class="inputHourRevise" name="inpurHourRevise" oninput="changeSlider()">
                                                                        </div>
                                                                        <div>
                                                                            <input type="text" class="inputMinutesRevise" name="inputMinutesRevise" oninput="changeSlider()">
                                                                        </div>
                                                                    </div>
                                                                    <div class="sliderParentRevise">
                                                                        <img src="<?= base_url(); ?>/assets/images/morning.png" width="9" height="7" alt="" style="vertical-align: text-top; margin-right: 1.2em; margin-top: 2px;">
                                                                        <img src="<?= base_url(); ?>/assets/images/daylight.png" width="8" height="8" alt="" style="vertical-align: text-top; margin-right: 2.4em; margin-top: 2px; ">
                                                                        <img src="<?= base_url(); ?>/assets/images/afternoon.png" width="7" height="7" alt="" style="vertical-align: text-top; margin-top: 2px; ">
                                                                        <div style="width: 5.5em; bottom: 0.3em; text-align: center; margin-left: 0.2em;" id="sliderRevise">
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

                                    <div class="row" style="margin-bottom: 0;">
                                        <div class="col s12" style="padding: 0; margin: 0;">
                                            <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; background-color: #f2f1f6;">
                                                <div class="card-content" style="padding: 1em 1.5em; margin: 0;">
                                                    <div style="display: flex; justify-content: space-between" class="valign-wrapper">
                                                        <div>
                                                            <p class="pReviseDate">Images Notes</p>
                                                        </div>
                                                        <div>
                                                            <p style="color: #40a1f8; font-size: 0.8em;" class="spanEditImageRevise" hidden>Edit</p>
                                                        </div>
                                                    </div>
                                                    <div class="targetImgRevise">

                                                    </div>
                                                    <form action="" id="uploadFileRevise" enctype="multipart/form-data">
                                                        <label data-trigg="fileUploadRevise" for="fileUploadRevise">Add image...</label>
                                                        <input type="file" id="fileUploadRevise" class="fileUploadRevise" multiple name="fileUploadRevise[]" accept="image/x-png,image/gif,image/jpeg,image/jpg" placeholder="Job Title" onchange="saveUploadRevise(this)">
                                                        <input type="text" class="idJobGroup1" name="idJobGroupRevise" style="display: none;" value="<?= $idJob; ?>">
                                                        <input type="text" class="idSubjob1" name="idSubjobRevise" style="display: none;" value="<?= $idSubjob; ?>">
                                                        <input type="text" hidden class="imgReviseHelper" style="display: none;">
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row valign-wrapper" style="margin-bottom: 0; margin-top: 0.8em;">
                                        <div class="col s12 m6 offset-m3" onclick="requestRevision(<?= $idSubjob; ?>)" style="padding: 0; margin: 0">
                                            <div class="requestRevision center">
                                                <span class="spanRevise" style="margin-left: 0.7em; font-size: 0.8em; color: #fff; font-family: 'Quicksand', sans-serif; font-weight: 600;">Request Revision</span>
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

        <div class="row valign-wrapper divChangeOverdue" style="padding-left: 1.3em; padding-right: 1.3em; margin-bottom: 0.5em;">
            <div class="col s12 m6 offset-m3">
                <div class="card cardChangeOverdue" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; background-color: #db3b25;">
                    <div class="card-content" style="padding: 0.3em 0.6em; margin: 0;">
                        <ul class="collapsible collapseChangeOverdue" style="width: 100%; background-color: #db3b25; color: #fff; box-shadow: none; border: none; margin: 0;">
                            <li>
                                <div class="collapsible-header collapseHeaderChangeOverdue" style="border: none !important; display: flex; justify-content: space-between; background-color: #db3b25;">
                                    <div class="valign-wrapper changeOverdueTitle">
                                        <img src="<?= base_url(); ?>/assets/images/nooverdues.png" width="25" height="25" alt=""> <span style="margin-left: 1.4em; color: #fff;">Change Overdue Deadline</span>
                                    </div>
                                    <div class="valign-wrapper" style="text-align: right;">
                                        <div>
                                            <img class="arrowChangeOverdue" style="-webkit-transition: -webkit-transform .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="collapsible-body collapseDetailSubjob">
                                    <div class="row" style="margin-bottom: 0;">
                                        <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; background-color: #fff;">
                                            <div class="card-content" style="padding: 0; margin: 0;">
                                                <div>
                                                    <textarea class="textareaField notesChangeOverdue" name="notes" id="" rows="4" placeholder="Add Notes"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-bottom: 0;">
                                        <div class="col s12" style="padding: 0; margin: 0;">
                                            <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; background-color: #f2f1f6;">
                                                <div class="card-content" style="padding: 1em 1.5em; margin: 0;">
                                                    <ul class="collapsible collapseDeadlineChangeOverdue">
                                                        <li>
                                                            <div class="collapsible-header collapseHeaderImageGallery valign-wrapper">
                                                                <div>
                                                                    <p class="pReviseDate">New Deadline Date</p>
                                                                </div>
                                                                <div class="valign-wrapper">
                                                                    <span class="spanDeadlineDateChangeOverdue" style="font-size: 0.8em; color: #e2e2e2; margin-right: 0.6em;">None</span>
                                                                    <div data-key="default" class="arrowDeadlineChangeOverdue">
                                                                        <img id="arrowDeadlineChangeOverdue" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="collapsible-body collapseBodyImageGallery">
                                                                <div class="row">
                                                                    <div class="col s9" style="padding-left: 0; padding-right: 0.4em; margin: 0;">
                                                                        <div id="calendarChangeOverdue"></div>
                                                                        <input type="text" hidden class="deadlineDateFieldChangeOverdue" name="deadlineDateFieldChangeOverdue">
                                                                        <input type="text" hidden class="currentDeadlineCreate" name="currentDeadlineCreate">
                                                                    </div>
                                                                    <div class="col s3" style="padding: 0; margin: 0">
                                                                        <div class="selectMonth">
                                                                            <p><?= date('F'); ?></p>
                                                                        </div>
                                                                        <div class="selectYear">
                                                                            <p><?= date('Y'); ?></p>
                                                                        </div>
                                                                        <div class="selectDay">
                                                                            <p onclick="changeDayChangeOverdue('yesterdayChangeOverdue')" id="yesterdayChangeOverdue">Yesterday</p>
                                                                            <p onclick="changeDayChangeOverdue('todayChangeOverdue')" id="todayChangeOverdue" class="activeDay">Today</p>
                                                                            <p onclick="changeDayChangeOverdue('tomorrowChangeOverdue')" id="tomorrowChangeOverdue">Tomorrow</p>
                                                                            <p onclick="changeDayChangeOverdue('nextWeekChangeOverdue')" id="nextWeekChangeOverdue">Next week</p>
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

                                    <div class="row" style="margin-bottom: 0;">
                                        <div class="col s12" style="padding: 0; margin: 0;">
                                            <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; background-color: #f2f1f6;">
                                                <div class="card-content" style="padding: 1em 1.5em; margin: 0;">
                                                    <ul class="collapsible collapseTimeChangeOverdue">
                                                        <li>
                                                            <div class="collapsible-header collapseHeaderImageGallery valign-wrapper">
                                                                <div>
                                                                    <p class="pReviseTime">New Deadline Time</p>
                                                                </div>
                                                                <div class="valign-wrapper">
                                                                    <span class="spanTimeChangeOverdue" style="font-size: 0.8em; color: #e2e2e2; margin-right: 0.6em;">None</span>
                                                                    <div data-key="default" class="arrowTimeChangeOverdue">
                                                                        <img id="arrowTimeChangeOverdue" src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="collapsible-body collapseBodyImageGallery">
                                                                <div class="valign-wrapper" style="display: flex; justify-content: space-between">
                                                                    <div style="display: flex; justify-content: space-between; margin-left: 2.5em; margin-right: 10px;" class="right">
                                                                        <div>
                                                                            <input type="text" class="hourChangeOverdue" name="hourChangeOverdue" oninput="changeSliderTime()">
                                                                        </div>
                                                                        <div>
                                                                            <input type="text" class="minutesChangeOverdue" name="minutesChangeOverdue" oninput="changeSliderTime()">
                                                                        </div>
                                                                    </div>
                                                                    <div class="sliderParentChangeOverdue">
                                                                        <img src="<?= base_url(); ?>/assets/images/morning.png" width="9" height="7" alt="" style="vertical-align: text-top; margin-right: 1.2em; margin-top: 2px;">
                                                                        <img src="<?= base_url(); ?>/assets/images/daylight.png" width="8" height="8" alt="" style="vertical-align: text-top; margin-right: 2.4em; margin-top: 2px; ">
                                                                        <img src="<?= base_url(); ?>/assets/images/afternoon.png" width="7" height="7" alt="" style="vertical-align: text-top; margin-top: 2px; ">
                                                                        <div style="width: 5.5em; bottom: 0.3em; text-align: center; margin-left: 0.2em;" id="sliderChangeOverdue">
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

                                    <div class="row valign-wrapper" style="margin-bottom: 0; margin-top: 0.8em;">
                                        <div class="col s12 m6 offset-m3 divButtonChange" onclick="changeRequestOverdue(<?= $idSubjob; ?>)" style="padding: 0; margin: 0">
                                            <div class="requestRevision center">
                                                <span class="spanRevise" style="margin-left: 0.7em; font-size: 0.8em; color: #fff; font-family: 'Quicksand', sans-serif; font-weight: 600;">Change Overdue Deadline</span>
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
    </div>

    <div class="actionDone" hidden>
        <div class="row valign-wrapper" style="padding-left: 1.3em; padding-right: 1.3em; margin-bottom: 0.5em;">
            <div class="col s12 m6 offset-m3 clickDone" onclick="markAsCorrect(<?= $idSubjob; ?>)">
                <div class="doneAction center" hidden>
                    <span class="spanDone" style="margin-left: 0.7em; color: #fff; font-family: 'Quicksand', sans-serif;">Sub Job Done</span>
                </div>
                <div class="revisedAction valign-wrapper" hidden>
                    <img src="<?= base_url(); ?>/assets/images/waitingRevision.png" width="25" height="25" alt=""> <span class="spanWaitingRevision" style="margin-left: 1.4em; color: #fff;">Waiting Revision Reported</span>
                </div>
            </div>
        </div>
    </div>


<?php } ?>

<!------------------------- modal remind other -------------------------->

<div id="modalShowImagee" class="modal">
    <div class="modal-content modalContentImgRefer">
        <div class="targetShowImage"></div>
    </div>
</div>

<!------------------------- modal remind other -------------------------->

<script>
    $(document).ready(function() {

        // ------------------------------------------------------- slider for revise time ------------------------------------------------------- //

        var sliderRevise = document.getElementById('sliderRevise');

        noUiSlider.create(sliderRevise, {
            start: [9],
            connect: 'lower',
            step: 0.5,
            range: {
                'min': [9],
                'max': [17]
            }
        });
        $('.showValueSlider').click(function() {
            // console.log(sliderr.noUiSlider.get());
        })

        sliderRevise.noUiSlider.on('slide', function() {
            var sliderValue = sliderRevise.noUiSlider.get();
            var split = sliderValue.split('.');
            $('.inputHourRevise').val(split[0]);

            if (split[1] == '50') {
                var newMinutes = '30';
            } else {
                var newMinutes = '00';
            }
            $('.inputMinutesRevise').val(newMinutes);

            var minutes = $('.inputMinutesRevise').val();
            $('.spanDeadlineHourRevise').text(split[0] + ':' + minutes);
        })

        // ------------------------------------------------------- slider for revise time ------------------------------------------------------- //




        // ------------------------------------------------------- slider for change overdue ------------------------------------------------------- //

        var sliderOverdue = document.getElementById('sliderChangeOverdue');

        noUiSlider.create(sliderOverdue, {
            start: [9],
            connect: 'lower',
            step: 0.5,
            range: {
                'min': [9],
                'max': [17]
            }
        });

        sliderOverdue.noUiSlider.on('slide', function() {
            var sliderValue = sliderOverdue.noUiSlider.get();
            var split = sliderValue.split('.');
            $('.hourChangeOverdue').val(split[0]);

            if (split[1] == '50') {
                var newMinutes = '30';
            } else {
                var newMinutes = '00';
            }
            $('.minutesChangeOverdue').val(newMinutes);

            var minutes = $('.minutesChangeOverdue').val();
            $('.spanTimeChangeOverdue').text(split[0] + ':' + minutes);
            $('.spanTimeChangeOverdue').css({
                'color': '#5d5e5e'
            });
        })

        // ------------------------------------------------------- slider for change overdue ------------------------------------------------------- //


        $('.collapseDetailSubjob').collapsible({
            onOpenStart: function() {
                $('.arrowDetailSubjob').addClass('rtr');
            },
            onCloseStart: function() {
                $('.arrowDetailSubjob').removeClass('rtr');
            }
        });

        $('.collapseImageGallery').collapsible({
            onOpenEnd: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/uparrow.png" width="15" height="15" alt="">';
                $('.arrowShowImg').html('');
                $('.arrowShowImg').html(img);
            },
            onCloseEnd: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">';
                $('.arrowShowImg').html('');
                $('.arrowShowImg').html(img);
            }
        });

        $('.collapseDetailCrewSubjob').collapsible({
            onOpenEnd: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/uparrow.png" width="15" height="15" alt="">';
                $('.arrowShowCrew').html('');
                $('.arrowShowCrew').html(img);
            },
            onCloseEnd: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">';
                $('.arrowShowCrew').html('');
                $('.arrowShowCrew').html(img);
            }
        });

        $('.collapseDetailRemindSubjob').collapsible({
            onOpenEnd: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/uparrow.png" width="15" height="15" alt="">';
                $('.arrowRemindSubjob').html('');
                $('.arrowRemindSubjob').html(img);
            },
            onCloseEnd: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">';
                $('.arrowRemindSubjob').html('');
                $('.arrowRemindSubjob').html(img);
            }
        });

        $('.collapseReportHistory').collapsible({
            onOpenStart: function() {
                $('#arrowReportHistory').addClass('rtr');
            },
            onCloseStart: function() {
                $('#arrowReportHistory').removeClass('rtr');
            }
        })

        $('.collapseOverdueHistory').collapsible({
            onOpenStart: function() {
                $('.arrowOverdue').addClass('rtr');
            },
            onCloseStart: function() {
                $('.arrowOverdue').removeClass('rtr');
            }
        })

        $('.collapseLatestReport').collapsible({
            onOpenStart: function() {
                $('.arrowLatesReport').addClass('rtr');
            },
            onCloseStart: function() {
                $('.arrowLatesReport').removeClass('rtr');
            }
        })

        $('.collapseOverdueProposal').collapsible({
            onOpenStart: function() {
                $('.arrowLatesReport').addClass('rtr');
            },
            onCloseStart: function() {
                $('.arrowLatesReport').removeClass('rtr');
            }
        })

        $('.collapseChangeOverdue').collapsible({
            onOpenStart: function() {
                $('.arrowChangeOverdue').addClass('rtr');

                var imgDef = '<img src="<?= base_url(); ?>/assets/images/nooverdues.png" width="25" height="25" alt=""> <span style="margin-left: 1.4em; color: #fff;">Change Overdue Deadline</span>';
                var imgNew = '<img src="<?= base_url(); ?>/assets/images/overduered.png" width="25" height="25" alt=""> <span style="margin-left: 1.4em; color: red;">Change Overdue Deadline</span>';
                $('.changeOverdueTitle').html(imgNew);

                $('ul[class="collapsible collapseChangeOverdue"]').css({
                    "background-color": "#fff",
                    "color": "red"
                });
                $('div[class="card cardChangeOverdue"]').css({
                    "background-color": "#fff"
                });
                $('div[class="collapsible-header collapseHeaderChangeOverdue"]').css({
                    "background-color": "#fff"
                })
            },
            onCloseStart: function() {
                $('.arrowChangeOverdue').removeClass('rtr');
            }
        })

        $('.arrowDeadlineRevise').click(function(e) {
            e.preventDefault();
            var deadlineDateVal = $('.deadlineDateFieldRevise').val();

            if (deadlineDateVal == '') {
                collapseDeadline();
            } else {
                //clear field
                $('.deadlineDateFieldRevise').val('');

                //clear span
                $('.spanDeadlineDateRevise').text('None');
                $('.spanDeadlineDateRevise').css({
                    "color": "#e2e2e2"
                });

                $('.collapseDeadlineDateRevise').collapsible('close');

                //change button toggle
                var img = '<img src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">';
                $('.arrowDeadlineRevise').html(img);
            }

        })

        $('.arrowDeadlineChangeOverdue').click(function(e) {
            e.preventDefault();
            var deadlineDateVal = $('.deadlineDateFieldChangeOverdue').val();

            if (deadlineDateVal == '') {
                collapseDeadline();
            } else {
                //clear field
                $('.deadlineDateFieldChangeOverdue').val('');

                //clear span
                $('.spanDeadlineDateChangeOverdue').text('None');
                $('.spanDeadlineDateChangeOverdue').css({
                    "color": "#e2e2e2"
                });

                $('.collapseDeadlineChangeOverdue').collapsible('close');

                //change button toggle
                var img = '<img src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">';
                $('.arrowDeadlineChangeOverdue').html(img);
            }

        })

        $('.arrowDeadlineHourRevise').click(function(e) {
            e.preventDefault();

            var hour = $('.inputHourRevise').val();
            var minutes = $('.inputMinutesRevise').val();

            if (hour == '' && minutes == '') {
                collapseDeadlineTime();
            } else {
                //clear field
                $('.inputHourRevise').val('');
                $('.inputMinutesRevise').val('');

                //clear span
                $('.spanDeadlineHourRevise').text('None');
                $('.spanDeadlineHourRevise').css({
                    "color": "#e2e2e2"
                });

                $('.collapseDeadlineHourRevise').collapsible('close');

                //change button toggle
                var img = '<img src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">';
                $('.arrowDeadlineHourRevise').html(img);
            }
        })

        $('.arrowTimeChangeOverdue').click(function(e) {
            e.preventDefault();

            var hour = $('.hourChangeOverdue').val();
            var minutes = $('.minutesChangeOverdue').val();

            if (hour == '' && minutes == '') {
                collapseTimeChangeOverdue();
            } else {
                //clear field
                $('.hourChangeOverdue').val('');
                $('.minutesChangeOverdue').val('');

                //clear span
                $('.spanTimeChangeOverdue').text('None');
                $('.spanTimeChangeOverdue').css({
                    "color": "#e2e2e2"
                });

                $('.collapseTimeChangeOverdue').collapsible('close');

                //change button toggle
                var img = '<img src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">';
                $('.arrowTimeChangeOverdue').html(img);
            }
        })

        $('.collapseRevise').collapsible({
            onOpenStart: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/revise.png" width="25" height="25">';
                var p = '<span style="margin-left: 1.4em; color: #db3b25;">Revise</span>';
                $('.reviseTitle').html(img + p);

                $('div[class="collapsible-header collapseHeaderRevise"]').css({
                    "background-color": "#fff"
                });
                $('.cardRevise').css({
                    "background-color": "#fff"
                });
                $('ul[class="collapsible collapseRevise"]').css({
                    "background-color": "#fff"
                });

                $('.imgArrow').css({
                    "-webkit-transform": "rotate(180deg) translateZ(0)"
                });
            },
            onOpenEnd: function() {
                $('.imgArrow').css({
                    "-webkit-transition": "-webkit-transform .5s"
                });
            },
            onCloseStart: function() {
                $('.imgArrow').css({
                    "-webkit-transform": "rotate(360deg) translateZ(0)"
                });
            },
            onCloseEnd: function() {

                $('div[class="collapsible-header collapseHeaderRevise"]').css({
                    "background-color": "#db3b25"
                });
                $('.cardRevise').css({
                    "background-color": "#db3b25"
                });
                $('ul[class="collapsible collapseRevise"]').css({
                    "background-color": "#db3b25"
                });

                var img = '<img src="<?= base_url(); ?>/assets/images/revise1.png" width="25" height="25">';
                var p = '<span style="margin-left: 1.4em; color: #fff;">Revise</span>';
                $('.reviseTitle').html(img + p);
            }
        })

        $('.collapseImageRevise').collapsible({
            onOpenStart: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/revise.png" width="25" height="25">';
                var p = '<span style="margin-left: 1.4em; color: #db3b25;">Revise</span>';
                $('.reviseTitle').html(img + p);

                $('.arrowImageRevise').css({
                    "-webkit-transform": "rotate(180deg) translateZ(0)"
                });
            },
            onOpenEnd: function() {
                $('.arrowImageRevise').css({
                    "-webkit-transition": "-webkit-transform .5s"
                });
            },
            onCloseStart: function() {
                $('.arrowImageRevise').css({
                    "-webkit-transform": "rotate(360deg) translateZ(0)"
                });
            },
            onCloseEnd: function() {

                var img = '<img src="<?= base_url(); ?>/assets/images/revise1.png" width="25" height="25">';
                var p = '<span style="margin-left: 1.4em; color: #fff;">Revise</span>';
            }
        })

        $('#calendarRevise').simpleCalendar({
            displayYear: false, // Display year in header
            fixedStartDay: true, // Week begin always by monday or by day set by number 0 = sunday, 7 = saturday, false = month always begin by first day of the month
            displayEvent: false, // Display existing event
            disableEventDetails: false, // disable showing event details
            disableEmptyDetails: false,

        });

        $('#calendarChangeOverdue').simpleCalendar({
            displayYear: false, // Display year in header
            fixedStartDay: true, // Week begin always by monday or by day set by number 0 = sunday, 7 = saturday, false = month always begin by first day of the month
            displayEvent: false, // Display existing event
            disableEventDetails: false, // disable showing event details
            disableEmptyDetails: false,

        });

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
            $('.deadlineDateFieldRevise').val(newDate);

            var span = convertMonth(new Date(getRealDate).getMonth());

            $('.spanDeadlineDateRevise').text(d + ' ' + span);
            $('.spanDeadlineDateRevise').css({
                "font-size": "0.9em",
                "color": "#5f5e5e",
                "margin-right": "0.6em"
            });
        })



        selectedCrew();
        getImgReport();
        getLatestReport();
        getOverdue();
        collapseDeadline();
        collapseDeadlineChangeOverdue();
        collapseTimeChangeOverdue();
        collapseDeadlineTime();
        getHeader();
        getHistory();
        getActionButton();
        getProposedOverdue();

        init_modal_showImagee();
    })

    function getProposedOverdue() {
        var idSubjob = '<?= $idSubjob; ?>';
        $.ajax({
            type: 'POST',
            data: {
                idSubjob: idSubjob
            },
            url: '<?= base_url('jzl/MobileJobUser/getProposedOverdue'); ?>',
            dataType: 'json',
            success: function(result) {
                if (result.status != 6) {
                    $('.mainOverdueProposal').css({
                        "display": "none"
                    });
                } else {
                    $('.mainOverdueProposal').css({
                        "display": "block"
                    });
                    $('.mainLatestReport').css({
                        "display": "none"
                    });
                }
            }
        })
    }

    function getHistory() {
        var idSubjob = '<?= $idSubjob; ?>';
        $.ajax({
            type: "POST",
            data: {
                idSubjob: idSubjob
            },
            url: '<?= base_url('jzl/MobileJobUser/getHistory'); ?>',
            dataType: 'json',
            success: function(result) {
                if (result.reportTimes == null) {
                    $('.spanReported').text('None reported');
                    $('.reportHelper').removeClass('collapsible')
                    $('.reportHelper').removeClass('collpaseReportHistory')
                } else {
                    $('.spanReported').text(result.reportTimes + ' x reported');
                }
                var tr = '';
                for (var i = 0; i < result.deadlineDate.length; i++) {
                    if (result.deadlineDate[i] == 0) {
                        var deadline = 'No deadline';
                    } else {
                        var deadline = result.deadlineDate[i] + ' ' + result.deadlineHour[i];
                    }

                    if (result.deadlineDate.length == (i + 1)) {
                        var desc = 'Waiting Assessment';
                    } else {
                        var desc = 'Failed';
                    }

                    tr += '<tr style="border:none;">' +
                        '<td style="width: 2em; font-size: 0.8em; color: #929292; font-weight: 700; padding: 1em;">' + (i + 1) + '</td>' +
                        '<td style="width: 16em; font-size: 0.8em; color: #bebfbf; font-weight: 700; padding: 1em;">' + desc + '</td>' +
                        '<td class="targetReviseTime" style="font-size: 0.8em; color: #bebfbf; padding: 1em; width: 10em;">' + deadline + '</td>' +
                        '</tr>';
                }
                $('.targetBodyReportHistory').html(tr);
            }
        })
    }

    function getHeader() {
        var idSubjob = '<?= $idSubjob; ?>';

        $.ajax({
            type: "POST",
            data: {
                idSubjob: idSubjob
            },
            url: '<?= base_url('jzl/MobileJobUser/getHeaderAssessment'); ?>',
            dataType: 'json',
            success: function(result) {
                $('.mainSubjob').text(result.subjob);
                $('.subjobTitle').text(result.title);
                $('.finishTime').text(result.finishTime);

                if (result.action == 'request overdue') {
                    $('.deadlineTitle').css({
                        "color": "red"
                    });
                    $('.actionTitle').css({
                        "color": "red"
                    });
                }


                if (result.deadline == '0 0') {
                    $('.deadlineTitle').text('No deadline');
                } else {
                    $('.deadlineTitle').text(result.deadline);
                }
                $('.actionTitle').text(result.action);
            }
        })
    }

    function collapseDeadline() {
        $('.collapseDeadlineDateRevise').collapsible({
            onOpenEnd: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/toggleactive.png" width="35" height="20" alt="">';
                $('.arrowDeadlineRevise').html('');
                $('.arrowDeadlineRevise').html(img);

                var today = $('.today').attr('data-date').substring(0, 10);

                var getRealDate = new Date(today).getTime() + (1 * 24 * 60 * 60 * 1000);
                var y = new Date(getRealDate).getFullYear();
                var m = addZero(new Date(getRealDate).getMonth() + 1);
                var d = addZero(new Date(getRealDate).getDate());

                var selectDate = y + '-' + m + '-' + d;
                var span = convertMonth(new Date(getRealDate).getMonth());

                $('.spanDeadlineDateRevise').text(d + ' ' + span);
                $('.deadlineDateFieldRevise').val(selectDate);
                $('.spanDeadlineDateRevise').css({
                    "font-size": "0.9em",
                    "color": "#5f5e5e",
                    "margin-right": "0.6em"
                });

                //change data key
                var deadlineVal = $('.deadlineDateFieldRevise').val();
                if (deadlineVal != '') {
                    $('.arrowDeadlineRevise').removeAttr('data-key');
                    $('.arrowDeadlineRevise').attr('data-key', 'active');
                }

            },
            onCloseStart: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">';
                var imgActive = '<img src="<?= base_url(); ?>/assets/images/toggleactive.png" width="35" height="20" alt="">';

                var deadline = $('.deadlineDateFieldRevise').val();
                if (deadline != '' || deadline != null) {
                    $('.arrowDeadlineRevise').html(imgActive);
                } else {
                    $('.arrowDeadlineRevise').html(img);
                }
            }
        })
    }

    function collapseDeadlineChangeOverdue() {
        $('.collapseDeadlineChangeOverdue').collapsible({
            onOpenStart: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/toggleactive.png" width="35" height="20" alt="">';
                $('.arrowDeadlineChangeOverdue').html('');
                $('.arrowDeadlineChangeOverdue').html(img);

                $('.day').removeClass('today');

                var currentDeadline = $('.currentDeadlineCreate').val();
                var year = new Date(currentDeadline).getFullYear();
                var month = addZero((new Date(currentDeadline).getMonth() + 1));
                var newDate = new Date(currentDeadline).getDate() - 1;
                var newFullDate = year + '-' + month + '-' + newDate;

                $('div[data-date="' + newFullDate + 'T17:00:00.000Z"]').addClass('today');

                $('#todayChangeOverdue').removeClass('activeDay');
            },
            onOpenEnd: function() {
                $('#calendarChangeOverdue').simpleCalendar({
                    displayYear: false, // Display year in header
                    fixedStartDay: true, // Week begin always by monday or by day set by number 0 = sunday, 7 = saturday, false = month always begin by first day of the month
                    displayEvent: false, // Display existing event
                    disableEventDetails: false, // disable showing event details
                    disableEmptyDetails: false,
                });

                var today = $('.today').attr('data-date').substring(0, 10);

                var getRealDate = new Date(today).getTime() + (1 * 24 * 60 * 60 * 1000);
                var y = new Date(getRealDate).getFullYear();
                var m = addZero(new Date(getRealDate).getMonth() + 1);
                var d = addZero(new Date(getRealDate).getDate());

                var selectDate = y + '-' + m + '-' + d;
                var span = convertMonth(new Date(getRealDate).getMonth());

                $('.spanDeadlineDateChangeOverdue').text(d + ' ' + span);
                $('.deadlineDateFieldChangeOverdue').val(selectDate);
                $('.spanDeadlineDateChangeOverdue').css({
                    "font-size": "0.9em",
                    "color": "#5f5e5e",
                    "margin-right": "0.6em"
                });

                //change data key
                var deadlineVal = $('.deadlineDateFieldChangeOverdue').val();
                if (deadlineVal != '') {
                    $('.arrowDeadlineChangeOverdue').removeAttr('data-key');
                    $('.arrowDeadlineChangeOverdue').attr('data-key', 'active');
                }

                // ------------------------------------------------------- click day ------------------------------------------------------- //

                $('.day').click(function(e) {
                    e.preventDefault();
                    var currentDeadline = $('.currentDeadlineCreate').val();

                    //change span
                    var today = $('.today').attr('data-date').substring(0, 10);

                    var getRealDate = new Date(today).getTime() + (1 * 24 * 60 * 60 * 1000);
                    var y = new Date(getRealDate).getFullYear();
                    var m = addZero(new Date(getRealDate).getMonth() + 1);
                    var d = addZero(new Date(getRealDate).getDate());

                    var newDate = y + '-' + m + '-' + d;

                    if (new Date(newDate).getTime() < new Date(currentDeadline).getTime()) {
                        slModal('Failed', 'The chosen date should be more or the same as the previous date', 'warning', {
                            buttons: false,
                            timer: 1500
                        });
                        $('.deadlineDateFieldChangeOverdue').val('');
                        $('.spanDeadlineDateChangeOverdue').text('None');
                        $('.spanDeadlineDateChangeOverdue').css({
                            "color": "#e2e2e2"
                        });
                    } else {
                        var data = $(this).attr('data-date');

                        var last = $('.today').attr('data-date');
                        $('div[data-date="' + last + '"]').attr('class', 'day');
                        $('div[data-date="' + data + '"]').attr('class', 'day today');


                        $('.deadlineDateFieldChangeOverdue').val(newDate);

                        var span = convertMonth(new Date(getRealDate).getMonth());

                        $('.spanDeadlineDateChangeOverdue').text(d + ' ' + span);
                        $('.spanDeadlineDateChangeOverdue').css({
                            "font-size": "0.9em",
                            "color": "#5f5e5e",
                            "margin-right": "0.6em"
                        });
                    }

                })

                // ------------------------------------------------------- click day ------------------------------------------------------- //
            },
            onCloseStart: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">';
                var imgActive = '<img src="<?= base_url(); ?>/assets/images/toggleactive.png" width="35" height="20" alt="">';

                var deadline = $('.deadlineDateFieldChangeOverdue').val();
                if (deadline != '' || deadline != null) {
                    $('.arrowDeadlineChangeOverdue').html(imgActive);
                } else {
                    $('.arrowDeadlineChangeOverdue').html(img);
                }
            }
        })
    }

    function collapseDeadlineTime() {
        $('.collapseDeadlineHourRevise').collapsible({
            onOpenEnd: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/toggleactive.png" width="35" height="20" alt="">';
                $('.arrowDeadlineHourRevise').html('');
                $('.arrowDeadlineHourRevise').html(img);

                $('.spanDeadlineHourRevise').text('9:00');
                $('.spanDeadlineHourRevise').css({
                    "color": "#5d5e5e",
                    "font-weight": "400"
                })

                $('.inputHourRevise').val('09');
                $('.inputMinutesRevise').val('00');

            },
            onCloseStart: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">';
                var imgActive = '<img src="<?= base_url(); ?>/assets/images/toggleactive.png" width="35" height="20" alt="">';

                var deadline = $('.deadlineDateFieldRevise').val();
                if (deadline != '' || deadline != null) {
                    $('.arrowDeadlineHourRevise').html(imgActive);
                } else {
                    $('.arrowDeadlineHourRevise').html(img);
                }


            }
        })
    }

    function collapseTimeChangeOverdue() {
        $('.collapseTimeChangeOverdue').collapsible({
            onOpenEnd: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/toggleactive.png" width="35" height="20" alt="">';
                $('.arrowTimeChangeOverdue').html('');
                $('.arrowTimeChangeOverdue').html(img);

                $('.spanTimeChangeOverdue').text('9:00');
                $('.spanTimeChangeOverdue').css({
                    "color": "#5d5e5e",
                    "font-weight": "400"
                })

                $('.hourChangeOverdue').val('09');
                $('.minutesChangeOverdue').val('00');

            },
            onCloseStart: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">';
                var imgActive = '<img src="<?= base_url(); ?>/assets/images/toggleactive.png" width="35" height="20" alt="">';

                var deadline = $('.deadlineDateFieldChangeOverdue').val();
                if (deadline != '' || deadline != null) {
                    $('.arrowDeadlineHourRevise').html(imgActive);
                } else {
                    $('.arrowDeadlineHourRevise').html(img);
                }
            }
        })
    }

    function getLatestReport() {
        var idSubjob = '<?= $idSubjob; ?>';

        $.ajax({
            type: "POST",
            data: {
                idSubjob: idSubjob
            },
            url: '<?= base_url('jzl/MobileJob/getLatestReport'); ?>',
            dataType: 'json',
            success: function(result) {
                var tr = '';
                for (var i = 0; i < result.imgReport.length; i++) {
                    var desc = '<p style="font-size: 0.85em; color: #919191">- ' + result.imgReport[i].desc + ' </p>';
                    var img = '<?= base_url(); ?>' + '/uploads/job/' + result.idJob + '/' + result.imgReport[i].img;
                    var imgLink = "'" + result.imgReport[i]['img'] + "'";
                    tr += '<tr style="border: none;">' +
                        '<td style="width: 7em;"><img onclick="showImage(' + result.idJob + ', ' + imgLink + ')" style="border-radius: 0.8em;" src="' + img + '" width="70" height="70" alt=""></td>' +
                        '<td style="padding: 0.5em 0; vertical-align: top; width: 10em;">' +
                        desc +
                        '</td>' +
                        '</tr>';
                }

                $('.targetLatestReport').html(tr);
                $('.targetNoteReport').text(result.note);

                if (result.imgReport.length > 0) {
                    $('#dotSpan').addClass('dotSpan');
                }
            }
        })
    }

    function getImgReport() {
        var idSubjob = '<?= $idSubjob; ?>';
        $.ajax({
            type: "POST",
            data: {
                idSubjob: idSubjob
            },
            url: '<?= base_url('jzl/MobileJob/getImgReport'); ?>',
            dataType: 'json',
            success: function(result) {
                if (result.img != null) {
                    for (var i = 0; i < result.img.length; i++) {
                        var img = result.img[i].img;
                        var desc = result.img[i].desc;
                    }
                }
            }
        })
    }

    function changeDayRevise(trigger) {
        $('#todayRevise').removeAttr('class');
        $('#tomorrowRevise').removeAttr('class');
        $('#yesterdayRevise').removeAttr('class');
        $('#nextWeekRevise').removeAttr('class');

        $('#' + trigger).addClass('activeDay');
        var dateTime = '<?= date('Y-m-d' . 'T17:00:00.000Z'); ?>';
        if (trigger == 'yesterdayRevise') {
            var showTime = '<?= date('Y-m-d', strtotime('-2 days', strtotime(date('Y-m-d')))); ?>';
            var field = '<?= date('Y-m-d', strtotime('-1 days', strtotime(date('Y-m-d')))); ?>';
            var span = '<?= date('d M', strtotime('-1 days', strtotime(date('d M')))); ?>';
            var newDateTime = showTime + 'T17:00:00.000Z';
        } else if (trigger == 'todayRevise') {
            var showTime = '<?= date('Y-m-d', strtotime('-1 days', strtotime(date('Y-m-d')))); ?>';
            var field = '<?= date('Y-m-d'); ?>';
            var span = '<?= date('d M'); ?>';
            var newDateTime = showTime + 'T17:00:00.000Z';
        } else if (trigger == 'tomorrowRevise') {
            var showTime = '<?= date('Y-m-d'); ?>';
            var field = '<?= date('Y-m-d', strtotime('+1 days', strtotime(date('Y-m-d')))); ?>';
            var span = '<?= date('d M', strtotime('+1 days', strtotime(date('d M')))); ?>';
            var newDateTime = showTime + 'T17:00:00.000Z';
        } else if (trigger == 'nextWeekRevise') {
            var showTime = '<?= date('Y-m-d', strtotime('+7 days', strtotime(date('Y-m-d')))); ?>';
            var field = '<?= date('Y-m-d', strtotime('+8 days', strtotime(date('Y-m-d')))); ?>';
            var span = '<?= date('d M', strtotime('+8 days', strtotime(date('d M')))); ?>';
            var newDateTime = showTime + 'T17:00:00.000Z';
        }

        var last = $('.today').attr('data-date');


        $('div[data-date="' + last + '"]').attr('class', 'day');
        $('div[data-date="' + newDateTime + '"]').attr('class', 'day today');
        $('.spanDeadlineDateRevise').text(span);
        $('.deadlineDateFieldRevise').val(field);
    }

    function changeDayChangeOverdue(trigger) {
        $('#todayChangeOverdue').removeAttr('class');
        $('#tomorrowChangeOverdue').removeAttr('class');
        $('#yesterdayChangeOverdue').removeAttr('class');
        $('#nextWeekChangeOverdue').removeAttr('class');

        var currentDeadline = $('.currentDeadlineCreate').val();

        $('#' + trigger).addClass('activeDay');
        var dateTime = '<?= date('Y-m-d' . 'T17:00:00.000Z'); ?>';
        if (trigger == 'yesterdayChangeOverdue') {
            var showTime = '<?= date('Y-m-d', strtotime('-2 days', strtotime(date('Y-m-d')))); ?>';

            if (new Date(showTime).getTime() < new Date(currentDeadline).getTime()) {
                slModal('Failed', 'The chosen date should be more or the same as the previous date', 'warning', {
                    buttons: false,
                    timer: 1500
                });
                var year = new Date(currentDeadline).getFullYear();
                var month = addZero((new Date(currentDeadline).getMonth() + 1));
                var newDate = new Date(currentDeadline).getDate() - 1;
                var newFullDate = year + '-' + month + '-' + newDate;
                var newDateTime = newFullDate + 'T17:00:00.000Z';
                var field = currentDeadline;

            } else {
                var field = '<?= date('Y-m-d', strtotime('-1 days', strtotime(date('Y-m-d')))); ?>';
                var span = '<?= date('d M', strtotime('-1 days', strtotime(date('d M')))); ?>';
                var newDateTime = showTime + 'T17:00:00.000Z';
            }

        } else if (trigger == 'todayChangeOverdue') {
            var showTime = '<?= date('Y-m-d', strtotime('-1 days', strtotime(date('Y-m-d')))); ?>';

            if (new Date(showTime).getTime() < new Date(currentDeadline).getTime()) {
                slModal('Failed', 'The chosen date should be more or the same as the previous date', 'warning', {
                    buttons: false,
                    timer: 1500
                });
                var year = new Date(currentDeadline).getFullYear();
                var month = addZero((new Date(currentDeadline).getMonth() + 1));
                var newDate = new Date(currentDeadline).getDate() - 1;
                var newFullDate = year + '-' + month + '-' + newDate;
                var newDateTime = newFullDate + 'T17:00:00.000Z';
                var field = currentDeadline;

            } else {
                var field = '<?= date('Y-m-d'); ?>';
                var span = '<?= date('d M'); ?>';
                var newDateTime = showTime + 'T17:00:00.000Z';
            }
        } else if (trigger == 'tomorrowChangeOverdue') {
            var showTime = '<?= date('Y-m-d'); ?>';

            if (new Date(showTime).getTime() < new Date(currentDeadline).getTime()) {
                slModal('Failed', 'The chosen date should be more or the same as the previous date', 'warning', {
                    buttons: false,
                    timer: 1500
                });
                var year = new Date(currentDeadline).getFullYear();
                var month = addZero((new Date(currentDeadline).getMonth() + 1));
                var newDate = new Date(currentDeadline).getDate() - 1;
                var newFullDate = year + '-' + month + '-' + newDate;
                var newDateTime = newFullDate + 'T17:00:00.000Z';
                var field = currentDeadline;

            } else {
                var field = '<?= date('Y-m-d', strtotime('+1 days', strtotime(date('Y-m-d')))); ?>';
                var span = '<?= date('d M', strtotime('+1 days', strtotime(date('d M')))); ?>';
                var newDateTime = showTime + 'T17:00:00.000Z';
            }

        } else if (trigger == 'nextWeekChangeOverdue') {
            var showTime = '<?= date('Y-m-d', strtotime('+7 days', strtotime(date('Y-m-d')))); ?>';

            if (new Date(showTime).getTime() < new Date(currentDeadline).getTime()) {
                slModal('Failed', 'The chosen date should be more or the same as the previous date', 'warning', {
                    buttons: false,
                    timer: 1500
                });
                var year = new Date(currentDeadline).getFullYear();
                var month = addZero((new Date(currentDeadline).getMonth() + 1));
                var newDate = new Date(currentDeadline).getDate() - 1;
                var newFullDate = year + '-' + month + '-' + newDate;
                var newDateTime = newFullDate + 'T17:00:00.000Z';
                var field = currentDeadline;

            } else {
                var field = '<?= date('Y-m-d', strtotime('+8 days', strtotime(date('Y-m-d')))); ?>';
                var span = '<?= date('d M', strtotime('+8 days', strtotime(date('d M')))); ?>';
                var newDateTime = showTime + 'T17:00:00.000Z';
            }

        }

        var last = $('.today').attr('data-date');


        $('div[data-date="' + last + '"]').attr('class', 'day');
        $('div[data-date="' + newDateTime + '"]').attr('class', 'day today');
        $('.spanDeadlineDateChangeOverdue').text(span);
        $('.deadlineDateFieldChangeOverdue').val(field);
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

    function init_modal_showImagee() {

        $('#modalShowImagee').modal({
            opacity: 0.5,
            inDuration: 200,
            outDuration: 200,
            ready: undefined,
            complete: undefined,
            dismissible: true,
        });
    }

    function showHeight() {
        var height = $('#modalShowSubjob').height();
    }

    function showImage(idJob, imgName) {
        $('#modalShowImagee').modal('open');

        var src = '<?= base_url(); ?>uploads/job/' + idJob + '/' + imgName;
        var img = '<img class="detailImage" src="' + src + '" >';

        $('.targetShowImage').html(img);
    }

    function selectedCrew() {
        var idJob = '<?= $idJob; ?>'

        $.ajax({
            type: 'POST',
            data: {
                idJob: idJob
            },
            url: '<?= base_url('jzl/MobileJob/selectedCrew'); ?>',
            dataType: 'json',
            success: function(result) {
                var tr = ''
                for (var i = 0; i < result.crewName.length; i++) {
                    if (result.leader == result.crewName[i]) {
                        var td = '<td style="width: 2.7em; color: #ffd700; font-size: 0.9em; padding: 0;"><i class="fas fa-star"></i></td>';
                    } else {
                        var td = '<td style="width: 2.7em; color: #ffd700; font-size: 0.9em; padding: 0;"></td>';

                    }

                    tr += '<tr style="border: none;">' +
                        td +
                        '<td style="color: #919191; font-weight: 400; font-size: 0.9em;">' + result.crewName[i] + '</td>' +
                        '</tr>';
                }

                $('.targetCrewSubjob').html(tr);
            }
        })
    }

    function changeSlider() {
        var sliderr = document.getElementById('sliderRevise');
        var hour = $('.inputHourRevise').val();
        var minutes = $('.inputMinutesRevise').val();

        if (minutes == '00') {
            sliderr.noUiSlider.set(hour);
        } else {
            sliderr.noUiSlider.set(hour + '.' + '50');
        }

        $('.spanDeadlineHourRevise').text(hour + ':' + minutes);
    }

    function changeSliderTime() {
        var sliderr = document.getElementById('sliderChangeOverdue');
        var hour = $('.hourChangeOverdue').val();
        var minutes = $('.minutesChangeOverdue').val();

        if (minutes == '00') {
            sliderr.noUiSlider.set(hour);
        } else {
            sliderr.noUiSlider.set(hour + '.' + '50');
        }

        $('.spanTimeChangeOverdue').text(hour + ':' + minutes);
    }

    function markAsCorrect(idSubjob) {
        //change some css
        $('.subjobTitle').css({
            "color": "#d5d5d5"
        });
        $('.actionTitle').css({
            "color": "#d5d5d5"
        });
        $('.actionTitle').text('waiting approval');
        $('.deadlineTitle').css({
            "color": "#d5d5d5"
        });
        $('.dotSpan').fadeOut();

        $('.actionGroup').fadeOut();

        $('.actionDone').fadeIn();

        $.ajax({
            type: "POST",
            data: {
                idSubjob: idSubjob
            },
            url: '<?= base_url('jzl/MobileJob/correct'); ?>',
            dataType: 'json',
            success: function(result) {
                if (result.message == 'success') {
                    getListIndex();
                    getArchive();
                    if (result.status == 0) {
                        slModal('Congratulation', 'Job successfully achived', 'success', {
                            buttons: false,
                            timer: 1500
                        })
                    }
                    getActionButton();
                }
            }
        })
    }

    function getActionButton() {
        var idSubjob = '<?= $idSubjob; ?>';

        $.ajax({
            type: "POST",
            data: {
                idSubjob: idSubjob
            },
            url: '<?= base_url('jzl/MobileJobUser/getButtonAssessment'); ?>',
            dataType: 'json',
            success: function(result) {
                if (result.status == 'waiting') {
                    $('.actionGroup').fadeOut();
                    $('.actionDone').fadeIn();
                    $('.spanWaitingRevision').text('Waiting report');
                    $('.clickDone').removeAttr('onclick');
                } else if (result.status == 'waiting revision') {
                    $('.actionGroup').fadeOut();
                    $('.actionDone').fadeIn();
                    $('.spanWaitingRevision').text('Waiting Revision Report');
                    $('.clickDone').removeAttr('onclick');
                } else if (result.status == 'active') {
                    $('.actionDone').fadeOut();
                    $('.actionGroup').fadeIn();
                    $('.divChangeOverdue').css({
                        "display": "none"
                    });
                    $('.divRevise').css({
                        "display": "block"
                    });
                    $('.divRevise').fadeIn();
                } else if (result.status == 'waiting overdue') {
                    $('.actionDone').fadeOut();
                    $('.actionGroup').fadeIn();
                    $('.markCorrect').attr('onclick', 'acceptDeadline(' + idSubjob + ')');
                    $('.spanCorrect').text('Accept Overdue Deadline');
                }
            }
        })
    }

    function saveUploadRevise(input) {
        var form = document.getElementById('uploadFileRevise');
        var imgLen = input.files.length;

        $.ajax({
            type: "POST",
            data: new FormData(form),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            url: '<?= base_url('jzl/MobileJob/uploadFileRevise'); ?>',
            dataType: 'json',
            success: function(result) {
                $('.imgReviseHelper').val(1);

                var img = '';

                for (var i = 0; i < result.lastImg.length; i++) {
                    var src = '<?= base_url(); ?>/uploads/job/' + result.idJob + '/' + result.image[i].img;
                    var click = "'" + result.image[i].img + "'";

                    img += '<div id="previewImg" class="previewImg' + i + '" style="display: flex; justify-content: space-between; padding-top: 1.5em; padding-bottomg: 0; padding-right: 0; padding-left: 0;">' +
                        '<div>' +
                        '<span class="deleteImgBtn" id="revise' + i + '" onclick="deleteImgRevise(' + result.idSubjob + ', ' + click + ', ' + i + ')" hidden><img src="<?= base_url(); ?>/assets/images/stopfill.png" width="17" height="17"></span>' +
                        '<img class="imgReviseList" src="' + src + '" id="revise' + i + '" width="85" height="85" alt="" onclick="showImage(' + result.idJob + ', ' + click + ')" style="border-radius: 14px; margin-right: 20px; transition: ease .5s; z-index: 1;">' +
                        '</div>' +
                        '<div>' +
                        '<textarea class="textareaImageRevise" id="descRevise' + i + '" name="" data-id="' + i + '" cols="30" rows="10" placeholder="Add Notes" onchange="saveDescRevise(' + i + ', ' + result.idSubjob + ', ' + click + ')"></textarea>' +
                        '</div>' +
                        '</div>';
                }

                $('.targetImgRevise').append(img);
                $('.spanEditImageRevise').removeAttr('hidden');
                $('.spanEditImageRevise').attr('onclick', 'editImage()');
            }
        })
    }

    function deleteImgRevise(idSubjob, imgName, idForm) {
        $.ajax({
            type: 'POST',
            data: {
                idSubjob: idSubjob,
                imgName: imgName,
                source: 'img_revise, id_title',
                field: 'img_revise'
            },
            url: '<?= base_url('jzl/MobileJob/deleteImg'); ?>',
            dataType: 'json',
            success: function(result) {
                if (result.message == 'success') {
                    $('img[id="revise' + idForm + '"]').css({
                        "width": "0",
                        "height": "0"
                    })
                    $('span[id="revise' + idForm + '"]').remove();
                    $('#descRevise' + idForm).css({
                        "display": "none"
                    })
                    setTimeout(function() {
                        $('.previewImg' + idForm).remove();
                    }, 500);
                }
            }
        })
    }

    function editImage() {
        $('.deleteImgBtn').removeAttr('hidden');
        $('.imgReviseList').css({
            "width": "95",
            "height": "95"
        })
    }

    function requestRevision(idSubjob) {
        var deadlineDate = $('.deadlineDateFieldRevise').val();
        var hour = $('.inputHourRevise').val();
        var minutes = $('.inputMinutesRevise').val();
        if (hour != '' && minutes != '') {
            var deadlineHour = hour + ':' + minutes;
        } else {
            var deadlineHour = '';
        }

        var note = $('.notess').val();
        var img = $('.imgReviseHelper').val();

        if (note == '') {
            slModal('Failed', 'Note cannot be null', 'warning', {
                buttons: false,
                timer: 1500
            })
        } else if (img == '') {
            slModal('Failed', 'Image cannot be null', 'warning', {
                buttons: false,
                timer: 1500
            })
        } else {
            $.ajax({
                type: "POST",
                data: {
                    deadlineDate: deadlineDate,
                    deadlineHour: deadlineHour,
                    note: note,
                    idSubjob: idSubjob
                },
                url: '<?= base_url('jzl/MobileJob/requestRevision'); ?>',
                dataType: 'text',
                success: function(result) {
                    if (result == 'success') {
                        //append report history
                        var tr = '<tr data-report="report-history" data-rows="1">' +
                            '<td class="targetNumberResortHistory" style="width: 2em; font-size: 0.8em; color: #929292; font-weight: 700;">' + (result.revisedRows + 1) + '</td>' +
                            '<td style="width: 15em; font-size: 0.8em; color: red;">Waiting Revision</td>' +
                            '<td class="targetReviseTime" style="font-size: 0.8em; color: #929292;">' + result.revisedTime + '</td>' +
                            '</tr>';

                        //change span report history
                        $('.spanReported').text(result.revisedRows);
                        $('.reportedText').text('x revised');
                        $('.firstReportHistory').css({
                            "color": "#929292"
                        });

                        //remove dot
                        $('#dotReportHistory').removeAttr('class');

                        $('.actionGroup').fadeOut();
                        $('.actionDone').fadeIn();
                        $('.doneAction').fadeOut();
                        $('.revisedAction').fadeIn();

                        //change action title
                        $('.actionTitle').text('revision asked');
                        $('.actionTitle').css({
                            "color": "#d5d5d5"
                        })

                        getHistory();
                        getListIndex();
                    }
                }
            })
        }
    }

    function saveDescRevise(idForm, idSubjob, imgName) {
        var desc = $('#descRevise' + idForm).val();

        $.ajax({
            type: 'POST',
            data: {
                key: idForm,
                desc: desc,
                idSubjob: idSubjob,
                img: imgName
            },
            url: '<?= base_url('jzl/MobileJob/updateDescImage'); ?>',
            dataType: 'text',
            success: function(result) {
                if (result == 'success') {
                    return true;
                }
            }
        })
    }

    function acceptDeadline(idSubjob) {
        $.ajax({
            type: 'POST',
            data: {
                idSubjob: idSubjob
            },
            url: '<?= base_url('jzl/MobileJobUser/acceptDeadline'); ?>',
            dataType: 'text',
            success: function(result) {
                if (result == 'success') {
                    getActionButton();
                }
            }
        })
    }

    function getOverdue() {
        var idSubjob = '<?= $idSubjob; ?>';

        $.ajax({
            type: 'POST',
            data: {
                idSubjob: idSubjob
            },
            url: '<?= base_url('jzl/MobileJobUser/getOverdue'); ?>',
            dataType: 'json',
            success: function(result) {
                if (result.isOverdue != 0) {
                    $('.parrentArrowOverdue').removeAttr('hidden');
                    $('.spanOverdueHistory').text(result.isOverdue + 'x (' + result.dateCreate + ' ' + result.hourCreate + ')');

                    var desc = '<div class="valign-wrapper" style="display: flex; justify-content: space-between; padding: 0 2em;">' +
                        '<div>' +
                        '<p style="font-size: 0.8em; color: red; font-weight: 800;">' + result.dateCreate + ', ' + result.hourCreate + '</p>' +
                        '</div>' +
                        '<div>' +
                        '<i style="font-size: 0.8em; color: red;" class="fas fa-arrow-right"></i>' +
                        '</div>' +
                        '<div>' +
                        '<p class="descOverdue" style="font-size: 0.8em; color: red; font-weight: 100;">Not Yet Accepted</p>' +
                        '</div>' +
                        '</div>';

                    $('.targetOverdueHistory').html(desc);

                    //note overdue
                    $('.targetProposeNote').text(result.note);

                    var tr = '';
                    for (var i = 0; i < result.img.length; i++) {
                        var imgSrc = '<?= base_url(); ?>/uploads/job/' + result.idJob + '/' + result.img[i].img;
                        tr += ' <tr style="border: none;">' +
                            '<td style="width: 7em;"><img style="border-radius: 0.8em;" src="' + imgSrc + '" width="70" height="70" alt=""></td>' +
                            '<td style="padding: 0.5em 0; vertical-align: top; width: 10em;">' +
                            '<p style="font-size: 0.85em; color: #919191">- ' + result.img[i].desc + ' </p>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('.bodyProposeOverdue').html(tr);

                    $('.proposeOverdue').text(result.dateRequest + ' ' + result.hourRequest);

                    $('.finishTimeText').css({
                        "color": "red"
                    });
                    $('.proposeOverdue').css({
                        "color": "red"
                    });

                    $('.divRevise').css({
                        "display": "none"
                    });

                    $('.currentDeadlineCreate').val(result.deadlineDate);

                    //add onclick
                    var lastDeadline = "'" + result.lastDeadline + "'";
                    $('.divButtonChange').attr('onclick', 'changeRequestOverdue(' + idSubjob + ', ' + lastDeadline + ')');
                }
            }
        })
    }

    function changeRequestOverdue(idSubjob, lastDeadline) {
        var deadlineDate = $('.deadlineDateFieldChangeOverdue').val()
        var deadlineHour = $('.hourChangeOverdue').val();
        var deadlineTime = $('.minutesChangeOverdue').val();
        var note = $('.notesChangeOverdue').val();

        if (deadlineDate != '') {
            if (deadlineHour == '') {
                var deadline = deadlineDate + ' 09:00';
            } else {
                var deadline = deadlineDate + ' ' + deadlineHour + ':' + deadlineTime;
            }

            $.ajax({
                type: "POST",
                data: {
                    note: note,
                    deadline: deadline,
                    idSubjob: idSubjob,
                    lastDeadline: lastDeadline
                },
                url: '<?= base_url('jzl/MobileJobUser/changeRequestOverdue'); ?>',
                dataType: 'text',
                success: function(result) {
                    if (result.message == 'success') {
                        getActionButton();
                        getListIndex();
                        getOverdue();
                        $('.descOverdue').text(result.dates);
                        $('.descOverdue').css({
                            "color": "#919191"
                        });
                    }
                }
            })
        } else {
            slModal('Info', "You cannot pick a deadline if the date's not filled", 'warning', {
                buttons: false,
                timer: 1500
            });
        }
    }
</script>
