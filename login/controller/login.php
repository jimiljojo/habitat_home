<?php
	
	
	global $act;
    global $msg;
    global $dir;
    global $user;

    $act = (isset($_GET['act'])) ? $_GET['act'] : '';
    $msg = (isset($_GET['msg'])) ? $_GET['msg'] : '';

    //$act = 'viewLoginPage';
	    	
	

	switch($act)
	{
		case 'loginCheck';
	    //session_start();
	    $user=($_GET['userName']);
	    $pw=($_GET['password']);
	    $dbCheck=$dbio->getLogin($user,$pw);
	    global $personid;
	    $personid= $dbio->getPersonIdByUserName($user);

	    
	    if($user != $dbCheck)
	    {

	    	//include ('view/loginpage.php');
	    	$page = $dir . 'view/loginpage.php';
	    	print '<script type="text/javascript">'; 
			print 'alert("Not a valid Username or Password")'; 
			print '</script>';
	    }

	    else
	    {	
	    	$dir='home';
	    	
	    	$_SESSION['personid']=$personid;
	    	$_SESSION['userName'] = (isset($_GET['userName'])) ? $_GET['userName'] : '';
	    	$page = $dir . 'view/home.php';
	    }


	    
	    break;

	    case 'checkEmail';
	    $page = $dir . 'view/checkEmail.php';
	    $act='dbcheck';
	    
	    
	    break;

	    case 'dbcheck';

	    $email=($_GET['email']);
	    
	    $checkEmail=$dbio->getEmailCheck($email);
	    


	    if($checkEmail == $email){
	    	$page = $dir . 'view/loginpage.php';
	    	print '<script type="text/javascript">'; 
			print 'alert("Reset Password is mailed to you on '.$email.'. Please enter a new password after loggin in with the reset password")'; 
			print '</script>';

	    }

	    else{
	    	$page = $dir . 'view/checkEmail.php';
	    	print '<script type="text/javascript">'; 
			print 'alert("Enter your email which you entered while registering with Habitat for Humanity OR Contact our office")'; 
			print '</script>';
	    }

	    break;

	    

	    default:
	   	$page = $dir . 'view/loginpage.php';
	    break;
	}

 ?>