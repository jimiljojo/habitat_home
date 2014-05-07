<?php

	// TITLE: Volunteer Work History Model
	// FILE: volunteer/model/history.php
	// AUTHOR: dum5002
    global $dbio;
    global $person_id;
    //global $event_id;

    $person_id=$_SESSION['personid'];

    function getEventId(){
        $person_id=$_SESSION['personid'];
        global $dbio;
    	$event_id=$dbio->getEventId($person_id);
    	return $event_id;
    }

    function getEvents(){
        global $dbio;
        $person_id=$_SESSION['personid'];
        $event_id=$dbio->getEventId($person_id);
        $dbevent= $dbio-> getEvent($event_id);
        return $dbevent;
    }

    function getDates(){
        global $dbio;
        $dbdate= $dbio->getDate(getEventId());
        return $dbdate;
    }

    function getHours(){
        global $dbio;
        $dbHours= $dbio->getHours(getEventId());
        return $dbHours;
    }

    
?>
