<?php include '../view/body.php'; ?>

<main>
    <form action="." method="post">
        <input type="hidden" name="action" value="profile_edit_page">
        
        <h2>Hi, <?php echo $sProfile['name'];?></h2>
        <input type="hidden" name="studentName" value="<?php echo $sProfile['name'];?>">
        
        <label class="stayLeftLabel">Student ID: <?php echo $sProfile['studentID'];?></label><br>   
        <input type="hidden" name="studentID" value="<?php echo $sProfile['studentID'];?>">  
        
        <label class="stayLeftLabel">Gender: <?php echo $sProfile['gender']; ?></label><br>
        <input type="hidden" name="gender" value="<?php echo $sProfile['gender']; ?>">
        
        
        <label class="stayLeftLabel">Birthday: <?php if($sProfile['birth'] == null){echo 'None';}  else {echo $sProfile['birth'];} ?></label><br>
        <input type="hidden" name="name" value="<?php echo $sProfile['birth']; ?>">
        
        <label class="stayLeftLabel">E-mail: <?php echo $sProfile['email']; ?></label><br>
        <input type="hidden" name="email" value="<?php echo $sProfile['email']; ?>">
       
        <br>
        
        <input type="submit", value="Edit Profile" class="stayLeftButton">
        
    </form>
    
    <br>
    
    <form action="." method="post" id="">
        <input type="hidden" name="action" value="password_change_page">
        <input type="hidden" name="password" value="<?php echo $sProfile['password']?>">
        <input type="hidden" name="studentID" value="<?php echo $sProfile['studentID'];?>">  
        <input type="submit", value="Change Password" class="stayLeftButton">
    </form>
    
    <br>
    
    <form action="." method="post" id="">
        <input type="hidden" name="action" value="personal_page">
        <input type="hidden" name="studentID" value="<?php echo $sProfile['studentID'];?>">  
        <input type="submit", value="Back to previous page" class="stayLeftButton">
    </form>
    
    
</main>