<?php
class Modele
{
  private $unPdo = null;
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

  //Clients

  public function insertClient($tab)
  {
    $requete = "insert into client values(null, :nom, :prenom, :adresse, :email, :tel);";
    $donnees = array(
      ":nom" => $tab['nom'],
      ":prenom" => $tab['prenom'],
      ":adresse" => $tab['adresse'],
      ":email" => $tab['email'],
      ":tel" => $tab['tel']
    );
    if ($this->unPdo != null) {
      //on prépare la requête
      $select = $this->unPdo->prepare($requete);
      //on exécute la requête
      $select->execute($donnees);
    }
  }
  public function selectAllClients()
  {
    $requete = "select * from client;";
    if ($this->unPdo != null) {
      //on prépare la requête
      $select = $this->unPdo->prepare($requete);
      //on exécute la requête
      $select->execute();
      //on récupère les clients et on les renvoient
      return $select->fetchAll();
    } else {
      return null;
    }
  }

  function deleteClient($idclient)
  {
    $requete = "delete from CLIENT where idclient = :idclient;";
    $donnees = array(
      ":idclient" => $idclient
    );
    if ($this->unPdo != null) {
      //on prépare la requête
      $select = $this->unPdo->prepare($requete);
      //on exécute la requête
      $select->execute($donnees);
    } else {
      return null;
    }
  }

  function updateClient($tab)
  {
    $requete = "update CLIENT set nom = :nom, prenom = :prenom, adresse = :adresse, email = :email, tel = :tel where idclient= :idclient;";
    $donnees = array(
      ":nom" => $tab['nom'],
      ":prenom" => $tab['prenom'],
      ":adresse" => $tab['adresse'],
      ":email" => $tab['email'],
      ":tel" => $tab['tel'],
      ":idclient" => $tab['idclient']
    );
    if ($this->unPdo != null) {
      //on prépare la requête
      $select = $this->unPdo->prepare($requete);
      //on exécute la requête
      $select->execute($donnees);
    } else {
      return null;
    }
  }

  function selectWhereClient($idclient)
  {
    $requete = "select * from CLIENT where idclient = :idclient;";
    $donnees = array(
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

  function selectLikeClients($mot)
  {
    if ($this->unPdo != null) {
      $requete = "select * from client where nom like :mot or prenom like :mot or adresse like :mot or email like :mot or tel like :mot;";
      $donnees = array(
        ":mot" => "%" . $mot . "%",
      );
      $select = $this->unPdo->prepare($requete);
      $select->execute($donnees);
      $lesClients = $select->fetchAll();
      return $lesClients;
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
  //Techniciens

  public function insertTechnicien($tab)
  {
    $requete = "insert into technicien values(null, :nom, :prenom, :qualification, :email, :tel);";
    $donnees = array(
      ":nom" => $tab['nom'],
      ":prenom" => $tab['prenom'],
      ":qualification" => $tab['qualification'],
      ":email" => $tab['email'],
      ":tel" => $tab['tel'],
    );
    if ($this->unPdo != null) {
      //on prépare la requête
      $select = $this->unPdo->prepare($requete);
      //on exécute la requête
      $select->execute($donnees);
    }
  }
  public function selectAllTechniciens()
  {
    $requete = "select * from technicien;";
    if ($this->unPdo != null) {
      //on prépare la requête
      $select = $this->unPdo->prepare($requete);
      //on exécute la requête
      $select->execute();
      //on récupère les techniciens et on les renvoient
      return $select->fetchAll();
    } else {
      return null;
    }
  }

  function deleteTechnicien($idtechnicien)
  {
    $requete = "delete from technicien where idtechnicien = :idtechnicien;";
    $donnees = array(
      ":idtechnicien" => $idtechnicien
    );
    if ($this->unPdo != null) {
      //on prépare la requête
      $select = $this->unPdo->prepare($requete);
      //on exécute la requête
      $select->execute($donnees);
    } else {
      return null;
    }
  }

  function updateTechnicien($tab)
  {
    $requete = "update technicien set nom = :nom, prenom = :prenom, qualification = :qualification, email = :email, tel = :tel where idtechnicien= :idtechnicien;";
    $donnees = array(
      ":nom" => $tab['nom'],
      ":prenom" => $tab['prenom'],
      ":qualification" => $tab['qualification'],
      ":email" => $tab['email'],
      ":tel" => $tab['tel'],
      ":idtechnicien" => $tab['idtechnicien']
    );
    if ($this->unPdo != null) {
      //on prépare la requête
      $select = $this->unPdo->prepare($requete);
      //on exécute la requête
      $select->execute($donnees);
    } else {
      return null;
    }
  }

  function selectWhereTechnicien($idtechnicien)
  {
    $requete = "select * from technicien where idtechnicien = :idtechnicien;";
    $donnees = array(
      ":idtechnicien" => $idtechnicien
    );
    if ($this->unPdo != null) {
      //on prépare la requête
      $select = $this->unPdo->prepare($requete);
      //on exécute la requête
      $select->execute($donnees);
      $unTechnicien = $select->fetch();
      return $unTechnicien;
    } else {
      return null;
    }
  }
  function selectLikeTechniciens($mot)
  {
    if ($this->unPdo != null) {
      $requete = "select * from technicien where nom like :mot or prenom like :mot or qualification like :mot or email like :mot or tel like :mot;";
      $donnees = array(
        ":mot" => "%" . $mot . "%",
      );
      $select = $this->unPdo->prepare($requete);
      $select->execute($donnees);
      $lesClients = $select->fetchAll();
      return $lesClients;
    } else {
      return null;
    }
  }

  //Véhicules

  public function insertVehicule($tab)
  {
    $requete = "insert into vehicule values(null, :matricule, :marque, :nbkm, :energie, :idclient);";
    $donnees = array(
      ":matricule" => $tab['matricule'],
      ":marque" => $tab['marque'],
      ":nbkm" => $tab['nbkm'],
      ":energie" => $tab['energie'],
      ":idclient" => $tab['idclient']
    );
    if ($this->unPdo != null) {
      //on prépare la requête
      $select = $this->unPdo->prepare($requete);
      //on exécute la requête
      $select->execute($donnees);
    }
  }
  public function selectAllVehicules()
  {
    $requete = "select * from vehicule;";
    if ($this->unPdo != null) {
      //on prépare la requête
      $select = $this->unPdo->prepare($requete);
      //on exécute la requête
      $select->execute();
      //on récupère les véhicules et on les renvoient
      return $select->fetchAll();
    } else {
      return null;
    }
  }

  function deleteVehicule($idvehicule)
  {
    $requete = "delete from vehicule where idvehicule = :idvehicule;";
    $donnees = array(
      ":idvehicule" => $idvehicule
    );
    if ($this->unPdo != null) {
      //on prépare la requête
      $select = $this->unPdo->prepare($requete);
      //on exécute la requête
      $select->execute($donnees);
    } else {
      return null;
    }
  }

  function updateVehicule($tab)
  {
    $requete = "update vehicule set matricule = :matricule, marque = :marque, nbkm = :nbkm, energie = :energie, idclient = :idclient where idvehicule= :idvehicule;";
    $donnees = array(
      ":matricule" => $tab['matricule'],
      ":marque" => $tab['marque'],
      ":nbkm" => $tab['nbkm'],
      ":energie" => $tab['energie'],
      ":idclient" => $tab['idclient'],
      ":idvehicule" => $tab['idvehicule']
    );
    if ($this->unPdo != null) {
      //on prépare la requête
      $select = $this->unPdo->prepare($requete);
      //on exécute la requête
      $select->execute($donnees);
    } else {
      return null;
    }
  }

  function selectWhereVehicule($idvehicule)
  {
    $requete = "select * from vehicule where idvehicule = :idvehicule;";
    $donnees = array(
      ":idvehicule" => $idvehicule
    );
    if ($this->unPdo != null) {
      //on prépare la requête
      $select = $this->unPdo->prepare($requete);
      //on exécute la requête
      $select->execute($donnees);
      $unVehicule = $select->fetch();
      return $unVehicule;
    } else {
      return null;
    }
  }
  function selectLikeVehicules($mot)
  {
    if ($this->unPdo != null) {
      $requete = "select * from vehicule where matricule like :mot or marque like :mot or nbkm like :mot or energie like :mot or idclient like :mot;";
      $donnees = array(
        ":mot" => "%" . $mot . "%",
      );
      $select = $this->unPdo->prepare($requete);
      $select->execute($donnees);
      $lesVehicules = $select->fetchAll();
      return $lesVehicules;
    } else {
      return null;
    }
  }
  //Interventions

  public function insertIntervention($tab)
  {
    $requete = "insert into intervention values(null, :dateinter, :heure, :prix, :description, :idvehicule, :idtechnicien);";
    $donnees = array(
      ":dateinter" => $tab['dateinter'],
      ":heure" => $tab['heure'],
      ":prix" => $tab['prix'],
      ":description" => $tab['description'],
      ":idvehicule" => $tab['idvehicule'],
      ":idtechnicien" => $tab['idtechnicien']
    );
    if ($this->unPdo != null) {
      //on prépare la requête
      $select = $this->unPdo->prepare($requete);
      //on exécute la requête
      $select->execute($donnees);
    }
  }
  public function selectAllInterventions()
  {
    $requete = "select * from intervention;";
    if ($this->unPdo != null) {
      //on prépare la requête
      $select = $this->unPdo->prepare($requete);
      //on exécute la requête
      $select->execute();
      //on récupère les interventions et on les renvoient
      return $select->fetchAll();
    } else {
      return null;
    }
  }

  function deleteIntervention($idintervention)
  {
    $requete = "delete from intervention where idintervention = :idintervention;";
    $donnees = array(
      ":idintervention" => $idintervention
    );
    if ($this->unPdo != null) {
      //on prépare la requête
      $select = $this->unPdo->prepare($requete);
      //on exécute la requête
      $select->execute($donnees);
    } else {
      return null;
    }
  }

  function updateIntervention($tab)
  {
    $requete = "update intervention set dateinter = :dateinter, heure = :heure, prix = :prix, description = :description, idvehicule = :idvehicule, idtechnicien = :idtechnicien where idintervention= :idintervention;";
    $donnees = array(
      ":dateinter" => $tab['dateinter'],
      ":heure" => $tab['heure'],
      ":prix" => $tab['prix'],
      ":description" => $tab['description'],
      ":idvehicule" => $tab['idvehicule'],
      ":idtechnicien" => $tab['idtechnicien'],
      ":idintervention" => $tab['idintervention']
    );
    if ($this->unPdo != null) {
      //on prépare la requête
      $select = $this->unPdo->prepare($requete);
      //on exécute la requête
      $select->execute($donnees);
    } else {
      return null;
    }
  }

  function selectWhereIntervention($idintervention)
  {
    $requete = "select * from intervention where idintervention = :idintervention;";
    $donnees = array(
      ":idintervention" => $idintervention
    );
    if ($this->unPdo != null) {
      //on prépare la requête
      $select = $this->unPdo->prepare($requete);
      //on exécute la requête
      $select->execute($donnees);
      $uneIntervention = $select->fetch();
      return $uneIntervention;
    } else {
      return null;
    }
  }
  function selectLikeInterventions($mot)
  {
    if ($this->unPdo != null) {
      $requete = "select * from intervention where dateinter like :mot or heure like :mot or prix like :mot or description like :mot or idvehicule like :mot or idtechnicien like :mot;";
      $donnees = array(
        ":mot" => "%" . $mot . "%",
      );
      $select = $this->unPdo->prepare($requete);
      $select->execute($donnees);
      $lesInterventions = $select->fetchAll();
      return $lesInterventions;
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

  function Sinscrire($email, $mdp,$nom,$prenom)
  {
    $requete = "select * from user where email=:email";
    $donnees = array(
      ":email" => $email);
    if ($this->unPdo != null) {
      $select = $this->unPdo->prepare($requete);
      $select->execute($donnees);
      $existe = $select->fetch();
      if($existe != false){
        $unUser = "Existe";
        return $unUser;
      }else{
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
