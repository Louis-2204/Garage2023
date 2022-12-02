<?php
class Modele
{
  private $unPdo = null;
  private $table; // table générique du modèle
  //PDO: classe en php pour se connecter à la base de données; P:PHP, D:Data, O:Object

  public function __construct()
  {
    try {
      //gestion des exceptions: code qui pourra poser des problemes de connexion
      $this->unPdo = new PDO("mysql:host=localhost;dbname=garage_slam_jv_23", "root", "");
    } catch (PDOException $exp) {
      //la levée de l'exception: on affiche un message
      echo "Erreur de connexion à la base de données";
      echo $exp->getMessage();
    }
  }
  public function setTable($uneTable)
  {
    $this->table = $uneTable;
  }

  public function selectAll()
  {
    if ($this->unPdo != null) {
      $requete = "select * from " . $this->table . ";";
      $select = $this->unPdo->prepare($requete);
      $select->execute();
      $lesResultats = $select->fetchAll();
      return $lesResultats;
    } else {
      return null;
    }
  }

  public function insert($tab)
  {
    if ($this->unPdo != null) {
      $chaineChamps = array();
      foreach ($tab as $cle => $valeur) {
        $tabChamps[] = ":" . $cle;
        $donnees[":" . $cle] = $valeur;
      }
      $chaineChamps = implode(",", $tabChamps);
      $requete = "insert into " . $this->table . " values (null, " . $chaineChamps . ");";
      $insert = $this->unPdo->prepare($requete);
      $insert->execute($donnees);
    }
  }
  public function selectLike($mot, $tab)
  {
    if ($this->unPdo != null) {
      $tabChamps = array();
      foreach ($tab as $cle) {
        $tabChamps[] = $cle . " like :mot ";
      }
      $chaineChamps = implode(" or ", $tabChamps);
      $requete = "select * from " . $this->table . " where " . $chaineChamps . ";";
      $donnees = array(
        ":mot" => "%" . $mot . "%",
      );
      $select = $this->unPdo->prepare($requete);
      $select->execute($donnees);
      $lesResulats = $select->fetchAll();
      return $lesResulats;
    } else {
      return null;
    }
  }
  public function delete($id, $valeur)
  {
    if ($this->unPdo != null) {
      $requete = "delete from " . $this->table . " where " . $id . " = :" . $id . ";";
      $donnees = array(
        ":" . $id => $valeur,
      );
      $delete = $this->unPdo->prepare($requete);
      $delete->execute($donnees);
    }
  }
  public function selectWhere($id, $valeur)
  {
    if ($this->unPdo != null) {
      $requete = "select * from " . $this->table . " where " . $id . " = :" . $id . ";";
      $donnees = array(
        ":" . $id => $valeur,
      );
      $select = $this->unPdo->prepare($requete);
      $select->execute($donnees);
      $unResultat = $select->fetch();
      return $unResultat;
    } else {
      return null;
    }
  }
  public function update($tab, $id, $valeurId)
  {
    if ($this->unPdo != null) {
      $tabChamps = array();
      foreach ($tab as $cle => $valeur) {
        $tabChamps[] = $cle . " = :" . $cle;
        $donnees[":" . $cle] = $valeur;
      }
      $chaineChamps = implode(",", $tabChamps);
      $requete = "update " . $this->table . " set " . $chaineChamps . " where " . $id . " = :" . $id . ";";
      $donnees[":" . $id] = $valeurId;
      $update = $this->unPdo->prepare($requete);
      $update->execute($donnees);
    }
  }
  function selectMailClient($email, $idclient)
  {
    $requete = "select * from CLIENT where email = :email and idclient = :idclient;";
    $donnees = array(
      ":email" => $email,
      ":idclient" => $idclient
    );
    if ($this->unPdo != null) {
      //on prépare la requête
      $select = $this->unPdo->prepare($requete);
      //on exécute la requête
      $select->execute($donnees);
      $unClient = $select->fetch();
      return $unClient;
    } else {
      return null;
    }
  }
  function selectIdClient($email)
  {
    $requete = "select * from CLIENT where email = :email;";
    $donnees = array(
      ":email" => $email
    );
    if ($this->unPdo != null) {
      //on prépare la requête
      $select = $this->unPdo->prepare($requete);
      //on exécute la requête
      $select->execute($donnees);
      $unClient = $select->fetch();
      return $unClient;
    } else {
      return null;
    }
  }
  function countVehiculeUser($idclient)
  {
    if ($this->unPdo != null) {
      $requete = "select count(*) as nb from vehicule where idclient = :idclient;";
      $donnees = array(
        ":idclient" => $idclient
      );
      $select = $this->unPdo->prepare($requete);
      $select->execute($donnees);
      $unResultat = $select->fetch();
      return $unResultat;
    } else {
      return null;
    }
  }
  /****************************LES USERS****************************/
  function verifConnection($email, $mdp)
  {
    $requete = "select * from user where email=:email and mdp=:mdp;";
    $donnees = array(
      ":email" => $email,
      ":mdp" => $mdp
    );
    if ($this->unPdo != null) {
      $select = $this->unPdo->prepare($requete);
      $select->execute($donnees);
      $unUser = $select->fetch();
      return $unUser;
    } else {
      return null;
    }
  }

  function Sinscrire($email, $mdp, $nom, $prenom)
  {
    $requete = "select * from user where email=:email";
    $donnees = array(
      ":email" => $email
    );
    if ($this->unPdo != null) {
      $select = $this->unPdo->prepare($requete);
      $select->execute($donnees);
      $existe = $select->fetch();
      if ($existe != false) {
        $unUser = "Existe";
        return $unUser;
      } else {
        $requete = "insert into user values(null,:nom,:prenom,:email,:mdp,'user');";
        $donnees = array(
          ":email" => $email,
          ":mdp" => $mdp,
          ":nom" => $nom,
          ":prenom" => $prenom
        );
        $select = $this->unPdo->prepare($requete);
        $select->execute($donnees);
      }
    } else {
      return null;
    }
  }
  /****************************Autres méthodes****************************/
  public function count($table)
  {
    if ($this->unPdo != null) {
      $requete = "select count(*) as nb from " . $table;
      $select = $this->unPdo->prepare($requete);
      $select->execute();
      $unResultat = $select->fetch();
      return $unResultat;
    } else {
      return null;
    }
  }
  public function selectAllVue()
  {
    if ($this->unPdo != null) {
      $requete = "select * from vehiculesInterventions;";
      $select = $this->unPdo->prepare($requete);
      $select->execute();
      $lesResultats = $select->fetchAll();
      return $lesResultats;
    } else {
      return null;
    }
  }
}
