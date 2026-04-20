<?php
// produit_gestion.php - COMPLETE CRUD (UPDATED 20/04/2026)
include 'db.php';

if(isset($_POST['ajouter'])){
    $pdo->prepare("INSERT INTO produit (nom_prod, prix) VALUES (?, ?)")->execute([$_POST['nom'], $_POST['prix']]);
    header("Location: produit_gestion.php");
}

if(isset($_GET['delete'])){
    $pdo->prepare("DELETE FROM produit WHERE id_prod = ?")->execute([$_GET['delete']]);
    header("Location: produit_gestion.php");
}

$produits = $pdo->query("SELECT * FROM produit")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Management - Level 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-success mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">ADMIN LEVEL 4</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="client_gestion.php">Clients</a></li>
                    <li class="nav-item"><a class="nav-link active" href="produit_gestion.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="commande_gestion.php">Orders</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow border-0">
                    <div class="card-header bg-success text-white py-3"><h5 class="mb-0">New Product</h5></div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Designation</label>
                                <input type="text" name="nom" class="form-control" placeholder="Designation" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price excl. Tax (€)</label>
                                <input type="number" step="0.01" name="prix" class="form-control" placeholder="Price excl. Tax" required>
                            </div>
                            <button type="submit" name="ajouter" class="btn btn-primary w-100 fw-bold">Add to Stock</button>
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
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($produits as $p): ?>
                                <tr>
                                    <td class="fw-bold"><?= $p['nom_prod'] ?></td>
                                    <td class="text-success fw-bold"><?= number_format($p['prix'], 2) ?> €</td>
                                    <td class="text-end">
                                        <a href="?delete=<?= $p['id_prod'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Remove from stock?')">Remove</a>
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