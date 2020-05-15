<?php
$siteTitle = "Categorieën"

?>
<?php include "php/dbh.php" ?>
<?php
$dbh = connectToDatabase();
$rubriekenLijst = "";

$countH1 = 0;
$header1 = array();

$count = 0;
//H1
$sql = "SELECT COUNT(rubrieknummer)as 'tel' FROM rubriek WHERE Rubriek IS NULL;";
foreach ($dbh->query($sql) as $row) {
    $countH1 = $row['tel'];
}

$sql = "SELECT (rubrieknaam) as 'h1 naam' FROM rubriek WHERE Rubriek IS NULL;";
foreach ($dbh->query($sql) as $row) {
    $header1[$count] = $row['h1 naam'];
    $count++;
}


//MAIN CODE:
for ($a = 0; $a <$countH1; $a++) {
    $rubriekenLijst .= "<br><h2 class='link title is-8 is-marginless'>" . $header1[$a] . "</h2>";
    $sql = "SELECT (rubrieknaam) as 'h2 naam', (rubrieknummer) as nummer FROM rubriek WHERE Rubriek = $a+1;";
    foreach ($dbh->query($sql) as $row) {
        $rubriekenLijst .= '<p class="link"><a href="categorieensubsub.php?rk=' .$row['nummer'] . '">' . $row['h2 naam'] . '</a></p>';
    }
}


?>

<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
    <section>
        <div class="container">
            <br>

            <div class="card ">
                <div class="card-content">
                    <h2 class="title is-2  has-text-centered">Categorieën</h2>
                    <?= $rubriekenLijst ?>
                </div>

            </div>
            <br>

        </div>
    </section>

<?php include "includes/footer.html" ?>

