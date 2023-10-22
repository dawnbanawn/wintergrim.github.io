<?php
//Startar session
session_start();
?>
<?php
		//Kontrollerar att användaren är inloggad.
		if (isset($_SESSION["login"]) == "true"){

			//Inkluderar dbconfig med sqlite3-klassen.
			include 'dbconfig.php';
		
			//Tar bort raden med det id't.
			$sql = "DELETE FROM aktiviteter WHERE rowid = '".$_GET['id']."'";
			$db->query($sql);
		
			header('location: index.php');
		};
    ?>