<?php include '../view/body.php'; ?>

<main>
    <h2>Change Password</h2><br>
    
    <form action="." method="post">
        <input type="hidden" name="action" value="password_save">
        
        <input type="hidden" name="password" value="<?php echo $password; ?>">
        <input type="hidden" name="studentID" value="<?php echo $sProfile['studentID']; ?>">
        
        <label class="stayLeftLabel">Current Password:</label>
        <input type="text" name="oldPassword" class="stayLeftInput">
        <p3><?php echo $error1;?></p3><br>
        
        <label class="stayLeftLabel">New Password:</label>
        <input type="text" name="newPassword" class="stayLeftInput"><br>
        
        <label class="stayLeftLabel">Confirm Password:</label>
        <input type="text" name="confirmPassword" class="stayLeftInput">
        <p3><?php echo $error2;?></p3>
        
        <p3><?php echo $message;?></p3><br>
        
        <br>
        
        <input type="submit", value="Save New Password" class="stayLeftButton">
    </form>
    
    <br>
    
    <form action="." method="post">
        <input type="hidden" name="action" value="profile_page">
        <input type="hidden" name="studentID" value="<?php echo $sProfile['studentID']; ?>">
        <input type="submit", value="Cancel and Back" class="stayLeftButton">
    </form>
   
    
    
    
</main>