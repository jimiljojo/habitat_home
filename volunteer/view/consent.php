<h2>volunteer/view/consent.php</h2>
<hr
    
    
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
    <form action"index.php">
    <h5><strong>I consent the following: </strong></h5>
    
    <input name="act" type="hidden" value="updateConsent" >
    <input type="checkbox" name="less18" value="1" <?php echo $less18; ?> <?php if ($less18 == 'checked="checked"') echo 'disabled' ?> /> I am less than 18 years of age and have read the Minor Waiver<br>
    <input type="checkbox" name="greater18" value="2" <?php echo $greater18; ?> <?php if ($greater18 == 'checked="checked"') echo 'disabled' ?> /> I am greater than 18 years of age<br>
    <input type="checkbox" name="photo" value="3" <?php echo $checkedPhoto; ?> <?php if ($checkedPhoto == 'checked="checked"') echo 'disabled' ?> /> I consent for my photo to be used by Habitat<br>
    <input type="checkbox" name="safetyGuidelines" value="4" <?php echo $safetyGuidelines; ?> <?php if ($safetyGuidelines == 'checked="checked"') echo 'disabled' ?> /> I have read the Construction Safety Guidelines<br>
    <input type="checkbox" name="video" value="5" <?php echo $checkedVideo; ?> <?php if ($checkedVideo == 'checked="checked"') echo 'disabled' ?> /> I have viewed the Construction Safety video<br>
    <input type="checkbox" name="liability" value="6" <?php echo $checkLiability; ?> <?php if ($checkLiability == 'checked="checked"') echo 'disabled' ?> /> I accep the terms of Liability Waiver Form<br><br>
    
    <h5><strong>Emergency Contact Information: </strong></h5>
    <table>
    <tr><td> Emergency Name: </td><td> <input type="text" name="emergencyName" value="<?php echo $dbName; ?>"></td></tr><br>
    
    <tr><td>Phone Number: </td><td> <input type="text" name="phone" value="<?php echo $dbPhone; ?>"></td><tr></table><br><br>
    <button value="submit">Save Changes</button>
</form>
<hr>
<span class="note">
    You can not un-check items that have been already completed.<br>
    You must be over the age of 16 and have completed all consent requirements to be available for construction work.<br>
    Emergency contact information must be enter to be available for construction work.
</span>
