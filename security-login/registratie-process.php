<?php
session_start();
$passwordstring = "";
$passwordlength = 0;
$password = "";
$messageContainer = "";
	if ( isset( $_POST["submit"]))
	{
		$email		= $_SESSION["registratie"]["email"] = $_POST[ 'email' ];
		$password	=	$_POST[ 'paswoord' ];
		if (filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$_SESSION["registratie"]["error"] = "";
			try
			{
				$db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', 'root');

				$queryCheckMail = 	'SELECT * 
									FROM users 
									WHERE email = :email';
				$checkMailState = $db->prepare($queryCheckMail);
				$checkMailState->bindParam(':email', $email);
				$checkMailState->execute();

			    while ( $row = $checkMailState->fetch( PDO::FETCH_ASSOC ) )
			    {
			    	$checkMails[]    =  $row;
			    }
			    if (isset($checkMails))
			    {
			    	$_SESSION["registratie"]["error"] = "Dit e-mail adres bestaat al!";
			    	header('Location: registratie-form.php');
			    }
			    else
			    {
			    	createUser($email, $password);	
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

	function createUser($email, $paswoord)
	{
		$db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', 'root');
		$queryInsert =  'INSERT INTO users(email, salt, hashed_password, last_login_time)
                  		VALUES ( :email, :salt, :hashed_password, NOW())';

        $insertState = $db->prepare($queryInsert);
        $salt = uniqid(mt_rand(), true);
        $hashed_password = hash("sha512", ($salt . $paswoord));

        $insertState->bindValue(":email", $email);
        $insertState->bindValue(":salt", $salt);
        $insertState->bindValue(":hashed_password", $hashed_password);

        $insertSucces = $insertState->execute();
        if($insertSucces)
        {
        	$cookieVal = $email . "," . hash("sha512", $email) . $salt;
        	setcookie( "authenticated", $cookieVal, time() + 2592000 );
        	header("Location: dashboard.php");
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
	<p> <?= $messageContainer ; ?> </p>
</body>
</html>