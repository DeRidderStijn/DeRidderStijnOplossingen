<?php
	$rijen = 10;

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Comments</title>
</head>

<body>
	<table>
		<?php
			for ($teller = 0; $teller < $rijen; $teller++)
			{
				?>
				<tr>
					<?php
					for ($teller1 = 0; $teller1 < 10; $teller1++)
					{
						?>
						<td>kolom</td>
						<?php
					}
					?>
				</tr>
				<?php
			}
		?>

	</table>
</body>
</html>