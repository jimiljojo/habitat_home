<?php
	
	// FILE: Registration Interests View

	// AUTHOR: dum5002

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
<h4>Other Information</h4>
<br/>
<?php include 'progress.php'; ?>
<hr>
<form  action="index.php" method="get">
    <input name="act" type="hidden" value="<?php echo $act;?>" >
    <h4 class="show" onclick="swap(this);">Contact Preference</h4><div><table class="intTable">
    <!-- <input type="radio" name="receive" value="none" selected="selected"><label>Phone</label>
    <input type="radio" name="receive" value="home"><label>Mail</label>
    <input type="radio" name="receive" value="work"><label>Email</label><br/> -->
    <input type="checkbox" name="phone" value="phone"><label>Phone</label><br>
    <input type="checkbox" name="mail" value="mail"><label>Mail</label><br>
    <input type="checkbox" name="email" value="email"><label>Email</label><br></table></div>


    <br/>
    <h4 class="show" onclick="swap(this);">Volunteer Availability</h4><div><table class="intTable">
    I am available to volunteer in the <span class="note">(check all that apply)</span><br/>
    <input type="checkbox" name="day"><label>day</label><br/>
    <input type="checkbox" name="eve"><label>evening</label><br/>
    <input type="checkbox" name="wend" checked="checked"><label>weekends</label><br/></table></div>
    <br/>
    <h4 class="show" onclick="swap(this);">Consent</h4><div><table class="intTable">
    <input type="checkbox" name="age" ><label>I am 16 years or older</label><br/>
    <br/>
    <input type="checkbox" name="photo" ><label>I understand a personal photograph may be used in appropriate newspapers and/or newsletters. <span class="note">(This will help to highlight your service to the community and our affiliate.)</span><label><br/>
    <br/>
    <label><b>Please Click and read the <a href="http://www.yorkhabitat.org/TDE_CMS/database/userfiles/file/2013/ConstructionSafety.pdf" target="_blank">Construction Safety Guidelines</a></b></label><br>
    <input type="checkbox" name="safety"><label>I have read the Construction Safety Guidelines</label><br/>
    <br/>
    <label><b>Please Click and watch the <a href="http://www.yorkhabitat.org/TDE_CMS/database/userfiles/file/ConstructionVideo.html" target="_blank">Construction Safety Video</a></b></label><br>
    <input type="checkbox" name="safety"><label>I have watched the Construction Safety Video</label><br/>
    </br>

    <label><b>Please Click and read the <a href="http://www.yorkhabitat.org/TDE_CMS/database/userfiles/file/waiverform20120711.pdf" target="_blank">Liability Waiver Form</a></b></label><br>
    <input type="checkbox" name="waiver"><label>I accept the terms of the liability waiver form</label><br/>
    </br> </table></div>
    </br>

    <table><tr><td><label>Signature</label></td><td><input name="signature" type="text" textbox.value=date()></td><td>&nbsp <label>(Enter your First name and Last name)</td> </tr><br/>
    <tr><td><label>Date & Time</label></td><td><input name="date" type="text" id="date" readonly="readonly">
    <script type="text/javascript">    
    document.getElementById("date").value = Date().toString();    
    </script></td></tr></table><br/>
    <br/>
    <input class="btn btn-success" name="submit" type="submit" value="submit"><br>
</form>
<br>
<hr>