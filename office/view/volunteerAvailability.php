
<hr>
<form action="index.php" method="GET" class="form-horizontal">
    
    <h5><strong>I am available to work: </strong></h5>

<?php

	
        
        global $dir;
        global $sub;
        global $act;
        global $msg;
?>
    <input name="act" type="hidden" value="getConsent" >
    <input name="dir" type="hidden" value="<?php echo $dir; ?>" >
    <input name="sub" type="hidden" value="<?php echo $sub; ?>" >
    <input name="day" type="checkbox" /> Days<br>
    <input name="evening" type="checkbox"  /> Evenings<br>
    <input name="weekend" type="checkbox"  /> Weekends<br><br>
    <button>Next</button>
</form>
<hr>
<span class="note">
    Here is where you can chose your availabilities for work
</span>
