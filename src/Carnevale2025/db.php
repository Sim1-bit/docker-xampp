<?php
    $host = 'db';
    $dbname = "Carnevale2025";
    $user = "user";
    $password = "user";
    $port = 3306;

    $conn = new mysqli($host, $user, $password, $dbname, $port);

    if($conn->connect_error)
    {
        die("aaa".$conn->connect_error);
    }