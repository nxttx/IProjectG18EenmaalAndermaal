<?php include "php/dbh.php" ?>
<?php
$dbh = connectToDatabase();
$siteTitle = "";
$rubriekenLijst ="";
$categorie ="";

//get type head of category for title
$sth = $dbh->prepare('SELECT rubrieknaam FROM rubriek WHERE rubrieknummer = :rubriek');
$sth->bindParam(':rubriek', $_GET['rk']);
$sth->execute();

foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $siteTitle = "Categoriën | " . $row['rubrieknaam'];
    $categorie = $row['rubrieknaam'];
}

// get sub sub categories for the additional links
$sth = $dbh->prepare('SELECT * FROM rubriek WHERE Rubriek = :rubriek');
$sth->bindParam(':rubriek', $_GET['rk']);
$sth->execute();

foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $rubriekenLijst .= '<p class="link"><a href="###?rk=' .$row['rubrieknummer'] . '">' . $row['rubrieknaam'] . '</a></p>';
}



?>

<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
    <section>
        <div class="container">
            <br>

            <div class="card ">
                <div class="card-content">
                    <h2 class="title is-2  has-text-centered">Categorie |  <?=$categorie?> </h2>
                    <?= $rubriekenLijst ?>
                </div>
            </div>
            <br>

        </div>
    </section>

<?php include "includes/footer.html" ?>
