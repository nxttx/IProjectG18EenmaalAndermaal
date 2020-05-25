<?php include "php/dbh.php" ?>
<?php
$dbh = connectToDatabase();
$siteTitle = "";
$productpage = "";
$biedingen = "";
$productnaam = "";
$filenaam ="";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $productNummer = $_GET['pn'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "nu dus post";
    $productNummer = $_POST['pn'];
    $bodBedrag = test_input($_POST["bod"]);

    $sth = $dbh->prepare("INSERT INTO Bod (Voorwerp, Bodbedrag, Gebruiker, BodDag, BodTijdstip) VALUES(:Voorwerp, :Bodbedrag, :Gebruiker, :BodDag, :BodTijdstip)");
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


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


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
    $productnaam = $row['titel'];
    $filenaam =$row['filenaam'];
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
                        <h3 class="title is-8" id="price"> &euro;' . $row['startprijs'] . '</h3>
                        <p>
                           ' . $row['beschrijving'] . '
                        </p>
                        <br>
                        <form action=" product.php " method="POST">
                            <input value="' . $productNummer . '" style="display: none" name="pn">
                            <label for="bod" class="label">Uw bod: *</label>
                            <label class="checkbox">
                                <input type="checkbox" required>
                                Ik ga akoord met <a href="tos.php" target="_blank"> de gebruikersvoorwaarden</a>
                            </label>
                            <div class="field has-addons">

                                <div class="control"> ';
//    Check voor user ingelogf en of het de verkoper is.
    if(!isset($_SESSION['user'])){
            $productpage .= ' <input class="input is-primary" type="number" name="bod"
                                           id="bod" placeholder="&euro;' . $row['startprijs'] . '" maxlength="50" minlength="5" required
                                           oninput="checkBodAmount()" step="0.01" disabled >';
    }else{
        $productpage .= ' <input class="input is-primary" type="number" name="bod"
                                           id="bod" placeholder="&euro;' . $row['startprijs'] . '" maxlength="50" minlength="5" required
                                           oninput="checkBodAmount()" step="0.01" >';
    }
    $productpage.='          </div>
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
                        <b>Betalingsinstructie:</b> ' . $row['betalingsinstructie'] . '
                        </p>
                </div>
        </div>
    ';
}

//biedingen
$sth = $dbh->prepare('Select * from bod where Voorwerp  =:productnummer');
$sth->bindParam(':productnummer', $pn);
$pn = $productNummer;
$sth->execute();

foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $biedingen = '
                                     <div class="box">
                                    <article class="media">
                                        <div class="media-left">
                                            <figure class="image is-64x64">
                                                <img src="'.$filenaam.'" alt="Image">
                                            </figure>
                                        </div>
                                        <div class="media-content">
                                            <div class="content">
                                                <p>
                                                    <strong>'.$row['gebruiker'].'</strong> <small>@ '. substr($productnaam,0,10).'...' .'</small>
                                                    <small>'. substr($row['bodTijdStip'],0,5). $row['bodDag'] .'</small>
                                                    <br>
                                                    Bod: &euro; '.$row['bodbedrag'].'
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
<div id="user" style="display: none"><?=$_SESSION['user']?></div>
    <section>
        <div class="container">
            <br>

            <div class="card ">
                <div class="card-content">
                    <?= $productpage ?>
                    <br>
                    <div class="columns">
                        <div class="column">
                            <h3 class="title is-8  has-text-centered">Vorige biedingen </h3>
                            <?= $biedingen ?>
                                <div class="box">
                                    <article class="media">
                                        <div class="media-left">
                                            <figure class="image is-64x64">
                                                <img src="<?=$filenaam?>" alt="Image">
                                            </figure>
                                        </div>
                                        <div class="media-content">
                                            <div class="content">
                                                <p>
                                                    <strong>UserName</strong> <small>@<?=substr($productnaam,0,10).'...'?></small>
                                                    <small>17:27 25/05/2005</small>
                                                    <br>
                                                    Bod: &euro; 10,00
                                                </p>
                                            </div>
                                        </div>
                                    </article>
                                </div>

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