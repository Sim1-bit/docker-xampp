<?php
    require_once "../includes/test_db_mysqli.php";

    $query = "SELECT * FROM rooms ORDER BY ID_room";
    $result = $connection->query($query);

    if(!$result)
    {
        die("Database query failed: " . $connection->error);
    }

    $listItems = '';

    foreach ($result as $row)
    {
        $listItems .= 
            "<button type='submit' name='room' value='" . htmlspecialchars($row['ID_room']) . "'>" . 
                htmlspecialchars($row['ID_room']) . " - " . htmlspecialchars($row['name_room']) . 
            "</button> <br>";
    }

?>


<html>

    <body>
        <form name = "tabelle" method = "get" action = "room.php">
            <?= $listItems; ?>
        </form>

        <form name = "create_room" method = "post" action = "create_room.php">
            <label for = "name"> Nome:</label>
            <input name = "name" placeholder="Nome..." required></input>
            <br>
            <input type = "submit" value = "Invia">
        </form>
    </body>

</html>