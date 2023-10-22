<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./style.css" type="text/css">
	<title>Login</title>
</head>
<body>
<div class="navbar">
    	<img src="https://upload.wikimedia.org/wikipedia/commons/e/ec/Community_2009_logo.svg" alt="php icon">
		<div class="menuLinks">
			<?php
				//Visa meny-länkar beroende på sessions-variabel (inloggning)
				echo "<a href='start.php'>Start</a>";
				if (isset($_SESSION["login"]) == "true"){
					//echo "<a href='index.php'>Admin</a>";
					echo "<a href='logout.php'>Logout</a>";
				} else {
					echo "<a href='login.php'>Login</a>";
				}
			?>
		</div>
	</div>
    
			    
<?php
echo "<div class='login'><div>";
//Form till inloggning.
echo "<form class='loginInputs' name='form' action='' method='post' action='login.php'>";
echo '<input class="text" type="text" name="username" placeholder="username" id="username">';
echo '<input class="text" type="text" name="password" placeholder="password" id="password">';
echo '<div class="submitButton"><input type="submit" value="Login" name="submit"></div>';
echo '</form>';
echo "</div></div>";
//Funktion för inloggning.
function tryLogin() {
    //Ger access till databasen
    $pdo = new PDO('sqlite:database.db');
    //Hämtar allt från users table (Finns vara en rad)
    $statement = $pdo->query("SELECT * FROM users");
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    //Kontrollerar om variabler är deklarerade (om username och password postats)
    if (isset($_POST["username"]) && isset($_POST["password"])){        
        $username = $_POST['username'];
        $password = $_POST['password'];
        //"Loopar" raderna (raden). Planerade först att ha 2 olika inloggnings-grader, därav loopen som kan vara bra att ha kvar.
        foreach($rows as $row){
            //Jämför formens skickade värden, med de i databasen.
            if ($row["name"] == $username && $row["password"] == $password) {
                echo 'Login is successfull!';
                //Sessions-variabel blir aktiverad med texten true. Jag tyckte det fungerar lika bra som bool i detta fallet.
                $_SESSION["login"] = "true";
                echo "Session variable is set.";
                //Användaren skickas till start.php
                header('location: start.php');
            } else {
                echo 'Login is not successfull!';
            }
        }
    } 
};
//Denna triggas när formen med namnet submit postas.
if(isset($_POST['submit']))
{
    //Kör funktionen.
    tryLogin();    
} 

?>
</body>
</html> 