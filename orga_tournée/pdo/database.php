<?php

class DBConnection
{
	private static ?PDO $database = null;

	public static function getInstance(): PDO
	{
		if (DBConnection::$database === null) {
			try {
				DBConnection::$database = new PDO('mysql:host=localhost;dbname=tournee;charset=utf8', "root", "");
				echo '<script> console.log("Connexion Effectué") </script>';
			} catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());
				echo '<script> console.log("Connexion Effectué") </script>';
			}
		}
		return DBConnection::$database;
	}
	private function __construct()
	{
		
	}
}
?>