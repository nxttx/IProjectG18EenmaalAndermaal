<?php include "dbh.php" ?>


<?php
$title = "Klant gegevens";
$dbh = connectToDatabase();


$sth = $dbh->prepare("SELECT voornaam, achternaam, adresregel1, adresregel2, postcode, plaatsnaam, Land, GeboorteDag, emailadress FROM gebruiker
 WHERE gebruikersnaam =:gebruikersnaam
 ");
        $sth->bindParam('voornaam', $voornaam);
        $sth->bindParam('achternaam', $achternaam);
        $sth->bindParam('adresregel1', $adresregel1);
        $sth->bindParam('adresregel2', $adresregel2);
        $sth->bindParam('postcode', $postcode);
        $sth->bindParam('plaatsnaam', $plaatsnaam);
        $sth->bindParam('Land', $land);
        $sth->bindParam('GeboorteDag', $birthdate);
        $sth->bindParam('emailadress', $email);
        $sth->bindParam(':gebruikersnaam', $gebruikersnaam);

        $voornaam = $_POST['voornaam'];
        $achternaam = $_POST['achternaam'];
        $adresregel1 = $_POST['adresregel1'];
        $adresregel2 = $_POST['adresregel2'];
        $postcode = $_POST['postcode'];
        $plaatsnaam = $_POST['plaatsnaam'];
        $land = $_POST['land'];
        $birthdate = $_POST['birthdate'];
        $email = $_POST['email'];
        $gebruikersnaam = $_SESSION['user'];
        $sth->execute();



        $subtitle = "";
        $error_msg = "";




$siteTitle = "Gegevens aanpassen";
?>

<?php include "../includes/head.php" ?>
<?php include "../includes/header.php" ?>
    <section>
        <div class="container">
            <br>

            <div class="card ">
                <div class="card-content">
                    <h2 class="title is-2  has-text-centered"><?= $title ?></h2>
                    <p class="subtitle is-5  has-text-centered"><?= $subtitle ?> </p>
                    <?= $error_msg ?>

                </div>
            </div>

            <br>

        </div>
    </section>
<?php include "../includes/footer.php" ?>
<?php
//"delete from gebruiker where gebruikersnaam = 'iets'"
//"select * from gebruiker"
?>