<?php

	// TITLE: Database Model
	// FILE: model/dbio.php
	// AUTHOR: AUTOGEN


	// account // --------------------

	public function createAccount($account) {
		global $con;
		$fieldsString = csvObject($account);
		$valuesString = csvString($account);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readAccount($id) {
		global $con;
		$sql = 'SELECT * FROM account WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$account = new Account();
			$account->setAccount_id(result[0]);
			$account->setUsername(result[1]);
			$account->setPassword(result[2]);
			$account->setDate(result[3]);
			$account->setStatus(result[4]);
			$account->setIsOffice(result[5]);
			$account->setIsVolunteer(result[6]);
			$account->setPerson_id(result[7]);
		} else {
			$account = false
		}
		return $account;
	}// end function

	public function updateAccount($account) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO account VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteAccount($id) {
		global $con;
		$sql = 'DELETE FROM account WHERE account_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readAccount() {
		global $con;
		$sql = 'SELECT * FROM account';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$accounts = array();
			while($result = mysql_fetch_array($results)) {
				$account = new Account();
				$account->setAccount_id(result[0]);
				$account->setUsername(result[1]);
				$account->setPassword(result[2]);
				$account->setDate(result[3]);
				$account->setStatus(result[4]);
				$account->setIsOffice(result[5]);
				$account->setIsVolunteer(result[6]);
				$account->setPerson_id(result[7]);
				$accounts[] = $dir;
			}// end while
		} else {
			$account = false
		}
		return $account;
	}// end function

	// account_log // --------------------

	public function createAccount_log($account_log) {
		global $con;
		$fieldsString = csvObject($account_log);
		$valuesString = csvString($account_log);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readAccount_log($id) {
		global $con;
		$sql = 'SELECT * FROM account_log WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$account_log = new Account_log();
			$account_log->setId(result[0]);
			$account_log->setIP(result[1]);
			$account_log->setIsLogon(result[2]);
			$account_log->setDate(result[3]);
			$account_log->setTime(result[4]);
			$account_log->setAccount_account_id(result[5]);
		} else {
			$account_log = false
		}
		return $account_log;
	}// end function

	public function updateAccount_log($account_log) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO account_log VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteAccount_log($id) {
		global $con;
		$sql = 'DELETE FROM account_log WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readAccount_log() {
		global $con;
		$sql = 'SELECT * FROM account_log';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$account_logs = array();
			while($result = mysql_fetch_array($results)) {
				$account_log = new Account_log();
				$account_log->setId(result[0]);
				$account_log->setIP(result[1]);
				$account_log->setIsLogon(result[2]);
				$account_log->setDate(result[3]);
				$account_log->setTime(result[4]);
				$account_log->setAccount_account_id(result[5]);
				$account_logs[] = $dir;
			}// end while
		} else {
			$account_log = false
		}
		return $account_log;
	}// end function

	// account_recovery // --------------------

	public function createAccount_recovery($account_recovery) {
		global $con;
		$fieldsString = csvObject($account_recovery);
		$valuesString = csvString($account_recovery);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readAccount_recovery($id) {
		global $con;
		$sql = 'SELECT * FROM account_recovery WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$account_recovery = new Account_recovery();
			$account_recovery->setAccount_id(result[0]);
			$account_recovery->setCode(result[1]);
			$account_recovery->setDate(result[2]);
			$account_recovery->setTime(result[3]);
			$account_recovery->setStatus(result[4]);
			$account_recovery->setId(result[5]);
		} else {
			$account_recovery = false
		}
		return $account_recovery;
	}// end function

	public function updateAccount_recovery($account_recovery) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO account_recovery VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteAccount_recovery($id) {
		global $con;
		$sql = 'DELETE FROM account_recovery WHERE account_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readAccount_recovery() {
		global $con;
		$sql = 'SELECT * FROM account_recovery';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$account_recoverys = array();
			while($result = mysql_fetch_array($results)) {
				$account_recovery = new Account_recovery();
				$account_recovery->setAccount_id(result[0]);
				$account_recovery->setCode(result[1]);
				$account_recovery->setDate(result[2]);
				$account_recovery->setTime(result[3]);
				$account_recovery->setStatus(result[4]);
				$account_recovery->setId(result[5]);
				$account_recoverys[] = $dir;
			}// end while
		} else {
			$account_recovery = false
		}
		return $account_recovery;
	}// end function

	// address // --------------------

	public function createAddress($address) {
		global $con;
		$fieldsString = csvObject($address);
		$valuesString = csvString($address);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readAddress($id) {
		global $con;
		$sql = 'SELECT * FROM address WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$address = new Address();
			$address->setAddress_id(result[0]);
			$address->setStreet1(result[1]);
			$address->setStreet2(result[2]);
			$address->setCity(result[3]);
			$address->setState(result[4]);
			$address->setZip(result[5]);
		} else {
			$address = false
		}
		return $address;
	}// end function

	public function updateAddress($address) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO address VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteAddress($id) {
		global $con;
		$sql = 'DELETE FROM address WHERE address_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readAddress() {
		global $con;
		$sql = 'SELECT * FROM address';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$addresss = array();
			while($result = mysql_fetch_array($results)) {
				$address = new Address();
				$address->setAddress_id(result[0]);
				$address->setStreet1(result[1]);
				$address->setStreet2(result[2]);
				$address->setCity(result[3]);
				$address->setState(result[4]);
				$address->setZip(result[5]);
				$addresss[] = $dir;
			}// end while
		} else {
			$address = false
		}
		return $address;
	}// end function

	// admin // --------------------

	public function createAdmin($admin) {
		global $con;
		$fieldsString = csvObject($admin);
		$valuesString = csvString($admin);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readAdmin($id) {
		global $con;
		$sql = 'SELECT * FROM admin WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$admin = new Admin();
			$admin->setIdAdmin(result[0]);
			$admin->setPerson_person_id(result[1]);
		} else {
			$admin = false
		}
		return $admin;
	}// end function

	public function updateAdmin($admin) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO admin VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteAdmin($id) {
		global $con;
		$sql = 'DELETE FROM admin WHERE idAdmin = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readAdmin() {
		global $con;
		$sql = 'SELECT * FROM admin';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$admins = array();
			while($result = mysql_fetch_array($results)) {
				$admin = new Admin();
				$admin->setIdAdmin(result[0]);
				$admin->setPerson_person_id(result[1]);
				$admins[] = $dir;
			}// end while
		} else {
			$admin = false
		}
		return $admin;
	}// end function

	// auction // --------------------

	public function createAuction($auction) {
		global $con;
		$fieldsString = csvObject($auction);
		$valuesString = csvString($auction);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readAuction($id) {
		global $con;
		$sql = 'SELECT * FROM auction WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$auction = new Auction();
			$auction->setAuction_id(result[0]);
			$auction->setEvent_id(result[1]);
			$auction->setTime(result[2]);
		} else {
			$auction = false
		}
		return $auction;
	}// end function

	public function updateAuction($auction) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO auction VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteAuction($id) {
		global $con;
		$sql = 'DELETE FROM auction WHERE auction_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readAuction() {
		global $con;
		$sql = 'SELECT * FROM auction';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$auctions = array();
			while($result = mysql_fetch_array($results)) {
				$auction = new Auction();
				$auction->setAuction_id(result[0]);
				$auction->setEvent_id(result[1]);
				$auction->setTime(result[2]);
				$auctions[] = $dir;
			}// end while
		} else {
			$auction = false
		}
		return $auction;
	}// end function

	// auction_item // --------------------

	public function createAuction_item($auction_item) {
		global $con;
		$fieldsString = csvObject($auction_item);
		$valuesString = csvString($auction_item);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readAuction_item($id) {
		global $con;
		$sql = 'SELECT * FROM auction_item WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$auction_item = new Auction_item();
			$auction_item->setAuction_item_id(result[0]);
			$auction_item->setAuction_id(result[1]);
			$auction_item->setItem_num(result[2]);
			$auction_item->setTitle(result[3]);
			$auction_item->setDescription(result[4]);
			$auction_item->setPrice(result[5]);
			$auction_item->setBuyer_id(result[6]);
			$auction_item->setDonation_id(result[7]);
		} else {
			$auction_item = false
		}
		return $auction_item;
	}// end function

	public function updateAuction_item($auction_item) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO auction_item VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteAuction_item($id) {
		global $con;
		$sql = 'DELETE FROM auction_item WHERE auction_item_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readAuction_item() {
		global $con;
		$sql = 'SELECT * FROM auction_item';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$auction_items = array();
			while($result = mysql_fetch_array($results)) {
				$auction_item = new Auction_item();
				$auction_item->setAuction_item_id(result[0]);
				$auction_item->setAuction_id(result[1]);
				$auction_item->setItem_num(result[2]);
				$auction_item->setTitle(result[3]);
				$auction_item->setDescription(result[4]);
				$auction_item->setPrice(result[5]);
				$auction_item->setBuyer_id(result[6]);
				$auction_item->setDonation_id(result[7]);
				$auction_items[] = $dir;
			}// end while
		} else {
			$auction_item = false
		}
		return $auction_item;
	}// end function

	// committee // --------------------

	public function createCommittee($committee) {
		global $con;
		$fieldsString = csvObject($committee);
		$valuesString = csvString($committee);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readCommittee($id) {
		global $con;
		$sql = 'SELECT * FROM committee WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$committee = new Committee();
			$committee->setCommittee_id(result[0]);
			$committee->setTitle(result[1]);
		} else {
			$committee = false
		}
		return $committee;
	}// end function

	public function updateCommittee($committee) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO committee VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteCommittee($id) {
		global $con;
		$sql = 'DELETE FROM committee WHERE committee_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readCommittee() {
		global $con;
		$sql = 'SELECT * FROM committee';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$committees = array();
			while($result = mysql_fetch_array($results)) {
				$committee = new Committee();
				$committee->setCommittee_id(result[0]);
				$committee->setTitle(result[1]);
				$committees[] = $dir;
			}// end while
		} else {
			$committee = false
		}
		return $committee;
	}// end function

	// contact // --------------------

	public function createContact($contact) {
		global $con;
		$fieldsString = csvObject($contact);
		$valuesString = csvString($contact);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readContact($id) {
		global $con;
		$sql = 'SELECT * FROM contact WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$contact = new Contact();
			$contact->setContact_id(result[0]);
			$contact->setAddress_id(result[1]);
			$contact->setPhone(result[2]);
			$contact->setEmail(result[3]);
			$contact->setPhone2(result[4]);
			$contact->setExtension(result[5]);
		} else {
			$contact = false
		}
		return $contact;
	}// end function

	public function updateContact($contact) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO contact VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteContact($id) {
		global $con;
		$sql = 'DELETE FROM contact WHERE contact_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readContact() {
		global $con;
		$sql = 'SELECT * FROM contact';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$contacts = array();
			while($result = mysql_fetch_array($results)) {
				$contact = new Contact();
				$contact->setContact_id(result[0]);
				$contact->setAddress_id(result[1]);
				$contact->setPhone(result[2]);
				$contact->setEmail(result[3]);
				$contact->setPhone2(result[4]);
				$contact->setExtension(result[5]);
				$contacts[] = $dir;
			}// end while
		} else {
			$contact = false
		}
		return $contact;
	}// end function

	// donation // --------------------

	public function createDonation($donation) {
		global $con;
		$fieldsString = csvObject($donation);
		$valuesString = csvString($donation);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readDonation($id) {
		global $con;
		$sql = 'SELECT * FROM donation WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$donation = new Donation();
			$donation->setDonation_id(result[0]);
			$donation->setDate(result[1]);
			$donation->setTime(result[2]);
			$donation->setDetails(result[3]);
			$donation->setWhen_entered(result[4]);
			$donation->setDonationType_idDonationType(result[5]);
			$donation->setValue(result[6]);
			$donation->setEvent_event_id(result[7]);
			$donation->setAdmin_idAdmin(result[8]);
			$donation->setEntered_by_id(result[9]);
		} else {
			$donation = false
		}
		return $donation;
	}// end function

	public function updateDonation($donation) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO donation VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteDonation($id) {
		global $con;
		$sql = 'DELETE FROM donation WHERE donation_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readDonation() {
		global $con;
		$sql = 'SELECT * FROM donation';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$donations = array();
			while($result = mysql_fetch_array($results)) {
				$donation = new Donation();
				$donation->setDonation_id(result[0]);
				$donation->setDate(result[1]);
				$donation->setTime(result[2]);
				$donation->setDetails(result[3]);
				$donation->setWhen_entered(result[4]);
				$donation->setDonationType_idDonationType(result[5]);
				$donation->setValue(result[6]);
				$donation->setEvent_event_id(result[7]);
				$donation->setAdmin_idAdmin(result[8]);
				$donation->setEntered_by_id(result[9]);
				$donations[] = $dir;
			}// end while
		} else {
			$donation = false
		}
		return $donation;
	}// end function

	// donation_has_organization // --------------------

	public function createDonation_has_organization($donation_has_organization) {
		global $con;
		$fieldsString = csvObject($donation_has_organization);
		$valuesString = csvString($donation_has_organization);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readDonation_has_organization($id) {
		global $con;
		$sql = 'SELECT * FROM donation_has_organization WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$donation_has_organization = new Donation_has_organization();
			$donation_has_organization->setDonation_donation_id(result[0]);
			$donation_has_organization->setOrganization_organization_id(result[1]);
		} else {
			$donation_has_organization = false
		}
		return $donation_has_organization;
	}// end function

	public function updateDonation_has_organization($donation_has_organization) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO donation_has_organization VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteDonation_has_organization($id) {
		global $con;
		$sql = 'DELETE FROM donation_has_organization WHERE Donation_donation_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readDonation_has_organization() {
		global $con;
		$sql = 'SELECT * FROM donation_has_organization';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$donation_has_organizations = array();
			while($result = mysql_fetch_array($results)) {
				$donation_has_organization = new Donation_has_organization();
				$donation_has_organization->setDonation_donation_id(result[0]);
				$donation_has_organization->setOrganization_organization_id(result[1]);
				$donation_has_organizations[] = $dir;
			}// end while
		} else {
			$donation_has_organization = false
		}
		return $donation_has_organization;
	}// end function

	// donation_has_person // --------------------

	public function createDonation_has_person($donation_has_person) {
		global $con;
		$fieldsString = csvObject($donation_has_person);
		$valuesString = csvString($donation_has_person);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readDonation_has_person($id) {
		global $con;
		$sql = 'SELECT * FROM donation_has_person WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$donation_has_person = new Donation_has_person();
			$donation_has_person->setDonation_donation_id(result[0]);
			$donation_has_person->setPerson_person_id(result[1]);
		} else {
			$donation_has_person = false
		}
		return $donation_has_person;
	}// end function

	public function updateDonation_has_person($donation_has_person) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO donation_has_person VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteDonation_has_person($id) {
		global $con;
		$sql = 'DELETE FROM donation_has_person WHERE Donation_donation_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readDonation_has_person() {
		global $con;
		$sql = 'SELECT * FROM donation_has_person';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$donation_has_persons = array();
			while($result = mysql_fetch_array($results)) {
				$donation_has_person = new Donation_has_person();
				$donation_has_person->setDonation_donation_id(result[0]);
				$donation_has_person->setPerson_person_id(result[1]);
				$donation_has_persons[] = $dir;
			}// end while
		} else {
			$donation_has_person = false
		}
		return $donation_has_person;
	}// end function

	// donationtype // --------------------

	public function createDonationtype($donationtype) {
		global $con;
		$fieldsString = csvObject($donationtype);
		$valuesString = csvString($donationtype);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readDonationtype($id) {
		global $con;
		$sql = 'SELECT * FROM donationtype WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$donationtype = new Donationtype();
			$donationtype->setIdDonationType(result[0]);
			$donationtype->setTypeName(result[1]);
		} else {
			$donationtype = false
		}
		return $donationtype;
	}// end function

	public function updateDonationtype($donationtype) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO donationtype VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteDonationtype($id) {
		global $con;
		$sql = 'DELETE FROM donationtype WHERE idDonationType = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readDonationtype() {
		global $con;
		$sql = 'SELECT * FROM donationtype';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$donationtypes = array();
			while($result = mysql_fetch_array($results)) {
				$donationtype = new Donationtype();
				$donationtype->setIdDonationType(result[0]);
				$donationtype->setTypeName(result[1]);
				$donationtypes[] = $dir;
			}// end while
		} else {
			$donationtype = false
		}
		return $donationtype;
	}// end function

	// employee // --------------------

	public function createEmployee($employee) {
		global $con;
		$fieldsString = csvObject($employee);
		$valuesString = csvString($employee);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readEmployee($id) {
		global $con;
		$sql = 'SELECT * FROM employee WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$employee = new Employee();
			$employee->setStart_date(result[0]);
			$employee->setEnd_date(result[1]);
			$employee->setPerson_person_id(result[2]);
		} else {
			$employee = false
		}
		return $employee;
	}// end function

	public function updateEmployee($employee) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO employee VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteEmployee($id) {
		global $con;
		$sql = 'DELETE FROM employee WHERE start_date = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readEmployee() {
		global $con;
		$sql = 'SELECT * FROM employee';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$employees = array();
			while($result = mysql_fetch_array($results)) {
				$employee = new Employee();
				$employee->setStart_date(result[0]);
				$employee->setEnd_date(result[1]);
				$employee->setPerson_person_id(result[2]);
				$employees[] = $dir;
			}// end while
		} else {
			$employee = false
		}
		return $employee;
	}// end function

	// event // --------------------

	public function createEvent($event) {
		global $con;
		$fieldsString = csvObject($event);
		$valuesString = csvString($event);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readEvent($id) {
		global $con;
		$sql = 'SELECT * FROM event WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$event = new Event();
			$event->setEvent_id(result[0]);
			$event->setTitle(result[1]);
			$event->setDate(result[2]);
			$event->setTime(result[3]);
			$event->setType_id(result[4]);
			$event->setAddress_address_id(result[5]);
			$event->setCommittee_committee_id(result[6]);
			$event->setSponsoredBy(result[7]);
		} else {
			$event = false
		}
		return $event;
	}// end function

	public function updateEvent($event) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO event VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteEvent($id) {
		global $con;
		$sql = 'DELETE FROM event WHERE event_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readEvent() {
		global $con;
		$sql = 'SELECT * FROM event';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$events = array();
			while($result = mysql_fetch_array($results)) {
				$event = new Event();
				$event->setEvent_id(result[0]);
				$event->setTitle(result[1]);
				$event->setDate(result[2]);
				$event->setTime(result[3]);
				$event->setType_id(result[4]);
				$event->setAddress_address_id(result[5]);
				$event->setCommittee_committee_id(result[6]);
				$event->setSponsoredBy(result[7]);
				$events[] = $dir;
			}// end while
		} else {
			$event = false
		}
		return $event;
	}// end function

	// event_expenses // --------------------

	public function createEvent_expenses($event_expenses) {
		global $con;
		$fieldsString = csvObject($event_expenses);
		$valuesString = csvString($event_expenses);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readEvent_expenses($id) {
		global $con;
		$sql = 'SELECT * FROM event_expenses WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$event_expenses = new Event_expenses();
			$event_expenses->setExpense_id(result[0]);
			$event_expenses->setTitle(result[1]);
			$event_expenses->setDescription(result[2]);
			$event_expenses->setAmount(result[3]);
			$event_expenses->setWhen_entered(result[4]);
			$event_expenses->setWhen_authorized(result[5]);
			$event_expenses->setEvent_event_id(result[6]);
			$event_expenses->setAdmin_idAdmin(result[7]);
			$event_expenses->setEntered_by_id(result[8]);
		} else {
			$event_expenses = false
		}
		return $event_expenses;
	}// end function

	public function updateEvent_expenses($event_expenses) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO event_expenses VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteEvent_expenses($id) {
		global $con;
		$sql = 'DELETE FROM event_expenses WHERE expense_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readEvent_expenses() {
		global $con;
		$sql = 'SELECT * FROM event_expenses';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$event_expensess = array();
			while($result = mysql_fetch_array($results)) {
				$event_expenses = new Event_expenses();
				$event_expenses->setExpense_id(result[0]);
				$event_expenses->setTitle(result[1]);
				$event_expenses->setDescription(result[2]);
				$event_expenses->setAmount(result[3]);
				$event_expenses->setWhen_entered(result[4]);
				$event_expenses->setWhen_authorized(result[5]);
				$event_expenses->setEvent_event_id(result[6]);
				$event_expenses->setAdmin_idAdmin(result[7]);
				$event_expenses->setEntered_by_id(result[8]);
				$event_expensess[] = $dir;
			}// end while
		} else {
			$event_expenses = false
		}
		return $event_expenses;
	}// end function

	// event_type // --------------------

	public function createEvent_type($event_type) {
		global $con;
		$fieldsString = csvObject($event_type);
		$valuesString = csvString($event_type);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readEvent_type($id) {
		global $con;
		$sql = 'SELECT * FROM event_type WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$event_type = new Event_type();
			$event_type->setType_id(result[0]);
			$event_type->setTitle(result[1]);
			$event_type->setDescription(result[2]);
		} else {
			$event_type = false
		}
		return $event_type;
	}// end function

	public function updateEvent_type($event_type) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO event_type VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteEvent_type($id) {
		global $con;
		$sql = 'DELETE FROM event_type WHERE type_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readEvent_type() {
		global $con;
		$sql = 'SELECT * FROM event_type';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$event_types = array();
			while($result = mysql_fetch_array($results)) {
				$event_type = new Event_type();
				$event_type->setType_id(result[0]);
				$event_type->setTitle(result[1]);
				$event_type->setDescription(result[2]);
				$event_types[] = $dir;
			}// end while
		} else {
			$event_type = false
		}
		return $event_type;
	}// end function

	// foh // --------------------

	public function createFoh($foh) {
		global $con;
		$fieldsString = csvObject($foh);
		$valuesString = csvString($foh);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readFoh($id) {
		global $con;
		$sql = 'SELECT * FROM foh WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$foh = new Foh();
			$foh->setPerson_person_id(result[0]);
			$foh->setEvent_event_id(result[1]);
		} else {
			$foh = false
		}
		return $foh;
	}// end function

	public function updateFoh($foh) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO foh VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteFoh($id) {
		global $con;
		$sql = 'DELETE FROM foh WHERE Person_person_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readFoh() {
		global $con;
		$sql = 'SELECT * FROM foh';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$fohs = array();
			while($result = mysql_fetch_array($results)) {
				$foh = new Foh();
				$foh->setPerson_person_id(result[0]);
				$foh->setEvent_event_id(result[1]);
				$fohs[] = $dir;
			}// end while
		} else {
			$foh = false
		}
		return $foh;
	}// end function

	// interest // --------------------

	public function createInterest($interest) {
		global $con;
		$fieldsString = csvObject($interest);
		$valuesString = csvString($interest);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readInterest($id) {
		global $con;
		$sql = 'SELECT * FROM interest WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$interest = new Interest();
			$interest->setInterest_id(result[0]);
			$interest->setType_id(result[1]);
			$interest->setTitle(result[2]);
			$interest->setDescription(result[3]);
		} else {
			$interest = false
		}
		return $interest;
	}// end function

	public function updateInterest($interest) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO interest VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteInterest($id) {
		global $con;
		$sql = 'DELETE FROM interest WHERE interest_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readInterest() {
		global $con;
		$sql = 'SELECT * FROM interest';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$interests = array();
			while($result = mysql_fetch_array($results)) {
				$interest = new Interest();
				$interest->setInterest_id(result[0]);
				$interest->setType_id(result[1]);
				$interest->setTitle(result[2]);
				$interest->setDescription(result[3]);
				$interests[] = $dir;
			}// end while
		} else {
			$interest = false
		}
		return $interest;
	}// end function

	// interest_has_event // --------------------

	public function createInterest_has_event($interest_has_event) {
		global $con;
		$fieldsString = csvObject($interest_has_event);
		$valuesString = csvString($interest_has_event);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readInterest_has_event($id) {
		global $con;
		$sql = 'SELECT * FROM interest_has_event WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$interest_has_event = new Interest_has_event();
			$interest_has_event->setInterest_interest_id(result[0]);
			$interest_has_event->setEvent_event_id(result[1]);
		} else {
			$interest_has_event = false
		}
		return $interest_has_event;
	}// end function

	public function updateInterest_has_event($interest_has_event) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO interest_has_event VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteInterest_has_event($id) {
		global $con;
		$sql = 'DELETE FROM interest_has_event WHERE Interest_interest_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readInterest_has_event() {
		global $con;
		$sql = 'SELECT * FROM interest_has_event';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$interest_has_events = array();
			while($result = mysql_fetch_array($results)) {
				$interest_has_event = new Interest_has_event();
				$interest_has_event->setInterest_interest_id(result[0]);
				$interest_has_event->setEvent_event_id(result[1]);
				$interest_has_events[] = $dir;
			}// end while
		} else {
			$interest_has_event = false
		}
		return $interest_has_event;
	}// end function

	// interest_type // --------------------

	public function createInterest_type($interest_type) {
		global $con;
		$fieldsString = csvObject($interest_type);
		$valuesString = csvString($interest_type);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readInterest_type($id) {
		global $con;
		$sql = 'SELECT * FROM interest_type WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$interest_type = new Interest_type();
			$interest_type->setType_id(result[0]);
			$interest_type->setTitle(result[1]);
			$interest_type->setDescription(result[2]);
		} else {
			$interest_type = false
		}
		return $interest_type;
	}// end function

	public function updateInterest_type($interest_type) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO interest_type VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteInterest_type($id) {
		global $con;
		$sql = 'DELETE FROM interest_type WHERE type_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readInterest_type() {
		global $con;
		$sql = 'SELECT * FROM interest_type';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$interest_types = array();
			while($result = mysql_fetch_array($results)) {
				$interest_type = new Interest_type();
				$interest_type->setType_id(result[0]);
				$interest_type->setTitle(result[1]);
				$interest_type->setDescription(result[2]);
				$interest_types[] = $dir;
			}// end while
		} else {
			$interest_type = false
		}
		return $interest_type;
	}// end function

	// marital_status // --------------------

	public function createMarital_status($marital_status) {
		global $con;
		$fieldsString = csvObject($marital_status);
		$valuesString = csvString($marital_status);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readMarital_status($id) {
		global $con;
		$sql = 'SELECT * FROM marital_status WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$marital_status = new Marital_status();
			$marital_status->setMarital_status_id(result[0]);
			$marital_status->setTitle(result[1]);
			$marital_status->setDescription(result[2]);
		} else {
			$marital_status = false
		}
		return $marital_status;
	}// end function

	public function updateMarital_status($marital_status) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO marital_status VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteMarital_status($id) {
		global $con;
		$sql = 'DELETE FROM marital_status WHERE marital_status_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readMarital_status() {
		global $con;
		$sql = 'SELECT * FROM marital_status';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$marital_statuss = array();
			while($result = mysql_fetch_array($results)) {
				$marital_status = new Marital_status();
				$marital_status->setMarital_status_id(result[0]);
				$marital_status->setTitle(result[1]);
				$marital_status->setDescription(result[2]);
				$marital_statuss[] = $dir;
			}// end while
		} else {
			$marital_status = false
		}
		return $marital_status;
	}// end function

	// notes // --------------------

	public function createNotes($notes) {
		global $con;
		$fieldsString = csvObject($notes);
		$valuesString = csvString($notes);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readNotes($id) {
		global $con;
		$sql = 'SELECT * FROM notes WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$notes = new Notes();
			$notes->setNote_id(result[0]);
			$notes->setNote(result[1]);
			$notes->setAuthor_date(result[2]);
			$notes->setAccount_account_id(result[3]);
		} else {
			$notes = false
		}
		return $notes;
	}// end function

	public function updateNotes($notes) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO notes VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteNotes($id) {
		global $con;
		$sql = 'DELETE FROM notes WHERE note_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readNotes() {
		global $con;
		$sql = 'SELECT * FROM notes';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$notess = array();
			while($result = mysql_fetch_array($results)) {
				$notes = new Notes();
				$notes->setNote_id(result[0]);
				$notes->setNote(result[1]);
				$notes->setAuthor_date(result[2]);
				$notes->setAccount_account_id(result[3]);
				$notess[] = $dir;
			}// end while
		} else {
			$notes = false
		}
		return $notes;
	}// end function

	// organization // --------------------

	public function createOrganization($organization) {
		global $con;
		$fieldsString = csvObject($organization);
		$valuesString = csvString($organization);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readOrganization($id) {
		global $con;
		$sql = 'SELECT * FROM organization WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$organization = new Organization();
			$organization->setOrganization_id(result[0]);
			$organization->setName(result[1]);
			$organization->setContact_contact_id(result[2]);
		} else {
			$organization = false
		}
		return $organization;
	}// end function

	public function updateOrganization($organization) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO organization VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteOrganization($id) {
		global $con;
		$sql = 'DELETE FROM organization WHERE organization_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readOrganization() {
		global $con;
		$sql = 'SELECT * FROM organization';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$organizations = array();
			while($result = mysql_fetch_array($results)) {
				$organization = new Organization();
				$organization->setOrganization_id(result[0]);
				$organization->setName(result[1]);
				$organization->setContact_contact_id(result[2]);
				$organizations[] = $dir;
			}// end while
		} else {
			$organization = false
		}
		return $organization;
	}// end function

	// organization_has_person // --------------------

	public function createOrganization_has_person($organization_has_person) {
		global $con;
		$fieldsString = csvObject($organization_has_person);
		$valuesString = csvString($organization_has_person);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readOrganization_has_person($id) {
		global $con;
		$sql = 'SELECT * FROM organization_has_person WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$organization_has_person = new Organization_has_person();
			$organization_has_person->setOrganization_organization_id(result[0]);
			$organization_has_person->setPerson_person_id(result[1]);
		} else {
			$organization_has_person = false
		}
		return $organization_has_person;
	}// end function

	public function updateOrganization_has_person($organization_has_person) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO organization_has_person VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteOrganization_has_person($id) {
		global $con;
		$sql = 'DELETE FROM organization_has_person WHERE Organization_organization_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readOrganization_has_person() {
		global $con;
		$sql = 'SELECT * FROM organization_has_person';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$organization_has_persons = array();
			while($result = mysql_fetch_array($results)) {
				$organization_has_person = new Organization_has_person();
				$organization_has_person->setOrganization_organization_id(result[0]);
				$organization_has_person->setPerson_person_id(result[1]);
				$organization_has_persons[] = $dir;
			}// end while
		} else {
			$organization_has_person = false
		}
		return $organization_has_person;
	}// end function

	// person // --------------------

	public function createPerson($person) {
		global $con;
		$fieldsString = csvObject($person);
		$valuesString = csvString($person);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readPerson($id) {
		global $con;
		$sql = 'SELECT * FROM person WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$person = new Person();
			$person->setPerson_id(result[0]);
			$person->setTitle(result[1]);
			$person->setFirst_name(result[2]);
			$person->setLast_name(result[3]);
			$person->setGender(result[4]);
			$person->setDob(result[5]);
			$person->setMarital_Status_marital_status_id(result[6]);
			$person->setContact_contact_id(result[7]);
			$person->setIsActive(result[8]);
			$person->setLastActive(result[9]);
			$person->setPrefEmail(result[10]);
			$person->setPrefMail(result[11]);
			$person->setPrefPhone(result[12]);
		} else {
			$person = false
		}
		return $person;
	}// end function

	public function updatePerson($person) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO person VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deletePerson($id) {
		global $con;
		$sql = 'DELETE FROM person WHERE person_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readPerson() {
		global $con;
		$sql = 'SELECT * FROM person';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$persons = array();
			while($result = mysql_fetch_array($results)) {
				$person = new Person();
				$person->setPerson_id(result[0]);
				$person->setTitle(result[1]);
				$person->setFirst_name(result[2]);
				$person->setLast_name(result[3]);
				$person->setGender(result[4]);
				$person->setDob(result[5]);
				$person->setMarital_Status_marital_status_id(result[6]);
				$person->setContact_contact_id(result[7]);
				$person->setIsActive(result[8]);
				$person->setLastActive(result[9]);
				$person->setPrefEmail(result[10]);
				$person->setPrefMail(result[11]);
				$person->setPrefPhone(result[12]);
				$persons[] = $dir;
			}// end while
		} else {
			$person = false
		}
		return $person;
	}// end function

	// person_relates_to_event // --------------------

	public function createPerson_relates_to_event($person_relates_to_event) {
		global $con;
		$fieldsString = csvObject($person_relates_to_event);
		$valuesString = csvString($person_relates_to_event);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readPerson_relates_to_event($id) {
		global $con;
		$sql = 'SELECT * FROM person_relates_to_event WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$person_relates_to_event = new Person_relates_to_event();
			$person_relates_to_event->setEvent_event_id(result[0]);
			$person_relates_to_event->setPerson_person_id(result[1]);
			$person_relates_to_event->setAttended(result[2]);
			$person_relates_to_event->setOnGuestList(result[3]);
		} else {
			$person_relates_to_event = false
		}
		return $person_relates_to_event;
	}// end function

	public function updatePerson_relates_to_event($person_relates_to_event) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO person_relates_to_event VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deletePerson_relates_to_event($id) {
		global $con;
		$sql = 'DELETE FROM person_relates_to_event WHERE Event_event_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readPerson_relates_to_event() {
		global $con;
		$sql = 'SELECT * FROM person_relates_to_event';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$person_relates_to_events = array();
			while($result = mysql_fetch_array($results)) {
				$person_relates_to_event = new Person_relates_to_event();
				$person_relates_to_event->setEvent_event_id(result[0]);
				$person_relates_to_event->setPerson_person_id(result[1]);
				$person_relates_to_event->setAttended(result[2]);
				$person_relates_to_event->setOnGuestList(result[3]);
				$person_relates_to_events[] = $dir;
			}// end while
		} else {
			$person_relates_to_event = false
		}
		return $person_relates_to_event;
	}// end function

	// recovery_log // --------------------

	public function createRecovery_log($recovery_log) {
		global $con;
		$fieldsString = csvObject($recovery_log);
		$valuesString = csvString($recovery_log);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readRecovery_log($id) {
		global $con;
		$sql = 'SELECT * FROM recovery_log WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$recovery_log = new Recovery_log();
			$recovery_log->setAccount_id(result[0]);
			$recovery_log->setDate(result[1]);
			$recovery_log->setTime(result[2]);
			$recovery_log->setId(result[3]);
		} else {
			$recovery_log = false
		}
		return $recovery_log;
	}// end function

	public function updateRecovery_log($recovery_log) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO recovery_log VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteRecovery_log($id) {
		global $con;
		$sql = 'DELETE FROM recovery_log WHERE account_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readRecovery_log() {
		global $con;
		$sql = 'SELECT * FROM recovery_log';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$recovery_logs = array();
			while($result = mysql_fetch_array($results)) {
				$recovery_log = new Recovery_log();
				$recovery_log->setAccount_id(result[0]);
				$recovery_log->setDate(result[1]);
				$recovery_log->setTime(result[2]);
				$recovery_log->setId(result[3]);
				$recovery_logs[] = $dir;
			}// end while
		} else {
			$recovery_log = false
		}
		return $recovery_log;
	}// end function

	// schedule // --------------------

	public function createSchedule($schedule) {
		global $con;
		$fieldsString = csvObject($schedule);
		$valuesString = csvString($schedule);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readSchedule($id) {
		global $con;
		$sql = 'SELECT * FROM schedule WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$schedule = new Schedule();
			$schedule->setId(result[0]);
			$schedule->setTimeStart(result[1]);
			$schedule->setTimeEnd(result[2]);
			$schedule->setEvent_event_id(result[3]);
			$schedule->setDescription(result[4]);
			$schedule->setInterest_interest_id(result[5]);
		} else {
			$schedule = false
		}
		return $schedule;
	}// end function

	public function updateSchedule($schedule) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO schedule VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteSchedule($id) {
		global $con;
		$sql = 'DELETE FROM schedule WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readSchedule() {
		global $con;
		$sql = 'SELECT * FROM schedule';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$schedules = array();
			while($result = mysql_fetch_array($results)) {
				$schedule = new Schedule();
				$schedule->setId(result[0]);
				$schedule->setTimeStart(result[1]);
				$schedule->setTimeEnd(result[2]);
				$schedule->setEvent_event_id(result[3]);
				$schedule->setDescription(result[4]);
				$schedule->setInterest_interest_id(result[5]);
				$schedules[] = $dir;
			}// end while
		} else {
			$schedule = false
		}
		return $schedule;
	}// end function

	// schedule_slot // --------------------

	public function createSchedule_slot($schedule_slot) {
		global $con;
		$fieldsString = csvObject($schedule_slot);
		$valuesString = csvString($schedule_slot);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readSchedule_slot($id) {
		global $con;
		$sql = 'SELECT * FROM schedule_slot WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$schedule_slot = new Schedule_slot();
			$schedule_slot->setVolunteer_Person_person_id(result[0]);
			$schedule_slot->setId(result[1]);
			$schedule_slot->setSchedule_id(result[2]);
		} else {
			$schedule_slot = false
		}
		return $schedule_slot;
	}// end function

	public function updateSchedule_slot($schedule_slot) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO schedule_slot VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteSchedule_slot($id) {
		global $con;
		$sql = 'DELETE FROM schedule_slot WHERE Volunteer_Person_person_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readSchedule_slot() {
		global $con;
		$sql = 'SELECT * FROM schedule_slot';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$schedule_slots = array();
			while($result = mysql_fetch_array($results)) {
				$schedule_slot = new Schedule_slot();
				$schedule_slot->setVolunteer_Person_person_id(result[0]);
				$schedule_slot->setId(result[1]);
				$schedule_slot->setSchedule_id(result[2]);
				$schedule_slots[] = $dir;
			}// end while
		} else {
			$schedule_slot = false
		}
		return $schedule_slot;
	}// end function

	// tickets // --------------------

	public function createTickets($tickets) {
		global $con;
		$fieldsString = csvObject($tickets);
		$valuesString = csvString($tickets);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readTickets($id) {
		global $con;
		$sql = 'SELECT * FROM tickets WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$tickets = new Tickets();
			$tickets->setEvent_id(result[0]);
			$tickets->setTicket_id(result[1]);
			$tickets->setTicket_price(result[2]);
			$tickets->setMaxNum(result[3]);
			$tickets->setCurrentNum(result[4]);
		} else {
			$tickets = false
		}
		return $tickets;
	}// end function

	public function updateTickets($tickets) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO tickets VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteTickets($id) {
		global $con;
		$sql = 'DELETE FROM tickets WHERE event_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readTickets() {
		global $con;
		$sql = 'SELECT * FROM tickets';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$ticketss = array();
			while($result = mysql_fetch_array($results)) {
				$tickets = new Tickets();
				$tickets->setEvent_id(result[0]);
				$tickets->setTicket_id(result[1]);
				$tickets->setTicket_price(result[2]);
				$tickets->setMaxNum(result[3]);
				$tickets->setCurrentNum(result[4]);
				$ticketss[] = $dir;
			}// end while
		} else {
			$tickets = false
		}
		return $tickets;
	}// end function

	// volunteer // --------------------

	public function createVolunteer($volunteer) {
		global $con;
		$fieldsString = csvObject($volunteer);
		$valuesString = csvString($volunteer);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readVolunteer($id) {
		global $con;
		$sql = 'SELECT * FROM volunteer WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$volunteer = new Volunteer();
			$volunteer->setConsentAge(result[0]);
			$volunteer->setConsentVideo(result[1]);
			$volunteer->setConsentWaiver(result[2]);
			$volunteer->setConsentPhoto(result[3]);
			$volunteer->setAvailDay(result[4]);
			$volunteer->setAvailEve(result[5]);
			$volunteer->setAvailWend(result[6]);
			$volunteer->setPerson_person_id(result[7]);
			$volunteer->setIsBoardMember(result[8]);
			$volunteer->setConsentMinor(result[9]);
			$volunteer->setConsentSafety(result[10]);
			$volunteer->setEmergencyName(result[11]);
			$volunteer->setEmergencyPhone(result[12]);
			$volunteer->setChurchAmbassador(result[13]);
			$volunteer->setAffiliation(result[14]);
		} else {
			$volunteer = false
		}
		return $volunteer;
	}// end function

	public function updateVolunteer($volunteer) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO volunteer VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteVolunteer($id) {
		global $con;
		$sql = 'DELETE FROM volunteer WHERE consentAge = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readVolunteer() {
		global $con;
		$sql = 'SELECT * FROM volunteer';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$volunteers = array();
			while($result = mysql_fetch_array($results)) {
				$volunteer = new Volunteer();
				$volunteer->setConsentAge(result[0]);
				$volunteer->setConsentVideo(result[1]);
				$volunteer->setConsentWaiver(result[2]);
				$volunteer->setConsentPhoto(result[3]);
				$volunteer->setAvailDay(result[4]);
				$volunteer->setAvailEve(result[5]);
				$volunteer->setAvailWend(result[6]);
				$volunteer->setPerson_person_id(result[7]);
				$volunteer->setIsBoardMember(result[8]);
				$volunteer->setConsentMinor(result[9]);
				$volunteer->setConsentSafety(result[10]);
				$volunteer->setEmergencyName(result[11]);
				$volunteer->setEmergencyPhone(result[12]);
				$volunteer->setChurchAmbassador(result[13]);
				$volunteer->setAffiliation(result[14]);
				$volunteers[] = $dir;
			}// end while
		} else {
			$volunteer = false
		}
		return $volunteer;
	}// end function

	// volunteer_has_interest // --------------------

	public function createVolunteer_has_interest($volunteer_has_interest) {
		global $con;
		$fieldsString = csvObject($volunteer_has_interest);
		$valuesString = csvString($volunteer_has_interest);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readVolunteer_has_interest($id) {
		global $con;
		$sql = 'SELECT * FROM volunteer_has_interest WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$volunteer_has_interest = new Volunteer_has_interest();
			$volunteer_has_interest->setVolunteer_Person_person_id(result[0]);
			$volunteer_has_interest->setInterest_interest_id(result[1]);
		} else {
			$volunteer_has_interest = false
		}
		return $volunteer_has_interest;
	}// end function

	public function updateVolunteer_has_interest($volunteer_has_interest) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO volunteer_has_interest VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteVolunteer_has_interest($id) {
		global $con;
		$sql = 'DELETE FROM volunteer_has_interest WHERE Volunteer_Person_person_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readVolunteer_has_interest() {
		global $con;
		$sql = 'SELECT * FROM volunteer_has_interest';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$volunteer_has_interests = array();
			while($result = mysql_fetch_array($results)) {
				$volunteer_has_interest = new Volunteer_has_interest();
				$volunteer_has_interest->setVolunteer_Person_person_id(result[0]);
				$volunteer_has_interest->setInterest_interest_id(result[1]);
				$volunteer_has_interests[] = $dir;
			}// end while
		} else {
			$volunteer_has_interest = false
		}
		return $volunteer_has_interest;
	}// end function

	// volunteer_serves_on_committee // --------------------

	public function createVolunteer_serves_on_committee($volunteer_serves_on_committee) {
		global $con;
		$fieldsString = csvObject($volunteer_serves_on_committee);
		$valuesString = csvString($volunteer_serves_on_committee);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readVolunteer_serves_on_committee($id) {
		global $con;
		$sql = 'SELECT * FROM volunteer_serves_on_committee WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$volunteer_serves_on_committee = new Volunteer_serves_on_committee();
			$volunteer_serves_on_committee->setVolunteer_Person_person_id(result[0]);
			$volunteer_serves_on_committee->setCommittee_committee_id(result[1]);
			$volunteer_serves_on_committee->setIs_chairman(result[2]);
		} else {
			$volunteer_serves_on_committee = false
		}
		return $volunteer_serves_on_committee;
	}// end function

	public function updateVolunteer_serves_on_committee($volunteer_serves_on_committee) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO volunteer_serves_on_committee VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteVolunteer_serves_on_committee($id) {
		global $con;
		$sql = 'DELETE FROM volunteer_serves_on_committee WHERE Volunteer_Person_person_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readVolunteer_serves_on_committee() {
		global $con;
		$sql = 'SELECT * FROM volunteer_serves_on_committee';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$volunteer_serves_on_committees = array();
			while($result = mysql_fetch_array($results)) {
				$volunteer_serves_on_committee = new Volunteer_serves_on_committee();
				$volunteer_serves_on_committee->setVolunteer_Person_person_id(result[0]);
				$volunteer_serves_on_committee->setCommittee_committee_id(result[1]);
				$volunteer_serves_on_committee->setIs_chairman(result[2]);
				$volunteer_serves_on_committees[] = $dir;
			}// end while
		} else {
			$volunteer_serves_on_committee = false
		}
		return $volunteer_serves_on_committee;
	}// end function

	// work // --------------------

	public function createWork($work) {
		global $con;
		$fieldsString = csvObject($work);
		$valuesString = csvString($work);
		$sql = 'INSERT INTO ' . $tableTitle . '(' . $fieldsString . ') VALUES (' . $valuesString . ')';
		$this->open();
		$result = mysql_query($sql, $con);
		$id = ($result) ? mysql_insert_id() : $result;
		$this->close();
		return $id;
	}// end function

	public function readWork($id) {
		global $con;
		$sql = 'SELECT * FROM work WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$work = new Work();
			$work->setIdWork(result[0]);
			$work->setAmount(result[1]);
			$work->setVolunteer_Person_person_id(result[2]);
			$work->setDate(result[3]);
			$work->setWorkType_workType_id(result[4]);
			$work->setEntered_by_id(result[5]);
			$work->setAdmin_idAdmin(result[6]);
			$work->setEvent_event_id(result[7]);
		} else {
			$work = false
		}
		return $work;
	}// end function

	public function updateWork($work) {
		global $con;
		$fieldsString = csvString($fields);
		$sql = 'INSERT INTO work VALUES (' . $valueString . ')  WHERE id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function deleteWork($id) {
		global $con;
		$sql = 'DELETE FROM work WHERE idWork = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
	}// end function

	public function readWork() {
		global $con;
		$sql = 'SELECT * FROM work';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$works = array();
			while($result = mysql_fetch_array($results)) {
				$work = new Work();
				$work->setIdWork(result[0]);
				$work->setAmount(result[1]);
				$work->setVolunteer_Person_person_id(result[2]);
				$work->setDate(result[3]);
				$work->setWorkType_workType_id(result[4]);
				$work->setEntered_by_id(result[5]);
				$work->setAdmin_idAdmin(result[6]);
				$work->setEvent_event_id(result[7]);
				$works[] = $dir;
			}// end while
		} else {
			$work = false
		}
		return $work;
	}// end function


?>
