<?php

/* 
 * file: createVolunteer.php
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Author: rwg5215
 */
?>
<!--<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">-->
<div style="margin-left:50px; margin-right:auto;">

<div class="navbar navbar-inverse">
  <div class="navbar-inner">
    <a class="brand">Habitat Volunteer Registration</a>
  </div>
</div>

<div style="padding-left: 10px; width: 50%;">
			
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
	<style>
	.barCom, .barYet {
		width: 85.333333333333px;
		border: 1px solid black;
		text-align: center;
	}
	.barCom, .barYet, label {display: inline;}
	.barCom {background-color: #006dcc; padding-right:5px; color: #fff;}
	.barYet {background-color: #da4f49; padding-right:5px; color: #fff;}
        .barYet:last-child 
        {
            border-top-right-radius: .75em;
            border-bottom-right-radius: .75em;
            
        }
        
        .barCom:first-of-type
        {
            border-top-left-radius: .75em;
            border-bottom-left-radius: .75em;
        }
        
  
        
 
</style>
<div id="progressBar" style="width: 512px;">
	<label class="bold">Progress</label>
	<dir class="barCom">1</dir><dir class="barYet">2</dir><dir class="barYet">3</dir><dir class="barYet">4</dir><dir class="barYet">5</dir><dir class="barYet">6</dir></div>	<hr>
	<br>
	<form  action="index.php" method="get">

		
		
		<input name="act" type="hidden" value="getInterests" >
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
		<tr><td>Sec. Phone</td><td> <input name="phone2" type="text" ></label></td><td>&nbsp ext.<input name="extension" type="text"></td></tr>
		<tr><td>Email<span class="mandatory">*</span> </td><td><input name="email" type="text" id="email"></label></td></tr>
        <tr><td>Emergency Contact's Name<span class="mandatory">*</span> </td><td><input name="emergencyname" type="text" id="emergencyname"></label></td></tr>
        <tr><td>Emergency Contact's Phone<span class="mandatory">*</span> </td><td><input name="emergencyphone" type="text" id="emergencyphone"></label></td></tr>
        </table></div>

		<h4 class="show" onclick="swap(this);">Maritial Status</h4><div><table class="intTable">
		<input type="radio" name="maritial" value="1" id="maritial" required="required"><label>Single</label><br>
		<input type="radio" name="maritial" value="2" id="maritial" required="required"><label>Married</label><br>
		<input type="radio" name="maritial" value="3" id="maritial" required="required"><label>Widow</label><br>
        <input type="radio" name="maritial" value="4" id="maritial" required="required"><label>Divorced</label><br>
		</table></div>


		
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
</div>
</div>