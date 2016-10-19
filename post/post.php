<?php
$password = "azerty";
$username = "stijn";
$message = "Gelieve in te loggen";

if ( isset( $_POST["submit"]))
{
	if ((($_POST["password"]) == $password) && (($_POST["username"]) == $username))
	{
		$message = "Welkom";
	}
	else
	{
		$message = "Er ging iets mis bij het inloggen, probeer opnieuw";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Post</title>
</head>

<body>
	<h1>inloggen</h1>
   		<form action="post.php" method="POST">
   			gebruikersnaam: <br>
   			<input type="text" id="username" name="username"> <br>
   			paswoord: <br>
   			<input type="password" id="password" name="password"> <br>
   			<input type="submit" id="submit" name="submit">
   		</form>
   		<?php echo $message; ?>
</body>
</html>