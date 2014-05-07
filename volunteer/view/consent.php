<h2>Your Consents</h2>
<hr>
<form action"index.php">
    <h5><strong>I consent the following: </strong></h5>
    
    
<?php

	// TITLE: Volunteer Consent View
	// FILE: volunteer/view/consent.php
	// AUTHOR: Logan Gurreri
        global $dir;
        global $sub;
        global $act;
        global $msg;
        global $less18;
        global $greater18;
        global $checkedPhoto;
        global $safetyGuidelines;
        global $checkedVideo;
        global $checkLiability;
        global $consent;
        $act='updateConsent';

        $dbconsent=getVolunteerConsent();
        $dbMinor=$dbconsent->getMinor();
        $dbMajor=$dbconsent->getMajor();
        $dbPhoto=$dbconsent->getPhoto();
        $dbSafety=$dbconsent->getSafety();
        $dbVideo=$dbconsent->getVideo();
        $dbWaiver=$dbconsent->getWaiver();
        $dbName=$dbconsent->getName();
        $dbPhone=$dbconsent->getPhone();
        
        if($dbMinor=="1"){
            $less18='Yes';
        }
        else{
            $less18='No';
        }

        if($dbMajor=="1"){
            $greater18='Yes';
        }
        else{
            $greater18='No';
        }

        if($dbPhoto=="1"){
            $checkedPhoto='Yes';
        }
        else{
            $checkedPhoto='No';
        }

        if($dbSafety=="1"){
            $safetyGuidelines='Yes';
        }
        else{
            $safetyGuidelines='No';
        }

        if($dbVideo=="1"){
            $checkedVideo='Yes';
        }
        else{
            $checkedVideo='No';
        }

        if($dbWaiver=="1"){
            $checkLiability='Yes';
        }
        else{
            $checkLiability='No';
        }
        // $less18 = 'Yes';
        // $greater18='No';
        // $checkedPhoto = 'Yes';
        // $safetyGuidelines = 'Yes';
        // $checkedVideo = 'Yes';
        // $checkLiability= 'Yes';
        
        $less18 = ($less18 == 'Yes') ? 'checked="checked"' : '';
        $greater18 = ($greater18 == 'Yes') ? 'checked="checked"' : '';
       // $less18 = ($checked16 == 'Yes') ? 'checked="checked"' : '';
        $checkedPhoto = ($checkedPhoto == 'Yes') ? 'checked="checked"' : '';
        $safetyGuidelines = ($safetyGuidelines == 'Yes') ? 'checked="checked"' : '';
        $checkedVideo = ($checkedVideo == 'Yes') ? 'checked="checked"' : '';
        $checkLiability = ($checkLiability == 'Yes') ? 'checked="checked"' : '';


?>
    
    
    <input name="act" type="hidden" value="updateConsent" >
    <input name="dir" type="hidden" value="<?php echo $dir; ?>" >
    <input name="sub" type="hidden" value="<?php echo $sub; ?>" >
    <input type="checkbox" name="less18" value="1" <?php echo $less18; ?> <?php if ($less18 == 'checked="checked"') ?> /> I am less than 18 years of age and have read the <a href="http://www.yorkhabitat.org/TDE_CMS/database/userfiles/file/2013/YorkHabitatMinorWaiverRelease.pdf">Minor Waiver</a><br>
    <input type="checkbox" name="greater18" value="1" <?php echo $greater18; ?> <?php if ($greater18 == 'checked="checked"') ?> /> I am greater than 18 years of age<br>
    <input type="checkbox" name="photo" value="3" <?php echo $checkedPhoto; ?> <?php if ($checkedPhoto == 'checked="checked"') ?> /> I consent for my photo to be used by Habitat<br>
    <input type="checkbox" name="safetyGuidelines" value="4" <?php echo $safetyGuidelines; ?> <?php if ($safetyGuidelines == 'checked="checked"') ?> /> I have read the <a href="http://www.yorkhabitat.org/TDE_CMS/database/userfiles/file/2013/ConstructionSafety.pdf">Construction Safety Guidelines</a><br>
    <input type="checkbox" name="video" value="5" <?php echo $checkedVideo; ?> <?php if ($checkedVideo == 'checked="checked"') ?> /> I have viewed the <a href="http://www.yorkhabitat.org/TDE_CMS/database/userfiles/file/ConstructionVideo.html">Construction Safety video</a><br>
    <input type="checkbox" name="liability" value="6" <?php echo $checkLiability; ?> <?php if ($checkLiability == 'checked="checked"') ?> /> I accept the terms of <a href="http://www.yorkhabitat.org/TDE_CMS/database/userfiles/file/waiverform20120711.pdf">Liability Waiver Form</a><br><br>
    
    <h5><strong>Emergency Contact Information: </strong></h5>
    <table>
    <tr><td> Emergency Name: </td><td> <input type="text" name="emergencyName" value="<?php echo $dbName; ?>"></td></tr><br>
    
    <tr><td>Phone Number: </td><td> <input type="text" name="phone" value="<?php echo $dbPhone; ?>"></td><tr></table><br><br>
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
    <button value="submit" onclick="return check();">Save Changes</button>
</form>
<hr>
<h5>
    <br>You can not un-check items that have been already completed.<br>
    <br>You must be over the age of 16 and have completed all consent requirements to be available for construction work.<br>
    <br>Emergency contact information must be enter to be available for construction work.
</h5>