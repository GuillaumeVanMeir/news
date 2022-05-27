<?php

    session_start(); //crée une session ou restaure celle trouvée sur le serveur, via l'identifiant de session passé dans une requête GET, POST ou par un cookie.

    require_once "fonctions.php";
    require_once "models/news.php";

    require_once "./views/supprimer.php";

?>