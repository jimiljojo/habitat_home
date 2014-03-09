<?php

	// TITLE: Office Interests View
	// FILE: office/view/interests.php
	// AUTHOR: Brandon Willis; bmw5285


?>

<style> /* css */ 

	input[type=submit] 
	{
		width: 125px;
		height: 40px;
	}
	
	select
	{
		alignment: center;
	}
	
	#searchBy
	{
		width: 125px;
		height: 30px;
		alignment: bottom;
	}
	
</style>

<h4>Interests Search</h4>
<hr>

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
	    case "contact":
	    case "donor":
			i1.placeholder = "first name";
			i2.placeholder = "last name";
			i2.style.display = show;
		break;

	    case "amount":
			i1.placeholder = "low amount";
			i2.placeholder = "high amount";
			i2.style.display = show;
		break;
	    
	    case "date":
			i1.placeholder = "month";
			i2.placeholder = "year";
			i2.style.display = show;
		break;
		
	    case "bank":
	    case "city":
	    case "municipality":
	    case "organization":
	    case "sponsor":
	    case "street":
			i1.placeholder = v + " name";
			i2.placeholder = "not used";
			i2.style.display = hide;
		break;
	    
	    case "state":
			i1.placeholder = v + " abbreviation";
			i2.placeholder = v + " name";
			i2.style.display = show;
		break;

	    case "zip":
			i1.placeholder = v + " code";
			i2.placeholder = "not used";
			i2.style.display = hide;
		break;
	
	    case "address":
			i1.placeholder = "street";
			i2.placeholder = "zip code";
			i2.style.display = show;
		break;
		
	    case "mortgage":
			i1.placeholder = v + " number";
			i2.placeholder = "not used";
			i2.style.display = hide;
		break;
		
		case "interest":
			i1.placeholder = "interest";
			i2.placeholder = "not used";
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

<form name="input" action="/habitat/office/model/interests.php" method="post"> <!-- view all button -->
	<input type="submit" value="View All">
</form><br>

<form class='searchBy' method="GET" action="index.php"> <!-- search by, drop down menu, and input boxes -->
    <input type="hidden" name="dir" value="office">
    <input type="hidden" name="sub" value="interests">
    <input type="hidden" name="act" value="">
    <input name="searchBy" type="submit" value="Search By" action="/habitat/office/model/interests.php" method="post">
	
	<select id="searchBy" name="searchBy" action="/habitat/office/model/interests.php" method="post" onclick='searchByHandler()'>
		<option value="name" selected="selected" >Name</option>
		<option value="interest" >Interest</option>
	</select>
		<input id="input1" name="input1" placeholder="first name" type="text">
		<input id="input2" name="input2" placeholder="last name" type="text">
</form><br> <!-- end-->

<form name="input" action="/habitat/office/model/interests.php" method="post"> <!-- create new button -->
	<input type="submit" value="Create New">
</form>
