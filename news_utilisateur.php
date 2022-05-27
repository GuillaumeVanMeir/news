<?php

    session_start(); //crée une session ou restaure celle trouvée sur le serveur, via l'identifiant de session passé dans une requête GET, POST ou par un cookie.
    require_once "./fonctions.php";
    require_once "./models/news.php";



    $titre='';
    $texte='';
    $pseudo=$_SESSION['pseudo'];
    $publication='';
    $expiration='';
    $categorie='';
    $ok='';

    if(isset($_POST["titre"]) && !empty($_POST["titre"]) && isset($_POST["news"]) && !empty($_POST["news"]))
    {
        $tab=afficher_all_news();

        foreach($tab as $val)//pour delete la news si elle est périmée
        {
            date_default_timezone_set('Europe/Paris');
            $ajd = date('Y-m-d');
            if($val['expiration'] != NULL && $val['expiration'] <= $ajd) 
            {
                $idNews=$val['idNews'];
                supprimer($idNews);
                $tab=afficher_all_news($categorie);
            }
        }

        foreach($tab as $val)
        {
            if($val['titre']==$_POST["titre"])
            {
                $ok=0; //pour bloquer l'ajout d'une même news 2 fois de suite en faisant un refresh de la page directement après par exemple (pour pas dupliquer accidentellement)
                    //je décide quand même de laisse la possibiliter d'entrer une même news sans la bloquer car l'utilisateur choisi ce qu'il publie
                    //Exemple : sur faceook vous pouvez très bien reposter une publication identique en tout point
            }
            else
            {
                $ok=1;
            }
        }

        if($ok==1)
        {
            $titre=$_POST["titre"];
            $titre=addslashes($_POST["titre"]);
        
            $texte=$_POST["news"];
            $texte=addslashes($_POST["news"]);

            date_default_timezone_set('Europe/Paris');
            $publication = date('Y-m-d');

            $categorie=$_POST["categorie"];
            
            if(empty($_POST["date_expiration"]) || $_POST["date_expiration"] <= $publication)
            {
                $reponse = creerNews_expir_empty ($titre,$texte,$pseudo,$publication,$categorie); //va laisser l'expiration vide si c'est une date antérieure à la date du jour ou si l'utilisateur en veut pas
            }
            else
            {
                $expiration=$_POST["date_expiration"];
                $reponse = creerNews ($titre,$texte,$pseudo,$publication,$expiration,$categorie);
            }
        }
    }


    require_once "views/news_utilisateur.php";

?>        