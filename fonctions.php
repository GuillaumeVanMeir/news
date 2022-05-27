<?php

    function connectionBaseDeDonnee() //pour se connecter à la bd
    {
        $mysqli = mysqli_connect('localhost', 'root', '', 'projet_web'); //Se connecte à la bd
        mysqli_set_charset($mysqli,'utf8'); //Définit le jeu de caractères à utiliser lors de l'envoi de données depuis et vers le serveur de base de données.
        if (mysqli_connect_errno()) //Retourne le code d'erreur du dernier appel de connexion
        {
            die("Échec lors de la connexion à MySQL : " . mysqli_connect_error()); //Retourne une description de la dernière erreur de connexion
        } 
        return $mysqli;
    }

?>