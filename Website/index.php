<?php
$siteTitle= "hoofdpagina"

?>
<?php include "php/dbh.php"?>


<?php
$dbh = connectToDatabase();
$ads="";


$sql = "SELECT TOP (3) * from voorwerp";

foreach ($dbh->query($sql) as $row) {
$ads .=  "  <div class=\"column\">
                <div class=\"has-background-primary\">
                    <img src=\"\" alt=\"\">
                    <div class=\"extra-padding-1 has-background-light\">
                        <h3 class=\"title is-4 \"> {$row['titel']}  </h3>
                        <div class=\"content is-medium\">
                            {$row['beschrijving']}
                        </div>
                        <div class=\"columns has-text-centered\">
                            <div class=\"column\">
                                <div class=\"content is-medium\">
                                    <p>{$row['prijs']}</p>
                                </div>
                            </div>
                            <div class=\"column\">
                                <div class=\"content is-medium\">
                                    <p> | </p>
                                </div>
                            </div>
                            <div class=\"column\">
                                <div class=\"content is-medium\">
                                    <p>{$row['LooptijdbeginDag']}</p>
                                </div>
                            </div>
                        </div>
                        <a class=\"button is-fullwidth\" href='#'>
                            Bekijk nu!
                        </a>
                    </div>
                </div>
            </div> ";
}
?>
<?php include "includes/head.php" ?>
<?php include "includes/header.html"?>

<section class="section">
    <div class="container">
        <h2 class="title is-3  has-text-centered">Populaire producten</h2>
        <p class="subtitle is-6  has-text-centered">Dit zijn de meest populaire producten!</p>
        <div class="columns">

        <?= $ads ?>

        </div>
    </div>
</section>
<?php include "includes/footer.html"?>
