<?php
    session_start();
    require_once "db.php";

    $query = "SELECT * FROM scelte";
    $result = $conn->query($query);

    $string = "";

    while($row = $result->fetch_assoc())
    {
        $string .= "<form action = choise.php method = post>
                        <input type = hidden name = idM value = '$row[idM]'>
                        '$row[nome]'<br><input type = submit value = Scegli> Scelto da $row[num]
                    </form>
                    <br>";
    }
?>

<html>
    <body>
        <?php echo $string; ?>
    </body>
</html>