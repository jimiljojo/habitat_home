<script>
	function retreive(n)
	{
		var dir = "&dir=" + document.getElementById("dir").value;
		var sub = "&sub=" + document.getElementById("sub").value;
		var act = "&act=" + document.getElementById("act").value;
		//var url = "index.php?=" + dir + sub + act + "&id=" + n;
		//alert(url);
		window.location.assign("index.php?=" + dir + sub + act + "&id=" + n)
		// window.location = url;
	}
</script>
<?php
  //Author: bmw5285; copied from j*p*
	/*
	echo '<input name="dir" type="hidden" value="<?php echo $dir; ?>">';
	echo '<input name="sub" type="hidden" value="<?php echo $sub; ?>" >';
	echo '<input id="act" type="hidden" value="retrieve">';
	*/
  
  echo '<center><input type="button"  class="btn btn-primary btn-sm" onclick="history.back();" value="Back"></center>';
  echo "<br><br>";
  
  if($_GET['act'] == "listInterests")
  {
  	listInterests();
  }
  elseif($_GET['act'] == "listInterestTypes")
  {
  	listInterestTypes();
  }
  elseif($_GET['act'] == "readInterest")
  {
  	readInterest();
  }
  elseif($_GET['act'] == "readInterestType")
  {
  	readInterestType();
  }
?>
