<?php
	$cijfer = 5;
	$dag = '';
	$dagLowercase = '';
	switch ($cijfer)
	{
		case 1:
		$dag = 'Maandag';
		break;

		case 2:
		$dag = 'Dinsdag';
		break;

		case 3:
		$dag = 'Woensdag';
		break;

		case 4:
		$dag = 'Donderdag';
		break;

		case 5:
		$dag = 'Vrijdag';
		break;

		case 6:
		$dag = 'Zaterdag';
		break;

		case 7:
		$dag = 'Zondag';
		break;

	}

	$dagLowercase = strtolower($dag);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Comments</title>
</head>

<body>
	<p> <?php echo 'het cijfer ' . $cijfer . ' komt overeen met ' . $dagLowercase ; ?></p>
</body>
</html>