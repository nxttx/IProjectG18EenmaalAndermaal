<?php
include 'dbh.php';

$dbh = connectToDatabase();

if (!$dbh) {
    http_response_code(500);

    $dbh->close();
} else {
    http_response_code(202);

    $username = $_POST['username'];
    $password = $_POST['password'];

    $qry = $dbh->prepare("SELECT wachtwoord FROM gebruiker WHERE gebruikersnaam=:username");

    $qry->execute(array($username));

    $hash = $qry->fetch();

    $sth = $dbh->prepare("SELECT is_geverifieerd as x FROM gebruiker WHERE gebruikersnaam=:username");
    $sth->execute(array($username));
    $verifieerd = 0;
    foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $verifieerd= $row['x'];
    }

    if($verifieerd==0){
        http_response_code(428);
    }
    elseif (empty($hash)) {
        http_response_code(404);
    } else {
        $pw = $hash[0];

        if(password_verify($password, $pw)) {
            http_response_code(200);

            $_SESSION["user"] = $username;
        } else {
            // Eigenlijk een 401, maar om niet teveel informatie weg te geven een 404 (Not Found)
            http_response_code(404);
        }
        
        $dbh = null;
    }
}