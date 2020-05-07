<?php
session_start();
function connectToDatabase()
{
    $username = "iproject18";
    $password = "pT9CaHbD";

    $dsn = "sqlsrv:Server=mssql2.iproject.icasites.nl,1433;Database=iproject18";

    try {
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $conn;
}