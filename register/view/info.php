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
		<td><select name="title" id="title">
		<option></option>
  		<option>Mr.</option>
  		<option>Mrs.</option>
  		<option>Ms.</option>
  		<option>Dr.</option>
		</select></label></td><tr><br>
		<tr><td>First Name<span class="mandatory">* </span></td><td> <input name="fname" type="text" id="fname"></label>
		</td></tr>
		<tr><td>Last Name<span class="mandatory">* </span></td><td> <input name="lname" type="text" id="lname"></label></td></tr>
		<tr><td>Date of Birth<span class="mandatory">*</span></td><td><input name="dob" type="integer" id="dob"></label></td><td>&nbsp &nbsp(eg:&nbsp yyyy-mm-dd)</td></tr>
		<tr><td>Gender<span class="mandatory">*</span></td><td><select name="gender" id="gender">
		<option></option><option>Male</option><option>Female</option><option>Other</option></td></tr></table></div>
		<h4 class="show" onclick="swap(this);">Address</h4><div><table class="intTable">
		<tr><td>Street 1<span class="mandatory">*</span></td><td> <input name="street1" type="text" id="street1"></td></tr><br>
		<tr><td>Street 2</td><td><input name="street2" type="text"></label></td></tr>
		<tr><td>City<span class="mandatory">*</span> </td><td><input name="city" type="text" id="city"></label></td></tr>
		<tr><td>State<span class="mandatory">*</span> </td><td><input name="state" type="text" id="state"></label></td></tr>
		<tr><td>Zip<span class="mandatory">*</span> </td><td><input name="zip" type="text" id="zip"></label></td></tr> </table></div>
		<h4 class="show" onclick="swap(this);">Contact Information</h4><div><table class="intTable">
		<tr><td>Phone<span class="mandatory">*</span></td><td> <input name="phone" type="text" id="phone"></label></td></tr><br>
		<tr><td>Sec. Phone</td><td> <input name="phone2" type="text" value=></label></td><td>&nbsp ext.<input name="extension" type="text"></td></tr>
		<tr><td>Email<span class="mandatory">*</span> </td><td><input name="email" type="text" id="email"></label></td></tr></table></div>

		<h4 class="show" onclick="swap(this);">Maritial Status</h4><div><table class="intTable">
		<input type="radio" name="group1" value="1" id="group1" required="required"><label>Single</label><br>
		<input type="radio" name="group1" value="2" id="group1" required="required"><label>Married</label><br>
		<input type="radio" name="group1" value="3" id="group1" required="required"><label>Widow</label><br>
        <input type="radio" name="group1" value="4" id="group1" required="required"><label>Divorced</label><br>
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
