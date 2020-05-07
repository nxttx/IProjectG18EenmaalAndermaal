<?php
$siteTitle = "Rubrieken";
include 'php/dbh.php';
$dbh = connectToDatabase();
$rubriekenLijst = "";
$titel = "";
$count = 0;

// $email = $_POST['email'];
// $password = $_POST['password'];


$sql = "select * from rubriek ORDER BY volgnr, Rubriek  asc";

foreach ($dbh->query($sql) as $row) {
    //print_r($row);
    if($row['Rubriek'] == NULL){
        $rubriekenLijst .= "<p class='link title is-8'> <a href='#'>{$row['rubrieknaam']}</a></p>";
    }else{
        $rubriekenLijst .= "<p class='link title is-5'><a href='#'>{$row['rubrieknaam']}</a></p>";
    }

//    if ($row['Rubriek'] == NULL) {
//        $titel = "<p class='link title is-8'> <a href='#'>{$row['rubrieknaam']}</a></p>";
//    }
//    if ($count == $row['Rubriek']) {
//        $rubriekenLijst .= $titel;
//        $rubriekenLijst .= "<p class='link title is-5'><a href='#'>{$row['rubrieknaam']}</a></p>";
//        $count = $count + 1;
//    } else {
//        $rubriekenLijst .= "<p class='link title is-5'><a href='#'>{$row['rubrieknaam']}</a></p>";
//    }
}


//while ($record = $data->fetch()) {
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
//}

?>

<?php include "includes/head.php" ?>
<?php include "includes/header.html" ?>

    <section>
        <div class="container">
            <?= $rubriekenLijst ?>
        </div>


    </section>

<?php include "includes/footer.html" ?>