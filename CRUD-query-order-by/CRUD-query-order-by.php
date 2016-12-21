<?php
   $messageContainer = "";
   $order_by = "";
   $orderQuery = "";
   $order = "";
   try
   {
      $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root'); // connectie met de db

      if ( isset( $_GET[ 'orderBy' ] ) )
      {
         $orderArray    =  explode( '-', $_GET[ 'orderBy' ] );
         $orderColumn   =  $orderArray[ 0 ];

         $order      =  $orderArray[ 1 ];
         $orderQuery    =  'ORDER BY ' . $orderColumn . ' ' . $order;
         $order = ( $orderArray[ 1 ] != 'DESC') ? 'DESC'    :  'ASC';

         switch ($orderColumn){
         case "#":

         break;
         case "biernr":

         break;
         case "naam":

         break;
         case "brnaam":

         break;
         case "soort":

         break;
         case "alcohol":

         break;
         }
      }


      $querystring = '  SELECT bieren.biernr, bieren.naam, brouwers.brnaam, soorten.soort, bieren.alcohol
                        FROM 
                        brouwers INNER JOIN bieren 
                        ON (brouwers.brouwernr = bieren.brouwernr) 
                        INNER JOIN soorten
                        ON (bieren.soortnr = soorten.soortnr)';


      $statement = $db->prepare($querystring);
      $statement->execute(); // query uitvoeren
      $fetchAssoc = array();

      while($row = $statement->fetch(PDO::FETCH_ASSOC)) // haal alle rijen op en vul de array hiermee
      {
         $fetchAssoc[] = $row;
      }
      $columnNames[] = "#";
      foreach($fetchAssoc[0] as $key => $bier) //haal telkens de 0 waarde op bij het begin van nieuwe kolom --> waar columnames staan
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
      <title>CRUD-Query-order-by</title>
      <style>
         .order a
         {
             padding-right:20px;
             background-repeat:no-repeat;
             background-position:right;
         }

         .ascending a
         {
             background-image: url("img/icon-asc.png");
         }

         .descending a
         {
             background-image: url("img/icon-desc.png");
         }
      </style>
   </head>
<body>
      <p><?php echo $messageContainer ?></p>

      <table>
         <thead>
            <tr>

               <?php foreach ($columnNames as $name): ?>
<th class="order <?php if($order =='ASC' && $orderColumn == $name){echo 'descending' ;} else{echo 'ascending' ;} ?>"><a  href="<?php $_SERVER['PHP_SELF'] ?>?orderBy=<?= $name ?>-ASC"><?= $name ?></a></th>

               <?php endforeach ?>
            </tr>
         </thead>

         <tbody>
            <?php foreach ($fetchAssoc as $key => $bier): ?>
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