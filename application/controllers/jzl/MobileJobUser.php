<?php
defined('BASEPATH') or exit('No direct script allowed');

class MobileJobUser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mzl/main_model', 'database');
    }

    public function issetCrew()
    {
        $query = "SELECT id, name FROM ac_payroll_item WHERE is_active = 1 AND office = 8";
        $dbMaster = 'we';

        $result = $this->database->getData($query, $dbMaster);

        $arr = array();
        foreach ($result->result() as $row) {
            $arr['c' . $row->id]    = $row->name;
        }

        return $arr;
    }

    public function getShortName($fName)
    {
        $shortName = explode(' ', $fName);
        return $shortName[0];
    }

    public function roleUser($idSubjob)
    {
        $idMaster = $_SESSION['id'];

        $query = "SELECT status, approval, admin, coadmin, subjob.assessor FROM subjob INNER JOIN job ON subjob.id_title = job.id WHERE subjob.id = $idSubjob";
        $db = 'default';
        $result = $this->database->getData($query, $db)->row_array();

        $status = $result['status'];
        $approval = json_decode($result['approval'], true);
        $adminDb = $result['admin'];
        $coadminDb = $result['coadmin'];
        $assessorDb = $result['assessor'];

        if ($idMaster == $adminDb) {
            $isAdmin = 1;
            $isCoadmin = 0;
            $isAssessor = 0;
            $isUser = 0;
        } else if ($idMaster == $coadminDb) {
            $isCoadmin = 1;
            $isAdmin = 0;
            $isAssessor = 0;
            $isUser = 0;
        } else if ($idMaster == $assessorDb) {
            $isAssessor = 1;
            $isAdmin = 0;
            $isCoadmin = 0;
            $isUser = 0;
        } else {
            $isUser = 1;
            $isAdmin = 0;
            $isCoadmin = 0;
            $isAssessor = 0;
        }

        $data['isAdmin'] = $isAdmin;
        $data['isCoadmin'] = $isCoadmin;
        $data['isAssessor'] = $isAssessor;
        $data['isUser'] = $isUser;

        return $data;
    }

    public function getApprovalCoadminPurpose()
    {
        $idSubjob = $this->input->post('idSubjob');

        $query = "SELECT approval, purpose FROM subjob WHERE id = $idSubjob";
        $db = 'default';

        $result = $this->database->getData($query, $db);

        foreach ($result->result() as $row) {
            $approval = json_decode($row->approval, true);
            $purpose = $row->purpose;
        }

        //get Crew name
        $crewArray = $this->issetCrew();

        //admin name
        $admin = $approval['admin'];
        if (isset($crewArray['c' . $admin])) {
            $newAdmin = $this->getShortName($crewArray['c' . $admin]);
        } else {
            $newAdmin = 0;
        }

        //coadmin name
        $coadmin = $approval['coadmin'];
        if (isset($crewArray['c' . $coadmin])) {
            $newCoadmin = $this->getShortName($crewArray['c' . $coadmin]);
        } else {
            $newCoadmin = 0;
        }

        //assessor name
        $assessor = $approval['co-assessor'];
        if (isset($crewArray['c' . $assessor])) {
            $newAssessor = $this->getShortName($crewArray['c' . $assessor]);
        } else {
            $newAssessor = 0;
        }

        $data['admin']      = $newAdmin;
        $data['coadmin']    = $newCoadmin;
        $data['assessor']   = $newAssessor;
        $data['purpose']    = $purpose;

        echo json_encode($data);
    }

    public function getHeader()
    {
        $idSubjob = $this->input->post('idSubjob');

        $query = "SELECT title, subjob, deadline,status
                FROM subjob
                INNER JOIN job
                ON subjob.id_title = job.id
                WHERE subjob.id = $idSubjob";
        $db = 'default';
        $result = $this->database->getData($query, $db)->row_array();

        $title = $result['title'];
        $subjob = $result['subjob'];
        $deadline = json_decode($result['deadline'], true);
        $status = $result['status'];

        // -------------------- deadline ------------------------ //

        //just get the latest deadline
        //validation deadline 
        if($deadline['d' . count($deadline)]['date_create'] == $deadline['d' . count($deadline)]['user_request']) {
            //use user_request 
            $deadlineView = date('d M H:i', strtotime($deadline['d' . count($deadline)]['user_request']));
            $defaultDate = date('Y-m-d', strtotime($deadline['d' . count($deadline)]['user_request']));
            $defaultHour = date('H:i', strtotime($deadline['d' . count($deadline)]['user_request']));
        } else {
            //use date_create
            $deadlineView = date('d M H:i', strtotime($deadline['d' . count($deadline)]['date_create']));
            $defaultDate = date('Y-m-d', strtotime($deadline['d' . count($deadline)]['date_create']));
            $defaultHour = date('H:i', strtotime($deadline['d' . count($deadline)]['date_create']));
        }


        // -------------------- end deadline ------------------------ //

        $data['title']  = $title;
        $data['subjob'] = $subjob;
        $data['deadlineDate']   = $deadlineView;
        $data['defaultDate']    = $defaultDate;
        $data['defaultHour']    = $defaultHour;
        $data['id']         = $idSubjob;
        $data['status']     = $status;

        echo json_encode($data);
    }

    public function getHeaderAssessment()
    {
        $idSubjob = $this->input->post('idSubjob');

        $query = "SELECT subjob, title, deadline, status, approval, job.admin, job.coadmin, subjob.assessor, is_time, status
                FROM subjob
                INNER JOIN job
                ON subjob.id_title = job.id
                WHERE subjob.id = $idSubjob";
        $db = 'default';

        $result = $this->database->getData($query, $db)->row_array();

        $idMaster = $_SESSION['id'];
        $subjob = $result['subjob'];
        $title = $result['title'];
        $deadline = json_decode($result['deadline'], true);
        $status = $result['status'];
        $approval = json_decode($result['approval'], true);
        $admin = $result['admin'];
        $coadmin = $result['coadmin'];
        $assessor = $result['assessor'];
        $isTime = $result['is_time'];
        $status = $result['status'];

        if ($isTime == '') {
            $finishTime = 'Not yet Finished';
        } else {
            $expTime = explode(' ', $isTime);
            $finishTime = date('d M', strtotime($expTime[0])) . ' ' . $expTime[1];
        }

        if (count($deadline) > 1) {
            $dateRequest = $deadline['d' . count($deadline)]['user_request'];
            $dateCreate = $deadline['d' . count($deadline)]['date_create'];
            $dateRevise = $deadline['d' . count($deadline)]['date_revision'];

            if ($status != 6) {
                if ($dateRevise == 0) {
                    if ($dateRequest == 0) {
                        if ($dateCreate == 0) {
                            $deadlineDate = 0;
                            $deadlineHour = 0;
                        } else {
                            //date Create
                            $expDeadline = explode(' ', $dateCreate);
                            $deadlineDate = date('d M', strtotime($expDeadline[0]));
                            $deadlineHour = $expDeadline[1];
                        }
                    } else {
                        //date request
                        $expDeadline = explode(' ', $dateRequest);
                        $deadlineDate = date('d M', strtotime($expDeadline[0]));
                        $deadlineHour = $expDeadline[1];
                    }
                } else {
                    $expDeadline = explode(' ', $dateRevise);
                    $deadlineDate = date('d M', strtotime($expDeadline[0]));
                    $deadlineHour = $expDeadline[1];
                }
            } else {
                $currentDeadline = $deadline['d1']['date_create'];

                if ($currentDeadline == 0) {
                    $deadlineDate = 0;
                    $deadlineHour = 0;
                } else {
                    $expCurrent = explode(' ', $currentDeadline);
                    $deadlineDate = date('d M', strtotime($expCurrent[0]));
                    $deadlineHour = $expCurrent[1];
                }
            }
        } else if (count($deadline) == 1) {
            $dateRequest = $deadline['d1']['user_request'];
            $dateCreate = $deadline['d1']['date_create'];
            $dateRevise = $deadline['d1']['date_revision'];

            if ($dateRevise == 0) {
                if ($dateRequest == 0) {
                    if ($dateCreate == 0) {
                        $deadlineDate = 0;
                        $deadlineHour = 0;
                    } else {
                        //date Create
                        $expDeadline = explode(' ', $dateCreate);
                        $deadlineDate = date('d M', strtotime($expDeadline[0]));
                        $deadlineHour = $expDeadline[1];
                    }
                } else {
                    //date request
                    $expDeadline = explode(' ', $dateRequest);
                    $deadlineDate = date('d M', strtotime($expDeadline[0]));
                    $deadlineHour = $expDeadline[1];
                }
            } else {
                $expDeadline = explode(' ', $dateRevise);
                $deadlineDate = date('d M', strtotime($expDeadline[0]));
                $deadlineHour = $expDeadline[1];
            }
        }

        // -------------------- action title ------------------------ //

        $roleUser = $this->roleUser($idSubjob);
        if ($roleUser['isAdmin'] == 1 && $status >= 1 && $status < 4) {
            $action = 'Waiting for report';
        } else if ($roleUser['isAdmin'] == 1 && $status == 4 || $status == 61) {
            $action = 'Approval needed';
        } else if ($roleUser['isAdmin'] == 1 && $status == 5) {
            $action = 'revision asked';
        } else if ($roleUser['isAdmin'] == 1 && $status > 61) {
            $action = 'Waiting for report';
        } else if ($roleUser['isAdmin'] == 1 && $status == 0) {
            $action = 'subjob done';
        } else if ($roleUser['isAdmin'] == 1 && $status == 6) {
            $action = 'request overdue';
        } else if ($roleUser['isAdmin'] == 1 && $status == 7) {
            $action = 'Waiting for report';
        } else if ($roleUser['isCoadmin'] == 1 && $status > 0 && $status < 3 || $status == 4) {
            $action = 'waiting report';
        } else if ($roleUser['isCoadmin'] == 1 && $status == 3 || $status == 62) {
            $action = 'approval needed';
        } else if ($roleUser['isCoadmin'] == 1 && $status == 5) {
            $action = 'revision asked';
        } else if ($roleUser['isCoadmin'] == 1 && $status == 61 || $status == 63) {
            $action = 'waiting report';
        } else if ($roleUser['isCoadmin'] == 1 && $status == 0) {
            $action = 'subjob done';
        } else if ($roleUser['isCoadmin'] == 1 && $status == 7) {
            $action = 'waiting report';
        } else if ($roleUser['isAssessor'] == 1 && $status == 1 || $status > 2 && $status < 5) {
            $action = 'waiting report';
        } else if ($roleUser['isAssessor'] == 1 && $status == 2 || $status == 63) {
            $action = 'assessment needed';
        } else if ($roleUser['isAssessor'] == 1 && $status == 5) {
            $action = 'revision asked';
        } else if ($roleUser['isAssessor'] == 1 && $status > 60 && $status < 63) {
            $action = 'waiting report';
        } else if ($roleUser['isAssessor'] == 1 && $status == 0) {
            $action = 'subjob done';
        } else if ($roleUser['isAssessor'] == 1 && $status == 7) {
            $action = 'waiting report';
        } else {
            $action = 'waiting report';
        }

        // -------------------- action title ------------------------ //

        $data['subjob']     = $subjob;
        $data['title']      = $title;
        $data['deadline']   = $deadlineDate . ' ' . $deadlineHour;
        $data['action']     = $action;
        $data['finishTime'] = $finishTime;

        echo json_encode($data);
    }

    public function getImageCrewRemind()
    {
        $idSubjob = $this->input->post('idSubjob');

        $query = "SELECT img_refer, crew, remind, job.id AS idJob, subjob.id AS idSubjob
                FROM subjob
                INNER JOIN job
                ON subjob.id_title = job.id
                WHERE subjob.id = $idSubjob";

        $db = 'default';

        $result = $this->database->getData($query, $db);

        foreach ($result->result() as $row) {
            $crew = json_decode($row->crew, true);
            $imgRefer = json_decode($row->img_refer, true);
            $remind = json_decode($row->remind, true);
            $idJob = $row->idJob;
            $idSubjob = $row->idSubjob;
        }

        if ($imgRefer != '') {
            $newImg = $imgRefer;
        } else {
            $newImg = '';
        }

        //crew array
        $crewArray = $this->issetCrew();
        for ($i = 0; $i < count($crew); $i++) {
            if (isset($crewArray['c' . $crew[$i]])) {
                $fName[] = $crewArray['c' . $crew[$i]];
            }
        }

        for ($q = 0; $q < count($fName); $q++) {
            $exFname = explode(' ', $fName[$q]);
            $shortName[] = $exFname[0];
        }

        //remind array
        $remindArray = $this->issetCrew();
        if ($remind != '') {
            for ($r = 0; $r < count($remind); $r++) {
                if (isset($crewArray['c' . $remind[$r]])) {
                    $remindName[] = $crewArray['c' . $remind[$r]];
                }
            }
        } else {
            $remindName[] = 0;
        }

        $data['img']        = $newImg;
        $data['crewName']   = $shortName;
        $data['remind']     = $remindName;
        $data['idJob']      = $idJob;
        $data['idSubjob']   = $idSubjob;

        echo json_encode($data);
    }

    public function uploadFileRequest()
    {
        $fileName = $_FILES['fileUploadRequest']['name'];
        $idGroup = $this->input->post('idJobGroupRequest');
        $idSubjob = $this->input->post('idSubjobRequest');

        $path     = './uploads/job/' . $idGroup;
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        $format = array();
        for ($u = 0; $u < count($fileName); $u++) {
            $explode = explode('.', $fileName[$u]);
            $newFileName = $explode[0] . '_subjob_' . $idGroup . '_' . date('Y-m-d H:i:s') . '.' . end($explode);

            $_FILES['file']['name']        = 'progress_' . date('Y-m-d H:i:s') . '_' . $idGroup . '_' . '_subjob_' . $_FILES['fileUploadRequest']['name'][$u];
            $_FILES['file']['type']        = $_FILES['fileUploadRequest']['type'][$u];
            $_FILES['file']['tmp_name']    = $_FILES['fileUploadRequest']['tmp_name'][$u];
            $_FILES['file']['error']       = $_FILES['fileUploadRequest']['error'][$u];
            $_FILES['file']['size']        = $_FILES['fileUploadRequest']['size'][$u];


            // $config['file_name']        = $_FILES['fileUploadAdmin']['name'];
            $config['upload_path']      = './uploads/job/' . $idGroup;
            $config['allowed_types']    = 'png|jpg';
            $config['max_size']         = 40000;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {
                $name = $this->upload->data('file_name');

                //format saving
                $format[] = [
                    'img'   => $name,
                    'desc'  => ''
                ];
            }
        }

        $queryImg = "SELECT img_request FROM subjob WHERE id = $idSubjob";
        $db = 'default';

        $resultImg = $this->database->getData($queryImg, $db);

        foreach ($resultImg->result() as $row) {
            $imgList = json_decode($row->img_request);
        }

        if ($imgList == '') {
            //insert to database
            $dataInsert = [
                'img_request' => json_encode($format)
            ];
            $this->db->where('id', $idSubjob);
            $this->db->update('subjob', $dataInsert);

            $newList = $format;
        } else {
            $newList = array_merge($imgList, $format);

            $dataUpdate = [
                'img_request' => json_encode($newList)
            ];
            $this->db->where('id', $idSubjob);
            $this->db->update('subjob', $dataUpdate);
        }

        $data['image']    = $format;
        $data['idJob']      = $idGroup;
        $data['idSubjob']   = $idSubjob;

        echo json_encode($data);
    }

    public function uploadFileReportDone()
    {
        $fileName = $_FILES['fileUploadReportDone']['name'];
        $idGroup = $this->input->post('idJobGroupReportDone');
        $idSubjob = $this->input->post('idSubjobReportDone');

        $helper = $this->input->post('imageHelperDone');

        $path     = './uploads/job/' . $idGroup;
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        $format = array();
        for ($u = 0; $u < count($fileName); $u++) {
            $explode = explode('.', $fileName[$u]);
            $newFileName = $explode[0] . '_subjob_' . $idGroup . '_' . date('Y-m-d H:i:s') . '.' . end($explode);

            $_FILES['file']['name']        = 'done_' . date('Y-m-d H:i:s') . '_' . $idGroup . '_' . '_subjob_' . $_FILES['fileUploadReportDone']['name'][$u];
            $_FILES['file']['type']        = $_FILES['fileUploadReportDone']['type'][$u];
            $_FILES['file']['tmp_name']    = $_FILES['fileUploadReportDone']['tmp_name'][$u];
            $_FILES['file']['error']       = $_FILES['fileUploadReportDone']['error'][$u];
            $_FILES['file']['size']        = $_FILES['fileUploadReportDone']['size'][$u];


            // $config['file_name']        = $_FILES['fileUploadAdmin']['name'];
            $config['upload_path']      = './uploads/job/' . $idGroup;
            $config['allowed_types']    = 'png|jpg';
            $config['max_size']         = 2000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {

                $message = 'error';
                $errorMessage = array('error' => $this->upload->display_errors('', ''));
            } else {

                $name = $this->upload->data('file_name');

                $newName[] = $name;

                //format saving
                $format[] = [
                    'img'   => $name,
                    'desc'  => ''
                ];

                $message = 'success';

                //change size of file
                $config['source_image'] = './uploads/job/' . $idGroup . '/' . date('Y-m-d H:i:s') . '_' . $idGroup . '_' . '_subjob_' . $_FILES['fileUploadReportDone']['name'][$u];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['width']         = 15;
                $config['height']       = 10;

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();
            }
        }

        if ($message == 'error') {

            $res['message'] = $message;
            $res['errorMessage'] = $errorMessage;

            echo json_encode($res);
        } else {

            $queryImg = "SELECT img_report, reported FROM subjob WHERE id = $idSubjob";
            $db = 'jobdesk';

            $resultImg = $this->database->getData($queryImg, $db)->row_array();

            $imgList = json_decode($resultImg['img_report'], true);
            $reported = $resultImg['reported'];

            if ($helper == 0) {

                $data = [
                    'img_report'  => json_encode($format)
                ];

                $this->db->where('id', $idSubjob);
                $this->db->update('subjob', $data);
            } else {

                //merge array
                $newImg = array_merge($imgList, $format);

                $data = [
                    'img_report'  => json_encode($newImg)
                ];

                $this->db->where('id', $idSubjob);
                $this->db->update('subjob', $data);
            }

            $data['image']    = $format;
            $data['idJob']      = $idGroup;
            $data['idSubjob']   = $idSubjob;

            echo json_encode($data);
        }
    }

    public function getImageRequest()
    {
        $idSubjob = $this->input->post('idSubjob');
        $source = $this->input->post('source');
        $table = $this->input->post('table');

        $query = "SELECT $source FROM $table WHERE id = $idSubjob";
        $db = 'default';

        $result = $this->database->getData($query, $db);

        foreach ($result->result() as $row) {
            $imgList = json_decode($row->img_request, true);
            $idJob = $row->id_title;
        }

        $data['image'] = $imgList;
        $data['idJob'] = $idJob;
        $data['idSubjob']   = $idSubjob;

        echo json_encode($data);
    }

    public function getImageReportDone()
    {
        $idSubjob = $this->input->post('idSubjob');
        $source = $this->input->post('source');
        $table = $this->input->post('table');

        $query = "SELECT $source FROM $table WHERE id = $idSubjob";
        $db = 'default';

        $result = $this->database->getData($query, $db);

        foreach ($result->result() as $row) {
            $imgList = json_decode($row->img_report, true);
            $idJob = $row->id_title;
        }

        $data['image'] = $imgList;
        $data['idJob'] = $idJob;
        $data['idSubjob']   = $idSubjob;

        echo json_encode($data);
    }

    public function updateDescImage()
    {
        $key = $this->input->post('key');
        $desc = $this->input->post('desc');
        $idSubjob = $this->input->post('idSubjob');
        $imgName = $this->input->post('img');

        //get data img_report
        $query = "SELECT img_report FROM subjob WHERE id = $idSubjob";
        $db = 'default';

        $result = $this->database->getData($query, $db);

        foreach ($result->result() as $row) {
            $img = json_decode($row->img_report, true);
        }

        if ($img != '') {
            $search = array_search($imgName, $img);

            //unset
            unset($img[$search]);

            //crew new array
            $newArr[$key] = [
                'img'   => $imgName,
                'desc'  => $desc
            ];

            //merge new combine array
            $merge = array_merge($img, $newArr);

            $dataUpdate = [
                'img_report'    => json_encode($merge)
            ];

            //update in database
            $this->db->where('id', $idSubjob);
            $this->db->update('subjob', $dataUpdate);

            echo 'success';
        } else {
            echo 'failed';
        }
    }

    public function updateDescImageRequest()
    {
        $key = $this->input->post('key');
        $desc = $this->input->post('desc');
        $idSubjob = $this->input->post('idSubjob');
        $imgName = $this->input->post('img');

        //get data img_report
        $query = "SELECT img_request FROM subjob WHERE id = $idSubjob";
        $db = 'default';

        $result = $this->database->getData($query, $db);

        foreach ($result->result() as $row) {
            $img = json_decode($row->img_request, true);
        }

        if ($img != '') {
            $search = array_search($imgName, $img);

            //unset
            unset($img[$search]);

            //crew new array
            $newArr[$key] = [
                'img'   => $imgName,
                'desc'  => $desc
            ];

            //merge new combine array
            $merge = array_merge($img, $newArr);

            $dataUpdate = [
                'img_request'    => json_encode($merge)
            ];

            //update in database
            $this->db->where('id', $idSubjob);
            $this->db->update('subjob', $dataUpdate);

            echo 'success';
        } else {
            echo 'failed';
        }
    }

    public function requestOverdue()
    {
        $idSubjob = $this->input->post('idSubjob');
        $deadlineDate = $this->input->post('deadlineDate');
        $deadlineHour = $this->input->post('deadlineHour');
        $note = $this->input->post('note');

        //change db field deadline, note_report, img_report, status
        $query = "SELECT deadline, note_report, img_report, status, approval, job.admin AS jobAdmin, job.coadmin AS jobCoadmin, subjob.assessor AS jobAssessor, is_overdue
                FROM subjob
                INNER JOIN job
                ON subjob.id_title = job.id
                WHERE subjob.id = $idSubjob";
        $db = 'default';

        $result = $this->database->getData($query, $db);

        foreach ($result->result() as $row) {
            $deadlineDb = json_decode($row->deadline, true);
            $noteReport = json_decode($row->note_report, true);
            $imgReport = json_decode($row->img_report, true);
            $approval = json_decode($row->approval, true);
            $adminDb = $row->jobAdmin;
            $coadminDb = $row->jobCoadmin;
            $assessorDb = $row->jobAssessor;
            $isOverdue = $row->is_overdue;
        }

        //deadline

        //last deadline
        $lastDeadlineCreate = $deadlineDb['d' . count($deadlineDb)]['date_create'];
        $lastUserCreate = $deadlineDb['d' . count($deadlineDb)]['user_create'];
        $lastRevision = $deadlineDb['d' . count($deadlineDb)]['date_revision'];


        if ($deadlineDb != '') {
            //new deadlinedate template to save
            if (count($deadlineDb) == 0) {
                $newDeadline['d1'] = $deadlineDate . ' ' . $deadlineHour;
            } else {
                $deadlineArr['d' . (count($deadlineDb) + 1)] = [
                    'user_create'   => $lastUserCreate,
                    'date_create'   => $lastDeadlineCreate,
                    'user_request' => $deadlineDate . ' ' . $deadlineHour,
                    'date_revision' => $lastRevision
                ];
                $newDeadline = array_merge($deadlineDb, $deadlineArr);
            }
        }

        //status
        $admin = $approval['admin'];
        $coadmin = $approval['coadmin'];
        $assessor = $approval['co-assessor'];

        if ($assessor != 0 && $coadmin != '') { // exist assessor exist coadmin
            $newStatus = 2;
        } else if ($assessor == 0 && $coadmin != '') { // no assessor exist coadmin
            $newStatus = 3;
        } else if ($assessor == 0 && $coadmin == '') { // no assessor no coadmin
            $newStatus = 4;
        }

        //is_overdue
        if ($isOverdue == '') {
            $overdue = 1;
        } else {
            $overdue = $isOverdue + 1;
        }

        //update database
        $dataUpdate = [
            'deadline'  => json_encode($newDeadline),
            'note_request'      => $note,
            'status'    => 6,
            'is_overdue' => $overdue
        ];

        $this->db->where('id', $idSubjob);
        $this->db->update('subjob', $dataUpdate);

        $data['deadline']   = $newDeadline;
        $data['note']       = $note;
        $data['message']    = 'success';
        $data['idSubjob']   = $idSubjob;

        echo json_encode($data);
    }

    public function overdue()
    {
        $idSubjob = $this->input->post('idSubjob');

        //get approval data
        $query = "SELECT approval, deadline FROM subjob WHERE id = $idSubjob";
        $db = 'default';

        $result = $this->database->getData($query, $db)->row_array();
        $approval = json_decode($result['approval'], true);
        $deadline = json_decode($result['deadline'], true);

        $admin = $approval['admin'];
        $coadmin = $approval['coadmin'];
        $assessor = $approval['co-assessor'];

        // if ($assessor != '' && $coadmin != '') {
        //     $status = 63;
        // } else if ($assessor == '' && $coadmin != '') {
        //     $status = 62;
        // } else if ($assessor == '' && $coadmin == '') {
        //     $status = 61;
        // }

        $status = [
            'status'    => 8
        ];

        $this->db->where('id', $idSubjob);
        $this->db->update('subjob', $status);

        $data['message']    = 'overdue request';
        $data['deadlineCheck']  = count($deadline);

        echo json_encode($data);
    }

    // public function getHistory()
    // {
    //     $idSubjob = $this->input->post('idSubjob');
    //     $idUser = $_SESSION['id'];

    //     $query = "SELECT deadline, is_failed, deadline_revise, status, approval, reported FROM subjob WHERE id = $idSubjob";
    //     $db = 'default';

    //     $result = $this->database->getData($query, $db)->row_array();

    //     $deadline = json_decode($result['deadline'], true);
    //     $isFailed = $result['is_failed'];
    //     $deadlineRevise = json_decode($result['deadline_revise'], true);
    //     $status = $result['status'];
    //     $approval = json_decode($result['approval'], true);
    //     $reported = $result['reported'];

    //     $admin = $approval['admin'];
    //     $coadmin = $approval['coadmin'];
    //     $assessor = $approval['co-assessor'];

    //     if ($idUser != $admin) {
    //         $isUser = 1;
    //     } else if ($idUser != $coadmin) {
    //         $isUser = 1;
    //     } else if ($idUser != $assessor) {
    //         $isUser = 1;
    //     } else {
    //         $isUser = 0;
    //     }

    //     //deadline date
    //     //deadline hour
    //     //looping

    //     for ($i = 0; $i < count($deadline); $i++) {
    //         if ($reported  == 0) {
    //             if ($deadline['d' . ($i + 1)]['date_create'] != 0) {
    //                 $expDeadline = explode(' ', $deadline['d' . ($i + 1)]['date_create']);
    //                 $deadlineDate[] = $expDeadline[0];
    //                 $deadlineHour[] = $expDeadline[1];
    //                 $deadlineDateRequest[] = 0;
    //                 $deadlineHourRequest[] = 0;
    //             } else {
    //                 $deadlineDate[] = 0;
    //                 $deadlineHour[] = 0;
    //                 $deadlineDateRequest[] = 0;
    //                 $deadlineHourRequest[] = 0;
    //             }
    //             $reportHistory = 'none reported';
    //         } else {
    //             //cek deadline revise
    //             $deadlineRevise = $deadline['d' . ($i + 1)]['date_revision'];
    //             $deadlineCreate = $deadline['d' . ($i + 1)]['date_create'];
    //             $deadlineRequest = $deadline['d' . ($i + 1)]['user_request'];

    //             if ($deadlineRevise == 0) {
    //                 if ($deadlineRequest == 0) {
    //                     $deadlineDateRequest[] = 0;
    //                     $deadlineHourRequest[] = 0;
    //                 } else {
    //                     $expReq = explode(' ', $deadlineRequest);
    //                     $deadlineDateRequest[] = date('d M', strtotime($expReq[0]));
    //                     $deadlineHourRequest[] = $expReq[1];
    //                 }

    //                 if ($deadlineCreate != 0) {
    //                     $expDeadline = explode(' ', $deadlineCreate);
    //                     $deadlineDate[] = date('d M', strtotime($expDeadline[0]));
    //                     $deadlineHour[] = $expDeadline[1];
    //                 } else {
    //                     $deadlineDate[] = 0;
    //                     $deadlineHour[] = 0;
    //                 }
    //             } else if ($deadlineRevise != 0) {
    //                 if ($deadlineRequest == 0) {
    //                     $deadlineDateRequest[] = 0;
    //                     $deadlineHourRequest[] = 0;
    //                 } else {
    //                     $expReq = explode(' ', $deadlineRequest);
    //                     $deadlineDateRequest[] = date('d M', strtotime($expReq[0]));
    //                     $deadlineHourRequest[] = $expReq[1];
    //                 }

    //                 $expDeadline = explode(' ', $deadlineRevise);
    //                 $deadlineDate[] = date('d M', strtotime($expDeadline[0]));
    //                 $deadlineHour[] = $expDeadline[1];
    //             } else if ($deadlineCreate == 0) {
    //                 if ($deadlineRequest == 0) {
    //                     $deadlineDateRequest[] = 0;
    //                     $deadlineHourRequest[] = 0;
    //                 } else {
    //                     $expReq = explode(' ', $deadlineRequest);
    //                     $deadlineDateRequest[] = date('d M', strtotime($expReq[0]));
    //                     $deadlineHourRequest[] = $expReq[1];
    //                 }

    //                 $deadlineDate[] = 0;
    //                 $deadlineHour[] = 0;
    //             }
    //             $reportHistory = 'reported';
    //         }
    //     }

    //     $data['deadlineDate']       = $deadlineDate;
    //     $data['deadlineHour']       = $deadlineHour;
    //     $data['deadlineDateReq']    = $deadlineDateRequest;
    //     $data['deadlineHourReq']    = $deadlineHourRequest;
    //     $data['reported']           = $reportHistory;
    //     $data['reportTimes']        = $reported;

    //     echo json_encode($data);
    // }

    public function getHistory()
    {
        $subjobId = $this->input->post('idSubjob');

        $query = $this->db->query("SELECT is_time, reported, deadline, img_request, note_request, id_title 
                                                            FROM subjob 
                                                            WHERE id = $subjobId")->row_array();

        $deadline = json_decode($query['deadline'], true);
        $isTime = json_decode($query['is_time'], true);
        $reported = $query['reported'];
        $imgReq = json_decode($query['img_request'], true);
        $noteReq = $query['note_request'];
        $jobId = $query['id_title'];

        //report history 
        if ($isTime != '') {
            for ($r = 0; $r < count($isTime); $r++) {
                if ($isTime['r' . count($isTime)]['deadline'] == 0) {
                    $reportDate[] = 'No deadline';
                } else {
                    $reportDate[] = date('d M H:i', strtotime($isTime['r' . count($isTime)]['deadline']));
                }
            }
        } else {
            $reportDate = 0;
            $dateReq = 0;
        }

        //overdue history 
        $overdueTimes = count($deadline) - 1;

        if (count($deadline) == 1) {
            $deadlineOver = 0;
            $deadlineNew = 0;
        } else if (count($deadline) > 2) {
            for ($i = 2; $i <= (count($deadline) - 1); $i++) {
                $deadlineOver[] = date('d M H:i', strtotime($deadline['d' . $i]['date_create']));

                //deadline before 
                $lastDeadline = date('d M H:i', strtotime($deadline['d' . count($deadline)]['date_create']));

                if ($deadline['d' . $i]['date_create'] != $deadline['d' . $i]['user_request']) {
                    $deadlineNew[] = 0;
                    $dateReq = date('d M H:i', strtotime($deadline['d' . count($deadline)]['user_request']));
                } else {
                    $deadlineNew[] = date('d M H:i', strtotime($deadline['d' . $i]['user_request']));
                    $dateReq = date('d M H:i', strtotime($deadline['d' . count($deadline)]['user_request']));
                }
            }
        } else if (count($deadline) == 2) {
            for ($i = 1; $i <= (count($deadline) - 1); $i++) {
                $deadlineOver[] = date('d M H:i', strtotime($deadline['d' . $i]['date_create']));

                //deadline before 
                $lastDeadline = date('d M H:i', strtotime($deadline['d' . count($deadline)]['date_create']));

                if ($deadline['d' . $i]['date_create'] != $deadline['d' . $i]['user_request']) {
                    $deadlineNew[] = 0;
                    $dateReq = date('d M H:i', strtotime($deadline['d' . count($deadline)]['user_request']));
                } else {
                    $deadlineNew[] = date('d M H:i', strtotime($deadline['d' . $i]['user_request']));
                    $dateReq = date('d M H:i', strtotime($deadline['d' . count($deadline)]['user_request']));
                }
            }
        }


        $format['report'] = $reportDate;
        $format['reported_times'] = $reported;
        $format['dateReport1'] = $deadlineOver;
        $format['dateReport2'] = $deadlineNew;
        $format['img'] = $imgReq;
        $format['note'] = $noteReq;
        $format['jobId'] = $jobId;
        $format['dateReq'] = $dateReq;
        $format['lastDeadline'] = $lastDeadline;

        echo json_encode($format);
    }

    public function getButtonAction()
    {
        $idSubjob = $this->input->post('idSubjob');
        $idMaster = $_SESSION['id'];

        $query = "SELECT status, approval, admin, coadmin, subjob.assessor, deadline FROM subjob INNER JOIN job ON subjob.id_title = job.id WHERE subjob.id = $idSubjob";
        $db = 'default';
        $result = $this->database->getData($query, $db)->row_array();

        $status = $result['status'];
        $approval = json_decode($result['approval'], true);
        $adminDb = $result['admin'];
        $coadminDb = $result['coadmin'];
        $assessorDb = $result['assessor'];
        $deadline = json_decode($result['deadline'], true);

        $create = $deadline['d' . count($deadline)]['date_create'];
        $overdue = $deadline['d' . count($deadline)]['user_request'];

        // ----------------------------------------------- status -----------------------------------------------------

        if ($idMaster == $adminDb) {
            $isAdmin = 1;
            $isCoadmin = 0;
            $isAssessor = 0;
            $isUser = 0;
        } else if ($idMaster == $coadminDb) {
            $isCoadmin = 1;
            $isAdmin = 0;
            $isAssessor = 0;
            $isUser = 0;
        } else if ($idMaster == $assessorDb) {
            $isAssessor = 1;
            $isAdmin = 0;
            $isCoadmin = 0;
            $isUser = 0;
        } else {
            $isUser = 1;
            $isAdmin = 0;
            $isCoadmin = 0;
            $isAssessor = 0;
        }

        // ----------------------------------------------- end status -----------------------------------------------------


        // ----------------------------------------------- deadline -----------------------------------------------------

        //get deadline data
        $today = date('Y-m-d');
        $expDeadline = explode(' ', $create);

        if ($today != $expDeadline[0]) {

            $deadlineStatus = 'on going';
        } else {

            $deadlineStatus = 'overdue';
        }

        // ----------------------------------------------- end deadline -----------------------------------------------------


        // ----------------------------------------------- condition -----------------------------------------------------


        if ($status == 1 && $isAdmin == 1 || $status == 1 && $isCoadmin == 1 || $status == 1 && $isAssessor == 1) {

            $statusJob = 'waiting';
        } else if ($status == 1 && $isUser == 1) {

            $statusJob = 'active';
        } else if ($status == 2 && $isAdmin == 1 || $status == 2 && $isCoadmin == 1) {

            $statusJob = 'waiting';
        } else if ($status == 2 && $isAssessor == 1) {

            $statusJob = 'active';
        } else if ($status == 2 && $isUser == 1) {

            $statusJob = 'waiting assessment';
        } else if ($status == 3 && $isAdmin == 1) {

            $statusJob =  'waiting';
        } else if ($status == 3 && $isCoadmin == 1) {

            $statusJob = 'active';
        } else if ($status == 3 && $isUser == 1 || $status == 3 && $isAssessor == 1) {

            $statusJob = 'waiting assessment';
        } else if ($status == 4 && $isAdmin == 1) {

            $statusJob = 'active';
        } else if ($status == 4 && $isCoadmin == 1 || $status == 4 && $isAssessor == 1 || $status == 4 && $isUser == 1) {

            $statusJob = 'waiting assessment';
        } else if ($status == 5 && $isAdmin == 1 || $status == 5 && $isCoadmin == 1 || $status == 5 && $isAssessor == 1) {

            $statusJob = 'waiting';
        } else if ($status == 5 && $isUser == 1) {

            $statusJob = 'active';
        } else if ($status == 61 && $isAdmin == 1) {

            $statusJob = 'active';
        } else if ($status == 61 && $isCoadmin == 1 || $status == 61 && $isAssessor == 1 || $status == 61 && $isUser == 1) {

            $statusJob = 'waiting assessment';
        } else if ($status == 62 && $isAdmin == 1) {

            $statusJob = 'waiting';
        } else if ($status == 62 && $isCoadmin == 1) {

            $statusJob = 'active';
        } else if ($status == 62 && $isAssessor == 1 || $status == 62 && $isUser == 1) {

            $statusJob = 'waiting assessment';
        } else if ($status == 63 && $isAdmin == 1 || $status == 63 && $isCoadmin == 1) {

            $statusJob = 'waiting';
        } else if ($status == 63 && $isAssessor == 1) {

            $statusJob = 'active';
        } else if ($status == 63 && $isUser == 1) {

            $statusJob = 'waiting assessment';
        } else if ($status == 6 && $isUser == 1) {

            $statusJob = 'waiting assessment';
        } else if ($status == 6 && $isAdmin == 1) {

            $statusJob = 'active approval overdue';
        } else if ($status == 6 && $isCoadmin == 1 || $status == 6 && $isAssessor == 1) {

            $statusJob = 'waiting';
        } else if ($status == 8 && $isUser == 1) {

            $statusJob = 'active overdue';
        } else if ($status == 8 && $isAdmin == 1 || $status == 8 && $isCoadmin == 1 || $status == 1 && $isAssessor == 1) {

            $statusJob = 'waiting';
        } else if ($status == 0) {

            $statusJob = 'job done';
        }


        if ($deadlineStatus == 'overdue') {

            if ($status == 8 && $isAdmin == 1 || $status == 8 && $isCoadmin == 1 || $status == 1 && $isAssessor == 1) {

                $statusJob = 'waiting';
            } else if ($status == 8 && $isUser == 1) {

                $statusJob = 'active overdue';
            } else if ($status == 6 && $isAdmin == 1) {

                $statusJob = 'active approval overdue';
            } else if ($status == 6 && $isCoadmin == 1 || $status == 6 && $isAssessor == 1) {

                $statusJob = 'waiting';
            } else if ($status == 6 && $isUser == 1) {

                $statusJob = 'waiting assessment';
            } else if ($status = 0) {

                $statusJob = 'job done';
            }
        }



        // ----------------------------------------------- end condition -----------------------------------------------------


        $data['statusJob'] = $statusJob;
        $data['deadlineStatus'] = $deadlineStatus;
        $data['status'] = $status;

        echo json_encode($data);
    }

    public function reportasDone()
    {
        $idSubjob = $this->input->post('idSubjob');
        $note = $this->input->post('note');

        $query = "SELECT approval, note_report, is_time, reported, deadline FROM subjob WHERE id = $idSubjob";
        $db = 'default';

        $result = $this->database->getData($query, $db)->row_array();

        $approval = json_decode($result['approval'], true);
        $reported = $result['reported'];
        $noteReport = $result['note_report'];
        $isTime = json_decode($result['is_time'], true);
        $deadline = json_decode($result['deadline'], true);

        $admin = $approval['admin'];
        $coadmin = $approval['coadmin'];
        $assessor = $approval['co-assessor'];

        //status

        $statusUser = $this->database->checkStatusUser();

        if ($assessor != 0) {

            $status = 2;
        } else if ($coadmin != 0 && $coadmin != 1) {

            $status = 3;
        } else if ($coadmin != 0 && $coadmin == 1) {

            $status = 4;
        } else if ($admin != 0 && $admin == 1) {

            $status = 4;
        } else if ($admin != 0 && $admin != 1) {

            $status = 3;
        } else {

            $status = 4;
        }

        //note_report
        $newNote[] = $note;

        //reported
        if ($reported == '') {
            $newTime['r1'] = [
                'time_done'  => date('Y-m-d H:i'),
                'deadline'  => $deadline['d' . count($deadline)]['date_create']
            ];
            $newReport = 1;
        } else {
            $newReport = $reported + 1;
            $format['r' . (count($isTime) + 1)] = [
                'time_done' => date('Y-m-d H:i'),
                'deadline'  => $deadline['d' . count($deadline)]['date_create']
            ];

            $newTime = array_merge($isTime, $format);
        }

        $dataUpdate = [
            'status'        => $status,
            'note_report'   => json_encode($newNote),
            'reported'      => $newReport,
            'is_time'       => json_encode($newTime)
        ];

        $this->db->where('id', $idSubjob);
        $this->db->update('subjob', $dataUpdate);

        echo 'success';
    }

    public function getButtonAssessment()
    {
        $idSubjob = $this->input->post('idSubjob');
        $idMaster = $_SESSION['id'];

        $query = "SELECT approval, job.admin AS jobAdmin, job.coadmin AS jobCoadmin, subjob.assessor AS jobAssessor, status, role
                FROM subjob
                INNER JOIN job
                ON  subjob.id_title = job.id
                WHERE subjob.id = $idSubjob";
        $db = 'default';

        $result = $this->database->getData($query, $db)->row_array();

        $approval = json_decode($result['approval'], true);
        $adminDb = $result['jobAdmin'];
        $coadminDb = $result['jobCoadmin'];
        $assessorDb = $result['jobAssessor'];
        $status = $result['status'];
        $role = $result['role'];

        //approval set
        $admin = $approval['admin'];
        $coadmin = $approval['coadmin'];
        $assessor = $approval['co-assessor'];

        //check status
        if ($idMaster == $adminDb && $status == 0) {
            $statusButton = 'done';
        } else if ($idMaster == $adminDb && $status > 0 && $status < 4 || $status > 61) {
            $statusButton = 'waiting';
        } else if ($idMaster == $adminDb && $status == 4 || $status == 61) {
            $statusButton = 'active';
        } else if ($idMaster == $adminDb && $status == 5) {
            $statusButton = 'waiting revision';
        } else if ($idMaster == $adminDb && $status == 6) {
            $statusButton = 'waiting overdue';
        } else if ($idMaster == $adminDb && $status == 7) {
            $statusButton = 'waiting';
        } else if ($idMaster == $coadminDb && $status == 0) {
            $statusButton = 'done';
        } else if ($idMaster == $coadminDb && $status > 0 && $status < 3) {
            $statusButton = 'waiting';
        } else if ($idMaster == $coadminDb && $status == 3 || $status == 62) {
            $statusButton = 'active';
        } else if ($idMaster == $coadminDb && $status == 4 || $status == 61 || $status == 63) {
            $statusButton = 'waiting';
        } else if ($idMaster == $coadminDb && $status == 5) {
            $statusButton = 'waiting revision';
        } else if ($idMaster == $coadminDb && $status == 6) {
            $statusButton = 'waiting';
        } else if ($idMaster == $coadminDb && $status == 7) {
            $statusButton = 'waiting';
        } else if ($idMaster == $assessorDb && $status == 0) {
            $statusButton = 'done';
        } else if ($idMaster == $assessorDb && $status == 1 || $status > 2 && $status < 5) {
            $statusButton = 'waiting';
        } else if ($idMaster == $assessorDb && $status == 5) {
            $statusButton = 'waiting revision';
        } else if ($idMaster == $assessorDb && $status > 60 && $status < 63) {
            $statusButton = 'waiting';
        } else if ($idMaster == $assessorDb && $status == 2 || $status == 63) {
            $statusButton = 'active';
        } else if ($idMaster == $assessorDb && $status == 6) {
            $statusButton = 'waiting';
        } else if ($idMaster == $assessorDb && $status == 7) {
            $statusButton = 'waiting';
        } else {
            $statusButton = 'waiting';
        }

        $data['status'] = $statusButton;
        echo json_encode($data);
    }

    public function getReviseNote()
    {
        $idSubjob = $this->input->post('idSubjob');

        $query = "SELECT note_revise, img_revise, id_title FROM subjob WHERE id = $idSubjob";
        $db = 'default';

        $result = $this->database->getData($query, $db)->row_array();

        $noteRevise = $result['note_revise'];
        $imgRevise = json_decode($result['img_revise'], true);
        $idJob = $result['id_title'];

        $data['note']   = $noteRevise;
        $data['img']    = $imgRevise;
        $data['idJob']  = $idJob;

        echo json_encode($data);
    }

    public function deleteSpan()
    {
        $idSubjob = $this->input->post('idSubjob');

        $this->db->where('id', $idSubjob);
        $this->db->delete('subjob');
        echo 'success';
    }

    public function acceptDeadline()
    {
        $idSubjob = $this->input->post('idSubjob');

        $query = $this->db->query("SELECT deadline 
                                        FROM subjob 
                                        WHERE id = $idSubjob")->row_array();

        $deadline = json_decode($query['deadline'], true);
        $dateReq = $deadline['d' . count($deadline)]['user_request'];
        $dateCreate = $deadline['d' . count($deadline)]['date_create'];

        $deadline['d' . count($deadline)]['date_create'] = $dateReq;

        $dataUpdate = [
            'status'    => 1,
            'deadline'  => json_encode($deadline)
        ];

        $this->db->where('id', $idSubjob);
        $this->db->update('subjob', $dataUpdate);

        echo 'success';
    }

    public function getProposedOverdue()
    {
        $idSubjob = $this->input->post('idSubjob');

        $query = "SELECT img_request, note_request, deadline, status
                FROM subjob
                WHERE id = $idSubjob";
        $db = 'default';

        $result = $this->database->getData($query, $db)->row_array();

        $deadline = json_decode($result['deadline'], true);
        $imgRequest = json_decode($result['img_request'], true);
        $note = $result['note_request'];

        $dateRequest = $deadline['d' . count($deadline)]['user_request'];

        if ($dateRequest != '') {
            $newDeadline = explode(' ', $dateRequest);
            $deadlineDate = date('d M', strtotime($newDeadline[0]));
            $deadlineHour = $newDeadline[1];
            $deadlineFix = $deadlineDate . ' ' . $deadlineHour;
        } else {
            $deadlineFix = 0;
        }

        $data['img'] = $imgRequest;
        $data['deadline'] = $deadlineFix;
        $data['note'] = $note;
        $data['status'] = $result['status'];

        echo json_encode($data);
    }

    public function getOverdue()
    {
        $idSubjob = $this->input->post('idSubjob');

        $query = "SELECT deadline, is_overdue, note_request, img_request, id_title FROM subjob WHERE id = $idSubjob";
        $db = 'default';
        $result = $this->database->getData($query, $db)->row_array();

        $deadline = json_decode($result['deadline'], true);

        $dateRequest = $deadline['d' . count($deadline)]['user_request'];

        if (count($deadline) > 0) {
            $dateCreate = $deadline['d' . (count($deadline) - 1)]['date_create'];
        } else {
            $dateCreate = $deadline['d' . count($deadline)]['date_create'];
        }

        if ($dateRequest != '') {
            //new deadline
            $explodeRequest = explode(' ', $dateRequest);
            $dateRequestt = date('d M', strtotime($explodeRequest[0]));
            $hourRequestt = $explodeRequest[1];

            //current deadline
            if ($dateCreate == 0) {

                $dateCreatee = 'No deadline';
                $hourCreate = '0';
                $lastDeadline = '0';
                $deadlineCreate = '0';
            } else {

                $explodeCreate = explode(' ', $dateCreate);
                $dateCreatee = date('d M', strtotime($explodeCreate[0]));
                $hourCreate = $explodeCreate[1];
                $deadlineCreate = $explodeCreate[0];
                $lastDeadline = $explodeRequest[0] . ' ' . $explodeRequest[1];
            }
        } else {
            $dateRequestt = 0;
            $hourRequestt = 0;
            $dateCreatee = 0;
            $hourCreate = 0;
            $lastDeadline = 0;
            $deadlineCreate = 0;
        }

        $data['dateRequest'] = $dateRequestt;
        $data['hourRequest'] = $hourRequestt;
        $data['dateCreate'] = $dateCreatee;
        $data['hourCreate'] = $hourCreate;
        $data['isOverdue'] = $result['is_overdue'];
        $data['note'] = $result['note_request'];
        $data['img'] = json_decode($result['img_request'], true);
        $data['idJob'] = $result['id_title'];
        $data['deadlineDate'] = $deadlineCreate;
        $data['lastDeadline'] = $lastDeadline;

        echo json_encode($data);
    }

    public function changeRequestOverdue()
    {
        $idSubjob = $this->input->post('idSubjob');
        $note = $this->input->post('note');
        $deadline = $this->input->post('deadline');
        $lastDeadline = $this->input->post('lastDeadline');

        $query = "SELECT deadline FROM subjob where id = $idSubjob";
        $db = 'default';
        $result = $this->database->getData($query, $db)->row_array();

        $currDeadline = json_decode($result['deadline'], true);

        //change date revision
        foreach ($currDeadline as &$value) {
            if ($value['user_request'] == $lastDeadline) {
                $value['date_create'] = $deadline;
            }
        }

        //short date
        $expDeadline = explode(' ', $deadline);
        $dates = date('d M', strtotime($expDeadline[0])) . ' ' . $expDeadline[1];

        //update database
        $dataUpdate = [
            'deadline'  => json_encode($currDeadline),
            'status'    => 1
        ];

        $this->db->where('id', $idSubjob);
        $this->db->update('subjob', $dataUpdate);

        $data['message'] = 'success';
        $data['dates']  = $dates;

        echo json_encode($data);
    }

    public function showAlarm()
    {
        $idMaster = $_SESSION['id'];
        $db = 'default';

        $query = "SELECT deadline, remind, stoppable, alarm, id
                FROM subjob
                WHERE JSON_CONTAINS(remind, JSON_QUOTE('$idMaster'), '$')
                AND status != 0
                AND status != 13";

        $result = $this->database->getData($query, $db);

        if ($result->num_rows() > 0) {

            foreach ($result->result() as $row) {
                $deadline[] = json_decode($row->deadline, true);
                $stoppable[] = $row->stoppable;
                $alarm[] = $row->alarm;
                $idSubjob[] = $row->id;
            }

            //deadline
            for ($d = 0; $d < count($deadline); $d++) {
                $create[] = $deadline[$d]['d' . count($deadline[$d])]['date_create'];
                $revise[] = $deadline[$d]['d' . count($deadline[$d])]['date_revision'];
            }

            for ($s = 0; $s < count($create); $s++) {

                if ($create[$s] == 0) {

                    $dateCreate[] = 0;
                    $hourCreate[] = 0;
                } else {

                    $expCreate = explode(' ', $create[$s]);
                    $dateCreate[] = $expCreate[0];
                    $hourCreate[] = $expCreate[1];
                }
            }

            if ($alarm[0] < 4) {

                //today
                $today[] = date('Y-m-d');

                //intersect
                $remindToday = array_keys(array_intersect($dateCreate, $today));
            } else {

                //today
                $today = $dateCreate;

                //intersect
                $remindToday = array_keys(array_intersect($dateCreate, $today));
            }

            for ($x = 0; $x < count($remindToday); $x++) {
                $fixId[] = $idSubjob[$remindToday[$x]];
            }

            //looping data to database
            for ($i = 0; $i < count($fixId); $i++) {
                $queryRemind = "SELECT subjob, status, deadline, title, alarm, stoppable, subjob.id AS idS
                        FROM subjob
                        INNER JOIN job
                        ON subjob.id_title = job.id
                        WHERE subjob.id = $fixId[$i]";
                $resultRemind = $this->database->getData($queryRemind, $db);

                foreach ($resultRemind->result() as $r) {
                    $subjobRemind[] = $r->subjob;
                    $statusRemind[] = $r->status;
                    $deadlineRemind[] = json_decode($r->deadline, true);
                    $titleRemind[] = $r->title;
                    $alarmRemind[] = $r->alarm;
                    $stopRemind[] = $r->stoppable;
                    $idS[] = $r->idS;
                }
            }

            // message
            if (count($subjobRemind) == 0) {
                $message = 'not found';
            } else {
                $message = 'found';
            }

            //rows
            $rows = count($subjobRemind);

            // date time
            for ($dr = 0; $dr < count($deadlineRemind); $dr++) {
                $createRemind[] = $deadlineRemind[$dr]['d' . count($deadlineRemind[$dr])]['date_create'];
                $reviseRemind[] = $deadlineRemind[$dr]['d' . count($deadlineRemind[$dr])]['date_revision'];
            }

            for ($sr = 0; $sr < count($createRemind); $sr++) {

                if ($createRemind[$sr] == 0) {

                    $dateRemind[] = 0;
                    $hourRemind[] = 0;
                } else {

                    $expRemind = explode(' ', $createRemind[$sr]);
                    $dateRemind[] = $expRemind[0] . ' ' . $expRemind[1];
                    $deadlineFix[] = date('d M', strtotime($expRemind[0])) . ' ' . $expRemind[1];
                }
            }
        } else {

            $message = 'not found';
            $statusRemind[] = 0;
            $subjobRemind[] = 0;
            $dateRemind[] = 0;
            $titleRemind[] = 0;
            $alarmRemind[] = 0;
            $stopRemind[] = 0;
            $deadlineFix[] = 0;
            $rows[] = 0;
            $idS[] = 0;
        }

        $data['message'] = $message;
        $data['subjob'] = $subjobRemind;
        $data['title'] = $titleRemind;
        $data['status'] = $statusRemind;
        $data['deadlineFix'] = $deadlineFix;
        $data['dateRemind'] = $dateRemind;
        $data['rows'] = $rows;
        $data['idSubjob'] = $idS;

        echo json_encode($data);
    }
}
