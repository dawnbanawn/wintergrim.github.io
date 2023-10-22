<?php
//Startar session
session_start();
?>
<!DOCTYPE html>
    <html>
    <head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="./style.css" type="text/css">
		<title>Add</title>
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
		//Kontrollerar om användaren är inloggad före element visas.
		if (isset($_SESSION["login"]) == "true"){
			echo "
				<form method='POST'>
					<div class='button' style='border: 1px solid white'>
					<a  href='index.php'>Back</a>
					</div>
					<div class='addEditTable'>
					<div>
					<p>
						<label for='rubrik'>Rubrik:</label>
						<input type='text' id='rubrik' name='rubrik'>
					</p>
					<p>
						<label for='datum'>Datum:</label>
						<input type='date' id='datum' name='datum'>
					</p>
					<p>
						<label for='info'>Info:</label>
						<input type='text' id='info' name='info'>
					</p>
					
					<input class='button' style='color: white' type='submit' name='save' value='Save'>
					</div>
					</div>
					</form>
					";
			} else {
					echo "Please login to access this page!";
			}?>
    <?php
    	if(isset($_POST['save'])){
    		//Inkluderar dbconfig med sqlite3-klassen.
    		include 'dbconfig.php';
     
    		//Databasen får en ny rad med värden från formuläret som postats.
    		$sql = "INSERT INTO aktiviteter (rubrik, datum, info) VALUES ('".$_POST['rubrik']."', '".$_POST['datum']."', '".$_POST['info']."')";
    		$db->exec($sql);
			//Användaren skickas till index.php
    		header('location: index.php');
     
    	}
    ?>
    </body>
    </html>