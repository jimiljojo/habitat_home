<?php
	
	// FILE: Registration Review View

	// AUTHOR: des301

	global $dir;
	global $sub;
	global $act;
	global $msg;
	global $total;
	$progress = 5;
	
	$act = 'getInfo';
?>


	<form  action="index.php" method="post">
		<input name="dir" type="hidden" value="<?php echo $dir;?>" >
		<input name="act" type="hidden" value="<?php echo $act;?>" >
		<img src="../img/habitat_logo.jpg" alt="Habitat Logo" style="height:250px; width:600px;" />
		<br>
		<br>
		<br>
		<input class="btn btn-success" style="margin-left: 100px;" type="submit" name="submit" value="Start"> Click to start the Volunteer Registration process...<br>
	</form>
	
	<br>
	<hr>