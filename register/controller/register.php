<?php

    // FILE: Registration Controller

    // AUTHOR: des301

    global $act;
    global $msg;
    $total = 6;

    $act = (isset($_GET['act'])) ? $_GET['act'] : '';
    $msg = (isset($_GET['msg'])) ? $_GET['msg'] : '';

    switch ($act) {

	
	case 'confirm':
	    session_start();
	    $progress = 6;
	    include ('view/confirm.php');
	    session_destroy();
	    break;

	
	case 'submit':
	    // CODE HERE
	    include ('admin/model/create.php');
	    //header ('index.php&dir=admin&sub=create&act=confirm&msg=' . $msg);
	    break;

	
	case 'validate':
	    session_start();
	    $_SESSION['password'] = (isset($_GET['pw1'])) ? $_GET['pw1'] : '';
	    /*
	    $password1 = isset($_GET['pw1']) ? $_GET['pw1'] : '';
	    $password2 = isset($_GET['pw2']) ? $_GET['pw2'] : '';
	    /*
	    if ($password1 === $password2) {
		$_SESSION['password'] = $password;
	    } else {
		header ('location:index.php?act=setPassword&msg=Passwords Do Not Match');
	    }// end if-else
	    */
	    $progress = 5;
	    $act = 'confirm';
	    include ('view/validate.php');
	    break;

	case 'setPassword':
	    session_start();
	    $_SESSION['receive'] = isset($_GET['receive']) ? $_GET['receive'] : '';
	    $_SESSION['day'] = isset($_GET['day']) ? $_GET['day'] : '';
	    $_SESSION['eve'] = isset($_GET['eve']) ? $_GET['eve'] : '';
	    $_SESSION['wend'] = isset($_GET['wend']) ? $_GET['wend'] : '';
	    $_SESSION['age'] = isset($_GET['age']) ? $_GET['age'] : '';
	    $_SESSION['photo'] = isset($_GET['photo']) ? $_GET['photo'] : '';
	    $_SESSION['signature'] = isset($_GET['signature']) ? $_GET['signature'] : '';
	    $_SESSION['date'] = isset($_GET['date']) ? $_GET['date'] : '';
	    $email = $_SESSION['email'];
	    $act = 'validate';
	    $progress = 4;
	    include ('view/password.php');
	    break;
	
	
	case 'getOther':
	    session_start();
	    $_SESSION['interests'] = isset($_GET['interest']) ? $_GET['interest'] : '';

	    $progress = 3;
	    $act = 'setPassword';
	    include ('view/other.php');
	    break;

	
	case 'getInterests':
	    session_start();
	    $_SESSION['fname'] = isset($_GET['fname']) ? $_GET['fname'] : '';
	    $_SESSION['lname'] = isset($_GET['lname']) ? $_GET['lname'] : '';
	    $_SESSION['street'] = isset($_GET['street']) ? $_GET['street'] : '';
	    $_SESSION['city'] = isset($_GET['city']) ? $_GET['city'] : '';
	    $_SESSION['state'] = isset($_GET['state']) ? $_GET['state'] : '';
	    $_SESSION['zip'] = isset($_GET['zip']) ? $_GET['zip'] : '';
	    $_SESSION['phone'] = isset($_GET['phone']) ? $_GET['phone'] : '';
	    $_SESSION['email'] = isset($_GET['email']) ? $_GET['email'] : '';
	    $_SESSION['employer'] = isset($_GET['employer']) ? $_GET['employer'] : '';
	    $_SESSION['workPhone'] = isset($_GET['workPhone']) ? $_GET['workPhone'] : '';
	    $_SESSION['occupation'] = isset($_GET['occupation']) ? $_GET['occupation'] : '';
	    $_SESSION['cellPhone'] = isset($_GET['cellPhone']) ? $_GET['cellPhone'] : '';

	    $progress = 2;
	    $act = 'getOther';
	    include ('view/interests.php');
	    break;
	
	
	case 'getInfo':
	    
	    $lifetime = 30 * 60;// 60 seconds * 30 minutes = 1800 seconds
	    session_set_cookie_params($lifetime, '/');
	    session_start();
	
	    //if(isset($_COOKIE["PHPSESSID"])) {echo 'session started';}
	    
	    $progress = 1;
	    $act = 'getInterests';
	    include ('view/info.php');
	    break;


	default:
	    include ('view/register.php');
	    break;

    }// end switch

?>