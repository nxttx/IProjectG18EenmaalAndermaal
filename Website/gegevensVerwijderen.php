<?php
$siteTitle = "Account verwijderen";
include "php/dbh.php";
$dbh = connectToDatabase();
?>

<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
    <section>
        <div class="container">
            <br>
            <div class="card ">
                <div class="card-content">


                    <?php if (!isset($_SESSION['user'])) { ?>
                        <h2 class="title is-3">U bent nog niet ingelogd, u wordt doorgestuurd naar de inlogpagina</h2>
                        <h3 class="subtitle is-5">Gebeurt dit niet automatisch binnnen enkele seconden? Klik dan <a
                                    href="login.php">hier.</a></h3>
                        <script>
                            setTimeout(function () {
                                window.location.href = 'login.php';
                            }, 9000)
                        </script>

                        <?php ;}
                     elseif (isset($_SESSION['user'])) {
                        //Dit wordt alle PHP voor _SESSION['user'];
                        $username = $_SESSION['user'];
                        $deleteUser = '<p>Je bent ingelogd, hier wordt nu je gebruikersnaam: (' . $username .') weergegeven en om wachtwoord verificatie gevraagd. 
                        Als dat allemaal klopt wordt een prepared DELETE from gebruiker statement uitgevoerd.</p><br>
                        ';
                    }; ?>

                    <!--Weergeven op de gegevensVerwijderen pagina-->
                    <h1 class="title is-1 has-text-centered">Uw account verwijderen</h1>
                    <h3 class="subtitle is-size-5 has-text-centered">Uw account en al uw opgeslagen gegevens worden
                        direct verwijderd. U kunt uw gegevens dus niet later terughalen!</h3>
                    <?= $deleteUser ?>


                </div>
            </div>

        </div>
    </section>
    <br>

<script>
    alert("Let op! Al uw gegevens zullen worden verwijderd!")
</script>
<?php include "includes/footer.php" ?>