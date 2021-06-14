<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="<?= base_url(); ?>assets/jquery/dist/jquery.min.js"></script>

    <title>Download Database</title>
</head>

<body>
    <div style="text-align: center; font-size: 1.5em; font-weight: bolder;">Download databases</div>


    <script>
        $(document).ready(function() {
            downloadDb()
        })

        function downloadDb() {
            $.ajax({
                type: 'post',
                data: {
                    db: 'we',
                    table: 'ansena_department'
                },
                url:  '<?= site_url();?>jzl/backup_db/download_db',
                dataType:  'text',
                success: function(response) {
                    console.log(response)
                }
            })
        }
    </script>
</body>

</html>