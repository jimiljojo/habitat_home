<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">

<div class="navbar navbar-inverse">
  <div class="navbar-inner">
    <a class="brand">Habitat Volunteer Registration</a>
  </div>
</div>

<div style="padding-left: 10px;">
<?php
	$act = (isset($_GET['act'])) ? $_GET['act'] : '';
	$msg = (isset($_GET['msg'])) ? $_GET['msg'] : '';
	include 'controller/register.php';
?>
</div>