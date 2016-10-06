<?php
	$getal = 4;
	$dag ='';
	if ($getal == 1){$dag = 'maandag';}
	if ($getal == 2){$dag = 'dinsdag';}
	if ($getal == 3){$dag = 'woensdag';}
	if ($getal == 4){$dag = 'donderdag';}
	if ($getal == 5){$dag = 'vrijdag';}
	if ($getal == 6){$dag = 'zaterdag';}
	if ($getal == 7){$dag = 'zondag';}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>if function</title>
</head>

<body>
	<p> het is vandaag: <?= $dag ; ?></p>
</body>
</html>