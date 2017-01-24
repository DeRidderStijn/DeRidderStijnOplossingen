<?php
	$messageContainer = "";
	session_start();
	if ( isset( $_SESSION["notification"]))	
	{
		$messageContainer = $_SESSION["notification"];
	}

?>

<body>
	<p> <?= $messageContainer ;?></p>
	<form action="login-process.php" method="post">
		<h1>Inloggen</h1>
		<label>e-mail</label>
		<input type="text" id="loginMail" name="loginMail"><br>
		<label>paswoord</label>
		<input type="text" id="loginPaswoord" name="loginPaswoord"><br>
		<input type="submit" id="login" name="login" value="Inloggen"><br>
		<p>Nog geen account? Maak er dan eentje aan op de <a href="registratie-form.php">registratiepagina.</a></p>
	</form>
</body>
</html>