<body class="large-screen">
  <h3>Liste des Techniciens</h3>
  <form action="" method="POST">
    <table class="col-md-5">
      <td><label for="mot">Filtrer par :</label>
        <input class="form-control mb-2" type="text" name="mot" id="mot">
        <input class="btn btn-primary mb-4" type="submit" name="Filtrer" value="Filtrer">
      </td>
    </table>
  </form>
  <br><br>
  <?php
  echo "<h4> Le nombre de techniciens est de : " . $unControleur->count("technicien")['nb'] . "</h4>";
  ?>
  <div class="mb-5">
    <div class="wrap col-md-10 shadow">
      <table class="table-responsive card-list-table tab">
        <thead class="first sticky-top">
          <tr>
            <td>Id Technicien</td>
            <td>Nom Technicien</td>
            <td>Prénom</td>
            <td>Qualification</td>
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
          if (isset($lesTechniciens)) {
            foreach ($lesTechniciens as $unTechnicien) {
              echo "<tr class='bordereven'>";
              echo "<td>" . $unTechnicien['idtechnicien'] . "</td>";
              echo "<td>" . $unTechnicien['nom'] . "</td>";
              echo "<td>" . $unTechnicien['prenom'] . "</td>";
              echo "<td>" . $unTechnicien['qualification'] . "</td>";
              echo "<td>" . $unTechnicien['email'] . "</td>";
              echo "<td>" . $unTechnicien['tel'] . "</td>";
              if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
                echo "<td>";
                echo "<div>";
                echo "<a href='index.php?page=3&action=edit&idtechnicien=" . $unTechnicien['idtechnicien'] . "'><img src= 'images/edit.png' width='40' heigth='40'> </a>";
                echo "<a href='index.php?page=3&action=sup&idtechnicien=" . $unTechnicien['idtechnicien'] . "'><img src= 'images/sup.png' width='40' heigth='40'> </a>";
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