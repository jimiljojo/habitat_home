<?php

global $act;
global $sub;
global $dir;
global $msg;

$act='loginCheck';

?>

<style>
    
    a {
	color: dodgerblue;
	text-decoration: none;
    }
    a:hover {color: crimson}
    .habitatGreen {color: rgb(115, 180, 28);}
    .habitatBlue {color: rgb(2, 71, 138);}
    
    div.body {
    margin-left: auto;
    margin-right: auto; 
	text-align: center;
	font-family: arial;
	background-color: rgb(253, 253, 253);
    }

    label {font-weight: bold;}
    #loginBox {
	margin: 25px auto;
	border: 1px solid #73b41c;
	border-radius: 15px;
	box-shadow: 3px 3px #555555;
	width: 250px;
	text-align: left;
	padding: 0px 20px;
    }
    .center {text-align: center;}
    .aForgot {font-size: 10pt; color: indianred;}
</style>

<script type="text/javascript">
		function verify()
            {
            	if (document.getElementById('userName').value=="" || document.getElementById('userName').value==undefined)
                {
                    alert ("Please Enter your 'User Id'");
                    //return false;
                }

               else if (document.getElementById('password').value=="" || document.getElementById('password').value==undefined)
                {
                    alert ("Please Enter your 'Password'");
                    //return false;
                }

                else{
                	
                	document.getElementById('loginUser').submit();
                }

            }

		</script>

	<div class="body">
	<img src="img/habitat_logo.jpg" alt="Habitat for Humanity Logo" height="198px" width="600px" />

	<h2> Developers and testers can use </br> username= habitat and password=ist440 </h2>
	<div id="loginBox">
	    <form id="loginUser" name="loginUser" action="index.php" method="get">
	    
	    <input name="dir" type="hidden" value="<?php echo $dir;?>" >
	    <input name="act" type="hidden" value="<?php echo $act;?>" >
		<h2 class="center habitatBlue">Login</h2>
		<input id="userName" name="userName" type="text"><label> User Id</label><br>
		<input id="password" name="password" type="password"><label> Password</label><br>
		<br>

		<input type="submit" value="submit" onclick="verify();"> &nbsp &nbsp <a href="index.php?act=checkEmail" class="aForgot">Forgot Password?</a><br>
		<br>
		<br>
		<div class="center">
		    <a href="../index.php">York Habitat Website</a><br>
		</div>
	    </form>
	</div>
</div>
<!-- Hosting24 Analytics Code -->
<!--<script type="text/javascript" src="http://stats.hosting24.com/count.php"></script> -->
<!-- End Of Analytics Code -->
