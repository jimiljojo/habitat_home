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
    $fname = isset($_SESSION['fname']) ? $_SESSION['fname'] : 'null';
    $lname = isset($_SESSION['lname']) ? $_SESSION['lname'] : 'null';
    $street = isset($_SESSION['street']) ? $_SESSION['street'] : 'null';
    $city = isset($_SESSION['city']) ? $_SESSION['city'] : 'null';
    $state = isset($_SESSION['state']) ? $_SESSION['state'] : 'null';
    $zip = isset($_SESSION['zip']) ? $_SESSION['zip'] : 'null';
    $phone = isset($_SESSION['phone']) ? $_SESSION['phone'] : 'null';
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : 'null';
    $employer = isset($_SESSION['employer']) ? $_SESSION['employer'] : 'null';
    $workPhone = isset($_SESSION['workPhone']) ? $_SESSION['workPhone'] : 'null';
    $occupation = isset($_SESSION['occupation']) ? $_SESSION['occupation'] : 'null';
    $cellPhone = isset($_SESSION['cellPhone']) ? $_SESSION['cellPhone'] : 'null';
    
    // $interests = isset($_SESSION['interests']) ? $_SESSION['interests'] : 'null';

    $interests=isset($_SESSION['interest']) ? $_SESSION['interest'] : 'NotWorking';
   /* $items = array();
                foreach($interests as $username) {
                $items[] = $username;
                }
    
    */
    $receive = isset($_SESSION['receive']) ? $_SESSION['receive'] : 'null';
    $day = isset($_SESSION['day']) ? $_SESSION['day'] : 'null';
    $eve = isset($_SESSION['eve']) ? $_SESSION['eve'] : 'null';
    $wend = isset($_SESSION['wend']) ? $_SESSION['wend'] : 'null';
    $age = isset($_SESSION['age']) ? $_SESSION['age'] : 'null';
    $photo = isset($_SESSION['photo']) ? $_SESSION['photo'] : 'null';
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
    echo 'first name: ' . $fname . '<br>';
    echo 'last name: ' . $lname . '<br>';
    echo 'street: ' . $street . '<br>';
    echo 'city: ' . $city . '<br>';
    echo 'state: ' . $state . '<br>';
    echo 'zip: ' . $zip . '<br>';
    echo 'phone: ' . $phone . '<br>';
    echo 'email: ' . $email . '<br>';
    echo 'employer: ' . $employer . '<br>';
    echo 'work phone: ' . $workPhone . '<br>';
    echo 'occupation: ' . $occupation . '<br>';
    echo 'cell phone: ' . $cellPhone . '<br><br><br>';

    echo '<b>Interests:</b><br>';
    //foreach ($items as $i) {
    foreach ($interests as $i) {
    
                echo $i.'<br>';
                
                }
    
    
    ?>
    
    
    
    <?php
    echo '<br><br><b>Preferences:</b><br>';
    echo 'receive: ' . $receive . '<br>';
    echo 'day: ' . $day . '<br>';
    echo 'eve: ' . $eve . '<br>';
    echo 'weekend: ' . $wend . '<br>';
    echo 'age: ' . $age . '<br>';
    echo 'photo: ' . $photo . '<br>';
    echo 'signature: ' . $signature . '<br>';
    echo 'date: ' . $date . '<br>';
?>
    <br>
    <input class="btn btn-success" name="submit" type="submit" value="submit" >
    <br>
</form>
<br>
<hr>