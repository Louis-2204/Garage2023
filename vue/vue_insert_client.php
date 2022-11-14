<div class="insert-container">
  <div class="dropdown" id="dropdown">
    <div class="div-texte">
      <p>Insertion d'un Client</p>
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
            <label for="nom">Nom:</label>
            <input class="form-control" type="text" name="nom" value="<?php if ($leClient != null) echo $leClient['nom']; ?>">
          </td>
        </tr>
        <tr>
          <td>
            <label for="prenom">Prénom:</label>
            <input class="form-control" type="text" name="prenom" value="<?php if ($leClient != null) echo $leClient['prenom']; ?>">
          </td>
        </tr>
        <tr>
          <td>
            <label for="adresse">Adresse:</label>
            <input class="form-control" type="text" name="adresse" value="<?php if ($leClient != null) echo $leClient['adresse']; ?>">
          </td>
        </tr>
        <tr>
          <td>
            <label for="email">Email</label>
            <input class="form-control" type="text" name="email" value="<?php if ($leClient != null) echo $leClient['email']; ?>">
          </td>
        </tr>
        <tr>
          <td>
            <label for="tel">Téléphone:</label>
            <input class="form-control mb-3" type="text" name="tel" value="<?php if ($leClient != null) echo $leClient['tel']; ?>">
          </td>
        </tr>
        <tr>
          <td>
            <input class="btn btn-primary mb-4" type="submit" <?php if ($leClient != null) echo "name='Modifier' value='Modifier'>";
                                                              else echo "name='Valider' value='Valider'>"; ?> <input class="btn btn-danger mb-4" type="reset" name="Annuler" value="Annuler">
          </td>
          <?php
          if ($leClient != null) echo "<input type='hidden' name='idclient' value ='" . $leClient['idclient'] . "'>";
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
    background-color: rgba(0, 0, 0, 0.03);
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
    height: 430px;
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

  function openform() {
    document.getElementById('hidden').classList.add('ouvert');
  }
</script>