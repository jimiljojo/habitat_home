<?php
	
	// FILE: Registration Info View

	// AUTHOR: des301

	global $act;
	global $msg;
	global $total;

?>
<style>
    label
    {
        padding-left: 10px;
        
    }
    input
    {
        margin-bottom: 8px;
    }
    </style>
	<h4>Personal Information</h4>
        <br/>
	<?php include 'progress.php'; ?>
	<hr>
	<br>
	<form  action="index.php" method="get">
		<input name="act" type="hidden" value="<?php echo $act;?>" >
		<input name="fname" type="text" value="John"><label>First Name</label>*</span></label><br/>
		<input name="lname" type="text" value="Doe"><label>Last Name</label>*</span></label><br/>
		<input name="street" type="text" value="123 Main Street"><label>Street</label>*</span></label><br/>
		<input name="city" type="text" value="Anytown"><label>City</label>*</span></label><br/>
		<input name="state" type="text" value="pa"><label>State</label>*</span></label><br/>
		<input name="zip" type="text" value="12345"><label>Zip</label>*</span></label><br/>
		<input name="phone" type="text" value="7175559876"><label>Phone</label>*</span></label><br/>
		<input name="email" type="text" value="jd@email.com"><label>Email<span class="mandatory">*</span></label><br/>
		<input name="employer" type="text" value="Mega Corp"><label>Employer</label><br/>
		<input name="workPhone" type="text" value="7175554321"><label>Work Phone</label><br/>
		<input name="occupation" type="text" value="Laborer"><label>Title/Occupation</label><br/>
		<input name="cellPhone" type="text" value="7175555309"><label>Cell Phone</label><br/>
		<br>
		<input class="btn btn-success" name="submit" type="submit" value="submit" >
		<br>
	</form>
	<br>
	<hr>
	<span class="note"><span class="mandatory">*</span> Required<br>
	Email address is essential in order to receive monthly updates and special invitations
	</span>
