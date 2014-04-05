


<center><input type="button"  class="btn btn-primary btn-sm" onclick="history.back();" value="Back"></center>

<script type="text/javascript">
	function retrieve(n) {
		document.getElementById("pid").value=n;
		document.getElementById("viewPersonsForm").submit();
			}
</script>

<br><br>
<form id="viewPersonsForm" action="index.php" method="GET">
<input name="dir" id="dir" type="hidden" value="<?php echo $dir; ?>" >
<input name="sub" id="sub" type="hidden" value="<?php echo $sub; ?>" >
<input name="act" id="act" type="hidden" value="viewPerson" >
<input name="pid" id="pid" type="hidden" value="0">
<?php 
	$persons = $tableinfo[0];
	$contacts = $tableinfo[1];
	$fohs = $tableinfo[2];
	$events = $tableinfo[3];

	echo '<table class="table table-striped table-hover " style="width:100%"><tr><th>Title</th><th>First Name</th><th>Last Name</th><th>DOB</th><th>Phone</th><th>Street 1</th><th>Street 2</th><th>State</th><th>City</th><th>Zip</th><th>FOH</th></tr>';
		
		foreach ($persons as $person) {
			echo '<tr onclick="retrieve(' . $person->getPerson_id() . ');">';
			echo '<td>' . $person->getTitle() . '</td>';
			echo '<td>' . $person->getFirst_name() . '</td>';
			echo '<td>' . $person->getLast_name() . '</td>';
			echo '<td>' . $person->getDob() . '</td>';
			foreach ($contacts as $contact) {
				if($person->getContact() == $contact->getContact_id()){
					echo '<td>' . $contact->getPhone() . '</td>';
					$address = $contact->getAddress();
					echo '<td>' . $address->getStreet1() . '</td>';
					echo '<td>' . $address->getStreet2() . '</td>';
					echo '<td>' . $address->getState() . '</td>';
					echo '<td>' . $address->getCity() . '</td>';
					echo '<td>' . $address->getZip() . '</td>';
					$length = count($fohs);
					$i = 0;
					for ($i = 0; $i < $length; $i++) {
							if($fohs[$i]->getPerson() == $person->getPerson_id()){
								echo '<td>' . $events[$i]->getTitle() . '</td>';
							}
					}
				}
			}
			echo '</tr>';		
		}
			
		
		echo '</table>';
?>
</form>
<!--results can be listed here, pushing text down.-->




<!-- end-->
