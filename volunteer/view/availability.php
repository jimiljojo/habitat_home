<h4>Availability View</h4>
<hr>
<form>
    <label class="bold">I am available to work during...</label><br>
    <br>
<?php
    
    global $dir;
    global $sub;
    global $act;
    global $msg;
    global $checkedDay;
    global $checkedEve;
    global $checkedWend;
        
        /* 
		Original belongs to Dan S., edited by Kyle T.
	*/
    

       
    //$availability = $dbio->getVolunteerAvail($vid='99');
    
    $checkedDay = 'Yes';
    $checkedEve = 'Yes';
    $checkedWend = 'No';
    
    //$checkedDay = ($availability->getDay() == 'Yes') ? 'checked="checked"' : '';
    //$checkedEve = ($availability->getEve() == "Yes") ? 'checked="checked"' : '';
    //$checkedWend = ($availability->getWend() == "Yes") ? 'checked="checked"' : '';
    
    $checkedDay = ($checkedDay == 'Yes') ? 'checked="checked"' : '';
    $checkedEve = ($checkedEve == 'Yes') ? 'checked="checked"' : '';
    $checkedWend = ($checkedWend == 'Yes') ? 'checked="checked"' : '';
?>
        <input name="day" type="checkbox" value="0" <?php echo $checkedDay; ?> /><label>Day</label><br/>
        <input name="eve" type="checkbox" value="1" <?php echo $checkedEve; ?> /><label>Evening</label><br/>
        <input name="wend" type="checkbox" value="2" <?php echo $checkedWend; ?> /><label>Weekends</label><br/>
	<br/>
	<button onclick="validate();">Submit</button>
</form>
<hr>
<span class="note">
    Here is where your availability is displayed. <br>
    You can make changes to your availability here as well.
</span>