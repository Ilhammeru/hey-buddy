<div id="swipeAssessor">

    <div class="row" style="height: 10px; padding: 0; margin: 0;">
        <div class="col s5" style="padding: 0; margin: 0"></div>
        <div class="col s2" style="padding: 0; margin: 0">
            <p class="center-align" style="background-color: #d6d5d5; color: #d6d5d5; border-radius: 2em; height: 4px;"></p>
        </div>
        <div class="col s5" style="padding: 0; margin: 0"></div>
    </div>
    <div class="valign-wrapper" style="justify-content: space-between; display: flex; margin-top: 0;">
        <div onclick="closeModalAssessor()">
            <p class="center-align" style="color: #44a3f7" onclick="closeModalAddCrew()"><img src="<?= base_url(); ?>/assets/images/backbtn.png" width="15" height="10" alt=""></p>
        </div>
        <div>
            <p class="center-align" style="font-size: 1.5em; color: #000001; font-weight: 600;">Add Co-Assessor</p>
        </div>
        <div>
            <p class="addAssessorButton" class="center-align" style="color: #44a3f7">Add</p>
        </div>
    </div>

</div>

<div class="row">
    <div class="col s12">
        <div class="searchDiv">
            <input type="text" data-trigg="searchCrew" id="searchAssessor" placeholder="Search Crew Name...">
            <i class="fa fa-search" style="margin-top: 0.5em;"></i>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12 m6 offset-m3">
        <div class="card" style="border-top-right-radius: 1.4em; border-top-left-radius: 1.4em;  box-shadow: none; max-height: 35em; background-color: #f7f6f6;">
            <div class="card-content" style="padding-left: 1em; padding-right: 1em; padding-bottom: 0; padding-top: 0;">
                <table>
                    <thead style="display: table; width: 100%; table-layout: fixed;">
                        <tr>
                            <th style=" color: #dadad9; font-size: 0.7em;">Name</th>
                            <th style=" color: #dadad9; font-size: 0.7em; text-align: right;">Details</th>
                            <th style=" color: #dadad9; font-size: 0.7em; text-align: right; width: 2.2em;"></th>
                        </tr>
                    </thead>
                    <tbody style="display: block; height: 30em; width: 100%; overflow: auto;" class="targetListAssessor">
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
        getCrewAssessor();
        $('#searchAssessor').on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $('.targetListAssessor tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            })
        })

        // swipe action

        document.getElementById('swipeAssessor').addEventListener('touchstart', handleTouchStart, false);
        document.getElementById('swipeAssessor').addEventListener('touchmove', handleTouchMove, false);

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
                    $('#modalAddAssessor').modal('close');
                }
            }
            /* reset values */
            xDown = null;
            yDown = null;
        };

        // end swipe action

    })

    function getCrewAssessor() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('jzl/MobileJob/getListCrew'); ?>',
            dataType: 'json',
            success: function(result) {
                var tr = '';
                for (var i = 0; i < result.crew.length; i++) {
                    tr += '<tr class="trAssessor' + result.id[i] + '" data-id-form-assessor="' + i + '" onclick="targetRadio(' + i + ', ' + result.id[i] + ')">' +
                        '<td data-assessor="' + result.id[i] + '" style=" color: #5f5e5e; font-weight: 600; font-size: 0.8em; width: 17em;">' + result.crew[i] + '</td>' +
                        '<td data-assessor="' + result.id[i] + '" style=" color: #8d8d8d; font-size: 0.8em; font-weight: 400; text-align: right; width: 10em;">' + result.pt[i] + '</td>' +
                        '<td class="iconRadio" data-icon-assessor="' + result.id[i] + '" id="c' + result.id[i] + '" style=" color: #40a1f8; font-size: 0.7em; text-align: right; width: 2em; opacity: 0;" class="targetRadio' + i + '"><i class="fas fa-check"></i></td>' +
                        '<td hidden><input name="targetIdAssessor" class="targetIdAssessor' + result.id[i] + '"></td>' +
                        '</tr>';
                }

                $('.targetListAssessor').html(tr);
            }
        })
    }

    function targetRadio(idForm, idCrew) {
        $('td[class="iconRadio"]').css({
            "opacity": "0"
        });
        $('input[name="targetIdAssessor"]').val('');

        $('td[id="c' + idCrew + '"]').css({
            "opacity": "1"
        });

        $('.targetIdAssessor' + idCrew).val(idCrew);
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

    function saveAssessor(idForm) {
        var assessor = $('input[name="targetIdAssessor"]').map(function() {
            return $(this).val();
        }).toArray().filter(function(e) {
            return e != null && e != '';
        });

        $.ajax({
            type: 'POST',
            data: {
                leader: assessor
            },
            url: '<?= base_url('jzl/MobileJob/getLeader'); ?>',
            dataType: 'json',
            beforeSend: function() {
                slLoading();
            },
            success: function(result) {
                $('#modalLoading').modal('close');
                $('#spanAssessor' + idForm).html(result.name);
                $('#targetAssessor1' + idForm).val(result.idName)
                $('#finalAssessor' + idForm).attr('data-name-assessor', result.name);
                $('#modalAddAssessor').modal('close');
                $('td[class="iconRadio"]').css({
                    "opacity": "0"
                });

                //manipulate in remind list
                $('td[data-remind="' + result.idName + '"]').css({
                    "color": "#dadad9"
                });
                $('tr[id="trRemind' + result.idName + '"]').removeAttr('onclick');

                //manipulate in crew list
                $('td[data-crew="tdCrew' + result.idName + '"]').css({
                    "color": "#dadad9"
                });
                $('tr[class="trLC' + result.idName + '"]').removeAttr('onclick');

                //manipulate in coadmin field
                $('td[data-id-table="tbl' + result.idName + '"]').css({
                    "color": "#dadad9"
                });
                $('tr[data-tr="tr' + result.idName + '"]').removeAttr('onclick');
                $('td[data-id-admin="' + result.idName + '"]').removeClass();
                $('td[data-id-admin="' + result.idName + '"]').removeAttr('id');
                $('td[data-id-admin="' + result.idName + '"]').html('');
            }
        })
    }

    function closeModalAssessor() {

        $('#modalAddAssessor').modal('close');

    }
</script>