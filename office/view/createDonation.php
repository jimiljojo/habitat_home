<center><input type="button"  class="btn btn-primary btn-sm" onclick="history.back();" value="Back"></center>
<hr>

<script type="text/javascript">
  function enterPerson() {
    document.getElementById("person").style.display = "block";
    document.getElementById("organization").style.display = "none";
  }
  function enterOrg() {
    document.getElementById("organization").style.display = "block";
    document.getElementById("person").style.display = "none";
  }

  function showEvents(){
    document.getElementById("events").style.display = "block";
  }

  function showPeople(){
    alert('ola');
    document.getElementById("people").style.display = "block";
  }


</script>


<form action="index.php" method="GET" class="form-horizontal">
    <input name="dir" type="hidden" value="<?php echo $dir; ?>" >
    <input name="sub" type="hidden" value="<?php echo $sub; ?>" >
    <input name="act" type="hidden" value="confirmCreate" >
    <fieldset>
    <legend>Donation Info</legend>
	<div class="form-group">
    
  <label for="inputtype" class="col-lg-2 control-label">Type :</label>
      <div class="col-lg-10">
      <select name="type" id="typelist" type="text">
    <?php 
    $donationtypes = $dbio->readDonationtype();
    foreach ($donationtypes as $dt) {
      if($dt->getTypeName() == $type)
        echo "<option value = '" . $dt->getTypeName() . "' name = '" . $dt->getTypeName() . "' selected='selected'>" . $dt->getTypeName() . "</option>";   
      else
        echo "<option value = '" . $dt->getTypeName() . "' name = '" . $dt->getTypeName() . "'>" . $dt->getTypeName() . "</option>";   
    }
    ?>
  </select>
    <span class="required">*</span>
      </div>
    </div>
    <div class="form-group">
      <label for="inputdetails" class="col-lg-2 control-label">Details :</label>
      <div class="col-lg-10">
        <input name="details" type="text" placeholder="Details" value="" >
		<span class="required">*</span>
      </div>
    </div>
    <div class="form-group">
      <label for="inputvalue" class="col-lg-2 control-label">Value :</label>
      <div class="col-lg-10">
        <input name="value" type="text" placeholder="value" value="" >
      </div>
    </div>
    <div class="form-group">
      <label for="inputdate" class="col-lg-2 control-label">Date :</label>
      <div class="col-lg-10">
        <input name="date" type="text" placeholder="date" value="" >
		<span class="required">*</span>
      </div>
    </div>
     <div class="form-group">
      <label for="inputtime" class="col-lg-2 control-label">Time :</label>
      <div class="col-lg-10">
        <input name="time" type="text" placeholder="time" value="" >
    <span class="required">*</span></label>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEvent" class="col-lg-2 control-label">Event :</label>
      <div class="col-lg-10">
        <input name="event" type="text" placeholder="event" value="" >
        <button type="button" onclick="showEvents();">Show All</button>
        <div id="events" style="display : none">
          <table>
          <?php
          foreach ($events as $event) {
            echo '<tr>';
            echo '<td>' . $event->getTitle() . '</td>';
            echo '</tr>';
          }
          ?>
        </table>
        </div>
		<span class="required">*</span></label>
      </div>
    </div>
		<div class="form-group">
      <label class="col-lg-2 control-label">Donor :</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input type="radio" name="donoroption" id="optionPerson" value="person" checked="" onclick='enterPerson();'>
            Person
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="donoroption" id="optionsOrganization" value="organization" onclick='enterOrg();'>
            Organiation
          </label>
        </div>
      </div>
    </div>
    <div id="person">
      <input id="fname" name="fname" placeholder="first name" type="text">
      <input id="lname" name="lname" placeholder="last name" type="text">
       <button type="button" onlick='showPeople();'>Show All</button>
       <div id="people" style="display : none">
          <table>
          <?php
          foreach ($people as $person) {
            echo '<tr>';
            echo '<td>' . $person->getFirst_name() . '</td>';
            echo '<td>' . $person->getLast_name() . '</td>';
            echo '<td>' . $person->getDob() . '</td>';
            echo '</tr>';
          }
          ?>
        </table>
        </div>
    </div>
    <div id="organization" style="display : none">
    <input id="org" name="org" placeholder="Organization" type="text" >
    <input type="button" value="Search">
  </div><br>
    
    
    <input type="submit" value="Create">
</form>
<hr>