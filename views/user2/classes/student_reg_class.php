<?php


 
class Registration
{
  
   private $db_connection = null;   
   public $errors = array();  
   public $messages = array();
   public $isAvailable=true;
   public function __construct()
   {
      if (isset($_POST["register"])) {
         $this->registerNewUser();
      }
   }  
   private function registerNewUser()
   {
      if (empty($_POST['prn'])) {
         $this->errors[] = "Empty Username";
      }
      elseif (empty($_POST['fname'])) {
         $this->errors[] = "Empty First Name";
      }  elseif (empty($_POST['adyear'])) {
         $this->errors[] = "Admission year field required";
      } elseif (empty($_POST['password_new']) || empty($_POST['confirm_password'])) {
         $this->errors[] = "Empty Password";
      } elseif ($_POST['password_new'] !== $_POST['confirm_password']) {
         $this->errors[] = "<script> document.getElementById('pass').className = 'form-group has-error';
         document.getElementById('cpass').className = 'form-group has-error';</script>Password does not match";
      } elseif (strlen($_POST['password_new']) < 6) {
         $this->errors[] = "<script> document.getElementById('pass').className = 'form-group has-error';</script>Password has a minimum length of 6 characters";
      } elseif (strlen($_POST['prn']) > 64 || strlen($_POST['prn']) < 2) {
         $this->errors[] = "Username cannot be shorter than 2 or longer than 64 characters";
      } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['prn'])) {
         $this->errors[] = "Username does not fit the name scheme: only a-Z and numbers are allowed, 2 to 64 characters";
      }
      elseif (!empty($_POST['prn'])
      && strlen($_POST['prn']) <= 64
      && strlen($_POST['prn']) >= 2
      && preg_match('/^[a-z\d]{2,64}$/i', $_POST['prn'])
      && !empty($_POST['password_new'])
      && !empty($_POST['confirm_password'])
      && ($_POST['password_new'] === $_POST['confirm_password'])
      ) {
        
         $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        
         if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
         }

        
         if (!$this->db_connection->connect_errno) {

            $prn = $this->db_connection->real_escape_string(strip_tags($_POST['prn'], ENT_QUOTES));
            $user_password = $_POST['password_new'];
            $user_status = $_POST['user_status'];
            $user_fname = $_POST['fname'];
            $user_lname = $_POST['lname'];
            $user_dep = $_POST['department'];
            $user_adyear = $_POST['adyear'];
            $user_email = $_POST['email'];

            $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);

            
            $sql = "SELECT * FROM users WHERE prn = '" . $prn . "';";
            $query_check_prn = $this->db_connection->query($sql);

            if ($query_check_prn->num_rows == 1) {
               $this->errors[] = "Sorry, that username is already Added.";
               $isAvailable=false;
               
            } else {
                $isAvailable=false;
             
               $sql = "INSERT INTO users (prn, user_password_hash, actype , status)
               VALUES('" . $prn . "', '" . $user_password_hash . "', 'Student' , ". $user_status.");";
               $query_new_user_insert = $this->db_connection->query($sql);
               $sql = "INSERT INTO student_tbl (prn, fname , lname , department , admission_year , email)
               VALUES('" . $prn . "', '" . $user_fname . "','" . $user_lname . "', '". $user_dep."' , '". $user_adyear."' ,'" . $user_email . "');";
               $query_new_user_insert2 = $this->db_connection->query($sql);
             
               if ($query_new_user_insert||$query_new_user_insert2 ) {
                  $this->messages[] = "Student Account has been created successfully.";
               } else {
                  $this->errors[] = "Sorry, your registration failed. Please go back and try again.";
               }
            }
         } else {
            $this->errors[] = "Sorry, no database connection.";
         }
      } else {
         $this->errors[] = "An unknown error occurred.";
      }
   }
   
}


