<h4>Volunteer Consent</h4>
<hr>
<form action="" method="GET">
	<label class="bold">I consent the following...</label><br>
	<br>
	<input name="id" type="hidden" value="<?php //$person->getId(); ?>" />
       
<?php
       
    global $checked16;
    global $checkedPhoto;
    global $checkedSigned;
    global $checkedVideo;
    global $consent;
    
    require_once 'model/dbio_klt5179.php';
    
    //$consent = $dbio->getConsent($vid='12');
    
    $checked16 = 'Yes';
    $checkedPhoto = 'Yes';
    $checkedSigned = 'No';
    $checkedVideo = 'Yes';
    
    //$checked16 = ($consent->get16() == 'Yes') ? 'checked="checked"' : '';
    //$checkedPhoto = ($consent->getPhoto() == "Yes") ? 'checked="checked"' : '';
    //$checkedSigned = ($consent->getSigned() == "Yes") ? 'checked="checked"' : '';
    //$checkedVideo = ($consent->get16() == "Yes") ? 'checked="checked"' : '';
    
    $checked16 = ($checked16 == 'Yes') ? 'checked="checked"' : '';
    $checkedPhoto = ($checkedPhoto == 'Yes') ? 'checked="checked"' : '';
    $checkedSigned = ($checkedSigned == 'Yes') ? 'checked="checked"' : '';
    $checkedVideo = ($checkedVideo == 'Yes') ? 'checked="checked"' : '';
    
    
?>      
        <input name="ofAge" type="checkbox" value="0" <?php echo $checked16; ?> <?php if ($checked16 == 'checked="checked"') echo 'disabled' ?> /> I am 16 years or older.<br/>
        <input name="picsOk" type="checkbox" value="1" <?php echo $checkedPhoto; ?> <?php if ($checkedPhoto == 'checked="checked"') echo 'disabled' ?> /> I consent to my photo image being used by Habitat.<br/>
        <input name="signed" type="checkbox" value="2" <?php echo $checkedSigned; ?> <?php if ($checkedSigned == 'checked="checked"') echo 'disabled' ?> /> I have signed the agreement.<br/>
        <input name="watchedVideo" type="checkbox" value="3" <?php echo $checkedVideo; ?> <?php if ($checkedVideo == 'checked="checked"') echo 'disabled' ?> /> I have watched the video.<br/>     
        <br/>
	<label class="bold">Emergency Contact Information</label><!--<span class="note"> only required for construction work</span>--><br>
	<input name="fName" type="text" placeholder="First Name">
	<input name="lName" type="text" placeholder="Last Name">
	<input name="phone" type="text" placeholder="Phone"><span class="note">no dashes</span><br>
	<br>
	<input type='submit' value='Update'><br>
</form>
<hr>
<span class='note'>
<ul>
    <li>You may not un-check things that you have completed</li>
    <li>You must be over 16 years old and have completed the above requirements to do construction work</li>
    <li>You must supply an emergency contact to be available for construction work</li>
</ul>
</span>
