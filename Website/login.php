<?php $siteTitle = "Inloggen"; ?>
<?php

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION["user"])) {
    header('Location: index.php');

    $login = true;
}
?>
<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>

<section>
    <div class="container">
        <br>

        <div class="card ">
            <div class="card-content">
                <h2 class="title is-2  has-text-centered">EenmaalAndermaal</h2>
                <br>
                <h2 class="title is-2  ">Inloggen</h2>
                <form action="" onsubmit="login(this)" method="post" id="form">
                    <div class="field">
                        <label class="label " for="Gebruikersnaam">Gebruikersnaam</label>
                        <input class="input is-primary is-large" type="text" name="username" id="Gebruikersnaam" autofocus="" required placeholder="Gebruikersnaam">
                    </div>
                    <br>
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

        <br>

    </div>
</section>

<script src="js/login.js"></script>

<?php include "includes/footer.php" ?>