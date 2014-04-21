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
			EXAMPLE: 'a', 'b', 'c', 'd'OR- 1, 2, 3, 4OR- ('a'), ('b'), ('c'), ('d')
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

		public function getPersonId($accid){

			global $con;

			$sql='SELECT person_id FROM Account WHERE account_id="'. $accid .'"';
			$this->open();
			$result=mysql_query($sql,$con);
			while($row = mysql_fetch_array($result)) {
				$pid = $row[0];
			}
			$this->close();
			return $pid;
		}

		public function getPersonIdByUserName($userName){

			global $con;

			$sql='SELECT person_id FROM Account WHERE username="'. $userName .'"';
			$this->open();
			$result=mysql_query($sql,$con);
			while($row = mysql_fetch_array($result)) {
				$pid = $row[0];
			}
			$this->close();
			return $pid;
		}

		public function getVolunteerAvailability($ppid){


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
			 //$avail[] = $ava;
			 //var_dump($avail);
		  }// end while
		  $this->close();
		  return $ava;

		}

		public function getVolunteerConsent($ppid){
			global $con;
			$sql='SELECT consentMinor,consentAge,consentPhoto,consentSafety,consentVideo,consentWaiver,emergencyName,emergencyPhone from Volunteer where Person_person_id="'.$ppid.'"';
			$this->open();
			
			$results=mysql_query($sql,$con);
			while($result = mysql_fetch_array($results)){
			$volunteerConsent= new Consent();
			$volunteerConsent->setMinor($result[0]);
			$volunteerConsent->setMajor($result[1]);
			$volunteerConsent->setPhoto($result[2]);
			$volunteerConsent->setSafety($result[3]);
			$volunteerConsent->setVideo($result[4]);
			$volunteerConsent->setWaiver($result[5]);
			$volunteerConsent->setName($result[6]);
			$volunteerConsent->setPhone($result[7]);

			}
			$this->close();
			return $volunteerConsent;
		}

		public function setVolunteerConsent($personid,$consentMinor,$consentAge,$consentPhoto,$consentSafety,$consentVideo,$consentWaiver,$emergencyName,$emergencyPhone)
		{
			global $con;
			$sql='UPDATE Volunteer SET consentMinor="'.$consentMinor.'",consentAge="'.$consentAge.'",consentPhoto="'.$consentPhoto.'",consentSafety="'.$consentSafety.'",consentVideo="'.$consentVideo.'",consentWaiver="'.$consentWaiver.'",emergencyName="'.$emergencyName.'",emergencyPhone="'.$emergencyPhone.'" WHERE Person_person_id="'.$personid.'"';
			$this->open();
			$result=mysql_query($sql,$con);
			if(!$result){
				echo mysql_error("Some error occured while processing your request");
			}
			$this->close();
			return $result;

		}


		public function setVolunteerAvailability($personID,$day,$eve,$wend){
			global $con;
			$sql='UPDATE Volunteer SET availDay="'.$day.'",availEve="'.$eve.'",availWend="'.$wend.'" WHERE Person_person_id="'.$personID.'"';
			$this->open();
			$result=mysql_query($sql,$con);
			if (!$result) {
  			echo mysql_error("Some error occured while processing your request");
			}
			$this->close();
			return $result;

		}
		
	   

////////////////////////////////////Interests/////////////////////////////////////////////////////////////////////	   
//////////////////////////////////////|-_-_-_-|\///////////////////////////////////////////////////////////////	   


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


	   public function deleteInterestsByVolunteer($personid){
	   	global $con;
	   	$sql= 'Delete from Volunteer_has_Interest Where Volunteer_Person_person_id='. $personid ;
	   	$this->open();
	   	mysql_query($sql,$con);
	   	$this->close();
	   	return true;

	   }

	   public function addInterestByVolunteer($personid, $interestIds){

	   	global $con;
	   	$this->open();
	   	
	   	foreach ($interestIds as $interestId) {
		$sql=	"INSERT INTO Volunteer_has_Interest(Volunteer_Person_person_id,Interest_interest_id) 
			  	VALUES(" .$personid. "," . $interestId. ");" ; 

		mysql_query($sql, $con);
		}	  	
		$this->close();
		return true;
	   }

	   public function readAccountInfo($pid) {
			global $con;
			$sql = 'SELECT * FROM Account WHERE person_id = ' . $pid;
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
		$sql = 'SELECT Account.account_id, Account.username, Account.person_id, Person.person_id, Person.title, Person.first_name, Person.last_name, Person.dob, Person.Contact_contact_id, Contact.contact_id, Contact.phone, Contact.address_id, Address.address_id, Address.street1, Address.street2, Address.state, Address.city , Address.zip FROM Account inner join Person on Account.person_id = Person.person_id inner join Contact on Person.Contact_contact_id = Contact.contact_id inner join Address on Contact.address_id = Address.address_id';
		$this->open();
		$result = mysql_query($sql, $con);
		$person = array();
		$accounts =array();
		$contacts =array();
		while($rows = mysql_fetch_array($result)){
			$account = new Account();
			$contact = new Contact();
			$address = new Address();
			$person = new Person();
			$account->setAccount_id($rows[0]);
			$account->setUsername($rows[1]);
			$account->setPerson($rows[2]);
			$person->setPerson_id($rows[3]);
			$person->setTitle($rows[4]);
			$person->setFirst_name($rows[5]);
			$person->setLast_name($rows[6]);
			$person->setDob($rows[7]);
			$person->setContact($rows[8]);
			$contact->setContact_id($rows[9]);
			$contact->setPhone($rows[10]);
			$contact->setAddress($rows[11]);
			$address->setAddress_id($rows[12]);
			$address->setStreet1($rows[13]);
			$address->setStreet2($rows[14]);
			$address->setCity($rows[15]);
			$address->setState($rows[16]);
			$address->setZip($rows[17]);
			$contact->setAddress($address);
			$accounts[] = $account;
			$persons[] = $person;
			$contacts[] = $contact;
		}
		$tableinfo = array($accounts,$persons,$contacts);
		$this->close();
		return $tableinfo;
	}// end function

	public function searchAccountname($fname,$lname){
	    	global $con;
			$this->open();
			$sql = "SELECT Account.account_id, Account.username, Account.person_id, Person.person_id, Person.title, Person.first_name, Person.last_name, Person.dob, Person.Contact_contact_id, Contact.contact_id, Contact.phone, Contact.address_id, Address.address_id, Address.street1, Address.street2, Address.state, Address.city , Address.zip FROM Account inner join Person on Account.person_id = Person.person_id inner join Contact on Person.Contact_contact_id = Contact.contact_id inner join Address on Contact.address_id = Address.address_id where Person.first_name = '" . $fname . "' OR Person.last_name = '" . $lname ."'";
			$result = mysql_query($sql,$con);
			$person = array();
			$accounts =array();
			$contacts =array();
			while($rows = mysql_fetch_array($result)){
				$account = new Account();
				$contact = new Contact();
				$address = new Address();
				$person = new Person();
				$account->setAccount_id($rows[0]);
				$account->setUsername($rows[1]);
				$account->setPerson($rows[2]);
				$person->setPerson_id($rows[3]);
				$person->setTitle($rows[4]);
				$person->setFirst_name($rows[5]);
				$person->setLast_name($rows[6]);
				$person->setDob($rows[7]);
				$person->setContact($rows[8]);
				$contact->setContact_id($rows[9]);
				$contact->setPhone($rows[10]);
				$contact->setAddress($rows[11]);
				$address->setAddress_id($rows[12]);
				$address->setStreet1($rows[13]);
				$address->setStreet2($rows[14]);
				$address->setCity($rows[15]);
				$address->setState($rows[16]);
				$address->setZip($rows[17]);
				$contact->setAddress($address);
				$accounts[] = $account;
				$persons[] = $person;
				$contacts[] = $contact;
		}
		$tableinfo = array($accounts,$persons,$contacts);
		$this->close();
		return $tableinfo;		
	    }

	    public function searchAccountorg($org){
	    	global $con;
			$this->open();
			$sql = "SELECT Account.account_id, Account.username, Account.person_id, Person.person_id, Person.title, Person.first_name, Person.last_name, Person.dob, Person.Contact_contact_id, Contact.contact_id, Contact.phone, Contact.address_id, Address.address_id, Address.street1, Address.street2, Address.state, Address.city , Address.zip FROM Account inner join Person on Account.person_id = Person.person_id inner join Contact on Person.Contact_contact_id = Contact.contact_id inner join Address on Contact.address_id = Address.address_id where Person.person_id = 2";
			$result = mysql_query($sql,$con);
			$person = array();
			$accounts =array();
			$contacts =array();
			while($rows = mysql_fetch_array($result)){
				$account = new Account();
				$contact = new Contact();
				$address = new Address();
				$person = new Person();
				$account->setAccount_id($rows[0]);
				$account->setUsername($rows[1]);
				$account->setPerson($rows[2]);
				$person->setPerson_id($rows[3]);
				$person->setTitle($rows[4]);
				$person->setFirst_name($rows[5]);
				$person->setLast_name($rows[6]);
				$person->setDob($rows[7]);
				$person->setContact($rows[8]);
				$contact->setContact_id($rows[9]);
				$contact->setPhone($rows[10]);
				$contact->setAddress($rows[11]);
				$address->setAddress_id($rows[12]);
				$address->setStreet1($rows[13]);
				$address->setStreet2($rows[14]);
				$address->setCity($rows[15]);
				$address->setState($rows[16]);
				$address->setZip($rows[17]);
				$contact->setAddress($address);
				$accounts[] = $account;
				$persons[] = $person;
				$contacts[] = $contact;
		}
		$tableinfo = array($accounts,$persons,$contacts);
		$this->close();
		return $tableinfo;			
	    }

	public function updateInfo($pid,$person,$contact,$address) {
		global $con;
		
		$sql = "update Person set title='" . $person->getTitle() ."', first_name='" . $person->getFirst_name() . "' , last_name='" . $person->getLast_name() . "' , dob='" . $person->getDob() . "' where person_id=" . $pid . ";" ;
		$sql2 = "update Contact set phone='" . $contact->getPhone() . "', email='" . $contact->getEmail() . "', phone2='" . $contact->getPhone2() . "' , extension='" . $contact->getExtension() . "' where contact_id=(select Contact_contact_id from Person where person_id=" . $pid . ");";
		$sql3 = "UPDATE Address SET street1='" . $address->getStreet1() . "', street2='" . $address->getStreet2() . "', city='" . $address->getCity() . "', state='" . $address->getState() . "', zip='" . $address->getZip() ."' WHERE address_id=(SELECT address_id FROM Contact WHERE contact_id=(SELECT Contact_contact_id FROM Person WHERE person_id=" . $pid ."));";
		$this->open();
		$result = mysql_query($sql, $con);
	 	$result2 = mysql_query($sql2, $con);
	 	$result3 = mysql_query($sql3,$con);
		if($result && $result2 && $result3)
			return true;
		else
			return false;

	}                                

////////////////////////////////////Events/////////////////////////////////////////////////////////////////////	   
//////////////////////////////////////|-_-_-_-|\///////////////////////////////////////////////////////////////	   

	public function readAllEvent() {
		global $con;
		$sql = 'SELECT * FROM Event Order By date DESC';
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
			$event->setMaxNumGuests($rows[9]);
			$event->setEndTime($rows[10]);
			$events[]=$event;
		} 
		$this->close();
		return $events;
	}// end function

	public function readEvent($event_id){
		global $con;
		$this->open();
		$eventName=array();
		$sql = 'SELECT * FROM Event where event_id="'. $event_id .'"';
		$result = mysql_query($sql,$con);

		while ($rows = mysql_fetch_array($result)){
			$event = new Event();
			$event->setEvent_id($rows[0]);
			$event->setTitle($rows[1]);
			$event->setDate($rows[2]);
			$event->setTime($rows[3]);
			$event->setType($rows[4]);
			$event->setAddress($rows[5]);
			$event->setCommittee($rows[7]);
			$event->setSponsoredBy($rows[8]);
			$event->setMaxNumGuests($rows[9]);
			$event->setEndTime($rows[10]);
			$eventName[]=$event;
		}
		//$ints = array();
		$this->close();
		return $eventName;
		}	


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


	public function updateEvent($eventObj, $addressObj) {
		global $con;
		
		$sql = "UPDATE Event SET title='" . $eventObj->getTitle() ."', date=CAST('" . $eventObj->getDate()."' As Date) , time=CAST('" . $eventObj->getTime()."' As Time), type_id=" . $eventObj->getType() .", Address_address_id=" . $addressObj->getAddress_id() .", Committee_committee_id=" . $eventObj->getCommittee() .", sponsoredBy='" . $eventObj->getSponsoredBy()."', endTime=CAST('" . $eventObj->getEndTime()."' As Time) Where event_id=" . $eventObj->getEvent_id() . ";" ;
		
		$sql2 = "UPDATE Address SET street1='" . $addressObj->getStreet1() . "', street2='" . $addressObj->getStreet2() . "', city='" . $addressObj->getCity() . "', state='" . $addressObj->getState() . "' WHERE address_id=". $addressObj->getAddress_id() .";";

		$this->open();
		mysql_query($sql, $con);
	 	mysql_query($sql2,$con);
		//if($result && $result2)
		$this->close();
			return true;
		//else
		//	return false;
	}      

	public function createEvent($addressObj , $eventObj){
		global $con;
		$this->open();

		$sql =	"INSERT INTO Address
				(street1,street2,city,state,zip)
				VALUES
				('" .$addressObj->getStreet1(). "','" .$addressObj->getStreet2(). "','" .$addressObj->getCity(). "','" .$addressObj->getState(). "','" .$addressObj->getZip(). "');";
		mysql_query($sql, $con);


		$sql= 	"INSERT INTO Event
				(title,date,time,type_id,Address_address_id,Project_project_id,Committee_committee_id,sponsoredBy,endTime)
				SELECT 
				 '" .$eventObj->getTitle(). "' , CAST('" . $eventObj->getDate()."' As Date) , CAST('" . $eventObj->getTime()."' As Time) ," .$eventObj->getType(). " , Max(address_id), Null ," .$eventObj->getCommittee()." ,'" .$eventObj->getSponsoredBy(). "', CAST('" . $eventObj->getEndTime()."' As Time) From Address;" ;
		mysql_query($sql, $con);			

		$this->close();
	}

	public function countEventGuests($event_id) {
		global $con;
		$sql = "Select Count(*) from Person_relates_to_Event where Event_event_id=".$event_id. " And onGuestList=1";
		$this->open();
		$result = mysql_query($sql, $con); 
		$this->close();
		$row=mysql_fetch_array($result);
		return $row[0];
	}// end function	
 
	
	 public function readGuestsByEvent($eventId) {
			global $con;
			$sql = 'SELECT * FROM Person WHERE person_id IN (Select Person_person_id FROM Person_relates_to_Event WHERE Event_event_id=' . $eventId . ' AND onGuestList=1);';
			$this->open();
			$result = mysql_query($sql, $con);
			$guests=array();
			
			while($rows = mysql_fetch_array($result)) {
				$person = new Person();
				$person->setPerson_id($rows[0]);
				$person->setTitle($rows[1]);
				$person->setFirst_name($rows[2]);
				$person->setLast_name($rows[3]);
				$person->setGender($rows[4]);
				$person->setDob($rows[5]);
				$person->setMarital_status($rows[6]);
				$person->setContact($rows[7]);
				$person->setIsActive($rows[8]);
				$person->setLastActive($rows[9]);
				$person->setPrefEmail($rows[10]);
				$person->setPrefMail($rows[11]);
				$person->setPrefPhone($rows[12]);
				$guests[]=$person;
			} 
			$this->close();
			return $guests;
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
			$event->setMaxNumGuests($rows[9]);
			$event->setEndTime($rows[10]);
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


	

	public function updatePrefs($person) {
		global $con;
		
		$sql = "UPDATE Person SET prefEmail=". $person->getPrefEmail() .", prefMail=" . $person->getPrefMail() . ", prefPhone=" . $person->getPrefPhone() . " WHERE person_id=" . $person->getPerson_id() . ";";
		$this->open();
		$result = mysql_query($sql, $con);
		if($result)
			return true;
		else
			return false;
	}

	public function getEventId($person_id){
		global $con;
		$sql='SELECT Event_event_id from Person_relates_to_Event where Person_person_id="'.$person_id.'"'; 
		//$eventId=array();
		$this->open();
		$result=mysql_query($sql,$con);
		if (!$result) {
  		echo mysql_error("Some error occured while processing your request");
		}
		while ($row = mysql_fetch_array($result)){
				$eventId=$row[0];

			}
		$this->close();
		return $eventId;
	}
	
	 public function checkVolunteerProcessing($volunteerId, $eventId) {
        global $con;
        $sql = "SELECT * FROM Work WHERE Event_event_id=" .$eventId. " AND Volunteer_Person_person_id=" . $volunteerId;
        $this->open();
        $results = mysql_query($sql, $con);
        while ($result = mysql_fetch_array($results)) {
        	$isProcessed = $result[0];
        }
        $this->close();
        if(isset($isProcessed))
        	return true;
        else
        	return false;
    }

    public function readAuctionForEvent($eventId){

    	global $con;
		$sql = 'SELECT * FROM Auction_Item Where event_id='.$eventId;
		$this->open();
		$result = mysql_query($sql, $con);
		$auctionItems= array();
		
		while($rows = mysql_fetch_array($result)){
			$auctionItem = new Auction_item();
			$auctionItem->setAuction_item_id($rows[0]);
			$auctionItem->setItem_num($rows[1]);
			$auctionItem->setTitle($rows[2]);
			$auctionItem->setDescription($rows[3]);
			$auctionItem->setPrice($rows[4]);
			$auctionItem->setPerson($rows[5]);
			$auctionItem->setDonation($rows[7]);
			$auctionItem->setEventId($rows[8]);
			$auctionItems[]=$auctionItem;
		} 
		$this->close();
		return $auctionItems;
    }
/////////////////////////////////////Interests/////////////////////////////////////////////////////////////////	   
//////////////////////////////////////|-_-_-_-|\///////////////////////////////////////////////////////////////	   
	    public function listInterests()
	    {
			global $con;
			$this->open();
			//$sql = 'SELECT * FROM Interest ORDER BY "title"';
			$sql = "SELECT * FROM `Interest`\n"
				. "ORDER BY `Interest`.`title` ASC";
			$result = mysql_query($sql,$con);
			$ints = array();
			while ($row = mysql_fetch_array($result))
			{
				$int = new Interest();
				$int->setId($row[0]);
				$int->setTypeId($row[1]);
				$int->setTitle($row[2]);
				$int->setDescription($row[3]);
				$ints[] = $int;
			}
			return $ints;
			$this->close();
	    }
		
		public function listInterestTypes()
		{
			include_once "class/interest_type.php";
		  global $con;
		  $intTypes = array();
		  //$sql = 'SELECT type_id, title FROM Interest_Type ORDER BY "title"';
		  $sql = "SELECT * FROM `Interest_Type`\n"
			. "ORDER BY `Interest_Type`.`title` ASC";
		  //global $types;
		  //$types = array();
		  $this->open();		
		  $result = mysql_query($sql,$con);
		  while($row = mysql_fetch_array($result))
		  {
			 //$types[$row[0]] = new Item($row[0], $row[1]);
			 $intType = new Interest_type();
			 $intType->setType_id($row[0]);
			 $intType->setTitle($row[1]);
			 $intType->setDescription($row[2]);
			 $intTypes[] = $intType;
		  }// end while
		  $this->close();
		  return $intTypes;
		}// end function
		
		public function readInterests($id)
		{
			require_once 'class/volunteerInterest.php';
			global $con;
			$this->open();
			//global $volInts;
			$volInts = array();
			$sql = "SELECT Interest.Interest_id, Interest_Type.type_id, Interest_Type.title, Interest.title, Interest.description
				FROM Interest
				JOIN Interest_Type on Interest.type_id = Interest_Type.type_id
				WHERE Interest.interest_id = '{$id}'";
			$result = mysql_query($sql,$con);
			while ($row = mysql_fetch_array($result))
			{
				$volInt = new volunteerInterest();
				$volInt->setId($row[0]);
				$volInt->setTypeId($row[1]);
				$volInt->setType_title($row[2]);
				$volInt->setInterest_title($row[3]);
				$volInt->setDescription($row[4]);
				$volInts[] = $volInt;
			}
			//return $int;
			$this->close();
			return $volInts;
	    }
		
		public function readInterest($id)
		{
			require_once '/class/volunteerInterest.php';
			global $con;
			$this->open();
			//global $volInts;
			$volInts = array();
			$sql = "SELECT Interest.Interest_id, Interest_Type.type_id, Person.first_name, Person.last_name, Interest_Type.title, Interest.title, Interest.description
				FROM Person
				JOIN Volunteer on Person.Person_id = Volunteer.Person_person_id
				JOIN Volunteer_has_Interest on Volunteer.Person_person_id = Volunteer_has_Interest.Volunteer_Person_person_id
				JOIN Interest on Volunteer_has_Interest.Interest_interest_id = Interest.interest_id
				JOIN Interest_Type on Interest.type_id = Interest_Type.type_id
				WHERE Interest.interest_id = '{$id}'";
			$result = mysql_query($sql,$con);
			while ($row = mysql_fetch_array($result))
			{
				$volInt = new volunteerInterest();
				$volInt->setId($row[0]);
				$volInt->setTypeId($row[1]);
				$volInt->setFirst_name($row[2]);
				$volInt->setLast_name($row[3]);
				$volInt->setType_title($row[4]);
				$volInt->setInterest_title($row[5]);
				$volInt->setDescription($row[6]);
				$volInts[] = $volInt;
			}
			//return $int;
			$this->close();
			return $volInts;
	    	}

		public function readInterestType($id){
			require_once '/class/volunteerInterest.php';
			global $con;
			$this->open();
			//global $volInts;
			$volInts = array();
			$sql = "SELECT Interest_Type.type_id, Person.first_name, Person.last_name, Interest_Type.title, Interest.title
				FROM Person
				JOIN Volunteer on Person.Person_id = Volunteer.Person_person_id
				JOIN Volunteer_has_Interest on Volunteer.Person_person_id = Volunteer_has_Interest.Volunteer_Person_person_id
				JOIN Interest on Volunteer_has_Interest.Interest_interest_id = Interest.interest_id
				JOIN Interest_Type on Interest.type_id = Interest_Type.type_id
				WHERE Interest_Type.type_id = '{$id}'";
			$result = mysql_query($sql,$con);
			while ($row = mysql_fetch_array($result))
			{
				$volInt = new volunteerInterest();
				$volInt->setId($row[0]);
				$volInt->setFirst_name($row[1]);
				$volInt->setLast_name($row[2]);
				$volInt->setType_title($row[3]);
				$volInt->setInterest_title($row[4]);
				$volInts[] = $volInt;
			}
			//return $int;
			$this->close();
			return $volInts;
	    }
		
		public function viewInterestType($id)
		{
			include_once "/class/interest_type.php";
			global $con;
		  $intTypes = array();
		  //$sql = 'SELECT type_id, title FROM Interest_Type ORDER BY "title"';
		  $sql = "SELECT type_id, title, description FROM `Interest_Type`\n"
			. "WHERE type_id = '{$id}' ORDER BY `Interest_Type`.`title` ASC";
		  //global $types;
		  //$types = array();
		  $this->open();		
		  $result = mysql_query($sql,$con);
		  while($row = mysql_fetch_array($result))
		  {
			 //$types[$row[0]] = new Item($row[0], $row[1]);
			 $intType = new Interest_type();
			 $intType->setType_id($row[0]);
			 $intType->setTitle($row[1]);
			 $intType->setDescription($row[2]);
			 $intTypes[] = $intType;
		  }// end while
		  $this->close();
		  return $intTypes;
		}// end function
		
///////////////////////////////////////////Schedule////////////////////////////////////////////////////
//////////////////////////////////////////-_-_-_-//(v)_(';;;')(V)///////////////////////////////////////
		public function createScheduleSlot($person, $scheduleId)
		{
			//$dbio = new DBIO();
			global $con;
			$this->open();
			$tableName = "Volunteer_has_Schedule";
			$sql = "INSERT INTO {$tableName} (Volunteer_Person_person_id, Schedule_id) VALUES ('{$person}', '{$scheduleId}')";
			mysql_query($sql,$con);
			$this->close();
			echo "You have created a new {$tableName}";
		}
		
		public function createSchedule($timeStart, $timeEnd, $eventId, $description, $interestId, $maxNumPeople)
		{
			//$dbio = new DBIO();
			global $con;
			$this->open();
			$tableName = "Schedule";
			$sql = "INSERT INTO {$tableName} (timeStart, timeEnd, Event_event_id, description, Interest_interest_id, maxNumPeople) VALUES ('{$timeStart}', '{$timeEnd}', '{$eventId}', '{$description}', '{$interestId}', '{$maxNumPeople}')";
			//$this->readInterestType();
			mysql_query($sql,$con);
			$this->close();
			echo "You have created a new {$tableName} its a part of the event {$eventId}, it starts at {$timeStart}, and ends at {$timeEnd}, its description is:{$description}, the max volunteers are:{$maxNumPeople}, and is linked to the following interest:{$interestId}";
		}
		
		public function deleteScheduleSlot($scheduleId, $personId)
		{
			global $con;
			$this->open();
			$tableName = "Volunteer_has_Schedule";
			$sql = "DELETE FROM Volunteer_has_Schedule
					WHERE Volunteer_Person_person_id = '{$personId}' AND Schedule_id = '{$scheduleId}'";
			mysql_query($sql,$con);
			$this->close();
		}
		
		public function deleteSchedule($scheduleId)
		{
			global $con;
			$this->open();
			$tableName = "Schedule";
			$sql = "DELETE FROM Schedule
					WHERE id = '{$scheduleId}'";
			mysql_query($sql,$con);
			$this->close();
		}
		
		public function readScheduleByScheduleId($scheduleId) {
			global $con;
			$this->open();
			$tableName = "Schedule";
			$schedules=array();
			$sql = "SELECT id, timeStart, timeEnd, Event_event_id, description, Interest_interest_id, maxNumPeople
					FROM Schedule
					WHERE Schedule.id = '{$scheduleId}'";
			$result = mysql_query($sql,$con);
			while($row = mysql_fetch_array($result))
			{
				$schedule = new Schedule();
				$schedule->setId($row[0]);
				$schedule->settimeStart($row[1]);
				$schedule->settimeEnd($row[2]);
				$schedule->setEvent_event_id($row[3]);
				$schedule->setDescription($row[4]);
				$schedule->setInterest_interest_id($row[5]);
				$schedules[]=$schedule;
			}
			return $schedules;
			$this->close();
		}
		
		public function updateSchedule($scheduleId, $timeStart, $timeEnd, $description, $interestId, $maxNumPeople) {
			global $con;
			$this->open();
			$tableName = "Schedule";
			$sql = "UPDATE Schedule
					SET timeStart='{$timeStart}', timeEnd='{$timeEnd}', description='{$description}', Interest_interest_id='{$interestId}', maxNumPeople='{$maxNumPeople}'
					WHERE id = '{$scheduleId}'";
			mysql_query($sql, $con);
		}
	
	
		public function listSchedule() //view all 
        	{
			include_once "class/schedule.php";
            		global $con;
			$sql = 'SELECT id, "rime start", timeEnd, Event_event_id, description, Interest_interest_id FROM Schedule';
			$this->open();
			$result = mysql_query($sql, $con);
			$schedules =array();
			while($rows = mysql_fetch_array($result))
        	 {
                
				$schedule = new Schedule();
				$schedule->setId($rows[0]);
				$schedule->settimeStart($rows[1]);
				$schedule->settimeEnd($rows[2]);
				$schedule->setEvent_event_id($rows[3]);
				$schedule->setDescription($rows[4]);
				$schedule->setInterest_interest_id($rows[5]);
				$schedules[] = $schedule;
            } 
            $this->close();
			return $schedules;
        }
		
		public function listScheduleSlot()
		{
			include_once "class/schedule_slot.php";
            global $con;
			$sql = 'SELECT id, Volunteer_person_person_id, Schedule_id FROM Schedule_slot';
			$this->open();
			$result = mysql_query($sql, $con);
			$schedules =array();
			while($rows = mysql_fetch_array($result))
			{
				$scheduleSlot = new Schedule_slot;
				$scheduleSlot->setId($rows[0]);
				$scheduleSlot->setVolunteerPersonPersonId($rows[1]);
				$scheduleSlot->setScheduleId($rows[2]);
				$scheduleSlots[] = $scheduleSlot;
			}
			$this->close();
			return $scheduleSlots;
		}
		
		public function readSchedule($eventId) //view all 
        {
			include_once "class/eventHasSchedule.php";
            global $con; 
			$sql = "SELECT Event.event_id, Schedule.id, Event.title, Schedule.timeStart, Schedule.timeEnd, Schedule.description, Schedule.Interest_interest_id FROM Event
					JOIN Schedule ON Event.event_id = Schedule.Event_event_id
					WHERE Event.event_id = '{$eventId}'"; // SQL code works, not sure why how timeStart supposed to be incremented 
			$this->open();
			$result = mysql_query($sql, $con);
			$scheduleEvents = array();
			while($rows = mysql_fetch_array($result))
			{
	
				$scheduleEvent = new EventHasSchedule;
				$scheduleEvent->setEvent_id($rows[0]); 
				$scheduleEvent->setScheduleId($rows[1]);
				$scheduleEvent->setTitle($rows[2]);
				$scheduleEvent->setTimeStart($rows[3]);
				$scheduleEvent->setTimeEnd($rows[4]);
				$scheduleEvent->setDescription($rows[5]);
				$scheduleEvent->setInterestId($rows[6]);
				$scheduleEvents[] = $scheduleEvent;
			} 
            $this->close();
			return $scheduleEvents;
        }
		
		public function readScheduleSlot($scheduleId)
		{
			global $con;
			$sql = "SELECT title, first_name, last_name, Person.person_id FROM Volunteer_has_Schedule 
						JOIN Volunteer on Volunteer.Person_person_id = Volunteer_has_Schedule.Volunteer_Person_person_id
						JOIN Person on Person.person_id = Volunteer.Person_person_id
						WHERE Volunteer_has_Schedule.Schedule_id = '{$scheduleId}'";
			$this->open();
			$result = mysql_query($sql, $con);
			$persons = array();
			while($row = mysql_fetch_array($result))
			{
				$person = new Person;
				$person->setTitle($row[0]);
				$person->setFirst_name($row[1]);
				$person->setLast_name($row[2]);
				$person->setPerson_id($row[3]);
				//$person->setId($row[4]);
				$persons[] = $person;
			}
			$this->close();
			return $persons;
		}
		
        public function readScheduleByName($personId) // search by user, might need a better way to write it
        {
				include_once "class/schedule.php";
				global $con;
				/*$sql= 'SELECT Person.person_id, Person.last_name, Person.first_name, Schedule.timeStart, Schedule.timeEnd, Schedule.Event_event_id, Schedule.description FROM Person
				JOIN Schedule_slot On Person.person_id = Schedule_slot.Volunteer_Person_person_id
				JOIN Schedule ON Schedule_slot.Schedule_id = Schedule.id 
				WHERE Person.last_name = "{$Lname}" && Person.first_name = "{$FName}"'; //SQL subject to change to adjust to PHP, but work in mySQL AS IS. 
				*/
				$sql = "SELECT Person.title, Person.first_name, Person.last_name, 
						Event.event_id, Event.title, Event.date, Event.time, 
						Schedule.id, Schedule.description, Schedule.timeStart, Schedule.timeEnd,
						Address.street1, Address.street2, Address.city, Address.state, Address.zip,
						Event_Type.title
						FROM Schedule_slot 
						JOIN Volunteer on Volunteer.Person_person_id = Schedule_slot.Volunteer_Person_person_id
						JOIN Person on Person.person_id = Volunteer.Person_person_id
						JOIN Schedule on Schedule.id = Schedule_slot.Schedule_id
						JOIN Event on Event.event_id = Schedule.Event_event_id
						JOIN Address on Address.address_id = Event.Address_address_id
						JOIN Event_Type on Event_Type.type_id = Event.type_id
						WHERE Person.Person_id = '{$personId}'";
				$this->open();
				$result = mysql_query($sql, $con);
				$personSchedules = array();
				while($rows = mysql_fetch_array($result))
				{
					$person = new Person;
					$event = new Event;
					$schedule = new Schedule;
					$address = new Address;
					$eventType = new Event_Type;
					$person->setTitle($rows[0]);
					$person->setLast_name($rows[1]);
					$person->setFirst_name($rows[2]);
					$event->setEvent_id($rows[3]);
					$event->setTitle($rows[4]);
					$event->setDate($rows[5]);
					$event->setTime($rows[6]);
					$schedule->setId($rows[7]);
					$schedule->setDescription($rows[8]);
					$schedule->setTimeStart($rows[9]);
					$schedule->setTimeEnd($rows[10]);
					$address->setStreet1($rows[11]);
					$address->setStreet2($rows[12]);
					$address->setCity($rows[13]);
					$address->setState($rows[14]);
					$address->setZip($rows[15]);
					$eventType->setTitle($rows[16]);
					$hold = array($person, $event, $schedule, $address, $eventType);
					$personSchedules[] = $hold; 
                } 
                $this->close();
				return $personSchedules; 
        }


        public function readEventSchedule($eventId) //view all 
        {
            global $con; 
			$sql = "SELECT * From Schedule WHERE Event_event_id =" . $eventId ; 
			$this->open();
			$result = mysql_query($sql, $con);
			$eventSchedules = array();
			while($rows = mysql_fetch_array($result))
			{
	
				$eventSchedule = new Schedule();
				$eventSchedule->setId($rows[0]); 
				$eventSchedule->settimeStart($rows[1]);
				$eventSchedule->settimeEnd($rows[2]);
				$eventSchedule->setEvent_event_id($rows[3]);
				$eventSchedule->setDescription($rows[4]);
				$eventSchedule->setInterest_interest_id($rows[5]);
				$eventSchedule->setMaxNumPeople($rows[6]);
				$eventSchedules[] = $eventSchedule;
			} 
            $this->close();
			return $eventSchedules;
        }

        public function readVolunteerScheduleByEvent($eventId) //view all 
        {
            global $con; 
			$sql = "SELECT * from Volunteer_has_Schedule Where Schedule_id IN (Select id From Schedule Where Event_event_id=" . $eventId . ")" ; 
			$this->open();
			$result = mysql_query($sql, $con);
			$volunteerSchedules = array();
			while($rows = mysql_fetch_array($result))
			{
	
				$volunteerSchedule = new Volunteer_Has_Schedule();
				$volunteerSchedule->setId($rows[0]); 
				$volunteerSchedule->setVolunteerId($rows[1]);
				$volunteerSchedule->setScheduleId($rows[2]);
				$volunteerSchedules[] = $volunteerSchedule;
			} 
            $this->close();
			return $volunteerSchedules;
        }

        public function insertWorkForVolunteer($workObj){
        	global $con;
        	$sql="INSERT INTO Work(amount,Volunteer_Person_person_id,date,entered_by_id,Admin_idAdmin,Event_event_id)
        	VALUES (" .$workObj->getAmount(). "," .$workObj->getPerson_person(). ",CAST('" .$workObj->getDate(). "' As Date) ," .$workObj->getEnteredById(). ",Null," .$workObj->getEvent(). ")";
			$this->open();
			$result = mysql_query($sql, $con);
			$this->close();
			return TRUE;
        }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
        

	    public function getEvent($eventId){
	    	global $con;
			$this->open();
			$eventName=array();
			$sql = 'SELECT title FROM Event where event_id="'. $eventId .'"';
			$result = mysql_query($sql,$con);
			while ($row = mysql_fetch_array($result)){
				$eventName[]=$row[0];
			}
			//$ints = array();
			$this->close();
			return $eventName;
			
	    }

	    public function getDate($eventId){
	    	global $con;
			$this->open();
			$eventDate=array();
			$sql = 'SELECT date FROM Event where event_id="'. $eventId .'"';
			$result = mysql_query($sql,$con);
			while ($row = mysql_fetch_array($result)){
				$eventDate[]=$row[0];
			}
			//$ints = array();
			$this->close();
			return $eventDate;
	    }

	    public function getHours($eventId){
	    	global $con;
			$this->open();
			$eventHours=array();
			$sql = 'SELECT amount from Work where Event_event_id="'.$eventId.'"';
			$result = mysql_query($sql,$con);
			while ($row = mysql_fetch_array($result)){
				$eventHours[]=$row[0];
			}
			//$ints = array();
			$this->close();
			return $eventHours;
	    }

	

	    ///////////////////////////////////////////////////////////////////////////////////////
		//Person section NM not tested. create person not done
///////////////////////////////////////////////////////////////////////////////////////
		//this section:
		//--read a Person record
		//--list all person records
		//--create a new person record (calls createAddress and createContact prior to creating the new person record)
		//--create a new contact record
		//--find the contact id of a given contact record
		//--create a new address record
		//--find the address id of a given address record

		//read one person record
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
				$person->setEmployer($result[13]);
				$person->setJobtitle($result[14]);
			} else {
				echo "DB error readPerson";
			}
			return $person;
		}// end function

		//list all persons
		public function listPersons() {
			global $con;
			$sql = 'SELECT * FROM Person';
			$this->open();
			$results = mysql_query($sql, $con);
			$this->close();
			$persons = array();
			if($results)
				{
					while ($result = mysql_fetch_array($results)) 
					{
						
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
						$persons[] = $person;
					} 
				}
			else
			{
				echo "DB error listPersons";
			}
			return $persons;
		}// end function

		//create new person done not tested
		public function createPerson($person, $contact, $address){
			global $con;
                        $pid = false;
                        $id = self::createAddress($address);
                        if($id)
                        {
                            $id2 = self::createContact($contact, $id);     
                            if($id2)
                            {                          
                                $sql = "INSERT INTO Person VALUES ('','" . $person->getTitle() ."', '" . $person->getFirst_name() ."', '" . $person->getLast_name() . "', '" . $person->getGender() . "', '" . $person->getDob() . "', '" . $person->getMarital_status() . "', '" . $id2 . "', '" . $person->getIsActive() . "', '" . $person->getLastActive() . "', '" . $person->getPrefEmail() . "', '" . $person->getPrefMail() . "', '" . $person->getPrefPhone() . "','" . $person->getEmployer() . "','" . $person->getJobtitle() ."')";
                                $this->open();
                                $result = mysql_query($sql, $con);
                                if($result){
                                	$sql = "select last_insert_id();";
									$result = mysql_query($sql, $con);
									$this->close();
									while($rows = mysql_fetch_array($result)){
										$person_id = $rows[0];
									}
									return $person_id;
                                }
                                else{
                                	echo "error creating person";
                                	return false;
                                }
                                
				
                            }
                        }
                        return $pid;
		}
		

		//create contact done not tested
		public function createContact($contact, $addressID)
		{
			global $con;
                        
			$sql = "INSERT INTO Contact VALUES ('','" . $addressID . "' , '" .$contact->getPhone(). "', '" .$contact->getEmail(). "', '" .$contact->getPhone2(). "', '" .$contact->getExtension(). "')";
			$this->open();
			$result = mysql_query($sql, $con);
			if($result)
			{
				$sql = "select last_insert_id();";
				$result = mysql_query($sql, $con);
				$this->close();
				while($rows = mysql_fetch_array($result)){
					$contact_id = $rows[0];
				}
				return $contact_id;
			}
			else
			{
				echo 'error creating contact';
				$this->close();
				return false;
			}
		}

		/*//find contact id by address id done not tested removed for better method, last_insert_id()
		public function findContactID($addressID)
		{
			global $con;

			$sql = "SELECT contact_id FROM Contact WHERE (address_id = " .$addressID.")";

			$this->open();
			$result = mysql_query($sql, $con);
			$this->close();
			if($result)	//if there is a result , return the contact id
			{
				$id = $result[0];
				return $id;	
				
			}
			else //else return false
			{
				echo 'error finding contact id';
				return false;
			}
		}
*/

		//create address done not tested
		public function createAddress($address)
		{
			global $con;
			$sql = "INSERT INTO Address VALUES ('' ,'" . $address->getStreet1() . "' , '" .$address->getStreet2(). "', '" .$address->getCity(). "', '" .$address->getState(). "', '" .$address->getZip(). "')";
			$this->open();
			$result = mysql_query($sql, $con);
			if($result)
			{
				$sql = "select last_insert_id();";
				$result = mysql_query($sql, $con);
				$this->close();
				while($rows = mysql_fetch_array($result)){
					$address_id = $rows[0];
				}
				return $address_id;
			}
			else
			{
				echo 'error creating address';
				$this->close();
				return false;
			}
		}

	/*	//find address id done not tested removed for better method, see last_insert_id()
		public function findAddressID($address)
		{
			global $con;

			//$sql = "SELECT address_id FROM Address WHERE ( street1 = '" . $address->getStreet1() . "' AND street2 =  '" .$address->getStreet2(). "' AND city = '" .$address->getCity(). "' AND state = '" .$address->getState(). "' AND zip = '" .$address->getZip(). " ')";

			$this->open();
			$result = mysql_query($sql, $con);
			$this->close();
			if($result) //if result exists return address id
			{
				$id = $result[0];
				return $id;
				
			}
			else
			{
				echo 'error finding address id';
				return false;
			}
		}
*/
		public function last_insert_id()
		{
			global $con;

			$sql = "LAST_INSERT_ID()";

			$this->open();
			$result = mysql_query($sql, $con);
			$this->close();
			if($result)	//if there is a result , return the contact id
			{
				$id = $result[0];
				return $id;	
			}
			else //else return false
			{
				echo 'error finding last_insert_id';
				return false;
			}
		}

		public function readPersons() {
		global $con;
		$sql = 'SELECT Person.person_id, Person.title, Person.first_name, Person.last_name, Person.dob, Person.Contact_contact_id, Contact.contact_id, Contact.phone, Contact.address_id, Address.address_id, Address.street1, Address.street2, Address.state, Address.city , Address.zip, FOH.Person_person_id, FOH.Event_event_id, Event.title FROM Person inner join Contact on Person.Contact_contact_id = Contact.contact_id inner join Address on Contact.address_id = Address.address_id left outer join FOH on Person.person_id = FOH.Person_person_id left outer join Event on FOH.Event_event_id = Event.event_id';
		$this->open();
		$result = mysql_query($sql, $con);
		$person = array();
		$contacts =array();
		$fohs = array();
		$events = array();
		while($rows = mysql_fetch_array($result)){
			$contact = new Contact();
			$address = new Address();
			$person = new Person();
			$foh = new foh();
			$event = new Event();
			$person->setPerson_id($rows[0]);
			$person->setTitle($rows[1]);
			$person->setFirst_name($rows[2]);
			$person->setLast_name($rows[3]);
			$person->setDob($rows[4]);
			$person->setContact($rows[5]);
			$contact->setContact_id($rows[6]);
			$contact->setPhone($rows[7]);
			$contact->setAddress($rows[8]);
			$address->setAddress_id($rows[9]);
			$address->setStreet1($rows[10]);
			$address->setStreet2($rows[11]);
			$address->setCity($rows[12]);
			$address->setState($rows[13]);
			$address->setZip($rows[14]);
			$foh->setPerson($rows[15]);
			$foh->setEvent($rows[16]);
			$event->setTitle($rows[17]);
			$contact->setAddress($address);
			$persons[] = $person;
			$contacts[] = $contact;
			$fohs[] = $foh;
			$events[] = $event;
		}
		$tableinfo = array($persons,$contacts,$fohs,$events);
		$this->close();
		return $tableinfo;
	}// end function
///////////////////////////////////////////////////////////////////////////////////////
                public function listFOH()
		{
			global $con;

			$sql = "SELECT Person.person_id, Person.first_name, Person.last_name, Event.event_id, Event.title
                                FROM Person INNER JOIN FOH
                                ON Person.person_id = FOH.Person_person_id
                                INNER JOIN Event
                                ON FOH.Event_event_id = Event.event_id";

			$this->open();
			$results = mysql_query($sql, $con);
			$this->close();
                        $fohs = array();
			if($results)	//if there is a result , return them
			{
                            while ($result = mysql_fetch_array($results)) 
                            {
                                $foh = new foh();
                                $foh->setPersonFName($result[0]);
                                $foh->setPersonLName($result[1]);
                                $foh->setEvent($result[2]);
                                $fohs[] = $foh;
                            } 
                            return $fohs;
			}
			else //else return false
			{
                            echo 'error finding FOH data';
                            return false;
			}
		}
                
                public function createFOH($event, $person_id)
		{
			global $con;

			$sql = "INSERT INTO FOH VALUES(" . $person_id .", " . $event->getEvent_id() . ")";

			$this->open();
			$result = mysql_query($sql, $con);
			$this->close();
                        
			if($result)	//if there is a result , return them
			{
                            return true;
			}
			else //else return false
			{
                            echo 'error creating FOH entry';
                            return false;
			}
		}
                
                public function searchFOHByPerson($personID)
                {
                    global $con;
                    
                    $sql = "SELECT Person.person_id, Event.title
                                FROM Person INNER JOIN FOH
                                ON Person.person_id = FOH.Person_person_id
                                AND Person.person_id = " . $personID . "
                                INNER JOIN Event
                                ON FOH.Event_event_id = Event.event_id";

                    $this->open();
                    $results = mysql_query($sql, $con);
                    $this->close();
                    if($results)	//if there is a result , return them
                    {
                        while ($result = mysql_fetch_array($results)) 
                        {
                            $foh = new foh();
                            $foh->setPerson($result[0]);
                            $foh->setEvent($result[1]);
                        } 
                    }
                    else //else return false
                    {
                        echo 'error finding FOH data';
                        return false;
                    }
                    if(isset($foh))
                    	return $foh;
                }
                
                public function searchFOHByEvent($eventID)
                {
                    global $con;
                    
                    $sql = "SELECT Person.person_id, Person.first_name, Person.last_name, Event.event_id, Event.title
                                FROM Person INNER JOIN FOH
                                ON Person.person_id = FOH.Person_person_id
                                INNER JOIN Event
                                ON FOH.Event_event_id = Event.event_id
                                AND Event.event_id = " . $eventID ."";

                    $this->open();
                    $results = mysql_query($sql, $con);
                    $this->close();
                    $fohs = array();
                    if($results)	//if there is a result , return them
                    {
                        while ($result = mysql_fetch_array($results)) 
                        {
                            $foh = new foh();
                            $foh->setPersonFName($result[0]);
                            $foh->setPersonLName($result[1]);
                            $foh->setEvent($result[2]);
                            $fohs[] = $foh;
                        } 
                        return $fohs;
                    }
                    else //else return false
                    {
                        echo 'error finding FOH data';
                        return false;
                    }
                }
////////////////////////////////////////////////////////////////////////////////
// Volunteer stuff
////////////////////////////////////////////////////////////////////////////////
                //list all volunteers - returns person data on volunteers
		public function listVolunteers() {
			global $con;
			$sql = 'SELECT Person.* FROM Person INNER JOIN Volunteer ON Person.person_id = Volunteer.Person_person_id';
			$this->open();
			$results = mysql_query($sql, $con);
			$this->close();
			$persons = array();
			if($results)
				{
					while ($result = mysql_fetch_array($results)) 
					{
						
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
						$persons[] = $person;
					} 
				}
			else
			{
				echo "DB error listVolunteers";
			}
			return $persons;
		}// end function

		public function searchPersonByName($fname,$lname){
		global $con;
		$sql = 'SELECT Person.person_id, Person.title, Person.first_name, Person.last_name, Person.dob, Person.Contact_contact_id, Contact.contact_id, Contact.phone, Contact.address_id, Address.address_id, Address.street1, Address.street2, Address.state, Address.city , Address.zip, FOH.Person_person_id, FOH.Event_event_id, Event.title FROM Person inner join Contact on Person.Contact_contact_id = Contact.contact_id inner join Address on Contact.address_id = Address.address_id left outer join FOH on Person.person_id = FOH.Person_person_id left outer join Event on FOH.Event_event_id = Event.event_id where Person.first_name = "' . $fname . '" or Person.last_name = "' . $lname . '"';
		$this->open();
		$result = mysql_query($sql, $con);
		$persons = array();
		$contacts =array();
		$fohs = array();
		$events = array();
		while($rows = mysql_fetch_array($result)){
			$contact = new Contact();
			$address = new Address();
			$person = new Person();
			$foh = new foh();
			$event = new Event();
			$person->setPerson_id($rows[0]);
			$person->setTitle($rows[1]);
			$person->setFirst_name($rows[2]);
			$person->setLast_name($rows[3]);
			$person->setDob($rows[4]);
			$person->setContact($rows[5]);
			$contact->setContact_id($rows[6]);
			$contact->setPhone($rows[7]);
			$contact->setAddress($rows[8]);
			$address->setAddress_id($rows[9]);
			$address->setStreet1($rows[10]);
			$address->setStreet2($rows[11]);
			$address->setCity($rows[12]);
			$address->setState($rows[13]);
			$address->setZip($rows[14]);
			$foh->setPerson($rows[15]);
			$foh->setEvent($rows[16]);
			$event->setTitle($rows[17]);
			$contact->setAddress($address);
			$persons[] = $person;
			$contacts[] = $contact;
			$fohs[] = $foh;
			$events[] = $event;
		}
		$tableinfo = array($persons,$contacts,$fohs,$events);
		$this->close();
		return $tableinfo;
	}// end function
                
     	public function searchPersonByOrg($org){
		global $con;
		$sql = 'SELECT Person.person_id, Person.title, Person.first_name, Person.last_name, Person.dob, Person.Contact_contact_id, Contact.contact_id, Contact.phone, Contact.address_id, Address.address_id, Address.street1, Address.street2, Address.state, Address.city , Address.zip, FOH.Person_person_id, FOH.Event_event_id, Event.title FROM Person inner join Contact on Person.Contact_contact_id = Contact.contact_id inner join Address on Contact.address_id = Address.address_id left outer join FOH on Person.person_id = FOH.Person_person_id left outer join Event on FOH.Event_event_id = Event.event_id';
		$this->open();
		$result = mysql_query($sql, $con);
		$persons = array();
		$contacts =array();
		$fohs = array();
		$events = array();
		while($rows = mysql_fetch_array($result)){
			$contact = new Contact();
			$address = new Address();
			$person = new Person();
			$foh = new foh();
			$event = new Event();
			$person->setPerson_id($rows[0]);
			$person->setTitle($rows[1]);
			$person->setFirst_name($rows[2]);
			$person->setLast_name($rows[3]);
			$person->setDob($rows[4]);
			$person->setContact($rows[5]);
			$contact->setContact_id($rows[6]);
			$contact->setPhone($rows[7]);
			$contact->setAddress($rows[8]);
			$address->setAddress_id($rows[9]);
			$address->setStreet1($rows[10]);
			$address->setStreet2($rows[11]);
			$address->setCity($rows[12]);
			$address->setState($rows[13]);
			$address->setZip($rows[14]);
			$foh->setPerson($rows[15]);
			$foh->setEvent($rows[16]);
			$event->setTitle($rows[17]);
			$contact->setAddress($address);
			$persons[] = $person;
			$contacts[] = $contact;
			$fohs[] = $foh;
			$events[] = $event;
		}
		$tableinfo = array($persons,$contacts,$fohs,$events);
		$this->close();
		return $tableinfo;
	}// end function
        
        //function viewVolunteersWhereCertifiedOrNot($boolean)
        //this takes a boolean and returns an array object containing a persons array and volunteers array
        //depending on the boolean
        //TRUE: returns the people and volunteer info for peoplethat have completed all the require consent tasks
        //FALSE: returns the people and volunteer info for people that have not completed all the required consent tasks
        public function viewVolunteersWhereCertifiedOrNot($boolean)
        {
            global $con;
                        if($boolean == TRUE)
                        {
                            $sql = 'SELECT * FROM Person INNER JOIN Volunteer ON Person.person_id = Volunteer.Person_person_id WHERE Volunteer.consentAge = TRUE AND Volunteer.consentVideo = TRUE AND Volunteer.consentWaiver = TRUE AND Volunteer.consentSafety = TRUE AND Volunteer.emergencyName IS NOT NULL AND Volunteer.emergencyPhone IS NOT NULL';
                        }
                        else
                        {
                            $sql = 'SELECT * FROM Person INNER JOIN Volunteer ON Person.person_id = Volunteer.Person_person_id WHERE Volunteer.consentAge = FALSE OR Volunteer.consentVideo = FALSE OR Volunteer.consentWaiver = FALSE OR Volunteer.consentSafety = FALSE OR Volunteer.emergencyName IS NULL OR Volunteer.emergencyPhone IS NULL';
                        }
			$this->open();
			$results = mysql_query($sql, $con);
			$this->close();
			$persons = array();
                        $volunteers = array();
                        
			if($results)
				{
					while ($result = mysql_fetch_array($results)) 
					{
						
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
						$persons[] = $person;
                                                
                        $volunteer = new Volunteer();
                        $volunteer->setConsentAge($result[13]);
                        $volunteer->setConsentVideo($result[14]);
                        $volunteer->setConsentWaiver($result[15]);
                        $volunteer->setConsentPhoto($result[16]);
                        $volunteer->setAvailDay($result[17]);
                        $volunteer->setAvailEve($result[18]);
                        $volunteer->setAvailWend($result[19]);
                        $volunteer->setPerson($result[20]);
                        $volunteer->setIsBoardMember($result[21]);
                        $volunteer->setConsentMinor($result[22]);
                        $volunteer->setConsentSafety($result[23]);
                        $volunteer->setEmergencyName($result[24]);
                        $volunteer->setEmergencyPhone($result[25]);
                        $volunteer->setChurchAmbassador($result[26]);
                        $volunteer->setAffiliation($result[27]);
                        $volunteers[] = $volunteer;                                                 
					} 
                                        $returnArray = array($results, $volunteers);
				}
			else
			{
				echo "DB error viewVolunteersWhereCertifiedOrNot";
			}
			return $returnArray;
        }
	    public function listOrgs(){
			global $con;
			$sql = 'select Organization.organization_id, Organization.name, Address.street1, Address.street2, Address.city, Address.state, Address.zip, Contact.email, Contact.phone , Contact.phone2, Contact.extension from Organization inner join Contact on Organization.Contact_contact_id = Contact.contact_id inner join Address on Contact.address_id = Address.address_id';
			$this->open();
			$result = mysql_query($sql, $con);
			$orgs = array();
			$contacts =array();
			while($rows = mysql_fetch_array($result)){
				$contact = new Contact();
				$address = new Address();
				$org = new Organization();
				$org->setOrganization_id($rows[0]);
				$org->setName($rows[1]);
				$address->setStreet1($rows[2]);
				$address->setStreet2($rows[3]);
				$address->setCity($rows[4]);
				$address->setState($rows[5]);
				$address->setZip($rows[6]);
				$contact->setEmail($rows[7]);
				$contact->setPhone($rows[8]);
				$contact->setPhone2($rows[9]);
				$contact->setExtension($rows[10]);
				$contact->setAddress($address);
				$orgs[] = $org;
				$contacts[] = $contact;
			}
			$tableinfo = array($orgs,$contacts);
			$this->close();
			return $tableinfo;
		}// end function

		public function getOrgById($oid){
			global $con;
			$sql = 'select Organization.organization_id, Organization.name, Address.street1, Address.street2, Address.city, Address.state, Address.zip, Contact.email, Contact.phone , Contact.phone2, Contact.extension from Organization inner join Contact on Organization.Contact_contact_id = Contact.contact_id inner join Address on Contact.address_id = Address.address_id where Organization.organization_id= ' . $oid . '';
			$this->open();
			$result = mysql_query($sql, $con);
			$orgs = array();
			$contacts =array();
			$addresses =array();
			while($rows = mysql_fetch_array($result)){
				$contact = new Contact();
				$address = new Address();
				$org = new Organization();
				$org->setOrganization_id($rows[0]);
				$org->setName($rows[1]);
				$address->setStreet1($rows[2]);
				$address->setStreet2($rows[3]);
				$address->setCity($rows[4]);
				$address->setState($rows[5]);
				$address->setZip($rows[6]);
				$contact->setEmail($rows[7]);
				$contact->setPhone($rows[8]);
				$contact->setPhone2($rows[9]);
				$contact->setExtension($rows[10]);
				$addresses[] = $address;
				$orgs[] = $org;
				$contacts[] = $contact;
			}
			$orginfo = array($orgs,$contacts,$addresses);
			$this->close();
			return $orginfo;
		}// end function

		public function createOrg($organization,$contact,$address){
			global $con;
			$this->open();

			$sql =	"INSERT INTO Address
					(street1,street2,city,state,zip)
					VALUES
					('" .$address->getStreet1(). "','" .$address->getStreet2(). "','" .$address->getCity(). "','" .$address->getState(). "','" .$address->getZip(). "');";
			$result1 =mysql_query($sql, $con);


			$sql=	"INSERT INTO Contact
					(address_id,phone,email,phone2,extension)
					Select Max(address_id),'" . $contact->getPhone() . "','" . $contact->getEmail() . "','" . $contact->getPhone2() . "','" . $contact->getExtension() . "' From homes_db.Address;";
			$result2 = mysql_query($sql, $con);	

			$sql=	"insert into Organization 
					(name,Contact_contact_id) 
					values ('" . $organization->getName() . "', (select contact_id from Contact where email = '" . $contact->getEmail() ."'))";
			$result3 = mysql_query($sql, $con);			
			$this->close();
			if($result1 && $result2 && $result3)
				return true;
			else
				return false;
	  	}

	  	public function updateOrg($oid,$organization,$contact,$address){
	  		global $con;
			$this->open();
			$sql = "UPDATE Organization set name = '" . $organization->getName() . "' where organization_id = " . $oid ."";
			$sql2 = "update Contact set phone='" . $contact->getPhone() . "', email='" . $contact->getEmail() . "', phone2 = '" . $contact->getPhone2() . "', extension = '" . $contact->getExtension() . "' where contact_id=(select Contact_contact_id from Organization where organization_id='" . $oid . "')";
			$sql3 = "update Address set street1='" . $address->getStreet1() . "', street2='" . $address->getStreet2() . "', city='" . $address->getCity() . "', state='" . $address->getState() . "', zip = '" . $address->getZip() . "' where address_id=(select address_id from Contact where contact_id=(select Contact_contact_id from Organization where organization_id=" . $oid . "))";
			$result1 = mysql_query($sql, $con);			
			$result2 = mysql_query($sql2, $con);			
			$result3 = mysql_query($sql3, $con);			
			$this->close();
			if($result1 && $result2 && $result3)
				return true;
			else
				return false;
	  	}

	  	public function searchOrgsByName($orgname){
			global $con;
			$sql = 'select Organization.organization_id, Organization.name, Address.street1, Address.street2, Address.city, Address.state, Address.zip, Contact.email, Contact.phone , Contact.phone2, Contact.extension from Organization inner join Contact on Organization.Contact_contact_id = Contact.contact_id inner join Address on Contact.address_id = Address.address_id where Organization.name= "' . $orgname . '"';
			$this->open();
			$result = mysql_query($sql, $con);
			$orgs = array();
			$contacts =array();
			while($rows = mysql_fetch_array($result)){
				$contact = new Contact();
				$address = new Address();
				$org = new Organization();
				$org->setOrganization_id($rows[0]);
				$org->setName($rows[1]);
				$address->setStreet1($rows[2]);
				$address->setStreet2($rows[3]);
				$address->setCity($rows[4]);
				$address->setState($rows[5]);
				$address->setZip($rows[6]);
				$contact->setEmail($rows[7]);
				$contact->setPhone($rows[8]);
				$contact->setPhone2($rows[9]);
				$contact->setExtension($rows[10]);
				$contact->setAddress($address);
				$orgs[] = $org;
				$contacts[] = $contact;
			}
			$tableinfo = array($orgs,$contacts);
			$this->close();
			return $tableinfo;
		}// end function

		public function updatePerson($pid,$person,$contact,$address,$event) {
		global $con;
		
		$sql = "update Person set title='" . $person->getTitle() ."', first_name='" . $person->getFirst_name() . "' , last_name='" . $person->getLast_name() . "',employer='" . $person->getEmployer() . "',jobtitle='" . $person->getJobtitle() . "' where person_id=" . $pid . ";" ;
		$sql2 = "update Contact set phone='" . $contact->getPhone() . "', email='" . $contact->getEmail() . "', phone2='" . $contact->getPhone2() . "' , extension='" . $contact->getExtension() . "' where contact_id=(select Contact_contact_id from Person where person_id=" . $pid . ");";
		$sql3 = "UPDATE Address SET street1='" . $address->getStreet1() . "', street2='" . $address->getStreet2() . "', city='" . $address->getCity() . "', state='" . $address->getState() . "', zip='" . $address->getZip() ."' WHERE address_id=(SELECT address_id FROM Contact WHERE contact_id=(SELECT Contact_contact_id FROM Person WHERE person_id=" . $pid ."));";
		$this->open();
		if($event->getEvent_id()){
			$sql4 = "INSERT INTO FOH (Person_person_id, Event_event_id) VALUES ('" . $pid . "', '" . $event->getEvent_id() . "');";
			$result = mysql_query($sql4, $con);
		}
		
		$result = mysql_query($sql, $con);
	 	$result2 = mysql_query($sql2, $con);
	 	$result3 = mysql_query($sql3,$con);

		if($result && $result2 && $result3)
			return true;
		else
			return false;

	}          

	//Reads all donations 
    public function readAllDonations() {
        global $con;
        $sql = "select Donation.donation_id, Donation.date, Donation.time, Donation.details, DonationType.typeName, Donation.value, Event.title from Donation inner join Event on Donation.Event_event_id = Event.event_id inner join DonationType on Donation.donationType = DonationType.idDonationType";
        $this->open();
        $result = mysql_query($sql, $con);
        $donations = array();
        while ($rows = mysql_fetch_array($result)) {
            $donation = new Donation();
            $donation->setDonation_id($rows[0]);
            $donation->setDate($rows[1]);
            $donation->setTime($rows[2]);
            $donation->setDetails($rows[3]);
            $donation->setType($rows[4]);
            $donation->setValue($rows[5]);
            $donation->setEvent($rows[6]);
            $donations[] = $donation;
        }
        $this->close();
        return $donations;
    }

    public function getDonors() {
        global $con;
        $sql = "select Donation.donation_id, Person.first_name from Donation inner join Donation_has_Person on Donation.donation_id = Donation_has_Person.Donation_donation_id inner join Person on Donation_has_Person.Person_person_id = Person.person_id";
        $this->open();
        $result = mysql_query($sql, $con);
        $donors = array();
        while ($rows = mysql_fetch_array($result)) {
        	$donor = new Donatedby();
            $donor->setDonation_id($rows[0]);
            $donor->setDonatedby($rows[1]);
            $donors[] = $donor;
        }
        $sql = "select Donation.donation_id, Organization.name from Donation inner join Donation_has_Organization on Donation.donation_id = Donation_has_Organization.Donation_donation_id inner join Organization on Donation_has_Organization.Organization_organization_id = Organization.organization_id";
        $result = mysql_query($sql, $con);
        while ($rows = mysql_fetch_array($result)) {
        	$donor = new Donatedby();
            $donor->setDonation_id($rows[0]);
            $donor->setDonatedby($rows[1]);
            $donors[] = $donor;
        }
        $this->close();
        return $donors;
    }

    public function getDonationById($did) {
        global $con;
        $sql = "select Donation.donation_id, Donation.date, Donation.time, Donation.details, DonationType.typeName, Donation.value, Event.title from Donation inner join Event on Donation.Event_event_id = Event.event_id inner join DonationType on Donation.donationType = DonationType.idDonationType where Donation.donation_id = " . $did ."";
        $this->open();
        $result = mysql_query($sql, $con);
        while ($rows = mysql_fetch_array($result)) {
            $donation = new Donation();
            $donation->setDonation_id($rows[0]);
            $donation->setDate($rows[1]);
            $donation->setTime($rows[2]);
            $donation->setDetails($rows[3]);
            $donation->setType($rows[4]);
            $donation->setValue($rows[5]);
            $donation->setEvent($rows[6]);
        }
        $this->close();
        return $donation;
    }

    public function getDonorById($did) {
        global $con;
        $sql = "select Donation.donation_id, Person.first_name from Donation inner join Donation_has_Person on Donation.donation_id = Donation_has_Person.Donation_donation_id inner join Person on Donation_has_Person.Person_person_id = Person.person_id where Donation.donation_id = " . $did ."";
        $this->open();
        $result = mysql_query($sql, $con);
        $donor = new Donatedby();
        while ($rows = mysql_fetch_array($result)) {
            $donor->setDonation_id($rows[0]);
            $donor->setDonatedby($rows[1]);
        }
        if(mysql_num_rows($result) == 0){
        	$sql = "select Donation.donation_id, Organization.name from Donation inner join Donation_has_Organization on Donation.donation_id = Donation_has_Organization.Donation_donation_id inner join Organization on Donation_has_Organization.Organization_organization_id = Organization.organization_id where Donation.donation_id = " . $did ."";
        	$result = mysql_query($sql, $con);
        	while ($rows = mysql_fetch_array($result)) {
	            $donor->setDonation_id($rows[0]);
	            $donor->setDonatedby($rows[1]);
        	}
        }
        
        $this->close();
        return $donor;
    }

    public function readDonationtype() {
		global $con;
		$sql = 'SELECT * FROM DonationType';
		$this->open();
		$result = mysql_query($sql, $con);
		$this->close();
		if ($result) {
			$donationtypes = array();
			while($rows = mysql_fetch_array($result)) {
				$donationtype = new Donationtype();
				$donationtype->setIdDonationType($rows[0]);
				$donationtype->setTypeName($rows[1]);
				$donationtypes[] = $donationtype;
			}// end while
		} else {
			$donationtype = false;
		}
		return $donationtypes;
	}// end function
        public function searchVolunteers($searchType, $parameter)
        {
            global $con;
                        if($searchType == 1)//last name
                        {
                            $sql = 'SELECT * FROM Person INNER JOIN Volunteer ON Person.person_id = Volunteer.Person_person_id WHERE Person.last_name LIKE \'%' . $parameter .'%\'';
                        }
                        else if($searchType == 2)//first name
                        {
                            $sql = 'SELECT * FROM Person INNER JOIN Volunteer ON Person.person_id = Volunteer.Person_person_id WHERE Person.last_name LIKE \'%' . $parameter .'%\'';
                        }
                        else if($searchType == 3)//phone number
                        {
                            $sql = 'SELECT Person.*, Volunteer.* FROM Person INNER JOIN Volunteer ON Person.person_id = Volunteer.Person_person_id INNER JOIN Contact ON Person.Contact_contact_id = Contact.contact_id WHERE (phone =' .$parameter.' OR phone2 = ' .$parameter. ')';
                        }
			$this->open();
			$results = mysql_query($sql, $con);
			$this->close();
			$persons = array();
                        $volunteers = array();
                        
			if($results)
				{
					while ($result = mysql_fetch_array($results)) 
					{
						
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
						$persons[] = $person;
                                                
                        $volunteer = new Volunteer();
                        $volunteer->setConsentAge($result[13]);
                        $volunteer->setConsentVideo($result[14]);
                        $volunteer->setConsentWaiver($result[15]);
                        $volunteer->setConsentPhoto($result[16]);
                        $volunteer->setAvailDay($result[17]);
                        $volunteer->setAvailEve($result[18]);
                        $volunteer->setAvailWend($result[19]);
                        $volunteer->setPerson($result[20]);
                        $volunteer->setIsBoardMember($result[21]);
                        $volunteer->setConsentMinor($result[22]);
                        $volunteer->setConsentSafety($result[23]);
                        $volunteer->setEmergencyName($result[24]);
                        $volunteer->setEmergencyPhone($result[25]);
                        $volunteer->setChurchAmbassador($result[26]);
                        $volunteer->setAffiliation($result[27]);
                        $volunteers[] = $volunteer;                                                 
					} 
                                        $returnArray = array($results, $volunteers);
				}
			else
			{
				echo "DB error viewVolunteersWhereCertifiedOrNot";
			}
			return $returnArray;
        }

        public function checkVolunteer($pid) {
        global $con;
        $sql = "select 1 from Volunteer where Person_person_id = " . $pid . "";
        $this->open();
        $results = mysql_query($sql, $con);
        while ($result = mysql_fetch_array($results)) {
        	$isVol = $result[0];
        }
        $this->close();
        if(isset($isVol))
        	return $isVol;
        else
        	return false;
    }

    public function makeVolunteer($pid){
    	global $con;
        $sql = "INSERT INTO Volunteer VALUES ('0', '0', '0', '0', '0', '0', '0', '" . $pid . "', '0', '0', '0', ' ', ' ', '0','');";
        $this->open();
        $result = mysql_query($sql, $con);
        $this->close();
        return $result;
    }


    public function updateDonations($donation){
    	global $con;
        $sql = "UPDATE Donation SET date='" . $donation->getDate() . "', time='" . $donation->getTime() . "', details='" . $donation->getDetails() . "', donationType='" . $donation->getType() . "', value='" . $donation->getValue() . "' WHERE donation_id='" . $donation->getDonation_id() . "'";
        $this->open();
        $result = mysql_query($sql, $con);
        $this->close();
        return $result;
    }

     public function createDonation($donation) {
        global $con;
        $sql ='INSERT INTO Donation (date, time, details, donationType, value, Event_event_id,entered_by_id)
		 VALUES ("' . $donation->getDate() . '", "' . $donation->getTime() . '", "' . $donation->getDetails() . '", "' . $donation->getType() . '", "' . $donation->getValue() . '", "' . $donation->getEvent() . '", "' . $donation->getPerson_person() . '")';
		$this->open(); 
		$result = mysql_query($sql, $con);
		$this->close();
		return $result;
		} 

	public function getEmailCheck($email){
	    	global $con;
	    	$sql='SELECT username FROM Account where username="'.$email.'"';
	    	$this->open();
	    	$results=mysql_query($sql,$con);
	    	$final=mysql_fetch_row($results);
			$status=$final[0];
			$this->close();
			return $status;

    }


      public function readVolunteer($pid)
        {
            global $con;
                      
                        $sql = 'SELECT * FROM Person INNER JOIN Volunteer ON Person.person_id = Volunteer.Person_person_id WHERE Person.person_id =' . $pid;
                       
			$this->open();
			$results = mysql_query($sql, $con);
			$this->close();
                        
			if($results)
				{
					while ($result = mysql_fetch_array($results)) 
					{

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

                                                
                        $volunteer = new Volunteer();
                        $volunteer->setConsentAge($result[13]);
                        $volunteer->setConsentVideo($result[14]);
                        $volunteer->setConsentWaiver($result[15]);
                        $volunteer->setConsentPhoto($result[16]);
                        $volunteer->setAvailDay($result[17]);
                        $volunteer->setAvailEve($result[18]);
                        $volunteer->setAvailWend($result[19]);
                        $volunteer->setPerson($result[20]);
                        $volunteer->setIsBoardMember($result[21]);
                        $volunteer->setConsentMinor($result[22]);
                        $volunteer->setConsentSafety($result[23]);
                        $volunteer->setEmergencyName($result[24]);
                        $volunteer->setEmergencyPhone($result[25]);
                        $volunteer->setChurchAmbassador($result[26]);
                        $volunteer->setAffiliation($result[27]);
                                                                        
					} 
                                        $returnArray = array($person, $volunteer);
				}
			else
			{
				echo "DB error read volunteer";
			}
			return $returnArray;
        }
        
        public function createVolunteerData($volunteer)
        {
            global $con;
                      
                        $sql = 'INSERT INTO Volunteer VALUES (' . $volunteer->getConsentAge() . ', ' . $volunteer->getConsentVideo() . ', ' . $volunteer->getConsentWaiver() . ', ' . $volunteer->getConsentPhoto() . ', ' . $volunteer->getAvailDay() . ', ' . $volunteer->getAvailEve() . ', ' . $volunteer->getAvailWend() . ', ' . $volunteer->getPerson() . ', ' . $volunteer->getIsBoardMember() . ', ' . $volunteer->getConsentMinor() . ', ' . $volunteer->getConsentSafety() . ', ' . $volunteer->getEmergencyName() . ', ' . $volunteer->getEmergencyPhone() . ', ' . $volunteer->getChurchAmbassador() . ', ' . $volunteer->getAffiliation() . ')';
                       
			$this->open();
			$result = mysql_query($sql, $con);
			$this->close();
                        return $result;
        }
		
}// end class
?>
