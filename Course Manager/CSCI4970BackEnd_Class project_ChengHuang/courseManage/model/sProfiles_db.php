<?php
//student profile's database

function register_student($studentID, $name, $gender, $email, $password) {
    global $db;
    $query = 'INSERT INTO sProfiles
                 (studentID, name, gender, email, password)
              VALUES
                 (:studentID, :name, :gender, :email, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':studentID', $studentID);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':gender', $gender);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}

function get_info_by_id($studentID) {
    global $db;
    $query = 'SELECT * FROM sProfiles
              WHERE sProfiles.studentID = :studentID';
    $statement = $db->prepare($query);
    $statement->bindValue(':studentID', $studentID);
    $statement->execute();
    $student = $statement->fetch();
    $statement->closeCursor();
    $student_id = $student['password'];
    return $student_id;    
}

function get_name_by_id($studentID) {
    global $db;
    $query = 'SELECT * FROM sProfiles
              WHERE sProfiles.studentID = :studentID';
    $statement = $db->prepare($query);
    $statement->bindValue(':studentID', $studentID);
    $statement->execute();
    $student = $statement->fetch();
    $statement->closeCursor();
    $student_name = $student['name'];
    return $student_name;    
}

function get_info_by_email($email) {
    global $db;
    $query = 'SELECT * FROM sProfiles
              WHERE sProfiles.email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $student = $statement->fetch();
    $statement->closeCursor();
    $student_email = $student['password'];
    return $student_email;    
}

function get_name_by_email($email) {
    global $db;
    $query = 'SELECT * FROM sProfiles
              WHERE sProfiles.email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $student = $statement->fetch();
    $statement->closeCursor();
    $student_name = $student['name'];
    return $student_name;    
}

function get_studentID_by_email($email) {
    global $db;
    $query = 'SELECT * FROM sProfiles
              WHERE sProfiles.email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $student = $statement->fetch();
    $statement->closeCursor();
    $student_id = $student['studentID'];
    return $student_id;    
}

function get_profile_by_id($studentID) {
    global $db;
    $query = 'SELECT * FROM sProfiles
              WHERE sProfiles.studentID = :studentID';
    $statement = $db->prepare($query);
    $statement->bindValue(':studentID', $studentID);
    $statement->execute();
    $studentProfile = $statement->fetch();
    $statement->closeCursor();
    return $studentProfile;    
}

function update_profile($studentID, $name, $gender, $birthday, $email) {
    global $db;
    $query = 'UPDATE sProfiles
              SET name=:name, gender=:gender, birth=:birthday, email=:email
              WHERE  studentID=:studentID';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':gender', $gender);
    $statement->bindValue(':birthday', $birthday);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':studentID', $studentID);
    $statement->execute();
    $statement->closeCursor();
}

function update_password($studentID, $password) {
    global $db;
    $query = 'UPDATE sProfiles
              SET password=:password
              WHERE  studentID=:studentID';
    $statement = $db->prepare($query);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':studentID', $studentID);
    $statement->execute();
    $statement->closeCursor();
}





