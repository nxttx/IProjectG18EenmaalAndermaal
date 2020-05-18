<?php
$siteTitle = "Gegevens aanpassen";
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
                        <!--html user -->
                        <h1>Hier kan je gegevens aanpassen</h1>
                        <form>

                        </form>

                    <?php } ?>

                </div>
            </div>

            <br>

        </div>
    </section>


<?php include "includes/footer.php" ?>