<?php
	$id = 0;
	$artikels = array( array(
			'titel' => 'Dit gebeurt er wanneer je geheime toegangsweg tot beruchte Area 51 uitprobeert',
			'text' 	=> 'Wanneer twee mannen met hun moto op een onverharde weg rijden in de Amerikaanse staat Nevada, 
				stoten ze naar eigen zeggen op een geheime toegang tot de mysterieuze legerbasis Area 51. 
				Wat dat betekent, wordt vrij snel duidelijk. Hun avontuurlijke tocht eindigt abrupt. ',
			'datum' => '13/10',
			'image' => 'area51.jpg',
			'beschrijving' => 'area 51 afbeelding',
			'key' 	=> 0),

		array(
			'titel' => 'Waarom Bob Dylan de Nobelprijs verdient',
			'text'	=> 'Een kleine verrassing vanmiddag, toen bekend werd dat singer-songwriter Bob Dylan de Nobelprijs
						voor literatuur had weggekaapt. Menig liefhebber der letteren zal ongetwijfeld de wenkbrauwen gefronst hebben,
						maar verdient Bob Dylan de prijs misschien toch, een beetje? "Als dichter niet, als liedjesschrijver wél",
						stelde Geoffrey Himes van Paste Magazine eind vorige maand als voorbeschouwing. ',
			'datum' => '13/10',
			'image' =>	'bobke.jpg',
			'beschrijving' => 'Bob Dylan aan microfoon',
			'key' 	=> 1),

		array(
			'titel' => 'Opmerkelijk: Kris Peeters publiceert volledige onderhandelingstekst CD&V',
			'text' 	=> 'Vice-premier Kris Peeters (CD&V) heeft het voorstel van zijn partij voor een meerwaardebelasting zelf op
					zijn website gepubliceerd. Opmerkelijk, zo merkt ook oppositielid Kristof Calvo op.
					"Originele manier van werken deze onderhandelingen, maar bedankt voor de tekst." ',
			'datum' => '13/10',
			'image' => 'krisje.jpg',
			'beschrijving' => 'Kris Peeters opent een deur',
			'key' 	=> 2)
		);
//var_dump($artikels);

if (isset($_GET["id"]))
   {
   		$id = $_GET["id"];
   }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Get</title>
</head>

<body>
	<?php
   		foreach($artikels as $artikel)
   			{
   				?>
   				<h3> <?= $artikel["titel"] ;?> </h3>
   				<?php
   				echo ("<img src=' images/". $artikel["image"] . "' alt='" . $artikel["beschrijving"] . "'>");
   				//echo ("<p>" . substr($artikel["inhoud"],0,50) . "...<br><a href='index.php?id=0'> lees meer </a> <p>");
   				if ($id == $artikel["key"])
   				{
   					echo ("<p>"	. ($artikel["text"]) . "</p>");
   				}
   				else
   				{
   					echo ("<p>"	. substr($artikel["text"],0,50) . "...<br><a href='get.php?id=" . ($artikel["key"]) . "'> lees meer </a> </p>");
   				}?>
   					<p> <?= $artikel["datum"] ;?><p>
   				<?php
   			}
   	?>
</body>
</html>