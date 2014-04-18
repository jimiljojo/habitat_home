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
		max-width:50%;
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

<center><input type="button"  class="btn btn-primary btn-sm" onclick="history.back();" value="cancel"></center>
<br><br>

<h2 class="bold">Create Schedule</h2>
	<form action="index.php" method="GET">
		<input name="dir" id="dir" type="hidden" value="<?php echo $dir; ?>" >
		<input name="sub" id="sub" type="hidden" value="<?php echo $sub; ?>" >
		<input name="act" id="act" type="hidden" value="createSchedule" >
		
		<input type="hidden" name="eventId" value=<?php echo $_GET['eventId']; ?> >
		<table cellspacing="10" class="intTable">
			<tr>
				<td>Description:<span class="mandatory">*</span></td>
				<td><input type="text" name="description"></td>
			</tr>
			
			<tr>	
				<td>Time Start: <span class="mandatory">*</span></td>
				<td><input type="text" name="timeStart"><label>HH:MM:SS</label></td>
			</tr>
			
			<tr>
				<td>Time End: <span class="mandatory">*</span></td>
				<td><input type="text" name="timeEnd"><label>HH:MM:SS</label></td>
			</tr>
			
			<tr>
				<td>Interest: <span class="mandatory">*</span></td>
				<td><select id="interest" name="interest">
					<option value="null">-Select Interest-</option>
					<?php $interests = getInterests();
					foreach ($interests as $interest) {
						?> <option value="<?php echo $interest->getId(); ?>" name="interest"><?php echo $interest->getTitle(); ?></option>
					<?php } ?> </td>
			</tr>
			
			<tr>
				<td>Max Number of People: <span class="mandatory">*</span></td>
				<td><input type="text" name="maxNumPeople"></td>
			</tr>
		</table> 

		<input type="submit" value="create"> </form>	
	</div>
