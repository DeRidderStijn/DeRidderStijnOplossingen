<?php
	$boodschappenlijstje = array('frietjes', 'tomaten', 'sla', 'ajuin');
	$lengte = count($boodschappenlijstje);
	$teller=0;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Comments</title>
</head>

<body>
	<ul>
		<?php 
			while ($teller < $lengte)
			{
				?>
				<li><?php echo $boodschappenlijstje[$teller] ; ?></li>
				<?php
				$teller += 1;
			}
		?>
	</ul>
</body>
</html>