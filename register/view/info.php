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
		<h4 class="show" onclick="swap(this);">Name</h4><div><table class="intTable">
		<tr><td>
		Title<span class="mandatory">* </span></td> 
		<td><select name="title">
  		<option>Mr.</option>
  		<option>Mrs.</option>
  		<option>Ms.</option>
  		<option>Dr.</option>
		</select></label></td><tr><br>
		<tr><td>First Name<span class="mandatory">* </span></td><td> <input name="fname" type="text" value="John"></label></td></tr>
		<tr><td>Last Name<span class="mandatory">* </span></td><td> <input name="lname" type="text" value="Doe"></label></td></tr> </table></div>
		<h4 class="show" onclick="swap(this);">Address</h4><div><table class="intTable">
		<tr><td>Street 1<span class="mandatory">*</span></td><td> <input name="street1" type="text" value="123 Main Street"></td></tr><br>
		<tr><td>Street 2</td><td><input name="street2" type="text" value="APT SUIT"></label></td></tr>
		<tr><td>City<span class="mandatory">*</span> </td><td><input name="city" type="text" value="Anytown"></label></td></tr>
		<tr><td>State<span class="mandatory">*</span> </td><td><input name="state" type="text" value="pa"></label></td></tr>
		<tr><td>Zip<span class="mandatory">*</span> </td><td><input name="zip" type="text" value="12345"></label></td></tr> </table></div>
		<h4 class="show" onclick="swap(this);">Contact Information</h4><div><table class="intTable">
		<tr><td>Phone<span class="mandatory">*</span></td><td> <input name="phone" type="text" value="7175559876"></label></td></tr><br>
		<tr><td>Email<span class="mandatory">*</span> </td><td><input name="email" type="text" value="jd@email.com"></label></td></tr></table></div>
		<h4 class="show" onclick="swap(this);">Maritial Status</h4><div><table class="intTable">
		<input type="radio" name="group1" value="Single"> Single<br>
		<input type="radio" name="group1" value="Married"> Married<br>
		<input type="radio" name="group1" value="Widow"> Widow<br>
		<input type="radio" name="group1" value="Divorced"> Divorced<br>
		</table></div>
		<h4 class="show" onclick="swap(this);">Employer Information</h4><div><table class="intTable">
		<tr><td>Employer</td><td><input name="employer" type="text" value="Mega Corp"></td></tr><br>
		<tr><td>Work Phone</td><td><input name="workPhone" type="text" value="7175554321"></td></tr>
		<tr><td>Title/Occupation</td><td><input name="occupation" type="text" value="Laborer"></td></tr></table></div>
		
		<br>
		<input class="btn btn-success" name="submit" type="submit" value="submit" >

		<br>
	</form>
	<br>
	<hr>
	<span class="note"><span class="mandatory">*</span> Required<br>
	Email address is essential in order to receive monthly updates and special invitations
	</span>
