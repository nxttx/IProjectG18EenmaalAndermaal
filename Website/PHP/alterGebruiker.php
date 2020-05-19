<?php include "dbh.php" ?>
<?php include "../includes/head.php" ?>
<?php include "../includes/header.php" ?>

<?php
$dbh = connectToDatabase();
//wachtwoord check

$sth = $dbh->prepare("SELECT wachtwoord FROM gebruiker WHERE gebruikersnaam =:gebruikersnaam");
$sth->bindParam(':gebruikersnaam', $gebruikersnaam);
$gebruikersnaam = $_SESSION['user'];
$sth->execute();
foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $DBwachtwoord = $row['wachtwoord'];
}

//first check
$password = $_POST['wachtwoordregel1'];
$finalPassword = password_hash($password, PASSWORD_DEFAULT);
if ($finalPassword == $DBwachtwoord) {


    $sth = $dbh->prepare("UPDATE gebruiker
SET voornaam=:voornaam, achternaam=:achternaam, adresregel1=:adresregel1, adresregel2=:adresregel2, postcode=:postcode, plaatsnaam=:plaatsnaam,
 Land=:Land, GeboorteDag=:GeboorteDag, emailadress=:emailadress
 WHERE gebruikersnaam =:gebruikersnaam
 ");
    $sth->bindParam(':voornaam', $voornaam);
    $sth->bindParam(':achternaam', $achternaam);
    $sth->bindParam(':adresregel1', $adresregel1);
    $sth->bindParam(':adresregel2', $adresregel2);
    $sth->bindParam(':postcode', $postcode);
    $sth->bindParam(':plaatsnaam', $plaatsnaam);
    $sth->bindParam(':Land', $land);
    $sth->bindParam(':GeboorteDag', $birthdate);
    $sth->bindParam(':emailadress', $email);
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


    $title = "Uw gegevens zijn aangepast.";
    $subtitle = "";
    $error_msg = "";

} elseif ($finalPassword != $DBwachtwoord) {
    $title = "Foutmelding";
    $subtitle = "";
    $error_msg = '<div class="notification is-danger">
  Wachtwoord klopt niet!
</div>';
}

$dbh = null;

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