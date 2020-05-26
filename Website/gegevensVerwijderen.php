<?php
$siteTitle = "Account verwijderen";
include "php/dbh.php";
$dbh = connectToDatabase();
// TODO: MOET JE EEN DBusername hebben? gewoon $_SESSION username gebruiken en met passwd checken is vgm genoeg
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
                    $username = $_SESSION['user'];
                    $deleteUser = '

<form method="post" action="gegevensVerwijderen.php" class="has-text-centered">
    
    <div class="column is-half ">
        <label for="gebruikersnaam" class="label">Uw gegevens worden verwijderd voor het account met gebruikersnaam:</label>
        <input class="input is-danger is-halfsize " type="text" name="gebruikersnaam"
            id="gebruikersnaam" value="' . $username . '" disabled="disabled">
    </div><br><br><br>
                    
                    <!--Wachtwoord hier invullen -->
    <div class="column field">
         <label for="wachtwoord" class="label">Vul uw wachtwoord in om uw identiteit te bevestigen</label>
         <div class="control has-icons-left">
            <input class="input is-danger" type="password" name="wachtwoord"
               id="wachtwoord" placeholder="********" required>
            <span class="icon is-small is-left">
            <i class="fas fa-key"></i>
            </span>
         </div>
         
         
         <br>
         <br>
         <div class="field has-text-centered">
            <input type="submit" class="button is-danger" value="Klik hier om uw gegevens te verwijderen" >
        
        </div>
        </form>
                            
                        ';


                    if ($_SERVER['REQUEST_METHOD'] == '_POST') {
//wachtwoord check
                        $password = $_POST['wachtwoordregel'];

                        $qry = $dbh->prepare("SELECT wachtwoord FROM gebruiker WHERE gebruikersnaam=:username");
                        $qry->execute(array($username));
                        $hash = $qry->fetch();

                        if (empty($hash)) {
                            http_response_code(404);
                            echo 'hallo ja iets 404';
                        } else {
                            $pw = $hash[0];

                            if (password_verify($password, $pw)) {
                                echo 'wachtwoord klopt mooiman';
                                $deleteUser='';
                                //de statements om ingelogde gebruiker stapsgewijs te verwijderen
                                $sth = $dbh->prepare('DELETE FROM gebruikerstelefoon WHERE gebruiker=:gebruiker');
                                $sth = $dbh->prepare('UPDATE voorwerp SET verkoper = \'VERWIJDERDE_GEBRUIKER\' WHERE verkoper=:gebruiker');
                                $sth = $dbh->prepare('UPDATE voorwerp SET koper = \'VERWIJDERDE_GEBRUIKER\' WHERE koper=:gebruiker');
                                $sth = $dbh->prepare('UPDATE bod SET gebruiker = \'VERWIJDERDE_GEBRUIKER\' WHERE gebruiker=:gebruiker');
                                $sth = $dbh->prepare('DELETE FROM verkoper WHERE gebruiker=:gebruiker');
                                $sth = $dbh->prepare('DELETE FROM gebruiker WHERE gebruikersnaam=:gebruiker');

                                $sth->bindParam(':gebruiker', $gebruiker);
                                $gebruiker = $username;
                                $sth->execute();
                            }
                            else{
                                echo 'wachtwoord klopt NIET jammerman';
                            }
                        }
                    }

                    ?>
                        <!--Weergeven op de gegevensVerwijderen pagina als ingelogd is-->
                        <h1 class="title is-1 has-text-centered">Uw account verwijderen</h1>
                        <h3 class="subtitle is-size-5 has-text-centered">Uw account en al uw opgeslagen gegevens worden
                            direct verwijderd. <br>U kunt uw gegevens dus niet later terughalen!</h3>

                        <?=var_dump($username);?>
                    <?=$deleteUser?>

                    <?php }; ?>


                </div>
            </div>

        </div>
    </section>
    <br>

<?php include "includes/footer.php" ?>