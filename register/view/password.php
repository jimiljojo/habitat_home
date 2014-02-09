<?php
	
	// FILE: Registration Password View

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
	<h4>System Password</h4>
        <br/>
	<?php include 'progress.php'; ?>
	<hr>
	<form  action="index.php" method="get">
	    <input name="act" type="hidden" value="<?php echo $act;?>" >
	    <input type="password" name="pw1"><label>Password</label><br>
	    <input type="password" name="pw2"><label>Confirm</label> <span style="color:lightgrey; font-size: 10pt;">re-type password</span><br>
	    <br>
	    <input class="btn btn-success" name="submit" type="submit" value="submit" >
	    <br>
	</form>
	<br>
	<hr>
	