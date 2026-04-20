<?php
include 'db.php';
// Suppression
if(isset($_GET['del'])){
    $pdo->prepare("DELETE FROM produit WHERE id_prod = ?")->execute([$_GET['del']]);
    header('Location: manage_produits.php');
}
// Ajout
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $pdo->prepare("INSERT INTO produit (nom_prod, prix) VALUES (?,?)")->execute([$_POST['nom'], $_POST['prix']]);
}
$produits = $pdo->query("SELECT * FROM produit")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer Produits - Niveau 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">ADMIN NIVEAU 4</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="client_gestion.php">Clients</a></li>
                    <li class="nav-item"><a class="nav-link active" href="produit_gestion.php">Produits</a></li>
                    <li class="nav-item"><a class="nav-link" href="commande_gestion.php">Commandes</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card p-4 shadow-sm mb-4 border-0">
                    <h4 class="mb-3">Nouveau Produit</h4>
                    <form method="POST">
                        <div class="mb-3">
                            <input type="text" name="nom" class="form-control" placeholder="Désignation" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" step="0.01" name="prix" class="form-control" placeholder="Prix" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100 fw-bold">Ajouter</button>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead class="table-dark"><tr><th>ID</th><th>Désignation</th><th>Prix</th><th class="text-end">Action</th></tr></thead>
                            <tbody>
                                <?php foreach($produits as $p): ?>
                                <tr>
                                    <td><?= $p['id_prod'] ?></td>
                                    <td class="fw-bold"><?= $p['nom_prod'] ?></td>
                                    <td class="text-success fw-bold"><?= number_format($p['prix'], 2) ?> €</td>
                                    <td class="text-end"><a href="?del=<?= $p['id_prod'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Supprimer ?')">Supprimer</a></td>
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