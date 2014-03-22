


<center><input type="button"  class="btn btn-primary btn-sm" onclick="history.back();" value="Back"></center>

<br><br>
<?php 
	$tableinfo = readAccounts();
	$count = 0;
	foreach ($tableinfo[0] as $account) {
		$count++;
	}

	
	// foreach ($tableinfo[0] as $account) {
	// 	$uname[] = $account->getUsername();
	// }

	// foreach ($tableinfo[1] as $person) {
	// 		$title[] = $person->getTitle();
	// 		$fname[] = $person->getFirst_name();
	// 		$lname[] = $person->getLast_name();
	// 		$dob[] = $person->getDob();
	//	}
	echo '<table class="table table-striped table-hover " style="width:100%"><tr><th>Account ID  </th><th>Username</th><th>Password</th><th>Date</th><th>Status</th><thIsOffice></th><th>isAdmin</th><th>isVol</th><th>Person ID</th></tr>';
	echo '<tr>';
	// for ($i=0; $i < $count; $i++) { 
	// 	echo '<td>' . $tableinfo[0]->getUsername() . '</td>';
	// }
		// foreach ($uname as $i) {
		// 	 echo '<tr><td>' . $title[] . '</td>';
		// 	// echo '<td>' . $ ccount->getUsername() . '</td>';
			// echo '<td>' . $account->getPassword() . '</td>';
			// echo '<td>' . $account->getDate() . '</td>';
			// echo '<td>' . $account->getStatus() . '</td>';
			// echo '<td>' . $account->getIsOffice() . '</td>';
			// echo '<td>' . $account->getIsVolunteer() . '</td>';
			// echo '<td>' . $account->getPerson() .'</td></tr>';
	//	}
		echo '</tr>';
		echo '</table>';
?>
<!--results can be listed here, pushing text down.-->




<!-- end-->
