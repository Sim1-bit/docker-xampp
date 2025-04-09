<?php
    session_start();
    require_once("db.php");

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["CodF"]) && isset($_POST["pwd"]))
    {
        $pwd = md5($_POST["pwd"]);
        $stmt = $conn->prepare("SELECT * FROM Utenti WHERE CodF = ? && pwd = ?");
        $stmt->bind_param("ss", $_POST["CodF"], $pwd);
        $stmt->execute();
        $result = $stmt->get_result();

        while($row = $result->fetch_assoc())
        {
            $_SESSION["CodF"] = $row["CodF"];
            $_SESSION["ruolo"] = $row["ruolo"];
            $_SESSION["pwd"] = $row["pwd"];

            if($row["ruolo"] === 1)
            {
                header("Location: input_gara.php");
            }
            else
            {
                header("Location: gare.php");
            }
        }
    }
?>

<html>
    <form method="post" action="login.php">
        Codice Fiscale: <input type="text" name="CodF" required><br>
        Password: <input type="password" name="pwd" required><br>
        <input type="submit" value="Accedi">
    </form>
</html>