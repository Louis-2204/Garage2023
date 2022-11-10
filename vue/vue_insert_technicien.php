<h3 class="my-4">Insertion d'un Technicien</h3>

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