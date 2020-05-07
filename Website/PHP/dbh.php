<?php
session_start();

function connectToDatabase()
{
    $username = "iproject18";
    $password = "pT9CaHbD";
    $database = "iproject18";

    $dsn = "sqlsrv:Server=mssql2.iproject.icasites.nl,1433;Database=$database";

    try {
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    } catch (PDOException $e) {
        return false;
    }
}

?>