<h2 class='my-3'>Gestion des Véhicules</h2>

<?php
$unControleur->setTable("vehicule");
$leVehicule = null;
if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
  if (isset($_GET['action']) and isset($_GET['idvehicule'])) {
    $action = $_GET['action'];
    $idvehicule = $_GET['idvehicule'];
    switch ($action) {
      case "sup":
        $unControleur->delete("idvehicule", $idvehicule);
        break;
      case "edit":
        $leVehicule = $unControleur->selectWhere("idvehicule", $idvehicule);
        break;
    }
  }

  if (isset($_POST['Valider'])) {
    $tab = array(
      "matricule" => $_POST['matricule'],
      "marque" => $_POST['marque'],
      "nbkm" => $_POST['nbkm'],
      "energie" => $_POST['energie'],
      "idclient" => $_POST['idclient']
    );
    $unControleur->insert($tab);
  }

  //extraction de tous les véhicules
  $lesVehicules = $unControleur->selectAll();


  if (isset($_POST['Modifier'])) {
    $unControleur->update(
      array(
        "matricule" => $_POST['matricule'],
        "marque" => $_POST['marque'],
        "nbkm" => $_POST['nbkm'],
        "energie" => $_POST['energie'],
        "idclient" => $_POST['idclient']
      ),
      "idvehicule",
      $_POST['idvehicule']
    );
    header("Location: index.php?page=4");
  }
  require_once("vue/vue_insert_vehicule.php");
}

if (isset($_POST['Filtrer'])) {
  $mot = $_POST['mot'];
  $lesVehicules = $unControleur->selectLike($mot, array("matricule", "marque", "nbkm", "energie", "idclient"));
} else {
  $lesVehicules = $unControleur->selectAll();
}

require_once("vue/vue_les_vehicules.php");
require_once("_footer.php")
?>