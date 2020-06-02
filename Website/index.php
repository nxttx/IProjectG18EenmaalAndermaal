<?php
$siteTitle= "Hoofdpagina"

?>
<?php include "php/dbh.php" ?>


<?php
$dbh = connectToDatabase();
$ads = "";
$Random = "";



$sql = "SELECT TOP (4) V.voorwerpnummer ,V.titel, V.beschrijving, V.startprijs, V.LooptijdbeginDag, B.filenaam
FROM Voorwerp V 
	JOIN bestand B on V.voorwerpnummer = B.voorwerp
ORDER BY views DESC";


foreach ($dbh->query($sql) as $row) {

    //get highest bod
    $sth = $dbh->prepare("
            SELECT TOP(1) bodbedrag FROM bod 
            where voorwerp = :voorwerpnummer
            ORDER BY Bodbedrag DESC");
    $sth->bindParam(':voorwerpnummer', $row['voorwerpnummer']);
    $sth->execute();
    foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row2) {
        $highestBod=$row2['bodbedrag'];
    }

    $ads .= "  <div class=\"column\">
                <div class=\"has-background-primary\">
                    <figure class=\"image objectfit-cover\">
                        <img src=\"{$row['filenaam']}\" alt=\"img\">
                    </figure>
                    <div class=\"extra-padding-1 has-background-light\">
                        <h3 class=\"title is-4 \"> {$row['titel']}  </h3>
                        <div class=\"content is-medium\">
                            {$row['beschrijving']}
                        </div>
                        <div class=\"columns has-text-centered\">
                            <div class=\"column\">
                                <div class=\"content is-medium\">
                                    	<p>&euro; ". $highestBod . "</p>
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
                        <a class=\"button is-fullwidth\" href=\"product.php?pn=" . $row['voorwerpnummer'] ." \">
                            Bekijk nu!
                        </a>
                    </div>
                </div>
            </div> ";
}

$sql = "SELECT TOP (4) V.voorwerpnummer, V.titel, V.beschrijving, V.startprijs, V.LooptijdbeginDag, B.filenaam 
FROM Voorwerp V 
	JOIN bestand B on V.voorwerpnummer = B.voorwerp
ORDER BY NEWID()";

foreach ($dbh->query($sql) as $row) {

    //get highest bod
    $sth = $dbh->prepare("
            SELECT TOP(1) bodbedrag FROM bod 
            where voorwerp = :voorwerpnummer
            ORDER BY Bodbedrag DESC");
    $sth->bindParam(':voorwerpnummer', $row['voorwerpnummer']);
    $sth->execute();
    foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row2) {
        $highestBod=$row2['bodbedrag'];
    }

    $Random .= "  <div class=\"column\">
                <div class=\"has-background-primary\">
                    <figure class=\"image objectfit-cover\">
                        <img src=\"{$row['filenaam']}\" alt=\"img\">
                    </figure>
                    <div class=\"extra-padding-1 has-background-light\">
                        <h3 class=\"title is-4 \"> {$row['titel']}  </h3>
                        <div class=\"content is-medium\">
                            {$row['beschrijving']}
                        </div>
                        <div class=\"columns has-text-centered\">
                            <div class=\"column\">
                                <div class=\"content is-medium\">
                                    	<p>&euro;" . $highestBod . "</p>
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
                        <a class=\"button is-fullwidth\" href=\"product.php?pn=" . $row['voorwerpnummer'] ." \">
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
<?php include "includes/footer.php" ?>
