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
  
  if($_GET['act'] == "listSchedule")
  {
  	listSchedule();
  }
  elseif($_GET['act'] == "listScheduleSlot")
  {
  	listScheduleSlot();
  }
  elseif($_GET['act'] == "readScheduleByEvent")
  {
  	readScheduleByEvent();
  }
  elseif($_GET['act'] == "readScheduleByName")
  {
  	readScheduleByName();
  }
?>
