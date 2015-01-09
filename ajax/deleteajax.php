<?php

    if (isset($_POST['delete'])) {
        $id = $_POST['delete'];
        require_once('config.php');
       



        $sql = "SELECT *
FROM users WHERE prn='" . $id . "';";
        $query = mysql_query($sql);
        while ($fetch = mysql_fetch_array($query)) {
            $sel = $fetch["actype"];
        }
        if ($sel == 'admin') {
            $tbl = "admin_tbl";

           
          
        } else if ($sel == 'student') {
            $tbl = "student_tbl";

            
        } else if ($sel == 'Staff') {
            $tbl = "staff_tbl";           
        }
        
        $sql = " DELETE FROM ".$tbl." WHERE prn = '" . $id . "' ;";
        $query = mysql_query($sql);
        if (!$query) {
            die('Invalid query: ' . mysql_error());
        }
         $sql = "DELETE FROM users WHERE prn = '" . $id . "';";
        $query = mysql_query($sql);
        if (!$query) {
            die('Invalid query: ' . mysql_error());
        }
    }
?>

