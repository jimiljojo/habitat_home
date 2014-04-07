<?php

/*
 * File: /view/listVolunteer.php 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Author: rwg5215 list all volunteers
 */
?>
<?php


	
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
			foreach($volunteers as $volunteer) {
                            
                            $person_id = $volunteer->getPerson_id();
                            $title = $volunteer->getTitle();
                            $first_name = $volunteer->getFirst_name();
                            $last_name = $volunteer->getLast_name();
                            $contact = $volunteer->getContact();
                            
                           
                            $contacts = $dbio->readContact($contact);
                            $phone = $contacts->getPhone();
                            $email = $contacts->getEmail();
                            $address = $contacts->getAddress();
                            
                            $addresses = $dbio->readAddress($address);
                            $address_id = $addresses->setAddress_id;
                            $street1 = $addresses->setStreet1;
                            $street2 = $addresses->setStreet2;
                            $city = $addresses->setCity;
                            $state = $addresses->setState;
                            $zip = $addresses->setZip;
                           
				
				/*// $id = object->getId();	
				$name = $lname[rand(0, sizeof($lname) - 1)] . ', ' . $fname[rand(0, sizeof($fname) - 1)];
				$month = rand(1,12);
				$day = rand(1,30);
				$year =  rand (19,20) . rand(0,9) . rand(0,9);
				$street =  rand(0, 99) . ' ' . $sname[rand(0, sizeof($sname) - 1)] . ' ' . $stype[rand(0, sizeof($stype) - 1)];
				$city = $cities[rand(0, sizeof($cities) - 1)];
				$state = $states[rand (0, sizeof($states) - 1)];
				$zip = rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9);*/
				
				echo '<tr onclick="retreive(' . $person_id . ');">'; // <tr onclick="retreive(n);">
				
				echo '<td>' . $title .'</td>';
                                echo '<td>' . $first_name .'</td>';
                                echo '<td>' . $last_name .'</td>';
				
				echo '<td class="right">' . $phone . '</td>';
				echo '<td class="right">' . $address . '</td>';
                                echo '<td class="right">' . $street1 . '</td>';
                                echo '<td class="right">' . $street2 . '</td>';
                                echo '<td class="right">' . $city . '</td>';
                                echo '<td class="right">' . $state . '</td>';
                                echo '<td class="right">' . $zip . '</td>';
				echo '<td>' . $email . '</td>';
							
				echo '</tr>';
			}
                        
                        var_dump($volunteers);
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
