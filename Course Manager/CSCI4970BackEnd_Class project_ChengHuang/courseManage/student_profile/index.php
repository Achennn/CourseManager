<?php
require('../model/database.php');
require('../model/sProfiles_db.php');
require('../model/enrolled_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'personal_page';
    }
}

if ($action == 'personal_page') {
    //Display personal information page
    $studentID = filter_input(INPUT_POST, 'studentID');
    include('personal.php');
} else if ($action == 'profile_page') {
    //Display profile
    $studentID = filter_input(INPUT_POST, 'studentID');
    $sProfile = get_profile_by_id($studentID);
    include('profile.php');
} else if ($action == 'profile_edit_page') {
    $studentID = filter_input(INPUT_POST, 'studentID');
    $sProfile = get_profile_by_id($studentID);
    include('profile_edit.php');
} else if ($action == 'changes_save') {
    $studentID = filter_input(INPUT_POST, 'studentID');
    $name = filter_input(INPUT_POST, 'studentName');
    $gender = filter_input(INPUT_POST, 'gender');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $birthday = filter_input(INPUT_POST, 'birth');
    
    if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$birthday)){
	
    } else if ($birthday == 'None'){
	
    } else {
        $birthday = false;
    }
    
    if ($name == null || $name == false ||
        $gender == null || $gender == false ||
        $email == null || $email == false ||
        $birthday == false    ) {
        $error = "You are missing some fields. Check all fields and try again.";
        include('../errors/error.php');
        } else {
            update_profile($studentID, $name, $gender, $birthday, $email);
            $sProfile = get_profile_by_id($studentID);
            include('profile.php');
        }
} else if ($action == 'password_change_page') {
    $studentID = filter_input(INPUT_POST, 'studentID');
    $password = filter_input(INPUT_POST, 'password');
    $sProfile = get_profile_by_id($studentID);
    include('password_change.php');
} else if ($action == 'password_save') {
    $studentID = filter_input(INPUT_POST, 'studentID');
    $password = filter_input(INPUT_POST, 'password');
    $oldPassword = filter_input(INPUT_POST, 'oldPassword');
    $newPassword = filter_input(INPUT_POST, 'newPassword');
    $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');
    
    $sProfile = get_profile_by_id($studentID);
    
    if ($password == null || $password == false ||
        $oldPassword == null || $oldPassword == false ||
        $newPassword == null || $newPassword == false ||
        $confirmPassword == null || $confirmPassword == false) {
        $error = "You are missing some fields. Check all fields and try again.";
        include('../errors/error.php');
        } else {
            if ($password != $oldPassword) {
                $error1 = "Current password is wrong.";
                include('password_change.php');
            } else if ($newPassword != $confirmPassword) {
                $error2 = "New password and confirm password are different";
                include('password_change.php');
            } else {
                update_password($studentID, $newPassword);
                $message = "Change successful!";
                include('password_change.php');
            }
        }
} else if ($action == 'course_enrolled_page') {
    $studentID = filter_input(INPUT_POST, 'studentID');
    $courses = show_enrolled($studentID);
    include('../student_profile/course_enrolled.php');
} else if ($action == 'course_withdraw') {
    $studentID = filter_input(INPUT_POST, 'student_id');
    $courseID = filter_input(INPUT_POST, 'course_id');
    $courseName = filter_input(INPUT_POST, 'course_name');
    $semester = filter_input(INPUT_POST, 'semester');
    $instructor = filter_input(INPUT_POST, 'instructor');
    $classroom = filter_input(INPUT_POST, 'classroom');
    $time = filter_input(INPUT_POST, 'time');
    
    withdraw_course($studentID, $courseID, $courseName, $semester, $instructor, $classroom, $time);
    $courses = show_enrolled($studentID);
    include('../student_profile/course_enrolled.php');
} else if ($action == 'login_after_page') {
    $studentID = filter_input(INPUT_POST, 'studentID');
    $studentName = get_name_by_id($studentID);
    include('../student_login/login_after.php');
}
?>