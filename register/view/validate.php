<?php
    
    // FILE: Registration Validation Page
    // AUTHOR: des301
/*
    echo isset($_SESSION['fname']) ? 1 : 0;
    echo isset($_SESSION['lname']) ? 1 : 0;
    echo isset($_SESSION['street']) ? 1 : 0;
    echo isset($_SESSION['city']) ? 1 : 0;
    echo isset($_SESSION['state']) ? 1 : 0;
    echo isset($_SESSION['zip']) ? 1 : 0;
    echo isset($_SESSION['phone']) ? 1 : 0;
    echo isset($_SESSION['email']) ? 1 : 0;
    echo isset($_SESSION['employer']) ? 1 : 0;
    echo isset($_SESSION['workPhone']) ? 1 : 0;
    echo isset($_SESSION['occupation']) ? 1 : 0;
    echo isset($_SESSION['cellPhone']) ? 1 : 0;
    
    echo isset($_SESSION['interests']) ? 1 : 0;
    
    echo isset($_SESSION['receive']) ? 1 : 0;
    echo isset($_SESSION['day']) ? 1 : 0;
    echo isset($_SESSION['eve']) ? 1 : 0;
    echo isset($_SESSION['wend']) ? 1 : 0;
    echo isset($_SESSION['age']) ? 1 : 0;
    echo isset($_SESSION['photo']) ? 1 : 0;
    echo isset($_SESSION['signature']) ? 1 : 0;
    echo isset($_SESSION['date']) ? 1 : 0;

*/

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
    $emergencyname = isset($_SESSION['emergencyname']) ? $_SESSION['emergencyname'] : 'null';
    $emergencyphone = isset($_SESSION['emergencyphone']) ? $_SESSION['emergencyphone'] : 'null';
    $maritial = isset($_SESSION['maritial']) ? $_SESSION['maritial'] : 'null';
    
    // $interests = isset($_SESSION['interests']) ? $_SESSION['interests'] : 'null';

    $interests=isset($_SESSION['interest']) ? $_SESSION['interest'] : 'NotWorking';
   /* $items = array();
                foreach($interests as $username) {
                $items[] = $username;
                }
    
    */
    $church = isset($_SESSION['church']) ? $_SESSION['church'] : 'null';
    $ambassador = isset($_SESSION['ambassador']) ? $_SESSION['ambassador'] : 'null';
    $checkPhone = isset($_SESSION['checkPhone']) ? $_SESSION['checkPhone'] : 'null';
    $checkMail = isset($_SESSION['checkMail']) ? $_SESSION['checkMail'] : 'null';
    $checkEmail = isset($_SESSION['checkEmail']) ? $_SESSION['checkEmail'] : 'null';

    $day = isset($_SESSION['day']) ? $_SESSION['day'] : 'null';
    $eve = isset($_SESSION['eve']) ? $_SESSION['eve'] : 'null';
    $wend = isset($_SESSION['wend']) ? $_SESSION['wend'] : 'null';
    $age = isset($_SESSION['age']) ? $_SESSION['age'] : 'null';
    $photo = isset($_SESSION['photo']) ? $_SESSION['photo'] : 'null';
    $safety = isset($_SESSION['safety']) ? $_SESSION['safety'] : 'null';
    $video = isset($_SESSION['video']) ? $_SESSION['video'] : 'null';
    $waiver = isset($_SESSION['waiver']) ? $_SESSION['waiver'] : 'null';
    $signature = isset($_SESSION['signature']) ? $_SESSION['signature'] : 'null';
    $date = isset($_SESSION['date']) ? $_SESSION['date'] : 'null';

?>
<h4>Please validate your info</h4>
<br/>
<?php include 'progress.php'; ?>
<hr>
<form  action="index.php" method="get">
    <input name="act" type="hidden" value="<?php echo '' . $act;?>" >
<?php
    echo '<b>Personal Information:</b><br>';
    echo 'Title:' .$title . '<br>';
    echo 'first name: ' . $fname . '<br>';
    echo 'last name: ' . $lname . '<br>';
    echo 'Date of Birth:'.$dob.'<br>';
    echo 'Gender:'.$gender.'<br>';

    echo '<b>Address:</b><br>';
    echo 'Street1: ' . $street1 . '<br>';
    echo 'Street2:'.$street2.'<br>';
    echo 'City: ' . $city . '<br>';
    echo 'State: ' . $state . '<br>';
    echo 'Zip: ' . $zip . '<br>';

    echo '<b>Contact Information:</b><br>';
    echo 'Phone: ' . $phone . '<br>';
    echo 'Sec. Phone:'.$phone2.'&nbsp &nbsp ext. :'.$extension.'<br>';
    echo 'Email Address: ' . $email . '<br>';
    echo 'Emergency Contact Name: ' . $emergencyname . '<br>';
    echo 'Emergency Contact Phone: ' . $emergencyphone . '<br>';
    $maritialstatus=$dbio->getMaritialStatus($maritial);


    echo '<b>Maritial Status:</b> ' . $maritialstatus . '<br>';
     '<br><br><br>';

    
    //Displaying Interest
    echo '<br><b>Interests:</b><br>';
    //foreach ($items as $i) {
    
    $count=1;
    $interestIds='';
    foreach ($interests as $i) {
                
                If($count==1){
                $interestIds= $interestIds . $i;
                }

                else{
                   $interestIds= $interestIds . ',' . $i; 
                }

                $count++;
                }

    $selectedInterests = $dbio->getInterestsByIds($interestIds);
    foreach($selectedInterests as $int){
        echo $int->getTitle().'<br>';
    }

    ?>
    
    
    
    <?php
    echo '<b>General Information:</b><br>';
    echo 'Church or Group Affiliate: '.$church.'<br>';
    echo 'Are you a Church Ambassador? &nbsp &nbsp'.$ambassador.'<br>';

    echo '<b>Contact Preference:</b><br>';
    echo $checkPhone.'<br>';
    echo $checkMail.'<br>';
    echo $checkEmail.'<br>';

    echo '<b>Volunteer Availability</b><br>I am available to volunteer in:<br>';
    if($day=="on"){
        echo 'day <br>';
    }

    if($eve=="on"){
        echo 'eve <br>';
    }
    
    if($wend=="on"){
        echo 'weekend <br>';
    }
    

    echo '<b>Consent</b><br>';
    if($age=="1"){
        echo 'I am Less than 18 years of age and have read the <a href="http://www.yorkhabitat.org/TDE_CMS/database/userfiles/file/2013/YorkHabitatMinorWaiverRelease.pdf" target="_blank">Minor Waiver</a><br>';
    }

    else{
    echo 'I am Greater than 18 years of age <br>';
    }

    if($photo=="1"){
    echo 'I understand a personal photograph may be used in appropriate newspapers and/or newsletters. <br>';
    }   

    echo 'I have read the <a href="http://www.yorkhabitat.org/TDE_CMS/database/userfiles/file/2013/ConstructionSafety.pdf" target="_blank">Construction Safety Guidelines</a> <br>';
    echo 'I have watched the <a href="http://www.yorkhabitat.org/TDE_CMS/database/userfiles/file/ConstructionVideo.html" target="_blank">Construction Safety Video</a> <br>';
    echo 'I accept the terms of the <a href="http://www.yorkhabitat.org/TDE_CMS/database/userfiles/file/waiverform20120711.pdf" target="_blank">Liability Waiver Form</a> <br>';
    echo '<br><br><b>Signature:</b> ' . $signature . '<br>';
    echo '<b>Date:</b> ' . $date . '<br>';
?>
    <br>
    <input class="btn btn-success" name="submit" type="submit" value="submit" >
    <br>
</form>
<br>
<hr>