<?php
$siteTitle = "mijn veilingen";
include 'php/dbh.php';
$dbh = connectToDatabase();
//usercheck

$subTitle = '';
$mainContent = '';


if (isset($_SESSION['user'])) {
    $sth = $dbh->prepare("SELECT COUNT(gebruiker) as hoeveelheid FROM verkoper WHERE gebruiker =:gebruikersnaam");
    $sth->bindParam(':gebruikersnaam', $gebruikersnaam);
    $gebruikersnaam = $_SESSION['user'];
    $sth->execute();
    foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $hoeveelheidGebruikersnamen = $row['hoeveelheid'];
    }
}

if (!isset($_SESSION['user'])) { //user is not logged in\
    $subTitle = 'U bent nog niet ingelogd. U wordt binnen enkele seconde terug gestuurd naar de hoofdpagina';
    $mainContent = '<script> 
                        setTimeout(function(){window.location.replace("../index.php");}, 3500);
                    </script>';
} elseif ($hoeveelheidGebruikersnamen < 1) { //user is geen verkoper
    $subTitle = 'U bent nog geen verkoper. U wordt binnen enkele seconde terug gestuurd naar de hoofdpagina';
    $mainContent = '<script> 
                        setTimeout(function(){window.location.replace("../index.php");}, 3500);
                    </script>';
} else { // user is verkoper
    $subTitle = 'Hier ziet u al u aangboden items';

    $sth = $dbh->prepare("SELECT B.filenaam, V.titel, V.beschrijving, V.startprijs, V.looptijdbeginDag, V.voorwerpnummer, V.VeilinGesloten
    FROM voorwerp V
        JOIN bestand B on V.voorwerpnummer = B.voorwerp
    where verkoper = :gebruikersnaam");
    $sth->bindParam(':gebruikersnaam', $gebruikersnaam);
    $gebruikersnaam = $_SESSION['user'];
    $sth->execute();
    $count = 0;
    foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
        //get highest bod
        $sth = $dbh->prepare("
            SELECT TOP(1) bodbedrag FROM bod 
            where voorwerp = :voorwerpnummer
            ORDER BY Bodbedrag ASC");
        $sth->bindParam(':voorwerpnummer', $row['voorwerpnummer']);
        $sth->execute();
        foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row2) {
            $highestBod = $row2['bodbedrag'];
        }

        if ($count <= 3) {
            $voorwerp .= '  <div class="column is-3">
                <div class="has-background-primary">
                    <figure class="image objectfit-cover">
                       <img src=" ' . $row['filenaam'] . '" alt="img">
                    </figure>
                    <div class="extra-padding-1 has-background-light">
                        <h3 class="title is-4"> ' . $row['titel'] . '  </h3>
                        <div class="content is-medium">
                            ' . $row['beschrijving'] . '
                        </div>
                        <div class="columns has-text-centered">
                            <div class="column">
                                <div class="content is-medium">
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
                                    <p> ' . $row['looptijdbeginDag'] . '</p>
                                </div>
                            </div>
                        </div> ';
            if ($row['VeilinGesloten']) {
                $voorwerp .= '<a class="button is-fullwidth is-warning" href="product.php?pn=' . $row['voorwerpnummer'] . '">
                            Veiling gesloten 
                        </a> ';
            } elseif ($row['VeilinGesloten']) {
                $voorwerp .= '<a class="button is-fullwidth is-warning" href="product.php?pn=' . $row['voorwerpnummer'] . '">
                            Veiling gesloten 
                        </a> ';
            } else {
                $voorwerp .= '<a class="button is-fullwidth" href="product.php?pn=' . $row['voorwerpnummer'] . '">
                            Bekijk nu!
                        </a> ';
            }
            $voorwerp .= '
                    </div>
                </div>
                </div>';
            $count++;
        } else {
            $voorwerp .= ' </div> <div class="columns">
            <div class="column is-3">
                <div class="has-background-primary">
                    <figure class="image objectfit-cover">
                       <img src=" ' . $row['filenaam'] . '" alt="img">
                    </figure>
                    <div class="extra-padding-1 has-background-light">
                        <h3 class="title is-4 "> ' . $row['titel'] . '  </h3>
                        <div class="content is-medium">
                            ' . $row['beschrijving'] . '
                        </div>
                        <div class="columns has-text-centered">
                            <div class="column">
                                <div class="content is-medium">
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
                                    <p> ' . $row['looptijdbeginDag'] . '</p>
                                </div>
                            </div>
                        </div>
                        <a class="button is-fullwidth" href="product.php?pn=' . $row['voorwerpnummer'] . '">
                            Bekijk nu!
                        </a>
                    </div>
                </div> 
                </div>
                ';
            $count = 1;
        }
    }

    $mainContent = '<div class="columns">' . $voorwerp . '</div>';
}


?>

<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
    <section>
        <div class="container">
            <br>

            <div class="card ">
                <div class="card-content">
                    <h2 class="title is-2  has-text-centered">Mijn veilingen</h2>
                    <p class="subtitle is-5  has-text-centered"> <?= $subTitle ?> </p>
                    <?= $mainContent ?>


                </div>
            </div>

            <br>

        </div>
    </section>
<?php include "includes/footer.php" ?>