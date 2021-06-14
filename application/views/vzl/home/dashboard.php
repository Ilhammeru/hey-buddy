<body style="background-color: #e5e5e5;">
    <div class="container-fluid">
        <div class="row mt-5" style="padding: 0 !important;">
            <div class="col">
                <div class="targetViewJob"></div>
                <!-- <div class="card" style="border-radius: 12px; padding: 0 !important;">
                    <div class="card-body">
                        <div class="targetViewJob"></div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var user = '<?= $_SESSION['name']; ?>';

            getUserJob();
            upcomingDeadline();
        })

        function upcomingDeadline() {
            $.ajax({
                type: 'POST',
                type: '<?= base_url('home/getUpcomingDeadline'); ?>',
                dataType: 'text',
                success: function(result) {
                    console.log(result);
                }
            })
        }

        function getUserJob() {
            var id = '<?= $_SESSION['id']; ?>';
            $.ajax({
                type: 'POST',
                data: {
                    id: id
                },
                url: '<?= base_url('home/getUserJob'); ?>',
                dataType: 'text',
                success: function(result) {
                    $('.targetViewJob').html(result);
                }
            })
        }

        function getToast(message, action) {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            toastr[action](message);

        }
    </script>