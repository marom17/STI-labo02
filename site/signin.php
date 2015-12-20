<?php 
//  ***************************************************************************
/*
 * Auteur : Romain Maillard
 * Date   : 26.09.2015
 * But    : Page de login. 
 *          Permet d'effectuer un login sur ce site internet afin de pouvoir utiliser le contenu
 *          de ce site internet.
 * Remarque: Basé sur le code d'un de mes laboratoires de BDR
 */
session_start();

//  Inclusion fichier de fonction.
require_once "include/fonction.php";

//  Vérifie si le le formulaire a été déjà envoyé.
if(isSet($_POST['trimite'])) {
  
  //  Vérifie les informations de validation.
  if (login($_POST['email'], $_POST['pwd'])) {
    //  Redirige vers l'index
    header('Location: index.php');
  }
  //  Sinon affiche une indiaction de login incorrect.
  else {
    echo '<h2 class="form-signin-heading">Login incorrect</h2>';
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

  <title>STI Mail - Signin</title>

  <!-- Bootstrap core CSS -->
  <link href="dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">

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
   <div class="container">
    <form class="form-signin" action="" method="post">  

      <h2 class="form-signin-heading">Login</h2>

      <label for="inputUser" class="sr-only">Username</label>
      <input type="user" id="inputUser" class="form-control" placeholder="Username" required autofocus name="email">

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="pwd">

      <button class="btn btn-lg btn-primary btn-block" type="submit" name="trimite">Sign In</button>
    </form>

    <hr>
      <footer>
        <p>&copy; Laurent Girod & Romain Maillard - 2015</p>
      </footer>
  </div> <!-- /container -->


</body>
</html>
