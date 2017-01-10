<?php
	$regEx = "";
	$string = "";
	$result = "";
	if( isset( $_POST["submit"]))
	{
		$regEx = $_POST["regex"];
		$string = $_POST["string"];
		$regularexpression =preg_replace('/' . $regEx . '/', '#', $string);
		
		if ($regularexpression == $string)
		{
			$result = "Resultaat: er is geen match gevonden";
		}
		else
		{
			$result = "Resultaat: " . $regularexpression;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>regular-expressions</title>
</head>

<body>
	<h1>RegEx tester</h1>
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
		<p><label>Regular Expression</label> <input type="text" id="regex" name="regex" value="<?= $regEx ?>"></p>
		<p><label>String</label>  <textarea id="string" name="string" cols="30" rows ="10"><?= $string ?></textarea>
		<input type="submit" id="submit" name="submit">
	</form>
	<p><?= $result ; ?></p>

</body>
</html>