<?php
function get_courses() {
    global $db;
    $query = 'SELECT * FROM courses
              ORDER BY courseID';
    $statement = $db->prepare($query);
    $statement->execute();
    $courses = $statement->fetchAll();
    $statement->closeCursor();
    return $courses;
}

function search_by_courseID($courseID) {
    global $db;
    $query = 'SELECT * FROM courses
              WHERE courseID = :courseID
              ORDER BY courseID';
    $statement = $db->prepare($query);
    $statement->bindValue(':courseID', $courseID);
    $statement->execute();
    $coursesByID = $statement->fetchAll();
    $statement->closeCursor();
    return $coursesByID;
}

function search_by_courseName($courseName) {
    global $db;
    $query = 'SELECT * FROM courses
              WHERE courseName
              REGEXP :courseName
              ORDER BY courseID';
    $statement = $db->prepare($query);
    $statement->bindValue(':courseName', $courseName);
    $statement->execute();
    $coursesByName = $statement->fetchAll();
    $statement->closeCursor();
    return $coursesByName;
}

function search_by_instructor($instructor) {
    global $db;
    $query = 'SELECT * FROM courses
              WHERE instructor
              REGEXP :inctructor
              ORDER BY courseID';
    $statement = $db->prepare($query);
    $statement->bindValue(':inctructor', $instructor);
    $statement->execute();
    $coursesByInstructor = $statement->fetchAll();
    $statement->closeCursor();
    return $coursesByInstructor;
}

