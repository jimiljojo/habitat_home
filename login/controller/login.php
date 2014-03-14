<?php

	global $act;
    global $msg;
    

    $act = (isset($_GET['act'])) ? $_GET['act'] : '';
    $msg = (isset($_GET['msg'])) ? $_GET['msg'] : '';

    
	    	
	

	switch($act)
	{
		case 'viewLoginPage':
	    session_start();
	    $_SESSION['userid'] = (isset($_GET['userid'])) ? $_GET['userid'] : '';
	    $_SESSION['password'] = (isset($_GET['password'])) ? $_GET['password'] : '';
	    break;

	    default:
	    include ('view/loginpage.php');
	    break;
	}

 ?>