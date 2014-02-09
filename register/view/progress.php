<?php
	// FILE: Registration Progress View

	// AUTHOR: des301
	global $total;
	$width = 500 + (2 * $total);
	
?>
<style>
	.barCom, .barYet {
		width: <?php echo ($width / $total); ?>px;
		border: 1px solid black;
		text-align: center;
	}
	.barCom, .barYet, label {display: inline;}
	.barCom {background-color: #006dcc; padding-right:5px; color: #fff;}
	.barYet {background-color: #da4f49; padding-right:5px; color: #fff;}
        .barYet:last-child 
        {
            border-top-right-radius: .75em;
            border-bottom-right-radius: .75em;
            
        }
        
        .barCom:first-of-type
        {
            border-top-left-radius: .75em;
            border-bottom-left-radius: .75em;
        }
        
  
        
 
</style>
<div id="progressBar" style="width: <?php echo $width; ?>px;">
	<label class="bold">Progress</label>
	<?php
		for ($i = 1; $i <= $total; $i++) {
			$class = ($i <= $progress ) ? 'barCom' : 'barYet';
			echo ('<dir class="' . $class . '">' . $i . '</dir>');
		}// end for
	?>
</div>