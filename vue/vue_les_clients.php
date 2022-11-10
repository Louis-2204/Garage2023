<h3>Liste des clients</h3>
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
echo "<h4> Le nombre de clients est de : " . $unControleur->count("client")['nb'] . "</h4>";
?>
<table class="tableauvue" border="1">
  <tr class="firstrow">
    <td class="td1">Id Client</td>
    <td>Nom Client</td>
    <td>Prénom</td>
    <td>Adresse</td>
    <td>Email</td>
    <?php
    if (isset($_SESSION['role']) && $_SESSION['role'] == "user") {
      echo "<td class='td2'>Téléphone</td>";
    } else {
      echo "<td>Téléphone</td>";
    }
    if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
      echo "<td class='td2'>Opérations</td>";
    }
    ?>
  </tr>
  <?php
  if (isset($lesClients)) {
    foreach ($lesClients as $unClient) {
      echo "<tr class='bordereven'>";
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
</table>