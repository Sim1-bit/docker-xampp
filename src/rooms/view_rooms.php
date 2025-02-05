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

<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rooms</title>

        <link rel="stylesheet" href="../css/mystyle.css">
        <style type="text/css">

            #title
            {
               text-align: center;
               text-decoration-line: overline underline;
               text-decoration-color: rgb(176, 2, 2);
            }
        </style>

        <link rel="icon" type="image/x-icon" href="../imgs/logo.png">
        
    </head>
    <body>
        <header>
            <br>
                <img src="../imgs/logo.png" alt="Logo Dialectic" width="100">
                <h1 id = "title">Dialectic</h1>
            <br>
        </header>
        <br>
        <form class = "access" name = "tabelle" method = "get" action = "room.php">
            <label>Stanze Disponibili</label><br>
            <?= $listItems; ?>
        </form>

        <form class = "access" name = "create_room" method = "post" action = "create_room.php">
            <label>Crea Stanza</label><br>
            <label for = "name"> Nome:</label>
            <input name = "name" placeholder="Nome..." required></input>
            <br>
            <input type = "submit" value = "Invia">
        </form>
    </body>

</html>