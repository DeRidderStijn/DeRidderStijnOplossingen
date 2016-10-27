<?php

session_start();

	if (isset($_POST["submit"]))
	{
		$_SESSION["deel1"]["email"] = $_POST["email"];
		$_SESSION["deel1"]["nickname"]= $_POST["nickname"];
	}
	$email = $_SESSION['deel1']['email'];
	$nickname = $_SESSION['deel1']['nickname'];

	if(isset($_SESSION['deel2']))
	{
		$straat = $_SESSION['deel2']['straat'];
		$nummer = $_SESSION['deel2']['nummer'];
		$gemeente = $_SESSION['deel2']['gemeente'];
		$postcode = $_SESSION['deel2']['postcode'];
	}
	else{
		$straat = '';
		$nummer = '';
		$gemeente = '';
		$postcode = '';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Adresgegevens</title>
	<style>
	
	</style>
</head>
<body>
	<p><?php var_dump($_SESSION) ?></p>
	<h1>Deel1: adresgegevens</h1>
	<a href="killSession.php?session=destroy">Verwijder sessie</a>
	<?php if(isset($_SESSION['deel1']) ): ?>
	
		<p><li>e-mail: <?= $email ?></p>
		<p>nickname: <?= $nickname ?></p>
	<?php endif ?>

	<form action="overzichtspagina.php" method="POST">
		<p>straat</p>
		<p><input type="text" value="<?= $straat ?>" name="straat" id="straat" <?= (isset($_GET['focus']) && $_GET['focus'] == 'straat') ? 'autofocus' : ''?>></p>
		<p>nummer</p>
		<p><input type="text" value="<?= $nummer ?>" name="nummer" id="nummer" <?= (isset($_GET['focus']) && $_GET['focus'] == 'nummer') ? 'autofocus' : ''?>></p>
		<p>gemeente</p>
		<p><input type="text" value="<?= $gemeente ?>" name="gemeente" id="gemeente" <?= (isset($_GET['focus']) && $_GET['focus'] == 'straat') ? 'autofocus' : ''?>></p>
		<p>postcode</p>
		<p><input type="text" value="<?= $postcode ?>" name="postcode" id="postcode" <?= (isset($_GET['focus']) && $_GET['focus'] == 'postcode') ? 'autofocus' : ''?>></p>
		<p><input type="submit" value="submit" name="submit"></p>
	</form>

</body>
</html>