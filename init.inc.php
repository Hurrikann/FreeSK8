<?php
//--------- BDD
$mysqli = new mysqli("localhost", "root", "", "site");
if ($mysqli->connect_error) 
	die('Un problème est survenu lors de la tentative de connexion à la BDD : ' . $mysqli->connect_error);

//if (!$mysqli->set_charset("utf8")) 
	//die("Erreur lors du chargement du jeu de caractères utf8 : ". $mysqli->error);

 
//--------- SESSION
session_start();
 
//--------- CHEMIN
define("RACINE_SITE","/site/");
 
//--------- VARIABLES
$contenu = '';
 
//--------- AUTRES INCLUSIONS
require_once("fonction.inc.php");