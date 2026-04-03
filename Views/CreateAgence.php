<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de trajet</title>
    <link rel="stylesheet" href="/assets/css/app.css">
</head>
<body class="bg-light">
    <?php include 'Components/navbar.php'; ?>

    <div class="container mt-4">
        <div class="bg-primary text-white p-3 rounded w-100 mx-auto mb-4">
            <h2 class="text-center">Créer une nouvelle agence</h2>
        </div>

        <hr>

    <form action="/CreateAgence" method="POST" class="w-100 mx-auto">
    <fieldset class="border border-2 rounded p-4 mb-3">
        <legend class="float-none w-auto px-2 text-primary fw-bold">Informations de l'agence</legend>
        <div class="d-flex flex-column gap-3 mb-3">
            
            <label for="ville_agence" class="form-label">Nom de l'agence :</label>
            <input type="text" class="form-control" id="nom_agence" name="nom_agence" placeholder="Ne rien mettre pour le moment">
        
        
            <label for="ville_agence" class="form-label">Ville de l'agence :</label>
            <input type="text" class="form-control" id="ville_agence" name="ville_agence" required>

            <label for="adresse" class="form-label">Adresse :</label>
            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Ne rien mettre pour le moment">
        </div>


    </div>
   

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Créer l'agence</button>
    </div>

</form>

    
    <?php include 'Components/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>