


<center><input type="button"  class="btn btn-primary btn-sm" onclick="history.back();" value="Back"></center>

<script type="text/javascript">
	function retrieve(n) {
		document.getElementById("pid").value=n;
		document.getElementById("viewDonationsForm").submit();
			}
</script>

<br><br>
<form id="viewDonationsForm" action="index.php" method="GET">
<input name="dir" id="dir" type="hidden" value="<?php echo $dir; ?>" >
<input name="sub" id="sub" type="hidden" value="<?php echo $sub; ?>" >
<input name="act" id="act" type="hidden" value="read" >
<input name="pid" id="pid" type="hidden" value="0">
<?php 
	
	echo '<table class="table table-striped table-hover " style="width:100%"><tr><th>Type</th><th>Details</th><th>Value</th><th>Date</th><th>Time</th><th>From</th><th>Where</th></tr>';
		
		foreach ($tableinfo as $info) {
			$info->getDetails();
		}
			
		
		echo '</table>';
?>
</form>
<!--results can be listed here, pushing text down.-->




<!-- end-->
