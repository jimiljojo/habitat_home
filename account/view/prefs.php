<?php

	// TITLE: Account Preferences View
	// FILE: account/view/prefs.php
	// AUTHOR: AUTOGEN


?>
<?php
    /* this files is the Donor section index View */
    
?>
<h4>Preferences</h4>

<hr>
<form action="index.php" method="post">
<dl>
    <dt>Receive Mail?</dt>
	<dd><input type="radio" name="mail"id="yes" checked><label>Yes</label></dd>
	<dd><input type="radio" name="mail"id="no"><label>No</label></dd>
    <dt>Receive Email?</dt>
	<dd><input type="radio" name="email"id="yes" checked><label>Yes</label></dd>
	<dd><input type="radio" name="email"id="no"><label>No</label></dd>
    <dt>Receive Calls?</dt>
	<dd><input type="radio" name="phone"id="yes"><label>Home</label></dd>
	<dd><input type="radio" name="phone"id="no"><label>Cell</label></dd>
	<dd><input type="radio" name="phone"id="yes"><label>Work</label></dd>
	<dd><input type="radio" name="phone"id="no" checked><label>None</label></dd>  
</dl>
<button type="button">Update</button>
</form>
<hr>
<span class="note">
    Update your contact preferences here. <br>
    Email may still be used in case you forget your password and start an account recovery.
</span> 
