<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container mt-5 border border-color-primary p-4 rounded">
        <h2 class="text-center mb-4 text-primary">Connexion à l'application</h2>
        <hr class="color-primary">
        <br>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form action="/login" method="post" class="d-flex flex-column gap-3">
                <div class="form-group">
                    <label for="email" class="p-1">E-mail:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Votre e-mail">
                </div>
                <div class="form-group">
                    <label for="password" class="p-1">Mot de passe:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe">
                </div>
                <div class="d-flex justify-content-center p-3">
                <button type="submit" class="btn btn-primary">Se connecter</button>
                </div>
            </form>
        </div>
    </div>
</div>    
   
    
</body>
</html>