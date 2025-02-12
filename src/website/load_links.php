<?php
    //session_start();
    require_once "../includes/db_mysqli.php";

    $query = "SELECT l.link_long, l.link_short, l.description FROM links l NATURAL JOIN users u WHERE u.username = '$_SESSION[username]'";
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
            <td>" . $row['link_long'] . "</td>
            <td>" . $row['link_short'] . "</td>
            <td>" . $row['description']. "</td>
        </tr>";
    }
    echo $messages;
?>