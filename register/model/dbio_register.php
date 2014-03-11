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

		public function getMaritialStatus($maritial){
		global $con;
		$sql='SELECT title from Marital_Status where marital_status_id IN ('. $maritial .')';
		$this->open();
		$results=mysql_query($sql, $con);
		$final=mysql_fetch_row($results);
		$status=$final[0];
		$this->close();
		return $status;
	}
		
///////////////////////////////////////////////////////////////////////////////////////////////////
		
	   public function getAllInterestTypes() {
		  global $con;
		  $sql = 'SELECT type_id, title FROM Interest_Type';
		  $types = array();
		  $this->open();		
		  $results = mysql_query($sql, $con);
		  while($result = mysql_fetch_array($results)) {
			 $int_type= new Item();
			 $int_type->setId($result[0]);
			 $int_type->setTitle($result[1]);
			 $types[]=$int_type;
		  }// end while
		  $this->close();
		  return $types;
	   }// end function

	   
	   public function getAllInterests() {
		global $con;
		$sql = 'SELECT * FROM Interest';
		$this->open();
		$results = mysql_query($sql, $con);

			$interests = array();
			while($result = mysql_fetch_array($results)) {
				$interest = new Interest();
				$interest->setId($result[0]);
				$interest->setTypeid($result[1]);
				$interest->setTitle($result[2]);
				//$interest->setDescription($result[3]);
				$interests[] = $interest;
			}// end while
		$this->close();
		return $interests;
	}// end function

	public function getInterestsOfType($type_id) {
		global $con;
		$sql = 'SELECT * FROM Interest Where type_id='.$type_id;
		$this->open();
		$results = mysql_query($sql, $con);

			$interests = array();
			while($result = mysql_fetch_array($results)) {
				$interest = new Interest();
				$interest->setId($result[0]);
				$interest->setTypeid($result[1]);
				$interest->setTitle($result[2]);
				//$interest->setDescription($result[3]);
				$interests[] = $interest;
			}// end while
		$this->close();
		return $interests;
	}// end function
    
	public function getInterestsByIds($ids) {
		global $con;
		$sql = 'SELECT * FROM Interest Where interest_id IN ('. $ids .')';
		$this->open();
		$results = mysql_query($sql, $con);

			$interests = array();
			while($result = mysql_fetch_array($results)) {
				$interest = new Interest();
				$interest->setId($result[0]);
				$interest->setTypeid($result[1]);
				$interest->setTitle($result[2]);
				//$interest->setDescription($result[3]);
				$interests[] = $interest;
			}// end while
		$this->close();
		return $interests;
	}// end function

	
    public function createNewPerson($street1,$street2,$city,$state,$zip,$phone,$email,$phone2,$extension,$title,$fName,$lName,$gender,$dob,$maritalStatusId,$prefEmail,$prefMail,$prefPhone){
		global $con;
		
		$sql =	"INSERT INTO Address
				(street1,street2,city,state,zip)
				VALUES
				('" .$street1. "','" .$street2. "','" .$city. "','" .$state. "','" .$zip. "');" .

				"INSERT INTO Contact
				(address_id,phone,email,phone2,extension)
				Select Max(address_id),'" .$phone. "','" .$email. "','" .$phone2. "','" .$extension. "' From homes_db.Address;".

				"INSERT INTO Person
				(title,first_name,last_name,gender,dob,Marital_Status_marital_status_id,Contact_contact_id,isActive,lastActive,prefEmail,prefMail,prefPhone)
				Select '" .$title. "','" .$fName. "','" .$lName. "','" .$gender. "','" .$dob. "'," .$maritalStatusId. ",Max(contact_id), 1, Null,". $prefEmail. "," .$prefMail. "," .$prefPhone." From Contact;"

		$this->open();
		mysql_query($sql, $con);
		$this->close();

		return True;
	}//end function


public function createNewAccount($consentAge, $consentVideo , $consentWaiver, $consentPhoto , $availDay , $availEve, $availWend, $consentMinor, $consentSafety, $emergencyName, $emergencyPhone, $churchAmbassador, $affiliation,$interestId, $username, $password){
		global $con;
		
		$sql =	"INSERT INTO Volunteer
				(consentAge, consentVideo, consentWaiver , consentPhoto, availDay, availEve, availWend, Person_person_id,
				 isBoardMember, consentMinor, consentSafety, emergencyName, emergencyPhone, churchAmbassador, affiliation)
				SELECT " .$consentAge. "," .$consentVideo. " , " .$consentWaiver. ", " .$consentPhoto. " , " .$availDay. " , " .$availEve. ", " .$availWend. ",
				MAX(person_id), 0, " .$consentMinor. ", " .$consentSafety. ", '" .$emergencyName. "', '" .$emergencyPhone. "', " .$churchAmbassador. ", '" .$affiliation. "' FROM Person;".


				"INSERT INTO Volunteer_has_Interest
				(Volunteer_Person_person_id,Interest_interest_id)
				SELECT MAX(person_id)," .$interestId." FROM Person;".



				"INSERT INTO Account
				(username, password, date, status, isOffice, isVolunteer,person_id)
				SELECT '" .$username."','" .$password."', getDate(), 'Active', 0, 1, MAX(person_id) From Person;"

		$this->open();
		mysql_query($sql, $con);
		$this->close();

		return True;
	}//end function


	}// end class
?>
