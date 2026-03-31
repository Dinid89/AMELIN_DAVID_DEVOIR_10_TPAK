<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Touche pas au Klaxon - Accueil</title>
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
    </tr>
  </thead>
  <tbody>
    <?php foreach ($trajets as $trajet): ?>
        <tr class="text-center  align-middle">
            <td><?=  $trajet["ville_depart"] ?></td>
            <td><?= date('d/m/Y', strtotime($trajet["depart_date_trajet"])) ?></td>
            <td><?= date('H:i', strtotime($trajet["depart_date_trajet"])) ?></td>
            <td><?=  $trajet["ville_arrivee"] ?></td>
            <td><?= date('d/m/Y', strtotime($trajet["arrivee_date_trajet"])) ?></td>
            <td><?= date('H:i', strtotime($trajet["arrivee_date_trajet"])) ?></td>
            <td><?=  $trajet["places_dispo_trajet"] ?></td>
        </tr>
        <?php endforeach; ?>
  </tbody>
</table>
    </div>

</body>
</html>