<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");

    require_once "../includes/db_mysqli.php"; // Connessione al database

    $data = json_decode(file_get_contents("php://input"), true);

    file_put_contents("../test/ciao.txt", $_POST);

    if ($data) 
    {
        file_put_contents("../test/ciao.txt",$nome.$cognome.$email);
        $nome = $data['nome'];
        $cognome = $data['cognome'];
        $email = $data['email'];

        $stmt = $conn->prepare("INSERT INTO persone (nome, cognome, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome,$cognome, $email);

        // Esegui la query e restituisci un messaggio di successo
        $stmt->execute();

        // Rispondi con un messaggio JSON
        echo json_encode(["success" => true, "message" => "Dati ricevuti con successo."]);
    } 
    else 
    {
        echo json_encode(["success" => false, "message" => "Errore nei dati inviati."]);
    }
?>
