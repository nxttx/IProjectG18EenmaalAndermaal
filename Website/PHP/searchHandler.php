<?php
include 'dbh.php';

$dbh = connectToDatabase();
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

$searchInput = $_REQUEST["search"];

if (!$dbh) {
    http_response_code(500);

    $dbh->close();
} else {
    http_response_code(202);

    $searchInput = "%$searchInput%";
    
    $qry = $dbh->prepare("SELECT * FROM voorwerp WHERE (titel LIKE :search OR beschrijving LIKE :search2) AND looptijdeindeDag>:search3 ORDER BY titel ASC");

    $qry->execute(array($searchInput, $searchInput, $datee));

    $records = $qry->fetchAll(PDO::FETCH_ASSOC);

    if(empty($records)) {
        http_response_code(204);        
    } else {
        http_response_code(200);

        echo json_encode($records);
    }
}