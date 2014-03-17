<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Author: rwg5215
 */

	switch ($act) {

		case 'search':
			include 'office/model/volunteer.php';
                        $page = $dir . '/view/searchVolunteer.php';
			break;

		case 'create':
                        include 'office/model/volunteer.php';
                        $page = $dir . '/view/createVolunteer.php';
			break;

		case 'read':
			include 'office/model/volunteer.php';
			$page = $dir . '/view/readVolunteer.php';
			break;

		case 'update':
			include 'office/model/volunteer.php';
                        $page = $dir . '/view/updateVolunteer.php';
			break;

		case 'delete':
			// CODE HERE
			break;

		case 'list':
			include 'office/model/volunteer.php';
                        $page = $dir . '/view/listVolunteer.php';
			break;

		default:
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			break;


	}// end switch

?>
