<?php
	$jaartal = 4000;
	$message ='';
	if ($jaartal % 4 == 0)
	{
		if ($jaartal % 100 != 0)
		{
			$message = 'is een schrikkeljaar';
		}
		else if ($jaartal % 400 == 0)
		{
			$message = 'is een schrikkeljaar';
		}
		else
		{
			$message = 'is geen schrikkeljaar';
		}

	}
	else
	{
		$message = 'is geen schrikkeljaar';
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>if function</title>
</head>

<body>
	<p> Het jaar <?php echo $jaartal . ' ' . $message ; ?></p>
</body>
</html>