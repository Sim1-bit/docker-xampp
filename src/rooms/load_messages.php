<?php
    //session_start();
    require_once "../includes/test_db_mysqli.php";

    $query = "SELECT u.username, m.content, m.publication_time FROM users u NATURAL JOIN messages m WHERE ID_room = '$_GET[room]'";
    $result = $connection->query($query);
    
    if(!$result)
    {
        die("Database query failed: " . $connection->error);
    }
    $messages = '';
    
    while($row = $result->fetch_assoc())
    {
        $messages .= 
        "<tr>
            <td>" . $row['username'] . "</td>
            <td>" . $row['content'] . "</td>
            <td>" . $row['publication_time']. "</td>
        </tr>";
    }
    echo $messages;
?>

