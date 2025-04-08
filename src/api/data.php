<?php
    header('Content-Type: application/json');
    $data = 
    [
        [ "nome" => "A", "cognome" => "B", "email" => "C" ],
        [ "nome" => "1", "cognome" => "2", "email" => "3" ]
    ];


    echo json_encode($data);
?>