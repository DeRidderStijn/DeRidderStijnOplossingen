<?php

$counter = 1;
$investering = 100000;
$rente = 1.08;
$aantaljaar = 10;
$gebruikerHans = array(1, 100000, 1.08, 10);
function berekenRente($counter, $investering, $rente, $aantaljaar)
{
	$bedrag = floor($investering * $rente);
	echo ("<p>het bedrag na " . $counter . "jaar bedraagd: ". $bedrag);
	if($counter < $aantaljaar)
	{
		$counter++;
		berekenRente($counter, $bedrag, $rente, $aantaljaar);
	}
}
berekenRente($gebruikerHans[0], $gebruikerHans[1], $gebruikerHans[2], $gebruikerHans[3]);
?>

<!DOCTYPE html>
<html>
   <head>
      <title>functions recursive</title>
   </head>
   <body>

   </body>
</html>