<?php
    session_start();
    require_once "db.php";

    $query = "UPDATE utenti SET idM = '{$_POST['idM']}' WHERE codF = '{$_SESSION['codF']}'";

    $result = $conn->query($query);

    header("Location: masks.php");
?>