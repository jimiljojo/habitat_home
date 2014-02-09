<?php 

$UserName  = $_POST['username']; 
$PassWord  = $_POST['password']; 
$PassCheck = $_POST['passwordcheck']; 

$Connection = mysql_connect("localhost","root","root"); 
if (!$Connection) { 
  die ('Could not connect to database...'); 
  } 
mysql_select_db("homes_db", $Connection); 

$Get   = "SELECT Username FROM Accounts WHERE Username='$UserName'";
$Query = mysql_query($Get,$Connection); 
$Rows  = mysql_affected_rows($Query); 

mysql_close($Connection); 

if (strlen($UserName)>30  || empty($UserName)) { 
  echo 'Your username is either too long or you have not filled out the field.  Your username cannot be more that 30 characters.'; 
  } 
else if ($Rows > 0) { 
  echo 'Username is already taken.'; 
  }
else if (strlen($PassWord)>30 || empty($PassWord)) { 
  echo 'Your password is either too long or you have not filled out the field.  Your password cannot be more than 30 characters'; 
  } 
else if ($PassWord !== $PassCheck) { 
  echo 'The password fields do not match.  Please enter your password again.'; 
  } 
else { 

  mysql_query("INSERT INTO Users (Username, Password)  VALUES ('$UserName', '$PassWord')"); 
} 

mysql_close($Connection); 
?>