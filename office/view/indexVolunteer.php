<?php

// TITLE: Office Accounts View
// FILE: office/view/indexVolunteer.php
// AUTHOR: 


?>

<script>

function shitTheBed() {
	var shit = document.getElementById("searchBy").value;
	switch (shit) {
		case "name":
			document.getElementById("input1").placeholder="first name";
			document.getElementById("input1").style.display="inline";
			document.getElementById("input2").placeholder="last name";
			document.getElementById("input2").style.display="inline";
			break;
		case "phone number":
			document.getElementById("input1").placeholder="555-555-5555";
			document.getElementById("input1").style.display="inline";
			document.getElementById("input2").placeholder="bed";
			document.getElementById("input2").style.display="none";
			break;
	}
}

</script>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>

		
	   
        <script type="text/javascript" src="plugins/bootstrap/js/bootstrap.js"></script>

       

    </head>	
    <body><!--onload="omniload()"-->
       

<div id="content">
	<h2>Volunteer Search</h2>
<hr>
<!-- back button -->
<button type="Submit" onclick="window.location='index.php?dir=office&sub=volunteer&act=listVolunteer';">
    View All</button>
    
   <!-- start form --> 
    
<form method="GET" action="index.php">
    <input type="hidden" name="dir" value="office" >
    <input type="hidden" name="sub" value="volunteer" >
    <input type="hidden" name="act" value="search" >
    <input name="search" type="submit" value="Search By">
    <select id="searchBy" name="searchBy" onchange="shitTheBed();">
	<option value="name" selected="selected">Name</option>
	<option value="phone number">Phone Number</option>
	
    </select>
    <input id="input1" name="input1" placeholder="first name" type="text">
    <input id="input2" name="input2" placeholder="last name" type="text">
</form>

<form name="input" action="index.php" method="get"> 
	<input name="dir" type="hidden" value="<?php echo $dir; ?>" >
	<input name="sub" type="hidden" value="<?php echo $sub; ?>" >
	<input name="act" type="hidden" value="create" >
	<input type="submit" value="Create New">
</form>

<!-- end form -->
<br><br/>
<hr>
 
 <!-- information text -->
<div>
    Here you can search for a volunteer by:
    <ul>
        <li>Volunteer Name</li>
        <li>Phone Number</li>
        
    </ul>
    Only an administrator will be able to create a new volunteer
    <br>
</div>        </div>
    </div>
    </body>	<footer>
	2014 <span class="habitatBlue">|</span> York Habitat for Humanity
	</footer>
</html>








<!-- end-->
