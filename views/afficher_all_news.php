<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Toutes les news</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
   
    <?php require("header.php");?>

    <?php require("menu.php");?>

    <main>
        <article>
            <!-- formulaire de filtre sur la catégorie -->
            <form method="POST" action="./afficher_all_news.php" > 
                <label for="categorie" ><br><br>Filtrer les news par catégorie :
                    <select type="text" name="categorie" id="categorie"> 

                        <option value="0"> Toutes les news </option>
                        <option value="1"> Enfant </option>
                        <option value="6"> Adolescent </option>
                        <option value="2"> Adulte </option>
                        <option value="4"> Senior </option>

                    </select>
                </label>
                <button>Afficher</button>
            </form>

            <?php
                // affichage de toutes les news préalablement filtrées par catégorie
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

                    echo '</div>';
                }
            ?>
        </article>
    </main>

    <?php require("footer.php");?>

</body>
</html>