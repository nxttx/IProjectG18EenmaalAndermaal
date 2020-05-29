<!--Gebruik de code in deze pagina om een nieuwe pagina aan te maken. Op deze houden we overal dezelfde stijl -->

<?php
$siteTitle = "Dashboard ";
?>

<?php include "php/dbh.php" ?>


<?php
$dbh = connectToDatabase();
$gebruiker = "";
$antaal ="";
$niewe_Klanten = "";
$klanten = "";
$gegevens_Klant = "";
$index = "";

$false = 0;
$true = 1;




function count_aantal($geval, $aantal)
{
    include_once("php/dbh.php");
    $dbh = connectToDatabase();
    $sql = "SELECT COUNT(gebruikersnaam) as aantal FROM gebruiker  WHERE is_geverifieerd =? ";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$geval]);
    foreach ($stmt->fetchAll() as $row) {
        $aantal .= $row['aantal'];
        echo $aantal;
    }
}


$klanten .= "
                  <table class='table'>
                     <thead>
                        <tr>
                           <th><abbr title='Gebruikers_Naam'>Gebruiker Name</abbr></th>
                           <th><abbr title='Emailadres'>Email Address</abbr></th>";


$sql = "SELECT gebruikersnaam, emailadress  FROM gebruiker WHERE is_geverifieerd =?";
$stmt = $dbh->prepare($sql);
$stmt->execute([$true]);

foreach ($stmt->fetchAll() as $row) {
    $klanten .= "
        <form class='field' method='post'>
          <tr>
              <td><button class='button is-white' name='gebruiker' type='submit'> ".$row['gebruikersnaam']."</button></td>
                            <input type='hidden' name='gebruikersnaam' value=" . $row['gebruikersnaam'] . ">
              <td>" . $row['emailadress'] . "</td>
          </tr>
        </form>
";

}
$klanten .= "
                     </tr>
                   </thead>
                </table>
             ";


$niewe_Klanten = "<div class='columns is-multiline is-'>
                                        <table class='table'>
                                            <thead>
                                            <tr>
                                              <th><abbr title='Gebruikers_Naam'>Gebruiker Name</abbr></th>
                                              <th><abbr title='Emailadres'>Email Address</abbr></th>                                              
                                              <th>
                                                 <div class='field is-grouped is-grouped-right'>
                                                    <p class='control'>
                                                        Akkoord/Delete
                                                    </p>
                                                 </div>
                                               </th> 
                                            </tr>";

$sql = "SELECT gebruikersnaam, emailadress  FROM gebruiker WHERE is_geverifieerd =?";
$stmt = $dbh->prepare($sql);
    $false =0;
    $stmt->execute([$false]);
foreach ($stmt->fetchAll() as $row) {
    $niewe_Klanten .= "
                      <form class='field' method='post'>
                        <tr>
                            
                            <td><button class='button is-white' name='gebruiker' type='submit'> ".$row['gebruikersnaam']."</button></td>
                            <input type='hidden' name='gebruikersnaam' value=" . $row['gebruikersnaam'] . ">
                            <td>" . $row['emailadress'] . "</td>                             
                            <td>                
                                <button class='button is-primary' name='akkoord' type='submit'>Akkoord</button> |
                                <button class='button is-primary' name='delete' type='submit'>Delete</button>
                            </td>
                         </tr>
                      </form>
";

}

$niewe_Klanten .= "
                    </thead>
                 </table>
                </div>";

if (isset($_POST['klanten'])) {
    $index .= $klanten;
} elseif (isset($_POST['dashboard'])) {
    $index = $niewe_Klanten;
}else{
    $index = $niewe_Klanten;
}





if(isset($_POST['gebruiker'])){

    $gebruikersnaam = $_POST['gebruikersnaam'];

    $sql = "SELECT * FROM gebruiker
 WHERE gebruikersnaam =:gebruikersnaam";
    $sth = $dbh->prepare("$sql");
    $sth->bindParam(':gebruikersnaam', $gebruikersnaam);
    $sth->execute();

    foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $gegevens_Klant = " 
                    <form class='field' method='post'>
                        <br>
                            <label for='gebruikersnaam' class='label'>Gebruikersnaam:</label> 
                            <input class='input is-primary' type='text' name='gebruikersnaam' 
                            id='gebruikersnaam' value='" .$row['gebruikersnaam'] . "' disabled='disabled'>
                        <br> 
                        
                        <form class='field'>
                            <br>
                            <div class='columns'>
                                <div class=\"column is-half\">
                                    <div class=\"field\">
                                        <label for=\"voornaam\" class=\"label\">Voornaam:</label>
                                         <div class=\"control\">
                                           <input class='input is-primary' type='text' name='voornaam'
                                            value='" . $row['voornaam'] ."' maxlength='50' disabled=\"disabled\">
                                        </div>
                                    </div>
                                </div>
                                <div class=\"column is-half\">
                                    <div class=\"field\">
                                    <label for=\"achternaam\" class=\"label\">Achternaam:</label>
                                        <div class=\"control\">
                                        <input class=\"input is-primary\"
                                            value=\"" . $row['achternaam'] . "\"
                                            type=\"text\" name=\"achternaam\"
                                            maxlength=\"50\" disabled=\"disabled\">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--adress-->
                            <div class=\"columns\">
                                <div class=\"column is-half\">
                                    <div class=\"field\">
                                        <label for=\"adresregel1\" class=\"label\">Adres:</label>
                                         <p class=\"control has-icons-left\">
                                         <input class=\"input is-primary\" type=\"text\" name=\"adresregel1\"
                                            value=\"" . $row['adresregel1'] . "\"
                                            maxlength=\"100\" disabled=\"disabled\">
                                         <span class=\"icon is-small is-left\">
                                            <i class=\"fas fa-map-marked-alt\"></i>
                                         </span>
                                          </p>
                                    </div>
                                </div>
                                <div class=\"column is-half\">
                                    <div class=\"field\">
                                        <label for=\"adresregel2\" class=\"label\">Adres 2:</label>
                                        <p class=\"control has-icons-left\">
                                         <input class=\"input is-primary\" type=\"text\" name=\"adresregel2\"
                                                 value=\"" . $row['adresregel2'] . "\"
                                                    maxlength=\"100\" disabled=\"disabled\">
                                        <span class=\"icon is-small is-left\">
                                            <i class=\"fas fa-map-marked-alt\"></i>
                                        </span>
                                        </p>
                                    </div>
                                </div>
                            </div><div class=\"columns\">
                                <div class=\"column is-half\">
                                    <div class=\"field\">
                                         <label for=\"postcode\" class=\"label\">Postcode:</label>
                                         <div class=\"control has-icons-left\">
                                             <input class=\"input is-primary\" type=\"text\" name=\"postcode\"
                                                 value=\"" . $row['postcode'] . "\"
                                                maxlength=\"20\" disabled=\"disabled\">
                                             <span class=\"icon is-small is-left\">
                                                  <i class=\"fas fa-map-marked-alt\"></i>
                                             </span>
                                         </div>
                                    </div>
                                </div>
                                <div class=\"column is-half\">
                                     <div class=\"field\">
                                        <label for=\"plaatsnaam\" class=\"label\">Plaatsnaam: *</label>
                                        <div class=\"control has-icons-left\">
                                             <input class=\"input is-primary\" type=\"text\" name=\"plaatsnaam\"
                                                 value=\"" . $row['plaatsnaam'] . "\"
                                                maxlength=\"50\" disabled=\"disabled\">
                                             <span class=\"icon is-small is-left\">
                                             <i class=\"fas fa-map-marked-alt\"></i>
                                             </span>
                                         </div>
                                     </div>
                                </div>
                            </div><div class=\"columns\">
                                <div class=\"column is-half\">
                                    <div class=\"field\">
                                        <label for=\"land\" class=\"label\">Land:</label>
                                        <div class=\"control has-icons-left\">
                                            <input class=\"input is-primary\" type=\"text\" name=\"plaatsnaam\"
                                            value=\"" . $row['land'] . "\"
                                                maxlength=\"50\" disabled=\"disabled\">
                                              <span class=\"icon is-small is-left\">
                                                    <i class=\"fas fa-map-marked-alt\"></i>
                                              </span>
                                        </div>
                                    </div>
                                </div>
                                <div class=\"column is-half\">
                                    <div class=\"field\">
                                    <label for=\"birthdate\" class=\"label\">Geboortedatum: *</label>
                                    <p class=\"control has-icons-left\">
                                    <input class=\"input is-primary\" type=\"text\" name=\"birthdate\"
                                     value=\"" .$row['geboorteDag'] . "\"
                                        maxlength=\"10\" disabled=\"disabled\">
                                    <span class=\"icon is-small is-left\">
                                    <i class=\"far fa-calendar-alt\"></i>
                                    </span>
                                    </p>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <!--                    Persoonlijk-->
                            <div class=\"columns\">
                                <div class=\"column is-half\">
                                     <div class=\"field\">
                                        <label for=\"email\" class=\"label\">Email:</label>
                                        <p class=\"control has-icons-left\">
                                        <input class=\"input is-primary\" type=\"email\" name=\"email\"
                                            value=\"" . $row['emailadress'] . "\"
                                            required maxlength=\"50\" disabled=\"disabled\">
                                            <span class=\"icon is-small is-left\">
                                                <i class=\"fas fa-envelope\"></i>
                                            </span>
                                        </p>
                                     </div>
                                </div>
                            </div>
                        </form>
    ";
    }
    $index = $gegevens_Klant;
}

function update_Gebruiker($geval, $gebruikersnaam, $echo){
    include_once("php/dbh.php");
    $dbh = connectToDatabase();
    try {
        $sql = 'UPDATE gebruiker
                SET is_geverifieerd = :is_geverifieerd
                WHERE gebruikersnaam = :gebruikersnaam';
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$geval, $gebruikersnaam]);
        $index = $echo;

        header('Location: ../dashboard.php?');

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['akkoord'])) {

    $gebruikersnaam = $_POST['gebruikersnaam'];
    update_Gebruiker($true, $gebruikersnaam, $niewe_Klanten);


} elseif (isset($_POST['delete'])) {
    update_Gebruiker($false, $gebruikersnaam, $niewe_Klanten);
    $gebruikersnaam = $_POST['gebruikersnaam'];
}

?>

<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>


<?php if (!isset($_SESSION['user'])) { ?>
                    <h2 class="title is-3">U bent nog niet ingelogd, u wordt doorgestuurd naar de inlogpagina en login als admin AUB.</h2>
                    <h3 class="subtitle is-5">Gebeurt dit niet automatisch binnnen enkele seconden? Klik dan <a
                                href="login.php">hier.</a></h3>

                    <script>
                        setTimeout(function () {
                            window.location.href = 'login.php';
                        }, 2000)
                    </script>
<?php }elseif ($_SESSION['user']!= 'admin'){?>

                    <h2 class="title is-3">Hier kunt u terecht alleen als u de admin bent u wordt doorgestuurd naar de home pagina</h2>
                    <h3 class="subtitle is-5">Gebeurt dit niet automatisch binnnen enkele seconden? Klik dan <a
                                href="index.php">hier.</a></h3>

                    <script>
                        setTimeout(function () {
                            window.location.href = 'login.php';
                        }, 2000)
                    </script>

    <?php } else{?>


                    <section>
                        <div class="container">
                            <br>

                            <div class="card ">
                                <div class="card-content">
                                    <h2 class="title is-2  has-text-centered">Dashboard</h2>
                                </div>
                            </div>

                            <br>

                            <section>
                                <div class="container">
                                    <br>
                                    <div class="card ">
                                        <div class="card-content">
                                            <div class="section">
                                                <div class="columns">
                                                    <aside class="column is-2">
                                                        <nav class="menu">
                                                            <form class="field" method="post">
                                                                <p class="menu-label">
                                                                    ALgemeen
                                                                </p>
                                                                <ul class="menu-list">
                                                                    <li>
                                                                        <button class="button is-primary is-inverted " type="submit"
                                                                                name="dashboard">Dashboard
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button class="button is-primary is-inverted " type="submit"
                                                                                name="klanten">Klanten
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </form>
                                                        </nav>
                                                    </aside>
                                                    <main class="column">
                                                        <div class="level">
                                                            <div class="level-left">
                                                                <div class="level-item">
                                                                    <div class="title">Klanten</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="columns is-multiline">
                                                            <div class="column">
                                                                <div class="box">
                                                                    <div class="level">
                                                                        <div class="level-item">
                                                                            <div class="">
                                                                                <div class="heading">Geaccepteerde Klanten</div>
                                                                                <div class="title is-4">(
                                                                                    <?php
                                                                                    count_aantal($true, $antaal); ?>)


                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="level-item">
                                                                            <div class="">
                                                                                <div class="heading">Nieuwe Klanten</div>
                                                                                <div class="title is-4">(

                                                                                    <?php count_aantal($false, $antaal); ?>)


                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <br>
                                                        <div class="columns is-centered">
                                                            <div class="collumn"></div>
                                                            <div class="collumn">
                                                            

                                                                <?php echo "$index"; ?>


                                                            </div>
                                                            <div class="collumn"></div>
                                                        </div>
                                                    </main>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </section>
                        </div>
                    </section>
                    

                <?php }?>


<?php include "includes/footer.php" ?>