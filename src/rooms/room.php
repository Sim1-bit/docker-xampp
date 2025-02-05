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

<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $_GET['room'] ?></title>

        <link rel="stylesheet" href="../css/mystyle.css">
        <style type="text/css">

            #title
            {
               text-align: center;
               text-decoration-line: overline underline;
               text-decoration-color: rgb(176, 2, 2);
            }

        </style>

        <link rel="icon" type="image/x-icon" href="../imgs/logo.png">
        
    </head>
    <body>
        <header>
            <br>
                <img src="../imgs/logo.png" alt="Logo Dialectic" width="100">
                <h1 id = "title">Dialectic</h1>
            <br>
        </header>
        <br>
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