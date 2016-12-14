<?php
   $messageContainer = "";
if ( isset( $_POST['submit']))
{
   try
   {
      $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');

      $query =   'INSERT INTO brouwers(brnaam, adres, postcode, gemeente, omzet)
                  VALUES ( :brnaam, :adres, :postcode, :gemeente, :omzet)';

      $statement = $db->prepare($query);

      $statement->bindValue( ':brnaam', $_POST[ 'brnaam' ] );
         $statement->bindValue( ':adres', $_POST[ 'adres' ] );
         $statement->bindValue( ':postcode', $_POST[ 'postcode' ] );
         $statement->bindValue( ':gemeente', $_POST[ 'gemeente' ] );
         $statement->bindValue( ':omzet', $_POST[ 'omzet' ] );
  

      $errorsExecute = $statement->execute(); // returnd true als de execute geslaagd is
      //errorCode (returnd een code als er iets misloopt)
      if ( $errorsExecute )
         {
            $insertId            =  $db->lastInsertId(); // haalt laatste Insert ID op die in de database werd opgeslagen
            $messageContainer    =  "Brouwerij succesvol toegevoegd. Het unieke nummer van deze brouwerij is " . $insertId;
         }
         else
         {
            $messageContainer    = "Er ging iets mis met het toevoegen, probeer opnieuw";
         }

   }
   catch(PDOException $e)
   {
      $messageContainer = "De volgende fout trad op: " . $e->getMessage();
   }
}
?>

<!DOCTYPE html>
<html>
   <head>
      <title>CRUD - Insert</title>
      <style>
        
      </style>
   </head>
<body>
   <?php echo $messageContainer ; ?>
   <h1>Voeg een brouwer toe</h1>
      <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
      <p><label>brouwernaam</label><br>
      <input type="text" name="brnaam" id="brnaam"><br></p>

      <p><label>adres</label><br>
      <input type="text" name="adres" id="adres"><br></p>

      <p><label>postcode</label><br>
      <input type="text" name="postcode" id="postcode"><br></p>

      <p><label>gemeente</label><br>
      <input type="text" name="gemeente" id="gemeente"><br></p>

      <p><label>omzet</label><br>
      <input type="text" name="omzet" id="omzet"><br></p>

      <input type="submit" id="submit" name="submit">
   </form>
      
</body>
</html>