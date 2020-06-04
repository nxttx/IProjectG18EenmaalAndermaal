<?php include "php/dbh.php" ?>
<?php
$dbh = connectToDatabase();
$siteTitle = "";
$verkoper = "";
$productpage = "";
$biedingen = "";
$productnaam = "";
$filenaam = "";
$errorMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $productNummer = $_GET['pn'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productNummer = $_POST['pn'];


    $sth = $dbh->prepare('SELECT V.verkoper, B.bodbedrag
FROM Voorwerp V
JOIN bod  b on v.voorwerpnummer = b.voorwerp
 	WHERE voorwerpnummer = :productnummer');

    $sth->bindParam(':productnummer', $pn);
    $pn = $productNummer;
    $sth->execute();
    foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $verkoper = $row['verkoper'];
        $huidigebod = $row['bodbedrag'];
    }

    $bodBedrag = $_POST["bod"];
    if (trim(strtolower($verkoper)) == trim(strtolower($_SESSION['user']))) {
        $errorMsg = '<div class="notification is-danger">U kunt niet op u zelf bieden.</div>';
    } else {
        if ($huidigebod < $bodBedrag) {
            $sth = $dbh->prepare("INSERT INTO Bod (voorwerp, Bodbedrag, Gebruiker, BodDag, BodTijdstip) VALUES(:Voorwerp, :Bodbedrag, :Gebruiker, :BodDag, :BodTijdstip)");
            $sth->bindParam(':Voorwerp', $Voorwerp);
            $sth->bindParam(':Bodbedrag', $bodbedrag);
            $sth->bindParam(':Gebruiker', $gebruikersnaam);
            $sth->bindParam(':BodDag', $bodDag);
            $sth->bindParam(':BodTijdstip', $bodTijdstip);

            $Voorwerp = $productNummer;
            $bodbedrag = $bodBedrag;
            $gebruikersnaam = $_SESSION['user'];
            $bodDag = date('Y/m/d');
            $bodTijdstip = date('H:i:s');;
            $sth->execute();
        }
    }
}


//views +1
$sth = $dbh->prepare('UPDATE voorwerp SET views = views +1  WHERE voorwerpnummer = :productnummer');
$sth->bindParam(':productnummer', $pn);
$pn = $productNummer;
$sth->execute();


// get info for the page

$sth = $dbh->prepare('SELECT V.titel, V.beschrijving, V.startprijs, V.Betalingswijze, V.betalingsinstructie, V.plaatsnaam, V.land,
       V.LooptijdbeginDag, V.LooptijdbeginTijdstip,V.LooptijdeindeDag,V.LooptijdeindeTijdstip, V.Verzendkosten, V.verkoper, V.VeilingGesloten,V.Verkoopprijs,
       V.views, B.filenaam, D.bodbedrag
FROM Voorwerp V
	JOIN bestand B on V.voorwerpnummer = B.voorwerp 
    JOIN Bod D on  V.voorwerpnummer = D.voorwerp
 	WHERE V.voorwerpnummer = :productnummer
 	ORDER BY D.Bodbedrag ASC');

$sth->bindParam(':productnummer', $pn);
$pn = $productNummer;
$sth->execute();


foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $siteTitle = $row['titel'];
    $productnaam = $row['titel'];
    $filenaam = $row['filenaam'];
    if ($row['VeilingGesloten'] == 'wel') {
        $errorMsg = '<div class="notification is-warning">Deze veiling is gesloten.</div>';
        }
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
                        <h3 class="title is-8" id="price"> &euro;' . $row['bodbedrag'] . '</h3>
                        <p>
                           ' . $row['beschrijving'] . '
                        </p>
                        <br>
                        <form action=" product.php " method="POST">
                            <input value="' . $productNummer . '" style="display: none" name="pn">
                            <label for="bod" class="label">Uw bod: *</label>
';
//    Check voor user ingelog en of het de verkoper is.
    if (!isset($_SESSION['user'])) {
        $productpage .= '                            <label class="checkbox">
                                <input type="checkbox" required disabled>
                                Ik ga akoord met <a href="tos.php" target="_blank"> de gebruikersvoorwaarden</a>
                            </label>
                            <div class="field has-addons">

                                <div class="control"> 
         <input class="input is-primary" type="number" name="bod"
                                           id="bod" placeholder="&euro;' . $row['startprijs'] . '" maxlength="50" minlength="5" required
                                           oninput="checkBodAmount()" step="0.01" disabled >';
    } elseif ($row['VeilingGesloten'] == 'wel') {
        $productpage .= '                            <label class="checkbox">
                                <input type="checkbox" required disabled>
                                haha lol
                                Ik ga akoord met <a href="tos.php" target="_blank"> de gebruikersvoorwaarden</a>
                            </label>
                            <div class="field has-addons">

                                <div class="control"> 
         <input class="input is-primary" type="number" name="bod"
                                           id="bod" placeholder="&euro;' . $row['startprijs'] . '" maxlength="50" minlength="5" required
                                           oninput="checkBodAmount()" step="0.01" disabled >';
    } else {
        $productpage .= '                            <label class="checkbox">
                                <input type="checkbox" required>
                                Ik ga akoord met <a href="tos.php" target="_blank"> de gebruikersvoorwaarden</a>
                            </label>
                            <div class="field has-addons">

                                <div class="control"> 
                                 <input class="input is-primary" type="number" name="bod"
                                           id="bod" placeholder="&euro;' . $row['startprijs'] . '" maxlength="50" minlength="5" required
                                           oninput="checkBodAmount()" step="0.01" >';
    }
    $productpage .= '          </div>
                                <input class="button is-primary" type="submit" id="submitButton" value="breng bod uit" disabled>
                            </div>
                            <div class="notification is-danger" id="errorBod" style="display: none"></div>
                        </form>
                        <br>
                        <p id="verkoper">
                        <b>Verkoper:</b> ' . $row['verkoper'] . '
                        </p>
                        <p>
                        <b>Locatie verkoper:</b> ' . $row['plaatsnaam'] . $row['land'] . '
                        <br><br>
                        <b>Betalingswijze:</b> ' . $row['Betalingswijze'] . '
                        <br>
                        <b>Betalingsinstructie:</b> '.$row['betalingsinstructie'].'
                                                <br>
                        <b>Looptijd tot:</b>  ' . substr_replace($row['LooptijdeindeTijdstip'] ,"",-2) . '
                        <br>
                        <b>Loopdag: </b>' . str_replace(" ","-",str_replace("202","2020",$row['LooptijdeindeDag'])) . ' 
                        </p>
                </div>
        </div>
    ';
}

//biedingen
$sth = $dbh->prepare('Select * from bod where Voorwerp  =:productnummer ORDER BY  Bodbedrag DESC');
$sth->bindParam(':productnummer', $pn);
$pn = $productNummer;
$sth->execute();

foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $biedingen .= '
                                     <div class="box">
                                    <article class="media">
                                        <div class="media-left">
                                            <figure class="image is-64x64">
                                                <img src="' . $filenaam . '" alt="Image">
                                            </figure>
                                        </div>
                                        <div class="media-content">
                                            <div class="content">
                                                <p>
                                                    <strong>' . $row['gebruiker'] . '</strong> <small>@ ' . substr($productnaam, 0, 10) . '...' . '</small>
                                                    <small>' . substr($row['bodTijdstip'], 0, 5) . ' ' . $row['bodDag'] . '</small>
                                                    <br>
                                                    Bod: &euro; ' . $row['bodbedrag'] . '
                                                </p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
    ';
}


?>

<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
<div id="user" style="display: none"><?= $_SESSION['user'] ?></div>
<section>
    <div class="container">
        <br>
        <?= $errorMsg ?>
        <div class="card ">
            <div class="card-content">
            <?php include 'breadcrumbs.php' ?>
                <?= $productpage ?>
                <br>
                <div class="columns">
                    <div class="column">
                        <h3 class="title is-8  has-text-centered">Vorige biedingen:</h3>
                        <?= $biedingen ?>
                    </div>
                    <div class="column">
                        <h3 class="title is-8  has-text-centered">Iets anders </h3>
                    </div>
                </div>

            </div>
        </div>

        <br>

    </div>
</section>
<script src="js/productPaginaBieden.js"></script>
<?php include "includes/footer.php" ?>
