<?php
//"select * from VoorwerpInRubriek"

$sth = $dbh->prepare('SELECT RubriekOpLaagsteNiveau FROM VoorwerpInRubriek where voorwerp = :rubriek');
$sth->bindParam(':rubriek', $pn);
$pn = $productNummer;
$sth->execute();
foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $rubriek = $row['RubriekOpLaagsteNiveau'];
}

$sth = $dbh->prepare('SELECT Rubriek,rubrieknaam FROM rubriek where rubrieknummer = :rubriek');
$sth->bindParam(':rubriek', $rubrieknr);
$rubrieknr = $rubriek;
$sth->execute();
foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $SubSubNaam = $row['rubrieknaam'];
    echo
    $SubSubRubriek = $row['Rubriek'];
}

$sth = $dbh->prepare('SELECT Rubriek,rubrieknaam FROM rubriek where rubrieknummer = :rubriek');
$sth->bindParam(':rubriek', $pn);
$pn = $SubSubRubriek;
$sth->execute();
foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $SubNaam = $row['rubrieknaam'];
    $SubRubriek = $row['Rubriek'];
}

$sth = $dbh->prepare('SELECT Rubriek,rubrieknaam FROM rubriek where rubrieknummer = :rubriek');
$sth->bindParam(':rubriek', $pn);
$pn = $SubRubriek;
$sth->execute();
foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $Naam = $row['rubrieknaam'];
    $Rubriek = $row['Rubriek'];
}

$breadcrumb = $Naam .'\ '. $SubNaam.'\ '. $SubSubNaam;
?>
<section>
    <div class="notification is-warning"><?=$breadcrumb?></div>
</section>
