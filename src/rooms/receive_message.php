<?php
    session_start();
    require_once "../includes/test_db_mysqli.php";

    // Assicurati che la stanza sia definita
    if (isset($_GET['room'])) {
        $room_id = $_GET['room'];

        // Recupera i messaggi dalla stanza
        $query = "
            SELECT u.username, m.content, m.publication_time 
                FROM users u 
                NATURAL JOIN messages m 
                WHERE m.ID_room = '$room_id' 
                ORDER BY m.publication_time DESC";

        $result = $connection->query($query);
    
        if (!$result) 
        {
            die("Errore nel recupero dei messaggi: " . $connection->error);
        }

        // Stampa i messaggi
        while ($row = $result->fetch_assoc()) 
        {
            echo "<div>";
            echo "<strong>" . htmlspecialchars($row['username']) . ":</strong> ";
            echo "<p>" . htmlspecialchars($row['content']) . "</p>";
            echo "<small>" . htmlspecialchars($row['publication_time']) . "</small>";
            echo "</div><hr>";
        }
    } 
    else 
    {
        echo "Stanza non specificata!";
    }
?>
