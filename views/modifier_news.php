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
        <!-- formulaire de modification -->
        <form method="POST" action="./modifier_news.php?idNews=<?php echo $_GET['idNews']?>">

            <?php $tab=valeur_update_tab($idNews);?>  
            <?php $cat=cat_update($idNews);?>  

            <label for="titre" ><br>Titre:</label>
            <input type="text" name="titre" placeholder="Titre" value="<?php echo $tab['titre'];?>">

            <label for="news" ><br>Ma nouvelle:<br></label>
            <textarea id="news" name="news" rows="10" placeholder="Ma news"><?php echo $tab['texte'];?></textarea>

            <label for="categorie" ><br><br>Catégorie:<br></label>
                <select type="text" name="categorie" id="categorie">
                <option value="<?php echo $tab['categorie'];?>"> <?php echo $cat; ?> </option>
                <option value="1"> enfant </option>
                <option value="6"> adolescent </option>
                <option value="2"> adulte </option>
                <option value="4"> senior </option>
            </select>

            <label for="date_expiration"><br><br>Date expiration:</label>
            <input type="date" id="date_expiration" name="date_expiration" value="<?php echo $tab['expiration'];?>">

            <button class="bt_modif" type="submit" name="form_submit">
                Modifier
            </button>
            <a class="bt_modif_annuler" href="./news_utilisateur.php" class="annuler">Annuler</a>

        </form>
        
    </main>

    <?php require("footer.php");?>

</body>
</html>