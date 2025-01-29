<?php
    session_start();
    require_once "../includes/test_db_mysqli.php";

    if ($_SERVER["REQUEST_METHOD"] != "POST")
    {
        die("");
    }

    if (count($_POST) === 1 && isset($_POST['name']))
    {
        $query = 
        "INSERT INTO rooms
        (
            name_room
        )
        VALUES
        (
            '$_POST[name]'
        )";
        $result = $connection->query($query);
    
        if(!$result)
        {
            die("Database query failed: " . $connection->error);
        }
        else
        {
            header("Location: view_rooms.php");
        }
    }
    else
    {
        die("");
    }
?>