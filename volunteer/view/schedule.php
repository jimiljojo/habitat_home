<?php
    //SCW5137
	
    global $dir;
    global $sub;
    global $act;
    global $msg;
    global $dbio;
    
    

   // $schedules = $dbio->getVolunteerEvents(2); //getAllEvents() //$personId hard set
	

    //Code has been tested using a database
?>
<style>
    input.signedUp {
        background: #cc0000;
        color: white;
        margin-top: 4px;
				padding_bottom: 100px;
    }
    
    input.notSignedUp {
        background: #009900;
        color: black;
        margin-top: 4px;
        color: white;
    }
    
    td
    {
        width: 160px;
        text-align: left;
		height: 50px;
    }
    
    th
    {
        text-align: left;
		height: 250px;
		vertical-align:top;
    }
	
	h4.other
	{
	border-bottom-style: dotted;
	padding-bottom: 20px;
	border-width:1px;
	border-color:lightgrey;
	}
	
    table.VolSchedule{
        width: 55em;
    }
    
    table.VolSchedule tr:nth-child(2n+3) td {background-color: lavender;}
    

</style>
<h4>Your Volunteer Schedule</h4>
<hr>
<table class="VolSchedule">
    <tr><th>Status</th><th>Event Name</th><th>Event Date</th><th>Event Time</th><th>Event Location</th><th>Event Type</th></tr>
<?php 

foreach($schedules as $schedule) {
    
    if($schedule->getEventStatus() == 0) {
	echo '<form action="index.php" method="GET">';
	echo '<input type="hidden" name="dir" value="' . $dir . '"/>';
	echo '<input type="hidden" name="sub" value="' . $sub . '"/>';
	echo '<input type="hidden" name="act" value="' . $act . '"/>';
	echo '<input type="hidden" name="changeStatus" class="Signedup" value="1"/>';
	echo '<input type="hidden" name="eventId" class="Signedup" value="' . $schedule->getEventId(). '"/>';
	echo '<tr>';
	echo '<td><input type="submit" name="update" class="signedUp" value="Drop Event" /></td>';
	echo '<td class="eventName"><a href="index.php?dir=' .$dir . '&sub=' . $sub . '&act=eventDescription&eventId=' . $schedule->getEventId(). '">' . $schedule->getEventTitle() . '</a></td>';
	echo '<td>' . $schedule->getEventDate() . '</td>';
	echo '<td style="width: 100px;">' . $schedule->getEventTime() . '</td>';
	echo '<td>' . $schedule->getEventLocation() . '</td>';
	echo '<td  style="width: 100px;">' . $dbio->getEventType($schedule->getEventType_Id()) . '</td>';
	echo '</tr>';
	echo '</form>';
    }// end if
 }// end foreach

 ?>
    </table>

    <h4 class='other'>Other Events</h4>
    <table class="VolSchedule">
    <tr><th>Status</th><th>Event Name</th><th>Event Date</th><th>Event Time</th><th>Event Location</th><th>Event Type</th></tr>

<?php
 foreach($schedules as $schedule)
 {
    if($schedule->getEventStatus() == 1)
    {
    echo '<form action="index.php" method="GET">';
    echo '<input type="hidden" name="dir" value="' . $dir . '"/>';
    echo '<input type="hidden" name="sub" value="' . $sub . '"/>';
    echo '<input type="hidden" name="act" value="' . $act . '"/>';
    echo '<input type="hidden" name="changeStatus" class="Signedup" value="0"/>';
    echo '<input type="hidden" name="eventId" class="Signedup" value="' . $schedule->getEventId() . '"/>';
    echo '<tr>';
    echo '<td><input type="submit" name="update" class="notSignedUp" value="Add Event" /></td>';
echo '<td class="eventName"><a href="index.php?dir=' .$dir . '&sub=' . $sub . '&act=eventDescription&eventId=' . $schedule->getEventId(). '">' . $schedule->getEventTitle() . '</a></td>';
    echo '<td>' . $schedule->getEventDate() . '</td>';
	echo '<td  style="width: 100px;">' . $schedule->getEventTime() . '</td>';
	echo '<td>' . $schedule->getEventLocation() . '</td>';
	echo '<td style="width: 100px;">' . $dbio->getEventType($schedule->getEventType_Id()) . '</td>';
    echo '</tr>';
    echo '</form>';
    }
 }
 
 ?>
</table>
<hr/>
<span class="note">
    Here is the list of events you are signed up for <br>
    You can make changed to your schedule here as well
</span>

