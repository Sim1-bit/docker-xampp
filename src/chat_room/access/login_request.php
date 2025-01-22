<?php
    session_start();
?>

<?php
    require_once "../includes/test_db_mysqli.php";

    if ($_SERVER["REQUEST_METHOD"] != "POST")
    {
        die("");
    }

    echo "prova<br>";

    $table = "users";

    $query = "SELECT * FROM $table WHERE username = '$_POST[username]' AND password = '$_POST[userPassword]'";
    $result = $connection->query($query);
    
    if(!$result)
    {
        die("Database query failed: " . $connection->error);
    }
    else
    {
        echo "successo";
    }
    /*$_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['userPassword'];
    echo "Session variables are set.";*/

    