<?php

	// TITLE: Account Preferences View
	// FILE: account/view/prefs.php
	// AUTHOR: AUTOGEN


?>
<?php
    $pid = $_SESSION['personid'];
    $email = $person->getPrefEmail();
    $mail = $person->getPrefMail();
    $phone = $person->getPrefPhone();
    if($update)
		echo '<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>UPDATED</strong> You successfully updated the information.</div>';
?>
<h2>Preferences</h2>

<hr>
<br>
<form action="index.php" method="GET">
	<input name="dir" type="hidden" value="<?php echo $dir; ?>" >
	<input name="sub" type="hidden" value="<?php echo $sub; ?>" >
	<input name="act" type="hidden" value="update" >
	<input name="pid" type="hidden" value="<?php echo $pid; ?>" >
	<dl>
	    <dt>Receive Email?</dt>
		<dd><input type="radio" name="mail"id="yes" value="1" <?php echo $email ? 'checked' : ''; ?>><label>Yes</label></dd>
		<dd><input type="radio" name="mail"id="no" value="0" <?php echo !$email ? 'checked' : ''; ?>><label>No</label></dd>
	    <dt>Receive Mail?</dt>
		<dd><input type="radio" name="email"id="yes" value="1" <?php echo $mail ? 'checked' : ''; ?>><label>Yes</label></dd>
		<dd><input type="radio" name="email"id="no" value="0" <?php echo !$mail ? 'checked' : ''; ?>><label>No</label></dd>
	    <dt>Receive Calls?</dt>
		<dd><input type="radio" name="calls"id="yes" value="1" <?php echo $phone ? 'checked' : ''; ?>><label>Yes</label></dd>
		<dd><input type="radio" name="calls"id="no" value="0" <?php echo !$phone ? 'checked' : ''; ?>><label>No</label></dd>
	</dl>
	<input type="submit" value="Update">
</form>
<hr>
<h5>
 Update your preferred method of contact for Habitat for Humanity
</h5>
<!--<span class="note">
    Update your contact preferences here. <br>
    Email may still be used in case you forget your password and start an account recovery.
</span> -->
