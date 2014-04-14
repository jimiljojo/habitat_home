<?php
   
 
 	  
  

    if($updated)
		echo '<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>UPDATED</strong> You successfully updated the information.</div>';

    $donation = $donationInfo[0];
    $donor = $donationInfo[1];
    $donationtypes = $donationInfo[2];
    $type = $donation->getType();
    $details = $donation->getDetails();
    $value = $donation->getValue();
    $date = $donation->getDate();
    $time = $donation->getTime();
    $event = $donation->getEvent();
    $donor = $donor->getDonatedby();
?>

<hr>
<form action="index.php" method="GET" class="form-horizontal">
    <input name="dir" type="hidden" value="<?php echo $dir; ?>" >
    <input name="sub" type="hidden" value="<?php echo $sub; ?>" >
    <input name="did" type="hidden" value="<?php echo $donation->getDonation_id() ?>" >
    <input name="act" type="hidden" value="update" >
    <fieldset>
    <legend>Donation Info</legend>
	<div class="form-group">
    
  <label for="inputtype" class="col-lg-2 control-label">Type :</label>
      <div class="col-lg-10">
      <select name="types" id="typelist" type="text">
    <?php 
    foreach ($donationtypes as $dt) {
      if($dt->getTypeName() == $type)
        echo "<option value = '" . $dt->getIdDonationType() . "' name = '" . $dt->getTypeName() . "' selected='selected'>" . $dt->getTypeName() . "</option>";   
      else
        echo "<option value = '" . $dt->getIdDonationType() . "' name = '" . $dt->getTypeName() . "'>" . $dt->getTypeName() . "</option>";   
    }
    ?>
  </select>
    <span class="required">*</span>
      </div>
    </div>
    <div class="form-group">
      <label for="inputdetails" class="col-lg-2 control-label">Details :</label>
      <div class="col-lg-10">
        <input name="details" type="text" placeholder="Details" value="<?php echo $details; ?>" >
		<span class="required">*</span>
      </div>
    </div>
    <div class="form-group">
      <label for="inputvalue" class="col-lg-2 control-label">Value :</label>
      <div class="col-lg-10">
        <input name="value" type="text" placeholder="value" value="<?php echo $value; ?>" >
      </div>
    </div>
    <div class="form-group">
      <label for="inputdate" class="col-lg-2 control-label">Date :</label>
      <div class="col-lg-10">
        <input name="date" type="text" placeholder="date" value="<?php echo $date; ?>" >
		<span class="required">*</span>
      </div>
    </div>
     <div class="form-group">
      <label for="inputtime" class="col-lg-2 control-label">Time :</label>
      <div class="col-lg-10">
        <input name="time" type="text" placeholder="time" value="<?php echo $time; ?>" >
    <span class="required">*</span></label>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEvent" class="col-lg-2 control-label">Event :</label>
      <div class="col-lg-10">
        <input name="Event" type="text" placeholder="Event" value="<?php echo $event; ?>" disabled>
		<span class="required">*</span></label>
      </div>
    </div>
		<div class="form-group">
      <label for="inputdonor" class="col-lg-2 control-label">Donor :</label>
      <div class="col-lg-10">
        <input name="donor" type="text" placeholder="donor" value="<?php echo $donor; ?>" disabled>
		<span class="required">*</span>
      </div>
    </div>
    
    
    <input type="submit" value="update">
</form>
<hr>
