<?php
session_start();
$passwordstring = "";
$passwordlength = 0;
$password = "";
$messageContainer = "";
	if ( isset( $_POST["submit"]))
	{
		$email		=	$_POST[ 'email' ];
		$password	=	$_POST[ 'paswoord' ];
		if (filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$_SESSION["registratie"]["error"] = "";
			try
			{
				$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');

				$querystring = 	'SELECT * 
									FROM users 
									WHERE email = :email';
				$statement = $db->prepare($querystring);
				$statement->bindParam(':email', $email);
				$statement->execute();

				var_dump($statement->fetch());
				$bieren   =  array();
			    while ( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
			    {
			    	$mails[]    =  $row;
			    	echo "lol";
			    }
			}
			catch(PDOException $e)
			{
				$messageContainer = $e->getMessage();
			}
		}
		else
		{
			$_SESSION["registratie"]["error"] = "geef een geldig e-mail adres in!";
			header('Location: registratie-form.php');
		}
	}
	if ( isset( $_POST["generatePass"]))
	{
		$passwordstring = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		$passwordlength = 15;
		$generatedpass = generatepass($passwordstring, $passwordlength);

		$_SESSION["registratie"]["email"] = $_POST["email"];
		$_SESSION["registratie"]["paswoord"] = $generatedpass;
		header('Location: registratie-form.php');
	}
	function generatepass($passwordstring, $passwordlength)
	{
		$password = "";
		for ($teller = 0; $teller < $passwordlength; $teller++)
		{
			$rnd = rand(0, strlen($passwordstring));
			$password .= substr($passwordstring, $rnd, 1);	
		}
		return $password;
		//header('Location: registratie-form.php');
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
	<p> <?= $messageContainer ; ?> </p>
</body>
</html>