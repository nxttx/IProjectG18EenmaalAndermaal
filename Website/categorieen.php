<?php
$siteTitle = "Categorieën"

?>
<?php include "php/dbh.php" ?>
<?php
$dbh = connectToDatabase();
$rubriekenLijstDesktop = "";
$rubriekenLijstMobile = "";

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
//Desktop:
for ($a = 0; $a < $countH1; $a++) {
    $rubriekenLijstDesktop .= "<br><h2 class='link title is-8 is-marginless'>" . $header1[$a] . "</h2>";
    $sql = "SELECT (rubrieknaam) as 'h2 naam', (rubrieknummer) as nummer FROM rubriek WHERE Rubriek = $a+1;";
    foreach ($dbh->query($sql) as $row) {
        $rubriekenLijstDesktop .= '<p class="link"><a href="#top" onclick="showSubSub( ' . $row['nummer'] . ')">' . $row['h2 naam'] . '</a></p>';
    }
}

//mobile:
for ($a = 0; $a < $countH1; $a++) {
    $rubriekenLijstMobile .= "<br><h2 class='link title is-8 is-marginless'>" . $header1[$a] . "</h2>";
    $sql = "SELECT (rubrieknaam) as 'h2 naam', (rubrieknummer) as nummer FROM rubriek WHERE Rubriek = $a+1;";
    foreach ($dbh->query($sql) as $row) {
        $rubriekenLijstMobile .= '<p class="link"><a href="categorieensubsub.php?rk=' . $row['nummer'] . '">' . $row['h2 naam'] . '</a></p>';
    }
}

?>

<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
<section>
    <div class="container">
        <br>

        <div class="card">
            <div class="card-content" id="boomDesktop">

                <div class="columns">
                    <div class="column">
                        <h2 class="title is-2">Categorieën</h2>
                        <?= $rubriekenLijstDesktop ?>
                    </div>
                    <div class="column">
                        <iframe class="top" src="" scrolling="no" width="100%" height="480" id="subsubsub"
                                style="display:none;"></iframe>
                    </div>
                </div>
            </div>

            <div class="card-content" id="boomMobile">
                <h2 class="title is-2  has-text-centered">Categorieën</h2>
                <?= $rubriekenLijstMobile ?>
            </div>
        </div>
        <br>

    </div>
</section>
<script src="js/categorieën.js"></script>

<?php include "includes/footer.php" ?>

