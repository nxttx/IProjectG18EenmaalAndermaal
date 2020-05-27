<!--Gebruik de code in deze pagina om een nieuwe pagina aan te maken. Op deze houden we overal dezelfde stijl -->

<?php
$siteTitle = "Dashboard ";
?>

<?php include "php/dbh.php" ?>


<?php
$dbh = connectToDatabase();
$gebruiker = "";
$antaal_Alle_Gebruiker = "";
$antaal_Nieuwe_Gebruiker = "";
$niewe_Klanten = "";
$klanten = "";
$index = "";

$false = 0;
$true = 1;

$sql = "SELECT gebruikersnaam, emailadress  FROM gebruiker WHERE is_geverifieerd =?";
$stmt = $dbh->prepare($sql);
$stmt->execute([$true]);


$klanten .= "
             <form class=\"field\" method=\"post\">
                 <table class='table'>
                     <thead>
                        <tr>
                           <th><abbr title='Gebruikers_Naam'>Gebruiker Name</abbr></th>
                           <th><abbr title='Emailadres'>Email Address</abbr></th>";


foreach ($stmt->fetchAll() as $row) {
    $klanten .= "
          <tr>
              <td>" . $row['gebruikersnaam'] . "</td>
              <td>" . $row['emailadress'] . "</td>
          </tr>
";

}
$klanten .= "
                     </tr>
                   </thead>
                </table>
             </form>";
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
                      <form class=\"field\" method=\"post\">
                        <tr>
                            <td>" . $row['gebruikersnaam'] . "</td>
                            <td>" . $row['emailadress'] . "</td>
                            <input type='hidden' name='gebruikersnaam' value=" . $row['gebruikersnaam'] . ">
                            <td>
                                <button class=\"button is-primary\" name=\"akkoord\" type=\"submit\">Akkoord</button> |
                                <button class=\"button is-primary\" name=\"delete\" type=\"submit\">Delete</button>
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
    $index = $klanten;

} elseif (isset($_POST['dashboard'])) {
    $index = $niewe_Klanten;
}else{
    $index = $niewe_Klanten;
}


if (isset($_POST['akkoord'])) {

    $gebruikersnaam = $_POST['gebruikersnaam'];
    try {
        $sql = 'UPDATE gebruiker
                SET is_geverifieerd = :is_geverifieerd
                WHERE gebruikersnaam = :gebruikersnaam';
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$true, $gebruikersnaam]);
        $index = $niewe_Klanten;

        header('Location: ../dashboard.php');

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} elseif (isset($_POST['delete'])) {
    $gebruikersnaam = $_POST['gebruikersnaam'];
    try {
        $sql = 'UPDATE gebruiker
                SET is_geverifieerd = :is_geverifieerd
                WHERE gebruikersnaam = :gebruikersnaam';
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$false, $gebruikersnaam]);
        $index = $niewe_Klanten;
        header('Location: ../dashboard.php');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }


}

$sql = "SELECT COUNT(gebruikersnaam) as aantal FROM gebruiker  WHERE is_geverifieerd =? ";

$stmt = $dbh->prepare($sql);
$stmt->execute([$true]);
foreach ($stmt->fetchAll() as $row) {
    $antaal_Alle_Gebruiker .= $row['aantal'];
}

$sql = "SELECT COUNT(gebruikersnaam) as aantal FROM gebruiker  WHERE is_geverifieerd =? ";

$stmt = $dbh->prepare($sql);
$stmt->execute([$false]);
foreach ($stmt->fetchAll() as $row) {
    $antaal_Nieuwe_Gebruiker .= $row['aantal'];
}

?>

<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
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
                                                            <div class="title is-4">
                                                                <?php echo $antaal_Alle_Gebruiker ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="level-item">
                                                        <div class="">
                                                            <div class="heading">Nieuwe Klanten</div>
                                                            <div class="title is-4">
                                                                <?php echo $antaal_Nieuwe_Gebruiker ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php echo "$index"; ?>

                                </main>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</section>
<?php include "includes/footer.php" ?>