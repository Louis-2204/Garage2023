
<?php
if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
  echo "<h2>Gestion des Techniciens</h2>";
  $leTechnicien = null;
  if (isset($_GET['action']) and isset($_GET['idtechnicien'])) {
    $action = $_GET['action'];
    $idtechnicien = $_GET['idtechnicien'];
    switch ($action) {
      case "sup":
        $unControleur->deleteTechnicien($idtechnicien);
        break;
      case "edit":
        $leTechnicien = $unControleur->selectWhereTechnicien($idtechnicien);
        break;
    }
  }


  if (isset($_POST['Valider'])) {
    $tab = array(
      "nom" => $_POST['nom'],
      "prenom" => $_POST['prenom'],
      "qualification" => $_POST['qualification'],
      "email" => $_POST['email'],
      "tel" => $_POST['tel'],
    );
    $unControleur->insertTechnicien($tab);
  }

  //extraction de tous les techniciens
  $lesTechniciens = $unControleur->selectAllTechniciens();


  if (isset($_POST['Modifier'])) {
    $unControleur->updateTechnicien($_POST);
    header("Location: index.php?page=3");
  }
  require_once("vue/vue_insert_technicien.php");


  if (isset($_POST['Filtrer'])) {
    $mot = $_POST['mot'];
    $lesTechniciens = $unControleur->selectLikeTechniciens($mot);
  } else {
    $lesTechniciens = $unControleur->selectAllTechniciens();
  }

  require_once("vue/vue_les_techniciens.php");
  require_once("_footer.php");
}
?>