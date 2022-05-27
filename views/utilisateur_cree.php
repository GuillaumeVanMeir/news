<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connection Inscription</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
   
    <?php require("header.php");?>

    <?php require("menu.php");?>

    <main>
        <article>
            <!-- utilisateur créé -->
            <h3>Votre compte à bien été créé!</h3>
            <h3>Merci de bien vouloir vous connecter avec votre nouveau pseudo ainsi que votre mot de passe!</h3>
            <form class="form_inscription" method="POST" action="">
                <input type="text" name="pseudo" placeholder="Pseudo" value="" required>
                <input type="password" name="password" placeholder="Mot de passe" value="" required>
                <button class="button_inscription" type="submit" name="form_submit">
                    Envoyer
                </button>
            </form>
        </article>
    </main>

    <?php require("footer.php");?>

</body>
</html>