<?php
	$multiplier = 0;

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Comments</title>
	<style>
		.green{
			background-color: green;
		}
	</style>
</head>

<body>
	<table>
		<?php
			for($getal = 0; $getal <= 10; $getal++)
			{
				
				?>
				<tr>
					<?php
					for($getal1 = 0; $getal1 <= 10; $getal1++)
					{
						if (($getal1 * $multiplier) % 2)
						{
							?>
							<td class='green'><?php echo $getal1 * $multiplier ; ?></td>
							<?php
						}
						else
						{
							?>
							<td><?php echo $getal1 * $multiplier ; ?></td>
							<?php
						}
						
					}
					
					?>
				</tr>
				<?php
				$multiplier+= 1;
			}
		?>

	</table>
</body>
</html>