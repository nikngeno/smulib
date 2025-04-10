<?php 
    $serverName = "";
    $database = "LibrarySystem";
    $uid = "";
    $pass = "";

    $connection = [
        "Database" => $database,
        "Uid" => $uid,
        "PWD" => $pass,
    ];

    $conn = sqlsrv_connect($serverName, $connection);
    if (!$conn)
    {
        die(print_r(sqlsrv_error(), true));
    }
?>