<?php
    //Verifica che la sessione sia stata effettuata
    session_start();

    if(!(isset($_SESSION["nome"]) && isset($_SESSION["password"])))
    {
        die("Errore");
    }
?>