<div class="insert-container">
  <div class="dropdown" id="dropdown">
    <div class="div-texte">
      <p>Insértion d'un Téchnicien</p>
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
            <input class="form-control" type="text" name="nom" value="<?php if ($leTechnicien != null) echo $leTechnicien['nom']; ?>">
          </td>
        </tr>
        <tr>
          <td>
            <label for="prenom">Prénom:</label>
            <input class="form-control" type="text" name="prenom" value="<?php if ($leTechnicien != null) echo $leTechnicien['prenom']; ?>">
          </td>
        </tr>
        <tr>
          <td>
            <label for="qualification">Qualification:</label>
            <input class="form-control" type="text" name="qualification" value="<?php if ($leTechnicien != null) echo $leTechnicien['qualification']; ?>">
          </td>
        </tr>
        <tr>
          <td>
            <label for="email">Email:</label>
            <input class="form-control" type="text" name="email" value="<?php if ($leTechnicien != null) echo $leTechnicien['email']; ?>">
          </td>
        </tr>
        <tr>
          <td>
            <label for="tel">Téléphone:</label>
            <input class="form-control mb-3" type="text" name="tel" value="<?php if ($leTechnicien != null) echo $leTechnicien['tel']; ?>">
          </td>
        </tr>
        <tr>
          <td>
            <input class="btn btn-primary mb-4" type="submit" <?php if ($leTechnicien != null) echo "name='Modifier' value='Modifier'>";
                                                              else echo "name='Valider' value='Valider'>"; ?> <input class="btn btn-danger mb-4" type="reset" name="Annuler" value="Annuler">
          </td>
          <?php
          if ($leTechnicien != null) echo "<input type='hidden' name='idtechnicien' value ='" . $leTechnicien['idtechnicien'] . "'>";
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