<body class="large-screen">
  <h3>Liste des clients</h3>
  <form action="" method="POST">
    <div class="toptable col-md-10">
      <?php
      echo "<h4> Le nombre de clients est de : " . $unControleur->count("client")['nb'] . "</h4>";
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
            <td>Id Client</td>
            <td>Nom Client</td>
            <td>Prénom</td>
            <td>Adresse</td>
            <td>Email</td>
            <td>Téléphone</td>
            <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
              echo "<td>Opérations</td>";
            }
            ?>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($lesClients)) {
            foreach ($lesClients as $unClient) {
              echo "<tr>";
              echo "<td>" . $unClient['idclient'] . "</td>";
              echo "<td>" . $unClient['nom'] . "</td>";
              echo "<td>" . $unClient['prenom'] . "</td>";
              echo "<td>" . $unClient['adresse'] . "</td>";
              echo "<td>" . $unClient['email'] . "</td>";
              echo "<td>" . $unClient['tel'] . "</td>";
              if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
                echo "<td>";
                echo "<div>";
                echo "<a href='index.php?page=2&action=edit&idclient=" . $unClient['idclient'] . "' onclick='openform()'><img src= 'images/edit.png' width='40' heigth='40'> </a>";
                echo "<a href='index.php?page=2&action=sup&idclient=" . $unClient['idclient'] . "'><img src= 'images/sup.png' width='40' heigth='40'> </a>";
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
  h3 {
    position: relative;
    top: 60px;
  }

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

  .table-responsive {
    text-align: center;
  }
</style>