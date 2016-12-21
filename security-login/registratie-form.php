<?php
	session_start();
	$email = "";
	$pass = "";
	if ( isset( $_SESSION["registratie"]))
	{	
		$email = $_SESSION["registratie"]["email"];
		$pass = $_SESSION["registratie"]["paswoord"];
		echo "fluffy kittens parade";
		if (isset($_SESSION["registratie"]["error"]))
		{
			echo "foutjes ";
		}
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
	<h1>Registreren</h1>
	<form action="registratie-process.php" method="POST">
		<label>e-mail</label>
		<input type="text" id="email" name="email" value="<?= $email ?>"><br>
		<label>paswoord</label>
		<input type="text" id="paswoord" name="paswoord" value="<?= $pass ?>">
		<input type="submit" id="generatePass" name="generatePass" value="genereer paswoord"><br>
		<input type="submit" id="submit" name="submit" value="registreer">
	</form>
</body>
</html>