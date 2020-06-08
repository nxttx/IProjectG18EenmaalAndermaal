<?php
include "dbh.php";
include "models/Rubriek.php";

header('Content-type: application/json');

$dbh = connectToDatabase();

if(!$dbh) {
    http_response_code(500);
    return;
}

if (isset($_GET["index"])) {
    http_response_code(202);

    $qry = $dbh->prepare("SELECT rubrieknaam, rubrieknummer FROM rubriek WHERE Rubriek IS NULL;");
    $qry->execute();
    $result = $qry->fetchAll(PDO::FETCH_CLASS);

    $rubriekArray = [];

    foreach ($result as $rubriekRecord) {
        $qry = $dbh->prepare("SELECT rubrieknaam, rubrieknummer FROM rubriek WHERE Rubriek = :nummer;");
        $qry->execute(array(':nummer' => $rubriekRecord->rubrieknummer));
        $result = $qry->fetchAll(PDO::FETCH_ASSOC);

        $rubriek = new Rubriek;
        $rubriek->set_rubrieknummer($rubriekRecord->rubrieknummer);
        $rubriek->set_rubrieknaam(trim($rubriekRecord->rubrieknaam));

        $subRubriekArray = [];

        foreach ($result as $subRubriekRecord) {
            array_push($subRubriekArray, $subRubriekRecord);
        }

        $rubriek->set_sub_rubrieken($subRubriekArray);

        array_push($rubriekArray, $rubriek);
    };

    http_response_code(200);

    echo json_encode($rubriekArray);
}

if (isset($_GET["show"])) {
    if($_GET["show"] == null) {
        echo "Rubrieknummer ontbreekt.";
        http_response_code(422);
        return;
    }

    $qry = $dbh->prepare("SELECT rubrieknaam, rubrieknummer FROM rubriek WHERE Rubriek = :nummer;");
    $qry->execute(array(':nummer' => $_GET["show"]));
    $result = $qry->fetchAll(PDO::FETCH_CLASS);

    if(count($result) === 0) {
        http_response_code(204);
    } else {
        http_response_code(200);
    }

    echo json_encode($result);
}