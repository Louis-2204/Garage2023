<div class="body">
    <h2>Accueil du Garage</h2>
    <?php
    echo "<h2 class='my-5'>Bonjour " . $_SESSION['nom'] . " " . $_SESSION['prenom'] . "</h2>";
    echo "<h4>Vous avez le rôle : " . $_SESSION['role'] . "</h4>";
    echo "<br><br>";
    $lesResultats = $unControleur->selectAllVue();
    require_once("vue/vue_clients_groupees.php");

    echo "<div class='foot'>";
    require_once("_footer.php");
    echo "</div>";
    ?>
</div>

<style>
    .foot {
        width: 100%;
        position: absolute;
        bottom: 0;
    }
</style>