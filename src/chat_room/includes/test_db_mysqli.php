<?php

    $host = 'db';
    $dbname = "chat_room";
    $user = "user";
    $password = "user";
    $port = 3306;

    $connection = new mysqli($host, $user, $password, $dbname, $port);

    if($connection->connect_error)
    {
        die("aaa".$connection->connect_error);
    }
    echo "Connessione al database avvenuta con successo!<br>";
    //$connection->close();
