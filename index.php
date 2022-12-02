<?php
session_start();
require_once("controleur/controleur.class.php");
//instanciation du Controleur
$unControleur = new Controleur();
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <meta charset="utf-8">
  <title>Gestion d'un garage</title>
</head>

<body>
  <center>
    <?php

    if (!isset($_SESSION['email'])) {
      if (isset($_GET['Inscription'])) {
        require_once("vue/vue_inscription.php");
      } else {
        require_once("vue/vue_connexion.php");
      }
    }

    if (isset($_POST['Sinscrire'])) {
      $email = $_POST['email'];
      $mdp = $_POST['mdp'];
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      if (!$email || !$mdp || !$nom || !$prenom) {
        echo "<div class='alert alert-danger'>Verifiez vos informations</div>";
      } else {
        $Sinscrire = $unControleur->Sinscrire($email, $mdp, $nom, $prenom);
        if ($Sinscrire == "Existe") {
          echo "<div class='alert alert-danger'>Cette E-mail est déjà utilisée.</div>";
        } else {
          $unUser = $unControleur->verifConnection($email, $mdp);
          if ($unUser == null) {
            echo "<div class='alert alert-danger'>Verifiez vos identifiants</div>";
          } else {
            $_SESSION['email'] = $unUser['email'];
            $_SESSION['nom'] = $unUser['nom'];
            $_SESSION['prenom'] = $unUser['prenom'];
            $_SESSION['role'] = $unUser['role'];
            header("location: index.php?page=0");
          }
        }
      }
    }

    if (isset($_POST['seConnecter'])) {
      $email = $_POST['email'];
      $mdp = $_POST['mdp'];
      $unUser = $unControleur->verifConnection($email, $mdp);
      if ($unUser == null) {
        echo "<div class='alert alert-danger'>Verifiez vos identifiants</div>";
      } else {
        $_SESSION['email'] = $unUser['email'];
        $_SESSION['nom'] = $unUser['nom'];
        $_SESSION['prenom'] = $unUser['prenom'];
        $_SESSION['role'] = $unUser['role'];
        header("location: index.php?page=0");
      }
    }
    if (isset($_SESSION['email']) && $_SESSION['role'] == 'admin') {
      echo
      '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample03">
          <ul class="navbar-nav mx-auto my-2 text-center">
            <li class="nav-item mx-4">
              <a class="nav-item" href="index.php?page=0">Accueil</a>
            </li>
            <li class="nav-item mx-4">
              <a class="nav-item" href="index.php?page=2">Clients</a>
            </li>
            <li class="nav-item mx-4">
              <a class="nav-item" href="index.php?page=3">Techniciens</a>
            </li>
            <li class="nav-item mx-4">
              <a class="nav-item" href="index.php?page=4">Véhicules</a>
            </li>
            <li class="nav-item mx-4">
              <a class="nav-item" href="index.php?page=5">Interventions</a>
            </li>
            <li class="nav-item mx-4">
              <a class="nav-item" href="index.php?page=6">Deconnexion</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>';

      if (isset($_GET['page'])) {
        $page = $_GET['page'];
      } else {
        $page = 0;
      }
      switch ($page) {
        case 0:
          require_once("home.php");
          break;
        case 2:
          require_once("clients.php");
          break;
        case 3:
          require_once("techniciens.php");
          break;
        case 4:
          require_once("vehicules.php");
          break;
        case 5:
          require_once("interventions.php");
          break;
        case 6:
          session_destroy();
          unset($_SESSION['email']);
          header("location: index.php?page=0");
          break;
        default:
          require_once("404.php");
      }
    } elseif (isset($_SESSION['email'])) {
      echo
      '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample03">
          <ul class="navbar-nav mx-auto my-2 text-center">
            <li class="nav-item mx-4">
              <a class="nav-item" href="index.php?page=0">Accueil</a>
            </li>
            <li class="nav-item mx-4">
              <a class="nav-item" href="index.php?page=4">Véhicules</a>
            </li>
            <li class="nav-item mx-4">
              <a class="nav-item" href="index.php?page=6">Deconnexion</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>';

      if (isset($_GET['page'])) {
        $page = $_GET['page'];
      } else {
        $page = 0;
      }
      switch ($page) {
        case 0:
          require_once("home.php");
          break;
        case 4:
          require_once("vehicules.php");
          break;
        case 6:
          session_destroy();
          unset($_SESSION['email']);
          header("location: index.php?page=0");
          break;
        default:
          require_once("404.php");
      }
    }
    ?>
  </center>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<style>
  a {
    text-decoration: none;
    color: white;
    font-weight: bold;
    font-size: 1.35rem;
  }

  a:hover {
    color: #0d6efd;
  }

  li {
    transition: transform 0.15s ease-out;
  }

  li:hover {
    transform: scale(1.050);
  }

  .bl {
    border-bottom-left-radius: 20px;
  }

  .br {
    border-bottom-right-radius: 20px;
  }

  table td {
    padding-left: 10px;
    padding-right: 10px;
  }

  .tableauvue tr:nth-child(odd) {
    background-color: #F6F6F6;
  }

  .bordereven {
    outline: 1px solid rgba(0, 0, 0, 0.1);
  }

  .tableauvue {
    color: grey;
  }

  .tableauvue td {
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 40px;
    padding-right: 40px;
  }

  .tableauvue {
    border-collapse: collapse;
    border-radius: 10px;
    border-style: hidden;
    margin-bottom: 30px;
  }

  table {
    font-size: 18px;
    border: 0px;
    outline: 0px;
    border-collapse: collapse;
  }



  .firstrow {
    background-color: #362F4B !important;
    color: white !important;
    font-family: 'Karla', sans-serif !important;
  }

  .firstrow td {
    padding: 10px;
    padding-left: 40px;
    padding-right: 40px;
  }

  .td1 {
    border-top-left-radius: 10px;
  }

  .td2 {
    border-top-right-radius: 10px;
  }

  .pointer {
    cursor: pointer;
  }







  .wrap {
    max-height: 70vh;
    overflow: auto;
  }

  .first td {
    height: 50px;
  }

  .first tr {
    background: white;
    box-shadow: 0 10px 10px rgba(0, 0, 0, .1);
  }

  /* ::-webkit-scrollbar {
    width: 0.15em;
    height: 0.15em;
  }

  ::-webkit-scrollbar-thumb {
    background: slategray;
  }

  ::-webkit-scrollbar-track {
    background: #b8c0c8;
  } */

  body {
    scrollbar-face-color: slategray;
    scrollbar-track-color: #b8c0c8;
  }

  body,
  html {
    height: 100%;
    width: 100%;
  }

  button.btn {
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.2);
    border: 0;
    border-radius: 0px;
  }

  button.btn i {
    margin-right: 3px;
  }

  body.large-screen .card-list-table {
    background: white;
  }

  body.large-screen .card-list-table tbody tr {
    background: transparent;
    box-shadow: none;
    margin: 0;
  }

  body.large-screen .card-list-table thead {
    display: table-header-group;
  }

  body.large-screen .card-list-table thead th:last-child {
    box-shadow: none;
  }

  body.large-screen .card-list-table thead th {
    padding: 12px 24px;
  }

  body.large-screen .card-list-table tbody tr {
    display: table-row;
    padding-bottom: 0;
  }

  body.large-screen .card-list-table tbody tr:nth-of-type(even) {
    background: #f5f6fb;
  }

  body.large-screen .card-list-table tbody td {
    display: table-cell;
    padding: 20px 10px;
    transition: background 0.2s ease-out;
    vertical-align: middle;
  }

  body.large-screen .card-list-table tbody td:after {
    display: none;
  }


  .buttons {
    margin: 10px 0 50px;
  }

  .table-wrapper {
    max-width: 300px;
    width: 80%;
    margin: 0 auto 0;
    max-height: 500px;
    overflow-y: scroll;
    position: relative;
    transition: all 0.2s ease-out;
  }

  @media (min-width: 768px) {
    .table-wrapper {
      background: white;
      box-shadow: 0 2px 3px rgba(0, 0, 0, 0.2);
    }
  }

  .card-list-table {
    background: transparent;
    margin-bottom: 0;
    width: 100%;
  }

  .card-list-table thead {
    display: none;
  }

  .card-list-table tbody tr {
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.2);
    background: #fff;
    display: block;
    padding: 15px 10px;
    margin: 0 0 10px 0;
  }

  .card-list-table tbody td {
    border: 0;
    display: block;
    padding: 10px 10px 20px 40%;
    position: relative;
  }

  .card-list-table tbody td:first-of-type::after {
    visibility: hidden;
  }

  .card-list-table tbody td:after {
    content: '';
    width: calc(100% - 30px);
    display: block;
    margin: 0 auto;
    height: 1px;
    background: #dfdfdf;
    position: absolute;
    left: 0;
    right: 0;
    top: -6px;
  }

  .card-list-table thead th {
    text-transform: uppercase;
    font-size: 0.85em;
    color: rgba(0, 0, 0, 0.35);
    letter-spacing: 0.5pt;
  }
</style>