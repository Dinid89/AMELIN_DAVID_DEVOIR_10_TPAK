<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Touche pas au Klaxon - Utilisateurs</title>
    <link rel="stylesheet" href="/assets/css/app.css">
</head>
<body class="bg-light">
    
    <?php include 'Components/navbar.php'; ?>

    <div>
        <table class="table table-bordered table-hover mt-2">
  <thead>
    <tr class="table-primary text-center">
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Téléphone</th>
      <th scope="col">Mail</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user): ?>
        <tr class="text-center  align-middle">
            <td class="text-uppercase"><?=  $user["nom_users"] ?></td>
            <td><?= $user["prenom_users"] ?></td>
            <td><?= $user["phone_users"] ?></td>
            <td><?= $user["mail_users"] ?></td>
            <td>
                <div class="d-flex justify-content-center gap-2">
                    <button onclick="alert('Pas encore possible sur cette version')" class="btn btn-sm btn-dark text-white">Modifier</button>
                    <button onclick="alert('Pas encore possible sur cette version')" class="btn btn-sm btn-danger text-white">Supprimer</button>
                </div> 
            </td>
        </tr>
        <?php endforeach; ?>
  </tbody>
</table>
    </div>

<?php include 'Components/footer.php'; ?>

</body>
</html>