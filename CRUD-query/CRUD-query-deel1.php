<?php
   $messageContainer = "";

   try
   {
      $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');

      $querystring = '  SELECT *
                        FROM bieren 
                        INNER JOIN brouwers
                        ON (bieren.brouwernr = brouwers.brouwernr) 
                        WHERE (bieren.naam LIKE "du%") AND (brouwers.brnaam LIKE "%a%")';

      $statement = $db->prepare($querystring);
      $statement->execute();
      $fetchAssoc = array();

      while($row = $statement->fetch(PDO::FETCH_ASSOC))
      {
         $fetchAssoc[] = $row;
      }
      $columnNames[] = "#";
      foreach($fetchAssoc[0] as $key => $bier)
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
      <title>CRUD-Query-deel1</title>
      <style>
         .even{
            background-color: green;
         }
      </style>
   </head>
<body>
      <p><?php echo $messageContainer ?></p>

      <table>
         <thead>
            <tr>
               <?php foreach ($columnNames as $name): ?>
                  <th><?= $name ?></th>
               <?php endforeach ?>
            </tr>
         </thead>

         <tbody>
            <?php foreach ($fetchAssoc as $key => $bier): ?>
            <tr>
               <td> <?= ($key + 1) ?></td>
               <?php foreach ($bier as $value): ?>
                  <td  <?php if(($key + 1) % 2 == 0){echo "class='even'";} ?> ><?= $value ?></td>
               <?php endforeach ?>
            </tr>
            <?php endforeach ?>
         </tbody>

      </table>

      
</body>
</html>