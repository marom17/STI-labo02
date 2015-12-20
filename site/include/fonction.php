<?php


function sqliteConnect(){
	
	/**********************
	* Open connections    *
	**********************/
	try{
    // Create (connect to) SQLite database in file
    $file_db = new PDO('mysql:host=localhost;dbname=sti-mail',
	'sti',
	'sti');
    // Set errormode to exceptions
    $file_db->setAttribute(PDO::ATTR_ERRMODE, 
                            PDO::ERRMODE_EXCEPTION);	
	}
	catch(PDOException $e) {
    // Print PDOException message
    echo $e->getMessage();
	}
	
	return $file_db;
}

function login($user,$password){
	
	$file_db=sqliteConnect();
	
	$valide=false;
	try{
	$result = $file_db->query("SELECT * FROM utilisateurs 
	WHERE login='{$user}'");
	if($result) {
		// Vérifie les informations de connexion.
		foreach($result as $row) {
			if ($user == $row['login'] && sha1($password) == $row['password'] && $row['enable'] == 1) {
				
				//	Authentification OK
				$_SESSION['username'] = $row['login'];
				$_SESSION['role'] = $row['role'];
				$_SESSION['id'] = $row['id'];
				//	Session valide.
					$valide = true;
				break;
			}
		}
	}
	}
	catch(PDOException $e) {
    // Print PDOException message
    echo $e->getMessage();
	}

	//	Ferme le traitement de la requête
	$file_db=null;
	
	return $valide;
	
}

function isConnected(){
	return (isset($_SESSION['username']) && isset($_SESSION['role']));
	}

function isAdmin(){
		return $_SESSION['role']==2;
	}
	
	
function readMail($idMessage,$expeditor){
	$file_db = sqliteConnect();
	?>
	<form action="" method="post">
		
		<input id="idmessage" type="hidden" name="Mid" value="<?php echo $idMessage; ?>">
		<input id="expeditor" type="hidden" name="expeditor" value="<?php echo $expeditor; ?>">
	<div class="col-md-8">
	<button id="answer" name="answer" class="btn" type="submit">Answer</button>
    <button id="del" name="del" class="btn btn-danger" type="submit">Delete</button>
	</div>
	</form>
	<br/>

<?php
	
	$result = $file_db->query("SELECT * FROM messages WHERE id='{$idMessage}'");
	foreach($result as $row){
		echo '<p class="text-left"><h3>FROM: '.$row['expeditor'].'</h3></p>';
		echo '<p class="text-left"> <b> Subject: '.$row['subject'].'</b></p>';
		echo '<p class="text-left">'.$row['corps'].'</p>';
	}
	
	$file_db=null;
	
}

function deleteMail($idMessage){
	$file_db = sqliteConnect();
	$file_db->exec("DELETE FROM messages WHERE id='{$idMessage}'");
	$file_db->exec("DELETE FROM messutil WHERE idmessage='{$idMessage}'");
	$file_db=null;
	
}


function searchMail(){
	
	$file_db = sqliteConnect();
	
	$result = $file_db->query("SELECT * FROM messages
	JOIN messutil ON messutil.idmessage=messages.id
	WHERE idutilisateur='{$_SESSION['id']}' ORDER BY datereception DESC");
	
	foreach($result as $row){
		echo '<tr>';
		echo '<th>'.$row['datereception'].'</th>';
		echo '<th>'.$row['expeditor'].'</th>';
		echo '<th>'.$row['subject'].'</th>';
		echo '<th>';
				?>
		<form action="" method="post">
		
		<input id="idmessage" type="hidden" name="Mid" value="<?php echo $row['id']; ?>">
		<input id="expeditor" type="hidden" name="expeditor" value="<?php echo $row['expeditor']; ?>">

		<!-- Button (Double) -->
  <div class="col-md-8">
    <button id="read" name="read" class="btn btn-success" type="submit">Read</button>
	<button id="answer" name="answer" class="btn" type="submit">Answer</button>
    <button id="del" name="del" class="btn btn-danger" type="submit">Delete</button>
</div>
		
		</form>
		<?php
		echo '</th>';
		echo '</tr>';
	}
	
	$file_db=null;
	
}

function sendMail($to,$subject,$corps){

	$file_db = sqliteConnect();
	$valide = false;
	//(SELECT last_insert_rowid())
	$time = date('Y-m-d H:i:s', time());	

	$result = $file_db->query("SELECT * FROM utilisateurs WHERE login='{$to}'");
	foreach($result as $row){
	
	$file_db->exec("INSERT INTO messages (datereception,expeditor,subject,corps)
	VALUES ('{$time}','{$_SESSION['username']}','{$subject}','{$corps}');");
	
	
	$file_db->exec("INSERT INTO messutil VALUES('{$row['id']}',(SELECT last_insert_rowid()))");
	
	$valide = true;
	
	}
	
	$file_db=null;
	
	return $valide;
}

function changePass($p1,$p2){
	$file_db = sqliteConnect();
	$valide=false;
	if($p1==$p2){
		$crypt=sha1($p1);
		$file_db->exec("UPDATE utilisateurs SET password='{$crypt}' WHERE id='{$_SESSION['id']}'");
		$valide=true;
	}
	
	$file_db=null;
	return $valide;
}


function searchUsers(){
	
	$file_db = sqliteConnect();
	
	$result = $file_db->query("SELECT utilisateurs.id,login,enable,roles.name FROM utilisateurs
	JOIN roles ON roles.id=utilisateurs.role ORDER BY utilisateurs.id ASC");
	
	foreach($result as $row){
		echo '<tr>';
		echo '<th>'.$row['id'].'</th>';
		echo '<th>'.$row['login'].'</th>';
		echo '<th>'.$row['enable'].'</th>';
		echo '<th>'.$row['name'].'</th>';
		echo '<th>';
				?>
		<form action="" method="post">
		
		<input id="iduser" type="hidden" name="iduser" value="<?php echo $row['id']; ?>">
		<!-- Button (Double) -->
  <div class="col-md-8">
	<button id="edit" name="edit" class="btn" type="submit">Edit</button>
    <button id="del" name="del" class="btn btn-danger" type="submit">Delete</button>
</div>
		
		</form>
		<?php
		echo '</th>';
		echo '</tr>';
	}
	
	$file_db=null;
	
}

function deleteUser($id){
	$file_db = sqliteConnect();
	$file_db->exec("DELETE FROM utilisateurs WHERE id='{$id}'");
	$file_db=null;
}

function editUser($id,$p1,$p2,$enable,$role){
	$file_db = sqliteConnect();
	
	$valide=false;
	
	if($p1==""){
		$file_db->exec("UPDATE utilisateurs SET enable='{$enable}',role='${role}' WHERE id='{$id}'");
		$valide=true;
	}
	else{
	if($p1==$p2){
	$crypt=sha1($p1);
	$file_db->exec("UPDATE utilisateurs SET password='{$crypt}',enable='{$enable}',role='${role}' WHERE id='{$id}'");
	$valide=true;
	}
	}
	
	
	$file_db=null;
	
	return $valide;
}

function newUser($login,$p1,$p2,$role,$enable){
	$valide=false;
	
	
	$file_db = sqliteConnect();
	if($p1==$p2){
	$crypt=sha1($p1);
	$file_db->exec("INSERT INTO utilisateurs(login,password,enable,role)
	VALUES ('{$login}','{$crypt}','{$enable}','{$role}')");
	$valide=true;
	}
	$file_db=null;	
	
	return $valide;
	
}

?>
