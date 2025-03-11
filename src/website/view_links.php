<?php
    session_start();
?>

<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Your links</title>

        <link rel="stylesheet" href="../css/mystyle.css">
        <style type="text/css">

            #title
            {
               text-align: center;
               text-decoration-line: overline underline;
               text-decoration-color: rgb(176, 2, 2);
            }

        </style>   
    </head>
    <body>
        <header>
            <br>
                <h1 id = "title">Byte.ly</h1>
            <br>
        </header>
        <br>
        <table>
            <tr>
                <th>Long Link</th>
                <th>Short Link</th>
                <th>Description</th>
                <th>Interaction</th>
            </tr>
            <?php include 'load_links.php'; // File che carica i messaggi ?>
        </table>
            

        <form name = "create_link" method = "post" action = "create_links.php">
            <label for = "link">Links:</label>
            <br>
            <textarea name = "link" placeholder="Scrivi un link..." required></textarea>
            <br>
            <label for = "link">Description:</label>
            <br>
            <textarea name = "description" placeholder="Scrivi una descrizione..." value = " " required></textarea>
            <br>
            <input type = "submit" value = "Invia">
        </form>
    </body>
</html>