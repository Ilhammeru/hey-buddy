<?php

defined('BASEPATH') or exit('No direct script allowed');

header("Access-Control-Allow-Origin: https://job.ansena-sa.com");
header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

class Backup_db extends CI_Controller
{

    public function index() {
        $this->load->view('db/index');
    }

    public function backup($databaseName, $source)
    {
        $this->we = $this->load->database($source, TRUE);
        $this->myutil = $this->load->dbutil($this->we, TRUE);

        // Backup your entire database and assign it to a variable
        $prefs = array(
            'tables'        => array($databaseName),   // Array of tables to backup.
            'ignore'        => array(),                     // List of tables to omit from the backup
            'format'        => 'txt',                       // gzip, zip, txt
            'filename'      => $databaseName . '.sql',              // File name - NEEDED ONLY WITH ZIP FILES
            'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
            'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
            'newline'       => "\n"                         // Newline character used in backup file
        );

        $backup = $this->myutil->backup($prefs);

        // Load the file helper and write the file to your server
        $this->load->helper('file');
        write_file('/path/to/mybackup.sql', $backup);

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download('mybackup.sql', $backup);
    }

    public function download_db() {
        $db = $_POST['db'];
        $table = $_POST['table'];

        $this->load->helper('download');

        // path 
        $path = site_url() . '/uploads/job/1/2021-04-10_15:07:12_1__subjob_image-b559ee92-6be2-4abc-9c35-6c493563a3f28452437046401964533.jpg';

        force_download($path, null);

        print_r($path);
    }

    public function show_db($dbName) {
        $this->we = $this->load->database($dbName, TRUE);
        $this->myutil = $this->load->dbutil($this->we, TRUE);

        $dbList = $this->myutil->list_databases();
    }
}
