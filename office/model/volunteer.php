<?php

/* 
 * File: /model/volunteer.php
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Author:
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
        $volunteer = new Volunteer();
        $consent = new Consent();

        $person->setTitle($_SESSION['personalinfo'][0]);
        $person->setFirst_name($_SESSION['personalinfo'][1]);
        $person->setLast_name($_SESSION['personalinfo'][2]);
        $person->setDob($_SESSION['personalinfo'][3]);
        $person->setGender($_SESSION['personalinfo'][4]);

        $contact->setPhone($_SESSION['personalinfo'][5]);
        $contact->setPhone2($_SESSION['personalinfo'][6]);
        $contact->setExtension($_SESSION['personalinfo'][7]);
        $contact->setEmail($_SESSION['personalinfo'][8]);
       
        $address->setStreet1($_SESSION['personalinfo'][9]);
        $address->setStreet2($_SESSION['personalinfo'][10]);
        $address->setCity($_SESSION['personalinfo'][11]);
        $address->setState($_SESSION['personalinfo'][12]);
        $address->setZip($_SESSION['personalinfo'][13]);

        $interests = $_SESSION['interestVolunteer'];
        $availability = $_SESSION['avail'];

        $consent->setMinor($_GET['less18']);
        $consent->setMajor($_GET['greater18']);
        $consent->setPhoto($_GET['photo']);
        $consent->setSafety($_GET['safetyGuidelines']);
        $consent->setVideo($_GET['video']);
        $consent->setWaiver($_GET['liability']);
        $consent->setName($_GET['emergencyName']);
        $consent->setPhone($_GET['phone']);
     
        
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


