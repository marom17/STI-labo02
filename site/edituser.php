<?php 
//  ***************************************************************************
/*
 * Auteur : Romain Maillard
 * Date   : 28.09.2015
 * But: Permet d'éditer les informations d'un utilisateur
 */
session_start();

//  Inclusion fichier de fonction. 
require_once "include/fonction.php";

//  V?rifie si l'utilisateur est d?j? connect? sinon le redirige vers signin.php.
if (!isConnected()) {
  header('Location: signout.php');
}
if($_SESSION['role']!=2){
	header('Location: index.php');
}
if(isset($_POST['ok'])){
	if(!editUser($_POST['iduser'],$_POST['password'],$_POST['passwordretape'],$_POST['active'],$_POST['role'])){
				echo "<script>alert('Edit failed');</script>";
	}
	else{
		unset($_SESSION['iduser']);
		header('Location: admin.php');
	}
}

//  ***************************************************************************
?> 
<!DOCTYPE html> 
<html lang="fr"> 
    <head> 
        <meta charset="utf-8">         
        <meta http-equiv="X-UA-Compatible" content="IE=edge">         
        <meta name="viewport" content="width=device-width, initial-scale=1">         
        <meta name="description" content="">         
        <meta name="author" content="">         
        <link rel="icon" href="dist/favicon.ico">         
        <title>STI Mail - Edit user</title>         
        <!-- Bootstrap core CSS -->         
        <link href="dist/css/bootstrap.min.css" rel="stylesheet">         
        <!-- Custom styles for this template -->         
        <link href="standard-template.css" rel="stylesheet">         
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->         
        <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->         
        <script src="assets/js/ie-emulation-modes-warning.js"></script>         
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->         
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->         
    </head>     
    <body>       
        <?php
	include 'header.php';
	
	//editUser($_GET['id']);
	$file_db = sqliteConnect();
	$result=$file_db->query("SELECT id,login,role,enable FROM utilisateurs
	WHERE id='{$_SESSION['iduser']}'");
	foreach($result as $row){}
	$file_db=null;
	
	?>
<br/><br/><br/>
<div class="container">
<form class="form-horizontal" method="post">
<fieldset>

<!-- Form Name -->
<legend>Edit user</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">username</label>  
  <div class="col-md-4">
  <input id="username" name="username" type="text" placeholder="username" class="form-control input-md" required=""
  <?php
	echo 'value="'.$row['login'].'" disabled';
  ?>
  >
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-4">
    <input id="password" name="password" type="password" placeholder="password" class="form-control input-md">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordretape">Retape</label>
  <div class="col-md-4">
    <input id="passwordretape" name="passwordretape" type="password" placeholder="password" class="form-control input-md">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="role">Role</label>
  <div class="col-md-4">
    <select id="role" name="role" class="form-control">
      <option value="1"
	  <?php
		if($row['role']==1){
			echo 'selected';
		}
	  ?>
	  
	  >User</option>
      <option value="2"
	  <?php
		if($row['role']==2){
			echo 'selected';
		}
	  ?>
	  >Administrator</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="active">Active</label>
  <div class="col-md-4">
    <select id="active" name="active" class="form-control">
      <option value="1"
	  <?php
		if($row['enable']==1){
			echo 'selected';
		}
	  ?>>Enable</option>
      <option value="0"
	  <?php
		if($row['enable']==0){
			echo 'selected';
		}
	  ?>
	  >Disable</option>
    </select>
  </div>
</div>

<input id="iduser" type="hidden" name="iduser" value="<?php echo $row['id']; ?>">

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="ok"></label>
  <div class="col-md-4">
    <button id="ok" name="ok" class="btn btn-primary" type="submit">Edite</button>
  </div>
</div>

</fieldset>
</form>
</div>
	
	
	
	
	
	
	        <div class="container"> 
            <footer> 
                <p>&copy; Laurent Girod & Romain Maillard - 2015</p> 
            </footer>             
        </div>         
    </body>     
</html>
