<?php
    session_start();
    require_once "../includes/test_db_mysqli.php";

    if ($_SERVER["REQUEST_METHOD"] != "GET")
    {
        die("");
    }

    $table = "users";

    if (count($_GET) === 1 && isset($_GET['room']))
    {
        $_SESSION['room'] = $_GET['room'];
    }
    elseif  (count($_GET) === 0)
    {
    }
    else
        die("");


    $query = "SELECT u.username, m.content, m.publication_time FROM users u NATURAL JOIN messages m WHERE ID_room = '$_SESSION[room]'";
    $result = $connection->query($query);
    
    if(!$result)
    {
        die("Database query failed: " . $connection->error);
    }
    $messages = '';
    
    while($row = $result->fetch_assoc())
    {
        $messages .= 
        "<tr>
            <td>" . $row['username'] . "</td>
            <td>" . $row['content'] . "</td>
            <td>" . $row['publication_time']. "</td>
        </tr>";
    }
?>

<html>

    <body>
        <table>
            <tr>
                <th>Sender</th>
                <th>Content</th>
                <th>Time</th>
            </tr>
            <?= $messages; ?>
        </table>

        <form name = "send_message" method = "post" action = "send_message.php">
            <label for = "message">Messaggio:</label><br>
            <textarea name="message" placeholder="Scrivi un messaggio..." required></textarea>
            <br>
            <input type = "submit" value = "Invia">
        </form>

        <form name = "create_room" method = "post" action = "create_room.php">
            <label for = "name"> Nome:</label>
        </form>
    </body>
</html>