<h2>volunteer/view/consent.php</h2>
<hr
    <form>
    <h5><strong>I consent the following: </strong></h5>
    
<?php

	// TITLE: Volunteer Consent View
	// FILE: volunteer/view/consent.php
	// AUTHOR: Logan Gurreri

        global $checked16;
        global $checkedPhoto;
        global $checkedSigned;
        global $checkedVideo;
        global $consent;
        global $test;
        $test = 'Ben';
        
        $checked16 = 'Yes';
        $checkedPhoto = 'No';
        $checkedSigned = 'No';
        $checkedVideo = 'Yes';
        
        $checked16 = ($checked16 == 'Yes') ? 'checked="checked"' : '';
        $checkedPhoto = ($checkedPhoto == 'Yes') ? 'checked="checked"' : '';
        $checkedSigned = ($checkedSigned == 'Yes') ? 'checked="checked"' : '';
        $checkedVideo = ($checkedVideo == 'Yes') ? 'checked="checked"' : '';

?>

    <input type="checkbox" name="ofAge" value="0" <?php echo $checked16; ?> <?php if ($checked16 == 'checked="checked"') echo 'disabled' ?> /> I am at least 16 years old.<br>
    <input type="checkbox" name="photoOk" value="1" <?php echo $checkedPhoto; ?> <?php if ($checkedPhoto == 'checked="checked"') echo 'disabled' ?> /> I consent for my photo to be used by Habitat.<br>
    <input type="checkbox" name="AgreementSigned" value="2" <?php echo $checkedSigned; ?> <?php if ($checkedSigned == 'checked="checked"') echo 'disabled' ?> /> I have signed the agreement.<br>
    <input type="checkbox" name="WatchedVideo" value="3" <?php echo $checkedVideo; ?> <?php if ($checkedVideo == 'checked="checked"') echo 'disabled' ?> /> I have viewed the video.<br><br>
    
    <h5><strong>Emergency Contact Information: </strong></h5>
    First Name: <input type="text" name="firstname"><br>
    Last Name:  <input type="text" name="lastname"><br>
    Phone Number:  <input type="text" name="phonenumber"><br><br>
    <button>Save Changes</button>
</form>
<hr>
<span class="note">
    You can not un-check items that have been already completed.<br>
    You must be over the age of 16 and have completed all consent requirements to be available for construction work.<br>
    Emergency contact information must be enter to be available for construction work.
</span>
