<?php
// produit_gestion.php - CRUD COMPLET (MAJ 20/04/2026)
include 'db.php';

// 1. AJOUT
if(isset($_POST['ajouter'])){
    $stmt = $pdo->prepare("INSERT INTO produit (nom_prod, prix, id_cat) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['nom'], $_POST['prix'], $_POST['id_cat']]);
    header("Location: produit_gestion.php?success=1");
}

// 2. SUPPRESSION
if(isset($_GET['delete'])){
    $pdo->prepare("DELETE FROM produit WHERE id_prod = ?")->execute([$_GET['delete']]);
    header("Location: produit_gestion.php?success=2");
}

$produits = $pdo->query("SELECT p.*, c.libelle FROM produit p LEFT JOIN categorie c ON p.id_cat = c.id_cat")->fetchAll();
$categories = $pdo->query("SELECT * FROM categorie")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Produits - Niveau 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">ADMIN NIVEAU 2</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="produit_gestion.php">Produits</a></li>
                    <li class="nav-item"><a class="nav-link" href="categorie_gestion.php">Catégories</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <!-- FORMULAIRE -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0">Ajouter un Produit</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Nom du produit</label>
                                <input type="text" name="nom" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Prix (FCFA)</label>
                                <input type="number" step="0.01" name="prix" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Catégorie</label>
                                <select name="id_cat" class="form-select">
                                    <?php foreach($categories as $cat): ?>
                                        <option value="<?= $cat['id_cat'] ?>"><?= $cat['libelle'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" name="ajouter" class="btn btn-primary w-100 shadow-sm">Enregistrer le Produit</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- LISTE -->
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-0">
                        <table class="table table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nom</th>
                                    <th>Prix</th>
                                    <th>Catégorie</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($produits as $p): ?>
                                <tr>
                                    <td class="fw-bold"><?= $p['nom_prod'] ?></td>
                                    <td><?= number_format($p['prix'], 2) ?> €</td>
                                    <td><span class="badge bg-info text-dark"><?= $p['libelle'] ?? 'N/A' ?></span></td>
                                    <td class="text-end">
                                        <a href="?delete=<?= $p['id_prod'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Supprimer ce produit ?')">Supprimer</a>
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