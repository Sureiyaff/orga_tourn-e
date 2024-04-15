<?php
// /!\ Les requires partent tous d'index (attention aux paths)/!\ \\
session_start();
require_once('controllers/c_Redirection.php');
$ControllerRedirection = Redirection::getInstance();

// Récupère les infos du form
$action = null;

if (isset($_GET['action'])) {
	$action = htmlspecialchars($_GET['action']);
	//Permet d'interpréter les requêtes GET avec le POST 
	$_POST['action'] = $action;
} else {
	if (isset($_POST['action'])) {
		$action = htmlspecialchars($_POST['action']);
	}
}

if (empty($action)) {
	$action = 'accueil';
}

switch ($action) {
		// Redirections action barre de nav
	case 'accueil':
		require('view/v_HomePage.php');
		break;

		// Redirections envoi de formulaire
	case 'adminRedirection';
		$ControllerRedirection->adminRedirection();
		break;

	default:
		require('view/v_HomePage.php');
}
