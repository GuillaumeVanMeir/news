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
            <!-- mot de passe incorrecte -->
            <h4>Ce pseudo existe déjà et le mot de passe correspondant est incorrect!</h4>
            <h3>Si ce n'est pas votre pseudo, merci de le changer!</h3>
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