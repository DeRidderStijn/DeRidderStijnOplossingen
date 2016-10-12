<?php
	$dieren = array('hond','kat','dolfijn','slang','fret','panter','tijger');
	$count = count($dieren);
	$teZoekenDier = 'kat';
	$message = '';

	if (in_array($teZoekenDier, $dieren)) {
    	$message = $teZoekenDier . ' is gevonden';
	}
	else
	{
		$message = $teZoekenDier . ' is niet gevonden';
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Comments</title>
</head>

<body>
	<p> <?= $message ; ?> </p>
</body>
</html>