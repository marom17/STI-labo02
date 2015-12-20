<?php 
//  ***************************************************************************
/*
 * Auteur : Romain Maillard
 * Date   : 25.09.2015
 * Remarque: Basé sur le code d'un de mes laboratoires de BDR
 */
session_start();

//  Inclusion fichier de fonction. 
require_once "include/fonction.php";

//  Vérifie si l'utilisateur est déjà connecté sinon le redirige vers signin.php.
if (!isConnected()) {
  header('Location: signout.php');
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

  <title>STI Mail - Home</title>

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

    <div class="container">

      <div class="starter-template">
        <h1>STI Mail</h1>
      </div>
	  <div class="container">
		
	  <?php
	  if(isset($_POST['answer'])){
		$_SESSION['answer']=$_POST['expeditor'];
		header('Location: newmail.php');		
	  }
	  if(isset($_POST['del'])){
	
		deleteMail($_POST['Mid']);	
		}
		if(isset($_POST['read'])){
	
		readMail($_POST['Mid'],$_POST['expeditor']);
	
		}
		if(!isset($_POST['read'])){
			?>
			<table class="table table-striped">
		<thead>
              <tr>
                <th width="20%">Date</th>
                <th width="20%">Expeditor</th>
                <th width="20%">Subject</th>
				<th width="40%"></th>
              </tr>
            </thead>
		<tbody>
		<?php
		searchMail();
		}
	  ?>
		<tbody>
	  </table>
	  </div>
      <hr>
      <footer>
        <p>&copy; Laurent Girod & Romain Maillard - 2015</p>
      </footer>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
