<?php
defined('BASEPATH') or exit('No direct script allowed');

class Api extends CI_Controller
{

  public function __construct() {
    parent::__construct();
    $this->load->model('mzl/Main_model', 'database');
  }

  public function index() {

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: *');

    $username = $this->input->post('email');
    $password = $this->input->post('password');
    $token = $_POST['token'];

    $auth = [
      'username' => $username
    ];

    //get password from db
    $query = "SELECT password, id, name, phone, alias FROM ac_payroll_item WHERE username = '$username'";
    $database = 'we';

    $result = $this->database->getData($query, $database);


    if ($result->num_rows() == 0) {
      $data['message'] = 'wrong username';
      echo json_encode($data);
    } else {
      foreach ($result->result() as $row) {
        $passwordDb = $this->encryption->decrypt($row->password);
        $idUser = $row->id;
        $name = $row->name;
        $phone = $row->phone;
      }

      if ($password == $passwordDb) {

        //check consition
        $queryCondition = "SELECT coadmin, id
                            FROM job
                            WHERE coadmin = $idUser";
        $resultCondition = $this->database->getData($queryCondition, 'default');

        if ($resultCondition->num_rows() > 0) {

          //status coadmin
          $coadminStatus = true;

          foreach ($resultCondition->result() as $con) {
            $idJobCoadmin[] = $con->id;
          }
        } else {

          $coadminStatus = false;
          $idJobCoadmin[] = 0;
        }

        if ($idUser == 1) {

          $adminStatus = true;
        } else {

          $adminStatus = false;
        }

        //condition token 
        $queryToken = $this->db->query("SELECT user_id, token FROM user WHERE token = '$token'");
        $queryUserId = $this->db->query("SELECT user_id, token FROM user WHERE user_id = $idUser");

        if ($queryToken->num_rows() > 0) {
          //delete the latest token 
          $resultToken = $queryToken->row_array();
          $latestToken = $resultToken['token'];

          $this->db->where('token', $latestToken);
          $this->db->delete('user');

          //insert the new one 
          $dataIn = [
            'token' => $token,
            'user_id' => $idUser
          ];
          $this->db->insert('user', $dataIn);
        } else if ($queryToken->num_rows() == 0) {
          if ($queryUserId->num_rows() > 0) {
            //delete the latest user id
            $resultUserId = $queryUserId->row_array();
            $latestId = $resultUserId['user_id'];
  
            $this->db->where('user_id', $latestId);
            $this->db->delete('user');
  
            //insert the new one 
            $dataIn = [
              'token' => $token,
              'user_id' => $idUser
            ];
            $this->db->insert('user', $dataIn);
          } else {
            //insert the new one 
            $dataIn = [
              'token' => $token,
              'user_id' => $idUser
            ];
            $this->db->insert('user', $dataIn);
          }
        }

        //get session
        $_SESSION['code'] = $username;
        $_SESSION['login'] = true;
        $_SESSION['id'] = $idUser;
        $_SESSION['name'] = $name;

        $data['message'] = 'success';
        $data['coadminStatus'] = $coadminStatus;
        $data['adminStatus'] = $adminStatus;
        $data['idJobCoadmin'] = $idJobCoadmin;
        $data['name'] = $_SESSION['name'];
        $data['code'] = $_SESSION['code'];
        $data['login'] = $_SESSION['login'];
        $data['idUser'] = $_SESSION['id'];
        $data['token']  = $token;

        echo json_encode($data);
      } else {

        $data['message'] = 'wrong password';
        echo json_encode($data);
      }
    }
  }

  public function logout($token) {

    $this->db->where('token', $token);
    $this->db->delete('user');
  }

  public function get_token($token) {

    $query = $this->db->query("SELECT id 
                                    FROM user
                                    WHERE token = '$token'")->num_rows();
    echo json_encode($query);
  }
  
  public function getListIndex($idMaster) {

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
        } 
        else {
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

  public function getArchive($idMaster) {
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
      $deadline = array();
      $title = array();
      $subjob = array();
      $reported = array();
      $deadlineFix = array();
      $idSubjob = array();
    }

    $data['deadline'] = $deadlineFix;
    $data['subjob'] = $subjob;
    $data['title'] = $title;
    $data['reported'] = $reported;
    $data['idSubjob'] = $idSubjob;
    $data['rows'] = $rows;

    echo json_encode($data);
  }

  public function getListUser($startPage = ''){

    //first validation
    if ($startPage >= '0' && $startPage <= '1000' && $startPage != '') {

      $type = 'int';
    } else if ($startPage != '') {

      $type = 'string';
    } else if ($startPage == '') {

      $type = 'int0';
    }

    if ($type == 'int0') {

      $format = [
        'data' => array()
      ];
    } else {

      //pt array
      $ptArray = array();
      $queryPt = "SELECT id, name
                FROM ansena_department
                ORDER BY name ASC";
      $resultPt = $this->database->getData($queryPt, 'we');

      foreach ($resultPt->result() as $row) {
        $ptArray['p' . $row->id] = $row->name;
      }

      //token 
      $queryToken = $this->db->query("SELECT user_id, token FROM user")->result();
      
      foreach($queryToken as $t) {
        $tokenArray['t' . $t->user_id] = $t->token;
      }

      $perPage = 20;

      if ($startPage == 1) {

        $newStart = 0;
      } else if ($startPage > 1) {

        $newStart = ($startPage - 1) * $perPage;
      }

      //name array
      $nameArray = array();

      if ($type == 'int') {

        $queryName = "SELECT id, name, office
                    FROM ac_payroll_item
                    WHERE is_active = 1
                    AND barcode is not NULL
                    ORDER BY name ASC
                    LIMIT $newStart, $perPage";
      } else if ($type == 'string') {

        $queryName = "SELECT id, name, office
                    FROM ac_payroll_item
                    WHERE name LIKE '%$startPage%'
                    AND barcode is not NULL
                    ORDER BY name ASC";
      }

      $resultName = $this->database->getData($queryName, 'we');

      if ($resultName->num_rows() > 0) {

        $y = 0;
        foreach ($resultName->result() as $r) {
          $name[] = $r->name;
          $idCrew[] = $r->id;
          if (isset($ptArray['p' . $r->office])) {
            $ptName[] = $ptArray['p' . $r->office];
          }

          $searchId[] = $r->id;
          $office[] = $r->office;

        }

        for ($tt = 0; $tt < count($searchId); $tt++) {
          //token 
         if (isset ($tokenArray['t' . $searchId[$tt]])) {
           $userToken[] = $tokenArray['t' . $searchId[$tt]];
         } else {
           $userToken[] = '';
         }
        }

        foreach ($name as $key => $value) {

          $format['data'][] = [
            'idUser'  => $idCrew[$key],
            'name'    => $name[$key],
            'pt'      => $ptName[$key],
            'idPt'    => $office[$key],
            'token'   => $userToken[$key]
          ];
        }
      } else {

        $format = [
          'message' => 'Data not found',
          'data' => array()
        ];
      }
    }

    echo json_encode($format);
  }

  public function get_pt() {
    $query = "SELECT id, name
                    FROM ansena_department 
                    WHERE status > 0";
    $result = $this->database->getData($query, 'we')->result();

    foreach($result as $row) {
      $format[] = [
        'id'  => $row->id,
        'pt' => $row->name
      ];
    }

    $data['pt'] = $format;
    echo json_encode($data);
  }

  /**
  * @param get idSubjob 
  * @param get userId
  */
  public function detail_subjob($idSubjob, $userId) {
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
          //get token of all selected crew 
          $where = "user_id = $crew[$i]";
          $crewToken = $this->db->query("SELECT token FROM user WHERE user_id = $crew[$i]");
          if ($crewToken->num_rows() > 0) {
            $resultCrewToken = $crewToken->result();
            foreach ($resultCrewToken as $ct) {
              if($crew[$i] == $leader) {
                $leaderStatus = [
                  'status'  => 1,
                  'name'  => $nameArray['n' . $crew[$i]],
                  'token' => $ct->token
                ];
              } else {
                $leaderStatus = [
                  'status'  => 0,
                  'name'  => $nameArray['n' . $crew[$i]],
                  'token' => $ct->token
                ];
              }
            }
          } else {
            if($crew[$i] == $leader) {
              $leaderStatus = [
                'status'  => 1,
                'name'  => $nameArray['n' . $crew[$i]],
                'token' => ''
              ];
            } else {
              $leaderStatus = [
                'status'  => 0,
                'name'  => $nameArray['n' . $crew[$i]],
                'token' => ''
              ];
            }
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
            //get token of all remind peers
            $remindToken = $this->db->query("SELECT token FROM user WHERE user_id = $remind[$r]");

            if ($remindToken->num_rows() > 0) {
              foreach ($remindToken->result() as $rt) {
                $remindName[] = [
                  'name'  => $nameArray['n' . $remind[$r]],
                  'token' => $rt->token
                ];
              }
            } else {
              $remindName[] = [
                'name'  => $nameArray['n' . $remind[$r]],
                'token' => ''
              ];
            }
          }
        }
      } else {
        $remindName = array();
      }
      

      //approval name 
      if(isset($nameArray['n' . $approval['admin']])) {
        if($approval['coadmin'] == 0) {
          //get token of admin 
          $adminId = $approval['admin'];
          $queryToken = $this->db->query("SELECT token FROM user WHERE user_id = $adminId");

          if ($queryToken->num_rows() > 0) {
            $resultToken = $queryToken->row_array();
            $tokenAdmin = $resultToken['token'];
          } else {
            $tokenAdmin = '';
          }
          $approval1 = explode(' ', $nameArray['n' . $approval['admin']]);
          // $approvalName = $approval1[0];
          $approvalName[] = [
            'token' => $tokenAdmin,
            'approval'  => $approval1[0]
          ]; 
        } else {
          $approval1 = explode(' ', $nameArray['n' . $approval['coadmin']]);
          $approval2 = explode(' ', $nameArray['n' . $approval['admin']]);

          //query token coadmin 
          $coadminId = $approval['coadmin'];
          $queryToken2 = $this->db->query("SELECT token FROM user WHERE user_id = $coadminId");

          if ($queryToken2->num_rows() > 0) {
            $resultToken2 = $queryToken2->row_array();
            $tokenCoadmin = $resultToken2['token'];
          } else {
            $tokenCoadmin = '';
          }

          //query token admin 
          $adminId = $approval['admin'];
          $queryToken1 = $this->db->query("SELECT token FROM user WHERE user_id = $adminId");

          if ($queryToken1->num_rows() > 0) {
            $resultToken = $queryToken1->row_array();
            $tokenAdmin = $resultToken['token'];
          } else {
            $tokenAdmin = '';
          }
          // $approvalName = $approval1[0] . ' then ' . $approval2[0];
          $approve1[] = [
            'token' => $tokenAdmin,
            'approval'  => $approval2[0]
          ];
          $approve2[] = [
            'token' => $tokenCoadmin,
            'approval'  => $approval1[0]
          ];

          $approvalName = array_merge($approve2, $approve1);
        }
      }

      //assessor name 
      if(isset($nameArray['n' . $assessor])) {
        $assessor1 = explode(' ', $nameArray['n' . $assessor]);
        //get token of all assessor 
        $assessToken = $this->db->query("SELECT token FROM user WHERE user_id = $assessor");

        if ($assessToken->num_rows() > 0) {
          foreach ($assessToken->result() as $at) {
            $assessorName = [
              'name'  => $assessor1[0],
              'token' => $at->token
            ];
          }
        } else {
          $assessorName = [
            'name'  => $assessor1[0],
            'token' => ''
          ];
        }
      } else {
        $assessorName = array();
      }

      //image 
      $path = 'uploads/job/' . $jobId . '/';
      if($image != '') {
        for($m = 0; $m < count($image); $m++) {
          $newImage[] = [
            'url' => base_url() . 'uploads/job/' . $jobId . '/' . $image[$m]
          ];
        }
      } else {
        $newImage = array();
      }

      //purpose 
      if($purpose == '') {
        $newPurpose = array();
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
        $newReportItem = array();
      }

      //note report 
      if ($noteReport == '') {
        $newNoteReport = array();
      } else {
        $newNoteReport = $noteReport[0];
      }

      // ############################################### end show latest report ##################################### //


      // ############################################## overdue proposal ################################ //

      //deadline overdue 
      $deadlineOverdue = $deadline['d' . count($deadline)]['user_request'];

      if ($deadlineOverdue == 0) {
        $newDeadlineOverdue = array();
      } else {
        $newDeadlineOverdue = date('d M H:i', strtotime($deadlineOverdue));
      }

      //note overdue 
      if ($noteRequest == '') {
        $newNoteRequest = array();
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
        $newRequestItem = array();
      }

      // ############################################## end overdue proposal ################################ //


      // ################################################## revise view ######################################################## //

      if ($noteRevise == '') {
        $newNoteRevise = array();
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
        $newReviseItem = array();
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
        'alarm' => $alarm
      ];
      $format['status'] = 200;

      echo json_encode($format);

    }
  }
  // end of function detail_subjob

  public function addJob() {

    $date = $this->input->post('date');
    $title = $this->input->post('title');
    $coadmin = $this->input->post('coadmin');
    $crew = $this->input->post('crew');
    $leader = $this->input->post('leader');

    $dataSave = [
      'title' => $title,
      'date'  => $date,
      'crew'  => json_encode($crew),
      'leader' => $leader,
      'coadminDb' => $coadmin,
      'role'  => 1
    ];

    $this->db->insert('job', $dataSave);

    $currentId = $this->db->insert_id();

    $data['idJobGroup'] = $currentId;

    echo json_encode($data);
  }

  public function saveTemplateGroupJob($param = '') {
    $userId = $this->input->post('userId');

    $dataUpdate = [
      'title' => '',
      'admin' => $userId
    ];

    $this->db->insert('job', $dataUpdate);

    //get the id
    $id = $this->db->insert_id();

    $format['data'] = [
      'jobId' => $id
    ];

    if ($param == '') {
      echo json_encode($format);
    } else {
      $newId = $id;
      return $newId;
    }
  }

  function codeGenerator($user) {
    $num = rand(10, 500);

    $code = $user . $num;

    return $code;
  }

  public function saveTemplateSubjob() {
    $jobId = $this->input->post('jobId');
    $userCode = $this->input->post('userCode');
    //generate code
    $code = $this->codeGenerator($userCode);

    $dataInput = [
      'id_title'  => $jobId,
      'code'      => $code
    ];

    $this->db->insert('subjob', $dataInput);

    $subjobId = $this->db->insert_id();

    $format['data'] = [
      'subjobId'  => $subjobId,
      'code'      => $code
    ];

    echo json_encode($format);
  }

  public function deleteSubjob() {

    $subjobId = $this->input->post('subjobId');

    $this->db->where('id', $subjobId);
    $this->db->delete('subjob');

    $format['data'] = [
      'message' => 'success'
    ];

    echo json_encode($format);
  }

  public function deleteJob($jobId) {

    $query = "SELECT title, crew, leader
              FROM job
              WHERE id = $jobId";
    $db = 'default';

    $result = $this->database->getData($query, $db)->result();
    foreach ($result as $row) {
      $title = $row->title;
      $crew = json_decode($row->crew, true);
      $leader = $row->leader;
    }

    $this->db->where('id', $jobId);
    $this->db->delete('job');

    $this->db->where('id_title', $jobId);
    $this->db->delete('subjob');

    $format['data'] = [
      'message' => 'success'
    ];

    echo json_encode($format);
  }

  public function viewData($table) {

    $query = "SELECT * FROM $table";
    $result = $this->database->getData($query, 'jobdesk')->result();
    echo json_encode($result);
  }

  public function saveJobGroup() {

    $title = $this->input->post('title');
    $pt = $this->input->post('pt');
    $crew = $this->input->post('crew');
    $leaderId = $this->input->post('leaderid');
    $admin = $this->input->post('admin');
    $coadmin = $this->input->post('coadmin');
    $date = date('Y-m-d');
    $jobId = $this->input->post('jobId');
  
    //condition crew, pt
    $exCrew = explode(',', $crew);
    $exPt = explode(',', $pt);

    $dataUpdate = [
      'pt'  => json_encode($exPt),
      'crew'  => json_encode($exCrew),
      'title' => $title,
      'role'  => 1,
      'leader'  => $leaderId,
      'admin' => $admin,
      'coadmin' => $coadmin,
      'date'  => $date
    ];

    $this->db->where('id', $jobId);
    $this->db->update('job', $dataUpdate);

    $format['status'] = '200';
    $format['data'] = [
      'message' => 'success',
      'response'  => $dataUpdate
    ];

    echo json_encode($format);
  }

  public function save_subjob() {

    header('Content-Type: application/json; charset=utf-8');
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: PUT, GET, POST");

    $id = $_POST['id'];
    $userId = $_POST['userId'];
    $jobId = $_POST['id_title'];
    $subjob = $_POST['subjob'];
    $fixSubjob = $_POST['subjob'];
    $remind = $_POST['remind'];
    $approval = $_POST['approval'];
    $code = $_POST['code'];
    $purpose = $_POST['purpose'];
    $assessor = $_POST['assessor'];
    $is_priority = $_POST['is_priority'];
    $stoppable = $_POST['stoppable'];
    $alarm = $_POST['alarm'];
    $deadline = $_POST['deadline'];
    $note = $_POST['note'];

    //handle note
    if ($note == '') {

      $newNote = 0;
    } else {

      $newNote = $note;
    }

    //handle deadline
    if ($deadline == '') {

      $newDeadline['d1'] = [
        'user_create'   => $userId,
        'date_create'   => 0,
        'user_request'  => 0,
        'date_revision' => 0
      ];
    } else {

      $newDeadline['d1'] = [
        'user_create'   => $userId,
        'date_create'   => $deadline,
        'user_request'  => 0,
        'date_revision' => 0
      ];
    }

    //handle assessor
    if ($assessor == '') {

      $newAssessor = 0;
    } else {

      $newAssessor = $assessor;
    }

    //handle approval
    $expApproval = explode(',', $approval);

    if (count($expApproval) == 1) {

      $newApproval = [
        'admin'         => $expApproval[0],
        'coadmin'       => '0',
        'co-assessor'   => $newAssessor
      ];
    } else {

      $newApproval = [
        'admin'         => $expApproval[1],
        'coadmin'       => $expApproval[0],
        'co-assessor'   => $newAssessor
      ];
    }

    //handle reminder peers
    if ($remind != '') {

      $exRemind = explode(',', $remind);
      $newRemind = json_encode($exRemind);
    } else {

      $newRemind = null;
    }

    //create new folder 
    $path     = './uploads/job/' . $jobId . '/';
    if (!is_dir($path)) {
      mkdir($path, 0755, true);
    }

    // handle image
    $exSubjob = explode('.', $subjob);
    if (count($exSubjob) == 1) {

      $fixSubjob = $exSubjob[0];

      $count = count($_FILES['img']['name']);


      for ($i = 0; $i < $count; $i++) {

        $_FILES['file']['name']       = date('Y-m-d-H:i:s') . '_' . $jobId . '_' . '_subjob_' . $_FILES['img']['name'][$i];
        $_FILES['file']['type']       = $_FILES['img']['type'][$i];
        $_FILES['file']['tmp_name']   = $_FILES['img']['tmp_name'][$i];
        $_FILES['file']['error']      = $_FILES['img']['error'][$i];
        $_FILES['file']['size']       = $_FILES['img']['size'][$i];

        // $config['file_name']        = $_FILES['img']['name'][$i];
        $config['upload_path']      = $path;
        $config['allowed_types']    = 'png|jpg|jpeg';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {

          $imgN[] = $this->upload->data('file_name');
          $imgName = json_encode($imgN);
          $message = 'success';

        } else {

          $message = array('error' => $this->upload->display_errors('', ''));
          $name = 0;

          // 409 -> wrong format file
          // 413 -> file size

          if ($message == 'The filetype you are attempting to upload is not allowed.') {


            $statusError = '409';
          } else {

            $statusError = '';
          }

          $dataSend['status'] = $statusError;
          echo json_encode($dataSend);
          return false;
        }
      }
    } else {

      // $imgN = '';
      $imgName = null;
      $fixSubjob = $exSubjob[0];
    }


    //data to send
    $dataInsert = [
      'id_title'  => $jobId,
      'subjob'    => $fixSubjob,
      'code'      => $code,
      'deadline'  => json_encode($newDeadline),
      'purpose'   => $purpose,
      'remind'    => $newRemind,
      'assessor'  => $newAssessor,
      'approval'  => json_encode($newApproval),
      'status'    => 1,
      'is_priority' => $is_priority,
      'note'      => $newNote,
      'alarm'     => $alarm,
      'stoppable' => $stoppable,
      'img_refer'  => $imgName
    ];

    $this->db->where('id', $id);
    $this->db->update('subjob', $dataInsert);

    $format['data'] = [
      'status'  => 200,
      'message' => 'success',
      'id'    => $id
    ];

    echo json_encode($format);
  }
  // end of function show_subjob

  /** 
   * @param post => note_request
   * @param post => deadline
   * @param post => img_request
   * @param post => desc_request
   * @param post => subjobId
   * @param post => jobId
   * @param post => userId
   * @return json
   */
  public function request_deadline() {
    $note = $_POST['note_request'];
    $deadline = $_POST['deadline'];
    $img = $_FILES['img_request'];
    $desc = $_POST['desc_request'];
    $jobId = $_POST['jobId'];
    $subjobId = $_POST['subjobId'];
    $userId = $_POST['userId'];

    $path     = './uploads/job/' . $jobId;
    if (!is_dir($path)) {
      mkdir($path, 0755, true);
    }

    $query = $this->db->query("SELECT deadline, img_request
                                    FROM subjob 
                                    WHERE id = $subjobId")->row_array();

    $deadlineDb = json_decode($query['deadline'], true);
    $create = $deadlineDb['d' . count($deadlineDb)]['date_create'];
    $revision = $deadlineDb['d' . count($deadlineDb)]['date_revision'];
    $request = $deadlineDb['d' . count($deadlineDb)]['user_request'];
    $userCreate = $deadlineDb['d' . count($deadlineDb)]['user_create'];
    $imgDb = json_decode($query['img_request'], true);

    // deadline
    $formatDeadline['d' . (count($deadlineDb) + 1)] = [
      'user_create' => $userCreate,
      'date_create' => $create,
      'date_revision' => $revision,
      'user_request'  => $deadline
    ];

    $mergeDeadline = array_merge($deadlineDb, $formatDeadline);

    //image 
    for ($i = 0; $i < count($_FILES['img_request']['name']); $i++) {
      $_FILES['file']['name']       = date('Y-m-d_H:i:s') . '_' . $jobId . '_' . '_subjob_' . $_FILES['img_request']['name'][$i];
      $_FILES['file']['type']       = $_FILES['img_request']['type'][$i];
      $_FILES['file']['tmp_name']   = $_FILES['img_request']['tmp_name'][$i];
      $_FILES['file']['error']      = $_FILES['img_request']['error'][$i];
      $_FILES['file']['size']       = $_FILES['img_request']['size'][$i];

      // $config['file_name']        = $_FILES['img']['name'][$i];
      $config['upload_path']      = $path;
      $config['allowed_types']    = 'png|jpg|jpeg';

      if ($imgDb == '') {
        $formatImg[] = [
          'img' => date('Y-m-d_H:i:s') . '_' . $jobId . '_' . '_subjob_' . $_FILES['img_request']['name'][$i],
          'desc'  => $desc[$i]
        ];
      } else {
        $lastFormat[] = [
          'img' => date('Y-m-d_H:i:s') . '_' . $jobId . '_' . '_subjob_' . $_FILES['img_request']['name'][$i],
          'desc'  => $desc[$i]
        ];
  
        $formatImg = array_merge($imgDb, $lastFormat);
      }

      $this->load->library('upload', $config);
  
      if ($this->upload->do_upload('file')) {
        //update 
        $dataUpdate = [
          'deadline'  => json_encode($mergeDeadline),
          'note_request'  => $note,
          'img_request' => json_encode($formatImg),
          'status'      => 6
        ];

        $this->db->where('id', $subjobId);
        $this->db->update('subjob', $dataUpdate);
      }
    }

    //history 
    $history = $this->history($subjobId, $userId, 'propose');

    $format['status'] = 200;
    $format['data'] = $history;
    echo json_encode($format);
  }
  // end of function request_deadline

  /** 
   * @param post => note_report
   * @param post => img_report
   * @param post => subjobId
   * @param post => desc
   * @param post => userId
   * @return json
   */
  public function report_as_done() {
    $note[] = $_POST['note_report'];
    $subjobId = $_POST['subjobId'];
    $desc = $_POST['desc'];
    $userId = $_POST['userId'];

    $query = $this->db->query("SELECT approval, deadline, is_time, id_title, img_report
                                    FROM subjob 
                                    WHERE id = $subjobId")->row_array();
                                    
    $deadline = json_decode($query['deadline'], true);
    $isTime = json_decode($query['is_time'], true);
    $jobId = $query['id_title'];
    $imgDb = json_decode($query['img_report'], true);
    $approval = json_decode($query['approval'], true);

    $admin = $approval['admin'];
    $coadmin = $approval['coadmin'];
    $assessor = $approval['co-assessor'];
    $today = date('Y-m-d H:i');

    //deadline 
    $dateCreate = $deadline['d' . count($deadline)]['date_create'];

    //status
    if ($assessor == 0) {
      if ($coadmin == 0) {
        $status = 4;

        //get token of admin 
        $tokenAdmin = $this->db->query("SELECT token FROM user WHERE user_id = $admin");
        if ($tokenAdmin->num_rows() > 0) {
          $resultToken = $tokenAdmin->row_array();
          $registeredToken = $resultToken['token'];
        } else {
          $registeredToken = '';
        }
      } else {
        $status = 3;

        // get token of coadmin 
        $tokenCoadmin = $this->db->query("SELECT token FROM user WHERE user_id = $coadmin");
        if ($tokenCoadmin->num_rows() > 0) {
          $resultToken = $tokenCoadmin->row_array();
          $registeredToken = $resultToken['token'];
        } else {
          $registeredToken = '';
        }
      }
    } else {
      $status = 2;

      // get token of assessor 
      $tokenAssessor = $this->db->query("SELECT token FROM user WHERE user_id = $assessor");
      if ($tokenAssessor->num_rows() > 0) {
        $resultToken = $tokenAssessor->row_array();
        $registeredToken = $resultToken['token'];
      } else {
        $registeredToken = '';
      }
    }

    //is_time 
    if ($isTime == '') {
      $formatTime['r1'] = [
        'time_done' => $today,
        'deadline'  => $dateCreate
      ];
    } else {
      $currentTime['r' . (count($isTime) + 1)] = [
        'time_done' => $today,
        'deadline'  => $dateCreate
      ];

      $formatTime = array_merge($isTime, $currentTime);
    }

    //image 
    $path     = './uploads/job/' . $jobId;
    if (!is_dir($path)) {
      mkdir($path, 0755, true);
    }

    $count = count($_FILES['img_report']['name']);
    for ($i = 0; $i < $count; $i++) {
      $_FILES['file']['name']       = date('Y-m-d_H:i:s') . '_' . $jobId . '_' . '_subjob_' . $_FILES['img_report']['name'][$i];
      $_FILES['file']['type']       = $_FILES['img_report']['type'][$i];
      $_FILES['file']['tmp_name']   = $_FILES['img_report']['tmp_name'][$i];
      $_FILES['file']['error']      = $_FILES['img_report']['error'][$i];
      $_FILES['file']['size']       = $_FILES['img_report']['size'][$i];

      // $config['file_name']        = $_FILES['img']['name'][$i];
      $config['upload_path']      = $path;
      $config['allowed_types']    = 'png|jpg|jpeg';

      $formatImg[] = [
        'img' => date('Y-m-d_H:i:s') . '_' . $jobId . '_' . '_subjob_' . $_FILES['img_report']['name'][$i],
        'desc'  => $desc[$i]
      ];

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('file')) {
        //update 
        $dataUpdate = [
          'status'  => $status,
          'img_report'  => json_encode($formatImg),
          'is_time' => json_encode($formatTime),
          'note_report' => json_encode($note)
        ];

        $this->db->where('id', $subjobId);
        $this->db->update('subjob', $dataUpdate);
      } else {
        echo json_encode($this->upload->display_errors());
      }
    }

    //history 
    $history = $this->history($subjobId, $userId, 'done');
    $statusButton = $history['statusButton'];
    $reportHis = $history['reportHistory'];

    $data['status'] = 200;
    $data['data'] = [
      'reportHistory' => $reportHis,
      'statusButton'  => $statusButton,
      'token'         => $registeredToken
    ];

    echo json_encode($data);
    
  }
  // end of function report_as_done

  /** 
   * @param post => subjobId
   * @param post => userId
   * @param post => deadline
   * @param post => note
   * @return json
   */
  public function change_overdue() {
    $subjobId = $this->input->post('subjobId');
    $userId = $this->input->post('userId');
    $deadline = $this->input->post('deadline');
    $note = $this->input->post('note');

    // change field 
    /** 
     * deadline
     * status
     */

     //format deadline 
     $query = $this->db->query("SELECT deadline 
                                      FROM subjob 
                                      WHERE id = $subjobId")->row_array();

      $deadlineDb = json_decode($query['deadline'], true);
      $user_request = $deadlineDb['d' . count($deadlineDb)]['user_request'];

      if ($deadline != '') {
        $deadlineDb['d' . count($deadlineDb)]['date_create'] = $deadline;
        $deadlineDb['d' . count($deadlineDb)]['user_request'] = $deadline;
      } else {
        $deadlineDb['d' . count($deadlineDb)]['date_create'] = $user_request;
      }

      $dataUpdate = [
        'status'  => 1,
        'deadline'  => json_encode($deadlineDb)
      ];

      $this->db->where('id', $subjobId);
      $this->db->update('subjob', $dataUpdate);

      //history 
      $history = $this->history($subjobId, $userId, 'propose');
      $overdueHistory = $history['overdueHistory'];
      $statusButton = $history['statusButton'];

      $data['status'] = 200;
      $data['overdueHistory']  = $overdueHistory;
      $data['statusButton'] = $statusButton;

      echo json_encode($data);
  }
  // end of function change_overdue

  /** 
   * @param post => note_revise
   * @param post => userId
   * @param post => subjobId
   * @param post => jobId
   * @param post => img_revise
   * @param post => desc
   * @return 
   */
  public function revise() {
    $subjobId = $_POST['subjobId'];
    $jobId = $_POST['jobId'];
    $userId = $_POST['userId'];
    $note = $_POST['note_revise'];
    $desc = $_POST['desc_revise'];
    $deadline = $_POST['deadline'];

    //query 
    $query = $this->db->query("SELECT img_revise, deadline
                                    FROM subjob 
                                    WHERE id = $subjobId")->row_array();

    $imgRevise = json_decode($query['img_revise'], true);
    $deadlineDb = json_decode($query['deadline'], true);

    //deadline 
    $dateCreate = $deadlineDb['d' . count($deadlineDb)]['date_create'];
    $userReq = $deadlineDb['d' . count($deadlineDb)]['user_request'];
    $userCreate = $deadlineDb['d' . count($deadlineDb)]['user_create'];
    $deadlineDb['d' . count($deadlineDb)]['date_create'] = $deadline;
    $deadlineDb['d' . count($deadlineDb)]['date_revision'] = $deadline;

    if ($userReq != 0) {
      $deadlineDb['d' . count($deadlineDb)]['user_request'] = $deadline;
    }

    $newFormat = $deadlineDb;
    
    $count = count($_FILES['img_revise']['name']);
    $path     = './uploads/job/' . $jobId;
    if (!is_dir($path)) {
      mkdir($path, 0755, true);
    }

    for ($i = 0; $i < $count; $i++) {
      $_FILES['file']['name']       = date('Y-m-d_H:i:s') . '_' . $jobId . '_' . '_subjob_revise_' . $_FILES['img_revise']['name'][$i];
      $_FILES['file']['type']       = $_FILES['img_revise']['type'][$i];
      $_FILES['file']['tmp_name']   = $_FILES['img_revise']['tmp_name'][$i];
      $_FILES['file']['error']      = $_FILES['img_revise']['error'][$i];
      $_FILES['file']['size']       = $_FILES['img_revise']['size'][$i];

      // $config['file_name']        = date('Y-m-d_H:i:s') . '_' . $jobId . '_' . '_subjob_revise' . $_FILES['img_revise']['name'][$i];
      $config['upload_path']      = $path;
      $config['allowed_types']    = 'png|jpg|jpeg';

      $formatImg[] = [
        'img' => date('Y-m-d_H:i:s') . '_' . $jobId . '_' . '_subjob_revise_' . $_FILES['img_revise']['name'][$i],
        'desc' => $desc[$i]
      ];


      $this->load->library('upload', $config);

      if ($this->upload->do_upload('file')) {
        //update 
        $dataUpdate = [
          'img_revise' => json_encode($formatImg),
          'status'  => 5,
          'note_revise' => $note,
          'deadline'  => json_encode($newFormat)
        ];

        $this->db->where('id', $subjobId);
        $this->db->update('subjob', $dataUpdate);
      } else {
        echo json_encode($this->upload->display_errors());
      }
    }

    $history = $this->history($subjobId, $userId, 'done');
    $reportHistory = $history['reportHistory'];
    $statusButton = $history['statusButton'];

    $data['status'] = 200;
    $data['reportHistory']  = $reportHistory;
    $data['statusButton'] = $statusButton;

    echo json_encode($data);
  }
  // end of function revise

  /** 
   * @param post => subjobId
   * @param post => userId
   * @return 
   */
  public function mark_as_done() {
    $subjobId = $this->input->post('subjobId');
    $userId = $this->input->post('userId');

    $query = $this->db->query("SELECT approval 
                                    FROM subjob
                                    WHERE id = $subjobId")->row_array();

    $approval = json_decode($query['approval'], true);

    $admin = $approval['admin'];
    $coadmin = $approval['coadmin'];
    $assessor = $approval['co-assessor'];

    if ($userId == $assessor && $coadmin != 0) {
      $status = 3;
    } else if ($userId == $assessor && $coadmin == 0) {
      $status = 4;
    } else if ($userId == $coadmin) {
      $status = 4;
    } else if ($userId == $admin) {
      $status = 0;
    }

    $dataUpdate = [
      'status' => $status
    ];

    $this->db->where('id', $subjobId);
    $this->db->update('subjob', $dataUpdate);

    $history = $this->history($subjobId, $userId, 'done');
    $reportHistory = $history['reportHistory'];
    $statusButton = $history['statusButton'];

    $data['status']= 200;
    $data['reportHistory'] = $reportHistory;
    $data['statusButton'] = $statusButton;

    echo json_encode($data);
  }
  // end of function mark_as_done

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
          $deadlineView = array();
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
          $deadlineView = array();
        } else {
          $deadlineView = date('d m H:i', strtotime($deadline['d' . count($deadline)]['date_create']));
        }
        $dateCompare = $deadline['d' . count($deadline)]['date_create'];
      }
      //
    } else {
      //none overdue 
      $overdue = array();
      if ($deadline['d' . count($deadline)]['date_create'] == 0) {
        $deadlineView = array();
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
        //condition when deadline is 0
        if ($isTime['r' . count($isTime)]['deadline'] == 0) {
          $isTimeDate = 'No deadline';
        } else {
          $isTimeDate = date('d M H:i', strtotime($isTime['r' . count($isTime)]['deadline']));
        }
        if ($status == 1 || $status == 5) {
          $reportHistory[] = [
            'status'  => 'failed',
            'deadline'  => $isTimeDate
          ];
        } else if ($status == 0) {
          $reportHistory[] = [
            'status'  => 'Finish',
            'deadline'  => $isTimeDate
          ];
        } else {
          $reportHistory[] = [
            'status'  => 'Waiting assessment',
            'deadline'  => $isTimeDate
          ];
        }
      } else {
        for ($rh = 0; $rh < count($isTime); $rh++) {
          //condition when deadline is 0
          if ($isTime['r' . ($rh + 1)]['deadline'] == 0) {
            $isTimeDate = 'No deadline';
          } else {
            $isTimeDate = date('d M H:i', strtotime($isTime['r' . ($rh + 1)]['deadline']));
          }
          if ($isTime['r' . ($rh + 1)]['time_done'] == $isTime['r' . count($isTime)]['time_done'] && $status != 0) {
            $reportHistory[] = [
              'status'  => 'Waiting assessment',
              'deadline'  => $isTimeDate
            ];
          } else if ($isTime['r' . ($rh + 1)]['time_done'] == $isTime['r' . count($isTime)]['time_done'] && $status == 0) {
            $reportHistory[] = [
              'status'  => 'Finish',
              'deadline'  => $isTimeDate
            ];
          } else {
            $reportHistory[] = [
              'status'  => 'Failed',
              'deadline'  => $isTimeDate
            ];
          }
        }
      }
    } else {
      $timeReport = 'Not yet reported';
      $reportHistory = array();
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

  /** 
   * @param get => userId
   * @param get => $a => activity 
   * @param get => $b => subjob (active)
   * @param get => $bmin => subjob min
   * @param get => $bmax => subjob max 
   * @param get => $cmin => deadline (min, max)
   * @param get => $cmax => deadline (min, max)
   * @param get => $d => coadmin (id) 
   * @param get => $emin => crew (min) 
   * @param get => $emax => crew (max)
   * @param get => $f => pt
   * @param get => $g => $leader 
   * @param get => $as => name sort
   * @param get => $bs => date create sort 
   * @param get => $cs => number crew sort
   * @param get => $ds => number subjob sort
   * @param get => $es => upcoming deadline
   * @return json
   */
  public function view_detail($userId, $param = '') {
    $a = $this->input->get('a');
    $b = $this->input->get('b');
    $bmin = $this->input->get('bmin');
    $bmax = $this->input->get('bmax');
    $cmin = $this->input->get('cmin');
    $cmax = $this->input->get('cmax');
    $d = $this->input->get('d');
    $emin = $this->input->get('emin');
    $emax = $this->input->get('emax');
    $f = $this->input->get('f');
    $g = $this->input->get('g');

    // #################################################### get sorting #################################################### //

    $as = $this->input->get('as');
    $bs = $this->input->get('bs');
    $cs = $this->input->get('cs');
    $ds = $this->input->get('ds');
    $es = $this->input->get('es');

    // #################################################### end get sorting #################################################### //

    if ($a != '') {
      switch ($a) {
        case '1':
          $wherea = ' AND j.role >= 0';
          $queryStatus = 'all';
          $wheregroup = ' GROUP BY sj.id_title';
          break;

        case '2': 
          $wherea = ' AND j.role = 1';
          $queryStatus = 'active';
          $wheregroup = ' GROUP BY sj.id_title';
          break;
        
        case '3':
          $wherea = ' AND j.role = 0';
          $queryStatus = 'inactive';
          $wheregroup = ' GROUP BY sj.id_title';
          break;

        case '4':
          $wherea = ' AND j.role = 13';
          $queryStatus = 'deactivate';
          $wheregroup = ' GROUP BY sj.id_title';
          break;

        default:
          $wherea = '';
          $queryStatus = 'all';
          $wheregroup = ' GROUP BY sj.id_title';
          break;
      }
    } else {
      $wheregroup = ' GROUP BY sj.id_title';
      $queryStatus = 'all';
      $wherea = '';
    }

    if ($b == 1) {
      $whereb = ' AND sj.status >= 0';
      $wheregroup = ' GROUP BY sj.id_title';
    } else if ($b == 2) {
      $whereb = ' AND sj.status >= 1';
      $wheregroup = ' GROUP BY sj.id_title';
    } else if ($b == '') {
      $whereb = '';
      $wheregroup = ' GROUP BY sj.id_title';
    }

    if ($bmin != '' && $bmax != '') {
      $wheregroup = ' GROUP BY sj.id_title';
      $wherebmin = '';
      $wherebmax = " HAVING COUNT(sj.id_title) >= $bmin AND COUNT(sj.id_title) <= $bmax";
    } else if ($bmin != '') {
      $wheregroup = ' GROUP BY sj.id_title';
      $wherebmin = ' HAVING COUNT(sj.id_title) >= ' . $bmin;
      $wherebmax = '';
    } else if ($bmax != '') {
      $wheregroup = ' GROUP BY sj.id_title';
      $wherebmax = ' HAVING COUNT(sj.id_title) <= ' . $bmax;
      $wherebmin = '';
    } else  if ($bmax == '' || $bmin == '') {
      $wheregroup = ' GROUP BY sj.id_title';
      $wherebmax = '';
      $wherebmin = '';
    }

    if ($cmin != '') {
      $wherecmin = " AND JSON_UNQUOTE(JSON_EXTRACT(sj.deadline, '$.d1.date_create')) >= '$cmin 09:00'";
      $wherecmax = '';
    } else if ($cmax != '') {
      $wherecmax = " AND JSON_UNQUOTE(JSON_EXTRACT(sj.deadline, '$.d1.date_create')) <= '$cmax 09:00'";
      $wherecmin = '';
    } else if ($cmin != '' && $cmax != '') {
      $wherecmax =  " AND JSON_UNQUOTE(JSON_EXTRACT(sj.deadline, '$.d1.date_create')) >= '$cmin 09:00'  AND JSON_UNQUOTE(JSON_EXTRACT(sj.deadline, '$.d1.date_create')) <= '$cmax 09:00'";
      $wherecmin = '';
    } else if ($cmin == '' && $cmax == '') {
      $wherecmin = '';
      $wherecmax = '';
    }

    if ($d != '') {
      $whered = " AND j.coadmin = $d";
      $wheregroup = ' GROUP BY sj.id_title';
    } else {
      $wheregroup = ' GROUP BY sj.id_title';
      $whered = '';
    }

    if ($emin != '' && $emax != '') {
      $whereemax = " HAVING JSON_LENGTH(crew) >= $emin AND JSON_LENGTH(crew) <= $emax";
      $whereemin = '';
    } else if ($emin != '') {
      $whereemin = " HAVING JSON_LENGTH(crew) >= $emin";
      $whereemax = '';
    } else if ($emax != '') {
      $whereemax = " HAVING JSON_LENGTH(crew) <= $emax";
      $whereemin = '';
    } else {
      $whereemax = '';
      $whereemin = '';
    }

    if ($f != '') {
      $expf = explode(',' , $f);
      for ($f = 0; $f < count($expf); $f++) {
        $wheref = " AND JSON_CONTAINS(j.pt, JSON_QUOTE('$expf[$f]'), '$') = 1";
      }
    } else {
      $wheref = '';
    }

    if ($g != '') {
      $whereg = " AND j.leader = $g";
    } else {
      $whereg = '';
    }

    if ($as  == 1) {
      $sorta = " ORDER BY j.title DESC";
    } else if ($as == 2) {
      $sorta = " ORDER BY j.title ASC";
    } else {
      $sorta = '';
    }

    if ($bs == 1) {
      $sortb = " ORDER BY date DESC";
    } else if ($bs == 2) {
      $sortb = " ORDER BY date ASC";
    } else {
      $sortb = '';
    }

    if ($cs == 1) {
      $sortc = " ORDER BY JSON_LENGTH(j.crew) DESC";
    } else if ($cs == 2) {
      $sortc = " ORDER BY JSON_LENGTH(j.crew) ASC";
    } else {
      $sortc = '';
    }

    if ($ds == 1) {
      $sortd = " ORDER BY COUNT(sj.id_title) DESC";
    } else if ($ds == 2) {
      $sortd = " ORDER BY COUNT(sj.id_title) ASC";
    } else {
      $sortd = '';
    }

    //condition user 
    $queryUser = $this->db->query("SELECT admin, coadmin FROM job WHERE role IS NOT null")->result();
    foreach ($queryUser as $rr) {
      $uAdmin[] = $rr->admin;
      $uCoadmin[] = $rr->coadmin;
    }

    for ($i = 0; $i < count($uAdmin); $i++) {
      if ($userId == $uAdmin[$i]) {
        $whereUser[] = ' AND j.admin = ' . $userId;
      } else if ($userId == $uCoadmin[$i]) {
        $whereUser[] = ' AND j.coadmin = ' . $userId;
      } else if ($userId != $uAdmin[$i] && $userId != $uCoadmin[$i]) {
        $whereUser[] = ' AND j.admin = ' . $userId;
      }
    }

    $newWhere = array_unique(array_values(array_filter($whereUser)));

    $whereValues = array_values($newWhere);

    if (count($newWhere) == 1) {
      $whereNew = $whereValues[0];
    } else {
      $whereNew = $whereValues[1];
    }

    $queryActive = $this->db->query('SELECT j.crew, j.leader, j.coadmin, j.title, j.id AS jobId, sj.id, j.date, j.note_deactivate, JSON_UNQUOTE(JSON_EXTRACT(sj.deadline, "$.d1.date_create")) AS deadline, sj.id_title AS idTitle
                                        FROM job j, subjob sj
                                        WHERE j.id = sj.id_title
                                        AND j.role = 1'
                                        . $whereNew
                                        . $wherea 
                                        . $whereb 
                                        . $wherecmin
                                        . $wherecmax
                                        . $whered
                                        . $wheref
                                        . $whereg
                                        . $wheregroup
                                        . $whereemin 
                                        . $whereemax
                                        . $wherebmin 
                                        . $wherebmax
                                        . $sorta
                                        . $sortb
                                        . $sortc
                                        . $sortd);

    $queryInactive = $this->db->query('SELECT j.crew, j.leader, j.coadmin, j.title, j.id AS jobId, sj.id, j.date, j.note_deactivate, JSON_UNQUOTE(JSON_EXTRACT(sj.deadline, "$.d1.date_create")) AS deadline, sj.id_title AS idTitle
                                        FROM job j, subjob sj
                                        WHERE j.id = sj.id_title
                                        AND j.role = 0'
                                        . $newWhere[0]
                                        . $wherea 
                                        . $whereb 
                                        . $wherecmin
                                        . $wherecmax
                                        . $whered
                                        . $wheref
                                        . $whereg
                                        . $wheregroup
                                        . $whereemin 
                                        . $whereemax
                                        . $wherebmin 
                                        . $wherebmax
                                        . $sorta
                                        . $sortb
                                        . $sortc
                                        . $sortd);

    $queryDeactivate = $this->db->query('SELECT j.crew, j.leader, j.coadmin, j.title, j.id AS jobId, sj.id, j.date, j.note_deactivate, JSON_UNQUOTE(JSON_EXTRACT(sj.deadline, "$.d1.date_create")) AS deadline, sj.id_title AS idTitle
                                        FROM job j, subjob sj
                                        WHERE j.id = sj.id_title
                                        AND j.role = 13'
                                        . $newWhere[0]
                                        . $wherea 
                                        . $whereb 
                                        . $wherecmin
                                        . $wherecmax
                                        . $whered
                                        . $wheref
                                        . $whereg
                                        . $wheregroup
                                        . $whereemin 
                                        . $whereemax
                                        . $wherebmin 
                                        . $wherebmax
                                        . $sorta
                                        . $sortb
                                        . $sortc
                                        . $sortd);

    if ($queryActive->num_rows() > 0) {
      $renderActive = $this->render_detail($queryActive);
    } else {
      $renderActive = array();
    }

    if ($queryInactive->num_rows() > 0) {
      $renderInactive = $this->render_detail($queryInactive);
    } else {
      $renderInactive = array();
    }

    if ($queryDeactivate->num_rows() > 0) {
      $renderDeactivate = $this->render_detail($queryDeactivate);
    } else {
      $renderDeactivate = array();
    }

    if ($queryStatus == 'active') {
      $format['data'] = [
        'active' => $renderActive,
        'inactive'  => array(),
        'deactivate'  => array()
      ];
    } else if ($queryStatus == 'inactive') {
      $format['data'] = [
        'inactive' => $renderInactive,
        'active'  => array(),
        'deactivate'  => array()
      ];
    } else if ($queryStatus == 'deactivate') {
      $format['data'] = [
        'deactivate' => $renderDeactivate,
        'active'  => array(),
        'inactive'  => array()
      ];
    } else if ($queryStatus == 'all') {
      $format['data'] = [
        'active' => $renderActive,
        'inactive'  => $renderInactive,
        'deactivate'  => $renderDeactivate
      ];                                 
    }

    if ($param == '') {
      echo json_encode($format);
    } else {
      return $format;
    }
  }
  // end of function view_detail

  /** 
  * @param get => result query
  * @return 
  */
  public function render_detail($result) {
    $queryName = "SELECT id, name 
                        FROM ac_payroll_item 
                        WHERE is_active  >= 0";

    $nameArray = array();
    $resultName = $this->database->getData($queryName, 'we');

    foreach ($resultName->result() as $r) {
      $nameArray['n' . $r->id] = $r->name;
    }

    foreach ($result->result() as $row) {                                            
      // id 
      $jobId[] = $row->jobId;
      $idITitleSubjob[]= $row->jobId;

      //date 
      $date[] = date('d M Y', strtotime($row->date));

      //title 
      $title[] = $row->title;

      //note 
      $note[] = $row->note_deactivate;

      //leader 
      if (isset($nameArray['n' . $row->leader])) {
        $fullLeader = $nameArray['n' . $row->leader];
        $splitLeader = explode(' ', $fullLeader);
        $leaderName[] = $splitLeader[0];
      } else {
        $leaderName[] = '-';
      }

      //subjob rows 
      $subjobAll = $this->db->query("SELECT id 
                                            FROM subjob 
                                            WHERE id_title = $row->jobId")->num_rows();

      $subjobActive = $this->db->query("SELECT id 
                                            FROM subjob 
                                            WHERE status > 0
                                            AND id_title = $row->jobId")->num_rows();

      $subjobRows[] = $subjobAll . ' (' . $subjobActive . ' active )';
      //rows crew 
      $crew = json_decode($row->crew, true);
      if (count($crew) == 1) {
        $crewRows[] = count($crew) . ' Crew';
      } else {
        $crewRows[] = count($crew) . ' Crews';
      }

      // coadmin name
      $coadmin  = $row->coadmin;

      if ($coadmin == 0) {
        $coadminName[] = '-';
      } else {
        if (isset($nameArray['n' . $coadmin])) {
          $fullCoadmin = $nameArray['n' . $coadmin];
          $splitCoadmin = explode(' ', $fullCoadmin);
          $coadminName[] = $splitCoadmin[0];
        }
      }

      for ($i = 0; $i < count($idITitleSubjob); $i++) {
        $q = $this->db->query("SELECT id, deadline FROM subjob WHERE id_title = $idITitleSubjob[$i]")->result();
        $zz = 0;
        foreach ($q as $qq) {
          $deadline = json_decode($qq->deadline, true);
          $dateCreate[$i][$zz] = $deadline['d' . count($deadline)]['date_create'];
          $zz++;
        }
  
        $deadlineDate = array();
        for ($xx = 0; $xx < count($dateCreate); $xx++) {
          foreach ($dateCreate[$xx] as $key => $val) {
            if ($dateCreate[$xx][$key] == 0) {
              unset($dateCreate[$xx][$key]);
            }
    
            if ($dateCreate[$xx] == array()) {
              $dateCreate[$xx] = ['-'];
            }
            
          }
          //sort
          sort($dateCreate[$xx]);

          if ($dateCreate[$xx][0] != '-') {
            $startCreate = date('d M Y', strtotime($dateCreate[$xx][0]));
          } else {
            $startCreate = '-';
          }

          if ($dateCreate[$xx][(count($dateCreate[$xx]) - 1)] != '-') {
            $endCreate = date('d M Y', strtotime($dateCreate[$xx][(count($dateCreate[$xx]) - 1)]));
          } else {
            $endCreate = '-';
          }

          $deadlineDate[] = [
            'start' => $startCreate,
            'end' => $endCreate
          ];
        }
      }

      $render = array();
      for ($p = 0; $p < count($deadlineDate); $p++) {
        $render[] = [
          'title' => $title[$p],
          'coadmin' => $coadminName[$p],
          'leader' => $leaderName[$p],
          'crew'  => $crewRows[$p],
          'subjob'  => $subjobRows[$p],
          'create'  => $date[$p],
          'jobId' => $jobId[$p],
          'dateStart'  => $deadlineDate[$p]['start'],
          'dateEnd' => $deadlineDate[$p]['end'],
          'note'  => $note[$p]
        ];
      }

    }
    
    return $render;
  }

  /**
  * @param get jobId
  */
  public function duplicate_job($jobId) {
    $query = $this->db->query("SELECT id, title, crew, leader, coadmin
                                    FROM job 
                                    WHERE id = $jobId")->row_array();

    $title = $query['title'];
    $crew = json_decode($query['crew'], true);

    // name array 
    $queryName = "SELECT id, name
                        FROM ac_payroll_item 
                        WHERE is_active >= 0";

    $resultName = $this->database->getData($queryName, 'we')->result();

    $nameArray = array();
    foreach ($resultName as $n) {
      $nameArray['n' . $n->id] = $n->name;
    }

    //crew
    for ($i = 0; $i < count($crew); $i++) {
      $queryPt = "SELECT office 
                        FROM ac_payroll_item 
                        WHERE id = $crew[$i]";
      $resultPt = $this->database->getData($queryPt, 'we')->result();

      //crew name 
      if (isset ($nameArray['n' . $crew[$i]])) {
        $crewName[] = $nameArray['n' . $crew[$i]];
      } else {
        $crewName[] = '-';
      }

      // $crewFormat = array();
      foreach ($resultPt as $row) {
        $pt[] = $row->office;
      } 

      $crewFormat[] = [
        'idUser'  => $crew[$i],
        'name' => $crewName[$i],
        'idPt'  => $pt[$i]
      ];
    }


    //leader 
    $leader = $query['leader'];
    if (isset ($nameArray['n' . $leader])) {
      $fullLeader = $nameArray['n' . $leader];
      $expLeader = explode(' ', $fullLeader);
      $leaderName = $expLeader[0];
    } else {
      $leaderName = '-';
    }
    $leaderFormat = [
      'idUser'  => $leader,
      'name' => $leaderName
    ];

    //coadmin
    $coadmin = $query['coadmin'];
    if ($coadmin != '' || $coadmin != 0) {
      if (isset ($nameArray['n' . $coadmin])) {
        $fullCoadmin = $nameArray['n' . $coadmin];
        $expCoadmin = explode(' ', $fullCoadmin);
        $coadminName = $expCoadmin[0];
      } else {
        $coadminName = '-';
      }
      $coadminFormat = [
        'idUser'  => $coadmin,
        'name'  => $coadminName
      ];
    } else {
      $coadminFormat = array();
    }

    //create template jobGroup
    $newJob = $this->saveTemplateGroupJob('new');

    //data 
    $format = [
      'title' => $title,
      'crew'  => $crewFormat,
      'leader' => $leaderFormat,
      'coadmin' => $coadminFormat,
      'jobId' => $newJob
    ];

    $data = [
      'data'  => $format,
      'status'  => 200
    ];

    echo json_encode($data);
  }
  // end of function duplicate job

  /**
  * @param post note_deactivate 
  * @param post jobId
  */
  public function action_view() {
    $action = $_POST['action'];

    if ($action == 1) {
      $note = $_POST['note_deactivate'];
    } else {
      $note = '';
    }

    $jobId = $_POST['jobId'];
    $userId = $_POST['userId'];
    $param = 'action';

    if ($note != '') {
      $dataUpdate = [
        'note_deactivate' => $note,
        'role'  => 13
      ];
    } else if ($note == '') {
      //reactivate job 
      $dataUpdate = [
        'role'  => 1
      ];
    }

    $this->db->where('id', $jobId);
    $this->db->update('job', $dataUpdate);

    //get respon 
    $respon = $this->view_detail($userId, $param);

    $format = $respon;
    $format['status'] = 200;
    echo json_encode($format);

  }
  // end of function action view

  public function param_notif() {
    $token = 'faOKmo39Rkq_Gehs16p0cI:APA91bFeBy7cUgBcU2mYZSfj2gV-qawXwwMl2rlU3Szk3AiM8m178Dv0wfMXC8bMcxsBKtiJVNL671G612abUmKrL6zp66efcLuj5lDUYRhJ85RxZkwUNks1OaHOKfhLGE5Vv9R_rqkZ';

    $this->push_notification($token);
  }

  public function push_notification($token) {
    $curl = curl_init();

    $userToken = $token;
    $pathHeader = 'key=AAAAhbg6xig:APA91bFwlqAkocily_VSDrcXkPnaRTbu4Yo9pG2DIm_LXFhsbN38LYOW_5fc7tFHv70rFfYqmEu3CifD8oeD6tPoEgUuhWFS1lAX3bwl6x1Z6jG5SeRJAEEe8Vkx62HascBleXy5PZ0v';

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
      "registration_ids": ["faOKmo39Rkq_Gehs16p0cI:APA91bFeBy7cUgBcU2mYZSfj2gV-qawXwwMl2rlU3Szk3AiM8m178Dv0wfMXC8bMcxsBKtiJVNL671G612abUmKrL6zp66efcLuj5lDUYRhJ85RxZkwUNks1OaHOKfhLGE5Vv9R_rqkZ"],
      "notification": {
          "title":"Ansena Job",
          "body":"Job Baru"
      }
    }',
      CURLOPT_HTTPHEADER => array(
        'Content-type: application/json',
        'Authorization: ' . $pathHeader
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  // ############################################### showing data ############################################# //

  public function show_data($table) {

    $query = $this->db->query("SELECT * FROM $table")->result();

    echo json_encode($query);
  }

  public function deleteData($table, $where) {

    $this->db->query("DELETE FROM $table WHERE id = $where");
  }

  public function show_payroll_list() {
    $query = "SELECT username, password, name, id FROM ac_payroll_item";
    $result = $this->database->getData($query, 'we')->result();

    echo json_encode($result);
  }

  public function show_detail_user($id) {
    $query = "SELECT username, password FROM ac_payroll_item WHERE id = $id";
    $result = $this->database->getData($query, 'we')->row_array();

    $passwordDb = $this->encryption->decrypt($result['password']);

    $data = [
      'username'  => $result['username'],
      'password'  => $passwordDb
    ];

    echo json_encode($data);
  }

  public function edit_db() {
    $data = [
      'role'  => '0'
    ];

    $this->db->where('id', '7');
    $this->db->update('job', $data);
  }

  public function truncate($table) {
    $this->db->truncate($table);
  }

  public function deadline($userId) {
    $a = $this->input->get('a');
    $b = $this->input->get('b');
    $bmin = $this->input->get('bmin');
    $bmax = $this->input->get('bmax');
    $cmin = $this->input->get('cmin');
    $cmax = $this->input->get('cmax');
    $d = $this->input->get('d');
    $emin = $this->input->get('emin');
    $emax = $this->input->get('emax');
    $f = $this->input->get('f');
    $g = $this->input->get('g');

    // #################################################### get sorting #################################################### //

    $as = $this->input->get('as');
    $bs = $this->input->get('bs');
    $cs = $this->input->get('cs');
    $ds = $this->input->get('ds');
    $es = $this->input->get('es');

    // #################################################### end get sorting #################################################### //

    if ($a != '') {
      switch ($a) {
        case '1':
          $wherea = ' AND j.role >= 0';
          $queryStatus = 'all';
          $wheregroup = ' GROUP BY sj.id_title';
          break;

        case '2': 
          $wherea = ' AND j.role = 1';
          $queryStatus = 'active';
          $wheregroup = ' GROUP BY sj.id_title';
          break;
        
        case '3':
          $wherea = ' AND j.role = 0';
          $queryStatus = 'inactive';
          $wheregroup = ' GROUP BY sj.id_title';
          break;

        case '4':
          $wherea = ' AND j.role = 13';
          $queryStatus = 'deactivate';
          $wheregroup = ' GROUP BY sj.id_title';
          break;

        default:
          $wherea = '';
          $queryStatus = 'all';
          $wheregroup = ' GROUP BY sj.id_title';
          break;
      }
    } else {
      $wheregroup = ' GROUP BY sj.id_title';
      $queryStatus = 'all';
      $wherea = '';
    }

    if ($b == 1) {
      $whereb = ' AND sj.status >= 0';
      $wheregroup = ' GROUP BY sj.id_title';
    } else if ($b == 2) {
      $whereb = ' AND sj.status >= 1';
      $wheregroup = ' GROUP BY sj.id_title';
    } else if ($b == '') {
      $whereb = '';
      $wheregroup = ' GROUP BY sj.id_title';
    }

    if ($bmin != '' && $bmax != '') {
      $wheregroup = ' GROUP BY sj.id_title';
      $wherebmin = '';
      $wherebmax = " HAVING COUNT(sj.id_title) >= $bmin AND COUNT(sj.id_title) <= $bmax";
    } else if ($bmin != '') {
      $wheregroup = ' GROUP BY sj.id_title';
      $wherebmin = ' HAVING COUNT(sj.id_title) >= ' . $bmin;
      $wherebmax = '';
    } else if ($bmax != '') {
      $wheregroup = ' GROUP BY sj.id_title';
      $wherebmax = ' HAVING COUNT(sj.id_title) <= ' . $bmax;
      $wherebmin = '';
    } else  if ($bmax == '' || $bmin == '') {
      $wheregroup = ' GROUP BY sj.id_title';
      $wherebmax = '';
      $wherebmin = '';
    }

    if ($cmin != '') {
      $wherecmin = " AND JSON_UNQUOTE(JSON_EXTRACT(sj.deadline, '$.d1.date_create')) >= '$cmin 09:00'";
      $wherecmax = '';
    } else if ($cmax != '') {
      $wherecmax = " AND JSON_UNQUOTE(JSON_EXTRACT(sj.deadline, '$.d1.date_create')) <= '$cmax 09:00'";
      $wherecmin = '';
    } else if ($cmin != '' && $cmax != '') {
      $wherecmax =  " AND JSON_UNQUOTE(JSON_EXTRACT(sj.deadline, '$.d1.date_create')) >= '$cmin 09:00'  AND JSON_UNQUOTE(JSON_EXTRACT(sj.deadline, '$.d1.date_create')) <= '$cmax 09:00'";
      $wherecmin = '';
    } else if ($cmin == '' && $cmax == '') {
      $wherecmin = '';
      $wherecmax = '';
    }

    if ($d != '') {
      $whered = " AND j.coadmin = $d";
      $wheregroup = ' GROUP BY sj.id_title';
    } else {
      $wheregroup = ' GROUP BY sj.id_title';
      $whered = '';
    }

    if ($emin != '' && $emax != '') {
      $whereemax = " HAVING JSON_LENGTH(crew) >= $emin AND JSON_LENGTH(crew) <= $emax";
      $whereemin = '';
    } else if ($emin != '') {
      $whereemin = " HAVING JSON_LENGTH(crew) >= $emin";
      $whereemax = '';
    } else if ($emax != '') {
      $whereemax = " HAVING JSON_LENGTH(crew) <= $emax";
      $whereemin = '';
    } else {
      $whereemax = '';
      $whereemin = '';
    }

    if ($f != '') {
      $expf = explode(',' , $f);
      for ($f = 0; $f < count($expf); $f++) {
        $wheref = " AND JSON_CONTAINS(j.pt, JSON_QUOTE('$expf[$f]'), '$') = 1";
      }
    } else {
      $wheref = '';
    }

    if ($g != '') {
      $whereg = " AND j.leader = $g";
    } else {
      $whereg = '';
    }

    if ($as  == 1) {
      $sorta = " ORDER BY j.title DESC";
    } else if ($as == 2) {
      $sorta = " ORDER BY j.title ASC";
    } else {
      $sorta = '';
    }

    if ($bs == 1) {
      $sortb = " ORDER BY date DESC";
    } else if ($bs == 2) {
      $sortb = " ORDER BY date ASC";
    } else {
      $sortb = '';
    }

    if ($cs == 1) {
      $sortc = " ORDER BY JSON_LENGTH(j.crew) DESC";
    } else if ($cs == 2) {
      $sortc = " ORDER BY JSON_LENGTH(j.crew) ASC";
    } else {
      $sortc = '';
    }

    if ($ds == 1) {
      $sortd = " ORDER BY COUNT(sj.id_title) DESC";
    } else if ($ds == 2) {
      $sortd = " ORDER BY COUNT(sj.id_title) ASC";
    } else {
      $sortd = '';
    }

    //condition user 
    $queryUser = $this->db->query("SELECT admin, coadmin FROM job WHERE role IS NOT null")->result();
    foreach ($queryUser as $rr) {
      $uAdmin[] = $rr->admin;
      $uCoadmin[] = $rr->coadmin;
    }

    for ($i = 0; $i < count($uAdmin); $i++) {
      if ($userId == $uAdmin[$i]) {
        $whereUser[] = ' AND j.admin = ' . $userId;
      } else if ($userId == $uCoadmin[$i]) {
        $whereUser[] = ' AND j.coadmin = ' . $userId;
      } else if ($userId != $uAdmin[$i] && $userId != $uCoadmin[$i]) {
        $whereUser[] = ' AND j.admin = ' . $userId;
      }
    }

    $newWhere= array_unique(array_values(array_filter($whereUser)));

    $queryActive = $this->db->query('SELECT j.crew, j.leader, j.coadmin, j.title, j.id AS jobId, sj.id, j.date, j.note_deactivate, JSON_UNQUOTE(JSON_EXTRACT(sj.deadline, "$.d1.date_create")) AS deadline, sj.id_title AS idTitle
                                        FROM job j, subjob sj
                                        WHERE j.id = sj.id_title
                                        AND j.role = 1'
                                        . $newWhere[0]
                                        . $wherea 
                                        . $whereb 
                                        . $wherecmin
                                        . $wherecmax
                                        . $whered
                                        . $wheref
                                        . $whereg
                                        . $wheregroup
                                        . $whereemin 
                                        . $whereemax
                                        . $wherebmin 
                                        . $wherebmax
                                        . $sorta
                                        . $sortb
                                        . $sortc
                                        . $sortd);

    $queryInactive = $this->db->query('SELECT j.crew, j.leader, j.coadmin, j.title, j.id AS jobId, sj.id, j.date, j.note_deactivate, JSON_UNQUOTE(JSON_EXTRACT(sj.deadline, "$.d1.date_create")) AS deadline, sj.id_title AS idTitle
                                        FROM job j, subjob sj
                                        WHERE j.id = sj.id_title
                                        AND j.role = 0'
                                        . $newWhere[0]
                                        . $wherea 
                                        . $whereb 
                                        . $wherecmin
                                        . $wherecmax
                                        . $whered
                                        . $wheref
                                        . $whereg
                                        . $wheregroup
                                        . $whereemin 
                                        . $whereemax
                                        . $wherebmin 
                                        . $wherebmax
                                        . $sorta
                                        . $sortb
                                        . $sortc
                                        . $sortd);

    $queryDeactivate = $this->db->query('SELECT j.crew, j.leader, j.coadmin, j.title, j.id AS jobId, sj.id, j.date, j.note_deactivate, JSON_UNQUOTE(JSON_EXTRACT(sj.deadline, "$.d1.date_create")) AS deadline, sj.id_title AS idTitle
                                        FROM job j, subjob sj
                                        WHERE j.id = sj.id_title
                                        AND j.role = 13'
                                        . $newWhere[0]
                                        . $wherea 
                                        . $whereb 
                                        . $wherecmin
                                        . $wherecmax
                                        . $whered
                                        . $wheref
                                        . $whereg
                                        . $wheregroup
                                        . $whereemin 
                                        . $whereemax
                                        . $wherebmin 
                                        . $wherebmax
                                        . $sorta
                                        . $sortb
                                        . $sortc
                                        . $sortd);

    if ($queryActive->num_rows() > 0) {
      $renderActive = $this->render_detail($queryActive);
    } else {
      $renderActive = array();
    }

    if ($queryInactive->num_rows() > 0) {
      $renderInactive = $this->render_detail($queryInactive);
    } else {
      $renderInactive = array();
    }

    if ($queryDeactivate->num_rows() > 0) {
      $renderDeactivate = $this->render_detail($queryDeactivate);
    } else {
      $renderDeactivate = array();
    }

    if ($queryStatus == 'active') {
      $format['data'] = [
        'active' => $renderActive,
        'inactive'  => array(),
        'deactivate'  => array()
      ];
    } else if ($queryStatus == 'inactive') {
      $format['data'] = [
        'inactive' => $renderInactive,
        'active'  => array(),
        'deactivate'  => array()
      ];
    } else if ($queryStatus == 'deactivate') {
      $format['data'] = [
        'deactivate' => $renderDeactivate,
        'active'  => array(),
        'inactive'  => array()
      ];
    } else if ($queryStatus == 'all') {
      $format['data'] = [
        'active' => $renderActive,
        'inactive'  => $renderInactive,
        'deactivate'  => $renderDeactivate
      ];                                 
    }

    echo json_encode($format);
  }

  public function render_backup($result) {
    $queryName = "SELECT id, name 
                        FROM ac_payroll_item 
                        WHERE is_active = 1";

    $nameArray = array();
    $resultName = $this->database->getData($queryName, 'we');

    foreach ($resultName->result() as $r) {
      $nameArray['n' . $r->id] = $r->name;
    }

    foreach ($result->result() as $row) {
      $querySubjob = $this->db->query("SELECT subjob, deadline, status, approval
                                                FROM subjob 
                                                WHERE id = $row->id_title")->result();                                                

      // id 
      $jobId = $row->jobId;
      $idITitleSubjob[]= $row->jobId;

      //date 
      $date = date('d M Y', strtotime($row->date));

      //leader 
      if (isset($nameArray['n' . $row->leader])) {
        $fullLeader = $nameArray['n' . $row->leader];
        $splitLeader = explode(' ', $fullLeader);
        $leaderName = $splitLeader[0];
      } else {
        $leaderName = '-';
      }

      //subjob rows 
      $subjobAll = $this->db->query("SELECT id 
                                            FROM subjob 
                                            WHERE id_title = $row->id_title")->num_rows();

      $subjobActive = $this->db->query("SELECT id 
                                            FROM subjob 
                                            WHERE status > 0
                                            AND id_title = $row->id_title")->num_rows();

      $subjobRows = $subjobAll . ' (' . $subjobActive . ' active )';
      //rows crew 
      $crew = json_decode($row->crew, true);
      if (count($crew) == 1) {
        $crewRows = count($crew) . ' Crew';
      } else {
        $crewRows = count($crew) . ' Crews';
      }

      // coadmin name
      $coadmin  = $row->coadmin;

      if ($coadmin == 0) {
        $coadminName = '-';
      } else {
        if (isset($nameArray['n' . $coadmin])) {
          $fullCoadmin = $nameArray['n' . $coadmin];
          $splitCoadmin = explode(' ', $fullCoadmin);
          $coadminName = $splitCoadmin[0];
        }
      }

      for ($i = 0; $i < count($idITitleSubjob); $i++) {
        $q = $this->db->query("SELECT id, deadline FROM subjob WHERE id_title = $idITitleSubjob[$i]")->result();
        $zz = 0;
        foreach ($q as $qq) {
          $deadline = json_decode($qq->deadline, true);
          $dateCreate[$i][$zz] = $deadline['d' . count($deadline)]['date_create'];
          $zz++;
        }
  
        $deadlineDate = array();
        for ($xx = 0; $xx < count($dateCreate); $xx++) {
          foreach ($dateCreate[$xx] as $key => $val) {
            if ($dateCreate[$xx][$key] == 0) {
              unset($dateCreate[$xx][$key]);
            }
    
            if ($dateCreate[$xx] == array()) {
              $dateCreate[$xx] = ['-'];
            }
            
          }
          //sort
          sort($dateCreate[$xx]);

          if ($dateCreate[$xx][0] != '-') {
            $startCreate = date('d M Y', strtotime($dateCreate[$xx][0]));
          } else {
            $startCreate = '-';
          }

          if ($dateCreate[$xx][(count($dateCreate[$xx]) - 1)] != '-') {
            $endCreate = date('d M Y', strtotime($dateCreate[$xx][(count($dateCreate[$xx]) - 1)]));
          } else {
            $endCreate = '-';
          }

          $deadlineDate[] = [
            'start' => $startCreate,
            'end' => $endCreate
          ];
        }
      }

      $render = array();
      for ($p = 0; $p < count($deadlineDate); $p++) {
        $render[] = [
          'title' => $row->title,
          'status'  => $row->status,
          'coadmin' => $coadminName,
          'leader' => $leaderName,
          'crew'  => $crewRows,
          'subjob'  => $subjobRows,
          'create'  => $date,
          'jobId' => $jobId,
          'dateStart'  => $deadlineDate[$p]['start'],
          'dateEnd' => $deadlineDate[$p]['end']
        ];
      }

    }

    return $render;
  }

  public function search_user($user) {
    $query = "SELECT * FROM ac_payroll_item WHERE name LIKE '%$user%'";
    $result = $this->database->getData($query, 'we')->result();

    echo json_encode($result);
  }

  // ############################################### end showing data ############################################# //

}
