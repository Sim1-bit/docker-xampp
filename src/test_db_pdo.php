<?php

    $host = 'db';
    $dbname = "root_db";
    $user = "user";
    $password = "user";

    try
    {
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
        pdo = new PDO($dsn, $user, $password);

        pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "Connesione al database riuscita con PDO!"
    }
    catch (PDOException $e)
    {
        echo "Errore durante la connessione al database: ".$e->getMessage();
    }