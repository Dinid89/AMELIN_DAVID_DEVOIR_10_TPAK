<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Touche pas au Klaxon - Trajets</title>
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
                <?php foreach ($trajets as $trajet):
                    /**
                     * Affiche les détails du trajet pour les admins.
                     */
                ?>
                    <tr class="text-center  align-middle">
                        <td><?= $trajet["ville_depart"] ?></td>
                        <td><?= date('d/m/Y', strtotime($trajet["depart_date_trajet"])) ?></td>
                        <td><?= date('H:i', strtotime($trajet["depart_date_trajet"])) ?></td>
                        <td><?= $trajet["ville_arrivee"] ?></td>
                        <td><?= date('d/m/Y', strtotime($trajet["arrivee_date_trajet"])) ?></td>
                        <td><?= date('H:i', strtotime($trajet["arrivee_date_trajet"])) ?></td>
                        <td><?= $trajet["places_dispo_trajet"] ?></td>
                        <td>


                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-sm btn-success text-white text-decoration-none" data-bs-toggle="modal" data-bs-target="#modal-<?= $trajet['id_trajets'] ?>">
                                    Voir
                                </button>
                                <?php include 'Components/modal.php' ?>


                                <a href="/EditTrajet/<?= $trajet['id_trajets'] ?>" class="btn btn-sm btn-dark">Modifier</a>


                                <form method="POST" action="/DeleteTrajet/<?= $trajet['id_trajets'] ?>"
                                    onsubmit="return confirm('Supprimer ce trajet ?')">
                                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                </form>
                            </div>
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