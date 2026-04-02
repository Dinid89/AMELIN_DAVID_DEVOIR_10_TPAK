<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de trajet</title>
    <link rel="stylesheet" href="/assets/css/app.css">
</head>
<body class="bg-light">
    <?php include 'Components/navbar.php'; ?>
    <div class="container mt-4">
        <div class="bg-primary text-white p-3 rounded mb-4">
            <h2 class="text-center">Modifier le trajet</h2>
        </div>
        <hr>

    <form action="/EditTrajet/<?= $trajet['id_trajets'] ?>" method="POST" class="w-100 mx-auto">

        <fieldset class="border border-1 border-primary rounded p-3 mb-3">
            <legend class="float-none w-auto px-2 text-primary fw-bold">Vos informations</legend>
            <div class="d-flex flex-column gap-2">
                <input type="text" class="form-control text-center" value="<?= htmlspecialchars($_SESSION['user']['prenom'] . ' ' . $_SESSION['user']['nom']) ?>" readonly>
                <input type="text" class="form-control text-center" value="<?= htmlspecialchars($_SESSION['user']['email']) ?>" readonly>
                <input type="text" class="form-control text-center" value="<?= htmlspecialchars($_SESSION['user']['phone']) ?>" readonly>
            </div>
        </fieldset>

        <div class="d-flex justify-content-between gap-3 mb-3">

            <fieldset class="border border-2 rounded p-4 flex-fill">
                <legend class="float-none w-auto px-2 text-primary fw-bold">Départ</legend>
                <div class="mb-3">
                    <label for="ville_depart" class="form-label">Ville de départ :</label>
                    <select class="form-select" id="ville_depart" name="ville_depart" required>
                        <option value="">Sélectionnez une ville</option>
                        <?php foreach ($agences as $agence): ?>
                            <option value="<?= $agence['id_agence'] ?>"
                                <?= ($agence['id_agence'] == $trajet['depart_agence_trajet']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($agence['ville_agence']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="depart_date_trajet" class="form-label">Date et heure de départ :</label>
                    <input type="datetime-local" class="form-control" id="depart_date_trajet" name="depart_date_trajet"
                        value="<?= date('Y-m-d\TH:i', strtotime($trajet['depart_date_trajet'])) ?>" required>
                </div>
            </fieldset>

            <fieldset class="border border-2 rounded p-4 flex-fill">
                <legend class="float-none w-auto px-2 text-primary fw-bold">Arrivée</legend>
                <div class="mb-3">
                    <label for="ville_arrivee" class="form-label">Ville d'arrivée :</label>
                    <select class="form-select" id="ville_arrivee" name="ville_arrivee" required>
                        <option value="">Sélectionnez une ville</option>
                        <?php foreach ($agences as $agence): ?>
                            <option value="<?= $agence['id_agence'] ?>"
                                <?= ($agence['id_agence'] == $trajet['arrivee_agence_trajet']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($agence['ville_agence']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="arrivee_date_trajet" class="form-label">Date et heure d'arrivée :</label>
                    <input type="datetime-local" class="form-control" id="arrivee_date_trajet" name="arrivee_date_trajet"
                        value="<?= date('Y-m-d\TH:i', strtotime($trajet['arrivee_date_trajet'])) ?>" required>
                </div>
            </fieldset>

        </div>

        <fieldset class="border border-2 rounded p-4 mb-3">
            <legend class="float-none w-auto px-2 text-primary fw-bold">Places</legend>
            <div class="mb-3">
                <label for="total_place_trajet" class="form-label">Nombre total de places :</label>
                <input type="number" class="form-control" id="total_place_trajet" name="total_place_trajet"
                    value="<?= $trajet['total_place_trajet'] ?>" min="1" required>
            </div>
            <div class="mb-3">
                <label for="places_dispo_trajet" class="form-label">Nombre de places disponibles :</label>
                <input type="number" class="form-control" id="places_dispo_trajet" name="places_dispo_trajet"
                    value="<?= $trajet['places_dispo_trajet'] ?>" min="1" required>
            </div>
        </fieldset>

        <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">
                Valider la modification
        </button>
        </div>

    </form>

    <?php include 'Components/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>