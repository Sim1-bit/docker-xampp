<?php
    session_start();
    require_once "../includes/test_db_mysqli.php";

    function sign_up()
    {
        $query = 
            "INSERT INTO users
            (
                email,
                password,
                username,
                birth_date
            )
            VALUES
            (
                '$_POST[userMail]',
                '$_POST[userPassword]',
                '$_POST[username]',
                '$_POST[userDate]'
            )";
        $result = $connection->query($query);
    
        if(!$result)
        {
            die("Database query failed: " . $connection->error);
        }
        else
        {
            echo "successo<br>";
            login();
        }
    }

    function login()
    {
        $query = "SELECT * FROM users WHERE username = '$_POST[username]' AND password = '$_POST[userPassword]'";
        $result = $connection->query($query);
    
        if(!$result)
        {
            die("Database query failed: " . $connection->error);
        }
        else
        {
            echo "successo<br>";
            
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['userPassword'];
            echo "Session variables are set.";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] != "POST")
    {
        die("");
    }

    $table = "users";

    if (isset($_POST['userMail']) && isset($_POST['userPassword']) && $_POST['username'] && $_POST['userDate'])
    {
        sign_up();
        echo "Sign Up<br>";
    }
    elseif (count($_POST) === 2 && isset($_POST['username']) && isset($_POST['userPassword']))
    {
        login();
        echo "Login<br>";
    }
    else
    {
        die("");
    }

    
    /*$_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['userPassword'];
    echo "Session variables are set.";*/

    