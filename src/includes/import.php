<?php
    function stampa($file)
    {
        $aux = file_get_contents($file);
        echo $aux;
    }
