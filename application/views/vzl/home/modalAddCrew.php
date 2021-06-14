<div id="swipeCrew">

    <div class="row" style="height: 10px; padding: 0; margin: 0;">
        <div class="col s5" style="padding: 0; margin: 0"></div>
        <div class="col s2" style="padding: 0; margin: 0">
            <p class="center-align" style="background-color: #d6d5d5; color: #d6d5d5; border-radius: 2em; height: 4px;"></p>
        </div>
        <div class="col s5" style="padding: 0; margin: 0"></div>
    </div>
    <div class="valign-wrapper" style="justify-content: space-between; display: flex; margin-top: 0;">
        <div class="modal-trigger" href="#modalAddJob">
            <p class="center-align" style="color: #44a3f7" onclick="closeModalAddCrew()"><img src="<?= base_url(); ?>/assets/images/backbtn.png" width="15" height="10" alt=""></p>
        </div>
        <div>
            <p class="center-align" style="font-size: 1.5em; color: #000001; font-weight: 600;">Add Crew</p>
        </div>
        <div>
            <p onclick="saveCrew()" class="center-align" style="color: #44a3f7">Add</p>
        </div>
    </div>

</div>

<div class="row">
    <div class="col s12">
        <div class="searchDiv">
            <input type="text" data-trigg="searchCrew" placeholder="Search Crew Name..." class="searchCrew" id="searchCrew">
            <i class="fa fa-search" style="margin-top: 0.5em;"></i>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12 m6 offset-m3">
        <div class="card" style="border-top-right-radius: 1.4em; border-top-left-radius: 1.4em;  box-shadow: none; height: 35em; background-color: #f7f6f6;">
            <div class="card-content" style="padding-left: 1em; padding-right: 1em; padding-bottom: 0; padding-top: 0;">
                <table>
                    <thead style="display: table; width: 100%; table-layout: fixed;">
                        <tr>
                            <th style=" color: #dadad9; font-size: 0.7em;">Name</th>
                            <th style=" color: #dadad9; font-size: 0.7em; text-align: right;">Details</th>
                            <th style=" color: #dadad9; font-size: 0.7em; text-align: right; width: 2.2em;"><i class="fas fa-check"></i></th>
                        </tr>
                    </thead>
                    <tbody style="display: block; height: 30em; width: 100%; overflow: auto;" class="targetListCrew">
                    </tbody>
                    <tbody style="display: block; height: 30em; width: 100%; overflow: auto;" class="targetListCrewSearch" hidden>
                    </tbody>
                </table>
            </div>
            <div class="card-action" style="background-color: white; border-top: white; border-bottom-right-radius: 1.4em; border-bottom-left-radius: 1.4em; padding: 0 1em;">
                <div style="display: flex; justify-content: space-between; padding: 0.8em 1em;">
                    <div>
                        <!-- <span style="font-size: 0.8em; color: #4da8f8;">Sort by...</span> -->
                    </div>
                    <div>
                        <span style="font-size: 0.8em; color: #4da8f8;">Filter</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        getListCrew();

        $('#searchCrew').on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $('.targetListCrew tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            })
        })


        // swipe action

        document.getElementById('swipeCrew').addEventListener('touchstart', handleTouchStart, false);
        document.getElementById('swipeCrew').addEventListener('touchmove', handleTouchMove, false);

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
                    $('#modalAddCrew').modal('close');
                }
            }
            /* reset values */
            xDown = null;
            yDown = null;
        };

        // end swipe action

    })

    function getListCrew(coadmin = '') {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('jzl/MobileJob/getListCrew'); ?>',
            dataType: 'json',
            success: function(result) {

                var tr = '';
                for (var i = 0; i < result.crew.length; i++) {
                    if ($('tr[class="trLC' + i + '"]').attr('id') === coadmin) {
                        var trMaster = '<tr class="trLC' + i + '" id="' + result.id[i] + '" style="border: none; display: table; width: 100%; table-layout: fixed;">';
                        var tdName = '<td class="tdListCrew" data-crew="tdCrew' + result.id[i] + '" style=" color: #d5d5d6; font-weight: 600; font-size: 0.8em;">' + result.crew[i] + '</td>';
                        var tdPt = '<td data-crew="tdCrew' + result.id[i] + '" style=" color: #d5d5d6;  font-size: 0.8em; font-weight: 400; text-align: right;">' + result.pt[i] + '</td>';
                    } else {
                        var trMaster = '<tr class="trLC' + i + '" id="' + result.id[i] + '" onclick="showCheck(' + i + ', ' + result.id[i] + ', ' + result.idPt[i] + ')"  style="border: none; display: table; width: 100%; table-layout: fixed;">';
                        var tdName = '<td class="tdListCrew" data-crew="tdCrew' + result.id[i] + '" style=" color: #5f5e5e; font-weight: 600; font-size: 0.8em;">' + result.crew[i] + '</td>';
                        var tdPt = '<td data-crew="tdCrew' + result.id[i] + '" style=" color: #d5d5d6;  font-size: 0.8em; font-weight: 400; text-align: right;">' + result.pt[i] + '</td>';
                    }
                    tr += trMaster +
                        tdName +
                        tdPt +
                        '<td class="targetCheckCrew" data-id-crew="' + result.id[i] + '" id="targetCheckCrew' + i + '" style=" color: #40a1f8; font-size: 0.7em; text-align: right; width: 2.2em; opacity: 0;"><i class="fas fa-check"></i></td>' +
                        '<td hidden><input data-hidden-id-crew=" ' + result.id[i] + ' " id="formCheck' + i + '" class="formCheckCrew" name="formCheckCrew"></td>' +
                        '<td hidden><input data-hidden-id-pt=" ' + result.idPt[i] + ' " id="formPtId' + i + '" class="formPtId" name="formPtId"></td>' +
                        '</tr>';
                }

                $('.targetListCrewSearch').css({
                    "display": "none"
                });
                $('.targetListCrew').css({
                    "display": "block"
                });
                $('.targetListCrew').html(tr);

            }
        })
    }

    function showCheck(idForm, idCrew, idPt) {
        // var check = $('#targetCheckCrew' + idForm);
        var check = $('td[data-id-crew="' + idCrew + '"]');

        if (check.css('opacity') === '0') {
            check.css({
                "opacity": "1"
            });

            // ----------------------------------------------- add value to input field -----------------------------------------------------


            $('#formCheck' + idForm).val(idCrew);
            $('#formCheck' + idForm).attr('input-data-id', idCrew);
            $('#formPtId' + idForm).val(idPt);

            // ----------------------------------------------- add value to input field -----------------------------------------------------


            // ----------------------------------------------- manipulate css -----------------------------------------------------
            var currentSelection = $('.formCheckCrew').map(function() {
                return $(this).val();
            }).toArray().filter(function(e) {
                return e != null && e != '';
            });


            //manipulate in coadmin field
            for (var x = 0; x < currentSelection.length; x++) {

                $('td[data-id-table="tbl' + currentSelection[x] + '"]').css({
                    "color": "#dadad9"
                });
                $('tr[data-tr="tr' + currentSelection[x] + '"]').removeAttr('onclick');
                $('td[data-id-admin="' + currentSelection[x] + '"]').removeClass();
                $('td[data-id-admin="' + currentSelection[x] + '"]').removeAttr('id');
                $('td[data-id-admin="' + currentSelection[x] + '"]').html('');

                //manipulate in reminded peers
                $('td[data-remind="' + currentSelection[x] + '"]').css({
                    "color": "#dadad9"
                });
                $('tr[id="trRemind' + currentSelection[x] + '"]').removeAttr('onclick');

                //manipulate in co assessor field
                $('td[data-assessor="' + currentSelection[x] + '"]').css({
                    "color": "#dadad9"
                });
                $('tr[class="trAssessor' + currentSelection[x] + '"]').removeAttr('onclick');
                $('td[data-icon-assessor="' + currentSelection[x] + '"]').removeClass();

            }

        } else {
            check.css({
                "opacity": "0"
            });
            $('#formCheck' + idForm).val('');

            //image checked
            var imgChecked = '<img src="<?= base_url(); ?>assets/images/radiounchecked.png" width="15" height="15">';


            //manipulate in coadmin field
            var idFormCoadmin = $('td[data-id-admin="' + idCrew + '"]').attr('data-id-form-coadmin');

            $('td[data-id-table="tbl' + idCrew + '"]').css({
                "color": "#5f5e5e"
            });
            $('tr[data-tr="tr' + idCrew + '"]').attr('onclick', 'targetCoadmin(' + idFormCoadmin + ', ' + idCrew + ')');
            $('td[data-id-admin="' + idCrew + '"]').addClass('iconCoadmin');
            $('td[data-id-admin="' + idCrew + '"]').attr('id', 'c' + idCrew);
            $('td[data-id-admin="' + idCrew + '"]').html(imgChecked);

            //manipulate in reminded peers
            var idFormRemind = $('tr[id="trRemind' + idCrew + '"]').attr('data-id-form-remind');

            $('td[data-remind="' + idCrew + '"]').css({
                "color": "#5f5e5e"
            });
            $('tr[id="trRemind' + idCrew + '"]').attr('onclick', 'showCheckRemind(' + idFormRemind + ', ' + idCrew + ')');

            //manipulate in co assessor field
            var idFormAssessor = $('tr[class="trAssessor' + idCrew + '"]').attr('data-id-form-assessor');

            $('td[data-assessor="' + idCrew + '"]').css({
                "color": "#5f5e5e"
            });
            $('tr[class="trAssessor' + idCrew + '"]').attr('onclick', 'targetRadio(' + idFormAssessor + ', ' + idCrew + ')');
            $('td[data-icon-assessor="' + idCrew + '"]').addClass('iconRadio');
        }
    }

    function saveCrew() {
        $('.targetCheckCrew').css({
            "opacity": "0"
        });
        var arr = $('.formCheckCrew').map(function() {
            return $(this).val();
        }).toArray();
        var crew = arr.filter(function(r) {
            return r != null && r != '';
        })
        var pt = $('input[name="formPtId"]').map(function() {
            return $(this).val();
        }).toArray().filter(function(e) {
            return e != '' && e != null;
        });

        var idJob = $('.idJobGroup').val();

        $.ajax({
            type: 'POST',
            data: {
                crew: crew,
                id: idJob,
                pt: pt
            },
            url: '<?= base_url('jzl/MobileJob/saveCrew'); ?>',
            dataType: 'json',
            beforeSend: function() {
                slLoading();
            },
            success: function(result) {
                $('#modalLoading').modal('close');
                //close modal addcrew
                $('#modalAddCrew').modal('close');
                $('#modalAddJob').modal('open');

                //input num rows to field
                $('.selectedCrew').text(result.crewId.length);

                //input target name to field
                $('.tableCrewName').removeAttr('hidden');

                var delBtn = '<?= base_url(); ?>/assets/images/delete.png';
                var hamburger = '<?= base_url(); ?>/assets/images/hamburger.png';
                var x = '';
                for (var i = 0; i < result.crewName.length; i++) {
                    var shortN = "'" + result.shortName[i][0] + "'";
                    x += '<tr class="trSelectedCrew' + i + '" style="border: none; color: #5e5e5e;">' +
                        '<td style="padding: 10px 5px;" onclick="deleteSelectedCrew(' + i + ', ' + result.crewId[i] + ', ' + shortN + ', ' + result.ptId[i] + ')"><img src="' + delBtn + '" width="15" height="15"></td>' +
                        '<td style="border: none; font-size: 0.8em; font-weight: 200;">' + result.crewName[i] + '</td>' +
                        '<td class="right-align"><img src="' + hamburger + '" width="20" height="15"></td>' +
                        '<td hidden><input class="idSelectedCrew" id="idSelectedCrew' + i + '" name="idSelectedCrew" value="' + result.crewId[i] + '"></td>' +
                        '<td hidden><input class="idSelectedPt" id="idSelectedPt' + i + '" name="idSelectedPt" value="' + result.ptId[i] + '"></td>' +
                        '</tr>';
                }
                $('.targetCrewName').html(x);

                var y = '';
                for (var u = 0; u < result.crewName.length; u++) {
                    y += '<tr class="trLeader' + u + '" onclick="chooseLeader(' + u + ', ' + result.crewId[u] + ')" style="border: none; color: #5e5e5e;">' +
                        '<td class="targetCheckLeader" id="targetCheckLeader' + u + '" style="color: #40a1f8; font-size: 0.7em; text-align: right; width: 2.2em; opacity: 1;"><img src="<?= base_url(); ?>assets/images/radiounchecked.png" width="10" height="10"></td>' +
                        '<td style="padding: 10px 5px;"></td>' +
                        '<td class="chooseLeader' + u + '" style="border: none; font-size: 0.8em; font-weight: 200;">' + result.crewName[u] + '</td>' +
                        '<td hidden><input id="idSelectedLeader' + u + '" name="idSelectedLeader"></td>' +
                        '</tr>';
                }

                $('.targetLeader').html(y);


            }
        })
    }

    function deleteSelectedCrew(idForm, idCrew, shortName = '') {
        // change leader span in condition
        var lastSpanLeader = $('.selectedLeader').text();
        if (lastSpanLeader == shortName) {
            $('.selectedLeader').text('None');
        }

        //remove leader row with same name and same id
        $('.trSelectedCrew' + idForm).remove();
        $('.trLeader' + idForm).remove();

        //update in database
        var crew = $('input[class="idSelectedCrew"]').map(function() {
            return $(this).val();
        }).toArray();
        var ptId = $('.idSelectedPt').map(function() {
            return $(this).val();
        }).toArray().filter(function(e) {
            return e != '' && e != null;
        });
        var idJob = $('.idJobGroup').val();

        $('input[input-data-id="' + idCrew + '"]').val('');

        var crewLen = crew.length;
        $('.selectedCrew').text(crewLen);
        $.ajax({
            type: 'POST',
            data: {
                crew: crew,
                id: idJob,
                pt: ptId
            },
            url: '<?= base_url('jzl/MobileJob/saveCrew'); ?>',
            dataType: 'json'
        });

        //manipulate data that contains id crew 
        //in coadmin modal 
        $('tr[data-tr="tr' + idCrew + '"]').attr('onclick', 'targetCoadmin(' + idForm + ', ' + idCrew + ')'); //add onclcik

        $('td[data-id-table="tbl' + idCrew + '"]').css({
            "color": "#5f5e5e"
        })

        $('td[data-id-admin="' + idCrew + '"]').addClass('iconCoadmin'); // add class

        $('td[data-id-admin="' + idCrew + '"]').attr('id', 'c' + idCrew); // add id

        var radiouncheck = '<img src="<?= base_url(); ?>assets/images/radiounchecked.png" width="15" height="15">';

        $('td[data-id-admin="' + idCrew + '"]').html(radiouncheck);

        //in remind other modal 
        $('tr[id="trRemind' + idCrew + '"]').attr('onclick', 'showCheckRemind(' + idForm + ', ' + idCrew + ')'); // add onclick

        $('td[data-remind="' + idCrew + '"]').css({
            "color": "#5f5e5e"
        });

        //im assessor modal 
        $('tr[class="trAssessor' + idCrew + '"]').attr('onclick', 'targetRadio(' + idForm + ', ' + idCrew + ')'); // add onclick

        $('td[data-assessor="' + idCrew + '"]').css({
            "color": "#5f5e5e"
        });
    }

    function chooseLeader(idForm, idCrew) {
        $('.targetCheckLeader').css({
            "opacity": "1"
        });
        $('.targetCheckLeader').html('<img src="<?= base_url(); ?>assets/images/radiounchecked.png" width="10" height="10">')
        $('input[name="idSelectedLeader"]').val('');

        $('#targetCheckLeader' + idForm).css({
            "opacity": "1"
        });
        $('#targetCheckLeader' + idForm).html('<img src="<?= base_url(); ?>assets/images/radiochecked.png" width="10" height="10">');
        $('#idSelectedLeader' + idForm).val(idCrew);

        var leader = $('input[name="idSelectedLeader"]').map(function() {
            return $(this).val();
        }).toArray().filter(function(e) {
            return e != null && e != '';
        });

        var idJob = $('.idJobGroup').val();

        $.ajax({
            type: 'POST',
            data: {
                leader: leader,
                id: idJob
            },
            url: '<?= base_url('jzl/MobileJob/getLeader'); ?>',
            dataType: 'json',
            success: function(result) {
                $('.selectedLeader').text(result.name);
            }
        })
    }
</script>