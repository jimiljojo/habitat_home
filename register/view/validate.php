<?php
    
    // FILE: Registration Validation Page
    // AUTHOR: des301

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
    

    $interests=isset($_SESSION['interest']) ? $_SESSION['interest'] : 'NotWorking';
    
    $church = isset($_SESSION['church']) ? $_SESSION['church'] : 'null';
    $ambassador = isset($_SESSION['ambassador']) ? $_SESSION['ambassador'] : 'null';
    $organization = isset($_SESSION['organization']) ? $_SESSION['organization'] : 'null';
    $checkPhone = isset($_SESSION['checkPhone']) ? $_SESSION['checkPhone'] : '0';
    $checkMail = isset($_SESSION['checkMail']) ? $_SESSION['checkMail'] : '0';
    $checkEmail = isset($_SESSION['checkEmail']) ? $_SESSION['checkEmail'] : '0';

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
    $userName = isset($_SESSION['userName']) ? $_SESSION['userName'] : 'null';
    $password = isset($_SESSION['pw1']) ? $_SESSION['pw1'] : 'null';

?>


<h4>Please validate your info</h4>
<br/>
<?php include 'progress.php'; ?>
<hr>
<form  action="index.php" method="get">
    <input name="act" type="hidden" value="<?php echo '' . $act;?>" >
    <table>
        
        <tr><td><b>Username:</td><td> <?php echo $userName ?> </td></tr>

        <tr><td><b>Personal Information:<b></td></tr>
        <tr><td>Title:</td><td> <input type="text" value="<?php echo $title ?>"></td></tr>
        <tr><td>First Name:</td><td> <input type="text" value="<?php echo $fname ?>"></td></tr>
        <tr><td>Last Name:</td><td> <input type="text" value="<?php echo $lname ?>"></td></tr>
        <tr><td>Date of Birth:</td><td> <input type="text" value="<?php echo $dob ?>"></td></tr>
        <tr><td>Gender:</td><td> <input type="text" value="<?php echo $gender ?>"></td></tr>

        <tr><td><b>Address:</b></td></tr>
        <tr><td>Street 1:</td><td> <input type="text" value="<?php echo $street1 ?>"></td></tr>
        <tr><td>Street2:</td><td> <input type="text" value="<?php echo $street2 ?>"></td></tr>
        <tr><td>City:</td><td> <input type="text" value="<?php echo $city ?>"></td></tr>
        <tr><td>State:</td><td> <input type="text" value="<?php echo $state ?>"></td></tr>
        <tr><td>Zip:</td><td> <input type="text" value="<?php echo $zip ?>"></td></tr>

        <tr><td><b>Contact Information:</b></td></tr>
        <tr><td>Phone:</td><td> <input type="text" value="<?php echo $phone ?>"></td></tr>
        <tr><td>Sec. Phone:</td><td> <input type="text" value="<?php echo $phone2 ?>"></td><td>&nbsp ext.</td><td><input type="text" value="<?php echo $extension ?>"></td></tr>
        <tr><td>Email Address:</td><td> <input type="text" value="<?php echo $email ?>"></td></tr>
        <tr><td>Emergency Contact Name:</td><td> <input type="text" value="<?php echo $emergencyname ?>"></td></tr>
        <tr><td>Emergency Contact Phone:</td><td> <input type="text" value="<?php echo $emergencyphone ?>"></td></tr>

        <?php $maritialstatus=$dbio->getMaritialStatus($maritial); ?>
        <tr><td><b>Maritial Status: </b></td><td> <?php echo $maritialstatus ?> </td></tr><br>

        <br><tr><td><b>Interests:</b></td></tr>

    </table>
        <?php
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

    <table>
        <tr><td><b>General Information:</b></td></tr>
        <tr><td>Church or Group Affiliate:</td><td> <input type="text" value="<?php echo $church ?>"></td></tr>
        <tr><td>Are you a Church Ambassador?</td><td> <input type="text" value="<?php if($ambassador=="1"){echo 'Yes';} else{echo 'No';} ?>"></td></tr>
        <tr><td>Organization Affiliation</td><td> <input type="text" value="<?php echo $organization ?>"></td></tr>
        <br><br><tr><td><b>Contact Preference:</b></td></tr>
    </table>

        <?php

            if($checkPhone=="1"){
            echo 'Phone <br>';
            }

            if($checkMail=="1"){
            echo 'Mail <br>';
            }
        
            if($checkEmail=="1"){
            echo 'Email <br>';
            }
        ?>

        
    <table>
        <br><tr><td><b>Volunteer Availability:</b></td></tr>
        <tr><td>I am available to volunteer in :-</td></tr>
    </table>
        <?php

            if($day=="1"){
            echo 'day <br>';
            }

            if($eve=="1"){
            echo 'evening <br>';
            }
        
            if($wend=="1"){
            echo 'weekend <br>';
            }

        ?>
        

    <table>
        <br><tr><td><b>Consent:</b></td></tr>
    </table>

    <?php

        if($age=="1"){
        echo 'I am Less than 18 years of age and have read the <a href="http://www.yorkhabitat.org/TDE_CMS/database/userfiles/file/2013/YorkHabitatMinorWaiverRelease.pdf" target="_blank">Minor Waiver</a><br>';
        }

        else{
        echo 'I am Greater than 18 years of age <br>';
        } 

        echo 'I understand a personal photograph may be used in appropriate newspapers and/or newsletters. <br>';
        echo 'I have read the <a href="http://www.yorkhabitat.org/TDE_CMS/database/userfiles/file/2013/ConstructionSafety.pdf" target="_blank">Construction Safety Guidelines</a> <br>';
        echo 'I have watched the <a href="http://www.yorkhabitat.org/TDE_CMS/database/userfiles/file/ConstructionVideo.html" target="_blank">Construction Safety Video</a> <br>';
        echo 'I accept the terms of the <a href="http://www.yorkhabitat.org/TDE_CMS/database/userfiles/file/waiverform20120711.pdf" target="_blank">Liability Waiver Form</a> <br>';
        

    ?>

    <table>
        <tr><td>Signature:</td><td><input type="text" value="<?php echo $signature ?>"></td></tr><br>
        <br><tr><td>Date:</td><td><input type="text" value="<?php echo $date ?>" disabled="disabled"></td></tr>
    </table>



    


        


    




    <br>
    <input class="btn btn-success" name="submit" type="submit" value="submit" >
    <br>
</form>
<br>
<hr>