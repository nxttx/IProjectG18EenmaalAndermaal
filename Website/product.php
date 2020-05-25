<?php include "php/dbh.php" ?>
<?php
$dbh = connectToDatabase();
$siteTitle = "";
$productNummer = $_GET['pn'];
$productpage = "";

//views +1
$sth = $dbh->prepare('UPDATE voorwerp SET views = views +1  WHERE voorwerpnummer = :productnummer');
$sth->bindParam(':productnummer', $pn);
$pn = $productNummer;
$sth->execute();

// get info for the page
$sth = $dbh->prepare('SELECT V.titel, V.beschrijving, V.startprijs, V.Betalingswijze, V.betalingsinstructie, V.plaatsnaam, V.land,
       V.LooptijdbeginDag, V.LooptijdbeginTijdstip, V.Verzendkosten, V.verkoper, V.VeilinGesloten,V.Verkoopprijs,
       V.views, B.filenaam
FROM Voorwerp V
	JOIN bestand B on V.voorwerpnummer = B.voorwerp
 	WHERE voorwerpnummer = :productnummer');
$sth->bindParam(':productnummer', $pn);
$pn = $productNummer;
$sth->execute();


foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $siteTitle = $row['titel'];
    $productpage = '

        <h2 class="title is-1  has-text-centered">' . $row['titel'] . '</h2>
        <br>
        <div class="columns">
                <div class="column is-half">
                    <figure class=\"image objectfit-cover\">
                        <img src=" ' . $row['filenaam'] . '" alt="img">
                    </figure>
                </div>
                <div class="column is-half">
                        <h3 class="title is-8"> &euro;' . $row['startprijs'] . '</h3>
                        <p>
                           ' . $row['beschrijving'] . '
                        </p>
                        <br>
                        <form action="" method="">

                            <label for="bod" class="label">Uw bod: *</label>
                            <label class="checkbox">
                                <input type="checkbox" required>
                                Ik ga akoord met <a href="tos.php" target="_blank"> de gebruikersvoorwaarden</a>
                            </label>
                            <div class="field has-addons">

                                <div class="control">
                                    <input class="input is-primary" type="text" name="bod"
                                           id="bod" value="&euro;" maxlength="50" minlength="5" required>
                                </div>
                                <input class="button is-primary" type="submit" value="breng bod uit">

                            </div>

                        </form>
                        <br>
                        <p>
                        <b>Verkoper:</b> ' . $row['verkoper'] . '
                        <br>
                        <b>Locatie verkoper:</b> ' . $row['plaatsnaam'] . $row['land'] . '
                        <br><br>
                        <b>Betalingswijze:</b> ' . $row['Betalingswijze'] . '
                        <br>
                        <b>Betalingsinstructie:</b> ' . $row['betalingsinstructie'] . '
                        </p>
                </div>
        </div>

<!-- Hier moeten de vorige biedingen komen  -->





    ';
}

?>

<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
<section>
    <div class="container">
        <br>

        <div class="card ">
            <div class="card-content">
                <?php include "breadcrumbstest.php" ?>
                <?= $productpage ?>
            </div>
        </div>

        <br>

    </div>
</section>
<?php include "includes/footer.php" ?>