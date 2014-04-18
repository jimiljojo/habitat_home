<?php

/* 
 * File: /model/volunteer.php
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Author: Roman Galysh
 */

function indexVolunteerBy($value1, $value2) {}


function createVolunteer($parameter){}


function updateInfo(){
    
    $vid = $_GET['vid'];
    $person = new Person();
    $person->setTitle($_GET['title']);
    $person->setFirst_name($_GET['fname']);
    $person->setLast_name($_GET['lname']);
    $person->setDob($_GET['dob']);
    
    $contact = new Contact();
    $phone->setPhone($_GET['phone']);
    $email->setEmail($_GET['email']);
    $phone->setPhone2($_GET['phone2']);
    $phone->setExtension($_GET['extention']);
    
    
    $address = new Address();
    $street1->setStreet1($_GET['street1']);
    $street2->setStreet2($_GET['street2']);
    $city->setCity($_GET['city']);
    $state->setState($_GET['state']);
    $zip->setZip($_GET['zip']);
    
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

?>


