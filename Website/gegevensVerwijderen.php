<?php
$siteTitle = "Account verwijderen";
include "php/dbh.php";
$dbh = connectToDatabase();
?>

<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
<section>
    <div class="container">
        <br>
        <div class="card ">
            <div class="card-content">


                <?php if (!isset($_SESSION['user'])) { ?>
                    <h2 class="title is-3">U bent nog niet ingelogd, u wordt doorgestuurd naar de inlogpagina</h2>
                    <h3 class="subtitle is-5">Gebeurt dit niet automatisch binnnen enkele seconden? Klik dan <a
                                href="login.php">hier.</a></h3>
                    <script>
                        setTimeout(function () {
                            window.location.href = 'login.php';
                        }, 2000)
                    </script>


                <?php ;
                } elseif (isset($_SESSION['user'])) {
                //Dit wordt alle PHP voor _SESSION['user'];
                $title = "";
                $subtitle = "";
                $error_msg = "";

                $username = $_SESSION['user'];
                $deleteUser = '

<form method="post" action="gegevensVerwijderen.php" class="has-text-centered">
    <div class="columns">
    <div class="column"></div>
    <div class="column is-half ">
        <label for="gebruikersnaam" class="label">Uw gegevens worden verwijderd voor het account met gebruikersnaam:</label>
        <input class="input is-warning is-halfsize " type="text" name="gebruikersnaam"
            id="gebruikersnaam" value="' . $username . '" disabled="disabled">
    </div>
    <div class="column"></div>
    </div>
                    
                    <!--Wachtwoord hier invullen -->
    <div class="column field">
         <label for="wachtwoord" class="label">Vul uw wachtwoord in om uw identiteit te bevestigen</label>
         <div class="control has-icons-left">
            <input class="input is-warning" type="password" name="wachtwoord"
               id="wachtwoord" placeholder="********" required>
            <span class="icon is-small is-left">
            <i class="fas fa-key"></i>
            </span>
         </div>
         
         <br>
          <label class="checkbox">
              <input type="checkbox" required>
                Ik weet zeker dat ik mijn account wil verwijderen.
          </label>
         <br>
         <br>
         <div class="field has-text-centered">
            <input type="submit" class="button is-danger" value="Klik hier om uw gegevens te verwijderen">
                
        </div>
        </form>
                            
                        ';


                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    //wachtwoord check

                    $username = $_SESSION['user'];
                    $password = $_POST['wachtwoord'];

                    $qry = $dbh->prepare("SELECT wachtwoord FROM gebruiker WHERE gebruikersnaam=:username");

                    $qry->execute(array($username));

                    $hash = $qry->fetch();

                    if (empty($hash)) {
                        http_response_code(404);
                    } else {
                        $pw = $hash[0];

                        if (password_verify($password, $pw)) {

                            $sth = $dbh->prepare('DELETE FROM gebruikerstelefoon WHERE gebruiker=:gebruiker');
                            $sth->bindParam(':gebruiker', $gebruiker);
                            $gebruiker = $username;
                            $sth->execute();
                            $sth = $dbh->prepare('UPDATE voorwerp SET verkoper = \'VERWIJDERDE_GEBRUIKER\' WHERE verkoper=:gebruiker');
                            $sth->bindParam(':gebruiker', $gebruiker);
                            $gebruiker = $username;
                            $sth->execute();
                            $sth = $dbh->prepare('UPDATE voorwerp SET koper = \'VERWIJDERDE_GEBRUIKER\' WHERE koper=:gebruiker');
                            $sth->bindParam(':gebruiker', $gebruiker);
                            $gebruiker = $username;
                            $sth->execute();
                            $sth = $dbh->prepare('UPDATE bod SET gebruiker = \'VERWIJDERDE_GEBRUIKER\' WHERE gebruiker=:gebruiker');
                            $sth->bindParam(':gebruiker', $gebruiker);
                            $gebruiker = $username;
                            $sth->execute();
                            $sth = $dbh->prepare('DELETE FROM verkoper WHERE gebruiker=:gebruiker');
                            $sth->bindParam(':gebruiker', $gebruiker);
                            $gebruiker = $username;
                            $sth->execute();
                            $sth = $dbh->prepare('DELETE FROM gebruiker WHERE gebruikersnaam=:gebruiker');
                            $sth->bindParam(':gebruiker', $gebruiker);
                            $gebruiker = $username;
                            $sth->execute();

                            $deleteUser = '';
                            $subtitle = '<br><p class="subtitle has-text-centered is-marginless">U kunt nu gerust de pagina sluiten of naar een andere pagina gaan.</p>
                            <div class="field has-text-centered">
                                <br>
                                <a href="index.php" class="button is-primary">Klik om naar de homepagina te gaan</a>
                            </div>   ';
                            $error_msg = "";
                            session_destroy();

                        } else {
                            $subtitle = "";
                            $error_msg = '<br><div class="notification is-danger has-text-centered">
  Uw wachtwoord klopt niet!
  <br>
</div>
';
                        }
                    }
                    $dbh = null;
                }

                ?>
                    <!--Weergeven op de gegevensVerwijderen pagina als ingelogd is-->
                    <h1 class="title is-1 has-text-centered">Uw account verwijderen</h1>
                    <h3 class="subtitle is-size-5 has-text-centered">Uw account en al uw opgeslagen gegevens zijn
                        direct verwijderd.</h3>
                    <?= $deleteUser ?>
                    <?= $title ?>
                    <?= $subtitle ?>
                    <?= $error_msg ?>

                <?php }; ?>

            </div>
        </div>

    </div>
</section>
<br>

<?php include "includes/footer.php" ?>
<script>
    <alert('LET OP! Al uw gegevens worden verwijderd!')
</script>
