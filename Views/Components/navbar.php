<nav class="navbar bg-light">
  <div class="container-fluid d-flex justify-content-between align-items-center align-middle">
    <a class="navbar-brand" href="/">
      Touche pas au Klaxon
    </a>

    <?php
     /**
    *Affiche des liens de pages pour l'admin
    */

    if (isset($_SESSION['user']) && !empty($_SESSION['user']['is_admin']) && $_SESSION['user']['is_admin']):
    ?>
    <div>
        <a href="/users">Utilisateurs</a>
    </div>

    <div>
        <a href="/agences">Agences</a>
    </div>

    <div>
        <a href="/trajets">Trajets</a>
    </div>
    <?php
    endif;
    ?>

   <?php
    /**
    *Bouton d'ajout trajet pour les utilisateurs connectés
    */

    if (isset($_SESSION['user'])) {
    if (!empty($_SESSION['user']) && $_SESSION['user']) {
        echo '
        <div class="d-flex ms-auto m-2">
            <a href="/annonces" class="btn btn-primary text-decoration-none">+ Ajouter un trajet</a>
        </div>';
    }
}
?>
   
    <div class="d-flex justify-center align-items-center">  
    <?php
     /**
    *Affiche un message de bienvenue pour les utilisateurs connectés.
    */
    if (isset($_SESSION['user'])) {
    if (!empty($_SESSION['user']['is_admin']) && $_SESSION['user']['is_admin']) {
        echo '<a href="#" class="btn btn-outline-secondary text-decoration-none">Bonjour Admin</a>';
    } else {
        echo '<a href="#" class="btn btn-outline-secondary text-decoration-none">Bonjour ' . htmlspecialchars($_SESSION['user']['username']) . '</a>';
    }
    }
    ?>
    </div> 


    <div>
    <?php
    /**
    *Bouton de connexion ou de deconnexion
    */

    if (isset($_SESSION['user'])) {
        echo '<a href="/profile" class="btn btn-outline-primary text-decoration-none">Profil</a>';
    } else {
        echo '<a href="/login" class="btn btn-outline-primary text-decoration-none">Connexion</a>';
    }
    ?>
    </div>
  </div>
</nav>