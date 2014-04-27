<?php
//bmw5285
?>

<script>
function check() {
	var a=confirm("You are about to sign up for an event");
		if (a===true)
		{
			document.getElementById("personSchedule").submit();
		}
}
</script>

<h4>Schedule</h4>
	<div>
		<table class="table table-striped table-hover " style="width:100%">
			<tr>
				<th>Select</th>
				<th>Description</th>
				<th>Start Time</th>
				<th>End Time</th>
				<th>Interest</th>
				<th></th>
			</tr>
			<form id="personSchedule" action="index.php" method="GET">
				<input name="dir" id="dir" type="hidden" value="<?php echo $dir; ?>" >
				<input name="sub" id="sub" type="hidden" value="<?php echo $sub; ?>" >
				<input name="act" id="act" type="hidden" value="personSchedule" >
				<input name="personId" type="hidden" value="<?php echo $_SESSION['personid']; ?>" >	
			<?php $EventSchedule= getEventSchedules($_GET['eventId']);
			foreach ($EventSchedule as $EventScheduleItem){
				$interest = readInterest($EventScheduleItem->getInterest_interest_id());
				//echo $EventScheduleItem->getId();
				?>
			<tr>	
				<td> <input type="checkBox" name="check_list[]" value="<?php echo $EventScheduleItem->getId(); ?>"> </td>
				<td> <?php echo $EventScheduleItem->getDescription(); ?> </td>
				<td> <?php echo $EventScheduleItem->gettimeStart(); ?> </td>
				<td> <?php echo $EventScheduleItem->gettimeEnd(); ?> </td>
				<td> <?php echo $interest[0]->getInterest_title(); ?> </td>
			</tr>
				<?php }?>
		</table>
	</div>
<hr>
<button onclick="check()">Sign up</button>

<?php/*
if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $check) {
            echo $check; //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
    }
}*/
?>
