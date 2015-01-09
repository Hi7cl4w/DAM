<?php


class Login {

   
    private $db_connection = null;   
    public $errors = array();   
    public $messages = array();    
    public function __construct() {
       
        session_start();

       
        if (isset($_GET["logout"])) {
            $this->doLogout();
        }
       
        elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }

   
    private function dologinWithPostData() {
       
        if (empty($_POST['prn'])) {
            $this->errors[] = "prn field was empty.";
        } elseif (empty($_POST['user_password'])) {
            $this->errors[] = "Password field was empty.";
        } elseif (!empty($_POST['prn']) && !empty($_POST['user_password'])) {

        
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

           
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

           
            if (!$this->db_connection->connect_errno) {

               
                $prn = $this->db_connection->real_escape_string($_POST['prn']);

                $sql = "SELECT prn, user_password_hash , actype , status
                        FROM users
                        WHERE prn = '" . $prn . "';";
                $result_of_login_check = $this->db_connection->query($sql);

                if ($result_of_login_check->num_rows == 1) {

                 
                    $result_row = $result_of_login_check->fetch_object();

                    
                    if (password_verify($_POST['user_password'], $result_row->user_password_hash)) {

                        $_SESSION['prn'] = $result_row->prn;
                        $_SESSION['user_login_status'] = 1;
                        $_SESSION['actype'] = $result_row->actype;
                        $_SESSION['status'] = $result_row->status;
                        $type=$result_row->actype;
                         if($type=='Student'){
                                $tbl_name="student_tbl";
                            }
                            else if($type=='Staff'){
                                $tbl_name="staff_tbl";
                            }
                            else if($type=='admin'){
                                $tbl_name="admin_tbl";
                            }
                             $sql2 = "SELECT  fname , lname
                        FROM ". $tbl_name . "
                        WHERE prn = '" . $prn . "';";
                $result_of_login_check2 = $this->db_connection->query($sql2);

              
                if ($result_of_login_check2->num_rows == 1) {

                   
                $result_row = $result_of_login_check2->fetch_object();
                  $_SESSION['fname'] = $result_row->fname;
                        $_SESSION['lname'] = $result_row->lname;
                
                
                
                } 
                else {
                        $this->errors[] = "Error.";
                    }
                    } else {
                        $this->errors[] = "Wrong password. Try again.";
                    }
                } else {
                    $this->errors[] = "This user does not exist.";
                }
            } else {
                $this->errors[] = "Database connection problem.";
            }
        }
    }

  
    public function doLogout() {
       
        $_SESSION = array();
        session_destroy();
        
        $this->messages[] = "You have been logged out.";
    }

   
    public function isUserLoggedIn() {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
       
        return false;
    }

    public function isUserValid() {
        if (isset($_SESSION['status']) AND $_SESSION['status'] == 1) {
            return true;
        }
       
        return false;
    }

    public function isUserType() {
        if (isset($_SESSION['actype']) AND $_SESSION['actype'] == 'Student') {
            return "Student";
        } else if (isset($_SESSION['actype']) AND $_SESSION['actype'] == 'Staff') {
            return "Staff";
        } else if (isset($_SESSION['actype']) AND $_SESSION['actype'] == 'admin') {
            return "Administrator";
        }
    }

}
