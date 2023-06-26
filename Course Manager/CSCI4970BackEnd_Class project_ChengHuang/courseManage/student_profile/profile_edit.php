<?php include '../view/body.php'; ?>

<main>
    <form action="." method="post" id="">
        <input type="hidden" name="action" value="changes_save">
        
        <label class="stayLeftLabel">Name:</label>
        <input type="text" name="studentName" class="stayLeftButton" value="<?php echo $sProfile['name'];?>">
         
        <input type="hidden" name="studentID" value="<?php echo $sProfile['studentID'];?>">  
        
        <label class="stayLeftLabel">Gender:</label>
        <select name="gender" class="selectGender">
            <option value="Male" <?php if($sProfile['gender'] == "Male"){echo "selected";}?>>Male</option>
            <option value="Female" <?php if($sProfile['gender'] == "Female"){echo "selected";}?>>Female</option>
        </select>
        
        <label class="stayLeftLabel">Birthday:</label>
        <input type="text" name="birth" class="stayLeftButton" value="<?php if($sProfile['birth'] == null){echo 'None';}  else {echo $sProfile['birth'];} ?>">
        <p5>Use 'yyyy-mm-dd' format</p5>
        
        <label class="stayLeftLabel">E-mail:</label>
        <input type="text" name="email" class="stayLeftButton" value="<?php echo $sProfile['email']; ?>">
       
        <br>
        <br>
        
        <input type="submit", value="Save changes" class="stayLeftButton"> 
    </form>
        
</main>

