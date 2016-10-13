<?php
/*
Stijn De Ridder
stijn.deridder.1@student.kdg.be
*/
$md5HashKey = 'd1fa402db91a7a93c4f414b8278ce073';

function checkHashKey1($value)
{
	global $md5HashKey;
	$occurence = substr_count($md5HashKey, $value);
	$length = strlen($md5HashKey);
	$percent = ($occurence / $length) * 100;
	return $percent;
}
function checkHashKey2($hashkey, $value)
{
	$occurence = substr_count($hashkey, $value);
	$length = strlen($hashkey);
	$percent = ($occurence / $length) * 100;
	return $percent;
}
function checkHashKey3($value)
{
	static $md5HashKey = 'd1fa402db91a7a93c4f414b8278ce073';
	$occurence = substr_count($md5HashKey, $value);
	$length = strlen($md5HashKey);
	$percent = ($occurence / $length) * 100;
	return $percent;
}

?>

<!DOCTYPE html>
<html>
   <head>
      <title>functions gevorderd</title>
   </head>
   <body>
   		<p><?php echo (" De needle 2 komt ". checkHashKey1(2). "% voor in de hash key " . $md5HashKey); ?></p>
   		<p><?php echo (" De needle 8 komt ". checkHashKey2($md5HashKey, 8). "% voor in de hash key " . $md5HashKey);	 ?></p>
   		<p><?php echo (" De needle 2 komt ". checkHashKey3("a"). "% voor in de hash key " . $md5HashKey); ?></p>

   </body>
</html>