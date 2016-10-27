<?php

session_start(); 
if ( isset( $_GET['session'] ) )
{
    if ( $_GET['session']  == 'destroy' )
    {
        session_destroy( );
        header( 'location: killSession.php' );
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Oplossing cookie: deel1</title>
	<style>
	
	</style>
</head>
<body>
<h1>Session destroyed </h1>
<p><a href="registratiegegevens.php"><input type="button" value="back"></a></p>
	
</body>
</html>