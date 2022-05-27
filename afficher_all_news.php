<?php

    session_start(); //crée une session ou restaure celle trouvée sur le serveur, via l'identifiant de session passé dans une requête GET, POST ou par un cookie.

    require_once "fonctions.php";
    require_once "models/news.php";

    if(isset($_POST['categorie'])) //vérifie si une catégorie a été set
    {
        $categorie=$_POST['categorie'];
        $tab=afficher_news_cat($categorie);

        foreach($tab as $val)
        {
            date_default_timezone_set('Europe/Paris');
            $ajd = date('Y-m-d');
            if($val['expiration'] != NULL && $val['expiration'] <= $ajd) //pour supprimer si la news est périmée (expiration<=publication)
            {
                $idNews=$val['idNews'];
                supprimer($idNews);
                $tab=afficher_news_cat($categorie);
            }
        }
    }
    else
    {
        $categorie=0;
        $tab=afficher_news_cat($categorie);

        foreach($tab as $val)
        {
            date_default_timezone_set('Europe/Paris');
            $ajd = date('Y-m-d');
            if($val['expiration'] != NULL && $val['expiration'] <= $ajd) //pour supprimer si la news est périmée (expiration<=publication)
            {
                $idNews=$val['idNews'];
                supprimer($idNews);
                $tab=afficher_news_cat($categorie);
            }
        }
    }

    require_once "views/afficher_all_news.php";

?>