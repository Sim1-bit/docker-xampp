<?php
    require_once "../../includes/db_mysqli.php";
    
    $query = "SELECT link_long FROM links WHERE ID_link =24";
    $result = $connection->query($query);

    if(!$result)
    {
        die("Database query failed: " . $connection->error);
    }
    else
    {
        if($result -> num_rows > 0)
        {
            $row = $result->fetch_assoc();
            $url = $row['link_long'];
            header("Location: $url");       
            exit();
        }
    } 
?>