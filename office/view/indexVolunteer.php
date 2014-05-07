<?php

// TITLE: Office Accounts View
// FILE: office/view/indexVolunteer.php
// AUTHOR: 


?>
<style> /* css */ 

button, input[type=submit] 
{
width: 150px;
height: 40px;
}

select
{
alignment: center;
}

#viewAll, #searchBy
{
width: 150px;
height: 30px;
alignment: bottom;
}
div.vol
{
width:800px;
}

</style>

<script>

function switchDropDown() {
	var change = document.getElementById("searchBy").value;
	switch (change) {
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
<div class="vol">
	<h2>Volunteer Search</h2>
<hr>

<button type="submit" onclick="window.location='index.php?dir=office&sub=volunteer&act=listVolunteer';">
    View All</button>
<br>
<form class="vol" method="GET" action="index.php">
    <input type="hidden" name="dir" value="office" >
    <input type="hidden" name="sub" value="volunteer" >
    <input type="hidden" name="act" value="search" >
<br>
    <input name="search" type="submit" value="Search By">
		<select id="searchBy" name="searchBy" onchange="switchDropDown();">
			<option value="name" selected="selected">Name</option>
			<option value="phone number">Phone Number</option>
		</select>
    <input id="input1" name="input1" placeholder="first name" type="text">
    <input id="input2" name="input2" placeholder="last name" type="text">
</form>
<br>
<form class="vol" name="input" action="index.php" method="get"> 
	<input name="dir" type="hidden" value="<?php echo $dir; ?>" >
	<input name="sub" type="hidden" value="<?php echo $sub; ?>" >
	<input name="act" type="hidden" value="create" >
	<input type="submit" value="Create New">
</form>
</div><br><br>
<hr>

    <h5>Here you can search for a volunteer by:
    <br><br>
      1. Volunteer Name
	<br>
      2. Phone Number
	</h5>
    

    <br>  

     </div>
    </body>
</html>








<!-- end-->
