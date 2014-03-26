<?php

/*
 * File: /view/listVolunteer.php 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Author: rwg5215
 */
?>
<?php

	$fname = array('Mary', 'Patricia', 'Linda', 'Barbara', 'Elizabeth', 'Jennifer', 'Maria', 'Susan', 'Margareet', 'Dorothy', 'James','John','Robert','Michael','William','David','Richard','Charles','Joseph','Thomas');
    $lname = array('Smith','Johnson','Williams','Brown','Jones','Miller','Davis','Garcia','Rodriguez','Wilson');
    $sname = array('Second', 'Third', 'First','Fourth','Park','Fifth','Main','Sixth','Oak','Seventh');
    $stype = array('St', 'Ave', 'Rd', 'Way', 'Ln');
    $states = array('PA', 'MD', 'NY', 'NJ', 'OH', 'VA', 'IL', 'WV', 'IN', 'TX');
    $cities = array('East St. Louis','Camden','Flint','West Memphis','Saginaw','Detroit','Atlantic City','St. Louis','Newburg','Inkster');
	
?>
<html>
	<head>
		<meta charset="utf-8">
		<style>
			table {border-collapse: collapse;}
			tr:nth-child(2n) {background-color: lavender;}
			tr:hover {background-color: gold;}
			td {padding: 0px 10px;}
		</style>
		<script>
			function retreive(n) {
				var dir = "&dir=" + document.getElementById("dir").value;
				var sub = "&sub=" + document.getElementById("sub").value;
				var act = "&act=" + document.getElementById("act").value;
				var url = "index.php?id=" + n + dir + sub + act;
				alert(url);
				// window.location = url;
			}
		</script>
	</head>
	<body>
		<input id="dir" type="hidden" value="A">
		<input id="sub" type="hidden" value="B">
		<input id="act" type="hidden" value="retrieve">
		<table>
		<?php
			for ($id=0; $id<15; $id++) {
				
				// $id = object->getId();	
				$name = $lname[rand(0, sizeof($lname) - 1)] . ', ' . $fname[rand(0, sizeof($fname) - 1)];
				$month = rand(1,12);
				$day = rand(1,30);
				$year =  rand (19,20) . rand(0,9) . rand(0,9);
				$street =  rand(0, 99) . ' ' . $sname[rand(0, sizeof($sname) - 1)] . ' ' . $stype[rand(0, sizeof($stype) - 1)];
				$city = $cities[rand(0, sizeof($cities) - 1)];
				$state = $states[rand (0, sizeof($states) - 1)];
				$zip = rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9);
				
				echo '<tr onclick="retreive(' . $vid . ');">'; // <tr onclick="retreive(n);">
				
				echo '<td>' . $name .'</td>';
				echo '<td>Dr.</td>';
				echo '<td class="right">' . $month . '-' . $day . '-' . $year . '</td>';
				echo '<td class="right">' . $street . '</td>';
				echo '<td>' . $city . '</td>';
				echo '<td class="right">' . $state . '</td>';
				echo '<td>' . $zip . '</td>';
				
				echo '</tr>';
			}
		?>
		</table>
		<br>
		<hr>
		<br>
		<div id="notes"></div>

    </body>	<footer>
	2014 <span class="habitatBlue">|</span> York Habitat for Humanity
	</footer>
</html>
