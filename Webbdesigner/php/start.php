<?php
//Startar session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css" type="text/css">
    <title>PHP Start</title>
</head>
<body>
<div class="navbar">
    <img src="https://upload.wikimedia.org/wikipedia/commons/e/ec/Community_2009_logo.svg" alt="php icon">
    <div class="menuLinks">
        <?php
            //Visa meny-länkar beroende på sessions-variabel (inloggning)
            //echo "<a href='start.php'>Start</a>";
            if (isset($_SESSION["login"]) == "true"){
                echo "<a href='index.php'>Admin</a>";
                echo "<a href='logout.php'>Logout</a>";
            } else {
                echo "<a href='login.php'>Login</a>";
            }
        ?>
    </div>
</div>
    
<div>     
    <?php 
        //Ger access till databasen
        $pdo = new PDO('sqlite:database.db');
        //Gör query och hämtar alla rader, sorterade efter datum.
        $statement = $pdo->query("SELECT * FROM aktiviteter ORDER BY datum ASC");
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        $count = 0;
        //Loopar igenom varje rad, och visar upp data.
        foreach($rows as $row){
            //Hämtar dagens datum och jämför med radens datum, sorterar bort gamla datum.
            if( $row["datum"] > date("Y-m-d")){
                $count++;
                if($count <= 5){?>
                    <div class="miniNews">
                    <div class="miniHeader">
                    <div><h3><?php echo $row["datum"]?></h3></div>
                    <div><h3><?php echo $row["rubrik"]?></h3></div>
                    </div>
                    <div class="miniFooter"><?php echo $row["info"]?></div>
                    </div>     
                <?php  }
            } 


        }                    
    ?>
</div>
</body>
</html>