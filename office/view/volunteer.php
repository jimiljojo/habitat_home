<?php

// TITLE: Office Accounts View
// FILE: office/view/accounts.php
// AUTHOR: Martin Arabi; mva5164


?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>

	<link rel="stylesheet" href="css/alpha.css"><link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Ubuntu">	
	    <style>
		    body {font-family: 'Ubuntu', sans-serif;}
	    </style>
	<script src="https://www.google.com/jsapi"></script><script src="js/googleChart.js"></script><script src="js/omniload.js"></script><script src="js/swap.js"></script><script src="js/searchBy.js"></script>

        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap-responsive.css"> 
        <script type="text/javascript" src="plugins/bootstrap/js/bootstrap.js"></script>

       

    </head>	<body><!--onload="omniload()"-->
       

    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <div class="container">
	    <a href="" class="brand"><span class="ackronymLetter">H</span>abitat <span class="ackronymLetter">O</span>perations <span class="ackronymLetter">M</span>anagement <span class="ackronymLetter">E</span>nvironment</a>
	    <!--<a href="" class="brand"><span class="ackronymLetter">H</span>abitat <span class="ackronymLetter">E</span>nterprise <span class="ackronymLetter">R</span>esource <span class="ackronymLetter">P</span>roduction <span class="ackronymLetter">E</span>nvironment <span class="ackronymLetter">S</span>ystem</a>-->
              <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
              <!--<a href="/index.php" class="brand">Habitat For Humanity</a>-->
              <!-- Be sure to leave the brand out there if you want it shown -->
              <!-- Everything you want hidden at 940px or less, place within here -->
              <div class="nav-collapse collapse">
                <!-- .nav, .navbar-search, .navbar-form, etc -->
		<a href="index.php?dir=home&sub=logout" class="navbar-text pull-right logout"><span style="color: white;">Logout</span></a>
              </div>
           </div>
	    
       </div>
    </div>

        <nav>
	<img style="margin-bottom: 15px;" src="img/habitat_logo2.jpg" alt="Habitat For Humanity Logo" />
	<ul class="nav nav-list">
<li ><a href="index.php?dir=home">Home</a></li><li ><a href="index.php?dir=account" >Account</a></li><li ><a href="index.php?dir=admin">Admin</a></li><li class="active"><a href="index.php?dir=office" class="active">Office</a></li><ul class="nav nav-list">
    <li class="subli"><a href="index.php?dir=office&sub=account">Accounts</a></li><li class="subli"><a href="index.php?dir=office&sub=donation">Donations</a></li><li class="subli"><a href="index.php?dir=office&sub=donor">Donors</a></li><li class="subli"><a href="index.php?dir=office&sub=event">Events</a></li><li class="subli"><a href="index.php?dir=office&sub=foh">Friends Of Habitat</a></li><li class="subli"><a href="index.php?dir=office&sub=homeowner">Homeowners</a></li><li class="subli"><a href="index.php?dir=office&sub=interest">Interests</a></li><li class="subli"><a href="index.php?dir=office&sub=organization">Organizations</a></li><li class="subli"><a href="index.php?dir=office&sub=project">Projects</a></li><li class="subli"><a href="index.php?dir=office&sub=schedule">Schedules</a></li><li class="subli"><a " class="subaselected" href="index.php?dir=office&sub=volunteer">Volunteers</a></li>    <li class="divider"></li>
</ul>

<li ><a href="index.php?dir=donor" >Donor</a></li><li ><a href="index.php?dir=homeowner" >Homeowner</a></li><li ><a href="index.php?dir=volunteer" >Volunteer</a></li>	<hr>
	<dl>
	    <dt>GMT</dt>
	    <dd>06:08:47</dd>
	    <dt>Client IP</dt>
	    <dd>75.102.119.53</dd>
	    <dt>Server IP</dt>
	    <dd>31.170.162.163</dd>
	</dl>
    </ul>

</nav>
        <div id="content">
	    <h4>Volunteer Search</h4>
<hr>
<button type="Submit" onclick="window.location='index.php?dir=office&sub=volunteer&act=listVolunteer';">View All</button><form method="GET" action="index.php">
    <input type="hidden" name="dir" value="office" >
    <input type="hidden" name="sub" value="volunteer" >
    <input type="hidden" name="act" value="" >
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

<button type="Submit" onclick="alert(msg);">Create New</button><!--
<button type="Submit" onclick="window.location=\'index.php?dir=&act=newVolunteer\';">Create New</button>
-->
<hr>
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
