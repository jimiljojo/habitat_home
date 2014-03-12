<?php
    // echo $person = $dbio->getPerson($personId);
    // echo $address = $dbio->getAddress(echo $personId);
    // echo $contact = $dbio->getContact(echo $personId);
    
/*
    mysql_connect("localhost", "root", "");
    mysql_select_db("rkcpfk");
    // $sql = mysql_query("SELECT * FROM tbl_name");

    $query = "SELECT * FROM personalinfo";
    $allInfo = mysql_query($query);
    $info = mysql_fetch_array($allInfo);
*/
    
    $title = 'Mr';//$info["Title"];
    $fName = 'John';//$info["FirstName"];
    $lName = 'Doe';//$info["LastName"];
    $street1 = '123 Main Street';//$info["Street1"];
    $street2 = '';//$info["Street2"];
    $city = 'Anytown';//$info["City"];
    $state = 'PA';//$info["State"];
    $zip = '17402';//$info["ZIP"];
    $phone = '717*555-5309';//$info["Phone"];
    $email = 'jdoe@abc.com';//$info["Email"];
    $employer = 'Best Company';//$info["Employer"];
    $workPhone = '717-555-9874';//$info["WorkPhone"];
    $workExt = '102';
    $jobTitle = 'Manager';//$info["Title/Occupation"];

?>
<h4>Personal Information</h4>
<hr>
<form action="index.php" method="GET">
    <input name="id" type="hidden" value="0" >
    <input name="dir" type="hidden" value="<?php echo $dir; ?>" >
    <input name="sub" type="hidden" value="<?php echo $sub; ?>" >
    <input name="act" type="hidden" value="infoUpdate" >
    <table>
	<tr>
	    <th>Name Info</th>
	    <th>Address Info</th>
	    <th>Contact Info</th>
	</tr>
	<tr>
	    <td>
		<select name="title" type="text">
		    <option value="0" selected="selected">Mr.</option>;
		    <option value="1">Mrs.</option>;
		    <option value="2">Ms.</option>;
		    <option value="3">Dr.</option>;
		</select>
		<span class="required">*</span>
		<br/>
		<input name="fName" type="text" placeholder="first name" value="<?php echo $fName; ?>" />
		<span class="required">*</span>
		<br/>
		<input name="lName" type="text" placeholder="last name" value="<?php echo $lName; ?>"  />
		<span class="required">*</span>
		<br/>
	    </td>
	    <td>
		<input name="street1" type="text" placeholder="street 1" value="<?php echo $street1; ?>" />
		<span class="required">*</span>
		<br/>
		<input name="street2" type="text" placeholder="street 2" value="<?php echo $street2; ?>" />
		<br/>
		<input name="city" type="text" placeholder="city" value="<?php echo $city; ?>" />
		<span class="required">*</span>
		<br/>
		<select name="state">
		    <option value="20">MD</option>
		    <option value="38" selected="selected">PA</option>
		    <option value="43">TX</option>
		</select>
		<span class="required">*</span>
		<br/>
		<input name="zip" type="text" placeholder="zip" value="<?php echo $zip; ?>" />
		<span class="required">*</span>
	    </td>
	    <td>
		<input name="phone" type="text" placeholder="phone" value="<?php echo $phone; ?>" />
		<span class="required">*</span></label>
		<br/>
		<input name="email" type="text" placeholder="email" value="<?php echo $email; ?>"" />
		<span class="required">*</span>
		<br/>
		<input name="employer" type="text" placeholder="employer" value="<?php echo $employer; ?>" />
		<br/>
		<input name="workPhone" type="text" placeholder="work phone" value="<?php echo $workPhone; ?>"" />
		<br/>
		<input name="workExt" type="text" placeholder="ext" value="<?php echo $workExt; ?>" />
		<br/>
		<input name="jobTitle" type="text" placeholder="job title" value="<?php echo $jobTitle; ?>" />
	    </td>
	</tr>
    </table>
    <input type="submit" value="Update" disabled="disabled">
</form>
<hr>
