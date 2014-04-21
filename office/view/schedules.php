<?php

	// TITLE: Office Interests View
	// FILE: office/view/schedules.php
	// AUTHOR: Brandon Willis; bmw5285


?>

<style> /* css */ 

	input[type=submit] 
	{
		width: 125px;
		height: 40px;
	}
	
	input[type=text]
	{
		width: 125px;
	}
	
	input[name=searchByVolunteer]
	{
		width: 125px;
	}
	
	#update
	{
		position:relative;
		top:18px;
		display:inline;
	}
	
	#delete
	{
		position:relative;
		top:18px;
		display:inline;
	}
	
	form
	{
		padding-left: 20px;
		max-width:675px;
	}
	
	select
	{
		alignment: center;
	}
	
	#searchBy
	{
		width: 23em;
		height: 30px;
		alignment: bottom;
	}
	
</style>




<!--/////////////////////////////////////////		javascript			\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
<script type="text/javascript" src="js/searchByHandler.js"></script>  <!-- I cant get this to work externally --> <!--This script changes the input boxes after drop down menu-->
<script type="text/javascript">
	function searchByHandler() {
	
	var show = "inline";
	var hide = "none";
	
	var v = document.getElementById("searchBy").value;
	var i1 = document.getElementById("input1");
	var i2 = document.getElementById("input2");
	
	// city, street, address, amount, municipality, bank, organization, zip code
	// mortgage number, interest, auction item, sponsor, event
	
	//alert(v);
	
	switch (v) {
	
	    case "name":
	    case "contact":
	    case "donor":
			i1.placeholder = "first name";
			i2.placeholder = "last name";
			i2.style.display = show;
		break;

	    case "amount":
			i1.placeholder = "low amount";
			i2.placeholder = "high amount";
			i2.style.display = show;
		break;
	    
	    case "date":
			i1.placeholder = "month";
			i2.placeholder = "year";
			i2.style.display = show;
		break;
		
	    case "bank":
	    case "city":
	    case "municipality":
	    case "organization":
	    case "sponsor":
	    case "street":
			i1.placeholder = v + " name";
			i2.placeholder = "not used";
			i2.style.display = hide;
		break;
	    
	    case "state":
			i1.placeholder = v + " abbreviation";
			i2.placeholder = v + " name";
			i2.style.display = show;
		break;

	    case "zip":
			i1.placeholder = v + " code";
			i2.placeholder = "not used";
			i2.style.display = hide;
		break;
	
	    case "address":
			i1.placeholder = "street";
			i2.placeholder = "zip code";
			i2.style.display = show;
		break;
		
	    case "mortgage":
			i1.placeholder = v + " number";
			i2.placeholder = "not used";
			i2.style.display = hide;
		break;
		
		case "interest":
			i1.placeholder = "interest";
			i2.placeholder = "not used";
			i2.style.display = hide;
		break;
		
	    default:
			i1.placeholder = "input 1";
			i2.placeholder = "input 2";
			i2.style.display = show;
		break;
		
	}// end switch
	
}// end function
	
function dropDownMenu()
{
	var show = "inline";
	var hide = "none";
	
	var v = document.getElementById("searchby").value;
	var z = document.getElementById("create").value;
	var i1 = document.getElementById("vol1");
	var i2 = document.getElementById("vol2");
	var i3 = document.getElementById("vol3");
	
	switch (v)
	{			
		case "readInterest":
			i1.style.display = show;
			i2.style.display = hide;
		break;
		
		case "readInterestType":
			i1.style.display = hide;
			i2.style.display = show;
		break;
		
		case "readScheduleByEvent":
			i1.style.display = show;
			i2.style.display = hide;
		break;
		
		case "readScheduleByName":
			i1.style.display = hide;
			i2.style.display = show;
		break;
		
		default:
			i1.style.display = hide;
			i2.style.display = hide;
		break;
	}
	
	if (z == "createScheduleSlot")
	{
		i3.style.display = show;
	}
	else
	{
		i3.style.display = hide;
	}
}
</script>


<!--/////////////////////////////////////////			HTML			\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
<h2>Schedule and Schedule Slot Search</h2> 
<hr>
<br><br>
<div>
	<form name="list" action="index.php" method="GET"> <!-- view all form -->
		<input name="dir" type="hidden" value="<?php echo $dir; ?>" >
		<input name="sub" type="hidden" value="<?php echo $sub; ?>" >
		<input type="submit" value="View All"> <!-- view all button -->
		<select id="viewAll" name="act" action="listInterests.php" method="GET"> <!-- drop down menu -->
			<option value="" disabled selected="selected">-Select-</option> <!-- drop down menu option; default -->
			<option name="schedule" value="listSchedule">Schedule</option> <!-- drop down menu option -->
			<option name="scheduleSlot" value="listScheduleSlot">Schedule Slot</option> <!-- drop down menu option -->
		</select> <!-- end drop down menu -->
	</form> <!-- end view all form -->
</div><br>

<div>
	<form name="create" action="index.php" method="GET"> <!-- view all form -->
		<input name="dir" type="hidden" value="<?php echo $dir; ?>" >
		<input name="sub" type="hidden" value="<?php echo $sub; ?>" >
		<input type="submit" value="Create New"> <!-- create button -->
		<select id="create" name="act" onclick='dropDownMenu()'> <!-- drop down menu -->
			<option value="" disabled selected="selected">-Select-</option> <!-- drop down menu option; default -->
			<option name="schedule" value="createSchedule">Schedule</option> <!-- drop down menu option -->
			<option name="scheduleSlot" value="createScheduleSlot">Schedule Slot</option> <!-- drop down menu option -->
		</select> <!--end drop down menu options-->
		<select id="vol3" name="id" action="/model/interests.php" method="POST" style="display:none">
			<option value="" disabled selected>-Select Event-</option>
			<?php //creates drop down menu options AND alphabetizes 
				//require_once '/class/interest.php';
				$events = $dbio->readAllEvent();
				//$hold = array();
				foreach($events as &$event)
				{
					$eventId = $event->getEvent_id();
					$eventTitle = $event->getTitle();
					echo "<option value = '{$eventId}' name = '{$eventTitle}'>{$eventTitle}</option>";
				}
			?>
		</select>
	</form>
</div><br>

<div>
	<form name="read" action="index.php" method="GET"> <!-- view all form -->
		<input name="dir" type="hidden" value="<?php echo $dir; ?>">
		<input name="sub" type="hidden" value="<?php echo $sub; ?>">
		<input type="submit" value="Search"> <!-- search by button -->
		<select id="searchby" name="act" onclick='dropDownMenu()' >
			<option value="" disabled selected>-Select-</option>--> <!-- drop down menu option; default -->
			<option value="readScheduleByEvent" name="schedule">Schedule by Event</option>
			<option value="readScheduleByName" name="scheduleSlot">Schedule by Name</option>
		</select>
		<select id="vol1" name="id" action="/model/interests.php" method="POST" style="display:none"> <!-- drop down menu -->
			<option value="" disabled selected>-Select Event-</option> <!-- drop down menu option; default -->
			<?php //creates drop down menu options AND alphabetizes 
				//require_once '/class/interest.php';
				$events = $dbio->readAllEvent();
				//$hold = array();
				foreach($events as &$event)
				{
					$eventId = $event->getEvent_id();
					$eventTitle = $event->getTitle();
					echo "<option value = '{$eventId}' name = '{$eventTitle}'>{$eventTitle}</option>";
				}
			?>
		</select>
				<select id="vol2" name="id" action="/model/interests.php" method="POST" style="display:none"> <!-- drop down menu -->
				<option value="" disabled selected>-Select Name-</option> <!-- drop down menu option; default -->
			<?php
				$persons = $dbio->listPersons();
				foreach($persons as &$person)
				{
					$personId = $person->getPerson_id();
					$personFName = $person->getFirst_name();
					$peronsLName = $person->getLast_name();
					echo "<option value = '{$personId}' name = '{$personFName}, {$peronsLName}'>{$personFName}, {$peronsLName}</option>";
				}
			?>
				</select>
	</form>
</div>
<?php //if(empty($_GET['vol1']) || empty($_GET['vol2'])) {return null;} ?>

