<?php 

    function creerUtilisateur ($pseudo, $password) 
    {
        $bd = connectionBaseDeDonnee(); //lien à fonction.php
        return mysqli_query($bd, "INSERT INTO utilisateur VALUES ('" . $pseudo . "', '" . $password . "');"); //Exécute une requête sur la base de donnée
    }

    function verifierUtilisateurExistant ($pseudo) 
    {
        $bd = connectionBaseDeDonnee(); //lien à fonction.php
        return mysqli_query($bd, "SELECT * FROM utilisateur WHERE pseudo LIKE '". $pseudo ."';"); //Exécute une requête sur la base de donnée
    }

    function connectionUtilisateur ($pseudo, $password) 
    {
        $bd = connectionBaseDeDonnee(); //lien à fonction.php
            return mysqli_query($bd, "SELECT * FROM utilisateur WHERE pseudo LIKE '". $pseudo ."' AND mdp LIKE '". $password ."';"); //Exécute une requête sur la base de donnée
    }

?>