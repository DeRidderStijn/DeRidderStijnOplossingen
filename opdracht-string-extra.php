<?php
	$fruit = 'kokosnoot';
	$stringlength = strlen($fruit);
	$pos = strpos($fruit, 'o');

	$fruit2 = 'ananas';
	$laatstea = strrpos($fruit2, 'a');
	$uppercase = strtoupper($fruit2);

	$lettertje = 'e';
	$cijfertje = 3;
	$langsteWoord = 'zandzeepsodemineralenwatersteenstralen';
	$newphrase = str_replace($lettertje, $cijfertje, $langsteWoord);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>String extra functions</title>
</head>

<body>
	<h1> Deel 1 </h1>
	<p> <?php echo $fruit . ' telt ' . $stringlength . ' karakters' ;?> </p>
	<p> De positie van de eerste 'o' is: <?php echo $pos ; ?></p>

	<h1>Deel 2 </h1>
	<p> De positie van de laatste 'a' in <?php echo $uppercase . ' is ' . $laatstea; ?> </p>

	<h1>Deel 3 </h1>
	<p> <?= $newphrase ; ?>
</body>
</html>