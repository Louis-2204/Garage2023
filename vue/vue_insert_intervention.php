<h3 class="my-4">Insertion d'une Intervention</h3>

<form method="post" action="">
  <table class="col-md-5 mx-auto">
    <tr>
      <td>
        <label for="dateinter">Date intervention:</label>
        <input class="form-control" type="date" name="dateinter" id="dateinter" value="<?php if ($lIntervention != null) echo $lIntervention['dateinter']; ?>">
      </td>
    </tr>
    <tr>
      <td>
        <label for="heure">Heure:</label>
        <input class="form-control" type="time" name="heure" id="heure" value="<?php if ($lIntervention != null) echo $lIntervention['heure']; ?>">
      </td>
    </tr>
    <tr>
      <td>
        <label for="prix">Prix:</label>
        <input class="form-control" type="text" name="prix" id="prix" value="<?php if ($lIntervention != null) echo $lIntervention['prix']; ?>">
      </td>
    </tr>
    <tr>
      <td>
        <label for="description">Description:</label>
        <input class="form-control" type="text" name="description" id="description" value="<?php if ($lIntervention != null) echo $lIntervention['description']; ?>">
      </td>
    </tr>
    <tr>
      <td>
        <label for="idvehicule">Id Véhicule</label>
        <select class="form-select pointer" name="idvehicule" value="<?php if ($lIntervention != null) echo $lIntervention['idvehicule']; ?>">
          <?php
          $lesVehicules = $unControleur->selectAllVehicules();
          foreach ($lesVehicules as $unVehicule) {
            if ($lIntervention != null) {
              if ($lIntervention['idintervention'] == $unVehicule['idvehicule']) {
                echo "<option value='"  . $unVehicule['idvehicule'] . "' selected >";
              } else {
                echo "<option value='"  . $unVehicule['idvehicule'] . "'>";
              }
            } else {
              echo "<option value='"  . $unVehicule['idvehicule'] . "'>";
            }

            echo $unVehicule['idvehicule'] . "-" . $unVehicule['matricule'];
            echo "</option>";
          }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>
        <label for="idtechnicien">Id Technicien</label>
        <select class=" form-select pointer mb-3" name="idtechnicien" value="<?php if ($lIntervention != null) echo $lIntervention['idtechnicien']; ?>">
          <?php
          $lesTechniciens = $unControleur->selectAllTechniciens();
          foreach ($lesTechniciens as $unTechnicien) {
            if ($lIntervention != null) {
              if ($lIntervention['idintervention'] == $unTechnicien['idtechnicien']) {
                echo "<option value='"  . $unTechnicien['idtechnicien'] . "' selected >";
              } else {
                echo "<option value='"  . $unTechnicien['idtechnicien'] . "'>";
              }
            } else {
              echo "<option value='"  . $unTechnicien['idtechnicien'] . "'>";
            }

            echo $unTechnicien['idtechnicien'] . "-" . $unTechnicien['nom'];
            echo "</option>";
          }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>
        <input class="btn btn-primary mb-4" type="submit" <?php if ($lIntervention != null) echo "name='Modifier' value='Modifier'>";
                                                          else echo "name='Valider' value='Valider'>"; ?> <input class="btn btn-danger mb-4" type="reset" name="Annuler" value="Annuler">
      </td>
      <?php
      if ($lIntervention != null) echo "<input type='hidden' name='idintervention' value ='" . $lIntervention['idintervention'] . "'>";
      ?>
    </tr>
  </table>
</form>