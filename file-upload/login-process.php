<?php
	session_start();
	$mail = "";
	$paswoord = "";
	if( isset($_POST["login"]))
	{
		$mail = $_POST["loginMail"];
		$paswoord = $_POST["loginPaswoord"];

		try{
			$db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', 'root');

			$queryGetUser = 	'SELECT *
								FROM users 
								WHERE email = :email';
			$getUserState = $db->prepare($queryGetUser);
			$getUserState->bindParam(':email', $mail);
			$getUserState->execute();

			while ( $row = $getUserState->fetch( PDO::FETCH_ASSOC ) )
			{
			  	$getUser[]    =  $row;
			}
			if (isset($getUser))
			{
				$salt = $getUser[0]["salt"];
				$toCheck = $getUser[0]["hashed_password"];
				if ( ($hashed_password = hash("sha512", ($salt . $paswoord)) == $toCheck))
				{
					$cookieVal = $mail . "," . hash("sha512", $mail) . $salt;
		        	setcookie( "authenticated", $cookieVal, time() + 2592000 );
		        	header("Location: dashboard.php");
				}
				else
				{
					$_SESSION["notification"] = "e-mail of paswoord foutief";
					header("Location:login-form.php");
				}
			}
			else
			{
				$_SESSION["notification"] = "dit e-mail adres bestaat niet";
				header("Location:login-form.php");
			}
		}
		catch(PDOException $e)
		{
			$messageContainer = $e->getMessage();
		}
	}
	else
	{
		//header("Location:login-form.php");
	}


?>