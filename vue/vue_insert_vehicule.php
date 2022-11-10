<h3 class="my-4">Insertion d'un Véhicule</h3>

<form method="post" action="">
  <table class="col-md-5 mx-auto">
    <tr>
      <td>
        <label for="matricule">Matricule:</label>
        <input class="form-control" type="text" name="matricule" value="<?php if ($leVehicule != null) echo $leVehicule['matricule']; ?>">
      </td>
    </tr>
    <tr>
      <td>
        <label for="marque">Marque:</label>
        <input class="form-control" type="text" name="marque" value="<?php if ($leVehicule != null) echo $leVehicule['marque']; ?>">
      </td>
    </tr>
    <tr>
      <td>
        <label for="nbkm">Nombre de kilomètres:</label>
        <input class="form-control" type="text" name="nbkm" value="<?php if ($leVehicule != null) echo $leVehicule['nbkm']; ?>">
      </td>
    </tr>
    <tr>
      <td>
        <label for="energie">Énergie</label>
        <input class="form-control" type="text" name="energie" value="<?php if ($leVehicule != null) echo $leVehicule['energie']; ?>">
      </td>
    </tr>
    <tr>
      <td>
        <label for="idclient">Id Client:</label>
        <select class=" form-select pointer mb-3" name="idclient" value="<?php if ($leVehicule != null) echo $leVehicule['idclient']; ?>">
          <?php
          $lesClients = $unControleur->selectAllClients();
          foreach ($lesClients as $unClient) {
            if ($leVehicule != null) {
              if ($leVehicule['idclient'] == $unClient['idclient']) {
                echo "<option value='" . $unClient['idclient'] . "' selected >";
              } else {
                echo "<option value='" . $unClient['idclient'] . "'>";
              }
            } else {
              echo "<option value='" . $unClient['idclient'] . "'>";
            }

            echo $unClient['idclient'] . "-" . $unClient['nom'];
            echo "</option>";
          }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>
        <input class="btn btn-primary mb-4" type="submit" <?php if ($leVehicule != null) echo "name='Modifier' value='Modifier'>";
                                                          else echo "name='Valider' value='Valider'>"; ?> <input class="btn btn-danger mb-4" type="reset" name="Annuler" value="Annuler">
      </td>
      <?php
      if ($leVehicule != null) echo "<input type='hidden' name='idvehicule' value ='" . $leVehicule['idvehicule'] . "'>";
      ?>
    </tr>
  </table>
</form>