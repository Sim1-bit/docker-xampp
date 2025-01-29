<?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] != "GET")
    {
        die("");
    }

    $table = "users";

    if (!(count($_GET) === 1 && isset($_GET['room'])))
    {
        var_dump($_GET);
        die("hackerino di merda");
    }

    $_SESSION['room'] = $_GET['room'];
?>

<html>

    <body>
        <table>
            <tr>
                <th>Sender</th>
                <th>Content</th>
                <th>Time</th>
            </tr>
            <?php include 'load_messages.php'; // File che carica i messaggi ?>
        </table>
            

        <form name = "send_message" method = "post" action = "send_message.php">
            <label for = "message">Messaggio:</label>
            <br>
            <textarea name = "message" placeholder="Scrivi un messaggio..." required></textarea>
            <br>
            <input type="hidden" name="room" value="<?php echo htmlspecialchars($_GET['room'] ?? ''); ?>">
            <input type = "submit" value = "Invia">
        </form>
    </body>
</html>