<?php

// TITLE: Office Persons View
// FILE: office/view/persons.php

if($updated)
      echo '<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>UPDATED</strong> You successfully updated the information.</div>';

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
#alignment
{
position:relative;
float:left;
}

</style>



<h2> Organizations Search </h2>
<hr>
<br>

<form name="input" action="index.php" method="get">
	
<input name="dir" type="hidden" value="<?php echo $dir; ?>" >
<input name="sub" type="hidden" value="<?php echo $sub; ?>" >
<input name="act" type="hidden" value="read" > <!-- view all button -->
<input type="submit" value="View All">
</form><br>

<form name="input" action="index.php" method="get"> 
	<input name="dir" type="hidden" value="<?php echo $dir; ?>" >
	<input name="sub" type="hidden" value="<?php echo $sub; ?>" >
	<input name="act" type="hidden" value="create" >
	<input type="submit" value="Create New">
</form><br>

<form class='searchBy' method="GET" action="index.php"> <!-- search by, drop down menu, and input boxes -->
   <input name="dir" type="hidden" value="<?php echo $dir; ?>" >
   <input name="sub" type="hidden" value="<?php echo $sub; ?>" >
   <input type="hidden" name="act" value="search">
   <input name="searchBtn" type="submit" value="Search" action="index.php" method="get">

<label>Organization name :</label>
</select>
<input id="orgname" name="orgname" placeholder="Organization Name" type="text">
</form><br>

<!--results can be listed here, pushing text down.-->

<br>
<h5>Here is where you will be able to search for an organization and make changes, such as
<br><br>1. Edit Organization Information
<br>2. Create New Organization
<br>3. Search For an Organization
<h5/>




<!-- end-->
