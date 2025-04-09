<?php
    session_start();
    if(!(isset($_SESSION["CodF"]) && isset($_SESSION["pwd"]) && isset($_SESSION["ruolo"])))
    {
        die("Accedi");
    }