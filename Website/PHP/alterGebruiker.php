<?php include "dbh.php" ?>


<?php
$dbh = connectToDatabase();
//wachtwoord check

$username = $_SESSION['user'];
$password = $_POST['wachtwoordregel1'];

$qry = $dbh->prepare("SELECT wachtwoord FROM gebruiker WHERE gebruikersnaam=:username");

$qry->execute(array($username));

$hash = $qry->fetch();

if (empty($hash)) {
    http_response_code(404);
} else {
    $pw = $hash[0];

    if (password_verify($password, $pw)) {

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

        $sth = $dbh->prepare("UPDATE gebruikerstelefoon set telefoon=:telefoon where gebruiker= :gebruikersnaam");
        $sth->bindParam(':telefoon', $telefoon);
        $sth->bindParam(':gebruikersnaam', $gebruikersnaam);
        $telefoon = $_POST['telefoon'];
        $gebruikersnaam = $_SESSION['user'];
        $sth->execute();

        $title = "Uw gegevens zijn aangepast.";
        $subtitle = '<p class="subtitle has-text-centered is-marginless">U kunt nu gerust de pagina sluiten of naar een andere pagina gaan.</p> 
         <div class="field has-text-centered">
            <br>
            <input class="button is-primary" value="Klik om terug te gaan" onclick="history.back()">
         </div>   
            ';

        $error_msg = "";

    } else {
        $title = "Foutmelding";
        $subtitle = "";
        $error_msg = '<br><div class="notification is-danger has-text-centered">
  Uw wachtwoord klopt niet!
  <br>
</div>
<div class="column has-text-centered">
 <input class="button is-primary " value="Klik om terug te gaan" onclick="history.back()">
 </div>

';
    }
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

?>