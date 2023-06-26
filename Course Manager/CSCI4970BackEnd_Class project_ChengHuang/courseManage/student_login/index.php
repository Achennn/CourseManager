<?php
require('../model/database.php');
require('../model/sProfiles_db.php');

if(session_id() === null) {
    $lifetime = 60*60*24*14;
    session_set_cookie_params($lifetime. '/');
    $_SESSION['email'] = " ";
    $_SESSION['password'] = " ";
}
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        if (isset($_SESSION['email']) || isset($_SESSION['studentID'])){
            $action = 'student_login';
        } else {
            $action = 'login_page';
        }
    }
}

if ($action == 'login_page') {
    //Display login
    include('login.php');
} else if ($action == 'register_page') {
    //Display register
    include('register.php');
} else if ($action == 'student_register') {
    $name = filter_input(INPUT_POST, 'name');
    $gender = filter_input(INPUT_POST, 'gender');
    $studentID = filter_input(INPUT_POST, 'studentID');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');
    $comfirmPassword = filter_input(INPUT_POST, 'comfirmPassword');
    
    if ($name == NULL || $name == FALSE || 
        $gender == NULL || $gender == FALSE || 
        $studentID == NULL || $studentID == FALSE || 
        $email == NULL || $email == FALSE ||
        $password == NULL || $password == FALSE ||
        $comfirmPassword == NULL || $comfirmPassword == FALSE) {
        $error1 = "Missing some fields,";
        $error2 = "check and try again.";
        include('../student_login/register.php');
    } else if ($password != $comfirmPassword) {
        $error1 = "Two passwords are different";
        include('../student_login/register.php');
    } else { 
        register_student($studentID, $name, $gender, $email, $password);
        include('../student_login/register_success.php');
    }
} else if ($action == 'student_login') {
    $studentID = filter_input(INPUT_POST, 'method');
    $email = filter_input(INPUT_POST, 'method', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');
    
        
    if ($studentID == null || $studentID == false ||
        $password == null || $password == false) {
        $incorrect = "Missing some fields,";
        $incorrect2 = "Check and try again.";
        include('login.php');
    } else {
        if ($email == false) {
            //login by id
            $checkPassword = get_info_by_id($studentID);
            if ($password == $checkPassword) {
                $studentName = get_name_by_id($studentID);
                include('../student_login/login_after.php');
            } else {
                $incorrect = "Incorrect password or id.";
                include('login.php');
            }
        } else {
            //login by email            
            $checkPassword = get_info_by_email($email);
            if ($password == $checkPassword) {
                $studentID = get_studentID_by_email($email);
                $studentName = get_name_by_email($email);
                include('../student_login/login_after.php');
            } else {
                $incorrect = "Incorrect password or email.";
                include('login.php');
            }
        }
    }
    
}
?>