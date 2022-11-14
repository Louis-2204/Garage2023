<div class="col-md-4"></div>
<div class="col-md-4 mx-auto">
    <form class="bg-light rounded p-3 shadow w-33" method="post">
        <h2>Créer votre compte</h2>
        <table class="col-md-12">
            <tr>
                <td><label for="nom">Nom :</label>
                    <input class="form-control mb-2" type="text" name="nom" id="email">
                </td>
            </tr>
            <tr>
                <td><label for="">Prénom :</label>
                    <input class="form-control mb-2" type="text" name="prenom" id="email">
                </td>
            </tr>
            <tr>
                <td><label for="email">Email:</label>
                    <input class="form-control mb-2" type="text" name="email" id="email">
                </td>
            </tr>
            <tr>
                <td><label for="mdp">MDP:</label>
                    <input class="form-control mb-2" type="password" name="mdp" id="mdp">
                    <img id="eye" class="eye" src="./images/view.png" alt="" width="30px" height="30px" onclick="showhide()">
                </td>
            </tr>
            <tr>
                <td><input class="btn btn-primary mb-4" type="submit" name="Sinscrire" value="Se Connecter">
                    <input class="btn btn-danger mb-4" type="reset" name="Annuler" value="Annuler">
                </td>
            </tr>
            <tr>
                <td>
                    <a href="index.php?">Se connecter</a>
                </td>
            </tr>
        </table>
    </form>
</div>
<div class="col-md-4"></div>
<style>
    .eye{
        position: relative;
        top: -43px;
        right: -480px;
    }

    .eye:hover{
        cursor: pointer;
    }

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

    a{
        color: black !important;
        font-size: 18px !important;
        font-weight: 400 !important;
        text-decoration: underline !important;
    }
</style>

<script>
    function showhide(){
        const input = document.getElementById('mdp');
        const eye = document.getElementById('eye');

        if(input.getAttribute('type')=="password"){
            input.setAttribute('type','text');
            eye.setAttribute('src','./images/hide.png')
        }else{
            input.setAttribute('type','password');
            eye.setAttribute('src','./images/view.png');
        }
    }
</script>