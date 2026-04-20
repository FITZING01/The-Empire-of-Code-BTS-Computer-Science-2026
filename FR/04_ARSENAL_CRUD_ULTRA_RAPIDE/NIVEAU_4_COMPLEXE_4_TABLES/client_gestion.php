<?php
// client_gestion.php - CRUD COMPLET (MAJ 20/04/2026)
include 'db.php';

if(isset($_POST['ajouter'])){
    $pdo->prepare("INSERT INTO client (nom_cli) VALUES (?)")->execute([$_POST['nom']]);
    header("Location: client_gestion.php");
}

if(isset($_GET['delete'])){
    $pdo->prepare("DELETE FROM client WHERE id_cli = ?")->execute([$_GET['delete']]);
    header("Location: client_gestion.php");
}

$clients = $pdo->query("SELECT * FROM client")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion Clients - Niveau 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-success mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">ADMIN NIVEAU 4</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="client_gestion.php">Clients</a></li>
                    <li class="nav-item"><a class="nav-link" href="produit_gestion.php">Produits</a></li>
                    <li class="nav-item"><a class="nav-link" href="commande_gestion.php">Commandes</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow border-0">
                    <div class="card-header bg-success text-white py-3"><h5 class="mb-0">Ajouter un Client</h5></div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Nom de l'entreprise</label>
                                <input type="text" name="nom" class="form-control" placeholder="Ex: Ma Société SAS" required>
                            </div>
                            <button type="submit" name="ajouter" class="btn btn-primary w-100">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow border-0">
                    <div class="card-body p-0">
                        <table class="table table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($clients as $c): ?>
                                <tr>
                                    <td><?= $c['id_cli'] ?></td>
                                    <td class="fw-bold"><?= $c['nom_cli'] ?></td>
                                    <td class="text-end">
                                        <a href="?delete=<?= $c['id_cli'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Supprimer ce client ?')">Supprimer</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>