<?php
    session_start();
    require_once "includes/db_mysqli.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $table = "users";

        if (count($_POST) === 2 && isset($_POST['username']) && isset($_POST['userPassword']))
        {
            $query = "SELECT * FROM users WHERE username = '$_POST[username]' AND password = '$_POST[userPassword]'";
            $result = $connection->query($query);
        
            if(!$result)
            {
                die("Database query failed: " . $connection->error);
            }
            else
            {
                if($result -> num_rows > 0)
                {
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['password'] = $_POST['userPassword'];

                    header("Location: website/view_links.php");       
                }
                else
                {
                    header("Location: login.php");
                } 
            }
        }
        else
        {
            header("Location: login.php");
        }
    }
?>

<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>

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
        <form class = "access" name = "login" method = "post" action = "login.php">
            <label for = "username">Username:</label><br>
            <input type = "text" id="username" name = "username" value = "">
            <br>

            <br>
            <label for = "userPassword">Password:</label><br>
            <input type = "password" id="userPassword" name = "userPassword" value = "">
            <br>
            <p>
                Non hai un Account? <a href ="sign_up.php">Registrati</a>
            </p>
            <input type = "submit" value = "Login">

         </form>
         

    </body>

</html>