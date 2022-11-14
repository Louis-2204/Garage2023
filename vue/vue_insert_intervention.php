<div class="insert-container">
  <div class="dropdown" id="dropdown">
    <div class="div-texte">
      <p>Insértion d'une Interventions</p>
    </div>
    <div class="div-arrow">
      <p id="arrow">></p>
    </div>
  </div>
  <div class="caché hidden" id="hidden">

    <form method="post" action="">
      <table class="col-md-5 mx-auto">
        <tr>
          <td>
            <label for="dateinter">Date intervention:</label>
            <input class="form-control" type="date" name="dateinter" value="<?php if ($lIntervention != null) echo $lIntervention['dateinter']; ?>">
          </td>
        </tr>
        <tr>
          <td>
            <label for="heure">Heure:</label>
            <input class="form-control" type="time" name="heure" value="<?php if ($lIntervention != null) echo $lIntervention['heure']; ?>">
          </td>
        </tr>
        <tr>
          <td>
            <label for="prix">Prix:</label>
            <input class="form-control" type="text" name="prix" value="<?php if ($lIntervention != null) echo $lIntervention['prix']; ?>">
          </td>
        </tr>
        <tr>
          <td>
            <label for="description">Description:</label>
            <input class="form-control" type="text" name="description" value="<?php if ($lIntervention != null) echo $lIntervention['description']; ?>">
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
    height: 500px;
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