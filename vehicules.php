<h2>Gestion des Véhicules</h2>

<?php
$leVehicule = null;
if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
  if (isset($_GET['action']) and isset($_GET['idvehicule'])) {
    $action = $_GET['action'];
    $idvehicule = $_GET['idvehicule'];
    switch ($action) {
      case "sup":
        $unControleur->deleteVehicule($idvehicule);
        break;
      case "edit":
        $leVehicule = $unControleur->selectWhereVehicule($idvehicule);
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
    $unControleur->insertVehicule($tab);
  }

  //extraction de tous les véhicules
  $lesVehicules = $unControleur->selectAllVehicules();


  if (isset($_POST['Modifier'])) {
    $unControleur->updateVehicule($_POST);
    header("Location: index.php?page=4");
  }
  require_once("vue/vue_insert_vehicule.php");
}

if (isset($_POST['Filtrer'])) {
  $mot = $_POST['mot'];
  $lesVehicules = $unControleur->selectLikeVehicules($mot);
} else {
  $lesVehicules = $unControleur->selectAllVehicules();
}

require_once("vue/vue_les_vehicules.php");
require_once("_footer.php")
?>