<?php
$text = file_get_contents('text-file.txt');
$textChars = str_split($text);
$textChars = array_reverse($textChars);
asort($textChars);

$nrOfChars = count_chars($text,3);
echo "aantal verschillende karakters:", strlen($nrOfChars) ,"<br>";
foreach (count_chars($text, 1) as $i => $val) {
   echo "Er waren $val instance(s) van \"" , chr($i) , "\" in the string.\n";
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Comments</title>
</head>

<body>

</body>
</html>