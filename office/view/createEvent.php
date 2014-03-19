<!--Create Event 
	Create Button
		Display
			Title | Type [drop down] | Date | GuestList [Not Needed here] | Time | Address | Committee [drop down] | Sponsor
				Sent to Update-->
<h2>Event</h2>
<h3>Create</h3>
<form name="search" action="insert.php" method="post">
Title:<input type="text" name="title">

Type: <select name="Type">
<option value ="Choose">Choose Type</option>
<!--For loop here using php to pull types from database
<option value =""></option>
-->
</select>

Committee: <select name="Committee">
<option value ="Choose">Choose Committee</option>
<!--For loop here using php to pull committees from database
<option value =""></option>
-->
</select><br><br>

Date: <input type="text" name="date">
Time: <input type="text" name="time"><br><br>
<!-- Need to ask how to combine Address/city/state/zipcode -->
Street: <input type="text" name="street">
City: <input type="text" name="city"><br><br>
State: <input type="text" name="state">
Zip code: <input type="text" name="zipcode"><br><br>

Sponsor: <input type="text" name="sponsor"><br><br>

<input type="submit" value="Create">
</form>