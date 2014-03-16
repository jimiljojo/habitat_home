<?php

	// TITLE: Office Interests Model
	// FILE: office/model/interests.php
	// AUTHOR: AUTOGEN


	//function search() {}
	//function create() {}
	//function read() {}
	//function update() {}
	//function delete() {}
	//function list() {}

	class officeInterest
	{
		public function readVolunteerInterest($searchBy)
		{
			require_once '/model/dbio_des301.php';
			$dbio = new DBIO();
			require_once '/class/volunteerInterest.php';
			global $con;
			$dbio->open();
			global $volInts;
			$sql = "SELECT Person.first_name, Person.last_name, Interest_Type.title, Interest.title
				FROM Person
				JOIN Volunteer on Person.Person_id = Volunteer.Person_person_id
				JOIN Volunteer_has_Interest on Volunteer.Person_person_id = Volunteer_has_Interest.Volunteer_Person_person_id
				JOIN Interest on Volunteer_has_Interest.Interest_interest_id = Interest.interest_id
				JOIN Interest_Type on Interest.type_id = Interest_Type.type_id
				WHERE Interest.title = '{$searchBy}'";
			$result = mysqli_query($con,$sql);
			while ($row = mysqli_fetch_array($result))
			{
				$volInt = new volunteerInterest();
				$volInt->setFirst_name($row[0]);
				$volInt->setLast_name($row[1]);
				$volInt->setType_title($row[2]);
				$volInt->setInterest_title($row[3]);
				$volInts[] = $volInt;
			}
			//return $int;
			$dbio->close();
			return $volInts;
	    }
		
		public function listVolunteerInterest()
		{
			require_once '/model/dbio_des301.php';
			$dbio = new DBIO();
			require_once '/class/volunteerInterest.php';
			global $con;
			$dbio->open();
			global $volInts;
			$sql = "SELECT Interest_Type.title, Interest.title
				FROM Interest
				JOIN Interest_Type on Interest.type_id = Interest_Type.type_id";
			$result = mysqli_query($con,$sql);
			while ($row = mysqli_fetch_array($result))
			{
				$volInt = new volunteerInterest();
				//$volInt->setFirst_name($row[0]);
				//$volInt->setLast_name($row[1]);
				$volInt->setType_title($row[0]);
				$volInt->setInterest_title($row[1]);
				$volInts[] = $volInt;
			}
			//return $int;
			$dbio->close();
			return $volInts;
	    }
		
		public function readVolunteerInterestType($title)
		{
			require_once '/model/dbio_des301.php';
			$dbio = new DBIO();
			require_once '/class/volunteerInterest.php';
			global $con;
			$dbio->open();
			global $volInts;
			$sql = "SELECT Person.first_name, Person.last_name, Interest_Type.title, Interest.title
				FROM Person
				JOIN Volunteer on Person.Person_id = Volunteer.Person_person_id
				JOIN Volunteer_has_Interest on Volunteer.Person_person_id = Volunteer_has_Interest.Volunteer_Person_person_id
				JOIN Interest on Volunteer_has_Interest.Interest_interest_id = Interest.interest_id
				JOIN Interest_Type on Interest.type_id = Interest_Type.type_id
				WHERE Interest_Type.title = '{$title}'";
			$result = mysqli_query($con,$sql);
			while ($row = mysqli_fetch_array($result))
			{
				$volInt = new volunteerInterest();
				$volInt->setFirst_name($row[0]);
				$volInt->setLast_name($row[1]);
				$volInt->setType_title($row[2]);
				$volInt->setInterest_title($row[3]);
				$volInts[] = $volInt;
			}
			//return $int;
			$dbio->close();
			return $volInts;
	    }
	}
?>
