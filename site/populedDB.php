<?php
 
 // Set default timezone
  date_default_timezone_set('UTC');
 
  try {
    /**************************************
    * Create databases and                *
    * open connections                    *
    **************************************/
 
    // Create (connect to) SQLite database in file
    $file_db = new PDO('mysql:host=localhost;dbname=sti-mail',
	'root',
	'root');
    // Set errormode to exceptions
    $file_db->setAttribute(PDO::ATTR_ERRMODE, 
                            PDO::ERRMODE_EXCEPTION); 
							
	$crypt=sha1("test");					
	$file_db->exec("INSERT INTO utilisateurs (login,password,enable,role)
	VALUES ('rom','{$crypt}',1,2);");
	
	$crypt=sha1("fa");
	$file_db->exec("INSERT INTO utilisateurs (login,password,enable,role)
	VALUES ('fa','{$crypt}',1,1);");
	
	$crypt=sha1("do");
	$file_db->exec("INSERT INTO utilisateurs (login,password,enable,role)
	VALUES ('do','{$crypt}',0,1);");
	
	
	$file_db->exec("INSERT INTO roles (name) VALUES ('User')");
	$file_db->exec("INSERT INTO roles (name) VALUES ('Admin')");
	
	$time = date('Y-m-d H:i:s', time()-(60));
	
	$file_db->exec("INSERT INTO messages (datereception,expeditor,subject,corps)
	VALUES ('{$time}','RRH','Un test','Je suis un test');");
	
	//$lastID = PDO::lastInsertRowid($file_db);
	
	$file_db->exec("INSERT INTO messutil VALUES(1,LAST_INSERT_ID())");
	
	$time = date('Y-m-d H:i:s', time());	

	
	$file_db->exec("INSERT INTO messages (datereception,expeditor,subject,corps)
	VALUES ('{$time}','KML','Un autre test','Tralalala');");
	
	//$lastID = PDO::lastInsertRowid($file_db);
	
	$file_db->exec("INSERT INTO messutil VALUES(1,LAST_INSERT_ID())");
	
	
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
