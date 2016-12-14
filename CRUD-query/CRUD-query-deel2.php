<?php
   $messageContainer = "";
   $geselecteerdeBrouwer ="";
   try
   {
      $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');

      $qryBrouwernamen =   'SELECT brouwernr, brnaam
                        FROM brouwers ';

      $brouwerStatement = $db->prepare($qryBrouwernamen);
      $brouwerStatement->execute(); //statements andere namen geven voor meerdere queries?
      
      $brouwers   =  array();

      while ( $row = $brouwerStatement->fetch( PDO::FETCH_ASSOC ) )
      {
         $brouwers[]    =  $row;
      }

      if ( isset( $_GET[ 'brouwernr' ] ) )
      {
         $selected = $_GET['brouwernr'];
         $qryBrouwerBieren = 'SELECT naam 
                              FROM bieren INNER JOIN brouwers
                              ON bieren.brouwernr = brouwers.brouwernr
                              WHERE brouwers.brouwernr = :brouwerNr';

         $bierenStatement = $db->prepare($qryBrouwerBieren);
         $bierenStatement->bindParam(':brouwerNr', $_GET[ 'brouwernr']);
      }
      else // als er geen brouwer is gekozen een lijst geven van alle bieren
      {  
         $qryBrouwerBieren = 'SELECT naam
                              FROM bieren';
         $bierenStatement = $db->prepare($qryBrouwerBieren);
      }
      $bierenStatement->execute();

      $bieren   =  array();
      while ( $row = $bierenStatement->fetch( PDO::FETCH_ASSOC ) )
      {
         $bieren[]    =  $row;
      }

      $columnNames[] = "biernummer";
      foreach($bieren[0] as $key => $bier)
      {
         $columnNames[] = $key;
      }

   }
   catch(PDOException $e)
   {
      $messageContainer = $e->getMessage();
   }
?>

<!DOCTYPE html>
<html>
   <head>
      <title>CRUD - Query deel2</title>
      <style>
         .even{
            background-color: green;
         }
      </style>
   </head>
<body>

      <p><?php echo $messageContainer ?></p>

      <form action="<?= $_SERVER['PHP_SELF'] ?>" method="GET">
      
         <select name="brouwernr">
            <?php foreach ($brouwers as $key => $brouwer): ?>
               <option value="<?= $brouwer['brouwernr'] ?>" <?= ( $geselecteerdeBrouwer === $brouwer['brouwernr'] ) ? 'selected' : '' ?>><?= $brouwer['brnaam'] ?></option>
            <?php endforeach ?>
         </select>
         <input type="submit" value="Geef mij alle bieren van deze brouwerij">
      </form>

      <table>
         <thead>
            <tr>
               <?php foreach ($columnNames as $name): ?>
                  <th><?= $name ?></th>
               <?php endforeach ?>
            </tr>
         </thead>

         <tbody>
            <?php foreach ($bieren as $key => $bier): ?>
            <tr>
               <td> <?= ($key + 1) ?></td>
               <?php foreach ($bier as $value): ?>
                  <td><?= $value ?></td>
               <?php endforeach ?>
            </tr>
            <?php endforeach ?>
         </tbody>

      </table>
   

      
</body>
</html>