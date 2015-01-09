<?php

    if (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['prn'])) {
        echo "<br>Error</br>";
    } else {

        require_once('config.php');
        $h_prn = "";
        $h_name = "";
        $staff_prn = "";
        $staff_name = "";
        $action = "";
        $reason = "";
        $fine = "";
        $fine_payment_date = "";

        $incident_date = "";

        $action_taken_date = "";

        $punishment_duration = "";
        $location = "";
        $witnesses = "";
        $status = "";


        $action_id =$_POST['action_id'];
        if ($_POST['h_prn'] != "") {
            $h_prn = "`enqhead_prn`='" . $_POST['h_prn'] . "'";
            $sql = "UPDATE `action_tbl` SET " . $h_prn . " WHERE action_id='" . $action_id . "';";
            $query = mysql_query($sql);
            echo "<br>faculty prn has been updated</br>";
            
        }
        if ($_POST['h_name'] != "") {
            $h_name = "`enqhead_name`='" .$_POST['h_name']. "'";
            $sql = "UPDATE `action_tbl` SET " . $h_name . " WHERE action_id='" . $action_id . "';";
            $query = mysql_query($sql);
            echo "<br>enqhead prn has been updated</br>";
        }
       
        if ($_POST['action'] != "") {
            $action = "`action`='" .$_POST['action']. "'";
            $sql = "UPDATE `action_tbl` SET " . $action . " WHERE action_id='" . $action_id . "';";
            $query = mysql_query($sql);
            echo "<br>action has been updated</br>".$sql;
            
        }
        if ($_POST['reason'] != "") {
            $reason = "`reason`='" .$_POST['reason']. "'";
            $sql = "UPDATE `action_tbl` SET " . $reason . " WHERE action_id='" . $action_id . "';";
            $query = mysql_query($sql);
            echo "<br>reason has been updated</br>";
        }
        if ($_POST['fine'] != "") {
            $fine = "`fine`='" .$_POST['fine']. "'";
            $sql = "UPDATE `action_tbl` SET " . $fine . " WHERE action_id='" . $action_id . "';";
            $query = mysql_query($sql);
            echo "<br>fine has been updated</br>";
        }
        if ($_POST['fine_payment_date'] != "") {
            $fine_payment_date = $_POST['fine_payment_date'];
            $fine_payment_date = date('Y-m-d', strtotime(str_replace('-', '/', $fine_payment_date)));
            $fine_payment_date = "`fine_payment_date`='" .$fine_payment_date. "'";            
            $sql = "UPDATE `action_tbl` SET " . $fine_payment_date . " WHERE action_id='" . $action_id . "';";
            $query = mysql_query($sql);
            echo "<br>fine payment date has been updated</br>";
        }

        if ($_POST['incident_date'] != "") {
            $incident_date = $_POST['incident_date']. "'";
            $incident_date = date('Y-m-d', strtotime(str_replace('-', '/', $incident_date)));
            $incident_date = "`incident_date`='" .$incident_date. "'";
            $sql = "UPDATE `action_tbl` SET " . $incident_date . " WHERE action_id='" . $action_id . "';";
            $query = mysql_query($sql);
            echo "<br>incident date has been updated</br>";
        }

        if ($_POST['action_taken_date'] != "") {
            $action_taken_date = $_POST['action_taken_date']. "'";
            $action_taken_date = date('Y-m-d', strtotime(str_replace('-', '/', $action_taken_date)));
            $action_taken_date = "`action_taken_date`='" .$action_taken_date. "'";
            $sql = "UPDATE `action_tbl` SET " . $action_taken_date . " WHERE action_id='" . $action_id . "';";
            $query = mysql_query($sql);
            echo "<br>action take date has been updated</br>";
        }

        if ($_POST['punishment_duration'] != "") {
            $punishment_duration = "`witnesses`='" .$_POST['punishment_duration'];            
            $sql = "UPDATE `action_tbl` SET " . $punishment_duration . " WHERE action_id='" . $action_id . "';";
            echo "<br>punishment duration has been updated</br>";
        }
        if ($_POST['location'] != "") {
            $location = "`location`='" .$_POST['location'];
            $sql = "UPDATE `action_tbl` SET " . $location . " WHERE action_id='" . $action_id . "';";
            $query = mysql_query($sql);
            echo "<br>location has been updated</br>";
        }
        if ($_POST['witnesses'] != "") {
            $witnesses = "`witnesses`='" .$_POST['witnesses']. "'";
            $sql = "UPDATE `action_tbl` SET " . $witnesses . " WHERE action_id='" . $action_id . "';";
            $query = mysql_query($sql);
            echo "<br>witnesses has been updated</br>";
        }
        if ($_POST['status'] != "") {
            $status = "`status`='" .$_POST['status']. "'";
            $sql = "UPDATE `action_tbl` SET " . $status . " WHERE action_id='" . $action_id . "';";
            $query = mysql_query($sql);
            echo "<br>status has been updated</br>";
        }



    }
    // $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
// check if user or email address already exists
    // write new user's data into database
    // echo "POST =" . json_encode($_POST) . "<br>";
?>






