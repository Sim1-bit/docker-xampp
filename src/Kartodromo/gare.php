<?php
    require_once("session.php");
    require_once("db.php");

    if(!isset($_COOKIE["gara"]))
    {
        setcookie("gara", 0, time() + 1000000000);
    }

    $stmt = $conn->prepare("SELECT ID_gara FROM Partecipazione WHERE CodF = ?");
    $stmt -> bind_param("s",$_SESSION["CodF"]);
    $stmt -> execute();
    $result = $stmt -> get_result();

    $gare = "";

    while($row = $result -> fetch_assoc())
    {
        $gare .= "<form action=\"gare.php\" method=\"post\">
                    <input type=\"submit\" name=\"ID_gara\" value=\"" . $row["ID_gara"] . "\">
                </form><br>";
    }

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["ID_gara"]))
    {
        if(!isset($_COOKIE["gara"]))
        {
            setcookie("gara", $_POST["ID_gara"], time() + 1000000000);
        }
        else
        {
            $_COOKIE["gara"] = $_POST["ID_gara"];
        }
    }

    require_once("gara.php");
?>

<html>
    <? echo $classifica?>
    <? echo $gare?>
</html>