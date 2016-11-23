<?php
	function __autoload($classname){
		$filename = "classes/". $classname .".php"; 
    	include_once($filename);
	}
	
	$dog = new Animal("sparkles","male",100);
	$dolphin = new Animal("flipper", "male", 120);
	$cat = new Animal("fluffy","female",90);

	$simba = new Lion("Simba", "male", 100, "Congo lion");
	$kenia = new Lion("Kenia", "male", 100, "Kenia lion");

	$zeke = new Zebra("Zeke", "male", 100, "Quagga");
	$zana = new Zebra("zana", "male", 100, "Selous");

	$dog->changeHealth(+10);
	$dolphin->changeHealth(-10);
	$cat->changeHealth(-20);


?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>classes extended</title>
</head>

<body>
<p><?= $dog->getName() ?> is van het geslacht <?= $dog->getGender() ?> en heeft momenteel <?= $dog->getHealth() ?> special move: <?= $dog->doSpecialMove() ?></p>
<p><?= $dolphin->getName() ?> is van het geslacht <?= $dolphin->getGender() ?> en heeft momenteel <?= $dolphin->getHealth() ?> special move: <?= $dolphin->doSpecialMove() ?> </p>
<p><?= $cat->getName() ?> is van het geslacht <?= $cat->getGender() ?> en heeft momenteel <?= $cat->getHealth() ?> special move: <?= $cat->doSpecialMove() ?> </p>

<p>De speciale move van <?= $simba->getName() ?> (soort: <?= $simba->getSpecies() ?>): <?= $simba->doSpecialMove() ?>
<p>De speciale move van <?= $kenia->getName() ?> (soort: <?= $kenia->getSpecies() ?>): <?= $kenia->doSpecialMove() ?>

<p>De speciale move van <?= $zeke->getName() ?> (soort: <?= $zeke->getSpecies() ?>): <?= $zeke->doSpecialMove() ?>
<p>De speciale move van <?= $zana->getName() ?> (soort: <?= $zana->getSpecies() ?>): <?= $zana->doSpecialMove() ?>
</body>
</html>