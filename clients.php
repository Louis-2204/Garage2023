<?php
if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
  echo "<h2 class='my-3'>Gestion des Clients</h2>";
  $leClient = null;
  if (isset($_GET['action']) and isset($_GET['idclient'])) {
    $action = $_GET['action'];
    $idclient = $_GET['idclient'];
    switch ($action) {
      case "sup":
        $unControleur->deleteClient($idclient);
        break;
      case "edit":
        $leClient = $unControleur->selectWhereClient($idclient);
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
    $unControleur->insertClient($tab);
  }

  //extraction de tous les clients
  $lesClients = $unControleur->selectAllClients();


  if (isset($_POST['Modifier'])) {
    $unControleur->updateClient($_POST);
    header("Location: index.php?page=2");
  }
  require_once("vue/vue_insert_client.php");

  if (isset($_POST['Filtrer'])) {
    $mot = $_POST['mot'];
    $lesClients = $unControleur->selectLikeClients($mot);
  } else {
    $lesClients = $unControleur->selectAllClients();
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