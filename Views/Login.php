<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 border p-4 rounded w-50">
    <h2 class="text-center mb-4 text-primary">Connexion</h2>
    <form action="/login" method="post" class="d-flex flex-column gap-3">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Votre e-mail" required>
        <label for="password">Mot de passe:</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
    <?php if(isset($error)) echo "<p class='text-danger mt-2'>$error</p>"; ?>
    
    <div class="text-center p-3">
    <p>ou</p>
    <a href="/Home" class="btn btn-outline-primary text-decoration-none">Voir les trajets comme invité</a>
    </div>
</div>
</body>
</html>