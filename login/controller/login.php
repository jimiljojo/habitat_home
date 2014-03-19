<?php

	global $act;
    global $msg;
    

    $act = (isset($_GET['act'])) ? $_GET['act'] : '';
    $msg = (isset($_GET['msg'])) ? $_GET['msg'] : '';

    //$act = 'viewLoginPage';
	    	
	

	switch($act)
	{
		case 'loginCheck':
	    session_start();
	    $user=($_GET['userid']);
	    $pw=($_GET['password']);
	    $dbCheck=$dbio->getLogin($user,$pw);
	    if($user != $dbCheck)
	    {
	    	include ('view/loginpage.php');
	    	print '<script type="text/javascript">'; 
			print 'alert("Not a valid Username or Password")'; 
			print '</script>';
	    }

	    else
	    {
	    	$_SESSION['userid'] = (isset($_GET['userid'])) ? $_GET['userid'] : '';
	    	$_SESSION['password'] = (isset($_GET['password'])) ? $_GET['password'] : '';
	    	include('../index.php');
	    }


	    
	    break;

	    default:
	    include ('view/loginpage.php');
	    break;
	}

 ?>