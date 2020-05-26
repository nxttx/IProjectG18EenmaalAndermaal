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
                        $username = $_SESSION['user'];
                        $deleteUser = '

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
         <div class="column has-text-centered">
            <button class="button is-danger" >
               Klik hier om uw account te verwijderen
            </button>
        
        </div>                    
                        ';

                        //if (HASH (password) of $username) == DataBase password of $username) and buttonpressed, do the prepared statemen
                        $sth = $dbh->prepare('SELECT * FROM gebruiker WHERE gebruikersnaam =');

                    }; ?>


                    <!--Weergeven op de gegevensVerwijderen pagina-->
                    <h1 class="title is-1 has-text-centered">Uw account verwijderen</h1>
                    <h3 class="subtitle is-size-5 has-text-centered">Uw account en al uw opgeslagen gegevens worden
                        direct verwijderd. <br>U kunt uw gegevens dus niet later terughalen!</h3>
                    <?= $deleteUser ?>


                </div>
            </div>

        </div>
    </section>
    <br>

        <script>
            alert("Let op! Al uw gegevens zullen worden verwijderd!")
        </script>
<?php include "includes/footer.php" ?>