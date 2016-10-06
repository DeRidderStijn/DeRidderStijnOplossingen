<?php
$voornaam = 'Stijn';
$familienaam ='De Ridder';
$volledigenaam = $voornaam . ' ' . $familienaam;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Comments</title>
</head>

<body>
	<?= $volledigenaam ; ?>
</body>
</html>