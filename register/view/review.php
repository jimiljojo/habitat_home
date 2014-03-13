<?php
	
	// FILE: Registration Review View

	// AUTHOR: des301

	global $dir;
	global $sub;
	global $act;
	global $msg;
	global $total;
	$progress = 4;
?>
	<h4>Volunteer Registration: Review</h4>
	<?php include 'progress.php'; ?>
	<hr>
	<br>
	<form  action="index.php" method="get">
	    <input name="dir" type="hidden" value="<?php echo $dir;?>" >
	    <input name="sub" type="hidden" value="<?php echo $sub;?>" >
	    <input name="act" type="hidden" value="<?php echo $act;?>" >
	    INFORMATION FOR REVIEW HERE
	    <input type="submit" name="submit" value="submit">
	</form>
	<br>
	<hr>