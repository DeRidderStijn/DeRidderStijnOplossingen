<?php 
	function __autoload($classname){
		$filename = "classes/". $classname .".php"; /*laad bij opstarten alle classes op in de dir */
    	include_once($filename);
	}
	$getal1 = 150;
	$getal2 = 100;
	$percent = new Percent($getal1,$getal2);
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>classes-begin </title>
    <style>
    table{
    	border-style:double;
    }
    tr td{
    	border-style: solid;
    }
    </style>
</head>

<body>
<p>hoe staat <?php echo $getal1 ?> in verhouding tot <?php echo $getal2 ?> ?</p>
<table>
    <tr>
        <td>Relatief</td>
        <td><?= $percent->relative ?></td>
    </tr>
    <tr>
        <td>Procentueel</td>
        <td><?= $percent->hundred ?></td>
    </tr>
    <tr>
        <td>Nominaal</td>
        <td><?= $percent->nominal ?></td>
    </tr>
 
</table> 

</body>
</html>