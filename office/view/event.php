<?php

// TITLE: Office Accounts View
// FILE: office/view/events.php
// AUTHOR: sbkedia


?>

<H2>Page Label</H2>
______________________
<ul>
<li>View All Events</li> <!--Inclusive-->
<li>Search Events</li> <!--Criteria-->
<li>Create Event</li>
</ul>
______________________
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
<!-- View All button -->
<form name="input" action="index.php" method="get">
	<input name="dir" type="hidden" value="<?php echo $dir; ?>" >
	<input name="sub" type="hidden" value="<?php echo $sub; ?>" >
	<input name="act" type="hidden" value="read" >
	<input type="submit" value="View All">
</form>

<br/><br/>

<!-- Create New Event button -->
<form name="input" action="index.php" method="get"> 
	<input name="dir" type="hidden" value="<?php echo $dir; ?>" >
	<input name="sub" type="hidden" value="<?php echo $sub; ?>" >
	<input name="act" type="hidden" value="create" >
	<input type="submit" value="Create New">
</form>

<br/><br/>

<!-- Search by, drop down menu of event types -->
<form class='searchBy' action="index.php" method="get"> 
   <input type="hidden" name="dir" value="<?php echo $dir; ?>">
   <input type="hidden" name="sub" value="<?php echo $sub; ?>">
   <input type="hidden" name="act" value="search">
   <input name="searchBy" id="searchBy" type="submit" value="Search Event Type" action="index.php" method="get">

	<select id="eventType" name="eventType" method="get">
		
		 <?php
		 $Event_type= readEvent_Types(); 
		 foreach ($Event_type as $EventTypeItem){ ?>
			<option value= <?php echo $EventTypeItem->getType_id(); ?> > <?php echo $EventTypeItem->getTitle() ?> </option>		
		<?php }// end foreach ?>

	</select>

</form>

<br/><br/> 

<span class="notes">
<ul>
<li>View All Events will display all Events</li> <!--Inclusive-->
<li>Search Events will search all events limiting the search by type</li> <!--Criteria-->
<li>Create Event will allow you to create new Events</li>
</ul>
</span>


<!--Search Event
	Search
		Using Type in a drop down
			Go to List [Based on type]
				Go to Read--
<h2>Event</h2>
<h3>Search</h3>
<body>
<form name="search" method="get">
Search: <formaction="">
<select name="Type">
<option value ="Choose">Choose Type</option>
<!--For loop here using php to pull types from database
<option value =""></option>
--
</select><br><br>
<input type="submit" value="Search">
</form>
<span class="notes">
<p>
This page will let you separate out the events by different types of events.
</p>
</span>	
</body> 
-->
