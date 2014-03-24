


<center><input type="button"  class="btn btn-primary btn-sm" onclick="history.back();" value="Back"></center>

<br><br>
<?php 
	

	echo '<table class="table table-striped table-hover " style="width:100%"><tr><th>Username </th><th>Title</th><th>First Name</th><th>Last Name</th><th>DOB</th><th>Phone</th><th>Street 1</th><th>Street 2</th><th>State</th><th>City</th><th>Zip</th></tr>';
	
	while($rows = mysql_fetch_array($tableinfo)){
		echo '<tr>';
		echo '<td>' . $rows[0] . '</td>';
		echo '<td>' . $rows[1] . '</td>';
		echo '<td>' . $rows[2] . '</td>';
		echo '<td>' . $rows[3] . '</td>';
		echo '<td>' . $rows[4] . '</td>';
		echo '<td>' . $rows[5] . '</td>';
		echo '<td>' . $rows[6] . '</td>';
		echo '<td>' . $rows[7] . '</td>';
		echo '<td>' . $rows[8] . '</td>';
		echo '<td>' . $rows[9] . '</td>';
		echo '<td>' . $rows[10] . '</td>';
		echo '</tr>';
	}	
		
		echo '</table>';
?>
<!--results can be listed here, pushing text down.-->




<!-- end-->
