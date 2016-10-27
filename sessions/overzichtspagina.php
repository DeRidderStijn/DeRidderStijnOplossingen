<?php

session_start();
$inputPost = $_POST;
if (isset($_POST["submit"]))
{
	$_SESSION["deel2"]["straat"]=$_POST["straat"];
	$_SESSION["deel2"]["nummer"]=$_POST["nummer"];
	$_SESSION["deel2"]["gemeente"]=$_POST["gemeente"];
	$_SESSION["deel2"]["postcode"]=$_POST["postcode"];
}
if (isset($_SESSION["deel1"]))
{
	$email = $_SESSION["deel1"]["email"];
	$nickname = $_SESSION["deel1"]["nickname"];
}
if(isset($_SESSION['deel2']))
{
	$straat = $_SESSION['deel2']['straat'];
	$nummer = $_SESSION['deel2']['nummer'];
	$gemeente = $_SESSION['deel2']['gemeente'];
	$postcode = $_SESSION['deel2']['postcode'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Overzichtspagina</title>
	<style>
	
	</style>
</head>
<body>
<a href="killSession.php?session=destroy">Verwijder sessie</a>
	<h1>Deel1: registratiegegevens</h1>
	<?php if(isset($_SESSION['deel1']) && isset($_SESSION['deel2'])): ?>
	<ul>
		<li>e-mail: <?= $email ?><a href="registratiegegevens.php?focus=email">Wijzig</a></li>
		<li>nickname: <?= $nickname ?><a href="registratiegegevens.php?focus=nickname">Wijzig</a></li>
		<li>straat: <?= $straat ?><a href="adresgegevens.php?focus=straat">Wijzig</a></li>
		<li>nummer: <?= $nummer ?><a href="adresgegevens.php?focus=nummer">Wijzig</a></li>
		<li>gemeente: <?= $gemeente ?><a href="adresgegevens.php?focus=gemeente">Wijzig</a></li>
		<li>postcode: <?= $postcode ?><a href="adresgegevens.php?focus=postcode">Wijzig</a></li>
	</ul>	
	<?php endif ?>
</body>
</html>