<?php
    
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
