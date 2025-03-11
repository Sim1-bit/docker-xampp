<?php
    session_start();
    require_once "includes/db_mysqli.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $table = "users";

        if (!(isset($_POST['userMail']) && isset($_POST['userPassword']) && $_POST['username']))
        {
            header("Location: sign_up.php");   
        }

        $query = "SELECT * FROM users WHERE username = '$_POST[username]'";
        $result = $connection->query($query);
        
        if(!$result)
        {
            die("Database query failed: " . $connection->error);
        }
        else
        {
            if($result -> num_rows > 0)
            {
                header("Location: sign_up.php");       
            }
        }
        $query = 
            "INSERT INTO users
            (
                username,
                email,
                password
            )
            VALUES
            (
                '$_POST[username]',
                '$_POST[userMail]',
                '$_POST[userPassword]'
            )";
        $result = $connection->query($query);
        
        if(!$result)
        {
            die("Database query failed: " . $connection->error);
        }
        else
        {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['userPassword'];
            header("Location: ");
        }
    }
?>

<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up</title>

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
        <form class = "access" name = "SignUp" method = "post" action = "sign_up.php" >
            <label for = "username">&nbsp;Username: <br></label>
            <input type = "text" id="username" name = "username" value = "">
            <br>

            <br>
            <label for = "userMail">&nbsp;e-mail: <br></label>
            <input type = "email" id="userMail" name = "userMail" value = "">
            <br>

            <br>
            <label for = "userPassword">&nbsp;Password: <br></label>
            <input type = "password" id="userPassword" name = "userPassword" value = "">
            <br>
            
            <p>
                Hai già un Account? <a href ="login.php">Accedi</a>
            </p>
            <input type = "submit" value = "Sign Up">

         </form>

    </body>

</html>

    