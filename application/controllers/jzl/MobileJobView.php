<?php
defined('BASEPATH') or exit('No direct script allowed');

class MobileJobView extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('mzl/Main_model', 'database');
    backButtonHandle();
  }

  public function index()
  {
    $this->load->view('vzl/view/index');
  }

  public function getActiveJob()
  {
    $idMaster = $_SESSION['id'];
    $sort = $this->input->post('sort');
    $isAdmin = $_SESSION['isAdmin'];
    $isCoadmin = $_SESSION['isCoadmin'];

    $db = 'default';

    if ($isAdmin == 1 && $isCoadmin == 0) {

      $whereSelect = '';
    } else if ($isAdmin = 1 && $isCoadmin == 1 || $isAdmin == 0 && $isCoadmin != 1) {

      $whereSelect = " AND coadmin = $idMaster";
    }

    if ($sort == '') {
      $queryJob = "SELECT title, crew, leader, coadmin, date, id
                        FROM job
                        WHERE role = 1
                        $whereSelect";
    } else if ($sort > 0 && $sort < 5) {

      if ($sort == 1) {
        $sortOption = 'title ASC';
      } else if ($sort == 2) {
        $sortOption = 'date ASC';
      } else if ($sort == 3) {
        $sortOption = 'JSON_LENGTH(crew) ASC';
      } else if ($sort == 4) {
        $sortOption = 'subjob_rows ASC';
      }

      $queryJob = "SELECT title, crew, leader, coadmin, date, id
                        FROM job
                        WHERE role = 1
                        . $whereSelect
                        ORDER BY $sortOption";
    } else if ($sort == 5) {
      $queryJob = "SELECT JSON_UNQUOTE(JSON_EXTRACT(deadline, '$.d1.date_create')) AS deadline, title, crew, leader, coadmin, date, subjob.id
                        FROM subjob
                        JOIN job
                        ON job.id = subjob.id_title
                        WHERE role = 1
                        $whereSelect
                        GROUP BY job.id
                        ORDER BY deadline ASC";
    } else {
      $queryJob = $sort;
    }

    $masterJob = $this->database->getData($queryJob, $db);


    if ($masterJob->num_rows() > 0) {
      foreach ($masterJob->result() as $row) {
        $title[] = $row->title;
        $crew[] = json_decode($row->crew, true);
        $leader[] = $row->leader;
        $coadmin[] = $row->coadmin;
        $date[] = $row->date;
        $idTitle[] = $row->id;
      }

      for ($i = 0; $i < count($idTitle); $i++) {
        $this->db->select('deadline, id');
        $this->db->where('id_title', $idTitle[$i])
          ->where('status >', 0);
        $querySubjob = $this->db->get('subjob');

        foreach ($querySubjob->result() as $r) {
          $deadline[] = json_decode($r->deadline, true);
          $idSubjob[] = $r->id;
        }

        //date short
        $dateFull[] = date('d M Y', strtotime($date[$i]));
        $dateShort[] = date('d M', strtotime($date[$i]));

        //all subjobs
        $this->db->select('id');
        $this->db->where('id_title', $idTitle[$i])
          ->where('status >=', 0);
        $queryAll = $this->db->get('subjob');
        $allSubjob[] = $queryAll->num_rows();

        //active Subjobs
        $activeSubjob[] = $querySubjob->num_rows();

        //name array
        $queryName = "SELECT id, name FROM ac_payroll_item WHERE is_active = 1";
        $resultName = $this->database->getData($queryName, 'we')->result();

        $nameArray = array();
        foreach ($resultName as $r) {
          $nameArray['n' . $r->id] = $r->name;
        }

        //leader
        if (isset($nameArray['n' . $leader[$i]])) {
          $leaderName = $nameArray['n' . $leader[$i]];
          $expLeader = explode(' ', $leaderName);
          $leaderFix[] = $expLeader[0];
        }

        //coadmin
        if ($coadmin[$i] != '' || $coadmin[$i] != 0) {
          if (isset($nameArray['n' . $coadmin[$i]])) {
            $coadminName = $nameArray['n' . $coadmin[$i]];
            $expCoadmin = explode(' ', $coadminName);
            $coadminFix[] = $expCoadmin[0];
          }
        } else {
          $coadminFix[] = 'None';
        }

        //crew
        $crewFix[] = count($crew[$i]);
      }
      for ($x = 0; $x < count($deadline); $x++) {
        $lastCreate[] = $deadline[$x]['d' . count($deadline[$x])]['date_create'];
        $lastRevise[] = $deadline[$x]['d' . count($deadline[$x])]['date_revision'];

        if ($lastCreate[$x] == 0) {
          if ($lastRevise[$x] == 0) {
            $deadlineFix[] = 'No deadline';
          } else {
            $expRevise = explode(' ', $lastRevise[$x]);
            $deadlineFix[] = date('d M', strtotime($expRevise[0]));
          }
        } else {
          $expCreate = explode(' ', $lastCreate[$x]);
          $deadlineFix[] = date('d M', strtotime($expCreate[0]));
        }
      }
    } else {
      $title[] = 0;
      $crewFix[] = 0;
      $leaderFix[] = 0;
      $coadminFix[] = 0;
      $date[] = 0;
      $idTitle[] = 0;
      $deadlineFix[] = 0;
      $activeSubjob[] = 0;
      $allSubjob[] = 0;
      $idSubjob[] = 0;
      $dateFull[] = 0;
      $dateShort[] = 0;
    }

    $data['crew'] = $crewFix;
    $data['leader'] = $leaderFix;
    $data['coadmin'] = $coadminFix;
    $data['dateFull'] = $dateFull;
    $data['dateShort'] = $dateShort;
    $data['deadline'] = $deadlineFix;
    $data['idJob'] = $idTitle;
    $data['title'] = $title;
    $data['result'] = $masterJob->num_rows();
    $data['active'] = $activeSubjob;
    $data['all'] = $allSubjob;
    $data['idSubjob'] = $idSubjob;

    echo json_encode($data);
  }

  public function getDeactivateJob()
  {
    $sort = $this->input->post('sort');
    $idMaster = $_SESSION['id'];
    $isAdmin = $_SESSION['isAdmin'];
    $isCoadmin = $_SESSION['isCoadmin'];

    $db = 'default';

    if ($isAdmin == 1 && $isCoadmin == 0) {

      $whereSelect = '';
    } else if ($isAdmin = 1 && $isCoadmin == 1 || $isAdmin == 0 && $isCoadmin != 1) {

      $whereSelect = " AND coadmin = $idMaster";
    }

    if ($sort == '') {
      $queryJob = "SELECT title, crew, leader, coadmin, date, id, note_deactivate
                        FROM job
                        WHERE role = 13
                        $whereSelect";
    } else if ($sort > 0 && $sort < 5) {

      if ($sort == 1) {
        $sortOption = 'title ASC';
      } else if ($sort == 2) {
        $sortOption = 'date ASC';
      } else if ($sort == 3) {
        $sortOption = 'JSON_LENGTH(crew) ASC';
      } else if ($sort == 4) {
        $sortOption = 'subjob_rows ASC';
      }

      $queryJob = "SELECT title, crew, leader, coadmin, date, id, note_deactivate
                        FROM job
                        WHERE role = 13
                        $whereSelect
                        ORDER BY $sortOption";
    } else if ($sort == 5) {
      $queryJob = "SELECT JSON_UNQUOTE(JSON_EXTRACT(deadline, '$.d1.date_create')) AS deadline, title, crew, leader, coadmin, date, subjob.id
                            FROM subjob
                            JOIN job
                            ON job.id = subjob.id_title
                            WHERE role = 13
                            $whereSelect
                            GROUP BY job.id
                            ORDER BY deadline ASC";
    } else {
      $queryJob = $sort;
    }
    $masterJob = $this->database->getData($queryJob, $db);


    if ($masterJob->num_rows() > 0) {
      foreach ($masterJob->result() as $row) {
        $title[] = $row->title;
        $crew[] = json_decode($row->crew, true);
        $leader[] = $row->leader;
        $coadmin[] = $row->coadmin;
        $date[] = $row->date;
        $idTitle[] = $row->id;
        $noteDeactivate[] = $row->note_deactivate;
      }

      for ($i = 0; $i < count($idTitle); $i++) {
        $this->db->select('deadline, id');
        $this->db->where('id_title', $idTitle[$i])
          ->where('status >', 0);
        $querySubjob = $this->db->get('subjob');

        foreach ($querySubjob->result() as $r) {
          $deadline[] = json_decode($r->deadline, true);
          $idSubjob[] = $r->id;
        }

        //date short
        $dateFull[] = date('d M Y', strtotime($date[$i]));
        $dateShort[] = date('d M', strtotime($date[$i]));

        //all subjobs
        $this->db->select('id');
        $this->db->where('id_title', $idTitle[$i])
          ->where('status >=', 0);
        $queryAll = $this->db->get('subjob');
        $allSubjob[] = $queryAll->num_rows();

        //active Subjobs
        $activeSubjob[] = $querySubjob->num_rows();

        //name array
        $queryName = "SELECT id, name FROM ac_payroll_item WHERE is_active = 1";
        $resultName = $this->database->getData($queryName, 'we')->result();

        $nameArray = array();
        foreach ($resultName as $r) {
          $nameArray['n' . $r->id] = $r->name;
        }

        //leader
        if (isset($nameArray['n' . $leader[$i]])) {
          $leaderName = $nameArray['n' . $leader[$i]];
          $expLeader = explode(' ', $leaderName);
          $leaderFix[] = $expLeader[0];
        }

        //coadmin
        if ($coadmin[$i] != '' || $coadmin[$i] != 0) {
          if (isset($nameArray['n' . $coadmin[$i]])) {
            $coadminName = $nameArray['n' . $coadmin[$i]];
            $expCoadmin = explode(' ', $coadminName);
            $coadminFix[] = $expCoadmin[0];
          }
        } else {
          $coadminFix[] = 'None';
        }

        //crew
        $crewFix[] = count($crew[$i]);
      }
      for ($x = 0; $x < count($deadline); $x++) {
        $lastCreate[] = $deadline[$x]['d' . count($deadline[$x])]['date_create'];
        $lastRevise[] = $deadline[$x]['d' . count($deadline[$x])]['date_revision'];

        if ($lastCreate[$x] == 0) {
          if ($lastRevise[$x] == 0) {
            $deadlineFix[] = 'No deadline';
          } else {
            $expRevise = explode(' ', $lastRevise[$x]);
            $deadlineFix[] = date('d M', strtotime($expRevise[0]));
          }
        } else {
          $expCreate = explode(' ', $lastCreate[$x]);
          $deadlineFix[] = date('d M', strtotime($expCreate[0]));
        }
      }
    } else {
      $title[] = 0;
      $crewFix[] = 0;
      $leaderFix[] = 0;
      $coadminFix[] = 0;
      $date[] = 0;
      $idTitle[] = 0;
      $deadlineFix[] = 0;
      $activeSubjob[] = 0;
      $allSubjob[] = 0;
      $idSubjob[] = 0;
      $dateFull[] = 0;
      $dateShort[] = 0;
      $noteDeactivate[] = 0;
    }

    $data['crew'] = $crewFix;
    $data['leader'] = $leaderFix;
    $data['coadmin'] = $coadminFix;
    $data['dateFull'] = $dateFull;
    $data['dateShort'] = $dateShort;
    $data['deadline'] = $deadlineFix;
    $data['idJob'] = $idTitle;
    $data['title'] = $title;
    $data['result'] = $masterJob->num_rows();
    $data['active'] = $activeSubjob;
    $data['all'] = $allSubjob;
    $data['idSubjob'] = $idSubjob;
    $data['noteDeactivate'] = $noteDeactivate;

    echo json_encode($data);
  }

  public function deactivateJob()
  {
    $idJob = $this->input->post('idJob');
    $idSubjob = $this->input->post('idSubjob');
    $note = $this->input->post('note');

    //update job
    $dataJob = [
      'role' => 13,
      'note_deactivate' => $note
    ];

    $this->db->where('id', $idJob);
    $this->db->update('job', $dataJob);

    $data['message'] = 'success';

    echo json_encode($data);
  }

  public function reactivateJob()
  {
    $idJob = $this->input->post('idJob');
    $idSubjob = $this->input->post('idSubjob');

    $dataJob = [
      'role'  => 1
    ];

    $this->db->where('id', $idJob);
    $this->db->update('job', $dataJob);

    echo 'success';
  }

  public function getInactiveJob($key = '')
  {
    $db = 'default';
    $dbSecondary = 'we';
    $idMaster = $_SESSION['id'];
    $isAdmin = $_SESSION['isAdmin'];
    $isCoadmin = $_SESSION['isCoadmin'];

    if ($isAdmin == 1 && $isCoadmin == 0) {

      $whereSelect = '';
    } else if ($isAdmin = 1 && $isCoadmin == 1 || $isAdmin == 0 && $isCoadmin != 1) {

      $whereSelect = " AND coadmin = $idMaster";
    }

    if ($key == '') {

      $query = "SELECT crew, leader, coadmin, date, id, title
                  FROM job
                  WHERE role = 0
                  $whereSelect";
    }

    $result = $this->database->getData($query, $db);
    $jobRows = $result->num_rows();

    if ($result->num_rows() > 0) {

      foreach ($result->result() as $row) {
        $crew[] = json_decode($row->crew, true);
        $leader[] = $row->leader;
        $coadmin[] = $row->coadmin;
        $date[] = $row->date;
        $idTitle[] = $row->id;
        $title[] = $row->title;
      }

      //name array
      $queryName = "SELECT id, name FROM ac_payroll_item WHERE is_active = 1";
      $resultName = $this->database->getData($queryName, $dbSecondary);

      $nameArray = array();
      foreach ($resultName->result() as $r) {
        $nameArray['n' . $r->id] = $r->name;
      }

      for ($i = 0; $i < count($idTitle); $i++) {

        //leader
        if (isset($nameArray['n' . $leader[$i]])) {
          $leaderName = $nameArray['n' . $leader[$i]];
          $expLeader = explode(' ', $leaderName);
          $leaderFix[] = $expLeader[0];
        }

        //coadmin
        if ($coadmin[$i]  != '') {
          if (isset($nameArray['n' . $coadmin[$i]])) {
            $coadminName = $nameArray['n' . $coadmin[$i]];
            $expCoadmin = explode(' ', $coadminName);
            $coadminFix[] = $expCoadmin[0];
          }
        } else {
          $coadminFix[] = 'None';
        }

        //crew
        $crewFix[] = count($crew[$i]);

        //date
        $dateFull[] = date('d M Y', strtotime($date[$i]));
        $dateShort[] = date('d M', strtotime($date[$i]));

        //subjob
        $this->db->select('deadline, id');
        $this->db->from('subjob');
        $this->db->where('id_title', $idTitle[$i]);
        $resultSubjob = $this->db->get();
        $subjobRows[] = $resultSubjob->num_rows();

        foreach ($resultSubjob->result() as $w) {
          $deadline[] = json_decode($w->deadline, true);
          $idSubjob[] = $w->id;
        }

        $dateCreate = array();
        for ($x = 0; $x < count($deadline); $x++) {
          $dateCreate[] = $deadline[$x]['d' . count($deadline[$x])]['date_create'];
          $dateRevise[] = $deadline[$x]['d' . count($deadline[$x])]['date_revision'];
        }

        $deadlineFix = array();
        for ($y = 0; $y < count($dateCreate); $y++) {
          if ($dateCreate[$y] == 0) {
            if ($dateRevise[$y] == 0) {
              $deadlineFix[] = 'none';
            } else {
              $expRevise = explode(' ', $dateRevise[$y]);
              $deadlineFix[] = date('d M', strtotime($expRevise[0]));
            }
          } else {
            $expCreate = explode(' ', $dateCreate[$y]);
            $deadlineFix[] = date('d M', strtotime($expCreate[0]));
          }
        }
      }
    } else {
      $subjobRows[] = 0;
      $crewFix[] = 0;
      $leaderFix[] = 0;
      $coadminFix[] = 0;
      $dateFull[] = 0;
      $dateShort[] = 0;
      $deadlineFix[] = 0;
      $jobRows = 0;
      $title[] = 0;
      $idTitle = 0;
      $idSubjob = 0;
    }

    $data['title'] = $title;
    $data['deadline'] = $deadlineFix;
    $data['dateFull'] = $dateFull;
    $data['dateShort'] = $dateShort;
    $data['coadmin'] = $coadminFix;
    $data['leader'] = $leaderFix;
    $data['crew'] = $crewFix;
    $data['subjobRows'] = $subjobRows;
    $data['result'] = $jobRows;
    $data['idJob'] = $idTitle;
    $data['idSubjob'] = $idSubjob;


    echo json_encode($data);
  }

  public function duplicateJob()
  {
    $idJob = $this->input->post('idJob');
    $db = 'default';
    $dbSecondary = 'we';

    //get all data ini database
    $queryJob = "SELECT id, crew, title, leader, admin, coadmin, note_deactivate, date, subjob_rows
                FROM job
                WHERE id = $idJob";
    $resultJob = $this->database->getData($queryJob, $db)->row_array();

    $crew = json_decode($resultJob['crew'], true);
    $title = $resultJob['title'];
    $leader = $resultJob['leader'];
    $leaderArr[] = $resultJob['leader'];
    $admin = $resultJob['admin'];
    $coadmin = $resultJob['coadmin'];
    $noteDeactivate = $resultJob['note_deactivate'];
    $date = $resultJob['date'];
    $subjobRows = $resultJob['subjob_rows'];

    $querySubjob = "SELECT id, subjob, assessor, purpose
                    FROM subjob
                    WHERE id_title = $idJob";
    $resultSubjob = $this->database->getData($querySubjob, $db)->result();

    foreach ($resultSubjob as $r) {
      $idSubjob[] = $r->id;
      $subjob[] = $r->subjob;
      $purpose[] = $r->purpose;
    }

    //name array
    $queryName = "SELECT id, name FROM ac_payroll_item WHERE is_active = 1";
    $resultName = $this->database->getData($queryName, $dbSecondary)->result();

    $nameArray = array();
    foreach ($resultName as $name) {
      $nameArray['n' . $name->id] = $name->name;
    }

    //coadmin name
    if ($coadmin != '' || $coadmin != 0) {
      if (isset($nameArray['n' . $coadmin])) {
        $fCoadmin = $nameArray['n' . $coadmin];
        $expCoadmin = explode(' ', $fCoadmin);
        $coadminName = $expCoadmin[0];
      }
    } else {
      $coadminName = 0;
      $coadmin = 0;
    }

    //crew name
    for ($i = 0; $i < count($crew); $i++) {
      if (isset($nameArray['n' . $crew[$i]])) {
        $fCrew[] = $nameArray['n' . $crew[$i]];
      }
    }

    for ($x = 0; $x < count($fCrew); $x++) {
      $expCrew = explode(' ', $fCrew[$x]);
      $crewName[] = $expCrew[0];
    }

    //leader name
    if (isset($nameArray['n' . $leader])) {
      $fLeader = $nameArray['n' . $leader];
      $expLeader = explode(' ', $fLeader);
      $leaderName = $expLeader[0];
    }

    //modify leader id
    for ($u = 1; $u < count($crew); $u++) {
      array_push($leaderArr, 0);
    }

    $data['title'] = $title;
    $data['crew'] = $crew;
    $data['leader'] = $leader;
    $data['coadmin'] = $coadmin;
    $data['subjob'] = $subjob;
    $data['coadminName'] = $coadminName;
    $data['crewName'] = $crewName;
    $data['fullCrewName'] = $fCrew;
    $data['leaderName'] = $leaderName;
    $data['newLeader'] = $leaderArr;

    echo json_encode($data);
  }

  public function saveTemplateSubjob()
  {
    $numRows = $this->input->post('numRows');
    $subjob = $this->input->post('subjob');
    $idJob = $this->input->post('idJob');

    for ($i = 0; $i < $numRows; $i++) {
      $dataInput[] = [
        'subjob'  => $subjob[$i],
        'id_title'  => $idJob
      ];
    }

    $this->db->insert_batch('subjob', $dataInput);

    //get id subjob
    $query = "SELECT id FROM subjob WHERE id_title = $idJob";
    $result = $this->database->getData($query, 'default')->result();

    foreach ($result as $row) {
      $idSubjob[] = $row->id;
    }

    echo json_encode($idSubjob);
  }

  public function checkSortingDeadline()
  {
    $maxDate = $this->input->post('maxDate');
    $minDate = $this->input->post('minDate');

    if ($minDate == 0 && $maxDate == 0) {

      $message = 'fine';
    } else if ($minDate == 0 && $maxDate != 0) {

      $message = 'fine';
    } else if ($minDate != 0 && $maxDate == 0) {

      $message = 'fine';
    } else if ($minDate != 0 && $maxDate != 0) {

      //date diff
      $diff1 = date_create(date('Y-m-d', strtotime($maxDate)));
      $diff2 = date_create(date('Y-m-d', strtotime($minDate)));

      $resultDiff = date_diff($diff2, $diff1);

      if ($resultDiff->invert == 1) {

        $message = 'failed';
      } else {

        $message = 'fine';
      }
    }

    $data['message'] = $message;
    $data['maxDate'] = $maxDate;
    $data['minDate'] = $minDate;
    echo json_encode($data);
  }

  public function getCrew()
  {
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
    }

    $data['crew'] = $name;
    $data['pt'] = $ptName;
    $data['id'] = $idCrew;

    echo json_encode($data);
  }

  public function getPt()
  {
    $query = "SELECT id, fullname
              FROM ansena_department
              ORDER BY name ASC";
    $result = $this->database->getData($query, 'we');

    foreach ($result->result() as $row) {
      $ptName[] = $row->fullname;
      $idPt[] = $row->id;
    }

    $data['pt'] = $ptName;
    $data['id'] = $idPt;

    echo json_encode($data);
  }

  public function sortingData()
  {
    $activity = $this->input->post('activity');
    $subjobSort = $this->input->post('subjobSort');
    $minSubjob = $this->input->post('minSubjob');
    $maxSubjob = $this->input->post('maxSubjob');
    $minDeadline = $this->input->post('minDeadline');
    $maxDeadline = $this->input->post('maxDeadline');
    $coadmin = $this->input->post('coadmin');
    $minCrew = $this->input->post('minCrew');
    $maxCrew = $this->input->post('maxCrew');
    $pt = $this->input->post('realPt');
    $leader = $this->input->post('leader');
    $trigger = $this->input->post('trigger');

    $newMin = date('Y-m-d', strtotime($minDeadline));
    $newMax = date('Y-m-d', strtotime($maxDeadline));;


    if (empty($activity)) {

      $whereActivity = "";
    } else {

      if ($activity == 10) {

        $whereActivity = " AND role >= 0 ";
      } else {

        $whereActivity = " AND role = $activity";
      }
    }

    if (empty($subjobSort)) {

      $whereSubjob = "";
    } else {

      if ($subjobSort == 100) {

        $whereSubjob = " AND sj.status >= 0";
      } else {

        $whereSubjob = " AND j.role > 0 AND sj.status = $subjobSort";
      }
    }

    if (empty($coadmin)) {

      $whereCoadmin = "";
    } else {

      $whereCoadmin = " AND j.coadmin = $coadmin";
    }

    if (empty($minCrew) && empty($maxCrew)) {

      $whereCrew = "";
    } else if (empty($minCrew) && !empty($maxCrew)) {

      $whereCrew = " AND JSON_LENGTH(j.crew) <= $maxCrew";
    } else if (!empty($minCrew) && empty($maxCrew)) {

      $whereCrew = " AND JSON_LENGTH(j.crew) >= $minCrew";
    } else if (!empty($minCrew) && !empty($maxCrew)) {

      $whereCrew = " AND JSON_LENGTH(j.crew) >= $minCrew AND JSON_LENGTH <= $maxCrew)";
    }

    if (empty($leader)) {

      $whereLeader = "";
    } else {

      $whereLeader = " AND j.leader = $leader";
    }

    if (empty($minSubjob) && empty($maxSubjob)) {

      $whereCountSubjob = "";
    } else if (!empty($minSubjob) && empty($maxSubjob)) {

      $whereCountSubjob = "";
    } else if (empty($minSubjob) && !empty($maxSubjob)) {

      $whereCountSubjob = "";
    } else if (!empty($minSubjob) && !empty($maxSubjob)) {

      $whereCountSubjob = "";
    }

    if (empty($minDeadline) && empty($maxDeadline)) {

      $whereDeadline = "";
    } else if (!empty($minDeadline) && empty($maxDeadline)) {

      $whereDeadline = " AND JSON_UNQUOTE(JSON_EXTRACT(sj.deadline, '$.d1.date_create')) >= '$newMin 09:00'";
    } else if (empty($minDeadline) && !empty($maxDeadline)) {

      $whereDeadline = " AND JSON_UNQUOTE(JSON_EXTRACT(sj.deadline, '$.d1.date_create')) <= '$newMax 17:00'";
    } else if (!empty($minDeadline) && !empty($maxDeadline)) {

      $whereDeadline = " AND JSON_UNQUOTE(JSON_EXTRACT(sj.deadline, '$.d1.date_create')) >= '$newMin 09:00' AND JSON_UNQUOTE(JSON_EXTRACT(sj.deadline, '$.d1.date_create')) <= '$newMax 17:00'";
    }

    $wherePt = "";
    if (empty($pt)) {
      $wherePt = "";
    } else {
      $wherePt .= " AND";
      for ($p = 0; $p < count($pt); $p++) {
        $wherePt .= " JSON_CONTAINS(j.pt, JSON_QUOTE('" . $pt[$p] . "'), '$') = 1";
        $wherePt .= " OR";
      }
      $wherePt .= " JSON_CONTAINS(j.pt, JSON_QUOTE('" . $pt[0] . "'), '$') = 1";
    }


    // count, group by

    if ($minSubjob != '' && $maxSubjob != '') {
      $having = " HAVING COUNT(sj.id_title) >= $minSubjob AND COUNT(sj.id_title) <= $maxSubjob";
      $group = " GROUP BY sj.id_title";
    } else if ($minSubjob != '' && $maxSubjob == '') {
      $having = " HAVING COUNT(sj.id_title) >= $minSubjob";
      $group = " GROUP BY sj.id_title";
    } else if ($minSubjob == '' && $maxSubjob != '') {
      $having = " HAVING COUNT(sj.id_title) <= $maxSubjob";
      $group = " GROUP BY sj.id_title";
    } else if ($subjobSort != '' && $activity != '') {
      $group = " GROUP BY sj.id_title";
      $having = "";
    } else {
      $group = "";
      $having = "";
    }

    // count, group by


    $queryMaster = 'SELECT j.crew, j.leader, j.coadmin, j.title, j.id AS idJob, sj.id, j.date, JSON_UNQUOTE(JSON_EXTRACT(sj.deadline, "$.d1.date_create")) AS deadline
                   FROM job j, subjob sj
                   WHERE j.id = sj.id_title'
      . $whereActivity
      . $whereSubjob
      . $whereLeader
      . $whereCoadmin
      . $whereCrew
      . $wherePt
      . $whereDeadline
      . $whereCountSubjob
      . $group
      . $having;


    echo $queryMaster;
  }

  public function addMoreSubjob()
  {

    $idJob = $this->input->post('idJob');

    //get data
    $query = "SELECT title, crew, leader, coadmin, date, pt, id
              FROM job
              WHERE id = $idJob";
    $result = $this->database->getData($query, 'default')->row_array();

    $crew = json_decode($result['crew'], true);
    $leader = $result['leader'];
    $coadmin = $result['coadmin'];
    $title = $result['title'];

    //name array
    $queryName = "SELECT id, name
                  FROM ac_payroll_item
                  WHERE is_active = 1
                  AND barcode IS NOT null";
    $resultName = $this->database->getData($queryName, 'we');

    $nameArray = array();

    foreach ($resultName->result() as $row) {
      $nameArray['n' . $row->id] = $row->name;
    }

    for ($i = 0; $i < count($crew); $i++) {
      if (isset($nameArray['n' . $crew[$i]])) {
        $crewName[] = $nameArray['n' . $crew[$i]];
      }
    }

    if (isset($nameArray['n' . $leader])) {
      $leaderName = $nameArray['n' . $leader];
    }

    if (isset($nameArray['n' . $coadmin])) {
      $coadminName = $nameArray['n' . $coadmin];
    }

    $data['crewName'] = $crewName;
    $data['leaderName'] = $leaderName;
    $data['coadminName'] = $coadminName;
    $data['title'] = $title;

    echo json_encode($data);
  }

  public function deleteCurrentJob()
  {
    $idJob = $this->input->post('idJob');

    $this->db->where('id', $idJob);
    $this->db->delete('job');

    $message = 'success';
    $idJobCoadmin = $_SESSION['idJobCoadmin'];

    $data['message'] = $message;
    $data['idJobCoadmin'] = $idJobCoadmin;

    echo json_encode($data);
  }
}
