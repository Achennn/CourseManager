<?php include '../view/body.php'; ?>

<main>
    <h2>Course</h2>
    
    <p1>select your next step</p1><br>
    
    <form action="../student_course/index.php" method="post">
        <input type="hidden" name="action" value="courses_all_page">
        <input type="hidden" name="studentID" value="<?php echo $studentID; ?>">
        <input type="submit", value="Show all courses" class="stayLeftButton">
    </form>
    
    <br>
    
    <form action="../student_course/index.php" method="post">
        <input type="hidden" name="action" value="course_search_page">
        <input type="hidden" name="studentID" value="<?php echo $studentID; ?>">
        <input type="submit", value="Search a course" class="stayLeftButton">
    </form>  
    
    <br>
    
    <form action="." method="post">
        <input type="hidden" name="action" value="login_after_page">
        <input type="hidden" name="studentID" value="<?php echo $studentID;?>">  
        <input type="submit", value="Back to previous page" class="stayLeftButton">
    </form>
</main>

