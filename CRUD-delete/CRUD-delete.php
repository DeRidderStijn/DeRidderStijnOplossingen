<?php
   $messageContainer = "";
   try
   {

      $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');

      if ( isset( $_POST["delete"])) // boven brouwers zetten zodat de query gebuild wordt na de record verwijderd is
      {
         $toDelete = $_POST["delete"];
         echo "todel " . $toDelete . " ";
         echo "Bent u zeker dat u deze datarij wilt verwijderen?";
         echo "<form action='CRUD-delete.php' method='POST'>
                  <button type='submit' name='comfirmDelete' value=" . $toDelete . ">
                        Ja
                  </button> 
         </form>";
         echo "<form action='CRUD-delete.php' method='POST'>
                  <button type='submit' name='noDelete' value='nee'>
                        Nee
                  </button> 
         </form>";        
      }
      if ( isset( $_POST["comfirmDelete"]))
      {
         $deleteBrouwerQuery   =  ' DELETE FROM brouwers
                                    WHERE brouwernr = :brouwernr';

         $deleteBrouwerStatement = $db->prepare( $deleteBrouwerQuery );
         $deleteBrouwerStatement->bindValue( ':brouwernr', $_POST['comfirmDelete'] );
         var_dump($_POST["comfirmDelete"]);
         $isDeleted  =  $deleteBrouwerStatement->execute();

         if ( $isDeleted )
         {
            $messageContainer = "De record is succesvol verwijderd";
         }
         else
         {
            $messageContainer = "Er ging iets mis bij het verwijderen";
         }
      }

         
      
      $brouwerInfo =   "SELECT *
                        FROM brouwers";
      $brouwerStatement = $db->prepare($brouwerInfo);
      $brouwerStatement->execute();

      $brouwers = array();

      while ( $row = $brouwerStatement->fetch( PDO::FETCH_ASSOC ) )
      {
         $brouwers[]    =  $row;
      }

      $columnNames = array();
      foreach($brouwers[0] as $key => $brouwer)
      {
         $columnNames[] = $key;
      }

   }
   catch(PDOException $e)
   {
      $messageContainer = "De volgende fout trad op: " . $e->getMessage();
   }
?>

<!DOCTYPE html>
<html>
   <head>
      <title>CRUD - Delete</title>
      <style>
         .odd{
            background-color: #B0B0B0;
         }
         thead > tr{
            background-color: #787878;
         }
      </style>
   </head>
<body>
   <?php echo $messageContainer ; ?>
  
   <table>
         <thead>
            <tr>
               <?php foreach ($columnNames as $name): ?>
                  <th><?= $name ?></th>
               <?php endforeach ?>
            </tr>
         </thead>

         <tbody>
            <?php foreach ($brouwers as $key => $brouwer): ?>
            <tr <?php if(($key +1) % 2 != 0){echo "class='odd'";}  ?>>
               <?php foreach ($brouwer as $value): ?>
                  <td><?= $value ?></td>
               <?php endforeach ?>
               <td>
                  <form action="CRUD-delete.php" method="POST">
                  <button type="submit" name="delete" value="<?php echo $brouwer['brouwernr'] ?>">
                        <img src="icon-delete.png" alt="delete">
                  </button>    
                  </form>              
               </td>
            </tr>

            <?php endforeach ?>
         </tbody>

   </table>
      
</body>
</html>