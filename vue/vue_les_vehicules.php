<h3>Liste des Véhicules</h3>
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
echo "<h4> Le nombre de véhicules est de : " . $unControleur->count("vehicule")['nb'] . "</h4>";
?>
<table class="tableauvue" border="1">
  <tr class="firstrow">
    <td class="td1">Matricule</td>
    <td>Marque</td>
    <td>Nombre de kilomètres</td>
    <td>Enérgie</td>
    <?php
    if (isset($_SESSION['role']) && $_SESSION['role'] == "user") {
      echo "<td class='td2'>Id client</td>";
    } else {
      echo "<td>Id client</td>";
    }
    if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
      echo "<td class='td2'>Opérations</td>";
    }
    ?>
  </tr>
  <?php
  if (isset($lesVehicules)) {
    foreach ($lesVehicules as $unVehicule) {
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
  ?>
</table>