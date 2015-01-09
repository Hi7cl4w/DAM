<?php

    class Registration {

        private $db_connection = null;
        public $errors = array();
        public $messages = array();
        public $isAvailable = true;

        public function __construct() {
            if (isset($_POST["register"])) {
                $this->registerNewUser();
            }
        }

        private function registerNewUser() {
            if (empty($_POST['prn'])) {
                $this->errors[] = "Empty prn";
            } elseif (empty($_POST['name'])) {
                $this->errors[] = "Empty First Name";
            } elseif (!empty($_POST['prn'])
            ) {

                $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

                if (!$this->db_connection->set_charset("utf8")) {
                    $this->errors[] = $this->db_connection->error;
                }

                if (!$this->db_connection->connect_errno) {

                    $prn = $this->db_connection->real_escape_string(strip_tags($_POST['prn'], ENT_QUOTES));
                    $name = $_POST['name'];
                    $department = $_POST['department'];
                    $h_prn = $_POST['h_prn'];
                    $h_name = $_POST['h_name'];
                    $staff_prn = $_POST['staff_prn'];
                    $staff_name = $_POST['staff_name'];
                    $action = $_POST['action'];
                    $reason = $_POST['reason'];
                    $fine = $_POST['fine'];
                    $fine_payment_date = $_POST['fine_payment_date'];
                    $fine_payment_date = date('Y-m-d', strtotime(str_replace('-', '/', $fine_payment_date)));
                    $incident_date = $_POST['incident_date'];
                    $incident_date = date('Y-m-d', strtotime(str_replace('-', '/', $incident_date)));
                    $action_taken_date = $_POST['action_taken_date'];
                    $action_taken_date = date('Y-m-d', strtotime(str_replace('-', '/', $action_taken_date)));
                    $punishment_duration = $_POST['punishment_duration'];
                    $location = $_POST['location'];
                    $witnesses = $_POST['witnesses'];
                    $status = $_POST['status'];

                    // dam action into database
                    $sql = "INSERT INTO `dam`.`action_tbl` (`action_id`, `prn`, `name`, `department`, `enqhead_prn`, `enqhead_name`, `faculty_prn`, `faculty_name`, `action`, `reason`, `fine`, `incident_date`, `action_taken_date`, `fine_payment_date`, `duration_days`, `location`, `witnesses`, `status`, `addedtime`) VALUES (NULL,  '" . $prn . "', '" . $name . "' , '" . $department . "' , '" . $h_prn . "', '" . $h_name . "', '" . $staff_prn . "', '" . $staff_name . "', '" . $action . "', '" . $reason . "', '" . $fine . "', '" . $incident_date . "', '" . $action_taken_date . "', '" . $fine_payment_date . "', '" . $punishment_duration . "', '" . $location . "', '" . $witnesses . "', '" . $status . "', CURRENT_TIMESTAMP);";
                    $query_new_user_insert = $this->db_connection->query($sql);


                    if ($query_new_user_insert) {
                        $this->messages[] = "Successfully added.";
                    } else {
                        $this->errors[] = "Failed. Please go back and try again.";
                    }
                } else {
                    $this->errors[] = "Sorry, no database connection.";
                }
            } else {
                $this->errors[] = "An unknown error occurred.";
            }
        }

    }
    