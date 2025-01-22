<?php
    require_once "includes/test_db_mysqli.php";

    $table = "users";

    $query = "SELECT * FROM $table";
    $result = $connection->query($query);

    if($result->num_rows > 0)
    {
        while($column = $result->fetch_field())
        {
                var_dump($column);
                echo $column->username;
                echo "<br>";
        }

        //$row = $result->fetch_assoc();
        while($row = $result->fetch_assoc())
        {
            var_dump($row);
            echo "<br>";

            

            foreach($row as $key => $value)
            {
                echo $key . ": " . $value . "<br>";
            }
        }
    }