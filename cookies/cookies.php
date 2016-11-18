<?php

   $file = file_get_contents("login.txt");
   $pieces = explode(",",$file); //opdelen in stukken telkens je een komma tegenkomt
   $username = $pieces[0];
   $password = $pieces[1];
   $isAuthenticated = false;
   $message ="";
   if (isset( $_POST["password"] ) ) 
   {
      
      if (($_POST["password"] == $password) && ($_POST["username"] == $username)) 
      {
         $message="u bent ingelogd";
         setcookie( "authenticated", TRUE, time() + 360 );
         header("location: cookies.php");

      } 
      else 
      {
      
         $message = "wachtwoord foutief";
      }
   }
   if ( isset( $_COOKIE["authenticated"] ) ) 
   {
      $isAuthenticated  =  true;
   }
   // code to delete cookie
   if (isset($_GET["cookie"])) {
   
      if ($_GET["cookie"] == "delete") {
      
         setcookie("authenticated","", time() - 10000 );
         
         header("location: cookies.php");
      }
   }
   /*var_dump($message);
   var_dump($isAuthenticated);*/
?>
<!DOCTYPE html>
<html>
   <head>
      <title>cookies</title>
      <style>
      	
      </style>
   </head>
   <body>
      <?php 
	      echo $message;
	      if ($isAuthenticated): ?>
      <p> u bent ingelogd </p>
      <p><a href="cookies.php?cookie=delete">Uitloggen</a></p>
      <?php else: ?>
      <form action="cookies.php" method ="POST">
         <p>username: <input type="text" name="username" id="username"></p>
         <p>password: <input type="password" name="password" id="password"></p>
         <input type="submit">
      </form>
      <?php endif ?>
   </body>
</html>