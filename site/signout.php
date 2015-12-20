<?php 
//  ***************************************************************************
/*
 * Auteur : Romain Maillard
 * Date   : 26.09.2015
 * But    : Page de logout. 
 *          Permet d'effectuer un logout et redirige vers le page de login
 * Remarque: Basé sur le code d'un de mes laboratoires de BDR
 */

session_start();
session_unset();
session_destroy();
unset($_SESSION['username']);
unset($_SESSION['role']);
header("Location: signin.php");
//  ***************************************************************************
 ?>
