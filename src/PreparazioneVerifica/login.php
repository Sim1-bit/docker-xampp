<?php
    session_start();
?>
<?php
    require_once "db.php";


    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["nome"]) && isset($_POST["password"]))
    {
        $password = md5($_POST["password"]);
        $query = "SELECT * FROM utenti WHERE nome = ? AND password = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $_POST["nome"], $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if(!$result)
        {
            die("ciao");
        }

        while($row = $result->fetch_assoc())
        {
            $_SESSION["nome"] = $row["nome"];
            $_SESSION["password"] = $row["password"];
        }
        header("Location: help.php");
    }
?>

<html>

    <body>

        <form action = "login.php" method = "post">
            Nome: <input type = "text" name = "nome" value = "" required><br>
            Password: <input type = "password" name = "password" value = "" required><br>
            <input type = "submit" value = "Accedi">
        </form>

    </body>

</html>