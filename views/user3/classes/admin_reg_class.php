<?php


class Registration
{
    
    private $db_connection = null;
   
    public $errors = array();
   
    public $messages = array();

   
    public function __construct()
    {
        if (isset($_POST["register"])) {
            $this->registerNewUser();
        }
    }

    
    private function registerNewUser()
    {
        if (empty($_POST['username'])) {
            $this->errors[] = "Empty Username";
        } elseif (empty($_POST['password_new']) || empty($_POST['confirm_password'])) {
            $this->errors[] = "Empty Password";
        } elseif ($_POST['password_new'] !== $_POST['confirm_password']) {
            $this->errors[] = "Password does not match";
        } elseif (strlen($_POST['password_new']) < 6) {
            $this->errors[] = "<script> document.getElementById('pass').className = 'form-group has-error';</script>Password has a minimum length of 6 characters";
        } elseif (strlen($_POST['username']) > 64 || strlen($_POST['username']) < 2) {
            $this->errors[] = "Username cannot be shorter than 2 or longer than 64 characters";
        } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['username'])) {
            $this->errors[] = "Username does not fit the name scheme: only a-Z and numbers are allowed, 2 to 64 characters";
        }
         elseif (!empty($_POST['username'])
            && strlen($_POST['username']) <= 64
            && strlen($_POST['username']) >= 2
            && preg_match('/^[a-z\d]{2,64}$/i', $_POST['username'])
			&& !empty($_POST['password_new'])
            && !empty($_POST['confirm_password'])
            && ($_POST['password_new'] === $_POST['confirm_password'])
        ) {
         
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            if (!$this->db_connection->connect_errno) {

                $prn = $this->db_connection->real_escape_string(strip_tags($_POST['username'], ENT_QUOTES));
                $user_password = $_POST['password_new'];
                $user_status = $_POST['user_status'];
                $user_fname = $_POST['fname'];
                $user_lname = $_POST['lname'];
                $user_des = $_POST['designation'];
                $user_email = $_POST['email'];

               
                $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);

                $sql = "SELECT * FROM users WHERE prn = '" . $prn . "';";
                $query_check_prn = $this->db_connection->query($sql);

                if ($query_check_prn->num_rows == 1) {
                    $this->errors[] = "Sorry, that username is already Added.";
                } else {
           
                    $sql = "INSERT INTO users (prn, user_password_hash, actype , status)
                            VALUES('" . $prn . "', '" . $user_password_hash . "', 'admin' , ". $user_status.");";
                    $query_new_user_insert = $this->db_connection->query($sql);
                    $sql = "INSERT INTO admin_tbl (prn, fname , lname , designation , email)
                            VALUES('" . $prn . "', '" . $user_fname . "','" . $user_lname . "', '". $user_des."' , '" . $user_email . "');";
                   $query_new_user_insert2 = $this->db_connection->query($sql);
                  
                    if ($query_new_user_insert||$query_new_user_insert2 ) {
                        $this->messages[] = "Admin Account has been created successfully.";
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
