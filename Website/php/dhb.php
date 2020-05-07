<?php
session_start();
function connectToDatabase()
{
    $upload = false;
    if ($upload) {
        $servername = "localhost";
        $username = "iproject18";
        $password = "pT9CaHbD";
        $dbname = "iproject18;";
    } else {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "iproject18;";
    }

    try {
        $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    } catch (PDOException $e) {
    }
    return ($dbh);
}