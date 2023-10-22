
<?php
    //Skapar SQLite3 databas.
    //SQlite3-kod hämtad och modifierad:
    //https://www.sourcecodester.com/tutorials/php/12191/crud-operation-sqlite3-database-using-php.html?utm_content=cmp-true
    //Sqlite 3 klass 
    $db = new SQLite3('database.db');
     
    //Skapa en table om ingen finns.
    $query = "CREATE TABLE IF NOT EXISTS aktiviteter (rubrik STRING, datum INT64, info STRING)";
    //Kör queryn.
    $db->exec($query);
     
?>