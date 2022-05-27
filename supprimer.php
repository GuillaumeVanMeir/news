<?php
    require_once("fonctions.php");
    require("./models/news.php");

    $idNews = $_GET['idNews'];
    
    supprimer($idNews);


    header('Location: ./news_utilisateur.php');
?>