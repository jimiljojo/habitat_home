<?php
   
 
 	  $org = $orginfo[0];
    $contact = $orginfo[1];
    $address = $orginfo[2];
    $orgname = $org[0]->getName();
    $street1 = $address[0]->getStreet1();
    $street2 = $address[0]->getStreet2();
    $city = $address[0]->getCity();
    $state = $address[0]->getState();
    $zip = $address[0]->getZip();
    $phone = $contact[0]->getPhone();
    $email = $contact[0]->getEmail();
    $workPhone = $contact[0]->getPhone2();
    $workExt = $contact[0]->getExtension();
  

    if($updated)
		echo '<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>UPDATED</strong> You successfully updated the information.</div>';
?>
<center><input type="button"  class="btn btn-primary btn-sm" onclick="history.back();" value="Back"></center>
<hr>
<form action="index.php" method="GET" class="form-horizontal">
    <input name="dir" type="hidden" value="<?php echo $dir; ?>" >
    <input name="sub" type="hidden" value="<?php echo $sub; ?>" >
    <input name="oid" type="hidden" value="<?php echo $org[0]->getOrganization_id(); ?>" >
    <input name="act" type="hidden" value="update" >
    <fieldset>
    <legend>Organization Info</legend>
	<div class="form-group">
  <label for="inputname" class="col-lg-2 control-label">Organization Name :</label>
      <div class="col-lg-10">
        <input name="orgname" type="text" placeholder="name" value="<?php echo $orgname; ?>" >
    <span class="required">*</span>
      </div>
    </div>
    <div class="form-group">
      <label for="inputstreet1" class="col-lg-2 control-label">Street :</label>
      <div class="col-lg-10">
        <input name="street1" type="text" placeholder="street 1" value="<?php echo $street1; ?>" >
		<span class="required">*</span>
      </div>
    </div>
    <div class="form-group">
      <label for="inputstreet2" class="col-lg-2 control-label">Apt/Suit :</label>
      <div class="col-lg-10">
        <input name="street2" type="text" placeholder="street 2" value="<?php echo $street2; ?>" >
      </div>
    </div>
    <div class="form-group">
      <label for="inputcity" class="col-lg-2 control-label">City :</label>
      <div class="col-lg-10">
        <input name="city" type="text" placeholder="city" value="<?php echo $city; ?>" >
		<span class="required">*</span>
      </div>
    </div>
    <div class="form-group">
      <label for="inputState" class="col-lg-2 control-label">State :</label>
      <div class="col-lg-10">
        <select name="state">
		    <option value="MD">MD</option>
		    <option value="PA" selected="selected">PA</option>
		    <option value="TX">TX</option>
		</select>
		<span class="required">*</span>
      </div>
    </div>
     <div class="form-group">
      <label for="inputzip" class="col-lg-2 control-label">Zip :</label>
      <div class="col-lg-10">
        <input name="zip" type="text" placeholder="zip" value="<?php echo $zip; ?>" >
    <span class="required">*</span></label>
      </div>
    </div>
    <div class="form-group">
      <label for="inputphone" class="col-lg-2 control-label">Phone :</label>
      <div class="col-lg-10">
        <input name="phone" type="text" placeholder="phone" value="<?php echo $phone; ?>" >
		<span class="required">*</span></label>
      </div>
    </div>
		<div class="form-group">
      <label for="inputemail" class="col-lg-2 control-label">Email :</label>
      <div class="col-lg-10">
        <input name="email" type="text" placeholder="email" value="<?php echo $email; ?>" >
		<span class="required">*</span>
      </div>
    </div>
    <div class="form-group">
      <label for="inputworkPhone" class="col-lg-2 control-label">Work Phone :</label>
      <div class="col-lg-10">
      	<input name="workPhone" type="text" placeholder="work phone" value="<?php echo $workPhone; ?>" >
      </div>
    </div>
    <div class="form-group">
      <label for="inputworkExt" class="col-lg-2 control-label">Extension :</label>
      <div class="col-lg-10">
       <input name="workExt" type="text" placeholder="ext" value="<?php echo $workExt; ?>" >
		<span class="required">*</span>
      </div>
    </div>
    
    <input type="submit" value="update">
</form>
<hr>
