<?php
$siteTitle = "hoofdpagina"

?>
<?php include "php/dbh.php" ?>


<?php
$dbh = connectToDatabase();
$ads = "";
$Random = "";

$sql = "SELECT TOP (3) * from Voorwerp ORDER BY views DESC";

foreach ($dbh->query($sql) as $row) {
    $ads .= "  <div class=\"column\">
                <div class=\"has-background-primary\">
                    <figure class=\"image is-square\">
                        <img src=\"https://bulma.io/images/placeholders/480x480.png\" alt=\"img\">
                    </figure>
                    <div class=\"extra-padding-1 has-background-light\">
                        <h3 class=\"title is-4 \"> {$row['titel']}  </h3>
                        <div class=\"content is-medium\">
                            {$row['beschrijving']}
                        </div>
                        <div class=\"columns has-text-centered\">
                            <div class=\"column\">
                                <div class=\"content is-medium\">
                                    	<p>&euro;{$row['euro']}</p>
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

$sql = "SELECT TOP (3) * from Voorwerp ORDER BY NEWID()";

foreach ($dbh->query($sql) as $row) {
    $Random .= "  <div class=\"column\">
                <div class=\"has-background-primary\">
                    <figure class=\"image is-square\">
                        <img src=\"https://bulma.io/images/placeholders/480x480.png\" alt=\"img\">
                    </figure>
                    <div class=\"extra-padding-1 has-background-light\">
                        <h3 class=\"title is-4 \"> {$row['titel']}  </h3>
                        <div class=\"content is-medium\">
                            {$row['beschrijving']}
                        </div>
                        <div class=\"columns has-text-centered\">
                            <div class=\"column\">
                                <div class=\"content is-medium\">
                                    	<p>&euro;{$row['euro']}</p>
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
<?php include "includes/header.php" ?>
<section>
    <div class="container">
        <br>

        <div class="card ">
            <div class="card-content">
                <h2 class="title is-3  has-text-centered">Populaire producten</h2>
                <p class="subtitle is-6  has-text-centered">Dit zijn de meest populaire producten!</p>
                <div class="columns">
                    <?= $ads ?>

                </div>
                <h2 class="title is-3  has-text-centered">Random producten</h2>
                <div class="columns">

                    <?= $Random ?>

                </div>
          </div>
      </div>
      <br>
    </div>
</section>
<?php include "includes/footer.html" ?>
