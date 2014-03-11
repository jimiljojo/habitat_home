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

	
    


	}// end class
?>
