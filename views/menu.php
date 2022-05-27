<nav>
    <ul>
        <a href="index.php">
            <li>
                <span contenteditable="true">Retourner à l'accueil</span>
            </li>
        </a>
        <a href="afficher_all_news.php">
          <li>
            <span contenteditable="true">Afficher toutes les news</span>
          </li>
        </a>
        <?php
            if(isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"])) 
            {
              echo '<a href="deconnection.php">
                <li>
                  <span contenteditable="true">Déconnection de la session</span>
                </li>
              </a>';
            }
            else 
            {
              echo '<a href="connection_inscription.php">
                <li>
                  <span contenteditable="true">Connection Inscription</span>
                </li>
              </a>';
            }  
        ?>
        <?php
            if(isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"])) 
            {
              echo '<a href="news_utilisateur.php">
                <li>
                    <span contenteditable="true">Accéder à mes news</span>
                </li>
              </a>';
            } 
        ?>
    </ul>
</nav>