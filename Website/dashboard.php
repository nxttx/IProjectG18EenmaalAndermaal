<!--Gebruik de code in deze pagina om een nieuwe pagina aan te maken. Op deze houden we overal dezelfde stijl -->

<?php
$siteTitle = "Dashboard ";
?>

<?php include "php/dbh.php" ?>


<?php
$dbh = connectToDatabase();
$titlBox = "";
$gebruiker = "";
$antaal ="";
$dashboard = "";
$niewe_Klanten = "";
$verkoper = "";
$koper = "";
$gegevens_Klant = "";
$veilingen = "";
$index = "";

$false = 0;
$true = 1;
$ja = "wel";
$niet = "niet";
$nee = "nee";




function count_aantal_gebruikers($geval, $antaal)
{

    include_once("php/dbh.php");
    $dbh = connectToDatabase();
    $sql = "SELECT COUNT(gebruikersnaam) as aantal FROM gebruiker  WHERE is_geverifieerd =? ";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$geval]);
    foreach ($stmt->fetchAll() as $row) {
        $antaal .= $row['aantal'];
        echo $antaal;
    }
}

function count_aantal_veilingen($geval, $antaal)
{
    include_once("php/dbh.php");
    $dbh = connectToDatabase();
    $sql = "SELECT COUNT(voorwerpnummer) as aantal FROM voorwerp  WHERE veilinggesloten = :veilinggesloten ";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([
        ':veilinggesloten'=>$geval
    ]);
    foreach ($stmt->fetchAll() as $row) {
        $antaal .= $row['aantal'];
        echo $antaal;
    }
}


function accepteer_Gebruiker($gebruikersnaam){
    include_once("php/dbh.php");
    $dbh = connectToDatabase();
    $true = 1;
    try {
        $sql = 'UPDATE gebruiker
                SET is_geverifieerd = :is_geverifieerd
                WHERE gebruikersnaam = :gebruikersnaam';
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$true, $gebruikersnaam]);


    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function verwijder_Gebruiker($gebruikersnaam){
    include_once("php/dbh.php");
    $dbh = connectToDatabase();
    try {
        $sql = 'DELETE FROM gebruiker
                WHERE gebruikersnaam = :gebruikersnaam';
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$gebruikersnaam]);


    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function uodate_voorwerp($geval, $voorwerpnummer){
    include_once("php/dbh.php");
    $dbh = connectToDatabase();
    try {
        $sql = 'UPDATE voorwerp
                SET is_geblokkeerd = :is_is_geblokkeerd
                WHERE voorwerpnummer = :voorwerpnummer';
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$geval, $voorwerpnummer]);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}

function delete_koper($koper){
    include_once("php/dbh.php");
    $dbh = connectToDatabase();
    try {
        $sql = 'UPDATE voorwerp
                SET koper = null
                WHERE koper = :gebruikersnaam';
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$koper]);

        $sql = "DELETE FROM gebruikerstelefoon
                WHERE gebruiker = :gebruiker";

        $stmt = $dbh->prepare($sql);
        $stmt->execute([$koper]);

        $sql = "DELETE FROM gebruiker
                WHERE gebruikersnaam = :gebruikersnaam ";

        $stmt = $dbh->prepare($sql);
        $stmt->execute([$koper]);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function delete_verkoper($verkoper){
    include_once("php/dbh.php");
    $dbh = connectToDatabase();
    try {
        $sql = 'DELETE FROM bod
                WHERE gebruiker =:gebruiker';
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$verkoper]);

        $sql = "DELETE FROM voorwerp
                WHERE verkoper =:verkoper";

        $stmt = $dbh->prepare($sql);
        $stmt->execute([$verkoper]);


        $sql = "DELETE FROM gebruikerstelefoon
                WHERE gebruiker =:gebruiker";

        $stmt = $dbh->prepare($sql);
        $stmt->execute([$verkoper]);

        $sql = "DELETE FROM gebruiker
                WHERE gebruikersnaam =:gebruikersnaam ";

        $stmt = $dbh->prepare($sql);
        $stmt->execute([$verkoper]);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}










if(isset($_POST['dashboard'])){

    $dashboard .= "<div class=\"box\">
                    <iframe width='1000' height='541.25' 
                    src='https://app.powerbi.com/reportEmbed?reportId=d25a271e-ac3a-4a12-b374-3166a8d2d2a4&autoAuth=true&ctid=5d73e7b7-b3e1-4d00-b303-056140b2a3b4&config=eyJjbHVzdGVyVXJsIjoiaHR0cHM6Ly93YWJpLWV1cm9wZS1ub3J0aC1iLXJlZGlyZWN0LmFuYWx5c2lzLndpbmRvd3MubmV0LyJ9' frameborder='0' allowFullScreen='true'>    
                   </iframe>
               </div>
                   ";
    $index = $dashboard;
}elseif(isset($_POST['new'])) {
    $titlBox = "Nieuwe Klanten";

        // niewe kanten
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
        $false = 0;
        $stmt->execute([$false]);
        foreach ($stmt->fetchAll() as $row) {
            $niewe_Klanten .= "
                      <form class='field' method='post'>
                        <tr>
                            
                            <td><button class='button is-white' name='gebruiker' type='submit'> " . $row['gebruikersnaam'] . "</button></td>
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


        $index = $niewe_Klanten;

}elseif(isset($_POST['akkoord'])) {

    $gebruikersnaam = $_POST['gebruikersnaam'];
    accepteer_Gebruiker($gebruikersnaam);

    // niewe kanten
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


    $index = $niewe_Klanten;

} elseif(isset($_POST['delete'])) {

    $gebruikersnaam = $_POST['gebruikersnaam'];

    verwijder_Gebruiker($gebruikersnaam);

    // niewe kanten
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


    $index = $niewe_Klanten;
}elseif(isset($_POST['koper'])){
    $titlBox = " Koper";

// koper.
    $koper .= "
                  <table class='table'>
                     <thead>
                        <tr>
                           <th><abbr title='Gebruikers_Naam'>Gebruiker Name</abbr></th>
                           <th><abbr title='Emailadres'>Email Address</abbr></th>
                           <th>Klant Delete</th>"
    ;


    $sql = "SELECT gebruikersnaam, emailadress  FROM gebruiker WHERE is_geverifieerd =:is_geverifieerd  AND verkoper = :verkoper ";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([
        ':is_geverifieerd'=> $true,
        ':verkoper' => $nee
    ]);

    foreach ($stmt->fetchAll() as $row) {
        $koper .= "
        <form class='field' method='post'>
          <tr>
              <td><button class='button is-white' name='gebruiker' type='submit'> ".$row['gebruikersnaam']."</button></td>
                            <input type='hidden' name='gebruikersnaam' value=" . $row['gebruikersnaam'] . ">
              <td>" . $row['emailadress'] . "</td>
              <td><button class='button is-primary'  onclick='pres()' name='koper_delete' type='submit'>Delete</button></td>
          </tr>
        </form>
";

    }
    $koper .= "
                     </tr>
                   </thead>
                </table>
             ";


    $index = $koper;
}elseif(isset($_POST['koper_delete'])) {

    $gebruikersnaam = $_POST['gebruikersnaam'];
    delete_koper($gebruikersnaam);

    $titlBox = " Koper";

// koper.
    $koper .= "
                  <table class='table'>
                     <thead>
                        <tr>
                           <th><abbr title='Gebruikers_Naam'>Gebruiker Name</abbr></th>
                           <th><abbr title='Emailadres'>Email Address</abbr></th>
                           <th>Klant Delete</th>"
    ;


    $sql = "SELECT gebruikersnaam, emailadress  FROM gebruiker WHERE is_geverifieerd =:is_geverifieerd  AND verkoper = :verkoper ";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([
        ':is_geverifieerd'=> $true,
        ':verkoper' => $nee
    ]);

    foreach ($stmt->fetchAll() as $row) {
        $koper .= "
        <form class='field' method='post'>
          <tr>
              <td><button class='button is-white' name='gebruiker' type='submit'> ".$row['gebruikersnaam']."</button></td>
                            <input type='hidden' name='gebruikersnaam' value=" . $row['gebruikersnaam'] . ">
              <td>" . $row['emailadress'] . "</td>
              <td><button class='button is-primary' onclick='pres()' name='koper_delete' type='submit'>Delete</button></td>
          </tr>
        </form>
";

    }
    $koper .= "
                     </tr>
                   </thead>
                </table>
             ";


    $index = $koper;
}elseif(isset($_POST['verkoper'])) {
    $titlBox = " Verkoper";

// verkoper.
    $verkoper .= "
                  <table class='table'>
                     <thead>
                        <tr>
                           <th><abbr title='Gebruikers_Naam'>Gebruiker Name</abbr></th>
                           <th><abbr title='Emailadres'>Email Address</abbr></th>
                           <th>Klant Delete</th>"
                           ;


    $sql = "SELECT gebruikersnaam, emailadress  FROM gebruiker WHERE is_geverifieerd =:is_geverifieerd  AND verkoper = :verkoper ";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([
           ':is_geverifieerd'=> $true,
           ':verkoper' => $ja
    ]);

    foreach ($stmt->fetchAll() as $row) {
        $verkoper .= "
        <form class='field' method='post'>
          <tr>
              <td><button class='button is-white' name='gebruiker' type='submit'> ".$row['gebruikersnaam']."</button></td>
                            <input type='hidden' name='gebruikersnaam' value=" . $row['gebruikersnaam'] . ">
              <td>" . $row['emailadress'] . "</td>
              <td><button class='button is-primary' onclick='pres()' name='verkoper_delete' type='submit'>Delete</button></td>
          </tr>
        </form>
";

    }
    $verkoper .= "
                     </tr>
                   </thead>
                </table>
             ";


    $index = $verkoper;
}elseif(isset($_POST['verkoper_delete'])){

    $gebruikersnaam = $_POST['gebruikersnaam'];

    delete_verkoper($gebruikersnaam);

    $titlBox = " Verkoper";

    $verkoper .= "
                  <table class='table'>
                     <thead>
                        <tr>
                           <th><abbr title='Gebruikers_Naam'>Gebruiker Name</abbr></th>
                           <th><abbr title='Emailadres'>Email Address</abbr></th>
                           <th>Klant Delete</th>"
    ;


    $sql = "SELECT gebruikersnaam, emailadress  FROM gebruiker WHERE is_geverifieerd =:is_geverifieerd  AND verkoper = :verkoper ";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([
        ':is_geverifieerd'=> $true,
        ':verkoper' => $ja
    ]);

    foreach ($stmt->fetchAll() as $row) {
        $verkoper .= "
        <form class='field' method='post'>
          <tr>
              <td><button class='button is-white' name='gebruiker' type='submit'> ".$row['gebruikersnaam']."</button></td>
                            <input type='hidden' name='gebruikersnaam' value=" . $row['gebruikersnaam'] . ">
              <td>" . $row['emailadress'] . "</td>
              <td><button class='button is-primary' onclick='pres()' name='verkoper_delete' type='submit'>Delete</button></td>
          </tr>
        </form>
";

    }
    $verkoper .= "
                     </tr>
                   </thead>
                </table>
             ";
    $index = $verkoper;
}else{

    $dashboard .= "<div class=\"box\">
                    <iframe width='1000' height='541.25' 
                    src='https://app.powerbi.com/reportEmbed?reportId=d25a271e-ac3a-4a12-b374-3166a8d2d2a4&autoAuth=true&ctid=5d73e7b7-b3e1-4d00-b303-056140b2a3b4&config=eyJjbHVzdGVyVXJsIjoiaHR0cHM6Ly93YWJpLWV1cm9wZS1ub3J0aC1iLXJlZGlyZWN0LmFuYWx5c2lzLndpbmRvd3MubmV0LyJ9' frameborder='0' allowFullScreen='true'>    
                   </iframe>
               </div>
                   ";

    $index = $dashboard;
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

if(isset($_POST['veilingen'])){
    $titlBox = "Veilingen";

    // veiligen
    $veilingen .= "<form method='post' class='is-half'>
                    <div class='field has-addons'>
                        <div class=\"control\">
                            <label>                      
                                <input class=\"input is-primary\" placeholder=\"Zoeken...\" value='' type=\"text\" name=\"searchInput\"><br>                          
                            </label>
                        </div>
                        <button class='button is-primary' name='zoek' type='submit'><i class=\"fas fa-search\"></i></button>                     
                    </div>
                </form>
                <br>";

    $veilingen .= "
                <div class='columns is-multiline is-'>
                                        <table class='table'>
                                            <thead>
                                            <tr>
                                              <th><abbr title='titel'>Titel</abbr></th>
                                              <th><abbr title='startprijs'>Startprijs</abbr></th>   
                                              <th><abbr title='plaatsnaam'>Plaatsnaam</abbr></th> 
                                              <th><abbr title='looptijdbeginDag'>Looptijd begin</abbr></th>   
                                              <th><abbr title='verzendkosten'>Verzendkosten</abbr></th>  
                                              <th><abbr title='verkoper'>Verkoper</abbr></th>   
                                              <th><abbr title='looptijdeindeDag'>Looptijd Eind</abbr></th>                                          
                                              <th>
                                                 <div class='field is-grouped is-grouped-right'>
                                                    <p class='control'>
                                                        Blokeren
                                                    </p>
                                                 </div>
                                               </th> 
                                            </tr>

";


    $sql = "SELECT voorwerpnummer, titel, startprijs, plaatsnaam, looptijdbeginDag, verzendkosten,  verkoper, looptijdeindeDag , is_geblokkeerd
        FROM voorwerp WHERE veilinggesloten = :veilinggesloten ORDER BY voorwerpnummer DESC";
    $stmt = $dbh->prepare($sql);

    $stmt->execute([
        ':veilinggesloten' => $niet
    ]);
    foreach ($stmt->fetchAll() as $row) {
        $veilingen .= "
                     <form class='field' method='post'>

                        <tr>
                            <input type='hidden' name='voorwerpnummer' value=" .$row['voorwerpnummer']. ">
                            <td>" .$row['titel']. "</td>
                            <td>" . $row['startprijs'] . "</td>  
                            <td>" . $row['plaatsnaam'] . "</td> 
                            <td>" . $row['looptijdbeginDag'] . "</td> 
                            <td>" . $row['verzendkosten'] . "</td> 
                            <td>" . $row['verkoper'] . "</td> 
                            <td>" . $row['looptijdeindeDag'] . "</td>";


        if(rtrim($row['is_geblokkeerd']) == $true) {
            $veilingen .= "
                            <td>    
                                <button class='button is-primary' onclick='pres()' name='deblokkeren' type='submit'>Deblokkeren</button>
                            </td>";

        }else{
            $veilingen .= "
                            <td>    
                                <button class='button is-primary' onclick='pres()' name='blokkeren' type='submit'>Blokkeren</button>
                            </td>";
        }


        $veilingen .= "     </tr>
                      </form>
";

    }
    $veilingen .= "
                </thead>
              </table>
             </div>
";
    $index = $veilingen;
}elseif(isset($_POST['zoek'])) {



    $zoek_value = $_POST['searchInput'];

    // veiligen
    $veilingen .= "<form method='post' class='is-half'>
                    <div class='field has-addons'>
                        <div class=\"control\">
                            <label>                      
                                <input class=\"input is-primary\" placeholder=\"Zoeken...\" value='' type=\"text\" name=\"searchInput\"><br>                          
                            </label>
                        </div>
                        <button class='button is-primary' name='zoek' type='submit'><i class=\"fas fa-search\"></i></button>                     
                    </div>
                </form>
                <br>";


    $veilingen .= "
                <div class='columns is-multiline is-'>
                                        <table class='table'>
                                            <thead>
                                            <tr>
                                              <th><abbr title='titel'>Titel</abbr></th>
                                              <th><abbr title='startprijs'>Startprijs</abbr></th>   
                                              <th><abbr title='plaatsnaam'>Plaatsnaam</abbr></th> 
                                              <th><abbr title='looptijdbeginDag'>Looptijd begin</abbr></th>   
                                              <th><abbr title='verzendkosten'>Verzendkosten</abbr></th>  
                                              <th><abbr title='verkoper'>Verkoper</abbr></th>   
                                              <th><abbr title='looptijdeindeDag'>Looptijd Eind</abbr></th>                                          
                                              <th>
                                                 <div class='field is-grouped is-grouped-right'>
                                                    <p class='control'>
                                                        Blokeren
                                                    </p>
                                                 </div>
                                               </th> 
                                            </tr>

";


    $sql = "SELECT voorwerpnummer, titel, startprijs, plaatsnaam, looptijdbeginDag, verzendkosten,  verkoper, looptijdeindeDag , is_geblokkeerd
        FROM voorwerp WHERE veilinggesloten = :veilinggesloten AND (titel LIKE :titel OR beschrijving LIKE :beschrijving) ORDER BY voorwerpnummer DESC";
    $stmt = $dbh->prepare($sql);

    $stmt->execute([
        ':veilinggesloten' => $niet,
        ':titel'=> '%'.$zoek_value.'%',
        ':beschrijving' => '%'.$zoek_value.'%'


    ]);
    foreach ($stmt->fetchAll() as $row) {
        $veilingen .= "
                      <form class='field' method='post'>
                        <tr>
                            <input type='hidden' name='voorwerpnummer' value=" .$row['voorwerpnummer']. ">
                            <td>" .$row['titel']. "</td>
                            <td>" . $row['startprijs'] . "</td>  
                            <td>" . $row['plaatsnaam'] . "</td> 
                            <td>" . $row['looptijdbeginDag'] . "</td> 
                            <td>" . $row['verzendkosten'] . "</td> 
                            <td>" . $row['verkoper'] . "</td> 
                            <td>" . $row['looptijdeindeDag'] . "</td>";


        if(rtrim($row['is_geblokkeerd']) == $true) {
            $veilingen .= "
                            <td>    
                                <button class='button is-primary' onclick='pres()' name='deblokkeren' type='submit'>Deblokkeren</button>
                            </td>";

        }else{
            $veilingen .= "
                            <td>    
                                <button class='button is-primary' onclick='pres()' name='blokkeren' type='submit'>Blokkeren</button>
                            </td>";
        }


        $veilingen .= "     </tr>
                      </form>
";

    }
    $veilingen .= "
                </thead>
              </table>
             </div>
";

    $index = $veilingen;

}elseif(isset($_POST['blokkeren'])) {
    $voorwerpnummer = $_POST['voorwerpnummer'];
    uodate_voorwerp($true, $voorwerpnummer);



        // veiligen
        $veilingen .= "<form method='post' class='is-half'>
                    <div class='field has-addons'>
                        <div class=\"control\">
                            <label>                      
                                <input class=\"input is-primary\" placeholder=\"Zoeken...\" value='' type=\"text\" name=\"searchInput\"><br>                          
                            </label>
                        </div>
                        <button class='button is-primary' name='zoek' type='submit'><i class=\"fas fa-search\"></i></button>                     
                    </div>
                </form>
                <br>";


        $veilingen .= "
                <div class='columns is-multiline is-'>
                                        <table class='table'>
                                            <thead>
                                            <tr>
                                              <th><abbr title='titel'>Titel</abbr></th>
                                              <th><abbr title='startprijs'>Startprijs</abbr></th>   
                                              <th><abbr title='plaatsnaam'>Plaatsnaam</abbr></th> 
                                              <th><abbr title='looptijdbeginDag'>Looptijd begin</abbr></th>   
                                              <th><abbr title='verzendkosten'>Verzendkosten</abbr></th>  
                                              <th><abbr title='verkoper'>Verkoper</abbr></th>   
                                              <th><abbr title='looptijdeindeDag'>Looptijd Eind</abbr></th>                                          
                                              <th>
                                                 <div class='field is-grouped is-grouped-right'>
                                                    <p class='control'>
                                                        Blokeren
                                                    </p>
                                                 </div>
                                               </th> 
                                            </tr>

";


        $sql = "SELECT voorwerpnummer, titel, startprijs, plaatsnaam, looptijdbeginDag, verzendkosten,  verkoper, looptijdeindeDag , is_geblokkeerd
        FROM voorwerp WHERE veilinggesloten = :veilinggesloten ORDER BY voorwerpnummer DESC";
        $stmt = $dbh->prepare($sql);

        $stmt->execute([
            ':veilinggesloten' => $niet
        ]);
        foreach ($stmt->fetchAll() as $row) {
            $veilingen .= "
                      <form class='field' method='post'>
                        <tr>
                            <input type='hidden' name='voorwerpnummer' value=" . $row['voorwerpnummer'] . ">
                            <td>" . $row['titel'] . "</td>
                            <td>" . $row['startprijs'] . "</td>  
                            <td>" . $row['plaatsnaam'] . "</td> 
                            <td>" . $row['looptijdbeginDag'] . "</td> 
                            <td>" . $row['verzendkosten'] . "</td> 
                            <td>" . $row['verkoper'] . "</td> 
                            <td>" . $row['looptijdeindeDag'] . "</td>";


            if (rtrim($row['is_geblokkeerd']) == $true) {
                $veilingen .= "
                            <td>    
                                <button class='button is-primary' onclick='pres()' name='deblokkeren' type='submit'>Deblokkeren</button>
                            </td>";

            } else {
                $veilingen .= "
                            <td>    
                                <button class='button is-primary' onclick='pres()' name='blokkeren' type='submit'>Blokkeren</button>
                            </td>";
            }


            $veilingen .= "     </tr>
                      </form>
";

        }
        $veilingen .= "
                </thead>
              </table>
             </div>
             
";

}elseif(isset($_POST['deblokkeren'])) {

    $voorwerpnummer = $_POST['voorwerpnummer'];
    uodate_voorwerp($false, $voorwerpnummer);

    // veiligen
    $veilingen .= "<form method='post' class='is-half'>
                    <div class='field has-addons'>
                        <div class=\"control\">
                            <label>                      
                                <input class=\"input is-primary\" placeholder=\"Zoeken...\" value='' type=\"text\" name=\"searchInput\"><br>                          
                            </label>
                        </div>
                        <button class='button is-primary' name='zoek' type='submit'><i class=\"fas fa-search\"></i></button>                     
                    </div>
                </form>
                <br>";

    $veilingen .= "
                <div class='columns is-multiline is-'>
                                        <table class='table'>
                                            <thead>
                                            <tr>
                                              <th><abbr title='titel'>Titel</abbr></th>
                                              <th><abbr title='startprijs'>Startprijs</abbr></th>   
                                              <th><abbr title='plaatsnaam'>Plaatsnaam</abbr></th> 
                                              <th><abbr title='looptijdbeginDag'>Looptijd begin</abbr></th>   
                                              <th><abbr title='verzendkosten'>Verzendkosten</abbr></th>  
                                              <th><abbr title='verkoper'>Verkoper</abbr></th>   
                                              <th><abbr title='looptijdeindeDag'>Looptijd Eind</abbr></th>                                          
                                              <th>
                                                 <div class='field is-grouped is-grouped-right'>
                                                    <p class='control'>
                                                        Blokeren
                                                    </p>
                                                 </div>
                                               </th> 
                                            </tr>

";


    $sql = "SELECT voorwerpnummer, titel, startprijs, plaatsnaam, looptijdbeginDag, verzendkosten,  verkoper, looptijdeindeDag , is_geblokkeerd
        FROM voorwerp WHERE veilinggesloten = :veilinggesloten ORDER BY voorwerpnummer DESC";
    $stmt = $dbh->prepare($sql);

    $stmt->execute([
        ':veilinggesloten' => $niet
    ]);
    foreach ($stmt->fetchAll() as $row) {
        $veilingen .= "
                      <form class='field' method='post'>
                        <tr>
                            <input type='hidden' name='voorwerpnummer' value=" .$row['voorwerpnummer']. ">
                            <td>" .$row['titel']. "</td>
                            <td>" . $row['startprijs'] . "</td>  
                            <td>" . $row['plaatsnaam'] . "</td> 
                            <td>" . $row['looptijdbeginDag'] . "</td> 
                            <td>" . $row['verzendkosten'] . "</td> 
                            <td>" . $row['verkoper'] . "</td> 
                            <td>" . $row['looptijdeindeDag'] . "</td>";


        if(rtrim($row['is_geblokkeerd']) == $true) {
            $veilingen .= "
                            <td>    
                                <button class='button is-primary' onclick='pres()' name='deblokkeren' type='submit'>Deblokkeren</button>
                            </td>";

        }else{
            $veilingen .= "
                            <td>    
                                <button class='button is-primary' onclick='pres()' name='blokkeren' type='submit'>Blokkeren</button>
                            </td>";
        }


        $veilingen .= "     </tr>
                      </form>
";

    }
    $veilingen .= "
                </thead>
              </table>
             </div>
";

    $index = $veilingen;
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
        <script>
            function pres() {
                alert("I am an alert box!");
            }
        </script>
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
                                                            <a class="button is-primary is-inverted ">Klanten
                                                            </a>
                                                            <ul>
                                                                <li>
                                                                    <button class="button is-primary is-inverted " type="submit"
                                                                            name="new">Nieuwe Klanten
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button class="button is-primary is-inverted " type="submit"
                                                                        name="verkoper">Verkoper
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button class="button is-primary is-inverted " type="submit"
                                                                            name="koper">Koper
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    <li>
                                                        <button class="button is-primary is-inverted " type="submit"
                                                                name="veilingen">Veilingen
                                                        </button>
                                                    </li>
                                                </ul>
                                            </form>
                                        </nav>
                                    </aside>
                                    <main class="column">
                                        <p id="demo"></p>
                                        <div class="level">
                                            <div class="level-left">
                                                <div class="level-item">
                                                    <div class="title"> <?php echo $titlBox ?></div>
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
                                                                    count_aantal_gebruikers($true, $antaal); ?>
                                                                    )

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="level-item">
                                                            <div class="">
                                                                <div class="heading">Nieuwe Klanten</div>
                                                                <div class="title is-4">(

                                                                    <?php count_aantal_gebruikers($false, $antaal); ?>
                                                                    )

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="level-item">
                                                            <div class="">
                                                                <div class="heading">Gesloten veiling</div>
                                                                <div class="title is-4">(

                                                                    <?php count_aantal_veilingen($ja, $antaal); ?>
                                                                    )

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="level-item">
                                                            <div class="">
                                                                <div class="heading">Active veiling</div>
                                                                <div class="title is-4">(

                                                                    <?php count_aantal_veilingen($niet, $antaal); ?>
                                                                    )

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


                                                <?php echo $index; ?>


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