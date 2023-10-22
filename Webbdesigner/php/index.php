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
    <title>PHP Edit</title>
</head>
<body>
<div class="navbar">
    <img src="https://upload.wikimedia.org/wikipedia/commons/e/ec/Community_2009_logo.svg" alt="php icon">
    <div class="menuLinks">
        <?php
            //Visa meny-länkar beroende på sessions-variabel (inloggning)
            echo "<a href='start.php'>Start</a>";
            if (isset($_SESSION["login"]) == "true"){
                //echo "<a href='index.php'>Edit</a>";
                echo "<a href='logout.php'>Logout</a>";
            } else {
                echo "<a href='login.php'>Login</a>";
            }
        ?>
    </div>
</div>

<?php
	//Kontrollerar inloggning före element visas.
	if (isset($_SESSION["login"]) == "true"){
			echo "
			<div class='button' style='border: 1px solid white'>
    		<a href='add.php'>Add</a>
			</div>";
	} 
?>
<div class='indexList'>
    <table >
    	<thead>
			<?php 
			if (isset($_SESSION["login"]) == "true"){
				echo "
				<th>ID</th>
				<th>Rubrik</th>
				<th>Datum</th>
				<th>Info</th>
				";
			}
			?>
    	</thead>
    	<tbody>
    		<?php
				if (isset($_SESSION["login"]) == "true"){
					//include our connection
					//Sqlite 3 - kod hämtad och modifierad från:
					//https://www.sourcecodester.com/tutorials/php/12191/crud-operation-sqlite3-database-using-php.html?utm_content=cmp-true    
					include 'dbconfig.php';
		
					//Förbereder att alla id från aktiviteter tablen hämtas.
					$sql = "SELECT id, * FROM aktiviteter ORDER BY datum DESC";
					$query = $db->query($sql);
					//Loopar igenom, och hämtar tillhörande array till gällande id.
					//Visar data och knappar med id-value som används i edit/delete php.
					
					while($row = $query->fetchArray()){
						echo "
							<tr >
								<td>".$row['id']."</td>
								<td>".$row['rubrik']."</td>
								<td>".$row['datum']."</td>
								<td>".$row['info']."</td>
								<td>
									<a class='indexDelete' href='delete.php?id=".$row['id']."'>Delete</a>
								</td>
							</tr>
						";
					}
					
				} else {
					echo "Please login to access this page!";
				}
    		?>
    	</tbody>
    </table>
	</div>
    </body>
    </html>