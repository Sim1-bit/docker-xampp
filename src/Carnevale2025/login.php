<?php
    session_start();
?>
<?php
    require_once "db.php";


    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["codF"]) && isset($_POST["data"]))
    {
        $query = "SELECT * FROM utenti WHERE codF = '$_POST[codF]' AND data = '$_POST[data]'";

        $result = $conn->query($query);

        while($row = $result->fetch_assoc())
        {
            $_SESSION["codF"] = $row["codF"];
            $_SESSION["data"] = $row["data"];
        }
        header("Location: masks.php");
    }
    //include_once "head.php";
?>

<html>

    <body>

        <form action = "login.php" method = "post">
            Codice fiscale: <input type = "text" name = "codF" value = ""><br>
            Data Nascita: <input type = "date" name = "data" value = ""><br>
            <input type = "submit" value = "Accedi">
        </form>

    </body>

</html>