


<center><input type="button"  class="btn btn-primary btn-sm" onclick="history.back();" value="Back"></center>

<script type="text/javascript">
	function retrieve(n) {
		document.getElementById("did").value=n;
		document.getElementById("viewDonationsForm").submit();
			}
</script>

<br><br>
<form id="viewDonationsForm" action="index.php" method="GET">
<input name="dir" id="dir" type="hidden" value="<?php echo $dir; ?>" >
<input name="sub" id="sub" type="hidden" value="<?php echo $sub; ?>" >
<input name="act" id="act" type="hidden" value="editDonation" >
<input name="did" id="did" type="hidden" value="0">
<?php

	$donations = $tableinfo[0];
	$donors = $tableinfo[1];
	echo '<table class="table table-striped table-hover " style="width:100%"><tr><th>Type</th><th>Details</th><th>Value</th><th>Date</th><th>Time</th><th>From</th><th>Where</th></tr>';
		
	foreach ($donations as $donation) {
		echo '<tr onclick="retrieve(' . $donation->getDonation_id() . ');">';
		echo '<td>' . $donation->getType() . '</td>';
		echo '<td>' . $donation->getDetails() . '</td>';
		echo '<td>' . $donation->getValue() . '</td>';
		echo '<td>' . $donation->getDate() . '</td>';
		echo '<td>' . $donation->getTime() . '</td>';
		foreach ($donors as $donor) {
			if($donation->getDonation_id() == $donor->getDonation_id())
				echo '<td>' . $donor->getDonatedby() . '</td>';
		}		
		echo '<td>' . $donation->getEvent() . '</td>';
		echo '</tr>';
	}
	
		
		echo '</table>';
?>
</form>
<!--results can be listed here, pushing text down.-->




<!-- end-->
