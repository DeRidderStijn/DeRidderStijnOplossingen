<?php
	setlocale(LC_ALL, 'nld_NLD');
	$time = mktime(22,35,25,01,21,1904); //mktime — Get Unix timestamp for a date
	$date =	strftime("%d %B %Y, %H:%M:%S %p", $time);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Date</title>
</head>

<body>
	<p> datum: <?php echo $date ?></p>
</body>
</html>