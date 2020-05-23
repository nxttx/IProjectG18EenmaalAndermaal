<?php
$siteTitle = "Mijn profiel";
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

                <?php } elseif ($_SESSION['user'] == "admin") { ?>
                    <!--html admin -->


                <?php }
                elseif (isset($_SESSION['user'])) {
                //Dit wordt alle PHP voor _SESSION['user'];
                $profielAanpassen = '';
                $username = $_SESSION['user'];


                $sth = $dbh->prepare('SELECT * FROM gebruiker WHERE gebruikersnaam =:user');
                $sth->bindParam(':user', $us);
                $us = $username;
                $sth->execute();
                $test = "DIT IS PHP";


                foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
                    $profielAanpassen .= ' 
                  
                        <label for="gebruikersnaam" class="label">Uw gebruikersnaam:</label>
                    <input class="input is-primary" type="text" name="gebruikersnaam"
                    id="gebruikersnaam" value="' . rtrim($row['gebruikersnaam']) . '" disabled="disabled" required>
                    <p class="help">U kan uw gebruikersnaam niet wijzigen.</p>
                  <br>
                                                   

<form method="post" action="php/altergebruiker.php">
   <!--namen:-->
   <div class="columns">
      <div class="column is-half">
         <div class="field">
            <label for="voornaam" class="label">Uw voornaam: *</label>
            <div class="control">
               <input class="input is-primary" type="text" name="voornaam"
                  value="' . rtrim($row['voornaam']) . '"
                  maxlength="50" required>
            </div>
         </div>
      </div>
      <div class="column is-half">
         <div class="field">
            <label for="achternaam" class="label">Uw achternaam: *</label>
            <div class="control">
               <input class="input is-primary"                                                     
               value="' . rtrim($row['achternaam']) . '"
                  type="text" name="achternaam"
                  maxlength="50" required>
            </div>
         </div>
      </div>
   </div>
   <br>
   <!--adress-->
   <div class="columns">
      <div class="column is-half">
         <div class="field">
            <label for="adresregel1" class="label">Uw adres: *</label>
            <p class="control has-icons-left">
               <input class="input is-primary" type="text" name="adresregel1"
                  value="' . rtrim($row['adresregel1']) . '" 
                maxlength="100" required>
               <span class="icon is-small is-left">
               <i class="fas fa-map-marked-alt"></i>
               </span>
            </p>
         </div>
      </div>
      <div class="column is-half">
         <div class="field">
            <label for="adresregel2" class="label">Uw adres:</label>
            <p class="control has-icons-left">
               <input class="input is-primary" type="text" name="adresregel2"
                  value="' . rtrim($row['adresregel2']) . '"
                  maxlength="100">
               <span class="icon is-small is-left">
               <i class="fas fa-map-marked-alt"></i>
               </span>
            </p>
         </div>
      </div>
   </div>
   <div class="columns">
      <div class="column is-half">
         <div class="field">
            <label for="postcode" class="label">Uw postcode: *</label>
            <div class="control has-icons-left">
               <input class="input is-primary" type="text" name="postcode"
                  value="' . rtrim($row['postcode']) . '"
                  maxlength="20" required>
               <span class="icon is-small is-left">
               <i class="fas fa-map-marked-alt"></i>
               </span>
            </div>
         </div>
      </div>
      <div class="column is-half">
         <div class="field">
            <label for="plaatsnaam" class="label">Uw plaatsnaam: *</label>
            <div class="control has-icons-left">
               <input class="input is-primary" type="text" name="plaatsnaam"
                  value="' . rtrim($row['plaatsnaam']) . '"
                  maxlength="50" required>
               <span class="icon is-small is-left">
               <i class="fas fa-map-marked-alt"></i>
               </span>
            </div>
         </div>
      </div>
   </div>
   <div class="columns">
      <div class="column">
         <div class="field">
            <label for="land" class="label">Uw land: *</label>
            <div class="control has-icons-left">
               <span class="select">
                  <select name="land" class="input is-primary">
                    <!--Geen idee hoe je de gekozen value hier neerzet en kan laten aanpassen-->
                     <option value="Nederland">Nederland</option>
                     <option value="België">België</option>
                     <option value="Luxemburg">Luxemburg</option>
                  </select>
               </span>
               <span class="icon is-small is-left">
               <i class="fas fa-globe"></i>
               </span>
            </div>
         </div>
      </div>
   </div>
   <div class="notification is-warning">
    Let op! Het land altijd correct selecteren A.U.B.
    </div>
    
   <br>
   <!--                    Persoonlijk-->
   <div class="columns">
      <div class="column is-half">
         <div class="field">
            <label for="birthdate" class="label">Uw geboortedatum: *</label>
            <p class="control has-icons-left">
               <input class="input is-primary" type="text" name="birthdate"
                  value="' . rtrim($row['geboorteDag']) . '"
                  maxlength="10" required>
               <span class="icon is-small is-left">
               <i class="far fa-calendar-alt"></i>
               </span>
            </p>
         </div>
      </div>
      <div class="column is-half">
         <div class="field">
            <label for="email" class="label">Uw email: *</label>
            <p class="control has-icons-left">
               <input class="input is-primary" type="email" name="email"
                  value="' . rtrim($row['emailadress']) . '"
                  required maxlength="50">
               <span class="icon is-small is-left">
               <i class="fas fa-envelope"></i>
               </span>
            </p>
         </div>
      </div>
   </div>
   <br>
   
   <!--                    wachtwoord-->
      <div class="field">
         <label for="wachtwoordregel1" class="label">Uw wachtwoord: *</label>
         <div class="control has-icons-left">
            <input class="input is-primary" type="password" name="wachtwoordregel1"
               id="wachtwoordregel1"
               placeholder="********"
               oninput="" minlength="8"
               required>
            <span class="icon is-small is-left">
            <i class="fas fa-key"></i>
            </span>
            <p class="help">Vul uw wachtwoord in om uw gegevens te wijzigen</p>
         </div>
         <br>
   
   <br>
   <!--                    Final buttons -->
   
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

<br>
<br>

<!-- DELETE USER DATA BUTTON -->
<h2 class="title is-2 has-text-centered is-marginless">Uw account verwijderen</h2>
<div class="column has-text-centered">
    <a href="gegevensVerwijderen.php" class="button is-danger">
    Klik hier om uw account te verwijderen
    </a>
 </div>
                           ';
                }; ?>
                    <!--html user-->
                    <h1 class="title is-1 has-text-centered">Mijn gegevens</h1>
                    <h3 class="subtitle is-size-5 has-text-centered">Hier kunt u uw gegevens bekijken en
                        aanpassen</h3>

                    <?= $profielAanpassen ?>

                <?php } ?>

            </div>
        </div>

    </div>
</section>
<br>


<?php include "includes/footer.php" ?>
