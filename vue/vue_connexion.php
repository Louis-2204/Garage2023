<div class="col-md-4"></div>
<div class="col-md-4 mx-auto">
    <form class="bg-light rounded p-3 shadow w-33" method="post">
        <h2>Connexion au garage</h2>
        <table class="col-md-12">
            <tr>
                <td><label for="email">Email:</label>
                    <input class="form-control mb-2" type="text" name="email" id="email">
                </td>
            </tr>
            <tr>
                <td><label for="mdp">Mot de passe:</label>
                    <input class="form-control mb-2" type="password" name="mdp" id="mdp">
                </td>
            </tr>
            <tr>
                <td><input class="btn btn-primary mb-4" type="submit" name="seConnecter" value="Se Connecter">
                    <input class="btn btn-danger mb-4" type="reset" name="Annuler" value="Annuler">
                </td>
            </tr>
            <tr>
                <td>
                    <a href="index.php?Inscription=true">Créer un compte</a>
                </td>
            </tr>
        </table>
    </form>
</div>
<div class="col-md-4"></div>
<style>
    form {
        position: absolute;
        top: 30%;
    }

    body {
        min-height: 100vh;
        background-image: url('images/garage.jpg');
        background-size: cover;
        background-repeat: no-repeat;
    }

    .w-33 {
        width: 33.33%;
    }

    a {
        color: black !important;
        font-size: 18px !important;
        font-weight: 400 !important;
        text-decoration: underline !important;
    }
</style>