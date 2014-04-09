<center><input type="button"  class="btn btn-primary btn-sm" onclick="history.back();" value="Back"></center>
<hr>
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
		<span class="required">*</span></label>
      </div>
    </div>
		<div class="form-group">
      <label for="inputdonor" class="col-lg-2 control-label">Donor :</label>
      <div class="col-lg-10">
        <input name="donor" type="text" placeholder="donor" value="" >
		<span class="required">*</span>
      </div>
    </div>
    
    
    <input type="submit" value="Create">
</form>
<hr>