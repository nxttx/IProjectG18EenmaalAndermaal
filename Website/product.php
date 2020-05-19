<?php include "php/dbh.php" ?>
<?php
$dbh = connectToDatabase();
$siteTitle = "";
$productNummer = $_GET['pn'];
$productpage = "";

// get info for the page
$sth = $dbh->prepare('SELECT V.titel, V.beschrijving, V.startprijs, V.Betalingswijze, V.betalingsinstructie, V.plaatsnaam, V.land, 
       V.LooptijdbeginDag, V.LooptijdbeginTijdstip, V.Verzendkosten, V.verkoper, V.VeilinGesloten,V.Verkoopprijs, 
       V.views, B.filenaam 
FROM Voorwerp V 
	JOIN bestand B on V.voorwerpnummer = B.voorwerp
	WHERE voorwerpnummer = :productnummer ');


$sth->bindParam(':productnummer', $pn);
$pn = $productNummer;
$sth->execute();


foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $siteTitle = $row['titel'];
    $productpage = '
        <h2 class="title is-2  has-text-centered">' . $row['titel'] . '</h2>
        <div class="columns">
                <div class="column is-half">
                    <figure class=\"image objectfit-cover\">
                        <img src=" ' .$row['filenaam'] .'" alt="img">
                    </figure>
                </div>
                <div class="column is-half">
                        <h3 class="title is-8"> &euro;' . $row['startprijs']  . '</h3>
                        <p>
                        
                        
                        </p>
                </div>
        </div>
        
        
        
        
        
        
        
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
                    <?= $productpage ?>
                </div>
            </div>

            <br>

        </div>
    </section>
<?php include "includes/footer.php" ?>