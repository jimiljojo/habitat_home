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

                                
	}// end class
?>
