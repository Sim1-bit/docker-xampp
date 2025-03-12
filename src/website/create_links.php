<?php
    session_start();
    require_once "../includes/db_mysqli.php";

    if ($_SERVER["REQUEST_METHOD"] != "POST")
    {
        die("");
    }

    $table = "users";

    if ((count($_POST) === 1 || count($_POST) === 2) && isset($_POST['link']))
    {    
        $link = md5($_POST['link']);

        //recupera l'id di chi crea il link
        $query = "SELECT u.ID_user FROM users u WHERE u.username = '$_SESSION[username]';";
        $result = $connection->query($query);
        $row = $result->fetch_assoc();

        $link = md5($_POST['link'].$row['ID_user']);

        //utilizza il link per generare il short
        $url = "https://3000-idx-link-shortener-1739258623922.cluster-4ezwrnmkojawstf2k7vqy36oe6.cloudworkstations.dev/website/links/$link";

        $query = 
        "INSERT INTO links 
        (
            ID_link,
            ID_user, 
            link_long, 
            link_short,
            description
        )
        VALUES
        (
            '$link',
            '$row[ID_user]',
            '$_POST[link]',   
            '$url',
            '$_POST[description]'
        )";

        try 
        {
            $result = $connection->query($query);
        } 
        catch (Exception $e) 
        {
            header("Location: website/view_links.php");
        }
    
        if(!$result)
        {
            header("Location: website/view_links.php");
        }
        $content = 
'<?php
    require_once "../../includes/db_mysqli.php";

    $query = "UPDATE links SET links.interaction = links.interaction + 1 WHERE links.ID_link =\'' . $link . '\'";
    $result = $connection->query($query);
    
    $query = "SELECT link_long FROM links WHERE ID_link =\'' . $link . '\'";
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
        file_put_contents(__DIR__."/links/$link", $content);
        header("Location: view_links.php");
    }
    else
    {
        die("");
    }

