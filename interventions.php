<h2>Gestion des Interventions</h2>

<?php
$lIntervention = null;
if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
  if (isset($_GET['action']) and isset($_GET['idintervention'])) {
    $action = $_GET['action'];
    $idintervention = $_GET['idintervention'];
    switch ($action) {
      case "sup":
        $unControleur->deleteIntervention($idintervention);
        break;
      case "edit":
        $lIntervention = $unControleur->selectWhereIntervention($idintervention);
        break;
    }
  }


  if (isset($_POST['Valider'])) {
    $tab = array(
      "dateinter" => $_POST['dateinter'],
      "heure" => $_POST['heure'],
      "prix" => $_POST['prix'],
      "description" => $_POST['description'],
      "idvehicule" => $_POST['idvehicule'],
      "idtechnicien" => $_POST['idtechnicien']
    );
    $unControleur->insertIntervention($tab);
  }

  //extraction de toutes les interventions
  $lesInterventions = $unControleur->selectAllInterventions();


  if (isset($_POST['Modifier'])) {
    $unControleur->updateIntervention($_POST);
    header("Location: index.php?page=5");
  }
  require_once("vue/vue_insert_intervention.php");
}

if (isset($_POST['Filtrer'])) {
  $mot = $_POST['mot'];
  $lesInterventions = $unControleur->selectLikeInterventions($mot);
} else {
  $lesInterventions = $unControleur->selectAllInterventions();
}

require_once("vue/vue_les_interventions.php");
require_once("_footer.php")
?>