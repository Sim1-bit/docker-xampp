<?php
    require_once("db.php");
    $classifica = "";
    if(isset($_COOKIE["gara"]))
    {
        $stmt = $conn->prepare("SELECT * FROM Partecipazione WHERE ID_gara = ? ORDER BY Posizione");
        $stmt->bind_param("i", $_COOKIE["gara"]);
        $stmt->execute();
        $result = $stmt->get_result();

        while($row = $result->fetch_assoc())
        {
            $classifica .= $row['CodF'] . $row['Posizione'] . "<br>";
        }
    }
