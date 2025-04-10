<?php
    require "../DBConnection/DBConnectionConfig.php";
    
    $tsql = "select Title, CoverImg, Price from Books order by AddDate desc";
    $stmt = sqlsrv_query($conn, $tsql);

    if ($stmt == false)
    {
        die(print_r(sqlsrv_errors(), true));
    }

    $data = [];
    $idx = 0;
    while ($obj = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
    {
        $data[$idx] = $obj;
        $idx++;
    }
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);

    header("Content-Type: application/json");
    echo json_encode($data);
?>