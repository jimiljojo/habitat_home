<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Author: rwg5215
 */

	switch ($act) {

		case 'search':
                    
                    $parameter = $_GET['param'];
                    $value1 = $_GET['i1'];
                    $value2 = $_GET['i2'];
                  
                    
                    include $dir . '/model' . $sub . '.php;';
                    $volunteers = searchVolunteerBy($parameters);
                    $page = $dir . '/view/search' . ucfirst($sub) . '.php';
 
			break;

		case 'create':
                    
                    $parameter = $_GET['param'];
                    $title = $_GET['title'];
                    $gender = $_GET['gender'];
                    $marital_status = $_GET['marital_status'];
                    //$contact = $_GET['contact'];
                    $fname = $_GET['fn'];
                    $lname = $_GET['ln'];
                    $addr = $_GET['addr'];
                    $city = $_GET['city'];
                    $state = $_GET['state'];
                    $zip = $_GET['zip'];
                    $phone = $_GET['pn'];
                    $dob = &_GET['dob'];
                    
                    include $dir . '/model' . $sub . '.php';
                    $volunteers = createVolunteerBy($parameters);
                    $page = $dir . '/view/create' . ucfirst($sub) . '.php';
                    
                    
			break;

		case 'edit':
                    
			break;

		case 'update':
                    
			break;

		case 'delete':
                    
			break;

		case 'list':
                                      
                    include $dir . '/model' . $sub . '.php;'
                    $volunteers = listVolunteerBy($parameters);
                    $page = $dir . '/view/list' . ucfirst($sub) . '.php';
                    
			break;

		default:
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			break;


	}// end switch

?>
