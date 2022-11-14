<?php
require_once("modele/modele.class.php");

class Controleur
{

  private $unModele;

  public function __construct()
  {
    $this->unModele = new Modele();
  }

  //Clients

  public function insertClient($tab)
  {
    //on contrôle les données avant insertion dans le modele
    $this->unModele->insertClient($tab);
  }
  public function selectAllClients()
  {
    return $this->unModele->selectAllClients();
  }
  public function deleteClient($idclient)
  {
    return $this->unModele->deleteClient($idclient);
  }
  public function updateClient($tab)
  {
    return $this->unModele->updateClient($tab);
  }
  public function selectWhereClient($idclient)
  {
    return $this->unModele->selectWhereClient($idclient);
  }
  public function selectLikeClients($mot)
  {
    $lesClients = $this->unModele->selectLikeClients($mot);
    return $lesClients;
  }
  public function selectMailClient($email, $idclient)
  {
    return $this->unModele->selectMailClient($email, $idclient);
  }
  public function selectIdClient($email)
  {
    return $this->unModele->selectIdClient($email);
  }
  public function countVehiculeUser($idclient)
  {
    return $this->unModele->countVehiculeUser($idclient);
  }
  //Techniciens

  public function insertTechnicien($tab)
  {
    //on contrôle les données avant insertion dans le modele
    $this->unModele->insertTechnicien($tab);
  }
  public function selectAllTechniciens()
  {
    return $this->unModele->selectAllTechniciens();
  }
  public function deleteTechnicien($idtechnicien)
  {
    return $this->unModele->deleteTechnicien($idtechnicien);
  }
  public function updateTechnicien($tab)
  {
    return $this->unModele->updateTechnicien($tab);
  }
  public function selectWhereTechnicien($idtechnicien)
  {
    return $this->unModele->selectWhereTechnicien($idtechnicien);
  }
  public function selectLikeTechniciens($mot)
  {
    $lesTechniciens = $this->unModele->selectLikeTechniciens($mot);
    return $lesTechniciens;
  }

  //Vehicules

  public function insertVehicule($tab)
  {
    //on contrôle les données avant insertion dans le modele
    $this->unModele->insertVehicule($tab);
  }
  public function selectAllVehicules()
  {
    return $this->unModele->selectAllVehicules();
  }
  public function deleteVehicule($idvehicule)
  {
    return $this->unModele->deleteVehicule($idvehicule);
  }
  public function updateVehicule($tab)
  {
    return $this->unModele->updateVehicule($tab);
  }
  public function selectWhereVehicule($idvehicule)
  {
    return $this->unModele->selectWhereVehicule($idvehicule);
  }
  public function selectLikeVehicules($mot)
  {
    $lesVehicules = $this->unModele->selectLikeVehicules($mot);
    return $lesVehicules;
  }
  //Interventions

  public function insertIntervention($tab)
  {
    //on contrôle les données avant insertion dans le modele
    $this->unModele->insertIntervention($tab);
  }
  public function selectAllInterventions()
  {
    return $this->unModele->selectAllInterventions();
  }
  public function deleteIntervention($idintervention)
  {
    return $this->unModele->deleteIntervention($idintervention);
  }
  public function updateIntervention($tab)
  {
    return $this->unModele->updateIntervention($tab);
  }
  public function selectWhereIntervention($idintervention)
  {
    return $this->unModele->selectWhereIntervention($idintervention);
  }
  public function selectLikeInterventions($mot)
  {
    $lesInterventions = $this->unModele->selectLikeInterventions($mot);
    return $lesInterventions;
  }
  /****************************LES USERS****************************/
  public function verifConnection($email, $mdp)
  {
    return $this->unModele->verifConnection($email, $mdp);
  }

  public function Sinscrire($email, $mdp,$nom,$prenom)
  {
    return $this->unModele->Sinscrire($email, $mdp,$nom,$prenom);
  }
  /****************************Autres méthodes****************************/
  public function count($table)
  {
    return $this->unModele->count($table);
  }
  public function selectAllVue()
  {
    return $this->unModele->selectAllVue();
  }
}
