<?php

// TITLE: Office Accounts View
// FILE: office/view/indexVolunteer.php
// AUTHOR: rwg5215


?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>

		
	    <style>
		    
	    </style>
	<script src="https://www.google.com/jsapi"></script><script src="js/googleChart.js"></script><script src="js/omniload.js"></script><script src="js/swap.js"></script><script src="js/searchBy.js"></script>

        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap-responsive.css"> 
        <script type="text/javascript" src="plugins/bootstrap/js/bootstrap.js"></script>

       

    </head>	
    <body><!--onload="omniload()"-->
       

<div id="content">
	<h2>Volunteer Search</h2>
<hr>
<button type="Submit" onclick="window.location='index.php?dir=office&sub=volunteer&act=listVolunteer';">
    View All</button>
<form method="GET" action="index.php">
    <input type="hidden" name="dir" value="office" >
    <input type="hidden" name="sub" value="volunteer" >
    <input type="hidden" name="act" value="search" >
    <input name="search" type="submit" value="Search By">
    <select id="searchBy" name="searchBy" onchange="searchByHandler();">
	<option value="name" selected="selected">Name</option>
	<option value="organization">Organization</option>
	<option value="street">Street</option>
	<option value="city">City</option>
    </select>
    <input id="input1" name="input1" placeholder="first name" type="text">
    <input id="input2" name="input2" placeholder="last name" type="text">
</form>
<script>
    var msg = "This part is under construction"
</script>


<button type="Submit" onclick="window.location='index.php?dir=office&sub=volunteer&act=editVolunteer';">Create New</button>
<hr><!--
<form name="input" action="register/index.php" method="get"> <!-- create new button -->
<!--<input type="submit" value="Create New">
</form><br><br/>  -->

<div>
    Here you can search for a volunteer by:
    <ul>
        <li>Volunteer Name</li>
        <li>Organization</li>
        <li>Street Address</li>
        <li>City</li>
    </ul>
    Only an administrator will be able to create a new volunteer
    <br>
</div>        </div>
    </div>
    </body>	<footer>
	2014 <span class="habitatBlue">|</span> York Habitat for Humanity
	</footer>
</html>
<!-- Hosting24 Analytics Code -->
<script type="text/javascript" src="http://stats.hosting24.com/count.php"></script>
<!-- End Of Analytics Code -->







<!-- end-->
