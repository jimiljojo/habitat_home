<?php

	// TITLE: Office Interests Controller
	// FILE: office/controller/interests.php
	// AUTHOR: AUTOGEN


	switch ($act) {

		case 'listInterests':
			include 'office/model/interests.php';
			$page = $dir . '/view/listInterests.php';
			break;
			
		case 'listInterestTypes':
			include 'office/model/interests.php';
			$page = $dir . '/view/listInterests.php';
			break;

		case 'createInterest':
			include 'office/model/interests.php';
			$page = $dir . '/view/createInterests.php';
			break;
                
		case 'createInterestType':
			include 'office/model/interests.php';
			$page = $dir . '/view/createInterests.php';
			break;
			
		case 'readInterest':
			include 'office/model/interests.php';
			$page = $dir . '/view/listInterests.php';
			break;
			
		case 'readInterestType':
			include 'office/model/interests.php';
			$page = $dir . '/view/listInterests.php';
			break;

		case 'updateInterests':
			include 'office/model/interests.php';
			$page = $dir . '/view/listInterests.php';
			break;
          
		case 'updateInterestTypes':
			include 'office/model/interests.php';
			$page = $dir . '/view/listInterests.php';
			break;
			
		case 'viewInterest':
			include 'office/model/interests.php';
			$page = $dir . '/view/viewInterests.php';
			break;	
			
		case 'viewInterestType':
			include 'office/model/interests.php';
			$page = $dir . '/view/viewInterests.php';
			break;
	
		default:
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			break;

	}// end switch

?>
