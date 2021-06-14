<?php
defined('BASEPATH') or exit('Not allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('main_models', 'database');
        $this->mobile = $this->agent->mobile();
    }

    public function index()
    {
        $data['title'] = 'Job List';

        $this->layout_mobile_library->getTemplate('vzl/home/index', $data);

        //validation login
        // if (isset($_SESSION['login'])) {
        //     if ($this->mobile == 'Android' || $this->mobile == 'Apple iPhone') {
        //
        //     } else {
        //         if (isset($_SESSION['login'])) {
        //             if ($_SESSION['id'] == 1) {
        //                 $this->layout_mobile_library->getTemplate('vzl/home/index', $data);
        //             } else {
        //                 $data = [
        //                     'title' => 'Homepage'
        //                 ];
        //                 $this->layout_lib->getTemplate('home/dashboard', $data);
        //             }
        //         } else {
        //             redirect('home/error');
        //         }
        //     }
        // } else {
        //     redirect('jzl/auth/index');
        // }
    }

    public function getDataIndex()
    {
        $id = $_SESSION['id'];

        $dbMaster = 'jobdesk';


        // -------------------- all record ------------------------ //

        $queryAll = "SELECT title, crew, leader, subjob, purpose, deadline, alarm, id_title, status
        FROM job
        INNER JOIN subjob
        ON job.id = subjob.id_title
        WHERE JSON_CONTAINS(crew, JSON_QUOTE('$id'), '$') = 1
        AND subjob.status > 0";

        $resultAll = $this->database->getData($queryAll, $dbMaster);

        foreach ($resultAll->result() as $row) {
            $subjob[] = $row->subjob;
            $deadline[] = json_decode($row->deadline, true);
            $purpose[] = $row->purpose;
            $status[] = $row->status;
            $title[] = $row->title;
        }

        for ($i = 0; $i < count($deadline); $i++) {
            $count = count($deadline[$i]);
            if ($count == 1) {
                $newDeadline = explode(' ', $deadline[$i]['d1']);
                $newDeadlineDate[] = toDateDefault($newDeadline[0]);
                $newDeadlineHour[] = $newDeadline[1];
            } else {
                $newDeadline = explode(' ', $deadline[$i]['d' . $count]);
                $newDeadlineDate[] = toDateDefault($newDeadline[0]);
                $newDeadlineHour[] = $newDeadline[1];
            }
        }

        // -------------------- all record ------------------------ //


        // -------------------- active record ------------------------ //

        $queryActive = "SELECT title, crew, leader, subjob, purpose, deadline, alarm, id_title
        FROM job
        INNER JOIN subjob
        ON job.id = subjob.id_title
        WHERE JSON_CONTAINS(crew, JSON_QUOTE('$id'), '$') = 1
        AND subjob.status = 1";

        $resultActive = $this->database->getData($queryActive, $dbMaster);

        // -------------------- active recore ------------------------ //


        // -------------------- waiting record ------------------------ //

        $queryActive = "SELECT title, crew, leader, subjob, purpose, deadline, alarm, id_title
         FROM job
         INNER JOIN subjob
         ON job.id = subjob.id_title
         WHERE JSON_CONTAINS(crew, JSON_QUOTE('$id'), '$') = 1
         AND subjob.status = 2";

        $resultWaiting = $this->database->getData($queryActive, $dbMaster);

        // -------------------- waiting recore ------------------------ //


        // -------------------- failed record ------------------------ //

        $queryActive = "SELECT title, crew, leader, subjob, purpose, deadline, alarm, id_title
        FROM job
        INNER JOIN subjob
        ON job.id = subjob.id_title
        WHERE JSON_CONTAINS(crew, JSON_QUOTE('$id'), '$') = 1
        AND subjob.status = 3";

        $resultFailed = $this->database->getData($queryActive, $dbMaster);

        // -------------------- failed recore ------------------------ //


        // -------------------- done record ------------------------ //

        $queryDone = "SELECT title, crew, leader, subjob, purpose, deadline, alarm, id_title
        FROM job
        INNER JOIN subjob
        ON job.id = subjob.id_title
        WHERE JSON_CONTAINS(crew, JSON_QUOTE('$id'), '$') = 1
        AND subjob.status = 0";

        $resultDone = $this->database->getData($queryDone, $dbMaster);

        // -------------------- done recore ------------------------ //



        $data['active'] = $resultActive->num_rows();
        $data['waiting'] = $resultWaiting->num_rows();
        $data['failed'] = $resultFailed->num_rows();
        $data['allJob'] = $resultAll->num_rows();
        $data['done']   = $resultDone->num_rows();
        $data['subjob'] = $subjob;
        $data['deadline'] = $newDeadlineDate;
        $data['deadlineHour'] = $newDeadlineHour;
        $data['status'] = $status;
        $data['title'] = $title;


        echo json_encode($data);
    }

    public function getUserJob()
    {
        $id = $this->input->post('id');
        $action = $this->input->post('action');

        if ($action == '') {
            $query = "SELECT title, deadline, role, team, crew, date, is_note,  leader, purpose, subjob, id_title, subjob.id, status, note FROM job INNER JOIN subjob ON job.id = subjob.id_title WHERE JSON_CONTAINS(crew, JSON_QUOTE('$id'), '$') = 1 AND status > 0 ORDER BY status ASC";
        } else {
            $query = "SELECT title, deadline, role, team, crew, date, is_note,  leader, purpose, subjob, id_title, subjob.id, status, note, purpose, goal FROM subjob INNER JOIN job ON subjob.id_title = job.id WHERE JSON_CONTAINS(crew, JSON_QUOTE('$id'), '$') = 1";
        }
        $db = 'jobdesk';

        $result = $this->database->getData($query, $db);

        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                $date = $row->date;
                $title = $row->title;
                $team = $row->team;
                $role = $row->role;
                $deadline[] = json_decode($row->deadline, true);
                $leader = $row->leader;
                $idMaster[] = $row->id;
            }


            for ($i = 0; $i < count($deadline); $i++) {
                $count = count($deadline[$i]);
                if ($count == 1) {
                    $newDeadline = explode(' ', $deadline[$i]['d1']);
                    $newDeadlineDate[] = toDateDefault($newDeadline[0]);
                    $newDeadlineHour[] = $newDeadline[1];
                } else {
                    $newDeadline = explode(' ', $deadline[$i]['d' . $count]);
                    $newDeadlineDate[] = toDateDefault($newDeadline[0]);
                    $newDeadlineHour[] = $newDeadline[1];
                }
            }

            $masterQuery = "SELECT id FROM job WHERE JSON_CONTAINS(crew, JSON_QUOTE('$id'), '$') = 1";
            $masterResult = $this->database->getData($masterQuery, $db)->result();
            foreach ($masterResult as $rr) {
                $idTitle[] = $rr->id;
            }
        }


        //query for active
        $query0 = "SELECT status FROM job INNER JOIN subjob ON job.id = subjob.id_title WHERE JSON_CONTAINS(crew, JSON_QUOTE('$id'), '$') AND subjob.status < 3 AND subjob.status > 0";
        $resultQuery0 = $this->database->getData($query0, $db);

        //query for waiting
        $query1 = "SELECT status FROM job INNER JOIN subjob ON job.id = subjob.id_title WHERE JSON_CONTAINS(crew, JSON_QUOTE('$id'), '$') AND subjob.status = 2";
        $resultQuery1 = $this->database->getData($query1, $db);

        //query for failed job
        $query2 = "SELECT subjob.id FROM job INNER JOIN subjob ON job.id = subjob.id_title WHERE JSON_CONTAINS(crew, JSON_QUOTE('$id'), '$') AND subjob.status = 3";
        $resultQuery2 = $this->database->getData($query2, $db);
        if ($resultQuery2->num_rows() > 0) {
            $dataFailed = $resultQuery2->row_array();
        }

        //query for success job
        $query3 = "SELECT status FROM job INNER JOIN subjob ON job.id = subjob.id_title WHERE JSON_CONTAINS(crew, JSON_QUOTE('$id'), '$') AND subjob.status = 0";
        $resultQuery3 = $this->database->getData($query3, $db);


        //crew list
        $queryCrew = "SELECT id, alias FROM ac_payroll_item WHERE is_active = 1 AND office = 8 ORDER BY name ASC";
        $db = 'jobdesk';

        $resultCrew = $this->database->getData($queryCrew, $db);
        $crewArray = array();
        foreach ($resultCrew->result() as $row) {
            $crewArray['c' . $row->id] = $row->alias;
        }

        //get statistic for leader
        // $stas = $this->getStatisticLeader($leader);


        $data['result']     = $result->result();
        $data['rows']       = $result->num_rows();
        $data['crewList']   = $crewArray;
        if ($result->num_rows() > 0) {
            $data['idMaster']   = $idMaster;
        }
        $data['message']    = 'ok';
        $data['waiting']    = $resultQuery1->num_rows();
        $data['failed']     = $resultQuery2->num_rows();
        $data['success']    = $resultQuery3->num_rows();
        $data['active']     = $resultQuery0->num_rows();
        // if ($resultQuery3->num_rows() > 0) {
        //     $data['idFailed']   = $dataFailed['id'];
        // }


        if ($action == '') {
            $this->load->view('home/tableSelection', $data);
        } else {
            $this->load->view('job/reviewPage', $data);
        }
    }

    public function showDetailJob()
    {
        $id = $this->input->post('id');

        $querySubjob = "SELECT id, id_title, subjob, purpose, code, goal, deadline, alarm, reason, note, status, is_failed FROM subjob WHERE id_title = '$id'";
        $dbSubjob = 'jobdesk';

        $resultSubjob = $this->database->getData($querySubjob, $dbSubjob);

        foreach ($resultSubjob->result() as $row) {
            $code[] = $row->code;
            $subjob[] = $row->subjob;
            $purpose[] = $row->purpose;
            $goal[] = $row->goal;
            $deadline[] = json_decode($row->deadline, true);
            $reason[] = $row->reason;
            $alarm[] = json_decode($row->alarm, true);
            $idSubjob = $row->id;
        }

        //deadline
        for ($i = 0; $i < count($deadline); $i++) {
            $count = count($deadline[$i]);
            if ($count == 1) {
                $newDeadline = explode(' ', $deadline[$i]['d1']);
                $newDeadlineDate[] = toDateDefault($newDeadline[0]);
                $newDeadlineHour[] = $newDeadline[1];
            } else {
                $newDeadline = explode(' ', $deadline[$i]['d' . $count]);
                $newDeadlineDate[] = toDateDefault($newDeadline[0]);
                $newDeadlineHour[] = $newDeadline[1];
            }
        }

        //alarm
        for ($u = 0; $u < count($alarm); $u++) {
            $countAlarm = count($alarm[$u]);

            if ($countAlarm == 1) {
                $newAlarm[] = $alarm[$u]['al1'];
            } else {
                $newAlarm[] = $alarm[$u]['al' . $countAlarm];
            }
        }

        $alarmArray = $this->getIsset('alarmArray', 'SELECT id, alarm FROM alarm', 'jobdesk', 'id', 'alarm', 'a');

        $x = 0;
        foreach ($newAlarm as $al) {
            $y = 0;
            $newest = $al;
            foreach ($newest as $a) {
                if (isset($alarmArray['a' . $a])) {
                    $alarmName[$x][$y] = $alarmArray['a' . $a];
                    $y++;
                }
            }
            $x++;
        }


        foreach ($alarmName as $key => $value) {
            foreach ($value as $x) {
                $check[] = $x;
            }
        }


        //send data to view ajax
        $data['result']             = $resultSubjob->result();
        $data['rows']               = $resultSubjob->num_rows();
        $data['code']               = $code;
        $data['subjob']             = $subjob;
        $data['purpose']            = $purpose;
        $data['goal']               = $goal;
        $data['newDeadlineDate']    = $newDeadlineDate;
        $data['newDeadlineHour']    = $newDeadlineHour;
        $data['reason']             = $reason;
        $data['alarmName']          = $alarmName;
        $data['idSubjob']           = $idSubjob;

        echo json_encode($data);
    }

    public function getIsset($key, $query, $db, $id, $name, $arr)
    {
        $key = array();
        $result = $this->database->getData($query, $db);
        foreach ($result->result() as $row) {
            $key[$arr . $row->$id] = $row->$name;
        }

        return $key;
    }

    function getStatisticLeader($leader)
    {
        $query = "SELECT is_failed FROM job INNER JOIN subjob ON job.id = subjob.id_title WHERE leader = $leader";
        $db = 'jobdesk';

        $result = $this->database->getData($query, $db);

        foreach ($result->result() as $row) {
            $failed[] = $row->is_failed;
        }

        $keyValue = ["1", "2", "3"];

        $merger = array_merge($keyValue, $failed);

        $value = array_count_values($merger);

        $data['good']   = $value[1];
        $data['ok']   = $value[2];
        $data['bad']   = $value[3];

        return $data;
    }

    function getNotif()
    {
        $idMaster = $_SESSION['id'];

        $query = "SELECT is_time FROM subjob INNER JOIN job ON subjob.id_title = job.id WHERE JSON_CONTAINS(crew, JSON_QUOTE('$idMaster'), '$') = 1 AND status < 4";
        $db = 'jobdesk';

        $result = $this->database->getData($query, $db);

        foreach ($result->result() as $row) {
            $isTime[] = $row->is_time;
        }
    }

    function activateJob()
    {
        $id = $this->input->post('id');
        $data = [
            'status' => 4
        ];

        $this->db->where('id', $id);
        $this->db->update('subjob', $data);
    }

    public function getNotification()
    {
        $id = $_SESSION['id'];

        //search id in job table
        $query = "SELECT is_new, id, title FROM job WHERE JSON_CONTAINS(crew, JSON_QUOTE('$id'), '$')";
        $db  = 'jobdesk';

        $result = $this->database->getData($query, $db);

        if ($result->num_rows() > 0) {
            //get job
            foreach ($result->result() as $row) {
                $idTitle[] = $row->id;
                $isNew[] = $row->is_new;
            }

            for ($i = 0; $i < count($idTitle); $i++) {
                $isUpdate[] = substr($isNew[$i], -1);
                $newTitle = $idTitle[$i];

                $query = "SELECT subjob, deadline FROM subjob WHERE id_title = $newTitle";
                $db = 'jobdesk';

                $result = $this->database->getData($query, $db)->result();
                foreach ($result as $row) {
                    $sub[] = $row->subjob;
                }

                if ($isNew[$i] == 1) {
                    //show notification for all user

                    $resultSubjob       = $this->database->getData($query, $db);
                    $data['result']     = $sub;
                    $data['rows']       = count($sub);
                    $data['jobCount']   = count($sub);
                    $data['message']    = 'found';
                } else if ($isUpdate[$i] == $id) {
                    $data['message'] = 'not found';
                } else if ($isNew == 0) {
                    $data['message'] = 'not found';
                } elseif ($isUpdate[$i] != $id) {
                    $resultSubjob = $this->database->getData($query, $db);
                    $data['result']     = $sub;
                    $data['rows']       = count($sub);
                    $data['jobCount']   = count($sub);
                    $data['message']    = 'found';
                }
            }

            echo json_encode($data);
        }
    }

    public function clearNotification()
    {
        $id = $_SESSION['id'];

        $query = "SELECT is_new, id, title, crew FROM job WHERE JSON_CONTAINS(crew, JSON_QUOTE('$id'), '$')";
        $db  = 'jobdesk';

        $result = $this->database->getData($query, $db);
        foreach ($result->result() as $row) {
            $idJob[] = $row->id;
            $isNew[] = $row->is_new;
            $crew[] = json_decode($row->crew, true);
            $title[]    = $row->title;
        }

        $updateBatch = array();
        for ($i = 0; $i < count($idJob); $i++) {
            $sub[] = substr($isNew[$i], -1);

            $newVar[] = $isNew[$i] . $id;

            $countCrew[] = count($crew[$i]);


            if ($sub[$i] == $id) {
                $arr[] = 'not found';
            } elseif ($isNew[$i] == 0) {
                $arr[] = 'not found';
            } elseif (strlen($newVar[$i]) == ($countCrew[$i] + 1)) {
                $updateBatch[] = [
                    'is_new'    => 0
                ];
                $this->db->update_batch('job', $updateBatch, 'id');
            } else {
                $tes = array();
                foreach ($newVar as $key => $val) {
                    $tes[] = [
                        'id'        => $idJob[$key],
                        'is_new'    => $newVar[$key]
                    ];
                }
                $this->db->update_batch('job', $tes, 'id');
            }
        }



        return false;

        $sub = substr($isNew, -1);

        $newVar = $isNew . $id;

        if ($sub == $id) {
            echo 'not found';
        } elseif ($isNew == 0) {
            echo 'not found';
        } elseif (strlen($newVar) == ($countCrew + 1)) {
            $dataUpdate = [
                'is_new' => 0
            ];
            $this->db->where('id', $idJob);
            $this->db->update('job', $dataUpdate);
        } elseif ($sub != $id) {
            $dataUpdate = [
                'is_new'    => $newVar
            ];
            $this->db->where('id', $idJob);
            $this->db->update('job', $dataUpdate);
        }



        // if ($isNew != '1' . $countCrew) {
        //     $new = $isNew . $id;
        //     $dataUpdate = [
        //         'is_new'    => $new
        //     ];

        //     $this->db->where('id', $idJob);
        //     $this->db->update('job', $dataUpdate);
        // } elseif ($isNew == '1' . $countCrew) {
        //     $dataUpdate = [
        //         'is_new'    => 0
        //     ];

        //     $this->db->where('id', $idJob);
        //     $this->db->update('job', $dataUpdate);
        // }
        echo json_encode($newVar);
    }

    public function getUpcomingDeadline()
    {
        $id = $_SESSION['id'];

        $query = "SELECT deadline, subjob, purpose, note, id_title FROM job INNER JOIN subjob ON job.id = subjob.id_title WHERE JSON_CONTAINS(crew, JSON_QUOTE('$id'), '$') = 1 AND status = 1";
        $db = 'jobdesk';

        $result = $this->database->getData($query, $db);

        foreach ($result->result() as $row) {
            $deadline[] = json_decode($row->deadline, true);
        }

        for ($i = 0; $i < count($deadline); $i++) {
            $newDeadline[] = $deadline[$i];
        }

        for ($x = 0; $x < count($newDeadline); $x++) {
            if (count($newDeadline[$x]) == 1) {
                $explode = explode(' ', $newDeadline[$x]['d1']);
                $deadlineDate[] = $explode[0];
                $deadlineHour[] = $explode[1];
                $deadlineDefault[] = $explode[0] . ' ' . $explode[1];
            } elseif (count($newDeadline[$x]) > 1) {
                $explode = explode(' ', $newDeadline[$x]['d' . count($newDeadline[$x])]);
                $deadlineDate[] = $explode[0];
                $deadlineHour[] = $explode[1];
                $deadlineDefault[] = $explode[0] . ' ' . $explode[1];
            }
        }

        $data['result']         = $result->result();
        $data['deadlineDate']   = toDateDefault(end($deadlineDate));
        $data['deadlineHour']   = end($deadlineHour);
        $data['id']             = $id;
        $data['timer']          = $deadlineDefault;

        echo json_encode($data);
    }

    public function showNotificationAlarm()
    {
        $id = $_SESSION['id'];

        $query = "SELECT alarm, subjob, deadline ,note FROM job INNER JOIN subjob ON job.id = subjob.id_title WHERE JSON_CONTAINS(crew, JSON_QUOTE('$id'), '$') = 1 AND status = 1";
        $db = 'jobdesk';

        $result = $this->database->getData($query, $db);

        foreach ($result->result() as $row) {
            $alarm[] = json_decode($row->alarm, true);
            $deadline[] = json_decode($row->deadline, true);
        }

        // -------------------- alarm ------------------------ //

        $queryAlarm = "SELECT id, alarm FROM alarm";
        $dbAlarm = 'jobdesk';

        $resultAlarm = $this->database->getData($queryAlarm, $dbAlarm);

        $alarmArray = array();
        foreach ($resultAlarm->result() as $r) {
            $alarmArray['a' . $r->id] = $r->alarm;
        }

        for ($i = 0; $i < count($alarm); $i++) {
            $alarmKey[] = end($alarm[$i]);
            $newAlarm = end($alarm[$i]);
            for ($x = 0; $x < count($newAlarm); $x++) {
                $newAlarmArray[] = $newAlarm[$x];
            }

            $count[] = count($alarm[$i]);
        }


        $y = 0;
        foreach ($alarmKey as $ro) {
            $r = $ro;
            $o = 0;
            foreach ($r as $rr) {
                $alarmName[$y][$o] = $alarmArray['a' . $rr];
                $o++;
            }
            $y++;
        }

        $day = convertIdDay(date('D'));

        if (in_array('9', $newAlarmArray)) {
            $day = convertIdDay(date('D'));
            if (in_array($day, $newAlarmArray)) {
                $day = convertIdDay(date('D'));
                echo 'oke';
                $alarmKey1 = 'alarm found';
            }
            $alarmKey1 = 'alarm found';
        } elseif (in_array($day, $newAlarmArray)) {
            $alarmKey1 = 'alarm found';
        } else {
            $alarmKey1 = 'alarm not found';
        }

        // -------------------- end alarm ------------------------ //



        // -------------------- deadline ------------------------ //

        for ($i = 0; $i < count($deadline); $i++) {
            $newDeadline[] = end($deadline[$i]);
            // if (count($deadline[$i]) == 1) {
            //     $newDeadline = $deadline[$i]['d1'];
            // } else {
            //     $newDeadline[] = $deadline[$i]['d' . ($i + 1)];
            // }
            $explode = explode(' ', $newDeadline[$i]);
            $deadlineName[] = toDateDefault($explode[0]) . ', ' . $explode[1];
        }


        // -------------------- end deadline ------------------------ //

        $data['alarmName']  = $alarmName;
        $data['result']     = $result->result();
        $data['deadline']   = $deadlineName;

        if ($alarmKey1 != '') {
            $data['alarmKey'] = $alarmKey1;
        } else {
            $data['alarmKey'] = 'alarm not found';
        }

        echo json_encode($data);
    }

    public function setNotification()
    {
        $idUser = $_SESSION['id'];
        $trigger = $this->input->post('trigger');

        $query = "SELECT crew, id, title, leader FROM job WHERE role = 1";
        $db = 'jobdesk';

        $result = $this->database->getData($query, $db);
        foreach ($result->result() as $row) {
            $crew = json_decode($row->crew, true);
        }

        if ($trigger == 'new job') {
            if (in_array($idUser, $crew)) {
                $queryA = "SELECT job.id as id_job, subjob.id AS id_subjob, id_title, subjob, title, leader, deadline
                        FROM job
                        INNER JOIN subjob
                        ON job.id = subjob.id_title
                        WHERE JSON_CONTAINS(crew, JSON_QUOTE('$idUser'), '$') = 1
                        AND role = 1
                        AND status = 1";
                $dbA = 'jobdesk';

                $resultA = $this->database->getData($queryA, $dbA);

                foreach ($resultA->result() as $row) {
                    $deadline[] = json_decode($row->deadline, true);
                    $subjob[] = $row->subjob;
                    $title[] = $row->title;
                }

                for ($i = 0; $i < count($deadline); $i++) {
                    $newDeadline = $deadline[$i]['d1'];
                    $explode = explode(' ', $newDeadline);
                    $deadlineDate[] = toDateDefault(($explode[0]));
                }

                $data['deadline']   = $deadlineDate;
                $data['subjob']     = $subjob;
                $data['title']      = $title;
                $data['rows']       = $resultA->num_rows();

                echo json_encode($data);
            }
        }
    }

    public function getCrew()
    {
        $this->load->view('vzl/home/modalAddCrew');
    }

    public function clearSession()
    {
        $key = $this->input->post('DataSess');

        session_destroy($_SESSION[$key]);
    }

    // -------------------- error page ------------------------ //

    public function error()
    {
        $this->load->view('errors/nologin');
    }
}
