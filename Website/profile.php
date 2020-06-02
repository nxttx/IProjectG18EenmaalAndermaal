<?php
$siteTitle = "Mijn profiel";
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
                        }, 2000)
                    </script>

                <?php } elseif ($_SESSION['user'] == "admin") { ?>
                    <!--html admin -->


                <?php }
                elseif (isset($_SESSION['user'])) { ?>


                    <!--html user-->
                    <h1 class="title is-1 has-text-centered">Mijn profiel</h1>
                    <p class="subtitle is-5  has-text-centered">Hier kunt u naar de pagina's gaan om uw gegevens aan te
                        passen of verkoper te worden.</p>
                            <br>

                        <div class="container has-text-centered">
                                    <h3 class="subtitle is-5 is-marginless">Klik op de knop om uw
                                        gegevens aan te passen. Of eventueel uw <a href="gegevensVerwijderen.php">account te
                                            verwijderen.</a></h3><br>
                                    <a href="gegevensAanpassen.php" class="button is-primary ">Gegevens aanpassen</a>
                                    <br>
                                    <br>
                            <?php
                            if (isset($_SESSION['user'])) {
    $sth = $dbh->prepare("SELECT COUNT(gebruiker) as hoeveelheid FROM verkoper WHERE gebruiker =:gebruikersnaam");
    $sth->bindParam(':gebruikersnaam', $gebruikersnaam);
    $gebruikersnaam = $_SESSION['user'];
    $sth->execute();
    foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $hoeveelheidGebruikersnamen = $row['hoeveelheid'];
    }
}
                            if($hoeveelheidGebruikersnamen <1){
                            ?>

                                    <br>
                                    <h3 class="subtitle is-5 is-marginless">Of klik hier om u aan te melden als verkoper.</h3><br>
                                    <a href="verkoper_worden.php" class="button is-primary ">Verkoper worden</a>


                            <?php }else{ ?>
                                <br>
                                <h3 class="subtitle is-5 is-marginless">Bekijk al uw veilingen </h3><br>
                                <a href="mijn_veilingen.php" class="button is-primary ">Mijn veilingen </a>
                            <?php } ?>
                        </div>
                <?php } ?>

            </div>
        </div>

    </div>
</section>



<br>
<?php include "includes/footer.php" ?>