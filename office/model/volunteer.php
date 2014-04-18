<?php

/* 
 * File: /model/volunteer.php
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Author: Roman Galysh
 */

function indexVolunteer($value1, $value2) {}


function createVolunteer($parameter){}


function updateInfo(){
    
   // $vid = $_GET['vid'];
    $person = new Person();
    $contact = new Contact();
    $address = new Address();
    
    $person->setTitle($_GET['title']);
    $person->setFirst_name($_GET['fName']);
    $person->setLast_name($_GET['lName']);
    
    $contact->setPhone($_GET['phone']);
    $contact->setEmail($_GET['email']);
    
    $address->setStreet1($_GET['street1']);
    $address->setStreet2($_GET['street2']);
    $address->setCity($_GET['city']);
    $address->setState($_GET['state']);
    $address->setZip($_GET['zip']);
    
    global $dbio;
    $updated = $dbio->updateInfo($person_id, $person, $contact, $address);
    return $update;
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

?>


