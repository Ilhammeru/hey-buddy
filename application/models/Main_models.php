<?php
defined('BASEPATH') or exit('No direct script allowed');

class Main_models extends CI_Model
{
    public function getData($query, $database)
    {
        if ($database == 'jobdesk') {
            $result =  $this->db->query($query);
        } else {
            $db = $this->load->database($database, true);
            $result = $db->query($query);
            $db->close();
        }
        return $result;
    }
}
