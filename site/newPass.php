<?php 
//  ***************************************************************************
/*
 * Auteur : Romain Maillard
 * Date   : 26.09.2015
 * But: permet de changer son mot de passe
 */
session_start();

//  Inclusion fichier de fonction. 
require_once "include/fonction.php";

//  Vérifie si l'utilisateur est déjà connecté sinon le redirige vers signin.php.
if (!isConnected()) {
  header('Location: signout.php');
}
if(isset($_POST['change'])){
	if(changePass($_POST['password1'],$_POST['password2'])){
		echo "<script>alert('Password change');</script>";
	}
	else{
		echo "<script>alert('Password not match');</script>";
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

  <title>STI Mail - Change Pass</title>

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
	?>
	
	
	<br/><br/><br/>
	<div class="container">
	<form class="form-horizontal" action="" method="post">
<fieldset>

<!-- Form Name -->
<legend>Change password</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password1">Password</label>  
  <div class="col-md-4">
  <input id="password1" name="password1" type="password" placeholder="password" class="form-control input-md" required="">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password2">Retape</label>  
  <div class="col-md-4">
  <input id="password2" name="password2" type="password" placeholder="password" class="form-control input-md" required="">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="send"></label>
  <div class="col-md-4">
    <button id="change" name="change" class="btn btn-primary" >Change</button>
  </div>
</div>

</fieldset>
</form>
<footer>
        <p>&copy; Laurent Girod & Romain Maillard - 2015</p>
      </footer>
</div>

	
</body>
</html>
