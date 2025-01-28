<?php
    session_start();
    require_once "../includes/test_db_mysqli.php";

    if ($_SERVER["REQUEST_METHOD"] != "GET")
    {
        die("");
    }

    $table = "users";

    if (!(count($_GET) === 1 && isset($_GET['room'])))
    {
        die("");
    }


    $query = "SELECT u.username, m.content, m.publication_time FROM users u NATURAL JOIN messages m WHERE ID_room = '$_GET[room]'";
    $result = $connection->query($query);
    
    if(!$result)
    {
        die("Database query failed: " . $connection->error);
    }
    while($row = $result->fetch_assoc())
    {
        foreach($row as $key => $value)
        {
           var_dump($row);
        }
    }
?>


<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <title>Stanza Chat</title>
    </head>
    <body>

        <h1>Stanza Chat - Room ID: <?= htmlspecialchars($_GET['room']) ?></h1>

        <!-- Form per inviare il messaggio -->
        <form method="POST" action="send_message.php?room=<?= htmlspecialchars($room_id) ?>">
            <textarea name="message" placeholder="Scrivi un messaggio..." required></textarea>
            <button type="submit">Invia</button>
        </form>

        <!-- Mostra i messaggi -->
        <div id="messages">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div>
                    <strong><?= htmlspecialchars($row['username']) ?>:</strong>
                    <p><?= htmlspecialchars($row['content']) ?></p>
                    <small><?= htmlspecialchars($row['publication_time']) ?></small>
                </div>
                <hr>
            <?php endwhile; ?>
        </div>

        <!-- Link per ricaricare i messaggi (puoi anche usare AJAX per caricarli dinamicamente) -->
        <a href="receive_message.php?room=<?= htmlspecialchars($room_id) ?>">Ricarica Messaggi</a>

    </body>
</html>