<?php
    session_start();
    require_once "../includes/test_db_mysqli.php";

    if ($_SERVER["REQUEST_METHOD"] != "GET")
    {
        die("");
    }

    $table = "users";

    if (!(count($_GET) === 1 && isset($_GET['room'])))
    {
        die("");
    }


    $query = "SELECT u.username, m.content, m.publication_time FROM users u NATURAL JOIN messages m WHERE ID_room = '$_GET[room]'";
    $result = $connection->query($query);
    
    if(!$result)
    {
        die("Database query failed: " . $connection->error);
    }
    while($row = $result->fetch_assoc())
    {
        foreach($row as $key => $value)
        {
           var_dump($row);
        }
    }
?>
<html>

</html>