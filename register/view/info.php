<?php
	
	// FILE: Registration Info View

	// AUTHOR: dum5002

	global $act;
	global $msg;
	global $total;

?>
<style>



	.bold {font-weight: bold;}
	.note {font-size: 10pt; color: grey;}
	.mandatory {color: crimson;}
	/*
	h4.show, h4.hide {width: 742px;}
	div {width: 750px;}
	*/
	label {margin-left: 5px;}
	h4.show + div {display: block;}
	h4.hide + div {display: none;}
	h4.show + div, h4.hide + div {
	    border: 1px solid black;
	}
	h4.show, h4.hide {
	    margin-bottom: 0px;
	    color: white;
	    background-color: #02478a;
	    padding-left: 10px;
	}
	#page {width: 800px; text-align: left; margin: auto;}

	h4.show, h4.hide {
	    border-top-left-radius: 10px;
	    border-top-right-radius: 10px;
	    padding-left: 15px;
	    padding-top: 3px;
	    padding-bottom: 3px;
	}







    label
    {
        padding-left: 10px;
        
    }
    input
    {
        margin-bottom: 8px;
    }
    </style>
	<h4>Personal Information</h4>
        <br/>
	<?php include 'progress.php'; ?>
	<hr>
	<br>
	<form  action="index.php" method="get">

		
		
		<input name="act" type="hidden" value="<?php echo $act;?>" >
		<h4 class="show" onclick="swap(this);">Personal Information</h4><div><table class="intTable">
		<tr><td>
		Title<span class="mandatory">* </span></td> 
		<td><select name="title" id="title" value="<?php echo isset($_SESSION['title']) ? $_SESSION['title'] : '' ?>">
		<option></option>
  		<option> Mr.</option>
  		<option>Mrs.</option>
  		<option>Ms.</option>
  		<option>Dr.</option>
		</select></label></td><tr><br>
		<tr><td>First Name<span class="mandatory">* </span></td><td> <input name="fname" type="text" id="fname" value="<?php echo isset($_SESSION['fname']) ? $_SESSION['fname'] : '' ?>"></label>
		</td></tr>
		<tr><td>Last Name<span class="mandatory">* </span></td><td> <input name="lname" type="text" id="lname" value="<?php echo isset($_SESSION['lname']) ? $_SESSION['lname'] : '' ?>"></label></td></tr>
		<tr><td>Date of Birth<span class="mandatory">*</span></td><td><input name="dob" id="dob" value="<?php echo isset($_SESSION['dob']) ? $_SESSION['dob'] : '' ?>"></label></td><td>&nbsp &nbsp(eg:&nbsp mm-dd-yyyy)</td></tr>
		<tr><td>Gender<span class="mandatory">*</span></td><td><select name="gender" id="gender" value="<?php echo isset($_SESSION['gender']) ? $_SESSION['gender'] : '' ?>">
		<option></option><option>Male</option><option>Female</option><option>Other</option></td></tr></table></div>

		<h4 class="show" onclick="swap(this);">Address</h4><div><table class="intTable">
		<tr><td>Street 1<span class="mandatory">*</span></td><td> <input name="street1" type="text" id="street1" value="<?php echo isset($_SESSION['street1']) ? $_SESSION['street1'] : '' ?>"></td></tr><br>
		<tr><td>Street 2</td><td><input name="street2" type="text" value="<?php echo isset($_SESSION['street2']) ? $_SESSION['street2'] : '' ?>"></label></td></tr>
		<tr><td>City<span class="mandatory">*</span> </td><td><input name="city" type="text" id="city" value="<?php echo isset($_SESSION['city']) ? $_SESSION['city'] : '' ?>"></label></td></tr>
		<tr><td>State<span class="mandatory">*</span> </td><td>
        <select name="state" type="text" id="state" value="<?php echo isset($_SESSION['state']) ? $_SESSION['state'] : '' ?>">
        <option value=""></option>
        <option value="Alabama">Alabama</option>
        <option value="Alaska">Alaska</option>
        <option value="Arizona">Arizona</option>
        <option value="Arkansas">Arkansas</option>
        <option value="California">California</option>
        <option value="Colorado">Colorado</option>
        <option value="Connecticut">Connecticut</option>
        <option value="Delaware">Delaware</option>
        <option value="District of Columbia">District Of Columbia</option>
        <option value="Florida">Florida</option>
        <option value="Georgia">Georgia</option>
        <option value="Hawaii">Hawaii</option>
        <option value="Idaho">Idaho</option>
        <option value="Illinois">Illinois</option>
        <option value="Indiana">Indiana</option>
        <option value="Iowa">Iowa</option>
        <option value="Kansas">Kansas</option>
        <option value="Kentucky">Kentucky</option>
        <option value="Louisiana">Louisiana</option>
        <option value="Maine">Maine</option>
        <option value="Maryland">Maryland</option>
        <option value="Massachusetts">Massachusetts</option>
        <option value="Michigan">Michigan</option>
        <option value="MN">Minnesota</option>
        <option value="Mississippi">Mississippi</option>
        <option value="Missouri">Missouri</option>
        <option value="Montana">Montana</option>
        <option value="Nebraska">Nebraska</option>
        <option value="Nevada">Nevada</option>
        <option value="New Hampshire">New Hampshire</option>
        <option value="New Jersey">New Jersey</option>
        <option value="New Mexico">New Mexico</option>
        <option value="New York">New York</option>
        <option value="North Carolina">North Carolina</option>
        <option value="North Dakota">North Dakota</option>
        <option value="Ohio">Ohio</option>
        <option value="Oklahoma">Oklahoma</option>
        <option value="Oregon">Oregon</option>
        <option value="Pennsylvania">Pennsylvania</option>
        <option value="Rhode Islands">Rhode Island</option>
        <option value="South Carolina">South Carolina</option>
        <option value="South Dakota">South Dakota</option>
        <option value="Tennesse">Tennessee</option>
        <option value="Texas">Texas</option>
        <option value="Utah">Utah</option>
        <option value="Vermont">Vermont</option>
        <option value="Virginia">Virginia</option>
        <option value="Washington">Washington</option>
        <option value="West Virginia">West Virginia</option>
        <option value="Wisconsin">Wisconsin</option>
        <option value="Wyoming">Wyoming</option>
        </select>
        </label></td></tr>
		<tr><td>Zip<span class="mandatory">*</span> </td><td><input name="zip" type="text" id="zip" value="<?php echo isset($_SESSION['zip']) ? $_SESSION['zip'] : '' ?>"></label></td></tr> </table></div>

		<h4 class="show" onclick="swap(this);">Contact Information</h4><div><table class="intTable">
		<tr><td>Phone<span class="mandatory">*</span></td><td> <input name="phone" type="text" id="phone" value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : '' ?>"></label></td></tr><br>
		<tr><td>Secondary Phone</td><td> <input name="phone2" type="text" value="<?php echo isset($_SESSION['phone2']) ? $_SESSION['phone2'] : '' ?>" ></label></td><td>&nbsp ext.<input name="extension" type="text" value="<?php echo isset($_SESSION['extension']) ? $_SESSION['extension'] : '' ?>"></td></tr>
		<tr><td>Email<span class="mandatory">*</span> </td><td><input name="email" type="text" id="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>"></label></td><td>&nbsp (Email will be used as your Username)</td></tr>
        <tr><td>Emergency Contact's Name<span class="mandatory">*</span> </td><td><input name="emergencyname" type="text" id="emergencyname" value="<?php echo isset($_SESSION['emergencyname']) ? $_SESSION['emergencyname'] : '' ?>"></label></td></tr>
        <tr><td>Emergency Contact's Phone<span class="mandatory">*</span> </td><td><input name="emergencyphone" type="text" id="emergencyphone" value="<?php echo isset($_SESSION['emergencyphone']) ? $_SESSION['emergencyphone'] : '' ?>"></label></td></tr>
        </table></div>

		<h4 class="show" onclick="swap(this);">Maritial Status</h4><div><table class="intTable">
		<input type="radio" name="maritial" value="1" id="maritial" required="required" ><label>Single</label><br>
		<input type="radio" name="maritial" value="2" id="maritial" required="required"><label>Married</label><br>
		<input type="radio" name="maritial" value="3" id="maritial" required="required"><label>Widow</label><br>
        <input type="radio" name="maritial" value="4" id="maritial" required="required"><label>Divorced</label><br>
		</table></div>

		<!-- <h4 class="show" onclick="swap(this);">Employer Information</h4><div><table class="intTable">
		<tr><td>Employer</td><td><input name="employer" type="text" value="Mega Corp"></td></tr><br>
		<tr><td>Work Phone</td><td><input name="workPhone" type="text" value="7175554321"></td></tr>
		<tr><td>Title/Occupation</td><td><input name="occupation" type="text" value="Laborer"></td></tr></table></div> -->
		
		<br>
		<script type="text/javascript">

            function check()
            {
            	if (document.getElementById('title').value==""
                 || document.getElementById('title').value==undefined)
                {
                    alert ("Please Select your 'Title'");
                    return false;
                }

                else if (document.getElementById('fname').value==""
                 || document.getElementById('fname').value==undefined)
                {
                    alert ("Please Enter your 'First Name'");
                    return false;
                }

                else if(document.getElementById('lname').value==""
                	||document.getElementById('lname').value==undefined)
                {
                	alert("Please Enter your 'Last Name'");
                	return false;
                }

                else if(document.getElementById('dob').value==""
                	||document.getElementById('dob').value==undefined)
                {
                	alert("Please Enter your 'Date of Birth'");
                	return false;
                }

                else if(document.getElementById('gender').value==""
                	||document.getElementById('gender').value==undefined)
                {
                	alert("Please Select your 'Gender'");
                	return false;
                }

                else if(document.getElementById('street1').value==""
                	||document.getElementById('street1').value==undefined)
                {
                	alert("Please Enter your 'street 1' Address");
                	return false;
                }

                else if(document.getElementById('city').value==""
                	||document.getElementById('city').value==undefined)
                {
                	alert("Please Enter the 'City'");
                	return false;
                }

                else if(document.getElementById('state').value==""
                	||document.getElementById('state').value==undefined)
                {
                	alert("Please Enter the 'State'");
                	return false;
                }

                else if(document.getElementById('zip').value==""
                	||document.getElementById('zip').value==undefined)
                {
                	alert("Please Enter the 'Zip' code");
                	return false;
                }

                else if(document.getElementById('phone').value==""
                	||document.getElementById('phone').value==undefined)
                {
                	alert("Please Enter your 'Phone' number");
                	return false;
                }

                else if(document.getElementById('email').value==""
                	||document.getElementById('email').value==undefined)
                {
                	alert("Please Enter your 'Email' address");
                	return false;
                }

                else if(document.getElementById('emergencyname').value==""
                    ||document.getElementById('emergencyname').value==undefined)
                {
                    alert("Please Enter the 'Emergency Contact's Name address");
                    return false;
                }

                else if(document.getElementById('emergencyphone').value==""
                    ||document.getElementById('emergencyphone').value==undefined)
                {
                    alert("Please Enter the 'Emergency Contact's Phone'");
                    return false;
                }
  


                return true;
            }

        </script>
		<input class="btn btn-success" name="submit" type="submit" value="submit" onclick="return check();" >

		<br>
	</form>
	<br>
	<hr>
	<span class="note"><span class="mandatory">*</span> Required<br>
	Email address is essential in order to receive monthly updates and special invitations
	</span>
