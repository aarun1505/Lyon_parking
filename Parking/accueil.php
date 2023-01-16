<?php // accueil.php
	 require("connect.inc.php");
	 require("tbs_class.php");
	 require("Parking.class.php");
	 // Moteur de template
	 $tbs = new clsTinyButStrong;
	 try {
 // Connexion
	 $c = new PDO("mysql:dbname=$dbname", $login, $password);
	 $etatConnexion = "Bienvenue";
	 $c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 

		 // Base de données Fifa
		 $qmat = new RQ1($c, $tbs, "SELECT `nom`, `commune`, `capacite`, `capacite2rm`, `capacitevelo`, `usage`, `vocation`, `reglementation`, `fermeture` FROM `parking` LIMIT 0,10 ", "accueil.tpl.html");
		 $qmat->executer();
		 $qmat->afficher(); 
		
	 }
	 catch(PDOException $erreur) {
	 $etatConnexion = "Erreur : " . $erreur->getMessage();
	 }
	
	
?> 