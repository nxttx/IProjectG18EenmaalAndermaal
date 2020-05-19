<?php
$username =$_GET['UN'];
$webpagina;


include "../dbh.php";

$dbh = connectToDatabase();
$sth = $dbh->prepare('SELECT COUNT(gebruikersnaam) as amount FROM gebruiker WHERE gebruikersnaam = :username');
$sth->bindParam(':username', $username );
$sth->execute();

foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $amount= $row['amount'];
}
if( strlen($username) <5){
    $webpagina ='<div class="notification is-danger">
Deze gebruikersnaam is te kort! Uw gebruikersnaam is  <b>' .strlen($username). '</b> tekens lang!
    </div>';
}
elseif($amount >=1){
    $webpagina ='<div class="notification is-warning">
Deze gebruikersnaam is al gebruikt! Je kan <b>\''. $username . '\'</b> niet gebruiken!
    </div>';
}else{
    $webpagina = '<div class="notification is-success">
Deze gebruikersnaam is nog niet gebruikt! Je mag \''. $username . '\' gebruiken!
    </div>';
}
?>

<!DOCTYPE html>
<html lang="nl" style="background-color: white">
<head>
    <meta charset="UTF-8">
    <title>EenmaalAndermaal </title>
    <link rel="stylesheet" href="../../css/mystyles.css">
</head>
<body>
<section>
<?=$webpagina?>
</section>
</body>
</html>
