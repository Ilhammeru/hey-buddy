<?php
defined('BASEPATH') or exit('No direct script allowed');

class Database extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('main_models', 'database');
    }

    public function seri()
    {
        if (isset($_SESSION['login'])) {
            $data['title'] = 'Series';
            $this->layout_library->getTemplate('database/seri', $data);
        } else {
            redirect('home/error');
        }
    }

    public function getSeri()
    {
        $query = "SELECT seri, id FROM seri";
        $db = 'jobdesk';

        $result = $this->database->getData($query, $db);

        echo json_encode($result->result());
    }

    public function deleteData()
    {
        $table = $this->input->post('table');
        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $this->db->delete($table);

        echo 'success';
    }

    public function saveSeri()
    {
        $seri = $this->input->post('seri');

        $data = array();
        foreach ($seri as $key => $value) {
            $data[] = [
                'seri'  => $seri[$key]
            ];
        }

        $this->db->insert_batch('seri', $data);

        echo 'success';
    }
}
