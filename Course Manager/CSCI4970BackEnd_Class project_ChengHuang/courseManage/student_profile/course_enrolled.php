<?php include '../view/body.php'; ?>

<main>
    <h2>Course Enrolled</h2>
        
    <section>
        <table>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Semester</th>
                <th>Instructor</th>
                <th>Classroom</th>
                <th>time</th>
                <th>&nbsp;</th>
            </tr>
            
            <?php foreach ($courses as $course) : ?>
            <tr>
                <td><?php echo $course['courseID']; ?></td>
                <td><?php echo $course['courseName']; ?></td>
                <td><?php echo $course['semester']; ?></td>
                <td><?php echo $course['instructor']; ?></td>
                <td><?php echo $course['classroom']; ?></td>
                <td><?php echo $course['time']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="course_withdraw">
                    <input type="hidden" name="student_id"
                           value="<?php echo $studentID; ?>">
                    <input type="hidden" name="course_id"
                           value="<?php echo $course['courseID']; ?>">
                    <input type="hidden" name="course_name"
                           value="<?php echo $course['courseName']; ?>">
                    <input type="hidden" name="semester"
                           value="<?php echo $course['semester']; ?>">
                    <input type="hidden" name="instructor"
                           value="<?php echo $course['instructor']; ?>">
                    <input type="hidden" name="classroom"
                           value="<?php echo $course['classroom']; ?>">
                    <input type="hidden" name="time"
                           value="<?php echo $course['time']; ?>">
                    <input type="submit" value="Withdraw">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>
    
    <br>
    
    <form action="." method="post" id="">
        <input type="hidden" name="action" value="personal_page">
        <input type="hidden" name="studentID" value="<?php echo $studentID;?>">  
        <input type="submit", value="Back to previous page" class="stayLeftButton">
    </form>
</main>
