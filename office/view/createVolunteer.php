<?php

/* 
 * file: createVolunteer.php
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Author:
 */

?>

<form action="index.php" method="GET" class="form-horizontal">
    <input name="dir" type="hidden" value="<?php echo $dir; ?>" >
    <input name="sub" type="hidden" value="<?php echo $sub; ?>" >
    <input name="act" type="hidden" value="getInterests" >

		
		<!-- Form Start -->
		
	<h4 class="show" onclick="swap(this);">Personal Information</h4><div>
               <table class="intTable">
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
			<option></option><option>Male</option><option>Female</option><option>Other</option></td></tr>
               </table>
           </div>
<br/>

	       <h4 class="show" onclick="swap(this);">Contact Information</h4><div>
               <table class="intTable">
			<tr><td>Phone<span class="mandatory">*</span></td><td> <input name="phone" type="text" id="phone"></label></td></tr><br>
			<tr><td>Sec. Phone</td><td> <input name="phone2" type="text" ></label></td><td>&nbsp ext.<input name="extension" type="text"></td></tr>
			<tr><td>Email<span class="mandatory">*</span> </td><td><input name="email" type="text" id="email"></label></td></tr>
	             
               </table>
           </div>
               
	       <h4 class="show" onclick="swap(this);">Address</h4><div>
        	<table class="intTable">
			<tr><td>Street 1<span class="mandatory">*</span></td><td> <input name="street1" type="text" id="street1"></td></tr><br>
			<tr><td>Street 2</td><td><input name="street2" type="text"></label></td></tr>
			<tr><td>City<span class="mandatory">*</span> </td><td><input name="city" type="text" id="city"></label></td></tr>
			<tr><td>State<span class="mandatory">*</span> </td><td><input name="state" type="text" id="state"></label></td></tr>
			<tr><td>Zip<span class="mandatory">*</span> </td><td><input name="zip" type="text" id="zip"></label></td></tr> 
	        </table>
	    </div>
<br/>
		
		<br>
		
		<!-- check for proper input -->
		
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
        
        
        <button>Next</button>
		<br>
	</form>
	
	<!-- end Form -->
	
	<br>
	<hr>
	<span class="note"><span class="mandatory">*</span> Required<br>
	Email address is essential in order to receive monthly updates and special invitations
	</span>
</div>
</div>
