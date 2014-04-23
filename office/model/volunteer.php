<?php

/* 
 * File: /model/volunteer.php
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Author: Roman Galysh
 */

function indexVolunteerBy($value1, $value2) {}

	function search() {
		global $dbio;
		if($_GET['searchBy'] == 'name'){
                    $fname = $_GET['input1'];
                    $lname =  $_GET['input2'];
                    $tableinfo = $dbio->searchPersonByName($fname,$lname);
			}
			elseif ($_GET['searchBy'] == 'organization') {
                            $org = $_GET['input1'];
                            $tableinfo = $dbio->searchPersonByOrg($org);
			}
                            return $tableinfo;
                           }

function create(){
   
    $person = new Person();
    $contact = new Contact();
    $address = new Address();

    $person->setTitle($_GET['title']);
    $person->setFirst_name($_GET['fname']);
    $person->setLast_name($_GET['lname']);
    $person->setDob($_GET['dob']);
    $person->setGender($_GET['gender']);

    $contact->setPhone($_GET['phone']);
    $contact->setPhone2($_GET['phone2']);
    $contact->setExtension($_GET['extension']);
    $contact->setEmail($_GET['email']);
   
    $address->setStreet1($_GET['street1']);
    $address->setStreet2($_GET['street2']);
    $address->setCity($_GET['city']);
    $address->setState($_GET['state']);
    $address->setZip($_GET['zip']);
 
    
    global $dbio;
    $updated = $dbio->createPerson($person, $contact, $address);
    return $updated;
    
    
}


function updateInfo(){
    
    $vid = $_GET['vid'];
        $person = new Person();
        $contact = new Contact();
        $address = new Address();

        $person->setTitle($_GET['title']);
        $person->setFirst_name($_GET['first_name']);
        $person->setLast_name($_GET['last_name']);
        $person->setDob($_GET['dob']);

        $contact->setPhone($_GET['phone']);
        $contact->setEmail($_GET['email']);
        $contact->setPhone2($_GET['phone2']);
        $contact->setExtension($_GET['extension']);

        $address->setStreet1($_GET['street1']);
        $address->setStreet2($_GET['street2']);
        $address->setCity($_GET['city']);
        $address->setState($_GET['state']);
        $address->setZip($_GET['zip']);
 
    
    global $dbio;
    $updated = $dbio->updateInfo($vid, $person, $contact, $address);
    return $updated;
}


function listVolunteer(){
    global $dbio;
    $volunteers = $dbio->listVolunteers();
    return $volunteers;
}
//function readContact($id){}


function editVolunteers(){
    global $dbio;
    $volunteers = $dbio->searchPersonByName($fname,$lname);
    return $volunteers;
} 

//****************************************************************************
//****************************************************************************

    global $msg;
    global $dbio;
    $pid = $_SESSION['personid'];

    function setVolunteerAvailability($vid, $day, $eve, $wend) {
    
   
        $dbio->setVolunteerAvailability($vid, $day, $eve, $wend);

    }

    function getAvailability() {
    	global $dbio;
        $pid = $_SESSION['personid'];
        $ppid=$pid;
        $dbAvailability = $dbio->getVolunteerAvailability($ppid);
        return $dbAvailability;


     
    
    }

    function setVolunteerConsent($vid, $age, $photo, $agree, $video) {
    
   
        $dbio->setVolunteerConsent($vid, $age, $photo, $agree, $video);

    }
    
    function getVolunteerConsent() {
        
        global $dbio;
        $ppid=$_SESSION['personid'];
        $dbConsent = $dbio->getVolunteerConsent($ppid);
        
        return $dbConsent;
     
    
    }
    
   function update() {
        global $dbio;

        $deleteAll = $dbio->deleteInterestsByVolunteer($_SESSION['personid']);
        $updated = $dbio->addInterestByVolunteer($_SESSION['personid'], $_SESSION['interestVolunteer']);
               
        return $updated;
    }

?>


