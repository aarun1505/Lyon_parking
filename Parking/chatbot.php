<?php // recherche.php
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
	 
	  if (isset($_GET["nom"])) {
		$nom = $_GET["nom"];
		$res = new RQ2 ($c, $tbs, 'SELECT * FROM `parking` WHERE `nom` = ?', "chatbot.html");
		if (empty($res)) {
			$res = new RQ2 ($c, $tbs, 'SELECT * FROM `parking` WHERE `commune` = ?', "chatbot.html");
			$res->executer_nom($nom);
			$res->afficher();
		}
		$res->executer_nom($nom);
		$res->afficher();
	  }
	 }
	 catch(PDOException $erreur) {
	 $etatConnexion = "Erreur : " . $erreur->getMessage();
	 }
	 // Affichage état connexion
	 /* $tbs->LoadTemplate("Fifa.tpl.html");
	 $tbs->Show(); */
	
?> 