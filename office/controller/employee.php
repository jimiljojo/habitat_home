<?php

	// TITLE: Office Office Controller
	// FILE: office/controller/office.php
	// AUTHOR: rwg5215


	switch ($act) {

		case 'search':
                    $parameter = $_GET['param'];
                    $value1 = $_GET['i1'];
                    $value2 = $_GET['i2'];
                  
                    
                    include $dir . '/model/' . $sub . '.php';
                    $employee = listEmployeeBy($value1, $value2);
                    $page = $dir . '/view/list' . ucfirst($sub) . '.php';
 
			break;

		case 'create':
                    $parameter = $_GET['param'];
                    $title = $_GET['title'];
                    //$gender = $_GET['gender'];
                    $fname = $_GET['fn'];
                    $lname = $_GET['ln'];
                    $addr = $_GET['addr'];
                    $city = $_GET['city'];
                    $state = $_GET['state'];
                    $zip = $_GET['zip'];
                    $phone = $_GET['pn'];
                    $dob = $_GET['dob'];
                    
                    include $dir . '/model/' . $sub . '.php';
                    $volunteers = createEmployeeBy($parameter);
                    $page = $dir . '/view/create' . ucfirst($sub) . '.php';
                    
			break;

		case 'read':
			// CODE HERE
			break;

		case 'edit':
			include $dir . '/model/' . $sub . '.php';
                        $page = $dir . '/view/edit' . ucfirst($sub) . '.php';
			break;

		case 'delete':
			// CODE HERE
			break;

		case 'list':
                    include $dir . '/model/' . $sub . '.php';
                    $volunteers = listEmployee();
                    $page = $dir . '/view/list' . ucfirst($sub) . '.php';
			break;

		default:
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			break;


	}// end switch

?>




