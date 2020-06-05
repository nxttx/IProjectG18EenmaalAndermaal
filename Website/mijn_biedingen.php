<?php
include "php/dbh.php";

$dbh = connectToDatabase();
$siteTitle = "Mijn biedingen";
$subTitle = '';
$mainContent = '';
$error_msg ='';


if(!isset($_SESSION['user'])){
    $subTitle = 'U bent nog niet ingelogd. U wordt binnen enkele seconde terug gestuurd naar de inlogpagina';
    $mainContent = '<script> 
                        setTimeout(function(){window.location.replace("../login.php");}, 3500);
                    </script>';
    $error_msg ='';
}else{
    $subTitle = 'Hier kunt u al uw biedingen in de gaten houden';
    $mainContent = '';

    $sth = $dbh->prepare("SELECT V.voorwerpnummer, B.Bodbedrag, B.BodDag, B.BodTijdstip, V.titel,
       V.beschrijving, V.looptijdbeginDag, D.filenaam,V.Verkoper, V.veilinggesloten , V.is_geblokkeerd, G.emailadress
    FROM Bod B
    JOIN voorwerp V on V.voorwerpnummer = B.voorwerp
    JOIN bestand D on D.voorwerp = B.Voorwerp
    JOIN gebruiker G on V.verkoper = g.gebruikersnaam
    WHERE B.Gebruiker = :gebruikersnaam AND V.verkoper <> B.Gebruiker
    ORDER BY BodDag DESC, BodTijdstip DESC");
    $sth->bindParam(':gebruikersnaam', $gebruikersnaam);
    $gebruikersnaam = $_SESSION['user'];
    $sth->execute();
    $count = 0;
    foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
        //get highest bod
        $sth = $dbh->prepare("
            SELECT TOP(1) bodbedrag FROM bod 
            where voorwerp = :voorwerpnummer 
            ORDER BY Bodbedrag DESC");
        $sth->bindParam(':voorwerpnummer', $row['voorwerpnummer']);
        $sth->execute();
        foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row2) {
            $highestBod = $row2['bodbedrag'];
        }
        //get highest user bod
        $sth = $dbh->prepare("
            SELECT TOP(1) bodbedrag FROM bod 
            where voorwerp = :voorwerpnummer AND Gebruiker = :gebruikersnaam
            ORDER BY Bodbedrag DESC");
        $sth->bindParam(':voorwerpnummer', $row['voorwerpnummer']);
        $sth->bindParam(':gebruikersnaam', $gebruikersnaam);
        $gebruikersnaam = $_SESSION['user'];
        $sth->execute();
        foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row2) {
            $highestUserBod = $row2['bodbedrag'];
        }

        if ($count <= 3) {
            $mainContent .= '  <div class="column is-3">
                <div class="has-background-primary">
                    <figure class="image objectfit-cover">
                       <img src=" ' . $row['filenaam'] . '" alt="img">
                    </figure>
                    <div class="extra-padding-1 has-background-light">
                        <h3 class="title is-4"> ' . $row['titel'] . '  </h3>
                        <div class="columns has-text-centered">
                            <div class="column">
                                <div class="content is-medium">
                                <p class="is-size-7">Hoogste bod:</p>
                                    	<p>&euro;' . $highestBod . '</p>
                                </div> 
                            </div>
                            <div class="column">
                                <div class="content is-medium">
                                    <p> | </p>
                                </div>
                            </div>
                            <div class="column">
                                <div class="content is-medium">
                                <p class="is-size-7">Uw bod:</p>
                                    	<p>&euro;' . $highestUserBod . '</p>
                                </div> 
                            </div>
                        </div> ';
            if ($row['is_geblokkeerd']) {
                $mainContent .= '<a class="button is-fullwidth is-danger" href="product.php?pn=' . $row['voorwerpnummer'] . '">
                            Veiling geblokeerd door beheerder. 
                        </a> ';
            } elseif ($row['veilinggesloten'] == 'wel' && $highestUserBod == $highestBod) {
                $mainContent .= '<a class="button is-fullwidth is-success is-large" href="mailto:' . $row['emailadress'] . '">
                           <p class="is-size-7"> U heeft het voorwerp gewonnen! <br> Druk hier om contact op<br> te nemen met&nbsp;'.$row['Verkoper'].' </p>
                        </a> ';
            }elseif ($row['veilinggesloten'] == 'wel' ) {
                $mainContent .= '<a class="button is-fullwidth is-warning" href="product.php?pn=' . $row['voorwerpnummer'] . '">
                            Veiling gesloten 
                        </a> ';
            } else {
                $mainContent .= '<a class="button is-fullwidth" href="product.php?pn=' . $row['voorwerpnummer'] . '">
                            Bekijk nu!
                        </a> ';
            }
            $mainContent .= '
                    </div>
                </div>
                </div>';
            $count++;
        } else {
            $mainContent .= ' </div> <div class="columns">
            <div class="column is-3">
                <div class="has-background-primary">
                    <figure class="image objectfit-cover">
                       <img src=" ' . $row['filenaam'] . '" alt="img">
                    </figure>
                    <div class="extra-padding-1 has-background-light">
                        <h3 class="title is-4 "> ' . $row['titel'] . '  </h3>
                        <div class="columns has-text-centered">
                            <div class="column">
                                <div class="content is-medium">
                                    <p class="is-size-7">Hoogste bod:</p>
                                    <p>&euro;' . $highestBod . '</p>
                                </div> 
                            </div>
                            <div class="column">
                                <div class="content is-medium">
                                    <p> | </p>
                                </div>
                            </div>
                            <div class="column">
                                <div class="content is-medium">
                                <p class="is-size-7">Uw bod:</p>
                                    	<p>&euro;' . $highestUserBod . '</p>
                                </div> 
                            </div>
                                                </div> ';
            if ($row['is_geblokkeerd']) {
                $mainContent .= '<a class="button is-fullwidth is-danger" href="product.php?pn=' . $row['voorwerpnummer'] . '">
                            Veiling geblokeerd door beheerder. 
                        </a> ';

            } elseif ($row['veilinggesloten']) {
                $mainContent .= '<a class="button is-fullwidth is-warning" href="product.php?pn=' . $row['voorwerpnummer'] . '">
                            Veiling gesloten 
                        </a> ';
            } else {
                $mainContent .= '<a class="button is-fullwidth" href="product.php?pn=' . $row['voorwerpnummer'] . '">
                            Bekijk nu!
                        </a> ';
            }
            $mainContent .= '
                    </div>
                </div>
                </div>';
            $count = 1;
        }
    }


}


?>

<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
    <section>
        <div class="container">
            <br>
            <?=$error_msg?>
            <div class="card ">
                <div class="card-content">
                    <h2 class="title is-2  has-text-centered">Mijn biedingen </h2>
                    <p class="subtitle is-5  has-text-centered"> <?=$subTitle?> </p>
                    <div class="columns">
                        <?=$mainContent?>
                    </div>
                </div>
            </div>

            <br>

        </div>
    </section>
<?php include "includes/footer.php" ?>