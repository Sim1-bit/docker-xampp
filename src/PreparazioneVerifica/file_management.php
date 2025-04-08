<?php
    //Verifico che la sessione sia attiva
    require_once("session_require.php");

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["file"]))
    {
        $file = $_FILES['file'];
        //Prende il contenuto del file dal percorso temporaneo
        $content = file_get_contents($file['tmp_name']);
        file_put_contents("test/$file[name]", $content);

        if(!isset($_COOKIE["aux"]))
        {
            setcookie("aux", $file['name'], time() + 1000000);
        }
        else
        {
            $_COOKIE["aux"] = $file['name'];
            echo $_COOKIE["aux"];
        }
    }
?>

<html>
    <!--
        enctype="multipart/form-data" è necessario per poter mandare file in quanto tali (altriemnti si salverebbe tutto su $_POST)

        con required si indica un campo obbligatorio
     -->
    <form action="file_management.php" method="post" enctype="multipart/form-data">
        File: <input type="file" name="file" accept="" required>
        <input type="submit" value="Invia">
    </form>
</html>