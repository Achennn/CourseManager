<?php include '../view/body.php'; ?>

<main>
    <h2>Welcome, <?php echo $studentName;?> </h2>
    
    <p1>select your next step</p1><br>
    
    <form action="../student_profile/index.php" method="post">
        <input type="hidden" name="action" value="personal_page">
        <input type="hidden" name="studentID" value="<?php echo $studentID; ?>">
        <input type="submit" value="Personal Information" class="stayLeftButton">
    </form>
    
    <br>
    
    <form action="../student_course/index.php" method="post">
        <input type="hidden" name="action" value="course_page">
        <input type="hidden" name="studentID" value="<?php echo $studentID; ?>">
        <input type="submit" value="Course Information" class="stayLeftButton">
    </form>
    
    <br>
    <br>
    <form action="../student_course/index.php" method="post">
        <input type="hidden" name="action" value="log_out">
        <input type="submit" value="Logout" class="stayLeftButton">
    </form>
    
</main>
