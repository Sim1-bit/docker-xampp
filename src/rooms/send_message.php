<?php
session_start();
require_once "../includes/test_db_mysqli.php";

// Verifica che la richiesta sia un POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['message']) && isset($_GET['room'])) {
        $message = $_POST['message'];
        $room_id = $_GET['room'];
        $user_id = $_SESSION['user_id']; // Supponiamo che tu abbia memorizzato l'ID utente nella sessione

        // Inserisci il messaggio nel database
        $query = "INSERT INTO messages (ID_room, ID_user, content, publication_time) 
                  VALUES ('$room_id', '$user_id', '$message', NOW())";

        if ($connection->query($query) === TRUE) {
            // Successo nell'invio del messaggio, redirige alla pagina room.php
            header("Location: room.php?room=" . $room_id);
            exit();
        } else {
            echo "Errore: " . $connection->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Invia Messaggio</title>
</head>
<body>
    <form method="POST" action="send_message.php?room=<?= htmlspecialchars($_GET['room']) ?>">
        <textarea name="message" placeholder="Scrivi un messaggio..." required></textarea>
        <button type="submit">Invia</button>
    </form>
</body>
</html>
