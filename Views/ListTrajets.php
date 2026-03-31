<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Touche pas au Klaxon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="b">
    
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
      <th scope="col">Informations</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($trajets as $trajet): ?>
        <tr class="text-center  align-middle">
            <td><?=  $trajet["ville_depart"] ?></td>
            <td><?=  $trajet["depart_date_trajet"] ?></td>
            <td><?=  $trajet["depart_date_trajet"] ?></td>
            <td><?=  $trajet["ville_arrivee"] ?></td>
            <td><?=  $trajet["arrivee_date_trajet"] ?></td>
            <td><?=  $trajet["arrivee_date_trajet"] ?></td>
            <td><?=  $trajet["places_dispo_trajet"] ?></td>
            <td>
                <a href="#" class="btn btn-sm btn-success">Voir</a>
                <a href="#" class="btn btn-sm btn-primary">Modifier</a>
                <a href="#" class="btn btn-sm btn-danger">Supprimer</a>
            </td>    
        </tr>
        <?php endforeach; ?>
  </tbody>
</table>
    </div>

</body>
</html>