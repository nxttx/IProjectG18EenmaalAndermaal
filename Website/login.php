<?php $siteTitle = "Login pagina"; ?>

<?php
    session_start();

    // if(isset($_SESSION["user"])) {
    //     header('Location: index.php');
    // }
?>

<?php include "includes/head.php" ?>
<?php include "includes/header.html" ?>

<section class="hero is-primary is-fullheight">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="column is-4 is-offset-4">
                <h2 class="title is-2 has-text-white">EenmaalAndermaal</h2>
                <br>
                <h3 class="title is-3 has-text-white">Inloggen</h3>
                <form action="" onsubmit="login(this)" method="post" id="form">
                    <div class="field">
                        <label class="label" for="Gebruikersnaam">Gebruikersnaam</label>
                        <input class="input is-primary is-large" type="text" name="username" id="Gebruikersnaam" autofocus="" required placeholder="Gebruikersnaam">
                    </div>

                    <div class="field">
                        <label class="label" for="wachtwoord">Wachtwoord</label>
                        <input class="input is-primary is-large" type="password" name="password" id="wachtwoord" placeholder="Wachtwoord">
                    </div>

                    <button class="button has-background-primary is-fullwidth has-text-white" name="loginButton">
                        Inloggen
                    </button>

                    <span id="error-field" class="help"></span>

                    <br>

                    <a class="has-text-white" href="../login/passwordForgot.html">
                        <p>Wachtwoord vergeten</p>
                    </a>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="js/login.js"></script>

<?php include "includes/footer.html" ?>