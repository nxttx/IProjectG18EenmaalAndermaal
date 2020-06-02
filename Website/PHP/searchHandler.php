<?php
include 'dbh.php';

$dbh = connectToDatabase();

$searchInput = $_REQUEST["search"];

if (!$dbh) {
    http_response_code(500);

    $dbh->close();
} else {
    http_response_code(202);

    $searchInput = "%$searchInput%";
    
    $qry = $dbh->prepare("SELECT * FROM voorwerp WHERE titel LIKE :search OR beschrijving LIKE :search2 where veilinggesloten2 = 'niet' ORDER BY titel ASC");

    $qry->execute(array($searchInput, $searchInput));

    $records = $qry->fetchAll(PDO::FETCH_ASSOC);

    if(empty($records)) {
        http_response_code(204);        
    } else {
        http_response_code(200);

        echo json_encode($records);
    }
}