<?php

    session_start(); //crée une session ou restaure celle trouvée sur le serveur, via l'identifiant de session passé dans une requête GET, POST ou par un cookie.
    require_once "fonctions.php";

    $ok=1;

    if(isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"]))
    {
        header("Location: index.php");
    }

    if(isset($_POST["pseudo"]) && !empty($_POST["pseudo"]) && isset($_POST["password"]) && !empty($_POST["password"]))
    {
        require_once "models/connection_inscription.php";

        $pseudo=addslashes($_POST["pseudo"]);
        $password=$_POST["password"];

        $succes=""; //
        $erreur=""; //je laisse ces variables uniquement dans le but de pouvoir debug avec des vardump si jamais il y a des problèmes


        $reponse=verifierUtilisateurExistant($pseudo);
        if($reponse)
        {
            if (mysqli_num_rows($reponse) > 0)
            {
                $reponse = mysqli_fetch_assoc($reponse);
                $mdp_hashe=$reponse["mdp"]; 
                
                if(password_verify($password,$mdp_hashe)) //utilisateur vérifié 
                {
                    $succes="utilisateur existant";
                    $_SESSION["pseudo"]=$pseudo;
                    header("Location: index.php");
                }
                else //mot de passe incorrect
                {
                    $ok=0;
                    $erreur="mot de passe incorrect";
                    require_once "views/erreur_mdp.php";
                }
            }
            else
            {
                $password=password_hash($_POST["password"], PASSWORD_DEFAULT);
                $reponse=creerUtilisateur($pseudo,$password);
                if($reponse) //utilisateur créé
                {
                    $ok=0;
                    $succes="utilisateur cree"; 
                    require_once "views/utilisateur_cree.php";
                }
                else
                {
                    $erreur="erreur creation utilisateur";
                }
            }
        }
    }
    if($ok==1)
    {
        require_once "views/connection_inscription.php";
    }

?>