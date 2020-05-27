<?php
$siteTitle= "Hoofdpagina"

?>
<?php include "php/dbh.php" ?>


<?php
$dbh = connectToDatabase();
$ads = "";
$Random = "";
$day= date('d');
$month= date('m');
$year= date('Y');
    
    if($month==1){
 $mont="jan";
}
else if($month==2){
$mont="feb";
}
else if($month==3){
$mont="mar";
}
else if($month==4){
$mont="apr";
}
else if($month==5){
$mont="mei";
}
else if($month==6){
$mont="jun";
}
else if($month==7){
$mont="jul";
}
else if($month==8){
$mont="aug";
}
else if($month==9){
$mont="sept";
}
else if($month==10){
$mont="oct";
}
else if($month==11){
$mont="nov";
}
else if($month==12){
$mont="dec";
}
else {

}
$datee=$day."-".$mont."-".$year;


/*$sql = "SELECT TOP (4) V.voorwerpnummer ,V.titel, V.beschrijving, V.startprijs, V.LooptijdbeginDag, B.filenaam 
FROM Voorwerp V 
	JOIN bestand B on V.voorwerpnummer = B.voorwerp
ORDER BY views DESC";
 Old Query   */

$sql = "SELECT TOP (4) V.voorwerpnummer ,V.titel, V.beschrijving, V.startprijs, V.LooptijdbeginDag, B.filenaam 
FROM Voorwerp V 
	JOIN bestand B on V.voorwerpnummer = B.voorwerp WHERE V.looptijdeindeDag>'$datee'
ORDER BY views DESC";


foreach ($dbh->query($sql) as $row) {
    $ads .= "  <div class=\"column\">
                <div class=\"has-background-primary\">
                    <figure class=\"image objectfit-cover\">
                        <img src=\"{$row['filenaam']}\" alt=\"img\">
                    </figure>
                    <div class=\"extra-padding-1 has-background-light\">
                        <h3 class=\"title is-4 \"> {$row['titel']}  </h3>
                        <div class=\"content is-medium\">
                            {$row['beschrijving']}
                        </div>
                        <div class=\"columns has-text-centered\">
                            <div class=\"column\">
                                <div class=\"content is-medium\">
                                    	<p>&euro;{$row['startprijs']}</p>
                                </div> 
                            </div>
                            <div class=\"column\">
                                <div class=\"content is-medium\">
                                    <p> | </p>
                                </div>
                            </div>
                            <div class=\"column\">
                                <div class=\"content is-medium\">
                                    <p>{$row['LooptijdbeginDag']}</p>
                                </div>
                            </div>
                        </div>
                        <a class=\"button is-fullwidth\" href=\"product.php?pn=" . $row['voorwerpnummer'] ." \">
                            Bekijk nu!
                        </a>
                    </div>
                </div>
            </div> ";
}

$sql = "SELECT TOP (4) V.voorwerpnummer, V.titel, V.beschrijving, V.startprijs, V.LooptijdbeginDag, B.filenaam 
FROM Voorwerp V 
	JOIN bestand B on V.voorwerpnummer = B.voorwerp WHERE V.looptijdeindeDag>'$datee'
ORDER BY NEWID()";

foreach ($dbh->query($sql) as $row) {
    $Random .= "  <div class=\"column\">
                <div class=\"has-background-primary\">
                    <figure class=\"image objectfit-cover\">
                        <img src=\"{$row['filenaam']}\" alt=\"img\">
                    </figure>
                    <div class=\"extra-padding-1 has-background-light\">
                        <h3 class=\"title is-4 \"> {$row['titel']}  </h3>
                        <div class=\"content is-medium\">
                            {$row['beschrijving']}
                        </div>
                        <div class=\"columns has-text-centered\">
                            <div class=\"column\">
                                <div class=\"content is-medium\">
                                    	<p>&euro;{$row['startprijs']}</p>
                                </div> 
                            </div>
                            <div class=\"column\">
                                <div class=\"content is-medium\">
                                    <p> | </p>
                                </div>
                            </div>
                            <div class=\"column\">
                                <div class=\"content is-medium\">
                                    <p>{$row['LooptijdbeginDag']}</p>
                                </div>
                            </div>
                        </div>
                        <a class=\"button is-fullwidth\" href=\"product.php?pn=" . $row['voorwerpnummer'] ." \">
                            Bekijk nu!
                        </a>
                    </div>
                </div>
            </div> ";
}
?>
<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
<section>
    <div class="container">
        <br>

        <div class="card ">
            <div class="card-content">
                <h2 class="title is-3  has-text-centered">Populaire producten</h2>
                <p class="subtitle is-6  has-text-centered">Dit zijn de meest populaire producten!</p>
                <div class="columns">
                    <?= $ads ?>

                </div>
                <h2 class="title is-3  has-text-centered">Random producten</h2>
                <div class="columns">

                    <?= $Random ?>

                </div>
          </div>
      </div>
      <br>
    </div>
</section>
<?php include "includes/footer.php" ?>
