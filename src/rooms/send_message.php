<?php
    session_start();
    require_once "../includes/test_db_mysqli.php";

    if ($_SERVER["REQUEST_METHOD"] != "POST")
    {
        die("");
    }

    $table = "users";

    if (count($_POST) === 2 && isset($_POST['message']) && isset($_POST['room']))
    {
        $query = 
        "INSERT INTO messages 
        (
            content, 
            publication_time, 
            ID_room, 
            ID_user
        )
        SELECT '$_POST[message]', NOW(), '$_POST[room]', u.ID_user 
        FROM users u 
            WHERE u.username = '$_SESSION[username]';";
        $result = $connection->query($query);
    
        if(!$result)
        {
            die("Database query failed: " . $connection->error);
        }
        else
        {
            header("Location: room.php?room=$_POST[room]");
        }
    }
    else
    {
        die("");
    }
?>
