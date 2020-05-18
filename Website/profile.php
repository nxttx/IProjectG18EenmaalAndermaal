<?php
$siteTitle = "Ge";
?>

<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
    <section>
        <div class="container">
            <br>

            <div class="card ">
                <div class="card-content">


                    <?php if (!isset($_SESSION['user'])) { ?>
                        <h2 class="title is-3">Login first</h2>

                        <script>
                            setTimeout(function () {
                                window.location.href='index.php';
                            },2000)
                        </script>

                    <?php }elseif ($_SESSION['user'] == "admin") { ?>
                        <!--html admin -->



                    <?php }elseif (isset($_SESSION['user'])){ ?>
                        <!--html user -->
                        <h1>Hier kan je gegevens aanpassen</h1>

                        <?php } ?>

                </div>
            </div>

            <br>

        </div>
    </section>


<?php include "includes/footer.html" ?>