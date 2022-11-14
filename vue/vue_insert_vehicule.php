<div id="insert-container" class="insert-container">
  <div class="dropdown" id="dropdown">
    <div class="div-texte">
      <p>Insértion d'un véhicule</p>
    </div>
    <div class="div-arrow">
      <p id="arrow">></p>
    </div>
  </div>
  <div class="hidden caché" id="hidden">
    <form id="formvehicule" method="post" action="">
      <table class="col-md-5 mx-auto tableinsert">
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
            <select name="energie" id="energie" class="form-select pointer mb-3 selectvehicule">
              <option value="Electrique" <?php if ($leVehicule != null && $leVehicule['energie'] == "Electrique") echo "selected" ?>>Éléctrique</option>
              <option value="Essence" <?php if ($leVehicule != null && $leVehicule['energie'] == "Essence") echo "selected" ?>>Essence</option>
              <option value="Diesel" <?php if ($leVehicule != null && $leVehicule['energie'] == "Diesel") echo "selected" ?>>Diesel</option>
              <option value="Hybride" <?php if ($leVehicule != null && $leVehicule['energie'] == "Hybride") echo "selected" ?>>Hybride</option>
              <option value="Bioethanol" <?php if ($leVehicule != null && $leVehicule['energie'] == "Bioethanol") echo "selected" ?>>Bioéthanol</option>
            </select>
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
  </div>
</div>

<style>
  .selectvehicule {
    margin: 0px !important;
  }

  .dropdown {
    display: flex;
  }

  .dropdown *:hover {
    cursor: pointer;
  }

  .div-texte {
    width: 98%;
  }


  .div-texte p {
    position: relative;
    top: 7px;
  }

  .insert-container {
    background-color: rgba(0, 0, 0, 0.05);
    overflow: hidden;
  }

  #arrow {
    font-size: 20px;
    font-weight: bolder;
    transform: rotate(90deg);
    margin: 0;
    position: relative;
    top: 5px;

  }


  .ouvert {
    height: 450px;
    -webkit-transition: height 0.5s linear;
    -moz-transition: height 0.5s linear;
    -ms-transition: height 0.5s linear;
    -o-transition: height 0.5s linear;
    transition: height 0.5s linear;
    opacity: 1;

    overflow: hidden;
  }

  .caché {
    height: 0px;
    -webkit-transition: height 0.5s linear;
    -moz-transition: height 0.5s linear;
    -ms-transition: height 0.5s linear;
    -o-transition: height 0.5s linear;
    transition: height 0.5s linear;
    opacity: 0;
    z-index: -2;
  }
</style>

<script>
  document.getElementById('dropdown').addEventListener('click', showform);

  function showform() {
    if (document.getElementById('hidden').classList.contains('ouvert')) {
      document.getElementById('hidden').classList.remove('ouvert');
      document.getElementById('hidden').classList.add('caché');
      document.getElementById('arrow').style.cssText = "transform : rotate(90deg);";
    } else {
      document.getElementById('hidden').classList.add('ouvert');
      document.getElementById('hidden').classList.remove('caché');
      document.getElementById('arrow').style.cssText = "transform : rotate(270deg); right:4px;";
    }

  }
</script>