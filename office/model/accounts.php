<?php

	// TITLE: Office Accounts Model
	// FILE: office/model/accounts.php
	// AUTHOR: AUTOGEN
	$accounts = array();
	$accounts = $dbio->readAccounts();
	

	function search() {}
	function create() {}
	function read($accounts) {
		echo '<table style="width:500px"><th>Account ID  </th><th>Username</th><th>Password</th><th>Date</th><th>Status</th><thIsOffice></th><th>isAdmin</th><th>isVol</th><th>Person ID</th>';
		foreach ($accounts as $account) {
			echo '<tr><td>' . $account->getAccount_id() . '</td>';
			echo '<td>' . $account->getUsername() . '</td>';
			echo '<td>' . $account->getPassword() . '</td>';
			echo '<td>' . $account->getDate() . '</td>';
			echo '<td>' . $account->getStatus() . '</td>';
			echo '<td>' . $account->getIsOffice() . '</td>';
			echo '<td>' . $account->getIsVolunteer() . '</td>';
			echo '<td>' . $account->getPerson() .'</td></tr>';
		}
		echo '</table>';
	}
	function update() {}
	function delete() {}

?>
