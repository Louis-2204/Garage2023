<div class="body-con">
    <div class="col-md-3">
        <form class="bg-light rounded p-3 shadow" method="post">
            <h2>Connexion au garage</h2>
            <table class="col-md-12">
                <tr>
                    <td><label for="email">Email:</label>
                        <input class="form-control mb-2" type="text" name="email" id="email">
                    </td>
                </tr>
                <tr>
                    <td><label for="mdp">MDP:</label>
                        <input class="form-control mb-2" type="password" name="mdp" id="mdp">
                    </td>
                </tr>
                <tr>
                    <td><input class="btn btn-primary mb-4" type="submit" name="seConnecter" value="Se Connecter">
                        <input class="btn btn-danger mb-4" type="reset" name="Annuler" value="Annuler">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
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
</style>