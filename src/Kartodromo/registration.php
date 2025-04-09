<?php
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
            header("Location: registration.php");
        }
        $ruolo = 0;
        $stmt = $conn->prepare("INSERT INTO Utenti (CodF, pwd, ruolo) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $_POST["CodF"], $pwd, $ruolo);
        $stmt->execute();
        
        header("Location: login.php");
    }
?>

<html>
    <form action="registration.php" method="post">
        Codice Fiscale: <input type="text" name="CodF" required><br>
        Password: <input type="password" name="pwd" required><br>
        <input type="submit" value="Accedi">
    </form>
</html>