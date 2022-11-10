<footer>
    <div class="col-md-4 my-auto">
        <span>14 Rue du Puits<br>
            75012 Paris<br>
            France</span>
    </div>
    <div class="col-md-4 my-auto">
        <span>contact@garagejv23.com</span>
    </div>
    <div class="col-md-4 my-auto">
        <span>Mentions légales<br>
            Politique de confidentialité<br>
            Politique en matière de cookies<br>
            Consitions d'utilisations</span>
    </div>
</footer>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500;600;700;800&display=swap');

    <?php
    if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
        echo "footer {
            width: 100%;
            height: 125px;
            background-color: #333333;
            display: flex;
            font-family: 'Karla', sans-serif;
            color: white;
        }";
    } else {
        echo "footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 125px;
            background-color: #333333;
            display: flex;
            font-family: 'Karla', sans-serif;
            color: white;
        }";
    }
    ?>
</style>