<?php 

	function __autoload($className)
	{
		include_once 'classes/' . $className . '.php'; 
	}

	$body 	= (isset( $_GET['page'] ) ? $_GET['page'] : 'index') . '-body.partial.php';
	
	$page	=	new HTMLbuilder('header.partial.php', $body, 'footer.partial.php');


?>