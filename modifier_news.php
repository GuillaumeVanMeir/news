<?php

    session_start(); //crée une session ou restaure celle trouvée sur le serveur, via l'identifiant de session passé dans une requête GET, POST ou par un cookie.

    require_once "fonctions.php";
    require_once "models/news.php";

    $titre='';
    $texte='';
    $pseudo=$_SESSION['pseudo'];
    $publication='';
    $expiration='';
    $categorie='';
    $idNews=$_GET["idNews"];

    $tab=afficher_une_news($idNews); //pour récupérer la date de publication de la news à modifier
    foreach($tab as $val)
    {
        $publication=$val['publication'];
    }

    $ok=1;

    if(isset($_POST["titre"]) && !empty($_POST["titre"]))
    {
        $titre=$_POST["titre"];
        $titre=addslashes($_POST["titre"]); //permet de pouvoir saisir certains caractères sans erreur ds la bd
        $ok=0;
    }
    if(isset($_POST["news"]) && !empty($_POST["news"]))
    {
        $texte=$_POST["news"];
        $texte=addslashes($_POST["news"]); //permet de pouvoir saisir certains caractères sans erreur ds la bd
        $ok=0;
    }
    if(isset($_POST["date_expiration"]) && !empty($_POST["date_expiration"]))
    {
        $expiration=$_POST["date_expiration"];
        $ok=0;
    }
    if(isset($_POST["categorie"]) && !empty($_POST["categorie"]))
    {
        $categorie=$_POST["categorie"];
        $ok=0;
    }

    if(empty($_POST["date_expiration"]) || $_POST["date_expiration"] <= $publication)
    {
        $reponse = update_empty ($titre,$texte,$categorie,$idNews); //va laisser l'expiration vide si c'est une date antérieure à la date du jour ou si l'utilisateur en veut pas
    }
    else
    {
        $expiration=$_POST["date_expiration"];
        $reponse = update ($titre,$texte,$categorie,$expiration,$idNews);
    }
    
    if($ok==1)
    {
        require_once "views/modifier_news.php";
    }
    else
    {
        require_once "views/news_utilisateur.php";
    }

?>