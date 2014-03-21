<h2>volunteer/view/availability.php</h2>
<hr>
<form action="index.php">
    <h5><strong>I am available to work: </strong></h5>

<?php

	// TITLE: Volunteer Availability View
	// FILE: volunteer/view/availability.php
	// AUTHOR: Logan Gurreri
        
        global $dir;
        global $sub;
        global $act;
        global $msg;
        global $checkedDay;
        global $checkedEvening;
        global $checkedWeekend;
        $act='updateAvailability';

         $avail=getAvailability();

        $dbDay=$avail->getDay();
        $dbEve=$avail->getEve();
        $dbWend=$avail->getWend();

        if($dbDay=="1"){
            $checkedDay = 'Yes';
        }

        else{
            $checkedDay= 'No';
        }

        if($dbEve=="1"){
            $checkedEvening= 'Yes';
        }

        else{
            $checkedEvening= 'No';
        }

        if($dbWend=="1")
        {
            $checkedWeekend="Yes";
        }

        else{
            $checkedWeekend="No";
        }
        
        
        $checkedDay = ($checkedDay == 'Yes') ? 'checked= "checked"' : '';
        $checkedEvening = ($checkedEvening == 'Yes') ? 'checked= "checked"' : '';
        $checkedWeekend = ($checkedWeekend == 'Yes') ? 'checked= "checked"' : '';

?>
    <input name="act" type="hidden" value="updateAvailability" >
    <input name="dir" type="hidden" value="<?php echo $dir; ?>" >
    <input name="sub" type="hidden" value="<?php echo $sub; ?>" >
    <input name="day" type="checkbox" value="0" <?php echo $checkedDay; ?> /> Days<br>
    <input name="evening" type="checkbox" value="1" <?php echo $checkedEvening; ?> /> Evenings<br>
    <input name="weekend" type="checkbox" value="2" <?php echo $checkedWeekend; ?> /> Weekends<br><br>
    <button>Save Changes</button>
</form>
<hr>
<span class="note">
    Here is where your availability is displayed.<br>
    You can also make changes to your availability here.
</span>
