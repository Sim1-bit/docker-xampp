<?php
    session_start();
    require_once "../../includes/db_mysqli.php";

    if ($_SERVER["REQUEST_METHOD"] != "POST")
    {
        header("Location: sign_up.html"); 
    }

    $table = "users";

    if (!(isset($_POST['userMail']) && isset($_POST['userPassword']) && $_POST['username']))
    {
        header("Location: sign_up.html");   
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
            header("Location: sign_up.html");       
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
    

    