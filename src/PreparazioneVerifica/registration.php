<?php
    session_start();
?>
<?php
    require_once "db.php";


    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["nome"]) && isset($_POST["password"]))
    {
        //Se l'account esiste non deve procedere alla registrazione
        $password = md5($_POST["password"]);
        $query = "SELECT * FROM utenti WHERE nome = ? AND password = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $_POST["nome"], $password);
        $stmt->execute();
        $result = $stmt->get_result();

        while($row = $result->fetch_assoc())
        {
            die("ciao");
        }
        
        $query = "INSERT INTO utenti (ID, nome, password) VALUES (NULL, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $_POST["nome"], $password);
        $stmt->execute();
        $result = $stmt->get_result();

        header("Location: login.php");
    }
?>

<html>

    <body>

        <form action = "registration.php" method = "post">
            Nome: <input type = "text" name = "nome" value = "" required><br>
            Password: <input type = "password" name = "password" value = "" required><br>
            <input type = "submit" value = "Accedi">
        </form>

    </body>

</html>