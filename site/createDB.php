<html>
<head></head>
<body>

<?php
 
  // Set default timezone
  date_default_timezone_set('UTC');
 
  try {
    /**************************************
    * Create databases and                *
    * open connections                    *
    **************************************/
 
    // Create (connect to) SQLite database in file
    $file_db = new PDO('sqlite:database/mail.sqlite');
    // Set errormode to exceptions
    $file_db->setAttribute(PDO::ATTR_ERRMODE, 
                            PDO::ERRMODE_EXCEPTION); 
 
    /**************************************
    * Create tables                       *
    **************************************/
 
    // Create table messages
    $file_db->exec("CREATE TABLE IF NOT EXISTS messages (
                    id INTEGER PRIMARY KEY, 
                    datereception TEXT, 
                    expeditor TEXT, 
                    subject TEXT,
			corps TEXT)"); 

    $file_db->exec("CREATE TABLE IF NOT EXISTS roles (
                    id INTEGER PRIMARY KEY, 
                    name TEXT)"); 

    $file_db->exec("CREATE TABLE IF NOT EXISTS utilisateurs (
                    id INTEGER PRIMARY KEY, 
                    login TEXT,
			password TEXT,
			enable INTEGER,
			role INTEGER)");

    $file_db->exec("CREATE TABLE IF NOT EXISTS messutil (
                    idutilisateur INTEGER,
			idmessage INTEGER)");
			

 

    /**************************************
    * Close db connections                *
    **************************************/
 
    // Close file db connection
    $file_db = null;
  }
  catch(PDOException $e) {
    // Print PDOException message
    echo $e->getMessage();
  }
?>

</body>
</html>
