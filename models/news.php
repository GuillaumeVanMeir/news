<?php

    function creerNews ($titre,$texte,$pseudo,$publication,$expiration,$categorie)  //pour créer une news
    {
        $bd = connectionBaseDeDonnee(); //Ouvre une connexion à la bd
        
        $sql="INSERT INTO news (titre,texte,pseudo,publication,expiration,categorie) VALUES('$titre','$texte','$pseudo','$publication','$expiration','$categorie')";

        return mysqli_query($bd,$sql);  //Exécute une requête sur la base de donnée
        mysqli_close($bd);  //Ferme une connexion à la bd
    }

    function creerNews_expir_empty ($titre,$texte,$pseudo,$publication,$categorie) //pour créer une news si l'expiration est nulle
    {
        $bd = connectionBaseDeDonnee(); //Ouvre une connexion à la bd
        
        $sql="INSERT INTO news (titre,texte,pseudo,publication,categorie) VALUES('$titre','$texte','$pseudo','$publication','$categorie')";

        return mysqli_query($bd,$sql); //Exécute une requête sur la base de donnée
        mysqli_close($bd); //Ferme une connexion à la bd
    }

    function afficher_all_news () //affiche toutes les news
    {
        $bd = connectionBaseDeDonnee(); //Ouvre une connexion à la bd

        $sql="SELECT * FROM news ORDER BY publication DESC";

        $recherche=mysqli_query($bd,$sql); //Exécute une requête sur la base de donnée
        $tab=mysqli_fetch_all($recherche,MYSQLI_ASSOC); //Créer un tableau associatif de toutes les lignes récupérées dans la bd grace à la requete
        mysqli_close($bd); //Ferme une connexion à la bd
        return $tab; //retourner le tableau contenant les valeurs désirées
    }

    function update_empty ($titre,$texte,$categorie,$idNews) //modifier la news si l'expiration est nulle
    {
        $bd = connectionBaseDeDonnee(); //Ouvre une connexion à la bd
        
        $sql="UPDATE news set titre='$titre', texte='$texte', expiration=NULL, categorie='$categorie' WHERE idNews=$idNews ";

        return mysqli_query($bd,$sql); //Exécute une requête sur la base de donnée
        mysqli_close($bd); //Ferme une connexion à la bd
    }

    function update ($titre,$texte,$categorie,$expiration,$idNews) //modifier la news si l'expiration est correcte (supérieur à la date de publication) et set
    {
        $bd = connectionBaseDeDonnee(); //Ouvre une connexion à la bd
        
        $sql="UPDATE news set titre='$titre', texte='$texte', expiration='$expiration', categorie='$categorie' WHERE idNews=$idNews ";

        return mysqli_query($bd,$sql); //Exécute une requête sur la base de donnée
        mysqli_close($bd); //Ferme une connexion à la bd
    }

    function valeur_update ($idNews) //utile à la fonction valeur_update_tab car ici on retourne un tableau dans un tableau
    {
        $bd = connectionBaseDeDonnee(); //Ouvre une connexion à la bd

        $sql="SELECT * FROM news WHERE idNews=$idNews";

        $recherche=mysqli_query($bd,$sql); //Exécute une requête sur la base de donnée
        return mysqli_fetch_all($recherche,MYSQLI_ASSOC); //Créer un tableau associatif de toutes les lignes récupérées dans la bd grace à la requete
        mysqli_close($bd); //Ferme une connexion à la bd
    }

    function valeur_update_tab ($idNews) //va être utile dans la vue (modifier_news.php) pour présaisir le formulaire à modifier
    {
        $tab=valeur_update($idNews);
        $tab=$tab[0]; //pour avoir un seul tableau
        return $tab;
    }

    function cat_update ($idNews) //va être utile dans la vue (modifier_news.php) pour présaisir le formulaire à modifier dans les catégories
    {
        $tab=valeur_update_tab($idNews);
        $val='';
        if($tab['categorie']==1)
        {
            $val='Enfant';
            return $val;
        }
        if($tab['categorie']==2)
        {
            $val='Adulte';
            return $val;
        }
        if($tab['categorie']==4)
        {
            $val='Senior';
            return $val;
        }
        if($tab['categorie']==6)
        {
            $val='Adolescent';
            return $val;
        }
    }

    function supprimer ($idNews) //pour supprimer une news
    {
        $bd = connectionBaseDeDonnee(); //Ouvre une connexion à la bd
        
        mysqli_query($bd,"DELETE FROM news where idNews LIKE $idNews"); //Exécute une requête sur la base de donnée
    
        mysqli_close($bd); //Ferme une connexion à la bd
    }

    function afficher_une_news ($idNews) //pour afficher une news
    {
        $bd = connectionBaseDeDonnee(); //Ouvre une connexion à la bd
        $sql="SELECT * FROM news WHERE idNews=$idNews";

        $recherche=mysqli_query($bd,$sql); //Exécute une requête sur la base de donnée
        return mysqli_fetch_all($recherche,MYSQLI_ASSOC); //Créer un tableau associatif de toutes les lignes récupérées dans la bd grace à la requete
        mysqli_close($bd); //Ferme une connexion à la bd
    }

    function afficher_news_utilisateur ($pseudo) //pour afficher les news d'un même utilisateur
    {
        $bd = connectionBaseDeDonnee(); //Ouvre une connexion à la bd

        $sql="SELECT * FROM news WHERE pseudo LIKE '$pseudo' ORDER BY publication DESC";

        $recherche=mysqli_query($bd,$sql); //Exécute une requête sur la base de donnée
        $tab = mysqli_fetch_all($recherche,MYSQLI_ASSOC); //Créer un tableau associatif de toutes les lignes récupérées dans la bd grace à la requete
        mysqli_close($bd); //Ferme une connexion à la bd
        return $tab;
    }

    function afficher_news_cat ($categorie) //pour afficher_all_news dans le menu de filtre sur la catégorie
    {
        $bd = connectionBaseDeDonnee();

        if($categorie==0)
        {
            $sql="SELECT * FROM news ORDER BY publication DESC";
        }
        else
        {
            $sql="SELECT * FROM news WHERE categorie LIKE '$categorie' ORDER BY publication DESC";
        }

        $recherche=mysqli_query($bd,$sql);  //Exécute une requête sur la base de donnée
        $tab=mysqli_fetch_all($recherche,MYSQLI_ASSOC); //Créer un tableau associatif de toutes les lignes récupérées dans la bd grace à la requete
        mysqli_close($bd); //Ferme une connexion à la bd
        return $tab;
    }

?>