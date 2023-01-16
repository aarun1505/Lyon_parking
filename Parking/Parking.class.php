<?php // Fifa22.class.php
 class Requete {
	 protected $pdo; // Identifiant de connexion
	 protected $tbs; // Moteur de template
	 protected $req; // Requête SQL
	 protected $gab; // Nom de gabarit
	 protected $data; // Résultat de requête

	 function __construct($param_pdo, $param_tbs, $param_req, $param_gab) {
	 $this->pdo = $param_pdo;
	 $this->tbs = $param_tbs;
	 $this->req = $param_req;
	 $this->gab = $param_gab;
	 }

	 public function executer() {
	 $res = $this->pdo->prepare($this->req);
	 $res->execute();
	 $this->data = $res->fetchAll();
	 } 
	 
	  public function executer_nom($nom) {
	 $res = $this->pdo->prepare($this->req);
	 $res->execute([$nom]);
	 $this->data = $res->fetchAll();
	 }
	 
	 public function executer_club($nomclub) {
	 $res = $this->pdo->prepare($this->req);
	 $res->execute([$nomclub]);
	 $this->data = $res->fetchAll();
	 }
	 
	public function executer_nat($nomnat) {
	 $res = $this->pdo->prepare($this->req);
	 $res->execute([$nomnat]);
	 $this->data = $res->fetchAll();
	 }
	 
 }
 
 class RQ1 extends Requete {
	 
	 
	 public function afficher() {
	 // Préparation des données
	 $i = 0;
	 $listenom = array();
	 $listecommune = array();
	 $listecapacite = array();
	 $listecapacite2rm = array();
	 $listecapacitevelo = array();
	 $listeusage = array();
	 $listevocation = array();
	 $listereglementation = array();
	 $listefermeture = array();

	 foreach($this->data as $ligne) {
	 $listenom[$i++] = $ligne["nom"];
	 $listecommune[$i++] = $ligne["commune"];
	 $listecapacite[$i++] = $ligne["capacite"];
	 $listecapacite2rm[$i++] = $ligne["capacite2rm"];
	 $listecapacitevelo[$i++] = $ligne["capacitevelo"];
	 $listeusage[$i++] = $ligne["usage"];
	 $listevocation[$i++] = $ligne["vocation"];
	 $listereglementation[$i++] = $ligne["reglementation"];
	 $listefermeture[$i++] = $ligne["fermeture"];
	 }
	 
	 // Affichage du gabarit
	 $this->tbs->LoadTemplate($this->gab);
	 $this->tbs->MergeBlock("nom", $listenom);
	 $this->tbs->MergeBlock("commune", $listecommune);
	 $this->tbs->MergeBlock("capacite", $listecapacite);
	 $this->tbs->MergeBlock("capacite2rm", $listecapacite2rm);
	 $this->tbs->MergeBlock("capacitevelo", $listecapacitevelo);
	 $this->tbs->MergeBlock("usage", $listeusage);
	 $this->tbs->MergeBlock("vocation", $listevocation);
	 $this->tbs->MergeBlock("reglementation", $listereglementation);
	 $this->tbs->MergeBlock("fermeture", $listefermeture);
	 $this->tbs->Show();
	 }
 }


class RQ2 extends Requete {
	 
	 
	 public function afficher() {
	 // Préparation des données
	 $i = 0;
	 $listenom = array();
	 $listecommune = array();
	 $listeproprietaire = array();
	 $listeparkingtempsreel = array();
	 $listecapacite = array();
	 $listecapacite2rm = array();
	 $listecapacitevelo = array();
	 $listecapaciteautopartage = array();
	 $listecapacitepmr = array();
	 $listeusage = array();
	 $listevocation = array();
	 $listereglementation = array();
	 $listefermeture = array();

	 foreach($this->data as $ligne) {
	 $listenom[$i++] = $ligne["nom"];
	 $listecommune[$i++] = $ligne["commune"];
	 $listeproprietaire[$i++] = $ligne["proprietaire"];
	 $listeparkingtempsreel[$i++] = $ligne["parkingtempsreel"];
	 $listecapacite[$i++] = $ligne["capacite"];
	 $listecapacite2rm[$i++] = $ligne["capacite2rm"];
	 $listecapacitevelo[$i++] = $ligne["capacitevelo"];
	 $listecapaciteautopartage[$i++] = $ligne["capaciteautopartage"];
	 $listecapacitepmr[$i++] = $ligne["capacitepmr"];
	 $listeusage[$i++] = $ligne["usage"];
	 $listevocation[$i++] = $ligne["vocation"];
	 $listereglementation[$i++] = $ligne["reglementation"];
	 $listefermeture[$i++] = $ligne["fermeture"];
	 }
	 
	 // Affichage du gabarit
	 $this->tbs->LoadTemplate($this->gab);
	 $this->tbs->MergeBlock("nom", $listenom);
	 $this->tbs->MergeBlock("commune", $listecommune);
	 $this->tbs->MergeBlock("proprietaire", $listeproprietaire);
	 $this->tbs->MergeBlock("parkingtempsreel", $listeparkingtempsreel);
	 $this->tbs->MergeBlock("capacite", $listecapacite);
	 $this->tbs->MergeBlock("capacite2rm", $listecapacite2rm);
	 $this->tbs->MergeBlock("capacitevelo", $listecapacitevelo);
	 $this->tbs->MergeBlock("capaciteautopartage", $listecapaciteautopartage);
	 $this->tbs->MergeBlock("capacitepmr", $listecapacitepmr);
	 $this->tbs->MergeBlock("usage", $listeusage);
	 $this->tbs->MergeBlock("vocation", $listevocation);
	 $this->tbs->MergeBlock("reglementation", $listereglementation);
	 $this->tbs->MergeBlock("fermeture", $listefermeture);
	 $this->tbs->Show();
	 }
 }  
 
 
 
?>