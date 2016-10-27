<?php

if (isset($_POST["deel1"]))
{
	$email = $_SESSION["deel1"]["email"];
	$nickname = $_SESSION["deel1"]["nickname"];
}
else
{
	$email = "";
	$nickname = "";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registratiegegevens</title>
	<style>
	
	</style>
</head>
<body>

	<h1>Deel1: registratiegegevens</h1>
	<form action="adresgegevens.php" method="POST">
	<p>e-mail</p>
	<!-- als email geset is door $SESSION email: ... anders leeg email + als email focus meekreeg focus up dit veld-->
	<input type="text" value="<?= $email ?>" name="email" id="email" <?= (isset($_GET['focus']) && $_GET['focus'] == 'email') ? 'autofocus' : ''?>></p>
	<p>nickname</p>
	<p><input type="text" value="<?= $nickname ?>" name ="nickname" id="nickname" <?= (isset($_GET['focus']) && $_GET['focus'] == 'nickname') ? 'autofocus' : ''?>></p>
	<p><input type="submit" value="submit" name="submit"></p>
	</form>
	<a href="killSession.php?session=destroy">Verwijder sessie</a>
	
</body>
</html>