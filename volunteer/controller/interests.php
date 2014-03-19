<?php
    // FILE: Volunteer Interests Controller
    // AUTHOR: des301
    
    $personId = 5;
    
    switch ($act) {
	   
		case 'updateInterests':
			include ($dir . '/model/interests.php');
			$act = 'viewInterests';
			header ('location:index.php?dir=' . $dir . '&sub=' . $sub .'&act=' . $act . '&msg=' . $msg);
			break;

		case 'viewInterests':
		default:
			 $page = $dir . '/view/interests.php';
			 break;
		  
    }// end switch
?>