<?php
    echo "eseguito da php: Ciao, mondo!", "<br>";
    if($_GET != null)
    {
        echo "Richiesta tramite get";
        echo $_GET['pw'];
    }
    elseif ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        echo "Richiesta tramite post <br>";
        echo $_POST['userName'], "<br>";
        echo $_POST['userSurname'], "<br>";
        echo $_POST['userMail'], "<br>";
        echo $_POST['userPassword'], "<br>";
        echo $_POST['userGender'], "<br>";
        echo $_POST['userCity'], "<br>";
        echo $_POST['userDate'], "<br>";
    }
        

