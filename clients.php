<?php
$unControleur->setTable("client");
if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
  echo "<h2 class='my-3'>Gestion des Clients</h2>";
  $leClient = null;
  if (isset($_GET['action']) and isset($_GET['idclient'])) {
    $action = $_GET['action'];
    $idclient = $_GET['idclient'];
    switch ($action) {
      case "sup":
        $unControleur->delete("idclient", $idclient);
        break;
      case "edit":
        $leClient = $unControleur->selectWhere("idclient", $idclient);
        break;
    }
  }


  if (isset($_POST['Valider'])) {
    $tab = array(
      "nom" => $_POST['nom'],
      "prenom" => $_POST['prenom'],
      "adresse" => $_POST['adresse'],
      "email" => $_POST['email'],
      "tel" => $_POST['tel']
    );
    $unControleur->insert($tab);
  }

  //extraction de tous les clients
  $lesClients = $unControleur->selectAll();


  if (isset($_POST['Modifier'])) {
    $unControleur->update(
      array(
        "nom" => $_POST['nom'],
        "prenom" => $_POST['prenom'],
        "adresse" => $_POST['adresse'],
        "email" => $_POST['email'],
        "tel" => $_POST['tel']
      ),
      "idclient",
      $_POST['idclient']
    );
    header("Location: index.php?page=2");
  }
  require_once("vue/vue_insert_client.php");

  if (isset($_POST['Filtrer'])) {
    $mot = $_POST['mot'];
    $lesClients = $unControleur->selectLike($mot, array("nom", "prenom", "adresse", "email", "tel"));
  } else {
    $lesClients = $unControleur->selectAll();
  }

  require_once("vue/vue_les_clients.php");
  require_once("_footer.php");
}
?>
<style>
  body {
    min-height: 100vh;
  }
</style>