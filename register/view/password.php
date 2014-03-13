<?php
	
	// FILE: Registration Password View

	// AUTHOR: des301

	global $act;
	global $msg;
	global $total;

?>
<style>
    /*label
    {
        padding-left: 10px;
        
    }
    input
    {
        margin-bottom: 8px;
    }*/

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
    </style>
	<h4>Registration</h4>
        <br/>
	<?php include 'progress.php'; ?>
	<hr>
	<form  action="index.php" method="get">
	    <input name="act" type="hidden" value="<?php echo $act;?>" >
	    <!-- <h4 class="show" onclick="swap(this);">User Category</h4><div><table class="intTable">
	    <label><b><span class="mandatory">*</span>I am a : </b><span class="note">(check all that apply)</span><br>
	    	<input type="checkbox" name="office">Habitat for Humanity Office Staff<br>
	    	<input type="checkbox" name="volunteer">Volunteer</label><br> </table></div>
	    <br/> -->
	    <h4 class="show" onclick="swap(this);">Username and Password</h4><div><table class="intTable">
	    <tr><td><label><span class="mandatory">*</span>Username</label></td><td> <input type="text" name="userName" id="userName"></td></tr>
	    
	    <tr><td><label><span class="mandatory">*</span>Password</label></td><td><input type="password" name="pw1" id="pw1"></td></tr><br>
	    <tr><td><label><span class="mandatory">*</span>Confirm</label></td><td><input type="password" name="pw2" id="pw2"> </td><td>&nbsp<span style="color:lightgrey; font-size: 10pt;">re-type password</span></td></tr></table></div><br>
	    <br>
	    <script type="text/javascript">

            function checkPassword()
            {
            	

            	if (document.getElementById('userName').value==""
                 || document.getElementById('userName').value==undefined)
                {
                    alert ("Please Enter your 'Username'");
                    return false;
                }

                else if (document.getElementById('pw1').value==""
                 || document.getElementById('pw1').value==undefined)
                {
                    alert ("Please Enter your 'Password'");
                    return false;
                }

                else if (document.getElementById('pw2').value==""
                 || document.getElementById('pw2').value==undefined)
                {
                    alert ("Please verify your Password");
                    return false;
                }

                else if (document.getElementById('pw1').value!=document.getElementById('pw2').value)
               
                 {
                     alert ("Your Passwords don't match. Please re-type your Passwords!");
                     return false;
                 }

                else{
                	return true;
                }
                

            }
            </script>

	    
	    <input class="btn btn-success" name="submit" type="submit" value="submit" onclick="return checkPassword();">

	    <br>
	</form>
	<br>

	