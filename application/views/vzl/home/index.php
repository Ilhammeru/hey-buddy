<div class="main">


    <!------------------------- active card -------------------------->

    <div class="row" id="activeRow" style="margin-top: 3.3em; margin-bottom: 0; padding-bottom:0;">
        <div class="col m4"></div>
        <div class="col s12 m4" style="padding: 0 0.4em;">
            <div class="card activeJobCard">
                <div class="card-content contentJobCard" style="padding: 0 24px !important;">
                    <div class="row" style="margin-bottom: 0.5em;">
                        <div class="col s10 left-align" style="padding: 0 !important;  margin-top: 12px;">
                            <span class="targetActiveJob" style="font-size: 1.9em; color: grey; font-weight: 600; font-family: var(--sfpd-bold)"></span>
                        </div>
                        <div class="col s2 right-align" style="padding: 0 !important; margin-top: 12px;">
                            <img src="<?= base_url(); ?>/assets/images/active.png" width="40" height="40" alt="">
                        </div>
                    </div>
                </div>
                <div class="row" style="padding: 0; margin: 0;">
                    <div class="col s12 right-align" style="margin-bottom: 0.6em !important; color: #919191; text-transform: Capitalize;">
                        <span style="margin-right: 0.7em; font-weight: 500; font-size: 0.9em; font-family: var(--sfpd-regular)">Active Jobs</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col m4"></div>
    </div>

    <!------------------------- active card -------------------------->

    <!------------------------- wait, failed, prioritized job -------------------------->

    <div class="row hide-on-med-and-up" style="margin: 0 !important;">
        <div class="col s4 m4" style="padding: 0 0.4em;">
            <div class="card" style="border-radius: 14px; box-shadow: none !important;">
                <div class="card-content" style="padding: 0.5em !important; height: 5.5em !important;">
                    <div class="row">
                        <div class="col s6 left-align">
                            <p class="targetWaitingJob" style="font-size: 1.8em; margin-left: 0.3em !important; color: #919191; font-family:var(--sfpd-bold)"></p>
                        </div>
                        <div class="col s6 waitingField" style=" text-align: right;">
                            <img src="<?= base_url(); ?>/assets/images/waitingactive.png" width="30" height="30" alt="">
                        </div>
                        <div class="row">
                            <div class=" col s12">
                                <p class="right-align" style="font-size: 0.8em; color: #919191; margin-right: 1em; margin-top: 1em; font-family: var(--sfpd-regular)" class="right">Waiting</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row" style="margin: 0 !important; padding-top: 0;"> -->
        <div class="col s4 m4" style="padding: 0 0.4em;">
            <div class="card" style="border-radius: 14px; box-shadow: none !important;">
                <div class="card-content" style="padding: 0.5em !important; height: 5.5em !important;">
                    <div class="row">
                        <div class="col s6 left-align">
                            <p class="targetFailedJob" style="font-size: 1.8em; margin-left: 0.3em !important; color: #919191; font-family: var(--sfpd-bold)"></p>
                        </div>
                        <div class="col s6 failedField" style=" text-align: right;">
                            <img src="<?= base_url(); ?>/assets/images/failed.png" width="30" height="30" alt="">
                        </div>
                        <div class="row">
                            <div class=" col s12">
                                <p class="right-align" style="font-size: 0.8em; color: #919191; margin-right: 1em; margin-top: 1em; font-family: var(--sfpd-regular)" class="right">Failed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row" style="margin: 0 !important;"> -->
        <div class="col s4 m4 offset-4" style="padding: 0 0.4em;">
            <div class="card" style="border-radius: 14px; box-shadow: none !important;">
                <div class="card-content" style="padding: 0.5em !important; height: 5.5em !important;">
                    <div class="row">
                        <div class="col s6 left-align">
                            <p class="targetPrioJob" style="font-size: 1.8em; margin-left: 0.3em !important; color: #919191; font-family: var(--sfpd-bold)"></p>
                        </div>
                        <div class="col s6 prioField" style=" text-align: right;">
                            <img src="<?= base_url(); ?>/assets/images/prio.png" width="30" height="30" alt="">
                        </div>
                        <div class="row">
                            <div class=" col s12">
                                <p class="right-align" style="font-size: 0.8em; color: #919191; margin-right: 1em; margin-top: 1em; font-family: var(--sfpf-regular)" class="right">Prioritized</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row hide-on-small-only" style="margin: 0 !important;">

        <div class="col m4"></div>

        <div class="col m4" style="padding: 0 0.4em;">
            <div class="card" style="border-radius: 14px; box-shadow: none !important;">
                <div class="card-content" style="padding: 0.5em !important; height: 5.5em !important;">
                    <div class="row">
                        <div class="col s6 left-align">
                            <p class="targetWaitingJob" style="font-size: 1.8em; margin-left: 0.3em !important; color: #919191; font-weight: 600;"></p>
                        </div>
                        <div class="col s6 waitingField" style=" text-align: right;">
                            <img src="<?= base_url(); ?>/assets/images/waitingactive.png" width="30" height="30" alt="">
                        </div>
                        <div class="row">
                            <div class=" col s12">
                                <p class="right-align" style="font-size: 0.8em; color: #919191; margin-right: 1em; margin-top: 1em; font-weight: 500;" class="right">Waiting</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col m4"></div>

    </div>


    <div class="row hide-on-small-only" style="margin: 0 !important;">

        <div class="col m4"></div>

        <div class="col m4" style="padding: 0 0.4em;">
            <div class="card" style="border-radius: 14px; box-shadow: none !important;">
                <div class="card-content" style="padding: 0.5em !important; height: 5.5em !important;">
                    <div class="row">
                        <div class="col s6 left-align">
                            <p class="targetFailedJob" style="font-size: 1.8em; margin-left: 0.3em !important; color: #919191; font-weight: 600;"></p>
                        </div>
                        <div class="col s6 failedField" style=" text-align: right;">
                            <img src="<?= base_url(); ?>/assets/images/failed.png" width="30" height="30" alt="">
                        </div>
                        <div class="row">
                            <div class=" col s12">
                                <p class="right-align" style="font-size: 0.8em; color: #919191; margin-right: 1em; margin-top: 1em; font-weight: 500;" class="right">Failed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col m4"></div>

    </div>


    <div class="row hide-on-small-only" style="margin: 0 !important;">

        <div class="col m4"></div>

        <div class="col m4 offset-4" style="padding: 0 0.4em;">
            <div class="card" style="border-radius: 14px; box-shadow: none !important;">
                <div class="card-content" style="padding: 0.5em !important; height: 5.5em !important;">
                    <div class="row">
                        <div class="col s6 left-align">
                            <p class="targetPrioJob" style="font-size: 1.8em; margin-left: 0.3em !important; color: #919191; font-weight: 600;"></p>
                        </div>
                        <div class="col s6 prioField" style=" text-align: right;">
                            <img src="<?= base_url(); ?>/assets/images/prio.png" width="30" height="30" alt="">
                        </div>
                        <div class="row">
                            <div class=" col s12">
                                <p class="right-align" style="font-size: 0.8em; color: #919191; margin-right: 1em; margin-top: 1em; font-weight: 500;" class="right">Prioritized</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col m4"></div>

    </div>

    <!------------------------- wait, failed, prioritized job -------------------------->

    <!------------------------- AI -------------------------->

    <div class="row" style="margin-bottom: 0; margin-top: 10px;">

        <div class="col m4 hide-on-small-only"></div>

        <div class="col s12 m4" style="padding: 0 0.4em;">
            <div class="card" style="border-radius: 14px; box-shadow: none;">
                <div class="card-content" style="padding: 0.6em; height: 20em;">
                    <div class="titleAI left-align" style="display: flex; justify-content: space-between; margin-left: 1em; margin-top: 0.4em;">
                        <p style="color: #5e5e5e; font-weight: 700; font-size: 1.1em;">AI</p>
                    </div>
                    <div class="tableAI" style="margin: 1em; padding: 0;  height: 15em; overflow: auto; display: block">
                        <table>
                            <thead hidden style="table-layout: fixed; width: 100%; display: fixed;">
                                <tr>
                                    <th>No</th>
                                    <th>No</th>
                                    <th>No</th>
                                    <th>No</th>
                                </tr>
                            </thead>
                            <tbody style="table-layout: fixed; width: 100%; display: table;">
                                <tr style="border: none !important;">
                                    <td style="width: 1.5em; color: #5e5e5e; font-weight: 700; font-size: 0.8em;">1</td>
                                    <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                    <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                    <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                    <td class="right-align" style="color: #c2c2c2; font-size: 0.9em; border-bottom: 1px solid #eaeaea !important;"><i class="fas fa-ellipsis-h"></i></td>
                                </tr>
                                <tr style="border: none !important;">
                                    <td style="width: 1.5em; color: #5e5e5e; font-weight: 700; font-size: 0.8em;">2</td>
                                    <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                    <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                    <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                    <td class="right-align" style="color: #c2c2c2; font-size: 0.9em; border-bottom: 1px solid #eaeaea !important;"><i class="fas fa-ellipsis-h"></i></td>
                                </tr>
                                <tr style="border: none !important;">
                                    <td style="width: 1.5em; color: #5e5e5e; font-weight: 700; font-size: 0.8em;">3</td>
                                    <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                    <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                    <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                    <td class="right-align" style="color: #c2c2c2; font-size: 0.9em; border-bottom: 1px solid #eaeaea !important;"><i class="fas fa-ellipsis-h"></i></td>
                                </tr>
                                <tr style="border: none !important;">
                                    <td style="width: 1.5em; color: #5e5e5e; font-weight: 700; font-size: 0.8em;">4</td>
                                    <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                    <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                    <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                    <td class="right-align" style="color: #c2c2c2; font-size: 0.9em; border-bottom: 1px solid #eaeaea !important;"><i class="fas fa-ellipsis-h"></i></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col m4 hide-on-small-only"></div>

    </div>

    <!------------------------- AI -------------------------->

    <!------------------------- JOB -------------------------->

    <div class="row" style="margin-bottom: 0;">

        <div class="col m4 hide-on-small-only"></div>

        <div class="col s12 m4" style="padding: 0 0.4em;">
            <div class="card" style="border-radius: 14px; box-shadow: none;">
                <div class="card-content" style="padding: 0.6em; height: 20em;">
                    <div class="titleAI left-align" style="display: flex; justify-content: space-between; margin-left: 1em; margin-top: 0.4em;">
                        <div>
                            <p style="color: #5e5e5e; font-weight: 700; font-size: 1.1em;">Job</p>
                        </div>
                        <div class="targetBadge">

                        </div>
                    </div>
                    <div class="tableAI" style="margin: 1em; padding: 0; max-width: 100%;  height: 15em; overflow: auto; display: block">
                        <table id="myTable">
                            <thead hidden style="table-layout: fixed; width: 100%; display: none;">
                                <tr>
                                    <th>No</th>
                                    <th>No</th>
                                    <th>No</th>
                                    <th>No</th>
                                </tr>
                            </thead>
                            <tbody class="targetBodyJob" style="table-layout: fixed; max-width: 100%; display: table;">

                                <!-- <tr style="border: none !important;">
                                            <td style="width: 1.5em; color: #5e5e5e; font-weight: 700; font-size: 0.8em;">5</td>
                                            <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                            <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                            <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                            <td class="right-align" style="color: #c2c2c2; font-size: 0.9em; border-bottom: 1px solid #eaeaea !important;"><i class="fas fa-ellipsis-h"></i></td>
                                        </tr> -->

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col m4 hide-on-small-only"></div>

    </div>

    <!------------------------- JOB -------------------------->


    <!------------------------- DOCUMENT -------------------------->

    <div class="row" style="margin-bottom: 4.5em;">

        <div class="col m4 hide-on-small-only"></div>

        <div class=" col s12 m4" style="padding: 0 0.4em;">
            <div class="card" style="border-radius: 14px; box-shadow: none;">
                <div class="card-content" style="padding: 0.6em; height: 20em;">
                    <div class="titleAI left-align" style="display: flex; justify-content: space-between; margin-left: 1em;">
                        <div style="margin-top: 0.8em;">
                            <p style="color: #5e5e5e; font-weight: 700; font-size: 1.1em;">Job Archive</p>
                        </div>
                        <div>
                            <div class="searchDoc">
                                <input class="left-align" type="text" data-trigg="document" placeholder="Search ...">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <div class="tableAI" style="margin: 1em; padding: 0;  height: 15em; overflow: auto; display: block">
                        <table>
                            <thead hidden style="table-layout: fixed; width: 100%; display: none;">
                                <tr>
                                    <th>No</th>
                                    <th>No</th>
                                    <th>No</th>
                                    <th>No</th>
                                </tr>
                            </thead>
                            <tbody style="table-layout: fixed; width: 100%; display: table;" class="targetArchive">
                                <!-- <tr style="border: none !important;">
                                            <td style="width: 1.5em; color: #5e5e5e; font-weight: 700; font-size: 0.8em;">1</td>
                                            <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                            <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                            <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                            <td class="right-align" style="color: #c2c2c2; font-size: 0.9em; border-bottom: 1px solid #eaeaea !important;"><i class="fas fa-ellipsis-h"></i></td>
                                        </tr>
                                        <tr style="border: none !important;">
                                            <td style="width: 1.5em; color: #5e5e5e; font-weight: 700; font-size: 0.8em;">2</td>
                                            <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                            <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                            <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                            <td class="right-align" style="color: #c2c2c2; font-size: 0.9em; border-bottom: 1px solid #eaeaea !important;"><i class="fas fa-ellipsis-h"></i></td>
                                        </tr>
                                        <tr style="border: none !important;">
                                            <td style="width: 1.5em; color: #5e5e5e; font-weight: 700; font-size: 0.8em;">3</td>
                                            <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                            <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                            <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                            <td class="right-align" style="color: #c2c2c2; font-size: 0.9em; border-bottom: 1px solid #eaeaea !important;"><i class="fas fa-ellipsis-h"></i></td>
                                        </tr>
                                        <tr style="border: none !important;">
                                            <td style="width: 1.5em; color: #5e5e5e; font-weight: 700; font-size: 0.8em;">4</td>
                                            <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                            <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                            <td style="border-bottom: 1px solid #eaeaea !important;"></td>
                                            <td class="right-align" style="color: #c2c2c2; font-size: 0.9em; border-bottom: 1px solid #eaeaea !important;"><i class="fas fa-ellipsis-h"></i></td>
                                        </tr> -->

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col m4 hide-on-small-only"></div>

    </div>


    <!------------------------- DOCUMENT -------------------------->
</div>
</div>
</div>



<!------------------------- modal add job -------------------------->

<div id="modalAddJob" class="modal bottom-sheet" style="background: #f2f1f6;">
    <div class="modal-content" style="margin: 0; padding-top: 0;">
        <div class="valign-wrapper" style="justify-content: space-between; display: flex; margin-top: 0;">
            <div>
                <p class="center-align" onclick="closeModalAddJob()" style="color: #de4c39">Cancel</p>
            </div>
            <div>
                <p class="center-align addJobTitle" id="addJobTitle" style="font-size: 1.5em; color: #000001; font-family: var(--sfpd-bold);">New Job 1</p>
            </div>
            <div>
                <p onclick="saveJobs()" class="center-align saveJobButton" style="color: #44a3f7">Done</p>
            </div>
        </div>

        <div class="row valign-wrapper dateTime">
            <div class="col s6">
                <p style="color: #5e5e5e; margin-left: 1.2em; font-family: var(--sfpd-regular);">Date & Time</p>
            </div>
            <div class="col s6">
                <input type="text" data-trigg="add" value="<?= date('d M H:i'); ?>">
                <input type="text" hidden class="dateInput" name="dateInput" value="<?= date('Y-m-d'); ?>">
                <input type="text" hidden class="idJobGroup" name="idJobGroup">
                <input type="text" hidden class="fieldIdSubjob" name="fieldIdSubjob">
            </div>
        </div>
        <div class="row valign-wrapper" id="titleRow">
            <div class="col s12">
                <input type="text" class="jobTitle" name="jobTitle" placeholder="Job Title" data-trigg="jobTitle" oninput="changeTitle()" onchange="saveTitle()">
            </div>
        </div>

        <div class="row valign-wrapper" id="coadminRow">
            <div class="col s12 m6 offset-m3">
                <div class="card" style="border-radius: 1.3em; box-shadow: none;">
                    <div class="card-content" style="padding: 0.3em;">
                        <div style="display: flex; justify-content: space-between; padding: 0.8em 1.4em;">
                            <div class="valign-wrapper">
                                <img src="<?= base_url(); ?>/assets/images/co-admin.png" width="20" height="20" alt=""> <span style="margin-left: 0.7em; color: #6a6a6a; font-size: 0.9em; font-family: 'Quicksand', sans-serif; font-weight: 600;">Add Co-Admin</span>
                            </div>
                            <div class="modal-trigger valign-wrapper modalCoadminTrigger" href="#modalAddCoadmin" style="text-align: right;">
                                <span class="targetCoadmin" id="targetCoadmin" style="color: #d9d8d9; margin-right: 0.5em; font-size: 0.8em;">None</span>
                                <input hidden type="text" class="targetCoadmin1" name="targetCoadmin1">
                                <img src="<?= base_url(); ?>/assets/images/arrowright.png" width="10" height="10" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row valign-wrapper" id="crewLeaderRow">
            <div class="col s12 m6 offset-m3">
                <div class="card" style="border-radius: 1.6em; box-shadow: none;">
                    <div class="card-content" style="padding: 0.3em;">
                        <ul class="collapsible collap1" id="collap1" style="box-shadow: none; border: none;">
                            <li>
                                <div class="collapsible-header" style="border: none !important; padding: 0.5em 1.4em; display: flex; justify-content: space-between;">
                                    <div class="valign-wrapper">
                                        <img src="<?= base_url(); ?>/assets/images/crew.png" width="25" height="25" alt=""> <span style="margin-left: 0.7em; color: #6a6a6a;">Assign Crew</span>
                                    </div>
                                    <div class="valign-wrapper" style="text-align: right;">
                                        <span class="selectedCrew" style="color: #d9d8d9; margin-right: 0.5em; font-size: 0.8em;">0</span>
                                        <div>
                                            <img class="arrowDrop" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="collapsible-body collapseCrew" style="color: #40a1f8; border: none">
                                    <table class="tableCrewName" hidden>
                                        <tbody class="targetCrewName"></tbody>
                                    </table>
                                    <div class="modal-trigger modalCrewTrigger" href="#modalAddCrew" style="margin-top: 6px; margin-left: 0.5em;">
                                        <i class="fas fa-plus"></i> <span style="margin-left: 1em; font-weight: 500">Add...</span>
                                    </div>
                                    <div style="padding: 0; ">
                                        <p style="padding:0; width: 90%; text-align: center; margin-top: 8px; margin-left: 1em; margin-bottom: 0.5em; height: 2px; background-color: #e0e0e0;"></p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="collapsible collap2" style="box-shadow: none; border: none;">
                            <li>
                                <div class="collapsible-header" style="border: none !important; padding: 0.5em 1.4em; display: flex; justify-content: space-between;">
                                    <div class="valign-wrapper">
                                        <img src="<?= base_url(); ?>/assets/images/leader.png" width="25" height="25" alt=""> <span style="margin-left: 0.7em; color: #6a6a6a;">Assign Leader</span>
                                    </div>
                                    <div class="valign-wrapper" style="text-align: right;">
                                        <span class="selectedLeader" style="color: #d9d8d9; margin-right: 0.5em; font-size: 0.8em;">None</span>
                                        <div>
                                            <img class="arrowLeader" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="collapsible-body collapseLeader">
                                    <table class="table">
                                        <tbody class=" targetLeader">
                                        </tbody>
                                    </table>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="row valign-wrapper">
            <div class="col s12 m6 offset-m3">
                <div class="card" style="border-radius: 1.4em;  box-shadow: none; background-color: #fff;">
                    <div class="card-content" style="padding: 0.1em 0.5em;">
                        <ul class="collapsible collap3" style="box-shadow: none; border: none; margin: 0.3em 0;">
                            <li>
                                <div class="collapsible-header" style="border: none !important; padding: 0.5em 1.4em; display: flex; justify-content: space-between;">
                                    <div class="valign-wrapper">
                                        <img src="<?= base_url(); ?>/assets/images/subjob.png" width="25" height="25" alt=""> <span style="margin-left: 0.7em; color: #6a6a6a;">Subjob</span>
                                    </div>
                                    <div class="valign-wrapper" style="text-align: right;">
                                        <span class="spanNumberSubjob" style="color: #d9d8d9; margin-right: 0.5em; font-size: 0.8em;">0</span>
                                        <div>
                                            <img class="arrowSubjob" style="transition: ease .5s;" src="<?= base_url(); ?>/assets/images/downarrow.png" width="15" height="15" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div id="borderBottomLong"></div>

                                <div class="collapsible-body collapseSubjobIndex">
                                    <div class="targetViewSubjob">
                                        <table class="tableConclusionSubjob" style="transition: ease 1s; height: 100%;">
                                            <tbody class="targetConclusion1">

                                            </tbody>
                                        </table>
                                    </div>
                                    <table class="tableConclusionSubjob" style="transition: ease 1s; height: 100%;">
                                        <tbody class="targetConclusion">

                                        </tbody>
                                    </table>
                                    <div style="margin-top: 6px; margin-left: 0.5em;">
                                        <div style="width: 100%; display: flex; justify-content: space-between;" class="valign-wrapper">
                                            <div style="width: 10%;">
                                                <span><img src="<?= base_url(); ?>/assets/images/plus.png" width="15" height="15" alt=""></span>
                                            </div>
                                            <div class="inputSubjobFirst">
                                                <!-- <input type="text" placeholder="Add..." data-trigg="inputSubjob" class="subjobField" onclick="changeSubjob()"> -->
                                                <span class="subjobField">Add...</span>
                                            </div>
                                            <!-- <div>
                                                <span class=" modal-trigger" href="#modalAddSubjob"><img src="<?= base_url(); ?>/assets/images/info1.png" width="19" height="19" alt=""></span>
                                            </div> -->
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
</div>

<!------------------------- modal add job -------------------------->

<!------------------------- modal add crew -------------------------->

<div id="modalAddCrew" class="modal bottom-sheet">
    <div class="modal-content" style="margin: 0; padding-top: 0;">
        <div class="targetAddCrew"></div>

    </div>
    <div class="footer headerAddCrew">

    </div>
</div>

<!------------------------- modal add crew -------------------------->

<!------------------------- modal add subjob -------------------------->

<div id="modalAddSubjob" class="modal bottom-sheet modal-fixed-footer">
    <div class="modal-content" style="margin: 0; padding-top: 0; top: 6em; height: 89% !important; overflow-x: hidden">
        <div class="targetAddSubjob"></div>
    </div>
    <div class="footer headerSubjob">

    </div>
</div>

<!------------------------- modal add subjob -------------------------->

<!------------------------- modal change password -------------------------->

<div id="modalChangePassword" class="modal bottom-sheet modal-fixed-footer">
    <div class="modal-content" style="margin: 0; padding-top: 0; height: 89% !important; overflow-x: hidden">
        <div class="targetChangePassword"></div>
    </div>
    <div class="footer headerSubjob">

    </div>
</div>

<!------------------------- modal change password -------------------------->

<!------------------------- modal assessor other -------------------------->

<div id="modalAddAssessor" class="modal bottom-sheet">
    <div class="modal-content" style="margin: 0; padding-top: 0;">
        <div class="targetAddAssessor"></div>
    </div>
</div>

<!------------------------- modal assessor other -------------------------->

<!------------------------- modal co-admin other -------------------------->

<div id="modalAddCoadmin" class="modal bottom-sheet">
    <div class="modal-content" style="margin: 0; padding-top: 0;">
        <div class="targetAddCoadmin"></div>
    </div>
</div>

<!------------------------- modal co-admin other -------------------------->


<!------------------------- modal confirmation other -------------------------->

<div id="modalConfirmation" class="modal bottom-sheet">
    <div class="modal-content" style="margin: 0; padding-top: 0;">
        <div class="targetAddAssessor"></div>
    </div>
</div>

<!------------------------- modal confrimation other -------------------------->

<!------------------------- modal showSubjob other -------------------------->

<div id="modalShowSubjob" class="modal bottom-sheet" style="background: #f2f1f6;">
    <div class="modal-content" style="margin: 0; padding: 0; overflow: scroll;">
        <div class="targetShowSubjob"></div>
    </div>
</div>
<!------------------------- modal showSubjob other -------------------------->


<!------------------------- modal viewJob other -------------------------->

<div id="modalViewJob" class="modal bottom-sheet" style="overflow-x: hidden; background: #f2f1f6;">
    <div class="modal-content" style="margin: 0; padding: 0;">
        <div class="targetViewJob">
        </div>
    </div>
</div>
<!------------------------- modal viewJob other -------------------------->

<!------------------------- footer -------------------------->

<footer class="page-footer footerClass">
    <div class="container">
        <div class="row">

            <div class="col m4 hide-on-small-only"></div>

            <div class="col s12 m4" style="justify-content: space-between; display: flex;">
                <?php if ($_SESSION['isCoadmin'] != 1) { ?>
                    <div class="valign-center">
                        <p class="blue-text text-darken-1 modal-trigger" href="#modalAddJob"><i class="fas fa-plus-circle"></i> New</p>
                    </div>
                <?php } else { ?>
                    <div class="valign-center">
                        <p class="blue-text text-darken-1 modal-trigger" href="#modalAddJob"></p>
                    </div>
                <?php } ?>
                <div class="valign-center">
                    <p class="blue-text text-lighten-1 viewJobButton modal-trigger" href="#modalViewJob"> View</p>
                </div>
            </div>

            <div class="col m4 hide-on-small-only"></div>

        </div>
    </div>
</footer>

<!------------------------- footer -------------------------->

<!-- popover detail -->

<div class="row" id="detailPopoverMaster" style="padding-top: 0.4em; padding-bottom: 0.4em; padding-right: 0.6em; padding-left: 0.7em; margin: 0; display:none">

    <div class="col s12" style="padding: 0; margin: 0">
        <div style="display: flex; justify-content: space-between; padding: 0 0.8em;">
            <div>
                <span style="margin-right: 6.7em; color: #5cb7f8; font-size: 0.8em;">Details</span>
            </div>
            <div>
                <span><i style="color: #5cb7f8; font-size: 0.8em;" class="fas fa-arrow-up"></i></span>
            </div>
        </div>
    </div>

    <div class="borderBottomFull"></div>

    <div class="row" onclick="deleteSpan(' + i + ')" style="padding-top: 0.4em; padding-bottom: 0.4em; padding-right: 0.6em; padding-left: 0.7em; margin: 0">
        <div class="col s12" style="padding: 0; margin: 0">
            <div style="display: flex; justify-content: space-between;">
                <div>
                    <span style="margin-right: 6.7em; color: #e06655; font-size: 0.8em;">Delete</span>
                </div>
                <div style="margin-right: 0.3em;">
                    <span><i style="color: #e06655; font-size: 0.8em;" class="fas fa-times"></i></span>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- popover detail -->


<script>
    $(document).ready(function() {

        $('.tabs').tabs();
        showDetailSubjob();
        showDetailAssessor();
        showDetailRemind();
        showDetailCoadmin();
        getCrew();
        toggleFooter();

        var i = 1;
        $('.subjobField').click(function(e) {
            e.preventDefault();
            $('.pCode').attr('id', 'pCode' + i);

            $('.tableConclusionSubjob').css({
                "height": "100%"
            });
            // $('.subjobField1').attr('id', 'subjobField1' + i);


            var tr = '<tr data-check="1" class="targetDelete' + i + '" id="targetDelete" style="border: none; margin-left: 1em;" class="text-center">' +
                '<td class="numberTab" id="numberTab' + i + '" style="border: none; font-size: 0.9em; font-family: var(--sfpd-light); width: 3em; margin-left: 1em; color: #929293; padding: 0 0.8em;"></td>' +
                '<td class="subjobTab" style="border: none; font-size: 0.9em; font-family: var(--sfpd-semibold) width: 14em; color: #929293; padding: 0 0.8em;"><input class="manualSubjobField" id="manualSubjobField' + i + '" oninput="changeSubjobField1(' + i + ')" type="text"></td>' +
                '<td class="deadlineFieldIndex' + i + '" style="border: none; font-size: 0.7em; font-family: var(--sfpd-regular); width: 8em; color: #929293; padding: 0 0.8em;">No deadline</td>' +
                '<td  style="font-size: 0.8em; color: #929293; padding: 0 0.8em;" ><i class="fas fa-ellipsis-h" id="detailPopover' + i + '"></i></td>' +
                '<td hidden><input type="text" id="finalIdSubjob1' + i + '" class="finalIdSubjob1"></td>' +
                '<td hidden><input type="text" id="finalSubjob' + i + '" class="finalSubjob" name="finalSubjob"></td>' +
                '<td hidden><input type="text" id="finalPurpose' + i + '" class="finalPurpose" ></td>' +
                '<td hidden><input type="text" id="finalDeadlineDate' + i + '" class="finalDeadlineDate"></td>' +
                '<td hidden><input type="text" id="finalDeadlineHour' + i + '" class="finalDeadlineHour"></td>' +
                '<td hidden ><input type="text" id="finalAssessor' + i + '" class="finalAssessor"></td>' +
                '<td hidden><input type="text" id="finalRemind' + i + '" class="finalRemind"></td>' +
                '<td hidden><input type="text" id="finalCode' + i + '" class="finalCode"></td>' +
                '<td hidden><input type="text" id="finalCoadmin' + i + '" class="finalCoadmin"></td>' +
                '<td hidden><input type="text" id="finalPriority' + i + '" class="finalPriority"></td>' +
                '<td hidden><input type="text" id="finalNote' + i + '" class="finalNote"></td>' +
                '<td hidden><input type="text" id="finalStoppable' + i + '" class="finalStoppable"></td>' +
                '<td hidden><input type="text" id="finalRemindAlarm' + i + '" class="finalRemindAlarm"></td>' +
                '</tr>';
            $('.targetConclusion').append(tr);

            //save template to database
            saveTemplateSubjob(i);

            //add number to number pad
            var num = $('tr[id="targetDelete"]').map(function() {
                return $(this).attr('data-check');
            }).toArray();

            $('#numberTab' + i).html(num.length);

            //detail subjob
            const templateDetail = document.getElementById('detailPopoverMaster');

            tippy('#detailPopover' + i, {
                allowHTML: true,
                trigger: 'click',
                placement: 'bottom',
                interactive: true,
                content: '<div class="row" onclick="detailsSubjob(' + i + ')" style="padding-top: 0.4em; padding-bottom: 0.4em; padding-right: 0.6em; padding-left: 0.7em; margin: 0">' +
                    '<div class="col s12" style="padding: 0; margin: 0">' +
                    '<div style="display: flex; justify-content: space-between">' +
                    '<div>' +
                    '<span style="margin-right: 6.7em; color: #5cb7f8; font-size: 0.8em;">Details</span>' +
                    '</div>' +
                    '<div>' +
                    '<span><i style="color: #5cb7f8; font-size: 0.8em;" class="fas fa-arrow-up"></i></span>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="borderBottomFull"></div>' +
                    '<div class="row" onclick="deleteSpan(' + i + ')"  style="padding-top: 0.4em; padding-bottom: 0.4em; padding-right: 0.6em; padding-left: 0.7em; margin: 0">' +
                    '<div class="col s12" style="padding: 0; margin: 0">' +
                    '<div style="display: flex; justify-content: space-between">' +
                    '<div>' +
                    '<span style="margin-right: 6.7em; color: #e06655; font-size: 0.8em;">Delete</span>' +
                    '</div>' +
                    '<div>' +
                    '<span><i style="color: #e06655; font-size: 0.8em;" class="fas fa-times"></i></span>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>'

            });

            i++

        });

        $('.collap1').collapsible({
            onOpenStart: function() {
                $('.arrowDrop').addClass('rtr');
            },
            onCloseStart: function() {
                $('.arrowDrop').removeClass('rtr');
            }
        });
        $('.collap2').collapsible({
            onOpenStart: function() {
                $('.arrowLeader').addClass('rtr');
            },
            onCloseStart: function() {
                $('.arrowLeader').removeClass('rtr');
            }
        });

        $('.collap3').collapsible({
            onOpenStart: function() {
                $('#borderBottomLong').addClass('borderBottomLong');
                $('.arrowSubjob').addClass('rtr');
            },
            onOpenEnd: function() {
                var img = '<img src="<?= base_url(); ?>/assets/images/uparrow.png" width="15" height="15" alt="">';
                $('.arrowDrop4').html('');
                $('.arrowDrop4').html(img);
            },
            onCloseStart: function() {
                $('.arrowSubjob').removeClass('rtr');
                $('#borderBottomLong').removeClass('borderBottomLong');
            }
        });


        init_modal_job();
        init_modal_crew();
        init_modal_subjob();
        init_modal_change_password();
        init_modal_remind();
        init_modal_assessor();
        init_modal_coadmin();
        init_modal_showSubjob();
        init_modal_viewJob();
        getListIndex();
        getArchive();
        showViewSubjob();
    })

    function getHeaderSubjob() {
        var header = '<div id="swipeSubjob">' +
            '<div class="row" style="height: 10px; padding: 0; margin: 0;">' +
            '<div class="col s5" style="padding: 0; margin: 0"></div>' +
            '<div class="col s2" style="padding: 0; margin: 0">' +
            '<p class="center-align" style="background-color: #d6d5d5; color: #d6d5d5; border-radius: 2em; height: 4px;"></p>' +
            '</div>' +
            '<div class="col s5" style="padding: 0; margin: 0;"></div>' +
            '</div>' +
            '<div class="valign-wrapper" style="justify-content: space-between; display: flex; margin-top: 8px;  padding: 0 1em;">' +
            '<div id="triggerBackAction" class=exitSubjob">' +
            '<p class="center-align" style="color: #44a3f7">' +
            '<img src="<?= base_url(); ?>/assets/images/backbtn.png" width="15" height="10" alt="">' +
            '<span id="spanBack" class="backSubjob"> New Job 1</span></p>' +
            '</div>' +
            '<div style="margin-right: 4.4em;">' +
            ' <p id="titleHeaderModal" class="center-align titleModalSubjob">Add Sub Job</p>' +
            '</div>' +
            '<div>' +
            '<p id="addActionModal" class="center-align buttonAddSubjob" style="color: #44a3f7">Add</p>' +
            '</div>' +
            '</div>' +
            '</div>';
        $('.headerSubjob').html(header);

        // swipe action

        document.getElementById('swipeSubjob').addEventListener('touchstart', handleTouchStart, false);
        document.getElementById('swipeSubjob').addEventListener('touchmove', handleTouchMove, false);

        var xDown = null;
        var yDown = null;

        function getTouches(evt) {
            return evt.touches || // browser API
                evt.originalEvent.touches; // jQuery
        }

        function handleTouchStart(evt) {
            const firstTouch = getTouches(evt)[0];
            xDown = firstTouch.clientX;
            yDown = firstTouch.clientY;
        };

        function handleTouchMove(evt) {
            if (!xDown || !yDown) {
                return;
            }

            var xUp = evt.touches[0].clientX;
            var yUp = evt.touches[0].clientY;

            var xDiff = xDown - xUp;
            var yDiff = yDown - yUp;

            if (Math.abs(xDiff) > Math.abs(yDiff)) {
                /most significant/
                if (xDiff > 0) {
                    /* left swipe */
                } else {
                    /* right swipe */
                }
            } else {
                if (yDiff > 0) {
                    /* up swipe */
                } else {
                    /* down swipe */
                    $('#modalAddSubjob').modal('close');
                }
            }
            /* reset values */
            xDown = null;
            yDown = null;
        };

        // end swipe action
    }

    function saveTemplateSubjob(idForm) {
        var idJob = $('.idJobGroup').val();
        $('.idJobGroup1').val(idJob);
        $.ajax({
            type: 'POST',
            data: {
                idJob: idJob
            },
            url: '<?= base_url('jzl/MobileJob/saveTemplateSubjob'); ?>',
            dataType: 'json',
            success: function(result) {
                $('.fieldIdSubjob').val(result.idSubjob);
                $('.idSubjob1').val(result.idSubjob);
                $('#finalIdSubjob1' + idForm).val(result.idSubjob);
                $('#finalIdSubjob1' + idForm).attr('data-subjob-id', result.idJob);
                //clear field
                // var coadmincheck = $('.targetCoadmin1').val();
                // if (coadmincheck == '') {
                //     $('.targetBodySuperAdmin').html('');
                //     templateSwitch();
                // }

                // $('.spanApproval').text('Only you');
                // $('.spanDeadlineHour').text('Same');
                // $('.spanDeadlineHour').css({
                //     "color": "#d9d8d9"
                // });
                // $('.spanDeadlineDate').css({
                //     "color": "#d9d8d9"
                // });
                // $('.inputHour').val('09');
                // $('#previewImg').html('');
                // $('.notesField').val('');

                $('#pCode' + idForm).text(result.code);
                $('.codeSubjob').val(result.code);
            }
        })
    }

    function deleteSpan(idDelete) {
        var idSubjob = $('#finalIdSubjob1' + idDelete).val();
        var subjob = $('#manualSubjobField' + idDelete).val();

        var param = [];
        param[0] = idSubjob;
        param[1] = idDelete;

        slModal('Deleting data', 'This column has unstored data, are you sure to delete it?', 'question', {
            buttons: {
                confirmation: true,
                value: 'confirm',
                onclick: 'delete',
                params: param,
                function: 'deletingSpan'
            }
        })
    }

    function deletingSpan(idSubjob, idDelete) {
        $.ajax({
            type: "POST",
            data: {
                idSubjob: idSubjob
            },
            url: '<?= base_url('jzl/MobileJobUser/deleteSpan'); ?>',
            dataType: 'text',
            success: function(result) {
                if (result == 'success') {
                    //check array tr
                    var tr = $('tr[id="targetDelete"]').map(function() {
                        return $(this).attr('data-check');
                    }).toArray();


                    $('.targetDelete' + idDelete).remove();
                    $('.targetDeleteFinal' + idDelete).remove();

                    if (tr.length == 1) {
                        $('.targetConclusion').html('');
                    }

                    var check = $('tr[id="targetDelete"]').map(function() {
                        return $(this).attr('data-check');
                    }).toArray();

                    //change span number of subjob
                    $('.spanNumberSubjob').text(check.length);

                    $('#modalNotification').modal('close');
                }
            }
        })
    }

    function detailsSubjob(idForm) {
        $('#modalAddSubjob').modal('open');

        $('.addAssessorButton').attr('onclick', 'saveAssessor(' + idForm + ')');
        getHeaderSubjob();

        //add attribute to idSubjob1
        $('.idSubjob1').attr('id', 'idSubjob1' + idForm);

        //edit some field
        // $('.subjobField1').attr('id', 'subjobHelper' + idForm);
        $('.spanAssessor').attr('id', 'spanAssessor' + idForm);
        $('.targetAssessor1').attr('id', 'targetAssessor1' + idForm);
        $('.notesField').attr('id', 'notesField' + idForm);


        var idSubjob = $('#finalIdSubjob1' + idForm).val();

        var subjob = $('#manualSubjobField' + idForm).val();
        // if(subjob == '') {
        //   var subjob = $('.manualSubjobField').val();
        // }

        var purpose = $('#finalPurpose' + idForm).val();
        var deadlineDate = $('#finalDeadlineDate' + idForm).val();
        var deadlineHour = $('#finalDeadlineHour' + idForm).val();
        var remind = $('#finalRemind' + idForm).val();
        var stoppable = $('#finalStoppable' + idForm).val();
        var remindAlarm = $('#finalRemindAlarm' + idForm).val();
        var priority = $('#finalPriority' + idForm).val();
        var assessor = $('#finalAssessor' + idForm).val();
        var note = $('#finalNote' + idForm).val();

        //add id subjob
        $('.finalIdSubjob').val(idSubjob);
        $('#idSubjob1' + idForm).val(idSubjob);


        //add values to each subjob field
        $('.subjobField1').val(subjob);
        $('.purposeSubjob').val(purpose);

        //add onclick
        $('#triggerBackAction').attr('onclick', 'closeModalAddSubjob(' + idSubjob + ', ' + idForm + ')');
        $('.buttonAddSubjob').attr('onclick', 'saveSubjob(' + idForm + ')');

        //master image
        var toggleactive = '<img id="arrowDeadlineDate" src="<?= base_url(); ?>/assets/images/toggleactive.png" width="35" height="20" alt="">';
        var toggledefault = '<img id="arrowDeadlineDate" src="<?= base_url(); ?>/assets/images/toggledefault.png" width="35" height="20" alt="">';

        if (deadlineDate != '') {
            $('.deadlineDateField').val(deadlineDate);
            $('.collapDeadlineDate').collapsible('open');
            //change span
            var splitDate = deadlineDate.split('-');
            var d = new Date();
            d.setFullYear(splitDate[0]);
            d.setMonth((splitDate[1] - 1));
            d.setDate(splitDate[2]);

            var newDateFormat = d.toString().split(' ');
            $('.spanDeadlineDate').text(newDateFormat[2] + ' ' + newDateFormat[1]);

            //change toggle button
            $('.arrowDeadlineDate').html(toggleactive)
        }

        if (deadlineHour == '' || deadlineHour == ':') {

            $('.collapDeadlineHour').collapsible('close');
        } else {
            $('.collapDeadlineHour').collapsible('open');
            var splitTime = deadlineHour.split(':');
            $('.inputHour').val(splitTime[0]);
            $('.inputMinutes').val(splitTime[1]);

            changeSlider();
        }

        if (remind == '') {
            $('.collapRemind').collapsible('close');
        } else {
            $('.collapRemind').collapsible('open');
            var split = remind.split(',');
            getRemindTable(split, 'detail');

            if (stoppable != '' || stoppable != null) {
                $('.stoppable').val(stoppable);
                $('.stoppableToggle').html(toggleactive);
            }

            if (remindAlarm != '' && remindAlarm != null) {
                if (remindAlarm == 1) {
                    $('.selectedReminder').text('15 minutes before deadline');
                    $('#minutes').addClass('activeRemind');
                    $('.remindMinutes').val(remindAlarm);
                } else if (remindAlarm == 2) {
                    $('.selectedReminder').text('1 hour before deadline');
                    $('#hours').addClass('activeRemind');
                    $('.remindHours').val(remindAlarm);
                } else if (remindAlarm == 3) {
                    $('.selectedReminder').text('1 day before deadline');
                    $('#days').addClass('activeRemind')
                    $('.remindDays').val(remindAlarm);
                } else if (remindAlarm == 4) {
                    $('.selectedReminder').text('from start to finish');
                    $('#follow').addClass('activeRemind');
                    $('.remindFollow').val(remindAlarm);
                }
            }
        }

        if (priority != '') {
            $('.prioField').val(priority);
            $('.arrowPrio').html(toggleactive);
        }

        if (assessor != '') {
            $('#targetAssessor1' + idForm).val(assessor);
            var name = $('#finalAssessor' + idForm).attr('data-name-assessor');
            $('#spanAssessor' + idForm).text(name);
        }

        if (note != '') {
            $('#notesField' + idForm).val(note);
        }

    }

    function getRemindTable(idCrew, key) {
        $.ajax({
            type: 'POST',
            data: {
                remind: idCrew
            },
            url: '<?= base_url('jzl/MobileJob/saveRemind'); ?>',
            dataType: 'json',
            success: function(result) {
                //close modal addcrew
                $('#modalAddRemind').modal('close');

                //input target name to field
                $('.tableCrewRemind').removeAttr('hidden');

                var delBtn = '<?= base_url(); ?>/assets/images/delete.png';
                var hamburger = '<?= base_url(); ?>/assets/images/hamburger.png';
                var x = '';
                for (var i = 0; i < result.crewName.length; i++) {
                    x += '<tr class="trSelectedRemind' + i + '" style="border: none; color: #5e5e5e;">' +
                        '<td style="padding: 10px 5px;" onclick="deleteSelectedRemind(' + i + ')"><img src="' + delBtn + '" width="15" height="15"></td>' +
                        '<td style="border: none; font-size: 0.8em; font-weight: 200;">' + result.crewName[i] + '</td>' +
                        '<td class="right-align"><img src="' + hamburger + '" width="20" height="15"></td>' +
                        '<td hidden><input class="idSelectedRemind" name="idSelectedRemind" value="' + result.crewId[i] + '"></td>' +
                        '</tr>';
                }
                $('.targetRemindName').html(x);
                $('.parentRemind').removeAttr('hidden');

                if (key == 'save') {
                    $('.selectedReminder').text('15 minutes before deadline');
                    $('.remindMinutes').val(1);
                }

                $('td[id="targetCheckRemind"]').css({
                    "opacity": "0"
                });
                $('input[class="formCheckRemind"]').val('');

                $('.divStoppable').css({
                    "display": "block"
                });
            }
        })
    }

    function changeSubjobField1(idForm) {
        var subjob = $('#manualSubjobField' + idForm).val();
        $('#subjobField1' + idForm).val(subjob);
        $('#finalSubjob' + idForm).val(subjob);
    }

    function getConclusion() {
        var idJob = $('.idJobGroup').val();
        $.ajax({
            type: 'POST',
            data: {
                id: idJob
            },
            url: '<?= base_url('jzl/MobileJob/getConclusion'); ?>',
            dataType: 'json',
            success: function(result) {
                var tr = '';
                for (var i = 0; i < result.result.length; i++) {
                    tr += '<tr style="border: none; margin-left: 1em;" class="text-center">' +
                        '<td style="border: none; font-size: 0.8em; font-weight: 600; width: 3em; margin-left: 1em; color: #929293;">' + (i + 1) + '</td>' +
                        '<td style="border: none; font-size: 0.9em; font-weight: 400; width: 16em; color: #929293;">' + result.result[i].subjob + '</td>' +
                        '<td></td>' +
                        '<td style="font-size: 0.8em; color: #929293;"><i class="fas fa-ellipsis-h"></i></td>' +
                        '</tr>';
                }
                $('.tableConclusionSubjob').removeAttr('hidden');
                $('.targetConclusion').html(tr);
            }
        })
    }

    function init_modal_job() {

        $('#modalAddJob').modal({
            opacity: 0.5,
            inDuration: 200,
            outDuration: 200,
            ready: undefined,
            complete: undefined,
            dismissible: true,
            startingTop: '14%',
            endingTop: '70%',
            onOpenStart: function() {

                $.ajax({
                    type: "POST",
                    url: "<?= base_url('jzl/MobileJob/saveTemplateGroupJob'); ?>",
                    dataType: 'json',
                    success: function(result) {
                        //insert the id of Job Group
                        $('.idJobGroup').val(result.idJobGroup);
                        $('.jobTitle').val('');
                        $('.targetCoadmin1').val('');
                        $('.targetCoadmin').text('None');
                        $('.selectedCrew').text('0');
                        $('.selectedLeader').text('None')
                        $('.targetCrewName').html('');
                        $('.targetLeader').html('');
                        $('.spanNumberSubjob').text('0');
                    }
                })
            },
            onOpenEnd: function() {
                getConclusion();
            },
            onCloseStart: function() {

                var idJobGroup = $('.idJobGroup').val();
                $.ajax({
                    type: 'POST',
                    data: {
                        id: idJobGroup
                    },
                    url: '<?= base_url('jzl/MobileJob/deleteJobGroup'); ?>',
                    dataType: 'text',
                    success: function(result) {
                        if (result == 'failed') {
                            $('#modalAddJob').modal('close');
                        }
                    }
                })
            }
        });
    }

    function init_modal_crew() {

        $('#modalAddCrew').modal({
            opacity: 0.5,
            inDuration: 200,
            outDuration: 200,
            ready: undefined,
            complete: undefined,
            dismissible: true,
            startingTop: '14%',
            endingTop: '70%',
            onOpenStart: function() {
                getCrewCoadmin();


            },
            onOpenEnd: function() {
                // ----------------------------------------------- condition if crew was added recently -----------------------------------------------------

                var crew = $('input[name="idSelectedCrew"]').map(function() {
                    return $(this).val();
                }).toArray().filter(function(e) {
                    return e != null && e != '';
                });

                var pt = $('input[name="idSelectedPt"]').map(function() {
                    return $(this).val();
                }).toArray().filter(function(e) {
                    return e != null && e != '';
                });

                for (var i = 0; i < crew.length; i++) {
                    $('input[data-hidden-id-crew=" ' + crew[i] + ' "]').val(crew[i]);
                    $('input[data-hidden-id-pt=" ' + pt[i] + ' "]').val(pt[i]);
                }

                if (crew.length != 0) {
                    for (var i = 0; i < crew.length; i++) {
                        $('td[data-id-crew="' + crew[i] + '"]').css({
                            "opacity": "1"
                        });
                    }
                }
            }
        })
    }


    function init_modal_subjob() {

        $('#modalAddSubjob').modal({
            opacity: 0.5,
            inDuration: 200,
            outDuration: 200,
            ready: undefined,
            complete: undefined,
            dismissible: true,
            startingTop: '14%',
            endingTop: '70%',
            onOpenStart: function() {
                $('.triggerBackAction').attr('href', '#modalAddJob');
                $('.titleHeaderModal').text('Add Sub Job');

                var idJob = $('.idJobGroup').val();
                $('.idJobGroup1').val(idJob);
            }
        });
    }

    function init_modal_change_password() {

        $('#modalChangePassword').modal({
            opacity: 0.5,
            inDuration: 200,
            outDuration: 200,
            ready: undefined,
            complete: undefined,
            dismissible: true,
            startingTop: '14%',
            endingTop: '70%',
            onOpenStart: function() {
                $('.triggerBackAction').attr('href', '#modalAddJob');
                $('.titleHeaderModal').text('Add Sub Job');

                var idJob = $('.idJobGroup').val();
                $('.idJobGroup1').val(idJob);
            }
        });
    }

    function templateSwitch() {
        var tr = '<tr>' +
            '<td style="width: 0.8em;">' +
            ' <p style="border: 0.4px solid #d8d7d8; border-radius: 1.4em; font-size: 0.3em; padding: 0.3em 0.5em; color: #d8d7d8;">1</p>' +
            '</td>' +
            '<td style="width: 14em; padding: 0;">' +
            '<p style="color: #939392; font-size: 0.7em; margin-left: 1.5em;">You</p>' +
            '<input type="text" hidden class="coadminField" name="coadminField" id="masterAdmin1" value="1">' +
            '</td>' +
            '<td style="width: 2em; padding: 0;"><span data-change="toggleActive" class="spanSwitchOrder" data-name="You" data-id="1" onclick="switchOrder(1)"><img src="<?= base_url(); ?>assets/images/toggleactive.png" width="35" height="20" alt=""></span></td>' +
            '</tr>';

        $('.targetBodySuperAdmin').html(tr);
    }

    function init_modal_assessor() {

        $('#modalAddAssessor').modal({
            opacity: 0.5,
            inDuration: 200,
            outDuration: 200,
            ready: undefined,
            complete: undefined,
            dismissible: true,
            startingTop: '14%',
            endingTop: '70%'
        });
    }

    function init_modal_remind() {

        $('#modalAddRemind').modal({
            opacity: 0.5,
            inDuration: 200,
            outDuration: 200,
            ready: undefined,
            complete: undefined,
            dismissible: true,
            startingTop: '14%',
            endingTop: '70%',
            onOpenStart: function() {

                var remind = $('.idSelectedRemind').map(function() {
                    return $(this).val();
                }).toArray();

                if (remind != '' || remind != undefined) {
                    for (var i = 0; i < remind.length; i++) {
                        $('#targetCheckRemind' + remind[i]).css({
                            "opacity": 1
                        });
                    }
                }
            },
        });
    }

    function init_modal_coadmin() {

        $('#modalAddCoadmin').modal({
            opacity: 0.5,
            inDuration: 100,
            outDuration: 200,
            ready: undefined,
            complete: undefined,
            dismissible: true,
            startingTop: '14%',
            endingTop: '70%',
            onOpenStart: function() {
                $('#modalAddCoadmin').css({
                    "left": "0"
                });
                var recentCoadmin = $('.targetCoadmin1').val();

                if (recentCoadmin != '') {
                    $('td[id=c' + recentCoadmin + ']').html('<img src="<?= base_url(); ?>assets/images/radiochecked.png" width="15" height="15">');
                    $('.targetIdCoadmin' + recentCoadmin).val(recentCoadmin);
                }
            },
            onCloseStart: function() {
                $('#modalAddCoadmin').css({
                    "left": "100%"
                });
            }
        });
    }

    function init_modal_viewJob() {

        $('#modalViewJob').modal({
            opacity: 0.5,
            inDuration: 100,
            outDuration: 200,
            ready: undefined,
            complete: undefined,
            dismissible: true,
            startingTop: '14%',
            endingTop: '70%',
            onOpenStart: function() {
                $('#modalViewJob').css({
                    "left": "0"
                });
            },
            onCloseStart: function() {
                $('#modalViewJob').css({
                    "left": "100%"
                });
            },
            onCloseEnd: function() {
                getListIndex();
            }
        });
    }

    function init_modal_showSubjob() {

        $('#modalShowSubjob').modal({
            opacity: 0.5,
            inDuration: 200,
            outDuration: 200,
            ready: undefined,
            complete: undefined,
            dismissible: true,
            startingTop: '14%',
            endingTop: '70%',
            onCloseStart: function() {
                getListIndex();
                // clearInterval(getButtonAction());
            }
        });
    }

    function changeTitle() {
        var title = $('.jobTitle').val();
        var strLen = title.substring(0, 11);
        $('.addJobTitle').text(strLen);
    }

    // function showFieldSubjob() {
    //     $('.tableConclusionSubjob').css({
    //         "height": "100%"
    //     });

    //     var tr = '<tr style="border: none; margin-left: 1em;" class="text-center">' +
    //         '<td class="numberTab" style="border: none; font-size: 0.8em; font-weight: 600; width: 3em; margin-left: 1em; color: #929293;">1</td>' +
    //         '<td class="subjobTab" style="border: none; font-size: 0.9em; font-weight: 400; width: 11em; color: #929293;"></td>' +
    //         '<td style="border: none; font-size: 0.9em; font-weight: 400; width: 6em; color: #929293;">No deadline</td>' +
    //         '<td style="font-size: 0.8em; color: #929293;"><i class="fas fa-ellipsis-h"></i></td>' +
    //         '<td hidden><input type="text" class="finalIdSubjob1" value="' + idSubjob + '"></td>' +
    //         '<td hidden><input type="text" class="finalSubjob" value="' + subjob + '"></td>' +
    //         '<td hidden><input type="text" class="finalPurpose" value="' + purpose + '"></td>' +
    //         '<td hidden><input type="text" class="finalDeadlineDate" value="' + deadlineDate + '"></td>' +
    //         '<td hidden><input type="text" class="finalDeadlineHour" value="' + deadlineHour + '"></td>' +
    //         '<td hidden><input type="text" class="finalRemind" value="' + remind + '"></td>' +
    //         '<td hidden><input type="text" class="finalAssessor" value="' + assessor + '"></td>' +
    //         '<td hidden><input type="text" class="finalCode" value="' + code + '"></td>' +
    //         '<td hidden><input type="text" class="finalCoadmin" value="' + coadmin + '"></td>' +
    //         '<td hidden><input type="text" class="finalPriority" value="' + priority + '"></td>' +
    //         '<td hidden><input type="text" class="finalNote" value="' + note + '"></td>' +
    //         '</tr>';
    //     $('.targetConclusion').html(tr);
    // }

    function closeModalAddJob() {
        $('#modalAddJob').modal('close');
    }

    function closeModalAddCrew() {
        $('#modalAddCrew').modal('close');
    }

    function closeModalAddSubjob(idSubjob, idForm) {

        var param = [];
        param[0] = idSubjob;
        param[1] = idForm;

        slModal('Exit Subjob', 'By closing this page, the filled data will be deleted, are you sure?', 'question', {
            buttons: {
                confirmation: true,
                value: 'confirm',
                onclick: 'delete',
                params: param,
                function: 'deleteCloseSubjob'
            }
        })
    }

    function deleteCloseSubjob(idSubjob, idForm) {

        $.ajax({
            type: 'POST',
            data: {
                idSubjob: idSubjob
            },
            url: '<?= base_url('jzl/MobileJob/emptySubjob'); ?>',
            dataType: 'text',
            success: function(result) {
                if (result == 'success') {
                    $('#modalAddSubjob').modal('close');
                    $('#manualSubjobField' + idForm).val('');
                    $('#modalNotification').modal('close');
                }
            }
        });

    }

    function getCrew() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('jzl/MobileJob/getCrew'); ?>',
            dataType: 'text',
            success: function(result) {
                $('.targetAddCrew').html(result);
            }
        })
    }

    function getListIndex() {
        $.ajax({
            type: "POST",
            url: '<?= base_url('jzl/MobileJob/getListIndex'); ?>',
            dataType: 'json',
            success: function(result) {
                console.log(result)
                if (result.result != 0) {
                    var idMaster = '<?= $_SESSION['id']; ?>';
                    $('.targetActiveJob').text(result.active);
                    $('.targetWaitingJob').text(result.waiting);
                    $('.targetFailedJob').text(result.failed);
                    $('.targetPrioJob').text(result.priority);

                    // -------------------- icon ------------------------ //

                    var waitingImg = '<img src="<?= base_url(); ?>/assets/images/waiting.png" width="30" height="30">';
                    var waitingImgActive = '<img src="<?= base_url(); ?>/assets/images/waitingactive.png" width="30" height="30">';
                    var prioImg = '<img src="<?= base_url(); ?>/assets/images/prio.png" width="30" height="30" alt="">';
                    var prioImgActive = '<img src="<?= base_url(); ?>/assets/images/prio1.png" width="30" height="30" alt="">';
                    var failedImg = '<img src="<?= base_url(); ?>/assets/images/failed.png" width="30" height="30" alt="">';
                    var failedImgActive = '<img src="<?= base_url(); ?>/assets/images/failedactive.png" width="30" height="30" alt="">';
                    if (result.waiting != 0) {

                        $('.waitingField').html(waitingImgActive);
                    } else {
                        $('.waitingField').html(waitingImg);
                    }

                    if (result.priority != 0) {
                        $('.prioField').html(prioImgActive);
                    } else {
                        $('.prioField').html(prioImg);
                    }

                    if (result.failed != 0) {
                        $('.failedField').html(failedImgActive);
                    } else {
                        $('.failedField').html(failedImg);
                    }

                    // -------------------- icon ------------------------ //

                    // ------------------------------------------------------- main table ------------------------------------------------------- //


                    var tr = '';
                    for (var i = 0; i < result.result.length; i++) {
                        if (result.isUser[i] == '1') {
                            var user = "'user'";
                            var onclick = 'showSubjob(' + result.result[i].subjobId + ', ' + user + ')';
                        } else {
                            var user = "'assessor'";
                            var onclick = 'showSubjobAssessor(' + result.result[i].subjobId + ', ' + user + ')';
                        }

                        if (result.result[i].deadline == 0 || result.result[i].deadline == '') {
                            var deadline = '';
                        } else {
                            var deadline = result.result[i].deadline;
                        }

                        tr += '<tr data-tr-key="1" class="trFill" style="border: none;" onclick="' + onclick + '">' +
                            '<td class="tdNoIndex" style="width: 1.5em; padding: 12px 5px; color: #5e5e5e; font-family: var(--sfpd-regular); font-size: 0.8em;">' + (i + 1) + '</td>' +
                            '<td class="tdBadgeIndex" style="border-bottom: 2px solid #eaeaea !important; padding: 12px 5px; width: 2em;"><span id="spanBadgeIndex' + i + '">succ</span></td>' +
                            '<td class="tdTitleIndex">' +
                            '<p style="color: #919191; text-transform: uppercase; font-family: var(--sfpd-medium);">' + result.result[i].title + '</p>' +
                            '<p id="deadlineIndex' + i + '" style="color: #919191; font-size: 0.6em; font-family: var(--sfpd-light);">' + deadline + '</p>' +
                            '</td>' +
                            '<td class="tdSubjobIndex" style="border-bottom: 2px solid #eaeaea !important; padding: 12px 5px; width: 7em; text-align: right; color: #919191; font-size: 0.7em; font-family: var(--sfpd-regular); text-overflow: ellipsis; white-space: nowrap; overflow: hidden; max-width: 7em;">' + result.result[i].subjob + '</td>' +
                            '<td onclick="' + onclick + '" class="right-align tdArrowIndex" style="color: #c2c2c2; padding: 12px 5px; font-size: 0.9em; border-bottom: 2px solid #eaeaea !important; width: 1.3em;"><img src="<?= base_url(); ?>/assets/images/downarrow.png" width="10" height="10" style="transform: rotate(-90deg);"></td>' +
                            '</tr>';
                    }

                    $('.targetBodyJob').html(tr);

                    if (result.result.length < 4) {
                        var appen = '';
                        for (var x = result.result.length; x < 4; x++) {
                            appen += '<tr style="border: none;">' +
                                '<td class="tdNoIndex" style="width: 1.5em; color: #5e5e5e; font-family: var(--sfpd-regular); font-size: 0.8em;">' + (x + 1) + '</td>' +
                                '<td class="tdBadgeIndex" style="border-bottom: 1px solid #eaeaea !important;"></td>' +
                                '<td class="tdTitleIndex"></td>' +
                                '<td class="tdSubjobIndex" style="border-bottom: 1px solid #eaeaea !important;"></td>' +
                                '<td class="right-align tdArrowIndex" style="color: #c2c2c2; font-size: 0.9em; padding: 12px 5px; border-bottom: 2px solid #eaeaea !important; width: 2em;"><img src="<?= base_url(); ?>/assets/images/downarrow.png" width="10" height="10" style="transform: rotate(-90deg);"></td>' +
                                '</tr>';
                        }
                        $('.targetBodyJob').append(appen);
                    }

                    // ------------------------------------------------------- main table ------------------------------------------------------- //


                    // -------------------- badge ------------------------ //

                    for (var b = 0; b < result.result.length; b++) {

                        if (result.status[b] == 1 && result.isAdmin[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isWaitFillBadge');
                        } else if (result.status[b] == 1 && result.isCoadmin[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isWaitFillBadge');
                        } else if (result.status[b] == 1 && result.isAssessor[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isWaitFillBadge');
                        } else if (result.status[b] == 1 && result.result[b].priorityStatus == 1 && result.isUser[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveFillBadgePrio');
                        } else if (result.status[b] == 1 && result.result[b].priorityStatus == 0 && result.isUser[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveFillBadge');
                        } else if (result.status[b] == 2 && result.isAdmin[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isWaitFillBadge');
                        } else if (result.status[b] == 2 && result.isCoadmin[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isWaitFillBadge');
                        } else if (result.status[b] == 2 && result.result[b].priorityStatus == 1 && result.isAssessor[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveFillBadgePrio');
                        } else if (result.status[b] == 2 && result.result[b].priorityStatus == 0 && result.isAssessor[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveFillBadge');
                        } else if (result.status[b] == 2 && result.result[b].priorityStatus == 1 && result.isUser[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveOutlineBadgePrio');
                        } else if (result.status[b] == 2 && result.result[b].priorityStatus == 0 && result.isUser[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveOutlineBadge');
                        } else if (result.status[b] == 3 && result.isAdmin[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isWaitFillBadge');
                        } else if (result.status[b] == 3 && result.result[b].priorityStatus == 1 && result.isCoadmin[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveFillBadgePrio');
                        } else if (result.status[b] == 3 && result.result[b].priorityStatus == 0 && result.isCoadmin[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveFillBadge');
                        } else if (result.status[b] == 3 && result.result[b].priorityStatus == 1 && result.isAssessor[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveOutlineBadgePrio');
                        } else if (result.status[b] == 3 && result.result[b].priorityStatus == 0 && result.isAssessor[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveOutlineBadge');
                        } else if (result.status[b] == 3 && result.result[b].priorityStatus == 1 && result.isUser[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveOutlineBadgePrio');
                        } else if (result.status[b] == 3 && result.result[b].priorityStatus == 0 && result.isUser[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveOutlineBadge');
                        } else if (result.status[b] == 4 && result.result[b].priorityStatus == 1 && result.isAdmin[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveFillBadgePrio');
                        } else if (result.status[b] == 4 && result.result[b].priorityStatus == 0 && result.isAdmin[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveFillBadge');
                        } else if (result.status[b] == 4 && result.result[b].priorityStatus == 1 && result.isCoadmin[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveOutlineBadgePrio');
                        } else if (result.status[b] == 4 && result.result[b].priorityStatus == 0 && result.isCoadmin[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveOutlineBadge');
                        } else if (result.status[b] == 4 && result.result[b].priorityStatus == 1 && result.isAssessor[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveOutlineBadgePrio');
                        } else if (result.status[b] == 4 && result.result[b].priorityStatus == 0 && result.isAssessor[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveOutlineBadge');
                        } else if (result.status[b] == 4 && result.result[b].priorityStatus == 1 && result.isUser[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveOutlineBadgePrio');
                        } else if (result.status[b] == 4 && result.result[b].priorityStatus == 0 && result.isUser[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveOutlineBadge');
                        } else if (result.status[b] == 5 && result.isAdmin[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isFailedOutlineBadge');
                        } else if (result.status[b] == 5 && result.isCoadmin[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isFailedOutlineBadge');
                        } else if (result.status[b] == 5 && result.isAssessor[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isFailedOutlineBadge');
                        } else if (result.status[b] == 5 && result.isUser[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isFailedFillBadge');
                        } else if (result.status[b] == 61 && result.result[b].priorityStatus == 1 && result.isAdmin[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveFillBadgePrio');
                        } else if (result.status[b] == 61 && result.result[b].priorityStatus == 0 && result.isAdmin[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveFillBadge');
                        } else if (result.status[b] == 61 && result.isCoadmin[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isWaitFillBadge');
                        } else if (result.status[b] == 61 && result.isAssessor[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isWaitFillBadge');
                        } else if (result.status[b] == 61 && result.isUser[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isWaitFillBadge');
                        } else if (result.status[b] == 62 && result.isAdmin[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isWaitFillBadge');
                        } else if (result.status[b] == 62 && result.result[b].priorityStatus == 1 && result.isCoadmin[b]) {
                            $('#spanBadgeIndex' + b).addClass('isActiveFillBadgePrio');
                        } else if (result.status[b] == 62 && result.result[b].priorityStatus == 0 && result.isCoadmin[b]) {
                            $('#spanBadgeIndex' + b).addClass('isActiveFillBadge');
                        } else if (result.status[b] == 62 && result.isAssessor[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isWaitFillBadge');
                        } else if (result.status[b] == 62 && result.isUser[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isWaitFillBadge');
                        } else if (result.status[b] == 63 && result.isAdmin[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isWaitFillBadge');
                        } else if (result.status[b] == 63 && result.isCoadmin[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isWaitFillBadge');
                        } else if (result.status[b] == 63 && result.result[b].priorityStatus == 1 && result.isUser[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isWaitFillBadge');
                        } else if (result.status[b] == 63 && result.result[b].priorityStatus == 0 && result.isUser[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isWaitFillBadge');
                        } else if (result.status[b] == 63 && result.result[b].priorityStatus == 1 && result.isAssessor[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveFillBadgePrio');
                        } else if (result.status[b] == 63 && result.result[b].priorityStatus == 0 && result.isAssessor[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveFillBadge');
                        } else if (result.status[b] == 6 && result.result[b].priorityStatus == 1 && result.isAdmin[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveFillBadgePrio');
                        } else if (result.status[b] == 6 && result.result[b].priorityStatus == 0 && result.isAdmin[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveFillBadgePrio');
                        } else if (result.status[b] == 6 && result.isUser[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isWaitFillBadge');
                        } else if (result.status[b] == 7 && result.isAdmin[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isWaitFillBadge');
                        } else if (result.status[b] == 7 && result.isCoadmin[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isWaitFillBadge');
                        } else if (result.status[b] == 7 && result.isAssessor[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isWaitFillBadge');
                        } else if (result.status[b] == 7 && result.result[b].priorityStatus == 1 && result.isUser[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveFillBadgePrio');
                        } else if (result.status[b] == 7 && result.result[b].priorityStatus == 0 && result.isUser[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isActiveFillBadge');
                        } else if (result.status[b] == 8 && result.isAdmin[b] == 1 || result.isCoadmin[b] == 1 || result.isAssessor[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isWaitFillBadge');
                        } else if (result.status[b] == 8 && result.isUser[b] == 1) {
                            $('#spanBadgeIndex' + b).addClass('isFailedFillBadge');
                        }
                        // else {
                        //     $('#spanBadgeIndex' + b).addClass('isWaitFillBadge');
                        // }
                    }

                    // -------------------- badge ------------------------ //

                    // reminder
                    showAlarm();

                } else {
                    var waitingImg = '<img src="<?= base_url(); ?>/assets/images/waiting.png" width="30" height="30">';
                    var waitingImgActive = '<img src="<?= base_url(); ?>/assets/images/waitingactive.png" width="30" height="30">';
                    var prioImg = '<img src="<?= base_url(); ?>/assets/images/prio.png" width="30" height="30" alt="">';
                    var prioImgActive = '<img src="<?= base_url(); ?>/assets/images/prio1.png" width="30" height="30" alt="">';
                    var failedImg = '<img src="<?= base_url(); ?>/assets/images/failed.png" width="30" height="30" alt="">';
                    var failedImgActive = '<img src="<?= base_url(); ?>/assets/images/failedactive.png" width="30" height="30" alt="">';

                    $('.waitingField').html(waitingImg);
                    $('.prioField').html(prioImg);
                    $('.failedField').html(failedImg);

                    $('.targetActiveJob').text(0);
                    $('.targetWaitingJob').text(0);
                    $('.targetFailedJob').text(0);
                    $('.targetPrioJob').text(0);

                    var appen = '';
                    for (var x = 0; x < 4; x++) {
                        appen += '<tr style="border: none;" id="targetAlarm' + x + '">' +
                            '<td class="tdNoIndex" style="width: 1.5em; padding: 12px 5px; color: #5e5e5e; font-weight: 700; font-size: 0.8em;">' + (x + 1) + '</td>' +
                            '<td class="tdBadgeIndex" style="border-bottom: 2px solid #eaeaea !important; padding: 12px 5px; width: 2em;"></td>' +
                            '<td class="tdTitleIndex"></td>' +
                            '<td class="tdSubjobIndex" style="border-bottom: 2px solid #eaeaea !important; padding: 12px 5px; color: #919191; font-size: 0.8em; font-weight: 300;"></td>' +
                            '<td class="right-align tdArrowIndex" style="color: #c2c2c2; font-size: 0.9em; padding: 12px 5px; border-bottom: 2px solid #eaeaea !important; width: 2em;"><img src="<?= base_url(); ?>/assets/images/downarrow.png" width="10" height="10" style="transform: rotate(-90deg);"></td>' +
                            '</tr>';
                    }
                    $('.targetBodyJob').append(appen);

                    // reminder
                    showAlarm();
                }
            }
        })
    }

    function showDetailSubjob() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('jzl/MobileJob/showDetailSubjob'); ?>',
            dataType: 'text',
            success: function(result) {
                $('.targetAddSubjob').html(result);
                init_modal_subjob();
            }
        })
    }

    function showDetailAssessor() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('jzl/MobileJob/showDetailAssessor'); ?>',
            dataType: 'text',
            success: function(result) {
                $('.targetAddAssessor').html(result);
            }
        })
    }

    function showDetailRemind() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('jzl/MobileJob/showDetailRemind'); ?>',
            dataType: 'text',
            success: function(result) {
                $('.targetAddRemind').html(result);
            }
        })
    }

    function showDetailCoadmin() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('jzl/MobileJob/showDetailCoadmin'); ?>',
            dataType: 'text',
            success: function(result) {
                $('.targetAddCoadmin').html(result);
            }
        })
    }

    function saveTitle() {
        var title = $('.jobTitle').val();
        var idGroup = $('.idJobGroup').val();

        $.ajax({
            type: 'POST',
            data: {
                title: title,
                id: idGroup
            },
            url: '<?= base_url('jzl/MobileJob/saveTitle'); ?>',
            dataType: 'text',
            success: function(result) {
                if (result == 'success') {
                    return true;
                }
            }
        })
    }

    function saveJobs(origin = '', originId = '') {
        // -------------------- job group ------------------------ //
        if (originId == '') {

            var idJob = $('.idJobGroup').val();

        } else {

            var idJob = originId;

        }

        var crew = $('input[name="idSelectedCrew"]').map(function() {
            return $(this).val();
        }).toArray().filter(function(e) {
            return e != null && e != '';
        });
        var coadminHelper = $('.targetCoadmin1').map(function() {
            return $(this).val();
        }).toArray();
        var leader = $('input[name="idSelectedLeader"]').map(function() {
            return $(this).val();
        }).toArray().filter(function(e) {
            return e != null && e != '' && e != 0;
        });
        var title = $('.jobTitle').val();
        // -------------------- end job group ------------------------ //

        // -------------------- subjob ------------------------ //

        var idSubjob = $('input[class="finalIdSubjob1"]').map(function() {
            return $(this).val();
        }).toArray();
        var subjob = $('input[class="manualSubjobField"]').map(function() {
            return $(this).val();
        }).toArray();
        var purpose = $('input[class="finalPurpose"]').map(function() {
            return $(this).val();
        }).toArray();
        var deadlineDate = $('input[class="finalDeadlineDate"]').map(function() {
            return $(this).val();
        }).toArray();
        var deadlineHour = $('input[class="finalDeadlineHour"]').map(function() {
            return $(this).val();
        }).toArray();
        var remind = $('input[class="finalRemind"]').map(function() {
            return $(this).val();
        }).toArray();
        var assessor = $('input[class="finalAssessor"]').map(function() {
            return $(this).val();
        }).toArray();
        var coadmin = $('input[class="finalCoadmin"]').map(function() {
            return $(this).val();
        }).toArray();
        var priority = $('input[class="finalPriority"]').map(function() {
            return $(this).val();
        }).toArray();
        var note = $('input[class="finalNote"]').map(function() {
            return $(this).val();
        }).toArray();
        var stoppable = $('input[class="finalStoppable"]').map(function() {
            return $(this).val();
        }).toArray();
        var remindAlarm = $('input[class="finalRemindAlarm"]').map(function() {
            return $(this).val();
        }).toArray();
        // -------------------- subjob ------------------------ //


        if (subjob.includes('') == true) {

            slModal('Failed', 'Subjob cannot be null', 'warning', {
                buttons: false,
                timer: 1500
            });

        } else {

            if (title == '') {
                slModal('Failed', 'Title cannot be null', 'warning', {
                    buttons: false,
                    timer: 1500
                });
            } else if (crew.length == 0) {
                slModal('Failed', 'Crew cannot be null', 'warning', {
                    buttons: false,
                    timer: 1500
                });
            } else if (leader.length == 0) {
                slModal('Failed', 'Leader cannot be null', 'warning', {
                    buttons: false,
                    timer: 1500
                });
            } else if (subjob.length == 0) {
                slModal('Failed', 'Subjob cannot be null', 'warning', {
                    buttons: false,
                    timer: 1500
                });
            } else {
                $.ajax({
                    type: "POST",
                    data: {
                        idJob: idJob,
                        idSubjob: idSubjob,
                        subjob: subjob,
                        purpose: purpose,
                        deadlineDate: deadlineDate,
                        deadlineHour: deadlineHour,
                        remind: remind,
                        assessor: assessor,
                        title: title,
                        crew: crew,
                        leader: leader,
                        coadmin: coadmin,
                        coadminHelper: coadminHelper,
                        priority: priority,
                        note: note,
                        stoppable: stoppable,
                        remindAlarm: remindAlarm,
                        origin: origin
                    },
                    url: '<?= base_url('jzl/MobileJob/saveJobs'); ?>',
                    dataType: 'text',
                    beforeSend: function() {
                        slLoading();
                    },
                    success: function(result) {
                        $('#modalLoading').modal('close');
                        if (result == 'success') {
                            getListIndex();
                            $('.targetConclusion').html('');
                            $('#modalAddJob').modal('close');
                        }
                    }
                })
            }

        }

    }

    function showSubjob(idSubjob, key) {
        $.ajax({
            type: "POST",
            data: {
                idSubjob: idSubjob,
                key: key
            },
            url: '<?= base_url('jzl/MobileJob/showSubjob/'); ?>',
            dataType: 'json',
            beforeSend: function() {

                slLoading();

            },
            success: function(result) {
                console.log(result)
                return false;
                $('#modalLoading').modal('close');
                $('.targetShowSubjob').html(result);
                $('#modalShowSubjob').modal('open');

            }
        })
    }

    function showSubjobAssessor(idSubjob, key, actionKey) {
        $.ajax({
            type: "POST",
            data: {
                idSubjob: idSubjob,
                key: key,
                action: actionKey
            },
            url: '<?= base_url('jzl/MobileJob/showSubjob'); ?>',
            dataType: 'text',
            beforeSend: function() {
                slLoading();
            },
            success: function(result) {
                $('#modalLoading').modal('close');
                $('.targetShowSubjob').html(result);
                $('#modalShowSubjob').modal('open');
            }
        })
    }

    function closeModalShowSubjob() {
        $('#modalShowSubjob').modal('close');
        getListIndex();
    }

    function getArchive() {
        $.ajax({
            type: "POST",
            url: '<?= base_url('jzl/MobileJob/getArchive'); ?>',
            dataType: 'json',
            success: function(result) {

                if (result.rows > 0) {

                    var tr = '';
                    for (var i = 0; i < result.deadline.length; i++) {

                        if (result.deadline[i] == 0) {
                            var deadline = '';
                        } else {
                            var deadline = result.deadline[i];
                        }

                        if (result.title[i] == 0) {
                            var title = ''
                        } else {
                            var title = result.title[i];
                        }

                        if (result.subjob[i] == 0) {
                            var subjob = '';
                        } else {
                            var subjob = result.subjob[i];
                        }

                        //onclick
                        var user = "'assessor'";
                        var onclick = 'showSubjobAssessor(' + result.idSubjob[i] + ', ' + user + ')';

                        tr += '<tr style="border: none;" onclick="' + onclick + '">' +
                            '<td style="width: 1.5em; color: #5e5e5e; font-weight: 700; font-size: 0.8em;">' +
                            '</td>' +
                            '<td style="border-bottom: 1px solid #eaeaea !important; padding: 12px 5px; width: 13em;">' +
                            '<p style="color: #919191; text-transform: uppercase; font-weight: bolder;">' + title + '</p>' +
                            '<p id="deadlineIndex' + i + '" style="color: #919191; font-size: 0.6em; font-weight: 300;">' + deadline + '</p>' +
                            '</td>' +
                            '<td style="border-bottom: 1px solid #eaeaea !important; padding: 12px 5px; width: 7em; text-align: right; color: #919191; font-size: 0.7em; font-weight: 300; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; max-width: 7em;">' + subjob + '</td>' +
                            '<td class="right-align" style="color: #c2c2c2; font-size: 0.9em; padding: 12px 5px; border-bottom: 1px solid #eaeaea !important; width: 2em;"><img src="<?= base_url(); ?>/assets/images/downarrow.png" width="10" height="10" style="transform: rotate(-90deg);"></td>' +
                            '</tr>';
                    }
                    $('.targetArchive').html(tr);

                    if (result.deadline.length < 4) {
                        var appen = '';
                        for (var x = result.deadline.length; x < 4; x++) {
                            appen += '<tr style="border: none;">' +
                                '<td style="width: 1.5em; color: #5e5e5e; font-weight: 700; font-size: 0.8em;">' +
                                '<p>' + (x + 1) + '</p>' +
                                '</td>' +
                                '<td style="border-bottom: 1px solid #eaeaea !important;"></td>' +
                                '<td style="border-bottom: 1px solid #eaeaea !important;"></td>' +
                                '<td class="right-align" style="color: #c2c2c2; font-size: 0.9em; padding: 12px 5px; border-bottom: 2px solid #eaeaea !important; width: 2em;"><img src="<?= base_url(); ?>/assets/images/downarrow.png" width="10" height="10" style="transform: rotate(-90deg);"></td>' +
                                '</tr>';
                        }
                        $('.targetArchive').append(appen);
                    }

                } else {

                    var appen = '';
                    for (var x = 0; x < 4; x++) {
                        appen += '<tr style="border: none;">' +
                            '<td style="width: 1.5em; color: #5e5e5e; font-weight: 700; font-size: 0.8em;">' +
                            '<p>' + (x + 1) + '</p>' +
                            '</td>' +
                            '<td style="border-bottom: 1px solid #eaeaea !important;"></td>' +
                            '<td style="border-bottom: 1px solid #eaeaea !important;"></td>' +
                            '<td class="right-align" style="color: #c2c2c2; font-size: 0.9em; padding: 12px 5px; border-bottom: 2px solid #eaeaea !important; width: 2em;"><img src="<?= base_url(); ?>/assets/images/downarrow.png" width="10" height="10" style="transform: rotate(-90deg);"></td>' +
                            '</tr>';
                    }
                    $('.targetArchive').append(appen);

                }

            }
        })
    }

    function showViewSubjob() {
        $.ajax({
            type: "POST",
            url: '<?= base_url('jzl/MobileJobView/index'); ?>',
            dataType: 'text',
            success: function(result) {
                $('.targetViewJob').html(result);
            }
        })
    }

    function showAlarm() {
        var idMaster = '<?= $_SESSION['id']; ?>';
        $.ajax({
            type: "POST",
            data: {
                id: idMaster
            },
            url: '<?= base_url('jzl/MobileJobUser/showAlarm'); ?>',
            dataType: 'json',
            success: function(result) {

                if (result.message != 'not found') {

                    var tr = $('tr[class="trFill"]').map(function() {
                        return $(this).attr('data-tr-key');
                    }).toArray();

                    //validation



                    for (var i = 0; i < result.idSubjob.length; i++) {

                        var user = "'assessor'";
                        var keyAction = "'reminder'";
                        var onclick = 'showSubjobAssessor(' + result.idSubjob[i] + ', ' + user + ', ' + keyAction + ')';

                        if ($('tr[class="alarm' + i + '"]').attr('id') != 'alarm' + i) {

                            if (tr.length > 0) {

                                var table = document.getElementById('myTable');
                                var row = table.insertRow((tr.length + i + 1));
                                var cell1 = row.insertCell(0);
                                var cell2 = row.insertCell(1);
                                var cell3 = row.insertCell(2);
                                var cell4 = row.insertCell(3);
                                var cell5 = row.insertCell(4);

                                cell1.innerHTML = (tr.length + i + 1);
                                cell2.innerHTML = "<span class='isActiveFillBadge'>succ</span>";
                                cell3.innerHTML = '<p style="color: #919191; text-transform: uppercase; font-weight: bolder;">' + result.title[i] + '</p>' +
                                    '<p id="deadlineIndex' + i + '" style="color: #919191; font-size: 0.6em; font-weight: 300;">' + result.deadlineFix[i] + '</p>';
                                cell4.innerHTML = result.subjob[i];
                                cell5.innerHTML = '<img src="<?= base_url(); ?>/assets/images/downarrow.png" width="10" height="10" style="transform: rotate(-90deg);">';

                                $(table.rows[(tr.length + i + 1)].cells[0]).addClass("tdNo");
                                $(table.rows[(tr.length + i + 1)].cells[1]).addClass("tdBadge");
                                $(table.rows[(tr.length + i + 1)].cells[2]).addClass("tdJob");
                                $(table.rows[(tr.length + i + 1)].cells[3]).addClass("tdSubjob");
                                $(table.rows[(tr.length + i + 1)].cells[4]).addClass("tdArrow");
                                $(table.rows[(tr.length + i + 1)]).attr("onclick", onclick);
                                $(table.rows[(tr.length + i + 1)]).attr("id", 'alarm' + i);
                                $(table.rows[(tr.length + i + 1)]).attr("class", 'alarm' + i);

                            } else {

                                var table = document.getElementById('myTable');
                                var row = table.insertRow((i + 1));
                                var cell1 = row.insertCell(0);
                                var cell2 = row.insertCell(1);
                                var cell3 = row.insertCell(2);
                                var cell4 = row.insertCell(3);
                                var cell5 = row.insertCell(4);

                                cell1.innerHTML = (i + 1);
                                cell2.innerHTML = "<span class='isActiveFillBadge'>succ</span>";
                                cell3.innerHTML = '<p style="color: #919191; text-transform: uppercase; font-weight: bolder;">' + result.title[i] + '</p>' +
                                    '<p id="deadlineIndex' + i + '" style="color: #919191; font-size: 0.6em; font-weight: 300;">' + result.deadlineFix[i] + '</p>';
                                cell4.innerHTML = result.subjob[i];
                                cell5.innerHTML = '<img src="<?= base_url(); ?>/assets/images/downarrow.png" width="10" height="10" style="transform: rotate(-90deg);">';

                                $(table.rows[(i + 1)].cells[0]).addClass("tdNo");
                                $(table.rows[(i + 1)].cells[1]).addClass("tdBadge");
                                $(table.rows[(i + 1)].cells[2]).addClass("tdJob");
                                $(table.rows[(i + 1)].cells[3]).addClass("tdSubjob");
                                $(table.rows[(i + 1)].cells[1]).addClass("tdArrow");
                                $(table.rows[(i + 1)]).attr("onclick", onclick);
                                $(table.rows[(i + 1)]).attr("id", 'alarm' + i);
                                $(table.rows[(i + 1)]).attr("class", 'alarm' + i);

                            }

                        }

                    }

                }
            }
        })
    }

    function getListAlarm(result) {
        var tr = '';
        for (var i = 0; i < result.rows; i++) {
            var user = "'assessor'";
            var onclick = 'showSubjobAssessor(' + result.idSubjob[i] + ', ' + user + ')';
            tr += '<td style="width: 1.5em; padding: 12px 5px; color: #5e5e5e; font-weight: 700; font-size: 0.8em;">' + (i + 1) + '</td>' +
                '<td style="border-bottom: 2px solid #eaeaea !important; padding: 12px 5px; width: 2em;"><span id="spanBadgeIndex' + i + '">succ</span></td>' +
                '<td style="border-bottom: 2px solid #eaeaea !important; padding: 12px 5px; width: 13em;">' +
                '<p style="color: #919191; text-transform: uppercase; font-weight: bolder;">' + result.title[i] + '</p>' +
                '<p id="deadlineIndex' + i + '" style="color: #919191; font-size: 0.6em; font-weight: 300;">' + result.deadlineFix[i] + '</p>' +
                '</td>' +
                '<td style="border-bottom: 2px solid #eaeaea !important; padding: 12px 5px; width: 7em; text-align: right; color: #919191; font-size: 0.7em; font-weight: 300; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; max-width: 7em;">' + result.subjob[i] + '</td>' +
                '<td onclick="' + onclick + '" class="right-align" style="color: #c2c2c2; padding: 12px 5px; font-size: 0.9em; border-bottom: 2px solid #eaeaea !important; width: 1.3em;"><img src="<?= base_url(); ?>/assets/images/downarrow.png" width="10" height="10" style="transform: rotate(-90deg);"></td>';
        }
        $('#targetAlarm1').html(tr);


    }

    function toggleFooter() {

        var isCoadmin = '<?= $_SESSION['isCoadmin']; ?>';
        var isAdmin = '<?= $_SESSION['isAdmin']; ?>';

        if (isCoadmin == 0) {

            $('.footerClass').hide();

        } else {

            $('.footerClass').css({
                "display": "block"
            });

        }

    }

    function deleteCurrentJob() {
        var idJob = $('.idJobGroup').val();

        $.ajax({
            type: 'post',
            data: {
                idJob: idJob
            },
            url: '<?= base_url('jzl/MobileJobView/deleteCurrentJob'); ?>',
            dataType: 'text'
        })
    }

    function changePassword() {

        $('#modalChangePassword').modal('open');

        $.ajax({
            type: 'post',
            url: '<?= base_url('jzl/MobileJob/viewChangePassword'); ?>',
            dataType: 'text',
            success: function(result) {
                $('.targetChangePassword').html(result);
            }
        })

    }
</script>