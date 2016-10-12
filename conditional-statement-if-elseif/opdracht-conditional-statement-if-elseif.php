<?php

	$getal = 58;
	$message = '';

	if ($getal <= 100 && $getal > 0)
	{
		if ($getal >= 90)
		{
			$message = 'Het getal ligt tussen 90 en 100';
		}
		elseif ($getal >= 80)
		{
			$message = 'Het getal ligt tussen 80 en 90';
		}
		elseif ($getal >= 70)
		{
			$message = 'Het getal ligt tussen 70 en 80';
		}
		elseif ($getal >= 60)
		{
			$message = 'Het getal ligt tussen 60 en 70';
		}
		elseif ($getal >= 50)
		{
			$message = 'Het getal ligt tussen 50 en 60';
		}
		elseif ($getal >= 40)
		{
			$message = 'Het getal ligt tussen 40 en 50';
		}
		elseif ($getal >= 30)
		{
			$message = 'Het getal ligt tussen 30 en 40';
		}
		elseif ($getal >= 20)
		{
			$message = 'Het getal ligt tussen 20 en 30';
		}
		elseif ($getal >= 10)
		{
			$message = 'Het getal ligt tussen 10 en 20';
		}
		else
		{
			$message = 'Het getal ligt tussen 0 en 10';
		}
	}
	$messReverse = strrev($message);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Comments</title>
</head>

<body>
	<p><?= $messReverse ; ?></p>
</body>	
</html>