<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une agence</title>
    <link rel="stylesheet" href="/assets/css/app.css">
</head>

<body class="bg-light">

    <?php include "Components/navbar.php"; ?>

    <div class="container mt-4">
        <div class="bg-primary text-white p-3 rounded mb-4">
            <h2 class="text-center">Modifier l'agence</h2>
        </div>
        <hr>

        <form action="/EditAgence/<?= $agence['id_agence'] ?>" method="POST" class="w-50 mx-auto">
            <fieldset class="border border-2 rounded p-4 mb-3">
                <legend class="float-none w-auto px-2 text-primary fw-bold">Modification</legend>

                <div class="mb-3">
                    <label class="form-label">Ville actuelle :</label>
                    <input type="text" class="form-control" value="<?= htmlspecialchars($agence['ville_agence']) ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="ville_agence" class="form-label">Nouvelle ville :</label>
                    <input type="text" class="form-control" id="ville_agence" name="ville_agence"
                        placeholder="Entrez le nouveau nom..." required>
                </div>
            </fieldset>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Valider la modification</button>
            </div>
        </form>
    </div>

    <?php include "Components/footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>