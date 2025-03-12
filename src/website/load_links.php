<?php
    require_once "../includes/db_mysqli.php";

    $query = "SELECT l.link_long, l.link_short, l.description, l.interaction FROM links l NATURAL JOIN users u WHERE u.username = '$_SESSION[username]'";
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
            <td><a href =" . $row['link_long'] . ">" . $row['link_long'] . "</a></td>
            <td><a href =" . $row['link_short'] . ">" . $row['link_short'] . "</a></td>
            <td>" . $row['description']. "</td>
            <td>" . $row['interaction']. "</td>
        </tr>";
    }
    echo $messages;
?>