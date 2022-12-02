<?php
require_once("modele/modele.class.php");

class Controleur
{

  private $unModele;

  public function __construct()
  {
    $this->unModele = new Modele();
  }

  public function setTable($uneTable)
  {
    $this->unModele->setTable($uneTable);
  }
  public function selectAll()
  {
    $lesResultats = $this->unModele->selectAll();
    return $lesResultats;
  }
  public function insert($tab)
  {
    $this->unModele->insert($tab);
  }
  public function selectLike($mot, $tab)
  {
    $lesResultats = $this->unModele->selectLike($mot, $tab);
    return $lesResultats;
  }
  public function delete($id, $valeur)
  {
    $this->unModele->delete($id, $valeur);
  }
  public function selectWhere($id, $valeur)
  {
    $unResultat = $this->unModele->selectWhere($id, $valeur);
    return $unResultat;
  }
  public function update($tab, $id, $valeurId)
  {
    $this->unModele->update($tab, $id, $valeurId);
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

  /****************************LES USERS****************************/
  public function verifConnection($email, $mdp)
  {
    return $this->unModele->verifConnection($email, $mdp);
  }

  public function Sinscrire($email, $mdp, $nom, $prenom)
  {
    return $this->unModele->Sinscrire($email, $mdp, $nom, $prenom);
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
