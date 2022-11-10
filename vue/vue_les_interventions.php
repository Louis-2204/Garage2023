<h3>Liste des Interventions</h3>
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
echo "<h4> Le nombre d'interventions est de : " . $unControleur->count("intervention")['nb'] . "</h4>";
?>
<table class="tableauvue" border="1">
  <tr class="firstrow">
    <td class="td1">Id Intervention</td>
    <td>Date Intervention</td>
    <td>Heure</td>
    <td>Prix</td>
    <td>Description</td>
    <td>Id Véhicule</td>
    <?php
    if (isset($_SESSION['role']) && $_SESSION['role'] == "user") {
      echo "<td class='td2'>Id Technicien</td>";
    } else {
      echo "<td>Id Technicien</td>";
    }
    if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
      echo "<td class='td2'>Opérations</td>";
    }
    ?>
  </tr>
  <?php
  if (isset($lesInterventions)) {
    foreach ($lesInterventions as $uneIntervention) {
      echo "<tr class='bordereven'>";
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
</table>