<?php

    if (isset($_POST['delete'])) {
        $id = $_POST['delete'];
        require_once('config.php');
       



       
        
        $sql = " DELETE FROM `action_tbl` WHERE `action_id` = '" . $id . "' ;";
        $query = mysql_query($sql);
        if (!$query) {
            die('Invalid query: ' . mysql_error());
        }
        
    }
?>

