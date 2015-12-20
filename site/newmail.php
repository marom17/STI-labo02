<?php 
//  ***************************************************************************
/*
 * Auteur : Romain Maillard
 * Date   : 26.09.2015
 * But: permet l'écriture d'un nouveau mail
 */
session_start();

//  Inclusion fichier de fonction. 
require_once "include/fonction.php";

//  Vérifie si l'utilisateur est déjà connecté sinon le redirige vers signin.php.
if (!isConnected()) {
  header('Location: signout.php');
}

if(isSet($_POST['send'])){
	if($_POST['subject']==''){
		$_POST['subject']="[no subject]";
	}
	if($_POST['message']=='type your message'){
		$_POST['message']="";
	}
	if(sendMail($_POST['to'],$_POST['subject'],$_POST['message'])){
		echo "<script>alert('Send sucess');</script>";
	}
	else{
		echo "<script>alert('User unknow');</script>";
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

  <title>STI Mail - New Mail</title>

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
<legend>New Mail</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="to">To</label>  
  <div class="col-md-4">
  <?php
	if(!isset($_SESSION['answer'])){
  ?>
  <input id="to" name="to" type="text" placeholder="To" class="form-control input-md" required="">
   <?php
	}
	else{
		echo '<input id="to" name="to" type="text" placeholder="To" class="form-control input-md" 
		required="" value="'.$_SESSION['answer'].'">';
		unset($_SESSION['answer']);
		//$_SESSION['answer']=null;
	}
   ?>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="subject">Subject</label>  
  <div class="col-md-4">
  <input id="subject" name="subject" type="text" placeholder="subject" class="form-control input-md">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="message">message</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="message" name="message">type your message</textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="send"></label>
  <div class="col-md-4">
    <button id="send" name="send" class="btn btn-primary" >Send</button>
  </div>
</div>

</fieldset>
</form>
<footer>
        <p>&copy; Laurent Girod & Romain Maillard - 2015</p>
      </footer>
</body>
</div>
	

</html>
