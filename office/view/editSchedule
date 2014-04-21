<?php
//Author: bmw5285
?>

<script>
	function reload()
	{
		document.getElementById("reload")
		window.location = window.location.href;
	}
</script>

<style>

	.bold {font-weight: bold;}
	.note {font-size: 10pt; color: grey;}
	.mandatory {color: crimson;}	

	input
	{
		max-width:100%;
	}
	
    td
    {
        padding-left: 10px;
        padding-bottom: 10px;
        
    }

    div.show {display: block;}
	div.hide {display: none;}
	h4+div{border: 1px solid black;
	}
	

</style>

<?php
	$schedules=readScheduleByScheduleId($_GET['scheduleId']);
?>

<center><input type="button"  class="btn btn-primary btn-sm" onclick="history.back();" value="cancel"></center>
<br><br>

<h2 class="bold">Edit Schedule</h2>
	<form action="index.php" method="GET">
		<input name="dir" id="dir" type="hidden" value="<?php echo $dir; ?>" >
		<input name="sub" id="sub" type="hidden" value="<?php echo $sub; ?>" >
		<input name="act" id="act" type="hidden" value="updateSchedule" >
		<input type="hidden" name="scheduleId" value=<?php echo $_GET['scheduleId']; ?> >
		<table cellspacing="10" class="intTable">
			<tr>
				<td>Description:<span class="mandatory">*</span></td>
				<td><input type="text" name="description" value="<?php echo $schedules[0]->getDescription();?>" ></td>
			</tr>
			
			<tr>	
				<td>Time Start: <span class="mandatory">*</span></td>
				<td><input type="text" name="timeStart" value="<?php echo $schedules[0]->getTimeStart();?>"><label>HH:MM:SS</label></td>
			</tr>
			
			<tr>
				<td>Time End: <span class="mandatory">*</span></td>
				<td><input type="text" name="timeEnd" value="<?php echo $schedules[0]->getTimeEnd();?>"><label>HH:MM:SS</label></td>
			</tr>
			
			<tr>
				<td>Interest: <span class="mandatory">*</span></td>
				<td><select id="interest" name="interest">
					<?php $interests = getInterests();
					$interesti = readInterest($schedules[0]->getInterest_interest_id());?>
					<option value="<?php echo $schedules[0]->getInterest_interest_id(); ?>"><?php echo $interesti[0]->getInterest_title(); ?></option>
					<?php foreach ($interests as $interest) {
						?> <option value="<?php echo $interest->getId(); ?>" name="interest"><?php echo $interest->getTitle(); ?></option>
					<?php } ?> </td>
			</tr>
			
			<tr>
				<td>Max Number of People: <span class="mandatory">*</span></td>
				<td><input type="text" name="maxNumPeople" value="<?php if($schedules[0]->getMaxNumPeople() == null){echo 5;}else{echo $schedules[0]->getMaxNumPeople();}?>"></td>
			</tr>
		</table> 

		<input type="submit" value="update"> </form>	
	</div>
