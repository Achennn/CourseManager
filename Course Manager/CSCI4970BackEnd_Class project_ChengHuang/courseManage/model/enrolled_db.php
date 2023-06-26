<?php

function enroll_course($studentID, $courseID, $courseName, $semester, $instructor, $classroom, $time) {
    global $db;
    $query = 'INSERT INTO enrolled
                 (studentID, courseID, courseName, semester, instructor, classroom, time)
              VALUES
                 (:studentID, :courseID, :courseName, :semester, :instructor, :classroom, :time)';
    $statement = $db->prepare($query);
    $statement->bindValue(':studentID', $studentID);
    $statement->bindValue(':courseID', $courseID);
    $statement->bindValue(':courseName', $courseName);
    $statement->bindValue(':semester', $semester);
    $statement->bindValue(':instructor', $instructor);
    $statement->bindValue(':classroom', $classroom);
    $statement->bindValue(':time', $time);
    $statement->execute();
    $statement->closeCursor();
}

function show_enrolled($studentID) {
    global $db;
    $query = 'SELECT * FROM enrolled
              WHERE enrolled.studentID = :studentID
              ORDER BY courseID';
    $statement = $db->prepare($query);
    $statement->bindValue(':studentID', $studentID);
    $statement->execute();
    $showEnrolled = $statement->fetchAll();
    $statement->closeCursor();
    return $showEnrolled;    
}

function withdraw_course($studentID, $courseID, $courseName, $semester, $instructor, $classroom, $time){
    global $db;
    $query = 'DELETE FROM enrolled
              WHERE
                studentID=:studentID AND
                courseID=:courseID AND
                courseName=:courseName AND
                semester=:semester AND
                instructor=:instructor AND
                classroom=:classroom AND
                time=:time';
    $statement = $db->prepare($query);
    $statement->bindValue(':studentID', $studentID);
    $statement->bindValue(':courseID', $courseID);
    $statement->bindValue(':courseName', $courseName);
    $statement->bindValue(':semester', $semester);
    $statement->bindValue(':instructor', $instructor);
    $statement->bindValue(':classroom', $classroom);
    $statement->bindValue(':time', $time);
    $statement->execute();
    $statement->closeCursor();
}

function check_enrolled($studentID, $courseID) {
    global $db;
    $query = 'SELECT * FROM enrolled
              WHERE enrolled.studentID = :studentID AND
              enrolled.courseID = :courseID
              ORDER BY courseID';
    $statement = $db->prepare($query);
    $statement->bindValue(':studentID', $studentID);
    $statement->bindValue(':courseID', $courseID);
    $statement->execute();
    $checkEnrolled = $statement->fetchAll();
    $statement->closeCursor();
    return $checkEnrolled;    
}

