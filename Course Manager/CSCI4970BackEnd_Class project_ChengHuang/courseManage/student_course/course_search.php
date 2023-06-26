<?php include '../view/body.php'; ?>

<main>
    <h2>Course Search</h2>
    
    <form action="../student_course/index.php" method="post">
        <input type="hidden" name="action" value="course_search">
        <input type="hidden" name="studentID" value="<?php echo $studentID;?>">  
        
        <label class="stayLeftLabel">Search by:</label>
        <select name="searchMethod" class="selectGender">
            <option value="courseID">Course ID</option>
            <option value="courseName">Course Name</option>
            <option value="instructor">Instructor</option>
        </select><br>
        
        <label class="stayLeftLabel">Content:</label>
        <input type="text" name="searchContent" class="stayLeftInput"><br>
        <p3><?php echo $error;?></p3><br>
        
        <input type="submit", value="Search a course" class="stayLeftButton">
    </form>
    
    <br>
    
    <form action="." method="post">
        <input type="hidden" name="action" value="course_page">
        <input type="hidden" name="studentID" value="<?php echo $studentID;?>">  
        <input type="submit", value="Back to previous page" class="stayLeftButton">
    </form>
    
    <p2><?php echo $message; ?></p2>
    
    <br>
    
    <h2>Courses List</h2>
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
                           value="course_enroll">
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
                    <input type="hidden" name="tag"
                           value="course_search">
                    <input type="submit" value="Enroll">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>

