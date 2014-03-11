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
<form  action="index.php" method="get" onsubmit="return checkSubmit()" style="display: inline;">
    <input name="act" type="hidden" value="<?php echo $act;?>" >
    <h4 class="show" onclick="swap(this);">General Information</h4><div><table class="intTable">
    <tr><td>Church or Group Affiliate</td><td><input type="text" name="church"></td></tr><br>
    <tr><td><span class="mandatory">*</span>Are you a Church Ambassador?</td><td><select name="ambassador" id="ambassador"><option></option><option>Yes</option><option>No</option></select></td></tr>
</table></div>
    <h4 class="show" onclick="swap(this);">Contact Preference<span class="mandatory">*</span></h4><div><table class="intTable">
    <!-- <input type="radio" name="receive" value="none" selected="selected"><label>Phone</label>
    <input type="radio" name="receive" value="home"><label>Mail</label>
    <input type="radio" name="receive" value="work"><label>Email</label><br/> -->
    <input type="checkbox" name="checkPhone" value="phone"><label>Phone</label><br>
    <input type="checkbox" name="checkMail" value="mail"><label>Mail</label><br>
    <input type="checkbox" name="checkEmail" value="email"><label>Email</label><br></table></div>


    <br/>
    <h4 class="show" onclick="swap(this);">Volunteer Availability<span class="mandatory">*</span></h4><div><table class="intTable">
    I am available to volunteer in the <span class="note">(check all that apply)</span><br/>
    <input type="checkbox" name="day"><label>day</label><br/>
    <input type="checkbox" name="eve"><label>evening</label><br/>
    <input type="checkbox" name="wend" checked="checked"><label>weekends</label><br/></table></div>
    <br/>
    <h4 class="show" onclick="swap(this);">Consent</h4><div><table class="intTable">
    <label><b><span class="mandatory">*</span>I am : </b><span class="note">(Check the one which applies to you.)</span></label><br/>
    <input type="radio" name="age" value="1" id="age" required="required"><label>Less than 18 years of age and have read the <a href="http://www.yorkhabitat.org/TDE_CMS/database/userfiles/file/2013/YorkHabitatMinorWaiverRelease.pdf" target="_blank">Minor Waiver</a></label> &nbsp&nbsp<span class="note">(You must be 16 years old or older to work on site.)</span><br>
    <input type="radio" name="age" value="2" id="age" required="required"><label>Greater than 18 years of age</label><br>
    <br/>
    <input type="checkbox" name="photo" ><label>I understand a personal photograph may be used in appropriate newspapers and/or newsletters. <span class="note">(This will help to highlight your service to the community and our affiliate.)</span><label><br/>
    <br/>
    <label><b><span class="mandatory">*</span>Please Click and read the <a href="http://www.yorkhabitat.org/TDE_CMS/database/userfiles/file/2013/ConstructionSafety.pdf" target="_blank">Construction Safety Guidelines</a></b></label><br>
    <input type="checkbox" name="safety" id="safety"><label>I have read the Construction Safety Guidelines</label><br/>
    <br/>
    <label><b><span class="mandatory">*</span>Please Click and watch the <a href="http://www.yorkhabitat.org/TDE_CMS/database/userfiles/file/ConstructionVideo.html" target="_blank">Construction Safety Video</a></b></label><br>
    <input type="checkbox" name="video" id="video"><label>I have watched the Construction Safety Video</label><br/>
    </br>

    <label><b><span class="mandatory">*</span>Please Click and read the <a href="http://www.yorkhabitat.org/TDE_CMS/database/userfiles/file/waiverform20120711.pdf" target="_blank">Liability Waiver Form</a></b></label><br>
    <input type="checkbox" name="waiver" id="waiver"><label>I accept the terms of the liability waiver form</label><br/>
    </br> </table></div>
    </br>

    <table><tr><td><label><span class="mandatory">*</span>Signature</label></td><td><input name="signature" type="text" id="signature"></td><td>&nbsp <label>(Enter your First name and Last name)</td> </tr><br/>
    <tr><td><label>Date & Time</label></td><td><input name="date" type="text" id="date" readonly="readonly">
    <script type="text/javascript">    
    document.getElementById("date").value = Date().toString();    
    </script></td></tr></table><br/>
    <br/>

    <script type="text/javascript">
        function checkSubmit() {

        if (document.getElementById('ambassador').value==""
                 || document.getElementById('ambassador').value==undefined)
                {
                    alert ("Please Select whether you are a Church Ambassador or not!");
                    return false;
                }

        if (document.getElementById('safety').checked == false) {
        alert ("Please read the 'Construction Safety Guidelines' and agree to it.");
        return false;
        } 

        if (document.getElementById('video').checked == false) {
        alert ("Please watch the 'Construction Safety Video' and agree to it.");
        return false;
        } 

        if (document.getElementById('waiver').checked == false) {
        alert ("Please read the 'Liability Waiver Form' and agree to it.");
        return false;
        } 

        if (document.getElementById('signature').value==""
                 || document.getElementById('signature').value==undefined)
                {
                    alert ("Please Enter your 'Signature'");
                    return false;
                }

        

        else {
        return true;

        }

    }

    </script>

    <input class="btn btn-success" name="submit" type="submit" value="submit"><br>
</form>
<br>
<hr>