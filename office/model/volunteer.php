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

function listVolunteer(){
    global $dbio;
    $volunteers = $dbio->listVolunteers();
    return $volunteers;
}
//function readContact($id){}

function editVolunteer(){
    
} 

/*function getVolunteer($vid){
    global $dbio;
    $volunteers = $dbio->getVolById($vid);
    return $volunteers;
}*/

function searchPersonByName($vid){
    global $dbio;
    $volunteers = $dbio->searchPersonByName();
    return $volunteers; 
}

//test
?>


