<?php
    require_once("session.php");
    require_once("db.php");

    if($_SESSION["ruolo"] === 0)
    {
        header("Location: login.php");
    }

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["file"]) && isset($_POST["id_gara"]))
    {
        $file = fopen($_FILES["file"]["tmp_name"], "r");

        $stmt = $conn->prepare("INSERT INTO Gare (ID_gara) VALUES (?)");
        $stmt->bind_param("i", $_POST['id_gara']);
        $stmt->execute();

        while(!feof($file))
        {
            

            $row = fgets($file);
            $array = explode(" ", $row);
            $array[2] = str_replace("\r\n", "", $array[2]);
            
            $stmt = $conn->prepare("INSERT INTO Partecipazione (CodF, ID_gara, Num, Posizione) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("siii", $array[0], $_POST['id_gara'], $array[1], $array[2]);
            $stmt->execute();
        }
    }

?>

<html>
    <form method="post" action="input_gara.php" enctype="multipart/form-data">
        Classica: <input type="file" name="file"><br>
        Gara: <input type="text" name="id_gara"><br>
        <input type="submit" value="Invia">
    </form>
</html>