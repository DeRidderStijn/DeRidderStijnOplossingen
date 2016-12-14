<?php
    try
    {
        if ( isset( $_POST["submit"]))
        {
            if ( isset( $_POST["code"]) )
            {

            }
            else
            {
                throw new Exception( "SUBMIT-ERROR" );
            }
         }  
    }
    catch( Exception $e)
    {
        $messageCode = $e->getMessage();
        $message = array();
        $createMessage = false;

        switch ($messageCode)
        {
            case "SUBMIT-ERROR":
                $message["type"] = "error";
                $message["text"] = "Er werd met het formulier geknoeid";
        }
        logToFile($message);
    }
    
    function logToFile($message)
    {
        $date           = date( 'H:i:s', time() );
        $ip             = $_SERVER['REMOTE_ADDR'];;
        $errorType      = $message["type"];
        $errorMessage   = $message["text"];
    }
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Error handling</title>
</head>

<body>
    <form action="error-handling.php" method="POST">
        <h1>Geef uw kortingscode op </h1>
        <label>kortingscode</label><br>
        <input type="text" id="code" name="code"><br>
        <input type="submit" id="submit" name="submit">
    </form>

</body>
</html>