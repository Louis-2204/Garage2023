<body class="large-screen">
  <h3>Liste des Véhicules</h3>
  <form action="" method="POST">
    <div class="toptable col-md-10">
      <?php
      $idclient = $unControleur->selectIdClient($_SESSION['email'])['idclient'];
      if ($_SESSION['role'] == 'user') {
        echo "<h4> Vous possédez " . $unControleur->countVehiculeUser($idclient)['nb'] . " véhicule </h4>";
      } else {
        echo "<h4> Le nombre de véhicules est de : " . $unControleur->count("vehicule")['nb'] . "</h4>";
      }
      ?>
      <div class="filtrer">
        <div class="filtrer1block">
          <label for="mot">Filtrer par :</label>
          <input class="form-control mb-2" type="text" name="mot" id="mot">
        </div>
        <div class="filtrer2block"> <input class="btn btn-primary mb-4" type="submit" name="Filtrer" value="Filtrer"></div>
      </div>
    </div>

  </form>
  <br><br>
  <div class="mb-5">
    <div class="wrap col-md-10 shadow">
      <table class="table-responsive card-list-table tab">
        <thead class="first sticky-top">
          <tr>
            <td>Matricule</td>
            <td>Marque</td>
            <td>Nombre de kilomètres</td>
            <td>Enérgie</td>
            <td>Id client</td>
            <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
              echo "<td>Opérations</td>";
            }
            ?>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($lesVehicules)) {
            foreach ($lesVehicules as $unVehicule) {
              if ($_SESSION['role'] == 'admin') {
                echo "<tr class='bordereven'>";
                echo "<td> <div class='matr'>" . $unVehicule['matricule'] . "</div> </td>";
                echo "<td>" . $unVehicule['marque'] . "</td>";
                echo "<td>" . $unVehicule['nbkm'] . "</td>";
                echo "<td>" . $unVehicule['energie'] . "</td>";
                echo "<td>" . $unVehicule['idclient'] . "</td>";
                if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
                  echo "<td>";
                  echo "<div>";
                  echo "<a href='index.php?page=4&action=edit&idvehicule=" . $unVehicule['idvehicule'] . "'><img src= 'images/edit.png' width='40' heigth='40'> </a>";
                  echo "<a href='index.php?page=4&action=sup&idvehicule=" . $unVehicule['idvehicule'] . "'><img src= 'images/sup.png' width='40' heigth='40'> </a>";
                  echo "</div>";
                  echo "</td>";
                }
                echo "</tr>";
              } elseif ($_SESSION['email'] == $unControleur->selectMailClient($_SESSION['email'], $unVehicule['idclient'])['email']) {
                echo "<tr class='bordereven'>";
                echo "<td>" . $unVehicule['matricule'] . "</td>";
                echo "<td>" . $unVehicule['marque'] . "</td>";
                echo "<td>" . $unVehicule['nbkm'] . "</td>";
                echo "<td>" . $unVehicule['energie'] . "</td>";
                echo "<td>" . $unVehicule['idclient'] . "</td>";
                if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
                  echo "<td>";
                  echo "<div>";
                  echo "<a href='index.php?page=4&action=edit&idvehicule=" . $unVehicule['idvehicule'] . "'><img src= 'images/edit.png' width='40' heigth='40'> </a>";
                  echo "<a href='index.php?page=4&action=sup&idvehicule=" . $unVehicule['idvehicule'] . "'><img src= 'images/sup.png' width='40' heigth='40'> </a>";
                  echo "</div>";
                  echo "</td>";
                }
                echo "</tr>";
              }
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

<style>
  .toptable {
    display: flex;
    position: relative;
    height: 66px;
    top: 48px;
  }

  h4 {
    font-size: 13px;
    position: absolute;
    bottom: 0;
  }

  .filtrer {
    display: flex;
    width: 300px;
    position: absolute;
    right: -15px;
  }

  .filtrer1block {
    text-align: left;
  }

  .filtrer2block {
    position: relative;
    margin-left: 10px;
    top: 24px;
  }

  .matr {
    color: blue;
  }

  .table-responsive {
    text-align: center;
  }
</style>