
<!--Update Event 
	Highlight the Event by clicking
		Update [probably an edit] button
			Display
				Edit boxes with information 
					Title | Type | Date | Time | Address | Committee | Sponsor-->
<h2>Event</h2>
<h3>Update</h3>
<form name="search" action="insert.php" method="post">
<!-- need to enter in php to echo the data so they can change it-->
Title:<input type="text" name="title">

Type: <select name="Type">
<option value ="Choose">Choose Type</option>
<!--For loop here using php to pull types from database
<option value =""></option>
-->
</select>

Committee: <select name="Committee">
<option value ="Choose">Choose Committee</option> <!-- choose committee needs to be a php code to echo-->
<!--For loop here using php to pull committees from database
<option value =""></option>
-->
</select><br><br>

Date: <input type="text" name="date">
Time: <input type="text" name="time"><br><br>
Street: <input type="text" name="street">
City: <input type="text" name="city"><br><br>
State: <input type="text" name="state">
Zip code: <input type="text" name="zipcode"><br><br>
Sponsor: <input type="text" name="sponsor"><br><br>

<input type="submit" value="Update">
</form>
