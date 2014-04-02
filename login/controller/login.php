<?php
	
	
	global $act;
    global $msg;
    global $dir;

    $act = (isset($_GET['act'])) ? $_GET['act'] : '';
    $msg = (isset($_GET['msg'])) ? $_GET['msg'] : '';

    //$act = 'viewLoginPage';
	    	
	

	switch($act)
	{
		case 'loginCheck':
	    //session_start();
	    $user=($_GET['userid']);
	    $pw=($_GET['password']);
	    $dbCheck=$dbio->getLogin($user,$pw);
	    
	    if($user != $dbCheck)
	    {

	    	//include ('view/loginpage.php');
	    	$page = $dir . '/view/loginpage.php';
	    	print '<script type="text/javascript">'; 
			print 'alert("Not a valid Username or Password")'; 
			print '</script>';
	    }

	    else
	    {	
	    	$dir='home';
	    	$page = $dir . '/view/home.php';
	    	
	    	
	    	$_SESSION['userid'] = (isset($_GET['userid'])) ? $_GET['userid'] : '';
	    	$_SESSION['password'] = (isset($_GET['password'])) ? $_GET['password'] : '';
	    }


	    
	    break;

	    default:
	   	$page = $dir . '/view/loginpage.php';
	    break;
	}

 ?>