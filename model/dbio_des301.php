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

		public function getPersonid($accid){

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
		
		$sql = "update Person set title='" . $person->getTitle() ."', first_name='" . $person->getFirst_name() . "' , last_name='" . $person->getLast_name() . "' where person_id=" . $pid . ";" ;
		$sql2 = "update Contact set phone='" . $contact->getPhone() . "', email='" . $contact->getEmail() . "', phone2='" . $contact->getPhone2() . "' , extension='" . $contact->getExtension() . "' where contact_id=(select Contact_contact_id from Person where person_id=" . $pid . ");";
		$sql3 = "UPDATE Address SET street1='" . $address->getStreet1() . "', street2='" . $address->getStreet2() . "', city='" . $address->getCity() . "', state='" . $address->getState() . "' WHERE address_id=(SELECT address_id FROM Contact WHERE contact_id=(SELECT Contact_contact_id FROM Person WHERE person_id=" . $pid ."));";
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
		
		$sql = "UPDATE Event SET title='" . $eventObj->getTitle() ."', date=CAST('" . $eventObj->getDate()."' As Date) , time=CAST('" . $eventObj->getTime()."' As Time), type_id=" . $eventObj->getType() .", Address_address_id=" . $addressObj->getAddress_id() .", Committee_committee_id=" . $eventObj->getCommittee() .", sponsoredBy='" . $eventObj->getSponsoredBy()."' Where event_id=" . $eventObj->getEvent_id() . ";" ;
		
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
				(title,date,time,type_id,Address_address_id,Project_project_id,Committee_committee_id,sponsoredBy)
				SELECT 
				 '" .$eventObj->getTitle(). "' , CAST('" . $eventObj->getDate()."' As Date) , CAST('" . $eventObj->getTime()."' As Time) ," .$eventObj->getType(). " , Max(address_id), Null ," .$eventObj->getCommittee()." ,'" .$eventObj->getSponsoredBy(). "' From Address;" ;
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
	
/////////////////////////////////////Interests/////////////////////////////////////////////////////////////////	   
//////////////////////////////////////|-_-_-_-|\///////////////////////////////////////////////////////////////	   
	    public function listInterests()
	    {
			global $con;
			$this->open();
			$sql = 'SELECT * FROM Interest';
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
		  global $con;
		  $intTypes = array();
		  $sql = 'SELECT type_id, title FROM Interest_Type';
		  //global $types;
		  //$types = array();
		  $this->open();		
		  $result = mysql_query($sql,$con);
		  while($row = mysql_fetch_array($result))
		  {
			 //$types[$row[0]] = new Item($row[0], $row[1]);
			 $intType = new Item();
			 $intType->setId($row[0]);
			 $intType->setTitle($row[1]);
			 $intTypes[] = $intType;
		  }// end while
		  $this->close();
		  return $intTypes;
		}// end function
		
		public function readInterest($title)
		{
			require_once '/class/volunteerInterest.php';
			global $con;
			$this->open();
			//global $volInts;
			$volInts = array();
			$sql = "SELECT Person.first_name, Person.last_name, Interest_Type.title, Interest.title
				FROM Person
				JOIN Volunteer on Person.Person_id = Volunteer.Person_person_id
				JOIN Volunteer_has_Interest on Volunteer.Person_person_id = Volunteer_has_Interest.Volunteer_Person_person_id
				JOIN Interest on Volunteer_has_Interest.Interest_interest_id = Interest.interest_id
				JOIN Interest_Type on Interest.type_id = Interest_Type.type_id
				WHERE Interest.title = '{$title}'";
			$result = mysql_query($sql,$con);
			while ($row = mysql_fetch_array($result))
			{
				$volInt = new volunteerInterest();
				$volInt->setFirst_name($row[0]);
				$volInt->setLast_name($row[1]);
				$volInt->setType_title($row[2]);
				$volInt->setInterest_title($row[3]);
				$volInts[] = $volInt;
			}
			//return $int;
			$this->close();
			return $volInts;
	    	}
		
		
		public function readInterestType($title){
			require_once '/class/volunteerInterest.php';
			global $con;
			$this->open();
			//global $volInts;
			$volInts = array();
			$sql = "SELECT Person.first_name, Person.last_name, Interest_Type.title, Interest.title
				FROM Person
				JOIN Volunteer on Person.Person_id = Volunteer.Person_person_id
				JOIN Volunteer_has_Interest on Volunteer.Person_person_id = Volunteer_has_Interest.Volunteer_Person_person_id
				JOIN Interest on Volunteer_has_Interest.Interest_interest_id = Interest.interest_id
				JOIN Interest_Type on Interest.type_id = Interest_Type.type_id
				WHERE Interest_Type.title = '{$title}'";
			$result = mysql_query($sql,$con);
			while ($row = mysql_fetch_array($result))
			{
				$volInt = new volunteerInterest();
				$volInt->setFirst_name($row[0]);
				$volInt->setLast_name($row[1]);
				$volInt->setType_title($row[2]);
				$volInt->setInterest_title($row[3]);
				$volInts[] = $volInt;
			}
			//return $int;
			$this->close();
			return $volInts;
	    }	
        

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
		public function createPerson($person, $contact, $address)
		{
			$addressID = createAddress($address);
			if ($addressID)  //if address is created
			{
				$contactID = createContact($contact, $addressID);
				if($contactID)	//if contact is created
				{
					//echo 'banana';
					//insert row into peson table with relavent shit
					global $con;
					$sql = 'INSERT INTO Person VALUES (' . $person->getTitle() . ' , ' .$person->getFirst_name(). ', ' .$person->getLast_name(). ', ' .$person->getGender(). ', ' .$person->getDob(). ', ' .$person->getMarital_status(). ', '  .$contactID. ', ' .$person->getIsActive(). ', ' .$person->getLastActive(). ', ' .$person->getPrefEmail(). ', ' .$person->getPrefMail(). ', '  .$person->getPrefPhone(). ')';
					$this->open();
					$result = mysql_query($sql, $con);
					$this->close();
					if($result)
					{
						echo 'person created';
					}
					else
					{
						echo 'error creating person';
						return false;
					}

				}
			}

		}

		//create contact done not tested
		public function createContact($contact, $addressID)
		{
			global $con;
			$sql = 'INSERT INTO Contact VALUES (' . $contact->getStreet1() . ' , ' .$contact->getStreet2(). ', ' .$contact->getCity(). ', ' .$contact->getState(). ', ' .$contact->getZip(). ')';
			$this->open();
			$result = mysql_query($sql, $con);
			$this->close();
			if($result)
			{
				echo 'contact created';
				//return findContactID($addressID);
				return last_insert_id();
			}
			else
			{
				echo 'error creating contact';
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
			$sql = 'INSERT INTO Address VALUES (' . $address->getStreet1() . ' , ' .$address->getStreet2(). ', ' .$address->getCity(). ', ' .$address->getState(). ', ' .$address->getZip(). ')';
			$this->open();
			$result = mysql_query($sql, $con);
			$this->close();
			if($result)
			{
				echo 'address created';
				//return findAddressID($address);
				return last_insert_id();
			}
			else
			{
				echo 'error creating address';
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
			$contact->setAddress($address,$fohs,$events);
			$persons[] = $person;
			$contacts[] = $contact;
			$fohs[] = $foh;
			$events[] = $event;
		}
		$tableinfo = array($persons,$contacts,$foh,$events);
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
                
                public function createFOH($personID, $eventID)
		{
			global $con;

			$sql = "INSERT INTO FOH VALUES(" . $personID .", " . $eventID . ")";

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
                    
                    $sql = "SELECT Person.person_id, Person.first_name, Person.last_name, Event.event_id, Event.title
                                FROM Person INNER JOIN FOH
                                ON Person.person_id = FOH.Person_person_id
                                AND Person.person_id = " . $personID ."
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
}// end class
?>
