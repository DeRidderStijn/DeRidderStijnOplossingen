<?php
   $messageContainer = "";
   $toEdit = FALSE;
   $toDelete = FALSE;
   $deleteID = "";
   try
   {

      $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');

      if ( isset( $_POST["delete"])) // boven brouwers zetten zodat de query gebuild wordt na de record verwijderd is
      {
         $toDelete = TRUE;
         var_dump($_POST["delete"]);
         $deleteID = $_POST["delete"];
           
      }
      if ( isset( $_POST["comfirmDelete"]))
      {
         $deleteID = $_POST["comfirmDelete"];
         $deleteID = intval($deleteID);
         var_dump($deleteID);
         $deleteBrouwerQuery   =  ' DELETE FROM brouwers
                                    WHERE brouwernr = :brouwernr';

         $deleteBrouwerStatement = $db->prepare( $deleteBrouwerQuery );
         $deleteBrouwerStatement->bindValue( ':brouwernr', $deleteID );
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

      if ( isset( $_POST["edit"])) // boven brouwers zetten zodat de query gebuild wordt na de record verwijderd is
      {
         $toEdit = $_POST["edit"];
         echo $toEdit;
      }

      if ( isset( $_POST[ 'edit-comfirm' ] ) )
      {
         /*    
            Haal data en fieldnames op voor specifieke brouwer 
            dmv een zelfgeschreven functie query() 
         */

         $updateQuery   =  'UPDATE brouwers
                           SET brnaam        =  :brnaam,
                                 adres    =  :adres,
                                 postcode =  :postcode,
                                 gemeente =  :gemeente,
                                 omzet    =  :omzet
                           WHERE brouwernr   = :brouwernr
                           LIMIT 1';

         $statement = $db->prepare( $updateQuery );
         echo "editj" . $_POST["edit-comfirm"];
         $statement->bindValue( ":brouwernr",  $_POST[ 'edit-comfirm' ] );                
         $statement->bindValue( ":brnaam",  $_POST[ 'brnaam' ] );                
         $statement->bindValue( ":adres",  $_POST[ 'adres' ] );                  
         $statement->bindValue( ":postcode",  $_POST[ 'postcode' ] );                  
         $statement->bindValue( ":gemeente",  $_POST[ 'gemeente' ] );                  
         $statement->bindValue( ":omzet",  $_POST[ 'omzet' ] );

         $updateSuccessful =  $statement->execute();

         if ( $updateSuccessful )
         {
            $messageContainer = "wijziging succesvol uitgevoerd";
         }
         else
         {
            $messageContainer = "er is een probleem opgetreden";
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
      <title>CRUD - Update</title>
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
  <?php
      if ($toEdit != FALSE)
      { ?>
         <h1>Brouwerij <?php $toEdit ?> </h1>
      <form action='CRUD-update.php' method='POST'>
            <p><label>brouwernaam</label>
            <input type='text' name='brnaam' id='brnaam'></p>
            <p><label>adres</label>
            <input type='text' name='adres' id='adres'></p>
            <p><label>postcode</label>
            <input type='text' name='postcode' id='postcode'></p>
            <p><label>gemeente</label>
            <input type='text' name='gemeente' id='gemeente'></p>
            <p><label>omzet</label>
            <input type='text' name='omzet' id='omzet'></p>
            <button type='submit' name='edit-comfirm' value="<?php echo $toEdit; ?>">edit </button> 
      </form> <?php
      }
      
      echo $messageContainer ;
   if ($toDelete)
   {
      ?>
         <h2>Bent u zeker dat u deze datarij wilt verwijderen?</h2>
         <form action='CRUD-update.php' method='POST'>
            <button type='submit' name='comfirmDelete' value="<?php echo $_POST['delete']; ?>">
               Ja
            </button> 
            <button type='submit' name='noDelete' value='nee'>
               Nee
            </button>
         </form>
      <?php   
   }

   ?>
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
                  <form action="CRUD-update.php" method="POST">
                  <button type="submit" name="delete" value="<?php echo $brouwer['brouwernr'] ?>">
                        <img src="icon-delete.png" alt="delete">
                  </button>    
                  <button type="submit" name="edit" value="<?php echo $brouwer['brouwernr'] ?>">
                        <img src="icon-edit.png" alt="edit">
                  </button>    
                  </form>              
               </td>
            </tr>

            <?php endforeach ?>
         </tbody>

   </table>
      
</body>
</html>