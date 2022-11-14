<h3 class="my-4">Insertion d'un Client</h3>

<form method="post" action="">
  <table class="col-md-5 mx-auto">
    <tr>
      <td>
        <label for="nom">Nom:</label>
        <input class="form-control" type="text" name="nom" id="nom" value="<?php if ($leClient != null) echo $leClient['nom']; ?>">
      </td>
    </tr>
    <tr>
      <td>
        <label for="prenom">Prénom:</label>
        <input class="form-control" type="text" name="prenom" id="prenom" value="<?php if ($leClient != null) echo $leClient['prenom']; ?>">
      </td>
    </tr>
    <tr>
      <td>
        <label for="adresse">Adresse:</label>
        <input class="form-control" type="text" name="adresse" id="adresse" value="<?php if ($leClient != null) echo $leClient['adresse']; ?>">
      </td>
    </tr>
    <tr>
      <td>
        <label for="email">Email</label>
        <input class="form-control" type="text" name="email" id="email" value="<?php if ($leClient != null) echo $leClient['email']; ?>">
      </td>
    </tr>
    <tr>
      <td>
        <label for="tel">Téléphone:</label>
        <input class="form-control mb-3" type="text" name="tel" id="tel" value="<?php if ($leClient != null) echo $leClient['tel']; ?>">
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