<!--#TODO: CHECK OF GEBRUIKER NOG GEEN VERKOPER IS.
    #TODO: INSERT TABLE.-->

<?php
$siteTitle = "titel";
include "php/dbh.php" ;
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

                <?php }
                elseif ($_SESSION['user'] == "admin") { ?>
                    <!--html admin -->


                <?php }
                elseif (isset($_SESSION['user'])) {

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $sth = $dbh->prepare("UPDATE gebruiker SET verkoper= 'wel' WHERE gebruikersnaam=:gebruiker ");
                    $sth->bindParam(':gebruiker', $gebruiker);
                    $gebruiker = $_SESSION['user'];

                    $sth->execute();

                    $sth = $dbh->prepare('INSERT INTO  verkoper(gebruiker, bank, bankrekening, controleoptie, creditcard) 
                                                        VALUES (:gebruiker, :bank, :bankrekening, :controleoptie, :creditcard)');

                    $sth->bindParam(':gebruiker', $gebruiker);
                    $sth->bindParam(':bank', $bank);
                    $sth->bindParam(':bankrekening', $bankrekening);
                    $sth->bindParam(':controleoptie', $controleoptie);
                    $sth->bindParam(':creditcard', $creditcard);
                    $gebruiker = $_SESSION['user'];
                    $bank = $_POST['bank'];
                    $bankrekening = $_POST['rekeningnummer'];
                    $controleoptie = $_POST['controleOptie'];
                    if(isset($_POST['creditcard'])) {
                        $creditcard= $_POST['creditcard'];
                        }else{
                        $creditcard = NULL;
                    }

                    $sth->execute();
                }
                $results=0;
                //check of gebruiker een verkoper is
                $sth = $dbh->prepare("SELECT COUNT(gebruiker)as x FROM verkoper WHERE gebruiker=:username");
                $sth->bindParam(':username', $_SESSION['user']);
                $sth->execute();
                foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
                    $results=$row['x'];
                }
                    if($results <1){ ?>
                    <h2 class="title is-2  has-text-centered">Aanmelden als verkoper</h2>
                    <p class="subtitle is-5  has-text-centered">Wilt u uzelf aanmelden als verkoper? Dat is heel simpel.
                        Zo gaat het in z'n werk:
                        Wilt u iets verkopen, dan vindt er een extra controle
                        plaats. U moet dan of uw credit card nummer opgeven of u krijgt via de
                        post een code toegestuurd die u moet intypen wanneer u een verkoopaccount
                        aanmaakt. Deze code blijft een week geldig, wordt random gegenereerd en niet
                        permanent opgeslagen.
                        U moet ook een bankrekening en/of een creditcardnummer
                        opgeven, want EenmaalAndermaal kan bij verkopers kosten in rekening brengen.</p>
                    <p> U moet de volgende gegevens invullen:</p>
                    <form method="Post" action="verkoper_worden.php">

                        <div class="columns">
                            <div class="column is-full">
                                <label for="gebruikersnaam" class="label">Uw gebruikersnaam: *</label>
                                <div class="control has-icons-left">
                                    <input class="input is-primary" type="text" name="gebruikersnaam"
                                           id="gebruikersnaam"
                                           value="<?= $_SESSION['user'] ?>" maxlength="50" minlength="5" disabled>

                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!--namen:-->
                        <div class="columns">
                            <div class="column is-half">
                                <div class="field">
                                    <label for="bank" class="label">Uw bank: *</label>
                                    <div class="control">
                                        <input class="input is-primary" type="text" name="bank"
                                               placeholder="Uw bank"
                                               maxlength="20" required>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                    <label for="rekeningnummer" class="label">Uw Rekeningnummer: *</label>
                                    <div class="control">
                                        <input class="input is-primary" type="text" name="rekeningnummer"
                                               placeholder="Rekeningnummer"
                                               maxlength="18" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--controle optie -->
                        <div class="columns">
                            <div class="column">

                                <div class="field">
                                    <label for="controleOptie" class="label">Controle optie:</label>
                                    <div class="control">
                                        <span class="select">
                                            <select name="controleOptie" id="controleOptie" class="input is-primary"
                                                    onchange='checkSelect();'>
                                                <option value="Post">Post</option>
                                                <option value="Creditcard">CreditCard</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!--credit card -->
                        <div id="controleOptieCreditCard" class="columns">


                        </div>
                        <br>
                        <!--submit -->
                        <div class="columns">
                            <div class="column"></div>
                            <div class="column has-text-centered">
                                <div class="field">
                                    <input class="button is-primary" type="submit" value="Submit">
                                    <input class="button has-text-primary" type="reset" value="Reset">
                                </div>
                            </div>
                            <div class="column"></div>
                        </div>

                    </form>
                        <?php } ?>
                    <?php if($results >= 1) { ?>

                    <h2 class="title is-2  has-text-centered">Aanmelden als verkoper</h2>
                    <p class="subtitle is-5  has-text-centered">U bent al verkoper en hoeft u niet opnieuw aan te melden als verkoper. U wordt doorgestuurd naar de hoofdpagina</p>

                    <p class="subtitle is-5 has-text-centered">Gebeurt dit niet automatisch binnnen enkele seconden? Klik dan <a
                                href="index.php.php">hier.</a></p>
                    <script>
                        setTimeout(function () {
                            window.location.href = 'index.php';
                        }, 3000)
                    </script>

                <?php }
                } ?>
            </div>
        </div>

        <br>

    </div>
</section>
<script src="js/VerkoperWorden.js"></script>
<?php include "includes/footer.php"?>