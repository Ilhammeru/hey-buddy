<?php
defined('BASEPATH') or exit('No direct script allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // Load model
        $this->load->model('Main_models', 'database');
        $this->mobile = $this->agent->mobile();

    }

    public function index()
    {

        $check  = $this->userSession();

        if ($check == 'no') {

          $data['title'] = 'Login page';
          $this->load->view('vzl/auth/login', $data);

        }

    }

    public function getLogin()
    {
        // $this->load->model('Main_models', 'database');

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //get password from db
        $query = "SELECT password, id, name, phone, alias FROM ac_payroll_item WHERE username = '$username' ";
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
                $fName = $row->name;
                $phone = $row->phone;
            }

            if ($password == $passwordDb) {

                //check condition
                $queryCondition = "SELECT coadmin, id
                                FROM job
                                WHERE coadmin = $idUser";
                $resultCondition = $this->database->getData($queryCondition, 'default');

                if($resultCondition->num_rows() > 0) {

                  //status coadmin
                  $coadminStatus = true;

                  foreach($resultCondition->result() as $con) {
                    $idJobCoadmin = $con->id;
                  }

                } else {

                  $coadminStatus = 0;
                  $idJobCoadmin = 0;

                }

                if($idUser == 1) {

                  $adminStatus = true;

                } else {

                  $adminStatus = 0;

                }

                //get session
                $_SESSION['user'] = $username;
                $_SESSION['login'] = true;
                $_SESSION['id'] = $idUser;
                $_SESSION['name'] = $name;
                $_SESSION['fName'] = $fName;
                $_SESSION['isCoadmin'] = $coadminStatus;
                $_SESSION['isAdmin'] = $adminStatus;
                $_SESSION['idJobCoadmin'] = $idJobCoadmin;

                $data['message'] = 'success';
                $data['coadminStatus'] = $coadminStatus;
                $data['$idJobCoadmin'] = $idJobCoadmin;

                echo json_encode($data);

            } else {
                $data['message'] = 'wrong password';
                echo json_encode($data);
            }
        }
    }

    public function changePassword()
    {

      $password = $this->input->post('password');
      $retype = $this->input->post('retype');
      $id = $this->input->post('id');

      $newPassword = $this->encryption->encrypt($retype);

      //edit database

      $data = [
        'password'  => $newPassword
      ];

      $db = $this->load->database('we', true);
      $db->where('id', $id);
      $db->update('ac_payroll_item', $data);

      echo 'success';

    }

    public function userSession()
    {

      if(isset($_SESSION['id'])) {

        redirect('jzl/Home');

      } else {

        return 'no';

      }

    }

    public function logout()
    {
        session_destroy();

        echo 'logout success';
    }
}
