<?php include '../view/body.php'; ?>
    
<main>
    <form action="." method="post" id="regForm">
        <input type="hidden" name="action" value="student_register">
        
        <label class="method">Name:</label>
        <input type="text" name="name"><br>
        
        <label class="method">Gender:</label>
        <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        
        <label class="method">Student ID:</label>
        <input type="text" name="studentID"><br>
        
        <label class="method">E-mail:</label>
        <input type="text" name="email">
        
        <label class="method">Password:</label>
        <input type="text" name="password"><br>
        
        <label class="method">Comfirm Password:</label>
        <input type="text" name="comfirmPassword"><br>
        
        <p3><?php echo $error1;?></p3><br>
        <p3><?php echo $error2;?></p3>
        <br>
        
        <input type="submit", value="Submit" class="loginButton">
    </form>

</main>