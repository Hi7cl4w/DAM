<?php
    if (version_compare(PHP_VERSION, '5.3.7', '<')) {
   exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {

   require_once("libraries/password_compatibility_library.php");
}

    if ($_POST['password_new'] !== $_POST['confirm_password']) {
        echo "<br>Password does not match</br>";
    } elseif (strlen($_POST['password_new']) > 0 && strlen($_POST['password_new']) < 6) {
        echo "<br>Password has a minimum length of 6 characters</br>";
    } elseif (strlen($_POST['prn']) > 64 || strlen($_POST['prn']) < 2) {
        echo "<br>Username cannot be shorter than 2 or longer than 64 characters</br>";
    } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['prn'])) {
        echo "<br>Username does not fit the name scheme: only a-Z and numbers are allowed, 2 to 64 characters</br>";
    } elseif (empty($_POST['fname']) && empty($_POST['lname']) && empty($_POST['des']) && empty($_POST['email'])&& empty($_POST['password_new'])) {
        echo "<br>Fields are empty </br>";
    } else {

        require_once('config.php');
        $lname = "";
        $fname = "";
        $des = "";
        $email = "";
        //$status ="";
        $user_password = "";
        $prn = $_POST['prn'];
       
        
        if ($_POST['password_new'] != "") {
            $user_password = $_POST['password_new'];
            $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
            $pass = "user_password_hash='" . $user_password_hash . "'";
            $sql = "UPDATE users SET " . $pass . " WHERE prn='" . $prn . "';";
            $query = mysql_query($sql);
            if (!$query) {
                    die('Invalid query: ' . mysql_error());
            }
            else
            echo "<br>Password has been updated</br>";
        }
        if ($_POST['fname'] != "") {
            $fname = "fname='" . $_POST['fname'] . "'";
            $sql = "UPDATE staff_tbl SET " . $fname . " WHERE prn='" . $prn . "';";
            $query = mysql_query($sql);
            echo "<br>First name has been updated</br>";
        }
       /* if ($_POST['user_status'] != "") {
            
            $status = "status='" . $_POST['user_status'] . "'";
            $sql2 = "UPDATE users SET " . $status . " WHERE prn='" . $prn . "';";
            $query = mysql_query($sql2);
            echo "<br>Status has been updated</br>";
        }*/
        if ($_POST['lname'] != "") {
            $lname = "lname='" . $_POST['lname'] . "'";

            $sql = "UPDATE staff_tbl SET " . $lname . " WHERE prn='" . $prn . "';";
            $query = mysql_query($sql);
            echo "<br>last name has been updated</br>";
        }
        if ($_POST['des'] != "") {
            $des = "designation='" . $_POST['des'] . "'";
            $sql = "UPDATE staff_tbl SET " . $des . " WHERE prn='" . $prn . "';";
            $query = mysql_query($sql);
            echo "<br>designation has been updated</br>";
        }
        if ($_POST['email'] != "") {
            $email = "email='" . $_POST['email'] . "'";
            $sql = "UPDATE staff_tbl SET " . $email . " WHERE prn='" . $prn . "';";
            $query = mysql_query($sql);
            echo "<br>Email has been updated</br>";
        }
    }
    // $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
// check if user or email address already exists
    // write new user's data into database
    // echo "POST =" . json_encode($_POST) . "<br>";
?>


