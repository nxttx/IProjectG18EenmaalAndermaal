<?php include "dbh.php" ?>
<?php
$dbh = connectToDatabase();
echo $_POST['vraag'];


if ($_POST['wachtwoordregel1'] == $_POST['wachtwoordregel2'] && strlen($_POST['wachtwoordregel1']) >= 8) {
    $password = $_POST['wachtwoordregel1'];
    $finalPassword = password_hash($password, PASSWORD_DEFAULT);

    $sth = $dbh->prepare('INSERT INTO gebruiker (gebruikersnaam, voornaam, achternaam, adresregel1, adresregel2, postcode, plaatsnaam, Land, GeboorteDag, emailadress, wachtwoord, Vraag, antwoordtekst, Verkopen)
VALUES( :gebruikersnaam, :voornaam, :achternaam, :adresregel1, :adresregel2, :postcode, :plaatsnaam, :Land, :GeboorteDag, :emailadress, :wachtwoord, :Vraag, :antwoordtekst, :Verkopen)');
    $sth->bindParam(':gebruikersnaam', $gebruikersnaam);
    $sth->bindParam(':voornaam', $voornaam);
    $sth->bindParam(':achternaam', $achternaam);
    $sth->bindParam(':adresregel1', $adresregel1);
    $sth->bindParam(':adresregel2', $adresregel2);
    $sth->bindParam(':postcode', $postcode);
    $sth->bindParam(':plaatsnaam', $plaatsnaam);
    $sth->bindParam(':Land', $land);
    $sth->bindParam(':GeboorteDag', $birthdate);
    $sth->bindParam(':emailadress', $email);
    $sth->bindParam(':wachtwoord', $finalPassword);
    $sth->bindParam(':vraag', $vraag);
    $sth->bindParam(':antwoordtekst', $antwoord);

    $gebruikersnaam= $_POST['gebruikersnaam'];
    $voornaam= $_POST['voornaam'];
    $achternaam= $_POST['achternaam'];
    $adresregel1= $_POST['adresregel1'];
    $adresregel2=$_POST['adresregel2'];
    $postcode= $_POST['postcode'];
    $plaatsnaam= $_POST['plaatsnaam'];
    $land=$_POST['land'];
    $birthdate=$_POST['birthdate'];
    $email=$_POST['email'];
    $finalPassword = $finalPassword;
    $vraag = $_POST['vraag'];
    $antwoord = $_POST['antwoord'];
    $sth->execute();


    $title = "Registreren gelukt.";
    $subtitle = "";
    $error_msg = "";
} elseif ($_POST['wachtwoordregel1'] != $_POST['wachtwoordregel2']) {
    $title = "Foutmelding";
    $subtitle = "";
    $error_msg = '<div class="notification is-danger">
  Wachtwoorden zijn <b>niet</b> gelijk. 
</div>';

} elseif (strlen($_POST['wachtwoordregel1']) >= 8) {
    $title = "Foutmelding";
    $subtitle = "";
    $error_msg = '<div class="notification is-danger">
  Wachtwoord moet groter zijn dan 8 tekens. U heeft: ' . strlen($_POST['wachtwoordregel1']) . ' tekens.
</div>';

} else {
    $title = "Foutmelding";
    $subtitle = "";
    $error_msg = '<div class="notification is-danger">
  Geen data ontvangen.
</div>';
}

$dbh = null;

$siteTitle = "registreren part 2";
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
<?php include "../includes/footer.html" ?>
<?php
//"select * from gebruiker where gebruikersnaam = 'NXTTX'"
?>