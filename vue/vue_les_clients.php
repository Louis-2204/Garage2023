<body class="large-screen">
  <h3>Liste des clients</h3>
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
  echo "<h4> Le nombre de clients est de : " . $unControleur->count("client")['nb'] . "</h4>";
  ?>
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
                echo "<a href='index.php?page=2&action=edit&idclient=" . $unClient['idclient'] . "'><img src= 'images/edit.png' width='40' heigth='40'> </a>";
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
  h4 {
    font-size: 13px;
    position: relative;
    left: -517px;
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
</style>