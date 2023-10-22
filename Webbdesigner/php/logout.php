<?php
//Startar session
session_start();
?>
<?php
    //Sätter sessions-variablen till false (text fungerar lika bra som bool tänker jag).
    $_SESSION["login"] = "false";
    //Tar bort sessions-variabler som är i användning.
    session_unset();
    //Användaren skickas till start.php
    header('location: start.php');
?>

<!--<p>You´re logged out!</p>
<a href='start.php'>Start page</a>-->

