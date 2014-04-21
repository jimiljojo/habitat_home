<?php
 

    if($updated)
		echo '<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>UPDATED</strong> You successfully updated the information.</div>';
?>

<script type="text/javascript">
  function enterEvent() {
    var chkBox = document.getElementById("isFOH");
    var txtBox = document.getElementById("events");
    if(chkBox.checked)
      txtBox.style.visibility = "visible";
    else
      txtBox.style.visibility = "hidden";
      }
</script>

<hr>
<form action="index.php" method="GET" class="form-horizontal">
    <input name="dir" type="hidden" value="<?php echo $dir; ?>" >
    <input name="sub" type="hidden" value="<?php echo $sub; ?>" >
    <input name="act" type="hidden" value="confirmCreate" >
    <fieldset>
    <legend>Person Info</legend>
	<div class="form-group">
      <label for="inputTitle" class="col-lg-2 control-label">Title</label>
      <div class="col-lg-10">
        <select name="title" type="text">
		    <option value="Mr" selected="selected">Mr.</option>;
		    <option value="Mrs">Mrs.</option>;
		    <option value="Ms">Ms.</option>;
		    <option value="Dr">Dr.</option>;
		    <span class="required">*</span>
		</select>
      </div>
    </div>
	<div class="form-group">
      <label for="inputfName" class="col-lg-2 control-label">First Name :</label>
      <div class="col-lg-10">
        <input name="fName" type="text" placeholder="first name"  >
		<span class="required">*</span>
      </div>
    </div>
		<div class="form-group">
      <label for="inputlName" class="col-lg-2 control-label">Last Name :</label>
      <div class="col-lg-10">
        <input name="lName" type="text" placeholder="last name"   >
		<span class="required">*</span>
      </div>
    </div>
    <div class="form-group">
      <label for="inputstreet1" class="col-lg-2 control-label">Street :</label>
      <div class="col-lg-10">
        <input name="street1" type="text" placeholder="street 1"  >
		<span class="required">*</span>
      </div>
    </div>
    <div class="form-group">
      <label for="inputstreet2" class="col-lg-2 control-label">Apt/Suit :</label>
      <div class="col-lg-10">
        <input name="street2" type="text" placeholder="street 2"  >
      </div>
    </div>
    <div class="form-group">
      <label for="inputcity" class="col-lg-2 control-label">City :</label>
      <div class="col-lg-10">
        <input name="city" type="text" placeholder="city" >
		<span class="required">*</span>
      </div>
    </div>
    <div class="form-group">
      <label for="inputState" class="col-lg-2 control-label">State :</label>
      <div class="col-lg-10">
        <select name="state">
		    <option value="20">MD</option>
		    <option value="38" selected="selected">PA</option>
		    <option value="43">TX</option>
		</select>
		<span class="required">*</span>
      </div>
    </div>
    <div class="form-group">
      <label for="inputzip" class="col-lg-2 control-label">Zip :</label>
      <div class="col-lg-10">
        <input name="zip" type="text" placeholder="zip"  >
    <span class="required">*</span></label>
      </div>
    </div>
    <div class="form-group">
      <label for="inputphone" class="col-lg-2 control-label">Phone :</label>
      <div class="col-lg-10">
        <input name="phone" type="text" placeholder="phone"  >
		<span class="required">*</span></label>
      </div>
    </div>
		<div class="form-group">
      <label for="inputemail" class="col-lg-2 control-label">Email :</label>
      <div class="col-lg-10">
        <input name="email" type="text" placeholder="email"  >
		<span class="required">*</span>
      </div>
    </div>
    <div class="form-group">
      <label for="inputemployer" class="col-lg-2 control-label">Employer :</label>
      <div class="col-lg-10">
       <input name="employer" type="text" placeholder="employer" >
      </div>
    </div>
    <div class="form-group">
      <label for="inputjobtitle" class="col-lg-2 control-label">Job Title :</label>
      <div class="col-lg-10">
       <input name="jobtitle" type="text" placeholder="job title" >
      </div>
    </div>
    <div class="form-group">
      <label for="inputworkPhone" class="col-lg-2 control-label">Work Phone :</label>
      <div class="col-lg-10">
      	<input name="workPhone" type="text" placeholder="work phone" >
      </div>
    </div>
    <div class="form-group">
      <label for="inputworkExt" class="col-lg-2 control-label">Extension :</label>
      <div class="col-lg-10">
       <input name="workExt" type="text" placeholder="ext" >
		<span class="required">*</span>
      </div>
    </div>
    <div class="form-group">
     <label for="inputMarriage" class="col-lg-2 control-label">Maritial Status :</label>
    <div class="col-lg-10">
    <input type="radio" name="maritial" value="1" id="maritial" required="required"><label>Single</label><br>
    <input type="radio" name="maritial" value="2" id="maritial" required="required"><label>Married</label><br>
    <input type="radio" name="maritial" value="3" id="maritial" required="required"><label>Widow</label><br>
    <input type="radio" name="maritial" value="4" id="maritial" required="required"><label>Divorced</label><br>
    </div></div>
     <div class="form-group">
      <label for="foh" class="col-lg-2 control-label">Is this person a Friend of Habitat ? </label>
      <div class="col-lg-10">
    <input type="checkbox" id="isFOH" name="isFOH" OnChange="enterEvent()">
  </div>
  </div>

    <div class="form-group" id="events" style="visibility: hidden;">
      <label for="inputTitle" class="col-lg-2 control-label">Where did you meet :</label>
      <div class="col-lg-10">
        <select name="events" id="eventlist" type="text">
        <?php //creates drop down menu options AND alphabetizes 
        //require_once '/class/interest.php';
        $events = $dbio->readAllEvent();
        //$hold = array();
        foreach($events as &$event)
        {
          $eventId = $event->getEvent_id();
          $eventTitle = $event->getTitle();
          echo "<option value = '{$eventId}' name = '{$eventTitle}'>{$eventTitle}</option>";
        }
      ?>
        <span class="required">*</span>
    </select>
      </div>
    </div>

    <input type="submit" value="Create">
</form>
<hr>
