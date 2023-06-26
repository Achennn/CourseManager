<?php
require('../model/database.php');
require('../model/sProfiles_db.php');
require('../model/course_db.php');
require('../model/enrolled_db.php');

$courses = array();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'course_page';
    }
}

if ($action == 'course_page') {
    //Display course
    $studentID = filter_input(INPUT_POST, 'studentID');
    include('course.php');
} else if ($action == 'courses_all_page') {
    $courses = get_courses();
    $studentID = filter_input(INPUT_POST, 'studentID');
    include('course_all.php');
} else if ($action == 'course_enroll') {
    $studentID = filter_input(INPUT_POST, 'student_id');
    $courseID = filter_input(INPUT_POST, 'course_id');
    $courseName = filter_input(INPUT_POST, 'course_name');
    $semester = filter_input(INPUT_POST, 'semester');
    $instructor = filter_input(INPUT_POST, 'instructor');
    $classroom = filter_input(INPUT_POST, 'classroom');
    $time = filter_input(INPUT_POST, 'time');
    $tag = filter_input(INPUT_POST, 'tag');
    
    if ($studentID == null || $studentID == false ||
        $courseID == null || $courseID == false ||
        $courseName == null || $courseName == false ||
        $semester == null || $semester == false ||
        $instructor == null || $instructor == false ||
        $classroom == null || $classroom ==false ||
        $time == null || $time == false) {
        $error = "Something wrong, please check the information.";
        include('../errors/error.php');
    } else {
        if (check_enrolled($studentID, $courseID) == null) {
            enroll_course($studentID, $courseID, $courseName, $semester, $instructor, $classroom, $time);
            $message = "Enrolled course:  $courseID successfully";
            if ($tag == 'course_search') {
                $courses = get_courses();
                include ('../student_course/course_search.php');
            } else {
                $courses = get_courses();
                include('../student_course/course_all.php');
            }
        } else {
            $message = "You have already enrolled course: $courseID";
            if ($tag == 'course_search') {
                $courses = get_courses();
                include ('../student_course/course_search.php');
            } else {
                $courses = get_courses();
                include('../student_course/course_all.php');
            }
        }
        
        
    }
} else if ($action == 'course_search_page') {
    $studentID = filter_input(INPUT_POST, 'studentID');
    $courses = get_courses();
    include('../student_course/course_search.php');
} else if ($action == 'course_search') {
    $searchMethod = filter_input(INPUT_POST, 'searchMethod');
    $searchContent = filter_input(INPUT_POST, 'searchContent');
    $studentID = filter_input(INPUT_POST, 'studentID');
    
    if ($searchContent == null || $searchContent == false) {
        $error = "You must enter something to search.";
        include ('../student_course/course_search.php');
    } else if ($searchMethod == 'courseID') {
        //search by course id
        $courses = search_by_courseID($searchContent);
        include ('../student_course/course_search.php');
    } else if ($searchMethod == 'courseName') {
        //search by course name
        $courses = search_by_courseName($searchContent);
        include ('../student_course/course_search.php');
    } else {
        //search by instructor
        $courses = search_by_instructor($searchContent);
        include ('../student_course/course_search.php');
    }
}else if ($action == 'login_after_page') {
    $studentID = filter_input(INPUT_POST, 'studentID');
    $studentName = get_name_by_id($studentID);
    include('../student_login/login_after.php');
}

?>