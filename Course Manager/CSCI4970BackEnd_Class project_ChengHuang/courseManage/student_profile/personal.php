<?php include '../view/body.php'; ?>

<main>
    <h2>Personal Information</h2>
    
    <p1>select your next step</p1><br>
    
    <form action="." method="post">
        <input type="hidden" name="action" value="profile_page">
        <input type="hidden" name="studentID" value="<?php echo $studentID; ?>">
        <input type="submit", value="Profile" class="stayLeftButton">
    </form>
    
    <br>
    
    <form action="." method="post">
        <input type="hidden" name="action" value="course_enrolled_page">
        <input type="hidden" name="studentID" value="<?php echo $studentID; ?>">
        <input type="submit", value="Enrolled courses" class="stayLeftButton">
    </form>  
    
    <br>
    
    <form action="." method="post">
        <input type="hidden" name="action" value="login_after_page">
        <input type="hidden" name="studentID" value="<?php echo $studentID; ?>">
        <input type="submit", value="Back to previous page" class="stayLeftButton">
    </form>
</main>

