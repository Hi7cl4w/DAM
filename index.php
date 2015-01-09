<?php

    if (version_compare(PHP_VERSION, '5.3.7', '<')) {
        exit("Sorry, it does not run on a PHP version smaller than 5.3.7 !");
    } else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
//php hashing algorithm
        require_once("libraries/password_compatibility_library.php");
    }


    require_once("config/db.php");


    require_once("classes/Login.php");


    $login = new Login();

    if ($login->isUserValid() == true) {


        if ($login->isUserLoggedIn() == true) {

            if ($login->isUserType() == "Student") {
                include("views/user1/main.php");
            } else if ($login->isUserType() == "Staff") {
                include("views/user2/main.php");
            } else if ($login->isUserType() == "Administrator") {

                include("views/user3/main.php");
                //include("views/index.php");
            } else {

                include("views/not_logged_in.php");
            }
        } else {
            include("views/not_logged_in.php");
        }
    } else {

        include("views/not_logged_in.php");
    }
