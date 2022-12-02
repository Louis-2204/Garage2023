
<?php
$unControleur->setTable("technicien");
if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
  echo "<h2 class='my-3'>Gestion des Techniciens</h2>";
  $leTechnicien = null;
  if (isset($_GET['action']) and isset($_GET['idtechnicien'])) {
    $action = $_GET['action'];
    $idtechnicien = $_GET['idtechnicien'];
    switch ($action) {
      case "sup":
        $unControleur->delete("idtechnicien", $idtechnicien);
        break;
      case "edit":
        $leTechnicien = $unControleur->selectWhere("idtechnicien", $idtechnicien);
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
    $unControleur->insert($tab);
  }

  //extraction de tous les techniciens
  $lesTechniciens = $unControleur->selectAll();


  if (isset($_POST['Modifier'])) {
    $unControleur->update(
      array(
        "nom" => $_POST['nom'],
        "prenom" => $_POST['prenom'],
        "qualification" => $_POST['qualification'],
        "email" => $_POST['email'],
        "tel" => $_POST['tel'],
      ),
      "idtechnicien",
      $_POST['idtechnicien']
    );
    header("Location: index.php?page=3");
  }
  require_once("vue/vue_insert_technicien.php");


  if (isset($_POST['Filtrer'])) {
    $mot = $_POST['mot'];
    $lesTechniciens = $unControleur->selectLike($mot, array("nom", "prenom", "qualification", "email", "tel"));
  } else {
    $lesTechniciens = $unControleur->selectAll();
  }

  require_once("vue/vue_les_techniciens.php");
  require_once("_footer.php");
}
?>