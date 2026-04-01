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

    <div>
        <table class="table table-bordered table-hover mt-2">
  <thead>
    <tr class="table-primary text-center">
      <th scope="col">Nom</th>
      <th scope="col">Ville</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($agences as $agence): ?>
        <tr class="text-center  align-middle">
            <td><?=  $agence["id_agence"] ?></td>
            <td><?=  $agence["ville_agence"] ?></td>
            <td>
                <button class="btn btn-sm btn-dark text-white">Modifier</button>
                <button class="btn btn-sm btn-danger text-white">Supprimer</button>
            </td>
        </tr>
        <?php endforeach; ?>
  </tbody>
</table>
    </div>

<?php include 'Components/footer.php'; ?>

</body>
</html>