<?php
defined('BASEPATH') or exit('No direct script allowed');

class Job_model extends CI_Model
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

    public function checkStatusUser()
    {

        $idMaster = $_SESSION['id'];

        $queryAdmin = "SELECT id
              FROM subjob
              WHERE JSON_CONTAINS(approval, JSON_QUOTE('$idMaster'), '$.admin') = 1";
        $resultAdmin = $this->getData($queryAdmin, 'jobdesk')->num_rows();

        $queryCoadmin = "SELECT id
              FROM subjob
              WHERE JSON_CONTAINS(approval, JSON_QUOTE('$idMaster'), '$.admin') = 1";
        $resultCoadmin = $this->getData($queryCoadmin, 'jobdesk')->num_rows();

        $queryAssessor = "SELECT id
              FROM subjob
              WHERE JSON_CONTAINS(approval, JSON_QUOTE('$idMaster'), '$.admin') = 1";
        $resultAssessor = $this->getData($queryAssessor, 'jobdesk')->num_rows();

        $queryUser = "SELECT id
              FROM job
              WHERE JSON_CONTAINS(crew, JSON_QUOTE('$idMaster'), '$') = 1";
        $resultUser = $this->getData($queryUser, 'jobdesk')->num_rows();

        if ($resultAdmin != 0) {

            $statusUser = 'admin';
        } else if ($resultCoadmin != 0) {

            $statusUser = 'coadmin';
        } else if ($resultAssessor != 0) {

            $statusUser = 'assessor';
        } else if ($resultUser != 0) {

            $statusUser = 'user';
        }

        return $statusUser;
    }

    public function updateStatus($idSubjob)
    {

        $query = "SELECT status, approval
              FROM subjob
              WHERE id = $idSubjob";
        $result = $this->getData($query, 'jobdesk')->row_array();

        $status = $result['status'];
        $approval = json_decode($result['approval'], true);

        $admin = $approval['admin'];
        $coadmin = $approval['coadmin'];
        $assessor = $approval['co-assessor'];

        $statusUser = $this->checkStatusUser();

        if ($statusUser == 'admin') {

            $status = 0;
        } else if ($statusUser == 'coadmin' && $admin != 0) {

            $status = 4;
        } else if ($statusUser == 'coadmin' && $admin == 0) {

            $status = 0;
        } else if ($statusUser == 'assessor' && $coadmin != 0) {

            $status = 3;
        } else if ($statusUser == 'assessor' && $coadmin == 0) {

            $status = 4;
        } else if ($statusUser == 'user' && $assessor != 0) {

            $status = 2;
        } else if ($statusUser == 'user' && $assessor == 0 && $coadmin != 0) {

            $status = 3;
        } else if ($statusUser == 'user' && $assessor == 0 && $coadmin == 0) {

            $status = 4;
        }

        if (isset($status)) {

            $message = 'success';
        } else {

            $message = 'error';
        }

        $data['status'] = $status;
        $data['message'] = $message;

        return $data;
    }
}
