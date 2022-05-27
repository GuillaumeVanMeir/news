<?php

    session_start(); //crée une session ou restaure celle trouvée sur le serveur, via l'identifiant de session passé dans une requête GET, POST ou par un cookie.
    $_SESSION = array();
    session_destroy(); //Détruit une session
    header("Location: index.php"); 

?>