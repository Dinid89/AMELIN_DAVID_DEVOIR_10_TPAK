<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Touche pas au Klaxon - Accueil</title>
    <link rel="stylesheet" href="/assets/css/app.css">
</head>
<body class="bg-light">
    
    <?php include 'Components/navbar.php'; ?>

    <div>
        <table class="table table-bordered table-hover mt-2">
  <thead>
    <tr class="table-primary text-center">
      <th scope="col">Départ</th>
      <th scope="col">Date</th>
      <th scope="col">Heure</th>
      <th scope="col">Destination</th>
      <th scope="col">Date</th>
      <th scope="col">Heure</th>
      <th scope="col">Places Disponibles</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    
    <?php 
      /**
       * Affiche les détails du trajet.
       */
    foreach ($trajets as $trajet): ?>

        <tr class="text-center  align-middle">
            <td><?=  $trajet["ville_depart"] ?></td>
            <td><?= date('d/m/Y', strtotime($trajet["depart_date_trajet"])) ?></td>
            <td><?= date('H:i', strtotime($trajet["depart_date_trajet"])) ?></td>
            <td><?=  $trajet["ville_arrivee"] ?></td>
            <td><?= date('d/m/Y', strtotime($trajet["arrivee_date_trajet"])) ?></td>
            <td><?= date('H:i', strtotime($trajet["arrivee_date_trajet"])) ?></td>
            <td><?=  $trajet["places_dispo_trajet"] ?></td>
            <td>
                
                <?php

                /**
                 * Affiche un bouton "Voir" pour les utilisateurs connectés, et des boutons "Modifier" et "Supprimer" pour les admins.
                 */
                ?>


                <?php 
                if (isset($_SESSION['user'])): ?>
                <button class="btn btn-sm btn-success text-decoration-none text-white" data-bs-toggle="modal" data-bs-target="#modal-<?= $trajet['id_trajets'] ?>">
                    Voir
                </button>
                <?php include 'Components/modal.php' ?>
                <?php endif; ?>
                
                <?php if (isset($_SESSION['user']) && !empty($_SESSION['user']['is_admin'])): ?>
                <button class="btn btn-sm btn-dark">Modifier</button>
                <button class="btn btn-sm btn-danger">Supprimer</button>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
  </tbody>
</table>
    </div>

<?php include 'Components/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>    
</body>
</html>