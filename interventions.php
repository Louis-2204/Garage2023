<?php
$unControleur->setTable("intervention");
if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
  echo "<h2 class='my-3'>Gestion des Interventions</h2>";
  $lIntervention = null;
  if (isset($_GET['action']) and isset($_GET['idintervention'])) {
    $action = $_GET['action'];
    $idintervention = $_GET['idintervention'];
    switch ($action) {
      case "sup":
        $unControleur->delete("idintervention", $idintervention);
        break;
      case "edit":
        $leTechnicien = $unControleur->selectWhere("idintervention", $idintervention);
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
  $lesInterventions = $unControleur->selectAll();


  if (isset($_POST['Modifier'])) {
    $unControleur->update(
      array(
        "dateinter" => $_POST['dateinter'],
        "heure" => $_POST['heure'],
        "prix" => $_POST['prix'],
        "description" => $_POST['description'],
        "idvehicule" => $_POST['idvehicule'],
        "idtechnicien" => $_POST['idtechnicien']
      ),
      "idintervention",
      $_POST['idintervention']
    );
    header("Location: index.php?page=5");
  }
  require_once("vue/vue_insert_intervention.php");

  if (isset($_POST['Filtrer'])) {
    $mot = $_POST['mot'];
    $lesInterventions = $unControleur->selectLike($mot, array("dateinter", "heure", "prix", "description", "idvehicule", "idtechnicien"));
  } else {
    $lesInterventions = $unControleur->selectAll();
  }

  require_once("vue/vue_les_interventions.php");
  require_once("_footer.php");
}
