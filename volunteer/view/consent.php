<?php

	// TITLE: Volunteer Consent View
	// FILE: volunteer/view/consent.php
	// AUTHOR: AUTOGEN


?>
<h2>volunteer/view/consent.php</h2>
<hr
    <form>
    <h5><strong>I consent the following: </strong></h5>
    <input type="checkbox" name="16YearsOld" value="Age16"> I am at least 16 years old.<br>
    <input type="checkbox" name="ConsentPhoto" value="PhotoCon"> I consent for my photo to be used by Habitat.<br>
    <input type="checkbox" name="AgreementSigned" value="SignAgree"> I have signed the agreement.<br>
    <input type="checkbox" name="WatchedVideo" value="ViewVideo"> I have viewed the video.<br><br>
    
    <h5><strong>Emergency Contact Information: </strong></h5>
    First Name:  <input type="text" name="firstname"><br>
    Last Name:  <input type="text" name="lastname"><br>
    Phone Number:  <input type="text" name="phonenumber"><br><br>
    <button>Save Changes</button>
</form>
<hr>
<span>
    You can not un-check items that have been already completed.<br>
    You must be over the age of 16 and have completed all consent requirements to be available for construction work.<br>
    Emergency contact information must be enter to be available for construction work.
</span>
