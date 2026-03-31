<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 border p-4 rounded">
    <h2 class="text-center mb-4 text-primary">Connexion</h2>
    <form action="/login" method="post" class="d-flex flex-column gap-3">
        <input type="email" class="form-control" name="email" placeholder="Votre e-mail" required>
        <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
    <?php if(isset($error)) echo "<p class='text-danger mt-2'>$error</p>"; ?>
</div>
</body>
</html>