<?php
    header('Content-Type: application/json');
    require_once "../includes/db_mysqli.php";

    $query = "SELECT * FROM persone";
    $result = $connection->query($query);

    $data = array();
    while($row = $result->fetch_assoc())
    {
        $data[] = $row;
    }


    echo json_encode($data);
?>


