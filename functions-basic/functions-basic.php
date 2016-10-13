<?php
$message = '';
	function berekenSom($getal1, $getal2)
	{
		return $getal1 + $getal2;
	}
	function vermenigvuldig($getal1, $getal2)
	{
		return $getal1 * $getal2;
	}
	function isEven($getal)
	{
		if ($getal % 2 == 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	if (isEven(5) == true)
	{
		$message = 'is even';
	}
	else
	{
		$message = 'is oneven';
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
	<p><?php echo 'som '. berekenSom(5,6) ; ?></p>
	<p><?php echo 'vermenigvuldiging ' . vermenigvuldig(2,3) ; ?></p>
	<p><?php echo $message ; ?></p>
</body>
</html>