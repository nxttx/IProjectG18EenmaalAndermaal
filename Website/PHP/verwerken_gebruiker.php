<?php
require_once( "../php/dbh.php");
$dbh = connectToDatabase();

$false = 0;
$true = 1;

if (isset($_POST['submit'])) {

    $_POST = array_map('stripslashes', $_POST);

    //collect form data
    extract($_POST);
    $gebruikersnaam = $_GET['gebruikersnaam'];
    if (!isset($error)) {

        try {

            $sql = "UPDATE gebruiker SET is_geverifieerd = :is_geverifieerd WHERE gebruikersnaam = :gebruikersnaam";
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ':is_geverifieerd' => $true,
                ':gebruikersnaam' => $gebruikersnaam
            ));

            //redirect to index page
            header('Location: ../dashboard.php?action=updated');
            exit;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

}
if (isset($error)) {
    foreach ($error as $error) {
        echo $error . '<br />';
    }
}

?>