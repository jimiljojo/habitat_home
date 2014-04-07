<?php
    // FILE: Volunteer Interests Controller
    // AUTHOR: des301
    
    $personId = $_SESSION['personid'];
    
    switch ($act) {
	   
		case 'updateInterests':
			
			$act = 'viewInterests';
			//header ('location:index.php?dir=' . $dir . '&sub=' . $sub .'&act=' . $act . '&msg=' . $msg);

			$items = array();

	    If(!empty($_GET['interestVol'])){
			foreach(($_GET['interestVol']) as $username) {
 			$items[] = $username;
			}
		}
		$_SESSION['interestVolunteer'] = ($items);

		include ($dir . '/model/interests.php');
		$updated = update();
		 $page = $dir . '/view/interests.php';

			break;


		case 'viewInterests':
		default:

			 $page = $dir . '/view/interests.php';
			 break;
		  
    }// end switch
?>