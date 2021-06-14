<?php
defined('BASEPATH') or exit('No direct script allowed');

class MobileJob extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('mzl/main_model', 'database');
    }

    public function greeting() {
        $id = $_SESSION['id'];

        //crew array
        $query = "SELECT id, name
                FROM ac_payroll_item
                WHERE id = $id
                AND barcode IS NOT null";
        $db = 'we';

        $result = $this->database->getData($query, $db);
        $crewArray = array();
        foreach ($result->result() as $row) {
            $crewArray['c' . $row->id] = $row->name;
            if (isset($crewArray['c' . $id])) {
                $fullName = $crewArray['c' . $id];
            }
        }

        $ex = explode(' ', $fullName);
        echo $ex['0'];
    }

    public function getCrew() {
        $this->load->view('vzl/home/modalAddCrew');
    }

    public function replaceChar($value) {
        $str = $value;
        $pattern = "/[^0-9]+/";
        $result = preg_replace($pattern, '', $str);
        return $result;
    }

    public function saveTemplateGroupJob() {
        $dataUpdate = [
            'title' => '',
            'admin' => $_SESSION['id']
        ];

        $this->db->insert('job', $dataUpdate);

        //get the id
        $id = $this->db->insert_id();

        $data['idJobGroup'] = $id;

        echo json_encode($data);
    }

    public function saveTemplateSubjob() {
        $idJob = $this->input->post('idJob');
        //generate code
        $code = $this->codeGenerator($_SESSION['user']);

        $dataInput = [
            'id_title'  => $idJob,
            'code'      => $code
        ];

        $this->db->insert('subjob', $dataInput);

        $idSubjob = $this->db->insert_id();


        $data['idSubjob'] = $idSubjob;
        $data['code']       = $code;

        echo json_encode($data);
    }

    function codeGenerator($user) {
        $num = rand(10, 500);

        $code = $user . $num;

        return $code;
    }

    public function deleteJobGroup() {
        $id = $this->input->post('id');

        $query = "SELECT title, crew, leader
                FROM job
                WHERE id = $id";
        $db = 'default';

        $result = $this->database->getData($query, $db)->result();
        foreach ($result as $row) {
            $title = $row->title;
            $crew = json_decode($row->crew, true);
            $leader = $row->leader;
        }

        if ($title == '' || $crew == '') {
            $this->db->where('id', $id);
            $this->db->delete('job');

            $this->db->where('id_title', $id);
            $this->db->delete('subjob');

            echo 'oke';
        } else {
            echo 'failed';
        }
    }

    public function getListCrew() {
        //pt array
        $ptArray = array();
        $queryPt = "SELECT id, name
                FROM ansena_department
                ORDER BY name ASC";
        $resultPt = $this->database->getData($queryPt, 'we');

        foreach ($resultPt->result() as $row) {
            $ptArray['p' . $row->id] = $row->name;
        }

        //name array
        $nameArray = array();
        $queryName = "SELECT id, name, office
                  FROM ac_payroll_item
                  WHERE is_active = 1
                  AND barcode is not NULL
                  ORDER BY name ASC";
        $resultName = $this->database->getData($queryName, 'we');

        foreach ($resultName->result() as $r) {
            $name[] = $r->name;
            $idCrew[] = $r->id;
            if (isset($ptArray['p' . $r->office])) {
                $ptName[] = $ptArray['p' . $r->office];
            }
            $office[] = $r->office;
        }

        $data['crew'] = $name;
        $data['pt'] = $ptName;
        $data['id'] = $idCrew;
        $data['idPt'] = $office;

        echo json_encode($data);


        // $query = "SELECT id, name, office
        //         FROM ac_payroll_item
        //         WHERE is_active = 1
        //         AND office = 8
        //         AND barcode IS NOT null
        //         AND id != 1";
        //
        // $db = 'we';
        //
        // // pt
        // $queryPt = "SELECT id, name
        //         FROM ansena_department";
        // $resultPt = $this->database->getData($queryPt, $db);
        //
        // $ptArray = array();
        // foreach ($resultPt->result() as $row) {
        //     $ptArray['p' . $row->id] = $row->name;
        // }
        //
        // $result = $this->database->getData($query, $db);
        //
        // foreach ($result->result() as $r) {
        //     if (isset($ptArray['p' . $r->office])) {
        //         $office[] = $ptArray['p' . $r->office];
        //     }
        // }
        //
        // $data['result'] = $result->result();
        // $data['ptName'] = $office;
        //
        // echo json_encode($data);
    }

    public function getListCoadmin() {
        $id = $this->input->post('id');


        $dbCrew = 'we';


        // pt
        $queryPt = "SELECT id, name
                FROM ansena_department";
        $resultPt = $this->database->getData($queryPt, $dbCrew);

        $ptArray = array();
        foreach ($resultPt->result() as $row) {
            $ptArray['p' . $row->id] = $row->name;
        }

        //get list crew
        $queryCrew = "SELECT name, id, office
                    FROM ac_payroll_item
                    WHERE is_active = 1
                    AND barcode IS NOT null
                    AND id != 1";

        $resultCrew = $this->database->getData($queryCrew, $dbCrew);

        $crewArray = array();
        foreach ($resultCrew->result() as $r) {
            if (isset($ptArray['p' . $r->office])) {
                $office[] = $ptArray['p' . $r->office];
            }
            $crewArray['c' . $r->id] = $r->name;
        }


        $data['result'] = $resultCrew->result();
        $data['ptName'] = $office;

        echo json_encode($data);
    }

    public function saveCrew() {
        $crew = $this->input->post('crew');
        $id = $this->input->post('id');
        $pt = $this->input->post('pt');

        $dataUpdate = [
            'crew'  => json_encode($crew),
            'pt'    => json_encode(array_unique($pt))
        ];

        $this->db->where('id', $id);
        $this->db->update('job', $dataUpdate);

        //crew array
        $query = "SELECT id, name
                FROM ac_payroll_item
                WHERE is_active = 1
                AND barcode IS NOT null";
        $db = 'we';

        $resultCrew = $this->database->getData($query, $db);

        $crewArray = array();
        foreach ($resultCrew->result() as $row) {
            $crewArray['c' . $row->id] = $row->name;
        }

        foreach ($crew as $r) {
            if (isset($crewArray['c' . $r])) {
                $crewName[] = $crewArray['c' . $r];
            }
        }

        for ($i = 0; $i < count($crewName); $i++) {
            $shortName[] = explode(' ', $crewName[$i]);
        }

        $data['crewName'] = $crewName;
        $data['crewId'] = $crew;
        $data['shortName'] = $shortName;
        $data['ptId'] = $pt;

        echo json_encode($data);
    }

    public function saveRemind() {
        $remind = $this->input->post('remind');

        //crew array
        $query = "SELECT id, name
                FROM ac_payroll_item
                WHERE is_active = 1
                AND barcode IS NOT null";
        $db = 'we';

        $resultCrew = $this->database->getData($query, $db);

        $crewArray = array();
        foreach ($resultCrew->result() as $row) {
            $crewArray['c' . $row->id] = $row->name;
        }

        foreach ($remind as $r) {
            if (isset($crewArray['c' . $r])) {
                $crewName[] = $crewArray['c' . $r];
            }
        }

        $data['crewName'] = $crewName;
        $data['crewId'] = $remind;

        echo json_encode($data);
    }

    public function saveRemindtoDb() {
        $remind = $this->input->post('remind');
        $idSubjob = $this->input->post('idSubjob');

        $data = [
            'remind' => json_encode($remind)
        ];

        $this->db->where('id', $idSubjob);
        $this->db->update('subjob', $data);

        echo 'success';
    }

    public function getLeader() {
        $leader = $this->input->post('leader');
        $id = $this->input->post('id');

        //crew array
        $query = "SELECT id, name
                FROM ac_payroll_item
                WHERE is_active = 1
                AND barcode IS NOT null";
        $db = 'we';

        $result = $this->database->getData($query, $db);

        $crewArray = array();
        foreach ($result->result() as $row) {
            $crewArray['c' . $row->id] = $row->name;
        }

        if (isset($crewArray['c' . $leader[0]])) {
            $name = $crewArray['c' . $leader[0]];
        }

        $arrName = explode(' ', $name);
        $newName = $arrName[0];

        $data['name'] = $newName;
        $data['idName'] = $leader[0];

        $dataUpdate = [
            'leader'    => $leader[0]
        ];

        $this->db->where('id', $id);
        $this->db->update('job', $dataUpdate);

        echo json_encode($data);
    }

    public function saveCoadmin() {
        $coadmin = $this->input->post('coadmin');
        $id = $this->input->post('id');

        //update
        $dataUpdate = [
            'coadmin'   => $coadmin[0]
        ];

        $this->db->where('id', $id);
        $this->db->update('job', $dataUpdate);

        //get name
        $query = "SELECT name, id
                FROM ac_payroll_item
                WHERE is_active = 1
                AND barcode IS NOT null";
        $db = 'we';

        $result = $this->database->getData($query, $db);

        $crewArray = array();
        foreach ($result->result() as $row) {
            $crewArray['c' . $row->id] = $row->name;
        }

        $name = $crewArray['c' . $coadmin[0]];
        $exp = explode(' ', $name);

        $crewName = $exp[0];

        $data['name'] = $crewName;
        $data['idName'] = $coadmin[0];

        echo json_encode($data);
    }

    public function saveTitle() {
        $title = $this->input->post('title');
        $idGroup = $this->input->post('id');

        $dataUpdate = [
            'title' => $title
        ];

        $this->db->where('id', $idGroup);
        $this->db->update('job', $dataUpdate);

        echo 'success';
    }

    public function showDetailSubjob() {
        $this->load->view('vzl/home/modal_add_subjob');
    }

    public function deleteSubjob() {
        $idSubjob = $this->input->post('idSubjob');
        $this->db->where('id', $idSubjob);
        $this->db->delete('subjob');

        $data['message'] = 'success';
        echo json_encode($data);
    }

    public function showDetailRemind() {
        $this->load->view('vzl/home/modalAddRemind');
    }

    public function showDetailAssessor() {
        $this->load->view('vzl/home/modalAddAssessor');
    }

    public function showDetailCoadmin() {
        $this->load->view('vzl/home/modalAddCoadmin');
    }

    public function showModalJob() {
        $this->load->view('vzl/home/modalAddJob');
    }

    public function getListIndex() {
      $idMaster = $_SESSION['id'];

      $this->db->trans_start();
      $dbDefault = 'jobdesk';

      //query master 
      $query = $this->db->query("SELECT approval, deadline, subjob, title, subjob.id AS idSubjob, job.id AS idJob, status, is_priority, subjob.assessor as assessorDb, job.admin as adminDb, job.coadmin as coadminDb, subjob.id_title
                                                FROM subjob
                                                INNER JOIN job 
                                                ON subjob.id_title = job.id
                                                WHERE (JSON_CONTAINS(approval, JSON_QUOTE('$idMaster'), '$.admin') = 1
                                                OR JSON_CONTAINS(approval, JSON_QUOTE('$idMaster'), '$.coadmin') = 1
                                                OR JSON_CONTAINS(approval, JSON_QUOTE('$idMaster'), '$.co-assessor') = 1
                                                OR JSON_CONTAINS(crew, JSON_QUOTE('$idMaster'), '$') = 1) 
                                                AND status > 0");

      if ($query->num_rows() > 0) {

        foreach ($query->result() as $r) {
          $deadline[] = json_decode($r->deadline, true);
          $status[] = $r->status;
          $priorityStatus[] = $r->is_priority;
          $idJobGroup[] = $r->id_title;
          $subjob[] = $r->subjob;
          $title[] = $r->title;
          $subjobId[] = $r->idSubjob;
          $approval[] = json_decode($r->approval, true);
        }

        for ($d = 0; $d < count($deadline); $d++) {

          if ($deadline[$d] != '') {

            if (count($deadline[$d]) == 1) {

              if ($deadline[$d]['d1']['date_create'] == 0) {

                $deadlineFix[] = $deadline[$d]['d1']['date_create'];
              } else {

                $expCreate = explode(' ', $deadline[$d]['d1']['date_create']);
                $deadlineFix[] = date('d M', strtotime($expCreate[0])) . ' ' . $expCreate[1];
              }
            } else {

              if ($deadline[$d]['d' . count($deadline[$d])]['date_create'] == 0) {

                $deadlineFix[] = 0;
              } else {

                $expCreate = explode(' ', $deadline[$d]['d' . count($deadline[$d])]['date_create']);
                $deadlineFix[] = date('d M', strtotime($expCreate[0])) . ' ' . $expCreate[1];
              }
            }
          } else {

            $deadlineFix[] = 0;
          }
        }

        //condition status user 
        for ($i = 0; $i < count($approval); $i++) {
          if ($approval[$i]['admin'] == $idMaster) {
            $isAdmin[] = 1;
            $isCoadmin[] = 0;
            $isAssessor[] = 0;
            $isUser[] = 0;
          } else if ($approval[$i]['coadmin'] == $idMaster) {
            $isAdmin[] = 0;
            $isCoadmin[] = 1;
            $isAssessor[] = 0;
            $isUser[] = 0;
          } else if ($approval[$i]['co-assessor'] == $idMaster) {
            $isAdmin[] = 0;
            $isCoadmin[] = 0;
            $isAssessor[] = 1;
            $isUser[] = 0;
          } else {
            $isAdmin[] = 0;
            $isCoadmin[] = 0;
            $isAssessor[] = 0;
            $isUser[] = 1;
          }
        }

        $dataCheck = array();
        for ($ab = 0; $ab < count($idJobGroup); $ab++) {

          //active 
          if ($status[$ab] == 1 || $status == 1) {
            if ($isUser[$ab] == 1) {
              $active[] = 1;
              $failed[] = 0;
              $waiting[] = 0;
            } else if ($isAssessor[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            } else if ($isCoadmin[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            } else if ($isAdmin[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            }
          } else if ($status[$ab] == 2) {
            if ($isUser[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            } else if ($isAssessor[$ab] == 1) {
              $active[] = 1;
              $failed[] = 0;
              $waiting[] = 0;
            } else if ($isCoadmin[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            } else if ($isAdmin[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            }
          } else if ($status[$ab] == 3) {
            if ($isUser[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            } else if ($isAssessor[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            } else if ($isCoadmin[$ab] == 1) {
              $active[] = 1;
              $failed[] = 0;
              $waiting[] = 0;
            } else if ($isAdmin[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            }
          } else if ($status[$ab] == 4) {
            if ($isUser[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            } else if ($isAssessor[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            } else if ($isCoadmin[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            } else if ($isAdmin[$ab] == 1) {
              $active[] = 1;
              $failed[] = 0;
              $waiting[] = 0;
            }
          } else if ($status[$ab] == 5) {
            if ($isUser[$ab] == 1) {
              $failed[] = 1;
              $active[] = 0;
              $waiting[] = 0;
            } else if ($isAssessor[$ab] == 1) {
              $failed[] = 0;
              $active[] = 0;
              $waiting[] = 1;
            } else if ($isCoadmin[$ab] == 1) {
              $failed[] = 0;
              $active[] = 0;
              $waiting[] = 1;
            } else if ($isAdmin[$ab] == 1) {
              $failed[] = 0;
              $active[] = 0;
              $waiting[] = 1;
            }
          } else if ($status[$ab] == 6) {
            if ($isUser[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            } else if ($isAssessor[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            } else if ($isCoadmin[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            } else if ($isAdmin[$ab] == 1) {
              $active[] = 1;
              $failed[] = 0;
              $waiting[] = 0;
            }
          } else if ($status[$ab] == 8) {
            if ($isUser[$ab] == 1) {
              $active[] = 1;
              $failed[] = 0;
              $waiting[] = 0;
            } else if ($isAssessor[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            } else if ($isCoadmin[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            } else if ($isAdmin[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 1;
            }
          } else if ($status[$ab] == 61) {
            if ($isUser[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            } else if ($isAssessor[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            } else if ($isCoadmin[$ab] == 1) {
              $waiting[] = 1;
              $active[] = 0;
              $failed[] = 0;
            } else if ($isAdmin[$ab] == 1) {
              $active[] = 1;
              $failed[] = 0;
              $waiting[] = 0;
            }
          } else if ($status[$ab] == 62) {
            if ($isUser[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            } else if ($isAssessor[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            } else if ($isCoadmin[$ab] == 1) {
              $active[] = 1;
              $failed[] = 0;
              $waiting[] = 0;
            } else if ($isAdmin[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            }
          } else if ($status[$ab] == 63) {
            if ($isUser[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            } else if ($isAssessor[$ab] == 1) {
              $active[] = 1;
              $failed[] = 0;
            } else if ($isCoadmin[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            } else if ($isAdmin[$ab] == 1) {
              $waiting[] = 1;
              $failed[] = 0;
              $active[] = 0;
            }
          } else if ($status[$ab] == 0) {
            $active[] = 0;
            $failed[] = 0;
            $waiting[] = 0;
          } else {
            $active[] = 0;
            $failed[] = 0;
            $waiting[] = 0;
          }

          $dataCheck[] = [
            'idJobGroup' => $idJobGroup[$ab],
            'status'  => $status[$ab],
            'priorityStatus' => $priorityStatus[$ab],
            'subjob'      => $subjob[$ab],
            'title'       => $title[$ab],
            'deadline'    => $deadlineFix[$ab],
            'isAdmin'     => $isAdmin[$ab],
            'isCoadmin'   => $isCoadmin[$ab],
            'isAssessor'  => $isAssessor[$ab],
            'isUser'      => $isUser[$ab],
            'subjobId'  => $subjobId[$ab]
          ];
        }

        $data = [
          'active'  => array_sum($active),
          'failed'  => array_sum($failed),
          'waiting' => array_sum($waiting),
          'priority' => 0,
          'result'  => $dataCheck,
          'isAdmin' => $isAdmin,
          'isCoadmin' => $isCoadmin,
          'isAssessor'  => $isAssessor,
          'isUser'  => $isUser,
          'status'  => $status
        ];
      } else {
        $data = [
          'active'  => 0,
          'failed'  => 0,
          'waiting' => 0,
          'priority' => 0,
          'result'  => array(),
          'isAdmin' => 0,
          'isCoadmin' => 0,
          'isAssessor'  => 0,
          'isUser'  => 0,
          'status'  => 0
        ];
      }

      echo json_encode($data);

      $this->db->trans_complete();
    }

    public function saveConclusion() {
        $idSubjob = $this->input->post('idSubjob');
        $subjob = $this->input->post('subjob');
        $purpose = $this->input->post('purpose');
        $deadlineDate = $this->input->post('deadlineDate');
        $remind = $this->input->post('remind');
        $assessor = $this->input->post('assessor');
        $coadmin = $this->input->post('coadmin');
        $priority = $this->input->post('priority');
        $note = $this->input->post('note');

        if ($deadlineDate == '') {
            $newDeadline = null;
        } else {
            $newDeadline = date('d F', strtotime($deadlineDate));
        }

        //save remind data
        $dataRemind = [
            'remind'  => json_encode($remind)
        ];

        $this->db->where('id', $idSubjob);
        $this->db->update('subjob', $dataRemind);

        $data = [
            'idSubjob'  => $idSubjob,
            'subjob' => $subjob,
            'purpose'   => $purpose,
            'deadlineDate'  => $newDeadline,
            'remind'        => $remind,
            'assessor'      => $assessor,
            'coadmin'       => $coadmin,
            'priority'      => $priority,
            'note'          => $note
        ];

        echo json_encode($data);
    }

    public function getConclusion()  {
        $id = $this->input->post('id');
        $query = "SELECT subjob, code FROM subjob WHERE id_title = $id AND status = 1";
        $db = 'default';

        $result = $this->database->getData($query, $db);

        $data['result'] = $result->result();

        echo json_encode($data);
    }

    public function saveJobs() {
        $idJob = $this->input->post('idJob');
        $idSubjob = $this->input->post('idSubjob');
        $subjob = $this->input->post('subjob');
        $deadlineDate = $this->input->post('deadlineDate');
        $deadlineHour = $this->input->post('deadlineHour');
        $purpose = $this->input->post('purpose');
        $remind = $this->input->post('remind');
        $assessor = $this->input->post('assessor');
        $title = $this->input->post('title');
        $crew = $this->input->post('crew');
        $leader = $this->input->post('leader');
        $coadmin = $this->input->post('coadmin');
        $coadminHelper = $this->input->post('coadminHelper');
        $priority = $this->input->post('priority');
        $note = $this->input->post('note');
        $stoppable = $this->input->post('stoppable');
        $remindAlarm = $this->input->post('remindAlarm');
        $origin = $this->input->post('origin');

        $idSubjobFix = array_map(function ($idSubjob) {
            return (empty($idSubjob)) ? "0" : $idSubjob;
        }, $idSubjob);

        $subjobFix = array_map(function ($subjob) {
            return (empty($subjob)) ? "0" : $subjob;
        }, $subjob);

        $deadlineDateFix = array_map(function ($deadlineDate) {
            return (empty($deadlineDate)) ? "0" : $deadlineDate;
        }, $deadlineDate);

        $deadlineHourFix = array_map(function ($deadlineHour) {
            return (empty($deadlineHour)) ? "0" : $deadlineHour;
        }, $deadlineHour);

        $purposeFix = array_map(function ($purpose) {
            return (empty($purpose)) ? "0" : $purpose;
        }, $purpose);

        $remindFix = array_map(function ($remind) {
            return (empty($remind)) ? "0" : $remind;
        }, $remind);

        $assessorFix = array_map(function ($assessor) {
            return (empty($assessor)) ? "0" : $assessor;
        }, $assessor);

        $coadminFix = array_map(function ($coadmin) {
            return (empty($coadmin)) ? "1" : $coadmin;
        }, $coadmin);

        $priorityFix = array_map(function ($priority) {
            return (empty($priority)) ? "0" : $priority;
        }, $priority);

        $noteFix = array_map(function ($note) {
            return (empty($note)) ? "0" : $note;
        }, $note);

        $stoppableFix = array_map(function ($stoppable) {
            return (empty($stoppable)) ? "0" : $stoppable;
        }, $stoppable);

        $remindAlarmFix = array_map(function ($remindAlarm) {
            return (empty($remindAlarm)) ? "0" : $remindAlarm;
        }, $remindAlarm);

        $datacheck = [
            'idJob'         => $idJob,
            'crew'          => $crew,
            'subjob'    => $subjobFix,
            'deadlineDate'  => $deadlineDateFix,
            'deadlineHour'  => $deadlineHourFix,
            'purpose'       => $purposeFix,
            'remind'        => $remindFix,
            'assessor'      => $assessorFix,
            'coadmin'       => $coadminFix,
            'priority'      => $priorityFix,
            'remindAlarm'   => $remindAlarmFix,
            'stoppable'     => $stoppableFix,
            'origin'        => $origin
        ];

        //update table job
        $dataUpdate = [
            'role'  => 1,
            'admin' => 1,
            'date'  => date('Y-m-d H:i:s'),
            'subjob_rows' => count($subjobFix),
            'title' => $title,
            'crew' => json_encode($crew),
            'leader'  => $leader[0],
            'coadmin' => $coadminHelper[0]
        ];

        if ($origin == '') {

            $this->db->where('id', $idJob);
            $this->db->update('job', $dataUpdate);
        }

        //save to table subjob

        $data = array();
        for ($i = 0; $i < count($subjobFix); $i++) {

            if ($deadlineDateFix[$i] == 0) {
                $deadlineFixx = 0;
            } else {
                if ($deadlineHourFix[$i] == 0) {
                    $deadlineFixx = $deadlineDateFix[$i] . ' 09:00';
                } else {
                    $deadlineFixx = $deadlineDateFix[$i] . ' ' . $deadlineHourFix[$i];
                }
            }
            //deadline condition
            $newDeadline['d1'] = [
                'user_create'   => $_SESSION['id'],
                'date_create'   => $deadlineFixx,
                'user_request'  => 0,
                'date_revision' => 0
            ];

            //coadmin and approval condition

            $expCoadmin[] = explode(',', $coadminFix[$i]);

            if ($origin == '') {

                for ($x = 0; $x < count($expCoadmin); $x++) {
                    $newApproval = array();
                    if (count($expCoadmin[$x]) == 1) {
                        $newApproval = [
                            'admin'         => $expCoadmin[$x][0],
                            'coadmin'       => '0',
                            'co-assessor'   => $assessorFix[$i]
                        ];
                    } else {
                        $newApproval = [
                            'admin'         => $expCoadmin[$x][1],
                            'coadmin'       => $expCoadmin[$x][0],
                            'co-assessor'   => $assessorFix[$i]
                        ];
                    }
                }
            } else {

                if ($coadminFix[$i] == 0) {

                    for ($x = 0; $x < count($expCoadmin); $x++) {
                        $newApproval = array();
                        $newApproval = [
                            'admin'         => 1,
                            'coadmin'       => '0',
                            'co-assessor'   => $assessorFix[$i]
                        ];
                    }
                } else {

                    for ($x = 0; $x < count($expCoadmin); $x++) {
                        $newApproval = array();
                        if (count($expCoadmin[$x]) == 1) {
                            $newApproval = [
                                'admin'         => $expCoadmin[$x][0],
                                'coadmin'       => '0',
                                'co-assessor'   => $assessorFix[$i]
                            ];
                        } else {
                            $newApproval = [
                                'admin'         => $expCoadmin[$x][1],
                                'coadmin'       => $expCoadmin[$x][0],
                                'co-assessor'   => $assessorFix[$i]
                            ];
                        }
                    }
                }
            }

            $data[] = [
                'id'        => $idSubjobFix[$i],
                'id_title'  => $idJob,
                'subjob'    => $subjob[$i],
                'deadline'  => json_encode($newDeadline),
                'purpose'   => $purpose[$i],
                // 'remind'    => $newRemind[$i],
                'assessor'  => $assessorFix[$i],
                'approval'  => json_encode($newApproval),
                'status'    => 1,
                'is_priority' => $priorityFix[$i],
                'note'      => $noteFix[$i],
                'alarm'     => $remindAlarmFix[$i],
                'stoppable' => $stoppableFix[$i]
            ];
        }

        $this->db->update_batch('subjob', $data, 'id');

        echo 'success';
    }

    public function showSubjob() {
        $idSubjob = $this->input->post('idSubjob');
        $key = $this->input->post('key');
        $actionKey = $this->input->post('action');
        $userId = $_SESSION['id'];

        $today = date('Y-m-d H:i');

        $query = $this->db->query("SELECT id_title, subjob, deadline, purpose, approval, img_refer, status, remind, assessor, is_time, img_report, note_report, note_revise, img_revise, note_request, img_request, alarm
                                                  FROM subjob
                                                  WHERE id = $idSubjob");
    
        if ($query->num_rows() > 0) {
          $result = $query->row_array();
    
          $jobId = $result['id_title'];
          $subjob = $result['subjob'];
          $deadline = json_decode($result['deadline'], true);
          $isTime = json_decode($result['is_time'], true);
          $purpose = $result['purpose'];
          $image = json_decode($result['img_refer'], true);
          $status = $result['status'];
          $remind = json_decode($result['remind'], true);
          $approval = json_decode($result['approval'], true);
          $assessor = $result['assessor'];
          $noteReport = json_decode($result['note_report'], true);
          $imgReport = json_decode($result['img_report'], true);
          $noteRequest = $result['note_request'];
          $imgRequest = json_decode($result['img_request'], true);
          $noteRevise = $result['note_revise'];
          $imgRevise = json_decode($result['img_revise'], true);
          $alarm = $result['alarm'];
    
          $queryJob = $this->db->query("SELECT title, crew, leader
                                                    FROM job 
                                                    WHERE id = $jobId")->row_array();
    
          $title = $queryJob['title'];
          $crew = json_decode($queryJob['crew']);
          $leader = $queryJob['leader'];
    
          //deadline 
          // for ($d = 0; $d < count($deadline); $d++) {
          //   $dateCreate[] = date('d M H:i', strtotime($deadline['d' . ($d + 1)]['date_create']));
          // }
          
          //query name 
          $queryName = "SELECT name, id 
                      FROM ac_payroll_item
                      WHERE is_active = 1
                      AND barcode IS NOT null";
          $resultName = $this->database->getData($queryName, 'we')->result();
    
    
          $nameArray = array();
          foreach($resultName as $row) {
            $nameArray['n' . $row->id] = $row->name;
          }
    
          //crew name 
          for ($i = 0; $i < count($crew); $i++) {
            if(isset($nameArray['n' . $crew[$i]])) {
              if($crew[$i] == $leader) {
                $leaderStatus = [
                  'status'  => 1,
                  'name'  => $nameArray['n' . $crew[$i]]
                ];
              } else {
                $leaderStatus = [
                  'status'  => 0,
                  'name'  => $nameArray['n' . $crew[$i]]
                ];
              }
              $crewName[] = $leaderStatus;
            } else {
                $crewName[] = '-';
            }
          }
    
          //remind name 
          if($remind != '') {
            for ($r = 0; $r < count($remind); $r++) {
              if (isset($nameArray['n' . $remind[$r]])) {
                $remindName[] = $nameArray['n' . $remind[$r]];
              }
            }
          } else {
            $remindName = '-';
          }
          
    
          //approval name 
          if(isset($nameArray['n' . $approval['admin']])) {
            if($approval['coadmin'] == 0) {
              $approval1 = explode(' ', $nameArray['n' . $approval['admin']]);
              $approvalName = $approval1[0];
            } else {
              $approval1 = explode(' ', $nameArray['n' . $approval['coadmin']]);
              $approval2 = explode(' ', $nameArray['n' . $approval['admin']]);
              $approvalName = $approval1[0] . ' then ' . $approval2[0];
            }
            
          }
    
          //assessor name 
          if(isset($nameArray['n' . $assessor])) {
            $assessor1 = explode(' ', $nameArray['n' . $assessor]);
            $assessorName = $assessor1[0];
          } else {
            $assessorName = '-';
          }
    
          //image 
          $path = 'uploads/job/' . $jobId . '/';
          if($image != '') {
            for($m = 0; $m < count($image); $m++) {
              $newImage[] = 'uploads/job/' . $jobId . '/' . $image[$m];
            }
          } else {
            $newImage = '-';
          }
    
          //purpose 
          if($purpose == '') {
            $newPurpose = '-';
          } else {
            $newPurpose = $purpose;
          }
    
          $history = $this->history($idSubjob, $userId, 'detail');
          $overdue = $history['overdueHistory'];
          $reportHistory = $history['reportHistory'];
          $statusButton = $history['statusButton'];
          $timeReport = $history['timeReport'];
          $dateCompare = $history['dateCompare'];
          $deadlineView = $history['deadlineView'];
    
          // ############################################### show latest report ##################################### //
    
          //img report and desc report
          if ($imgReport != '') {
            for ($s = 0; $s < count($imgReport); $s++) {
              $newReportItem[] = [
                'img' => $path . $imgReport[$s]['img'],
                'desc'  => $imgReport[$s]['desc']
              ];
            }
          } else {
            $newReportItem = '-';
          }
    
          //note report 
          if ($noteReport == '') {
            $newNoteReport = '-';
          } else {
            $newNoteReport = $noteReport[0];
          }
    
          // ############################################### end show latest report ##################################### //
    
    
          // ############################################## overdue proposal ################################ //
    
          //deadline overdue 
          $deadlineOverdue = $deadline['d' . count($deadline)]['user_request'];
    
          if ($deadlineOverdue == 0) {
            $newDeadlineOverdue = '-';
          } else {
            $newDeadlineOverdue = date('d M H:i', strtotime($deadlineOverdue));
          }
    
          //note overdue 
          if ($noteRequest == '') {
            $newNoteRequest = '-';
          } else {
            $newNoteRequest = $noteRequest;
          }
    
          //img request 
          if ($imgRequest != '' ) {
            for ($as = 0; $as < count($imgRequest); $as++) {
    
              $newRequestItem[] = [
                'img' => $path . $imgRequest[$as]['img'],
                'desc'  => $imgRequest[$as]['desc']
              ];
            }
          } else {
            $newRequestItem = '-';
          }
    
          // ############################################## end overdue proposal ################################ //
    
    
          // ################################################## revise view ######################################################## //
    
          if ($noteRevise == '') {
            $newNoteRevise = '-';
          } else {
            $newNoteRevise = $noteRevise;
          }
    
          if ($imgRevise != '') {
            for ($re = 0; $re < count($imgRevise); $re++) {
    
              $newReviseItem[] = [
                'img' => $path . $imgRevise[$re]['img'],
                'desc'  => $imgRevise[$re]['desc']
              ];
            }
          } else {
            $newReviseItem = '-';
          }
    
          // ################################################## end revise view ######################################################## //
    
          //condition button depanding on status user as user, assessor, coadmin or admin 
          $assessor = $approval['co-assessor'];
          $coadmin = $approval['coadmin'];
          $admin = $approval['admin'];
    
          if ($assessor == $userId) {
            $userStatus = 'assessor';
          } else if ($coadmin == $userId) {
            $userStatus = 'coadmin';
          } else if ($admin == $userId) {
            $userStatus = 'admin';
          } else {
            $userStatus = 'user';
          }
    
          switch ($userStatus) {
            case 'user':
              if ($status == 1 || $status == 5) {
                if (date('Y-m-d', strtotime($dateCompare)) == date('Y-m-d', strtotime($today)) && date('H', strtotime($dateCompare)) > date('H', strtotime($today))) {
                  $statusButton = 'active user overdue';
                } else if (date('Y-m-d', strtotime($dateCompare)) == date('Y-m-d', strtotime($today)) && date('H', strtotime($dateCompare)) < date('H', strtotime($today))) {
                  $statusButton = 'overdue';
                } else if ($dateCompare > $today || $dateCompare == 0) {
                  $statusButton = 'active user';
                } else {
                  $statusButton = 'overdue';
                }
              } else if ($status > 1 && $status < 5 || $status == 6 || $status > 60) {
                $statusButton = 'waiting assessment';
              } else if ($status == 0) {
                $statusButton = 'subjob done';
              } else if ($status == 8) {
                $statusButton = 'overdue';
              }
              break;
            case 'assessor':
              if ($status == 1 || $status == 6 || $status == 8) {
                $statusButton = 'waiting report';
              } else if ($status == 2 || $status == 63) {
                $statusButton = 'active admin';
              } else if ($status == 3 || $status == 4 || $status == 62 || $status == 61) {
                $statusButton = 'waiting approval';
              } else if ($status == 0) {
                $statusButton = 'subjob done';
              } else if ($status == 5) {
                $statusButton = 'waiting revision reported';
              }
              break;
            case 'admin':
              if ($status > 0 && $status < 4 || $status > 61 || $status == 8) {
                $statusButton = 'waiting report';
              } else if ($status == 4 || $status == 61) {
                $statusButton = 'active admin';
              } else if ($status == 5) {
                $statusButton = 'waiting revision reported';
              } else if ($status == 6) {
                $statusButton = 'active admin overdue';
              } else if ($status == 0) {
                $statusButton = 'subjob done';
              }
              break;
            case 'coadmin':
              if ($status == 1 || $status == 2 || $status == 6 || $status == 8) {
                $statusButton = 'waiting report';
              } else if ($status == 3 || $status == 62) {
                $statusButton = 'active admin';
              } else if ($status == 4 || $status == 61) {
                $statusButton = 'waiting approval';
              } else if ($status == 5) {
                $statusButton = 'waiting revision reported';
              } else if ($status == 0) {
                $statusButton = 'subjob done';
              }
          }
          
    
          $format['data'] = [
            'status'  => $status,
            'subjob'  => $subjob,
            'title' => $title,
            'deadlineView'  => $deadlineView,
            'approval' => $approvalName,
            'assessor'  => $assessorName,
            'purpose' => $newPurpose,
            'image' => $newImage,
            'crew'  => $crewName,
            'remind'  => $remindName,
            'jobId' => $jobId,
            'reportHistory'  => $reportHistory,
            'overdueHistory'  => $overdue,
            'timeReport'  => $timeReport,
            'statusButton' => $statusButton,
            'jobId' => $jobId,
            'subjobId'  => $idSubjob,
            'noteReport'  => $newNoteReport,
            'imgReport' => $newReportItem,
            'deadlineOverdue' => $newDeadlineOverdue,
            'noteRequest' => $newNoteRequest,
            'imgRequest' => $newRequestItem,
            'noteRevise'  => $newNoteRevise,
            'imgRevise' => $newReviseItem,
            'alarm' => $alarm,
            'actionKey' => ''
          ];

          echo json_encode($format);
          die;

          if ($key == 'user') {
              $this->load->view('vzl/home/showSubjob', $format);
          } else if ($key == 'assessor') {
              $this->load->view('vzl/home/showSubjobAssessor', $format);
          }
          
        }

    }

    public function history($subjobId, $userId, $key) {

        $query = $this->db->query("SELECT deadline, approval, is_time, status
                                                  FROM subjob 
                                                  WHERE id = $subjobId")->row_array();
    
        $deadline = json_decode($query['deadline'], true);
        $approval = json_decode($query['approval'], true);
        $isTime = json_decode($query['is_time'], true);
        $status = $query['status'];
        $today = date('Y-m-d H:i');
    
        //overdue history 
        $overdue = array();
        if (count($deadline) > 1) {
          // overdue detect
          //check if user_request is the same as the date_create on last deadline array
          if (date('Y-m-d', strtotime($deadline['d' . count($deadline)]['user_request'])) != date('Y-m-d', strtotime($deadline['d' . count($deadline)]['date_create']))) {
            // not yet accepted deadline
            for ($x = 2; $x <= count($deadline); $x++) {
              //check in every single d2 d3 d4 ...
              if (date('Y-m-d', strtotime($deadline['d' . $x]['date_create'])) != date('Y-m-d', strtotime($deadline['d' . $x]['user_request']))) {
                $overdue[] = [
                  'date_start' => date('d M H:i', strtotime($deadline['d' . $x]['date_create'])),
                  'date_end'  => 'Not yet accepted'
                ];
              } else {
                $overdue[] = [
                  'date_start'  => date('d M H:i', strtotime($deadline['d' . ($x - 1)]['date_create'])),
                  'date_end'  => date('d M H:i', strtotime($deadline['d' . $x]['user_request']))
                ];
              }
            }
            if ($deadline['d' . count($deadline)]['date_create'] == 0) {
              $deadlineView = '';
            } else {
              $deadlineView = date('d m H:i', strtotime($deadline['d' . count($deadline)]['date_create']));
            }
            $dateCompare = $deadline['d' . count($deadline)]['date_create'];
          } else {
            //accepted deadline
            for ($x = 2; $x <= count($deadline); $x++) {
              //check in every single d2 d3 d4 ...
              if (date('Y-m-d', strtotime($deadline['d' . $x]['date_create'])) != date('Y-m-d', strtotime($deadline['d' . $x]['user_request']))) {
                $overdue[] = [
                  'date_start'  => date('d M H:i', strtotime($deadline['d' . $x]['date_create'])),
                  'date_end'  => 'Not yet accepted'
                ];
              } else {
                $overdue[] = [
                  'date_start'  => date('d M H:i', strtotime($deadline['d' . ($x - 1)]['date_create'])),
                  'date_end'  => date('d M H:i', strtotime($deadline['d' . $x]['user_request']))
                ];
              }
            }
            if ($deadline['d' . count($deadline)]['date_create'] == 0) {
              $deadlineView = '';
            } else {
              $deadlineView = date('d m H:i', strtotime($deadline['d' . count($deadline)]['date_create']));
            }
            $dateCompare = $deadline['d' . count($deadline)]['date_create'];
          }
          //
        } else {
          //none overdue 
          $overdue = 'None overdue';
          if ($deadline['d' . count($deadline)]['date_create'] == 0) {
            $deadlineView = '';
          } else {
            $deadlineView = date('d m H:i', strtotime($deadline['d' . count($deadline)]['date_create']));
          }
          $dateCompare = $deadline['d' . count($deadline)]['date_create'];
        }
    
        //report history
        //get time report 
        if ($isTime != '') {
          $timeReport = date('d M H:i', strtotime($isTime['r' . count($isTime)]['time_done']));
    
          //validation report history (if is_time row = 1, status is waiting assessment)
          if (count($isTime) == 1) {
            if ($status == 1 || $status == 5) {
              $reportHistory[] = [
                'status'  => 'failed',
                'deadline'  => date('d M H:i', strtotime($isTime['r' . count($isTime)]['deadline']))
              ];
            } else if ($status == 0) {
              $reportHistory[] = [
                'status'  => 'Finish',
                'deadline'  => date('d M H:i', strtotime($isTime['r' . count($isTime)]['deadline']))
              ];
            } else {
              $reportHistory[] = [
                'status'  => 'Waiting assessment',
                'deadline'  => date('d M H:i', strtotime($isTime['r' . count($isTime)]['deadline']))
              ];
            }
          } else {
            for ($rh = 0; $rh < count($isTime); $rh++) {
              if ($isTime['r' . ($rh + 1)]['time_done'] == $isTime['r' . count($isTime)]['time_done'] && $status != 0) {
                $reportHistory[] = [
                  'status'  => 'Waiting assessment',
                  'deadline'  => date('d M H:i', strtotime($isTime['r' . ($rh + 1)]['deadline']))
                ];
              } else if ($isTime['r' . ($rh + 1)]['time_done'] == $isTime['r' . count($isTime)]['time_done'] && $status == 0) {
                $reportHistory[] = [
                  'status'  => 'Finish',
                  'deadline'  => date('d M H:i', strtotime($isTime['r' . ($rh + 1)]['deadline']))
                ];
              } else {
                $reportHistory[] = [
                  'status'  => 'Failed',
                  'deadline'  => date('d M H:i', strtotime($isTime['r' . ($rh + 1)]['deadline']))
                ];
              }
            }
          }
        } else {
          $timeReport = 'Not yet reported';
          $reportHistory = 'None reported';
        }
    
    
        //condition button depanding on status user as user, assessor, coadmin or admin 
        $assessor = $approval['co-assessor'];
        $coadmin = $approval['coadmin'];
        $admin = $approval['admin'];
    
        if ($assessor == $userId) {
          $userStatus = 'assessor';
        } else if ($coadmin == $userId) {
          $userStatus = 'coadmin';
        } else if ($admin == $userId) {
          $userStatus = 'admin';
        } else {
          $userStatus = 'user';
        }
    
        switch ($userStatus) {
          case 'user':
            if ($status == 1 || $status == 5) {
              if (date('Y-m-d', strtotime($dateCompare)) == date('Y-m-d', strtotime($today)) && date('H', strtotime($dateCompare)) > date('H', strtotime($today))) {
                $statusButton = 'active user overdue';
              } else if (date('Y-m-d', strtotime($dateCompare)) == date('Y-m-d', strtotime($today)) && date('H', strtotime($dateCompare)) < date('H', strtotime($today))) {
                $statusButton = 'overdue';
              } else if ($dateCompare > $today || $dateCompare == 0) {
                $statusButton = 'active user';
              } else {
                $statusButton = 'overdue';
              }
            } else if ($status > 1 && $status < 5 || $status == 6 || $status > 60) {
              $statusButton = 'waiting assessment';
            } else if ($status == 0) {
              $statusButton = 'subjob done';
            } else if ($status == 8) {
              $statusButton = 'overdue';
            }
            break;
          case 'assessor':
            if ($status == 1 || $status == 6 || $status == 8) {
              $statusButton = 'waiting report';
            } else if ($status == 2 || $status == 63) {
              $statusButton = 'active admin';
            } else if ($status == 3 || $status == 4 || $status == 62 || $status == 61) {
              $statusButton = 'waiting approval';
            } else if ($status == 0) {
              $statusButton = 'subjob done';
            } else if ($status == 5) {
              $statusButton = 'waiting revision reported';
            }
            break;
          case 'admin':
            if ($status > 0 && $status < 4 || $status > 61 || $status == 8) {
              $statusButton = 'waiting report';
            } else if ($status == 4 || $status == 61) {
              $statusButton = 'active admin';
            } else if ($status == 5) {
              $statusButton = 'waiting revision reported';
            } else if ($status == 6) {
              $statusButton = 'active admin overdue';
            } else if ($status == 0) {
              $statusButton = 'subjob done';
            }
            break;
          case 'coadmin':
            if ($status == 1 || $status == 2 || $status == 6 || $status == 8) {
              $statusButton = 'waiting report';
            } else if ($status == 3 || $status == 62) {
              $statusButton = 'active admin';
            } else if ($status == 4 || $status == 61) {
              $statusButton = 'waiting approval';
            } else if ($status == 5) {
              $statusButton = 'waiting revision reported';
            } else if ($status == 0) {
              $statusButton = 'subjob done';
            }
        }
    
        if ($key == 'detail') {
          $data = [
            'statusButton'  => $statusButton,
            'reportHistory' => $reportHistory,
            'overdueHistory'  => $overdue,
            'timeReport'  => $timeReport,
            'dateCompare' => $dateCompare,
            'deadlineView'  => $deadlineView
          ];
        } else if ($key == 'propose') {
          $data = [
            'statusButton'  => $statusButton,
            'overdueHistory'  => $overdue
          ];
        } else if ($key == 'done') {
          $data = [
            'statusButton'  => $statusButton,
            'reportHistory' => $reportHistory
          ];
        }
    
    
        return $data;
      }

    
      public function selectedCrew() {
        $idJob = $this->input->post('idJob');

        $query = "SELECT crew, leader FROM job WHERE id = $idJob";
        $db = 'default';

        $result = $this->database->getData($query, $db);

        //crew array
        $queryCrew = "SELECT id, name FROM ac_payroll_item WHERE is_active = 1 AND barcode IS NOT null";
        $dbCrew = 'we';

        $resultCrew = $this->database->getData($queryCrew, $dbCrew);

        $crewArray = array();
        foreach ($resultCrew->result() as $row) {
            $crewArray['c' . $row->id] = $row->name;
        }

        foreach ($result->result() as $r) {
            $crew = json_decode($r->crew, true);
            $leader = $r->leader;

            for ($i = 0; $i < count($crew); $i++) {
                if (isset($crewArray['c' . $crew[$i]])) {
                    $crewName[] = $crewArray['c' . $crew[$i]];
                }
                if (isset($crewArray['c' . $leader])) {
                    $leaderName = $crewArray['c' . $leader];
                }
            }
        }

        $data['crewName']   = $crewName;
        $data['crewId']     = $crew;
        $data['leader']     = $leaderName;

        echo json_encode($data);
    }

    public function searchCrew() {
        $input = $this->input->post('input');

        $query = "SELECT id, name, office
                FROM ac_payroll_item
                WHERE is_active = 1
                AND barcode IS NOT null
                AND name LIKE '" . $input . "%'";
        $db = 'we';

        $result = $this->database->getData($query, $db);

        //pt array
        $queryPt = "SELECT id, name
                FROM ansena_department";

        $resultPt = $this->database->getData($queryPt, $db);

        $ptArray = array();
        foreach ($resultPt->result() as $row) {
            $ptArray['p' . $row->id] = $row->name;
        }

        foreach ($result->result() as $r) {
            if (isset($ptArray['p' . $r->office])) {
                $ptName[] = $ptArray['p' . $r->office];
            }
        }

        $data['result'] = $result->result();
        $data['ptName'] = $ptName;

        echo json_encode($data);
    }

    public function uploadFile() {
        $fileName = $_FILES['fileUploadAdmin']['name'];
        $idGroup = $this->input->post('idJobGroup1');
        $idSubjob = $this->input->post('idSubjob1');

        $helper = $this->input->post('helperImgRefer');

        $path     = './uploads/job/' . $idGroup;
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        for ($u = 0; $u < count($fileName); $u++) {
            $explode = explode('.', $fileName[$u]);
            $newFileName = $explode[0] . '_subjob_' . $idGroup . '_' . date('Y-m-d H:i:s') . '.' . end($explode);

            $_FILES['file']['name']        = date('Y-m-d H:i:s') . '_' . $idGroup . '_' . '_subjob_' . $_FILES['fileUploadAdmin']['name'][$u];
            $_FILES['file']['type']        = $_FILES['fileUploadAdmin']['type'][$u];
            $_FILES['file']['tmp_name']    = $_FILES['fileUploadAdmin']['tmp_name'][$u];
            $_FILES['file']['error']       = $_FILES['fileUploadAdmin']['error'][$u];
            $_FILES['file']['size']        = $_FILES['fileUploadAdmin']['size'][$u];


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

                $message = 'success';

                //change size of file
                $config['source_image'] = './uploads/job/' . $idGroup . '/' . date('Y-m-d H:i:s') . '_' . $idGroup . '_' . '_subjob_' . $_FILES['fileUploadAdmin']['name'][$u];
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

            //get last data
            $mainQuery = "SELECT img_refer FROM subjob WHERE id = $idSubjob";
            $mainResult = $this->database->getData($mainQuery, 'jobdesk')->row_array();

            $currentImg = json_decode($mainResult['img_refer'], true);

            if ($helper == 0) {

                //first input
                $data = [
                    'img_refer'  => json_encode($newName)
                ];

                //replace data
                $this->db->where('id', $idSubjob);
                $this->db->update('subjob', $data);
            } else {

                $newImg = array_merge($currentImg, $newName);

                $data = [
                    'img_refer' => json_encode($newImg)
                ];

                $this->db->where('id', $idSubjob);
                $this->db->update('subjob', $data);
            }

            $res['idSubjob'] = $idSubjob;
            $res['message'] = 'success';

            echo json_encode($res);
        }
    }

    public function uploadFileRevise() {
        $fileName = $_FILES['fileUploadRevise']['name'];
        $idGroup = $this->input->post('idJobGroupRevise');
        $idSubjob = $this->input->post('idSubjobRevise');

        $helper = $this->input->post('imgReviseHelper');

        $path     = './uploads/job/' . $idGroup;
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        $format = array();
        for ($u = 0; $u < count($fileName); $u++) {
            $explode = explode('.', $fileName[$u]);
            $newFileName = $explode[0] . '_subjob_' . $idGroup . '_' . date('Y-m-d H:i:s') . '.' . end($explode);

            $_FILES['file']['name']        = 'revise_' . date('Y-m-d H:i:s') . '_' . $idGroup . '_' . '_subjob_' . $_FILES['fileUploadRevise']['name'][$u];
            $_FILES['file']['type']        = $_FILES['fileUploadRevise']['type'][$u];
            $_FILES['file']['tmp_name']    = $_FILES['fileUploadRevise']['tmp_name'][$u];
            $_FILES['file']['error']       = $_FILES['fileUploadRevise']['error'][$u];
            $_FILES['file']['size']        = $_FILES['fileUploadRevise']['size'][$u];


            // $config['file_name']        = $_FILES['fileUploadAdmin']['name'];
            $config['upload_path']      = './uploads/job/' . $idGroup;
            $config['allowed_types']    = 'png|jpg';
            $config['max_size']         = 40000;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {
                $name = $this->upload->data('file_name');
                $lastName[] = $this->upload->data('file_name');

                //format saving
                $format[] = [
                    'img'   => $name,
                    'desc'  => ''
                ];
            }
        }

        $queryImg = "SELECT img_revise FROM subjob WHERE id = $idSubjob";
        $db = 'jobdesk';

        $resultImg = $this->database->getData($queryImg, $db)->row_array();

        $imgList = json_decode($resultImg['img_revise'], true);

        if ($helper == 0) {

            $data = [
                'img_revise'  => json_encode($format)
            ];

            $this->db->where('id', $idSubjob);
            $this->db->update('subjob', $data);
        } else {

            //merge array
            $newImg = array_merge($imgList, $format);

            $data = [
                'img_revise'  => json_encode($newImg)
            ];

            $this->db->where('id', $idSubjob);
            $this->db->update('subjob', $data);
        }

        $data['image']    = $format;
        $data['idJob']      = $idGroup;
        $data['idSubjob']   = $idSubjob;
        $data['lastImg']    = $lastName;

        echo json_encode($data);
    }

    public function getImage() {
        $idSubjob = $this->input->post('idSubjob');
        $source = $this->input->post('source');
        $table = $this->input->post('table');

        $query = "SELECT $source FROM $table WHERE id = $idSubjob";
        $db = 'default';

        $result = $this->database->getData($query, $db);

        foreach ($result->result() as $row) {
            $imgList = json_decode($row->img_refer, true);
            $idJob = $row->id_title;
        }

        $data['image'] = $imgList;
        $data['idJob'] = $idJob;

        echo json_encode($data);
    }

    public function getImageRevise() {
        $idSubjob = $this->input->post('idSubjob');
        $source = $this->input->post('source');
        $table = $this->input->post('table');

        $query = "SELECT $source FROM $table WHERE id = $idSubjob";
        $db = 'default';

        $result = $this->database->getData($query, $db);

        foreach ($result->result() as $row) {
            $imgList = json_decode($row->img_revise, true);
            $idJob = $row->id_title;
        }

        $data['image'] = $imgList;
        $data['idJob'] = $idJob;
        $data['idSubjob']   = $idSubjob;

        echo json_encode($data);
    }

    public function deleteImg() {
        $idSubjob = $this->input->post('idSubjob');
        $imgName = $this->input->post('imgName');
        $source = $this->input->post('source');
        $field = $this->input->post('field');

        $query = "SELECT $source FROM subjob WHERE id = $idSubjob";
        $db = 'default';

        $result = $this->database->getData($query, $db);

        foreach ($result->result() as $row) {
            $imgList = json_decode($row->$field, true);
            $idJob = $row->id_title;
        }

        //search name
        $arrayKey = array_search($imgName, $imgList);

        //unset
        unset($imgList[$arrayKey]);
        $newList = array_values($imgList);

        //unlink
        $urlFolder = './uploads/job/' . $idJob . '/' . $imgName;
        unlink($urlFolder);

        //update
        if (count($newList) == 0) {

            $dataUpdate = [
                $field => NULL
            ];
        } else {

            $dataUpdate = [
                $field => json_encode($newList)
            ];
        }

        $this->db->where('id', $idSubjob);
        $this->db->update('subjob', $dataUpdate);

        $data['message'] = 'success';

        echo json_encode($data);
    }

    public function getReportHistory() {
        $idSubjob = $this->input->post('idSubjob');

        $queryMaster = "SELECT note_revise, is_failed, deadline_revise, is_time FROM subjob WHERE id = $idSubjob";
        $dbMaster = 'default';

        $result = $this->database->getData($queryMaster, $dbMaster);

        foreach ($result->result() as $row) {
            $noteRevise = json_decode($row->note_revise, true);
            $deadlineRevise = json_decode($row->deadline_revise, true);
            $reportTime = json_decode($row->is_time, true);
            $isFailed = $row->is_failed;
        }

        if ($deadlineRevise != '') {
            $newDeadlineRevise = explode(' ', end($deadlineRevise));
        } else {
            $newDeadlineRevise = [date('y-m-d'), "09:00"];
        }

        for ($i = 0; $i < count($reportTime); $i++) {
            $exReportTime = explode(' ', $reportTime[$i]);
            $newReportDate[] = date('d M', strtotime($exReportTime[0]));
            $newReportHour[] = $exReportTime[1];
        }

        $data['failedInfo'] = $isFailed;
        $data['noteRevise'] = $noteRevise;
        $data['deadlineDateRevise'] = date('d M', strtotime($newDeadlineRevise[0]));
        $data['deadlineHourRevise'] = $newDeadlineRevise[1];
        $data['reportDate']         = $newReportDate;
        $data['reportHour']         = $newReportHour;
        $data['masterReportTime']   = $reportTime;
        echo json_encode($data);
    }

    public function getLatestReport() {
        $idSubjob = $this->input->post('idSubjob');

        $query = "SELECT note_report, is_time, img_report, id_title FROM subjob WHERE id = $idSubjob";
        $db = 'default';

        $result = $this->database->getData($query, $db);

        foreach ($result->result() as $row) {
            $noteReport = json_decode($row->note_report, true);
            $isTime = json_decode($row->is_time, true);
            $imgReport = json_decode($row->img_report, true);
            $idJob = $row->id_title;
        }

        if ($noteReport != '') {
            $newNote = end($noteReport);
        } else {
            $newNote = '';
        }

        if ($isTime != '') {
            $newTime = end($isTime);
        } else {
            $newTime = '';
        }

        if ($imgReport != '') {
            $newImg = $imgReport;
        } else {
            $newImg = '';
        }

        $data['note']   = $newNote;
        $data['isTime'] = $newTime;
        $data['imgReport']  = $newImg;
        $data['idJob']      = $idJob;

        echo json_encode($data);
    }

    public function getImgReport() {
        $idSubjob = $this->input->post('idSubjob');

        $query = "SELECT img_revise FROM subjob WHERE id = $idSubjob";
        $db = 'default';

        $result = $this->database->getData($query, $db);

        foreach ($result->result() as $row) {
            $img = json_decode($row->img_revise, true);
        }

        $data['img']    = $img;

        echo json_encode($data);
    }

    public function correct() {
        $idSubjob = $this->input->post('idSubjob');
        $idMaster = $_SESSION['id'];

        $query = "SELECT approval, job.admin as jobAdmin, job.coadmin AS jobCoadmin, subjob.assessor AS jobAssessor, id_title
                FROM subjob
                INNER JOIN job
                ON subjob.id_title = job.id
                WHERE subjob.id = $idSubjob";
        $db = 'default';

        $result = $this->database->getData($query, $db)->row_array();

        $approval = json_decode($result['approval'], true);
        $jobAdmin = $result['jobAdmin'];
        $jobCoadmin = $result['jobCoadmin'];
        $jobAssessor = $result['jobAssessor'];
        $idTitle = $result['id_title'];

        /*
        if just admin or just coadmin then, job is done or status == 0
        if coadmin not NULL and admin not NULL to, then status from 1 to 3 to 4
        */

        $statusUser = $this->database->checkStatusUser();
        $dataCheck = $this->database->updateStatus($idSubjob);

        $status = $dataCheck['status'];
        $message = $dataCheck['message'];

        $dataUpdate = [
            'status'  => $status
        ];

        $this->db->where('id', $idSubjob);
        $this->db->update('subjob', $dataUpdate);

        $queryCheck = "SELECT id_title FROM subjob WHERE id_title = $idTitle AND status > 0";
        $resultCheck = $this->database->getData($queryCheck, $db)->num_rows();

        if ($resultCheck == 0) {
            $dataJob = [
                'role' => 0
            ];

            $this->db->where('id', $idTitle);
            $this->db->update('job', $dataJob);

            $message = 'job done';
        }

        $dataa['message'] = $message;
        $dataa['status'] = $status;

        echo json_encode($dataa);
    }

    public function checkStatus() {
        $idSubjob = $this->input->post('idSubjob');
        $id = $_SESSION['id'];

        $query = "SELECT status, approval FROM subjob WHERE id = $idSubjob";
        $db = 'default';

        $result = $this->database->getData($query, $db);

        foreach ($result->result() as $row) {
            $status = $row->status;
            $approval = json_decode($row->approval, true);
        }

        $admin = $approval['admin'];
        $coadmin = $approval['coadmin'];
        $assessor = $approval['co-assessor'];

        if ($id == $assessor) {
            $position = 'assessor';
        } else if ($id == $coadmin) {
            $position = 'coadmin';
        } else if ($id == $admin) {
            $position = 'admin';
        }

        $data['position']   = $position;
        $data['status']     = $status;

        echo json_encode($data);
    }

    public function updateDescImage() {
        $key = $this->input->post('key');
        $desc = $this->input->post('desc');
        $idSubjob = $this->input->post('idSubjob');
        $imgName = $this->input->post('img');

        //get data img_revise
        $query = "SELECT img_revise FROM subjob WHERE id = $idSubjob";
        $db = 'default';

        $result = $this->database->getData($query, $db)->row_array();

        $img = json_decode($result['img_revise'], true);

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
                'img_revise'    => json_encode($merge)
            ];

            //update in database
            $this->db->where('id', $idSubjob);
            $this->db->update('subjob', $dataUpdate);

            echo 'success';
        } else {
            echo 'failed';
        }
    }

    public function requestRevision() {
        $deadlineDate = $this->input->post('deadlineDate');
        $deadlineHour = $this->input->post('deadlineHour');
        $note = $this->input->post('note');
        $idSubjob = $this->input->post('idSubjob');
        $idMaster = $_SESSION['id'];

        $query = "SELECT deadline, note_revise, is_failed
                FROM subjob WHERE id = $idSubjob";
        $db = 'default';

        $result = $this->database->getData($query, $db)->row_array();
        $deadline = json_decode($result['deadline'], true);
        $is_failed = $result['is_failed'];
        $noteDb = json_decode($result['note_revise'], true);

        //last data
        $lastDeadline = $deadline['d' . count($deadline)]['date_create'];
        $lastRequest = $deadline['d' . count($deadline)]['user_request'];

        //deadline fix
        if ($deadlineDate == '') {
            $deadlineFix = 0;
        } else {
            $deadlineFix = $deadlineDate . ' ' . $deadlineHour;
        }

        $newDeadline['d' . (count($deadline) + 1)] = [
            'user_create' => 0,
            'date_create' => $lastDeadline,
            'date_revision' => $deadlineFix,
            'user_request'  => $lastRequest
        ];

        $formatDeadline = array_merge($deadline, $newDeadline);

        $dataUpdate = [
            'deadline'  => json_encode($formatDeadline),
            'status'    => 5,
            'is_failed' => 1,
            'note_revise'  => $note
        ];

        $this->db->where('id', $idSubjob);
        $this->db->update('subjob', $dataUpdate);

        echo 'success';
    }

    public function emptySubjob() {
        $idSubjob = $this->input->post('idSubjob');

        $dataUpdate = [
            'assessor'  => ''
        ];

        $this->db->where('id', $idSubjob);
        $this->db->update('subjob', $dataUpdate);

        echo 'success';
    }

    public function getFooter() {
        $idMaster = $_SESSION['id'];

        $query = "SELECT admin, coadmin, subjob.assessor
                FROM subjob
                INNER JOIN job
                ON subjob.id_title = job.id
                WHERE subjob.id > 0";
        $db = 'default';

        $result = $this->database->getData($query, $db);

        foreach ($result->result() as $row) {
            $admin[] = $row->admin;
            $coadmin[] = $row->coadmin;
            $assessor[] = $row->assessor;
        }

        if ($result->num_rows() > 0) {
            for ($i = 0; $i < count($result->result()); $i++) {
                if ($idMaster == $admin[$i]) {
                    $isAdmin = 1;
                    $isCoadmin = 0;
                    $isAssessor = 0;
                    $isUser = 0;
                } else if ($idMaster == $coadmin[$i]) {
                    $isAdmin = 0;
                    $isCoadmin = 1;
                    $isAssessor = 0;
                    $isUser = 0;
                } else if ($idMaster == $assessor[$i]) {
                    $isAdmin = 0;
                    $isCoadmin = 0;
                    $isAssessor = 1;
                    $isUser = 0;
                } else {
                    $isAdmin = 0;
                    $isCoadmin = 0;
                    $isAssessor = 0;
                    $isUser = 1;
                }
            }
        } else {
            if ($idMaster == 1) {
                $isAdmin = 1;
                $isCoadmin = 0;
                $isAssessor = 0;
                $isUser = 0;
            } else {
                $isAdmin = 0;
                $isCoadmin = 0;
                $isAssessor = 0;
                $isUser = 0;
            }
        }

        $data['isAdmin'] = $isAdmin;
        $data['isCoadmin'] = $isCoadmin;
        $data['isAssessor'] = $isAssessor;

        echo json_encode($data);
    }

    public function getArchive() {
        $idMaster = $_SESSION['id'];
        $dbDefault = 'default';
        $dbSecondary = 'we';

        $queryMaster = "SELECT deadline,title, subjob, reported, subjob.id AS idSubjob
                    FROM subjob
                    INNER JOIN job
                    ON subjob.id_title = job.id
                    WHERE job.role = 0";
        $resultMaster = $this->database->getData($queryMaster, $dbDefault);

        //rows
        $rows = $resultMaster->num_rows();

        if ($resultMaster->num_rows() > 0) {
            foreach ($resultMaster->result() as $row) {
                $deadline[] = json_decode($row->deadline, true);
                $title[] = $row->title;
                $subjob[] = $row->subjob;
                $reported[] = $row->reported;
                $idSubjob[] = $row->idSubjob;
            }

            $dateCreate = array();
            $dateRequest = array();
            $dateRevise = array();
            for ($i = 0; $i < count($deadline); $i++) {
                if ($deadline[$i] != '') {
                    $dateCreate[] = $deadline[$i]['d' . count($deadline[$i])]['date_create'];
                    $dateRequest[] = $deadline[$i]['d' . count($deadline[$i])]['user_request'];
                    $dateRevise[] = $deadline[$i]['d' . count($deadline[$i])]['date_revision'];
                } else {
                    $dateCreate[] = 0;
                    $dateRequest[] = 0;
                    $dateRevise[] = 0;
                }
            }

            for ($x = 0; $x < count($dateCreate); $x++) {
                if ($dateCreate[$x] == 0) {
                    $deadlineFix[] = 0;
                } else {
                    $expCreate = explode(' ', $dateCreate[$x]);
                    $deadlineDate = date('d F', strtotime($expCreate[0]));
                    $deadlineHour = $expCreate[1];
                    $deadlineFix[] = $deadlineDate . ' ' . $deadlineHour;
                }
            }
        } else {
            $deadline[] = 0;
            $title[] = 0;
            $subjob[] = 0;
            $reported[] = 0;
            $deadlineFix[] = 0;
            $idSubjob[] = 0;
        }

        $data['deadline'] = $deadlineFix;
        $data['subjob'] = $subjob;
        $data['title'] = $title;
        $data['reported'] = $reported;
        $data['idSubjob'] = $idSubjob;
        $data['rows'] = $rows;

        echo json_encode($data);
    }

    public function viewChangePassword() {

        $this->load->view('vzl/auth/changePassword');
    }
}
