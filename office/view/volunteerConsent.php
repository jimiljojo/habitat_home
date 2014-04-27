
<hr>
<form action="index.php" method="GET" class="form-horizontal">
 
    <h5><strong>I consent the following: </strong></h5>
    
    
<?php

	
        global $dir;
        global $sub;
        global $act;
        global $msg;
        
        

?>
    
    
    <input name="act" type="hidden" value="confirmCreate" >
    <input name="dir" type="hidden" value="<?php echo $dir; ?>" >
    <input name="sub" type="hidden" value="<?php echo $sub; ?>" >
    <input type="checkbox" name="less18" value="1"  /> I am less than 18 years of age and have read the Minor Waiver<br>
    <input type="checkbox" name="greater18" value="1"  /> I am greater than 18 years of age<br>
    <input type="checkbox" name="photo" value="3"  /> I consent for my photo to be used by Habitat<br>
    <input type="checkbox" name="safetyGuidelines" value="4"  /> I have read the Construction Safety Guidelines<br>
    <input type="checkbox" name="video" value="5"  /> I have viewed the Construction Safety video<br>
    <input type="checkbox" name="liability" value="6"  /> I accept the terms of Liability Waiver Form<br><br>
    
    <h5><strong>Emergency Contact Information: </strong></h5>
    <table>
    <tr><td> Emergency Name: </td><td> <input type="text" name="emergencyName" ></td></tr><br>
    
    <tr><td>Phone Number: </td><td> <input type="text" name="phone"></td><tr></table><br><br>
    <script type="text/javascript">
    function check(){
        if (document.getElementById('emergencyName').value==""
                 || document.getElementById('emergencyName').value==undefined)
                {
                    alert ("Please enter the Emergency Name");
                    return false;
                }

        else if (document.getElementById('phone').value==""
                 || document.getElementById('phone').value==undefined)
                {
                    alert ("Please enter the Emergency Phone Number");
                    return false;
                }

        else if (document.getElementById('less18').value == document.getElementById('greater18').value)
                {
                    alert ("Age cannot be less than 18 and greater than 18. Please select an appropriate option!");
                    return false;
                }

        else{
            return true;
        }

    }
    </script>
    <button value="submit" onclick="return check();">Create Volunteer</button>
</form>
<hr>
<span class="note">
    You can not un-check items that have been already completed.<br>
    You must be over the age of 16 and have completed all consent requirements to be available for construction work.<br>
    Emergency contact information must be enter to be available for construction work.
</span>
