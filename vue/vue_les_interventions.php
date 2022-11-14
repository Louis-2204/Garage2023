<body class="large-screen">
  <h3>Liste des Interventions</h3>
  <form action="" method="POST">
    <div class="filtrer">
      <div class="filtrer1block">
        <label for="mot">Filtrer par :</label>
        <input class="form-control mb-2" type="text" name="mot" id="mot">
      </div>
      <div class="filtrer2block"> <input class="btn btn-primary mb-4" type="submit" name="Filtrer" value="Filtrer"></div>
    </div>
  </form>
  <br><br>
  <?php
  echo "<h4> Le nombre d'interventions est de : " . $unControleur->count("intervention")['nb'] . "</h4>";
  ?>
  <div class="mb-5">
    <div class="wrap col-md-10 shadow">
      <table class="table-responsive card-list-table tab">
        <thead class="first sticky-top">
          <tr>
            <td>Id Intervention</td>
            <td>Date Intervention</td>
            <td>Heure</td>
            <td>Prix</td>
            <td>Description</td>
            <td>Id Véhicule</td>
            <td>Id Technicien</td>
            <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
              echo "<td>Opérations</td>";
            }
            ?>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($lesInterventions)) {
            foreach ($lesInterventions as $uneIntervention) {
              echo "<tr>";
              echo "<td>" . $uneIntervention['idintervention'] . "</td>";
              echo "<td>" . $uneIntervention['dateinter'] . "</td>";
              echo "<td>" . $uneIntervention['heure'] . "</td>";
              echo "<td>" . $uneIntervention['prix'] . "</td>";
              echo "<td>" . $uneIntervention['description'] . "</td>";
              echo "<td>" . $uneIntervention['idvehicule'] . "</td>";
              echo "<td>" . $uneIntervention['idtechnicien'] . "</td>";
              if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
                echo "<td>";
                echo "<div>";
                echo "<a href='index.php?page=5&action=edit&idintervention=" . $uneIntervention['idintervention'] . "'><img src= 'images/edit.png' width='40' heigth='40'> </a>";
                echo "<a href='index.php?page=5&action=sup&idintervention=" . $uneIntervention['idintervention'] . "'><img src= 'images/sup.png' width='40' heigth='40'> </a>";
                echo "</div>";
                echo "</td>";
              }
              echo "</tr>";
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

<style>
  h4 {
    font-size: 13px;
    position: relative;
    left: -500px;
  }

  .filtrer {
    display: flex;
    width: 300px;
    position: relative;
    top: 70px;
    right: -470px;
  }

  .filtrer1block {
    text-align: left;
  }

  .filtrer2block {
    position: relative;
    top: 24px;
    margin-left: 10px;
  }


  .table-responsive {
    text-align: center;
  }
</style>