<?php
	
	// FILE: Registration Interests View

	// AUTHOR: des301

	global $act;
	global $msg;
	global $total;
?>
<style>
    label
    {
        padding-left: 10px;
        
    }
    input
    {
        margin-bottom: 8px;
    }
    </style>
<h4>Other Information</h4>
<br/>
<?php include 'progress.php'; ?>
<hr>
<form  action="index.php" method="get">
    <input name="act" type="hidden" value="<?php echo $act;?>" >
    I have special talents/skills in the following areas</br>
    <textarea cols="40" rows="4" name="other"></textarea><br/>

    </br>
    I prefer to receive York Habitat for Humanity mail<br/>
    </br>
    <input type="radio" name="receive" value="none" selected="selected"><label>none</label>
    <input type="radio" name="receive" value="home"><label>home</label>
    <input type="radio" name="receive" value="work"><label>work</label><br/>
    <br/>
    I am available to volunteer in the <span class="note">(check all that apply)</span><br/>
    <input type="checkbox" name="day"><label>day</label><br/>
    <input type="checkbox" name="eve"><label>evening</label><br/>
    <input type="checkbox" name="wend" checked="checked"><label>weekends</label><br/>
    <br/>
    <input type="checkbox" name="age" checked="checked"><label>I am 16 years or older</label><br/>
    <br/>
    <input type="checkbox" name="photo" checked="checked"><label>I understand a personal photograph may be used in appropriate newspapers and/or newsletters. <span class="note">(This will help to highlight your service to the community and our affiliate.)</span><label><br/>
    <br/>
    <input name="signature" type="text" value="John Doe"><label>Signature</label><br/>
    <input name="date" type="text" value="4/26/13"><label>Date</label><br/>
    <br>
    <input class="btn btn-success" name="submit" type="submit" value="submit"><br>
</form>
<br>
<hr>