<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Author: Roman Galysh
 */

	switch ($act) {

		case 'search':
                    
                    $parameter = $_GET['param'];
                    $value1 = $_GET['i1'];
                    $value2 = $_GET['i2'];
                  
                    
                    include $dir . '/model/' . $sub . '.php;';
                    $volunteers = searchVolunteerBy($parameters);
                    $page = $dir . '/view/searchVolunteer' . ucfirst($sub) . '.php';
 
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
                    $dob = $_GET['dob'];
                    
                    include $dir . '/model' . $sub . '.php';
                    $volunteers = createVolunteerBy($parameters);
                    $page = $dir . '/view/createVolunteer' . ucfirst($sub) . '.php';
                    
                    
			break;

		case 'edit':
                    
			break;

		case 'update':
                    
			break;

		case 'delete':
                    
			break;

		case 'listVolunteer':
                                      
                    include $dir . '/model/' . $sub . '.php';
                    $volunteers = listVolunteer();
                    $page = $dir . '/view/listVolunteer' . ucfirst($sub) . '.php';
                    
			break;

                case 'index':
                    
                    default:
			$page = $dir . '/view/index' . ucfirst($sub) . '.php';
			break;


	}// end switch

?>
