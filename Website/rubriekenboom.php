<?php
$siteTitle = "Rubrieken";
include 'PHP/dhb.php';
$dbh = connectToDatabase();
$rubriekenLijst = "";
$titel = "";
$count = 0;

//$sql = ""

$sql = "select * from rubriek ORDER BY volgnr, Rubriek  asc";
$data = $dbh->query($sql);

//while($record =$data ->fetch()){
//    if($record['Rubriek'] == NULL){
//        $rubriekenLijst .= "<p class='link title is-8'> <a href='#'>{$record['rubrieknaam']}</a></p>";
//    }elseif($record['Rubriek'] < 3){
//    $rubriekenLijst .= "<p class='link title is-5'><a href='#'>{$record['rubrieknaam']}</a></p>";
//    }
//
//}
while ($record = $data->fetch()) {
//
//    if($record['Rubriek'] == NULL) {
//        $titel = "<p class='link title is-8'> <a href='#'>{$record['rubrieknaam']}</a></p>";
//    }
//    if($count == $record['Rubriek']) {
//        $rubriekenLijst .= $titel;
//        $rubriekenLijst .= "<p class='link title is-5'><a href='#'>{$record['rubrieknaam']}</a></p>";
//        $count = $count+1;
//    }else{
//        $rubriekenLijst .= "<p class='link title is-5'><a href='#'>{$record['rubrieknaam']}</a></p>";
//    }

}

?>

<?php include "includes/head.php" ?>
<?php include "includes/header.html" ?>

<section>
    <div class="container">
        <?= $rubriekenLijst ?>
    </div>


</section>

<?php include "includes/footer.html" ?>