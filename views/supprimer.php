<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
   
    <?php require("views/header.php");?>

    <?php require("views/menu.php");?>
    

    <main>
        <article>
            <!-- Affiche la news à supprimer -->
            <?php
                $val=afficher_une_news($_GET['idNews']);
                $tab=$val[0];

                echo '<div class="une_news">';

                echo"<h1>Publié par : ".$tab['pseudo']."</h1>";

                echo"<h1>Titre : ".$tab['titre']."</h1>";

                echo"<p>Publication : <br>".$tab['texte']."</p>";

                if($tab['categorie']==1)
                {
                    echo'Catégorie : enfant';
                }
                if($tab['categorie']==2)
                {
                    echo'Catégorie : adulte';
                }
                if($tab['categorie']==4)
                {
                    echo'Catégorie : senior';
                }
                if($tab['categorie']==6)
                {
                    echo'Catégorie : adolescent';
                }
                
                echo"<p>Date de publication : ".$tab['publication']."</p>";

                if($tab['expiration']==NULL)
                {
                    echo"<p>Date d'expiration : aucune</p>";
                }
                else
                {
                    echo"<p>Date d'expiration : ".$tab['expiration']."</p>";
                }

                echo '</div>';


                echo'<a href="./supprimer.php? idNews='.$_GET['idNews'].'" class="supprimer">Confirmer la suppression</a>';
                echo'<a href="./news_utilisateur.php" class="annuler">Annuler</a>';
            ?>
        </article> 
    </main>

    <?php require("footer.php");?>

</body>
</html>