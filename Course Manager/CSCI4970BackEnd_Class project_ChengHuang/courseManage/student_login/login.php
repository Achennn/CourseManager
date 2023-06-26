<?php include '../view/body.php'; ?>
    
<main>
    <form action="." method="post" id="loginForm">
        <input type="hidden" name="action" value="student_login">
        
        <label class="method">ID/Email:</label>
        <input type="text" name="method"><br>
        
        <label class="method">Password:</label>
        <input type="text" name="password"><br>
        <p3><?php echo $incorrect;?></p3><br>
        <p3><?php echo $incorrect2;?></p3>
        
        <br>
        
        <input type="submit", value="Submit" class="loginButton">
    </form>
    
    <br>
   
    <a href="?action=register_page" class="register">click here to register</a>
    
</main>
        
        
    