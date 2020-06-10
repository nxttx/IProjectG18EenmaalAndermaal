<?php include "../php/dbh.php" ?>
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

$count=0;
foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $rubriekenLijst .= '<p class="link"><a href="/search.php?searchInput=&category=' .$row['rubrieknummer'] . '" target="_top">' . $row['rubrieknaam'] . '</a></p>'; //deze link aanpassen voor zoeken
    $count++;
}
if($count <1){
    $rubriekenLijst .= '<p class="link"><a href="/search.php?searchInput=&category=' . $_GET['rk'] . '" target="_top">' . $categorie . '</a></p>'; //deze link aanpassen voor zoeken
}


?>
<!DOCTYPE html>
<html lang="nl" style="background-color: white">
<head>
    <meta charset="UTF-8">
    <title>EenmaalAndermaal | <?=$siteTitle?> </title>
    <link rel="stylesheet" href="../css/mystyles.css">
    <link href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/customstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <section class="has-background-white">
        <div class="container">
                    <h2 class="title is-2  has-text-centered">Subcategorie</h2>
                    <h3 class="subtitle is-5 has-text-centered"><?=$categorie?></h3>
                    <?= $rubriekenLijst ?>

        </div>
    </section>

</body>
</html>

