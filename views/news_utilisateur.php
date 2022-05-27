<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes news</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
   
    <?php require("header.php");?>

    <?php require("menu.php");?>

    <main>
        <!-- formulaire pour ajouter une news -->
        <form method="POST" action="./news_utilisateur.php" >

            <label for="titre" ><br>Titre:</label>
            <input type="text" name="titre" placeholder="Titre" value="" required>

            <label for="news" ><br>Ma nouvelle:<br></label>
            <textarea id="news" name="news" rows="10" placeholder="Ma news" value="" required></textarea>

            <label for="categorie" ><br><br>Catégorie:<br></label>
                <select type="text" name="categorie" id="categorie"> 

                    <option value="1"> Enfant </option>
                    <option value="6"> Adolescent </option>
                    <option value="2"> Adulte </option>
                    <option value="4"> Senior </option>

                </select>

            <label for="date_expiration"><br><br>Date d'expiration:</label>
            <input type="date" id="date_expiration" name="date_expiration" value="">            

            <button type="submit" name="form_submit">
                Ajouter
            </button>
        </form>
        

        <aside>
            <!-- afficher toutes les news de l'utilisateur (à côté du formulaire pour ajouter des news) -->
            <?php
                $tab=afficher_news_utilisateur($_SESSION['pseudo']);

                if(empty($tab))
                {
                    echo'<h2 class="aucune_news">'."Vous n'avez encore publié aucune news".'</h2>';
                }
                else
                {
                    foreach($tab as $val)
                    {
                        echo '<div class="une_news">';

                        echo"<h1>Publié par : ".$val['pseudo']."</h1>";

                        echo"<h1>Titre : ".$val['titre']."</h1>";

                        echo"<p>Publication : <br>".$val['texte']."</p>";

                        if($val['categorie']==1)
                        {
                            echo'Catégorie : enfant';
                        }
                        if($val['categorie']==2)
                        {
                            echo'Catégorie : adulte';
                        }
                        if($val['categorie']==4)
                        {
                            echo'Catégorie : senior';
                        }
                        if($val['categorie']==6)
                        {
                            echo'Catégorie : adolescent';
                        }
                        
                        echo"<p>Date de publication : ".$val['publication']."</p>";

                        if($val['expiration']==NULL)
                        {
                            echo"<p>Date d'expiration : aucune</p>";
                        }
                        else
                        {
                            echo"<p>Date d'expiration : ".$val['expiration']."</p>";
                        }

                        echo '<a class="modifier" href="./modifier_news.php ? idNews='.$val['idNews'].'">'."Modifier".'</a>';

                        echo '<a class="supprimer" href="./supprimer_confirmation.php ? idNews='.$val['idNews'].'" >'."Supprimer".'</a>';

                        echo '</div>';
                    }
                }
            ?>
        </aside>
    </main>

    <?php require("footer.php");?>

</body>
</html>