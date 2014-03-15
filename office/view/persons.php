<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



	// TITLE: Office Persons View
	// FILE: office/view/persons.php
	// AUTHOR: jmh5819


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/default.css" >
		<link rel="stylesheet" href="css/nav.css" >
		<link rel="stylesheet" href="css/color.css" >
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"> 
				<style></style>
				<script></script>
	</head>
	<body>
		<div id="page">
			<header>
				<h1><a href="" class="brand"><span class="ackronymLetter">H</span>abitat <span class="ackronymLetter">O</span>perations <span class="ackronymLetter">M</span>anagement <span class="ackronymLetter">E</span>nvironment</a></h1>
				
			</header>
			<div id="body">
				<nav id="mainNav">
	<img style="margin-bottom: 15px;" src="img/habitat_logo2.jpg" alt="Habitat For Humanity Logo" />
	<ul class="nav nav-pills nav-stacked" style="max-width: 300px">
<li ><a href="index.php?dir=home">Home</a></li><li ><a href="index.php?dir=account" >Account</a></li><li ><a href="index.php?dir=admin">Admin</a></li><li class="active"><a href="index.php?dir=office" class="active">Office</a></li><nav id="subNav">
	<ul class="navList">
	<li class="subli"><a href="index.php?dir=office&sub=accounts">Accounts</a></li><li class="subli"><a href="index.php?dir=office&sub=donations">Donations</a></li><li class="subli"><a href="index.php?dir=office&sub=donor">Donors</a></li><li class="subli"><a href="index.php?dir=office&sub=event">Events</a></li><li class="subli"><a class="selected" href="index.php?dir=office&sub=foh">Friends of Habitat</a></li><li class="subli"><a href="index.php?dir=office&sub=person">Persons</a></li><li class="subli"><a href="index.php?dir=office&sub=interests">Interests</a></li><li class="subli"><a href="index.php?dir=office&sub=orgs">Organizations</a></li><li class="subli"><a href="index.php?dir=office&sub=projects">Projects</a></li><li class="subli"><a href="index.php?dir=office&sub=schedules">Schedules</a></li>	</ul>
</nav><li ><a href="index.php?dir=volunteer" >Volunteer</a></li>		<hr>
		<dl>
			<dt>EST</dt>
			<dd>09:14:10</dd>
			<dt>Client IP</dt>
			<dd>127.0.0.1</dd>
			<dt>Server IP</dt>
			<dd>127.0.0.1</dd>
		</dl>
    </ul>
	
    <hr>

</nav>								<div id="content">
					
<style> /* css */ 

input[type=submit] 
{
width: 150px;
height: 40px;
}

select
{
alignment: center;
}

#searchBy
{
width: 150px;
height: 30px;
alignment: bottom;
}

</style>

<h4>Persons Search</h4>

<script type="text/javascript" src="js/searchByHandler.js"></script>  <!-- I cant get this to work externally --> <!--This script changes the input boxes after drop down menu-->
<script type="text/javascript">
function searchByHandler() {

var show = "inline";
var hide = "none";

var v = document.getElementById("searchBy").value;
var i1 = document.getElementById("input1");
var i2 = document.getElementById("input2");

// city, street, address, amount, municipality, bank, organization, zip code
// mortgage number, interest, auction item, sponsor, event

//alert(v);

switch (v) {

   case "name":
i1.placeholder = "first name";
i2.placeholder = "last name";
i2.style.display = show;

   case "contact":
i1.placeholder = "first name";
i2.placeholder = "last name";
i2.style.display = show;
   break;

   case "organization":
i1.placeholder = "organization name";
i2.style.display = hide;
break;

case "event":
i1.placeholder = "event name";
i2.style.display = hide;
break;

   default:
i1.placeholder = "input 1";
i2.placeholder = "input 2";
i2.style.display = show;
break;

}// end switch

}// end function
</script>
<br><br/>
<form name="input" action="/habitat/office/model/persons.php" method="post"> <!-- view all button -->
<input type="submit" value="View All">
</form><br/>

<form name="input" action="/habitat/office/model/persons.php" method="post"> <!-- create new button -->
<input type="submit" value="Create New">
</form><br><br/>


<form class='searchBy' method="GET" action="index.php"> <!-- search by, drop down menu, and input boxes -->
   <input type="hidden" name="dir" value="office">
   <input type="hidden" name="sub" value="persons">
   <? <input type="hidden" name="act" value=""> ?> 
   <input name="searchBy" type="submit" value="Search By" action="/habitat/office/model/persons.php" method="post">

<select id="searchBy" name="searchBy" action="/habitat/office/model/persons.php" method="post" onclick='searchByHandler()'>
<option value="name" selected="selected" >Name</option>
<option value="Email" >Email</option>
<option value="Phone" >Phone</option>
<option value="ID Number" >ID Number</option>
</select>
<input id="input1" name="input1" placeholder="first name" type="text">
<input id="input2" name="input2" placeholder="last name" type="text">
<input id="input1" name="input1" placeholder="address" type="text">
</form><br><br/> 

<!--results can be listed here, pushing text down.-->



<br>
<h6>This view will allow you to search for Person by:
<br><br/>1. First and Last Name
<br>2. Email
<br>3. Phone
<br>4.ID Number 
<br><br/>
An administrator will be able to create new Person Account 
<h6/>
<br><br/>



<!-- end-->
				</div>
			</div>
			<!--<footer></footer>-->
		</div>
	</body>
</html>
