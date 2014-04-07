<?php
	
	// FILE: Registration Review View
	// AUTHOR: sbkedia

	global $dir;
	global $sub;
	global $act;
	global $msg;
	global $total;
	global $dbio;

    $title = isset($_SESSION['title']) ? $_SESSION['title'] : 'null';
    $fname = isset($_SESSION['fname']) ? $_SESSION['fname'] : 'null';
    $lname = isset($_SESSION['lname']) ? $_SESSION['lname'] : 'null';
    $dob = isset($_SESSION['dob']) ? $_SESSION['dob'] : 'null';
    $gender = isset($_SESSION['gender']) ? $_SESSION['gender'] : 'null';
    $street1 = isset($_SESSION['street1']) ? $_SESSION['street1'] : 'null';
    $street2 = isset($_SESSION['street2']) ? $_SESSION['street2'] : 'null';
    $city = isset($_SESSION['city']) ? $_SESSION['city'] : 'null';
    $state = isset($_SESSION['state']) ? $_SESSION['state'] : 'null';
    $zip = isset($_SESSION['zip']) ? $_SESSION['zip'] : 'null';
    $phone = isset($_SESSION['phone']) ? $_SESSION['phone'] : 'null';
    $phone2 = isset($_SESSION['phone2']) ? $_SESSION['phone2'] : 'null';
    $extension = isset($_SESSION['extension']) ? $_SESSION['extension'] : 'null';
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : 'null';
    $emergencyName = isset($_SESSION['emergencyname']) ? $_SESSION['emergencyname'] : 'null';
    $emergencyPhone = isset($_SESSION['emergencyphone']) ? $_SESSION['emergencyphone'] : 'null';
    $maritial = isset($_SESSION['maritial']) ? $_SESSION['maritial'] : 'null';
    
    $interestIds=isset($_SESSION['interest']) ? $_SESSION['interest'] : 'NotWorking';
    
    $affiliation = isset($_SESSION['church']) ? $_SESSION['church'] : 'null';
    $churchAmbassador = isset($_SESSION['ambassador']) ? $_SESSION['ambassador'] : 'null';
    $organization = isset($_SESSION['organization']) ? $_SESSION['organization'] : 'null';
    $checkPhone = isset($_SESSION['checkPhone']) ? $_SESSION['checkPhone'] : 0;
    $checkMail = isset($_SESSION['checkMail']) ? $_SESSION['checkMail'] : 0;
    $checkEmail = isset($_SESSION['checkEmail']) ? $_SESSION['checkEmail'] : 0;

    $availDay = isset($_SESSION['day']) ? $_SESSION['day'] : 'null';
    $availEve = isset($_SESSION['eve']) ? $_SESSION['eve'] : 'null';
    $availWend = isset($_SESSION['wend']) ? $_SESSION['wend'] : 'null';
    $age = isset($_SESSION['age']) ? $_SESSION['age'] : 'null';	
    $consentPhoto = isset($_SESSION['photo']) ? $_SESSION['photo'] : 'null';
    $consentSafety = isset($_SESSION['safety']) ? $_SESSION['safety'] : 'null';
    $consentVideo = isset($_SESSION['video']) ? $_SESSION['video'] : 'null';
    $consentWaiver = isset($_SESSION['waiver']) ? $_SESSION['waiver'] : 'null';
    $signature = isset($_SESSION['signature']) ? $_SESSION['signature'] : 'null';
    $date = isset($_SESSION['date']) ? $_SESSION['date'] : 'null';

    $userName=$_SESSION['userName'];
    $password=$_SESSION['password'];

 	if($age=="1"){
    	$consentAge=0;
    	$consentMinor=1;
    }	
    else{
    	$consentAge=1;
    	$consentMinor=0;
    }
    

    $flag=$dbio->createNewPerson($street1,$street2,$city,$state,$zip,$phone,$email,$phone2,$extension,$title,$fname,$lname,$gender,$dob,$maritial,$checkEmail,$checkMail,$checkPhone);
    

    if($flag){
        $flag2=$dbio->createNewAccount($consentAge, $consentVideo , $consentWaiver, $consentPhoto , $availDay , $availEve, $availWend, $consentMinor, $consentSafety, $emergencyName, $emergencyPhone, $churchAmbassador, $affiliation,$interestIds, $userName, $password);
    }

    $dbio->createNewOrganization($organization);
    //session_destroy();
?>
	<h4>Confirmation</h4>
	<?php include 'progress.php'; ?>
	<hr>
	<br>
	<form name="index" action="get">
	    <h2>You have registered!</h2>
	    <p>
	    An administrator must review and authorize your account in order for it to be activated<br>
	    and for you to be able to log in.
	    </p>		
	    <a href="../index.php">Home</a>
	</form>
	<br>
	<hr>
