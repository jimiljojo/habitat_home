<?php

class DBIO {

    // ATTRIBUTES /////////////////////////////////////////////////////////////////////////////

    protected $con;

    // CONSTRUCTOR ////////////////////////////////////////////////////////////////////////////

    public function __construct() {
        
    }

    // METHODS ////////////////////////////////////////////////////////////////////////////////

    function open() {
        $hostname = "128.118.31.16:3306";
        $username = "remote";
        $password = "password";
        $dbname = "homes_db";

        global $con;
        $con = mysql_connect($hostname, $username, $password) or die("no worky");
        mysql_select_db($dbname);
    }

// END

    function close() {
        global $con;
        mysql_close($con);
    }

// END


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
    }

// end function
///////////////////////////////////////////////////////////////////////////////////////////////////

    public function getLogin($user, $pw) {

        global $con;

        $sql = 'SELECT username,password FROM Account WHERE username="' . $user . '" AND password="' . $pw . '"';
        $this->open();
        $results = mysql_query($sql, $con);
        $final = mysql_fetch_row($results);
        $status = $final[0];
        $this->close();
        return $status;
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
    }

// end function

    private function getIntTypes() {
        global $con;
        $sql = 'SELECT type_id, title FROM Interest_Type';
        $types = array();
        $this->open();
        $results = mysql_query($sql, $con);
        while ($result = mysql_fetch_array($results)) {
            $types[$result[0]] = new Item($result[0], $result[1]);
        }// end while
        $this->close();
        return $types;
    }

// end function

    private function getVolInts($vid) {
        global $con;
        $sql = 'SELECT Interest_interest_id FROM Volunteer_has_Interest WHERE Volunteer_Person_person_id= ' . $vid;
        $volIntIds = array();
        $ints = array();
        $this->open();
        $results = mysql_query($sql, $con);
        while ($result = mysql_fetch_array($results)) {
            $vii = $result[0];
            $volIntIds[] = $vii;
        }// end while
        $this->close();
        return $volIntIds;
    }

// end function

    private function getAllInts() {
        global $con;
        $sql = 'SELECT interest_id, title, type_id FROM Interest';
        $ints = array();
        $this->open();
        $results = mysql_query($sql, $con);
        while ($result = mysql_fetch_array($results)) {
            $int = new Interest();
            $int->setId($result[0]);
            $int->setTitle($result[1]);
            $int->setTypeId($result[2]);
            $ints[] = $int;
        }// end while
        $this->close();
        return $ints;
    }

// end function

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
        }// end functionpublic function readAccount($id) {
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
    }

// end function

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
    }

// end function

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
    }

// end function

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
    }

// end function

    public function readAccounts() {
        global $con;
        $sql = 'SELECT * FROM Account';
        $this->open();
        $result = mysql_query($sql, $con);
        $accounts = array();
        while ($rows = mysql_fetch_array($result)) {
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
    }

// end function

    public function updateInfo($accid, $person, $contact, $address) {
        global $con;

        $sql = "update Person set title='" . $person->getTitle() . "', first_name='" . $person->getFirst_name() . "' , last_name='" . $person->getLast_name() . "' where person_id=(select person_id from Account where account_id=" . $accid . ");";
        //$sql2 = "update Contact set phone='" . $contact->getPhone() . "', email='" . $contact->getEmail() . "', phone2='" . $contact->getPhone2() . "' , extension='" . $contact->getExtension() "' where contact_id=(select Contact_contact_id from Person where person_id=(select person_id from Account where account_id=" . $accid . "));"
        $this->open();
        $result = mysql_query($sql, $con);
        //	$result2 = mysql_query($sql2, $con);
        if ($result)// && $result2)
            echo "UPDATED";
    }

    public function readAllEvent() {
        global $con;
        $sql = 'SELECT * FROM Event';
        $this->open();
        $result = mysql_query($sql, $con);
        $events = array();

        while ($rows = mysql_fetch_array($result)) {
            $event = new Event();
            $event->setEvent_id($rows[0]);
            $event->setTitle($rows[1]);
            $event->setDate($rows[2]);
            $event->setTime($rows[3]);
            $event->setType($rows[4]);
            $event->setAddress($rows[5]);
            $event->setCommittee($rows[7]);
            $event->setSponsoredBy($rows[8]);
            $events[] = $event;
        }
        $this->close();
        return $events;
    }

// end function

    public function readAllEvent_Type() {
        global $con;
        $sql = 'SELECT * FROM Event_Type';
        $this->open();
        $result = mysql_query($sql, $con);
        $event_types = array();

        while ($rows = mysql_fetch_array($result)) {
            $event_type = new Event_type();
            $event_type->setType_id($rows[0]);
            $event_type->setTitle($rows[1]);
            $event_type->setDescription($rows[2]);
            $event_types[] = $event_type;
        }
        $this->close();
        return $event_types;
    }

// end function

    public function countEventGuests($event_id) {
        global $con;
        $sql = "Select Count(*) from Person_relates_to_Event where Event_event_id=" . $event_id . " And onGuestList=1";
        $this->open();
        $result = mysql_query($sql, $con);
        $this->close();
        $row = mysql_fetch_array($result);
        return $row[0];
    }

// end function	

    public function searchEventByType($eventTypeId) {
        global $con;
        $sql = 'SELECT * FROM Event Where type_id=' . $eventTypeId;
        $this->open();
        $result = mysql_query($sql, $con);
        $events = array();

        while ($rows = mysql_fetch_array($result)) {
            $event = new Event();
            $event->setEvent_id($rows[0]);
            $event->setTitle($rows[1]);
            $event->setDate($rows[2]);
            $event->setTime($rows[3]);
            $event->setType($rows[4]);
            $event->setAddress($rows[5]);
            $event->setCommittee($rows[7]);
            $event->setSponsoredBy($rows[8]);
            $events[] = $event;
        }
        $this->close();
        return $events;
    }

// end function

//Reads all donations 
    public function readAllDonations() {
        global $con;
        $sql = '
            SELECT donation_id,Donation.date,Donation.time,when_entered,details,value,DonationType.typeName,Event.title
            FROM Donation
            JOIN DonationType on Donation.DonationType_idDonationType = DonationType.idDonationType
            JOIN Event on Donation.Event_event_id = Event.event_id';
        $this->open();
        $result = mysql_query($sql, $con);
        $donations = array();
        while ($rows = mysql_fetch_array($result)) {
            $donation = new Donation();
            $donation->setDonation_id($rows[0]);
            $donation->setDate($rows[1]);
            $donation->setTime($rows[2]);
            $donation->setDetails($rows[3]);
            $donation->setWhen_entered($rows[4]);
            $donation->setDonationType_idDonationType($rows[5]);
            $donation->setValue($rows[6]);
            $donation->setEvent_event_id($rows[7]);
            $donation->setAdmin_idAdmin($rows[8]);
            $donation->setEntered_by_id($rows[9]);
            $donations[] = $donation;
        }
        $this->close();
        return $donations;
    }

// end function

// Reads single donation by Id ***I didnt get to work on this yet. Needs work***
    public function readDonationById($id) {
        global $con;
        $sql = 'SELECT * FROM Donation WHERE donation_id = "' . $id . '"';
        $this->open();
        $result = mysql_query($sql, $con);
        $this->close();
        if ($result) {
            $result = mysql_fetch_array($result);
            $donation = new Donation();
            $donation->setDonation_id($result[0]);
            $donation->setDate($result[1]);
            $donation->setTime($result[2]);
            $donation->setDetails($result[3]);
            $donation->setWhen_entered($result[4]);
            $donation->setDonationType_idDonationType($result[5]);
            $donation->setValue($result[6]);
            $donation->setEvent_event_id($result[7]);
            $donation->setAdmin_idAdmin($result[8]);
            $donation->setEntered_by_id($result[9]);
        } else {
            echo "DB error";
        }
        return $donation;
    }
// end function
    
// Reads all donations made by an organization
        public function readDonationByOrg($name) {
        global $con;
        $sql = 
            'SELECT donation_id,Donation.date,Donation.time,when_entered,details,value,DonationType.typeName,Event.title
            FROM Donation
            JOIN Donation_has_Organization on Donation.donation_id=Donation_has_Organization.Donation_donation_id
            JOIN Organization on Donation_has_Organization.Organization_organization_id=Organization.organization_id
            JOIN DonationType on Donation.DonationType_idDonationType = DonationType.idDonationType
            JOIN Event on Donation.Event_event_id = Event.event_id
            WHERE name = "' . $name . '"';
        $this->open();
        $result = mysql_query($sql, $con);
        $donations = array();
        while ($rows = mysql_fetch_array($result)) {
            $donation = new Donation();
            $donation->setDonation_id($rows[0]);
            $donation->setDate($rows[1]);
            $donation->setTime($rows[2]);
            $donation->setWhen_entered($rows[3]);
            $donation->setDetails($rows[4]);
            $donation->setValue($rows[5]);
            $donation->setDonation_type($rows[6]);
            $donation->setEvent_name($rows[7]);
            $donations[] = $donation;
        }
        $this->close();
        return $donations;
    }
// end function
    
//Reads all donations made by a person using first and last name    
    public function readDonationByPerson($fName, $lName) {
        global $con;
        $sql = 
            'SELECT donation_id,Donation.date,Donation.time,when_entered,details,value,DonationType.typeName,Event.title
            FROM Donation
            JOIN Donation_has_Person on Donation.donation_id=Donation_has_Person.Donation_donation_id
            JOIN Person on Donation_has_Person.Person_person_id=Person.Person_id
            JOIN DonationType on Donation.DonationType_idDonationType = DonationType.idDonationType
            JOIN Event on Donation.Event_event_id = Event.event_id
            WHERE first_name = "' . $fName . '" AND last_name = "' . $lName . '"';
        $this->open();
        $result = mysql_query($sql, $con);
        $donations = array();
        while ($rows = mysql_fetch_array($result)) {
            $donation = new Donation();
            $donation->setDonation_id($rows[0]);
            $donation->setDate($rows[1]);
            $donation->setTime($rows[2]);
            $donation->setWhen_entered($rows[3]);
            $donation->setDetails($rows[4]);
            $donation->setValue($rows[5]);
            $donation->setDonation_type($rows[6]);
            $donation->setEvent_name($rows[7]);
            $donations[] = $donation;
        }
        $this->close();
        return $donations;
    }
// end function

//Reads all donations based on two amounts entered    
    public function readAmount($amount1, $amount2) {
        global $con;
        $sql = '            
            SELECT donation_id,Donation.date,Donation.time,when_entered,details,value,DonationType.typeName,Event.title
            FROM Donation
            JOIN DonationType on Donation.DonationType_idDonationType = DonationType.idDonationType
            JOIN Event on Donation.Event_event_id = Event.event_id
            WHERE value Between "' . $amount1 . '" AND "' . $amount2 . '"';
        $this->open();
        $result = mysql_query($sql, $con);
        $donations = array();
        while ($rows = mysql_fetch_array($result)) {
            $donation = new Donation();
            $donation->setDonation_id($rows[0]);
            $donation->setDate($rows[1]);
            $donation->setTime($rows[2]);
            $donation->setWhen_entered($rows[3]);
            $donation->setDetails($rows[4]);
            $donation->setValue($rows[5]);
            $donation->setDonation_type($rows[6]);
            $donation->setEvent_name($rows[7]);
            $donations[] = $donation;
        }
        $this->close();
        return $donations;
    }

// end function
        
 //Updates a donation    
   public function updateDonation ($date, $time, $detail, $donType, $value, $eventId, $donId) {
        global $con;
               $sql = "update Donation set date='" . $date->getDate() . "', time='" . $time->getTime() . "', details='" . $details->getDetails() . "', DonationType_idDonationType='" . $donType->getDonationType() . "', value='" . $value->getValue() . "' , Event_event_id='" . $eventId->getEventId() . "' where donation_id=" . $donId . '"';
		$this->open(); 
		mysql_query($sql, $con);
		$this->close();
		return true; 
		}
                
 //end function               
        
//Creates a new donation                
    public function createNewDonation ($donId, $date, $time, $detail, $donType, $value, $eventId, $adminId, $enteredById) {
        global $con;
                $sql = 
                'INSERT INTO Donation (donation_id, date, time, details, value, Event_event_id, Admin_idAdmin, entered_by_id)
		 VALUES ("' . $donId . '","' . $date . '","' . $time . '","' . $details . '","' . $donType . '","' . $value . '","' . $eventId . '","' . $adminId . '","' . $enteredById . '")';
		$this->open(); 
		mysql_query($sql, $con);
		$this->close();
		} 
 //end function               
	
	 public function getAllSchedule() //view all 
        {
             
			$sql = 'SELECT * FROM Schedule';
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
		
        public function getScheduleFromUserName ($Fname,$Lname) // search by user, might need a better way to write it
        {
				  
				$sql= 'SELECT Person.person_id, Person.last_name, Person.first_name, Schedule.timeStart, Schedule.timeEnd, Schedule.Event_event_id, Schedule.description FROM Person
				JOIN Schedule_slot On Person.person_id = Schedule_slot.Volunteer_Person_person_id
				JOIN Schedule ON Schedule_slot.Schedule_id = Schedule.id 
				WHERE Person.last_name ='{.$Lname}' && Person.first_name ="{.$FName}"'; //SQL subject to change to adjust to PHP, but work in mySQL AS IS. 

				$this->open();
				$result = mysql_query($sql, $con);
				$userSchedule = array();
				while($rows = mysql_fetch_array($result))
				{
                
				$uSchedule = new userSchedule();
				$uSchedule->setPerson_person_id($rows[0]);
				$uSchedule->setLast_name($rows[1]);
				$uSchedule->setFirst_name($rows[2]);
				$uSchedule->setTimeStart($rows[3]);
				$uSchedule->setScheduleEvent_Event_id($row[4]);
				$uSchedule->setScheduleDescription($row[5]);
							$uSchedules[] = $uSchedule; 
                } 
                $this->close();
				return $uSchedules;
                    
        }
		
		  public function getEventSchedule($title) //view all 
        {
             
			$sql = 'SELECT Event.event_id, Event.title, Schedule.timeStart, Schedule.timeEnd, Schedule.description FROM Event
					JOIN Schedule ON Event.event_id = Schedule.Event_event_id
					WHERE Event.title = "{.$title}"'; // SQL code works, not sure why how timeStart supposed to be incremented 
			$this->open();
			$result = mysql_query($sql, $con);
			$schedules =array();
			while($rows = mysql_fetch_array($result))
                        {
                
						$ScheduleEvent = $SEvent;
						$ScheduleEvent->setEvent_id(row[0]); 
						$ScheduleEvent->setTitle($rows[1]);
						$ScheduleEvent->setTimeStart($rows[2]);
						$ScheduleEvent->setTimeEnd($rows[3]);
						$ScheduleEvent->setDescription($row[4]);
						$ScheduleEvents[] = $ScheduleEvent;
                        } 
                $this->close();
			return $ScheduleEvents;
        }
		
		public function getEventFromInterest($title) //view all 
        {
             
			$sql = 'SELECT Schedule.Event_Event_id, Interest.title, Interest.description, Schedule.timeStart, Schedule.timeEnd, Schedule.description FROM Interest .
					'WHERE Interest.title = "{.$title}"';' // work when tested. Initially no schedule was create to perform query
			$this->open();
			$result = mysql_query($sql, $con);
			$schedules =array();
			while($rows = mysql_fetch_array($result))
                        {
						$ScheduleEvent = $SEvent;
						$ScheduleEvent->setEvent.Event_id(row[0]); 
						$ScheduleEvent->setTitle($rows[1]);
						$ScheduleEvent->setInterest.Description($row[2]);
						$ScheduleEvent->setTimeStart($rows[3]);
						$ScheduleEvent->setTimeEnd($rows[4]);
						$ScheduleEvent->setScheduleDescription(row[5]);
						$ScheduleEvents[] = $ScheduleEvent;
                        } 
                $this->close();
			return $ScheduleEvents;
        }
		
		
        public function updateSchedule($sid,$timeStart,$timeEnd, $description) //unsure about $schedule, if declared elsewhere, also might need to declare get...() variables else where to initialize them
		{
				 
				
				$sql = 'UPDATE Schedule SET timeStart="' . $schedule->gettimeStart() . '", timeEnd= "'. $schedule->gettimeEnd() . '", description= "'. $schedule->getdescription(). '" . 
				'WHERE id=(select id from Schedule where id =" . $sid  ");' ; // SQL statement works, unsure about PHP adaption
				$this->open();
				$result = mysql_query($sql, $con);
			//	$result2 = mysql_query($sql2, $con);
				if($result)// && $result2)
					echo "A SCHEDULE IS UPDATED";
				$this->close();
				return $result;
	} // not yet completed 
	
	     public function updateScheduleSlot($ssid,$VolPID, $ScheduleID) //unsure about $schedule, if declared elsewhere, also might need to declare get...() variables else where to initialize them
		{
				 
				
				$sql = 'UPDATE Schedule_slot SET Volunteer_Person_person_id="' . $scheduleSlot->getVolPID() . '", Schedule_id= "'. $schedule->getScheduleID() . '" . 
				'WHERE id=(select id from Schedule_slot where id =" . $ssid  ");' ; // SQL statement works, unsure about PHP adaption
				$this->open();
				$result = mysql_query($sql, $con);
			//	$result2 = mysql_query($sql2, $con);
				if($result)// && $result2)
					echo "A SCHEDULE IS UPDATED";
				$this->close();
				return $result;
	} // not yet completed 
		public function createANewSchedule ($timeStart, $timeEnd, $Event_event_id, $description, $Interest_interest_id) 
        {
			$sql = 'INSERT INTO Schedule(timeStart, timeEnd, Event_event_id, description, Interest_interest_id) .
			VALUES ("timeStart","timeEnd", "Event_event_id", "description", "Interest_interest_id")';'
			// Not 100% sure if this is a good way to create a new row. But it work in mySQL with manual 'POST' entry.  
			$this->open(); 
			$result = mysql_query($sql, $con);
			if ($result)
			echo "ONE NEW SCHEDULE CREATED" ;
			$this->close();
			return $result; 
		} 
		                              
}// end class
?>
