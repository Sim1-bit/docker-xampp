<?php
    session_start();
    require_once "../includes/test_db_mysqli.php";

    if ($_SERVER["REQUEST_METHOD"] != "POST")
    {
        die("");
    }

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

                header("Location: ../rooms/view_rooms.php");       
            }
            else
            {
                header("Location: login.html");
            } 
        }
    }
    else
    {
        header("Location: login.html");
    }