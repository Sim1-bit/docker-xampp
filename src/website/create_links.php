<?php
    session_start();
    require_once "../includes/db_mysqli.php";

    if ($_SERVER["REQUEST_METHOD"] != "POST")
    {
        die("");
    }

    $table = "users";

    if (count($_POST) === 1 && isset($_POST['link']))
    {
        //Recupera l'ultimo id di link
        $query = "SELECT MAX(ID_link) FROM links;";
        $result = $connection->query($query);
        $row = $result->fetch_assoc();
        $id_link = $row['MAX(ID_link)'] + 1;

        //recupera l'id di chi crea il link
        $query = "SELECT u.ID_user FROM users u WHERE u.username = '$_SESSION[username]';";
        $result = $connection->query($query);
        $row = $result->fetch_assoc();

        //utilizza il link per generare il short
        $url = "https://3000-idx-link-shortener-1739258623922.cluster-4ezwrnmkojawstf2k7vqy36oe6.cloudworkstations.dev/website/links/$id_link.php";

        $query = 
        "INSERT INTO links 
        (
            ID_user, 
            link_long, 
            link_short, 
            interaction
        )
        VALUES
        (
            '$row[ID_user]',
            '$_POST[link]',
            '$url',
            0
        )";

        $result = $connection->query($query);
    
        if(!$result)
        {
            die("Database query failed: " . $connection->error);
        }
        $content = 
'<?php
    require_once "../../includes/db_mysqli.php";
    
    $query = "SELECT link_long FROM links WHERE ID_link =' . $id_link . '";
    $result = $connection->query($query);

    if(!$result)
    {
        die("Database query failed: " . $connection->error);
    }
    else
    {
        if($result -> num_rows > 0)
        {
            $row = $result->fetch_assoc();
            $url = $row[\'link_long\'];
            header("Location: $url");       
            exit();
        }
    } 
?>';
        file_put_contents(__DIR__."/links/$id_link.php", $content);
    }
    else
    {
        die("");
    }

