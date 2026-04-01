<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>

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
    <div class="ms-3 d-flex gap-5">
            <a href="/users">Utilisateurs</a>
            <a href="/agences">Agences</a>
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
            <a href="/annonces" class="btn btn-primary text-decoration-none">+ Créer un trajet</a>
        </div>';
    }
}
?>
   
    <div class="d-flex justify-center align-items-center gap-3">  
    <?php
     /**
    *Affiche un message de bienvenue pour les utilisateurs connectés.
    */
    if (isset($_SESSION['user'])) {
    if (!empty($_SESSION['user']['is_admin']) && $_SESSION['user']['is_admin']) {
        echo '<span class="text-success text-decoration-none align-items-center align-middle justify-contentcenter p-2 mx-3">Bonjour Admin !</span>';
    } else {
        echo '<span class="text-success text-decoration-none align-items-center align-middle justify-contentcenter p-2 mx-3">Bonjour ' . htmlspecialchars($_SESSION['user']['prenom']) . ' !</span>';
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
        echo '<a href="/logout" class="btn btn-outline-danger text-decoration-none">Déconnexion</a>';
    } else {
        echo '<a href="/login" class="btn btn-outline-primary text-decoration-none">Connexion</a>';
    }
    ?>
    </div>
  </div>
</nav>