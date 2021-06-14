<!-- <div class="row" style="height: 10px; padding: 0; margin: 0;">
    <div class="col s5" style="padding: 0; margin: 0"></div>
    <div class="col s2" style="padding: 0; margin: 0">
        <p class="center-align" draggable="true" ondragstart="showHeight(event)" style="background-color: #d6d5d5; color: #d6d5d5; border-radius: 2em; height: 4px;"></p>
    </div>
    <div class="col s5" style="padding: 0; margin: 0"></div>
</div> -->
<div class="valign-wrapper" style="justify-content: space-between; display: flex; margin-top: 0;">
    <div class="modal-trigger" href="#modalAddJob">
        <p class="center-align" style="color: #de4c39" onclick="closeModalAddCoadmin()">Cancel</p>
    </div>
    <div>
        <p class="center-align" style="font-size: 1.5em; color: #000001; font-weight: 600;">Add Co-Admin</p>
    </div>
    <div class="addCoadmin">
        <p onclick="saveCoadmin()" style="color: #44a3f7">Add</p>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div class="searchDiv">
            <input type="text" data-trigg="searchCrew" placeholder="Search Crew Name..." class="searchCrewAdmin" id="inputCoadmin">
            <i class="fa fa-search" style="margin-top: 0.5em;"></i>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12 m6 offset-m3">
        <div class="card" style="border-top-right-radius: 1.4em; border-top-left-radius: 1.4em;  box-shadow: none; max-height: 35em; background-color: #f7f6f6;">
            <div class="card-content" style="padding-left: 1em; padding-right: 1em; padding-bottom: 0; padding-top: 0;">
                <table id="tblList">
                    <thead style="display: table; width: 100%; table-layout: fixed;">
                        <tr>
                            <th style=" color: #dadad9; font-size: 0.7em;">Name</th>
                            <th style=" color: #dadad9; font-size: 0.7em; text-align: right;">Details</th>
                            <th style=" color: #dadad9; font-size: 0.7em; text-align: right; width: 2.2em;"></th>
                        </tr>
                    </thead>
                    <tbody style="display: block; height: 30em; width: 100%; overflow: auto;" class="targetListCoadmin">

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

<script type="text/javascript">
    $(document).ready(function() {
        $('#inputCoadmin').on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $('#tblList tr.trCoadmin').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            })
        });

        var crew = $('.idSelectedCrew').val();
        if (crew == undefined) {
            getCrewCoadmin();
        }
    })

    function closeModalAddCoadmin() {
        $('#modalAddCoadmin').modal('close');
        $('td[class="iconCoadmin"]').html('<img src="<?= base_url(); ?>assets/images/radiounchecked.png" width="15" height="15">');
        $('input[name="targetIdCoadmin"]').val('');
    }

    function getCrewCoadmin(crewList = '') {
        var idJob = $('.idJobGroup').val();
        $.ajax({
            type: 'POST',
            data: {
                id: idJob
            },
            url: '<?= base_url('jzl/MobileJob/getListCrew'); ?>',
            dataType: 'json',
            success: function(result) {

                var tr = '';

                for (var i = 0; i < result.crew.length; i++) {
                    tr += '<tr data-tr="tr' + result.id[i] + '"  class="trCoadmin" id="' + result.id[i] + '" onclick="targetCoadmin(' + i + ', ' + result.id[i] + ')">' +
                        '<td data-id-table="tbl' + result.id[i] + '" style=" color: #5f5e5e; font-weight: 600; font-size: 0.8em; width: 17em;">' + result.crew[i] + '</td>' +
                        '<td data-id-table="tbl' + result.id[i] + '" style=" color: #8d8d8d; font-size: 0.8em; font-weight: 400; text-align: right; width: 10em;">' + result.pt[i] + '</td>' +
                        '<td class="iconCoadmin" data-id-admin="' + result.id[i] + '" data-id-form-coadmin="' + i + '" id="c' + result.id[i] + '" style=" color: #40a1f8; font-size: 0.7em; text-align: right; width: 2em; opacity: 1;"><img src="<?= base_url(); ?>assets/images/radiounchecked.png" width="15" height="15"></td>' +
                        '<td hidden><input name="targetIdCoadmin" class="targetIdCoadmin' + result.id[i] + '"></td>' +
                        '</tr>';
                }

                $('.targetListCoadmin').css({
                    "display": "block"
                });
                $('.targetListCoadmin').html(tr);
            }
        });
    }

    function targetCoadmin(idForm, idCrew) {
        var crew = $('td[data-id-admin="' + idCrew + '"]').attr('exist-crew');

        $('td[class="iconCoadmin"]').css({
            "opacity": "1"
        });
        $('td[class="iconCoadmin"]').html('<img src="<?= base_url(); ?>assets/images/radiounchecked.png" width="15" height="15">');
        $('input[name="targetIdCoadmin"]').val('');

        $('td[data-id-admin="' + idCrew + '"]').css({
            "opacity": "1"
        });
        $('td[id=c' + idCrew + ']').html('<img src="<?= base_url(); ?>assets/images/radiochecked.png" width="15" height="15">');

        $('.targetIdCoadmin' + idCrew).val(idCrew);
    }

    function convertArray(array) {
        if (array.length == 2) {
            var lastArray = array.shift();
            var newArray = [lastArray];
        } else if (array.length == 1) {
            var newArray = array;
        }

        return newArray;
    }

    function saveCoadmin() {
        var coadmin = $('input[name="targetIdCoadmin"]').map(function() {
            return $(this).val();
        }).toArray().filter(function(e) {
            return e != null && e != '';
        });
        var idJob = $('.idJobGroup').val();

        //get crewid
        var crewList = $('input[name="idSelectedCrew"]').map(function(e) {
            return $(this).val();
        }).toArray()


        $.ajax({
            type: 'POST',
            data: {
                coadmin: coadmin,
                id: idJob
            },
            url: '<?= base_url('jzl/MobileJob/saveCoadmin'); ?>',
            dataType: 'json',
            beforeSend: function() {
                slLoading();
            },
            success: function(result) {
                $('#modalLoading').modal('close');
                $('.targetCoadmin').html(result.name);
                $('.targetCoadmin1').val(result.idName);
                $('#modalAddCoadmin').modal('close');
                $('td[class="iconCoadmin"]').css({
                    "opacity": "1"
                });

                var check = $('input[class="coadminField"]').map(function() {
                    return $(this).val();
                }).toArray().filter(function(e) {
                    return e != null && e != '';
                });

                var tr = '<tr>' +
                    '<td style="width: 0.8em;">' +
                    '<p class="numberCoadmin" id="pId' + result.idName + '" style="transition: ease 0.5s; border: 0.4px solid #fff; border-radius: 1.4em; font-size: 0.3em; padding: 0.3em 0.5em; color: #fff;">' + (check.length + 1) + '</p>' +
                    '</td>' +
                    '<td style="width: 14em; padding: 0;">' +
                    '<p class="nameCoadmin" id="pName' + result.idName + '" style="transition: ease 0.5s; color: #d9d8d9; font-size: 0.7em; margin-left: 1.5em;">' + result.name + '</p>' +
                    '<input type="hidden" class="coadminField" id="coadminField' + result.idName + '" name="coadminField">' +
                    '</td>' +
                    '<td style="width: 2em; padding: 0;"><span data-change="toggleDefault" class="spanSwitchOrder" id="spanSwitchOrder" data-check="" data-name="' + result.name + '" data-id="' + result.idName + '" onclick="switchOrder(' + result.idName + ')"><img src="<?= base_url(); ?>assets/images/toggledefault.png" width="35" height="20" alt=""></span></td>' +
                    '</tr>';
                $('.targetBodyCoadmin').html(tr);

                getListCrew(result.idName);

                //add values
                for (var i = 0; i < crewList.length; i++) {
                    $('input[data-hidden-id-crew="' + crewList[i] + '"]').val(crewList[i]);
                }

                //manipulate in reminded peers
                $('td[data-remind="' + result.idName + '"]').css({
                    "color": "#dadad9"
                });
                $('tr[id="trRemind' + result.idName + '"]').removeAttr('onclick');

                //manipulate in co assessor field
                $('td[data-assessor="' + result.idName + '"]').css({
                    "color": "#dadad9"
                });
                $('tr[class="trAssessor' + result.idName + '"]').removeAttr('onclick');
                $('td[data-icon-assessor="' + result.idName + '"]').removeClass();
            }
        })
    }
</script>