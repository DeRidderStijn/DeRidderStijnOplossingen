<?php 
session_start();
$showContent = false;

if ( isset($_POST["deleteCookie"]))
{
	setcookie("authenticated","", time() - 10000 );
	$_SESSION["notification"] = "U bent uitgelogd. Tot de volgende keer";
	header("Location: login-form.php");
}
if ( isset( $_COOKIE["authenticated"] ) ) 
{
	$isAuthenticated  =  true;
	$cookieval = explode(",", $_COOKIE["authenticated"]);
	$email = $cookieval[0];
	$toCheck = $cookieval[1];

	$salt = "";
	try
			{
				$db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', 'root');

				$queryGetSalt = 	'SELECT salt
									FROM users 
									WHERE email = :email';
				$getSaltState = $db->prepare($queryGetSalt);
				$getSaltState->bindParam(':email', $email);
				$getSaltState->execute();

			    while ( $row = $getSaltState->fetch( PDO::FETCH_ASSOC ) )
			    {
			    	$getSalt[]    =  $row;
			    }
			    $salt = ($getSalt[0]["salt"]);
			    if (checkSalt($salt, $email, $toCheck))
			    {
			    	$showContent = true;
			    }
			    else
			    {
			    	$showContent = false;
			    	setcookie("authenticated","", time() - 10000 );
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
	header("Location:login-form.php");
}
function checkSalt($salt, $email, $toCheck)
{
	$check = hash("sha512", $email) . $salt;
	if ($check == $toCheck)
	{
		return true;
	}
	else
	{
		return false;
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
	<?php if($showContent) : ?>
		<h1>Dashboard</h1>
		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
		<input type="submit" id="deleteCookie" name="deleteCookie" value="Logout"><br>
		<a href="">uitloggen</a>
	<?php endif; ?>
</body>
</html>