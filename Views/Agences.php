<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Touche pas au Klaxon - Agences</title>
    <link rel="stylesheet" href="/assets/css/app.css">
</head>
<body class="bg-light">
    
    <?php include 'Components/navbar.php'; ?>

    <?php if (isset($_SESSION['flash'])): ?>
    <div class="alert alert-success alert-dismissible fade show mx-3 mt-3" role="alert">
        <?= $_SESSION['flash'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <div>
        <table class="table table-bordered table-hover mt-2">
  <thead>
    <tr class="table-primary text-center align-middle">
      <th scope="col">ID</th>
      <th scope="col">Ville</th>
      <th scope='col'>Adresse</th>
      <th scope="col">
        <div class="d-flex align-items-center">
        <span class="flex-fill text-center">Actions</span>
        <a href="/CreateAgence" class="btn btn-sm btn-primary">+ Ajouter une agence</a>
        </div>
    </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($agences as $agence): ?>
        <tr class="text-center  align-middle">
            <td><?=  $agence["id_agence"] ?></td>
            <td><?=  $agence["ville_agence"] ?></td>
            <td>(à venir)</td>
            <td>
                <a href="/EditAgence/<?= $agence['id_agence'] ?>" class="btn btn-sm btn-dark text-white">Modifier</a>
                
                <form action="/DeleteAgence/<?= $agence['id_agence'] ?>" method="POST" style="display: inline;">
                    <button type="submit" class="btn btn-sm btn-danger text-white" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette agence ?');">Supprimer</button>
                </form>

            </td>
        </tr>
        <?php endforeach; ?>
  </tbody>
</table>
    </div>

<?php include 'Components/footer.php'; ?>

</body>
</html>