<div class="row" style="padding-top: 1.2em; margin-bottom: 0; padding-left: 1.5em; padding-right: 1.5em;">
    <div class="col s12">
        <div class="valign-wrapper" style="display: flex; justify-content:space-between;">
            <div onclick="closeModalShowSubjob()">
                <span style="margin-right: 0.7em;"><img src="<?= base_url(); ?>/assets/images/backbtn.png" width="15" height="10" alt=""></span>
                <span style="color: #44a3f7">Back</span>
            </div>
            <div>
                <span><i class="fas fa-ellipsis-h"></i></span>
            </div>
        </div>
    </div>
</div>

<div class="row" style="padding: 0; margin-top: 0; padding-left: 1.5em; padding-right: 1.5em; margin-bottom: 0;">
    <div class="col s12">
        <div class="valign-wrapper" style="display: flex; justify-content:space-between;">
            <div>
                <p class="subjobTitle" style="transition: ease 1s; font-family: var(--sfpd-bold) !important; color: black; margin-top: 18px; margin-bottom: 5px; font-size: 1.5em; text-transform: capitalize;"><?= $data['subjob']; ?></p>
            </div>
            <div>
                <p class="titleTitle" style="font-size: 0.9em; text-transform: uppercase; color: #919191; font-family: var(--sfpd-semibold); margin-bottom: 5px;"><?= $data['title']; ?></p>
            </div>
        </div>
    </div>
</div>
<div class="row" style="padding: 0; margin-top: 0; padding-left: 1.5em; padding-right: 1.5em;">
    <div class="col s12">
        <div class="valign-wrapper" style="display: flex; justify-content:space-between;">
            <div>
                <p class="deadlineTitle" style="transition: ease 1s; margin: 0; color: #919191; font-family: var(--sfpd-semibold);"><?= $data['deadlineView']; ?></p>
            </div>
            <div>
                <p class="actionTitle" style="transition: ease 1s; font-size: 0.7em; text-transform: uppercase; color: #70c0f8; font-family: var(--sfpd-regular);"><?= $data['statusButton']; ?></p>
            </div>
        </div>
    </div>
</div>

<div class="row valign-wrapper" style="padding-left: 1.3em; padding-right: 1.3em; margin-bottom: 0.5em;">
    <div class="col s12 m6 offset-m3">
        <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none;">
            <div class="card-content" style="padding: 1.4em 1.5em; margin: 0;">
                <div style="display: flex; justify-content: space-between;">
                    <div class="valign-wrapper">
                        <img src="<?= base_url(); ?>/assets/images/co-admin.png" width="20" height="20" alt=""> <span style="margin-left: 0.7em; color: #6a6a6a; font-size: 1.1em; font-family: var(--sfpd-medium);">Aproval</span>
                    </div>
                    <div class="valign-wrapper targetApprovalName" style="text-align: right;">
                        <span class="targetCoadmin" style="color: #f4af3e; margin-right: 0.5em; font-size: 0.9em; font-family: var(--sfpd-light);"><?= $data['approval']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row valign-wrapper" style="padding-left: 1.3em; padding-right: 1.3em; margin-bottom: 0.5em;">
    <div class="col s12 m6 offset-m3">
        <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none;">
            <div class="card-content" style="padding: 1.4em 1.5em; margin: 0;">
                <div style="display: flex; justify-content: space-between;">
                    <div class="valign-wrapper">
                        <img src="<?= base_url(); ?>/assets/images/assessor.png" width="20" height="20" alt=""> <span style="margin-left: 0.7em; color: #6a6a6a; font-size: 1.1em; font-family: var(--sfpd-medium);">Co-Assessor</span>
                    </div>
                    <div class="valign-wrapper targetAssessorName" style="text-align: right;">
                        <p class="coassessorField" style="font-family: var(--sfpd-light); color: #f4af3e; font-size: 0.9em;"><?= ($data['assessor'] != '') ? $data['assessor'] : 'None'  ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row valign-wrapper divReviseNote" style="padding-left: 1.3em; padding-right: 1.3em; margin-bottom: 0.5em; display: none;">
    <div class="col s12 m6 offset-m3">
        <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none;">
            <div class="card-content" style="padding: 0.3em 0.4em; margin: 0;">
                <ul class="collapsible collapseRevisionNote" style="box-shadow: none; border: none; margin: 0;">
                    <li>
                        <div class="collapsible-header" style="border: none !important; display: flex; justify-content: space-between;">
                            <div class="valign-wrapper">
                                <span style="margin-left: 0; color: red; font-family: var(--sfpd-medium);">Revision Notes</span>
                            </div>
                            <div class="valign-wrapper" style="text-align: right;">
                                <div>
                                    <img class="arrowReviseNote" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="collapsible-body collapseDetailSubjob">
                            <div class="row" style="margin-bottom: 1em; padding: 0 1em;">
                                <p class="targetReviseNote" style="font-family: 'Quicksand', sans-serif; color: #919191; font-family: var(--sfpd-regular); font-size: 0.9em;"><?= '-  ' . $row->purpose; ?></p>
                            </div>
                            <div class="borderBottomFull"></div>
                            <div class="row" style="margin-bottom: 0; margin-top: 1em;">
                                <div class="col s12" style="padding: 0; margin: 0;">
                                    <div class="targetImgReport" style="padding: 0 1em;">
                                        <table>
                                            <tbody class="targetBodyReviseImage">
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
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row" style="padding-left: 1.3em; padding-right: 1.3em; margin-bottom: 0.5em;">
    <div class="col s12">
        <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none;">
            <div class="card-content" style="padding: 1.4em 1.5em; margin: 0;">
                <p style="font-family: var(--sfpd-medium); color: black; margin-bottom: 10px; font-size: 0.95em; text-transform: capitalize;">Purpose</p>
                <p class="targetPurpose" style="font-family: var(--sfpd-regular); color: #919191; font-size: 0.8em;"><?= $data['purpose']; ?></p>
            </div>
        </div>
    </div>
</div>

<div class="row valign-wrapper" style="padding-left: 1.3em; padding-right: 1.3em; margin-bottom: 0.5em;">
    <div class="col s12 m6 offset-m3">
        <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none;">
            <div class="card-content" style="padding: 0.5em 0.4em; margin: 0;">
                <ul class="collapsible collapImageSubjob" id="collapImageSubjob" style="box-shadow: none; border: none; margin: 0;">
                    <li>
                        <div class="collapsible-header" style="border: none !important; display: flex; justify-content: space-between; padding-bottom: 0.5em;">
                            <div class="valign-wrapper">
                                <img src="<?= base_url(); ?>/assets/images/remind.png" width="25" height="25" alt=""> <span style="margin-left: 1.4em; color: #6a6a6a; font-family: var(--sfpd-medium);">Image Gallery</span>
                            </div>
                            <div class="valign-wrapper" style="text-align: right;">
                                <span class="selectedImageSubjob" style="color: #d9d8d9; margin-right: 0.5em; font-size: 1em;"></span>
                                <div class="arrowImageSubjob">
                                    <img class="arrowDown" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="collapsible-body collapseImageSubjob">
                            <div>
                                <?php
                                if ($data['image'] != '-') {
                                    for ($i = 0; $i < count($data['image']); $i++) {
                                        $source = base_url() . $data['image'][$i];
                                        $click = "'" . $data['image'][$i] . "'";

                                ?>
                                        <span class="deleteImgBtn" onclick="deleteImg()" hidden><img src="<?= base_url(); ?>/assets/images/stopbtn.png" width="17" height="17"></span>
                                        <img class="stylingImage" onclick="showImage(<?= $data['jobId'] . ',' . $click; ?>)" id="" src="<?= $source; ?>" widht="50" height="50" style="transition: ease 1s;">
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </li>
                    <div class="borderBottom"></div>
                </ul>
                <ul class="collapsible collapCrewSubjob" style="box-shadow: none; border: none; margin: 0;">
                    <li>
                        <div class="collapsible-header" style="border: none !important; display: flex; justify-content: space-between; padding-bottom: 0.5em;">
                            <div class="valign-wrapper">
                                <img src="<?= base_url(); ?>/assets/images/crew.png" width="25" height="25" alt=""> <span style="margin-left: 1.4em; color: #6a6a6a; font-family: var(--sfpd-medium);">Crew</span>
                            </div>
                            <div class="valign-wrapper" style="text-align: right;">
                                <span class="selectedCrewSubjob" style="color: #d9d8d9; margin-right: 0.5em; font-size: 1em;"><?= count($selectedCrew); ?></span>
                                <div>
                                    <img class="arrowCrewSubjob" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="collapsible-body collapseCrewSubjob">
                            <table class="tableCrewSubjob" hidden>
                                <tbody class="targetCrewSubjob">
                                    <?php for ($c = 0; $c < count($data['crew']); $c++) { ?>
                                        <tr style="border: none;">
                                            <?php if ($data['crew'][$c]['status'] == 1) { ?>
                                                <td style="width: 2.7em; color: #ffd700; font-size: 0.9em; padding: 0;"><i class="fas fa-star"></i></td>
                                            <?php } else { ?>
                                                <td style="width: 2.7em; color: #ffd700; font-size: 0.9em; padding: 0;"></td>
                                            <?php } ?>
                                            <td style="color: #919191; font-size: 0.9em; font-family: var(--sfpd-regular);"><?= $data['crew'][$c]['name']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </li>
                    <div class="borderBottom"></div>
                </ul>
                <ul class="collapsible collapRemindSubjob" id="collapRemindSubjob" style="box-shadow: none; border: none; margin: 0;">
                    <li>
                        <div class="collapsible-header" style="border: none !important; display: flex; justify-content: space-between;">
                            <div class="valign-wrapper">
                                <img src="<?= base_url(); ?>/assets/images/remind.png" width="25" height="25" alt=""> <span style="margin-left: 1.4em; color: #6a6a6a; font-family: var(--sfpd-medium);">Reminded Peers</span>
                            </div>
                            <div class="valign-wrapper" style="text-align: right;">
                                <?php if ($remindName != 0) { ?>
                                    <span class="selectedRemindSubjob" style="color: #d9d8d9; margin-right: 0.5em; font-size: 1em; font-family: var(--sfpd-light);"><?= count($remindName); ?></span>
                                <?php } else { ?>
                                    <span class="selectedRemindSubjob" style="color: #d9d8d9; margin-right: 0.5em; font-size: 1em; font-family: var(--sfpd-light);">0</span>
                                <?php } ?>
                                <div id="arrowRemindSubjob">
                                    <img class="arrowRemindSubjob" style="transition: ease 1s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="collapsible-body collapseCrewSubjob">
                            <?php if ($remindName != 0) { ?>
                                <table class="tableRemindSubjob" hidden>
                                    <tbody class="targetRemindSubjob">

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

<div class="row valign-wrapper" style="padding-left: 1.3em; padding-right: 1.3em; margin-bottom: 0.5em;">
    <div class="col s12 m6 offset-m3">
        <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none;">
            <div class="card-content" style="padding: 0.5em 0.4em; margin: 0;">
                <ul class="collapsible collapseReportHistoryUser" id="collapseReportHistoryUser" style="box-shadow: none; border: none; margin: 0;">
                    <li>
                        <div class="collapsible-header" style="border: none !important; display: flex; justify-content: space-between; padding-bottom: 0.5em;">
                            <div class="valign-wrapper">
                                <img src="<?= base_url(); ?>/assets/images/reporthistory.png" width="25" height="25" alt=""> <span style="margin-left: 1.4em; color: #6a6a6a; font-family: var(--sfpd-medium);">Report History</span>
                            </div>
                            <div class="valign-wrapper" style="text-align: right;">
                                <span class="spanReportHistoryUser" style="color: #d9d8d9; margin-right: 0.5em; font-size:0.8em;"></span>
                                <div id="arrowReportHistoryUser">
                                    <img class="arrowReportHistoryUser" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="collapsible-body collapseBodyReportHistoryUser">
                            <table>
                                <tbody class="targetReportHistoryUser"></tbody>
                            </table>
                        </div>
                    </li>
                    <div class="borderBottom"></div>
                </ul>
                <ul class="collapsible collapseOverduesHistoryUser" style="box-shadow: none; border: none; margin: 0;">
                    <li>
                        <div class="collapsible-header" style="border: none !important; display: flex; justify-content: space-between; padding-bottom: 0.5em;">
                            <div class="valign-wrapper">
                                <img src="<?= base_url(); ?>/assets/images/overduered.png" width="25" height="25" alt=""> <span style="margin-left: 1.4em; color: #6a6a6a; font-family: var(--sfpd-medium);">Overdues</span>
                            </div>
                            <div class="valign-wrapper" style="text-align: right;">
                                <span class="spanOverduesHistoryUser" style="color: #d9d8d9; margin-right: 0.5em; font-size: 0.8em;"></span>
                                <div id="arrowOverduesHistoryUser">
                                    <img class="arrowOverduesHistoryUser" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="collapsible-body collpaseBodyOverduesHistoryUser targetOverduesHistoryUser">

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row valign-wrapper reportButton" style="padding-left: 1.3em; padding-right: 1.3em; margin-bottom: 0.5em;">
    <div class="col s12 m6 offset-m3">
        <div class="card cardReportDone" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; background-color: #3fa2f8;">
            <div class="card-content" style="padding: 0 0.6em; margin: 0;">
                <ul class="collapsible collapseReportDone" style="width: 100%; border-radius: 1.3em; background-color: #3fa2f8; color: #fff; box-shadow: none; border: none; margin: 0;">
                    <li>
                        <div class="collapsible-header collapseHeaderReportDone" style="border: none !important; border-radius: 1.3em; display: flex; justify-content: space-between; background-color: #3fa2f8; padding: 0.8em 1rem;">
                            <div class="valign-wrapper ">
                                <div class="iconReportDone">
                                    <img src="<?= base_url(); ?>/assets/images/reportdone1.png" width="25" height="25" alt="">
                                </div>
                                <div>
                                    <span class="reportDoneTitle" style="margin-left: 1.4em; color: #fff; font-family: var(--sfpd-medium);">Report as Done</span>
                                </div>
                            </div>
                            <div class="valign-wrapper" style="text-align: right;">
                                <div class="arrowReportDone">
                                    <img class="reportDoneArrow" style="-webkit-transition: -webkit-transform .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="collapsible-body collapseDetailReportDone">
                            <div class="row" style="margin-bottom: 0;">
                                <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; background-color: #fff;">
                                    <div class="card-content" style="padding: 0; margin: 0;">
                                        <div>
                                            <textarea class="textareaField notesReportDone" name="notesReportDone" id="" rows="4" placeholder="Add Notes"></textarea>
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
                                                    <p style="color: #40a1f8; font-size: 0.8em;" class="spanEditImageDone" hidden>Edit</p>
                                                </div>
                                            </div>
                                            <div class="targetImgReportDone">

                                            </div>
                                            <form action="" id="uploadFileReportDone" enctype="multipart/form-data">
                                                <label data-trigg="fileUploadReportDone" for="fileUploadReportDone">Add image...</label>
                                                <input type="file" id="fileUploadReportDone" class="fileUploadReportDone" multiple name="fileUploadReportDone[]" accept="image/x-png,image/gif,image/jpeg,image/jpg" placeholder="Job Title" onchange="saveUploadReportDone(this)">
                                                <input type="text" class="idJobGroup1" name="idJobGroupReportDone" style="display: none;" value="<?= $idJob; ?>">
                                                <input type="text" class="idSubjob1" name="idSubjobReportDone" style="display: none;" value="<?= $idSubjob; ?>">
                                                <input type="hidden" class="imageHelperDone" name="imageHelperDone">
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row valign-wrapper" style="margin-bottom: 0; margin-top: 0.8em;">
                                <div class="col s12 m6 offset-m3" onclick="confirmReportasDone(<?= $idSubjob; ?>)" style="padding: 0; margin: 0">
                                    <div class="reportDoneButton center">
                                        <span style="margin-left: 0.7em; font-size: 0.8em; color: #fff; font-family: 'Quicksand', sans-serif; font-weight: 600;">Report as Done</span>
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

<div class="row valign-wrapper overdueButton" style="padding-left: 1.3em; padding-right: 1.3em; margin-bottom: 0.5em;">
    <div class="col s12 m6 offset-m3">
        <div class="card cardRevise " style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; background-color: #db3b25;">
            <div class="card-content" style="padding: 0 0.6em; margin: 0;">
                <ul class="collapsible collapseRequestOverdue" id="collapseRequestOverdue" style="width: 100%; border-radius: 1.3em; background-color: #db3b25; color: #fff; box-shadow: none; border: none; margin: 0;">
                    <li>
                        <div class="collapsible-header collapseHeaderRequestOverdue" style="border: none !important; border-radius: 1.3em; display: flex; justify-content: space-between; background-color: #db3b25; padding: 0.8em 1rem;">
                            <div class="valign-wrapper ">
                                <div class="iconRequest">
                                    <img src="<?= base_url(); ?>/assets/images/nooverdues.png" width="25" height="25" alt="">
                                </div>
                                <div>
                                    <span class="requestTitle" style="margin-left: 1.4em; color: #fff;">Propose Overdue Deadline</span>
                                </div>
                            </div>
                            <div class="valign-wrapper" style="text-align: right;">
                                <div class="arrowRequestOverdue">
                                    <img class="requestArrow" style="-webkit-transition: -webkit-transform .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="collapsible-body collapseDetailReq">
                            <div class="row" style="margin-bottom: 0;">
                                <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; background-color: #fff;">
                                    <div class="card-content" style="padding: 0; margin: 0;">
                                        <div>
                                            <textarea class="textareaField notesRequest" name="notesRequest" id="" rows="4" placeholder="Add Notes"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin-bottom: 0;">
                                <div class="col s12" style="padding: 0; margin: 0;">
                                    <div class="card" style="padding-bottom: 0; border-radius: 1.3em; box-shadow: none; background-color: #f2f1f6;">
                                        <div class="card-content" style="padding: 1em 1.5em; margin: 0;">
                                            <ul class="collapsible collapseDeadlineDateRequestt">
                                                <li>
                                                    <div class="collapsible-header collapseHeaderImageGallery valign-wrapper">
                                                        <div>
                                                            <p class="pReviseDate">New Deadline Date</p>
                                                        </div>
                                                        <div class="valign-wrapper">
                                                            <span class="spanDeadlineDateRequest" style="font-size: 0.8em; color: #e2e2e2; margin-right: 0.6em;">None</span>
                                                            <div data-key="default" class="arrowDeadlineDateRequest">
                                                                <img id="arrowDeadlineDateRequest" style="-webkit-transition: -webkit-transform .5s;" src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="collapsible-body collapseBodyImageGallery">
                                                        <div class="row">
                                                            <div class="col s9" style="padding-left: 0; padding-right: 0.4em; margin: 0;">
                                                                <div id="calendarRequest"></div>
                                                                <input type="text" hidden class="deadlineDateFieldRequest" name="deadlineDateFieldRequest">
                                                            </div>
                                                            <div class="col s3" style="padding: 0; margin: 0">
                                                                <div class="selectMonth">
                                                                    <p><?= date('F'); ?></p>
                                                                </div>
                                                                <div class="selectYear">
                                                                    <p><?= date('Y'); ?></p>
                                                                </div>
                                                                <div class="selectDay">
                                                                    <p onclick="changeDayRequest('todayRequest')" id="todayRequest" class="activeDay">Today</p>
                                                                    <p onclick="changeDayRequest('tomorrowRequest')" id="tomorrowRequest">Tomorrow</p>
                                                                    <p onclick="changeDayRequest('nextWeekRequest')" id="nextWeekRequest">Next week</p>
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
                                            <ul class="collapsible collapseDeadlineHourRequest">
                                                <li>
                                                    <div class="collapsible-header collapseHeaderImageGallery valign-wrapper">
                                                        <div>
                                                            <p class="pReviseTime">New Deadline Time</p>
                                                        </div>
                                                        <div class="valign-wrapper">
                                                            <span class="spanDeadlineHourRequest" style="font-size: 0.8em; color: #e2e2e2; margin-right: 0.6em;">None</span>
                                                            <div data-key="default" class="arrowDeadlineHourRequest">
                                                                <img src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="collapsible-body collapseBodyImageGallery">
                                                        <div class="valign-wrapper" style="display: flex; justify-content: space-between">
                                                            <div style="display: flex; justify-content: space-between; margin-left: 4.5em; margin-right: 10px;" class="right">
                                                                <div>
                                                                    <input type="text" class="inputHourRequest" name="inputHourRequest" oninput="changeSlider()">
                                                                </div>
                                                                <div style="border-left: 1px solid var(--white-lilac); height: 1.9em;">
                                                                    <input type="text" class="inputMinutesRequest" name="inputMinutesRequest" oninput="changeSlider()">
                                                                </div>
                                                            </div>
                                                            <div class="sliderParentRequest">
                                                                <img src="<?= base_url(); ?>/assets/images/morning.png" width="9" height="7" alt="" style="vertical-align: text-top; margin-right: 1.2em; margin-top: 2px;">
                                                                <img src="<?= base_url(); ?>/assets/images/daylight.png" width="8" height="8" alt="" style="vertical-align: text-top; margin-right: 2.4em; margin-top: 2px; ">
                                                                <img src="<?= base_url(); ?>/assets/images/afternoon.png" width="7" height="7" alt="" style="vertical-align: text-top; margin-top: 2px; ">
                                                                <div style="width: 5.5em; bottom: 0.3em; text-align: center; margin-left: 0.2em;" id="sliderRequest">
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
                                                    <p style="color: #40a1f8; font-size: 0.8em;" class="spanEditImageRequest" hidden>Edit</p>
                                                </div>
                                            </div>
                                            <div class="targetImgRevise">

                                            </div>
                                            <form action="" id="uploadFileRequest" enctype="multipart/form-data">
                                                <label data-trigg="fileUploadRevise" for="fileUploadRevise">Add image...</label>
                                                <input type="file" id="fileUploadRevise" class="fileUploadRequest" multiple name="fileUploadRequest[]" accept="image/x-png,image/gif,image/jpeg,image/jpg" placeholder="Job Title" onchange="saveUploadRequest(this)">
                                                <input type="text" class="idJobGroup1" name="idJobGroupRequest" style="display: none;" value="<?= $idJob; ?>">
                                                <input type="text" class="idSubjob1" name="idSubjobRequest" style="display: none;" value="<?= $idSubjob; ?>">
                                                <input type="text" hidden style="display: none;" class="imageHelperRequest" name="imageHelperRequest">
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row valign-wrapper" style="margin-bottom: 0; margin-top: 0.8em;">
                                <div class="col s12 m6 offset-m3" onclick="requestOverdue(<?= $idSubjob; ?>)" style="padding: 0; margin: 0">
                                    <div class="requestOverdue center">
                                        <span style="margin-left: 0.7em; font-size: 0.8em; color: #fff; font-family: 'Quicksand', sans-serif; font-weight: 600;">Propose Overdue Deadline</span>
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

<div class="row valign-wrapper waitingAssessmentButton" style="padding-left: 1.3em; padding-right: 1.3em; margin-bottom: 0.5em;">
    <div class="col s12 m6 offset-m3">
        <div class="card" style="padding: 0.9em; border-radius: 1.3em; box-shadow: none; background-color: #d7d6db;">
            <div class="card-content" style="padding: 0 0.6em; margin: 0;;">
                <div class="valign-wrapper">
                    <img src="<?= base_url(); ?>/assets/images/waitingRevision.png" width="25" height="25" alt=""> <span class="spanWaiting" style="margin-left: 1.4em; color: #fff;">Waiting Assessment</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row valign-wrapper preloaderTemplate" style="padding-left: 1.3em; padding-right: 1.3em; margin-bottom: 0.5em; display: block;">
    <div class="col s12 m6 offset-m3" style="text-align: center;">
        <div class="preloader-wrapper big active" style="width: 34px; height: 34px;">
            <div class="spinner-layer spinner-blue-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modalShowImageee" class="modal">
    <div class="modal-content">
        <div class="targetShowImage"></div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var sliderRequest = document.getElementById('sliderRequest');

        noUiSlider.create(sliderRequest, {
            start: [9],
            connect: 'lower',
            step: 0.5,
            range: {
                'min': [9],
                'max': [17]
            }
        });

        sliderRequest.noUiSlider.on('slide', function() {
            var today = new Date();
            var hourToday = today.getHours();
            var minutesToday = addZero(today.getMinutes());
            var y = today.getFullYear();
            var m = addZero((today.getMonth() + 1));
            var d = today.getDate();

            var newDate = y + '-' + m + '-' + d;

            var deadlineDateInput = $('.deadlineDateFieldRequest').val();

            var sliderValue = sliderRequest.noUiSlider.get();

            validationSlider(sliderValue, deadlineDateInput, 'sliderRequest', 'inputHourRequest', 'inputMinutesRequest', 'spanDeadlineHourRequest');
            return false;
        })

        $('.collapCrewSubjob').collapsible({
            onOpenStart: function() {
                $('.tableCrewSubjob').removeAttr('hidden');
                $('.arrowCrewSubjob').addClass('rtr');
            },
            onCloseStart: function() {
                $('.arrowCrewSubjob').removeClass('rtr');
            },
            onCloseEnd: function() {
                $('.tableCrewSubjob').prop('hidden', true);
            }
        });

        $('.collapseReportDone').collapsible({
            onOpenStart: function() {
                $('.collapseReportDone').css({
                    "background-color": "#fff"
                });
                $('.cardReportDone').css({
                    "background-color": "#fff"
                });
                $('.collapseHeaderReportDone').css({
                    "background-color": "#fff"
                });
                $('.reportDoneTitle').css({
                    "color": "#3fa2f8"
                });
                var imgSource = '<?= base_url(); ?>/assets/images/reportdone.png';
                $('.iconReportDone').html('<img src="' + imgSource + '" width="25" height="25">');

                $('.reportDoneArrow').addClass('rtr');
            },
            onCloseEnd: function() {
                $('.collapseReportDone').css({
                    "background-color": "#3fa2f8"
                });
                $('div[class="collapsible-header collapseHeaderReportDone"]').css({
                    "background-color": "#3fa2f8"
                });
                $('.cardReportDone').css({
                    "background-color": "#3fa2f8"
                });
                $('ul[class="collapsible collapseReportDone"]').css({
                    "background-color": "#3fa2f8"
                });

                $('.reportDoneArrow').removeClass('rtr');

                var imgSource = '<?= base_url(); ?>/assets/images/reportdone1.png';
                $('.iconReportDone').html('<img src="' + imgSource + '" width="25" height="25">');

                $('.reportDoneTitle').css({
                    "color": "#fff"
                });

            }
        });

        $('.collapseRequestOverdue').collapsible({
            onOpenStart: function() {
                $('.collapseRequestOverdue').css({
                    "background-color": "#fff"
                });
                $('.cardRevise').css({
                    "background-color": "#fff"
                });
                $('.collapseHeaderRequestOverdue').css({
                    "background-color": "#fff"
                });
                $('.requestTitle').css({
                    "color": "red"
                });
                var imgSource = '<?= base_url(); ?>/assets/images/overduered.png';
                $('.iconRequest').html('<img src="' + imgSource + '" width="25" height="25">');

                $('.requestArrow').addClass('rtr');
            },
            onCloseEnd: function() {
                $('.collapseRequestOverdue').css({
                    "background-color": "#db3b25"
                });
                $('div[class="collapsible-header collapseHeaderRequestOverdue"]').css({
                    "background-color": "#db3b25"
                });
                $('.cardRevise').css({
                    "background-color": "#db3b25"
                });
                $('ul[class="collapsible collapseRevise"]').css({
                    "background-color": "#db3b25"
                });

                $('.requestArrow').removeClass('rtr');

                var imgSource = '<?= base_url(); ?>/assets/images/nooverdues.png';
                $('.iconRequest').html('<img src="' + imgSource + '" width="25" height="25">');

                $('.requestTitle').css({
                    "color": "#fff"
                });

            }
        });

        $('.collapseRevisionNote').collapsible({
            onOpenStart: function() {
                $('.arrowReviseNote').addClass('rtr');
            },
            onCloseStart: function() {
                $('.arrowReviseNote').removeClass('rtr');
            }
        })

        $('.collapRemindSubjob').collapsible({
            onOpenStart: function() {
                $('.tableRemindSubjob').removeAttr('hidden');
                $('.arrowRemindSubjob').addClass('rtr');
            },
            onCloseStart: function() {
                $('.arrowRemindSubjob').removeClass('rtr');
            },
            onCloseEnd: function() {
                $('.tableRemindSubjob').prop('hidden', true);
            }
        });
        $('.collapImageSubjob').collapsible({
            onOpenStart: function() {
                $('.tableImageSubjob').removeAttr('hidden');
                var img = '<img src="<?= base_url(); ?>/assets/images/uparrow.png" width="15" height="15" alt="">';
                $('.arrowDown').addClass('rtr');

            },
            onCloseStart: function() {
                $('.tableImageSubjob').prop('hidden', true);
                $('.arrowDown').removeClass('rtr');
            }
        })

        $('.collapseReportHistoryUser').collapsible({
            onOpenStart: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/uparrow.png" width="15" height="15" alt="">';
                $('.arrowReportHistoryUser').addClass('rtr');

            },
            onCloseStart: function() {
                $('.arrowReportHistoryUser').removeClass('rtr');
            }
        })

        $('.collapseOverduesHistoryUser').collapsible({
            onOpenStart: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/uparrow.png" width="15" height="15" alt="">';
                $('.arrowOverduesHistoryUser').addClass('rtr');

            },
            onCloseStart: function() {
                $('.arrowOverduesHistoryUser').removeClass('rtr');
            }
        })

        $('.arrowDeadlineDateRequest').click(function(e) {
            e.preventDefault();
            var deadlineDateRequestVal = $('.deadlineDateFieldRequest').val();

            if (deadlineDateRequestVal == '') {
                collapseDeadlineRequest();
            } else {
                //clear field
                $('.deadlineDateFieldRequest').val('');

                //clear span
                $('.spanDeadlineDateRequest').text('None');
                $('.spanDeadlineDateRequest').css({
                    "color": "#e2e2e2"
                });

                $('.collapseDeadlineDateRequestt').collapsible('close');

                //change button toggle
                var img = '<img src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">';
                $('.arrowDeadlineDateRequest').html(img);
            }

        })

        $('.arrowDeadlineHourRequest').click(function(e) {
            e.preventDefault();

            var hour = $('.inputHourRequest').val();
            var minutes = $('.inputMinutesRequest').val();

            if (hour == '' && minutes == '') {
                collapseDeadlineTimeRequest();
            } else {
                //clear field
                $('.inputHourRequest').val('');
                $('.inputMinutesRequest').val('');

                //clear span
                $('.spanDeadlineHourRequest').text('None');
                $('.spanDeadlineHourRequest').css({
                    "color": "#e2e2e2"
                });

                $('.collapseDeadlineHourRequest').collapsible('close');

                //change button toggle
                var img = '<img src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">';
                $('.arrowDeadlineHourRequest').html(img);
            }
        })

        $('#calendarRequest').simpleCalendar({
            displayYear: false, // Display year in header
            fixedStartDay: true, // Week begin always by monday or by day set by number 0 = sunday, 7 = saturday, false = month always begin by first day of the month
            displayEvent: false, // Display existing event
            disableEventDetails: false, // disable showing event details
            disableEmptyDetails: false,

        });

        $('.day').click(function(e) {
            e.preventDefault();
            var data = $(this).attr('data-date');

            var check = checkDeadlineDate(data, 'inputMinutesRequest', 'inputHourRequest', 'deadlineDateFieldRequest', 'sliderRequest', 'spanDeadlineHourRequest');

            if (check != 'error') {

                // highlight date
                $('.day').removeClass('today');
                $('div[data-date="' + data + '"]').attr('class', 'day today');

                //change span deadline
                var today = $('.today').attr('data-date').substring(0, 10);

                var getRealDate = new Date(today).getTime() + (1 * 24 * 60 * 60 * 1000);
                var y = new Date(getRealDate).getFullYear();
                var m = addZero(new Date(getRealDate).getMonth() + 1);
                var d = addZero(new Date(getRealDate).getDate());

                var span = convertMonth(new Date(getRealDate).getMonth());

                $('.spanDeadlineDateRequest').text(d + ' ' + span);
                $('.spanDeadlineDateRequest').css({
                    "font-size": "0.9em",
                    "color": "#5f5e5e",
                    "margin-right": "0.6em"
                });


            }

        })

        // selectedCrew();
        // getApprovalCoadminPurpose();
        // getImageCrewRemind();
        // init_modal_showImage();
        // collapseDeadlineRequest();
        // collapseDeadlineTimeRequest();
        // getHistory();
        // getHeader();
        // getReviseNote();
    })

    // function changeDayRequest(trigger) {
    //     $('#todayRequest').removeAttr('class');
    //     $('#tomorrowRequest').removeAttr('class');
    //     $('#nextWeekRequest').removeAttr('class');

    //     $('#' + trigger).addClass('activeDay');
    //     var dateTime = '<?= date('Y-m-d' . 'T17:00:00.000Z'); ?>';

    //     if (trigger == 'todayRequest') {

    //         checkDeadlineDate('today', 'inputMinutesRequest', 'inputHourRequest', 'deadlineDateFieldRequest', 'sliderRequest', 'spanDeadlineHourRequest');

    //         //highlight date
    //         var showTime = '<?= date('Y-m-d', strtotime('-1 days', strtotime(date('Y-m-d')))); ?>';
    //         var field = '<?= date('Y-m-d'); ?>';
    //         var span = '<?= date('d M'); ?>';
    //         var newDateTime = showTime + 'T17:00:00.000Z';

    //         var timeHelper = getValidTime();
    //         $('.inputHourRequest').val(timeHelper[0].hour);
    //         $('.inputMinutesRequest').val(timeHelper[0].minutes);

    //         //set slider
    //         var slider = document.getElementById('sliderRequest');

    //         slider.noUiSlider.set(timeHelper[0].hour + '.' + timeHelper[0].slider);

    //         //set span
    //         $('.spanDeadlineHourRequest').text(timeHelper[0].hour + ':' + timeHelper[0].minutes)

    //     } else if (trigger == 'tomorrowRequest') {

    //         checkDeadlineDate('tomorrow', 'inputMinutesRequest', 'inputHourRequest', 'deadlineDateFieldRequest', 'sliderRequest', 'spanDeadlineHourRequest');

    //         var showTime = '<?= date('Y-m-d'); ?>';
    //         var field = '<?= date('Y-m-d', strtotime('+1 days', strtotime(date('Y-m-d')))); ?>';
    //         var span = '<?= date('d M', strtotime('+1 days', strtotime(date('d M')))); ?>';
    //         var newDateTime = showTime + 'T17:00:00.000Z';

    //     } else if (trigger == 'nextWeekRequest') {

    //         checkDeadlineDate('next week', 'inputMinutesRequest', 'inputHourRequest', 'deadlineDateFieldRequest', 'sliderRequest', 'spanDeadlineHourRequest');

    //         var showTime = '<?= date('Y-m-d', strtotime('+6 days', strtotime(date('Y-m-d')))); ?>';
    //         var field = '<?= date('Y-m-d', strtotime('+7 days', strtotime(date('Y-m-d')))); ?>';
    //         var span = '<?= date('d M', strtotime('+7 days', strtotime(date('d M')))); ?>';

    //         var newDateTime = showTime + 'T17:00:00.000Z';
    //     }

    //     var last = $('.today').attr('data-date');


    //     $('div[data-date="' + last + '"]').attr('class', 'day');
    //     $('div[data-date="' + newDateTime + '"]').attr('class', 'day today');
    //     $('.spanDeadlineDateRequest').text(span);
    //     $('.deadlineDateFieldRequest').val(field);
    // }

    // function changeSlider() {
    //     var sliderr = document.getElementById('sliderRequest');
    //     var hour = $('.inputHourRequest').val();
    //     var minutes = $('.inputMinutesRequest').val();

    //     var deadlineDate = $('.deadlineDateFieldRequest').val();

    //     var today = new Date();
    //     var y = today.getFullYear();
    //     var m = addZero(today.getMonth() + 1);
    //     var d = addZero(today.getDate());
    //     var newDate = y + '-' + m + '-' + d;

    //     var timeHelper = getValidTime();

    //     if (deadlineDate == '') {

    //         slModal('failed', 'You cannot change time before you select the date', 'warning', {
    //             buttons: true,
    //             confrim: true
    //         })

    //         $('.inputHourRequest').val(timeHelper[0].hour);
    //         $('.inputMinutesRequest').val(timeHelper[0].minutes);

    //     } else {

    //         if (hour.length > 1) {

    //             validationTime('inputHourRequest', 'inputMinutesRequest', hour, minutes, 'sliderRequest', 'spanDeadlineHourRequest', deadlineDate);

    //         }

    //     }

    // }



    // function convertMonth(data) {
    //     var month = new Array();
    //     month[0] = "Jan";
    //     month[1] = "Feb";
    //     month[2] = "Mar";
    //     month[3] = "Apr";
    //     month[4] = "May";
    //     month[5] = "Jun";
    //     month[6] = "Jul";
    //     month[7] = "Aug";
    //     month[8] = "Sep";
    //     month[9] = "Oct";
    //     month[10] = "Nov";
    //     month[11] = "Dec";
    //     var n = month[data];

    //     return n;
    // }

    // function collapseDeadlineRequest() {
    //     $('.collapseDeadlineDateRequestt').collapsible({
    //         onOpenEnd: function() {
    //             //change the toggle button
    //             var img = '<img id="arrowDeadlineDateRequest" src="<?= base_url(); ?>/assets/images/toggleactive.png" width="35" height="20" alt="">';
    //             $('.arrowDeadlineDateRequest').html('');
    //             $('.arrowDeadlineDateRequest').html(img);

    //             //change span and hidden input
    //             var today = $('.today').attr('data-date').substring(0, 10);

    //             var getRealDate = new Date(today).getTime() + (1 * 24 * 60 * 60 * 1000);
    //             var y = new Date(getRealDate).getFullYear();
    //             var m = addZero(new Date(getRealDate).getMonth() + 1);
    //             var d = addZero(new Date(getRealDate).getDate());

    //             var selectDate = y + '-' + m + '-' + d;
    //             var span = convertMonth(new Date(getRealDate).getMonth());

    //             $('.spanDeadlineDateRequest').text(d + ' ' + span);
    //             $('.deadlineDateFieldRequest').val(selectDate);
    //             $('.spanDeadlineDateRequest').css({
    //                 "font-size": "0.9em",
    //                 "color": "#5f5e5e",
    //                 "margin-right": "0.6em"
    //             });

    //             //active day
    //             var showTime = '<?= date('Y-m-d', strtotime('-1 days', strtotime(date('Y-m-d')))); ?>';
    //             var field = '<?= date('Y-m-d'); ?>';
    //             var span = '<?= date('d M'); ?>';
    //             var newDateTime = showTime + 'T17:00:00.000Z';

    //             $('.day').removeClass('today');
    //             $('div[data-date="' + newDateTime + '"]').attr('class', 'day today');

    //             //change data key
    //             var deadlineVal = $('.deadlineDateFieldRequest').val();
    //             if (deadlineVal != '') {
    //                 $('.arrowDeadlineDateRequest').removeAttr('data-key');
    //                 $('.arrowDeadlineDateRequest').attr('data-key', 'active');
    //             }

    //             //open collapse deadline time
    //             $('.collapseDeadlineHourRequest').collapsible('open');

    //         },
    //         onCloseStart: function() {
    //             var img = '<img src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">';
    //             var imgActive = '<img src="<?= base_url(); ?>/assets/images/toggleactive.png" width="35" height="20" alt="">';

    //             var deadline = $('.deadlineDateFieldRequest').val();
    //             if (deadline != '' || deadline != null) {
    //                 $('.arrowDeadlineDateRequest').html(imgActive);
    //             } else {
    //                 $('.arrowDeadlineDateRequest').html(img);
    //             }
    //         }
    //     })
    // }

    // function collapseDeadlineTimeRequest() {
    //     $('.collapseDeadlineHourRequest').collapsible({
    //         onOpenEnd: function() {
    //             var img = '<img src="<?= base_url(); ?>/assets/images/toggleactive.png" width="35" height="20" alt="">';
    //             $('.arrowDeadlineHourRequest').html('');
    //             $('.arrowDeadlineHourRequest').html(img);

    //             var newTime = getValidTime();

    //             //initialize slider
    //             var newSlider = document.getElementById('sliderRequest');

    //             newSlider.noUiSlider.set(newTime[0].hour + '.' + newTime[0].slider);

    //             $('.inputHourRequest').val(newTime[0].hour);
    //             $('.inputMinutesRequest').val(newTime[0].minutes);

    //             $('.spanDeadlineHourRequest').text(newTime[0].hour + ':' + newTime[0].minutes);
    //             $('.spanDeadlineHourRequest').css({
    //                 "color": "#5d5e5e",
    //                 "font-weight": "400"
    //             })
    //             return false;

    //         },
    //         onCloseStart: function() {
    //             var img = '<img src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">';
    //             var imgActive = '<img src="<?= base_url(); ?>/assets/images/toggleactive.png" width="35" height="20" alt="">';

    //             var deadline = $('.deadlineDateFieldRequest').val();
    //             if (deadline != '' || deadline != null) {
    //                 $('.arrowDeadlineHourRequest').html(imgActive);
    //             } else {
    //                 $('.arrowDeadlineHourRequest').html(img);
    //             }
    //         }
    //     })
    // }

    // function selectedCrew() {
    //     var idJob = '<?= $idJob; ?>'

    //     $.ajax({
    //         type: 'POST',
    //         data: {
    //             idJob: idJob
    //         },
    //         url: '<?= base_url('jzl/MobileJob/selectedCrew'); ?>',
    //         dataType: 'json',
    //         success: function(result) {
    //             var tr = ''
    //             for (var i = 0; i < result.crewName.length; i++) {
    //                 if (result.leader == result.crewName[i]) {
    //                     var td = '<td style="width: 2.7em; color: #ffd700; font-size: 0.9em; padding: 0;"><i class="fas fa-star"></i></td>';
    //                 } else {
    //                     var td = '<td style="width: 2.7em; color: #ffd700; font-size: 0.9em; padding: 0;"></td>';

    //                 }

    //                 tr += '<tr style="border: none;">' +
    //                     td +
    //                     '<td style="color: #919191; font-weight: 400; font-size: 0.9em;">' + result.crewName[i] + '</td>' +
    //                     '</tr>';
    //             }

    //             $('.targetCrewSubjob').html(tr);
    //         }
    //     })
    // }

    // function getApprovalCoadminPurpose() {
    //     var idSubjob = '<?= $idSubjob; ?>';

    //     $.ajax({
    //         type: 'POST',
    //         data: {
    //             idSubjob: idSubjob
    //         },
    //         url: '<?= base_url('jzl/MobileJobUser/getApprovalCoadminPurpose'); ?>',
    //         dataType: 'json',
    //         success: function(result) {
    //             if (result.admin == 0 && result.coadmin == 0) {
    //                 var appr = 'None';
    //             } else if (result.coadmin != '') {
    //                 var appr = result.admin + ', then ' + result.coadmin;
    //             } else if (result.coadmin == '') {
    //                 var appr = result.admin;
    //             }

    //             if (result.assessor == 0) {
    //                 var assessor = 'None';
    //             } else {
    //                 var assessor = result.assessor;
    //             }
    //             var spanAppr = '<span class="targetCoadmin" style="color: #b1b1b0; margin-right: 0.5em; font-size: 0.9em; font-weight: 200; font-family: var(--sfpd-light);">' + appr + '</span>';
    //             var spanAssessor = '<span class="targetAssessor" style="color: #b1b1b0; margin-right: 0.5em; font-size: 0.9em;  font-family: var(--sfpd-light);">' + assessor + '</span>';
    //             $('.targetApprovalName').html(spanAppr);
    //             $('.targetAssessorName').html(spanAssessor);
    //             if (result.purpose != '') {
    //                 $('.targetPurpose').text(result.purpose);
    //             } else {
    //                 $('.targetPurpose').text('No purpose');
    //             }
    //         }
    //     })
    // }

    // function getHeader() {
    //     var idSubjob = '<?= $idSubjob; ?>';

    //     $.ajax({
    //         type: "POST",
    //         data: {
    //             idSubjob: idSubjob
    //         },
    //         url: '<?= base_url('jzl/MobileJobUser/getHeader'); ?>',
    //         dataType: 'json',
    //         success: function(result) {
    //             $('.subjobTitle').text(result.subjob);

    //             $('.titleTitle').text(result.title);

    //             if (result.deadlineDate != 0) {
    //                 $('.deadlineTitle').text(result.deadlineDate);

    //                 var split = result.defaultDate.split('-');
    //                 var splitHour = result.defaultHour.split(':');
    //                 var newDate = new Date(split[0], (split[1] - 1), split[2], splitHour[0], splitHour[1]);

    //                 // Get today's date and time
    //                 var today = new Date().getTime();


    //                 var distance = newDate.getTime();

    //                 var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    //                 var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    //                 var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    //                 var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    //                 if (result.status != 6) {
    //                     if (today >= distance) {
    //                         //overdue
    //                         $('.deadlineTitle').css({
    //                             "color": "red",
    //                             "font-weight": "600"
    //                         });

    //                         $('.actionTitle').text('overdue');
    //                         $('.actionTitle').css({
    //                             "color": "red",
    //                             "font-weight": "100"
    //                         });

    //                         // getOverdue();

    //                         $.ajax({
    //                             type: "POST",
    //                             data: {
    //                                 idSubjob: idSubjob
    //                             },
    //                             url: '<?= base_url('jzl/MobileJobUser/overdue'); ?>',
    //                             dataType: 'json',
    //                             success: function(result) {
    //                                 getButton();
    //                             }
    //                         })

    //                     } else {

    //                         $('.deadlineTitle').css({
    //                             "color": "#919191",
    //                             "font-weight": "600"
    //                         });
    //                         getButton();
    //                     }
    //                 } else {
    //                     $('.deadlineTitle').css({
    //                         "color": "#919191",
    //                         "font-weight": "600"
    //                     });
    //                     getButton();
    //                 }


    //             } else {
    //                 $('.subjobTitle').text(result.subjob);

    //                 $('.titleTitle').text(result.title);
    //                 getButton();
    //             }

    //         }
    //     })
    // }

    // function getReviseNote() {
    //     var idSubjob = '<?= $idSubjob; ?>';

    //     $.ajax({
    //         type: "POST",
    //         data: {
    //             idSubjob: idSubjob
    //         },
    //         url: '<?= base_url('jzl/MobileJobUser/getReviseNote'); ?>',
    //         dataType: 'json',
    //         success: function(result) {
    //             if (result.note != null && result.img != null) {
    //                 $('.divReviseNote').css({
    //                     "display": "block"
    //                 });

    //                 $('.targetReviseNote').text(result.note);
    //                 var tr = '';
    //                 for (var i = 0; i < result.img.length; i++) {
    //                     var click = "'" + result.img[i].img + "'";
    //                     var sourceImg = '<?= base_url(); ?>' + '/uploads/job/' + result.idJob + '/' + result.img[i].img;

    //                     tr += '<tr style="border: none;">' +
    //                         '<td style="padding: 0;"><img onclick="showImage(' + result.idJob + ', ' + click + ')" src="' + sourceImg + '" width="50" height="50"></td>' +
    //                         '<td style="display: block; padding: 0;">' +
    //                         '<p style="color: #919191;">' + result.img[i].desc + '</p>' +
    //                         '</td>' +
    //                         '</tr>';
    //                 }

    //                 $('.targetBodyReviseImage').html(tr);
    //             } else {
    //                 $('.divReviseNote').css({
    //                     "display": "none"
    //                 });
    //             }
    //         }
    //     })
    // }

    // function getHistory() {
    //     var idSubjob = '<?= $idSubjob; ?>';
    //     var idMaster = '<?= $_SESSION['id']; ?>';
    //     $.ajax({
    //         type: "POST",
    //         data: {
    //             idSubjob: idSubjob
    //         },
    //         url: "<?= base_url('jzl/MobileJobUser/getHistory'); ?>",
    //         dataType: 'json',
    //         success: function(result) {
    //             console.log(result);
    //             if (result.report == 0) {
    //                 // report history 
    //                 $('.spanReportHistoryUser').text('None Reported');
    //                 $('#arrowReportHistoryUser').html('');
    //                 $('#collapseReportHistoryUser').removeClass('collapsible');
    //                 $('#collapseReportHistoryUser').removeClass('collapseReportHistoryUser');
    //             } else {

    //                 if ($('#collapseReportHistoryUser').hasClass('collapseReportHistoryUser')) {

    //                 } else {
    //                     $('#collapseReportHistoryUser').addClass('collapsible');
    //                     $('#collapseReportHistoryUser').addClass('collapseReportHistoryUser');
    //                 }


    //                 var tr = '';
    //                 for (var i = 0; i < result.report.length; i++) {

    //                     if (result.report.length == (i + 1)) {
    //                         var info = '<td style="width: 9em; font-size: 0.8em; color: #bebfbf; font-weight: 700; padding: 1em;">Waiting Assessment</td>';
    //                     } else {
    //                         var info = '<td style="width: 9em; font-size: 0.8em; color: #bebfbf; font-weight: 700; padding: 1em;">Failed</td>';
    //                     }

    //                     tr += '<tr style="border:none;">' +
    //                         '<td style="width: 2em; font-size: 0.8em; color: #929292; font-weight: 700; padding: 1em;">' + (i + 1) + '</td>' +
    //                         info +
    //                         '<td class="targetReviseTime" style="font-size: 0.8em; color: #bebfbf; padding: 1em; width: 6em;">' + result.report[i] + '</td>' +
    //                         '</tr>';
    //                 }

    //                 $('.targetReportHistoryUser').html(tr);
    //             }


    //             if (result.dateReport1 == 0) {
    //                 //overdue history
    //                 $('.spanOverduesHistoryUser').text('No Overdue');
    //                 $('#arrowOverduesHistoryUser').html('');
    //             } else {
    //                 //report history
    //                 $('.spanOverduesHistoryUser').text(result.dateReport1.length + ' x (' + result.dateReport1 + ')');

    //                 var desc = '<div class="valign-wrapper" style="display: flex; justify-content: space-between; padding: 0 2em;">' +
    //                     '<div>' +
    //                     '<p style="font-size: 0.8em; color: red; font-weight: 800;">' + result.dateReport1 + '</p>' +
    //                     '</div>' +
    //                     '<div>' +
    //                     '<i style="font-size: 0.8em; color: red;" class="fas fa-arrow-right"></i>' +
    //                     '</div>' +
    //                     '<div>' +
    //                     '<p class="descOverdue" style="font-size: 0.8em; color: red; font-weight: 100;">' + result.dateReport2 + '</p>' +
    //                     '</div>' +
    //                     '</div>';

    //                 $('.targetOverduesHistoryUser').html(desc);

    //                 //add arrow
    //                 var img = '<img class="arrowOverduesHistoryUser" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">';
    //                 $('#arrowOverduesHistoryUser').html(img);
    //             }


    //             return false;
    //         }
    //     })
    // }

    // function getButton() {
    //     var idSubjob = '<?= $idSubjob; ?>';
    //     $.ajax({
    //         type: 'POST',
    //         data: {
    //             idSubjob: idSubjob
    //         },
    //         url: '<?= base_url('jzl/MobileJobUser/getButtonAction'); ?>',
    //         dataType: 'json',
    //         success: function(result) {
    //             console.log(result);

    //             if (result.statusJob == 'waiting') {

    //                 $('.preloaderTemplate').show();

    //                 setTimeout(function() {
    //                     $('.preloaderTemplate').hide();

    //                     $('.reportButton').hide();
    //                     $('.overdueButton').hide();
    //                     $('.waitingAssessmentButton').show();
    //                 }, 1000);


    //             } else if (result.statusJob == 'active' && result.deadlineStatus == 'overdue') {

    //                 $('.preloaderTemplate').show();

    //                 setTimeout(function() {
    //                     $('.preloaderTemplate').hide();

    //                     $('.reportButton').show();
    //                     $('.overdueButton').show();
    //                     $('.waitingAssessmentButton').hide();
    //                 }, 1000);

    //             } else if (result.statusJob == 'active' && result.deadlineStatus == 'on going') {

    //                 $('.preloaderTemplate').show();

    //                 setTimeout(function() {

    //                     $('.preloaderTemplate').hide();

    //                     $('.reportButton').show();
    //                     $('.overdueButton').show();
    //                     $('.waitingAssessmentButton').hide();

    //                     $('#collapseRequestOverdue').removeClass('collapseRequestOverdue');
    //                     $('#collapseRequestOverdue').removeClass('collapsible');
    //                     $('#collapseRequestOverdue').css({
    //                         "background": "#d6d6db"
    //                     });
    //                     $('.collapseHeaderRequestOverdue').css({
    //                         "background": "#d6d6db"
    //                     });
    //                     $('.cardRevise').css({
    //                         "background": "#d6d6db"
    //                     });

    //                 })

    //             } else if (result.statusJob == 'active overdue') {

    //                 $('.preloaderTemplate').show();

    //                 setTimeout(function() {

    //                     $('.preloaderTemplate').hide();

    //                     $('.reportButton').hide();
    //                     $('.overdueButton').show();
    //                     $('.waitingAssessmentButton').hide();

    //                 })

    //             } else if (result.statusJob == 'waiting assessment') {

    //                 $('.preloaderTemplate').show();
    //                 $('.reportButton').hide();
    //                 $('.overdueButton').hide();

    //                 setTimeout(function() {
    //                     $('.preloaderTemplate').hide();

    //                     $('.waitingAssessmentButton').show();
    //                     $('.spanWaiting').text('Waiting Approval');
    //                 }, 1000);

    //             }

    //             return false;

    //             if (result.statusJob == 'active not allowed') {

    //                 //hide request deadline button
    //                 $('.overdueButton').css({
    //                     "display": "none"
    //                 });

    //                 $('.reportButton').css({
    //                     "display": "block"
    //                 });

    //                 setTimeout(function() {
    //                     $('.preloaderTemplate').css({
    //                         "display": "none"
    //                     })
    //                 }, 500);

    //             } else {

    //                 if (result.statusJob == 'active' && result.deadlineStatus == 'on going') {
    //                     setTimeout(function() {
    //                         $('.preloaderTemplate').css({
    //                             "display": "none"
    //                         })
    //                     }, 500);

    //                     $('.waitingAssessmentButton').css({
    //                         "display": "none"
    //                     });

    //                     $('.overdueButton').css({
    //                         "display": 'block'
    //                     });

    //                     $('.reportButton').css({
    //                         "display": "block"
    //                     });
    //                     $('.reportDoneTitle').text(result.spanText);

    //                     $('#collapseRequestOverdue').removeClass('collapseRequestOverdue');
    //                     $('#collapseRequestOverdue').removeClass('collapsible');
    //                     $('#collapseRequestOverdue').css({
    //                         "background": "#d6d6db"
    //                     });
    //                     $('.collapseHeaderRequestOverdue').css({
    //                         "background": "#d6d6db"
    //                     });
    //                     $('.cardRevise').css({
    //                         "background": "#d6d6db"
    //                     });

    //                 } else if (result.statusJob == 'active' && result.deadlineStatus == 'overdue') {

    //                     setTimeout(function() {
    //                         $('.preloaderTemplate').css({
    //                             "display": "none"
    //                         })
    //                     }, 500);

    //                     $('.reportButton').css({
    //                         "display": "block"
    //                     });
    //                     $('.reportDoneTitle').text(result.spanText);

    //                     //enable request deadline
    //                     $('.overdueButton').css({
    //                         "display": "block"
    //                     });

    //                     $('#collapseRequestOverdue').addClass('collapseRequestOverdue');
    //                     $('#collapseRequestOverdue').addClass('collapsible');

    //                     $('#collapseRequestOverdue').css({
    //                         "background": "#db3b25"
    //                     });
    //                     $('.collapseHeaderRequestOverdue').css({
    //                         "background": "#db3b25"
    //                     });
    //                     $('.cardRevise').css({
    //                         "background": "#db3b25"
    //                     });

    //                 } else if (result.statusJob == 'waiting' && result.spanText != 'Waiting Approval') {

    //                     setTimeout(function() {
    //                         $('.preloaderTemplate').css({
    //                             "display": "none"
    //                         })
    //                     }, 1000);

    //                     $('.waitingAssessmentButton').css({
    //                         "display": "block"
    //                     });

    //                     $('.overdueButton').css({
    //                         "display": 'block'
    //                     });

    //                     $('.reportButton').css({
    //                         "display": "none"
    //                     });
    //                     $('.spanWaiting').html('overdue');

    //                 } else if (result.statusJob == 'waiting' && result.spanText == 'Waiting Approval') {

    //                     setTimeout(function() {
    //                         $('.preloaderTemplate').css({
    //                             "display": "none"
    //                         })
    //                     }, 1000);

    //                     $('.waitingAssessmentButton').css({
    //                         "display": "block"
    //                     });

    //                     $('.overdueButton').css({
    //                         "display": 'none'
    //                     });

    //                     $('.reportButton').css({
    //                         "display": "none"
    //                     });
    //                     $('.spanWaiting').html('overdue');

    //                 }

    //             }

    //         }
    //     })
    // }

    // function getImageCrewRemind() {
    //     var idSubjob = '<?= $idSubjob; ?>';

    //     $.ajax({
    //         type: 'POST',
    //         data: {
    //             idSubjob: idSubjob
    //         },
    //         url: '<?= base_url('jzl/MobileJobUser/getImageCrewRemind'); ?>',
    //         dataType: 'json',
    //         success: function(result) {
    //             //img gallery
    //             var img = '';
    //             for (var i = 0; i < result.img.length; i++) {
    //                 var imgLink = "'" + result.img[i] + "'";
    //                 var sourceImg = '<?= base_url(); ?>' + '/uploads/job/' + result.idJob + '/' + result.img[i];
    //                 img += '<img onclick="showImage(' + result.idJob + ', ' + imgLink + ')" class="stylingImage" src="' + sourceImg + '"  widht="50" height="50" style="transition: ease 1s;">';
    //             }
    //             $('.targetImgRefer').html(img);
    //             $('.selectedImageSubjob').text(result.img.length);

    //             //crew
    //             selectedCrew();

    //             //remiders peers
    //             var trRemind = '';
    //             for (var r = 0; r < result.remind.length; r++) {
    //                 trRemind += '<tr style="border: none;">' +
    //                     '<td style="width: 2.7em; color: #ffd700; font-size: 0.9em; padding: 0;">' +
    //                     '</td>' +
    //                     '<td style="color: #919191; font-weight: 400; font-size: 0.9em;">' + result.remind[r] + '</td>' +
    //                     '</tr>';
    //             }
    //             $('.targetRemindSubjob').html(trRemind);

    //             //manipulate arrow
    //             if (result.img == '') {

    //                 $('.arrowImageSubjob').html('');
    //                 $('#collapImageSubjob').removeClass('collapImageSubjob');

    //             }

    //             if (result.remind[0] == 0) {

    //                 $('#arrowRemindSubjob').html('');
    //                 $('#collapRemindSubjob').removeClass('collapRemindSubjob');

    //             }
    //         }
    //     })
    // }

    // function showImage(idJob, imgName) {
    //     $('#modalShowImageee').modal('open');

    //     var src = '<?= base_url(); ?>uploads/job/' + idJob + '/' + imgName;
    //     var img = '<img class="detailImagee" src="' + src + '" >';

    //     $('.targetShowImage').html(img);
    // }

    // function init_modal_showImage() {

    //     $('#modalShowImageee').modal({
    //         opacity: 0.5,
    //         inDuration: 200,
    //         outDuration: 200,
    //         ready: undefined,
    //         complete: undefined,
    //         dismissible: true,
    //     });
    // }

    // function saveUploadRequest(input) {
    //     var form = document.getElementById('uploadFileRequest');
    //     var imgLen = input.files.length;

    //     $.ajax({
    //         type: "POST",
    //         data: new FormData(form),
    //         processData: false,
    //         contentType: false,
    //         cache: false,
    //         async: false,
    //         url: '<?= base_url('jzl/MobileJobUser/uploadFileRequest'); ?>',
    //         dataType: 'json',
    //         success: function(result) {
    //             getImageRequest(result.idSubjob);
    //             $('.imageHelperRequest').val(1);
    //         }
    //     })
    // }

    // function saveUploadReportDone(input) {
    //     var form = document.getElementById('uploadFileReportDone');
    //     var imgLen = input.files.length;

    //     $.ajax({
    //         type: "POST",
    //         data: new FormData(form),
    //         processData: false,
    //         contentType: false,
    //         cache: false,
    //         async: false,
    //         url: '<?= base_url('jzl/MobileJobUser/uploadFileReportDone'); ?>',
    //         dataType: 'json',
    //         success: function(result) {

    //             if (result.message == 'error') {

    //                 slModal('Failed', result.errorMessage['error'], 'warning', {
    //                     buttons: false,
    //                     timer: 1500
    //                 });

    //             } else {

    //                 getImageReportDone(result.idSubjob);
    //                 $('.imageHelperDone').val(1);

    //             }

    //         }
    //     })
    // }

    // function getImageRequest(idSubjob) {
    //     $.ajax({
    //         type: 'POST',
    //         data: {
    //             idSubjob: idSubjob,
    //             source: 'img_request, id, id_title',
    //             table: 'subjob'
    //         },
    //         url: '<?= base_url('jzl/MobileJobUser/getImageRequest'); ?>',
    //         dataType: 'json',
    //         success: function(result) {
    //             var img = '';
    //             for (var i = 0; i < result.image.length; i++) {
    //                 var src = '<?= base_url(); ?>/uploads/job/' + result.idJob + '/' + result.image[i].img;
    //                 var click = "'" + result.image[i].img + "'";
    //                 var spanName = "'spanEditImageRequest'";
    //                 var source = "'img_request'";

    //                 img += '<div class="previewImgRequest" data-helper-done-request="1" id="previewImgRequest' + i + '" style="display: flex; justify-content: space-between; padding-top: 1.5em; padding-bottomg: 0; padding-right: 0; padding-left: 0;">' +
    //                     '<div>' +
    //                     '<span class="deleteImgRequest" id="sreq' + i + '" onclick="deleteImg(' + idSubjob + ', ' + click + ', ' + i + ', ' + spanName + ', ' + source + ')" hidden><img src="<?= base_url(); ?>/assets/images/stopbtn.png" width="17" height="17"></span>' +
    //                     '<img class="imgRequest" src="' + src + '" id="req' + i + '" width="85" height="85" alt="" onclick="showImage(' + result.idJob + ', ' + click + ')" style="border-radius: 14px; margin-right: 20px; transition: ease 1s;">' +
    //                     '</div>' +
    //                     '<div>' +
    //                     '<textarea class="textareaImageRevise" id="descRequest' + i + '" name="" data-id="' + i + '" cols="30" rows="10" placeholder="Add Notes" onchange="saveDescRequest(' + i + ', ' + idSubjob + ', ' + click + ')"></textarea>' +
    //                     '</div>' +
    //                     '</div>';
    //             }

    //             $('.targetImgRevise').html(img);
    //             $('.spanEditImageRequest').show();
    //             $('.spanEditImageRequest').attr('onclick', 'editUploadedImage("request")');
    //         }
    //     })
    // }

    // function getImageReportDone(idSubjob) {
    //     $.ajax({
    //         type: 'POST',
    //         data: {
    //             idSubjob: idSubjob,
    //             source: 'img_report, id, id_title',
    //             table: 'subjob'
    //         },
    //         url: '<?= base_url('jzl/MobileJobUser/getImageReportDone'); ?>',
    //         dataType: 'json',
    //         success: function(result) {
    //             var img = '';
    //             for (var i = 0; i < result.image.length; i++) {

    //                 var onclickEdit = 'editImageDone(' + result.idJob + ', ' + result.image[i].img + ')';

    //                 var src = '<?= base_url(); ?>/uploads/job/' + result.idJob + '/' + result.image[i].img;
    //                 var click = "'" + result.image[i].img + "'";
    //                 var spanName = "'spanEditImageDone'";
    //                 var source = "'img_report'";

    //                 img += '<div class="previewImg" data-helper-done="1" id="previewImg' + i + '" style="display: flex; justify-content: space-between; padding-top: 1.5em; padding-bottomg: 0; padding-right: 0; padding-left: 0;">' +
    //                     '<div>' +
    //                     '<span class="deleteImageReport" id="' + i + '" onclick="deleteImg(' + idSubjob + ', ' + click + ', ' + i + ', ' + spanName + ', ' + source + ')" hidden><img src="<?= base_url(); ?>/assets/images/delete.png" width="17" height="17"></span>' +
    //                     '<img class="imgReport" src="' + src + '" id="' + i + '" width="85" height="85" alt="" onclick="showImage(' + result.idJob + ', ' + click + ')" style="border-radius: 14px; margin-right: 20px; transition: ease 1s;">' +
    //                     '</div>' +
    //                     '<div>' +
    //                     '<textarea class="textareaImageRevise" id="descReportDone' + i + '" name="" data-id="' + i + '" cols="30" rows="10" placeholder="Add Notes" onchange="saveDescReportDone(' + i + ', ' + idSubjob + ', ' + click + ')"></textarea>' +
    //                     '</div>' +
    //                     '</div>';
    //             }

    //             $('.targetImgReportDone').html(img);
    //             $('.spanEditImageDone').show();
    //             $('.spanEditImageDone').attr('onclick', 'editUploadedImage("report done")');
    //         }
    //     })
    // }

    // function editUploadedImage(condition) {

    //     if (condition == 'report done') {

    //         $('.deleteImageReport').show();

    //         $('.imgReport').css({
    //             "width": "95px",
    //             "height": "95px"
    //         })

    //         $('.spanEditImageDone').text('Done');
    //         $('.spanEditImageDone').attr('onclick', 'editDone("report done")')

    //     } else if (condition == 'request') {

    //         $('.deleteImgRequest').show();

    //         $('.imgRequest').css({
    //             "width": "95px",
    //             "height": "95px"
    //         })

    //         $('.spanEditImageRequest').text('Done');
    //         $('.spanEditImageRequest').attr('onclick', 'editDone("request")')

    //     }

    // }

    // function editDone(condition) {

    //     if (condition == 'report done') {

    //         $('.imgReport').css({
    //             "width": "85px",
    //             "height": "85px"
    //         });
    //         $('.deleteImageReport').hide();

    //         $('.spanEditImageDone').text('Edit');
    //         $('.spanEditImageDone').attr('onclick', 'editUploadedImage("report done")');

    //     } else if (condition == 'request') {

    //         $('.imgRequest').css({
    //             "width": "85px",
    //             "height": "85px"
    //         });
    //         $('.deleteImgRequest').hide();

    //         $('.spanEditImageRequest').text('Edit');
    //         $('.spanEditImageRequest').attr('onclick', 'editUploadedImage("request")');

    //     }

    // }

    // function deleteImg(idSubjob, imgName, idForm, spanName, sourcee) {

    //     $.ajax({
    //         type: 'POST',
    //         data: {
    //             idSubjob: idSubjob,
    //             imgName: imgName,
    //             source: sourcee + ', id_title',
    //             field: sourcee
    //         },
    //         url: '<?= base_url('jzl/MobileJob/deleteImg'); ?>',
    //         dataType: 'json',
    //         success: function(result) {
    //             if (result.message == 'success') {
    //                 if (sourcee == 'img_request') {

    //                     $('span[id="sreq' + idForm + '"]').remove();
    //                     $('img[id="req' + idForm + '"]').css({
    //                         "width": "0",
    //                         "height": "0"
    //                     })

    //                     setTimeout(function() {

    //                         $('#previewImgRequest' + idForm).remove();

    //                     }, 400);

    //                 } else {

    //                     $('span[id="' + idForm + '"]').remove();
    //                     $('img[id="' + idForm + '"]').css({
    //                         "width": "0",
    //                         "height": "0"
    //                     })

    //                     setTimeout(function() {

    //                         $('#previewImg' + idForm).remove();

    //                     }, 400);

    //                 }

    //                 //check condition
    //                 if (sourcee == 'img_request') {

    //                     var check = $('.previewImgRequest').map(function() {
    //                         return $(this).attr('data-helper-done-request');
    //                     }).toArray();

    //                 } else {

    //                     var check = $('.previewImg').map(function() {
    //                         return $(this).attr('data-helper-done');
    //                     }).toArray();

    //                 }

    //                 //clear value of input helper
    //                 if (check.length == 1) {

    //                     if (sourcee == 'img_request') {

    //                         $('.imageHelperRequest').val('');
    //                         $('.' + spanName).text('Edit');
    //                         $('.' + spanName).hide();
    //                         $('.' + spanName).attr('onclick', 'editUploadedImage("request")');

    //                     } else {

    //                         $('.imageHelperDone').val('');
    //                         $('.' + spanName).text('Edit');
    //                         $('.' + spanName).hide();
    //                         $('.' + spanName).attr('onclick', 'editUploadedImage("report done")');

    //                     }

    //                 }

    //             }
    //         }
    //     })

    // }

    // function saveDescRequest(idForm, idSubjob, imgName) {
    //     var desc = $('#descRequest' + idForm).val();

    //     $.ajax({
    //         type: 'POST',
    //         data: {
    //             key: idForm,
    //             desc: desc,
    //             idSubjob: idSubjob,
    //             img: imgName
    //         },
    //         url: '<?= base_url('jzl/MobileJobUser/updateDescImageRequest'); ?>',
    //         dataType: 'text',
    //         success: function(result) {
    //             if (result == 'success') {
    //                 return true;
    //             }
    //         }
    //     })
    // }

    // function saveDescReportDone(idForm, idSubjob, imgName) {
    //     var desc = $('#descReportDone' + idForm).val();

    //     $.ajax({
    //         type: 'POST',
    //         data: {
    //             key: idForm,
    //             desc: desc,
    //             idSubjob: idSubjob,
    //             img: imgName
    //         },
    //         url: '<?= base_url('jzl/MobileJobUser/updateDescImage'); ?>',
    //         dataType: 'text',
    //         success: function(result) {
    //             if (result == 'success') {
    //                 return true;
    //             }
    //         }
    //     })
    // }

    // function requestOverdue(idSubjob) {
    //     var deadlineDate = $('.deadlineDateFieldRequest').val();
    //     var hour = $('.inputHourRequest').val();
    //     var minutes = $('.inputMinutesRequest').val();

    //     if (hour != '') {
    //         var deadlineHour = hour + ':' + minutes;
    //     } else {
    //         var deadlineHour = '';
    //     }

    //     var note = $('.notesRequest').val();

    //     var image = $('.imageHelperRequest').val();

    //     if (note == '') {
    //         slModal('Failed', 'Note cannot be null', 'warning', {
    //             buttons: false,
    //             timer: 1500
    //         });
    //     } else if (deadlineDate == '') {
    //         slModal('Failed', 'Deadline date cannot be null', 'warning', {
    //             buttons: false,
    //             timer: 1500
    //         })
    //     } else if (hour == '') {
    //         slModal('Failed', 'Deadline hour cannot be null', 'warning', {
    //             buttons: false,
    //             timer: 1500
    //         })
    //     } else if (image == '') {
    //         slModal('Failed', 'Image cannot be null', 'warning', {
    //             buttons: false,
    //             timer: 1500
    //         })
    //     } else {
    //         $.ajax({
    //             type: "POST",
    //             data: {
    //                 idSubjob: idSubjob,
    //                 deadlineDate: deadlineDate,
    //                 deadlineHour: deadlineHour,
    //                 note: note
    //             },
    //             url: '<?= base_url('jzl/MobileJobUser/requestOverdue'); ?>',
    //             dataType: 'json',
    //             success: function(result) {
    //                 if (result.message == 'success') {
    //                     $('.collapseRequestOverdue').collapsible('close');
    //                     getButton();
    //                     getHistory();
    //                 }
    //             }
    //         })
    //     }
    // }

    // function confirmReportasDone(idSubjob) {

    //     var param = [];
    //     param[0] = idSubjob;

    //     slModal('Confirm Job', 'Are you sure to report this job?', 'question', {
    //         buttons: {
    //             confirmation: true,
    //             value: 'confirm',
    //             onclick: 'delete',
    //             params: param,
    //             function: 'reportasDone'
    //         }
    //     })

    // }

    // function reportasDone(idSubjob) {

    //     $('#modalNotification').modal('close');
    //     var notes = $('.notesReportDone').val();
    //     var images = $('.imageHelperDone').val();

    //     if (notes == '') {
    //         slModal('Failed', 'Note cannot be null', 'warning', {
    //             buttons: false,
    //             timer: 1500
    //         });
    //     } else if (images == '') {
    //         slModal('Failed', 'Image cannot be null', 'warning', {
    //             buttons: false,
    //             timer: 1500
    //         });
    //     } else {
    //         $.ajax({
    //             type: "POST",
    //             data: {
    //                 idSubjob: idSubjob,
    //                 note: notes
    //             },
    //             url: '<?= base_url('jzl/MobileJobUser/reportasDone'); ?>',
    //             dataType: 'text',
    //             success: function(result) {
    //                 if (result == 'success') {
    //                     getHistory();
    //                     getButton();
    //                     getListIndex();
    //                 }
    //             }
    //         })
    //     }
    // }
</script>