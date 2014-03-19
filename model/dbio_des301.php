<?php

class DBIO {
	
	
		// ATTRIBUTES /////////////////////////////////////////////////////////////////////////////
		
		protected $con;
		
		
		// CONSTRUCTOR ////////////////////////////////////////////////////////////////////////////
		
		public function __construct() {}
		
		
		// METHODS ////////////////////////////////////////////////////////////////////////////////
		
		function open() {
			$hostname="128.118.31.16:3306";
			$username="remote";
			$password="password";
			$dbname="homes_db";
			
			 global $con;
			 $con = mysql_connect($hostname,$username, $password) or die ("no worky");
			 mysql_select_db($dbname);
		}// END
		
		
		function close() {
			global $con;
			mysql_close($con);
		}// END
	

		/*
			requires: array of values, left char, right char: most often the left and right chars will be the same
			returns: sring of CSV
			the $l and $r are the left and right chars that will contain the data
			EXAMPLE: 'a', 'b', 'c', 'd' -OR- 1, 2, 3, 4 -OR- ('a'), ('b'), ('c'), ('d')
			use '\'' to enclose the data in single quotes
		*/
		function superStringIt($values, $l, $r) {
			$size = count($values);
			if ($size > 0) {
				$itemString = ($l . $values[0] . $r);
				for ($i = 1; $i < $size; $i++) {
					$itemString .= (',' . $l . $values[$i] . $r);
				}
			} else {
				echo 'ERROR: dbio.stringIt.$size <= 0';
				exit();
			}
			return $itemString;
		}// end function
		
///////////////////////////////////////////////////////////////////////////////////////////////////
		
		public function getLogin($user,$pw){

			global $con;

			$sql='SELECT username,password FROM Account WHERE username="'.$user.'" AND password="'.$pw.'"';
			$this->open();
			$results=mysql_query($sql,$con);
			$final=mysql_fetch_row($results);
			$status=$final[0];
			$this->close();
			return $status;
		}

		public function getAvailability($ppid){

			global $con;

			$sql= 'SELECT availDay,availEve,availWend from Volunteer where Person_person_id="'.$ppid.'"';
			$this->open();
			$avail = array();
			$results=mysql_query($sql,$con);
			while($result = mysql_fetch_array($results)) {
			 $ava = new Availability();
			 $ava->setDay($result[0]);
			 $ava->setEve($result[1]);
			 $ava->setWend($result[2]);
			 $avail[] = $ava;
		  }// end while
		  $this->close();
		  return avail;

		}
		
	   




	   public function getAllInterests() {
		  $interests = $this->getAllInts();
		  return $interests;
	   }

	   public function getInterestTypes() {
		  $types = $this->getIntTypes();
		  return $types;
	   }
	   
	   public function getVolunteerInterests($volunteerId) {
		  $volIntIds = $this->getVolInts($volunteerId);
		  $interests = $this->getAllInts();
		  foreach ($interests as $int) {
			 $int->setIsInterest(in_array($int->getId(), $volIntIds));
		  }// end foreach
		  return $interests;
	   }// end function
		
	   private function getIntTypes() {
		  global $con;
		  $sql = 'SELECT type_id, title FROM Interest_Type';
		  $types = array();
		  $this->open();		
		  $results = mysql_query($sql, $con);
		  while($result = mysql_fetch_array($results)) {
			 $types[$result[0]] = new Item($result[0], $result[1]);
		  }// end while
		  $this->close();
		  return $types;
	   }// end function
		
	   private function getVolInts($vid) {
		  global $con;
		  $sql = 'SELECT Interest_interest_id FROM Volunteer_has_Interest WHERE Volunteer_Person_person_id= ' . $vid;
		  $volIntIds = array();
		  $ints = array();
		  $this->open();
		  $results = mysql_query($sql, $con);
		  while($result = mysql_fetch_array($results)) {
			 $vii = $result[0];
			 $volIntIds[] = $vii;
		  }// end while
		  $this->close();
		  return $volIntIds;
	   }// end function

	   private function getAllInts() {
		  global $con;
		  $sql = 'SELECT interest_id, title, type_id FROM Interest';
		  $ints = array();
		  $this->open();
		  $results = mysql_query($sql, $con);
		  while($result = mysql_fetch_array($results)) {
			 $int = new Interest();
			 $int->setId($result[0]);
			 $int->setTitle($result[1]);
			 $int->setTypeId($result[2]);
			 $ints[] = $int;
		  }// end while
		  $this->close();
		  return $ints;
	   }// end function

	   public function readAccount($id) {
			global $con;
			$sql = 'SELECT * FROM Account WHERE account_id = ' . $id;
			$this->open();
			$result = mysql_query($sql, $con);
			$this->close();
			if ($result) {
				$result = mysql_fetch_array($result);
				$account = new Account();
				$account->setAccount_id($result[0]);
				$account->setUsername($result[1]);
				$account->setPassword($result[2]);
				$account->setDate($result[3]);
				$account->setStatus($result[4]);
				$account->setIsOffice($result[5]);
				$account->setIsVolunteer($result[6]);
				$account->setPerson($result[7]);
			} else {
				echo " DB error";
			}
			return $account;
		}// end function

		public function readPerson($id) {
			global $con;
			$sql = 'SELECT * FROM Person WHERE person_id = ' . $id;
			$this->open();
			$result = mysql_query($sql, $con);
			$this->close();
			if ($result) {
				$result = mysql_fetch_array($result);
				$person = new Person();
				$person->setPerson_id($result[0]);
				$person->setTitle($result[1]);
				$person->setFirst_name($result[2]);
				$person->setLast_name($result[3]);
				$person->setGender($result[4]);
				$person->setDob($result[5]);
				$person->setMarital_status($result[6]);
				$person->setContact($result[7]);
				$person->setIsActive($result[8]);
				$person->setLastActive($result[9]);
				$person->setPrefEmail($result[10]);
				$person->setPrefMail($result[11]);
				$person->setPrefPhone($result[12]);
			} else {
				echo "DB error";
			}
			return $person;
		}// end function

			public function readContact($id) {
		global $con;
		$sql = 'SELECT * FROM Contact WHERE contact_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
				$result = mysql_fetch_array($result);
				$contact = new Contact();
				$contact->setContact_id($result[0]);
				$contact->setAddress($result[1]);
				$contact->setPhone($result[2]);
				$contact->setEmail($result[3]);
				$contact->setPhone2($result[4]);
				$contact->setExtension($result[5]);
		} else {
			echo "DB eroor";
		}
		return $contact;
	}// end function


	public function readAddress($id) {
		global $con;
		$sql = 'SELECT * FROM Address where address_id = ' . $id;
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$result = mysql_fetch_array($result);
			$address = new Address();
			$address->setAddress_id($result[0]);
			$address->setStreet1($result[1]);
			$address->setStreet2($result[2]);
			$address->setCity($result[3]);
			$address->setState($result[4]);
			$address->setZip($result[5]);
		} else {
			echo "DB eroor";
		}
		return $address;
	}// end function

	public function readAccounts() {
		global $con;
		$sql = 'SELECT * FROM Account';
		$this->open();
		$result = mysql_query($sql, $con);
		$accounts =array();
		while($rows = mysql_fetch_array($result)){
			$account = new Account();
			$account->setAccount_id($rows[0]);
			$account->setUsername($rows[1]);
			$account->setPassword($rows[2]);
			$account->setDate($rows[3]);
			$account->setStatus($rows[4]);
			$account->setIsOffice($rows[5]);
			$account->setIsVolunteer($rows[6]);
			$account->setPerson($rows[7]);
			$accounts[] = $account;
		}
		$this->close();
		return $accounts;
	}// end function

	public function updateInfo($accid,$person,$contact,$address) {
		global $con;
		
		$sql = "update Person set title='" . $person->getTitle() ."', first_name='" . $person->getFirst_name() . "' , last_name='" . $person->getLast_name() . "' where person_id=(select person_id from Account where account_id=" . $accid . ");" ;
		//$sql2 = "update Contact set phone='" . $contact->getPhone() . "', email='" . $contact->getEmail() . "', phone2='" . $contact->getPhone2() . "' , extension='" . $contact->getExtension() "' where contact_id=(select Contact_contact_id from Person where person_id=(select person_id from Account where account_id=" . $accid . "));"
		$this->open();
		$result = mysql_query($sql, $con);
	//	$result2 = mysql_query($sql2, $con);
		if($result)// && $result2)
			echo "UPDATED";

	}                                

	}


	public function readAllEvent() {
		global $con;
		$sql = 'SELECT * FROM Event';
		$this->open();
		$result = mysql_query($sql, $con);
		$events= array();
		
		while($rows = mysql_fetch_array($result)){
			$event = new Event();
			$event->setEvent_id($rows[0]);
			$event->setTitle($rows[1]);
			$event->setDate($rows[2]);
			$event->setTime($rows[3]);
			$event->setType($rows[4]);
			$event->setAddress($rows[5]);
			$event->setCommittee($rows[7]);
			$event->setSponsoredBy($rows[8]);
			$events[]=$event;
		} 
		$this->close();
		return $events;
	}// end function


	public function readAllEvent_Type() {
		global $con;
		$sql = 'SELECT * FROM Event_Type';
		$this->open();
		$result = mysql_query($sql, $con);
		$event_types=array();
		
		while($rows = mysql_fetch_array($result)) {
			$event_type = new Event_type();
			$event_type->setType_id($rows[0]);
			$event_type->setTitle($rows[1]);
			$event_type->setDescription($rows[2]);
			$event_types[]=$event_type;
		} 
		$this->close();
		return $event_types;
	}// end function

	public function countEventGuests($event_id) {
		global $con;
		$sql = "Select Count(*) from Person_relates_to_Event where Event_event_id=".$event_id. " And onGuestList=1";
		$this->open();
		$result = mysql_query($sql, $con); 
		$this->close();
		$row=mysql_fetch_array($result);
		return $row[0];
	}// end function	
 

	public function searchEventByType($eventTypeId) {
		global $con;
		$sql = 'SELECT * FROM Event Where type_id='.$eventTypeId;
		$this->open();
		$result = mysql_query($sql, $con);
		$events= array();
		
		while($rows = mysql_fetch_array($result)){
			$event = new Event();
			$event->setEvent_id($rows[0]);
			$event->setTitle($rows[1]);
			$event->setDate($rows[2]);
			$event->setTime($rows[3]);
			$event->setType($rows[4]);
			$event->setAddress($rows[5]);
			$event->setCommittee($rows[7]);
			$event->setSponsoredBy($rows[8]);
			$events[]=$event;
		} 
		$this->close();
		return $events;
	}// end function
	                   

	public function readAllCommittee() {
		global $con;
		$sql = 'SELECT * FROM Committee';
		$this->open();
		$result = mysql_query($sql, $con);
		$committees=array();
		
		while($rows = mysql_fetch_array($result)) {
			$committe = new Committee();
			$committe->setCommittee_id($rows[0]);
			$committe->setTitle($rows[1]);
			$committes[]=$committe;
		} 
		$this->close();
		return $committes;
	}// end function


	public function createEvent($addressObj , $eventObj){
		global $con;
		$this->open();

		$sql =	"INSERT INTO Address
				(street1,street2,city,state,zip)
				VALUES
				('" .$addressObj->getStreet1(). "','" .$addressObj->getStreet2(). "','" .$addressObj->getCity(). "','" .$addressObj->getState(). "','" .$addressObj->getZip(). "');";
		mysql_query($sql, $con);


		$sql= 	"INSERT INTO Event
				(title,date,time,type_id,Address_address_id,Project_project_id,Committee_committee_id,sponsoredBy)
				SELECT 
				 '" .$eventObj->getTitle(). "' , CAST('" . $eventObj->getDate()."' As Date) , CAST('" . $eventObj->getTime()."' As Time) ," .$eventObj->getType(). " , Max(address_id), Null ," .$eventObj->getCommittee()." ,'" .$eventObj->getSponsoredBy(). "' From Address;" ;
		mysql_query($sql, $con);			

		$this->close();
	}



}// end class
?>
