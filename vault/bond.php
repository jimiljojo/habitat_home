<?php
	
	$commands = array(
		'echo $PWD',
		'whoami',
		'git pull',
		'git status',
		'git submodule sync',
		'git submodule update',
		'git submodule status',
	);
 
	// Run the commands for output
	$output = '';
	foreach($commands AS $command){
		// Run it
		$tmp = shell_exec($command);
		// Output
		$output .= "<span style=\"color: #6BE234;\">\$</span> <span style=\"color: #729FCF;\">{$command}\n</span>";
		$output .= htmlentities(trim($tmp)) . "\n";
	}
 
	// Make it pretty for manual user access (and why not?)
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>GIT DEPLOYMENT SCRIPT</title>
</head>
<body style="background-color: #000000; color: #FFFFFF; font-weight: bold; padding: 0 10px;">
<pre>
        0000             0000        7777777777777777/========___________
     00000000         00000000      7777^^^^^^^7777/ || ||   ___________
    000    000       000    000     777       7777/=========//
   000      000     000      000             7777// ((     //
  0000      0000   0000      0000           7777//   \\   //
  0000      0000   0000      0000          7777//========//
  0000      0000   0000      0000         7777
  0000      0000   0000      0000        7777
   000      000     000      000        7777
    000    000       000    000       77777
     00000000         00000000       7777777
       0000             0000        777777777
<?php echo $output; ?>
</pre>
</body>
</html>
