<?php

// TITLE: Office Donations View
// FILE: office/view/donations.php
// AUTHOR: Martin Arabi; mva5164


?>

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

<h4>Donations Search</h4>

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
case "donor":
i1.placeholder = "first name";
i2.placeholder = "last name";
i2.style.display = show;
break;
   
   case "organization":
i1.placeholder = "organization name";
i2.style.display = hide;
break;

case "amount":
i1.placeholder = "low amount";
i2.placeholder = "high amount";
i2.style.display = show;
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
<form name="input" action="/habitat/office/model/donations.php" method="post"> <!-- view all button -->
<input type="submit" value="View All">
</form><br/>

<form name="input" action="/habitat/office/model/donations.php" method="post"> <!-- create new button -->
<input type="submit" value="Create New">
</form><br><br/>


<form class='searchBy' method="GET" action="index.php"> <!-- search by, drop down menu, and input boxes -->
   <input type="hidden" name="dir" value="office">
   <input type="hidden" name="sub" value="donations">
   <input type="hidden" name="act" value="">
   <input name="searchBy" type="submit" value="Search By" action="/habitat/office/model/donations.php" method="post">

<select id="searchBy" name="searchBy" action="/habitat/office/model/donations.php" method="post" onclick='searchByHandler()'>
<option value="name" selected="selected" >Name</option>
<option value="donor" >Donor</option>
<option value="organization" >Organization</option>
<option value="amount" >Amount</option>
</select>
<input id="input1" name="input1" placeholder="first name" type="text">
<input id="input2" name="input2" placeholder="last name" type="text">
</form><br><br/> 


<!--results can be listed here, pushing text down.-->


<br>
<h6>Here is where you can search for a specific donation by:
<br><br/>1. First and Last Name
<br>2. Donor Name
<br>3. Organization Name
<br>4. Amount
<br><br/>
To enter a donation for/towards a project, you must go to Project section and click add donation.
<h6/>
<br><br/>


<!-- end-->
